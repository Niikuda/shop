<?php
include_once("../conf.php");

if (isset($_POST["cabinet-user-name-form_id"]) && $_POST["cabinet-user-name-form_id"] == 1) {
    $name = $_POST['name'];
    $login = $_POST['login'];
    print_r($_POST);
    // echo 'test';

    // DBQuery("INSERT INTO `users` ( `name`) VALUES ('$name')");

    DBQuery(" UPDATE `users` SET `name` = '$name', `login` = '$login' WHERE `login` = '" . $_SESSION['login'] . "' ");

    $_SESSION['login'] = $login;

    //     if ($_FILES['file']['name'] !== ''){
    //     $new_file_name = $_FILES['file']['name'];
    //     $new_file_tmp_name = $_FILES['file']['tmp_name'];
    //     move_uploaded_file($new_file_tmp_name, DIR_AVATAR . $new_file_name);
    //     $prod_img_upd = DBQuery( "UPDATE `users` SET `avatar` = '$new_file_name' WHERE `login` = '" . $_SESSION['login'] . "'");
    // }
}

if (isset($_POST["cabinet-user-avatar-form_id"]) && $_POST["cabinet-user-avatar-form_id"] == 1) {
    // $avatar = $_POST['avatar'];
    $new_file_name = $_FILES['avatar']['name'];
    $new_file_tmp_name = $_FILES['avatar']['tmp_name'];
    move_uploaded_file($new_file_tmp_name, DIR_AVATAR . $new_file_name);
    print_r($_POST);

    DBQuery(" UPDATE `users` SET `avatar` = '$new_file_name' WHERE `login` = '" . $_SESSION['login'] . "' ");
}

if (isset($_POST["cabinet-user-password-form_id"]) && $_POST["cabinet-user-password-form_id"] == 1) {
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $h_pass = password_hash($password, PASSWORD_DEFAULT);
    print_r($_POST);

    DBQuery(" UPDATE `users` SET `password` = '$h_pass' WHERE `login` = '" . $_SESSION['login'] . "' ");
}


header( 'Location: ' . $_SERVER['HTTP_REFERER'] );

?>