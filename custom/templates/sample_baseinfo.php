<?php
	session_start();
	require("../../admin/include/db_mysql.php");
	if($_SESSION['cus_id']==''){
		 header("Location:../index.php");
                 exit();

	}
	//echo '$_session='.$_SESSION['cus_id'];
	//ͨ���������ݿ⣬��ȡ������Ϣ
	$subject_id=$_SESSION['subject_id'];
	$sql="select subject_name2 from subject where subject_id='$subject_id'";
	$req_table=get_result_first($sql);
	//echo "req_table=".$req_table;
	
  

?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F8F9FA;
	/*overflow: scroll; */
	overflow-x:hidden;
}
-->
</style>
<!--<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>-->
<script src="../js/jquery1.4.js" type="text/javascript"></script>
<script src="../js/upload.js" type="text/javascript"></script>

<script>
	
	function mysubmit(){
		var uid="<?php echo $_SESSION['cus_id'];?>";
		var req_table="<?php echo $req_table; ?>";
		var sample_name= $('#sample_name').val();
		var speci= $('#speci').val();
		var chip_speci= $('#chip_speci').val();
		var cos_v= $('#cos_v').val();
		var ym= $('#ym').val();
		var tk= $('#tk').val();
		var host= $('#host').val();
		var host_ps= $('#host_ps').val();
		var ic= $('#ic').val();
		var ic_ps= $('#ic_ps').val();
		var screen= $('#screen').val();
		var screen_ps= $('#screen_ps').val();
		var mouse= $('#mouse').val();
		var mouse_ps= $('#mouse_ps').val();
		var keyboard= $('#keyboard').val();
		var keyboard_ps= $('#keyboard_ps').val();
		var data_wire= $('#data_wire').val();
		var data_wire_ps= $('#data_wire_ps').val();
		var power_wire= $('#power_wire').val();
		var power_wire_ps= $('#power_wire_ps').val();
		var power_adapt= $('#power_adapt').val();
		var power_adapt_ps= $('#power_adapt_ps').val();
		var cdrom= $('#cdrom').val();
		var cdrom_ps= $('#cdrom_ps').val();
		var workbook= $('#workbook').val();
		var workbook_ps= $('#workbook_ps').val();
		var pack= $('#pack').val();
		var pack_ps= $('#pack_ps').val();
		var another= $('#another').val();
		var another_ps= $('#another_ps').val();
				
		if(sample_name==''){
			alert("��������Ʒ����");
		}if(speci==''){
			alert("�������ͺŹ��");
		}if(tk==''){
			alert("�������̱�");
		}else{
			
			$.post("task.php",{action:"sample_baseinfo",uid:uid,sample_name:sample_name,speci:speci,chip_speci:chip_speci,cos_v:cos_v,ym:ym,tk:tk,
			host:host,host_ps:host_ps,ic:ic,ic_ps:ic_ps,screen:screen,screen_ps:screen_ps,mouse:mouse,mouse_ps:mouse_ps,keyboard:keyboard,
			keyboard_ps:keyboard_ps,power_wire:power_wire,power_wire_ps:power_wire_ps,power_adapt:power_adapt,
			power_adapt_ps:power_adapt_ps,data_wire:data_wire,data_wire_ps:data_wire_ps,cdrom:cdrom,cdrom_ps:cdrom_ps,workbook:workbook,workbook_ps:workbook_ps,pack:pack,pack_ps:pack_ps,
			another:another,another_ps:another_ps,req_table:req_table},function(data){
							if(data=='OK'){
                    
							alert("��Ʒ��Ϣ�ύ�ɹ�");
							window.location.href="upload.php";
						}
						});
		}
		
	}

</script>
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<body>
<!--<form name="form_sample method="POST" >-->
<!--<form enctype="multipart/form-data" id="upload_form" action="?a=up" method="POST" target="_self">-->

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif"><img src="../images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="../images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31" ><div class="titlebt">��д��Ʒ��Ϣ</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="../images/mail_rightbg.gif"><img src="../images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="left_txt">��ǰλ�ã����ҵ�����롷�������̡���д��Ʒ��Ϣ</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" height="55" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="10%" height="55" valign="middle"><img src="../images/title.gif" width="54" height="55"></td>
                <td width="90%" valign="top"><span class="left_txt2">�������Ҫ��д��Ʒ�Ļ�����Ϣ�����д��Ǻŵ�Ϊ���������֮�󵥻���һ����</span><span class="left_txt3"></span><span class="left_txt2"></span><br>
                          <span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2">ע�⣺������Ʒ��Ϣֻ����д������Ʒ�漰����Ϣ������û���漰����Ϣ�����Բ��</span><span class="left_txt3"></span><span class="left_txt2"></span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;��Ʒ������Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='4'>
			<!--<form name="form_sample method="POST" >-->
        <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Ʒ���ƣ�</td>
                <td width="25%" class="left_txt4"><input type='text' id='sample_name' width='180px' >*</td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;" >�ͺŹ��</td>
                <td width="25%" align="left" class="left_txt4"><input type='text' id='speci' width='180px' >*</td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">оƬ�ͺţ�</td>
                <td width="35%"  class="left_txt4"><input type='text' id='chip_speci' width='180px' > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">COS�汾��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='cos_v' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Ĥ��ʽ��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='ym' width='180px' > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">�̱꣺</td>
                <td width="35%"  class="left_txt4"><input type='text' id='tk' width='180px' >*</td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(̨)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='host' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='host_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='ic' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='ic_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��ʾ��(̨)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='screen' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��ʾ��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='screen_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��  ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='mouse' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">���(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='mouse_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��  ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='keyboard' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='keyboard_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Դ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_wire' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Դ��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_wire_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Դ������(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_adapt' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_adapt_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='data_wire' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='data_wire_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��  ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='cdrom' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='cdrom_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">˵����(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='workbook' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">˵����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='workbook_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��װ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='pack' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��װ��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='pack_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����������</td>
                <td width="35%"  class="left_txt4"><input type='text' id='another' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��������(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='another_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				

             
          </table></td>
		
			  <tr>
		 <td>&nbsp;</td>
		 </tr>
          </tr>
		   <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;ע������</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
        <tr><td width="100%"  class="left_txt4">&nbsp;&nbsp;&nbsp;1.�ͼ�ļ�����Ʒ�ڼ����ڼ����������ġ�</td></tr>
		<tr><td width="100%"  class="left_txt4">&nbsp;&nbsp;&nbsp;2.������Ŀȫ����ɺ��ҵ�λ������λ���շ�֪ͨ��������λ���յ��շ�֪ͨ��֮����3�����ڽ����ѣ���ƾ����Ʒ��Ϣ����ȡ���Ǽǵ���
����������ȡ��Ʒ����3������û���ѣ��Ե�4��������ȡ������Ʒ�ı��ܷѣ�ÿ�հ�����ѵ�20%��ȡ���Ե�5������ÿ�հ�����ѵ�40%��ȡ���ܷѣ�
����6���²����Ѳ�ȡ��Ʒ���������촦��</td></tr>
<tr><td width="100%"  class="left_txt4">&nbsp;&nbsp;&nbsp;3.ƾ�˵���ȡ��Ʒ�������Ʊ��档 </td></tr>
			   </table></td>  

        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="right"><input type="button" value="��һ��" name="B1" onclick="mysubmit()" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="44%" height="30"><input type="button" value="ȡ��" name="B12" /></td>
            </tr>
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>

			
          </table></td>
      </tr>
    </table></td>
    <td background="../images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="../images/mail_leftbg.gif"><img src="../images/buttom_left2.gif" width="17" height="17" /></td>
      <td height="17" valign="top" background="../images/buttom_bgs.gif"><img src="../images/buttom_bgs.gif" width="17" height="17" /></td>
    <td background="../images/mail_rightbg.gif"><img src="../images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</form>
</body>

