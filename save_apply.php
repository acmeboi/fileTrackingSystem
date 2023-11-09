<?php
    
    include './DB.php';
    $db = new DB();
    $formData = filter_input_array(INPUT_POST);
    session_start();
    $staffId = $_SESSION['logerId'];

    $staffData = [
        'file_no' => $formData['file_no'], 
        'staff_name' => $formData['staff_name'], 
        'email' => $formData['email'], 
        'phone' => $formData['phone'], 
        'attachment' => '', 
        'tender' => $formData['tender'], 
        'mood' => $formData['mood'], 
        'staffId' => $staffId, 
        'status' => 0, 
        'sup2' => property_exists((object)$formData, 'rectory') ? 1 : 0, 
        'sup3' => property_exists((object)$formData, 'registry') ? 1 : 0, 
        'sup4' => property_exists((object)$formData, 'bursery') ? 1 : 0, 
        'sup5' => property_exists((object)$formData, 'directo_acadamic_planing') ? 1 : 0
    ];
    
    $attachment = './uploads/'.$formData['file_no'].date('H:i:s') .'_'.$_FILES['attachment']['name'];
    $staffData['attachment'] = $attachment;

    $db->setParameter($staffData);
    if(!$db->isExistApplication()) {
        $lastId = $db->saveApplication();
        die($lastId);
        if($db->saveApplication()) {
            move_uploaded_file($_FILES['attachment']['tmp_name'], $attachment);
            ?>
        <script>
            alert("Application submited successfull!");
            window.location = './application.php';
        </script>
<?php
        }
    }else {
        ?>
        <script>
            alert("Sorry this staff has exist open application");
            window.location = './apply.php';
        </script>
<?php
    }
	
  ?>


