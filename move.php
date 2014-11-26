<?php // editor .php>




$num=$_POST['nums'];
$pieces = explode(",", $num);
for ($i = 0; $i < count($pieces); ++$i) {
    if (strcmp('', trim($pieces[$i])) != 0 && strcmp('', trim($_POST['title-'.$pieces[$i]])) != 0) {


       try{
       		$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
       	}
       	catch (PDOException $e) {

       		die();
       	}
           $stmt = $dbh->prepare("INSERT INTO `movement`(`num`, `date`, `title`, `quant`) VALUES (:num,:date,:title,:quant)");
       	$stmt->bindParam(':num', $_POST['num']);
       	$stmt->bindParam(':date', $_POST['date']);
       	$stmt->bindParam(':title', $_POST['title-'.$pieces[$i]]);
       	$stmt->bindParam(':quant', $_POST['quant-'.$pieces[$i]]);
       	$stmt->execute();


       $dbh = null;


       try{
                     		$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
                     	}
                     	catch (PDOException $e) {

                     		die();
                     	}


                        $stmt = $dbh->prepare("select * from `sklad` WHERE `title` = :title");
                     	$stmt->bindParam(':title', $_POST['title-'.$pieces[$i]]);
                     	//$stmt->bindParam(':quant', $_POST['quant-'.$pieces[$i]]);
                     	$stmt->execute();

                        if (($count=$stmt->rowCount())==0) {

                             $stmt = $dbh->prepare("INSERT INTO `sklad`(`title`, `count`) VALUES (:title,:quant)");
                             $stmt->bindParam(':title', $_POST['title-'.$pieces[$i]]);
                             $stmt->bindParam(':quant', $_POST['quant-'.$pieces[$i]]);
                             $stmt->execute();
                         }
                         else
                         {
                            $stmt = $dbh->prepare("UPDATE `sklad` SET `count`= `count`+ :quant WHERE `title` = :title");
                                              	$stmt->bindParam(':title', $_POST['title-'.$pieces[$i]]);
                                              	$stmt->bindParam(':quant', $_POST['quant-'.$pieces[$i]]);
                                              	$stmt->execute();

                           }


                     $dbh = null;




//       try{
//              		$dbh = new PDO('mysql:host=localhost;dbname=warehouse', 'root','');
//              	}
//              	catch (PDOException $e) {
//
//              		die();
//              	}
//                  $stmt = $dbh->prepare("INSERT INTO `sklad`(`title`, `count`) VALUES (:title,:quant)");
//              	$stmt->bindParam(':title', $_POST['title-'.$pieces[$i]]);
//              	$stmt->bindParam(':quant', $_POST['quant-'.$pieces[$i]]);
//              	$stmt->execute();
//
//
//              $dbh = null;
//
    }
}
  header('Location: movement.php');

?>