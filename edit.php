<?php
  session_start();
  include("php/config.php");

  if(!isset( $_SESSION['valid'])){
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css" />
    <title>Change Profile</title>
</head>
<body>

    <div class="nav">
        <div class="logo">
          <p>
              <a href="home.php">Logo</a>
          </p>
        </div>
  
        <div class="right-links">
          <a href="#">Change Profile</a>
          <a href="php/logout.php">
            <button class="btn">Log Out</button>
          </a>
        </div>
      </div>

      <div class="container">
        <div class="box form-box">

        <?php
  // If the user is trying to change password
    if (isset($_POST["submit"])){
      $username = $_POST["username"];
      $email = $_POST["email"];

      $id = $_SESSION["Id"];

      $edit_query = mysqli_query($con,"UPDATE users  SET Username='$username' , email='$email' WHERE Id=$id ") or die("select error") ;
      if($edit_query){
        echo "<div class='message' >
          <p>Updated Successfully !</p>
          
          </div> <br>";

          echo "<a href='home.php'><button class='btn'>Go Home</button></a>";
      }
    }else{
      $id = $_SESSION['Id'];
      $query = mysqli_query($con,"SELECT  * FROM users WHERE Id= '$id'");
      
      while ($result = mysqli_fetch_assoc($query)) {
        $res_Uname = $result['Username'];
        $res_email = $result['email'] ;

      }
    
?>

          <header>Change Profile</header>
          <form action="" method="post">
            <div class="field input">
              <label for="username">Username: </label>
              <input type="text" id="username" name="username" value="<?php echo $res_Uname ?>" autocomplete="off" required />
            </div>
  
            <div class="field input">
              <label for="email">Email: </label>
              <input type="email" id="email" name="email" value="<?php echo $res_email ?>" autocomplete="off" required />
            </div>
  
  
  
            <div class="field">
              <input type="submit" class="btn" name="submit" value="Update" />
            </div>
          </form>
        </div>
        <?php } ?>
      </div>
    
</body>
</html>