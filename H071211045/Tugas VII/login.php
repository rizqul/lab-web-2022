<!DOCTYPE html>
<html lang="en">

<?php include 'server/functions.php' ?>
<?php requestConnection() ?>
<?php if (isset($_SESSION['login'])) header("Location: index.php") ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planetary Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="plugins/login.css">
</head>

<body>
    <div class="section">
        <form method="post">
            <div class="container bg-dark container-form" id="login-form">
                <div class="center-wrap">
                    <div class="section text-center">
                        <h4 class="mb-4 pb-3 title">LOGIN</h4>
                        <div class="form-group">
                            <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="on">
                            <i class="input-icon bi bi-envelope"></i>
                        </div>
                        <div class="form-group mt-2">
                            <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="on">
                            <i class="input-icon bi bi-lock"></i>
                        </div>
                        <input type="submit" class="btn mt-4" name="login-button" value="SUBMIT">
                        <div class="container d-flex justify-content-center">
                            <p class="mb-0 mt-4 mx-3 text-center"><a href="mailto:gaero38@gmail.com" class="link"><b>Forgot your password?</b></a></p>
                            <!-- <p class="mb-0 mt-4 mx-1 text-center"><b>|</b></p>
                            <p class="mb-0 mt-4 mx-3 text-center"><a href="#0" class="link"><b>Create a new Account</b></a></p> -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="container bg-dark container-form" id="registration-form">
                <div class="center-wrap">
                    <div class="section text-center">
                        <h4 class="mb-4 pb-3 title">SIGN UP</h4>
                        <div class="form-group">
                            <input type="text" name="regname" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
                            <i class="input-icon bi bi-person"></i>
                        </div>
                        <div class="form-group mt-2">
                            <input type="email" name="regemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                            <i class="input-icon bi bi-envelope"></i>
                        </div>
                        <div class="form-group mt-2">
                            <input type="password" name="regpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                            <i class="input-icon bi bi-lock"></i>
                        </div>
                        <input type="submit" class="btn mt-4" name="register-button" value="SUBMIT">
                    </div>
                </div>
            </div>


            <div class="container d-flex w-25 rolling-checkbox">
                <span class="ms-4 px-3">LOGIN</span>
                <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                <label for="reg-log"></label>
                <span class="px-2">REGISTER</span>
            </div>

        </form>
    </div>

    <script src="plugins/login.js"></script>
    <?php setButtons($conn) ?>

</body>

</html>