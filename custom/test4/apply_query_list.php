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
	$str_class=intval($str_dataarry[1]);			//0�����ʼ��1������Ʒ���ƣ�2����ʱ���ѯ
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
					echo "&nbsp;&nbsp;<input type='radio'  id='search_type' name='search_type'  value='0' checked=\"checked\">&nbsp;&nbsp;<b>������</b>";
				}else{
					echo "&nbsp;&nbsp;<input type='radio'  id='search_type' name='search_type'  value='0'>&nbsp;&nbsp;<b class='text_css'>����Ʒ����</b>";
				}
				echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" id=\"condition1\" name=\"condition1\" size=\"15\" style=\"display:inline\";>
					&nbsp;&nbsp;
			</div>
			<div class='row' align='left'>";
			
                		if($str_class!=2){
					echo "</br>&nbsp;&nbsp;<input type='radio' id='search_type' name='search_type'  value='1'>&nbsp;&nbsp;<b class='text_css'>������</b>";
				}else{
					echo "</br>&nbsp;&nbsp;<input type='radio' id='search_type' name='search_type'  value='1' checked=\"checked\">&nbsp;&nbsp;<b>������</b>";
				}
				echo "&nbsp;&nbsp;��ʼ&nbsp;&nbsp;<input type=\"text\" id=\"start_date\" name=\"start_date\" value='".$date_start."' size='12' class=\"it date-pick\" >
					&nbsp;&nbsp;��ֹ&nbsp;&nbsp;<input  type=\"text\" id=\"end_date\" name=\"end_date\" value='".$date_end."' size='12' class=\"it date-pick\" >
					&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<div class='row' align='center' style='margin-bottom:15px'>
         			<input type=\"button\" class='edit_buttom' id=\"que\" name=\"que\" onclick=\"condition_query()\" value=\"��ѯ\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         			<input type=\"button\" class='edit_buttom' id=\"disall\" name=\"disall\" onclick=\"init()\" value=\"��ʾȫ��\">
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
		echo "<td>��Ǹ��û����������ҵ��</td>";
		exit;
	}
	$pages=intval($numrows/$pagesize); 
	if ($numrows%$pagesize) 
	$pages++; 
	$first=1; 
	$prev=$page-1; 
	$next=$page+1; 
	$last=$pages; 
	//�����¼ƫ���� 
	$offset=$pagesize*($page - 1); 
	//��ȡָ����¼�� 
	
	 	echo "<tr>
				<td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" class=\"td_bg\"> 
	 			<td style=\"width:30px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">���</span></div></td>
			<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">ί�����</span></div></td>
				<td style=\"width:120px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">��Ʒ����</span></div></td>
			<!--<td height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">��Ʒ����</span></div></td>-->
				<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">��������</span></div></td>
				<td style=\"width:70px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">����״̬</span></div></td>
	 	 		<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">������(Ԫ)</span></div></td>
				<td style=\"width:80px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">�������(��)</span></div></td>
	 	 		<td style=\"width:220px;\" height=\"20\" class=\"td_head\"><div align=\"center\"><span class=\"td_head2\">����</span></div></td>
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
				$str_deal="δ����";
			}elseif($int_deal==1){
				$str_deal="������";
				$int_fee=$row[7];
				$int_time=$row[8];
			}else{
				$str_deal="�Ѿܾ�";
			}
			$str_ps=$row['ps'];
			if($str_ps==""){
				$str_ps="��";
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
			
			/*if($int_deal==1){ //��ʾԤ��ʱ��ͷ���
				//echo "<td class=\"td_inner\"><div align=\"center\">".$int_fee."Ԫ,".$int_time."��</div></td>";
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

			echo "<td style=\"width:220px;\" class=\"td_query_inner\" align='center'><div id='op' align=\"center\" > <table  width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td maring-left:2px;>&nbsp;&nbsp;<a href='javascript:;' onclick=jump('apply_detail.php?req_id=$str_req_id&sample_id=$str_sampleid&req_table=$str_req_table&uid=$str_cusid','$str_deal','0');>�鿴</a></td><td><a href='javascript:;' onclick=jump('apply_modify.php?req_id=$str_req_id&req_table=$str_req_table&uid=$str_cusid&sample_name=$str_samplename','$str_deal','1');>�޸�ί����</a></td> <td><a href='javascript:;' onclick=jump('sample_modify.php?sample_id=$str_sampleid','$str_deal','1');>�޸���Ʒ</a></td> <td><a href='javascript:;' onclick=\"javascript:if(confirm('ȷ��Ҫɾ����Ʒ��".$str_samplename."���ļ��������')){del_info('".$str_id."','".$str_samplename."','$str_deal');}\">ɾ��</a></td></tr></table></div> </td>";
			echo "</tr>";
			$id++;
		}
	echo "</table></td></tr></table>";
		
	echo "<div align='center' id='op' style=\"font-size:12px;padding-top:5px\">"; 
	echo "<p align=left class='page_css'>��".$page."ҳ/��".$pages."ҳ | ��".$numrows."�� | "; 
	if($str_class==4){
		$str_condition=$date_start.",".$date_end;
	}
	$formData=$str_class.",".$str_condition;
	if ($page>1) echo "<a  onclick=\"viewpage('".$first.",".$formData."')\" href='#'>��ҳ</a> | "; 
	if ($page>1) echo "<a onclick=\"viewpage('".$prev.",".$formData."')\" href='#'>��ҳ</a> | "; 
	if ($page<$pages) echo "<a onclick=\"viewpage('".$next.",".$formData."')\" href='#'>��ҳ</a> | "; 
	if ($page<$pages) echo "<a  onclick=\"viewpage('".$last.",".$formData."')\" href='#'>βҳ</a>";
	echo "&nbsp;&nbsp;ת���� <input  name=goto_page  style='vertical-align:middle;width:50px;height:20px;padding:0px 0px 0px 0px'> ҳ <input hideFocus onclick=\"viewpage(document.all.goto_page.value)\" type='button' class='zhuanzhi_buttom'  value='ת' name=cmd_goto>"; 
	echo "</p></div>";
	echo "</table></td></tr></table>";
	echo "</div>";
?>
