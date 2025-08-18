<?php
print_r($_POST);
$product = $_POST;

$ID = $_POST['IDPro'];

$images = $_FILES['imagePro'];

echo "<pre>";
print_r($_FILES);
echo "</pre>";
?>

<?php include "../../resources/config/database.php" ?>

<?php
// messahes 
$msg = [
    'success' => 'true',
];

if (!empty($images['names'][0])) {
    # edit images of the product
    // delete the old images
    $queryDeleteImages = "DELETE FROM images WHERE Product_ID=$ID";
    $deleteImages = $Connect->prepare($queryDeleteImages);
    $deleteImages->execute();

    // insert the new images
    $imageNames = $images['name'];
    $imageTmp_Names = $images['tmp_name'];

    for ($i = 0; $i < count($imageNames); $i++) {
        $Priority = $i + 1;

        $nameImage = pathinfo($imageNames[$i], PATHINFO_FILENAME) . time() . '.' . pathinfo($imageNames[$i], PATHINFO_EXTENSION);
        $tmpNameImage = $imageTmp_Names[$i];

        $queryInsertImage = "INSERT INTO `images` SET `name`='$nameImage' , `Product_ID`=$ID , `Priority`=$Priority";
        $insertImage = $Connect->prepare($queryInsertImage);
        $insertImage->execute();

        $flag = move_uploaded_file($tmpNameImage, "../../resources/images/products/$nameImage");

        if (!$flag) {
            $msg['success'] = 'false';
            break;
        }
    }
}


# edit the old product
$newName = $product['namePro'];
$newPrice = $product['pricePro'];
$newNumber = $product['numberPro'];
$newCation = $product['capPro'];
$newTime = time();

$queryEditProduct =
    "UPDATE `products` SET `Name`='$newName',`Price`=$newPrice,`Number`=$newNumber,`Time`='$newTime',`Caption`='$newCation' WHERE ID=$ID";

$editProduct = $Connect->prepare($queryEditProduct);
$editProduct->execute();


header("location:../editProduct.php?ID=$ID&success=" . $msg['success']);
