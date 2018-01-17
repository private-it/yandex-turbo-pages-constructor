<?php
/**
 * Chanel.php.
 */

namespace PrivateIT\Yandex\rss\Root;

use \PrivateIT\Yandex\rss\Element;
use PrivateIT\Yandex\rss\Root\Channel\Language;
use PrivateIT\Yandex\rss\Root\Channel\Link;
use PrivateIT\Yandex\rss\Root\Channel\Title;
use PrivateIT\Yandex\rss\Root\Channel\Description;
use PrivateIT\Yandex\rss\Root\Channel\AdNetworkYandex;
use PrivateIT\Yandex\rss\Root\Channel\AnalyticsYandex;

class Channel extends Element
{
    public function language($value)
    {
        $this->appendChild(Language::text($value));

        return $this;
    }

    public function link($value)
    {
        $this->appendChild(Link::text($value));

        return $this;
    }

    public function title($value)
    {
        $this->appendChild(Title::text($value));

        return $this;
    }

    public function description($value)
    {
        $this->appendChild(Description::text($value));

        return $this;
    }

    public function adNetworkYandex($value)
    {
        $this->appendChild(AdNetworkYandex::text($value));

        return $this;
    }

    public function analyticsYandex($value)
    {
        $this->appendChild(AnalyticsYandex::text($value));

        return $this;
    }
}
