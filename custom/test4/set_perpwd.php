<?php
	session_start();
	include_once("../include/function.php");
	include_once("../include/db_mysql.php");
	iframe_head();	
?>

<script language="javascript">
	function confirm(){
		var cus_pwd=$('#cus_pwd').val();
		var cus_pwd2=$('#cus_pwd2').val();
		var cus_id="<?session_start();echo $_SESSION['ser_perpwd_id']?>";
		//alert(user_id);
		if(cus_pwd==''){
			alert("请输入您的登录密码");
		}else if(cus_pwd2==''){
			alert("请输入您的确认密码");
		}else if(cus_pwd!=cus_pwd2){
			alert("您两次输入的密码不一致，请重新输入");
			document.getElementById('cus_pwd').value='';
			document.getElementById('cus_pwd2').value='';
		}else{
			//alert("OK");			
			$.post("./task.php",{action:"set_pwd",cus_id:cus_id,cus_pwd:cus_pwd},function(data){
					if(data){
						alert("密码设置成功，请用您的新密码重新登录！");
						window.location.href="../index.php";
					}else{
						alert("对不起，设置失败，请重试");
						document.getElementById('cus_pwd').value='';
						document.getElementById('cus_pwd2').value='';
						//window.location.href="../index.php";
					}
				});
		}
	}

function cancel(){
	document.getElementById('cus_pwd').value='';
	document.getElementById('cus_pwd2').value='';
}

function turnback()
{
 history.back();
}
</script>
</head>

<body>
<div  style="background:#c7e3f1; width:960px; margin: auto; margin-top: 0px;">
 <?php
	head_logo();
?>
<div class="regmain">
	<div>
    <table class="regtable" align="center">
    <!--<tr><td colspan="3" background="../images/reg.gif"  height="24"></td></tr>-->
	<tr>
		<td colspan="3"><strong>- 设置新密码</strong></td></tr>
	<tr><td width="24"></td><td width="86">登录密码：</td><td><input id="cus_pwd" name="cus_pwd" type="password"/> &nbsp; </td></tr>
	<tr><td></td><td>确认密码：</td><td><input id="cus_pwd2" name="cus_pwd2" type="password"/> &nbsp; </td></tr>    
	<tr><td colspan="3" style="text-align:center;"><input type="button" class="btn" value="确 定" onclick="confirm();"/>&nbsp;
	&nbsp;&nbsp;&nbsp;<input type="button" value="重 置" class="btn" onclick="cancel()"/>&nbsp;
	&nbsp;&nbsp;&nbsp;<input type="button" value="返 回" class="btn" onclick="turnback()"/></td></tr></table>		
	</div>
</div>
<?php
	footer(); 
?>
</div>
</body>