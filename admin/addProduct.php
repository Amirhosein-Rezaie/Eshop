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

<?php include "./resources/layouts/checkAdmin.php" ?>

<body>
    <div class="container">

        <div id="Navbar"></div>

        <br>

        <form action="./php/addProduct.php" method="post" class="form-control Add-Pro-from"
            enctype="multipart/form-data">
            <div class="header">
                <h3 style="text-align: center;">محصول جدید</h3>
            </div>
            <hr>
            <br>
            <div class="namePro">
                <label for="">نام کالا</label>
                <span class="text-danger">*</span>
                <input type="text" name="namePro" id="namePro" class="form-control text-center" required
                    placeholder="نام محصول جدید">
            </div>
            <br>
            <div class="PricePro">
                <label for="">قیمت کالا</label>
                <span class="text-danger">*</span>
                <input type="number" class="form-control text-center" name="pricePro" id="pricePro" min="0" required
                    placeholder="قیمت محصول جدید بر اساس تومان">
            </div>
            <br>
            <div class="numberPro">
                <label for="">تعداد کالا</label>
                <span class="text-danger">*</span>
                <input type="number" class="form-control text-center" name="numberPro" id="numberPro" min="1" value="1"
                    required placeholder="تعداد محصول جدید">
            </div>
            <br>
            <div class="caption">
                <label for="">توضیحات کالا</label>
                <span class="text-danger">*</span>
                <textarea name="capPro" id="capPro" class="form-control text-center" required
                    placeholder="توضیحات محصول جدید"></textarea>
            </div>
            <br>
            <div class="image">
                <label for="">تصویر کالا</label>
                <span class="text-danger">*</span>
                <input multiple type="file" name="imagesPro[]" id="imagePro" class="form-control text-center" required >
            </div>
            <br>
            <hr>
            <div class="btns">
                <button type="submit" id="addNewPro" class="btn btn-primary">افزودن</button>
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
<script src="./resources/js/addproduct.js"></script>

<script src="./resources/js/navbar.js"></script>
<script src="./resources/js/footer.js"></script>



<?php if (isset($_GET['success'])) : ?>
    <?php if ($_GET['success'] == 'true') : ?>
        <script>
            Swal.fire({
                text: 'با موفقیت انجام شد :)',
                icon: 'success',
                title: 'موفقیت',
            });
        </script>
    <?php elseif ($_GET['success'] == 'false') : ?>
        <script>
            Swal.fire({
                text: 'با موفقیت انجام نشد :(',
                icon: 'error',
                title: 'انجام نشد',
            });
        </script>
    <?php endif; ?>
<?php endif; ?>