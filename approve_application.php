<?php
session_start();
include './DB.php';
$db = new DB();
$formData = filter_input_array(INPUT_POST);
$db->setParameter(['id' => $formData['appId']]);
$field = 'sup'.$_SESSION['role'];
if($db->approveApplication($field)) {
    $db->setParameter($formData);
    if($db->saveComment()){
?>
<script>
   alert("Application approved successfull!"); 
   window.location = './application.php';
</script>
<?php
    }
}
?>

