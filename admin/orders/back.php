<?php
if (isset($_POST['button_accept'])) {
    DBQuery(" UPDATE `cart` SET `status` = '1' WHERE `id`='$_POST[prod_id]' ");
}
if (isset($_POST['button_reject'])) {
    DBQuery(" UPDATE `cart` SET `status` = '2' WHERE `id`='$_POST[prod_id]' ");
}