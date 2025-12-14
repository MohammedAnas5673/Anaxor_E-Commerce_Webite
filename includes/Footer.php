<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    /* Footer Styles */
.site-footer {
  background: #222;
  color: #ddd;
  padding: 40px 20px 20px;
  margin-top: 40px;
}

.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: auto;
}

.site-footer h3, 
.site-footer h4 {
  color: #fff;
  margin-bottom: 15px;
}

.site-footer p {
  font-size: 14px;
  line-height: 1.6;
}

.footer-links ul {
  list-style: none;
  padding: 0;
}

.footer-links ul li {
  margin-bottom: 10px;
}

.footer-links ul li a {
  color: #ddd;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-links ul li a:hover {
  color: #ff9800;
}

.footer-bottom {
  text-align: center;
  border-top: 1px solid #444;
  padding-top: 15px;
  margin-top: 30px;
  font-size: 13px;
}

</style>
</head>
<body>
    <!-- footer.php -->
<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-about">
      <h3>ANAXOR</h3>
      <p>Your trusted fashion store. Shirts, pants, and watches — all in one place.</p>
    </div>

    <div class="footer-links">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Shirts</a></li>
        <li><a href="#">Pants</a></li>
        <li><a href="#">Watches</a></li>
      </ul>
    </div>

    <div class="footer-contact">
      <h4>Contact Us</h4>
      <p>Email: anaxor.online.shop.com</p>
      <p>Phone: +91 8300724254</p>
      <p>Location: Virudhunagar,India </p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© <?php echo date("Y"); ?> ANAXOR. All Rights Reserved.</p>
  </div>
</footer>
    
</body>
</html>
