<?php

include_once('../conf.php');


header('Content-Type: application/json; charset=utf-8');
$cartlist = json_decode(file_get_contents('php://input'), true);

if( !$cartlist || !is_array($cartlist) ) {
    echo json_encode( [] );
    exit;
}

$ids = array_keys( $cartlist );

if( empty($ids) ) {
    echo json_encode( [] );
    exit;
}

$ids_str = implode(',', $ids );

$get_prods = DBQuery( " SELECT * FROM `products` WHERE `id` IN ($ids_str) " );

$prods = [];

while( $row = mysqli_fetch_assoc($get_prods) ) {
    $id = $row['id'];
    $row['amount'] = (int)$cartlist[$id]['amount'];

    $prods[$id] = $row;
}

echo json_encode( $prods, JSON_UNESCAPED_UNICODE );