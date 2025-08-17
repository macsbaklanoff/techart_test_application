<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/css/template_style.css">  
  <title>Techart.Web</title>
</head>

<body>
  <header class="header">
    <div class="header_info">
      <img class ="header_info_icon" src = "/uploads/icons/logo 1.svg">
      <p class="header_info_headline">ГАЛАКТИЧЕСКИЙ </br> ВЕСТНИК</p>
    </div>
  </header>
  <div class="main-content">
    <?php
      $home_view = '/HomeView.php'; 
      include __DIR__ .$home_view; 
    ?>
  </div>
  <footer class="footer">
    <div class="footer-line"></div>
    <p class="footer-info">© 2023 — 2412 «Галактический вестник»</p>
  </footer>
</body>
</html>