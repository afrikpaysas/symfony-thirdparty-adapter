<?php

/**
 * PHP Version 8.1
 * OptionService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/OptionService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Dto\OptionRequest;
use Afrikpaysas\Lib\Dto\OptionRequestCollectionRequest;
use Afrikpaysas\Lib\Entity\Option;
use Afrikpaysas\Lib\Model\Collection;
use Afrikpaysas\Lib\Model\OptionCollection;

/**
 * OptionService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/OptionService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface OptionService
{
    /**
     * Create.
     *
     * @param OptionRequest $request request
     *
     * @return Option
     *
     * @throws \Exception
     */
    public function create(OptionRequest $request): Option;

    /**
     * CreateList.
     *
     * @param OptionRequestCollectionRequest $request request
     *
     * @return OptionCollection|Collection
     *
     * @throws \Exception
     */
    public function createList(
        OptionRequestCollectionRequest $request
    ): OptionCollection|Collection;

    /**
     * List.
     *
     * @param string|null $reference reference
     * @param bool        $throw     throw
     *
     * @return Collection<Option>|OptionCollection|null
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function list(
        ?string $reference = null,
        bool $throw = false
    ): Collection|OptionCollection|null;

    /**
     * ListApi.
     *
     * @param string|null $reference reference
     *
     * @return OptionCollection|null
     *
     * @throws \Exception
     */
    public function listApi(?string $reference = null): ?OptionCollection;

    /**
     * GenerateOption.
     *
     * @param OptionRequest $request request
     *
     * @return Option
     *
     * @throws \Exception
     */
    public function generateOption(OptionRequest $request): Option;

    /**
     * FindByReferenceAndSlug.
     *
     * @param string $reference reference
     * @param string $slug      slug
     *
     * @return Option
     */
    public function findByReferenceAndSlug(string $reference, string $slug): Option;

    /**
     * FindByReferenceAndSlug.
     *
     * @param string $slug  slug
     * @param bool   $throw throw
     *
     * @return Option|null
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function findOneBySlug(string $slug, bool $throw = true): ?Option;
}
