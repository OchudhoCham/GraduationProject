<?php
$conn = new mysqli('localhost', 'root', '', 'smms');
if (!$conn) {
    die(mysqli_error($conn));
}
?>