<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<?php
	include_once("../../../include/db_mysql.php");
	$coreinfo_id=trim($_GET['coreinfoid']);
	$sql = "select ques_title,nstc_question.ques_content,user_name,user_email,user_com,ques_date,ques_time,ques_answer
	 		 from nstc_question where  nstc_question.id=$coreinfo_id";
	$result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    //$row = @mysql_fetch_array($result, MYSQL_BOTH);
   // $row=get_ary_bysql($sql);
    $title=$row[0];
    $ques_content=$row[1];
    $reg_name=$row[2];
    $reg_email=$row[3];
    $com_name=$row[4];
    $ques_date=$row[5];
    $ques_time=$row[6];
    $ques_answer=$row[7];
   
?>
<script type="text/javascript" language="JavaScript"> 
 function coreinfo_modify(){
			
			var coreinfo_id="<?echo $coreinfo_id?>";
			//var content=$('#content1').val();	
			var title=$('#title').val();
			var ques_content=$('#ques_content').val();
			var content=$('#content2').val();	
			$.post("./edit_task.php",{action:"quest_answer",coreinfoId:coreinfo_id,
			title:title,ques_content:ques_content,
				mycontent:content},function(data){
 				if(data){
 					//alert(data);
 					alert("回复成功！");
 					//clear();
 				}else{
 					alert("回复失败！");
 					
 				}
			});
		
 }
 
 
 function coreinfo_cancle(){
 	//clear();
 	window.location.href="quest_show.php";
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
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：Q&A > 回复提问</div></td>
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
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $title ;?></b></td>
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
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;提问标题：<input type="text" id="title" name="title" size="45"  value="<?php echo $title?>"></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;提问者：&nbsp;&nbsp;&nbsp;<input type="text" id="author" name="author" size="45" readonly  value="<?php echo $reg_name?>"></td>
                </tr>
            	 <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;Email：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="reg_email" name="reg_email" size="45" readonly value="<?php echo $reg_email?>"></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;公司名称：<input type="text" id="com_name" name="com_name" size="45" readonly  value="<?php echo $com_name?>"></td>
                </tr>
                 <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;提问时间：<input type="text" id="time" name="time" size="45" readonly value="<?php echo $ques_date." ".$ques_time?>"></td>
                	
                </tr>
                <tr>
                <td>
                
                 </td>
                </tr>
              </table>
             &nbsp;&nbsp;提问内容：<textarea id="ques_content"  name="ques_content" cols="100" rows="8" style="width:260px;height:100px;"><?echo $ques_content; ?></textarea>
		     </br>
              &nbsp;&nbsp;回复内容：<!--<textarea id="content1" name="content1" cols="100" rows="8" style="width:780px;height:150px;visibility:hidden;"><?echo htmlspecialchars($ques_answer);?></textarea>--><textarea id="content2" name="content2" cols="100" rows="8" style="width:700px;height:100px;"><?echo $ques_answer; ?></textarea>
		
		
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
		<input type="button" name="button" id="button"  onclick="coreinfo_modify()"value="确 定" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="取 消">
	</td>
	
</tr>
</table>
</div>
</body>

</html>