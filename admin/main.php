<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Deafult Title</title>

    <!-- css -->
    <?php include "./resources/layouts/css.php" ?>
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/products.css">
    <link rel="stylesheet" href="./resources/css/users.css">

    <!-- js -->
    <?php include "./resources/layouts/jsheader.php" ?>
</head>

<?php include "./resources/layouts/checkAdmin.php" ?>

<body>
    <main class="container">

        <!-- navbar -->
        <div id="Navbar">navbar</div>

        <!-- users -->
        <br>
        <div class="title">
            <h3>کاربران</h3>
            <hr style="width: 100%;">
        </div>
        <div id="users">
            <div class="alert alert-primary">
                دریافت نشده ... !
            </div>
            <script src="./resources/js/users.js"></script>
        </div>

        <!-- products -->
        <div class="title">
            <br><br>
            <h3>محصولات</h3>
            <div style="text-align: left; margin-top: -43px;">
                <a class="btn btn-outline-primary" href="./addProduct.php">افزودن محصول</a>
            </div>
            <hr style="width: 100%;">
        </div>
        <div id="products">
            <div id="NotRecieved" class="alert alert-primary">
                دریافت نشده ... !
            </div>
            <script src="./resources/js/products.js"></script>
        </div>

        <!-- orders -->
        <div class="title">
            <br><br>
            <h3>سفارش ها</h3>
            <hr style="width: 100%;">
        </div>
        <div id="orders">
            <div id="NotRecieved" class="alert alert-primary">
                دریافت نشده ... !
            </div>
        </div>
        <br><br><br>
    </main>
</body>

</html>

<!-- js -->
<?php include "./resources/layouts/jsFooter.php" ?>

<script src="./resources/js/script.js"></script>
