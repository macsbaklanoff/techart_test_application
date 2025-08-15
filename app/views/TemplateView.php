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
      <img src = "/uploads/icons/logo 1.svg">
      <p>ГАЛАКТИЧЕСКИЙ ВЕСТНИК</p>
    </div>
  </header>
  <?php
  $home_view = '/HomeView.php'; 
  include __DIR__ .$home_view; 
  ?>
  <footer>галактический вестник</footer>
</body>
</html>