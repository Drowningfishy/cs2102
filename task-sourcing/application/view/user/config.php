<?php
/**
 * For Development Purposes
 */
ini_set('display_errors', 'on');

//require __DIR__ . '/vendor/autoload.php';

$LS = new \Fr\LS(array(
    'db'       => array(
        'type'     => 'postgresql',
        'host'     => 'localhost',
        'port'     => 5432,
        'username' => 'postgres',
        'password' => 'postgres',
        'name'     => 'cs2102',
        'table'    => 'users',
        'columns'  => array(
        "id" => "id",
        "username" => "username",
        "password" => "password",
        "email" => "email"
        ),
    ),
    'features' => array(
        'auto_init' => true,
    ),
    'pages'    => array(
        'no_login'   => array(
            APP . 'view/user/',
            APP . 'view/user/reset.php',
            APP . 'view/user/register.php',
        ),
        'everyone'   => array(
            APP . 'view/user/status.php',
        ),
        'login_page' => APP . 'view/user/index.php',
        'home_page'  => APP . 'view/home/index.php',
    ),
));
