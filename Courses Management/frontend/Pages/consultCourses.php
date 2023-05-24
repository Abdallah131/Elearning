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
    <link rel="stylesheet" href="../consultCourses.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Courses List</title>
</head>
<body>    
<style>
    .status-btn{
        background-color:green;
        border: none;
        color: white;
        padding: 0.5em 1em;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 0.8em;
        margin: 0.2em;
        cursor: pointer;
        border-radius: 5px;
        transition: 0.3s;
    }
    </style>
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
    <div class="header">
        <a href="/PROJET/Users%20Management/Pages/Admin_Dashboard.php"><img src="../images/logo.png" alt="elearninglogo"></a>
        <h1>Manage Courses</h1>
        <div class="buttons">
            <a href="addCourses.php"><button id="addcoursesButton">+ Add Courses</button></a>
        </div>
    </div>
    </form>
    <div class="main--container">
        <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Completion Requirements</th>
                <th>Description</th>
                <th>Level</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = new mysqli("localhost", "root", "", "e_learning");
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // DELETE
                if (isset($_POST['delsubmit'])) {
                    $id = $_POST['delid'];
                    $sql = "DELETE FROM courses WHERE id_course = $id";
                    if (mysqli_query($conn, $sql)) {
                        echo ('<script type="text/javascript">successMessage("Course Deleted!")</script>');
                    } else {mysqli_error($conn);
                        echo ('<script type="text/javascript">errorMessage("Error occured.)</script>');
                    }
                }
                // SET STATUS
                if (isset($_POST['statusbtn'])) {
                    $id = $_POST['delid'];
                    $sql = "SELECT status FROM courses WHERE id_course = $id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if($row['status'] === "available") {
                            $stat = "unavailable";
                        }else {
                            $stat = "available";
                        }
                        $stmt=$conn->prepare("UPDATE courses SET status = ? WHERE id_course = ?");
                        $stmt->bind_param("si",$stat, $id);
                        $stmt->execute();
                    } else {
                        echo ('<script type="text/javascript">errorMessage("Error occured.)</script>');
                    }
                }
                // GET LIST
                $sql = "SELECT * FROM courses";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_course"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["duration"] . "</td>";
                    echo "<td>" . $row["completion_requirements"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["level"] . "</td>";
                    echo "<td>" . $row["capacity"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action='updateCourses.php'>";
                    echo "<input type='hidden' name='delid' value='" . $row["id_course"] . "'>";
                    echo "<a class='edit-btn' type='submit' name='editsubmit' href='updatecourses.php?id=" . $row["id_course"] . "'>Edit</a>";
                    echo "</form>";
                    echo" <form method='post' action=''>";
                    echo "<input type='hidden' name='delid' value='" . $row["id_course"] . "'>";
                    echo "<button class='cancel-btn' type='submit' name='delsubmit'>Delete</button>";
                    echo "<button class='status-btn' type='submit' name='statusbtn'>Status</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>
