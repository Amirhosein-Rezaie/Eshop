<?php include "../../resources/config/database.php"; ?>

<?php

$ID = $_POST['Order_ID'];

$querySum = "SELECT SUM(ordered_products.quantity * products.Price) AS OrderTotal 
FROM ordered_products,products 
WHERE ordered_products.product_ID = products.ID AND ordered_products.order_ID = $ID";

$selectSum = $Connect->prepare($querySum);
$selectSum->execute();

echo $selectSum->fetch()[0];
