<!DOCTYPE html>
<html>
<head>
    <title>movement</title>
    <meta charset=utf-8">
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/config.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/jqueryui/jquery-ui.js" ></script>


    <link rel="stylesheet" href="js/jqueryui/jquery-ui.structure.css"/>
    <link rel="stylesheet" href="css/style.css"/>

</head>
<body class="bodym">
<div class="dark">
<img src="loading.gif" width="100" height="100"/>
</div>
<div class="report">
   <span class="rep">Номер договора</span>
   <?php
   /* Соединяемся, выбираем базу данных */
   try{
   	$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
   }
   catch (PDOException $e) {

       die();
   }
       /* Выполняем SQL-запрос */
   	$stmt1 = $dbh->prepare("SELECT * FROM movement");
   	$stmt1->execute();


   	?>



   	<select class="selec" name="ndog" onchange="showRep(this)">
                            <?php
                                        while ($result = $stmt1->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                            <?php
                                          print '<option value='.$result['num'].'>'.$result['num'];


                                         ?>
                             <?php	 } ?>

     </option></select>

     <?php
     //	include 'genMoveTable.php';
     ?>


   <div class="repp"></div>
</div>
<div class="contentm">
   <a href="main.html">
           <img class='home' src="images/home.png">
         </a>
    <span class='title'>
        Движение товара
    </span>

    <span class='view'> Показать/скрыть договоры </span>


<?php
/* Соединяемся, выбираем базу данных */
try{
	$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
}
catch (PDOException $e) {

    die();
}
    /* Выполняем SQL-запрос */
	$stmt = $dbh->prepare("SELECT title,id FROM spravochnik");
	$stmt->execute();


	?>


    <div class="moveb">
    <img id="tel" src="images/2500.png">
        <div class="col1s">

        <form action="move.php" method="post" class="MoveForm">
             <input type="hidden" name="nums" value=",1,"/>

                        <table class="dog">
                         <thead>
                                     <th>№ Договора</th>
                                     <th>Дата</th>
                         </thead>
                         <tr><td><input type="text" name="num"></td>
                             <td><input id="datepicker" name="date" type="text"></td>
                         </tr>
                        </table>
                        <table class="move">
                        <thead>
                        <th>Наименование</th>
                        <th>Количество</th>
                        </thead>
                        <tbody>
                        <tr num="1">
                        <td><select name="title-1" class="sel">
                        <?php
                                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    ?>
                        <?php
                                      print '<option value='.$result['title'].'>'.$result['title'];
                                     ?>
                         <?php	 } ?>

                        </option></select></td>
                        <td><input type="text" name="quant-1"></td>
                        </tr>
                        </tbody>
                        </table>


        <a class="addTr btn">Add</a>
        <a class="apply btn" type="submit">Apply</a>
        </div>


        <img class="bear" src="images/bear.gif">

    </div>

     </div>
            </form>


        </div>

</body>
</html>