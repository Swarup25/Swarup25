<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost", "root", "", "mydb");
if ($conn === false) {
  die("ERROR: Could not Connect! " . mysqli_connect_error());
}
$my_email = "emailaddress";
$base_url = "website url";

if (isset($_SESSION["user_id"])) {
  header("Location: profile_page.php");
}
if (isset($_POST["register"])) {
  $user_id = mysqli_real_escape_string($conn, $_POST["ruserid"]);
  $email = mysqli_real_escape_string($conn, $_POST["remail"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["rpassword"]));
  $token = md5(rand());
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM logindb WHERE email='$email'"));
  if ($rcheck_email > 0) {
    echo "<script>alert('Email already exists!\n Try to Log In.');</script>";
  } 
  else {
    $sql = "INSERT INTO logindb ( id, email, password, token, status) VALUES ('$user_id', '$email', '$password', '$token', '0')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_POST["signup_full_name"] = "";
      $_POST["signup_email"] = "";
      $_POST["signup_password"] = "";
      $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
      $_SESSION["user_id"] = $row['id'];
      echo "<script>alert('Registration Successful!');</script>";
    }
    else {
      echo "<script>alert('User registration failed.');</script>";
    }
  }
    //Required for Email Verification  
    /* $to = $email;
        $subject = "Email verification";
  
        $message = "
        <html>
        <head>
        <title>{$subject}</title>
        </head>
        <body>
        <p><strong>Welcome {$user_id},</strong></p>
        <p>Thanks for registration! Verify your email to access our website. Click below link to verify your email.</p>
        <p><a href='{$base_url}verify_email.php?token={$token}'>Verify Email</a></p>
        </body>
        </html>
        ";
  
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: ". $my_email;
  
        if (mail($to,$subject,$message,$headers)) {
          echo "<script>alert('We have sent a verification link to your email to - {$email}.');</script>";
        } 
        else {
          echo "<script>alert('Mail not sent. Please try again.');</script>";
        }
      } 
      else {
        echo "<script>alert('User registration failed.');</script>";
      }*/
}
if (isset($_POST["login"])) {
  $user_id = mysqli_real_escape_string($conn, $_POST["luserid"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["lpassword"]));

  $check_email = mysqli_query($conn, "SELECT * FROM logindb WHERE id='$user_id' AND password='$password'");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    echo "<script>alert('Logged In Successfully!');</script>";
    header("Location: profile_page.php");
  } else {
    echo "<script>alert('Login details are incorrect. Please try again.');</script>";
  }
}
?>
<!doctype html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>login_or_Signup</title>

  <link rel='stylesheet' type='text/css' href='Mystyle.css'>

</head>

<body>
  <div class='cover'>

    <div class='box'>
      <div class='btn_section'>
        <div id='btn_clr'></div>
        <button type='button' class='tgl_btn' onclick='login()'>Login</button>
        <button type='button' class='tgl_btn' onclick='register()'>Signup</button>
      </div>
      <div class='icon'>
        <img src='fb.jpg'>
        <img src='Instagram.png'>
        <img src='Whatsapp.png'>
        <img src='google.png'>
        <img src='twitte.png'>
      </div>
      <form id='login' class='inputArea' name='flogin' onsubmit='return validateLogin()' action='' method='POST'>
        <input type='text' class='userid' name='luserid' placeholder='User Id'>
        <input type='password' class='password' name='lpassword' placeholder='Enter Password'>
        <input type='checkbox' class='check_box'><span>Remember Password</span>
        <button type='submit' name='login' class='sub_btn'>Log In</button>
      </form>
      <form id='register' class='inputArea' name='fregister' onsubmit='return validateRegister()' action='' method="POST">
        <input type='text' class='userid' name='ruserid' placeholder='User Id' value="<?php echo $_POST['ruserid']; ?>">
        <input type='text' class='userid' name='remail' placeholder='Email Id' value="<?php echo $_POST['remail']; ?>">
        <input type='password' class='password' name='rpassword' placeholder='Enter Password' value="<?php echo $_POST['rpassword']; ?>">
        <input type='checkbox' class='check_box'><span>I agree to the Terms & Condtions</span>
        <button type='submit' name='register' class='sub_btn'>Register</button>
      </form>
    </div>
  </div>
  <script src='Myscript.js'></script>
</body>

</html>