<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color:#C0C0C0;
            
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 10px;
        }
    
        input[type=submit] {
            border-radius: 10px;
        }
        header {
			color: #008000;
			padding: 20px;
			text-align: center;
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
    </style>
</head>
<body>
<header>
		<h1>Student Registration</h1>
</header>

<div class="container-fluid my-3">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- user name field -->   
                <div class="form-outline mb-4">
                    <label for="student_name" class="form-label">Name</label>
                    <input type="text" id="student_name" class="form-control"
                     placeholder="Enter your name" autocomplete="off" required="required" name="student_name"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="student_MIS" class="form-label">MIS</label>
                    <input type="text" id="student_MIS" class="form-control"
                     placeholder="Enter your MIS" autocomplete="off" required="required" name="student_MIS"/>
                </div>
                <!-- room no field -->
                <div class="form-outline  mb-4">
                    <label for="student_room" class="form-label">Room No</label>
                    <input type="text" id="student_room" class="form-control"
                     placeholder="Enter your Room no" autocomplete="off" required="required" name="student_room"/>
                </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                    <label for="student_email" class="form-label">Email</label>
                    <input type="email" id="student_email" class="form-control"
                     placeholder="Enter your email" autocomplete="off" required="required" name="student_email"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="parent_email" class="form-label">Parent's Email</label>
                    <input type="email" id="parent_email" class="form-control"
                     placeholder="Enter your parent's email" autocomplete="off" required="required" name="parent_email"/>
                </div>

                <!-- image field -->
                <div class="form-outline mb-4">
                    <label for="student_image" class="form-label">Student Image</label>
                    <input type="file" id="student_image" class="form-control"
                     required="required" name="student_image"/>
                </div>
                <div class="form-outline mb-4">
                    <label for="student_fingerprint" class="form-label">Student Fingerprint</label>
                    <input type="file" id="student_fingerprint" name="student_fingerprint" class="form-control" accept=".jpg, .jpeg, .png">
                    <small class="form-text text-muted">Please upload a clear image of the student's fingerprint.</small>
                </div>
                <!-- password field -->
                <div class="form-outline  mb-4">
                    <label for="student_password" class="form-label">Password</label>
                    <input type="password" id="student_password" class="form-control"
                     placeholder="Enter your password" autocomplete="off" required="required" name="student_password"/>
                </div>
                <!-- confirm password field -->
                <div class="form-outline  mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control"
                     placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password"/>
                </div>
                <!-- user address field -->   
                <div class="form-outline  mb-4">
                    <label for="student_address" class="form-label">Address</label>
                    <input type="text" id="student_address" class="form-control"
                     placeholder="Enter your Address" autocomplete="off" required="required" name="student_address"/>
                </div>
                 <!-- user contact field -->   
                 <div class="form-outline  mb-4">
                    <label for="student_contact" class="form-label">Contact</label>
                    <input type="text" id="student_contact" class="form-control"
                     placeholder="Enter your Contact" autocomplete="off" required="required" name="student_contact"/>
                </div>
                <div class=" mt-4 pt-2">
                    <input type="submit" value="Register" id = "custom-btn"
                     class="custom-btn py-2 px-3 border-0" name="user_register">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['student_name'];
    $user_email=$_POST['student_email'];
    $user_pemail=$_POST['parent_email'];
    $user_mis=$_POST['student_MIS'];
    $user_room=$_POST['student_room'];
    $user_password=$_POST['student_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['student_address'];
    $user_contact=$_POST['student_contact'];

    $user_image=$_FILES['student_image']['name'];
    $user_image_tmp=$_FILES['student_image']['tmp_name'];

    $user_fingerprint=$_FILES['student_fingerprint']['name'];
    $user_fingerprint_tmp=$_FILES['student_fingerprint']['tmp_name'];

    $select_query="select * from `student` where MIS='$user_mis'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Student Already Exist')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
            // insert_query
    move_uploaded_file($user_image_tmp,"./student_images/$user_image");
    move_uploaded_file($user_fingerprint_tmp,"./student_fingerprint/$user_fingerprint");

    $insert_query="insert into `student` (MIS,name,room_no,email,p_email,s_password,mobile,image,fingerprint, address)
     values ($user_mis,'$user_username', '$user_room','$user_email', '$user_pemail','$hash_password'
     ,'$user_contact','$user_image', '$user_fingerprint','$user_address')";

    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Registration successfful')</script>";
        echo "<script>window.open('warden_info.php','_self')</script>";
    }else{
        die(mysqli_error($con));
    }
    }
}
?>