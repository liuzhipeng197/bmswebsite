<?php
	//session_start();
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script type="text/javascript" language="JavaScript"> 
//file_path = document.forms[0].fileToUpload.value;
function coreinfo_add(){
			//var max_fileid="";
			//if(max_fileid==""){
			//首先获取上传文件id
			/*$.post("./edit_task.php",{action:"get_max_fileid"},function(data){
 				if(data){
 					alert("data="+data);
 					var file_id=data;
 					//max_fileid=data;
 					//document.getElementById('hid_fileid').value=data;
 					//var file_name=document.getElementById('hid_filename').value;
 			
 			//var max_file_id=document.getElementById('hid_fileid').value;
 			//var max_fileid=ReadFile("../save_test_result/max_file_id.txt");
			
 				}else{
 					alert("读取文件失败，请重新上传文件");
 					
 				}
 				//var file_id=document.getElementById('hid_fileid').value;
 				//alert(file_id);
 				
			});
			//alert("max_fileid="+max_fileid);
			//}
			//alert(file_id);*/
 			var file_name=document.getElementById('hid_filename').value;
 			
 			//var max_file_id=document.getElementById('hid_fileid').value;
 			//var max_fileid=ReadFile("../save_test_result/max_file_id.txt");
			var type=$('#news_type').val();
			var title=$('#title').val();
			var firm=$('#firm').val();
			var product=$('#product').val();
			var item=$('#item').val();
			var author=$('#author').val(); 
			//alert(file_name);
			
			if(firm==''){
				alert('请输入测试厂商！');
			}else if(product==''){
				alert('请输入测试产品！');
			}else if(item==''){
				alert('请输入测试项目！');
			}else if(title==''){
				alert('请输入测试结果标题！');
			}else if(author==''){
				alert('请输入发布人员！');
			}else if(file_name==''){
				alert('请上传测试结果文件！');
			}else{
				
				$.post("./edit_task.php",{action:"result_add",fileName:file_name,mytype:type,
				mytitle:title,myfirm:firm,myproduct:product,myitem:item,
				myauthor:author},function(data){
 				if(data){
 					//alert(data);
 					alert("测试结果添加成功！");
 					clear();
 				}else{
 					alert("新添加的测试结果的标题重复，请重新命名！");
 					
 				}
			});
		}
 }
 
 function coreinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('title').value='';
 	document.getElementById('author').value='';
 	document.getElementById('firm').value='';
 	document.getElementById('product').value='';
 	document.getElementById('item').value='';
 }
 
 function printview(){
 	var content=$('#content1').val();
 	var url='print_view.php?content='+content;
	window.open(url,"_blank","height=300px,width=600px,resizable=yes");
 }
 
 /*KE.show({
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
		});*/
		
	function ajaxFileUpload()
	{   //var file_name=document.forms[0].fileToUpload.value;
		var file_name=document.getElementById('fileToUpload').value;
		var file_name_ary=file_name.split("\\");
		var file_name=file_name_ary[file_name_ary.length-1];
		document.getElementById('hid_filename').value=file_name;
		if(file_name!=''){
		document.getElementById('btn_add').disabled =false ;
		}
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
				url:'doajaxfileupload.php',
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
							alert(data.msg);
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
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：测评结果 > 发布测评结果</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  name="form" action="" method="POST" enctype="multipart/form-data" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>发布测评结果</b></td>
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
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试栏目：<select id="news_type" name="news_type" style="width:260px;" >
                	 <option value="0" selected="selected">磁盘阵列</option>
                	 <option value="1">存储系统</option>
                         <option value="2">文件系统</option>
                         <option value="3">数据库</option>
                         <option value="4">存储网络设备</option>
                         <option value="5">存储软件</option>
                         <option value="6">存储介质</option>

                	 
                	 </select>
                	 </td>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试厂商：<input type="text" id="firm" name="firm" size="45" value=""></td>
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试产品：<input type="text" id="product" name="product" size="45" value=""></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;测试项目：<input type="text" id="item" name="item" size="45"  value=""></td>
                </tr>
            	<tr>
            	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;结果标题：<input type="text" id="title" name="title" size="45" value=""></td>
            	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;发布人员：<input type="text" id="author" name="author" size="45" value=""></td>
            	</tr>
                 <tr>
                	
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;测试结果：<input id="fileToUpload" type="file" size="45" name="fileToUpload" style="height:24px;">
                	&nbsp;&nbsp;&nbsp;<input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="上传" style="height:24px;">
                	<input type="hidden" id="hid_filename" name="hid_filename" value="">
                	<input type="hidden" id="hid_fileid" name="hid_fileid" value="">
                	</td>
                </tr>
                
              </table>
		
		
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
		<input type="button" name="btn_add" id="btn_add" disabled="disabled" onclick="coreinfo_add()"value="提 交" />
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
