<?php

/**
 * This is where to define constant variables
 */

return [
    'widget' => [
        'basic' => [
            'display-name' => 'Basic Layout',
            'model' => 'App\Modules\Widgets\Basic',
            'url' => 'basic/module',
            'route-controller' => 'Backend\Modules\Widgets\BasicController'
        ],
        'portfolio-style-1' => [
            'display-name' => 'Portfolio Style 1',
            'model' => 'App\Modules\Widgets\PortfolioStyle1',
            'url' => 'portfolio-style-1/module',
            'route-controller' => 'Backend\Modules\Widgets\PortfolioStyle1Controller',
            'route-custom' => [
                [
                    'url' => 'module/portfolio-style-1/store-item',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle1Controller@storeItem',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/portfolio-style-1/update-item',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle1Controller@updateItem',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/portfolio-style-1/delete-item/{id}',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle1Controller@deleteItem',
                    'type' => 'delete'
                ]
            ]
        ],
        'portfolio-style-2' => [
            'display-name' => 'Portfolio Style 2',
            'model' => 'App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2',
            'url' => 'portfolio-style-2/module',
            'route-controller' => 'Backend\Modules\Widgets\PortfolioStyle2Controller',
            'route-custom' => [
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/create-item',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@createItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/store-item',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@storeItem',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/item/{id}/edit',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@editItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/item/{id}',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@updateItem',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/delete-item/{id}',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@deleteItem',
                    'type' => 'delete'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/category',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@showCategory',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/category',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@storeCategory',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/category/{id}',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@updateCategory',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/portfolio-style-2/category/{id}',
                    'action' => 'Backend\Modules\Widgets\PortfolioStyle2Controller@deleteCategory',
                    'type' => 'delete'
                ],
            ]
        ]
    ]
];