<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html" /> 
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../style/datePicker.css" />
<link rel="stylesheet" type="text/css" href="../style/subtable.css" />
<script  charset="utf-8" src="../js/jquery-second.js" type="text/javascript"></script>
<script  charset="utf-8" src="../js/jquery.datePicker-min.js" type="text/javascript"></script>
<script type="text/javascript" language="JavaScript"> 
function modifypwd(){
		var str_logname="<?php echo $_SESSION['cus_realname']?>";			//获取日志管理操作人id
		var str_id=<?php echo $_SESSION['cus_id']?>;
		
		var old_pwd=$('#old_pwd').val();
		var new_pwd=$('#new_pwd').val();
		var new_pwd1=$('#new_pwd1').val();
		//alert(user_id);
		if(old_pwd==''){
			alert("请输入您的原登录密码：");
		}else if(new_pwd==''){
			alert("请输入您的新登录密码：");
		}else if(new_pwd1==''){
			alert("请输入您的确认新密码");
		}else if(new_pwd==old_pwd){
			alert("您输入的原登录密码和新登录密码一样，请重新输入");
		}else if(new_pwd!=new_pwd1){
			alert("您两次输入的新密码不一致，请重新输入");
			document.getElementById('new_pwd').value='';
			document.getElementById('new_pwd1').value='';
		}else{
			//alert("OK");			
			$.post("./task.php",{action:"modify_pwd",str_id:str_id,new_pwd:new_pwd,old_pwd:old_pwd,str_logname:str_logname},function(data){
					if(data=="OK"){
						alert("密码设置成功，请用您的新密码重新登录！");
						window.location.href="modify_login_password.php";
					}else if(data=="pwd error"){
						alert("对不起，您输入的旧登录密码有误，请重试");
						document.getElementById('old_pwd').value='';
						document.getElementById('new_pwd').value='';
						document.getElementById('new_pwd1').value='';
						//window.location.href="../index.php";
					}
				});
		}
 }

</script>
</head>
<body onload="loadProv()">
<!--<table width="100%" cellpadding="0" cellspacing="0" border="0">-->
<tr>
	<td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td height="24" class=table_title ><table width="100%" border="0" cellspacing="0" cellpadding="0">
       			<tr>
       				<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
       					<tr>
       						<td height="19" valign="bottom"><div align="center"><img src="../images/tb.gif" /></div></td>
         					<td valign="bottom"><span class="table_title">个人信息管理>修改登录密码</span></td>
         				</tr>
         			</table></td>
         			<td><div align="right"><span class="table_title"></span></div></td>
           		</tr>
         	</table></td>
         </tr>
	</table></td>
</tr>
<!--  <div id="mainbody">-->
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<!-- <div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:600px;padding:5px;'> -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
	<tr>
		<td><table width="100%" border="1" cellpadding="0" cellspacing="1" bgColor="#a8c7ce" style="border:solid 1px #a8c7ce" > 
			<tr height="30">
				<td width="100%" height="20" class="td_head"></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;原登录密码：<input type="password" id="old_pwd" name="old_pwd" size="45"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;新登录密码：<input type="password" id="new_pwd" name="new_npwd" size="45"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;确认新密码：<input type="password" id="new_pwd1" name="new_pwd1" size="45"></div></td>
			</tr>
		</td>
	</tr>
</table>
<tr> 
	<td height="40" valign="middle" align="center">
		<!--<input type="button" id="btn_add" onclick=dyinfo_add() value="确 定">-->
		<input type="button" name="button" id="button"  onclick=modifypwd() value="完成修改" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!-- <input type="button" name="button" id="button"  onclick="coreinfo_audit()"value="通过审核" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btn_cancle" onclick=cancle() value="取   消">-->
	</td>
	
</tr>
</table>
</div>
</form>
</div>
</body>

</html>
