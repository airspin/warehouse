<?php
/* Соединяемся, выбираем базу данных */
//try{
//	$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
//}
//catch (PDOException $e) {
//
//    die();
//}
//    /* Выполняем SQL-запрос */
//	$stmt = $dbh->prepare("SELECT `date`, `title`, `quant` FROM `movement` WHERE `num`=$number");
//	$stmt->execute();
//
//	?>
	 <table class="MoveTable">
                     <thead>
                     <tr>
                         <th class="colTitle">Наименование</th>
                         <th class="colDescr">Количество</th>
                         <th class="colEnc">Дата</th>
                     </tr>
                     </thead>
                     <tbody>
					 
		<?php
//	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
//
//?>
//		<tr itemId="<?php
//
//		print $result['id'];
//
//		?>">
//
//                    <td class="colTitle"><?php
//
//		print $result['title'];
//
//		?></td>
//                    <td class="colDescr"><?php
//
//		print $result['quant'];
//
//		?></td>
//                    <td class="colEnc"><?php
//
//		print $result['date'];
//
//		?></td>
//                </tr>
//<?php
//
//
//    }
//    ?>
	</tbody>
	</table>