<?php
    include './DB.php';
    $db = new DB();
    $urlData = filter_input_array(INPUT_GET);
    
    $id = isset($urlData['id']) ? $urlData['id'] : '';
    $db->setParameter(['id' => $id]);
    if($db->deleteRole()) {
        ?>
<script>
    alert("Role remove for this staff");
    window.location = './manage_role.php';
</script>
<?php
    }
?>

