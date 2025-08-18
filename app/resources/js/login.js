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

    // show password
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


    // login
    $('#loginBtn').on('click', function () {

        const Username = $('#username').val();
        const Password = $('#pass').val();

        if (Username != "" && Password != "") {
            $.ajax({
                type: "post",
                url: "./php/login",
                data: {
                    Username: Username,
                    Password: Password,
                },
                success: function (response) {
                    if (response == 1) {
                        window.location = "./";
                    }
                    else {
                        Swal.fire({
                            text: "کاربری پیدا نشد ... !",
                            icon: 'warning',
                            title: 'پیدا نشده'
                        });
                    }
                    console.log('ok');
                },
                error: function () {
                    console.log('DisConnected ... !');
                },
            });
        }
        else {
            Swal.fire({
                text: 'تمامی مقادیر را وارد کنید ... !',
                icon: 'warning',
                title: 'خالی است'
            })
        }
    });
});