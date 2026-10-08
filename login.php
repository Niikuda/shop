<?php
include_once('conf.php');
if ($_SESSION['user_role'] < 9) {
    header("Location:" . URL_ROOT . "index.php");
}
echo PAGE_HEAD;
echo '<link rel="stylesheet" href="' . URL_STYLES . 'login.css">';
?>
</head>
<body>
    <?php include_once(DIR_BLOCKS . 'nav.php'); ?>
    <header>
        <?php
        if (isset($_SESSION["login"])) {
            echo '<h2>' . $_SESSION["login"] . '</h2>';
            echo '<section>
            <form action="' . URL_CONTROLLERS . 'users.php" method="post">
            <button type="submit" name="log_out">Выйти из аккаунта</button>
            </form>
            </section>';
        }
        ?>

    </header>
    <main>

        <?php
        if (!isset($_SESSION["login"])) {
            ?>

            <script>
                D.addEventListener("click", (e) => {
                    let et = e.target;
                    if (et.closest(".reg_button")) {
                        D.querySelector(".reg_section").classList.remove("hidden");
                        D.querySelector(".reg_button_section").classList.add("hidden");
                        D.querySelector(".auth_section").classList.add("hidden");
                    }

                    if (et.closest(".reg_go_exit")) {
                        D.querySelector(".reg_section").classList.add("hidden");
                        D.querySelector(".reg_button_section").classList.remove("hidden");
                        D.querySelector(".auth_section").classList.remove("hidden");
                    }
                })
            </script>

            <?php if (isset($_GET['mod']) && $_GET['mod'] == 'reg') { ?>
                <section class="reg_section">
                    <?php
                    // if (isset($_SESSION["notice"])) {
                    //     echo "". $_SESSION["notice"] ."";
                    // }
                    ?>
                    <form action="<?= URL_CONTROLLERS ?>users.php" method="post">
                        <h1>Создание аккаунта:</h1>

                        <div class="form-group">
                            <label>login</label>
                            <input type="text" name="login">
                        </div>

                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email">
                        </div>

                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password">
                        </div>

                        <button type="submit" name="reg_go">Отправить</button>
                        <button type="button" class="reg_go_exit">Отмена</button>
                    </form>
                    <a href="users.php">Авторизация</a>
                </section>
            <?php } ?>

            <?php if (isset($_GET['mod']) && $_GET['mod'] == 'restore') { ?>
                <section class="auth_section">
                    <form action="<?= URL_CONTROLLERS ?>users.php" method="post">
                        <h1>Восстановление пароля:</h1>

                        <div class="form-group">
                            <label>Логин</label>
                            <input type="text" name="login">
                        </div>

                        <div class="form-group">
                            <label>Новый пароль</label>
                            <input type="password" name="password">
                        </div>

                        <button type="submit" name="restore_go">Отправить</button>
                    </form>
                    <a href="users.php">Авторизация</a>
                </section>
            <?php } ?>

            <?php if (empty($_GET)) { ?>
                <section class="reg_button_section">
                    <a href="?mod=reg" class="reg_button">Перейти к созданию аккаунта</a>
                </section>
                <section class="auth_section">
                    <form action="<?= URL_CONTROLLERS ?>users.php" method="post">
                        <h1>Авторизация:</h1>

                        <div class="form-group">
                            <label>login</label>
                            <input type="text" name="login">
                        </div>

                        <div class="form-group">
                            <label>password</label>
                            <input type="password" name="password">
                        </div>

                        <button type="submit" name="auth_go">Отправить</button>
                    </form>
                    <a href="?mod=restore">Восстановить пароль</a>
                </section>
            <?php } ?>

            <?php
        }
        ?>


        <?php
        $s = DBQuery(" SELECT * FROM `users`");
        echo '<table border="1">
             <tr>
                 <th>id</th>

                 <th>login</th>
                 <th>email</th>
                 <th>password</th>
             </tr>';
        while ($p = mysqli_fetch_assoc($s)) {
            echo '<tr class="product-row">
                    <td class="prod_id">' . $p['id'] . '</td>

                    <td class="login">' . $p['login'] . '</td>
                    <td class="email">' . $p['email'] . '</td>
                    <td class="password">' . $p['password'] . '</td>
                </tr>';
        }
        echo '</table>';
        ?>

    </main>
    <?php include_once(DIR_BLOCKS . 'footer.php'); 
    // print_r($_SESSION);
    ?>
</body>

</html>