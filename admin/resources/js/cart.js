
$(document).ready(function () {

    // functions

    // Sum of price
    function SumPRiceOrder() {
        const OrderID = location.href.split('?')[1].split('=')[1];

        $.ajax({
            type: "post",
            url: "./php/SumInOrder",
            data: {
                Order_ID: OrderID,
            },
            success: function (response) {
                $('.TotalPrice').html(response);
                console.log(response)
            }
        });
    }
    SumPRiceOrder();


    // change the quantity of the product
    $('.NumberProduct').on('change', function () {

        const ID = $(this).attr('placeholder');
        const newNumber = $(this).val();
        const OrderID = location.href.split('?')[1].split('=')[1];

        $.ajax({
            type: "post",
            url: "./php/ChangeNumberProInOrder.php",
            data: {
                Product_ID: ID,
                newNumber_Product: newNumber,
                Order_ID: OrderID,
            },
            success: function () {
                console.log('ok');
                SumPRiceOrder();
            },
            error: function () {
                console.log('not ok');
            }
        });
    });

    // navbar
    $.ajax({
        type: "post",
        url: "./resources/layouts/navbar.php",
    }).always(function (navbar) {
        $("#Navbar").html(navbar);
    });
});