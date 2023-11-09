<?php
    include './DB.php';
    $db = new DB();
    
    $formData = filter_input_array(INPUT_POST);
    $roleRanks = array(
        '1' => "Officer 1",
        '2' => "Ass. Director",
        '3' => "Deputy Director",
        '4' => "Director",
        '5' => "Permanent Secretary"
    );
    $formData['roleTitle'] = $roleRanks[$formData['roleNumber']];
    $db->setParameter($formData);
    if(!$db->isRoleExist()) {
        if($db->saveRole()) {
?>
<script>
    alert("Role assigned successfull");
    window.location = './manage_role.php';
</script>
<?php
        }
    } else {
       ?>
<script>
    alert("Sorry the role already assigned to someone");
    window.location = './manage_role.php';
</script>
<?php 
    }
    
?>
