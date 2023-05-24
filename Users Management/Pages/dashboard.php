<?php
session_start();
require "header.php";
if (!isset($_SESSION["name"])) {
  header("location: login.php");
  exit;
}

$name = isset($_GET['name']) ? $_GET['name'] : $_SESSION['name'];

ob_start(); // start output buffering

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Styles/styleDashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>



<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style=" border-radius:10px; height:50px;  background-color: #263238 ; margin-left:5px ; margin-right: 5px;
" >
    <li class="breadcrumb-item active" aria-current="page"
    style="color : white; font-weight :  bold ; font-weight: 900; margin-left:10px;" > Welcome <span style="color:white; margin-left: 6px;"> <?php echo $_SESSION['name']; ?></span></li>

    <form action="" method="post">
  <input type="submit" id="logout-btn" value="Logout" style="position: absolute; top: -2px; right: 10px; 
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


</form>

<form action="" method="post">
<a href="profile.php">
  <input type="button" value="Profile" style="position: absolute; top: -2px; right: 150px; 
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
</ol>
</a>
</form>

  </ol>
</nav>
<h2>YOU ONLY HAVE TO <br> KNOW ONE THING <br></h2>
<h1>YOU CAN LEARN <br>  ANYTHING</h1>
<a href="/PROJET/Courses%20Management/frontend/Pages/enrolCourse.php"><h1 class="enroltitle"><button>Enrol now!</button></h1></a>
<style>
 
 h1{
    position: absolute;
  top:80%;
  left: 28%;
  transform: translate(-50%, -50%);
  font-size: 80px;
  color: aliceblue;
  font-family: Inter;

}
h2{
    position: absolute;
    top: 10%;
    left:22% ;
    transform: translate(-50%, -50%);
    font-size: 50px;
    padding-left: 20px;
    margin-top: 9%;
    letter-spacing: 2px;
    font-family: Inter ;
    color: aliceblue;


}
button{
  position:flex;
  top: 50px;
  left: 20%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size:60px;
  padding: 15px 30px;
  border-radius: 15px;
  border: 1px solid #eb9a6b;
  color: #fff;
  background-color: #eb9a6b;
  cursor: pointer;
  transition: background-color 0.3s ease;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  height:80px;
}

button[type=submit]:hover {
  background-color: #eb9a6b;
  border-color: #eb9a6b;
  top: 120px;
}
.enroltitle{
  top:50%;
  font-size:60px;
}



        body{

background-image:url("../pd.png") ;
background-size: cover;

        }
</style>

<a href="/PROJET/Courses%20Management/frontend/Pages/enrolCourse.php"><h1 class="enroltitle"><button>Enrol now!</button></h1></a>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Destroy the session
  session_destroy();
  // Call the showToast function with a success message
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
  showToast("Logging out...", "success");

  // Redirect to the login page after 3 seconds
  header("Refresh:3; url=login.php");
}


?>

