<?php
/**
 * RelatedYandex.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item;


use PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Simple\Tag;

class RelatedYandex extends Element
{
    public function tagName()
    {
        return 'yandex:related';
    }

    public function type($value)
    {
        return $this->setAttribute('type', $value);
    }

    public function links($items)
    {
        foreach ($items as $item) {
            $link = Tag::set('link')
                ->setText($item['text'])
                ->setAttribute('url', $item['url']);
            if (isset($item['img'])) {
                $link->setAttribute('img', $item['img']);
            }
            $this->appendChild($link);
        }

        return $this;
    }
}
