<?php
/**
 * Element.php.
 */

namespace PrivateIT\Yandex\rss;


use Mockery\Exception;

abstract class Element
{
    public $text = null;
    public $attributes = [];
    /**
     * @var static[]
     */
    public $children = [];
    public $cdata = [];
    public $html = [];

    public static function make()
    {
        return new static();
    }

    public static function text($value)
    {
        $instance = static::make();

        return $instance->setText($value);
    }

    public static function html($value)
    {
        $instance = static::make();
        $instance->html[] = $value;

        return $instance;
    }

    public function setText($value)
    {
        $this->text = $value;

        return $this;
    }

    public function tagName()
    {
        $name = array_reverse(explode('\\', get_called_class()))[0];

        return strtolower($name[0]) . substr($name, 1);
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    public function appendChild(Element $child)
    {
        if (!$child->tagName()) {
            throw new Exception('Not found tagName in ' . get_class($child));
        }
        $this->children[] = $child;

        return $this;
    }

    /**
     * @param Element|Element[] $items
     *
     * @return $this
     */
    public function children($items)
    {
        if (!is_array($items)) {
            $items = [$items];
        }
        foreach ($items as $item) {
            if (!empty($item)) {
                $this->appendChild($item);
            }
        }

        return $this;
    }
}
