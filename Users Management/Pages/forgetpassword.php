<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget password</title>
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   <link rel="stylesheet" href="../Styles/stylelogin.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
<a href="/PROJET/Users%20Management/Pages/login.php"><img src="../logo.png" alt="elearninglogo" style="position : absolute; height : 100px; top : 1%; left: -0.5%; cursor: pointer"></a>
    
<div class="container">

<div class="title">Forget Password</div>
<br>

<form method="POST">

    <div class="user-details">
    
        <div class="input-box">
            <span class="details">E-mail</span>
            <input type="text" name="email" placeholder="E-mail">

        </div>

   <div class="button">
                <input type="submit" value="Forgot Password" >
                <input type="reset" value="Clear">
            </div>
            <a href="login.php" class="ca" style="color: white; font-weight: 800;">Login to Your Account</a>

   </div>


  </form>




</body>
</html>

<?php
// Include the PHPMailer class
require_once '../PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer-master/src/SMTP.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if the form field is empty
  if (empty($_POST['email'])) {
    // Call the showToast function with an error message
    showToast("Please enter your email address.", "error");
  } else {
    // Process the form data
    $email = $_POST['email'];
    
    // Create a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'e_learning');

    // Check if the connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
      // Call the showToast function with an error message
      showToast("The email address you entered does not exist in our database.", "error");
    } else {
      // Generate a new password and update the user's record in the database
      $newPassword = bin2hex(random_bytes(8));
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      $sql = "UPDATE users SET password='$hashedPassword' WHERE email='$email'";
      mysqli_query($conn, $sql);

      // Send the new password to the user's email address using PHPMailer
      $mail = new PHPMailer\PHPMailer\PHPMailer();
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'ghazismach24@gmail.com'; // your Gmail address
      $mail->Password = 'gkogpyhahdusbbtn  '; // your Gmail password
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('ghazismach24@gmail.com'); // your Gmail address
      $mail->addAddress($email); // recipient email

      $mail->isHTML(true);
      $mail->Subject = 'Password Reset Request';
      $mail->Body    = 'Welcome To E-Learning Platform This Is You new Password : ' . $newPassword;

      if(!$mail->send()) {
        // Call the showToast function with an error message
        showToast("There was an error sending the email. Please try again later.", "error");
      } else {
        // Call the showToast function with a success message
        showToast("A new password has been sent to your email address.", "success");
      }
    }

    // Close the database connection
    mysqli_close($conn);

  }
}

function showToast($message, $type) {
    if ($type == "success") {
      echo "<script>
              toastr.success('$message', '', {
                timeOut: 3000,
                positionClass: 'toast-top-right'
                
              });
            </script>";
    } else if ($type == "error") {
      echo "<script>
              toastr.error('$message', '', {
                timeOut: 3000,
                positionClass: 'toast-top-right'
              });
            </script>";
    }
  }
  
  ?>

