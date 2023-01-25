<?php

/**
 * PHP Version 8.1
 * Kernel
 *
 * @category Kernel
 * @package  App
 * @author   Fabien Potencier <fabien@symfony.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/symfony/symfony
 *
 * @see https://github.com/symfony/symfony
 */
namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

/**
 * Kernel
 *
 * @category Kernel
 * @package  App
 * @author   Fabien Potencier <fabien@symfony.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/symfony/symfony
 *
 * @see https://github.com/symfony/symfony
 */
class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
