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
			alert("���������ĵ�¼����");
		}else if(cus_pwd2==''){
			alert("����������ȷ������");
		}else if(cus_pwd!=cus_pwd2){
			alert("��������������벻һ�£�����������");
			document.getElementById('cus_pwd').value='';
			document.getElementById('cus_pwd2').value='';
		}else{
			//alert("OK");			
			$.post("./task.php",{action:"set_pwd",cus_id:cus_id,cus_pwd:cus_pwd},function(data){
					if(data){
						alert("�������óɹ��������������������µ�¼��");
						window.location.href="../index.php";
					}else{
						alert("�Բ�������ʧ�ܣ�������");
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
		<td colspan="3"><strong>- ����������</strong></td></tr>
	<tr><td width="24"></td><td width="86">��¼���룺</td><td><input id="cus_pwd" name="cus_pwd" type="password"/> &nbsp; </td></tr>
	<tr><td></td><td>ȷ�����룺</td><td><input id="cus_pwd2" name="cus_pwd2" type="password"/> &nbsp; </td></tr>    
	<tr><td colspan="3" style="text-align:center;"><input type="button" class="btn" value="ȷ ��" onclick="confirm();"/>&nbsp;
	&nbsp;&nbsp;&nbsp;<input type="button" value="�� ��" class="btn" onclick="cancel()"/>&nbsp;
	&nbsp;&nbsp;&nbsp;<input type="button" value="�� ��" class="btn" onclick="turnback()"/></td></tr></table>		
	</div>
</div>
<?php
	footer(); 
?>
</div>
</body>