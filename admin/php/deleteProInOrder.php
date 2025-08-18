<?php

include "../../resources/config/database.php";

$ID = $_GET['ID'];
$order_id = $_GET['order_id'];


$queryDelete = "DELETE FROM `ordered_products` WHERE product_id=$ID AND order_id=$order_id";
$delete = $Connect->prepare($queryDelete);
$delete->execute();

header("location:../cart.php?order_id=" . $order_id);
