<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

session_start();
include("db_connect.php");

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to add to wishlist'); window.location.href='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'] ?? null;

if ($product_id) {
    // Prevent duplicate wishlist entries
    $check = "SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Already in your wishlist'); window.history.back();</script>";
    } else {
        $insert = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')";
        if (mysqli_query($conn, $insert)) {
            echo "<script>alert('Added to wishlist!'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error adding to wishlist'); window.history.back();</script>";
        }
    }
} else {
    echo "<script>alert('Invalid product'); window.history.back();</script>";
}
?>
