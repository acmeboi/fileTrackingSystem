<?php
    include './DB.php';
    $db = new DB();
    $urlData = filter_input_array(INPUT_GET);
    
    $id = isset($urlData['id']) ? $urlData['id'] : '';
    
    $db->setParameter([
        'status' => 'Deactivated',
        'id' => $id
    ]);
    
    if($db->staffActivation()){
?>
<script>
    alert("Staff Deactivated");
    window.location = './users.php';
</script>
<?php
    }
    
  ?>


