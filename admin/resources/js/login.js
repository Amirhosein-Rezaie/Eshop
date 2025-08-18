$(document).ready(function () {

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


    // try to login
    $('#btnLogin').click(function () {

        const Username = $('#Username').val();
        const Password = $('#pass').val();
        const RememberMe = $('.RMM').prop('checked');

        if (Username != "" && Password != "") {
            $.ajax({
                type: "post",
                url: "./php/login.php",
                data: {
                    Username: Username,
                    Password: Password,
                    RememberMe: RememberMe,
                },
                success: function (response) {

                    if (response == 0) {
                        Swal.fire({
                            text: "کاربری پیدا نشد ... !",
                            icon: 'warning',
                            title: 'پیدا نشده'
                        });
                    } else if (response == 1) {
                        window.location = "./main.php";
                    }

                    console.log(response)
                },
                error: function () {
                    Swal.fire({
                        text: 'خطا در اتصال به سرور... !',
                        icon: 'error',
                        title: 'خطا',
                    });
                }
            });
        } else {
            Swal.fire({
                text: 'تمام فیلد ها را پر کنید ... !',
                icon: 'warning',
                title: 'هشدار',
            });
        }
    });

});