<?php
	session_start();
	header("Content-Type:text/html;charset=GB2312"); 
	include("../../admin/include/db_mysql.php");
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
	
	echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
			<tr>
				<td width=\"17\" height=\"29\" valign=\"top\" background=\"../images/mail_leftbg.gif\"><img src=\"../images/left-top-right.gif\" width=\"17\" height=\"29\" /></td>
				<td width=\"935\" height=\"29\" valign=\"top\" background=\"../images/content-bg.gif\">
					<table width=\"100%\" height=\"31\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"left_topbg\" id=\"table2\">
					</table></td>
				<td width=\"16\" valign=\"top\" background=\"../images/mail_rightbg.gif\"><img src=\"../images/nav-right-bg.gif\" width=\"16\" height=\"29\" /></td>
			</tr>
			<tr>
				<td height=\"71\" valign=\"middle\" background=\"../images/mail_leftbg.gif\">&nbsp;</td>
				<td valign=\"top\" bgcolor=\"#F7F8F9\">
					<table width=\"100%\" height=\"138\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td height=\"13\" valign=\"top\">&nbsp;</td>
						</tr>
						<tr>
							<td valign=\"top\">
								<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
									<tr>
										<td class=\"left_txt\">当前位置：检测业务查询》任务状态查询</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td height=\"20\">
								<table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#CCCCCC\">
								</table></td>
						</tr>
						<tr>
							<td>
								<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
									<!--<form name=\"form_sel_obj\" method=\"POST\" action=\"req_baseinfo.php\">-->";
	echo "<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
    		 <tr>
         		<td height=\"30\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
         		<tr>
         		<td height=\"24\" class=table_title ><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
         		<tr>
         		<td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
         		<tr>
         		<td height=\"19\" valign=\"\"><div align=\"center\"><img src=\"../images/tb.gif\" width=\"14\" height=\"14\" /></div></td>
         		<td valign=\"\">";
				if($str_class==1){
					echo "<input type='radio' id='search_type' name='search_type'  value='0' checked=\"checked\"><b>按条件</b>";
				}else{
					echo "<input type='radio' id='search_type' name='search_type'  value='0'><b>按样品名称</b>";
				}
				echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"condition1\" name=\"condition1\" size=\"15\" style=\"display:inline\";>
					&nbsp;&nbsp;";
                if($str_class!=2){
					echo "</br><input type='radio' id='search_type' name='search_type'  value='1'><b>按日期</b>";
				}else{
					echo "</br><input type='radio' id='search_type' name='search_type'  value='1' checked=\"checked\"><b>按日期</b>";
				}
				echo "&nbsp;&nbsp;起始：<input type=\"text\" id=\"start_date\" name=\"start_date\" value='".$date_start."' size='12' class=\"it date-pick\" >
					&nbsp;&nbsp;截止：<input  type=\"text\" id=\"end_date\" name=\"end_date\" value='".$date_end."' size='12' class=\"it date-pick\" >
					&nbsp;&nbsp;&nbsp;&nbsp; 
         		<input type=\"button\" id=\"que\" name=\"que\" onclick=\"condition_query()\" value=\"查询\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         		<input type=\"button\" id=\"disall\" name=\"disall\" onclick=\"init()\" value=\"显示全部\"></td>
         		</tr>
         		</table></td>
         		<td><div align=\"right\"><span class=\"table_title\">
         		<!-- <input type=\"checkbox\" name=\"checkbox11\" id=\"checkbox11\" />
         		全选      &nbsp;&nbsp;<img src=\"images/add.gif\" width=\"10\" height=\"10\" /> 添加   &nbsp; <img src=\"images/del.gif\" width=\"10\" height=\"10\" /> 删除    &nbsp;&nbsp;<img src=\"images/edit.gif\" width=\"10\" height=\"10\" /> 编辑   &nbsp;</span><span class=\"table_title\"> &nbsp;</span></div>--></td>
         		</tr>
         		</table></td>
         		</tr>
         		</table></td>
         	</tr>";

	$pagesize=15; 
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
	 			<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">序号</span></div></td>
			<!--<td style=\"width:100px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">委托书号</span></div></td>-->
				<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">样品名称</span></div></td>
			<!--<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">样品类型</span></div></td>-->
				<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">申请日期</span></div></td>
				<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">受理状态</span></div></td>
	 	 		<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">备注</span></div></td>
	 	 		<td style=\"width:280px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">操作</span></div></td>
	 	 		</tr>";
	if($str_class==0){
		$result=mysql_query("select bms_task_reg.id,bms_task_reg.sample_id,bms_task_reg.req_id,bms_task_reg.req_date,bms_task_reg.req_table,bms_task_reg.deal,bms_sample.sample_name,bms_task_reg.fee,bms_task_reg.cycle
		from bms_task_reg,bms_sample where bms_task_reg.uid='$str_cusid' and bms_task_reg.sample_id=bms_sample.id order by req_date desc,req_time desc limit $offset,$pagesize");
	}else if($str_class==1){
		$result=mysql_query("select bms_task_reg.id,bms_task_reg.sample_id,bms_task_reg.req_id,bms_task_reg.req_date,bms_task_reg.req_table,bms_task_reg.deal,bms_sample.sample_name,bms_task_reg.fee,bms_task_reg.cycle
		from bms_sample,bms_task_reg where bms_sample.id=bms_task_reg.sample_id and bms_sample.sample_name like '%".$str_condition."%' and uid='$str_cusid' order by req_date desc,req_time desc limit $offset,$pagesize");  
	}else if($str_class==2){
		$result=mysql_query("select bms_task_reg.id,bms_task_reg.sample_id,bms_task_reg.req_id,bms_task_reg.req_date,bms_task_reg.req_table,bms_task_reg.deal,bms_sample.sample_name,bms_task_reg.fee,bms_task_reg.cycle
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
				$str_deal="接受";
				$int_fee=$row[7];
				$int_time=$row[8];
			}else{
				$str_deal="拒绝";
			}
			$str_ps=$row['ps'];
			if($str_ps==""){
				$str_ps="无";
			}
			
			echo "<td class=\"td_inner\"><div align=\"center\">".$id."</div></td>";
//			echo "<td class=\"td_inner\"><div align=\"center\">".$str_reqcode."</div></td>";
			echo "<td class=\"td_inner\"><div align=\"center\">".$str_samplename."</div></td>";
//			echo "<td class=\"td_inner\"><div align=\"center\">".$str_sampletype."</div></td>";
			echo "<td class=\"td_inner\"><div align=\"center\">".$date_reqdate."</div></td>";//"\n".$time_reqtime.
			echo "<td class=\"td_inner\"><div align=\"center\">".$str_deal."</div></td>";
			if($int_deal==1){
				echo "<td class=\"td_inner\"><div align=\"center\">".$int_fee."元,".$int_time."天</div></td>";
			}else{
				echo "<td class=\"td_inner\"><div align=\"center\">".$str_ps."</div></td>";
			}
			echo "<td class=\"td_inner\" align=\"center\"><div align=\"center\" ><a href='javascript:;' onclick=jump('apply_detail.php?req_id=$str_req_id&sample_id=$str_sampleid&req_table=$str_req_table&uid=$str_cusid','$str_deal','0');><img src=\"../images/cmdView.jpg\" align=\"center\" class=\"op_img\" /></a>查看 &nbsp;<a href='javascript:;' onclick=jump('apply_modify.php?req_id=$str_req_id&req_table=$str_req_table&uid=$str_cusid&sample_name=$str_samplename','$str_deal','1');><img src=\"../images/cmdEdit.jpg\" align=\"center\" class=\"op_img\"/></a>修改委托书 &nbsp;<a href='javascript:;' onclick=jump('sample_modify.php?sample_id=$str_sampleid','$str_deal','1');><img src=\"../images/cmdEdit.jpg\" align=\"center\" class=\"op_img\"/></a>修改样品 &nbsp;<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除样品【".$str_samplename."】的检测申请吗？')){del_info('".$str_id."','".$str_samplename."','$str_deal');}\"><img src=\"../images/cmdDel.jpg\" align=\"center\" class=\"op_img\" /></a>删除 </div></td>";
			echo "</tr>";
			$id++;
		}
	echo "</table></td></tr></table>"; 
	echo "<TABLE style=\"MARGIN-TOP: 0px\" cellSpacing=0 cellPadding=0 width=\"100%\""; 
	echo "border=0>"; 
	echo "<TBODY><TR><TD colSpan=3 height=10>"; 
	echo "<DIV align=center style=\"font-size:12px;\">"; 
	echo "<P align=left><FONT color=red>第".$page."页/总".$pages."页 | 总".$numrows."条</FONT> | "; 
	if($str_class==4){
		$str_condition=$date_start.",".$date_end;
	}
	$formData=$str_class.",".$str_condition;
	if ($page>1) echo "<a onclick=\"viewpage('".$first.",".$formData."')\" href='#'>首页</a> | "; 
	if ($page>1) echo "<a onclick=\"viewpage('".$prev.",".$formData."')\" href='#'>上页</a> | "; 
	if ($page<$pages) echo "<a onclick=\"viewpage('".$next.",".$formData."')\" href='#'>下页</a> | "; 
	if ($page<$pages) echo "<a onclick=\"viewpage('".$last.",".$formData."')\" href='#'>尾页</a>";
	echo "转到第 <INPUT maxLength=3 size=3 value=1 name=goto_page> 页 <INPUT hideFocus onclick=\"viewpage(document.all.goto_page.value)\" type=button value=Go name=cmd_goto>"; 
	echo "</P></DIV></TD></TR></TBODY></TABLE>";
	echo "</table></td></tr></table>";
?>
