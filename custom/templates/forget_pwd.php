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
		alert("���������ĵ�¼�û���");
	}else if(cus_realname==''){
		alert("������������ʵ����");
	}else if(question==''){
		alert("��ѡ�����İ�ȫ����");
	}else if(answer==''){
		alert("���������İ�ȫ���ʵĴ�");
	}else{
		//alert("OK");		
		$.post("./task.php",{action:"forget_pwd",cus_name:cus_name,cus_realname:cus_realname,
		question:question,answer:answer},function(data){
			if(data){
				//alert("��ϲ��ע��ɹ������ǽ������������ע����Ϣ");
				window.location.href="set_perpwd.php";
			}else{
				alert("�Բ������������Ϣ����������");
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
		<td colspan="3"><strong>- �����һ�</strong></td></tr>
	<tr><td width="24"></td><td width="86">��¼���ƣ�</td><td><input id="cus_name" name="cus_name" type="text"/> &nbsp; </td></tr>
	<tr><td></td><td>��ʵ������</td><td><input id="cus_realname" name="cus_realname" type="text"/> &nbsp; </td></tr>
	<tr><td></td><td>��ȫ���ʣ�</td><td><select id="question" name="news_type" style="width:155px;" >
                	 <option value="0" selected="selected">���ļ�������</option>
                	 <option value="1">�����Ͷ���Сѧ����</option>
                	 <option value="2">�����Ͷ��ĳ�������</option>
                	 <option value="3">�����Ͷ��ĸ�������</option>
                	 <option value="4">�����Ͷ��Ĵ�ѧ����</option>
                	 <option value="5">����ϲ������ɫ</option>
                	 <option value="6">����ϲ��������</option>
                	 <option value="7">����ϲ���ĳ���</option>
                	 </select> &nbsp; </td></tr>
	<tr><td></td><td>��ȫ�ش�</td><td><input id="answer" name="answer" type="text"/> &nbsp; </td></tr>
	<tr><td colspan="3" style="text-align:center;"><input type="button" class="btn" value="��һ��" onclick="next();"/>&nbsp;
	&nbsp;&nbsp;&nbsp;<input type="button" class="btn" value="����" onclick="cancel()"/></div></td></tr></table>
	</div>
</div>
<?php
	footer(); 
?>
</div>
</body>
</html>