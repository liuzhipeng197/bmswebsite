<?php
        session_start();
		include_once("../../admin/include/function.php");
        iframe_head2();
?>
<SCRIPT language=javascript>
function printsetup()//页面设置函数
{  
document.all("qingkongyema").click();//打印之前去掉页眉，页脚
document.all("dayinDiv").style.display="none";//打印之前先隐藏不想打印输出的元素（此例中隐藏“打印”和“打印预览”两个按钮）
wb.execwb(8,1);   
document.all("dayinDiv").style.display="";//打印之后将该元素显示出来（显示出“打印”和“打印预览”两个按钮，方便别人下次打印）
}   
function printpreview()//预览函数
{
document.all("qingkongyema").click();
document.all("dayinDiv").style.display="none";   　   
wb.execwb(7,1);
document.all("dayinDiv").style.display="";
}
function printTure() //打印函数
{
 document.all('qingkongyema').click();//同上
 document.all("dayinDiv").style.display="none";//同上
 window.print();
 document.all("dayinDiv").style.display="";
}
function doPage()
{
 layLoading.style.display = "none";//同上
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
'//设置网页打印的页眉页脚为空
function pagesetup_null()
on error resume next
Set RegWsh = CreateObject("WScript.Shell")
hkey_key="\header"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,""
hkey_key="\footer"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,""
end function
'//设置网页打印的页眉页脚为默认值
function pagesetup_default()
on error resume next
Set RegWsh = CreateObject("WScript.Shell")
hkey_key="\header"
RegWsh.RegWrite hkey_root+hkey_path+hkey_key,"&w&b页码，&p/&P"
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
	$com_name=get_result_first($sql2);//公司名称
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
　<caption style='font-size:16px;font-weight:bold'>样 品 信 息 及 接 取 样 登 记 单</br>
</br>No.</caption>
<?php
					//样品信息表bms_sample字段						
					/*uid:uid,sample_name:sample_name,speci:speci,chip_speci:chip_speci,cos_v:cos_v,ym:ym,tk:tk,
			host:host,host_ps:host_ps,ic:ic,ic_ps:ic_ps,screen:screen,screen_ps:screen_ps,mouse:mouse,mouse_ps:mouse_ps,keyboard:keyboard,
			keyboard_ps:keyboard_ps,power_wire:power_wire,power_wire_ps:power_wire_ps,power_adapt:power_adapt,
			power_adapt_ps:power_adapt_ps,data_wire:data_wire,data_wire_ps:data_wire_ps,cdrom:cdrom,cdrom_ps:cdrom_ps,workbook:workbook,workbook_ps:workbook_ps,pack:pack,pack_ps:pack_ps,
			another:another,another_ps:another_ps*/
		
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">委托单位"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;$com_name</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">样品名称"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['sample_name']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">型号规格"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['speci']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">芯片型号"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['chip_speci']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">COS版本"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['cos_v']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">掩膜方式"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['ym']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">商标"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['tk']."</td></tr>";
					
					echo "<tr><th height=\"25\" align=\"center\" class=\"left_txt4\" colspan='4' width='600px' style=\"font-weight:bold;\">初 始 状 态 检 查"."</th></tr>";
					
					/*echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">包装箱状态"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;是否完好&nbsp;&nbsp;&nbsp; <input type='checkbox'>无&nbsp;&nbsp;&nbsp;
					<input type='checkbox'>有</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">样品外观结构状态"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;是否完好&nbsp;&nbsp;&nbsp; <input type='checkbox'>无&nbsp;&nbsp;&nbsp;
					<input type='checkbox'>有</td></tr>";*/
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">包装箱状态"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['pack_status']."</td></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">样品外观结构状态"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['surf_status']."</td></tr>";
					
					
					echo "<tr><th height=\"25\" align=\"center\" class=\"left_txt4\" colspan='4' width='600px' style=\"font-weight:bold;\">样 品 基 本 信 息"."</th></tr>";
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" style=\"font-weight:bold;\">序  号</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" ><b>名  称</b></td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" ><b>数  量</b></td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" ><b>备  注</b></td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >1</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >主  机（台）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['host']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['host_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >2</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >IC卡（张）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['ic']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['ic_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >3</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >显示器（台）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['screen']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['screen_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >4</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >鼠  标（个）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['mouse']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['mouse_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >5</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >键  盘（个）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['keyboard']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['keyboard_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >6</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >电源线（根）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_wire']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_wire_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >7</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >电源适配器（个）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_adapt']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['power_adapt_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >8</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >数据线（根）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['data_wire']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['data_wire_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >9</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >光  盘（张）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['cdrom']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['cdrom_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >10</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >说明书（本）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['workbook']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['workbook_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >11</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >包装箱（个）</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['pack']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['pack_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"30px\" >12</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >其他附件</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['another']."</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"190px\" >".$row['another_ps']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" >13</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"460px\"colspan='3' >&nbsp;</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" >14</td>
					<td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"460px\"colspan='3' >&nbsp;</td></tr>";
					
										
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">到样方式"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp; <input type='checkbox'>快递：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='checkbox'>送样人：".$row['give_person']."  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;经手人/日期：".$row['get_person']."/&nbsp;&nbsp;".$row['recv_date']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">样品取走出库"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp; <input type='checkbox'>快递：&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;<input type='checkbox'>取件人：".$row['take_person']." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;经手人/日期：".$row['leave_brokerage']."/&nbsp;&nbsp;".$row['leave_date']."</td></tr>";
					
					echo "<tr><td height=\"25\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">备注"."</td>
					<td height=\"25\" class=\"left_txt4\" width=\"460px\" colspan='3'>&nbsp;&nbsp;".$row['sample_ps']."</td></tr>";
			
					/*$ary_test_obj=array();
					$ary_meta=array();
					$sql="select subject_id,subject_name,subject_name2,ispublish from subject where parents='$subject_id' order by subject_id";
					$ary_test_obj=get_result_ary($sql);
					$i=1;
					
					echo "<tr>";
					foreach($ary_test_obj as $key => $result){
					$subject_cid=$result['subject_id'];//元数据ID
					$subject_name=$result['subject_name'];//元数据中文名称
					$subject_name2=$result['subject_name2'];//元数据英文名称
					$one_row=$result['ispublish'];//是否占一行
					$sql4="select $subject_name2 from $req_table  where id='$req_id'";
					//echo '$sql4='.$sql4;
					$sub_name2_val=get_result_first($sql4);
					
					if($sub_name2_val==''){
						//$sub_name2_val="无";
						//则说明是一般性说明内容
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
						echo "</tr><tr>";//一行显示两列
						
						}else if($one_row=='yes'){
							echo "</tr><tr>";
						}
						
						$i++;
					
				}
					echo "</tr>";*/
										
										
			?>             

		
</table>

<table border="0" width='600px' cols='4' style="font-size:13px;" cellpadding="0" cellspacing="0" >
<caption><b>注 意 事 项</b></caption>
</br>
<tr><td>
1.送检的检验样品在检验期间留存我中心。</br>
2.检验项目全部完成后，我单位给您单位发收费通知单，您单位自收到收费通知单之日起3个月内交检测费，
凭《样品信息及接取样登记单》到我中心领取样品。若3个月内没交费，自第4个月起收取留存样品保管费，
每日按检验费的20%收取，自第5个月起每日按检验费的40%收取保管费，超过6个月不交费不取样品按无人认领处理。</br>
3.凭此单提取样品，请妥善保存。
</td>

</table>
</div>

<!--<div align='center'>
	<input type="button" name="button" id="button"  onclick="window.print()"  value="打 印" />
</div>-->
</br>
</br>
<div align='center'>
<DIV id="dayinDiv" name="dayinDiv" class="style8">
<input type="button" class="tab" value="  打印  " onclick="printTure();">&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input type="button" class="tab" value="打印预览" onclick="printpreview();">&nbsp;&nbsp;&nbsp;&nbsp;-->
<input type="button" class="tab" value="页面设置" onclick="printsetup();">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" class="tab" value="  返回  " onclick="turnback();">
<input type="hidden" name="qingkongyema" id="qingkongyema" class="tab" value="清空页码" onclick="pagesetup_null()">&nbsp;&nbsp;&nbsp;&nbsp;
<br>
<br>
<strong><span class="style12">在首次打印前请先进行页面设置：</span><span class="style11"><!--纸张大小:B4 (JIS)　左边距:24mm　右边距:31mm　上边距:8mm　下边距:5mm-->
</span></strong>
<br>
<span class="style13">如果点“页面设置”后所有按钮均不见了，这是由于IE的安全设置太高，觖决方法为：
</span>
<br>
<span class="style13">
进入IE-->工具-->Internet选项-->安全-->自定义级别：“对没有标记为安全的ActiveX控件进行初始化脚本运行”选择“启用”，确认后返回即可！
</span>
</DIV>
</div>


