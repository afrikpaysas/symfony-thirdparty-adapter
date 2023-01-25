<?php

/**
 * PHP Version 8.1
 * HttpService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/HttpService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Lib\Service;

use Afrikpaysas\Lib\Exception\GeneralNetworkException;
use Afrikpaysas\Lib\Exception\NetworkException;

/**
 * HttpService.
 *
 * @category Service
 * @package  Afrikpaysas\Lib\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Lib/Service/HttpService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
interface HttpService
{
    /**
     * GetToken.
     *
     * @param array $parameters parameters
     *
     * @return string
     *
     * @throws \Exception
     */
    public function getToken(array $parameters): string;

    /**
     * SendGETWithBasicAuth.
     *
     * @param string $url  url
     * @param array  $data data
     *
     * @return array
     *
     * @throws \Exception
     */
    public function sendGETWithBasicAuth(string $url, array $data): array;

    /**
     * SendGETWithToken.
     *
     * @param string $url         url
     * @param array  $data        data
     * @param array  $credentials credentials
     *
     * @return array
     *
     * @throws \Exception
     */
    public function sendGETWithToken(
        string $url,
        array $data,
        array $credentials
    ): array;

    /**
     * SendPOSTWithToken.
     *
     * @param string $url         url
     * @param array  $data        data
     * @param array  $credentials credentials
     *
     * @return array
     *
     * @throws \Exception
     */
    public function sendPOSTWithToken(
        string $url,
        array $data,
        array $credentials
    ): array;

    /**
     * SendPOST.
     *
     * @param string $url  url
     * @param array  $data data
     *
     * @return array
     *
     * @throws NetworkException|GeneralNetworkException
     */
    public function sendPOST(string $url, array $data): array;

    /**
     * SendGET.
     *
     * @param string $url  url
     * @param array  $data data
     *
     * @return array
     *
     * @throws NetworkException|GeneralNetworkException
     */
    public function sendGET(string $url, array $data): array;
}
