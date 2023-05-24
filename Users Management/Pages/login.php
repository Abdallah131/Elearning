<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="../Styles/stylelogin.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">

</head>
<body>
  <a href="/PROJET/index.html"><img src="../logo.png" alt="elearninglogo" style="position : absolute; height : 100px; top : 1%; left: -0.5%; cursor: pointer"></a>
  <div class="container">

<div class="title">Login</div>
<br>

<form method="POST">

    <div class="user-details">
    
        <div class="input-box">
            <span class="details">E-mail</span>
            <input type="text" name="email" placeholder="E-mail">

        </div>

        <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Password">
        </div>
    


   <div class="button">
                <input type="submit" value="Login" >
                <input type="reset" value="Clear">
            </div>
            <a href="signup.php" class="ca" style="color: white; font-weight: 800;">Create an account</a>
            <a href="forgetpassword.php" class="ca" style="color: white; font-weight: 800; float:right;">Forget Password</a>

   </div>


  </form>




</body>
</html>

<?php
session_start();


if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if the form fields are empty
  if (empty($_POST['email']) || empty($_POST['password'])) {
    // Call the showToast function with an error message
    showToast("Please fill all the required fields.", "error");
  } else {
    // Process the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'e_learning');

    // Check if the connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the user record from the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      // Verify the password
      if (password_verify($password, $row['password'])) {
        // Set the session variables
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];

        // Redirect the user to the appropriate page based on their role
        if ($_SESSION['role'] == 'Admin') {
          showToast("Welcome To the Admin Account.", "success");
          header("Refresh:2; url=Admin_Dashboard.php");

          // header("Location: Admin_Dashboard.php");
        } elseif ($_SESSION['role'] == 'Instructor') {
          showToast("Welcome To the Instructor Account.", "success");
          header("Refresh:2; url=instructor.php");
        } else {
          showToast("Welcome To the Student Account.", "success");
          header("Refresh:2; url=dashboard.php");
        }
      } else {
        showToast("Incorrect password.", "error");
      }
    } else {
      showToast("User not found.", "error");
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