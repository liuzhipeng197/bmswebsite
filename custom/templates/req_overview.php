<?php
	//session_cache_limiter(��private, must-revalidate��);//ע��Ҫд��session_start����֮ǰ
	session_start();
	require("../../admin/include/db_mysql.php");
	if($_SESSION['cus_id']==''){
		 header("Location:../index.php");
                 exit();

	}
	$subject_id=$_SESSION['subject_id'];
	//echo '$subject_id='.$subject_id;
	//$subject_id=$_POST['test_obj'];
	//echo '$_session='.$_SESSION['cus_id'];
	//echo '$subject='.$subject_id;
	

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
<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script>


function mysubmit(){
	alert("���ļ�������ύ�ɹ������ǽ�������д�");
	window.location.href="busi_apply_query.php";
 }

	

</script>
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif"><img src="../images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="../images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31" ><div class="titlebt">�˶�������Ϣ</div></td>
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
            <td class="left_txt">��ǰλ�ã����ҵ�����롷�������̡��˶�������Ϣ</td>
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
                <td width="90%" valign="top"><span class="left_txt2">����������˶�������Ϣ������д������ڼ��ҵ���ѯ->ҵ�������ѯ�н����޸ġ�</span><span class="left_txt3"></span><span class="left_txt2"></span><br>
                          <span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2"></span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;���������Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form_sel_obj" method="POST" action="req_baseinfo.php">
              <tr>
                <!--<td width="20%" height="30" align="right" class="left_txt4">�������б�</td>
                <td width="3%"  class="left_txt4">&nbsp;</td>
                <td width="32%" height="30"  class="left_txt4">-->
				
				<?php
					//ͨ���������ݿ⣬��ȡ������Ϣ
					$sql="select subject_name2 from subject where subject_id='$subject_id'";
					$req_table=get_result_first($sql);
					//$req_table=$_SESSION['req_table'];
					//echo'$req_table='.$req_table;
					//$req_table="bms_infodev_req";
					$uid=$_SESSION['cus_id'];
					//��ȡ����ǼǱ��е�req_id
					$sql="select max(req_id) from bms_task_reg where uid='$uid' and req_table='$req_table'";
					$req_id=get_result_first($sql);
					//echo '$req_id='.$req_id;
					$ary_test_obj=array();
					$ary_meta=array();
					$sql="select subject_id,subject_name,subject_name2 from subject where parents='$subject_id' order by subject_id";
					$ary_test_obj=get_result_ary($sql);
					
					foreach($ary_test_obj as $key => $result){
					$subject_cid=$result['subject_id'];//Ԫ����ID
					$subject_name=$result['subject_name'];//Ԫ������������
					$subject_name2=$result['subject_name2'];//Ԫ����Ӣ������
					$sql4="select $subject_name2 from $req_table  where id='$req_id'";
					//echo '$sql4='.$sql4;
					$sub_name2_val=get_result_first($sql4);
					if($sub_name2_val==''){
						//$sub_name2_val="��";
						//��˵����һ����˵������
						$sql3="select meta_name from metadata_subjects where subject_id='$subject_cid'";
						$result3=mysql_query($sql3,$conn);
						   while($row=@mysql_fetch_array($result3)) {
							$meta_name=$row['meta_name'];
							$attr_cont .="&nbsp;$meta_name</br>";
							}
							echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" class=\"left_txt4\" width=\"70%\">$attr_cont</td>					
						</tr>";
						echo"<tr  ><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					}else{
					
					
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
					echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" class=\"left_txt4\" width=\"70%\">$sub_name2_val</td>					
						</tr>";
						echo"<tr  ><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
						}
				}
					//����Ԫ���ݱ�
					/*$sql2="select count(metadata_id) from metadata_subjects where subject_id='$subject_cid'";
					if(get_result_first($sql2)<1){
						//Ԫ����û�����ԣ������Ԫ�������ƺ��ı���
						echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" /></td>					
						</tr>";
						echo"<tr  ><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					

					}else{
						//�������ݿ⣬��ȡԪ��������ֵ��������
						$sql3="select meta_type from metadata_subjects where subject_id='$subject_cid'";
						$ary_meta=get_result_first($sql3);
						if($meta_type!=0){
							echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" class=\"left_txt4\" width=\"70%\">$sub_name2_val</td>					
						</tr>";
						echo"<tr  ><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
						}else{
							
						}
						$metaid="metaid_";
						foreach($ary_meta as $key => $result3){
						
						$metadata_id=$result3['metadata_id'];//����ID
						$meta_name=$result3['meta_name'];//������������
						$meta_type=$result3['meta_type'];//��������
						//echo $subject_cid."</br>";
						//echo $subject_name."</br>";
						//echo $subject_name2."</br>";
						
						if($meta_type!=1){//һ������checkbox
							//$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$subject_name2|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						}else if($meta_type==2){//��������checkbox
							//��$meta_name���շֺŽ��зָ�
							$ary_name=array();
							$ary_name=explode(";",$meta_name);
							for($i=1;$i<count($ary_name);$i++){
								//$attr_cont2 .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id"."_"."$i|$ary_name[$i]' id='$metaid$metadata_id"."_".$i."'>$ary_name[$i]&nbsp;&nbsp;";
								$val=$ary_name[$i];
								$id=md5($val);
								//$attr_cont2 .="$val<input onClick='check(this)' type='checkbox' value='$val|$id' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								$attr_cont2 .="$val<input onClick='check(this)' type='checkbox' value='$subject_name2|$ary_name[0]:$val' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							
							}
							$attr_cont .="</br>&nbsp;$ary_name[0]:&nbsp;(&nbsp;&nbsp;&nbsp;".$attr_cont2.")";
							$attr_cont2="";
						
						}else if($meta_type==0){//��ͨ˵�������֣�����Ҫ�û���д
							$attr_cont .="&nbsp;$meta_name</br>";
						
						}
					}
						echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" class=\"left_txt4\" width=\"70%\">".$attr_cont."</td></tr>";
						echo"<tr><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					
					
					}
					
					$attr_cont="";
					
					}*/
					
					
					
					//echo 'meta_name='.$meta_name;
				
					
				
					
									
				?>
				
               			
             
             
          </table></td>
		    <tr>
            <td>&nbsp;</td>
          </tr>
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
			<?php
					//��ȡ����ǼǱ��е�sample_id
					$ary_sample=array();
					$sql="select max(sample_id) from bms_task_reg where uid='$uid' and req_table='$req_table'";
					$sample_id=get_result_first($sql);
					$sql="select * from bms_sample where id='$sample_id'";
					//$ary_sample=get_result_ary($sql);
					$result=mysql_query($sql,$conn);
					while($row=@mysql_fetch_array($result)){
						$sample_name=$row['sample_name'];
						$speci=$row['speci'];
						$chip_speci=$row['chip_speci'];
						$cos_v=$row['cos_v'];
						$ym=$row['ym'];
						$tk=$row['tk'];
						$host=$row['host'];
						$host_ps=$row['host_ps'];
						$ic=$row['ic'];
						$ic_ps=$row['ic_ps'];
						$screen=$row['screen'];
						$screen_ps=$row['screen_ps'];
						$mouse=$row['mouse'];
						$mouse_ps=$row['mouse_ps'];
						$keyboard=$row['keyboard'];
						$keyboard_ps=$row['keyboard_ps'];
						$power_wire=$row['power_wire'];
						$power_wire_ps=$row['power_wire_ps'];
						$power_adapt=$row['power_adapt'];
						$power_adapt_ps=$row['power_adapt_ps'];
						$data_wire=$row['data_wire'];
						$data_wire_ps=$row['data_wire_ps'];
						$cdrom=$row['cdrom'];
						$cdrom_ps=$row['cdrom_ps'];
						$workbook=$row['workbook'];
						$workbook_ps=$row['workbook_ps'];
						$pack=$row['pack'];
						$pack_ps=$row['pack_ps'];
						$another=$row['another'];
						$another_ps=$row['another_ps'];
					
						
					}
					

					
			
			?>
        <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Ʒ���ƣ�</td>
                <td width="25%" class="left_txt4"><input type='text' id='sample_name' width='180px' value='<?php echo $sample_name; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;" >�ͺŹ��</td>
                <td width="25%" align="left" class="left_txt4"><input type='text' id='speci' width='180px' value='<?php echo $speci; ?>' disabled></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">оƬ�ͺţ�</td>
                <td width="35%"  class="left_txt4"><input type='text' id='chip_speci' width='180px'  value='<?php echo $chip_speci; ?>' disabled > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">COS�汾��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='cos_v' width='180px'  value='<?php echo $cos_v; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Ĥ��ʽ��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='ym' width='180px' value='<?php echo $ym; ?>' disabled> </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">�̱꣺</td>
                <td width="35%"  class="left_txt4"><input type='text' id='tk' width='180px'value='<?php echo $tk; ?>' disabled ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(̨)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='host' width='180px' value='<?php echo $host; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='host_ps' width='180px' value='<?php echo $host_ps; ?>' disabled> </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='ic' width='180px' value='<?php echo $ic; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='ic_ps' width='180px' value='<?php echo $ic_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��ʾ��(̨)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='screen' width='180px' value='<?php echo $screen; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��ʾ��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='screen_ps' width='180px'  value='<?php echo $screen_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��  ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='mouse' width='180px'  value='<?php echo $mouse; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">���(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='mouse_ps' width='180px'  value='<?php echo $mouse_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��  ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='keyboard' width='180px'  value='<?php echo $keyboard; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='keyboard_ps' width='180px'  value='<?php echo $keyboard_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Դ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_wire' width='180px'  value='<?php echo $power_wire; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Դ��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_wire_ps' width='180px'  value='<?php echo $power_wire_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��Դ������(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_adapt' width='180px' value='<?php echo $power_adapt; ?>' disabled  ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='power_adapt_ps' width='180px' value='<?php echo $power_adapt_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='data_wire' width='180px'  value='<?php echo $data_wire; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='data_wire_ps' width='180px' value='<?php echo $data_wire_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��  ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='cdrom' width='180px'  value='<?php echo $cdrom; ?>' disabled ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='cdrom_ps' width='180px'  value='<?php echo $cdrom_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">˵����(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='workbook' width='180px' value='<?php echo $workbook; ?>' disabled  ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">˵����(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='workbook_ps' width='180px' value='<?php echo $workbook_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��װ��(��)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='pack' width='180px' value='<?php echo $pack; ?>' disabled  ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��װ��(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='pack_ps' width='180px' value='<?php echo $pack_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����������</td>
                <td width="35%"  class="left_txt4"><input type='text' id='another' width='180px' value='<?php echo $another; ?>' disabled  ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">��������(��ע)��</td>
                <td width="35%"  class="left_txt4"><input type='text' id='another_ps' width='180px' value='<?php echo $another_ps; ?>' disabled  > </td>
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
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;�ϴ������б�</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
			

			<?php
		
				$ary_upload_file=array();
				$uid=$_SESSION['cus_id'];
				$req_id=$_SESSION['max_req_id'];
				$req_table=$_SESSION['req_table'];
				$sql="select file_name from bms_doc where uid='$uid' and req_id='$req_id' and req_table='$req_table' ";
				$ary_upload_file=get_result_ary($sql);
				if(empty($ary_upload_file)){
					echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;���ϴ����ϡ�</td></tr>";
				}else{
				//print_r($ary_upload_file);
				$myid=1;
				foreach($ary_upload_file as $key => $result){
					$file_name=$result['file_name'];//�ϴ��ļ���
					echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;$id&nbsp;&nbsp;&nbsp;$file_name</td></tr>";
					$myid++;
					}
				}
				
				
			?>
      
			   </table></td> 
			   
			    <tr>
		 <td>&nbsp;</td>
		 </tr>
          </tr>
		   <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;������úͼ���ʱ��</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
			<?php
				//ͨ���������ݿ⣬��ȡ������Ϣ
					$req_table=$_SESSION['req_table'];
					//echo'$req_table='.$req_table;
					//$req_table="bms_infodev_req";
					$uid=$_SESSION['cus_id'];
					$req_id=$_SESSION['max_req_id'];
					//��ȡ����ǼǱ��е�req_id
					$sql="select fee,cycle from bms_task_reg where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
					//$req_id=get_result_first($sql);
					$result=mysql_query($sql,$conn);
					$row=@mysql_fetch_array($result);
					$fee=$row['fee'];
					$cycle=$row['cycle'];
			
			?>
			
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">������ã�</td>
                <td width="35%"  class="left_txt4"><?php echo $fee ?>Ԫ</td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">����ʱ�䣺</td>
                <td width="35%"  class="left_txt4"><?php echo $cycle; ?>�� </td>
              </tr>
			
      
			   </table></td> 
		  

        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="center"><input type="button" value="ȷ��" name="B1" onclick="mysubmit()" /></td>
             
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

</body>

