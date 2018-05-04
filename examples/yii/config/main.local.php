<?php

return [
    'components' => [
        'db' => [

        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                [
                    'http_address' => 'elastic:changeme@elasticsearch:9200',
                ],
            ],
            'auth' => ['username' => 'elastic', 'password' => 'changeme'],
        ],
    ],
];
