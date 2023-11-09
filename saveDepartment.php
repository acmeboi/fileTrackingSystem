<?php
    session_start();

	$checks = $_SESSION['checks'];
   
   
    if(!isset($_SESSION['user'])){
        header('Location: index.php');
        exit;
    } else {
        
        include 'db_conn.php';

      if(isset($_POST['add'])){
       
        $nam = $_POST['dpt'];
    

        //auto generation of date 
      
       $dat = date("d-m-Y");    

        $id= 1;
        
        $user = $_SESSION['user'];
        $requestID=$_GET['requestID'];

        $result = $db->prepare("SELECT * FROM department ORDER by id DESC");
        $result->execute();

        if ($row = $result->fetch()){
            $id = $row['id'];
            $id = $id + 1;
            
        }

        $sql = "INSERT INTO department(id, nam, dat) 
        VALUES (:id, :nam, :dat)";

        $q = $db->prepare($sql);
        $q->execute(array(':id'=>$id,':nam'=>$nam,':dat'=>$dat));
        
        echo "  
                <script>
                    alert('Department is added successfully');
                     window.location = '../';
                </script>
            ";
                   
            header("location:department.php");
            exit();

          
      }
    }
  ?>