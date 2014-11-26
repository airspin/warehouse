<?php // editor .php>


header('Content-Type: application/json');
$action = "";
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}       
if (strcmp($action, 'adding') == 0) {
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $enctype = $_POST['enctype'];
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
	}
	catch (PDOException $e) {

		die();
	}
    $stmt = $dbh->prepare("INSERT INTO `spravochnik`(`title`, `description`, `enctype`) VALUES (:title,:descr,:enctype)");
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':descr', $descr);
	$stmt->bindParam(':enctype', $enctype);
	$stmt->execute();


} else if (strcmp($action, 'editing') == 0) {
    $itemid = $_POST['itemId'];
	$title = $_POST['title'];
    $descr = $_POST['descr'];
    $enctype = $_POST['enctype'];

    try{
    		$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
    	}
    	catch (PDOException $e) {

    		die();
    	}
        $stmt = $dbh->prepare("UPDATE `spravochnik` SET `title`=:title,`description`=:descr,`enctype`=:enctype WHERE id=:id");
    	$stmt->bindParam(':title', $title);
    	$stmt->bindParam(':id', $itemid);
    	$stmt->bindParam(':descr', $descr);
    	$stmt->bindParam(':enctype', $enctype);
    	$stmt->execute();

    //добавляем такой фрукт
} else if (strcmp($action, 'deleting') == 0) {
    $itemid = $_POST['itemId'];
	$title = $_POST['title'];
    $descr = $_POST['descr'];
    $enctype = $_POST['enctype'];

     try{
        		$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
        	}
        	catch (PDOException $e) {

        		die();
        	}
            $stmt = $dbh->prepare("DELETE FROM `spravochnik` WHERE id=:id");
        	$stmt->bindParam(':id', $itemid);
        	$stmt->execute();



    //добавляем такой фрукт
}

$dbh = null;

include 'genSpTableJSON.php';

?>