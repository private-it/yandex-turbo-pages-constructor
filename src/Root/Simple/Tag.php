<?php
/**
 * Tag.php.
 */

namespace PrivateIT\Yandex\rss\Root\Simple;


use PrivateIT\Yandex\rss\Element;

class Tag extends Element
{
    private $_tagName;

    public function tagName()
    {
        return $this->_tagName;
    }

    public static function set($tagName)
    {
        return static::make()->setName($tagName);
    }

    public function setName($tagName)
    {
        $this->_tagName = $tagName;

        return $this;
    }
}
