<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script language="javascript">
	window.onload=init;
	function init(){
		$.post("./edit_task.php",{action:"result_init"},function(data){
		  if(data){
		  	//alert(data);
			$('#display_res').html(data);
		  }
		});
	}
	function showresult_bytype(){
		var type=$('#type').val();
		if(type==''){
			//alert('请选择正确的动态信息类型！');
		}else{
			//alert(type);
			$.post("./edit_task.php",{action:"showresult_bytype",type:type},function(data){
		  if(data){
		  	//alert(data);
			$('#display_res').html(data);
		  }
		});
		}	
	}
	
	function del_coreinfo(coreinfoid){//根据id号来删除配置环境的信息
		//if(confirm('注意：删除环境，会删除与其相关的所有任务。确定要删除吗？')==true)
		//{
			$.post("./edit_task.php",{action:"result_del",coreinfoId:coreinfoid},function(data){
		  		if(data){
		  			alert('删除成功');
		  			window.location.href="./result_show.php";
		  		}
			});
		//}
	}
	function modify_coreinfo(url)
	{
		//alert(url);
		//if(confirm('注意：修改环境，会删除与其相关的任务的所有测试结果。确定要修改吗？'))
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
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：测评结果 > 查看测评结果</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<form id="netres_form" name="netres_form" method="POST">
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>测评结果列表</b>
             <select id="type" name="type" onchange="showresult_bytype()" style="text-algin:center">
            <option value="">---请选择栏目---</option>
             <option value="0" selected="selected">磁盘阵列</option>
                         <option value="1">存储系统</option>
                         <option value="2">文件系统</option>
                         <option value="3">数据库</option>
                         <option value="4">存储网络设备</option>
                         <option value="5">存储软件</option>
                         <option value="6">存储介质</option>

            </select>
            </td>
        	<td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
		</table>
	</td>
</tr>

<tr><!-- 主要内容1 -->
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
