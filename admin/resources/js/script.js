$(document).ready(function () {
    // name in title tag
    $.ajax({
        type: "post",
        url: "../resources/config/ProjectName.php",
        success: function (ProName) {
            $('#title').html(ProName);
        }
    });

    // users
    $.ajax({
        url: "./resources/layouts/users.php",
    }).always(function (users) {
        $("#users").html(users);
    });

    // products
    $.ajax({
        type: "post",
        url: "./resources/layouts/products.php",
    }).always(function (products) {
        $('#products').html(products);
    });

    // orders
    $.ajax({
        type: "post",
        url: "./resources/layouts/orders.php",
    }).always(function (orders) {
        $('#orders').html(orders);
    });

    // navbar
    $.ajax({
        type: "post",
        url: "./resources/layouts/navbar.php",
    }).always(function (navbar) {
        $("#Navbar").html(navbar);
    });
});
