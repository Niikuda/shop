<?php
include_once('conf.php');
// include_once( DIR_BLOCKS . 'phones.php');
echo PAGE_HEAD;


?>
<title>Home</title>
</head>

<body>
    <?php
    // echo $_SESSION['user_role'];
    include_once(DIR_BLOCKS . 'nav.php');
    // echo $_SESSION["login"];


    ?>

    <main>
        <section id="products">
            <div class="container">
                <!-- <form action="" method="post">
            <select name="brand">
                <?php
                foreach ($phones as $k1 => $brand1) {
                    $k1_sel = $_POST['brand'] == $k1 ? 'selected' : '';
                    echo '<option value="' . $k1 . '" ' . $k1_sel . '>' . $k1 . '</option>';
                }
                ?>
            </select>
            <input name="fio" type="text">
            <button type="submit">Отсортировать</button>
        </form> -->
                <form id="search-form" action="" method="GET">
                    <input type="text" name="search" placeholder="Название телефона">
                    <button type="submit">Найти</button>
                </form>

                <h1>Товары</h1>

                <div id="product-list">
                    <?php
                        $search = $_GET['search'];
                        // echo $search;
                        if ($search == '') {
                            $q_prods = DBQuery("SELECT * FROM products");
                        } else {
                            $q_prods = DBQuery("SELECT * FROM products WHERE model LIKE '%$search%'");
                        }
                        $found = false;
                        // $q_prods = DBQuery(" SELECT * FROM `products` ");
                        while ($prod = mysqli_fetch_assoc($q_prods)) {
                            $found = true;
                            echo '<div class="product">
                        <a href="product.php?id=' . $prod['id'] . ' "> <h2> ' . $prod['model'] . ' </h2> </a>';
                            echo '<div class="product_img_label">
                        <img src="' . URL_UPLOADS . $prod['img'] . '"alt="' . $prod['model'] . '"class="img1">
                        </div>';



                            echo '<div class="price_buy" data-id="' . $prod['id'] . '">
                        <h5><b>Цена</b>:' . $prod['price'] . '$</h5>
                        <button class="buy_product" type="submit" name="buy_product">Купить</button>
                        </div>';
                            echo '</div>';
                        }
                        if ($found == false) {
                            echo "Товары не найдены";
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php include DIR_ROOT . 'blocks/footer.php' ?>

</body>

</html>

<!-- перенести shopхо -->