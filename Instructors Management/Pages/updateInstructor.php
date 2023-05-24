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
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Update Course</title>
</head>
<body>
<style>
        #arrowlogo{
            position:absolute;
            height:80px;
            right:20%;
            top:8%;
            transition : 0.7s;
            transform:rotate(180deg);
        }
        #arrowlogo:hover{
            transform:rotate(0deg);
        }
        #updateInstructoreButton{
            position: absolute;
            top: 69%;
            right : 40%
        }
        #searchid{
            width: 80px;    
            position:absolute;
            top: 15%;
        }
        .inputs--container{
            margin-top: 0px;
        }
    </style>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="main--container">
        <a href="consultInstructor.php"><img src="../images/arrow.png" alt="elearninglogo" id="arrowlogo"></a>
            <div class="header">
                <img src="../images/logo.png" alt="elearninglogo">
                <h1 id="updateh1">Update instructor</h1>
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
                        name="Name"
                        id="Name"
                        placeholder="Name"
                    ><br/><br/>
                    <input
                        type="mail"
                        name="Email"
                        id="Email"
                        placeholder="Email"
                    ><br/><br/>
                    <input
                        type="text"
                        name="Telephone"
                        id="Telephone"
                        placeholder="Telephone"
                    ><br/><br/>
                    <input 
                        type="text" 
                        name="Gender" 
                        id="Gender"
                        placeholder="Gender" 
                    >
            </div>
                <div class="right--container">
                <input
                        type="text"
                        name="Country"
                        id="Country"
                        placeholder="Country"
                    ><br/><br/>
                    <input
                        type="date"
                        name="Birthdate"
                        id="Birthdate"
                        placeholder="Birthdate"
                    ><br/><br/>

                    <input 
                        type="text" 
                        name="Level" 
                        id="Level"
                        placeholder="Level" 
                    >
                    <br/><br/>
            
                    <input 
                        type="text" 
                        name="Group" 
                        id="Group"
                        placeholder="Group"
                    > 
                </div>
                    </div>
                        <div class="footer">
                <button type="submit" name="submit" id="updateInstructoreButton">Update Instructor </button>
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
                    $sql = "SELECT * FROM users WHERE id=$id";
                    $result = $conn-> query($sql);
                    $users = $result -> fetch_all(MYSQLI_ASSOC);
                    if ($result->num_rows > 0) {
                        echo ('<script type="text/javascript">successMessage("instructor informations :")</script>');
                        foreach ($users as $user) {
                            echo '<script>';
                            echo 'document.getElementById("searchid").value = "' . $user['id'] . '";';
                            echo 'document.getElementById("Name").value = "' . $user['name'] . '";';
                            echo 'document.getElementById("Email").value = "' . $user['email'] . '";';
                            echo 'document.getElementById("Telephone").value = "' . $user['telephone'] . '";';
                            echo 'document.getElementById("Birthdate").value = "' . $user['birthdate'] . '";';
                            echo 'document.getElementById("Country").value = "' . $user['pays'] . '";';
                            echo 'document.getElementById("Gender").value = "' . $user['gender'] . '";';
                            echo 'document.getElementById("Level").value = "' . $user['level'] . '";';
                            echo 'document.getElementById("Group").value = "' . $user['Group'] . '";';
                            echo '</script>';
                        }
                    }else {
                        echo ('<script type="text/javascript">errorMessage("instructor doesnt exist in the database")</script>');
                    }
                }
            }
            
    if(isset($_POST["submit"])) {
        $conn = new mysqli ("localhost","root","","e_learning");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else {
                $id = $_POST["searchid"];
                $name = $_POST["Name"];
                $telephone = $_POST["Telephone"];
                $gender= $_POST["Gender"];
                $country = $_POST["Country"];
                $email = $_POST["Email"];
                $level = $_POST["Level"];
                $Group = $_POST["Group"];
                $birthdate = $_POST["Birthdate"];
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
                if(!empty($name) && !empty($telephone) && !empty($gender) && !empty($country) && !empty($level) && !empty($email) && !empty($Group) && !empty($birthdate)){
                    $stmt=$conn->prepare("UPDATE users SET name=?,telephone=?,gender=?,pays=?,email=?,level=?,`Group` = ?,birthdate = ? WHERE id=?");
                    $stmt->bind_param("ssssssssi",$name,$telephone,$gender,$country,$email,$level,$Group,$birthdate,$id);
                    $stmt->execute();
                    echo ('<script type="text/javascript">successMessage("Instructor Upated!")</script>');
                }
        }
    }
    ?>
</body>
</html>