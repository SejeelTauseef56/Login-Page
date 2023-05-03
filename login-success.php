<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: login-form.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logged In</title>
</head>
<body>
    <h1>Login Success</h1>
    <form method="post" action="logout.php">
        <input type="submit" value="Log Out">
    </form>
</body>
</html>
