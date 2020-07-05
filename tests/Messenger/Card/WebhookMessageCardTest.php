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

namespace ThorWalez\Microsoft\Teams\Tests\Messenger\Card;

use PHPUnit\Framework\TestCase;
use ThorWalez\Microsoft\Teams\Messenger\Card\WebhookMessageCard;
use ThorWalez\Microsoft\Teams\Messenger\Message;

/**
 * Class WebhookMessageCardTest
 * @package ThorWalez\Microsoft\Teams\Tests\Messenger\Card
 */
class WebhookMessageCardTest extends TestCase
{
    public function testWebhookMessageCardInstance()
    {
        $exampleTitle = 'Test Title';

        $exampleText = 'Test Text Content';

        $message = new Message($exampleTitle, $exampleText);

        $instance = new WebhookMessageCard($message);

        $result = $instance->getMessage();

        $this->assertNotEmpty($result);

        $this->assertContains('title', $result);
        $this->assertContains($exampleTitle, $result);

        $this->assertContains('text', $result);
        $this->assertContains($exampleText, $result);

        $result = \json_decode($result, true);

        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('text', $result);

    }

}
