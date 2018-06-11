<?php
require_once("submit-auth.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
    <body>
        <section class="hero is-info is-large">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Welcome,
                    </h1>
                    <h2 class="subtitle">
                        <?php echo $_SESSION['username']; ?>
                    </h2>
                </div>
            </div>
        </section>
        <a href="logout.php" class="button is-focused has-text-weight-bold" style="margin-top:1em; margin-left:1em;">Log out</a>
    </body>
</html>