<!DOCTYPE html>
<html>
<head>
    <title>Склад</title>
    <meta charset="utf-8">

    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/config.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/jqueryui/jquery-ui.js" ></script>


    <link rel="stylesheet" href="js/jqueryui/jquery-ui.structure.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="sbody">

   <span class="titlesk">
               Склад
   </span>
   <div class="skl" scroll="no">
      <a href="main.html">
        <img class='home' src="images/home.png">
      </a>

                <?php
                include 'genSkTable.php';
                ?>
   </div>
</body>
</html>