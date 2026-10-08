<?php
if ($_SESSION['user_role'] > 1) {
    $_SESSION['notice'] = 'Авторизуйтесь для доступа в админку';
    header("Location:" . URL_ROOT . "users.php");
}

if (isset($_POST['prod_upd'])) {
    $prod_id = $_POST['prod_id'];
    $brand = $_POST['brand'];
    $category_id = $_POST['category_id'];

    $RAM = $_POST['RAM'];
    $disc = $_POST['disc'];

    $screen = [];
    // $screen = $_POST['screen'];
    $screen['diagonal'] = $_POST['scr_inp_diagonal'];
    $screen['technology'] = $_POST['scr_inp_technology'];
    $screen['rate'] = $_POST['scr_inp_rate'];
    $screen['features'] = $_POST['scr_inp_features'];

    $screen = json_encode($screen);
    
    // $main = $_POST['main'];
    // $wide = $_POST['wide'];
    // $telephoto = $_POST['telephoto'];

    $processor = $_POST['processor'];

    $camera = [];
    $camera['main'] = $_POST['cam_inp_main'];
    $camera['wide'] = $_POST['cam_inp_wide'];
    $camera['telephoto'] = $_POST['cam_inp_telephoto'];
    $camera['macro'] = $_POST['cam_inp_macro'];
    $camera = json_encode($camera);
    $battery = $_POST['battery'];

    $name  = $_POST['name'];
    $description  = $_POST['description'];
    $price = $_POST['price'];
    // $prod_add_sql = '';

    if ($_FILES['file']['name'] !== ''){
        $new_file_name = $_FILES['file']['name'];
        $new_file_tmp_name = $_FILES['file']['tmp_name'];
        move_uploaded_file($new_file_tmp_name, DIR_UPLOADS . $new_file_name);
        $prod_img_upd = DBQuery( "UPDATE `products` SET `img` = '$new_file_name' WHERE `id`='$prod_id'");
    }

    $upd_product = DBQuery( "UPDATE `products` SET `brand` = '$brand', `model` = '$name', `category_id` = '$category_id', `description` = '$description', `RAM` = '$RAM',
    `disc` = '$disc', `screen` = '$screen', `processor` = '$processor', `camera` = '$camera', `battery` = '$battery', `price` = '$price' WHERE `id`='$prod_id'" );
}

if (isset($_POST['prod_add'])) {
    // print_r($_POST);
    // $prod_id = $_POST['prod_id'];
    $brand = $_POST['brand'];
    $category_id = $_POST['category_id'];

    // $memory = $_POST['memory'];
    // $screen = $_POST['screen'];

    $screen = [];
    $screen['diagonal'] = $_POST['scr_inp_diagonal'];
    $screen['technology'] = $_POST['scr_inp_technology'];
    $screen['rate'] = $_POST['scr_inp_rate'];
    $screen['features'] = $_POST['scr_inp_features'];

    $screen = json_encode($screen);

    $processor = $_POST['processor'];

    $camera = [];
    $camera['main'] = $_POST['cam_inp_main'];
    $camera['wide'] = $_POST['cam_inp_wide'];
    $camera['telephoto'] = $_POST['cam_inp_telephoto'];
    $camera['macro'] = $_POST['cam_inp_macro'];
    $camera = json_encode($camera);

    $battery = $_POST['battery'];

    $name  = $_POST['name'];
    $description  = $_POST['description'];
    
    $RAM = $_POST['RAM'];
    $disc = $_POST['disc'];
    $price = $_POST['price'];

    $new_file_name = $_FILES['file']['name'];
    $new_file_tmp_name = $_FILES['file']['tmp_name'];
    move_uploaded_file($new_file_tmp_name, DIR_UPLOADS . $new_file_name);
    DBQuery(" INSERT INTO `products` ( `brand`, `model`, `category_id`, `description`, `RAM`, `disc`, `screen`, `processor`, `camera`, `battery`, `img`, `price`) VALUES ('$brand', '$name', '$category_id', '$description', '$RAM', '$disc', '$screen', '$processor', '$camera', '$battery', '$new_file_name', '$price') ");
}

if (isset($_POST['prod_del'])) {
    $prod_id = $_POST['prod_id'];
    DBQuery(" DELETE FROM `products` WHERE `id`='$prod_id' ");
}