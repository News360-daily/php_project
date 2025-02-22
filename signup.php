<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(!empty($email) && !empty($password) && !is_numeric($email))
      {
        $query = "insert into web (name, email, password) values ('$name', '$email', '$password')";

        mysqli_query($con, $query);

        echo "<script> type='text/javascript'> alert('Successfully Register')</script>";
      }
      
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a815086365.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
    <link rel="stylesheet" href="signup.css">
  </head>
  <body>
         <div class="signup-box" id="signup-form">
            <form method="POST">
                <h2>signup</h2>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="signup">Signup</button>
                <p> Already have an account? <a href="login.php">Login</a></p>
            </form>
         </div>
  </body>
</html>