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

    var isShow = false;
    $('#btnShow').click(function () {
        if (!isShow) {
            $('#pass').attr('type', 'text');
            isShow = true;
            $('#IcoNotShow').css('display', 'block');
            $('#IcoShow').css('display', 'none');
        } else {
            $('#pass').attr('type', 'password');
            isShow = false;
            $('#IcoNotShow').css('display', 'none');
            $('#IcoShow').css('display', 'block');
        }
    });
});