<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <div class="box">
    <div class="form-box">
      <h2>Login Form</h2>
      <?php
      $email = $password = "";
      $emailErr = $passwordErr = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["email"])) {
              $emailErr = "<span class='error'>Email is required</span>";
          } else {
              $email = ($_POST["email"]);
          }

          if (empty($_POST["password"])) {
              $passwordErr = "<span class='error'>Password is required</span>";
          } else {
              $password = ($_POST["password"]);
          }
          
          if (empty($emailErr) && empty($passwordErr)) {
            include("Connection.php");
            $check_email = mysqli_query($Connection,"SELECT Email, password, account_type FROM login_tbl WHERE Email = '$email'");
            $check_email_row = mysqli_num_rows($check_email);        
            
            if ($check_email_row > 0) {
              while ($row = mysqli_fetch_assoc($check_email)){
                $db_password = $row["password"];
                $db_account_type = $row ["account_type"];

                if ($db_password == $password) {
                    if ($db_account_type == "1") {
                  echo "<script> window.location.href = 'admin_page.php';</script>";
                } else {
                  echo "<script> window.location.href = 'user_page.php';</script>";
                }
              } else {
                  $passwordErr = "<span class='error'>Password is incorrect</span>";
              }
            }
            } else {
              $emailErr = "<span class='error'>Email is not registered</span>";
            }
          }
        }

      ?>
      <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-box">
        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
          <label for="email"><b>Email</b></label>
          <input type="email" placeholder="Enter Email" id="email" name="email" value="<?php echo $email; ?>">
          <?php echo $emailErr; ?>
        </div>

        <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" id="password" name="password">
          <?php echo $passwordErr; ?>
        </div>

        <div class="form-group">
        <button type="submit" class="btn">LOGIN</button>
        </div>
      </form>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>