<?php
	session_start();
	include_once("../include/function.php");
	include_once("../include/db_mysql.php");
	iframe_head();	
?>

<script language="javascript">
function next(){
	var cus_name=$('#cus_name').val();
	
	var cus_realname=$('#cus_realname').val();
	
	var question=$('#question').val();
	var answer=$('#answer').val();
	
	if(cus_name==''){
		alert("请输入您的登录用户名");
	}else if(cus_realname==''){
		alert("请输入您的真实姓名");
	}else if(question==''){
		alert("请选择您的安全提问");
	}else if(answer==''){
		alert("请输入您的安全提问的答案");
	}else{
		//alert("OK");		
		$.post("./task.php",{action:"forget_pwd",cus_name:cus_name,cus_realname:cus_realname,
		question:question,answer:answer},function(data){
			if(data){
				//alert("恭喜您注册成功，我们将尽快审核您的注册信息");
				window.location.href="set_perpwd.php";
			}else{
				alert("对不起，您输入的信息有误，请重试");
				//window.location.href="../index.php";
			}			
		});
	}
}

function cancel(){
	window.location.href="../index.php";
}
</script>
</head>

<body POSITION:absolute; top:0; left:0>
<div  style="background:#c7e3f1; width:960px; margin: auto; margin-top: 0px;">
 <?php
	head_logo();
?>
<div class="regmain">
	<div>
	<table class="regtable" align="center">
	<!--<tr><td colspan="3" background="../images/reg.gif"  height="24"></td></tr>-->
	<tr>
		<td colspan="3"><strong>- 密码找回</strong></td></tr>
	<tr><td width="24"></td><td width="86">登录名称：</td><td><input id="cus_name" name="cus_name" type="text"/> &nbsp; </td></tr>
	<tr><td></td><td>真实姓名：</td><td><input id="cus_realname" name="cus_realname" type="text"/> &nbsp; </td></tr>
	<tr><td></td><td>安全提问：</td><td><select id="question" name="news_type" style="width:155px;" >
                	 <option value="0" selected="selected">您的家乡名称</option>
                	 <option value="1">您所就读的小学名称</option>
                	 <option value="2">您所就读的初中名称</option>
                	 <option value="3">您所就读的高中名称</option>
                	 <option value="4">您所就读的大学名称</option>
                	 <option value="5">您所喜欢的颜色</option>
                	 <option value="6">您所喜欢的明星</option>
                	 <option value="7">您所喜欢的宠物</option>
                	 </select> &nbsp; </td></tr>
	<tr><td></td><td>安全回答：</td><td><input id="answer" name="answer" type="text"/> &nbsp; </td></tr>
	<tr><td colspan="3" style="text-align:center;"><input type="button" class="btn" value="下一步" onclick="next();"/>&nbsp;
	&nbsp;&nbsp;&nbsp;<input type="button" class="btn" value="返回" onclick="cancel()"/></div></td></tr></table>
	</div>
</div>
<?php
	footer(); 
?>
</div>
</body>
</html>