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

namespace ThorWalez\Microsoft\Teams\Tests\Connector;

use PHPUnit\Framework\TestCase;
use ThorWalez\Microsoft\Teams\Connector\CurlConnector;
use ThorWalez\Microsoft\Teams\Exception\CurlConnectorErrorException;
use ThorWalez\Microsoft\Teams\Messenger\Card\WebhookMessageCard;
use ThorWalez\Microsoft\Teams\Messenger\Message;

/**
 * Class CurlConnectorTest
 * @package ThorWalez\Microsoft\Teams\Tests\Connector
 */
class CurlConnectorTest extends TestCase
{
    public function testCUrlConnectorInstanceError()
    {
        $this->expectException(CurlConnectorErrorException::class);

        $this->expectExceptionMessage('<url> malformed');

        $exampleTitle = 'Test Title';

        $exampleText = 'Test Text Content';

        $message = new Message($exampleTitle, $exampleText);

        $messageCard = new WebhookMessageCard($message);

        $instance = new CurlConnector('');

        $instance->send($messageCard);
    }

}
