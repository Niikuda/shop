<?php
include_once('conf.php');
echo PAGE_HEAD;
echo '<link rel="stylesheet" href="' . URL_STYLES . 'contacts.css">';
?>
    <title>Contacts</title>
</head>
<body>
    <?php 
    include_once(DIR_BLOCKS . 'nav.php');
    ?>
    <main>
        <container class="contacts-container">
        <section class="contacts-section">
            <div class="contacts-left">
                <h5>Контакты</h5>
                <?php
                echo '<div id="phone" class="contacts-p-e-a">
                    <img src="' . URL_ICONS . 'phone_icon.png" alt="">
                    0552123355
                </div>
                <div id="email" class="contacts-p-e-a">
                    <img src="' . URL_ICONS . 'email_icon.png" alt="">
                    shop@gmail.com
                </div>
                <div id="location" class="contacts-p-e-a">
                    <img src="' . URL_ICONS . 'address_icon.png" alt="">
                    г. Бишкек, ул. Юнусалиева 87, цокольный этаж
                </div>
                </div>'
                ?>
            <div class="contacts-right">
                <h5>Обратная связь</h5>
                <form id="contact-form">
                    <div class="form-contacts-group">
                        <div class="form-contacts">
                            <input type="text" name="name" placeholder="ФИО" required>
                        </div>
                        <div class="form-contacts">
                            <input type="text" name="email" placeholder="почта" required>
                        </div>
                        <div class="form-contacts">
                            <input type="text" name="phone" placeholder="телефон" required>
                        </div>
                        <div class="form-contacts">
                            <input type="text" name="title" placeholder="тема" required>
                        </div>
                    </div>
                    <textarea type="text" name="description" required></textarea>
                    <input name="form_id" type="hidden" value="1">
                    <button type="submit" class="form-contacts-button" name="contacts_go" value="go">Отправить</button>
                </form>
            </div>
        </section>
        </container>
    </main>

    <?php include DIR_ROOT . 'blocks/footer.php' ?>