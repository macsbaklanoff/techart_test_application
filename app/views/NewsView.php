<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/views/style.css">  
  <title>Document</title>
</head>
<body>
  <!-- <button onclick = "window.location.href = 'test'" class="test">
    Go to second page.
  </button> -->
  <div>
    <p><?= htmlspecialchars($news['id'])?></p>
    <p><?= htmlspecialchars($news['title'])?></p>
  </div>
</body>
</html>