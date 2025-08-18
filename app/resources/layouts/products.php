<?php include "../../../resources/config/database.php"; ?>
<?php include "../../../resources/classes/jdf.php" ?>

<?php 
$query =
    "SELECT products.ID as ProID , products.Name as ProName,
     products.Price as ProPrice, products.Number as ProNumber,
     products.Caption as ProCap, products.Time as ProTime, images.name as ImgName
     FROM products , images 
     WHERE products.ID = images.Product_ID AND images.Priority=1 
     ORDER BY products.Time DESC;";

$select = $Connect->prepare($query);
$select->execute();

$products = $select->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row product">
    <?php if(count($products) > 0) : ?>
        <?php foreach($products as $product) : ?>
            <div class="col-12 col-md-6 col-lg-3 post-item">
                <div class="item">
                    <div class="image-item">
                        <a href="./product.php?id=<?= $product['ProID'] ?>">
                            <img src="../resources/images/products/<?= $product['ImgName'] ?>" width="100%" alt="#">
                        </a>
                    </div>
                    <div class="caption-item">
                        <div class="title-item">
                            <a class="text-center" href="./product.php?id=<?= $product['ProID'] ?>">
                                <span><?= $product['ProName'] ?></span>
                            </a>
                        </div>
                        <hr>
                        <div class="price">
                            <span class="text-dark" style="font-size: large;"><?= $product['ProPrice'] ?></span>
                            <span class="text-secondary" style="font-size: small;">تومان</span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-primary" style="width: 100%; text-align: center;">
            محصولی موجود نیست
        </div>
    <?php endif; ?>
</div>