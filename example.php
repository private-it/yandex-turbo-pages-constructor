<?php

include realpath(__DIR__ . '/vendor/autoload.php');

use \PrivateIT\Yandex\rss\Root;
use \PrivateIT\Yandex\rss\Root\Channel;
use \PrivateIT\Yandex\rss\Root\Channel\Item;
use \PrivateIT\Yandex\rss\Root\Channel\Item\RelatedYandex;
use \PrivateIT\Yandex\rss\Root\Channel\Item\ContentTurbo;
use \PrivateIT\Yandex\rss\Root\Channel\Item\Content\Menu;
use \PrivateIT\Yandex\rss\Root\Channel\Item\Content\Header;
use \PrivateIT\Yandex\rss\Root\Channel\Item\Content\Image;
use \PrivateIT\Yandex\rss\Root\Channel\Item\Content\ImageGallery;
use \PrivateIT\Yandex\rss\Root\Channel\Item\Content\Share;

$posts = [
    [
        'url'         => 'https://lot-of-travels.ru/places?test&page=10',
        'name'        => 'Интересные места Алтая & Монголии',
        'created_at'  => date('Y-m-d H:i:s'),
        'author'      => 'Admin of "lot-of-travels.ru"',
        'preview'     => 'https://lot-of-travels.ru/storage/2018/01/01/d0df6be87c6f953d1395865b2d646caef51eb870_medium.jpeg',
        'body'        => '<p>Туры на > Алтай и в Монголию!</p>',
        'picture'     => 'https://lot-of-travels.ru/storage/2018/01/01/cf24f2943a3ef1ab22cb4bc0e36d0a1667b6c12f_medium.jpeg',
        'attachments' => [
            ['url' => 'https://lot-of-travels.ru/storage/2018/01/08/faddb42ed3d026567f4b6ca94b66d252e3d25fe4.jpg'],
            ['url' => 'https://lot-of-travels.ru/storage/2018/01/01/32facf0864a27c65069e612fd040647ba2fa4fdd.jpg'],
            ['url' => 'https://lot-of-travels.ru/storage/2018/01/08/faddb42ed3d026567f4b6ca94b66d252e3d25fe4.jpg'],
            ['url' => 'https://lot-of-travels.ru/storage/2018/01/01/32facf0864a27c65069e612fd040647ba2fa4fdd.jpg'],
        ],
    ],
];

$rss = Root::make()
    ->children(
        Channel::make()
            ->language('ru')
            ->link('https://lot-of-travels.ru/')
            ->title('A lot of Travels Много путешествий здесь')
            ->description('Портал о путешествиях в такие места как Алтай, Монголия')
            ->children(
                array_map(
                    function ($post) {
                        return Item::make()
                            ->turbo(true)
                            ->link($post['url'])
                            ->source($post['url'])
                            ->topic($post['name'])
                            ->pubDate($post['created_at'])
                            ->author($post['author'])
                            ->children([
                                ContentTurbo::make()
                                    ->children(
                                        [
                                            Menu::make()
                                                ->items([
                                                    [
                                                        'url'  => '/',
                                                        'text' => 'Главная',
                                                    ],
                                                ]),
                                            Header::make()
                                                ->h1('Header.h1')
                                                ->img('Header.picture'),
                                            Root\Simple\Tag::html($post['body'] . 'HTML.body'),
                                            Image::make()
                                                ->src('Image.src')
                                                ->title('Image.title'),
                                            ImageGallery::make()
                                                ->header('ImageGallery.header')
                                                ->images(
                                                    array_map(
                                                        function ($image) {
                                                            return $image['url'];
                                                        },
                                                        $post['attachments']
                                                    )
                                                ),
                                            Share::make()
                                                ->make()
                                                ->vkontakte()
                                                ->facebook()
                                                ->telegram()
                                                ->odnoklassniki(),
                                        ]
                                    ),
                                RelatedYandex::make()
                                    ->type('infinity')
                                    ->links([
                                        [
                                            'text' => 'Текст ссылки',
                                            'url'  => 'https://example.com/?page=2',
                                        ],
                                    ]),
                            ]);
                    },
                    $posts
                )
            )
    );

print_r($rss->toXML());