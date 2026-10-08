<?php
include_once("../conf.php");

if (isset($_POST['log_out'])) {
    session_destroy();
    session_start();
}

if (isset($_POST['reg_go'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $role = 7;
    $password = $_POST['password'];
    $h_pass = password_hash($password, PASSWORD_DEFAULT);
    if (empty($login) || empty($email)) {
        echo '<script>alert("error");</script>';
    } else {
        $chek_login = DBQuery(" SELECT `login` FROM `users` WHERE `login`='$login' ");
        if (mysqli_num_rows($chek_login) > 0) {
            $_SESSION["notice"] = "Такой логин уже занят";
        } else {
            DBQuery(" INSERT INTO `users` (`login`, `email`, `role`, `password`) VALUES ('$login', '$email', '$role', '$h_pass') ");
        }
    }
}

if (isset($_POST['auth_go'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $check_login = DBQuery(" SELECT * FROM `users` WHERE `login` = '$login' ");
    if (mysqli_num_rows($check_login) > 0) {
        echo 'Логин верен';
        $check_login_arr = mysqli_fetch_array($check_login);
        if (password_verify($password, $check_login_arr["password"])) {
            echo 'Пароль верен';
            $_SESSION["login"] = $login;
            $_SESSION['user_role'] = $check_login_arr['role'];
            $_SESSION['notice'] = 'Вы успешно авторизовались';
        } else {
            echo 'Пароль не верен';
        }

    } else {
        echo 'Логин не верен';
    }
}

if (isset($_POST['restore_go'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $h_pass = password_hash($password, PASSWORD_DEFAULT);
    $upd_password = DBQuery(" UPDATE `users` SET `password` = '$h_pass' WHERE `login`='$login' ");
    $_SESSION['notice'] = 'Пароль обновлен';
}

header("Location:" . URL_ROOT . "login.php");