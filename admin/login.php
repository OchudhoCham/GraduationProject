<?php
session_start();
include 'connect.php';
if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {

  function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
$admin_email = validate($_POST['admin_email']);
$admin_password = validate($_POST['admin_password']);

if (empty($admin_email)) {
  header('Location:index.php?error=Email is required');
  exit();
}
else if (empty($admin_password)) {
  header('Location:index.php?error=Password is required');
  exit();
}else {
    $sql = "select * from admin where admin_email = '$admin_email' AND admin_password = '$admin_password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if ($row['admin_email'] === $admin_email && $row['admin_password'] === $admin_password) {
            header('Location:dashboard.php');
            $_SESSION['admin_email'] = $row['admin_email'];
            $_SESSION['admin_name'] = $row['admin_name'];
            $_SESSION['admin_id'] = $row['admin_id'];
            header('Location:dashboard.php');
            exit();
        }

}
else {
    header('Location:index.php?error=Incorrect Email or Password');
    exit();
  }
}


}



