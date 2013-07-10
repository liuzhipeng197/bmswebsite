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
	$req_id=trim($_GET['req_id']);
	$sample_id=trim($_GET['sample_id']);
	$req_table=trim($_GET['req_table']);
	$uid=trim($_GET['uid']);
	$sql="select req_code from bms_task_reg where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
	$req_code=get_result_first($sql);//委托书号
	$sql="select distinct subject_id,subject_name from subject where subject_name2='$req_table'";
	//$subject_id=get_result_first($sql);
	//echo '$req_id='.$req_id;
	//$sql="select deal,ps from bms_task_reg where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$subject_id=$row[0];
	$subject_name=$row[1];
	
	 
	 //echo "$req_id  $sample_id  $req_table $uid  $subject_id ";
	
?>
<div align="center">
<table border="1" width='600px' cols='4' style="font-size:13px;" cellpadding="0" cellspacing="0" >
　<caption style='font-size:16px;font-weight:bold'>国家电子计算机质量监督检验中心</br>&nbsp;&nbsp;&nbsp;&nbsp;国家电子标签产品质量监督检验中心</br>北 京 尊 冠 科 技 有 限 公 司</br>
</br><?php echo $subject_name?>委托检验书&nbsp;&nbsp;(&nbsp;No.<?php echo $req_code?>&nbsp;)</caption>
<?php
											
					
					$ary_test_obj=array();
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
					
					if($sub_name2_val=='' && $subject_name=='说明'){
						//$sub_name2_val="无";
						//则说明是一般性说明内容
						$sql3="select meta_name from metadata_subjects where subject_id='$subject_cid'";
						$result3=mysql_query($sql3,$conn);
						   while($row=@mysql_fetch_array($result3)) {
							$meta_name=$row['meta_name'];
							$attr_cont .="&nbsp;&nbsp;&nbsp;$meta_name</br>";
							}
							if($one_row=='no'){
							echo "<td height=\"30\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">$subject_name"."</td>
						<td height=\"30\" class=\"left_txt4\" width=\"160px\">$attr_cont</td>";
							}else if($one_row=='yes'){
							echo "<td height=\"30\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\" >$subject_name"."</td>
						<td height=\"30\" class=\"left_txt4\" width=\"460px\" colspan='3'>$attr_cont</td>";
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
							echo "<td height=\"30\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">$subject_name"."</td>
						<td height=\"30\" class=\"left_txt4\" width=\"160px\">&nbsp;&nbsp;&nbsp;$sub_name2_val</td>";
						}else if($one_row=='yes'){
							echo "<td height=\"30\" align=\"center\" class=\"left_txt4\" width=\"140px\" style=\"font-weight:bold;\">$subject_name"."</td>
						<td height=\"30\" class=\"left_txt4\" width=\"460px\" colspan='3' >&nbsp;&nbsp;&nbsp;$sub_name2_val</td>";
						}
					}
					
						if( $i%2==0 and $one_row=='no'){
						echo "</tr><tr>";//一行显示两列
						
						}else if($one_row=='yes'){
							echo "</tr><tr>";
						}
						
						$i++;
					
				}
					echo "</tr>";
										
										
			?>             

		
</table>
<table border="0" width='600px' cols='4' style="font-size:13px;" cellpadding="0" cellspacing="0" >
<tr>
			<td height="30" align="center" class="left_txt4" width="140px" style="font-weight:bold;">委托人及日期</td>
			<td height="30" class="left_txt4" width="160px"></td>　
			<td height="30" align="center" class="left_txt4" width="140px" style="font-weight:bold;">接收人及日期</td>
			<td height="30" class="left_txt4" width="160px"></td>　
</tr>
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
<!--<input type="button" class="tab" value="  返回  " onclick="turnback();">-->
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


