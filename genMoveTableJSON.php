<?php


header('Content-Type: application/json');


    $number = $_POST['num'];




/* Соединяемся, выбираем базу данных */
try{
	$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
}
catch (PDOException $e) {

    die();
}
    /* Выполняем SQL-запрос */
	$stmt = $dbh->prepare("SELECT `date`, `title`, `quant` FROM `movement` WHERE `num`=$number");
	$stmt->execute();

	
	$s1 = '<table class="MoveTable"><thead><tr><th class="colId">Наименование</th><th class="colTitle">Количество</th><th class="colDescr">Дата</th></tr></thead><tbody>';
	$res = '';	
	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
     		 
	$res .='<tr><td>'.$result['title'].'</td><td>'.$result['quant'].'</td><td>';
	$res .=$result['date'].'</td>';
    }
	$s2 = '</tbody></table>';
	
	echo json_encode(array('value'=>$s1.$res.$s2));
	
	?>