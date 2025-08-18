$(document).ready(function () {
    // get the title 
    $.ajax({
        type: "post",
        url: "../resources/config/ProjectName.php",
        success: function (info) {
            $('#ProName').html(info);
        },
        error: function () {
            $('#ProName').html('No title');
        },
    });

    // log out
    $('#logoutBtn').on('click', function () {
        alert('ok')
    });

    // open the dropdown menu
    var display = 'none';
    $('#navbarDropdownOpen').on('click', function () {
        if (display == 'none') {
            display = 'block';
        }
        else {
            display = 'none';
        }
        $('#dropDownMenu').css('display', display);
    });
});