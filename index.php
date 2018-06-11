<?php require_once("submit-registr.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column"></div>
                <div class="column">
                    <div class="notification is-danger" id="err">
                    </div>
                    <div class="notification is-success" id="succes-msg">
                    The account has been created
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
                                <input class="input" type="text" id="login">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" type="password" id="password">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Confirm password</label>
                            <div class="control">
                                <input class="input" type="password" id="password2">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" id="email">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Your name</label>
                            <div class="control">
                                <input class="input" type="text" id="name">
                            </div>
                        </div>
                        <div class="field">
                            <p class="control">
                                <input class="button is-primary" type="button" value="Sign up" id="registrform"> 
                                <a href="auth.php">Already have an account?</a>
                            </p>  
                        </div>
                    </form>
                </div>
                <div class="column"></div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/js/script.js"></script>
</body>

</html>