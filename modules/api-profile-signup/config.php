<?php

return [
    '__name' => 'api-profile-signup',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/api-profile-signup.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/api-profile-signup' => ['install','update','remove'],
        'app/api-profile-signup' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'profile' => NULL
            ],
            [
                'api' => NULL
            ],
            [
                'profile-auth' => NULL
            ],
            [
                'lib-form' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ApiProfileSignup\\Controller' => [
                'type' => 'file',
                'base' => 'app/api-profile-signup/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'api' => [
            'apiProfileSignup' => [
                'path' => [
                    'value' => '/pme/signup'
                ],
                'handler' => 'ApiProfileSignup\\Controller\\Signup::register',
                'method' => 'POST'
            ]
        ]
    ],
    'libForm' => [
        'forms' => [
            'api.profile.signup' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'rules' => [
                        'required' => TRUE,
                        'empty' => FALSE,
                        'text' => 'slug',
                        'unique' => [
                            'model' => 'Profile\\Model\\Profile',
                            'field' => 'name'
                        ]
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'meter' => FALSE,
                    'rules' => [
                        'required' => TRUE,
                        'empty' => FALSE,
                        'length' => [
                            'min' => 6
                        ]
                    ]
                ],
                'fullname' => [
                    'label' => 'Fullname',
                    'type' => 'text',
                    'rules' => [
                        'required' => true,
                        'empty' => false 
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'type' => 'email',
                    'rules' => [
                        'required' => true,
                        'email' => true,
                        'unique' => [
                            'model' => 'Profile\\Model\\Profile',
                            'field' => 'email'
                        ]
                    ]
                ],
                'phone' => [
                    'label' => 'Phone',
                    'type' => 'tel',
                    'rules' => [
                        'required' => true,
                        'unique' => [
                            'model' => 'Profile\\Model\\Profile',
                            'field' => 'phone'
                        ]
                    ]
                ],
                'gender' => [
                    'label' => 'Gender',
                    'type' => 'select',
                    'rules' => [
                        'required' => true,
                        'enum' => 'profile.gender'
                    ]
                ]
            ]
        ]
    ]
];