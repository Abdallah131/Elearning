

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../Styles/style.css">

    <title>Sign up</title>



<!-- TOASTER LINK JS  -->
    <script src="https://cdn.jsdelivr.net/npm/react-hot-toast@1.0.2/dist/react-hot-toast.umd.production.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">


</head>

<body>
<a href="/PROJET/Users%20Management/Pages/login.php"><img src="../logo.png" alt="elearninglogo" style="position : absolute; height : 100px; top : 1%; left: -0.5%; cursor: pointer"></a>


    <div class="container">

        <div class="title">Sign Up</div>

        <form action="" method="POST">

            <div class="user-details">

                <div class="input-box">
                    <span class="details">Name & Surname</span>
                    <input type="text" name="name" placeholder="full name">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="exemple@email.com" required> 
                </div>
                <div class="input-box">
                    <span class="details">Telephone</span>
                    <input type="tel" name="telephone" placeholder="par ex: +216 00 00 00 00"  pattern="^[0-9]{10}]$" required>


                </div>
                <div class="input-box">
                    <span class="details">Birthdate</span>
                    <input type="date" name="birthdate">
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" placeholder="Enter your password" >

                </div>

                <div class="input-box">
                    <span class="details">Pays</span>

                    <select class="form-select" name="pays" aria-label="Default select example">
                    <option value="" selected>Choisir Votre Pays</option>
                     
                      
                        <option value="TN">TUNISIE</option>
                        <option value="MOR">MOROCCO</option>
                        <option value="ALG">ALGERIE</option>
                    </select>
                </div>



                <!-- </div> -->

                <div class="input-box">
                    <span class="details">Role</span>

                    <select class="form-select" name="role" aria-label="Default select example">
                    <option value="" selected>Select Your Role</option>
                     
                      
                        <option value="Student">Student</option>
                        <option value="Instructor">Instructor</option>
                       
                    </select>
                </div>

                <div class="input-box">
                    <span class="details">level</span>

                    <select class="form-select" name="level" aria-label="Default select example">
                    <option value="" selected>Select Your Level</option>
                     
                      
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                       
                    </select>
                </div>


            <input type="radio" name="gender" id="dot-1" value="MALE">
            <input type="radio" name="gender" id="dot-2"value="FEMALE">


            <div class="category">
                <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="details"></span>
                    <label>MALE </label>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="details"></span>
                    <label>FEMALE </label>
                </label>

            </div>

            
            
           

                </div>


            <div class="button">
                <input type="submit" value="Sign up" >
                <input type="reset" value="Clear">
             
            </div>

        </form>
    </div>
    </div>

    </div>

    </div>


</body>

</html>

<?php


// session_start();

if (isset($_SESSION['username'])) {
  header("Location: signup.php");
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if the form fields are empty
  if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['telephone'])
    || empty($_POST['birthdate']) || empty($_POST['password']) || empty($_POST['pays'])
     || empty($_POST['gender'])  || empty($_POST['role'])|| empty($_POST['level'])
  ) {
    // Call the showToast function with an error message
    showToast("Please fill all the required fields.", "error");
  } else {
    // Process the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $birthdate = $_POST['birthdate'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $pays = $_POST['pays'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $level = $_POST['level'];


    
    // Create a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'e_learning');

    // Check if the connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the email already exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // Call the showToast function with an error message
      showToast("Email already exists.", "error");
    } else {
      // Insert the form data into the database
      $sql = "INSERT INTO users (name, email, telephone, birthdate, password, pays , gender, role , level)
              VALUES ('$name', '$email', '$telephone', '$birthdate', '$password', '$pays' , '$gender', '$role' , '$level')";

      if (mysqli_query($conn, $sql)) {
        // Call the showToast function with a success message
        showToast("Form submitted successfully.", "success");

        // Redirect to the login page
        // header("refresh:2;url=login.php" );
        echo "<script>setTimeout(function() { window.location.href = 'login.php'; }, 2000);</script>";


        exit();
      } else {
        // Call the showToast function with an error message
        showToast("Error: " . mysqli_error($conn), "error");
      }
    }

    // Close the database connection
    mysqli_close($conn);
  }
}


// TOASTER FUNCTION 
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