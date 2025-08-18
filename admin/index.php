<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Title</title>
</head>

<!-- css -->
<link rel="stylesheet" href="../resources/assets/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="../resources/assets/css/bootstrap-icons.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../resources/assets/css/style.css">
<link rel="stylesheet" href="./resources/css/style.css">
<link rel="stylesheet" href="./resources/css/login.css">

<!-- js -->
<script src="../resources/assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="../resources/assets/js/popper.min.js"></script>
<script src="../resources/assets/js/jquery-3.7.1.js"></script>

<?php session_start(); ?>

<?php  (!empty($_SESSION['Admin'])) ? header("location:./main.php") : null ?>

<body>
    <main>
        <div class="container">
            <br><br>
            <form action="#" method="post" class="form-control login-form">
                <div class="header">
                    <h3>login</h3>
                </div>
                <div class="Username">
                    <label for="">نام کابری</label>
                    <input type="text" id="Username" name="username" class="form-control" required>
                </div>
                <br>
                <div class="password">
                    <label for="">رمز ورود</label>
                    <div class="passInputs">
                        <input id="pass" type="password" name="" class="form-control" required>
                        <button id="btnShow" type="button" class="form-control">
                            <i id="IcoShow" class="bi bi-eye"></i>
                            <i style="display: none;" id="IcoNotShow" class="bi bi-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <br>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault">مرا به خاطر بسپار</label>
                    <input class="form-check-input RMM" type="checkbox" id="flexCheckDefault">
                </div>
                <hr>
                <div class="btns">
                    <button id="btnLogin" class="btn btn-outline-primary" type="button">ورود</button>
                </div>
            </form>
        </div>
    </main>

</body>

</html>

<!-- js -->
<?php include "./resources/layouts/jsFooter.php" ?>
<script src="./resources/js/script.js"></script>
<script src="./resources/js/login.js"></script>

<!-- messages -->
<script id="msgResultFind"></script>