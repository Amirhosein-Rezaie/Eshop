$(document).ready(function () {

    // name in title tag
    $.ajax({
        type: "post",
        url: "../resources/config/ProjectName.php",
        success: function (ProName) {
            $('#title').html(ProName);
        }
    });

    // get the btns in header
    $.ajax({
        type: "post",
        url: "./resources/layouts/header.php",
    }).always(function (header) {
        $('#header').html(header);
    });

    // navbar
    $.ajax({
        type: "post",
        url: "./resources/layouts/navbar.php",
    }).always(function (navbar) {
        $("#Navbar").html(navbar);
    });
});