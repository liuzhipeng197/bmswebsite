<?php
	include("../../../include/db_mysql.php");
	$htmlData=$_GET['content'];
	if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($htmlData);
		} else {
			$htmlData = $htmlData;
		}
	//str_replace($content,"?","&nbsp;");
	echo $htmlData;
	
	    	//mysql_close();
	
?>