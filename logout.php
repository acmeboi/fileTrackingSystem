<?php 
        session_start(); 
    
    if(isset($_COOKIE[session_name()])){
	setcookie(session_name(), '', time()-82000, '/');
	//Destroy the session		
	session_destroy();
	header("location:index.php");
	exit();
	
}
    
?>