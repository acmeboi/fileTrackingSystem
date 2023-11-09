<?php
    include './DB.php';
    $db = new DB();
    $formData = filter_input_array(INPUT_POST);
    $newStatus = [
        'status' => 1,
        'id' => $formData['appId']
    ];
    $db->setParameter($formData);
    if($db->rejectApplication()) {
        $db->setParameter($newStatus);
        if($db->updateApplicationStatus()){
?>
<script>
    alert("Application Rejected");
    window.location = './application.php';
</script>
<?php
        }
    }
?>

