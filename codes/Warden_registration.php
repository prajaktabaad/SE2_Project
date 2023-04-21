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
    <title>Warden Registration</title>

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
        body {
            margin: 0;
            padding: 0;
            background-color: #e1e1e1;
            overflow: hidden;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('./Background Images/login1.jpg');
            background-size: cover;
            filter: brightness(50%);
        }

        .warden_image{
          height: calc(100vh - 100px); /* adjust the value as needed */
          object-fit: contain;
          margin-bottom: 10px;
          margin-top: 10px;
          width : 150%;
        }
        #custom-btn {
        background-color: Green;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        }
        #custom-btn:hover {
        background-color: light green;
        transform: scale(1.1);
        }
        a {
          color: green;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="container-fluid m-3">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5 bg-light shadow p-3">
                <img src="./Background Images/login1.jpg" alt="Warden Registration" class="img-fluid warden_image">
            </div>
            <div class="col-lg-6 col-xl-4 bg-light shadow p-3">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                        <label for="username" class="form label">Username</label>
                        <input type="text" id="username" name="username"
                         placeholder="Enter Your Name" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form label">Email</label>
                        <input type="email" id="email" name="email"
                         placeholder="Enter Your Email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="Mobile Number" class="form label">Mobile Number</label>
                        <input type="Mobile Number" id="Mobile_Number" name="Mobile_Number"
                         placeholder="Enter Your Number" required="required" class="form-control">
                    </div>
                    <div class="form-outline  mb-4">
                        <label for="warden_image" class="form-label">Warden Image</label>
                        <input type="file" id="warden_image" class="form-control"
                        required="required" name="warden_image"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form label">Password</label>
                        <input type="password" id="password" name="password"
                         placeholder="Enter Your Password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                         placeholder="Confirm Your Password" required="required" class="form-control ">
                    </div>                  

                    <div class="d-grid">
                        <button type="submit" name="warden_registration" id="custom-btn" class=" py-2 px-3 border-0 custom-btn">Register</button>
                        <p class="small fw-bold mt-2 pf-1 ">Already have an account? <a href="warden_login.php">Login</a></p>


                    </div>
                </form>
      </div>
      </div>
</body>
</html>


<?php
if(isset($_POST['warden_registration'])){
    $user_username=$_POST['username'];
    $user_email=$_POST['email'];
    $user_password=$_POST['password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['confirm_password'];
    $user_contact=$_POST['Mobile_Number'];

    $user_image1=$_FILES['warden_image']['name'];
    $user_image1_tmp=$_FILES['warden_image']['tmp_name'];


    $select_query="select * from `warden` where w_name='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Account Already Exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
            // insert_query
    move_uploaded_file($user_image1_tmp,"./warden_images/$user_image1");

    $insert_query="insert into `warden` (w_name,w_email,w_password,w_mobile,w_image)
     values ('$user_username','$user_email','$hash_password','$user_contact','$user_image1')";

    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Registration successfful')</script>";
        echo "<script>window.open('warden_login.php','_self')</script>";
    }else{
        die(mysqli_error($con));
    }
    }
}
?>