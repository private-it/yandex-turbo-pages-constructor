<?php
/**
 * Share.php.
 */

namespace PrivateIT\Yandex\rss\Root\Channel\Item\Content;


use PrivateIT\Yandex\rss\Element;

class Share extends Element
{
    public $attributes = [
        'data-block'   => 'share',
        'data-network' => '',
    ];

    public function tagName()
    {
        return 'div';
    }

    protected function addNetwork($name)
    {
        $networks = array_filter(explode(',', $this->attributes['data-network']));
        $networks[] = $name;

        return $this->setAttribute('data-network', implode(',', $networks));
    }

    public function facebook()
    {

        return $this->addNetwork('facebook');
    }

    public function google()
    {
        return $this->addNetwork('google');
    }

    public function odnoklassniki()
    {
        return $this->addNetwork('odnoklassniki');
    }

    public function telegram()
    {
        return $this->addNetwork('telegram');
    }

    public function twitter()
    {
        return $this->addNetwork('addNetwork');
    }

    public function vkontakte()
    {
        return $this->addNetwork('vkontakte');
    }
}
