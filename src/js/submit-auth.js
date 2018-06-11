$(document).ready(function () {
    $('#signinsubmit').click(function () {
        var auth_login = $('#auth-login').val();
        var auth_password = $('#auth-password').val();
        $.ajax({
            url: '../submit-auth.php',
            method: 'POST',
            dataType: 'json',
            data: {
                auth_login: auth_login,
                auth_password: auth_password
            },
            success: function (result) {
                console.log(auth_login);
                if (result.length == 0) {
                    $('#success-auth').fadeIn('slow');
                    $('#success-auth').delay(2000).fadeOut('slow');
                    setTimeout(function () {
                        window.top.location = "../welcome.php"
                    }, 2000);
                } else {
                    $('#error-auth').text(result);
                    $('#error-auth').fadeIn('slow');
                    $('#error-auth').delay(3000).fadeOut('slow');
                }
            }
        });
        return false;
    });
});