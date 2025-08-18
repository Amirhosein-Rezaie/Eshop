$(document).ready(function () {

    // logout button
    $("#btnLogout").on('click', function () {
        $.ajax({
            type: "post",
            url: "./php/logout",
            success: function (response) {
                console.log('reload');
                location.reload();
            },
            error: function () {
                console.log("not connected");
            }
        });
    });

});