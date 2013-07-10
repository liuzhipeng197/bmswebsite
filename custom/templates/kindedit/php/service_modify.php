<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<?php
	include_once("../../../include/db_mysql.php");
	$coreinfo_id=trim($_GET['coreinfoid']);
	$sql = "select * from nstc_test_service where id='$coreinfo_id'";
    $result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    $type=$row['type'];
    if($type=='0'){
		$type='测评规范';
	}else if($type=='1'){
		$type='测评技术';
	}else if($type=='2'){
		$type='测评对象';
	}else if($type=='3'){
		$type='测评项目';
	}else if($type=='4'){
		$type='测评流程';
	}else if($type=='5'){
		$type='测评范围';
	}
    $title=$row['title'];
    $author=$row['author'];
    $content=$row['content'];
    $date=$row['date']; 
?>
<script type="text/javascript" language="JavaScript"> 
 function coreinfo_modify(){
			//var type=$('#news_type').val();
			//var start_date=$('#start_date').val();
			var coreinfo_id="<?echo $coreinfo_id?>";
			var title=$('#title').val();
			var author=$('#author').val(); 
			//var department=$('#department').val(); 
			var content=$('#content1').val();
                        var date=$('#date').val();
			if(author==''){
				alert('请输入作者！');
			}else if(date==''){
                                alert('请输入日期');
                        }else{
				
				$.post("./edit_task.php",{action:"service_modify",coreinfoId:coreinfo_id,
				mytitle:title,myauthor:author,mycontent:content,date:date},function(data){
 				if(data){
 					//alert(data);
 					alert("测评服务修改成功！");
 					//clear();
 				}else{
 					alert("测评服务修改失败！");
 					
 				}
			});
		}
 }
 
 function coreinfo_audit(){
 	var coreinfo_id="<?echo $coreinfo_id?>";
 	$.post("./edit_task.php",{action:"service_audit",coreinfoId:coreinfo_id},function(data){
 				if(data){
 					//alert(data);
 					alert("操作成功！");
 					//clear();
 				}else{
 					alert("操作失败");
 				}
			});
 }
 
 function coreinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('title').value='';
 	document.getElementById('author').value='';
 	//document.getElementById('department').value='';
 }
 
 KE.show({
			id : 'content1',
			imageUploadJson : '../../php/upload_json.php',
			fileManagerJson : '../../php/file_manager_json.php',
			allowFileManager : true,
			afterCreate : function(id) {
				KE.event.ctrl(document, 13, function() {
					KE.util.setData(id);
					document.forms['example'].submit();
				});
				KE.event.ctrl(KE.g[id].iframeDoc, 13, function() {
					KE.util.setData(id);
					document.forms['example'].submit();
				});
			}
		});
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：测评服务 > 修改测评服务</div></td>
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
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $type ;?></b></td>
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
                	 <!--<td  height="30" style="font-size:13;">&nbsp;&nbsp;栏目：<select id="news_type" name="news_type" style="width:260px;" >
                	 <option value="0" selected="selected">中心简介</option>
                	 <option value="1">组织结构</option>
                	 <option value="2">资质荣誉</option>
                	 <option value="3">资源优势</option>
                	 <option value="4">中心风采</option>
                	 </select>
                	 </td>-->
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;标题：<input type="text" id="title" name="title" size="45" value="<?php echo $title?>"></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;作者：<input type="text" id="author" name="author" size="45"  value="<?php echo $author?>"></td>
                </tr>
            	
                
                 <tr>
                      <?php                        echo " <td   height=\"30\" style=\"font-size:13;\">&nbsp;&nbsp;日期：<input type=\"text\" id=\"date\" name=\"date\" size=\"25\"  value='$date'>(如2011-10-11)</td>";
                      ?>
                </tr>

              </table>
		<textarea id="content1" name="content1" cols="100" rows="8" style="width:700px;height:308px;visibility:hidden;"><?echo htmlspecialchars($content); ?></textarea>
		
		<!--<input type="button" name="button" id="button"  onclick="dyinfo_add()"value="提交" />-->
		<!--<input type="submit" name="button" value="提交">-->
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
		<input type="button" name="button" id="button"  onclick="coreinfo_modify()"value="完成修改" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="button" id="button"  onclick="coreinfo_audit()"value="通过审核" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="取   消">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
