<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script language="javascript">
	window.onload=init;
	function init(){
		$.post("./edit_task.php",{action:"dyinfo_init"},function(data){
		  if(data){
		  	//alert(data);
			$('#display_res').html(data);
		  }
		});
	}
	
	function showdyinfo_bytype(){
		var type=$('#type').val();
		if(type==''){
			//alert('��ѡ����ȷ�Ķ�̬��Ϣ���ͣ�');
		}else{
			//alert(type);
			$.post("./edit_task.php",{action:"showdyinfo_bytype",type:type},function(data){
		  if(data){
		  	//alert(data);
			$('#display_res').html(data);
		  }
		});
		}
		
		
	}
	function fresh_dyinfo(dyinfoid){//����id����������������
		
			$.post("./edit_task.php",{action:"dyinfo_fresh",dyinfoId:dyinfoid},function(data){
		  		if(data){
		  			alert('���óɹ�');
		  			window.location.href="./dyinfo_show.php";
		  		}
			});
	}
	
	function nofresh_dyinfo(dyinfoid){//����id�����������Ų�����
		
			$.post("./edit_task.php",{action:"dyinfo_nofresh",dyinfoId:dyinfoid},function(data){
		  		if(data){
		  			alert('���óɹ�');
		  			window.location.href="./dyinfo_show.php";
		  		}
			});
	}
	
	function del_dyinfo(dyinfoid){//����id����ɾ����Ϣ
		//if(confirm('ע�⣺ɾ����������ɾ��������ص���������ȷ��Ҫɾ����')==true)
		//{
			$.post("./edit_task.php",{action:"dyinfo_del",dyinfoId:dyinfoid},function(data){
		  		if(data){
		  			alert('ɾ���ɹ�');
		  			window.location.href="./dyinfo_show.php";
		  		}
			});
		//}
	}
	function modify_dyinfo(url)
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
  			<td width="100%" align="left" ><div id="right_topcenter">��ǰλ�ã���̬��Ϣ > �鿴��Ϣ</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<form id="netres_form" name="netres_form" method="POST">
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- ������-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>��̬��Ϣ�б�</b>
            <select id="type" name="type" onchange="showdyinfo_bytype()" style="text-algin:center">
            <option value="">---��ѡ�����---</option>
            <option value="0">��ҵ��̬</option>
            <option value="1">��Ŀ����</option>
            <option value="2">�����о�</option>
            <option value="3">�˲���Ƹ</option>
            <option value="4">���Ĺ���</option>
            </select>
            </td>
        	<td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
		</table>
	</td>
</tr>

<tr><!-- ��Ҫ����1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
            	<div id="display_res">
        		
        		</div>   
			</td>
			<td width="8" background="../../../images/tab_15.gif">&nbsp;</td>
		</tr>
		
		</table>
	</td>
</tr>
<tr> 
    <td height="35" background="../../../images/tab_19.gif">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../../../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../../../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>


</table>
</div>
</body>

</html>
