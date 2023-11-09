<?php
    
    include './DB.php';
    $db = new DB();
    $formData = filter_input_array(INPUT_POST);
    session_start();
    
    $staffId = $_SESSION['logerId'];
    $financialBid = 'uploads/'.$formData['rcNumber'].'_'.$_FILES['financialBid']['name'];
    $mpb = 'uploads/'.$formData['rcNumber']."_".$_FILES['mpb']['name'];
    $technicalBid = 'uploads/'.$formData['rcNumber']."_".$_FILES['technicalBid']['name'];
    $bpp = 'uploads/'.$formData['rcNumber']."_".$_FILES['bpp']['name'];
    $awardLetter = 'uploads/'.$formData['rcNumber']."_".$_FILES['awardLetter']['name'];
    $fecApproval = 'uploads/'.$formData['rcNumber']."_".$_FILES['fecApproval']['name'];
    
    $data = [
        'companyName'=> $formData['companyName'],
        'rcNumber'=> $formData['rcNumber'],
        'email'=> $formData['email'],
        'phone'=> $formData['phone'],
        'addr1'=> $formData['addr1'],
        'addr2'=> $formData['addr2'],
        'state'=> $formData['state'],
        'zipCode'=> $formData['zipCode'],
        'fileNumber'=> $formData['fileNumber'],
        'projectTitle'=> $formData['projectTitle'],
        'projectLocation'=> $formData['projectLocation'],
        'contractAmount'=> $formData['contractAmount'],
        'dateAward'=> $formData['dateAward'],
        'financialBid'=> $financialBid,
        'mpb'=> $mpb,
        'technicalBid'=> $technicalBid,
        'bpp'=> $bpp,
        'awardLetter'=> $awardLetter,
        'fecApproval'=> $fecApproval,
        'tender'=> $formData['tender'],
        'mood' => $formData['mood'],
        'staffId'=> $staffId,
        'status' => 0,
        'id' => $formData['id']
    ];
    $db->setParameter($data);
    if($db->saveReaplly()) {
            move_uploaded_file($_FILES['financialBid']['tmp_name'], './'.$financialBid);
            move_uploaded_file($_FILES['mpb']['tmp_name'], './'.$mpb);
            move_uploaded_file($_FILES['technicalBid']['tmp_name'], './'.$technicalBid);
            move_uploaded_file($_FILES['bpp']['tmp_name'], './'.$bpp);
            move_uploaded_file($_FILES['awardLetter']['tmp_name'], './'.$awardLetter);
            move_uploaded_file($_FILES['fecApproval']['tmp_name'], './'.$fecApproval);
            ?>
        <script>
            alert("Application Re-applied successfull!");
            window.location = './application.php';
        </script>
<?php
    }
	
  ?>


