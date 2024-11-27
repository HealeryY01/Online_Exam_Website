<?php
return [
    'jwt_secret' => 'your_secret_key_here',
    'jwt_expiration' => 3600, // 1 giờ
    'upload_path' => __DIR__ . '/../uploads/',
    'allowed_file_types' => ['jpg', 'jpeg', 'png', 'pdf'],
    'max_file_size' => 5242880, // 5MB
    'debug_mode' => true,
];