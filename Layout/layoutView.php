<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Css/headerStyle.css">
    <link rel="stylesheet" href="/Css/bannerStyle.css">
    <link rel="stylesheet" href="/Css/homeStyle.css">
    <link rel="stylesheet" href="/Css/listNewsStyle.css">
    <link rel="stylesheet" href="/Css/detailStyle.css">
    <link rel="stylesheet" href="/Css/footerStyle.css">

    <title>Document</title>
</head>

<body>
    <?php
        include __DIR__ . '/../Templates/Header/headerView.phtml';

        echo $content;

        include __DIR__ . '/../Templates/Footer/footerView.phtml';
    ?>
</body>

</html>