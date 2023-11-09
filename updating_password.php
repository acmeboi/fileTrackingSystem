  <?php
    $db_host        = 'localhost';
    $db_user        = 'root';
    $db_pass        = '';
    $db_database    = 'pcure'; 

    $conn = mysql_connect($db_host,$db_user,$db_pass);
    $db_con = mysql_select_db($db_database,$conn);


      if(isset($_POST['change'])){
       
        $staffID = $_POST['staffID']; 
        $currentPassword = $_POST['currentPassword'];
        $newPassword = md5($_POST['newPassword']);
        $rNewPassword = md5($_POST['rNewPassword']);


        $sql = mysql_query("UPDATE staff
                SET pasword='$rNewPassword' 
                WHERE staffID='$b'");

        if($sql){
          echo '<script type="text/javascript">document.alert("Charge Successfully");</script>';
          header("location:index.php");
        }
        else{
          echo "Not possible".mysql_error();
        }
         
      }
  ?>