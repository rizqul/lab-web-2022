<!DOCTYPE html>
<html lang="en">

<?php include 'server/functions.php' ?>
<?php requestConnection() ?>
<?php if ($_SESSION['login']) header("Location: index.php") ?>

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
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">

                        <h6 class="mb-0 pb-3">
                            <span class="bg-dark bg-opacity-50 rounded mx-2 p-2 indicator">Log In</span>
                            <span class="bg-dark bg-opacity-50 rounded mx-2 p-2 indicator">Sign Up</span>
                        </h6>

                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>

                        <label for="reg-log"></label>

                        <form method="post">
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="on">
                                                    <i class="input-icon bi bi-envelope"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="on">
                                                    <i class="input-icon bi bi-lock"></i>
                                                </div>
                                                <input type="submit" class="btn mt-4" name="login-button" value="SUBMIT">
                                                <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-back">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Sign Up</h4>
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

                                    <?php setButtons($conn); ?>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>