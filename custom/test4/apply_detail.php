<?php
	 session_start();
     include_once("./include/function.php");
     iframe_head();
	 $req_id=trim($_GET['req_id']);
	$sample_id=trim($_GET['sample_id']);
	$req_table=trim($_GET['req_table']);
	$uid=trim($_GET['uid']);
	$sql="select distinct subject_id from subject where subject_name2='$req_table'";
	$subject_id=get_result_first($sql);
	$sql="select deal,ps from bms_task_reg where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$str_deal=$row[0];
	$req_ps=$row['ps'];
	//echo '$req_ps='.$req_ps;
	if($str_deal==0){
		$str_deal="δ����";
	}else if($str_deal==1){
		$str_deal="������";
	}else if($str_deal==2){
		$str_deal="�ܾ�";
	}
	
?>



<script type="text/javascript" language="JavaScript">
	
	function cancle(){
		//clear();
		window.location.href="busi_apply_query.php";
	}
	
	function jump(url){
		//window.location.href=url;
		window.open(url);
	}

</script>
	

<body>
<div class="juzhong">
  <?php
	iframe_top();//ҳ��ͷ��
	?>

  <div class="main_2">
	<?php
		iframe_left();//ҳ����ߣ��˵���
	?>
	
        <div align='left'>
                <ul class="bmsbreadcrumb">
                        <li><a href="index.php">��ҳ</a> <span class="divider">></span></li>
                        <li><a href="busi_apply_query.php">����ҵ���ѯ</a> <span class="divider">></span></li>
                        <li><a href="busi_apply_query.php">ҵ�������ѯ</a> <span class="divider">></span></li>
			<li class="active">ί������Ϣ</li>
                </ul>

  	</div>
	<div class="anlie_2">
          <div class="anlie_nr">
        
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

<tr><!-- ������-1 -->
	<td height="30" background="../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td class='td_head' style="text-align:center">&nbsp;&nbsp;<b><?php echo "ί������Ϣ";?></b></td>
				
			</tr>
		</table>
	</td>
</tr>

<tr class='alert'><!-- ��Ҫ����1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="8">&nbsp;</td>
					<td>
						<table  width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">      
							<tr>
								
								<td height="30" style="font-size:13; ">
									<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
				<?php
											
					
					$ary_test_obj=array();
					$ary_meta=array();
					$sql="select subject_id,subject_name,subject_name2 from subject where parents='$subject_id' order by subject_id";
					$ary_test_obj=get_result_ary($sql);
					$i=1;
					echo "<tr>";
					foreach($ary_test_obj as $key => $result){
					$subject_cid=$result['subject_id'];//Ԫ����ID
					$subject_name=$result['subject_name'];//Ԫ������������
					$subject_name2=$result['subject_name2'];//Ԫ����Ӣ������
					$sql4="select $subject_name2 from $req_table  where id='$req_id'";
					//echo '$sql4='.$sql4;
					$sub_name2_val=get_result_first($sql4);
					
					if($sub_name2_val=='' &&  $subject_name=='˵��'){
						//$sub_name2_val="��";
						//��˵����һ����˵������
						$sql3="select meta_name from metadata_subjects where subject_id='$subject_cid'";
						$result3=mysql_query($sql3,$conn);
						   while($row=@mysql_fetch_array($result3)) {
							$meta_name=$row['meta_name'];
							$attr_cont .="&nbsp;$meta_name</br>";
							}
							echo "<td height=\"30\" align=\"right\" width=\"15%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" align='left' width=\"33%\" >$attr_cont</td>					
						";
						//echo"<td height=\"1\"   bgcolor=\"#a1a2a3\"><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					}else{
					
					
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
					echo "<td height=\"30\" align=\"right\" width=\"19%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" align=\"left\" width=\"33%\">$sub_name2_val</td>					
						";
						//echo"<td height=\"1\"  bgcolor=\"#a1a2a3\" ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
						}
						if($i%2==0){
						echo "</tr><tr>";//һ����ʾ����
						
						}
						$i++;
					
				}
					echo "</tr>";
										
										
			?>             
									</table>
								</td>
							</tr>
						</table>   
					</td>
				<td width="8">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>

<tr><!-- ������-1 -->
	<td height="30" background="../images/tab_05.gif" style='padding-top:50px'>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td class='td_head' style='text-align:center'>&nbsp;&nbsp;<b><?php echo "��Ʒ��Ϣ";?></b></td>
				
			</tr>
		</table>
	</td>
</tr>

<tr class='alert'><!-- ��Ҫ����1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="8">&nbsp;</td>
					<td>
						<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
							<tr>
								
								<td height="30" style="font-size:13; " >
									<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
				<?php
					//��ȡ����ǼǱ��е�sample_id
					
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
                <td height="30" align='right' style="font-weight:bold;">��Ʒ���ƣ�</td>
                <td  ><input type='text' id='sample_name' width='180px' value='<?php echo $sample_name; ?>' disabled ></td>
				<td height="30" align='right'  style="font-weight:bold;" >�ͺŹ��</td>
                <td ><input type='text' id='speci' width='180px' value='<?php echo $speci; ?>' disabled></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td  height="30" align="right" style="font-weight:bold;">оƬ�ͺţ�</td>
                <td   ><input type='text' id='chip_speci' width='180px'  value='<?php echo $chip_speci; ?>' disabled > </td>
				<td  height="30" align="right" style="font-weight:bold;">COS�汾��</td>
                <td  ><input type='text' id='cos_v' width='180px'  value='<?php echo $cos_v; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td  height="30" align="right" style="font-weight:bold;">��Ĥ��ʽ��</td>
                <td   ><input type='text' id='ym' width='180px' value='<?php echo $ym; ?>' disabled> </td>
				<td  height="30" align="right" style="font-weight:bold;">�̱꣺</td>
                <td  ><input type='text' id='tk' width='180px'value='<?php echo $tk; ?>' disabled ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">����(̨)��</td>
                <td  ><input type='text' id='host' width='180px' value='<?php echo $host; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">����(��ע)��</td>
                <td   ><input type='text' id='host_ps' width='180px' value='<?php echo $host_ps; ?>' disabled> </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">IC��(��)��</td>
                <td   ><input type='text' id='ic' width='180px' value='<?php echo $ic; ?>' disabled ></td>
				<td height="30" align="right" style="font-weight:bold;">IC��(��ע)��</td>
                <td   ><input type='text' id='ic_ps' width='180px' value='<?php echo $ic_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">��ʾ��(̨)��</td>
                <td   ><input type='text' id='screen' width='180px' value='<?php echo $screen; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">��ʾ��(��ע)��</td>
                <td  ><input type='text' id='screen_ps' width='180px'  value='<?php echo $screen_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">��  ��(��)��</td>
                <td   ><input type='text' id='mouse' width='180px'  value='<?php echo $mouse; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">���(��ע)��</td>
                <td   ><input type='text' id='mouse_ps' width='180px'  value='<?php echo $mouse_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��  ��(��)��</td>
                <td   ><input type='text' id='keyboard' width='180px'  value='<?php echo $keyboard; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">����(��ע)��</td>
                <td   ><input type='text' id='keyboard_ps' width='180px'  value='<?php echo $keyboard_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��Դ��(��)��</td>
                <td   ><input type='text' id='power_wire' width='180px'  value='<?php echo $power_wire; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">��Դ��(��ע)��</td>
                <td   ><input type='text' id='power_wire_ps' width='180px'  value='<?php echo $power_wire_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��Դ������(��)��</td>
                <td   ><input type='text' id='power_adapt' width='180px' value='<?php echo $power_adapt; ?>' disabled  ></td>
				<td  height="30" align="right" style="font-weight:bold;">������(��ע)��</td>
                <td  ><input type='text' id='power_adapt_ps' width='180px' value='<?php echo $power_adapt_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">������(��)��</td>
                <td   ><input type='text' id='data_wire' width='180px'  value='<?php echo $data_wire; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">������(��ע)��</td>
                <td   ><input type='text' id='data_wire_ps' width='180px' value='<?php echo $data_wire_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��  ��(��)��</td>
                <td   ><input type='text' id='cdrom' width='180px'  value='<?php echo $cdrom; ?>' disabled ></td>
				<td  height="30" align="right" style="font-weight:bold;">����(��ע)��</td>
                <td   ><input type='text' id='cdrom_ps' width='180px'  value='<?php echo $cdrom_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">˵����(��)��</td>
                <td ><input type='text' id='workbook' width='180px' value='<?php echo $workbook; ?>' disabled  ></td>
				<td height="30" align="right" style="font-weight:bold;">˵����(��ע)��</td>
                <td  ><input type='text' id='workbook_ps' width='180px' value='<?php echo $workbook_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��װ��(��)��</td>
                <td   ><input type='text' id='pack' width='180px' value='<?php echo $pack; ?>' disabled  ></td>
				<td  height="30" align="right" style="font-weight:bold;">��װ��(��ע)��</td>
                <td   ><input type='text' id='pack_ps' width='180px' value='<?php echo $pack_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">����������</td>
                <td  ><input type='text' id='another' width='180px' value='<?php echo $another; ?>' disabled  ></td>
				<td  height="30" align="right" style="font-weight:bold;">��������(��ע)��</td>
                <td   ><input type='text' id='another_ps' width='180px' value='<?php echo $another_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>          
									</table>
								</td>
							</tr>
						</table>   
					</td>
				<td width="8">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>

<tr><!-- ������-1 -->
	<td height="30" background="../images/tab_05.gif" style='padding-top:50px'>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class='td_head' style='text-align:center'>&nbsp;&nbsp;<b><?php echo "�����б�";?></b></td>
				
			</tr>
		</table>
	</td>
</tr>

 <tr class='alert'><!-- ��Ҫ����2 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                        
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                           <?php
						   $ary_upload_file=array();
				
				$sql="select * from bms_doc where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
				$ary_upload_file=get_result_ary($sql);
				if(empty($ary_upload_file)){
					echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;���ϴ����ϡ�</td></tr>";
				}else{
				//print_r($ary_upload_file);
				    echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td width='20%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">���</span></div></td>
                    <td width='30%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">��������</span></div></td>
                    <td width='20%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">�ϴ�ʱ��</span></div></td>
                    <td width='30%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">����</span></div></td>
                </tr>";

            $id=1;
				
				foreach($ary_upload_file as $key => $result){
					$file_name=$result['file_name'];//�ϴ��ļ���
					$file_type=$result['file_type'];
					$file_size=$result['file_size'];
					$date=$result['date'];
					$time=$result['time'];
					//echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;$id&nbsp;&nbsp;&nbsp;$file_name</td></tr>";
					 echo "<tr>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$file_name."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."   ".$time."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>"."<a href='download.php?filename=$file_name&filetype=$file_type&filesize=$file_size'>����</a></td>";
                                echo "</tr>";
					$id++;
					}
				}
						   
               
                    
                
                  // echo "</table>";
                   mysql_close();
                 
                ?>
                
                
                
              </table>
                         </td>
                </tr>
                </table>   
                        </td>
                        <td width="8" background="../images/tab_15.gif">&nbsp;</td>
                </tr>

                </table>
        </td>
</tr>

<tr><!-- ������-1 -->
	<td height="30" background="../images/tab_05.gif" style='padding-top:50px'>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td class='td_head' style='text-align:center'>&nbsp;&nbsp;<b><?php echo "ҵ������״̬";?></b></td>
				
			</tr>
		</table>
	</td>
</tr>

<tr class='alert'><!-- ��Ҫ����3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;���ݣ�<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
                
               <tr>
				 <td height="40" >
					<b>����״̬��</b><?php echo $str_deal; ?>
				</td>
			 
                
				 <td height="40" >
					<b>��ע��Ϣ��</b><?php echo $req_ps;?> <!--<textarea id='ps' name='ps' value="cols="100" rows="8" style="width:90%;height:50px;"></textarea> -->
				</td>
			   </tr>
                
              </table>
                         </td>
                </tr>
                </table>   
                        </td>
                        <td width="8" background="../images/tab_15.gif">&nbsp;</td>
                </tr>

                </table>
        </td>
</tr>


<tr style='margin:0px 0px 30px 0px'><!-- ��Ҫ����3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8">&nbsp;</td>
            <td style='padding-top:20px'>
                <table  width="100%" border="0" cellpadding="0" cellspacing="0" >      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;���ݣ�<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="0" >
               <tr>
				<td height="40" valign="middle" align="center">
				<?php
				if($str_deal=='������'){
				echo "
                <input type=\"button\" class='edit_buttom' name=\"button\" id=\"button\"  onclick=\"jump('req_gen.php?req_id=$req_id&sample_id=$sample_id&req_table=$req_table&uid=$uid')\" value=\"����ί����\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\"  class='edit_buttom' id=\"btn_sample_gen\"  onclick=\"jump('sample_info_gen.php?sample_id2=$sample_id&uid2=$uid')\" value=\"������Ʒ��Ϣ��\" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" class='edit_buttom' id=\"btn_cancle\" onclick=cancle() value=\"��  ��\">";
}else {
     echo "
                <input type=\"button\"  class='edit_buttom_disabled' name=\"button\" id=\"button\"  disabled value=\"����ί����\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\"  class='edit_buttom_disabled' id=\"btn_sample_gen\"   disabled  value=\"������Ʒ��Ϣ��\" />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" class='edit_buttom' id=\"btn_cancle\" onclick=cancle() value=\"��  ��\">";


}
				?>
        </td>
			   </tr>
                 
                
              </table>
                         </td>
                </tr>
                </table>   
                        </td>
                        <td width="8" >&nbsp;</td>
                </tr>

                </table>
        </td>
		</tr>
		</table>
			
		
			  
          </div>
          
    </div>
    <div class="clear"></div>
  </div>
  <div class="bottom">
   <?php
	iframe_bottom();
   ?>
  </div>

</div>
</body>
</html>

