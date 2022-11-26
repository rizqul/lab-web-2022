<?php 
 
session_start();  // untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser. 

    $host       = "localhost:3307";
    $user       = "root";
    $pass       = "";
    $db         = "datamahasiswa" ;

$conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Tidak bisa terkoneksi ke database"); // gagal konekti = die
    }
 
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = ($_POST['password']);
      $sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      header("Location: http://localhost/praktikum7/login.php");
    }
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	  <link rel="stylesheet" href="register.css">
      <style>

      </style>
</head>
<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="image/signup.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        
        <form method="POST">
          
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3"><strong>Sign Up</strong></p>
          </div>
          <br>

          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Set Username</label>
            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
              placeholder="Your Username" />
          </div>

          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Set Email</label>
            <input type="text" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Your Email" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Set Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Your Password" />
          </div>

            <div class="d-flex justify-content-between align-items-center">
        
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name = "submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:violet; border:violet;">Register</button>

            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="http://localhost/praktikum7/login.php"
                class="link-danger">Sign In</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>