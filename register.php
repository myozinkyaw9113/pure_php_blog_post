<?php 
  require 'config/database.php';
  
  $name = $email = $password = $c_password = "";
  $nameErr = $emailErr = $passwordErr = $c_passwordErr = $confirmPassErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
      $nameErr = "* Email is required";
    } else {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "* Email is required";
    } else {
      $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
      $passwordErr = "* Password is required";
    } else {
      $password = test_input($_POST["password"]);
    }

    if (empty($_POST["c_password"])) {
      $c_passwordErr = "* Confirm Password is required";
    } else {
      $c_password = test_input($_POST["c_password"]);
    }

    if ($password != $c_password) {
      $confirmPassErr = '* Password and Confirm Password must be the same';
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registration Page</title>
<head>
    <?php require 'top.php'; ?>
</head>
<body class="hold-transition register-page">

<?php
  if ($nameErr || $emailErr || $passwordErr || $c_passwordErr) {
?>
  <div class="p-2 mb-3 bg-danger register-box text-center" style="border-radius: 5px;">
    <div class="text-white"><small><?php echo $nameErr; ?></small></div>
    <div class="text-white"><small><?php echo $emailErr; ?></small></div>
    <div class="text-white"><small><?php echo $passwordErr; ?></small></div>
    <div class="text-white"><small><?php echo $c_passwordErr; ?></small></div>
  </div>
<?php    
  }
?>
<?php
  if ($confirmPassErr) {
?>
  <div class="p-2 mb-3 bg-danger register-box text-center" style="border-radius: 5px;">
    <div class="text-white"><small><?php echo $confirmPassErr; ?></small></div>
  </div>
<?php    
  }
?>
<div class="register-box">
<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="#" class="h1"><b style="color:#3F65B0;">TINY</b>media</a>
</div>
<div class="card-body">
<p class="login-box-msg">Register a new membership</p>
<form action="register.php" method="POST">
<div class="input-group mb-3">
<input type="text" class="form-control" name="name" placeholder="Full name" value="">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="email" class="form-control" name="email" placeholder="Email" value="">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" name="password" placeholder="Password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control" name="c_password" placeholder="Retype password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="agreeTerms" name="terms" value="agree">
<label for="agreeTerms">
I agree to the <a href="#">terms</a>
</label>
</div>
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Register</button>
</div>

</div>
</form>
<div class="social-auth-links text-center">
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i>
Sign up using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i>
Sign up using Google+
</a>
</div>
<a href="login.php" class="text-center">I already have a membership</a>
</div>

</div>
</div>

<?php require 'base.php'; ?>

</body>
</html>
