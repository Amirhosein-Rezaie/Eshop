<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="./resources/css/cart.css">
    <?php include "./resources/layouts/css.php" ?>

    <!-- js -->
    <?php include "./resources/layouts/jsheader.php" ?>
</head>

<?php include "../resources/config/database.php" ?>
<?php include "../resources/classes/jdf.php" ?>

<?php include "./resources/layouts/checkAdmin.php" ?>

<?php
$id = $_GET['order_id'];

# fetch the products in that cart
$query =
    "SELECT products.ID as ProID , products.Name as ProName , products.Number as ProNumber , products.Price as ProPrice ,
       ordered_products.quantity as OrderNumber , ordered_products.Date as OrderDate
FROM products , ordered_products
WHERE products.ID=ordered_products.product_ID AND ordered_products.order_ID=$id ORDER BY ordered_products.quantity DESC";

$select = $Connect->prepare($query);
$select->execute();
$ordered_pros = $select->fetchAll(PDO::FETCH_ASSOC);

# fetch username of the user
$querySelectUsername = "SELECT users.Username FROM users , orders WHERE users.ID=orders.user_ID AND orders.ID=$id;";
$SelectUsername = $Connect->prepare($querySelectUsername);
$SelectUsername->execute();
// the username
$Username = $SelectUsername->fetch(PDO::FETCH_ASSOC)['Username'];

# fetch the informations of that cart
$querySelectOrder = "SELECT * FROM orders WHERE ID=$id";
$selectOrder = $Connect->prepare($querySelectOrder);
$selectOrder->execute();
$order = $selectOrder->fetch(mode: PDO::FETCH_ASSOC);
?>

<title><?= $Username ?> - سبد خرید</title>

<body>

<div class="container">
    <div id="Navbar"></div>
</div>

<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">سبد خرید <span><?= $Username ?></span></h4>
                <span class="text-muted"><?= count($ordered_pros) ?> کالا</span>
            </div>

            <!-- Cart Items -->
            <?php if (count($ordered_pros) > 0) : ?>
                <?php foreach ($ordered_pros as $pro) : ?>
                    <div class="cart-item p-3" id="products">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <?php
                                $pID = $pro['ProID'];
                                $queryImg = "SELECT images.Name FROM images WHERE images.product_ID=$pID";
                                $selectImg = $Connect->prepare($queryImg);
                                $selectImg->execute();
                                $img = $selectImg->fetch(PDO::FETCH_ASSOC)['Name'];
                                ?>
                                <img src="../resources/images/products/<?= $img ?>" alt="Product image"
                                     class="product-image">
                            </div>
                            <span style="display: none;"><?= $pro['ProID'] ?></span>
                            <div class="col-6">
                                <div class="mb-2">
                                    <h6 class="mb-1 fw-bold"><?= $pro['ProName'] ?></h6>
                                </div>
                                <div class="d-flex mb-2 text-primary">
                                    <span class="fw-bold ProPrice"><?= $pro['ProPrice'] ?></span>
                                    <span>تومان</span>
                                </div>
                                <div class="text-success mb-2">
                                    <span class="text-success">موجودی : </span>
                                    <span class="text-success fw-bold"><?= $pro['ProNumber'] ?></span>
                                </div>
                                <div class="text-secondary mb-2">
                                    <span>تاریخ : </span>
                                    <span class="fw-bold"><?= jdate('y/m/d', $pro['OrderDate']) ?></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php $order_id = $_GET['order_id']; ?>
                                    <?php $product_id = $pro['ProID']; ?>
                                    <a href="./php/deleteProInOrder.php?ID=<?= $pro['ProID'] ?>&order_id=<?= $order_id ?>"
                                       class="btn btn-outline-danger">حذف</a>
                                    <div class="input-group" style="width: 120px;">
                                        <form action="./php/ChangeNumberProInOrder.php?order_id=<?= $order_id ?>&product_id=<?= $product_id ?>"
                                              method="post" class="input-group">
                                            <input placeholder="<?= $pro['ProID'] ?>" max="<?= $pro['ProNumber'] ?>"
                                                   type="number" name="numberPro" value="<?= $pro['OrderNumber'] ?>"
                                                   class="form-control NumberProduct" min="1">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="text-center alert alert-primary">
                    محصولی موجود نیست ... !
                </div>
            <?php endif; ?>
            <!-- <button style="width: 100%;" class="btn btn-outline-primary">افزودن محصول</button> -->
        </div>

        <div class="col-md-4">
            <div class="summary-card p-3 mb-4">
                <h5 class="mb-3">خلاصه سفارش</h5>
                <div class="d-flex justify-content-between mb-2">
                    <span>وضعیت سبد : </span>
                    <span class="fw-bold"><?= $order['Status'] ?></span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <span>مبلغ کل </span>
                        <span class="fw-bold">(<?= count($ordered_pros) ?>)</span>
                    </div>
                    <div>
                        <span class="fw-bold TotalPrice">Total Price</span>
                        <span>تومان</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <span>مبلغ قابل پرداخت</span>
                    <div class="text-primary">
                        <span class="fw-bold TotalPrice">Total Price</span>
                        <span> تومان</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<?php include "./resources/layouts/jsFooter.php" ?>

<script src="./resources/js/cart.js"></script>
