<?php

return [
    '/' => [
        'class' => 'controllers\BookController',
        'method' => 'index'
    ],
    '/about' => [
        'class' => 'controllers\BookController',
        'method' => 'about'
    ],
    '/contact' => [
        'class' => 'controllers\BookController',
        'method' => 'contact'
    ],
    '/authors/show' => [
        'class' => 'controllers\AuthorController',
        'method' => 'show'
    ]
];
