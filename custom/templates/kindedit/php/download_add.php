<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<script type="text/javascript" language="JavaScript"> 
//file_path = document.forms[0].fileToUpload.value;
function coreinfo_add(){
 			var file_name=document.getElementById('hid_filename').value;
			var type=$('#news_type').val();
			var title=$('#title').val();
			//var firm=$('#firm').val();
			//var product=$('#product').val();
			//var item=$('#item').val();
			var author=$('#author').val(); 
			//alert(file_name);
			if(title==''){
				alert('��������Խ�����⣡');
			}else if(author==''){
				alert('�����뷢����Ա��');
			}else if(file_name==''){
				alert('���ϴ��ļ���');
			}else{
				
				$.post("./edit_task.php",{action:"download_add",fileName:file_name,mytype:type,
				mytitle:title,myauthor:author},function(data){
 				if(data){
 					//alert(data);
 					alert("��ӳɹ���");
 					clear();
 				}else{
 					alert("�����ظ���������������");
 					
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
	function insertTitle(tValue){    
  	 var t1 = tValue.lastIndexOf("\\");  
  	 var t2 = tValue.lastIndexOf(".");   
 	 if(t1 >= 0 && t1 < t2 && t1 < tValue.length){    
     	 return tValue.substring(t1 + 1, t2);     
   		}    
	}  	
	function ajaxFileUpload()
	{   //var file_name=insertTitle(document.forms[0].fileToUpload.value);
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
  			<td width="100%" align="left" ><div id="right_topcenter">��ǰλ�ã��������� > �������</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  name="form" action="" method="POST" enctype="multipart/form-data" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- ������-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>�������</b></td>
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
                
            		
                	 <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;�������<select id="news_type" name="news_type" style="width:260px;" >
                	 <option value="0" selected="selected">�����ĵ�</option>
                	 <option value="1">���</option>
                	  <option value="2">���ģ��</option>
                	 </select>
                	 </td>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;���ر��⣺<input type="text" id="title" name="title" size="45" value=""></td>
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;ʱ�䣺<input type="text" id="start_date" name="start_date" value='��ѡ��' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
               
            	<tr>
            	
            	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;������Ա��<input type="text" id="author" name="author" size="45" value=""></td>
            	                	
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;�����ĵ���<input id="fileToUpload" type="file" size="45" name="fileToUpload" style="height:24px;">
                	&nbsp;&nbsp;&nbsp;<input type="button" id="buttonUpload" onclick="return ajaxFileUpload();" value="�ϴ�" style="height:24px;">
                	<input type="hidden" id="hid_filename" name="hid_filename" value=""></td>
                </tr>
                
              </table>
		
		
		<!--<input type="button" name="button" id="button"  onclick="dyinfo_add()"value="�ύ" />-->
		<!--<input type="submit" name="button" value="�ύ">-->
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
		<input type="button" name="btn_add" id="btn_add" disabled="disabled" onclick="coreinfo_add()"value="�� ��" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<!--<input type="button" name="button" id="button"  onclick="printview()"value="Ԥ ��" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="ȡ ��">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
