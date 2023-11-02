<?php
include 'connect.php';
function check_login($conn){

if (isset($_SESSION['admin_email'])){
    $email = $_SESSION['admin_email'];
    $query = "seleect * from admin where admin_email = '$email' limit 1";
    
    $result =  mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        
        $user_data =  mysqli_fetch_assoc($result);
        return $user_data;
    }
}

//redirect  to login

header("location:index.php");
die;
}
?>
