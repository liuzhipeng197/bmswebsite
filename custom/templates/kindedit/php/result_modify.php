<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>

<?php
	include_once("../../../include/db_mysql.php");
	$coreinfo_id=trim($_GET['coreinfoid']);
	$sql = "select * from nstc_test_result where id='$coreinfo_id'";
    $result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    $type=$row['type'];
    if($type=='0'){
		$type='硬件';
	}else if($type=='1'){
		$type='软件';
	}
	$title=$row['title'];
	$firm=$row['firm'];
	$product=$row['test_product'];
	$item=$row['test_item'];
	$result=$row['test_result'];
	$author=$row['author'];
	$date=$row['date'];
	$audit=$row['audit'];
	if($audit=='0'){
		$audit='未通过';
	}else{
		$audit='通过';
	}
    
    
?>
<script type="text/javascript" language="JavaScript"> 
//file_path = document.forms[0].fileToUpload.value;
function coreinfo_modify(){
			var coreinfo_id="<?echo $coreinfo_id?>";
 			var file_name=document.getElementById('hid_filename').value;
 			var cbx_upload=document.getElementById('cbx_upload');
			var type=$('#news_type').val();
			var title=$('#title').val();
			var firm=$('#firm').val();
			var product=$('#product').val();
			var item=$('#item').val();
			var author=$('#author').val(); 
                        var date=$('#date').val();
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
			}else if(date==''){
                                alert('请输入发布日期!');
                        }else{
				if(!cbx_upload.checked){
					$.post("./edit_task.php",{action:"result_modify",coreinfoId:coreinfo_id,
				mytype:type,mytitle:title,myfirm:firm,myproduct:product,myitem:item,
				myauthor:author,date:date},function(data){
 				if(data){
 					//alert(data);
 					alert("测试结果修改成功！");
 					clear();
 				}else{
 					alert("修改后的测试结果的标题重复，请重新命名！");
 					
 				}
				});
			}else{
				if(file_name==''){
					alert('您已经勾选上传，但是您没有上传文件');
				}else{
				$.post("./edit_task.php",{action:"result_modify",coreinfoId:coreinfo_id,
				fileName:file_name,mytype:type,
				mytitle:title,myfirm:firm,myproduct:product,myitem:item,
				myauthor:author,date:date},function(data){
 				if(data){
 					//alert(data);
 					alert("测试结果修改成功！");
 					clear();
 				}else{
 					alert("修改后的测试结果的标题重复，请重新命名！");
 					
 				}
			});
				}
			}
		}
 }
 
 function dyinfo_cancle(){
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
 function coreinfo_audit(){
 	var coreinfo_id="<?echo $coreinfo_id?>";
 	$.post("./edit_task.php",{action:"result_audit",coreinfoId:coreinfo_id},function(data){
 				if(data){
 					//alert(data);
 					alert("操作成功！");
 					//clear();
 				}else{
 					alert("操作失败");
 				}
			});
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
		//if(file_name!=''){
		//document.getElementById('button').disabled =false ;
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
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：测评结果 > 修改测评结果</div></td>
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
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo $title;?></b></td>
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
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试厂商：<input type="text" id="firm" name="firm" size="45" value="<?php echo $firm;?>"></td>
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试产品：<input type="text" id="product" name="product" size="45" value="<?php echo $product;?>"></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;测试项目：<input type="text" id="item" name="item" size="45"  value="<?php echo $item;?>"></td>
                </tr>
            	<tr>
            	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;结果标题：<input type="text" id="title" name="title" size="45" value="<?php echo $title;?>"></td>
            	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;发布人员：<input type="text" id="author" name="author" size="45" value="<?php echo $author;?>"></td>
            	</tr>
                 <tr>
                	
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;测试结果：<input id="fileToUpload" type="file" size="15" name="fileToUpload" style="height:24px;">
                	
                	<input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="上传" style="height:24px;">
                	<input type="checkbox" name="cbx_upload" id="cbx_upload" value="1">(如要修改,请勾选再上传)
                	<input type="hidden" id="hid_filename" name="hid_filename" value=""></td>
                </tr>
             <tr>
                      <?php                        echo " <td   height=\"30\" style=\"font-size:13;\">&nbsp;&nbsp;发布日期：<input type=\"text\" id=\"date\" name=\"date\" size=\"25\"  value='$date'>(如2011-10-11)</td>";
                      ?>
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
		<input type="button" name="button" id="button"  onclick="coreinfo_modify()"value="完成修改" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="button" id="button"  onclick="coreinfo_audit()"value="通过审核" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="取   消">-->
	</td>
	
</tr>
</table>
</div>
</body>

</html>
