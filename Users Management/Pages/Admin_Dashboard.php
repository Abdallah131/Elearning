<?php
session_start();
// require "header.php"; // BUG F TOASTR SMALL
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
      <link rel="stylesheet" href="../Styles/styleprofile.css">
      <link rel="stylesheet" href="../Styles/stylestat.css">
         
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/ec796b7a5b.js" crossorigin="anonymous"></script>
    
    <title>Admin dashboard</title>
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">

</head>
<body>

<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style=" border-radius:10px; height:50px;  background-color: #263238 ; margin-left:5px ; margin-right: 5px;
" >
    <li class="breadcrumb-item active" aria-current="page"
    style="color : white; font-weight :  bold ; font-weight: 1000; margin-left:10px; margin-top:10px;" > Welcome <span style="color:white; margin-left: 6px;"> <?php echo $_SESSION['name']; ?></span></li>

    <form action="" method="post">
  <input type="submit" id="logout-btn" value="Logout" name="logoutBtn" style="position: absolute; top: -2px; right: 10px; 
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
<a href="profileadmin.php">
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
  <style>
body{
    height: 100%;
    font-family: 'Source Sans Pro', sans-serif;
    overflow: hidden;
}
.header {
    height: 80px;
    display: flex;
    justify-content: space-between;
}
.header-right label{
  font-weight: bold;
  cursor: pointer;
  margin-right: 20px;
  color: #3A4250;
}
.header-elements{
  display: flex;
  margin-right: 150px;
}
.header-elements p{
  font-size: 25px;
  font-weight: bold;
  margin-right: 100px;
  margin-top: 35px;
  color: #3A4250;
}
hr{
  box-shadow: -2px 5px 13px 0px rgba(0,0,0,0.75);
}
#elearninglogo{
  cursor: pointer;
  height: 100px;
}

  </style>
<div class="header">
        <a href="#"><img src="/PROJET/Users%20Management/logo.png" alt="elearninglogo" id="elearninglogo"></a>
        <hr id="leftline">
        <div class="header-elements">
            <a href="/PROJET/Student%20Management/ManageStudent.php"><p id="ourcourses">Manage Students</p></a>
            <a href="/PROJET/Courses%20Management/frontend/Pages/consultCourses.php"><p>Manage Courses</p></a>
            <a href="/PROJET/Instructors%20Management/Pages/consultInstructor.php"><p>Manage Instructors</p></a>
        </div>
        <hr id="rightline">
        </div>
    </div>
    <hr>
</body>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container bootstrap snippet"style="height:520px;margin-left:200px;margin-top:-4px">
  <div class="row" >
    <div class="col-lg-2 col-sm-6" >
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;"> Users</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users ORDER BY id";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
      
    </div>

    
     
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading red"><i class="fas fa-user-graduate fa-xs fa-3x" style="margin-top: 30px;"></i></i></div></a>
        <div class="circle-tile-content red">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Students</div>
          <div class="circle-tile-number text-faded ">
            <?php
          $conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where role='Student'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1> '.$row.' </h1>';
                ?>
          </div>
          
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div> 

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fas fa-chalkboard-teacher fa-fw fa-3x"style="margin-top: 13px;"></i></i></div></a>
        <div class="circle-tile-content " style="background-color:#05A8AA">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Instructors</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where role='Instructor'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
      
    </div>

    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fas fa-user-shield fa-fw fa-3x"style="margin-top: 12px;"></i></i></div></a>
        <div class="circle-tile-content dark-blue">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Admins</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where role='Admin'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
      
      
    </div>
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fas fa-male fa-fw fa-3x"style="margin-top: 12px;"></i></i></div></a>
        <div class="circle-tile-content " style="background-color:#007CBE">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">MALES</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where gender='Male'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fa fa-female fa-fw fa-3x"></i></div></a>
        <div class="circle-tile-content " style="background-color:#FB3640">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Females</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where gender='Female'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
  </div> 
  <div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="far fa-star-half fa-fw fa-3x"style="margin-top: 12px;"></i></i></div></a>
        <div class="circle-tile-content " style="background-color:#6247AA">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Beginner</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where level='Advanced'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
</div>  
<div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="far fa-star-half-alt fa-fw fa-3x"style="margin-top: 12px;"></i></i></div></a>
        <div class="circle-tile-content " style="background-color:#FF6978">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Intermediate</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where level='Intermediate'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
</div>
<div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="far fa-star fa-fw fa-3x"style="margin-top: 12px;"></i></i></div></a>
        <div class="circle-tile-content " style="background-color:#802392">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Advanced</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id fROM users where level='Intermediate'";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
</div>
<div class="col-lg-2 col-sm-6">
      <div class="circle-tile ">
        <a href="#"><div class="circle-tile-heading dark-blue"><i class="fas fa-book fa-fw fa-3x"style="margin-top: 13px;"></i></i></div></a>
        <div class="circle-tile-content " style="background-color:#7CDF64">
          <div class="circle-tile-description text-faded"style="font-size:20px;color:white; font-weight: bold;">Courses</div>
          <div class="circle-tile-number text-faded ">
  <?php
$conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query="SELECT id_course fROM courses ";
                $query_run= mysqli_query($conn, $query);
                $row = mysqli_num_rows( $query_run);

                echo '<h1>'.$row.'</h1>';
  ?>         
          </div>
          <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
        </div>
      </div>
</div>


</html>

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



