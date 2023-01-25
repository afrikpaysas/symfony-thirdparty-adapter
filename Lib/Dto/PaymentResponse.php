<?php

/**
 * PHP Version 8.1
 * PaymentResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/PaymentResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 */
namespace Lib\Dto;

use Lib\Model\AppConstants;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * PaymentResponse.
 *
 * @category Dto
 * @package  Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/wilydamtchou/symfony-thirdparty-adapter/blob/master/Dto/PaymentResponse.php
 *
 * @see https://github.com/wilydamtchou/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class PaymentResponse extends JsonResponse
{
    /**
     * Constructor.
     *
     * @param TransactionDTO    $transactionDTO transactionDTO
     * @param ReferenceDTO|null $referenceDTO   referenceDTO
     *
     * @return void
     *
     * @psalm-suppress PossiblyInvalidArgument
     */
    public function __construct(
        TransactionDTO $transactionDTO,
        ?ReferenceDTO $referenceDTO
    ) {
        $response = new PaymentResponseDTO();

        $response->code = AppConstants::SUCCESS_CODE;
        $response->message = AppConstants::SUCCESS_MESSAGE;

        $response->result = $transactionDTO;
        $response->referenceData = $referenceDTO;

        $response->transactionId = $transactionDTO->transactionId;
        $response->providerId = $transactionDTO->providerId;
        $response->requestId = $transactionDTO->requestId;
        $response->financialId = $transactionDTO->financialId;
        $response->externalId = $transactionDTO->externalId;
        $response->applicationId = $transactionDTO->applicationId;

        parent::__construct($response);
    }
}
