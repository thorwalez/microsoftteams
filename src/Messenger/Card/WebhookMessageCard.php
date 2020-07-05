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

namespace ThorWalez\Microsoft\Teams\Messenger\Card;

use ThorWalez\Microsoft\Teams\Messenger\MessageInterface;

/**
 * Class WebhookMessageCard
 * @package ThorWalez\Microsoft\Teams\Messenger\Card
 */
class WebhookMessageCard extends AbstractMessageCard implements MessageCardInterface
{
    /**
     * WebhookMessageCard constructor.
     * @param MessageInterface $message
     */
    public function __construct(MessageInterface $message)
    {
        $this->data = [
            "@context" => "http://schema.org/extensions",
            "@type" => "MessageCard",
            "themeColor" => !empty($message->getThemeColor()) ? $message->getThemeColor() : "0072C6",
            "title" => $message->getTitle(),
            "text" => $message->getText(),
        ];
    }

}