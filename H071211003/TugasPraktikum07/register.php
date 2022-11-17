<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location: index.php');
  }
$server = "127.0.0.1:3306";
$user = "root";
$pass = "";
$database = "tugas6";

$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

if ($_POST) {
    $nama= $_POST["nama"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    try {
        $tampil = mysqli_query($koneksi, "INSERT INTO user (nama, email, password) VALUES ('$nama', '$email', '$password')");
        header('location: login.php');
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

if ($_POST) {
	$register = $_POST["Register"];
	echo "<script>
			alert('Eitss lengkapi form nya dulu ya!');
			document.location=' register.php';
		</script>";
}
    

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Register Now</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- REGISTER -->
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action=""method= "POST" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="nama" class="form-control" placeholder="input your name here.." name="nama" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-massage"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="input your email here.."  name="email" required>
					</div>
          <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="input your password here"  name="password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">I agree all the condition
					</div>
					<div class="form-group">
						<input type="submit" value="Register" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login.php">Log in</a>
				</div>
				<!-- <div class="d-flex justify-content-center">
					<a href="register.php">Forgot your password?</a>
				</div> -->
			</div>
		</div>
	</div>
</div>
</body>
</html>