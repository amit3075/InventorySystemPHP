<?php
echo "hello";
$conn = mysqli_connect("localhost:3307", "root", "", "ims");
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}
echo "connection is est.";

?>