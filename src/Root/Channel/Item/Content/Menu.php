<?php
/**
 * Menu.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item\Content;

use PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Simple\Tag;

class Menu extends Element
{
    public function items($items)
    {
        foreach ($items as $item) {
            $this->appendChild(
                Tag::set('a')
                    ->setText($item['text'])
                    ->setAttribute('href', $item['url'])
            );
        }

        return $this;
    }
}
