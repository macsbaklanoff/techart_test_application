<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Css/HomeStyle.css">
  <title>Document</title>
</head>

<body>
  <div class="main-content">
    <h1>Новости</h1>
    <p onclick="goToNewsView()">Просмотр новостей</p>
  </div>
</body>
<script>
  function goToNewsView() {
    console.log("goToNewsView");
    //отправить get запрос на переход на другой url 
    const newUrl = `/news/`;
    fetch(newUrl, {
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    }).then(response => {
      return response.json()
    }).then(data => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(data.html, 'text/html');
      const newsDetail = doc.querySelector('.main_content');
      const currentMainContent = document.querySelector('.main_content')
      currentMainContent.innerHTML = newsDetail.innerHTML
      history.pushState(null, null, newUrl);
    })
  }
</script>

</html>