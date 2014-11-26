<?php
/* Соединяемся, выбираем базу данных */
try{
	$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
}
catch (PDOException $e) {

    die();
}
    /* Выполняем SQL-запрос */
	$stmt = $dbh->prepare("SELECT * FROM spravochnik");
	$stmt->execute();

	
	$s1 = '<table class="spravTable"><thead><tr><th class="colId">Id</th><th class="colTitle">Title</th><th class="colDescr">Description</th><th class="colEnc">Enc.type.</th><th class="colEdit">Edit link</th><th class="colDel">Delete link</th></tr></thead><tbody>';
	$res = '';	
	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
     		 
	$res .='<tr itemId="'.$result['id'].'"><td class="colId">'.$result['id'].'</td><td class="colTitle">'.$result['title'].'</td><td class="colDescr">';
	$res .=$result['description'].'</td><td class="colEnc">'.$result['enctype'].'</td><td class="colEdit"><a class="btn" onclick="onEditHandler(this)">Edit</a>';
	$res .='</td><td class="colDel"><a class="btn" onclick="onDeleteHandler(this)">Delete</a></td></tr>';	
    }
	$s2 = '</tbody></table>';
	
	echo json_encode(array('value'=>$s1.$res.$s2));
	
	?>