<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    
   $row['product_id'] = $_GET['deleteid'];
   
   $sql = "delete from products where product_id=".$row['product_id']."";
   $result = mysqli_query($conn, $sql);

   if ($result) {
    
    echo "<script>alert('Product deleted successfully.')</script>";
    header('location:products.php');
   }
   else {
    die(mysqli_error($conn));

   }
}
?>