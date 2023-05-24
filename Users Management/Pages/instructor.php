<?php


if (!isset($_SESSION)) {
  session_start();
}

// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION["name"])){
  header("location: login.php");
  exit;
}
 require "header.php" ;

// Get the user's name from the URL parameter
if(isset($_GET['name'])) {
  $name = $_GET['name'];
}
$name = $_SESSION['name']; // get the user's name from the session
 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSTRUCTOR PAGE </title>
    <link rel="stylesheet" href="../Styles/styleDashboard.css">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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
<a href="profileins.php">
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
		@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		a {
			text-decoration: none;
		}

		li {
			list-style: none;
		}

		:root {
			--poppins: 'Poppins', sans-serif;
			--lato: 'Lato', sans-serif;

			--light: #F9F9F9;
			--blue: #3C91E6;
			--light-blue: #CFE8FF;
			--grey: #eee;
			--dark-grey: #AAAAAA;
			--dark: #342E37;
			--red: #DB504A;
			--yellow: #FFCE26;
			--light-yellow: #FFF2C6;
			--orange: #FD7238;
			--light-orange: #FFE0D3;
		}


		body.dark {
			--light: #0C0C1E;
			--grey: #060714;
			--dark: #FBFBFB;
		}

		body {
			background: var(--grey);
		}



		/* CONTENT */
		#content {
			position: relative;
			width: calc(100% - 280px);
			left: 280px;
			transition: .3s ease;
		}





		/* NAVBAR */
		#content nav {
			height: 56px;
			background: var(--light);
			padding: 0 24px;
			display: flex;
			align-items: center;
			grid-gap: 24px;
			font-family: var(--lato);
			position: sticky;
			top: 0;
			left: 0;
			z-index: 1000;
		}
		#content nav::before {
			content: '';
			position: absolute;
			width: 40px;
			height: 40px;
			bottom: -40px;
			left: 0;
			border-radius: 50%;
			box-shadow: -20px -20px 0 var(--light);
		}
		#content nav a {
			color: var(--dark);
		}
		#content nav .bx.bx-menu {
			cursor: pointer;
			color: var(--dark);
		}
		#content nav .nav-link {
			font-size: 16px;
			transition: .3s ease;
		}
		#content nav .nav-link:hover {
			color: var(--blue);
		}
		#content nav form {
			max-width: 400px;
			width: 100%;
			margin-right: auto;
		}
		#content nav form .form-input {
			display: flex;
			align-items: center;
			height: 36px;
		}
		#content nav form .form-input input {
			flex-grow: 1;
			padding: 0 16px;
			height: 100%;
			border: none;
			background: var(--grey);
			border-radius: 36px 0 0 36px;
			outline: none;
			width: 100%;
			color: var(--dark);
		}
		#content nav form .form-input button {
			width: 36px;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			background: var(--blue);
			color: var(--light);
			font-size: 18px;
			border: none;
			outline: none;
			border-radius: 0 36px 36px 0;
			cursor: pointer;
		}
		#content nav .notification {
			font-size: 20px;
			position: relative;
		}
		#content nav .notification .num {
			position: absolute;
			top: -6px;
			right: -6px;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			border: 2px solid var(--light);
			background: var(--red);
			color: var(--light);
			font-weight: 700;
			font-size: 12px;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		#content nav .profile img {
			width: 30px;
			height: 31px;
			object-fit: cover;
			border-radius: 90%;
		}
		#content nav .switch-mode {
			display: block;
			min-width: 50px;
			height: 25px;
			border-radius: 25px;
			background: var(--grey);
			cursor: pointer;
			position: relative;
		}
		#content nav .switch-mode::before {
			content: '';
			position: absolute;
			top: 2px;
			left: 2px;
			bottom: 2px;
			width: calc(25px - 4px);
			background: var(--blue);
			border-radius: 50%;
			transition: all .3s ease;
		}
		#content nav #switch-mode:checked + .switch-mode::before {
			left: calc(100% - (25px - 4px) - 2px);
		}
		/* NAVBAR */





		/* MAIN */
		#content main {
			width: 100%;
			padding: 36px 24px;
			font-family: var(--poppins);
			max-height: calc(100vh - 56px);
			
		}
		#content main .head-title {
			display: flex;
			align-items: center;
			justify-content: space-between;
			grid-gap: 16px;
			flex-wrap: wrap;
			margin-right: 9%;
		}
		#content main .head-title .left h1 {
			font-size: 36px;
			font-weight: 800;
			margin-bottom: 20px;
			color: var(--dark);
			margin-right: 90%;
		}
		#content main .head-title .left .breadcrumb {
			display: flex;
			align-items: center;
			grid-gap: 16px;
			margin-right: 90%;

		}
		#content main .head-title .left .breadcrumb li {
			color: var(--dark);
		}
		#content main .head-title .left .breadcrumb li a {
			color: var(--dark-grey);
			pointer-events: none;
		}
		#content main .head-title .left .breadcrumb li a.active {
			color: var(--blue);
			pointer-events: unset;
		}
		#content main .head-title .enroltitle {
			height: 36px;
			padding: 0 16px;
			border-radius: 36px;
			background: var(--blue);
			color: var(--light);
			display: flex;
			justify-content: center;
			align-items: center;
			grid-gap: 10px;
			font-weight: 500;
			
		}




		#content main .box-info {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			grid-gap: 24px;
			margin-top: 36px;
			margin-right: 10%;
		}
		#content main .box-info li {
			padding: 24px;
			background: var(--light);
			border-radius: 20px;
			display: flex;
			align-items: center;
			grid-gap: 24px;
		}
		#content main .box-info li .bx {
			width: 80px;
			height: 80px;
			border-radius: 10px;
			font-size: 36px;
			display: flex;
			justify-content: center;
			align-items: center;
			
		}
		#content main .box-info li:nth-child(1) .bx {
			background: var(--light-blue);
			color: var(--blue);
		}
		#content main .box-info li:nth-child(2) .bx {
			background: var(--light-yellow);
			color: var(--yellow);
		}
		#content main .box-info li:nth-child(3) .bx {
			background: var(--light-orange);
			color: var(--orange);
		}
		#content main .box-info li .text h3 {
			font-size: 24px;
			font-weight: 600;
			color: var(--dark);
		}
		#content main .box-info li .text p {
			color: var(--dark);	
		}





		#content main .table-data {
			display: flex;
			flex-wrap: wrap;
			grid-gap: 24px;
			margin-top: 24px;
			width: 100%;
			color: var(--dark);
			margin-right: 90%;
		}
		#content main .table-data > div {
			border-radius: 20px;
			background: var(--light);
			padding: 24px;
			
		}
		#content main .table-data .head {
			display: flex;
			align-items: center;
			grid-gap: 16px;
			margin-bottom: 24px;
		}
		#content main .table-data .head h3 {
			margin-right: auto;
			font-size: 24px;
			font-weight: 600;
		}
		#content main .table-data .head .bx {
			cursor: pointer;
		}

		#content main .table-data .order {
			flex-grow: 1;
			flex-basis: 500px;
		}
		#content main .table-data .order table {
			width: 100%;
			border-collapse: collapse;
		}
		#content main .table-data .order table th {
			padding-bottom: 12px;
			font-size: 13px;
			text-align: left;
			border-bottom: 1px solid var(--grey);
		}
		#content main .table-data .order table td {
			padding: 16px 0;
		}
		#content main .table-data .order table tr td:first-child {
			display: flex;
			align-items: center;
			grid-gap: 12px;
			padding-left: 6px;
		}
		#content main .table-data .order table td img {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			object-fit: cover;
		}
		#content main .table-data .order table tbody tr:hover {
			background: var(--grey);
		}
		#content main .table-data .order table tr td .status {
			font-size: 10px;
			padding: 6px 16px;
			color: var(--light);
			border-radius: 20px;
			font-weight: 700;
		}
		#content main .table-data .order table tr td .status.completed {
			background: var(--blue);
		}

		#content main .table-data .order table tr td .status.pending {
			background: var(--orange);
		}


		#content main .table-data .todo {
			flex-grow: 1;
			flex-basis: 300px;
			margin-right: 10%;
		}
		#content main .table-data .todo .todo-list {
			width: 100%;
			
		}
		#content main .table-data .todo .todo-list li {
			width: 100%;
			margin-bottom: 16px;
			background: var(--grey);
			border-radius: 10px;
			padding: 14px 20px;
			display: flex;
			justify-content: space-between;	
			align-items: center;
			
		}
		#content main .table-data .todo .todo-list li .bx {
			cursor: pointer;
		}
		#content main .table-data .todo .todo-list li.completed {
			border-left: 10px solid var(--blue);
		}
		#content main .table-data .todo .todo-list li.not-completed {
			border-left: 10px solid var(--orange);
		}
		#content main .table-data .todo .todo-list li:last-child {
			margin-bottom: 0;
		}


	</style>

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		

		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1></h1>
					<ul class="breadcrumb">
					<h1>Dashboard</h1>
					</ul>
				</div>
				<a href="/PROJET/Student%20Management/consultStudentList.php" class="enroltitle">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Consult Students</span>
				</a>

				


			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>230</h3>
						<p>student</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>5</h3>
						<p>cours</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$30</h3>
						<p>loyalty points</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent review</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>stdent</th>
								<th>Date review</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="../utilisateur.png">
									<p>zaagoub zaagoub</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="../utilisateur.png">
									<p>chiheb zoghlami</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="../utilisateur.png">
									<p>habib sallem</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="../utilisateur.png">
									<p>Abdallah zaghouane</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="../utilisateur.png">
									<p>ghazi smach</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>list of courses</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						
						
							<li class="list-group-item">Introduction à la programmation</li>
							<li class="list-group-item">Conception web avancée</li>
							<li class="list-group-item">Bases de données</li>
							<li class="list-group-item">processus unifié</li>
							<li class="list-group-item">AGL</li>
							<li class="list-group-item">Architecture logicille</li>
						  </ul>

					</ul>
				</div>
			</div>
		</main>
	</section>
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
</body>
</html>
