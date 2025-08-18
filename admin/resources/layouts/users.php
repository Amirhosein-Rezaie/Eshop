<?php include "../../../resources/config/database.php" ?>

<?php
$query = "SELECT users.ID, users.Username , users.Phone , users.Role , users.Active , profiles.name as profileImage 
        FROM users , profiles 
        WHERE users.Profile_ID = profiles.ID";

$select = $Connect->prepare($query);
$select->execute();
$users = $select->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <?php if ($select->rowCount() > 0) : ?>
        <?php foreach ($users as $user) : ?>
            <div class="col-12 col-md-6 col-lg-3 user-card">
                <div class="card item" style="margin-bottom: 25px;">
                    <div class="image-user">
                        <img class="card-img-top" style="border-radius: 15px;" src="../resources/images/profiles/<?= $user['profileImage'] ?>" alt="Card image cap">
                    </div>
                    <div class="card-body" style="display: grid;">
                        <h5 style="text-align: center;" class="card-title"><?= $user['Username'] ?></h5>
                        <hr>
                        <div class="infos-card-body" style="text-align: right;">
                            <div style="margin-bottom: 7px;">
                                <span class="text-secondary">شماره موبایل : </span>
                                <span class="text-dark"><?= $user['Phone'] ?></span>
                            </div>
                            <div style="margin-bottom: 7px;">
                                <span class="text-secondary">نقش : </span>
                                <span class="text-dark"><?= $user['Role'] ?></span>
                            </div>
                            <div style="margin-bottom: 7px;">
                                <span class="text-secondary">فعال بودن : </span>
                                <span class="text-dark"><?= $user['Active'] ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="display: grid; margin-top: -35px;">
                        <hr>
                        <a href="./UserEdit.php?ID=<?= $user['ID'] ?>" class="btn btn-outline-primary">ویرایش کاربر</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-primary" style="text-align: center;">
            کاربری وجود ندارد ... !
        </div>
    <?php endif; ?>
</div>