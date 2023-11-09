<?php
    session_start();

	$checks = $_SESSION['checks'];
   
   
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        exit;
    } else {
        
        include 'db_conn.php';

      if(isset($_POST['add'])){
       
        $a = $_POST['staffAssigning'];
        $b = $_POST['sup1'];
        $c = $_POST['sup2'];
        $d = $_POST['sup3'];
        $e = $_POST['sup4'];
        $f = $_POST['sup5'];

        $g = 'Admin';
        
        //auto generation of date 
        $h = date('y:m:d',time());
        $h = date('d/m/Y', strtotime($h));

        $id='';
    

        $sql = "INSERT INTO approvalline(id, staffID, sup1, sup2, sup3, sup4, sup5, inputter, date) 
        VALUES (:id,:a,:b,:c,:d,:e,:f,:g,:h)";

        $q = $db->prepare($sql);
        $q->execute(array(':id'=>$id,':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h));

          header("location:supervising.php");
      }
      }
  ?>


