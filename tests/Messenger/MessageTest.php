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

namespace ThorWalez\Microsoft\Teams\Tests\Messenger;

use ThorWalez\Microsoft\Teams\Messenger\Message;
use PHPUnit\Framework\TestCase;
use ThorWalez\Microsoft\Teams\Messenger\MessageInterface;

/**
 * Class MessageTest
 * @package ThorWalez\Microsoft\Teams\Tests\Messenger
 */
class MessageTest extends TestCase
{
    public function testMessageInstance()
    {

        $exampleTitle = 'Test Title';

        $exampleText = 'Test Text Content';

        $instance = new Message($exampleTitle, $exampleText);

        $this->assertEquals($exampleText, $instance->getText());

        $this->assertEquals($exampleTitle, $instance->getTitle());

        $this->assertEquals( MessageInterface::DEFAULT_THEME_COLOR, $instance->getThemeColor());

        $this->assertTrue(MessageInterface::DEFAULT_THEME_COLOR === $instance->getThemeColor());

    }

}
