<?php
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    // update the nightout row with this MIS to set the 'approve' status to 'Approved'
    $query = "update nightout set approve = 'Approved' WHERE ID=$id";
    $result=mysqli_query($con,$query);
    echo "<script>window.open('nightout.php','_self')</script>";

    // return a response to indicate success
    echo 'success';
}
else {
    // return a response to indicate failure
    echo 'failure';
}
?>