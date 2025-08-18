$(document).ready(function () {
    // navbar call
    $.ajax({
        url: "./resources/layouts/navbar.php",
    }).always(function (navbar) {
        $("#navbar").html(navbar);
    });

    // footer
    $.ajax({
        url: "./resources/layouts/footer.html",
    }).always(function (footer) {
        $("#footer").html(footer);
    });

    // Username in title tag
    $.ajax({
        type: "post",
        url: "../resources/config/ProjectName.php",
        success: function (ProName) {
            $('#title').html(ProName);
        }
    });

    // products
    $.ajax({
        type: "post",
        url: './resources/layouts/products.php',
    }).always(function (products) {
        $('#products').html(products);
    });
});

