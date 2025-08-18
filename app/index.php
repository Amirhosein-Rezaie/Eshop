<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">deafult title</title>

    <!-- css -->
    <?php include "./resources/layouts/css.html" ?>
    <!-- layouts css -->
    <link rel="stylesheet" href="./resources/css/products.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- js -->
    <?php include "./resources/layouts/jsHeader.html" ?>
</head>

<body>
    <main class="container">
        <!-- navbar -->
        <br>
        <div id="navbar"></div>

        <!-- products -->
        <br>
        <div class="title">
            <span>
                جدید ترین محصولات
            </span>
            <hr>
        </div>
        <div id="products">no product</div>

        <!-- footer -->
        <br>
        <div id="footer"></div>
    </main>
</body>

</html>

<!-- js -->
<?php include "./resources/layouts/jsFooter.html" ?>
<script src="./resources/js/script.js"></script>

<!-- layouts js -->
<?php include "./resources/layouts/JSnavAndFooter.html" ?>