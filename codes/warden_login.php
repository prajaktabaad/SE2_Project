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
    <title>Warden Login</title>

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

    <style>
        h2 {
        color: Green;
        text-align: center;
        }
        body {
            background-image: url('./Background Images/login1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .login-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            margin-top: 100px;
            font-weight: bold;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        .student_image {
            width: 100%;
            height: auto;
        }
        #login-btn {
        background-color: Green;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        }

        #login-btn:hover {
        background-color: light green;
        transform: scale(1.1);
        }
        #contact-wardens {
        color: green;
        }
    </style>
</head>
<body>
   <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-form">
                <h2 class="mb-5">Warden Login</h2>
                <form action="" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" id="Username" name="Username"
                         placeholder="Enter Your Name" required="required" class="form-control">
                        <label for="MIS" class="form-label">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" id="password" name="password"
                         placeholder="Enter Your Password" required="required" class="form-control">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <div class="d-grid gap-2 mb-4">
                        <input type="submit" name="warden_login" id="login-btn" class="btn btn-primary" value="Login">
                    </div>
                    <div class="text-center">
                        <p class="small fw-bold mb-1">Don't You Have an account?</p>
                        <a href="Warden_registration.php" class="text-decoration-none" id="contact-wardens">Register</a>
                    </div>
                </form>
            </div>
      </div>

      </body>
</html>

<?php
if(isset($_POST['warden_login'])){
    $username=$_POST['Username']; 
    $user_password=$_POST['password']; 

    $select_query="select * from `warden` where w_name='$username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);

    if($row_count>0){
        $_SESSION['username']=$username;
        if(password_verify($user_password,$row_data['w_password'])){
            //echo "<script>alert('Login Successfully')</script>";
                $_SESSION['username']=$username;
                echo "<script>alert('Login Successfully')</script>"; 
                echo "<script>window.open('warden_info.php','_self')</script>";
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}