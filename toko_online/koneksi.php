<?php
$conn = mysqli_connect("localhost","root","","toko");
// check connection 
 if ($conn) {
    echo "";
 } else {
    echo "Failed to connect to the database";
 }
?>