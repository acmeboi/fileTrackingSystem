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
    ]; 
    
    $attachment = './uploads/'.$formData['file_no'].date('H:i:s') .'_'.$_FILES['attachment']['name'];
    $staffData['attachment'] = $attachment;

    $db->setParameter($staffData);
    if(!$db->isExistApplication()) {
        $lastId = $db->saveApplication();
        for($i = 0; $i < count($formData['office']); $i++) {
            $office = ['appId' => $lastId, 'office' => $formData['office'][$i]];
            $db->saveApprovalOnApply($office);
        }

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


