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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Home page</title>
  </head>
  <body>
    <div class="nav">
      <div class="logo">
        <p>
            <a href="home.php">Logo</a>
        </p>
      </div>

      <div class="right-links">

      <?php
        $id = $_SESSION['Id'];
        $query = mysqli_query($con,"SELECT * FROM users WHERE Id='$id'");
        while ($result = mysqli_fetch_assoc($query)) {
          $res_Uname = $result['Username'];
          $res_Email = $result['email'];
          $res_pass = $result['password'];
          $res_id = $result['Id'];

        }
        echo "<a href='edit.php?Id=$res_id'>Change Profile</a>"
      ?>


        <!-- <a href="/style/edit.php">Change Profile</a> -->
        <a href="php/logout.php">
          <button class="btn">Log Out</button>
        </a>
      </div>
    </div>

    <main class="main">
      <div class="main-box top">

        <div class="top">
          <div class="box">
            <p>Hello <b> <?php echo $res_Uname ?> </b> Welcome</p>
          </div>
          <div class="box">
            <p>You'r email is <b> <?php echo $res_Email ?> </b> Welcome</p>
          </div>
        </div>

        <div class="bottom">
          <div class="box">
            <p>And You'r password is <b><?php echo $res_pass ?></b>.</p>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
