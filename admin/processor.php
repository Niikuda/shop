<?php
include_once('../conf.php');
if ($_SESSION['user_role'] > 1) {
    $_SESSION['notice'] = 'Авторизуйтесь для доступа в админку';
    header("Location:" . URL_ROOT . "users.php");
}
require_once('products/back.php');
require_once('orders/back.php');
require_once('cats/back.php');



header("Location: ".URL_REF);