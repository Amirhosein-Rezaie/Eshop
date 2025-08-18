function IsUser(address) {
    let result = 'a';
    $.ajax({
        method: "post",
        url: address,
        success: function (info) {
            result = info;
            console.log(result);
            return result;
        }
    });
}