<?php include "../../resources/config/database.php"; ?>
<?php include "../../resources/classes/func.php"; ?>

<?php
$images = $_FILES['imagesPro'];
$product = $_POST;

$msg = [
    'success' => 'true',
];

# inesrt product 
$namePro = $product['namePro'];
$pricePro = $product['pricePro'];
$numberPro = $product['numberPro'];
$timePro = time();
$capPro = $product['capPro'];
$queryInsertPro =
    "INSERT INTO `products`(`ID`, `Name`, `Price`, `Number`, `Time`, `Caption`) VALUES (null,'$namePro',$pricePro,$numberPro,'$timePro','$capPro')";
$insertPro = $Connect->prepare($queryInsertPro);
$insertPro->execute();

// select the id of the product
$querySelectProID = "SELECT ID FROM products WHERE products.Name='$namePro' AND products.Price=$pricePro AND products.Number=$numberPro AND products.Time='$timePro'";
$selectID = $Connect->prepare($querySelectProID);
$selectID->execute();
$ID = $selectID->fetch(PDO::FETCH_ASSOC)['ID'];

# insert images
$names_img = $images['name'];
$tmps_img = $images['tmp_name'];
for ($i = 0; $i < count($names_img); $i++) {
    $Priority = $i + 1;
    $name_Img = pathinfo($names_img[$i], PATHINFO_FILENAME) . time() . '.' . pathinfo($names_img[$i], PATHINFO_EXTENSION);
    $tmp_Img = $tmps_img[$i];

    $queryInsertImage =
        "INSERT INTO `images`(`ID`, `name`, `Product_ID`, `Priority`) VALUES (null,'$name_Img',$ID,$Priority)";
    $insertImg = $Connect->prepare($queryInsertImage);
    $insertImg->execute();

    $flag = move_uploaded_file($tmp_Img, "../../resources/images/products/$name_Img");

    if (!$flag) {
        $msg['success'] = 'false';
        break;
    }
}
?>

<?php
$res = $msg['success'];
header("location:../addProduct.php?success=" . $res);
?>