<?php
// index.php
// Homepage for Anaxor
include("db_connect.php");
include("Header.php"); // Navigation + Logo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anaxor - Men's Wear</title>
    <link rel="stylesheet" href="assets/css/style.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background:wheat;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 40px auto;
    text-align: center;
    padding: 0 20px;
}

.container h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    color: #222;
}

.container p {
    font-size: 1.1rem;
    margin-bottom: 40px;
    color: #666;
}

.categories {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 25px;
}
.category {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
    text-decoration: none;
    color: #333;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    cursor: pointer;

}
.category img {
    width: 100%;
    height: 240px;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.category h2 {
    padding: 18px;
    font-size: 1.3rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    background: #fff;
    border-top: 1px solid #eee;
}
.category:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.18);
}

.category:hover img {
    transform: scale(1.05);
}

.category:hover h2 {
    background: goldenrod;
    color: #fff;
}

</style>
</head>
<body>

    <div class="container">
        <h1>Welcome to Anaxor</h1>
        <p>Your one-stop shop for Men’s Wear</p>

        <div class="categories">
            <!-- Category Cards -->
            <a href="product_list.php?category=shirt" class="category">
                <img src="assets/indexshirt.jpg" alt="Shirts">
                <h2>Shirts</h2>
            </a>

            <a href="product_list.php?category=pant" class="category">
                <img src="assets/indexspant.jpg" alt="Pants">
                <h2>Pants</h2>
            </a>

            <a href="product_list.php?category=watch" class="category">
                <img src="assets/indexwatch.jpg" alt="Watches">
                <h2>Watches</h2>
            </a>

            <a href="product_list.php?category=shoe" class="category">
                <img src="assets/indexshoes.jpg" alt="Shoes">
                <h2>Shoes</h2>
            </a>

            <a href="product_list.php?category=sunglass" class="category">
                <img src="assets/indexsunglasses.jpg" alt="Sunglasses">
                <h2>Sunglasses</h2>
            </a>

            <a href="product_list.php?category=fragrance" class="category">
                <img src="assets/indexfragrances.jpg" alt="Fragrance">
                <h2>Fragrance</h2>
            </a>

            <a href="product_list.php?category=belt" class="category">
                <img src="assets/indexbelt.jpg" alt="Belt">
                <h2>Belts</h2>
            </a>

            <a href="product_list.php?category=slipper" class="category">
                <img src="assets/indexslipper.jpg" alt="Slippers">
                <h2>Slippers</h2>
            </a>
        </div>
    </div>

<?php include("Footer.php"); ?>
</body>
</html>
