<?php

return [
    'api' => [
        'login' => [
            'email' => 'required|string',
            'password' => 'required|string',
        ],
        'register' => [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
        ],
        'forgot_pass' => [
            'email' => 'required'
        ],
        'reset_pass' => [
            'password' => 'required',
            'token' => 'required'
        ]
    ],
    'validation_messages' => [
        'required' => 'The :attribute field is required.',
        'string' => 'The :attribute field should be a string.',
        'unique' => 'User email already exists',
        'email' => 'The :attribute field should be a email.'
    ]
];
