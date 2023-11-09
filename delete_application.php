<?php

include './DB.php';
$db = new DB();
$urlData = filter_input_array(INPUT_GET);
$db->setParameter(['id' => $urlData['id']]);
if($db->deleteApplication()) {
?>
<script>
   alert("Application Deleted!"); 
   window.location = './application.php';
</script>
<?php
}

