  <?php
    
    session_start();

	$checks = $_SESSION['checks'];
   
   
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        exit;
    } else {
        


    include 'db_conn.php';
    
    

      if(isset($_POST['add'])){
       
        $a = $_POST['staff'];
        $b = $_POST['staffName'];
        $c = $_POST['dpt'];
        $d = $_POST['rank'];
        $e = $_POST['email'];
        $f = $_POST['contact'];

        $g = 'Password';
        $g = md5($g);
       
        $cat = $_POST['cat'];

        //auto generation of date 
        $h = date('y:m:d',time());
        $h = date('d/m/Y', strtotime($h));

        $id='';
        $status = 'Active';

        $sql = "INSERT INTO staff(id, staffID, staffName, dpt, rak, email, contact, pasword, datee, status, role) 
        VALUES (:id,:a,:b,:c,:d,:e,:f,:g,:h,:status,:cat)";

        $q = $db->prepare($sql);
        $q->execute(array(':id'=>$id,':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$g,':h'=>$h,':status'=>$status,':cat'=>$cat));

          header("location:add_staff.php");
      }
    }
  ?>


