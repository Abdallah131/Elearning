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
    <title>Affect Course</title>
</head>
<body>
<style>
        #arrowlogo{
            position:absolute;
            height:80px;
            right:15%;
            top:3%;
            transition : 0.7s;
            transform:rotate(180deg);
        }
        #arrowlogo:hover{
            transform:rotate(0deg);
        }
        .below--main{
            position: absolute;
            top : 20%;
            right : 17%
        }
    </style>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="main--container" id="maincontaineraffect">
        <a href="/PROJET/Instructors%20Management/Pages/consultInstructor.php"><img src="../images/arrow.png" alt="elearninglogo" id="arrowlogo"></a>
            <div class="header" id="affecthd">
                <img src="../images/logo.png" alt="elearninglogo">
                <h1 style="margin-left: 230px;">Affect Instructor</h1>
            </div>
            <div class="below--main">
                <div class="inputs--container" id="affectcourseinputs">
                    <div class="student--container">
                        <h1 style="font-size: 24px; margin-top:-10px;margin-bottom:20px">Instructos Informations</h1>
                        <input
                        type="hidden"
                        name="searchid"
                        id="searchid"
                        placeholder="ID"
                        >
                        <input
                            type="text"
                            name="name"
                            id="name"
                            placeholder="Name"
                        ><br/><br/>
                        <input
                            type="text"
                            name="email"
                            id="email"
                            placeholder="Email"
                        ><br/><br/>
                        <input
                            type="text"
                            name="telephone"
                            id="telephone"
                            placeholder="Telephone"
                        ><br/><br/>
                         <input
                        type="date"
                        name="date"
                        id="date"
                        placeholder="Date"
                        ><br/>
                        <button style="width:400px; position : absolute; left : 30%;top : 80%" name="affectsubmit" type="submit">Affect Instructor</button>
                    </div>
                    <div class="intructor--container">
                        <br/><br/>
                        <input
                            type="text"
                            name="country"
                            id="country"
                            placeholder="Country"
                        ><br/><br/>
                        <input
                            type="text"
                            name="gender"
                            id="gender"
                            placeholder="Gender"
                        ><br/><br/>
                        <input
                        type="text"
                        name="level"
                        id="level"
                        placeholder="Level"
                        ><br/><br/>
                        <input
                        type="text"
                        name="group"
                        id="group"
                        placeholder="Group"
                        >
                    </div>
                    <div class="courses--container" id="coursesradiobuttons" style="margin-top:-20px">
                        <h1 style="font-size: 24px;">Courses</h1>
                        <input type="radio" id="MAA" name="courseradiobtn" value="Marketing and Advertisement">
                        <label for="MAA">Marketing and Advertisement</label><br><br/>
                        <input type="radio" id="TCC" name="courseradiobtn" value="Technology and computer science">
                        <label for="TCC">Technology and computer science</label><br><br/>
                        <input type="radio" id="EAD" name="courseradiobtn" value="Education and teaching">
                        <label for="EAD">Education and teaching</label><br/><br/>
                        <input type="radio" id="BAM" name="courseradiobtn" value="Business and Management">
                        <label for="BAM">Business and Management</label><br/><br/>
                        <input type="radio" id="AAD" name="courseradiobtn" value="Arts and design">
                        <label for="AAD">Arts and design</label><br/><br/>
                        <input type="radio" id="HAF" name="courseradiobtn" value="Health and fitness">
                        <label for="HAF">Health and Fitness</label>
                    </div>
                </div>
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
                position: "left",
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
                position: "left",
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
                $sql = "SELECT * FROM users WHERE id=$id";
                $result = $conn-> query($sql);
                $users = $result -> fetch_all(MYSQLI_ASSOC);
                if ($result->num_rows > 0) {
                    echo ('<script type="text/javascript">successMessage("instructor informations :")</script>');
                    foreach ($users as $user) {
                        echo '<script>';
                        echo 'document.getElementById("searchid").value = "' . $user['id'] . '";';
                        echo 'document.getElementById("name").value = "' . $user['name'] . '";';
                        echo 'document.getElementById("email").value = "' . $user['email'] . '";';
                        echo 'document.getElementById("telephone").value = "' . $user['telephone'] . '";';
                        echo 'document.getElementById("date").value = "' . $user['birthdate'] . '";';
                        echo 'document.getElementById("country").value = "' . $user['pays'] . '";';
                        echo 'document.getElementById("gender").value = "' . $user['gender'] . '";';
                        echo 'document.getElementById("level").value = "' . $user['level'] . '";';
                        echo 'document.getElementById("group").value = "' . $user['Group'] . '";';
                        echo '</script>';
                    }
                }else {
                    echo ('<script type="text/javascript">errorMessage("instructor doesnt exist in the database")</script>');
                }
            }
        }
        if(isset($_POST["affectsubmit"])) {
            $id = $_POST["searchid"];
            $name = $_POST["name"];
            $telephone = $_POST["telephone"];
            $gender= $_POST["gender"];
            $country = $_POST["country"];
            $email = $_POST["email"];
            $level = $_POST["level"];
            $Group = $_POST["group"];
            $birthdate = $_POST["date"];
            $selectecourse = $_POST["courseradiobtn"];
            if(empty($name)) {
                echo ('<script type="text/javascript">errorMessage("Name is empty!")</script>');
            }
            if(empty($telephone)) {
                echo ('<script type="text/javascript">errorMessage("Telephone is empty!")</script>');
            }
            if(empty($gender)) {
                echo ('<script type="text/javascript">errorMessage("Gender is empty!")</script>');
            }
            if(empty($country)) {
                echo ('<script type="text/javascript">errorMessage("Country is empty!")</script>');
            }
            if(empty($level)) {
                echo ('<script type="text/javascript">errorMessage("Level is empty!")</script>');
            }
            if(empty($email)) {
                echo ('<script type="text/javascript">errorMessage("Email is empty!")</script>');
            }
            if(empty($Group)) {
                echo ('<script type="text/javascript">errorMessage("Group is empty!")</script>');
            }
             if(empty($birthdate)) {
            echo ('<script type="text/javascript">errorMessage("birthdate is empty!")</script>');
            }
            if(!empty($name) && !empty($telephone) && !empty($gender) && !empty($country) && !empty($level) && !empty($email) && !empty($Group) && !empty($birthdate) && !empty($selectecourse)){
                $sql = "SELECT * FROM users WHERE id = $id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $dbcourse = $row["course"];
                    if($dbcourse === $selectecourse) {
                        echo ('<script type="text/javascript">errorMessage("Cant affect the same course the instructor has!")</script>');
                    }else {
                        if($row["status"] === "activated") {
                            if(!$row["Group"]) {
                                $stmt=$conn->prepare("UPDATE users SET course=?, `Group`=? WHERE id=?");
                                $stmt->bind_param("sii",$selectecourse,$Group,$id);
                                $stmt->execute();
                                echo ('<script type="text/javascript">successMessage("Course affected to instructor!")</script>');
                                echo($conn->error);
                            }else {
                                echo ('<script type="text/javascript">errorMessage("Instructors already has a group affected to him!")</script>');
                            }
                        }else {
                        echo ('<script type="text/javascript">errorMessage("Instructors status must be activated!")</script>');
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>