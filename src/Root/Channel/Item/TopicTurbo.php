<?php
/**
 * TopicTurbo.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item;

use \PrivateIT\Yandex\rss\Element;

class TopicTurbo extends Element
{
    public function tagName()
    {
        return 'turbo:topic';
    }
}
