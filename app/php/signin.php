<?php include "../../resources/config/database.php" ?>

<?php 
# init
$datas = $_POST;
$image = $_FILES['profile'];

# sigin in the new user
// add new profile
$image_ID = 1;
$flag_image = true;

if(!empty($image['name'])) {
    // variables
    $Directory = "../../resources/images/profiles/";
    $profileImageName = (string)time() . pathinfo($image['name'],PATHINFO_BASENAME);

    // insert image
    $queryAddImage = "INSERT INTO `profiles`(`ID`, `Name`) VALUES (null,'$profileImageName')";
    $signin = $Connect->prepare($queryAddImage);
    $signin->execute();

    // select the id of the new image
    $querySelectID = "SELECT ID FROM profiles WHERE `name`='$profileImageName' LIMIT 1";
    $selectID = $Connect->prepare($querySelectID);
    $selectID->execute();
    $image_ID = $selectID->fetch(PDO::FETCH_ASSOC)['ID'];

    // move the new profile
    $flag_image = move_uploaded_file($image['tmp_name'],$Directory . $profileImageName);
}


# insert the new user
// variables 
$username = $datas['username'];
$password = sha1($datas['password']);
$phone = $datas['phone'];
$Role = 'کاربر';
$Active = 'فعال';

// add
$queryAddUser = "INSERT INTO `users`(`ID`, `Username`, `Phone`, `Password`, `Profile_ID`, `Role`, `Active`) VALUES (null,'$username','$phone','$password',$image_ID,'$Role','$Active')";
$addUser = $Connect->prepare($queryAddUser);
$addUser->execute();


// go to another page (sigin or login)
$page = "";
if($flag_image) {
    $page = "login.php?success='true'";
} else {
    $page = "signin.php?success='false'";
}

header("location:../" . $page);