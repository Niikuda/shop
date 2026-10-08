<main>
    <section id="main-section">
        <div class="container">
            <div id="product-list">
                <?php
                // echo '<div id="product-list">';
                include_once 'phones.php';

                foreach ($phones as $k => $brand) {
                    echo '<div class="product">
            <h2>' . $k . '</h2>';
                    foreach ($brand as $e) {

                        // echo '<div>' .
                        //     $e['id'] .
                        //     '<img src="' . $e['Image'] . '"alt="' . $e['model'] . '"class="img1">' .
                        //     $e['model'] .
                        //     $e['brand'] .
                        //     '</div>' .
                
                        echo '<div class="product_img_label">
                    <img src="' . $e['Image'] . '"alt="' . $e['model'] . '"class="img1">
                     </div>';

                        echo '<ul>
                    <li><b>Память</b>:' . $e['memory'] . '</li>
                    <li><b>Экран</b>:' . $e['screen'] . '</li>
                    <li><b>Процессор</b>:' . $e['processor'] . '</li>
                    <li><b>Камера</b>:' . $e['camera'] . '</li>
                    <li><b>Аккумулятор</b>:' . $e['battery'] . '</li>
                    </ul>';

                        echo '<div>
                    <h5><b>Цена</b>:' . $e['price'] . '$</h5>
                    </div>';
                    }
                    echo '</div>';
                }
                // echo '</div>';
                ?>
            </div>
        </div>
    </section>
</main>