<?php
/**
 * Copyright (c) 2020.
 * Created By
 * @author Mike Hartl
 * @copyright 2020  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 5.7.2020
 * @version 0.0.1
 */

namespace ThorWalez\Microsoft\Teams\Connector;

use ThorWalez\Microsoft\Teams\Exception\CurlConnectorErrorException;
use ThorWalez\Microsoft\Teams\Messenger\Card\MessageCardInterface;

/**
 * Class CurlConnector
 * @package ThorWalez\Microsoft\Teams\Connector
 */
class CurlConnector implements ConnectorInterface
{
    const CONTENT_TYPE = 'Content-Type: application/json';
    const CONTENT_LENGTH = 'Content-Length: ';

    /** @var false|resource $curlHandler */
    private $curlHandler;

    /**
     * CurlConnector constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->curlHandler = \curl_init($url);
        $this->setup();
    }

    /**
     * set cUrl Handler information
     */
    private function setup()
    {
        \curl_setopt($this->curlHandler, CURLOPT_CUSTOMREQUEST, 'POST');
        \curl_setopt($this->curlHandler, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($this->curlHandler, CURLOPT_TIMEOUT, 10);
        \curl_setopt($this->curlHandler, CURLOPT_CONNECTTIMEOUT, 3);

    }

    /**
     * @param MessageCardInterface $messageCard
     * @throws CurlConnectorErrorException
     */
    public function send(MessageCardInterface $messageCard)
    {
        \curl_setopt($this->curlHandler, CURLOPT_POSTFIELDS, $messageCard->getMessage());
        \curl_setopt(
            $this->curlHandler,
            CURLOPT_HTTPHEADER,
            [
                self::CONTENT_TYPE,
                self::CONTENT_LENGTH . $messageCard->getMessageLength(),
            ]
        );

        $result = \curl_exec($this->curlHandler);

        $this->isSendSuccessful($result);
        $this->closeConnection();
    }

    /**
     * @link  https://www.php.net/manual/de/function.curl-getinfo.php
     * @return string
     */
    private function getHttpCode()
    {
        return \curl_getinfo($this->curlHandler, CURLINFO_HTTP_CODE);
    }

    /**
     * Close cUrl Handler Session
     */
    private function closeConnection()
    {
        \curl_close($this->curlHandler);
    }

    /**
     * @param string $sendResult
     * @throws CurlConnectorErrorException
     */
    private function isSendSuccessful($sendResult)
    {
        if ($sendResult !== '1') {

            $errorMessage = \curl_error($this->curlHandler);
            $errorNumber = \curl_errno($this->curlHandler);

            $this->closeConnection();
            throw new CurlConnectorErrorException($errorMessage, $errorNumber);
        }
    }
}