<?php
define('IN_STIMS', TRUE);
session_start();
require_once 'include/db_mysql.php';
if($_GET['action']=="login"){
	$str_username = trim( $_POST['username'] );
	$str_passwd = md5(trim( $_POST['password'] ));
	$verificationCode = $_POST['vercode'];
	$usertype=$_POST['usertype'];
	//echo 'userytpe='.$usertype;
	if(!(md5($verificationCode)==$_SESSION['vcode'])){
	echo "<script language='javascript'>alert(\"验证码输入错误！\");</script>";
	echo "<script language='javascript'>location.href='../../index.php'</script>";

	}
	else{
	
	$sql = "select * from bms_staff where user_name='$str_username' and pwd='$str_passwd'";
	//echo $sql;
	mysql_query("SET NAMES 'gb2312'");  
    $result=mysql_query($sql,$conn);
    //$nums = mysql_num_rows($result);
    $row = mysql_fetch_array($result);
    if ($row == null )
    {
    	echo "<script language='javascript'>alert(\"用户名或密码错误！\");</script>";
    	echo "<script language='javascript'>location.href='../../index.php'</script>";
    }
    else
    {

 	$_SESSION['user_id']=$row['id'];
 	$_SESSION['user_name']=$row['user_name'];
 	$_SESSION['level']=$row['level'];
 	$_SESSION['login']='yes';
 	header("Content-type:text/html;charset=GB2312");
    	echo "<script language='javascript'>location.href='frame.php'</script>";
    }
 		}
 
}

?>
