<?php 
  session_start();
  require 'config/database.php';
  require 'config/common.php';

  $name = $email = $password = $c_password = "";
  $nameErr = $emailErr = $passwordErr = $c_passwordErr = $confirmPassErr = $lengthErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['c_password']) || (strlen($_POST['password']) < 8)) {
      
      if (empty($_POST['name'])) {
        $nameErr = "* Email is required";
      }

      if (empty($_POST['email'])) {
        $emailErr = "* Email is required";
      }

      if (empty($_POST['password'])) {
        $passwordErr = "* Password is required";
      }

      if (empty($_POST['c_password'])) {
        $c_passwordErr = "* Confirm Password is required";
      }
  
      if (strlen($_POST['password']) < 8) {
        $lengthErr = '* Password must have at least 8 characters.';
      }
      
    } else {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $password = test_input($_POST["password"]);
      $c_password = test_input($_POST["c_password"]);

      $selectUser = $pdo->prepare("SELECT * FROM users WHERE email=:email");
      $selectUser->bindValue(':email', $email);
      $selectUser->execute();
      $user = $selectUser->fetch(PDO::FETCH_ASSOC);

      if ($user) {
        echo '<script>alert("Current email is already exist");window.location.href="register.php";</script>';
      } elseif($password !== $c_password) {
        $confirmPassErr = '* Password and Confirm Password must be the same';
      } else {
        $sql = "INSERT INTO users(name,email,password,c_password) 
                VALUES(:name,:email,:password,:c_password)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute(
          array(
              ':name' => $name,
              ':email'=> $email,
              ':password'=> password_hash($password, PASSWORD_DEFAULT),
              ':c_password'=> password_hash($c_password, PASSWORD_DEFAULT) # echo password_hash('password',PASSWORD_DEFAULT);
          )
        );
        if ($result) {
          echo '<script>alert("Register success, Please login");window.location.href="login.php";</script>';
        }
      }
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
  if ($nameErr || $emailErr || $passwordErr || $c_passwordErr || $lengthErr) {
?>
  <div class="p-2 mb-3 bg-danger register-box text-center" style="border-radius: 5px;">
    <div class="text-white"><small><?php echo $nameErr; ?></small></div>
    <div class="text-white"><small><?php echo $emailErr; ?></small></div>
    <div class="text-white"><small><?php echo $passwordErr; ?></small></div>
    <div class="text-white"><small><?php echo $c_passwordErr; ?></small></div>
    <div class="text-white"><small><?php echo $lengthErr; ?></small></div>
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
<input name="_token" type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- csrf_token --> 
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="name" placeholder="Full name">
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
<input type="submit" name="submit" class="btn btn-primary btn-block" value="Register"/>
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
