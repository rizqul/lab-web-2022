<?php
session_start();

$servername = "localhost"; 
$username   = "root";
$password   = "";
$database   = "datamahasiswa";
$port       = "3308";

$koneksi = mysqli_connect($servername, $username, $password, $database, $port);

if ($koneksi) {
   echo "Koneksi berhasil";
}

if (isset($_POST["login"])) {
  echo var_dump($_POST['login']);
  $username = $_POST ["username"];
  $password = $_POST ["password"];

  $sql = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
  $result = mysqli_query($koneksi, $sql);
  if ($result->num_rows > 0) {
     $row = mysqli_fetch_assoc($result);
     $_SESSION ["username"] = $row["username"];
     header("Location: main.php");
  } else {
    echo "Password salah";
    
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Login Page</title>
</head>
<body>
  <div class="container my-4">
      <div class="">
          <div class="card-body">
              <h1 class="card-title text-center">Login</h1>
            </div>
            <div class="card-text">
                <form method='POST'>
                  <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">

                    <small id="emailHelp" class="form-text text-muted">
                    Don't have an account?
                    <a href="signup.php" class="sign" name="signup">Sign Up.</a>
                    </small> 
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
      </div>
  </div>


  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script> -->
</body>
</html>