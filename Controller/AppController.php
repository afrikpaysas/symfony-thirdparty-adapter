<?php

/**
 * PHP Version 8.1
 * AppController.
 *
 * @category Controller
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Controller/AppController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\SymfonyThirdpartyAdapter\Controller;

use FOS\RestBundle\Controller\Annotations\Route;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Controller\AppController as BaseAppController;
use Afrikpaysas\SymfonyThirdpartyAdapter\Lib\Dto\AppResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * AppController.
 *
 * @category Controller
 * @package  Afrikpaysas\SymfonyThirdpartyAdapter\Controller
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Controller/AppController.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
#[Route('/')]
class AppController extends AbstractController implements BaseAppController
{
    /**
     * Default.
     *
     * @return AppResponse
     */
    #[Route]
    public function default(): AppResponse
    {
        return new AppResponse();
    }
}
