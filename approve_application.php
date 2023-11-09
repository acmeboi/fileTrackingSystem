<?php
session_start();
include './DB.php';
$db = new DB();
$urlData = filter_input_array(INPUT_GET);
$id = isset($urlData['id']) ? $urlData['id'] : '';
$db->setParameter(['id' => $id]);
if($db->approveApplication()) {
    // $db->setParameter($formData);
    // if($db->saveComment()){
?>
<script>
   alert("Application approved successfull!"); 
   window.location = './application.php';
</script>
<?php
    // }
}
?>

