<?php
session_start();  // untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser. 

  $host       = "localhost:3307";
  $user       = "root";
	$pass       = "";
	$db         = "datamahasiswa" ;

  $conn = mysqli_connect($host, $user, $pass, $db);

	if (!$conn) {
		die("Tidak bisa terkoneksi ke database"); // gagal koneksi = die
	}
  
  foreach ($_POST as $key => $value) {
    echo $key;
  }

  if (isset($_POST['submit'])) {  // $_POST berfungsi untuk memanggil data yang telah diinputkan agar bisa ditampilkan di file action.
      $email = $_POST['email'];
      $password = $_POST['password'];
   
      $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $sql);

      if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['username'] = $row['username'];
          header("Location: http://localhost/praktikum6/index.php");
      } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
      }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	  <link rel="stylesheet" href="login.css">
</head>
<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="image/signin.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST">
          
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3"><strong>Sign In</strong></p>
          </div>
          <br>

          <!-- Email input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email address</label>
            <input type="text" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name = "submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="http://localhost/praktikum7/register.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>