<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script type="text/javascript" language="JavaScript"> 

function ajaxFileUpload()

	{  //var file_name=document.getElementById('fileToUpload').value;
		/*var file_name=document.forms[0].fileToUpload.value;
		var file_name_ary=file_name.split("\\");
		var file_name=file_name_ary[file_name_ary.length-1];
		document.getElementById('hid_filename').value=file_name;*/
		//if(file_name!=''){
		//document.getElementById('btn_add').disabled =false ;
		//}
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:'doajaxfileupload2.php',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							alert(data.error);
						}else
						{
							//alert(data.msg);
							if(data.msg!=''){
							document.getElementById('hid_filename').value=data.msg;
							alert('上传成功！');
							}else{
							alert('上传失败！');
							}
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}
	
 function coreinfo_add(){
 			var file_name=document.getElementById('hid_filename').value;//上传图片名称2010.8.18
			var type=$('#news_type').val();
			//var start_date=$('#start_date').val();
			var title=$('#title').val();
			var author=$('#author').val(); 
			//var department=$('#department').val(); 
			var content=$('#content1').val();
			if(title==''){
				alert('请输入标题！');
			}else if(author==''){
				alert('请输入作者！');
			}else{
				
				$.post("./edit_task.php",{action:"coreinfo_add",fileName:file_name,mytype:type,mytitle:title,
				myauthor:author,mycontent:content},function(data){
 				if(data){
 					//alert(data);
 					alert("中心概况信息添加成功！");
 					clear();
 				}else{
 					alert("新添加的中心概况信息的标题重复，请重新命名！");
 					
 				}
			});
		}
 }
 
 function dyinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('title').value='';
 	document.getElementById('author').value='';
 	document.getElementById('department').value='';
 }
 
 function printview(){
 	var content=$('#content1').val();
 	var url='print_view.php?content='+content;
	window.open(url,"_blank","height=300px,width=600px,resizable=yes");
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
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：中心概况 > 发布中心概况</div></td>
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
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>发布中心概况</b></td>
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
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;栏目：<select id="news_type" name="news_type" style="width:260px;" >
                	 <option value="0" selected="selected">中心简介</option>
                	 <option value="1">组织结构</option>
                	 <option value="2">资质荣誉</option>
                	 <option value="3">资源优势</option>
                	 <option value="4">中心风采</option>
                	 </select>
                	 </td>
                	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;标题：<input type="text" id="title" name="title" size="45" value=""></td>
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                	 <!--<td  height="30" style="font-size:13;">&nbsp;&nbsp;标题：<input type="text" id="title" name="title" size="45" value=""></td>-->
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;作者：<input type="text" id="author" name="author" size="45"  value=""></td>
                <!--</tr>
            	<tr>-->
            	<td   height="30" style="font-size:13;">&nbsp;&nbsp;图片：<input id="fileToUpload" type="file" size="35" name="fileToUpload" style="height:24px;">
                	<input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="上传" style="height:24px;">(中心风采图片上传)
                	<input type="hidden" id="hid_filename" name="hid_filename" value="">
                	<input type="hidden" id="hid_fileid" name="hid_fileid" value="">
                	</td>
            	</tr>
                
                
              </table>
              <!--<div class="editor">-->
		<textarea id="content1" name="content1" cols="100" rows="8" style="width:780px;height:308px;visibility:hidden;"></textarea>
		<!--</div>-->
		
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
		<!--<input type="button" name="button" id="button"  onclick="printview()"value="预 览" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="取 消">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
