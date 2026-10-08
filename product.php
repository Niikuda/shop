<?php
    include_once('conf.php');
    if (!$_GET['id']) {
        header("Location:" . URL_ROOT . "index.php");
    }
    $q_prods = DBQuery(" SELECT * FROM `products` WHERE `id`='$_GET[id]' ");
    $prod = mysqli_fetch_assoc($q_prods);
    $prod_fullname = $prod['brand'] . ' ' . $prod['model'];
    $prod_description = $prod['description'];
    // $prod_memory = json_decode($prod['memory'], true);
    $prod_RAM = $prod['RAM'];
    $prod_disc = $prod['disc'];
    $prod_screen = json_decode($prod['screen'], true);
    $prod_processor = $prod['processor'];
    $prod_camera = json_decode($prod['camera'], true);
    $prod_battery = $prod['battery'];
    $prod_price = $prod['price'];

    function prod_props($name, $array) {
        echo '<li>
            <b>' . $name . ':</b>
            <ul>';
                if ($array !== null) {
                    foreach ($array as $key => $value) {
                        echo '<li class="product-characteristics__spec"> <strong>' . $key . ': </strong> <span>' . $value . '</span></li>';
                    }
                }
            echo '</ul>
        </li>';
    }
    echo PAGE_HEAD;
?>
    <title> <?= $prod_fullname ?> </title>
    <link rel="stylesheet" href="styles/product.css">
    <!-- <link rel="stylesheet" href="styles/index.css"> -->
</head>

<body>
    <?php
    include_once(DIR_BLOCKS . 'nav.php');
    ?>
    <main>
        <section class="container">
        <?php

        echo '<div id="single-product">


            <div class="top-info">
                <div class="product_img_label">
                        <img src="' . URL_UPLOADS . $prod['img'] . '"alt="' . $prod['model'] . '"class="img1">
                </div>
                    
                <div class="name-des">
                    <div class="the-name">
                        <h1>' . $prod_fullname . '</h1>
                    </div>

                    <div class="des-price-buy">
                        <div class="des">
                            <span>' . $prod_description .'</span>
                        </div>
                        <div class="price-buy">
                            <h5>' . $prod_price . '$</h5>
                            <button class="buy_product" type="submit" name="buy_product">Купить</button>
                        </div>
                    </div>

                </div>
            </div>';    

            echo '<div class="feature">
                <h2>Характеристики</h2>
                <ul>';
                    // echo '<li> <b> ОЗУ: </b>' . $prod_RAM . '</li>'
                    // . '<li> <b> Диск: </b>' . $prod_disc . '</li>';
                    echo '<li> <b> Память: </b>
                        <ul>
                            <li> <strong> ОЗУ: </strong> <span>' . $prod_RAM . '</span> </li>
                            <li> <strong> Диск: </strong> <span>' . $prod_disc . '</span> </li>
                        </ul>
                    </li>';
                    prod_props('Экран',$prod_screen);
                    echo '<li> <b> Процессор: </b> <span>' . $prod_processor . '</span> </li>';
                    prod_props('Камера',$prod_camera);
                    echo '<li> <b> Батарея: </b> <span>' . $prod_battery . '</span> </li>
                </ul>
            <div>

        </div>';
        ?>
        </section>
    </main>
    <?php include_once(DIR_BLOCKS . 'footer.php'); ?>
</body>

</html>