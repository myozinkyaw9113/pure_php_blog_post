<?php 
    session_start();
    require 'config/database.php';
    require 'config/common.php';

    $email = $password = "";
    $emailErr = $passwordErr = $invalidUser = $incorrectPassword = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $selectUser = $pdo->prepare("SELECT * FROM users WHERE email=:email");
        $selectUser->bindValue(':email', $email);
        $selectUser->execute();
        $user = $selectUser->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            if (password_verify($password, $user['password'])  && password_verify($password,$user['c_password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = time();
                if ($user['role'] === 1) {
                    header('Location: admin/index.php');
                } else {
                    header('Location: users/index.php');
                }
            } else {
                $incorrectPassword = '* Incorrect Password!';
            }
        } else {
            $invalidUser = "* Invalid User!";
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
<title>Login Page</title>
<head>
    <?php require 'top.php'; ?>
</head>
<body class="hold-transition login-page">

<?php
    if ($emailErr || $passwordErr || $invalidUser || $incorrectPassword) {
?>
<div class="p-2 mb-3 bg-danger login-box text-center" style="border-radius: 5px;">
    <div class="text-white"><small><?php echo $emailErr; ?></small></div>
    <div class="text-white"><small><?php echo $passwordErr; ?></small></div>
    <div class="text-white"><small><?php echo $invalidUser; ?></small></div>
    <div class="text-white"><small><?php echo $incorrectPassword; ?></small></div>
</div>
<?php    
    }
?>
<div class="login-box">
<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="../../index2.html" class="h1"><b style="color:#3F65B0;">TINY</b>media</a>
</div>
<div class="card-body">
<p class="login-box-msg">Sign in to start your session</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<input name="_token" type="hidden" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- csrf_token --> 
<div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email">
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

<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="remember">
<label for="remember">
Remember Me
</label>
</div>
</div>

<div class="col-4">
<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
</div>

</div>
</form>
<div class="social-auth-links text-center mt-2 mb-3">
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
</a>
</div>

<p class="mb-1">
<a href="forgot-password.html">I forgot my password</a>
</p>
<p class="mb-0">
<a href="register.php" class="text-center">Register a new membership</a>
</p>
</div>

</div>

</div>

<?php require 'base.php'; ?>

</body>
</html>
