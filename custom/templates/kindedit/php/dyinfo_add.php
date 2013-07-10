<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script type="text/javascript" language="JavaScript"> 
 function dyinfo_add(){
 			var file_name=document.getElementById('hid_filename').value;//上传图片名称2010.8.18
 			var img_flag;
 			if(file_name!=''){
 				img_flag=1;
 			}else{
 				img_flag=0;
 			}
 			//alert(file_name);
			var type=$('#news_type').val();
			//var start_date=$('#start_date').val();
			var title=$('#title').val();
			var author=$('#author').val(); 
			var department=$('#department').val(); 
			var content=$('#content1').val();
                        //头条摘要2012.2.13,邱全伟
                        var abs=$('#abs').val();
			//alert(content);
			//var content=document.getElementById('content2').value;
			if(title==''){
				alert('请输入标题！');
			}else if(author==''){
				alert('请输入作者！');
			}else if(department==''){
				alert('请输入部门！');
			}else{
				//现在的版本
				$.post("./edit_task.php",{action:"dyinfo_add",fileName:file_name,mytype:type,mytitle:title,myauthor:author,
				mydepart:department,mycontent:content,img_flag:img_flag,abs:abs},function(data){
				//$.post("./edit_task.php",{action:"dyinfo_add",mytype:type,mytitle:title,myauthor:author,
				//mydepart:department,mycontent:content},function(data){
 				if(data){
 					//alert(data);
 					alert("动态信息添加成功！");
 					clear();
 				}else{
 					alert("新添加的动态信息的标题重复，请重新命名！");
 					
 				}
			});
			//
			//var oForm=document.getElementById('example');
			//oForm.submit();	
		}
 }
 
 function ajaxFileUpload()
	{   //var file_name=document.forms[0].fileToUpload.value;
		//var file_name=document.getElementById('fileToUpload').value;
		//var file_name_ary=file_name.split("\\");
		//var file_name=file_name_ary[file_name_ary.length-1];
		//document.getElementById('hid_filename').value=file_name;
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
				url:'doajaxfileupload3.php',
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
 
 function dyinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('title').value='';
 	//document.getElementById('author').value='';
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
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：动态信息 > 发布信息</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<form  id="example" name="example"  >
<!--<form name="example" method="post" action="?action=subcontent" target="_self">-->
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>发布信息</b></td>
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
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;类型：<select id="news_type" name="news_type" style="width:260px;" >
                	 <option value="0" selected="selected">行业动态</option>
                	 <option value="1">项目合作</option>
                	 <option value="2">测评研究</option>
                	 <option value="3">人才招聘</option>
                	 <option value="4">中心公告</option>
                	 </select>
                	 </td>
                	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;标题：<input type="text" id="title" name="title" size="45" value=""></td>
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                	
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;作者：<input type="text" id="author" name="author" size="45"  value=""></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;部门：<input type="text" id="department" name="department" size="45" value=""></td>
                </tr>
            	<tr>
            		<td   height="30" style="font-size:13;">&nbsp;&nbsp;图片：<input id="fileToUpload" type="file" size="18" name="fileToUpload" style="height:24px;">
                	<input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="上传" style="height:24px;">(可选，上传之后在焦点图中显示)
                	<!--<input type="checkbox" name="cbx_upload" id="cbx_upload">(如要上传,请勾选,否则无效)-->
                	<input type="hidden" id="hid_filename" name="hid_filename" value="">
                	<input type="hidden" id="hid_fileid" name="hid_fileid" value="">
                	</td>
                        <!--<td   height="30" style="font-size:13;">头条新闻摘要：<input type="text" id="abs" name="abs" size="30" value="">(50字)</td>-->

            	</tr>
                
               
              </table>
             <!-- <form name="example" method="post" action="?action=subcontent" target="_self">-->
		<textarea id="content1" name="content1" cols="100" rows="8" style="width:780px;height:278px;visibility:hidden;"></textarea>
	<!--	</form>-->
		<!--<TEXTAREA  rows=30 cols=50 name="content2" id='content2'style="position:absolute;left:0;"></textarea>-->

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
		<input type="button" name="button" id="button"  onclick="dyinfo_add()"value="提 交" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btn_cancle" onclick=dyinfo_cancle() value="取 消">
	</td>
	
</tr>
</table>
</div>
</form>
</body>

</html>
<?php
	//header('Content-Type:text/html;charset=GB2312');
	/*include("../../../include/db_mysql.php");
	include_once("../../../include/global.php");
	$htmlData = '';
	$action=trim($_GET['action']);
	$htmlData = $_POST['content1'];
	echo '$html='.$htmlData;
	if($action=='subcontent' and isset($_POST)){
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData =  htmlspecialchars(stripslashes($_POST['content1']));
		} else {
			$htmlData =  htmlspecialchars($_POST['content1']);
		}
		
	echo '$html='.$htmlData;
		$img_name=trim($_POST['hid_filename']);//2010.8.18焦点图名称
			if($img_name!=''){
				$img_flag=1;
			}else {
				$img_flag=0;
			}
			
	   		$type=trim($_POST['news_type']);
			//$start_date=trim($_POST['mydate']);
			$start_date=date("Y-m-d");
			$title=trim($_POST['title']);
			$author=trim($_POST['author']);
			$department=trim($_POST['department']);
			//$htmlData=trim($_POST['mycontent']);
			$time=date("H:i:s");
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$img_name = iconv( "UTF-8" , "GB2312" , $img_name );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			$department = iconv( "UTF-8" , "GB2312" , $department);
			//查找是否有重复项
         	$sql = "select * from nstc_dyinfo";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($title,$row['title'])==0){
				exit;
			
		   		}	
	     	}
			$sql = "insert into nstc_dyinfo(id,type,title,content,author,department,date,time,audit,img_name,img_flag) 
			values('','$type','$title','$htmlData','$author','$department','$start_date','$time','0','$img_name','$img_flag')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	}
}*/
?>
