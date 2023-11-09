<?php

include'./DB.php';
$db = new DB();

$formData = filter_input_array(INPUT_POST);
$usrData = filter_input_array(INPUT_GET);

if (isset($formData['login'])) {
    $username = $formData['staffID'];
    $password = md5($formData['password']);
    
    $param = [
        'username' => $username,
        'password' => $password
    ];
    
    $db->setParameter($param);
    $user = $db->getLogerInfo();
    
    if($user['status'] == true) {
        $loger = $user['data'];
        session_start();
        $_SESSION['logerId'] = $loger->id;
        $_SESSION['name'] = $loger->staffName;
        $_SESSION['role'] = $loger->roleNumber;
        $_SESSION['rank'] = $loger->roleTitle;
        header('location: home.php');
    }else {
        $admin = $db->getLogerAdmin();
        if($admin['status'] == true){
            $logerAdmin = $admin['data'];
            session_start();
            $_SESSION['logerId'] = $logerAdmin->id;
            $_SESSION['name'] = "Admin";
            $_SESSION['role'] = 6;
            $_SESSION['rank'] = "Supper Admin";
            header('location: home.php');
        }else {
?>
<script>
   alert("Invalid Staff ID or Password"); 
   window.location = './index.php';
</script>
<?php
        }
    }
}
?>
    