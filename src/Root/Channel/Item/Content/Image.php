<?php
/**
 * Image.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item\Content;

use PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Simple\Img;
use PrivateIT\Yandex\rss\Root\Simple\Tag;

class Image extends Element
{
    public function tagName()
    {
        return 'figure';
    }

    public function src($value)
    {
        $this->appendChild(Img::src($value));

        return $this;
    }

    public function title($value)
    {
        $this->appendChild(Tag::set('figcaption')->setText($value));

        return $this;
    }
}
