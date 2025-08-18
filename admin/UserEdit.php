<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">deafult title</title>

    <!-- css -->
    <?php include "./resources/layouts/css.php" ?>
    <link rel="stylesheet" href="./resources/css/editUser.css">

    <!-- js -->
    <?php include "./resources/layouts/jsheader.php" ?>
</head>

<?php include "./resources/layouts/checkAdmin.php" ?>

<?php include "../resources/config/database.php"; ?>
<?php
(empty($_GET)) ? header("location:./") : null;

$ID = $_GET['ID'];

$querySelectUser = "SELECT * FROM users WHERE ID=$ID";
$selectUser = $Connect->prepare($querySelectUser);
$selectUser->execute();

$user = $selectUser->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <div class="container">

        <div id="Navbar"></div>

        <br>

        <div id="header"></div>

        <form method="post" class="form-control Add-Pro-from" enctype="multipart/form-data">
            <div class="header">
                <h3 style="text-align: center;">ویرایش کاربر</h3>
            </div>
            <hr>
            <div class="username">
                <label for="">نام کاربری</label>
                <input type="text" name="" id="" class="form-control" readonly value="<?= $user['Username'] ?>">
            </div>
            <br>
            <div class="phoneNumber">
                <label for="">شماره موبایل</label>
                <input type="text" name="" id="" class="form-control" readonly value="<?= $user['Phone'] ?>">
            </div>
            <br>
            <div class="role">
                <label for="">نقش کاربر</label>
                <select name="newRole" id="newRole" class="form-select">
                    <option <?php if ($user['Role'] == 'کاربر'): echo "selected";
                            endif; ?> value="کاربر">کاربر</option>
                    <option <?php if ($user['Role'] == 'ادمین'): echo "selected";
                            endif; ?> value="ادمین">ادمین</option>
                </select>
            </div>
            <br>
            <div class="Active">
                <label for="">فعال بودن</label>
                <select name="newActive" id="newActive" class="form-select">
                    <option <?php if ($user['Active'] == 'فعال'): echo "selected";
                            endif; ?> value="فعال">فعال</option>
                    <option <?php if ($user['Active'] == 'غیرفعال'): echo "selected";
                            endif; ?> value="غیرفعال">غیرفعال</option>
                </select>
            </div>
            <br>
            <div class="btns">
                <button type="button" id="addNewPro" class="btn btn-primary">ویرایش</button>
            </div>
        </form>
        <br><br><br>
    </div>
</body>

</html>

<!-- js -->
<?php include "./resources/layouts/jsFooter.php" ?>

<script src="./resources/js/Editproduct.js"></script>
<script src="./resources/js/EditUser.js"></script>