<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<?php
	include_once("../../../include/db_mysql.php");
	
	$sql = "select * from nstc_connect where id='1'";
    $result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    $person=$row['connector'];
    $tel=$row['tel'];
    $fax=$row['fax'];
    $email=$row['email'];
    $addr=$row['addr'];
    $zip=$row['zip'];
    
?>
<script type="text/javascript" language="JavaScript"> 
//file_path = document.forms[0].fileToUpload.value;
function coreinfo_add(){
 			
			var person=$('#person').val();
			var tel=$('#tel').val();
			var fax=$('#fax').val();
			var email=$('#email').val();
			var addr=$('#addr').val();
			var zip=$('#zip').val();
			//alert(email);
			if(person==''){
				alert('��������ϵ������');
			}else if(tel==''){
				alert('��������ϵ�绰');
			}else if(fax==''){
				alert('�����봫�棡');
			}else if(email==''){
				alert('������������䣡');
			}else if(addr==''){
				alert('��������ϵ��ַ');
			}else if(zip==''){
				alert('�������������룡');
			} /*else if(isTel('tel')==false){
				alert('��������ȷ�ĵ绰����:�绰�����ʽΪ���Ҵ���(2��3λ)-����(2��3λ)-�绰����(7��8λ)-�ֻ���(3λ)"');
				document.getElementById('tel').value="";
				document.getElementById('tel').focus();
			}*/else if(isTel('fax')==false){
				alert('��������ȷ�Ĵ������:��������ʽΪ���Ҵ���(2��3λ)-����(2��3λ)-�������(7��8λ)-�ֻ���(3λ)');
				document.getElementById('fax').value="";
				document.getElementById('fax').focus();
			}else if(isEmail('email')==false){
				alert('��������ȷ�������ַ');
				document.getElementById('email').value="";
				document.getElementById('email').focus();
			}else if(isZip('zip')==false){
				alert('��������ȷ���ʱ��ַ');
				document.getElementById('zip').value="";
				document.getElementById('zip').focus();
			}else{
				
				$.post("./edit_task.php",{action:"connect_modify",person:person,tel:tel,
				fax:fax,email:email,addr:addr,zip:zip},function(data){
 				if(data){
 					//alert(data);
 					alert("�޸ĳɹ���");
 					//clear();
 				}else{
 					alert("�޸�ʧ�ܣ������ԣ�");
 					
 				}
			});
				//alert("OK");
		}
 }
 
 function coreinfo_cancle(){
 	clear();
 }
 
 function clear(){
 	document.getElementById('person').value='';
 	document.getElementById('fax').value='';
 	document.getElementById('tel').value='';
 	document.getElementById('zip').value='';
 	document.getElementById('addr').value='';
 	document.getElementById('email').value='';
 }
 
 
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">��ǰλ�ã���ϵ���� > �޸���ϵ��Ϣ</div></td>
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
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>�޸���ϵ��Ϣ</b></td>
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
                	 
                		 <td  height="30" style="font-size:13;">&nbsp;&nbsp;��ϵ��Ա��<input type="text" id="person" name="person" size="45" value="<?php echo $person; ?>"></td>
                	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;��ϵ�绰��&nbsp;&nbsp;<input type="text" id="tel" name="tel" size="45" value="<?php echo $tel; ?>"></td>
                	  
                	
                </tr>
                <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;��ϵ���棺<input type="text" id="fax" name="fax" size="45" value="<?php echo $fax; ?>"></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;��ϵEmail��<input type="text" id="email" name="email" size="45"  value="<?php echo $email; ?>"></td>
                </tr>
            	<tr>
            	 <td>
            	   &nbsp;&nbsp;��ϵ��ַ��&nbsp;&nbsp;<textarea id="addr"  name="addr" cols="100" rows="8" style="width:260px;height:100px;"><?php echo $addr; ?></textarea>
            	 </td>
            	 <td   height="30" style="font-size:13;">&nbsp;&nbsp;�������룺&nbsp;&nbsp;<input type="text" id="zip" name="zip" size="45"  value="<?php echo $zip; ?>"></td>
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
		<!--<input type="button" id="btn_add" onclick=dyinfo_add() value="ȷ ��">-->
		<input type="button" name="btn_add" id="btn_add"  onclick="coreinfo_add()"value="�� ��" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="ȡ ��">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
