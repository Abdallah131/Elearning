<?php


if (!isset($_SESSION)) {
  session_start();
}

// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION["name"])){
  header("location: /PROJET/Users%20Management/Pages/login.php");
  exit;
}
 require "header.php" ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Update Course</title>
</head>
<body>
<style>
        #arrowlogo{
            position:absolute;
            height:80px;
            right:3%;
            top:5%;
            transition : 0.7s;
            transform:rotate(180deg);
        }
        #arrowlogo:hover{
            transform:rotate(0deg);
        }
        #updateCourseButton{
            position: absolute;
            top: 67%;
            right : 25%
        }
        #searchid{
            width: 80px;
            position:absolute;
            top: 15%;
        }
        .inputs--container{
            margin-top: 0px;
        }
        .main--container{
            position: absolute;
            right : 13.5%;
        }
        #updateCourseButton{
            top : 76%;
            right: 8%;  
        }
    </style>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="main--container">
        <a href="consultCourses.php"><img src="../images/arrow.png" alt="elearninglogo" id="arrowlogo"></a>
            <div class="header">
                <img src="../images/logo.png" alt="elearninglogo">
                <h1 id="updateh1">Update Course</h1>
            </div>
            <div class="inputs--container">
                <div class="left--container">
                    <input
                        type="hidden"
                        name="searchid"
                        id="searchid"
                        placeholder="ID"
                    >
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Title"
                    ><br/><br/>
                    <input
                        type="text"
                        name="price"
                        id="price"
                        placeholder="Price"
                    ><br/><br/>
                    <input
                        type="text"
                        name="duration"
                        id="duration"
                        placeholder="Duration"
                    ><br/><br/>
                    <input
                        type="text"
                        name="completion"
                        id="completion"
                        placeholder="Completion Requirements"
                    ><br/><br/>
                    <input
                        type="text"
                        name="Level"
                        id="Level"
                        placeholder="Level"
                    ><br/><br/>
                    <input
                        type="text"
                        name="capacity"
                        id="capacity"
                        placeholder="Capacity"
                    >
                </div>
                <div class="right--container">
                    <textarea name="description" id="description" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="footer">
                <button type="submit" name="submit" id="updateCourseButton">Update Course</button>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript">
        function errorMessage(name) {
            Toastify({
                text: `${name}`,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #f53b57, #ef5777)",
                },
            }).showToast();
        }
        function successMessage(name) {
            Toastify({
                text: `${name}`,
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
                }).showToast();
        }
    </script>
    <?php
            error_reporting(E_ALL ^ E_NOTICE); 
            $conn = new mysqli ("localhost","root","","e_learning");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else {
                $id = $_GET["id"];
                if(empty($id)) {
                }else {
                    $sql = "SELECT * FROM courses WHERE id_course=$id";
                    $result = $conn-> query($sql);
                    $users = $result -> fetch_all(MYSQLI_ASSOC);
                    if ($result->num_rows > 0) {
                        echo ('<script type="text/javascript">successMessage("Course informations :")</script>');
                        foreach ($users as $user) {
                            echo '<script>';
                            echo 'document.getElementById("searchid").value = "' . $user['id_course'] . '";';
                            echo 'document.getElementById("title").value = "' . $user['title'] . '";';
                            echo 'document.getElementById("price").value = "' . $user['price'] . '";';
                            echo 'document.getElementById("duration").value = "' . $user['duration'] . '";';
                            echo 'document.getElementById("completion").value = "' . $user['completion_requirements'] . '";';
                            echo 'document.getElementById("description").value = "' . $user['description'] . '";';
                            echo 'document.getElementById("Level").value = "' . $user['level'] . '";';
                            echo 'document.getElementById("capacity").value = "' . $user['capacity'] . '";';
                            echo '</script>';
                        }
                    }else {
                        echo ('<script type="text/javascript">errorMessage("Course doesnt exist in the database")</script>');
                    }
                }
            }
            
    if(isset($_POST["submit"])) {
        $conn = new mysqli ("localhost","root","","e_learning");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else {
                $id = $_POST["searchid"];
                echo($id);
                $title = $_POST["title"];
                $price = $_POST["price"];
                $duration = $_POST["duration"];
                $comp_rq = $_POST["completion"];
                $description = $_POST["description"];
                $level = $_POST["Level"];
                $capacity = $_POST["capacity"];
                if(empty($title)) {
                    echo ('<script type="text/javascript">errorMessage("Title is empty!")</script>');
                }
                if(empty($price)) {
                    echo ('<script type="text/javascript">errorMessage("Price is empty!")</script>');
                }
                if(empty($duration)) {
                    echo ('<script type="text/javascript">errorMessage("Duration is empty!")</script>');
                }
                if(empty($comp_rq)) {
                    echo ('<script type="text/javascript">errorMessage("Completion Requirements is empty!")</script>');
                }
                if(empty($description)) {
                    echo ('<script type="text/javascript">errorMessage("Description is empty!")</script>');
                }
                if(empty($level)) {
                    echo ('<script type="text/javascript">errorMessage("Level is empty!")</script>');
                }
                if(empty($capacity)) {
                    echo ('<script type="text/javascript">errorMessage("Cpacity is empty!")</script>');
                }
                echo($conn->error);
                if(!empty($title) && !empty($price) && !empty($duration) && !empty($comp_rq) && !empty($description) && !empty($level) && !empty($capacity)){
                    $stmt=$conn->prepare("UPDATE courses SET title=?,price=?,duration=?,completion_requirements=?,description=?,level=?,capacity = ? WHERE id_course=?");
                    $stmt->bind_param("sdsssssi",$title,$price,$duration,$comp_rq,$description,$level,$capacity,$id);
                    $stmt->execute();
                    echo ('<script type="text/javascript">successMessage("Course Upated!")</script>');
                }
        }
    }
    ?>
</body>
</html>