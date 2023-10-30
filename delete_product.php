<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    
   $row['product_id'] = $_GET['deleteid'];
   
   $sql = "delete from 'products' where product_id=".$row['product_id']."";
   $result = mysqli_query($conn, $sql);

   if ($result) {
    
    echo "<script>alter('Product deleted successfully.')</script>";
   }
   else {
    die(mysqli_error($conn));

   }
}
?>