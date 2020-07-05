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

namespace ThorWalez\Microsoft\Teams\Messenger;

/**
 * Interface MessageInterface
 * @package ThorWalez\Microsoft\Teams\Messenger
 */
interface MessageInterface
{
    const DEFAULT_THEME_COLOR = '0072C6';

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getText();

    /**
     * @return string
     */
    public function getThemeColor();
}