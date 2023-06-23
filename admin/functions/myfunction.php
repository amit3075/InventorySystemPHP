<?php
include "../user/connection.php";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);
}

if (!function_exists('redirect')) {
    function redirect($url, $message)
    {
        $_SESSION['message'] = $message;
        header('Location:' . $url);
        exit();

    }
}