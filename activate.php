<?php
    include './DB.php';
    $db = new DB();
    $urlData = filter_input_array(INPUT_GET);
    
    $id = isset($urlData['id']) ? $urlData['id'] : '';
    
    $db->setParameter([
        'status' => 'Active',
        'id' => $id
    ]);
    
    if($db->staffActivation()){
?>
<script>
    alert("Staff Activated Successfull");
    window.location = './users.php';
</script>
<?php
    }
    
  ?>


