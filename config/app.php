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
        ],
        'unusualactivity_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'unusualactivity_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'activity' => 'string',
        ],
        'unusualactivity_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'activity' => 'string',
        ],
        'newlisting_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'newlisting_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'name' => 'string',
            'created_on' => 'date',
            'investors' => 'array',
            'investors.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'category' => 'string',
            'network' => 'string',
            'max_supply' => 'numeric|min:1',
        ],
        'newlisting_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'name' => 'string',
            'created_on' => 'date',
            'investors' => 'array',
            'investors.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'category' => 'string',
            'network' => 'string',
            'max_supply' => 'numeric|min:1',
        ],
        'newproject_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'newproject_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'category' => 'string',
            'total_raise' => 'string',
            'round' => 'string',
            'investors' => 'string',
        ],
        'newproject_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'category' => 'string',
            'total_raise' => 'string',
            'round' => 'string',
            'investors' => 'string',
        ],
        'killerproject_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'killerproject_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'activity' => 'string',
        ],
        'killerproject_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'activity' => 'string',
        ],
        'ecosystem_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'ecosystem_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'name' => 'string',
        ],
        'ecosystem_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'name' => 'string',
        ],
        'idoieo_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'idoieo_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'backed_by' => 'string',
            'partners' => 'string',
            'coin_token_sale_partner' => 'string',
            'audits' => 'string',
        ],
        'idoieo_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'backed_by' => 'string',
            'partners' => 'string',
            'coin_token_sale_partner' => 'string',
            'audits' => 'string',
        ],
        'fundinground_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'fundinground_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'created_on' => 'date',
            'rounds' => 'numeric|min:1',
            'partners' => 'string',
            'investors' => 'numeric|min:1',
            'raised' => 'string',
            'category' => 'string',
        ],
        'fundinground_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'string',
            'created_on' => 'date',
            'rounds' => 'numeric|min:1',
            'partners' => 'string',
            'investors' => 'numeric|min:1',
            'raised' => 'string',
            'category' => 'string',
        ],
        'airdrop_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'airdrop_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'string',
            'sub_heading' => 'string',
        ],
        'airdrop_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'string',
            'sub_heading' => 'string',
        ],
        'hotnews_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'hotnews_post' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'string',
            'sub_heading' => 'string',
        ],
        'hotnews_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'string',
            'sub_heading' => 'string',
        ],
        'wishlist_post' => [
            'item_id' => 'numeric',
            'table_name' => 'string|in:air_drop,eco_system,funding_round,hot_news,ido_ieo,killer_project,new_listing,new_project,unusual_activity',
        ]
    ],
    'validation_messages' => [
        'required' => 'The :attribute field is required.',
        'string' => 'The :attribute field should be a string.',
        'unique' => 'User email already exists',
        'email' => 'The :attribute field should be a email.',
        'mimes' => 'The :attribute field should be of :values',
        'max' => 'The :attribute field should be :max  kb',
        'numeric' => 'The :attribute field should be a number',
        'min' => 'The :attribute field min value should be :min',
        'in' => 'The :attribute field value should be in :values',
        'date' => 'The :attribute field should be date',
        'array' => 'The :attribute field should be array',
    ],
    'upload_dir' => [
        'air_drop' => 'airdrop',
        'eco_system' => 'ecosystem',
        'funding_round' => 'fundinground',
        'hot_news' => 'hotnews',
        'ido_ieo' => 'idoieo',
        'killer_project' => 'killerproject',
        'new_listing' => 'newlisting',
        'new_project' => 'newproject',
        'unusual_activity' => 'unusualactivity'
    ]
];
