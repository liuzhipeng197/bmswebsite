<?php
        session_start();
		include_once("../../admin/include/function.php");
        iframe_head2();
?>
<SCRIPT language=javascript>
function printsetup()//ҳ�����ú���
{  
document.all("qingkongyema").click();//��ӡ֮ǰȥ��ҳü��ҳ��
document.all("dayinDiv").style.display="none";//��ӡ֮ǰ�����ز����ӡ�����Ԫ�أ����������ء���ӡ���͡���ӡԤ����������ť��
wb.execwb(8,1);   
document.all("dayinDiv").style.display="";//��ӡ֮�󽫸�Ԫ����ʾ��������ʾ������ӡ���͡���ӡԤ����������ť����������´δ�ӡ��
}   
function printpreview()//Ԥ������
{
document.all("qingkongyema").click();
document.all("dayinDiv").style.display="none";   ��   
wb.execwb(7,1);
document.all("dayinDiv").style.display="";
}
function printTure() //��ӡ����
{
 document.all('qingkongyema').click();//ͬ��
 document.all("dayinDiv").style.display="none";//ͬ��
 window.print();
 document.all("dayinDiv").style.display="";
}
function doPage()
{
 layLoading.style.display = "none";//ͬ��
}

function turnback()
{
 history.back();
}
</SCRIPT>  
<OBJECT classid="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2" height=0 id=wb name=wb width=0></OBJECT>
<script language="VBScript">
dim hkey_root,hkey_path,hkey_key
hkey_root="HKEY_CURRENT_USER"
hkey_path="\Software\Microsoft\Internet Explorer\PageSetup"
'//������ҳ��ӡ��ҳüҳ��Ϊ��
function pagesetup_null()
on error resume next
Set RegWsh = CreateObject("WScript.Shell")
hkey_key="\header"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,""
hkey_key="\footer"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,""
end function
'//������ҳ��ӡ��ҳüҳ��ΪĬ��ֵ
function pagesetup_default()
on error resume next
Set RegWsh = CreateObject("WScript.Shell")
hkey_key="\header"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,"&w&bҳ�룬&p/&P"
hkey_key="\footer"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,"&u&b&d"
end function
</script>
<BODY  leftMargin=0 topMargin=0 rightMargin=0 bottomMargin=0 style="BACKGROUND-POSITION: center 50%">


<?php
	 include_once("../include/db_mysql.php");
	 //req_id=$str_req_id&sample_id=$str_sample_id&req_table=$str_req_table';
	 //req_id=$str_req_id&sample_id=$str_sample_id&req_table=$str_req_table&uid=$str_uid
	//$req_id=trim($_GET['req_id']);
	$uid=trim($_GET['uid2']);
	$sample_id=trim($_GET['sample_id2']);
	$sql="select * from bms_sample  where id='$sample_id'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$sql2="select com_name from bms_custom  where cus_id='$uid'";
	$com_name=get_result_first($sql2);//��˾����
	//$req_table=trim($_GET['req_table']);
	//$uid=trim($_GET['uid']);
	//$sql="select distinct subject_id,subject_name from subject where subject_name2='$req_table'";
	//$subject_id=get_result_first($sql);
	//echo '$req_id='.$req_id;
	//$sql="select deal,ps from bms_task_reg where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
	//$result=mysql_query($sql);
	//$row=mysql_fetch_array($result);
	//$subject_id=$row[0];
	//$subject_name=$row[1];
	
	 
	 //echo "$req_id  $sample_id  $req_table $uid  $subject_id ";
	
?>
<div align="center">
<table border="1" width='600px' cols='4' style="font-size:13px;" cellpadding="0" cellspacing="0" >
��<caption style='font-size:16px;font-weight:bold'>�� Ʒ �� Ϣ �� �� ȡ �� �� �� ��</br>
</br>No.</caption>
<?php
					//��Ʒ��Ϣ��bms_sample�ֶ�						
					/*uid:uid,sample_name:sample_name,speci:speci,chip_speci:chip_speci,cos_v:cos_v,ym:ym,tk:tk,
			host:host,host_ps:host_ps,ic:ic,ic_ps:ic_ps,screen:screen,screen_ps:screen_ps,mouse:mouse,mouse_ps:mouse_ps,keyboard:keyboard,
			keyboard_ps:keyboard_ps,power_wire:power_wire,power_wire_ps:power_wire_ps,power_adapt:power_adapt,
			power_adapt_ps:power_adapt_ps,data_wire:data_wire,data_wire_ps:data_wire_ps,cdrom:cdrom,cdrom_ps:cdrom_ps,workbook:workbook,workbook_ps:workbook_ps,pack:pack,pack_ps:pack_ps,
			another:another,another_ps:another_ps*/
		
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">ί�е�λ"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;$com_name</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��Ʒ����"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['sample_name']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">�ͺŹ��"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['speci']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">оƬ�ͺ�"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['chip_speci']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">COS�汾"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['cos_v']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��Ĥ��ʽ"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['ym']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">�̱�"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['tk']."</td></tr>";
					
					echo "<tr><th height=\"25\" align=\"center\" class=\"left_txt4\" colspan='4' width='600px' style=\"font-weight:bold;\">�� ʼ ״ ̬ �� ��"."</th></tr>";
					
					/*echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��װ��״̬"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;�Ƿ����&nbsp;&nbsp;&nbsp; <input type='checkbox'>��&nbsp;&nbsp;&nbsp;
					<input type='checkbox'>��</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��Ʒ��۽ṹ״̬"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;�Ƿ����&nbsp;&nbsp;&nbsp; <input type='checkbox'>��&nbsp;&nbsp;&nbsp;
					<input type='checkbox'>��</td></tr>";*/
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��װ��״̬"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['pack_status']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��Ʒ��۽ṹ״̬"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['surf_status']."</td></tr>";
					
					
					echo "<tr><th height=\"25\" align=\"center\" class=\"left_txt4\" colspan='4' width='600px' style=\"font-weight:bold;\">�� Ʒ �� �� �� Ϣ"."</th></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" style=\"font-weight:bold;\">��  ��</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" ><b>��  ��</b></td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" ><b>��  ��</b></td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" ><b>��  ע</b></td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >1</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��  ����̨��</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['host']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['host_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >2</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >IC�����ţ�</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['ic']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['ic_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >3</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��ʾ����̨��</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['screen']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['screen_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >4</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��  �꣨����</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['mouse']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['mouse_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >5</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��  �̣�����</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['keyboard']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['keyboard_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >6</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��Դ�ߣ�����</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_wire']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_wire_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >7</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��Դ������������</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_adapt']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_adapt_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >8</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >�����ߣ�����</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['data_wire']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['data_wire_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >9</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��  �̣��ţ�</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['cdrom']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['cdrom_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >10</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >˵���飨����</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['workbook']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['workbook_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >11</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��װ�䣨����</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['pack']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['pack_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >12</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >��������</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['another']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['another_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" >13</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"460px\"colspan='3' >&nbsp;</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" >14</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"460px\"colspan='3' >&nbsp;</td></tr>";
					
										
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">������ʽ"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp; <input type='checkbox'>��ݣ�&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox'>�����ˣ�".$row['give_person']."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;������/���ڣ�".$row['get_person']."/&nbsp;&nbsp;".$row['recv_date']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��Ʒȡ�߳���"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp; <input type='checkbox'>��ݣ�&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;<input type='checkbox'>ȡ���ˣ�".$row['take_person']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;������/���ڣ�".$row['leave_brokerage']."/&nbsp;&nbsp;".$row['leave_date']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">��ע"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['sample_ps']."</td></tr>";
			
					/*$ary_test_obj=array();
					$ary_meta=array();
					$sql="select subject_id,subject_name,subject_name2,ispublish from subject where parents='$subject_id' order by subject_id";
					$ary_test_obj=get_result_ary($sql);
					$i=1;
					
					echo "<tr>";
					foreach($ary_test_obj as $key => $result){
					$subject_cid=$result['subject_id'];//Ԫ����ID
					$subject_name=$result['subject_name'];//Ԫ������������
					$subject_name2=$result['subject_name2'];//Ԫ����Ӣ������
					$one_row=$result['ispublish'];//�Ƿ�ռһ��
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
							$attr_cont .="&nbsp;&nbsp;&nbsp;$meta_name</br>";
							}
							if($one_row=='no'){
							echo "<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">$subject_name"."</td>
						<td height=\"25\" class=\"left_txt4\" width=\"160px\">$attr_cont</td>";
							}else if($one_row=='yes'){
							echo "<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\" >$subject_name"."</td>
						<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>$attr_cont</td>";
							}
						
						
					}else{
						
						if(strstr($sub_name2_val,";")){
							$ary=explode(";",$sub_name2_val);
							$sub_name2_val="";
							foreach($ary as $res){
								$sub_name2_val=$sub_name2_val.$res."</br>&nbsp;&nbsp;&nbsp;";
								
							}
						}
					
					
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
						if($one_row=='no'){
							echo "<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">$subject_name"."</td>
						<td height=\"25\" class=\"left_txt4\" width=\"160px\">&nbsp;&nbsp;&nbsp;$sub_name2_val</td>";
						}else if($one_row=='yes'){
							echo "<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">$subject_name"."</td>
						<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3' >&nbsp;&nbsp;&nbsp;$sub_name2_val</td>";
						}
					}
					
						if( $i%2==0 and $one_row=='no'){
						echo "</tr><tr>";//һ����ʾ����
						
						}else if($one_row=='yes'){
							echo "</tr><tr>";
						}
						
						$i++;
					
				}
					echo "</tr>";*/
										
										
			?>             

		
</table>

<table border="0" width='600px' cols='4' style="font-size:13px;" cellpadding="0" cellspacing="0" >
<caption><b>ע �� �� ��</b></caption>
</br>
<tr><td>
1.�ͼ�ļ�����Ʒ�ڼ����ڼ����������ġ�</br>
2.������Ŀȫ����ɺ��ҵ�λ������λ���շ�֪ͨ��������λ���յ��շ�֪ͨ��֮����3�����ڽ����ѣ�
ƾ����Ʒ��Ϣ����ȡ���Ǽǵ�������������ȡ��Ʒ����3������û���ѣ��Ե�4��������ȡ������Ʒ���ܷѣ�
ÿ�հ�����ѵ�20%��ȡ���Ե�5������ÿ�հ�����ѵ�40%��ȡ���ܷѣ�����6���²����Ѳ�ȡ��Ʒ���������촦��</br>
3.ƾ�˵���ȡ��Ʒ�������Ʊ��档
</td>

</table>
</div>

<!--<div align='center'>
	<input type="button" name="button" id="button"  onclick="window.print()"  value="�� ӡ" />
</div>-->
</br>
</br>
<div align='center'>
<DIV id="dayinDiv" name="dayinDiv" class="style8">
<input type="button" class="tab" value="  ��ӡ  " onclick="printTure();">&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input type="button" class="tab" value="��ӡԤ��" onclick="printpreview();">&nbsp;&nbsp;&nbsp;&nbsp;-->
<input type="button" class="tab" value="ҳ������" onclick="printsetup();">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" class="tab" value="  ����  " onclick="turnback();">
<input type="hidden" name="qingkongyema" id="qingkongyema" class="tab" value="���ҳ��" onclick="pagesetup_null()">&nbsp;&nbsp;&nbsp;&nbsp;
<br>
<br>
<strong><span class="style12">���״δ�ӡǰ���Ƚ���ҳ�����ã�</span><span class="style11"><!--ֽ�Ŵ�С:B4 (JIS)����߾�:24mm���ұ߾�:31mm���ϱ߾�:8mm���±߾�:5mm-->
</span></strong>
<br>
<span class="style13">����㡰ҳ�����á������а�ť�������ˣ���������IE�İ�ȫ����̫�ߣ���������Ϊ��
</span>
<br>
<span class="style13">
����IE-->����-->Internetѡ��-->��ȫ-->�Զ��弶�𣺡���û�б��Ϊ��ȫ��ActiveX�ؼ����г�ʼ���ű����С�ѡ�����á���ȷ�Ϻ󷵻ؼ��ɣ�
</span>
</DIV>
</div>


