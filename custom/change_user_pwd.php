<?php
session_start(); 
$user_id = $_SESSION['user_id'];
//echo '$user_id='.$user_id;
if ($user_id==null || $user_id=="")
{
	//echo "<script language='javascript'>alert('请先登录系统！');window.location='../../index.php';</script>";
	echo "<script language='javascript'>alert('请先登录系统！');window.location='./index.php';</script>";
	exit;
	//echo "Error";
}
if($_POST['old_pwd']!=null && $_POST['old_pwd']!="" && $_POST['new_pwd']!=null && $_POST['new_pwd']!="")
{

$old_pwd = md5(trim($_POST['old_pwd']));
$new_pwd =md5(trim($_POST['new_pwd']));
//require_once '../../include/db_mysql.php';
require_once 'include/db_mysql.php';
//$sql = "select * from stdb_user where id='$user_id'";//这是以前的版本
//以下是现在的版本2010.7.26 邱全伟
$sql = "select * from nstc_manage where id='$user_id'";
mysql_query("SET NAMES 'gb2312'"); 
$result=mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row==null)exit;
if($row['pwd']!=$old_pwd )
{
	echo "<script language='javascript'>alert(\"原始密码不正确\");</script>";//window.location='../templates/user_group_list.php';
}
else
{
	//$sql = "update stdb_user set pwd='$new_pwd' where id='$user_id'";//这是以前的版本
	$sql = "update  nstc_manage set pwd='$new_pwd' where id='$user_id'";
	$result = mysql_query($sql) or die(mysql_error());
	echo "<script language='javascript'>alert(\"密码修改成功\");history.go(-2);</script>";	
}
}
$_POST['old_pwd']="";
$_POST['new_pwd']="";
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-type" content="text/html;charset=gb2312" />
<title>修改密码 </title>
<!--<script type="text/javascript" src="../../js/jquery.js" language="JavaScript"></script> 
<script type="text/javascript" src="../../js/menu.js" language="JavaScript"></script> 
<script type="text/javascript" src="../../js/weebox.js"></script>  
<link rel="stylesheet" type="text/css" media="screen, print" href="../../style/style.css" />
<link type="text/css" rel="stylesheet" href="../../style/weebox.css" />
<meta name="MSSmartTagsPreventParsing" content="TRUE" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />-->


<script type="text/javascript" src="js/jquery.js" language="JavaScript"></script> 
<script type="text/javascript" src="js/menu.js" language="JavaScript"></script> 
<script type="text/javascript" src="js/weebox.js"></script>  
<link rel="stylesheet" type="text/css" media="screen, print" href="style/style.css" />
<link type="text/css" rel="stylesheet" href="style/weebox.css" />
<meta name="MSSmartTagsPreventParsing" content="TRUE" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="text/javascript" >
function validate(thisform)
{
	if(thisform.old_pwd.value==null || thisform.old_pwd.value=="") 
	{
		alert("请输入原始密码");
		thisform.old_pwd.focus();
		return false;
	}
	if(thisform.new_pwd.value==null || thisform.new_pwd.value=="") 
	{
		alert("请输入新密码");
		thisform.new_pwd.focus();
		return false;
	}
	if(thisform.confirm_pwd.value==null || thisform.confirm_pwd.value=="") 
	{
		alert("请确认新密码");
		thisform.confirm_pwd.focus();
		return false;
	}
	if(thisform.confirm_pwd.value!=thisform.new_pwd.value)
	{
		alert("两次输入的密码不相同");
		thisform.confirm_pwd.value="";
		thisform.new_pwd.value="";
		return false;
	}
	else return true;
}

function back(){
	//window.location.href="../../main.php";
	window.location.href="main.php";
}
</script>
</head>
<!--<body background="../../images/middle_bg.gif">-->
<body background="images/middle_bg.gif">
<form id="update_form" name="update_form" action="<?php  echo $_SERVER['PHP_SELF'];?>" onSubmit="return validate(this)" method="post">
<div class="nastor-logo">
	<div id="logo">
	</div><div class="toptitle">修改密码</div>
	</div>
	<table height='40%' align="center" cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
		  <td colspan="3" height="40px;"></td>
		</tr>
		
		<tr>
			<td colspan="3" height="5px" align="center">(红色<font color="Red"> * </font>为必填项)</td>
		</tr>
		<tr >
			<td height="5px" width="46%" align="right" >原始密码：</td>
			<td width="30%" align="left"><input height="15px" type="password" id="old_pwd" name="old_pwd"   /><font color="Red"> * </font></td>
		</tr>
		<tr >
			<td height="5px" align="right">新密码：</td>
			<td width="30%" align="left"><input height="15px" type="password" name="new_pwd" id="new_pwd" value=""/><font color="Red"> * </font></td>
		</tr>
		<tr >
			<td height="5px" align="right">确认新密码：</td>
			<td width="30%"align="left"><input height="15px" type="password" name="confirm_pwd" id="confirm_pwd" value="" /><font color="Red"> * </font></td>
		</tr>
		<tr>
			<td height="5px" colspan="3" height="5px;" align="center">
			<div class="landing_button">
			  <input type="submit" id="confirm" name="confirm" value="保存修改" />
			  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			  <!-- <input type="button" id="confirm2" name="confirm2" value="取消" onClick=""/>-->
			  <!-- mana -->
			  <input type="button" onclick="back()" id="btn_back" value="返    回">
			  <!-- <input type="button" id="confirm2" name="confirm2" value="放弃修改" onClick="return_list2();"/> -->
			  <!-- end -->
			</div>
			</td>
			<td width="4%" height="5px;" colspan="3" align="center">
			
			</td>
		</tr>
        <tr>
		  <td colspan="3" height="30px;"></td>
		</tr>
	  </table>
	  <table height='34%' align="center" cellpadding="0" cellspacing="0" border="0" width="100%">
	  <tr>
	  	<td>
	  	</td>
	  </tr>
	  </table>
</form>
<div id="footer">
存储产品及系统质量监督检验中心
</div>
</body>
</html>
