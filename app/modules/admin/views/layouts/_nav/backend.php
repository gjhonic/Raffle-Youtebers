<?php

use yii\helpers\Url;

return [
    'main' => [
        [
            'label' => 'Главная',
            'href' => Url::to('/admin'),
            'controller' => 'main'
        ],
        [
            'label' => 'На сайт',
            'href' => Url::to('/'),
            'controller' => 'site'
        ],
    ],
    'bases' => [
        [
            'label' => 'Пользователи',
            'href' => Url::to('/admin/user/'),
            'controller' => 'user'
        ],
        [
            'label' => 'Конкурсы',
            'href' => Url::to('/admin/raffle/'),
            'controller' => 'raffle'
        ],
        [
            'label' => 'Теги',
            'href' => Url::to('/admin/tag/'),
            'controller' => 'tag'
        ],
    ],
    'moderations' => [
        [
            'label' => 'Пользователи',
            'href' => Url::to('/admin/user-mod/'),
            'controller' => 'user-mod'
        ],
        [
            'label' => 'Конкурсы',
            'href' => Url::to('/admin/raffle-mod/'),
            'controller' => 'raffle-mod'
        ],
        [
            'label' => 'Обращения',
            'href' => Url::to('/admin/support-mod/'),
            'controller' => 'support-mod'
        ],
    ],
    'other' => [
        [
            'label' => 'Private API',
            'href' => Url::to('/api/shut'),
            'controller' => 'site'
        ],
        [
            'label' => 'Public API',
            'href' => Url::to('/api'),
            'controller' => 'site'
        ]
    ]
];