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
    <link rel="stylesheet" href="../enroll.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Enrol</title>
</head>
<body>
    <style>
        #cardsimg{
            height : 200px;
            width: 430px;
            margin: 10px;
            border-radius : 10px;
        }
        #elearninglogo{
            height:100px;
        }
        a{
            text-decoration : none;
            color : white;
        }
        .uppercards,.lowercards{
            margin-left: 30px;
        }
    </style>
    <div class="header">
        <a href="/PROJET/Users%20Management/Pages/dashboard.php"><img src="../images/logo.png" alt="elearninglogo" id="elearninglogo"></a>
        <hr id="leftline">
        <div class="header-elements">
            <p id="ourcourses">Our Courses</p>
            <p>In progress</p>
            <p>Completed</p>
        </div>
        <hr id="rightline">
    </div>
    <hr>
    <div class="main">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="cards-container">
                <div class="uppercards">
                    <div class="card">
                        <img src="../images/Marketing.jpg" alt="" id="cardsimg">
                        <h1>Marketing and Advertisement</h1>
                        <p>Drawing on a combination of business acumen and creative skills, it involves developing strategies that connect with consumers, build brands and drive business growth. Your day-to-day tasks could include any of the following, and much more besides: Developing advertising strategies. Carrying out market research.</p>
                        <p>Capacity : 16/30</p>
                        <p>Beginner - 24 weeks</p>
                        <div class="enrolandprices">
                        <p>$79.99</p>
                        <button><a href="enrolCourse.php?id=1">Enrol now</a></button>
                    </div>
                </div>
                <div class="card">
                    <img src="../images/ComputerSci.jpg" alt="" id="cardsimg">
                    <h1>Technology and computer science</h1>
                    <p>Technology and computer science courses cover a wide range of topics related to computing and technology. The courses typically introduce students to foundational concepts in computer science and information technology, as well as more advanced topics such as programming languages, algorithms, data structures, computer networking, database management, web development, and cybersecurity.</p>
                    <p>Capacity : 28/30</p>
                    <p>Advanced - 32 weeks</p>
                    <div class="enrolandprices">
                        <p>$99.99</p>
                        <button><a href="enrolCourse.php?id=2">Enrol now</a></button>
                    </div>
                </div>
                <div class="card">
                    <img src="../images/Education.png" alt="" id="cardsimg">
                    <h1>Education and teaching</h1>
                    <p>Education and teaching courses are designed to provide students with the knowledge and skills necessary to become effective educators. These courses cover a broad range of topics, including teaching methodologies, curriculum design and development, assessment and evaluation, classroom management, educational psychology, and more.	</p>
                    <p>Capacity : 10/30</p>
                    <p>Intermediate - 13 weeks</p>
                    <div class="enrolandprices">
                        <p>$89.99</p>
                        <button><a href="enrolCourse.php?id=3">Enrol now</a></button>
                    </div>
                </div>
            </div>
            <div class="lowercards">
                <div class="card">
                    <img src="../images/business.png" alt="" id="cardsimg">
                    <h1>Business and Management</h1>
                    <p>Business and management courses are designed to provide students with a comprehensive understanding of the principles and practices of managing and operating a successful business. These courses cover a broad range of topics, including accounting, finance, marketing, human resources, operations management, and more.</p>
                    <p>Capacity : 18/30</p>
                    <p>Beginner - 12 weeks</p>
                    <div class="enrolandprices">
                        <p>$69.99</p>
                        <button><a href="enrolCourse.php?id=4">Enrol now</a></button>
                    </div>
                </div>
                <div class="card">
                    <img src="../images/arts.png" alt="" id="cardsimg">
                    <h1>Arts and design	</h1>
                    <p>Arts and design courses are designed to provide students with the knowledge and skills necessary to become professional artists, designers, or creative professionals. These courses cover a wide range of topics, including art history, drawing, painting, sculpture, graphic design, web design, photography, animation, and more.</p>
                    <p>Capacity : 28/30</p>
                    <p>Beginner - 4 weeks</p>
                    <div class="enrolandprices">
                        <p>$49.99</p>
                        <button><a href="enrolCourse.php?id=5">Enrol now</a></button>
                    </div>
                </div>
                <div class="card">
                    <img src="../images/health.png" alt="" id="cardsimg">
                    <h1>Health and fitness</h1>
                    <p>The health and fitness category covers topics related to physical and mental health, nutrition, exercise, and overall well-being. It includes information on healthy eating habits, exercise routines, stress management, disease prevention, and medical treatments.</p>
                    <p>Capacity : 8/30</p>
                    <p>Intermediate - 8 weeks</p>
                    <div class="enrolandprices">
                        <p>50.99</p>
                        <button><a href="enrolCourse.php?id=6">Enrol now</a></button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
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
        function successMessage() {
            Toastify({
                text: "Enrollement sucessful, Thank you!",
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
    $conn = new mysqli("localhost", "root", "", "e_learning");
        if (isset($_GET['id'])) {
            $courseId = $_GET['id'];
            // get course status
            $sql = "SELECT * FROM courses WHERE id_course = $courseId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $courselevel = $row["level"];
                $coursename = $row["title"];
                if($row["status"] === "available") {
                    // get capacity and student count
                    $sql = "SELECT capacity,student_count FROM courses WHERE id_course = $courseId";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $courseCapacity = $row['capacity'];
                        $studentcount = $row['student_count'];
                        if($courseCapacity > $studentcount) {
                            $sql = "SELECT * FROM users WHERE id = 86";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $studentlevel = $row["level"];
                                $coursestaken = $row["course"];
                                if($row['status'] === "activated") {
                                    // test if level of course is the same as the level of the student
                                    if($courselevel === $studentlevel) {
                                        if(!$coursestaken) {
                                            $group = 0;
                                            if($studentcount< 10 ){
                                                $group = 1;
                                            }else if($studentcount > 10 && $studentcount < 20 ) {
                                                $group = 2;
                                            }else {
                                                $group = 3;
                                            }
                                            $stmt=$conn->prepare("UPDATE users SET course=? , `Group`=? WHERE id=86");
                                            $stmt->bind_param("si",$coursename,$group);
                                            $stmt->execute();
                                            echo ('<script type="text/javascript">successMessage("Enrollement sucessful, Thank you!")</script>');
                                        }else {
                                        echo ('<script type="text/javascript">errorMessage("Finish your current courses before taking another course.")</script>');
                                        }
                                    }else {
                                        echo ('<script type="text/javascript">errorMessage("Select another course matching your level!")</script>');
                                    }
                                }else {
                            echo ('<script type="text/javascript">errorMessage("Please contact email the staff to activate your account!")</script>');
                                    
                                }
                            }
                        }else {
                            echo ('<script type="text/javascript">errorMessage("Course capacity is full!")</script>');
                        }
                    }
                }else {
                    echo ('<script type="text/javascript">errorMessage("Course is not available")</script>');
                    
                }
            }
        }
?>
</body>
</html>