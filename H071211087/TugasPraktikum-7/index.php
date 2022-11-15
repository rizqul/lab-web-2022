<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']); //serangan sql injection
   $pass = md5($_POST['password']); 

   //harus tambahkan ini dlu baru ke file data mahasiswa nya
   $_SESSION['submit'] = $_POST['submit'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select); 

   if(mysqli_num_rows($result) > 0){ 

      $row = mysqli_fetch_array($result); 

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:index2.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:index2.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>
<!-- Perbaikan Error di Login  -->
<?php if(isset($conn, $_POST['name']) &&isset($_POST['user_type'])  &&isset($_POST['cpassword'])): ?>
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
<?php endif; ?>
<!-- Perbaikan Error di Login  -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Masukkan Email Anda">
      <input type="password" name="password" required placeholder="Masukkan Password Anda">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Belum Punya Akun? <a href="register_form.php">Register di sini</a></p>
   </form>

</div>

</body>
</html>