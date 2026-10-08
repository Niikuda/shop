<?php
require_once('translit.php');
if (isset($_POST['button_cats'])) {
    $name = $_POST['name'];
    $alias = transliterate($name);

    DBQuery("INSERT INTO `cats` (`name`, `alias`) VALUES ('$name', '$alias')");
}