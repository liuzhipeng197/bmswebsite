<?php
        session_start();
		include_once("../../admin/include/function.php");
        iframe_head2();
?>
<?php
	 include_once("../include/db_mysql.php");
	 //req_id=$str_req_id&sample_id=$str_sample_id&req_table=$str_req_table';
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
		$str_deal="未受理";
	}else if($str_deal==1){
		$str_deal="已受理";
	}else if($str_deal==2){
		$str_deal="拒绝";
	}
	 
	 //echo "$req_id  $sample_id  $req_table $uid  $subject_id ";
	
?>
<script type="text/javascript" language="JavaScript">
	function accept_req(){
		//接受客户申请
		var uid="<?php echo $uid?>";
		var req_id="<?php echo $req_id?>";
		var req_table="<?php echo $req_table?>";
		var ps=$('#message').val();//相关备注
		$.post("task.php",{action:"accept_req",uid:uid,req_id:req_id,req_table:req_table,ps:ps},function(data){
			  if(data){
				alert("该业务申请已经受理");
		  }		 
		});
	
	}
	function reject_req(){
		//接受客户申请
		var uid="<?php echo $uid?>";
		var req_id="<?php echo $req_id?>";
		var req_table="<?php echo $req_table?>";
		var ps=$('#message').val();//拒绝理由
		if(ps==''){
			alert("请在受理备注信息栏中输入拒绝理由");
		}else{
		//alert(ps);
		$.post("task.php",{action:"reject_req",uid:uid,req_id:req_id,req_table:req_table,ps:ps},function(data){
			  if(data){
				alert("该业务申请已经拒绝");
		  }		 
		});
		
		}
	
	}
	function cancle(){
		//clear();
		window.location.href="busi_apply_query.php";
	}
	
	function jump(url){
		window.location.href=url;
	}

</script>
</head>
<body>
<!--  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">-->
	<tr>
		<td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="24" class=table_title ><table width="100%" border="0" cellspacing="0" cellpadding="0">
         			<tr>
         				<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
         					<tr>
         						<td width="6%" height="19" valign="bottom"><div align="center"><img src="../images/tb.gif" width="14" height="14" /></div></td>
         						<td width="94%" valign="bottom"><span class="table_title"> 检测业务申请信息详情</span></td>
         					</tr>
         				</table></td>
         				<td><div align="right"><span class="table_title">
         		<!-- <input type=\"checkbox\" name=\"checkbox11\" id=\"checkbox11\" />
         		全选      &nbsp;&nbsp;<img src=\"images/add.gif\" width=\"10\" height=\"10\" /> 添加   &nbsp; <img src=\"images/del.gif\" width=\"10\" height=\"10\" /> 删除    &nbsp;&nbsp;<img src=\"images/edit.gif\" width=\"10\" height=\"10\" /> 编辑   &nbsp;</span><span class=\"table_title\"> &nbsp;</span></div>--></td>
         			</tr>
         		</table></td>
         	</tr>
		</table></td>
	</tr>
<!--  <div id="mainbody">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

<tr><!-- 标题栏-1 -->
	<td height="30" background="../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="12" height="30"><img src="../images/tab_03.gif" width="12" height="30" /></td>
				<td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo "委托书信息";?></b></td>
				<td width="16"><img src="../images/tab_07.gif" width="16" height="30" /></td>
			</tr>
		</table>
	</td>
</tr>

<tr><!-- 主要内容1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="8" background="../images/tab_12.gif">&nbsp;</td>
					<td>
						<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
							<tr>
								<!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
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
					$subject_cid=$result['subject_id'];//元数据ID
					$subject_name=$result['subject_name'];//元数据中文名称
					$subject_name2=$result['subject_name2'];//元数据英文名称
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
							$attr_cont .="&nbsp;$meta_name</br>";
							}
							echo "<td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"15%\" style=\"font-weight:bold;\">$subject_name"."：</td>
						<td height=\"30\" class=\"left_txt4\" width=\"35%\">$attr_cont</td>					
						";
						//echo"<td height=\"1\"   bgcolor=\"#a1a2a3\"><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					}else{
					
					
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
					echo "<td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"15%\" style=\"font-weight:bold;\">$subject_name"."：</td>
						<td height=\"30\" class=\"left_txt4\" width=\"35%\">$sub_name2_val</td>					
						";
						//echo"<td height=\"1\"  bgcolor=\"#a1a2a3\" ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
						}
						if($i%2==0){
						echo "</tr><tr>";//一行显示两列
						
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
				<td width="8" background="../images/tab_15.gif">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>
<tr> 
    <td height="35" background="../images/tab_19.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>

<tr><!-- 标题栏-1 -->
	<td height="30" background="../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="12" height="30"><img src="../images/tab_03.gif" width="12" height="30" /></td>
				<td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo "样品信息";?></b></td>
				<td width="16"><img src="../images/tab_07.gif" width="16" height="30" /></td>
			</tr>
		</table>
	</td>
</tr>

<tr><!-- 主要内容1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="8" background="../images/tab_12.gif">&nbsp;</td>
					<td>
						<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
							<tr>
								<!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
								<td height="30" style="font-size:13; " >
									<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
				<?php
					//获取申请登记表中的sample_id
					
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
                <td height="30" align='right' class="left_txt4"style="font-weight:bold;">样品名称：</td>
                <td  class="left_txt4"><input type='text' id='sample_name' width='180px' value='<?php echo $sample_name; ?>' disabled ></td>
				<td height="30" align='right'  class="left_txt4"style="font-weight:bold;" >型号规格：</td>
                <td class="left_txt4"><input type='text' id='speci' width='180px' value='<?php echo $speci; ?>' disabled></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">芯片型号：</td>
                <td   class="left_txt4"><input type='text' id='chip_speci' width='180px'  value='<?php echo $chip_speci; ?>' disabled > </td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">COS版本：</td>
                <td  class="left_txt4"><input type='text' id='cos_v' width='180px'  value='<?php echo $cos_v; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">掩膜方式：</td>
                <td   class="left_txt4"><input type='text' id='ym' width='180px' value='<?php echo $ym; ?>' disabled> </td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">商标：</td>
                <td  class="left_txt4"><input type='text' id='tk' width='180px'value='<?php echo $tk; ?>' disabled ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">主机(台)：</td>
                <td  class="left_txt4"><input type='text' id='host' width='180px' value='<?php echo $host; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">主机(备注)：</td>
                <td   class="left_txt4"><input type='text' id='host_ps' width='180px' value='<?php echo $host_ps; ?>' disabled> </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">IC卡(张)：</td>
                <td   class="left_txt4"><input type='text' id='ic' width='180px' value='<?php echo $ic; ?>' disabled ></td>
				<td height="30" align="right" class="left_txt4"style="font-weight:bold;">IC卡(备注)：</td>
                <td   class="left_txt4"><input type='text' id='ic_ps' width='180px' value='<?php echo $ic_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">显示器(台)：</td>
                <td   class="left_txt4"><input type='text' id='screen' width='180px' value='<?php echo $screen; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">显示器(备注)：</td>
                <td  class="left_txt4"><input type='text' id='screen_ps' width='180px'  value='<?php echo $screen_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">鼠  标(个)：</td>
                <td   class="left_txt4"><input type='text' id='mouse' width='180px'  value='<?php echo $mouse; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">鼠标(备注)：</td>
                <td   class="left_txt4"><input type='text' id='mouse_ps' width='180px'  value='<?php echo $mouse_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">键  盘(个)：</td>
                <td   class="left_txt4"><input type='text' id='keyboard' width='180px'  value='<?php echo $keyboard; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">键盘(备注)：</td>
                <td   class="left_txt4"><input type='text' id='keyboard_ps' width='180px'  value='<?php echo $keyboard_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">电源线(根)：</td>
                <td   class="left_txt4"><input type='text' id='power_wire' width='180px'  value='<?php echo $power_wire; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">电源线(备注)：</td>
                <td   class="left_txt4"><input type='text' id='power_wire_ps' width='180px'  value='<?php echo $power_wire_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">电源适配器(个)：</td>
                <td   class="left_txt4"><input type='text' id='power_adapt' width='180px' value='<?php echo $power_adapt; ?>' disabled  ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">适配器(备注)：</td>
                <td  class="left_txt4"><input type='text' id='power_adapt_ps' width='180px' value='<?php echo $power_adapt_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">数据线(根)：</td>
                <td   class="left_txt4"><input type='text' id='data_wire' width='180px'  value='<?php echo $data_wire; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">数据线(备注)：</td>
                <td   class="left_txt4"><input type='text' id='data_wire_ps' width='180px' value='<?php echo $data_wire_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">光  盘(张)：</td>
                <td   class="left_txt4"><input type='text' id='cdrom' width='180px'  value='<?php echo $cdrom; ?>' disabled ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">光盘(备注)：</td>
                <td   class="left_txt4"><input type='text' id='cdrom_ps' width='180px'  value='<?php echo $cdrom_ps; ?>' disabled > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">说明书(本)：</td>
                <td class="left_txt4"><input type='text' id='workbook' width='180px' value='<?php echo $workbook; ?>' disabled  ></td>
				<td height="30" align="right" class="left_txt4"style="font-weight:bold;">说明书(备注)：</td>
                <td  class="left_txt4"><input type='text' id='workbook_ps' width='180px' value='<?php echo $workbook_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">包装箱(个)：</td>
                <td   class="left_txt4"><input type='text' id='pack' width='180px' value='<?php echo $pack; ?>' disabled  ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">包装箱(备注)：</td>
                <td   class="left_txt4"><input type='text' id='pack_ps' width='180px' value='<?php echo $pack_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" class="left_txt4"style="font-weight:bold;">其他附件：</td>
                <td  class="left_txt4"><input type='text' id='another' width='180px' value='<?php echo $another; ?>' disabled  ></td>
				<td  height="30" align="right" class="left_txt4"style="font-weight:bold;">其他附件(备注)：</td>
                <td   class="left_txt4"><input type='text' id='another_ps' width='180px' value='<?php echo $another_ps; ?>' disabled  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>          
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
<tr> 
    <td height="35" background="../images/tab_19.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>

<tr><!-- 标题栏-2 -->
        <td height="30" background="../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo "资料列表";?></b></td>
                <td width="16"><img src="../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<!-- <tr><!-- 主要内容2 -->
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
					echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;无上传资料。</td></tr>";
				}else{
				//print_r($ary_upload_file);
				    echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td width='20%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td width='30%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">资料名称</span></div></td>
                    <td width='20%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">上传时间</span></div></td>
                    <td width='30%' height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";

            $id=1;
				
				foreach($ary_upload_file as $key => $result){
					$file_name=$result['file_name'];//上传文件名
					$file_type=$result['file_type'];
					$file_size=$result['file_size'];
					$date=$result['date'];
					$time=$result['time'];
					//echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;$id&nbsp;&nbsp;&nbsp;$file_name</td></tr>";
					 echo "<tr>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$file_name."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."   ".$time."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>"."<a href='download.php?filename=$file_name&filetype=$file_type&filesize=$file_size'>下载</a></td>";
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
<tr> 
    <td height="35" background="../images/tab_19.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>

<tr><!-- 标题栏-3 -->
        <td height="30" background="../images/tab_05.gif">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="12" height="30"><img src="../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b><?php echo "业务受理状态";?></b></td>
                <td width="16"><img src="../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
                </table>
        </td>
</tr>

<tr><!-- 主要内容3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8" background="../images/tab_12.gif">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
                
               <tr>
				 <td height="40" >
					<b>受理状态：</b><?php echo $str_deal; ?>
				</td>
			   </tr>
                 <tr>
				 <td height="40" >
					<b>备注信息：</b><?php echo $req_ps;?> <!--<textarea id='ps' name='ps' value="cols="100" rows="8" style="width:90%;height:50px;"></textarea> -->
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
<tr> 
    <td height="35" background="../images/tab_19.gif">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>


<tr><!-- 主要内容3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8">&nbsp;</td>
            <td>
                <table  width="100%" border="0" cellpadding="0" cellspacing="0" >      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="0" >
               <tr>
				<td height="40" valign="middle" align="center">
				<?php
				echo"";
				echo "
                <input type=\"button\" name=\"button\" id=\"button\"  onclick=\"jump('req_gen.php?req_id=$req_id&sample_id=$sample_id&req_table=$req_table&uid=$uid')\" value=\"生成委托书\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\"  id=\"btn_sample_gen\"  onclick=\"jump('sample_info_gen.php?sample_id2=$sample_id&uid2=$uid')\" value=\"生成样品信息表\" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" id=\"btn_cancle\" onclick=cancle() value=\"返  回\">";
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

<tr> 
        <!--<td height="40" valign="middle" align="center">
                <input type="button" name="button" id="button"  onclick="accept_req()"value="接受申请" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="button" id="button"  onclick="reject_req()"value="拒绝申请" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" id="btn_cancle" onclick=cancle() value="返  回">
        </td>-->

</tr>
</table>
</div>
</body>

</html>

