<?php
/**
 * PubDate.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item;


use PrivateIT\Yandex\rss\Element;

class PubDate extends Element
{
    public function setText($value)
    {
        $value = date('r', strtotime($value));

        return parent::setText($value);
    }
}
