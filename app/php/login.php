<?php include "../../resources/config/database.php" ?>

<?php 
session_start();


$datas = $_POST;

$username = $datas['Username'];
$password = sha1($datas['Password']);

$queryLogin = "SELECT `profiles`.`Name` as ProfileName , `users`.* FROM `profiles` , `users` WHERE `profiles`.`ID`=`users`.`Profile_ID` AND `users`.`Username`='$username' AND `users`.`Password`='$password' AND `users`.`Active`='فعال'";

$login = $Connect->prepare($queryLogin);
$login->execute();

if($login->rowCount() > 0) {
    $_SESSION['User'] = $login->fetch(PDO::FETCH_ASSOC);

    echo 1;
}
else {
    echo 0;
}