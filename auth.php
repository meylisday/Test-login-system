<?php require_once("submit-auth.php");?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <section class="section">
        <div class="container">
        <div class="columns">
                <div class="column"></div>
                <div class="column">
                    <div class="notification is-danger" id="error-auth">
                    </div>
                    <div class="notification is-success" id="success-auth">
                        Success!
                    </div>
                </div>
                <div class="column"></div>
            </div>
            <div class="columns">
                <div class="column"></div>
                <div class="column is-one-third">
                    <form action="" method="POST">
                        <div class="field">
                            <label class="label">Login</label>
                            <div class="control">
                                <input class="input" type="text" id="auth-login">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" id="auth-password">
                            </div>
                        </div>
                        <div class="field">
                            <p class="control">
                                <input class="button is-primary" type="button" value="Sign in" id="signinsubmit"> 
                                <a href="index.php">No account yet?</a>
                            </p>  
                        </div>
                    </form>
                </div>
                <div class="column"></div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/js/submit-auth.js"></script>
</body>

</html>
<?php 
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])){
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
    echo "<script>
    document.getElementById('auth-login').value = '$login';
    document.getElementById('auth-password').value = '$password';
    </script>";
}
?>