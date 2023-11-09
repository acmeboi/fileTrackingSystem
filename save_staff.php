<?php

include './DB.php';
$db = new DB();

$formData = filter_input_array(INPUT_POST);

unset($formData['cpassword']);
unset($formData['add']);
$formData['password'] = md5($formData['password']);
$db->setParameter($formData);
if(!$db->isStaffExist()){
    if($db->saveStaff()){
?>
<script>
    alert("Staff Record Save Successfull!");
    window.location = './users.php';
</script>
<?php
    }
}else {
?>
<script>
    alert("Sorry Staff Record Already Exist");
</script>
<?php     
}

?>

