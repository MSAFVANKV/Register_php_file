
<?php
  session_start();
  if(isset( $_SESSION['valid'])){
    header("Location: home.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="box form-box">
      <?php
        include("php/config.php");
        if (isset($_POST[ "submit" ])) {
          $email = mysqli_real_escape_string($con,$_POST["email"]);
          $password = mysqli_real_escape_string($con,$_POST["password"]);

          $result = mysqli_query($con,"SELECT * FROM users  WHERE email='$email' AND password='$password' ") or die("select error") ;
          $row = mysqli_fetch_assoc($result);
          // $db_password = $row["password"];

          if(is_array($row) && !empty($row)){
            $_SESSION['valid']=$row['email'];
            $_SESSION['username']=$row['username'];
            $_SESSION['password']=$row['password'];
            $_SESSION['Id']=$row['Id'];

          } else{
            echo "<div class='message' >
          <p>Wrong Username Or Password!</p>
          
          </div> <br>";

          echo "<a href='index.php'><button class='btn'>Go back</button></a>";
          }
          if(isset($_SESSION['valid'])){
            header("Location: home.php");
          }

        } else {
      ?>
        <header>Login</header>
        <form action="" method="post">
          <div class="field input">
            <label for="email">email: </label>
            <input type="text" id="email" name="email" required />
          </div>

          <div class="field input">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required />
          </div>

          <div class="field">
            <input type="submit" class="btn" name="submit" value="Log in" />
          </div>

          <div class="link">
            Don't have account? <a href="register.php">Sign Up now</a>
          </div>
        </form>
      </div>
      <?php } ?>
    </div>
  </body>
</html>
