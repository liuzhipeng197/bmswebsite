<?php
	 session_start();
	 //$user_name=$_SESSION['user_name'];
	 $level=$_SESSION['level'];//为2是普通管理员
	 if($level=='2'){
	 	 echo "<br><br><br><br><br><br><br><br>";
	 	 echo "<div style='color:red;text-align:center;'>对不起，您不是超级管理员，不能进行此操作！</div>";
	 	 //echo "对不起，您不是超级管理员，不能进行此操作！";
	 	 exit();
	 	
	 }
		
?>

<!--<html>
<head>
<title>NSTC后台管理系统</title>
<script type="text/javascript" src="../js/jquery.js" language="JavaScript"></script>
<script type="text/javascript" src="../js/core.js" language="JavaScript"></script>
<link href="../style/base.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="screen, print" href="../style/right.css" />-->
<?php
	include_once("../include/function.php");
	iframe_head();
?>


<script type="text/javascript" language="JavaScript">
	//添加管理员
 function manage_add(){
 	var user_name=document.getElementById('user_name').value;
 	var pwd=document.getElementById('pwd').value;
 	var pwd_confirm=document.getElementById('pwd_confirm').value;
 	var user_level=$('#user_level').val();//级别
 	//alert(user_level);
 	if(user_name==""){
 		alert("请输入管理员名称！");
 	}else if(pwd==""){
 		alert("请输入管理员登陆密码！");
 	}else if(pwd_confirm==""){
 		alert("请输入确认密码！");
 	}else if(pwd!=pwd_confirm){
 		alert("您两次输入的密码不一致，请重新输入密码");
 		document.getElementById('pwd').value='';
 		document.getElementById('pwd_confirm').value='';
 	}else{
 		$.post("./task.php",{action:"manage_add",userName:user_name,userPwd:pwd,level:user_level},function(data){
 		if(data=='OK'){
 			//alert(data);
 			alert("管理员添加成功！");
 			clear();
 		}else if(data=='repeat_manager'){
 			alert("对不起,您添加的用户名在管理员列表中已经存在,请重试！");
 			//clear();
 		}else if(data=='repeat_reguser'){
 			alert("对不起,您添加的用户名在注册用户列表中已经存在,请重试！！");
 			//clear();
 		}
 	});
 	}
 }
 
 function manage_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('user_name').value='';
 	document.getElementById('pwd').value='';
 	document.getElementById('pwd_confirm').value='';
 }
 

</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：管理员管理 > 添加管理员</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<form id="netres_form" name="netres_form" method="POST">
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
	<td height="30" background="../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>添加管理员</b></td>
        	<td width="16"><img src="../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
		</table>
	</td>
</tr>

<tr><!-- 主要内容1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="8" background="../images/tab_12.gif">&nbsp;</td>
            <td>
            	<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                <tr>
                    <td  align="center" height="30" style="font-size:13;">&nbsp;&nbsp;用户名称：<input type="text" id="user_name" name="user_name" size="25" value=""></td>
                </tr>
                
                <tr>
                  	<td  align="center" height="30" style="font-size:13;">&nbsp;&nbsp;登陆密码：<input type="password" id="pwd" name="pwd" size="25"  value=""></td>
                </tr>
                
                <tr>
                	 <td  align="center" height="30" style="font-size:13;">&nbsp;&nbsp;确认密码：<input type="password" id="pwd_confirm" name="pwd_confirm" size="25" value=""></td>
                </tr>
                
                <tr>
                	 <td  align="center" height="30" style="font-size:13;">&nbsp;&nbsp;选择级别：<select id="user_level" name="user_level" style="width:160px;" ><option value="2" selected="selected">普通管理员</option><option value="1">超级管理员</option></select>
                	 </td>
                </tr>
                   
               
                </table>   
			</td>
			<td width="8" background="../images/tab_15.gif">&nbsp;</td>
		</tr>
		
		</table>
	</td>
</tr>
<tr> 
    <td height="35" background="../images/tab_19.gif">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>

<tr> 
	<td height="40" valign="middle" align="center">
		<input type="button" id="btn_add" onclick=manage_add() value="添 加">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btn_cancle" onclick=manage_cancle() value="取 消">
	</td>
	
</tr>
</table>
</div>
</body>

</html>