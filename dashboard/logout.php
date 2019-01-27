<?php
	setcookie("userfname",0,time()-3600,"/","",0);
  	setcookie("userlname",0,time()-3600,"/","",0);
  	setcookie("userid",0,time()-3600,"/","",0);
  	header("Location: index.php");
	die();
?>