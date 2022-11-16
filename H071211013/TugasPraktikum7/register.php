<?php  
include "config.php"; 
session_start();

if (isset($_POST['kirim'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $mysqli = mysqli_query($koneksi, $sql);
     
    if($user->register($nama, $email, $password)) { 
        $success = true; 
    }else {  
        $error = $user->getLastError(); 
    } 
}
?> 

<!DOCTYPE html>  
<html>  
<head> 
    <title>Register Page</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 
</head> 

<body>
    <div class="register mx-auto"> 
        <h3> <b>Register Page </b> </h3>
            <div class="form"> 
                <form class="register-form" method="post"> 
                <?php if (isset($error)): ?> 
                    <div class="error"> 
                        <?php echo $error ?> 
                    </div> 
                <?php endif; ?> 
                <?php if (isset($success)): ?> 
                    <div class="success"> 
                        Berhasil mendaftar. Silakan <a href="login.php"> Login </a>. 
                    </div> 
                <?php endif; ?> 

                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label"> <i>Name</i> </label>
                        <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="nama" required>
                            <div id="nameHelp" class="form-text"></div>
                    </div>    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> <i>Email</i> </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"> <i>Password</i> </label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary"> Submit</button>
        
                <p class="message">Already registered? <a href="login.php">Log In</a></p> 
                </form> 
            </div> 
    </div>
</body> 
</html>  