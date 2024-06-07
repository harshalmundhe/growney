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
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'activity' => 'required|string',
        ],
        'unusualactivity_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'activity' => 'required|string',
        ],
        'newlisting_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'newlisting_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'name' => 'required|string',
            'created_on' => 'required|date',
            'investors' => 'array',
            'investors.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'category' => 'required|string',
            'network' => 'required|string',
            'max_supply' => 'required|numeric|min:1',
        ],
        'newlisting_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'name' => 'required|string',
            'created_on' => 'required|date',
            'investors' => 'array',
            'investors.*' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'category' => 'required|string',
            'network' => 'required|string',
            'max_supply' => 'required|numeric|min:1',
        ],
        'newproject_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'newproject_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'category' => 'required|string',
            'total_raise' => 'required|string',
            'round' => 'required|string',
            'investors' => 'required|string',
        ],
        'newproject_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'category' => 'required|string',
            'total_raise' => 'required|string',
            'round' => 'required|string',
            'investors' => 'required|string',
        ],
        'killerproject_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'killerproject_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'activity' => 'required|string',
        ],
        'killerproject_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'activity' => 'required|string',
        ],
        'ecosystem_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'ecosystem_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'name' => 'required|string',
        ],
        'ecosystem_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'name' => 'required|string',
        ],
        'idoieo_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'idoieo_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'backed_by' => 'required|string',
            'partners' => 'required|string',
            'coin_token_sale_partner' => 'required|string',
            'audits' => 'required|string',
        ],
        'idoieo_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'backed_by' => 'required|string',
            'partners' => 'required|string',
            'coin_token_sale_partner' => 'required|string',
            'audits' => 'required|string',
        ],
        'fundinground_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'fundinground_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'created_on' => 'required|date',
            'rounds' => 'required|numeric|min:1',
            'partners' => 'required|string',
            'investors' => 'required|numeric|min:1',
            'raised' => 'required|string',
            'category' => 'required|string',
        ],
        'fundinground_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'project' => 'required|string',
            'created_on' => 'required|date',
            'rounds' => 'required|numeric|min:1',
            'partners' => 'required|string',
            'investors' => 'required|numeric|min:1',
            'raised' => 'required|string',
            'category' => 'required|string',
        ],
        'airdrop_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'airdrop_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|string',
            'sub_heading' => 'required|string',
        ],
        'airdrop_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|string',
            'sub_heading' => 'required|string',
        ],
        'hotnews_index' => [
            'page' => 'numeric|min:1',
            'nolimit' => 'numeric|in:1',
        ],
        'hotnews_post' => [
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|string',
            'sub_heading' => 'required|string',
        ],
        'hotnews_put' => [
            'logo' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|string',
            'sub_heading' => 'required|string',
        ],
        'wishlist_post' => [
            'item_id' => 'required|numeric',
            'table_name' => 'required|string|in:air_drop,eco_system,funding_round,hot_news,ido_ieo,killer_project,new_listing,new_project,unusual_activity',
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
