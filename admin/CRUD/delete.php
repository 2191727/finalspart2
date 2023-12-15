<?php
require_once("../connection_db.php");


if (!$conn) {
    die("Error: Database connection not established. " . mysqli_connect_error());
}

$id = $_GET['id'];

$deleteContentManagerQuery = "DELETE FROM content_manager WHERE UserID = '$id'";
$deleteAdminQuery = "DELETE FROM admin WHERE UserID = '$id'";
$deleteUserQuery = "DELETE FROM user WHERE UserID = '$id'";

if ($conn === null) {
    die("Connection not established.");
}

// Execute both queries
if ($conn->query($deleteContentManagerQuery) === TRUE 
&& $conn->query($deleteAdminQuery) === TRUE
&& $conn->query($deleteUserQuery) === TRUE) {
    header('Location: ../accounts_view.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
