$(document).ready(function () {
    // name in title tag
    $.ajax({
        type: "post",
        url: "../resources/config/ProjectName.php",
        success: function (ProName) {
            $('#title').html(ProName);
        }
    });

    const max = $('#NumberInDB').html();
    $('#NumberPro').attr('max', max);

    function totalPrice() {
        const number = $("#NumberPro").val();
        const price = $("#PricePro").html();

        $("#TotalPrice").html(price * number);
    }
    totalPrice();
    $("#NumberPro").on("change", function () {
        totalPrice();
    });


    // navbar
    $.ajax({
        type: "post",
        url: "./resources/layouts/navbar.php",
    }).always(function (navbar) {
        $("#Navbar").html(navbar);
    });
});

