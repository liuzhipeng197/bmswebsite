<?php
	session_start();
	header("Content-Type:text/html;charset=GB2312"); 
	include("../../admin/include/db_mysql.php");
	include("./include/function.php");
	$str_cusid=$_SESSION['cus_id'];
	if (isset($_POST['fdata'])){ 
		$str_data=($_POST['fdata']); 
	}
	$str_dataarry=explode(',',$str_data);
	$page=intval($str_dataarry[0]);
	$str_class=intval($str_dataarry[1]);			//0代表初始，1代表按样品名称，2代表按时间查询
	if($str_class==2){
		$date_start=$str_dataarry[2];
		$date_end=$str_dataarry[3];
		//echo $page.$str_class.$date_start.$date_end;
	}else{
		$str_condition=$str_dataarry[2];
		$str_condition = iconv( "UTF-8" , "GB2312" , $str_condition);
		//echo $page.$str_class.$str_condition;
	}
	echo "<div class='query_container'>
		<div class=\"query_form\">
			<div class='row' align='left'>";	
				if($str_class==1){
					echo "&nbsp;&nbsp;<input type='radio'  id='search_type' name='search_type'  value='0' checked=\"checked\">&nbsp;&nbsp;<b>按条件</b>";
				}else{
					echo "&nbsp;&nbsp;<input type='radio'  id='search_type' name='search_type'  value='0'>&nbsp;&nbsp;<b class='text_css'>按样品名称</b>";
				}
				echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"condition1\" name=\"condition1\" size=\"15\" style=\"display:inline\";>
					&nbsp;&nbsp;
			</div>
			<div class='row' align='left'>";
			
                		if($str_class!=2){
					echo "</br>&nbsp;&nbsp;<input type='radio' id='search_type' name='search_type'  value='1'>&nbsp;&nbsp;<b class='text_css'>按日期</b>";
				}else{
					echo "</br>&nbsp;&nbsp;<input type='radio' id='search_type' name='search_type'  value='1' checked=\"checked\">&nbsp;&nbsp;<b>按日期</b>";
				}
				echo "&nbsp;&nbsp;起始&nbsp;&nbsp;<input type=\"text\" id=\"start_date\" name=\"start_date\" value='".$date_start."' size='12' class=\"it date-pick\" >
					&nbsp;&nbsp;截止&nbsp;&nbsp;<input  type=\"text\" id=\"end_date\" name=\"end_date\" value='".$date_end."' size='12' class=\"it date-pick\" >
					&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<div class='row' align='center' style='margin-bottom:15px'>
         			<input type=\"button\" class='edit_buttom' id=\"que\" name=\"que\" onclick=\"condition_query()\" value=\"查询\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         			<input type=\"button\" class='edit_buttom' id=\"disall\" name=\"disall\" onclick=\"init()\" value=\"显示全部\">
         		</div>
		</div>";

	$pagesize=10; 
	//echo $_POST['page']; 
	if($str_class==0){
		$result = mysql_query("Select count(DISTINCT bms_task_reg.id) FROM bms_task_reg,bms_sample where bms_task_reg.uid='$str_cusid' and bms_task_reg.sample_id=bms_sample.id");  
	}else if($str_class==1){
		$result = mysql_query("select count(DISTINCT bms_task_reg.id) from bms_sample,bms_task_reg where bms_sample.id=bms_task_reg.sample_id and bms_sample.sample_name like '%".$str_condition."%' and uid='$str_cusid'"); 
	}else if($str_class==2){
		$result = mysql_query("Select count(DISTINCT bms_task_reg.id) FROM bms_task_reg,bms_sample where bms_task_reg.req_date>='$date_start' and bms_task_reg.req_date<='$date_end' and bms_task_reg.uid='$str_cusid' and bms_task_reg.sample_id=bms_sample.id"); 
	}
	
	$myrow = mysql_fetch_array($result); 
	$numrows=$myrow[0]; 
	if(intval($numrows)==0){
		echo "<td>抱歉，没有您的申请业务。</td>";
		exit;
	}
	$pages=intval($numrows/$pagesize); 
	if ($numrows%$pagesize) 
	$pages++; 
	$first=1; 
	$prev=$page-1; 
	$next=$page+1; 
	$last=$pages; 
	//计算记录偏移量 
	$offset=$pagesize*($page - 1); 
	//读取指定记录数 
	
	 	echo "<tr>
				<td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" class=\"td_bg\"> 
	 			<td style=\"width:30px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">序号</span></div></td>
			<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">委托书号</span></div></td>
				<td style=\"width:120px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">样品名称</span></div></td>
			<!--<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">样品类型</span></div></td>-->
				<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">申请日期</span></div></td>
				<td style=\"width:70px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">受理状态</span></div></td>
	 	 		<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">检测费用(元)</span></div></td>
				<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">检测周期(天)</span></div></td>
	 	 		<td style=\"width:220px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">操作</span></div></td>
	 	 		</tr>";
	if($str_class==0){
		$result=mysql_query("select bms_task_reg.id,bms_task_reg.sample_id,bms_task_reg.req_id,bms_task_reg.req_date,bms_task_reg.req_table,bms_task_reg.deal,bms_sample.sample_name,bms_task_reg.fee,bms_task_reg.cycle,req_code
		from bms_task_reg,bms_sample where bms_task_reg.uid='$str_cusid' and bms_task_reg.sample_id=bms_sample.id order by req_date desc,req_time desc limit $offset,$pagesize");
	}else if($str_class==1){
		$result=mysql_query("select bms_task_reg.id,bms_task_reg.sample_id,bms_task_reg.req_id,bms_task_reg.req_date,bms_task_reg.req_table,bms_task_reg.deal,bms_sample.sample_name,bms_task_reg.fee,bms_task_reg.cycle,req_code
		from bms_sample,bms_task_reg where bms_sample.id=bms_task_reg.sample_id and bms_sample.sample_name like '%".$str_condition."%' and uid='$str_cusid' order by req_date desc,req_time desc limit $offset,$pagesize");  
	}else if($str_class==2){
		$result=mysql_query("select bms_task_reg.id,bms_task_reg.sample_id,bms_task_reg.req_id,bms_task_reg.req_date,bms_task_reg.req_table,bms_task_reg.deal,bms_sample.sample_name,bms_task_reg.fee,bms_task_reg.cycle,req_code
		from bms_task_reg,bms_sample where bms_task_reg.req_date>='$date_start' and bms_task_reg.req_date<='$date_end' and bms_task_reg.uid='$str_cusid' and bms_task_reg.sample_id=bms_sample.id order by req_date desc,req_time desc limit $offset,$pagesize");
	}
	 
		$id=1;
		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
			$str_id=$row[0];
    		$str_sampleid=$row[1];
			$str_req_id=$row[2];
			$date_reqdate=$row[3];
			$str_req_table=$row[4];
			$int_deal=$row[5];
			$str_samplename=$row[6];
			if($int_deal==0){
				$str_deal="未处理";
			}elseif($int_deal==1){
				$str_deal="已受理";
				$int_fee=$row[7];
				$int_time=$row[8];
			}else{
				$str_deal="已拒绝";
			}
			$str_ps=$row['ps'];
			if($str_ps==""){
				$str_ps="无";
			}
			$req_code=$row[9];
			if($req_code==''){
				$req_code="--";
			}
			$str_samplename=cut_title($str_samplename,24);	
			echo "<td style=\"width:30px;\" class=\"td_query_inner\"><div align=\"center\">".$id."</div></td>";
			echo "<td  style=\"width:80px;\" class=\"td_query_inner\"><div align=\"center\">".$req_code."</div></td>";
			echo "<td style=\"width:120px;\" class=\"td_query_inner\"><div align=\"center\">".$str_samplename."</div></td>";
//			echo "<td class=\"td_inner\"><div align=\"center\">".$str_sampletype."</div></td>";
			echo "<td style=\"width:80px;\" class=\"td_query_inner\"><div align=\"center\">".$date_reqdate."</div></td>";//"\n".$time_reqtime.
			echo "<td style=\"width:70px;\" class=\"td_query_inner\"><div align=\"center\">".$str_deal."</div></td>";
			
			/*if($int_deal==1){ //显示预计时间和费用
				//echo "<td class=\"td_inner\"><div align=\"center\">".$int_fee."元,".$int_time."天</div></td>";
				echo "<td style=\"width:80px;\" class=\"td_inner\"><div align=\"center\">".$int_fee."</div></td>";
				echo "<td style=\"width:80px;\" class=\"td_inner\"><div align=\"center\">".$int_time."</div></td>";
			}else{
				//echo "<td class=\"td_inner\"><div align=\"center\">".$str_ps."</div></td>";
				echo "<td style=\"width:80px;\" class=\"td_inner\"><div align=\"center\">"."--"."</div></td>";
				echo "<td style=\"width:80px;\" class=\"td_inner\"><div align=\"center\">"."--"."</div></td>";
			}*/
			if($int_fee==''){
				$int_fee=0;
				}
			if($int_time==''){$int_time=0;}
			  echo "<td style=\"width:80px;\" class=\"td_query_inner\"><div align=\"center\">".$int_fee."</div></td>";
                                echo "<td style=\"width:80px;\" class=\"td_query_inner\"><div align=\"center\">".$int_time."</div></td>";

			echo "<td style=\"width:220px;\" class=\"td_query_inner\" align='center'><div id='op' align=\"center\" > <table  width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td maring-left:2px;>&nbsp;&nbsp;<a href='javascript:;' onclick=jump('apply_detail.php?req_id=$str_req_id&sample_id=$str_sampleid&req_table=$str_req_table&uid=$str_cusid','$str_deal','0');>查看</a></td><td><a href='javascript:;' onclick=jump('apply_modify.php?req_id=$str_req_id&req_table=$str_req_table&uid=$str_cusid&sample_name=$str_samplename','$str_deal','1');>修改委托书</a></td> <td><a href='javascript:;' onclick=jump('sample_modify.php?sample_id=$str_sampleid','$str_deal','1');>修改样品</a></td> <td><a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除样品【".$str_samplename."】的检测申请吗？')){del_info('".$str_id."','".$str_samplename."','$str_deal');}\">删除</a></td></tr></table></div> </td>";
			echo "</tr>";
			$id++;
		}
	echo "</table></td></tr></table>";
		
	echo "<div align='center' id='op' style=\"font-size:12px;padding-top:5px\">"; 
	echo "<p align=left class='page_css'>第".$page."页/总".$pages."页 | 总".$numrows."条 | "; 
	if($str_class==4){
		$str_condition=$date_start.",".$date_end;
	}
	$formData=$str_class.",".$str_condition;
	if ($page>1) echo "<a  onclick=\"viewpage('".$first.",".$formData."')\" href='#'>首页</a> | "; 
	if ($page>1) echo "<a onclick=\"viewpage('".$prev.",".$formData."')\" href='#'>上页</a> | "; 
	if ($page<$pages) echo "<a onclick=\"viewpage('".$next.",".$formData."')\" href='#'>下页</a> | "; 
	if ($page<$pages) echo "<a  onclick=\"viewpage('".$last.",".$formData."')\" href='#'>尾页</a>";
	echo "&nbsp;&nbsp;转到第 <input  name=goto_page  style='vertical-align:middle;width:50px;height:20px;padding:0px 0px 0px 0px'> 页 <input hideFocus onclick=\"viewpage(document.all.goto_page.value)\" type='button' class='zhuanzhi_buttom'  value='转' name=cmd_goto>"; 
	echo "</p></div>";
	echo "</table></td></tr></table>";
	echo "</div>";
?>
