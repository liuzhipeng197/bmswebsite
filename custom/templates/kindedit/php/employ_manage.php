<?php
	 session_start();
	 $level=$_SESSION['level'];//Ϊ2����ͨ����Ա
	 if($level=='2'){
	 	 echo "<br><br><br><br><br><br><br><br>";
	 	 echo "<div style='color:red;text-align:center;'>�Բ��������ǳ�������Ա�����ܽ��д˲�����</div>";
	 	 //echo "�Բ��������ǳ�������Ա�����ܽ��д˲�����";
	 	 exit();
	 	
	 }
		
?>
<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script language="javascript">
	window.onload=init;
	function init(){
		$.post("./edit_task.php",{action:"employ_init"},function(data){
		  if(data){
		  	//alert(data);
			$('#display_res').html(data);
		  }
		});
	}
	
	function del_manage(userid){//����id����ɾ�����û�������Ϣ
		//if(confirm('ע�⣺ɾ����������ɾ��������ص���������ȷ��Ҫɾ����')==true)
		//{
			$.post("./edit_task.php",{action:"employ_del",userId:userid},function(data){
		  		if(data){
		  			alert('ɾ���ɹ�');
		  			window.location.href="./employ_manage.php";
		  		}
			});
		//}
	}
	function modify_manage(url)
	{
		//alert(url);
		//if(confirm('ע�⣺�޸Ļ�������ɾ��������ص���������в��Խ����ȷ��Ҫ�޸���'))
		//{
			window.location.href=url;
		//}
	}
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">��ǰλ�ã���־���� > ��Ա����</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<form id="netres_form" name="netres_form" method="POST">
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- ������-1 -->
	<td height="30" background="../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>��Ա�б�</b></td>
        	<td width="16"><img src="../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
		</table>
	</td>
</tr>

<tr><!-- ��Ҫ����1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="8" background="../images/tab_12.gif">&nbsp;</td>
            <td>
            	<div id="display_res">
        		
        		</div>   
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


</table>
</div>
</body>

</html>