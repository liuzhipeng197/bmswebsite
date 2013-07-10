<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script type="text/javascript" language="JavaScript"> 
 function coreinfo_add(){
			var link_title=$('#link_title').val();
			var link_addr=$('#link_addr').val();
			if(link_title==''){
				alert('请输入友情链接名称！');
			}else if(link_addr==''){
				alert('请输入友情链接地址！');
			}else{
				
				$.post("./edit_task.php",{action:"frilink_add",link_title:link_title,
				link_addr:link_addr},function(data){
 				if(data){
 					//alert(data);
 					alert("添加成功！");
 					clear();
 				}else{
 					alert("该链接已经存在！");
 					
 				}
			});
		}
 }
 
 function coreinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('link_title').value='';
 	document.getElementById('link_addr').value='';
 	
 }
 
 
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：友情链接 > 添加友情链接</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>添加友情链接</b></td>
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
            	<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                	 <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                	 <td height="30" style="font-size:13; ">
                	 <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
            	<tr>
                	  <td   height="30" style="font-size:13;">&nbsp;&nbsp;链接名称：<input type="text" id="link_title" name="link_title" size="45"  value=""></td>
                	 <td   height="30" style="font-size:13;">&nbsp;&nbsp;链接地址：<input type="text" id="link_addr" name="link_addr" size="45"  value=""></td>
                </tr>
                        	
                
                
              </table>
		
                	 </td>
                </tr>
                
               
                   
               
                </table>   
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

<tr> 
	<td height="40" valign="middle" align="center">
		<!--<input type="button" id="btn_add" onclick=dyinfo_add() value="确 定">-->
		<input type="button" name="button" id="button"  onclick="coreinfo_add()"value="提 交" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="取 消">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
