<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'draft');
define('DB_USER', 'root');
define('DB_PASS', 'root');
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, 8889, '/Applications/MAMP/tmp/mysql/mysql.sock' );

function DBQuery($query) {
    $query_res = mysqli_query($GLOBALS['db'],$query) or die('Error: '.mysqli_error($GLOBALS['db']));
    return $query_res;
}

define('SITE_NAME', 'Nikuda');


// ----- ДИРЕКТОРИИ ----- //
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define('DIR_IMG', DIR_ROOT . 'img/');
define('DIR_UPLOADS', DIR_IMG . 'uploads/');
define('DIR_AVATAR', DIR_IMG . 'avatar/');
define('DIR_BLOCKS', DIR_ROOT . 'blocks/');

// ----- URL-АДРЕСА ----- //
define('URL_ROOT', 'http://' . $_SERVER['SERVER_NAME'] . ':8890/');
define('URL_IMG', URL_ROOT . 'img/');
define('URL_ICONS', URL_IMG . 'icons/');
define('URL_UPLOADS', URL_IMG . 'uploads/');
define('URL_AVATAR', URL_IMG . 'avatar/');
define('URL_ASSETS', URL_ROOT . 'assets/');
define('URL_STYLES', URL_ASSETS . 'styles/');
define('URL_JS', URL_ASSETS . 'js/');
define('URL_CONTROLLERS', URL_ROOT . 'controllers/');
define ('URL_REF', $_SERVER['HTTP_REFERER'] ?? '');


define('USER_ROLES', array(
    0 => 'superadmin',
    1 => 'admin',
    7 => 'client', 
    9 => 'guest' ));

define('ORDER_STATUS', array(
    0 => 'ожидание',
    1 => 'принято',
    2 => 'отклонено'));

    if (empty(session_id())) {
        session_start();
        if (!isset($_SESSION['user_role'])) {
            $_SESSION['user_role'] = 9;
        }
    }
 
    define(
        'PAGE_HEAD', 
        '<!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
            <script src="' . URL_JS . 'app.js"></script>
        <link rel="stylesheet" href="' . URL_STYLES . 'style.css">');


        function dbfilter($data) {
            $data = strip_tags($data);
            $data = mysqli_real_escape_string($GLOBALS['db'], $data);
            return $data;
        }