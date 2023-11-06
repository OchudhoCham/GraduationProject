<?php
session_start();
include 'connect.php';
if (isset($_POST['stuff_email']) && isset($_POST['stuff_password'])) {

  function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
$stuff_email = validate($_POST['stuff_email']);
$stuff_password = validate($_POST['stuff_password']);

if (empty($stuff_email)) {
  header('Location:index.php?error=Email is required');
  exit();
}
else if (empty($stuff_password)) {
  header('Location:index.php?error=Password is required');
  exit();
}else {
    $sql = "select * from stuff where stuff_email = '$stuff_email' AND stuff_password = '$stuff_password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if ($row['stuff_email'] === $stuff_email && $row['stuff_password'] === $stuff_password) {
            header('Location:dashboard.php');
            $_SESSION['stuff_email'] = $row['stuff_email'];
            $_SESSION['stuff_name'] = $row['stuff_name'];
            $_SESSION['stuff_id'] = $row['stuff_id'];
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



