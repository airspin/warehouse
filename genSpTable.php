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

	?>
	 <table class="spravTable">
                     <thead>
                     <tr>
                         <th class="colId">Id</th>
                         <th class="colTitle">Title</th>
                         <th class="colDescr">Description</th>
                         <th class="colEnc">Enc.type.</th>
                         <th class="colEdit">Edit link</th>
                         <th class="colDel">Delete link</th>
                     </tr>
                     </thead>
                     <tbody>
					 
		<?php
	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        
?>			 
		<tr itemId="<?php
		
		print $result['id'];
		
		?>">
                    <td class="colId"><?php
		
		print $result['id'];
		
		?></td>
                    <td class="colTitle"><?php
		
		print $result['title'];
		
		?></td>
                    <td class="colDescr"><?php
		
		print $result['description'];
		
		?></td>
                    <td class="colEnc"><?php
		
		print $result['enctype'];
		
		?></td>
                    <td class="colEdit">
                        <a class="btn" onclick="onEditHandler(this)">Edit</a>
                    </td>
                    <td class="colDel">
                        <a class="btn" onclick="onDeleteHandler(this)">Delete</a>
                    </td>
                </tr>
<?php		
		
		
    }
    ?>
	</tbody>
	</table>