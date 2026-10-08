<?php
include_once("../conf.php");

if (isset($_POST["form_id"]) && $_POST["form_id"] = 1) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cart = $_POST['cart'];

    // print_r($_POST);
    echo 'test';

    DBQuery("INSERT INTO `cart` ( `name`, `email`, `phone`, `cart`) VALUES ('$name', '$email', '$phone', '$cart')");
}