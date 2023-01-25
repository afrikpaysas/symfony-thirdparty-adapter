<?php

/**
 * PHP Version 8.1
 * HttpService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/HttpService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
namespace Afrikpaysas\Service;

use Afrikpaysas\Lib\Exception\GeneralNetworkException;
use Afrikpaysas\Lib\Exception\HTTPTokenException;
use Afrikpaysas\Lib\Exception\NetworkException;
use Afrikpaysas\Lib\Model\AppConstants;
use Afrikpaysas\Lib\Service\HttpService as BaseHttpService;
use Afrikpaysas\Lib\Service\ParameterService;
use \DateTime;
use \DateTimeZone;
use \DateInterval;

/**
 * HttpService.
 *
 * @category Service
 * @package  Afrikpaysas\Service
 * @author   Willy DAMTCHOU <willy.damtchou@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/afrikpaysas/symfony-thirdparty-adapter/blob/master/Service/HttpService.php
 *
 * @see https://github.com/afrikpaysas/symfony-thirdparty-adapter
 */
class HttpService implements BaseHttpService
{
    protected ParameterService $parameterService;

    /**
     * Constructor.
     *
     * @param ParameterService $parameterService parameterService
     *
     * @return void
     */
    public function __construct(ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
    }

    /**
     * GetToken.
     *
     * @param array $parameters parameters
     *
     * @return string
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     *
     * @psalm-suppress MixedAssignment
     * @psalm-suppress MixedArgument
     */
    public function getToken(array $parameters): string
    {
        $expirationSeconds = $this->parameterService->get(
            AppConstants::TOKEN_EXPIRE_IN,
            false
        );
        $tokenInDatabase = $this->parameterService->getParameter(
            AppConstants::TOKEN,
            false
        );
        $tokenExpired = false;
        $savedToken = false;

        if ($expirationSeconds && $tokenInDatabase) {
            $savedToken = true;
            $date = new DateTime(
                AppConstants::NOW,
                new DateTimeZone($_ENV['TIME_ZONE'])
            );
            $lastTokenDate = $tokenInDatabase->lastUpdatedDate->add(
                new DateInterval(
                    "PT{$expirationSeconds}S"
                )
            );
            if ($lastTokenDate->getTimestamp() <= $date->getTimestamp()) {
                $tokenExpired = true;
            }
        }

        $token = $tokenInDatabase?->value;

        if ($tokenExpired || !$savedToken) {
            $response = $this->sendGETWithBasicAuth($_ENV['API_TOKEN'], $parameters);
            $condition = !array_key_exists(AppConstants::ACCESS_TOKEN, $response) ||
                !array_key_exists(AppConstants::EXPIRE_IN, $response) ||
                !$response[AppConstants::ACCESS_TOKEN] ||
                !$response[AppConstants::EXPIRE_IN];
            if ($condition) {
                throw new HTTPTokenException($_ENV['API_TOKEN']);
            }
            $this->parameterService->setParameter(
                AppConstants::TOKEN,
                $response[AppConstants::ACCESS_TOKEN]
            );
            $this->parameterService->setParameter(
                AppConstants::TOKEN_EXPIRE_IN,
                $response[AppConstants::EXPIRE_IN]
            );
            $token = $response[AppConstants::ACCESS_TOKEN];
        }

        if (!is_string($token)) {
            throw new HTTPTokenException($_ENV['API_TOKEN']);
        }

        return $token;
    }

    /**
     * SendGETWithBasicAuth.
     *
     * @param string $url  url
     * @param array  $data data
     *
     * @return array
     *
     * @throws \Exception
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function sendGETWithBasicAuth(string $url, array $data): array
    {
        $token = base64_encode(
            $_ENV['API_USERNAME_TOKEN'].':'.$_ENV['API_PASSWORD_TOKEN']
        );

        $headers = [
            sprintf(AppConstants::HEADER_AUTH_BASIC, $token),
        ];

        return $this->sendGET($url, $data, $headers);
    }

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
    ): array {
        $token = $this->getToken($credentials);

        $headers = [
            sprintf(AppConstants::HEADER_AUTH_BEARER, $token),
            AppConstants::HEADER_CONTENT_TYPE_JSON,
        ];

        return $this->sendGET($url, $data, $headers);
    }

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
    ): array {
        $token = $this->getToken($credentials);

        $headers = [
            sprintf(AppConstants::HEADER_AUTH_BEARER, $token),
            AppConstants::HEADER_CONTENT_TYPE_JSON,
        ];

        return $this->sendPOST($url, $data, $headers);
    }

    /**
     * SendPOST.
     *
     * @param string     $url     url
     * @param array      $data    data
     * @param array|null $headers headers
     *
     * @return array
     *
     * @throws NetworkException|GeneralNetworkException
     */
    public function sendPOST(string $url, array $data, ?array $headers = null): array
    {
        $parameters = [
            CURLOPT_CUSTOMREQUEST => AppConstants::POST,
            CURLOPT_POSTFIELDS => json_encode($data),
        ];

        if ($headers) {
            $parameters[CURLOPT_HTTPHEADER] = $headers;
        }

        return $this->sendRequest($url, $parameters);
    }

    /**
     * SendGET.
     *
     * @param string     $url     url
     * @param array      $data    data
     * @param array|null $headers headers
     *
     * @return array
     *
     * @throws NetworkException|GeneralNetworkException
     */
    public function sendGET(string $url, array $data, ?array $headers = null): array
    {
        $parameters = [
            CURLOPT_URL => $url.'?'.http_build_query($data),
        ];

        if ($headers) {
            $parameters[CURLOPT_HTTPHEADER] = $headers;
        }

        return $this->sendRequest($url, $parameters);
    }

    /**
     * SendRequest.
     *
     * @param string $url    url
     * @param array  $params params
     *
     * @return array
     *
     * @throws NetworkException|GeneralNetworkException
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     *
     * @psalm-suppress PossiblyUndefinedArrayOffset
     * @psalm-suppress MixedReturnStatement
     * @psalm-suppress MixedAssignment
     * @psalm-suppress MixedInferredReturnType
     */
    protected function sendRequest(string $url, array $params): array
    {
        $result = null;

        try {
            $curl = curl_init();

            $parameters = [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => $_ENV['CURL_MAXREDIRS'],
                CURLOPT_TIMEOUT => $_ENV['CURL_TIMEOUT'],
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTPHEADER => [AppConstants::APP_JSON_HEADER],
            ];

            foreach ($params as $key => $value) {
                $parameters[$key] = $value;
            }

            curl_setopt_array(
                $curl,
                $parameters
            );

            $response = curl_exec($curl);

            $result = json_decode((string)$response, true);

            curl_close($curl);

            if (!$result || !$response) {
                $errorMessage = '';

                if (AppConstants::ENV_DEV == $_ENV['APP_ENV']) {
                    $errorMessage = $url;
                }

                throw new NetworkException($errorMessage);
            }
        } catch (\Throwable $exception) {
            if ($exception instanceof NetworkException) {
                throw $exception;
            }

            if (AppConstants::ENV_DEV == $_ENV['APP_ENV']) {
                $mes = ', file :'.
                    $exception->getFile().
                    ', line: '.$exception->getLine().
                    ', message:'.$exception->getMessage();
                throw new GeneralNetworkException($url, $mes);
            }

            throw new GeneralNetworkException($url);
        }

        return $result;
    }
}
