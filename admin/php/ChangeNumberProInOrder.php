<?php

include "../../resources/config/database.php";

$datas = $_POST;

$newNumber = $datas['newNumber_Product'];
$Product_ID = $datas['Product_ID'];
$Order_ID = $datas['Order_ID'];
$time = time();

$queryUpdate = "UPDATE `ordered_products` SET `quantity`=$newNumber,`Date`='$time' WHERE `product_id`=$Product_ID AND `order_id`=$Order_ID";

$update = $Connect->prepare($queryUpdate);
$update->execute();
