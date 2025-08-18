<?php include "../../resources/config/database.php"; ?>
<?php include "../../resources/classes/func.php"; ?>

<?php

$ID = $_POST['ID'];
$newRole = $_POST['newDatas']['Role'];
$newActive = $_POST['newDatas']['Active'];

$queryUpdate = "UPDATE users SET `Role`='$newRole' , `Active`='$newActive' WHERE `ID`=$ID";
$updateUser = $Connect->prepare($queryUpdate);
$result = $updateUser->execute();

if ($result)
    echo "success";
else
    echo "unsuccess";
