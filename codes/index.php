<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		/* Set the height of the whole page */
		html, body {
			height: 100%;
		}
		/* Set the background image */
		.bg-image {
			background-image: url("./Background Images/hostel1.jpg");
			height: 100%;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			position: relative;
		}
		/* Style the overlay window */
		.overlay {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: rgba(0, 0, 0, 0.7);
			padding: 50px;
			text-align: center;
			color: #fff; /* Change text color to white */
			border-radius: 10px; /* Add rounded corners */
			box-shadow: 0px 0px 20px #000; /* Add shadow effect */
			transition: all 0.3s ease-in-out; /* Add animation to the window */
		}
		.overlay:hover {
			transform: translate(-50%, -50%) scale(1.05); /* Add hover animation to the window */
		}
		/* Style the buttons */
		.btn-primary {
			margin-top: 20px;
			margin-right: 10px;
			background-color: #007bff; /* Change button color */
			border-color: #007bff; /* Change border color */
			font-weight: bold; /* Make text bold */
			padding: 10px 20px; /* Add more padding */
			transition: all 0.3s ease-in-out; /* Add animation to the buttons */
		}
		.btn-primary:hover {
			background-color: #0099ff; /* Change button color on hover */
			border-color: #0099ff; /* Change border color on hover */
			transform: scale(1.1); /* Add hover animation to the buttons */
		}
		.btn-primary:active {
			background-color: #007bff; /* Change button color on click */
			border-color: #007bff; /* Change border color on click */
			transform: scale(0.9); /* Add click animation to the buttons */
		}
	</style>
</head>
<body>
	<div class="bg-image">
		<div class="overlay">
			<h1>Welcome to COEP Hostel</h1>
			<p class="text-center">Strength Truth Endurance Ethics Reverence.</p>
			<a href="student_login.php" class="btn btn-primary">Students</a>
			<a href="warden_login.php" class="btn btn-primary">Warden</a>
		</div>
	</div>
	<!-- Include Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
