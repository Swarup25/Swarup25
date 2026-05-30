<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}
$conn = mysqli_connect("localhost", "root", "", "mydb");
if ($conn === false) {
    die("ERROR: Could not Connect! " . mysqli_connect_error());
}
if (isset($_POST["submit"])) {
    $user_id = mysqli_real_escape_string($conn, $_POST["userid"]);
    $full_name = mysqli_real_escape_string($conn, $_POST["full_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $photo_name = mysqli_real_escape_string($conn, $_FILES["photo"]["name"]);
    $photo_tmp_name = $_FILES["photo"]["tmp_name"];
    $photo_size = $_FILES["photo"]["size"];
    $photo_new_name = rand() . $photo_name;
    if ($photo_size > 5242880) {
        echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
    } else {
        $sql = "UPDATE logindb SET id='$user_id',full_name='$full_name', email='$email', password='$password', address='$address', photo='$photo_new_name' WHERE id='{$_SESSION["user_id"]}'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Profile Updated successfully.');</script>";
            move_uploaded_file($photo_tmp_name, "uploads/" . $photo_new_name);
        } else {
            echo "<script>alert('Profile can not Updated.');</script>";
            echo  $conn->error;
        }
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

    <link rel='stylesheet' type='text/css' href='Mystyle2.css'>

</head>

<body>
    <div class='cover'>
        <div class='box'>
            <h2>Profile</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <?php

                $sql = "SELECT * FROM logindb WHERE id='{$_SESSION["user_id"]}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <div class="inputBox">
                            <input type="text" id="userid" name="userid" placeholder="User Id" value="<?php echo $row['id']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="text" id="full_name" name="full_name" placeholder="Full Name" value="<?php echo $row['full_name']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <input type="text" id="address" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" required>
                        </div>
                        <div class="inputBox">
                            <label for="photo">Profile Picture</label>
                            <input type="file" accept="image/*" id="photo" name="photo" required>
                        </div >
                        <div class="profile_pic">
                        <img src="uploads/<?php echo $row["photo"]; ?>" alt="">
                        </div>
                        <div class="sub_btn">
                            <button type="submit" name="submit" class="btn">Update Profile</button>
                        </div>
                <?php
                    }
                }
                
                ?>
                <div class="logout">
                    <center><a href='log_out.php'>Log Out</a></center>
                </div>
            </form>
        </div>
    </div>
</body>

</html>