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
    <link rel="stylesheet" href="../consultInstructor.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>Instructors List</title>
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
    #updatebtn{
        background-color: #f0932b;
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
        <h1 style="margin-right:430px">Manage Instructors</h1>
    </div>
    </form>
    <div class="main--container">
        <table>
        <thead>
            <tr>
                <th>Instructor ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Birthdate</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Level</th>
                <th>Group</th>
                <th>Status</th>
                <th>Action</th>
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
                    $sql = "DELETE FROM users WHERE id = $id";
                    if (mysqli_query($conn, $sql)) {
                        echo ('<script type="text/javascript">successMessage("Course Deleted!")</script>');
                    } else {mysqli_error($conn);
                        echo ('<script type="text/javascript">errorMessage("Error occured.)</script>');
                    }
                }
                // SET STATUS
                if (isset($_POST['statusbtn'])) {
                    $id = $_POST['delid'];
                    $stmt = $conn->prepare("SELECT status FROM users WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $stat = ($row['status'] === "activated") ? "disactivated" : "activated";
                        $stmt = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
                        $stmt->bind_param("si", $stat, $id);
                        if ($stmt->execute()) {
                        echo ('<script type="text/javascript">successMessage("Status updated!")</script>');
                        } else {
                            echo ('<script type="text/javascript">errorMessage("Error occurred.")</script>');
                        }
                    } else {
                        echo ('<script type="text/javascript">errorMessage("User not found.")</script>');
                    }
                }                
                // GET LIST
                $sql = "SELECT * FROM users WHERE role = 'Instructor'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["telephone"] . "</td>";
                    echo "<td>" . $row["birthdate"] . "</td>";
                    echo "<td>" . $row["pays"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["level"] . "</td>";
                    echo "<td>" . $row["Group"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action='updateCourses.php'>";
                    echo "<input type='hidden' name='delid' value='" . $row["id"] . "'>";
                    echo "<a class='edit-btn' type='submit' name='editsubmit' href='affectCourse.php?id=" . $row["id"] . "'>Affect </a>";
                    echo "</form>";
                    echo" <form method='post' action=''>";
                    echo "<input type='hidden' name='delid' value='" . $row["id"] . "'>";
                    echo "<button class='cancel-btn' type='submit' name='delsubmit'>Delete</button>";
                    echo "<br>";
                    echo "<button class='status-btn' type='submit' name='statusbtn'>Status</button>";
                    echo "</form>";
                    echo" <form method='post' action='updateInstructor.php'>";
                    echo "<a class='edit-btn' id='updatebtn' type='submit' name='update' href='updateInstructor.php?id=" . $row["id"] . "'>Update</a>";
                    
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