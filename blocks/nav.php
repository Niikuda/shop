<nav class="topnav">
    <div class="container">
        <a href="index.php"><img src="<?= URL_IMG ?>products/nikuda_white.svg" alt=""></a>
        <!-- <div class="style-changer">Change style</div> -->
        <div class="topnav-link">
            <ul>
                <?php
                if ( !empty( $_SESSION['login'] ) ) { 
                    echo '<li ><a href="cabinet.php">' . $_SESSION['login'] . '</a></li>';
                } else {
                ?>
                    <li><a class="login_button" href="<?= URL_ROOT ?>login.php">Войти</a></li>
                <?php } ?>
                <li><a href="front.php#about-us">О нас</a></li>
                <li><a href="front.php#product-list">Телефоны</a></li>
                <li><a href="contacts.php">Контакты</a></li>
                <li><a id="cart-amount-show" href="#"><img src="img/icons/add-to-cart.png"></a></li>
                <ul id="cart-container">
                    <!-- <li id="cart-nav">
                    <a id="cart-link" onclick="return false">Корзина: </a>
                    <span id="cart-count">0</span>
                </li> -->
                </ul>
            </ul>
        </div>
    </div>
</nav>
<div id="cart">
    <div class="full-block-cart">
        <div class="block-cart">
            <h2>Корзина</h2>
            <table>
                <thead>
                    <tr>
                        <th>Изображение</th>
                        <th>Информация</th>
                        <th>Количество</th>
                        <th>цена</th>
                        <th>Итого</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div id="total-sum-cart-cont">
                <div id="total-sum-cart"></div>
            </div>
            <section id="cart-contacts-section">
                <div class="cart-contacts">
                    <h3>Контактные данные</h3>
                    <form id="cart-contact-form" action="c_cart.php" method="post">
                        <div class="cart-form-contacts-group">
                            <div class="cart-form-contacts">
                                <input type="text" name="name" placeholder="ФИО" required>
                            </div>
                            <div class="cart-form-contacts">
                                <input type="text" name="email" placeholder="почта" required>
                            </div>
                            <div class="cart-form-contacts">
                                <input type="text" name="phone" placeholder="телефон" required>
                            </div>
                        </div>
                        <input name="form_id" type="hidden" value="1">
                        <button type="submit" class="form-contacts-button" name="contacts_go"
                            value="go">Оформить</button>
                    </form>
                </div>
            </section>
        </div>
        <div class="close_block">
            <button class="close_block_button" type="submit" name="close_block">X</button>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION["notice"])) {
    echo '<div id="div_notice">' . $_SESSION["notice"] . '</div>';
    unset($_SESSION["notice"]);
?>
    <script>
        setTimeout(() => document.getElementById('div_notice')?.remove(), 3000);
    </script>
<?php } ?>