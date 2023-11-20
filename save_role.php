<?php
    include './DB.php';
    $db = new DB();
    
    $formData = filter_input_array(INPUT_POST);
    $roleRanks = array(
        '1' => "Rector",
        '2' => "Registra",
        '3' => "Burser",
        '4' => "Director Acadamic Planing",
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
