<?php

/**
 * PHP Version 8.1
 * ReferenceCollection.
 *
 * @category Model
 * @package  Afrikpaysas\Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Model/ReferenceCollection.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Model;

use Afrikpaysas\Lib\Entity\Reference;

/**
 * ReferenceCollection.
 *
 * @template-extends Collection<Reference>
 *
 * @category Model
 * @package  Afrikpaysas\Lib\Model
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Model/ReferenceCollection.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class ReferenceCollection extends Collection
{
    /**
     * Constructor.
     *
     * @param object|array $array         array
     * @param string       $class         class
     * @param int          $flags         flags
     * @param string       $iteratorClass iteratorClass
     *
     * @return void
     */
    public function __construct(
        object|array $array = [],
        string $class = Reference::class,
        int $flags = 0,
        string $iteratorClass = 'ArrayIterator'
    ) {
        parent::__construct($array, $class, $flags, $iteratorClass);
    }
}
