<?php include "../../resources/config/database.php" ?>

<?php 
session_start();

// variables
$User_ID = $_SESSION['User']['ID'];
$Product_ID = $_POST['Product_ID'];
$Quantity = $_POST['Quantity'];
$time = time();

// check the user has a cart or order curently
function ReturnOrder($User_ID , $database):int {
    $queryCheck = "SELECT * FROM orders WHERE `User_ID`=$User_ID AND `Status`='پرداخت نشده'";

    $check = $database->prepare($queryCheck);
    $check->execute();

    $ordersNumber = $check->rowCount();

    if ($ordersNumber != 0) {
        return $check->fetch(PDO::FETCH_ASSOC)['ID'];
    } else {
        return 0;
    }
}

$Order_ID = ReturnOrder($User_ID,$Connect);

// create a new cart or order
if ($Order_ID == 0) {
    
    $queryCreate = "INSERT INTO `orders`(`ID`, `user_ID`, `Status`, `Date`) VALUES (null,$User_ID,'پرداخت نشده','$time')";
    $createCart = $Connect->prepare($queryCreate);
    $createCart->execute();

    $Order_ID = ReturnOrder($User_ID , $Connect);
} else {
    // add the product to the cart
    $queryAdd = "INSERT INTO `ordered_products`(`product_ID`, `order_ID`, `quantity`, `Date`) VALUES ($Product_ID,$Order_ID,$Quantity,$time)";

    $add = $Connect->prepare($queryAdd);
    $add->execute();
}

echo 1;