<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) && !is_numeric($email))
        {
            $query = "select * from web where email = '$email' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: index.php");
                        die;
                    }
                }
            }   
            
        }
        else{
            echo "<script> type='text/javascript'> alert('wrong username or password')</script>";
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
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
     <div class="login-box" id="login-form">
      <form action="home.php" method="POST">
          <div class="login-header">
              <header>Welcome</header>
              <p>We are happy to have you back!</p>
          </div>
          <div class="input-box">
              <input type="email" class="input-field" id="email" required>
              <label for="email"><i class="fas fa-envelope"></i> Email or phone</label>
          </div>
          <div class="input-box">
              <input type="password" class="input-field" id="password" required>
              <label for="passwowd"><i class="fas fa-lock"></i> Password</label>
          </div>
          <div class="forgot">
              <section>
                  <input type="checkbox" id="check">
                  <label for="check">Remember me</label>
              </section>
              <section>
                  <a href="#"class="forgot-link">Forgot Password ?</a>
              </section>
          </div>
          <div class="input-box">
              <input type="submit" class="input-submit" value="Sign In">
          </div>
          <div class="middle-text">
              <hr>
              <p>Or</p>
          </div>
      </form>  
         
      <div class="social-sign-in">
        <button class="input-google">
            <a href="google.html"><img src="google.png"alt=""></a>
            <p>Sign In with Google</p>
        <button class="input-twitter">
            <a href="#"><img src="facebook.png"alt=""></a>
        </button>
    </div>
    <div class="sign-up">
        <P>Don't have an account? <a href="signup.php">sign up</a></p>
    </div>
        </div>
  </body>
</html>