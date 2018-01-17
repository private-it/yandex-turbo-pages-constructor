<?php
/**
 * ItemTurbo.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel;

use \PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Channel\Item\Author;
use \PrivateIT\Yandex\rss\Root\Channel\Item\Link;
use PrivateIT\Yandex\rss\Root\Channel\Item\PubDate;
use PrivateIT\Yandex\rss\Root\Channel\Item\SourceTurbo;
use PrivateIT\Yandex\rss\Root\Channel\Item\TopicTurbo;

class Item extends Element
{
    public $attributes = [
        'turbo' => true,
    ];

    public function turbo($value)
    {
        $this->setAttribute('turbo', $value);

        return $this;
    }

    public function link($value)
    {
        $this->appendChild(Link::text($value));

        return $this;
    }

    public function source($value)
    {
        $this->appendChild(SourceTurbo::text($value));

        return $this;
    }

    public function topic($value)
    {
        $this->appendChild(TopicTurbo::text($value));

        return $this;
    }

    public function pubDate($value)
    {
        $this->appendChild(PubDate::text($value));

        return $this;
    }

    public function author($value)
    {
        $this->appendChild(Author::text($value));

        return $this;
    }
}
