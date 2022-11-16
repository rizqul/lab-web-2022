<?php
include "config.php";
session_start();

if (isset($_POST['kirim'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $mysqli = mysqli_query($koneksi, $sql);
     
    if ($mysqli->num_rows > 0) {
        header("location: index.php");        
        $_SESSION['user'] = $email;
    } else {
        $error = $user->getLastError();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Login Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login mx-auto">
        <h3> <b>Login Page</b> </h3>
            <div class="form">
                <form class="login-form" method="post">
                    <?php if (isset($error)) : ?>
                        <div class="error">
                            <?php echo $error ?>
                        </div>
                    <?php endif; ?>
                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> <i>Email</i> </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' placeholder="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> <i>Password</i> </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name='password' placeholder="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name='kirim'> Submit</button>
                
                <p class="message">Not registered? <a href="register.php"> Create an account</a></p>
                </form>
            </div>
    </div>
</body>
</html>
