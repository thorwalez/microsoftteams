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
 * Class Message
 * @package ThorWalez\Microsoft\Teams\Messenger
 */
class Message implements MessageInterface
{
    /** @var string $themeColor */
    private $themeColor;

    /** @var string $title */
    private $title;

    /** @var string $text */
    private $text;

    /**
     * Message constructor.
     * @param string $title
     * @param string $text
     * @param string $themeColor
     */
    public function __construct(string $title, string $text, string $themeColor = '')
    {
        $this->color = $themeColor;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getThemeColor()
    {
        return empty($this->themeColor) ? self::DEFAULT_THEME_COLOR : $this->themeColor;
    }

}