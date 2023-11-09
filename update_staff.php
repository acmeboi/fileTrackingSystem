<?php

include './DB.php';
$db = new DB();

$formData = filter_input_array(INPUT_POST);

unset($formData['cpassword']);
unset($formData['add']);
$formData['password'] = md5($formData['password']);
$db->setParameter($formData);
if($db->updateStaff()){
?>
<script>
    alert("Staff Record updated Successfull!");
    window.location = './users.php';
</script>
<?php
}   
?>

