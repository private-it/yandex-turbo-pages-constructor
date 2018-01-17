<?php
/**
 * TurboContent.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item;

use \PrivateIT\Yandex\rss\Element;

class ContentTurbo extends Element
{
    public function tagName()
    {
        return 'turbo:content';
    }

    public function appendChild(Element $child)
    {
        return $this->cdata[] = $child;
    }
}
