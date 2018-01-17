<?php
/**
 * ImageGallery.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item\Content;

use PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Simple\Img;
use PrivateIT\Yandex\rss\Root\Simple\Tag;

class ImageGallery extends Element
{
    public $attributes = [
        'data-block' => 'gallery',
    ];

    public function tagName()
    {
        return 'div';
    }

    public function header($value)
    {
        return $this->appendChild(Tag::set('header')->setText($value));
    }

    public function images($urls)
    {
        foreach ($urls as $url) {
            $this->appendChild(Img::src($url));
        }

        return $this;
    }
}
