<?php

/**
 * PHP Version 8.1
 * ReferenceService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ReferenceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace App\Service;

use App\Mapper\ReferenceApiResponseMapper;
use App\Model\AppConstants as LocalAppConstants;
use Lib\Dto\Reference as ReferenceDTO;
use Lib\Dto\ReferenceApiResponse as BaseReferenceApiResponse;
use Lib\Entity\Reference;
use App\Entity\Reference as EntityReference;
use Lib\Exception\BadApiResponse;
use Lib\Exception\MapperException;
use Lib\Exception\PaymentAPIException;
use Lib\Exception\ReferenceNotFoundException;
use Lib\Model\AppConstants;
use Lib\Model\ReferenceApiResponseCollection;
use Lib\Model\Status;
use Lib\Repository\ReferenceRepository;
use Lib\Service\HttpService;
use Lib\Service\OptionService;
use Lib\Service\ReferenceService as BaseReferenceService;
use Lib\Service\UtilService;

/**
 * ReferenceService.
 *
 * @category Service
 * @package  App\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Service/ReferenceService.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ReferenceService implements BaseReferenceService
{
    protected ReferenceRepository $referenceRepository;
    protected OptionService $optionService;
    protected HttpService $httpService;
    protected VerifyService $verifyService;
    protected ReferenceApiResponseMapper $referenceApiMapper;

    /**
     * Constructor.
     *
     * @param ReferenceRepository        $referenceRepository referenceRepository
     * @param OptionService              $optionService       optionService
     * @param HttpService                $httpService         httpService
     * @param VerifyService              $verifyService       verifyService
     * @param ReferenceApiResponseMapper $referenceApiMapper  referenceApiMapper
     */
    public function __construct(
        ReferenceRepository $referenceRepository,
        OptionService $optionService,
        HttpService $httpService,
        VerifyService $verifyService,
        ReferenceApiResponseMapper $referenceApiMapper
    ) {
        $this->referenceRepository = $referenceRepository;
        $this->optionService = $optionService;
        $this->httpService = $httpService;
        $this->verifyService = $verifyService;
        $this->referenceApiMapper = $referenceApiMapper;
    }

    /**
     * Create.
     *
     * @param Reference $reference reference
     *
     * @return Reference
     */
    public function create(Reference $reference): Reference
    {
        $this->verifyService->verifyReferenceAPI();

        return $this->referenceRepository->save($reference);
    }

    /**
     * CreateWith.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     */
    public function createWith(string $referenceNumber): Reference
    {
        $this->verifyService->verifyReferenceAPI();
        $this->verifyService->verifyReference($referenceNumber);

        $reference = new EntityReference();
        $reference->referenceNumber = $referenceNumber;

        return $this->referenceRepository->save($reference);
    }

    /**
     * FindByReferenceNumber.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function findByReferenceNumber(string $referenceNumber): Reference
    {
        $this->verifyService->verifyReferenceAPI();
        $this->verifyService->verifyReference($referenceNumber);

        $reference = $this->referenceRepository->findOneByReferenceNumber(
            $referenceNumber,
            false
        );

        if (!$reference) {
            $reference = $this->findByApi($referenceNumber);
            $reference = $this->referenceRepository->save($reference);
        }

        $condition = AppConstants::PARAMETER_TRUE_VALUE
            == $_ENV['OPTION_ENABLED'] &&
            AppConstants::PARAMETER_TRUE_VALUE
            == $_ENV['SEARCH_OPTION_WITH_REFERENCE'];

        if ($condition) {
            $reference->options = $this->optionService->list($referenceNumber);
        }

        return $reference;
    }

    /**
     * FindByApi.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return Reference
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function findByApi(string $referenceNumber): Reference
    {
        $dto = new ReferenceDTO();
        $dto->reference = $referenceNumber;
        $data = $this->httpService->sendGET($_ENV['API_REFERENCE'], $dto->toArray());
        $response = $this->generateReferenceResponse(
            $referenceNumber,
            $data
        );

        $reference = $this->referenceApiMapper->asEntity($response);

        if (!$reference) {
            throw new MapperException();
        }

        return $reference;
    }

    /**
     * GetAmount.
     *
     * @param string $referenceNumber referenceNumber
     *
     * @return float
     *
     * @throws \Exception
     *
     * @psalm-suppress NullableReturnStatement
     * @psalm-suppress InvalidNullableReturnType
     */
    public function getAmount(string $referenceNumber): float
    {
        $amount = $this->findByReferenceNumber($referenceNumber)->amount;
        $this->verifyService->verifyAmount($amount);

        return $amount;
    }

    /**
     * GenerateReferenceResponse.
     *
     * @param string     $referenceNumber referenceNumber
     * @param array|null $data            data
     *
     * @return BaseReferenceApiResponse
     *
     * @throws BadApiResponse|PaymentAPIException|ReferenceNotFoundException
     *
     * @psalm-suppress MixedAssignment
     * @psalm-suppress MixedArgument
     */
    public function generateReferenceResponse(
        string $referenceNumber,
        ?array $data
    ): BaseReferenceApiResponse {
        $data = json_decode($data['result'] ?? '');

        if (is_object($data)) {
            throw new ReferenceNotFoundException($referenceNumber);
        }

        $responseData = new ReferenceApiResponseCollection($data);
        $response = $responseData->first();

        foreach (LocalAppConstants::CONVERSION_RESULT_REFERENCE as $key => $value) {
            $response->$key = $response->$value;
        }

        return $response;
    }

    /**
     * UpdateStatus.
     *
     * @param string $referenceNumber referenceNumber
     * @param Status $status          status
     *
     * @return Reference
     *
     * @throws \Exception
     */
    public function updateStatus(string $referenceNumber, Status $status): Reference
    {
        return $this->referenceRepository->updateStatus($referenceNumber, $status);
    }
}
