<?php
/* Соединяемся, выбираем базу данных */
try{
	$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
}
catch (PDOException $e) {

    die();
}
    /* Выполняем SQL-запрос */
	$stmt = $dbh->prepare("SELECT * FROM sklad");
	$stmt->execute();

	?>
	 <table class="skladTable">
                     <thead>
                     <tr>
                         <th class="colId">№</th>
                         <th class="colTitle">Наименование</th>
                         <th class="colEnc">Количество</th>
                     </tr>
                     </thead>
                     <tbody>
					 
		<?php
	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        
?>			 
		<tr>
                    <td class="colId"><?php
		
		print $result['num'];
		
		?></td>
                    <td class="colTitle"><?php
		
		print $result['title'];
		
		?></td>
                    <td class="colEnc"><?php

		print $result['count'];

		?></td>


                </tr>
<?php		
		
		
    }
    ?>
	</tbody>
	</table>