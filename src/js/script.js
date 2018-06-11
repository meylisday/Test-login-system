$(document).ready(function () {
    $('#registrform').click(function () {
        var login = $('#login').val();
        var password = $('#password').val();
        var password2 = $('#password2').val();
        var email = $('#email').val();
        var name = $('#name').val();
        $.ajax({
            url: '../submit-registr.php',
            method: 'POST',
            dataType: 'json',
            data: {
                login: login,
                password: password,
                password2: password2,
                email: email,
                name: name
            },
            success: function (response) {
                if (response.length == 0) {
                    $('#succes-msg').fadeIn('slow');
                    $('#succes-msg').delay(2000).fadeOut('slow');
                    setTimeout(function () {
                        window.top.location = "../auth.php"
                    }, 2000);
                } else {
                    $('#err').text(response);
                    $('#err').fadeIn('slow');
                    $('#err').delay(3000).fadeOut('slow');
                }
            }
        });
        return false;
    });
});