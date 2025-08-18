<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">deafult title</title>

    <!-- css -->
    <?php include "./resources/layouts/css.php" ?>
    <link rel="stylesheet" href="./resources/css/addProduct.css">

    <!-- js -->
    <?php include "./resources/layouts/jsheader.php" ?>
</head>

<?php include "../resources/config/database.php"; ?>

<?php include "./resources/layouts/checkAdmin.php" ?>

<?php
$ID = $_GET['ID'];

(empty($ID)) ? header("location:./main.php") : null;

$querySelectProduct = "SELECT * FROM products WHERE products.ID=$ID";
$selectProduct = $Connect->prepare($querySelectProduct);
$selectProduct->execute();

$product = $selectProduct->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <br>
    <div class="container">
        <div id="Navbar"></div>

        <br>
        <div id="header"></div>

        <form action="./php/EditProduct.php" method="post" class="form-control Add-Pro-from"
            enctype="multipart/form-data">
            <div class="header">
                <h3 style="text-align: center;">ویرایش محصول</h3>
            </div>
            <hr>
            <br>
            <div class="namePro">
                <label for="">ID کالا</label>
                <span class="text-danger">*</span>
                <input type="text" name="IDPro" id="namePro" class="form-control text-center text-secondary" required
                    placeholder="نام جدید محصول " value="<?= $product['ID'] ?>" readonly style="font-family: cursive;">
            </div>
            <br>
            <div class="namePro">
                <label for="">نام کالا</label>
                <span class="text-danger">*</span>
                <input type="text" name="namePro" id="namePro" class="form-control text-center" required
                    placeholder="نام جدید محصول " value="<?= $product['Name'] ?>">
            </div>
            <br>
            <div class="PricePro">
                <label for="">قیمت کالا</label>
                <span class="text-danger">*</span>
                <input type="number" class="form-control text-center" name="pricePro" id="pricePro" min="0" required
                    placeholder="قیمت جدید محصول بر اساس تومان" value="<?= $product['Price'] ?>">
            </div>
            <br>
            <div class="numberPro">
                <label for="">تعداد کالا</label>
                <span class="text-danger">*</span>
                <input type="number" class="form-control text-center" name="numberPro" id="numberPro" min="1"
                    required placeholder="تعداد جدید محصول " value="<?= $product['Number'] ?>">
            </div>
            <br>
            <div class="caption">
                <label for="">توضیحات کالا</label>
                <span class="text-danger">*</span>
                <textarea name="capPro" id="capPro" class="form-control text-center" required
                    placeholder="توضیحات جدید محصول"><?= $product['Caption'] ?></textarea>
            </div>
            <br>
            <div class="image">
                <label for="">تصویر کالا</label>
                <input type="file" name="imagePro[]" id="imagePro" class="form-control text-center" multiple>
            </div>
            <br>
            <hr>
            <div class="btns">
                <button type="submit" id="addNewPro" class="btn btn-primary">ویرایش</button>
                <br><br>
                <button type="reset" class="btn btn-outline-dark">پاک کردن</button>
            </div>
        </form>
        <br><br><br>
    </div>
</body>

</html>

<!-- js -->
<?php include "./resources/layouts/jsFooter.php" ?>

<script src="./resources/js/Editproduct.js"></script>

<script src="./resources/js/navbar.js"></script>
<script src="./resources/js/footer.js"></script>

<?php if (isset($_GET['success']) and $_GET['success'] == "true") : ?>
    <script>
        Swal.fire({
            text: 'با موفقیت انجام شد ... !',
            icon: 'success',
            title: 'Successfully',
        });
    </script>
<?php elseif (isset($_GET['success']) and $_GET['success'] == "false") : ?>
    <script>
        Swal.fire({
            text: 'با موفقیت انجام نشد ... !',
            icon: 'error',
            title: 'Error',
        });
    </script>
<?php endif; ?>