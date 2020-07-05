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

use ThorWalez\Microsoft\Teams\Exception\JsonEncodeErrorException;

/**
 * Class AbstractMessageCard
 * @package ThorWalez\Microsoft\Teams\Messenger\Card
 */
abstract class AbstractMessageCard implements MessageCardInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        $jsonResult = \json_encode($this->data);

        $this->isValid($jsonResult);

        return $jsonResult;
    }

    /**
     * @inheritDoc
     */
    public function getMessageLength()
    {
        return \strlen($this->getMessage());
    }

    /**
     * @param string | false $jsonResult
     * @throws JsonEncodeErrorException
     */
    private function isValid($jsonResult)
    {
        if (\is_bool($jsonResult) && $jsonResult === false) {
            throw new JsonEncodeErrorException('JSON encode is invalid ');
        }
    }
}