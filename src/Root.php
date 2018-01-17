<?php
/**
 * RSS.php.
 */

namespace PrivateIT\Yandex\rss;

use PrivateIT\Yandex\rss\Root\Channel;
use DOMDocument;
use DOMElement;

class Root extends Element
{
    public $attributes = [
        'xmlns:yandex' => "http://news.yandex.ru",
        'xmlns:media'  => "http://search.yahoo.com/mrss/",
        'xmlns:turbo'  => "http://turbo.yandex.ru",
        'version'      => '2.0',
    ];

    public function tagName()
    {
        return 'rss';
    }

    public function toXML()
    {
        $doc = new DOMDocument('1.0', 'utf-8');
        $doc->formatOutput = true;
        self::createNode($doc, $doc, $this);

        return $doc->saveXML();
    }

    /**
     * @param DOMDocument|DOMDocument $doc
     * @param DOMElement|DOMDocument  $parent
     * @param Element                 $element
     */
    private static function createNode($doc, $parent, $element)
    {
        $node = null;

        if ($element->tagName()) {
            /** @var DOMElement $node */
            $node = $parent->appendChild($doc->createElement($element->tagName(), self::escapeChars($element->text)));

            static::createNodeAttributes($doc, $node, $element);
            static::createNodeChildren($doc, $node, $element);
        }

        static::createNodeHtml($doc, $node ?? $parent, $element);
        static::createNodeCData($doc, $node ?? $parent, $element);
    }

    /**
     * @param DOMDocument $doc
     * @param DOMElement  $node
     * @param Element     $element
     */
    private static function createNodeAttributes($doc, $node, $element)
    {
        if (sizeof($element->attributes)) {
            foreach ($element->attributes as $name => $value) {
                $value = is_bool($value) ? json_encode($value) : $value;
                $node->setAttribute($name, $value);
            }
        }
    }

    /**
     * @param DOMDocument $doc
     * @param DOMElement  $node
     * @param Element     $element
     */
    private static function createNodeChildren($doc, $node, $element)
    {
        if (sizeof($element->children)) {
            foreach ($element->children as $item) {
                static::createNode($doc, $node, $item);
            }
        }
    }

    /**
     * @param DOMDocument $doc
     * @param DOMElement  $node
     * @param Element     $element
     */
    private static function createNodeHtml($doc, $node, $element)
    {

        if (sizeof($element->html)) {
            foreach ($element->html as $html) {
                $node->appendChild($doc->createTextNode($html));
            }
        }
    }

    /**
     * @param DOMDocument $doc
     * @param DOMElement  $node
     * @param Element     $element
     */
    private static function createNodeCData($doc, $node, $element)
    {
        if (sizeof($element->cdata)) {
            $cData = [];
            foreach ($element->cdata as $item) {
                $cDataDoc = new DOMDocument('1.0', 'utf-8');
                static::createNode($cDataDoc, $cDataDoc, $item);
                $cData[] = $cDataDoc->saveHTML();
            }
            $node->appendChild($doc->createCDATASection(html_entity_decode(implode('', $cData))));
        }
    }

    private static function escapeChars($text)
    {
        return htmlspecialchars($text);
    }
}
