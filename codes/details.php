<?php
include('connect.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome  </title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS File -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .profile_image{
            width:60%;
            margin:auto;
            display:block;
            height:50%;
            object-fit: contain;
        }
        .logo{
        width: 7%;
        height: 7%;
        }
        .column {
			float: left;
			width: 50%;
			padding: 20px;
			box-sizing: border-box;
		}
		.clearfix::after {
			content: "";
			clear: both;
			display: table;
		}
        .person {
			border: 3px solid black;
			padding: 30px;
			margin: 50px;
			width: 400px;
		}
		.person h1 {
			margin: 0;
		}
		.person p {
			margin: 5px 0;
		}
       .button-container {
             display: flex;
             flex-direction: column;
        }
    </style>

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="coep.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="warden_info.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="get_students.php">Students</a>
        </li>     
        <li class="nav-item">
          <a class="nav-link" href="attendence.php">Daily Attendence</a>
        </li>     
        <li class="nav-item">
          <a class="nav-link" href="nightout.php">NightOuts</a>
        </li>     
        <li class="nav-item">
          <a class="nav-link" href="student_registration.php">New Entry</a>
        </li>     
      </ul>
    </div>
  </div>
</nav>
<!-- Second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">  
        <?php
         if(!isset($_SESSION['username'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li> ";
      }else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']." </a>
      </li>";
      }

        if(!isset($_SESSION['username'])){
            echo"<li class='nav-item'>
            <a class='nav-link' href='warden_login.php'>Login</a>
          </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }
        ?>
    </ul>
</nav>

<!-- Third child -->
<div class="bg-light">
    <h3 class="text-center">Coep Hostel</h3>
    <p class="text-center">Strength Truth Endurance Ethics Reverence.</p>
</div>

<div class="column">
    <!-- <img src="std1.jpg" alt="" class="profile_image"> -->
    <?php
            $username=$_SESSION['username']; 
            $user_details="select * from `warden` where w_name='$username'";
            $result=mysqli_query($con,$user_details);

            $row=mysqli_fetch_array($result);
            $user_image=$row['w_image'];
          echo "<li class='nav-item ''>
            <img src='./warden_images/$user_image' class='person my-8' alt=''>
          </li>"
    ?>
</div>
<div class="column">
<div class="person">
<?php
            $username=$_SESSION['username']; 
            $user_details="select * from `warden` where w_name='$username'";
            $result=mysqli_query($con,$user_details);
            $row=mysqli_fetch_array($result);
    ?>

		<p><strong>Name: </strong><?php echo $row['w_name']; ?></p>
		<p><strong>Email: </strong><?php echo $row['w_email']; ?></p>
		<p><strong>Contact: </strong><?php echo $row['w_mobile']; ?></p>
	</div>
</div>
<div class="clearfix"></div>

   
<!-- last child -->
<!-- include footer -->

</div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
</body>
</html>

