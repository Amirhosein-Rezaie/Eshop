$(document).ready(function () {

    $('#addNewPro').on('click', function () {

        const UserID = location.href.split('?')[1].split('=')[1];
        const newdatas = {
            Role: $('#newRole').val(),
            Active: $('#newActive').val(),
        };

        $.ajax({
            type: "post",
            url: "./php/editUser.php",
            data: {
                ID: UserID,
                newDatas: newdatas,
            },
            success: function (response) {
                console.log('Ok');
            },
            error: function (response) {
                console.log('not Ok');
            }
        });
    })

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