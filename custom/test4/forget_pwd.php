<?php
	session_start();
	include_once("./include/function.php");
	include_once("./include/db_mysql.php");
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

<body>
<div  class="juzhong">
 <?php
	iframe_top();
?>

<div class="main_2">                                                                                                                                                                                
     <div class='row-fluid'>                                                                                                                                                                          
        <div class='span10 offset2'>                                                                                                                                                                  
          <div class="anlie_nr">
	  	<h2 class='home_title' style="text-align:left">�����һ�</h2>
<div class='find_password_form'>
	<div class='row' style="text-align:left">
		<span>��¼���ƣ�</span>
		<span>
			<input id="cus_name" name="cus_name" type="text"/> &nbsp; 
		</span>
	</div>
	<div class='row' style="text-align:left">
		<span>��ʵ������</span>
		<span>
			<input id="cus_realname" name="cus_realname" type="text"/> &nbsp; 
		</span>
	</div>
	<div class='row' style="text-align:left">
		<span>��ȫ���ʣ�</span>
		<span>
			<select id="question" name="news_type" >
                	 	<option value="0" selected="selected">���ļ�������</option>
                	 	<option value="1">�����Ͷ���Сѧ����</option>
                	 	<option value="2">�����Ͷ��ĳ�������</option>
                	 	<option value="3">�����Ͷ��ĸ�������</option>
                	 	<option value="4">�����Ͷ��Ĵ�ѧ����</option>
                	 	<option value="5">����ϲ������ɫ</option>
                	 	<option value="6">����ϲ��������</option>
                	 	<option value="7">����ϲ���ĳ���</option>
                	 </select> &nbsp; 
		</span>
	</div>
	<div class='row' style="text-align:left">
		<span>��ȫ�ش�</span>
		<span><input id="answer" name="answer" type="text"/> &nbsp; </span>
	</div>
	<div class='row' style="text-align:left">	
		<span colspan="3" style="text-align:center;"></span>
		<span>
			<input type="button" class="edit_buttom" value="��һ��" onclick="next();"/>&nbsp;
			&nbsp;&nbsp;&nbsp;<input type="button" class="edit_buttom" value="����" onclick="cancel()"/>
		</span>
	</div>
</div>
</div>
</div>
</div>
</div>
  <div class="bottom">                                                                                                                                                                                
   <?php                                                                                                                                                                                              
        iframe_bottom();                                                                                                                                                                              
   ?>                                                                                                                                                                                                 
  </div> 
</div>

</body>
</html>
