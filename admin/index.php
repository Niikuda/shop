<?php
include_once('../conf.php');
if ($_SESSION['user_role'] > 1) {
    $_SESSION['notice'] = 'Авторизуйтесь для доступа в админку';
    header("Location:" . URL_ROOT . "login.php");
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель управления</title>
    <script src="app.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="products/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php
        $mod_name = $_GET['mod'] ?? 'dashboard' ;

        // $select_category_id = DBQuery("SELECT * FROM `products` WHERE `category_id`='1'");

        include( 'blocks/sidebar.php' );
        echo '<section id="main_section">';
        include( 'blocks/header.php' );
        include( $mod_name . '/front.php' );
        echo '</section id="main_section">';


        // $select_products = DBQuery("SELECT * FROM `products`");

        // while ($all_select_products = mysqli_fetch_assoc($select_products)) {

        //     $select_cats = DBQuery("SELECT * FROM `cats`");

        //     while ($all_id = mysqli_fetch_assoc($select_cats)) {

        //         if ($all_select_products['category_id'] == $all_id['id']) {
        //             echo $all_id['name'];
        //         }
        //     }
        // }

        $select_products = DBQuery("SELECT * FROM `products`");
        $all_select_products = mysqli_fetch_assoc($select_products);
        // "SELECT * FROM `cats` WHERE `id`='$all_select_products[category_id]' ";

        $category = DBQuery("SELECT * FROM `cats` WHERE `id`='$all_select_products[category_id]'");
        $all_category = mysqli_fetch_assoc($category);

        // echo $all_category['name'];

        if (isset($_GET['cat'])) {
            echo $_GET['cat'];
        }
    ?>
</body>
</html>