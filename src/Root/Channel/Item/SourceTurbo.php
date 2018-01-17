<?php
/**
 * SourceTurbo.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item;


use PrivateIT\Yandex\rss\Element;

class SourceTurbo extends Element
{
    public function tagName()
    {
        return 'turbo:source';
    }
}
