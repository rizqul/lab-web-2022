<?php

session_start();
if (isset($_SESSION["email"])){
    header('Location: http://localhost/tugas 7/index.php/');
}
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "tugas_6";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

if ($_POST) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    try {
        $sql1 = "insert into user(name, email, password) values('$name', '$email', '$password')" ;
        $q1         = mysqli_query($koneksi,$sql1);
        header('Location: http://localhost/tugas 7/login.php/');
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo "Gagal Masukkan Data";
    }
    // $data = mysqli_fetch_assoc($q1);
        // echo $data ['email'];
    // if($data ['email']) {
    //     $_SESSION['email']= $data ['email'];
    //     header('Location: http://localhost/tugas 7/index.php/');
    // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Welcome</title>
    <style>
        .gradient-custom-3 {
/* fallback for old browsers */
background: #993300, #006399;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #993300, #913d21, #864639, #794e51, #685568, #4d5c80, #006399);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #993300, #913d21, #864639, #794e51, #685568, #4d5c80, #006399);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

    </style>

</head>
<body class="container mt-5">
<section class="h-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="http://localhost/tugas 7/logo Unhas.png"
                    style="width: 100px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">REGISTER</h4>
                </div>

                <form action="" method="post">
                  

                  <div class="form-outline mb-4">
                    <input name="name" type="text" id="" class="form-control"
                      placeholder="" />
                    <label class="form-label" for="form2Example11">Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="email" type="email" id="form2Example11" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-3 mb-3" type="submit">Register</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Do have an account?</p>
                    <a href="http://localhost/tugas 7/login.php/" type="button" class="btn btn-outline-light gradient-custom-3">Sign in</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-3">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>