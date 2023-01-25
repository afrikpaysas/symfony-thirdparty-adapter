<?php

/**
 * PHP Version 8.1
 * ReferenceResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/ReferenceResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Dto;

use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Model\Collection;
use Afrikpaysas\Lib\Model\OptionDTOCollection;
use Afrikpaysas\Lib\Model\ReferenceResponse as ModelReferenceResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * ReferenceResponse.
 *
 * @category Dto
 * @package  Afrikpaysas\Lib\Dto
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Dto/ReferenceResponse.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ReferenceResponse extends JsonResponse
{
    /**
     * Constructor.
     *
     * @param ReferenceDTO                                   $referenceDTO reference
     * @param OptionDTOCollection|Collection<OptionDTO>|null $options      options
     *
     * @return void
     *
     * @psalm-suppress PossiblyInvalidArgument
     */
    public function __construct(
        ReferenceDTO $referenceDTO,
        OptionDTOCollection|Collection|null $options
    ) {
        $response = new ModelReferenceResponse();

        $response->code = AppConstants::SUCCESS_CODE;
        $response->message = AppConstants::SUCCESS_MESSAGE;
        $response->result = $referenceDTO;
        $response->options = $options?->all();

        parent::__construct(get_object_vars($response));
    }
}
