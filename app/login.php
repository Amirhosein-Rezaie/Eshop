<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <!-- css -->
    <?php include "./resources/layouts/css.html" ?>
    <!-- layouts css -->
    <link rel="stylesheet" href="./resources/css/signin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- js -->
    <?php include "./resources/layouts/jsHeader.html" ?>

    <script src="./resources/js/login.js"></script>
</head>

<?php session_start(); ?>
<?php (!empty($_SESSION['User'])) ? header("location:./") : null ?>

<body>
    <main class="container">
    <br>
    <!-- navbar -->
    <div id="navbar"></div>

    <br><br>

    <form action="./php/signin.php" method="post" class="form-control sign-in-form" style="padding: 25px;" enctype="multipart/form-data">
        <div class="header" style="text-align: center;">
            <h3>ورود</h3>
        </div>
        <div class="Username">
            <label for="">نام کاربری</label>
            <span class="text-danger"></span>
            <input type="text" name="" id="username" class="form-control" required>
        </div>
        <br>
        <div class="password">
            <label for="">رمز ورود</label>
            <span class="text-danger"></span>
            <div class="passInputs">
                <input id="pass" type="password" name="" id="" class="form-control" required>
                <button id="btnShow" type="button" class="form-control">
                    <i id="IcoShow" class="bi bi-eye"></i>
                    <i style="display: none;" id="IcoNotShow" class="bi bi-eye-slash"></i>
                </button>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="buttons">
            <button type="button" id="loginBtn" class="btn btn-outline-primary">ورود</button>
            <br><br>
            <button type="reset" class="btn btn-outline-danger">پاک کردن همه</button>
        </div>
    </form>

    <!-- footer -->
        <br>
        <div id="footer"></div>
    </main>
</body>
</html>

<?php include "./resources/layouts/jsFooter.html" ?>
<?php include "./resources/layouts/JSnavAndFooter.html" ?>