<?php
/**
 * Img.php.
 */

namespace PrivateIT\Yandex\rss\Root\Simple;


use PrivateIT\Yandex\rss\Element;

class Img extends Element
{
    public static function src($value)
    {
        $instance = new static();
        $instance->setAttribute('src', $value);

        return $instance;
    }
}
