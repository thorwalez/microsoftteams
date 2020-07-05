<?php
/**
 * Copyright (c) 2020.
 * Created By
 * @author Mike Hartl
 * @copyright 2020  Mike Hartl All rights reserved
 * @license The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 5.7.2020
 * @version 0.0.1
 */

namespace ThorWalez\Microsoft\Teams\Connector;

use ThorWalez\Microsoft\Teams\Exception\CurlConnectorErrorException;
use ThorWalez\Microsoft\Teams\Messenger\Card\MessageCardInterface;

/**
 * Interface ConnectorInterface
 * @package ThorWalez\Microsoft\Teams\Connector
 */
interface ConnectorInterface
{
    /**
     * @param MessageCardInterface $messageCard
     * @throws CurlConnectorErrorException
     */
    public function send(MessageCardInterface $messageCard);
}