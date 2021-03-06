<?php

/**
 * This is where to define module widgets
 */

return [
    'widget' => [

        /**
         * Basic module
         */
        'basic' => [
            'display-name' => 'Basic Layout',
            'model' => 'App\Modules\Widgets\Basic',
            'url' => 'basic/module',
            'route-controller' => 'Backend\Modules\Widgets\BasicController'
        ],

        /**
         * Slider module
         */
		'slider' => [
            'display-name' => 'Slider',
            'model' => 'App\Modules\Widgets\Slider\Slider',
            'url' => 'slider/module',
            'route-controller' => 'Backend\Modules\Widgets\SliderController',
            'route-custom' => [
                [
                    'url' => 'module/{moduleId}/slider/item/create',
                    'action' => 'Backend\Modules\Widgets\SliderController@createItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/slider/item',
                    'action' => 'Backend\Modules\Widgets\SliderController@storeItem',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/slider/item/{itemId}/edit',
                    'action' => 'Backend\Modules\Widgets\SliderController@editItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/slider/item/{itemId}',
                    'action' => 'Backend\Modules\Widgets\SliderController@updateItem',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/slider/item/{itemId}',
                    'action' => 'Backend\Modules\Widgets\SliderController@destroyItem',
                    'type' => 'delete'
                ]
            ]
        ],
        'contact-form' => [
            'display-name' => 'Contact Form',
            'model' => 'App\Modules\Widgets\ContactForm',
            'url' => 'contact-form/module',
            'route-controller' => 'Backend\Modules\Widgets\ContactFormController',
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

        /**
         * Portfolio style 2 module
         */
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
        ],

        /**
         * Job listing module
         */
        'job-listing' => [
            'display-name' => 'Job Listing',
            'model' => 'App\Modules\Widgets\JobListing\JobListing',
            'url' => 'job-listing/module',
            'route-controller' => 'Backend\Modules\Widgets\JobListingController',
            'route-custom' => [
                [
                    'url' => 'module/{moduleId}/job-listing/create-item',
                    'action' => 'Backend\Modules\Widgets\JobListingController@createItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/store-item',
                    'action' => 'Backend\Modules\Widgets\JobListingController@storeItem',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/item/{id}/edit',
                    'action' => 'Backend\Modules\Widgets\JobListingController@editItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/item/{id}',
                    'action' => 'Backend\Modules\Widgets\JobListingController@updateItem',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/delete-item/{id}',
                    'action' => 'Backend\Modules\Widgets\JobListingController@deleteItem',
                    'type' => 'delete'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/category',
                    'action' => 'Backend\Modules\Widgets\JobListingController@showCategory',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/category',
                    'action' => 'Backend\Modules\Widgets\JobListingController@storeCategory',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/category/{id}',
                    'action' => 'Backend\Modules\Widgets\JobListingController@updateCategory',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/job-listing/category/{id}',
                    'action' => 'Backend\Modules\Widgets\JobListingController@deleteCategory',
                    'type' => 'delete'
                ]
            ]
        ],

        /**
         * People profile module
         */
        'people-profile' => [
            'display-name' => 'People profile',
            'model' => 'App\Modules\Widgets\PeopleProfile\PeopleProfile',
            'url' => 'people-profile/module',
            'route-controller' => 'Backend\Modules\Widgets\PeopleProfileController',
            'route-custom' => [
                [
                    'url' => 'module/{moduleId}/people-profile/create-item',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@createItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/store-item',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@storeItem',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/item/{id}/edit',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@editItem',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/item/{id}',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@updateItem',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/delete-item/{id}',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@deleteItem',
                    'type' => 'delete'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/category',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@showCategory',
                    'type' => 'get'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/category',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@storeCategory',
                    'type' => 'post'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/category/{id}',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@updateCategory',
                    'type' => 'patch'
                ],
                [
                    'url' => 'module/{moduleId}/people-profile/category/{id}',
                    'action' => 'Backend\Modules\Widgets\PeopleProfileController@deleteCategory',
                    'type' => 'delete'
                ]
            ]
        ]
    ]
];