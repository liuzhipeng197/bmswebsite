
<?php
	include("../include/function.php");
	iframe_head();
?>
<script language="javascript">
	//以下采用Ajax技术更新测试节点的状态
function makeRequest(url) {
 $.post(url,{},function(data){
 	$("#nodes_info").html(data);
 });
//每60秒刷新一次页面
setTimeout("makeRequest('"+url+"')", 100000); 
}
</script>
</head>
<body onload="makeRequest('get_sysinfo.php')">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：<font color="Green">NSTC管理系统首页</font></div></td>
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
            <td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>网站系统实时状态监控<?php echo"&nbsp;&nbsp;（系统时间：".date("Y-m-d H:i:s")."）"; ?></b></td>
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
            	<div id="nodes_info">
        		
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