<?php
  session_start();
  if(isset($_SESSION['email'])){
    header('Location: login-success.php');
    exit;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5">
      <?php
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Database connection 
        $con = new mysqli("localhost", "root", "", "test");
        if($con->connect_error){
            die("Fail to connect database:".$con->connect_error);
        } else {
            $stmt = $con->prepare("SELECT * FROM registration WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                echo '<div class="alert alert-success" role="alert">Login Success</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Invalid Email or Password</div>';
            }
        }
      ?>
    </div>
  </body>
</html>
