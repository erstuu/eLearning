<?php

function getDatabaseConfig(): array
{
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=web_admin_php_test",
                "username" => "root",
                "password" => "root"
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=web_admin_php",
                "username" => "root",
                "password" => "root"
            ]
        ]
    ];
}
