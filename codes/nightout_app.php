<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nightout Application</title>
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
		<h1>Nightout Application</h1>
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
                <div class="form-outline  mb-4">
                    <label for="From_Date" class="form-label">From</label>
                    <input type="date" id="from_date" class="form-control"
                     placeholder="Enter From Date" autocomplete="off" required="required" name="From_Date"/>
                </div>
                 <div class="form-outline  mb-4">
                    <label for="to_Date" class="form-label">To</label>
                    <input type="date" id="to_date" class="form-control"
                     placeholder="Enter To Date" autocomplete="off" required="required" name="to_Date"/>
                </div>
                <div class=" mt-4 pt-2">
                    <input type="submit" value="Apply" id = "custom-btn"
                     class="custom-btn py-2 px-3 border-0" name="apply">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['apply'])){
    $user_username=$_POST['student_name'];
    $user_email=$_POST['student_email'];
    $user_pemail=$_POST['parent_email'];
    $user_mis=$_POST['student_MIS'];
    $user_room=$_POST['student_room'];
    $user_address=$_POST['student_address'];
    $user_contact=$_POST['student_contact'];
    $From_Date=$_POST['From_Date'];
    $to_Date=$_POST['to_Date'];

    $current_date = date("Y-m-d");
    if(strtotime($From_Date) < strtotime($current_date)){
        echo "<script>alert('Invalid Dates')</script>";
    }elseif(strtotime($to_Date) < strtotime($From_Date)){
        echo "<script>alert('Invalid Dates')</script>";
    }
    elseif(strtotime($to_Date) < strtotime($current_date)){
        echo "<script>alert('Invalid Dates')</script>";
    }
    else{
    $select_query="select * from `nightout` where S_MIS=$user_mis and from_date='$From_Date' and to_date = '$to_Date'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Application already exist')</script>";
    }
    else{
    $insert_query="insert into `nightout` (S_MIS,S_name,S_room, address,approve,from_date, to_date,email,p_email)
     values ($user_mis,'$user_username', '$user_room','$user_address','Pending' ,'$From_Date','$to_Date','$user_email', '$user_pemail')";

    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Application successfful')</script>";
        echo "<script>window.open('student_info.php','_self')</script>";
    }else{
        die(mysqli_error($con));
    }
    }
}
}

?>