<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("db_connect.php");
include("Header.php");

// Check if user logged in
$user_id = $_SESSION['user_id'] ?? null;

// Get category from URL
$category = $_GET['category'] ?? '';
$query = "SELECT * FROM products WHERE category = '$category'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo ucfirst($category); ?> Collection - Anaxor</title>
  <style>
    body {
      background-color: wheat;
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
      text-align: center;
      color: #333;
      padding: 25px 0 0 0;
      font-size: 30px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      background-color: wheat;
      margin: 50px;
    }

    .Products_Details {
      background: teal;
      width: 220px;
      margin: 20px;
      padding: 10px;
      border-radius: 10px;
      transition: 0.3s;
      color: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .Products_Details:hover {
      transform: scale(1.05);
    }

    .product_img {
      width: 200px;
      height: 220px;
      border-radius: 8px;
      display: block;
      margin: 0 auto;
    }

    .product_desc {
      text-align: center;
      padding-top: 10px;
      font-weight: bold;
      min-height: 45px;
    }

    .product_amt {
      text-align: center;
      padding-top: 5px;
      font-weight: bold;
      color: #ffe4b5;
    }

    button.wishlist {
      background: #FF007F;
      color: white;
      border: none;
      padding: 8px 12px;
      margin: 10px auto;
      display: block;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s;
    }

    button.wishlist:hover {
      background: #d6006a;
    }

    .login-note {
      text-align: center;
      margin-top: 10px;
      font-size: 14px;
      color: #fff;
    }

    .login-note a {
      color: yellow;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <h1><?php echo ucfirst($category); ?> Collections</h1>

  <div class="container">
    <?php if (mysqli_num_rows($result) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="Products_Details">
          <img src="<?php echo $row['image']; ?>" class="product_img" alt="">
          <p class="product_desc"><?php echo $row['description']; ?></p>
          <p class="product_amt">Rs.<?php echo $row['price']; ?>/-</p>

          <?php if ($user_id) { ?>
            <form action="add_to_wishlist.php" method="POST">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
              <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
              <button type="submit" class="wishlist">Add to Wishlist</button>
            </form>
          <?php } else { ?>
            <p class="login-note">
              <a href="login.php">Login</a> to add to wishlist
            </p>
          <?php } ?>
        </div>
      <?php } ?>
    <?php } else { ?>
      <p style="text-align:center; font-weight:bold; font-size:18px;">No products found in this category.</p>
    <?php } ?>
  </div>

  <?php include("Footer.php"); ?>
</body>
</html>
