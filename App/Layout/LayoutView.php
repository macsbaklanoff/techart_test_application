<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Css/HeaderStyle.css">
    <link rel="stylesheet" href="/Css/BannerStyle.css">
    <link rel="stylesheet" href="/Css/HomeStyle.css">
    <link rel="stylesheet" href="/Css/ListNewsStyle.css">
    <link rel="stylesheet" href="/Css/DetailStyle.css">
    <link rel="stylesheet" href="/Css/FooterStyle.css">

    <title>Document</title>
</head>

<body>
    <?php
        include __DIR__ . '/../../Views/HeaderView.phtml';

        echo $content;

        include __DIR__ . '/../../Views/FooterView.phtml';
    ?>
</body>

</html>