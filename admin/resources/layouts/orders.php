<?php include "../../../resources/config/database.php"; ?>
<?php include "../../../resources/classes/jdf.php" ?>

<?php
$selectOrdersQuery =
    "SELECT orders.Date , orders.ID , users.Username , orders.Status FROM orders , users WHERE orders.user_ID=users.ID";

$selectOrders = $Connect->prepare($selectOrdersQuery);
$selectOrders->execute();
$orders = $selectOrders->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام سفارش دهنده</th>
            <th scope="col">تاریخ سفارش</th>
            <th scope="col">وضعیت</th>
            <th scope="col">عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php $number = 1 ?>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <th scope="row"><?= $number++ ?></th>
                <td><?= $order['Username'] ?></td>
                <td><?= jdate('Y/m/d', $order['Date']) ?></td>
                <td><?= $order['Status']; ?></td>
                <td>
                    <a href="./cart.php?order_id=<?= $order['ID'] ?>" class="btn btn-outline-primary">مشاهده</a>
                </td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>