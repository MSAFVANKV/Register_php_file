<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Register</title>
  </head>
  <body>
    <div class="container">
      <div class="box form-box">

      <?php
      include("php/config.php"); // Database connection
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST["email"];
        
        // Verifying unique email
        $varify_query = mysqli_query($con,"SELECT Email FROM users  WHERE email='$email'");
        if(mysqli_num_rows($varify_query) != 0){
          echo "<div class='message' >
          <p>This email is used, Try another one please!</p>
          
          </div> <br>";

          echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button></a>";
        } else{
          mysqli_query($con,"INSERT INTO users(Username,email,password) VALUES ('$username','$email','$password')") or die("Something wentwrong in insert users");
          echo "<div class='message'>
          <p>Registration Successfull</p>
          
          </div> <br>";

          echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
        }
       
      } else {
      ?>
        <header>Sign Up</header>
        <form action="" method="post">
          <div class="field input">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" autocomplete="off" required />
          </div>

          <div class="field input">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" autocomplete="off" required />
          </div>


          <div class="field">
            <input type="submit" class="btn" name="submit" value="Log in" />
          </div>

          <div class="link">
           Alredy have an account? <a href="index.php">Login now</a>
          </div>
        </form>
      </div>
      <?php } ?>
    </div>
  </body>
</html>
