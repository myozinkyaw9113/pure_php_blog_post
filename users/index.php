<?php
    session_start();
    require '../config/config.php';

    if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])) {
    header('Location: ../login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello User, Welcom to your dashboard</h1>
    <a href="../logout/logout.php" class="btn btn-sm btn-light">Logout</a>
</body>
</html>