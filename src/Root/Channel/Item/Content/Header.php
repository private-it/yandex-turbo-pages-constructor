<?php
/**
 * Header.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item\Content;


use PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Simple\Tag;

class Header extends Element
{
    public function h1($value)
    {
        $this->appendChild(Tag::set('h1')->setText($value));
        return $this;
    }

    public function img($value)
    {
        $this->appendChild(Image::make()->src($value));

        return $this;
    }
}
