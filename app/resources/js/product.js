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

    // add to cart
    $('#AddToCart').on('click', function () {

        const ProID = window.location.href.split('?')[1].split('=')[1];
        const Quantity = $('#NumberPro').val();

        $.ajax({
            type: "post",
            url: "./php/addToCart.php",
            data: {
                Product_ID: ProID,
                Quantity: Quantity,
            },
            success: function (response) {
                if (response == 1) {
                    Swal.fire({
                        text: 'با موفقیت انجام شد',
                        icon: 'success',
                        title: 'موفقیت',
                    });

                    window.location.reload();
                } else {
                    Swal.fire({
                        text: 'با موفقیت انجام نشد',
                        icon: 'error',
                        title: 'ارور',
                    });
                }
                console.log('ok');
            },
            error: function () {
                console.log('DisConnected...!');
            },
        });
    });
});

