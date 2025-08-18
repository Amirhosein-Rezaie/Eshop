<?php include "../../resources/config/database.php"; ?>
<?php include "../../resources/classes/func.php"; ?>

<?php
session_start();

$msg = [
    'NotFound' => false,
];

$datas = $_POST;

$Username = $datas['Username'];
$PassWord = sha1($datas['Password']);
$RememberMe = $datas['RememberMe'];

$querySelectAdmin = "SELECT * FROM users WHERE `Role`='ادمین' AND `Username`='$Username' AND `Password`='$PassWord' AND `Active`='فعال'";

$selectAdmin = $Connect->prepare(query: $querySelectAdmin);
$selectAdmin->execute();

$find = $selectAdmin->rowCount();

if ($find > 0) {
    $_SESSION['Admin'] = $selectAdmin->fetch(mode: PDO::FETCH_ASSOC);

    // echo json_encode($_SESSION['Admin']);

    echo 1;
} else {
    $msg['NotFound'] = true;

    echo 0;
}

?>