<header>
    <h2>Товары</h2>
</header>
<main>
    <div id="main-div">
        <section class="product-forms">
            <!-- <span>Изменение изображения товара</span> -->
            <?php
            if (isset($_GET["act"]) && $_GET["act"] == "edit") {
                $q_prods = DBQuery(" SELECT * FROM `products` WHERE `id`='$_GET[id]' ");
                $prod = mysqli_fetch_assoc($q_prods);
                ?>
                <form class="form-change" action="processor.php" method="post" enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-sect">
                            <h2>Изменить товар</h2>
                            <input type="hidden" name="prod_id" value="<?= $prod['id'] ?>">

                            <div class="form-group-container">
                                <div class="form-group">
                                    <label for="">бренд</label>
                                    <input type="text" name="brand" id="brand" value="<?= $prod['brand'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">товар</label>
                                    <input type="text" name="name" id="name" value="<?= $prod['model'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">категория</label>
                                <select name="category_id">
                                    <?php
                                        $select_category = DBQuery("SELECT * FROM `cats`");
                                        while ($category = mysqli_fetch_assoc($select_category)) {
                                            if ($category['id'] == $prod['category_id']) {
                                                
                                                echo '<option value="' . $category['id'] . '" selected>' . $category['name'] . '</option>';
                                            } else {
                                                echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">описание</label>
                                <textarea type="text" name="description"
                                    id="description"><?= $prod['description'] ?></textarea>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group">
                                    <label for="">ОЗУ</label>
                                    <input type="text" name="RAM" id="RAM" value="<?= $prod['RAM'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">диск</label>
                                    <input type="text" name="disc" id="disc" value="<?= $prod['disc'] ?>">
                                </div>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group">
                                    <label for="">процессор</label>
                                    <input type="text" name="processor" id="processor" value="<?= $prod['processor'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">батарея</label>
                                    <input type="text" name="battery" id="battery" value="<?= $prod['battery'] ?>">
                                </div>
                            </div>
                        </div>

                        <?php
                        $prod_scr = json_decode($prod['screen'], true) ?: ['diagonal' => '', 'technology' => '', 'rate' => '', 'features' => ''];
                        ?>
                        <div class="form-sect">
                            <h5>Экран</h5>
                            <div style="overflow-wrap: break-word; font-size: 11px">
                                <?= $prod['screen']; ?>
                            </div>
                            <div class="form-group-four">
                                <div>
                                    <label for="">диагональ</label>
                                    <input type="text" name="scr_inp_diagonal" id="scr_inp_diagonal"
                                        value="<?= $prod_scr['diagonal'] ?>">
                                </div>
                                <div>
                                    <label for="">технология</label>
                                    <input type="text" name="scr_inp_technology" id="scr_inp_technology"
                                        value="<?= $prod_scr['technology'] ?>">
                                </div>
                                <div>
                                    <label for="">кадры</label>
                                    <input type="text" name="scr_inp_rate" id="scr_inp_rate"
                                        value="<?= $prod_scr['rate'] ?>">
                                </div>
                                <div>
                                    <label for="">функции</label>
                                    <input type="text" name="scr_inp_features" id="scr_inp_features"
                                        value="<?= $prod_scr['features'] ?>">
                                </div>
                            </div>




                            <?php
                            $prod_cam = json_decode($prod['camera'], true) ?: ['main' => '', 'wide' => '', 'telephoto' => '', 'macro' => ''];
                            ?>

                            <h5>Камера</h5>
                            <div style="overflow-wrap: break-word; font-size: 11px">
                                <?= $prod['camera']; ?>
                            </div>
                            <div class="form-group-four">
                                <div>
                                    <label for="">main</label>
                                    <input type="text" name="cam_inp_main" id="cam_inp_main"
                                        value="<?= $prod_cam['main'] ?>">
                                </div>
                                <div>
                                    <label for="">wide</label>
                                    <input type="text" name="cam_inp_wide" id="cam_inp_wide"
                                        value="<?= $prod_cam['wide'] ?>">
                                </div>
                                <div>
                                    <label for="">telephoto</label>
                                    <input type="text" name="cam_inp_telephoto" id="cam_inp_telephoto"
                                        value="<?= $prod_cam['telephoto'] ?>">
                                </div>
                                <div>
                                    <label for="">macro</label>
                                    <input type="text" name="cam_inp_macro" id="cam_inp_macro"
                                        value="<?= $prod_cam['macro'] ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">цена</label>
                                <input type="number" name="price" id="price" value="<?= $prod['price'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="">изображение</label>
                                <span><img src="<?= URL_UPLOADS . $prod['img'] ?>"></span>
                                <input type="file" name="file" id="img">
                            </div>
                        </div>
                    </div>
                    <button class="change_product" type="submit" name="prod_upd" value="update">Сохранить изменения</button>
                </form>
            <?php } else { ?>

                <form action="processor.php" method="post" enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-sect">
                            <h2>Добавить товар</h2>
                            <!-- <select name="prod_id">
                        <option value="">Выберите товар</option>
                        <?php
                        // $q_prods = DBQuery(" SELECT * FROM `products` ");
                        // while ($prod = mysqli_fetch_assoc($q_prods)) {
                        //     echo '<option value="' . $prod["id"] . '">' . $prod["name"] . '</option>';
                        // }
                        ?>
                    </select> -->
                            <!-- <label for="">Добавление id</label> -->
                            <!-- <input type="hidden" name="prod_id"> -->
                            <div class="form-group-container">
                                <div class="form-group">
                                    <label for="">бренд</label>
                                    <input type="text" name="brand">
                                </div>

                                <div class="form-group">
                                    <label for="">товар</label>
                                    <input type="text" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">категория</label>
                                <select name="category_id">
                                    <?php
                                        $select_category = DBQuery("SELECT * FROM `cats`");
                                        while ($category = mysqli_fetch_assoc($select_category)) {
                                            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">описание</label>
                                <textarea type="text" name="description"></textarea>
                            </div>

                            <div class="form-group-container">
                                <div class="form-group">
                                    <label for="">ОЗУ</label>
                                    <input type="text" name="RAM">
                                </div>
                                <div class="form-group">
                                    <label for="">диск</label>
                                    <input type="text" name="disc">
                                </div>
                            </div>
                            <div class="form-group-container">
                                <div class="form-group">
                                    <label for="">процессор</label>
                                    <input type="text" name="processor">
                                </div>
                                <div class="form-group">
                                    <label for="">батарея</label>
                                    <input type="text" name="battery">
                                </div>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                        <label for="">экран</label>
                        <input type="text" name="screen">
                    </div> -->
                        <div class="form-sect">
                            <h5>Экран</h5>
                            <div id="add-product-form-screen" class="form-group-four">
                                <div>
                                    <label for="">диагональ</label>
                                    <input type="text" name="scr_inp_diagonal" id="scr_inp_diagonal">
                                </div>
                                <div>
                                    <label for="">технология</label>
                                    <input type="text" name="scr_inp_technology" id="scr_inp_technology">
                                </div>
                                <div>
                                    <label for="">кадры</label>
                                    <input type="text" name="scr_inp_rate" id="scr_inp_rate">
                                </div>
                                <div>
                                    <label for="">функции</label>
                                    <input type="text" name="scr_inp_features" id="scr_inp_features">
                                </div>
                            </div>



                            <h5>Камера</h5>
                            <div class="form-group-four">
                                <div>
                                    <label for="">основная/широкоугольная</label>
                                    <input type="text" name="cam_inp_main" id="cam_inp_main">
                                </div>
                                <div>
                                    <label for="">ультраширокоугольная</label>
                                    <input type="text" name="cam_inp_wide" id="cam_inp_wide">
                                </div>
                                <div>
                                    <label for="">телеобъектив</label>
                                    <input type="text" name="cam_inp_telephoto" id="cam_inp_telephoto">
                                </div>
                                <div>
                                    <label for="">макро</label>
                                    <input type="text" name="cam_inp_macro" id="cam_inp_macro">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">цена</label>
                                <input type="number" name="price">
                            </div>

                            <div class="form-group">
                                <label for="">изображение</label>
                                <input type="file" name="file" id="img">
                            </div>
                        </div>
                    </div>
                    <button class="add_product" type="submit" name="prod_add">Добавить</button>
                </form>
            <?php } ?>
        </section>


        <?php
        // $s = DBQuery(" SELECT * FROM `products`");
        if (isset($_GET['cat'])) {

            $cat = DBQuery("SELECT * FROM `cats` WHERE `alias`='$_GET[cat]'");
            $cat = mysqli_fetch_assoc($cat);

            $s = DBQuery("SELECT * FROM `products` WHERE `category_id`='{$cat['id']}'");

        } else {

            $s = DBQuery("SELECT * FROM `products`");

        }
        echo '<div class="main-table">
            <section class="product-table">
            <table border="1">
             <tr>
                <th>id</th>
                <th>img</th>
                 <th>brand</th>
                 <th>category</th>
                 <th>name</th>
                 <th>description</th>
                 <th>processor</th>

                 <th>memory</th>
                 <th>screen</th>
                 <th>camera</th>
                 <th>battery</th>
                 
                 <th>price</th>
                 <th>Действие</th>
             </tr>';
        function fs_json_print($key)
        {
            $html = '';
            if (!empty($key) and $key !== null) {
                if (is_array(json_decode($key, true))) {
                    foreach (json_decode($key, true) as $i_k => $i_v) {
                        if (is_array($i_v)) {
                            $html .= '<b>' . $i_k . '</b>: ';
                            foreach ($i_v as $i_v_v) {
                                $html .= $i_v_v . '; ';
                            }
                        } else {
                            $html .= '<b>' . $i_k . '</b>:' . $i_v . ' <br>';
                        }
                    }
                }
            } else {
                $html .= 'нет данных';
            }
            return $html;
        }
        while ($p = mysqli_fetch_assoc($s)) {
            $cat = DBQuery("SELECT * FROM `cats` WHERE `id`='{$p['category_id']}'");
            $category = mysqli_fetch_assoc($cat);

            // echo $category['name'];
            if ($p["img"] == '') {
                $p_img_td = '<td> <img src="' . URL_UPLOADS . 'shablon_tel.png"> </td>';
            } else {
                $p_img_td = '<td> <img src=" ' . URL_UPLOADS . $p['img'] . '"> </td>';
            }
            echo '<tr class="product-row">
                    <td class="prod_id">' . $p['id'] . '</td>
                    ' . $p_img_td . '
                    <td class="brand">' . $p['brand'] . '</td>
                    <td class="category_id">' . $category['name'] . '</td>
                    <td class="model">' . $p['model'] . '</td>
                    <td class="description">' . $p['description'] . '</td>
                    <td class="processor">' . $p['processor'] . '</td>';


            echo '<td class="memory">' . $p['RAM'] . 'GB<br>' . $p['disc'] . 'GB</td>';
            //echo '<td class="screen">' . $p['diagonal'] . $p['technology'] . $p['rate'] . $p['diagonal'] . '</td>';
            echo '<td class="screen">' . fs_json_print($p['screen']) . '</td>

                    <td class="camera">' . fs_json_print($p['camera']) . '</td>
                    <td class="battery">' . $p['battery'] . '</td>';

            echo '<td class="price">' . $p['price'] . '</td>';


            // <a href="index.php?mod=products&act=edit&id=1' . $p["id"] . '">
            echo '<td>
                    <a href="index.php?mod=products&act=edit&id=' . $p["id"] . '"><button class="edith-product">Изменить</button></a>
                    <form class="delete-prod-form" action="back.php" method="post">
                    <input type="hidden" name="prod_id" value="' . $p['id'] . '">
                        <button class="delete-product" type="submit" name="prod_del" value="delete">Удалить</button>
                    </form>
                </td>
                </tr>';
        }
        echo '</table>
            </section>
            </div>';
        ?>
        <!-- admin/index.php?mod=products&act=edit&id=1 -->
        <script>
            D.querySelectorAll(".delete-prod-form").forEach(form => {
                form.addEventListener('submit', function (e) {
                    if (!confirm('Вы уверены, что хотите удалить товар?')) {
                        e.preventDefault();
                    }
                })
            });
            D.addEventListener("click", (e) => {
                let et = e.target;
                if (et.closest(".delete-product")) {
                    confirm()
                }

                if (et.closest(".edith-product")) {
                    // et.closest(".edith-product").classList.toggle("edith-product2");

                    const row = e.target.closest(".product-row");

                    document.getElementById("prod_id").value =
                        row.querySelector(".prod_id").textContent;

                    document.getElementById("brand").value =
                        row.querySelector(".brand").textContent;

                    document.getElementById("model").value =
                        row.querySelector(".model").textContent;

                    // document.getElementById("category_id").value =
                    //     row.querySelector(".category_id").textContent;

                    document.getElementById("description").value =
                        row.querySelector(".description").textContent;


                    document.getElementById("memory").value =
                        row.querySelector(".memory").textContent;
                    document.getElementById("screen").value =
                        row.querySelector(".screen").textContent;
                    document.getElementById("processor").value =
                        row.querySelector(".processor").textContent;
                    document.getElementById("camera").value =
                        row.querySelector(".camera").textContent;
                    document.getElementById("battery").value =
                        row.querySelector(".battery").textContent;
                    // document.getElementById("img").value =
                    //     row.querySelector(".img").textContent;

                    document.getElementById("price").value =
                        row.querySelector(".price").textContent;
                }

                // if (et.closest(".add_product")) {

                // }
            })
        </script>
        <?php
                    $select_category = DBQuery("SELECT * FROM `cats`");

                    while ($category = mysqli_fetch_assoc($select_category)) {
                        echo '<tr>
                        <td>' . $category['id'] . '</td>
                        <td><a href="index.php?cat=' . $category['alias'] . '">' . $category['name'] . '</a></td>
                        <td>' . $category['alias'] . '</td>
                        </tr>';
                    }
                    // echo $_GET['cat'];
                ?>
    </div>
</main>