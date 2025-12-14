<?php
// header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anaxor</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: #f9f9f9;
    }

    /* Header */
    header {
      width: 100%;
      height: 60px;
      background: #111;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .logo {
      font-size: 22px;
      font-weight: bold;
      letter-spacing: 2px;
      display: block;
      margin-top:2px;
      margin-right:980px;
      width: 150px;
    }

    .menu-icon {
      font-size: 28px;
      cursor: pointer;
    }

    .fa-user{
      width: 80px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      color:gold;
      margin-top: 33px;
    }

    /* Sidebar */
    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      top: 0;
      left: 0;
      background: #222;
      overflow-x: hidden;
      transition: 0.3s;
      padding-top: 60px;
      z-index: 1;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      text-decoration: none;
      color: #ddd;
      font-size: 18px;
      transition: 0.2s;
    }

    .sidebar a:hover {
      background: #444;
      color: #fff;
    }

    .sidebar .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 28px;
      cursor: pointer;
      color: #fff;
    }
    .sidebar .logo{
      font-size: 22px;
      font-weight: bold;
      letter-spacing: 2px;
      color :#fff;
      cursor: pointer;
      margin:0px 0px 50px 50px;
    }

    .wishlist{
        background:#DE638A;
        color:white;
        border:none;
        text-decoration: none;        
        padding:5px 10px;
        margin-left:10px auto;
        display:block;
        border-radius:5px;
        cursor:pointer;

    }

  </style>
</head>
<body>

<header>
  <span class="menu-icon" onclick="openSidebar()">&#9776;</span>
  <div class="logo">ANAXOR</div>
  <a href="wishlist.php" class="wishlist"> <i class="fa-solid fa-heart"></i></a>
  <i class="fa-solid fa-user" alt="Profile" onclick="window.location.href='profile.php'"></i>
</header>

<!-- Sidebar -->
<div id="mySidebar" class="sidebar">
  <span class="close-btn" onclick="closeSidebar()">&times;</span>
  <div class="logo">ANAXOR</div>
  <a href="shirts.php">Shirts</a>
  <a href="pants.php">Pants</a>
  <a href="watches.php">Watches</a>
  <a href="shoes.php">Shoes</a>
  <a href="fragrance.php">Fragrances</a>
  <a href="sunglasses.php">Sunglasses</a>
  <a href="belts.php">Belts</a>
  <a href="slippers.php">Slippers</a>
  <a href="wallets.php">Wallets</a>
  <a href="wishlist.php"> Wishlist ❤️</a>
</div>

<script>
  function openSidebar() {
    document.getElementById("mySidebar").style.width = "250px";
  }
  function closeSidebar() {
    document.getElementById("mySidebar").style.width = "0";
  }
</script>
</body>
</html>
