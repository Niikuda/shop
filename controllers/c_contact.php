<?php
// echo "Форма принята";
include_once("../conf.php");

print_r($_POST);

if (isset($_POST["form_id"])) {

    $name = dbfilter($_POST['name']);
    $email = dbfilter($_POST['email']);
    $phone = dbfilter($_POST['phone']);
    $title = dbfilter($_POST['title']);
    $description = dbfilter($_POST['description']);

    DBQuery("INSERT INTO `contacts` ( `name`, `email`, `phone`, `title`, `description`) VALUES ('$name', '$email', '$phone', '$title', '$description')");
}