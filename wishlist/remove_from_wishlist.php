<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'] ?? null;

if ($product_id) {
    $delete = "DELETE FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'";
    if (mysqli_query($conn, $delete)) {
        echo "<script>alert('Removed from wishlist'); window.location='wishlist.php';</script>";
    } else {
        echo "<script>alert('Error while removing item'); window.location='wishlist.php';</script>";
    }
} else {
    echo "<script>alert('Invalid product'); window.location='wishlist.php';</script>";
}
?>
