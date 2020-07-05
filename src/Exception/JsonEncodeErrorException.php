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

namespace ThorWalez\Microsoft\Teams\Exception;

/**
 * Class JsonEncodeErrorException
 * @package ThorWalez\Microsoft\Teams\Exception
 */
class JsonEncodeErrorException extends \Exception
{
    /**
     * JsonEncodeErrorException constructor.
     * @param string         $message
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->message = $message;
        $this->message .= $this->errorCodeToString();
    }

    /**
     * @return string
     */
    private function errorCodeToString()
    {
        $this->code = \json_last_error();
        switch ($this->getCode()) {
            case JSON_ERROR_NONE:
                return ' - No error has occurred';
            case JSON_ERROR_DEPTH:
                return ' - The maximum stack depth has been exceeded';
            case JSON_ERROR_STATE_MISMATCH:
                return ' - Invalid or malformed JSON';
            case JSON_ERROR_CTRL_CHAR:
                return ' - Control character error, possibly incorrectly encoded';
            case JSON_ERROR_SYNTAX:
                return ' - Syntax error';
            case JSON_ERROR_UTF8:
                return ' - Malformed UTF-8 characters, possibly incorrectly encoded';
            case JSON_ERROR_RECURSION:
                return ' - One or more recursive references in the value to be encoded';
            case JSON_ERROR_INF_OR_NAN:
                return ' - One or more NAN or INF values in the value to be encoded';
            case JSON_ERROR_UNSUPPORTED_TYPE:
                return ' - A value of a type that cannot be encoded was given';
            case JSON_ERROR_INVALID_PROPERTY_NAME:
                return ' - A property name that cannot be encoded was given';
            case JSON_ERROR_UTF16:
                return ' - JSON_ERROR_UTF16';
            default:
                return ' - Unknown error';
        }
    }
}