<!-- <?php
session_start();
include "../user/connection.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "DELETE FROM categories WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Category removed successfully";
        header("Location: removecat.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to remove category";
        header("Location: removecat.php");
        exit();
    }
}
?>
<script type="text/javascript">
    window.location = "categories.php";
</script> -->
<?php
include "../user/connection.php";
if (!isset($_SESSION)) {
    session_start();
}


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    echo $id;

    $query = "DELETE FROM categories  WHERE id = '$id'";
    echo $query;
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Product removed successfully";
        header("Location: category.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to remove product";
        header("Location: category.php");
        exit();
    }
}
?>