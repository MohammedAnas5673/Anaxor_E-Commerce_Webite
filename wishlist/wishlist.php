<?php
session_start();
include 'db_connect.php';

// ✅ Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login to view your wishlist'); window.location='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id'];

// ✅ Fetch wishlist items for the logged-in user
$query = "
    SELECT p.product_id, p.description, p.price, p.image 
    FROM wishlist w 
    JOIN products p ON w.product_id = p.product_id 
    WHERE w.user_id = '$user_id'
";
$result = mysqli_query($conn, $query);

// ✅ Check query result for SQL error
if (!$result) {
    die('SQL Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Wishlist</title>
    <style>
        body {
            background-color: wheat;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-top: 10px;
            color: #333;
        }

        .wishlist-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 30px;
        }

        .wishlist-item {
            background-color: teal;
            border-radius: 10px;
            width: 220px;
            margin: 15px;
            padding: 15px;
            color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }

        .wishlist-item:hover {
            transform: scale(1.05);
        }

        .wishlist-item img {
            width: 200px;
            height: 220px;
            border-radius: 8px;
        }

        .wishlist-item h4 {
            margin-top:0px;
            font-size: 17px;
            min-height: 10px;
        }

        .wishlist-item p {
            font-weight: bold;
            margin-top: 0px;
            color: #ffeb99;
        }

        .remove-btn {
            background-color: #ff4d4d;
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top:0px;
            transition: background-color 0.3s;
        }

        .remove-btn:hover {
            background-color: #d93636;
        }
    </style>
</head>
<body>

<h2>My Wishlist ❤️</h2>

<div class="wishlist-container">
<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='wishlist-item'>
            <img src='{$row['image']}' alt='Wishlist Item' />
            <h4>{$row['description']}</h4>
            <p>₹{$row['price']}</p>
            <form action='remove_from_wishlist.php' method='POST'>
                <input type='hidden' name='product_id' value='{$row['product_id']}'>
                <button type='submit' class='remove-btn'>Remove</button>
            </form>
        </div>";
    }
} else {
    echo "<p style='color:#444; font-size:18px;'>Your wishlist is empty 😔</p>";
}
?>
</div>

</body>
</html>
