<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>

<?php
	include_once("../../../include/db_mysql.php");
	$dyinfo_id=trim($_GET['dyinfoid']);
	$sql = "select * from nstc_dyinfo where id='$dyinfo_id'";
    $result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    $type=$row['type'];
    if($type=='0'){
		$type='������Ϣ';
	}else if($type=='1'){
		$type='������Ϣ';
	}else if($type=='2'){
		$type='�����о�';
	}else if($type=='4'){
		$type='���Ĺ���';
	}else if($type=='3'){
                $type='�˲���Ƹ';
        }
    $title=$row['title'];
    $author=$row['author'];
    $department=$row['department'];
    $content=$row['content'];
    $date=$row['date'];
    $abs=$row['abs'];
?>
<script type="text/javascript" language="JavaScript"> 
 function dyinfo_modify(){
 			var dyinfo_id="<?echo $dyinfo_id?>";
			//var type=$('#news_type').val();
			//var start_date=$('#start_date').val();
			//cbx_upload=$('#').val();
			var file_name=document.getElementById('hid_filename').value;//�ϴ�ͼƬ����2010.8.18
			var cbx_upload=document.getElementById('cbx_upload');
			var title=$('#title').val();
			var author=$('#author').val(); 
			var department=$('#department').val(); 
			var content=$('#content1').val();
                        var date=$('#date').val();
                        var abs=$('#abs').val();
			//var content=$('#content2').val();
			//alert(content);
			//var content=document.getElementById('content2').value;
			if(title==''){
				alert('��������⣡');
			}else if(author==''){
				alert('���������ߣ�');
			}else if(department==''){
				alert('�����벿�ţ�');
			}else if(date==''){
                                alert('�������޸�����');
                        }else{
				//var oForm=document.getElementById('example');
				//oForm.submit();
				if(!cbx_upload.checked){
				$.post("./edit_task.php",{action:"dyinfo_modify",dyinfoId:dyinfo_id,mytitle:title,myauthor:author,
				mydepart:department,mycontent:content,date:date,abs:abs},function(data){
 				if(data){
 					//alert(data);
 					alert("��̬��Ϣ�޸ĳɹ���");
 					clear();
 				}else{
 					alert("�޸ĺ�Ķ�̬��Ϣ�ı����ظ���������������");
 					
 				}
				});
			}else{
					//alert('�Ѿ���ѡ');file_name
					if(file_name==''){
						alert('���Ѿ���ѡ�ϴ���������û���ϴ��ļ�');
					}else{
					$.post("./edit_task.php",{action:"dyinfo_modify",fileName:file_name,dyinfoId:dyinfo_id,mytitle:title,myauthor:author,
					mydepart:department,mycontent:content,date:date,abs:abs},function(data){
 					if(data){
 					//alert(data);
 					alert("��̬��Ϣ�޸ĳɹ���");
 					clear();
 					}else{
 					alert("�޸ĺ�Ķ�̬��Ϣ�ı����ظ���������������");
 					
 					}
					});
				}
			}
		}
 }
 
 function ajaxFileUpload()
	{  // var file_name=document.getElementById('fileToUpload').value;
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
							alert('�ϴ��ɹ���');
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
 
 function dyinfo_audit(){
 	var dyinfo_id="<?echo $dyinfo_id?>";
 	$.post("./edit_task.php",{action:"dyinfo_audit",dyinfoId:dyinfo_id},function(data){
 				if(data){
 					//alert(data);
 					alert("�����ɹ���");
 					//clear();
 				}else{
 					alert("����ʧ��");
 				}
			});
 }
  function headline(){
 	var dyinfo_id="<?echo $dyinfo_id?>";
 	$.post("./edit_task.php",{action:"headline",dyinfoId:dyinfo_id},function(data){
 				if(data){
 					//alert(data);
 					alert("�����ɹ���");
 					//clear();
 				}else{
 					alert("����ʧ��");
 				}
			});
 }
  function unheadline(){
 	var dyinfo_id="<?echo $dyinfo_id?>";
 	$.post("./edit_task.php",{action:"unheadline",dyinfoId:dyinfo_id},function(data){
 				if(data){
 					//alert(data);
 					alert("�����ɹ���");
 					//clear();
 				}else{
 					alert("����ʧ��");
 				}
			});
 }
 
 function dyinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('title').value='';
 	document.getElementById('author').value='';
 	document.getElementById('department').value='';
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
  			<td width="100%" align="left" ><div id="right_topcenter">��ǰλ�ã���̬��Ϣ > �޸���Ϣ</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<!--<form  id="example" name="example" method="post" action="test.php">-->
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- ������-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo  $type." > ".$title?></b></td>
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
            	<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                	 <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;���ݣ�<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                	 <td height="30" style="font-size:13; ">
                	 <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
            	<!--<tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;���ͣ�<select id="news_type" name="news_type" style="width:260px;" >
                	 <option value="0" selected="selected">NSTC������Ϣ</option>
                	 <option value="1">������Ϣ</option>
                	 <option value="2">�����о�</option></select>
                	 </td>
                	
                </tr>-->
                <tr>
                	<?php
                	echo " <td  height=\"30\" style=\"font-size:13;\">&nbsp;&nbsp;���⣺<input type=\"text\" id=\"title\" name=\"title\" size=\"45\" value='$title'></td>
                         <td   height=\"30\" style=\"font-size:13;\">&nbsp;&nbsp;���ߣ�<input type=\"text\" id=\"author\" name=\"author\" size=\"45\"  value='$author'></td>";

                	?>
                </tr>
            	
                
                <tr>
                  
                  	<?php
                  	echo "<td   height=\"30\" style=\"font-size:13;\">&nbsp;&nbsp;���ţ�<input type=\"text\" id=\"department\" name=\"department\" size=\"45\" value='$department'></td>";
                  	?>
                  	<td   height="30" style="font-size:13;">&nbsp;&nbsp;ͼƬ��<input id="fileToUpload" type="file" size="25" name="fileToUpload" style="height:24px;">
                	<input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="�ϴ�" style="height:24px;">
                	<input type="checkbox" name="cbx_upload" id="cbx_upload" value="1">(��Ҫ�޸�,�빴ѡ���ϴ�)
                	<input type="hidden" id="hid_filename" name="hid_filename" value="">
                	<input type="hidden" id="hid_fileid" name="hid_fileid" value="">
                	</td> 
                  	<!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;ʱ�䣺<input type="text" id="start_date" name="start_date" value='��ѡ��' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
              
                <tr>
                      <?php
                        echo " <td   height=\"30\" style=\"font-size:13;\">&nbsp;&nbsp;���ڣ�<input type=\"text\" id=\"date\" name=\"date\" size=\"25\"  value='$date'>(��2011-10-11)</td>";
                         echo " <td   height=\"30\" style=\"font-size:13;\">ͷ������ժҪ��<input type=\"text\" id=\"abs\" name=\"abs\" size=\"55\"  value='$abs'>&nbsp;&nbsp;(50��)</td>";

                      ?>
                </tr>
              </table>
		<textarea id="content1" name="content1" cols="100" rows="8" style="width:770px;height:278px;visibility:hidden;"><?echo htmlspecialchars($content);//echo htmlspecialchars($htmlData); ?></textarea>
		<!--<textarea id="content2" name="content2" cols="100" rows="8"><?echo htmlspecialchars($content);?></textarea>-->
		
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
		<!--<input type="button" id="btn_add" onclick=dyinfo_add() value="ȷ ��">-->
		<input type="button" name="button1" id="button1"  onclick="dyinfo_modify()"value="�޸����" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="button2" id="button2"  onclick="dyinfo_audit()"value="ͨ�����" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="button3" id="button3"  onclick="headline()"value="ͷ������" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="button4" id="button4"  onclick="unheadline()"value="ȡ��ͷ��" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btn_cancle" onclick=dyinfo_cancle() value="ȡ ��">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
