<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styleprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">


    <title>Profile</title>
    
</head>

<body>
  

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style=" display:flex;  align-items: center; border-radius:10px; height:50px;  background-color: #263238 ; margin-left:5px ; margin-right: 5px;
" >
    <li class="breadcrumb-item active" aria-current="page"
    style="color : white; font-weight :bold ; font-weight: 900; margin-left:50px; list-style-type: none;" > Profile </li>
   
    <form action="" method="post">
  <input type="submit" name="logoutBtn" value="Logout" style="position: absolute; top: -2px; right: 10px; 
  height: 30px;
    width: 120px;
    border-radius: 12px;
    border: none;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(13,195,225,1) 0%, rgba(75,32,217,0.633578431372549) 100%);
    margin: 12px;"

   
>


  
</nav>
</a>
</form>

<form action="" method="post">
<a href="dashboard.php">
  <input type="button" value="Dashboard" style="position: absolute; top: -2px; right: 150px; 
  height: 30px;
    width: 120px;
    border-radius: 12px;
    border: none;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(13,195,225,1) 0%, rgba(75,32,217,0.633578431372549) 100%);
    margin: 12px;"
>
</a>

</form>




<div class="container">
    <div class="title">UPDATE PROFILE</div>
    <br>
    <form method="POST" action="">
        <div class="user-details">
        <div class="input-box">
                    <span class="details">Name & Surname</span>
                    <input type="text" name="name" placeholder="full name">
                </div>
            <div class="input-box">
                <span class="details">E-mail</span>
                <input type="text" name="email" value="" placeholder="E-mail">
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" value="" placeholder="*******">
            </div>
            <div class="button">
            <input type="submit" name="updateBtn" value="Update">
                <input type="reset" value="Clear">
            </div>
        </div>
    </form>
</div>

</body>
</html>

<?php
if (!isset($_SESSION)) {
  session_start();
}

// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION["name"])){
  header("location: login.php");
  exit;
}


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateBtn'])) {
  // Check if the form fields are empty
  if (empty($_POST['name']) ||  empty($_POST['email']) || empty($_POST['password'])) {
    // Call the showToast function with an error message
    showToast("Please fill in all the fields.", "error");
  } else {
    // Process the form data
    // Get the current user's name from the session
    $currentUser = $_SESSION['name'];

    // Update the user's information in the database
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pdo = new PDO('mysql:host=localhost;dbname=e_learning', 'root', '');
    $stmt = $pdo->prepare('UPDATE users SET name = :name, email = :email, password = :password WHERE name = :current_user');
    $stmt->execute(['name' => $newName, 'email' => $newEmail, 'password' => $newPassword, 'current_user' => $currentUser]);

    // Call the showToast function with a success message
    showToast("Your profile has been updated successfully.", "success");
    header("Refresh:3; url=login.php");
  }
}

if (isset($_POST['logoutBtn'])) {
  // Destroy the session
  session_destroy();
  

  // Call the showToast function with a success message
  showToast("Logging out...", "success");
  // Redirect to the login page after 3 seconds
  header("Refresh:3; url=login.php");
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