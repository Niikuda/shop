<?php
include_once('conf.php');
echo PAGE_HEAD;
if ($_SESSION['user_role'] > 7) {
    $_SESSION['notice'] = 'Авторизуйтесь для доступа в админку';
    header("Location:" . URL_ROOT . "login.php");
}
$s = DBQuery(" SELECT * FROM `users` WHERE `login`='" . $_SESSION['login'] . "'");
$p = mysqli_fetch_assoc($s);
?>
<?php echo '<link rel="stylesheet" href="' . URL_STYLES . 'cabinet.css">'; ?>
<title>Личный Кабинет</title>
</head>

<body>
    <?php include_once(DIR_BLOCKS . 'nav.php'); ?>
    <section id="sidebar-cabinet" hidden>
        <button class="close" onclick="closePanel()">x</button>
        <div class="cabinet-user-name">
            <div>
                <h3>Обновление Профиля</h3>
                <form id="cabinet-user-name-form" action="<?= URL_CONTROLLERS ?>c_cabinet.php" method="post">
                    <div class="cabinet-user-name-form-group">
                        <div>
                            <input type="text" name="name" value="<?= $p['name'] ?>" required>
                        </div>
                        <div>
                            <input type="text" name="login" value="<?= $p['login'] ?>" required>
                        </div>
                    </div>
                    <input name="cabinet-user-name-form_id" type="hidden" value="1">
                    <button type="submit" class="cabinet-user-name-form-button" name="cabinet-user-name-form_go"
                        value="go">Сохранить</button>
                </form>
            </div>
            <div>
                <h3>Смена Пароля</h3>
                <form id="cabinet-user-password-form" action="<?= URL_CONTROLLERS ?>c_cabinet.php" method="post">
                    <div class="cabinet-user-password-form-group">
                        <div>
                            <input type="password" name="password" placeholder="Введите новый пароль" required>
                        </div>
                        <div>
                            <input type="password" name="password-confirm" placeholder="Повторите пароль" required>
                        </div>
                    </div>
                    <input name="cabinet-user-password-form_id" type="hidden" value="1">
                    <button type="submit" class="cabinet-user-password-form-button" name="cabinet-user-password-form_go"
                        value="go">Сохранить</button>
                </form>
            </div>
            <div>
                <h3>Смена Аватара</h3>
                <form id="cabinet-user-avatar-form" action="<?= URL_CONTROLLERS ?>c_cabinet.php" method="post" enctype="multipart/form-data">
                    <div class="cabinet-user-avatar-form-group">
                        <div>
                            <span><img src="<?= URL_AVATAR . $prod['img'] ?>"></span>
                            <input type="file" name="avatar" placeholder="Укажите путь к изображению" required>
                        </div>
                    </div>
                    <input name="cabinet-user-avatar-form_id" type="hidden" value="1">
                    <button type="submit" class="cabinet-user-avatar-form-button" name="cabinet-user-avatar-form_go"
                        value="go">Сохранить</button>
                </form>
            </div>
        </div>

        <div>
            <!-- <button class="sidebar-save-btn">Сохранить</button> -->
        </div>
    </section>
    <main>
        <div class="container">
            <section class="cabinet-main">
                <div class="cabinet-table">
                    <div>
                        <div>
                            <h3>Профиль</h3>
                        </div>
                        <div>
                        </div>
                        <div class="cabinet-table-btn">
                            <table border="1">
                                <?php
                                echo '<tr>
                                            <th>Аватар</th>
                                            <td class="avatar"> <img id="ava" src="' . URL_AVATAR . $p['avatar'] . '"> </td>
                                        </tr>
                                        <tr>
                                            <th>Логин</th>
                                            <td class="login">' . $p['login'] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td class="email">' . $p['email'] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Роль</th>
                                            <td class="role">' . USER_ROLES[$p['role']] . '</td>
                                        </tr>
                                        <tr>
                                            <th>Имя</th>
                                            <td class="name">' . $p['name'] . '<span id="openPanel-button"><img src="' . URL_ICONS . 'Vector.svg" alt="">Изменить</span></td>
                                        </tr>';
                                ?>
                            </table>
                        </div>
                    </div>
                    <div id="form-log-out">
                        <form action="<?= URL_CONTROLLERS ?>users.php" method="post">
                            <button class="btn-logout" type="submit" name="log_out">Выйти</button>
                        </form>
                        <!-- <form action="<?= URL_CONTROLLERS ?>users.php" method="post">
                            <button class="change-password" type="submit" name="change_password">Выйти</button>
                        </form> -->
                    </div>
                </div>
                <h1>Личный Кабинет</h1>
            </section>
        </div>
    </main>
    <?php include DIR_ROOT . 'blocks/footer.php' ?>
</body>

<script>
    const pBtn = document.getElementById('openPanel-button')
    function openPanel() {
        document.getElementById('sidebar-cabinet').hidden = false;
        D.querySelector('.topnav').style.marginRight = '400px';
        D.querySelector('.topnav .container').style.maxWidth = '800px';
    }

    pBtn.addEventListener('click', () => {
        openPanel();
    });

    function closePanel() {
        document.getElementById('sidebar-cabinet').hidden = true;
        document.querySelector('.topnav').style.marginRight = '0';
        document.querySelector('.topnav .container').style.maxWidth = '1200px';
    }
    el('#cabinet-user-password-form').addEventListener('submit', (e) => {
        let el_t = e.target;
        if (el_t.querySelector('input[name="password-confirm"]').value != el_t.querySelector('input[name="password"]').value) {
            C.log('Пароли не совпали');
            event.preventDefault();
        }
    })
</script>

</html>