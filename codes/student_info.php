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
    <style>
        body{
            overflow-x:hidden;
            background-image: url('./Background Images/bg11.jpg');
            background-repeat: no-repeat;
			      background-size: cover;
        }
        .profile_image{
            width:90%;
            margin:auto;
            display:block;
            height:100%;
            object-fit: contain;
        }
        .logo{
        width: 7%;
        height: 7%;
        }

        .person {
			border: 3px solid black;
			padding: 30px;
			margin: 50px;
			width: 200px;
      margin-left: 70px;
		}
        .person1 {
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
    .button-animation {
  position: relative;
  overflow: hidden;
  border-radius: 25px;
}

.button-animation::before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 0;
  height: 0;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 100%;
  transition: all 0.5s;
  z-index: -1;
}

.button-animation:hover::before {
  width: 300px;
  height: 300px;
}
.btn-wide {
  width: 150px;
}

        		/* Styles for navbar */
		  /* Style the navbar links */
      .navbar-nav a {
        color: #fff;
        padding: 0.5rem 1rem;
        text-decoration: none;
        transition: green 0.2s ease-in-out;
    }
    
    /* Change the background color of the navbar when hovering over a link */
    .navbar-nav a:hover {
        background-color: #2c3e50;
    }
    
    /* Style the active link */
    .navbar-nav .active {
        background-color: green;
        border-radius: 5px;
    }
    
    /* Style the logo */
    .navbar-brand img {
        height: 40px;
        margin-right: 10px;
    }
    .navbar-nav .nav-link-style {
  color: #fff;
  text-transform: uppercase;
  font-size: 16px;
  font-weight: bold;
  padding: 0.5rem 1rem;
}

.bg-info {
  background-color: DarkSlateGrey!important;
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
          <a class="nav-link nav-link-style" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-style" href="student_info.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-style" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info1">
<ul class="navbar-nav me-auto">  
        <?php
         if(!isset($_SESSION['MIS'])){
          echo"<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li> ";
      }else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['MIS']." </a>
      </li>";
      }

        if(!isset($_SESSION['MIS'])){
            echo"<li class='nav-item'>
            <a class='nav-link' href='student_login.php'>Login</a>
          </li>";
        }else{
          echo"<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }
        ?>
    </ul>
  
  
  <style>
    .bg-info1 {
      background-color: #8FBC8F!important;
    }
    .navbar-nav .nav-link {
      font-weight: bold;
      font-size: 1.2rem;
      text-transform: uppercase;
      padding: 0.5rem 1rem;
      border-radius: 5px;
    }
    
    .navbar-nav .nav-link:hover {
      background-color: #2c3e50;
    }
  </style>
</nav>
<div class="">
    <h2 class="text-center">Coep Hostel</h2>
    <p class="text-center">Strength Truth Endurance Ethics Reverence.</p>
</div>
<!-- Third child -->
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
      <div class="card text-center border-0">
        <div class="card-body">
        <?php
            $user_mis=$_SESSION['MIS']; 
            $user_details="select * from `student` where MIS='$user_mis'";
            $result=mysqli_query($con,$user_details);

            $row=mysqli_fetch_array($result);
            if($row > 0){
              $user_image=$row['image'];
              $user_name=$row['name'];
              echo "<img src='./student_images/$user_image' class='img-fluid rounded-circle mb-4' alt=''>
              <h4 class='card-title'>$user_name</h4>";
            }
        ?>
          <ul class="list-unstyled">
          <?php
            $user_mis=$_SESSION['MIS']; 
            $user_details="select * from `student` where MIS='$user_mis'";
            $result=mysqli_query($con,$user_details);
            $row=mysqli_fetch_array($result);
          ?>
            <li><strong>MIS:</strong><?php echo $row['MIS']; ?></li>
            <li><strong>Room No:</strong><?php echo $row['room_no'];?> </li>
            <li><strong>Email:</strong> <?php echo $row['email']; ?></li>
            <li><strong>Parents Email:</strong><?php echo $row['p_email']; ?> </li>
            <li><strong>Contact:</strong> <?php echo $row['mobile']; ?></li>
          </ul>
          <div class="button-container mt-5 mr-10">
  <button class="btn btn-primary btn-block mt-3 mr-4 button-animation" style="background-color: darkslategrey;">
    <a href="nightout_app.php" class="nav-link text-light">Nightout Application</a>
  </button>
  <button class="btn btn-primary btn-block mt-3 mr-4 button-animation" style="background-color: darkslategrey;">
    <a href="status.php" class="nav-link text-light">Check Nightout Status</a>
  </button>
</div>


        </div>
      </div>
    </div>
  </div>
</div>

        
</div>

</div>

<div class="bg-info p-3 text-center">
    <p>All rights reserve @~ Hosted by Nirlepa17</p>
</div>

<!-- bootstrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>
</body>
</html>

