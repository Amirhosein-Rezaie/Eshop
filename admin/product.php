<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title"></title>

    <!-- css -->
    <link rel="stylesheet" href="../resources/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/assets/css/style.css">

    <!-- js -->
    <?php include "./resources/layouts/jsheader.php" ?>
</head>


<?php include "../resources/config/database.php"; ?>

<?php include "./resources/layouts/checkAdmin.php" ?>

<?php
global $Connect;

if (isset($_GET['id'])) {

    $ID = $_GET['id'];

    # select product
    $querySelectPro = "SELECT * FROM products WHERE ID=$ID";
    $selectProduct = $Connect->prepare($querySelectPro);
    $selectProduct->execute();
    $product = $selectProduct->fetch(PDO::FETCH_ASSOC);


    # select images of the product
    $querySelectImages = "SELECT * FROM images WHERE Product_ID=$ID ORDER BY `priority` ASC";
    $selectImages = $Connect->prepare($querySelectImages);
    $selectImages->execute();
    $images = $selectImages->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("no product ... ! :(");
}

?>

<body>
    <main class="container">
        <!-- navbar -->
        <div id="Navbar"></div>

        <!-- the information of the product -->
        <div id="product">
            <div class="container my-5">
                <div class="row">
                    <!-- گالری تصاویر -->
                    <div class="col-md-5">
                        <div class="row mb-3">
                            <div class="col-12">
                                <img class="form-control img-fluid main-image" style="padding: 0px;"
                                    src="../resources/images/products/<?= $images[0]['name'] ?>"
                                    alt="تصویر اصلی">
                            </div>
                        </div>
                        <div class="row product-gallery">
                            <?php for ($i = 1; $i < count($images); $i++): ?>
                                <div class="col-3">
                                    <img src="../resources/images/products/<?= $images[$i]['name'] ?>"
                                         class="img-thumbnail" alt="تصویر <?= $i + 1 ?>">
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h1 class="h3"><?= $product['Name'] ?></h1>
                        <hr>
                        <div class="price-box mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <span id="PricePro" class="fs-4 fw-bold"><?= $product['Price'] ?></span>
                                    <span class="text-muted ms-2">تومان</span>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p style="text-align: justify;">
                                    <?= $product['Caption'] ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-control" style="padding: 15px;">
                            <div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>موجودی : </span>
                                        <div style="text-align: left;">
                                            <span class="text-dark" id="NumberInDB"><?= $product['Number'] ?></span>
                                            <span style="font-size: small;" class="text-secondary">عدد</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>
                                        <span style="font-size: medium;">تعداد سفارش</span>
                                        <input type="number" name="" id="NumberPro" class="form-control" value="1"
                                            min="1">
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>قیمت کل : </span>
                                        <div style="text-align: left;">
                                            <span class="text-dark" id="TotalPrice">تعداد × قیمت</span>
                                            <span class="text-secondary" style="font-size: smaller;">تومان</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <br>
        <div id="footer"></div>
    </main>
</body>

</html>

<!-- js -->
<?php include "./resources/layouts/jsFooter.php" ?>
<script src="./resources/js/product.js"></script>