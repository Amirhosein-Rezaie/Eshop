$(document).ready(function () {
    $.ajax({
        method: "post",
        url: "../resources/config/ProjectName.php",
        success: function (ProName) {
            $('#ProNameFooter').html(ProName);
        },
        error: function () {
            $('#ProNameFooter').html('No Name');
        }
    });
});