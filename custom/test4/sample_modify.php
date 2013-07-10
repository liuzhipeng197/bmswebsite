<?php
	 session_start();
     include_once("./include/function.php");
     iframe_head();
	$sample_id=trim($_GET['sample_id']);
	
?>

<script type="text/javascript" language="JavaScript">
	
	function getAllTextId(){
	var inputs = document.getElementsByTagName("input");//获取所有的input标签对象
	var textNameArray= [];//初始化空数组，用来存放text对象
	for(var i=0;i<inputs.length;i++){
		var obj = inputs[i];
		if(obj.type=='text'){
		textNameArray.push(obj.id);
		}
	}
	return textNameArray;
	}
	
	function mysubmit(){
	var str_logname="<?php echo $_SESSION['cus_realname']?>";			//获取日志管理操作人id
	
	//var arr_G = new Array();//存放checkbox值
	var arr_G="";
	//var all=getAllCheckBoxId();//获取checkbox对象
	//var arr_t=new Array();//存放Text值
	var arr_t="";
	var obj_t=getAllTextId();//获取Text对象
	var j=0;
	var k=0;
	/*for(var i=0;i<all.length;i++){
		if(document.getElementById(all[i]).checked == true){
		//arr_G[j] = document.getElementById(all[i]).value;
		//j++;
		 arr_G += document.getElementById(all[i]).value + ",";
		}
	}*/
	for(var i=0;i< obj_t.length;i++){
		var text_val=document.getElementById(obj_t[i]).value;
		/*if(text_val==''){
			alert("您有未填项，请确认");
		}else{
			//arr_t[k] = obj_t[i]+"|"+document.getElementById(obj_t[i]).value;
			//k++;
			arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";
		}*/
		arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";
		
	}
	//alert(arr_G);
	//alert(arr_t);
	//var subject_id="<?php echo $subject_id ?>";
	//var uid="<?php echo $uid;?>";
	//var req_id="<?php echo $req_id ?>";
	//var req_table="<?php echo $req_table;?>";
	var sample_id="<?php echo $sample_id;?>";
	//alert("");
	$.post("task.php",{action:"modify_sample_info",sample_id:sample_id,req_text:arr_t,str_logname:str_logname},function(data){
		if(data){
		//alert(data);
		alert("样品信息修改成功");
		parent.main.location.reload();
		}
	});

 }

	
	function cancle(){
		//clear();
		window.location.href="busi_apply_query.php";
	}
	
	function jump(url){
		window.location.href=url;
	}

</script>
	

<body>
<div class="juzhong">
  <?php
	iframe_top();//页面头部
  ?>

  <div align='left'>
                <ul class="bmsbreadcrumb">
                        <li><a href="index.php">首页</a> <span class="divider">></span></li>
                        <li><a href="busi_apply_query.php">检验业务查询</a> <span class="divider">></span></li>
                        <li><a href="busi_apply_query.php">业务申请查询</a> <span class="divider">></span></li>
                        <li class="active">修改样品信息</li>
                </ul>

  </div>

  <div class="main_2">
	<?php
		iframe_left();//页面左边，菜单栏
	?>
	
        
        <div class="anlie_2">
          <div class="anlie_nr">
        
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

<tr class='alert'><!-- 主要内容1 -->
	<td style='padding:20px 0px 20px 0px'>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="8" background="../images/tab_12.gif">&nbsp;</td>
					<td>
						<table  width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">      
							<tr>
								
								<td height="30" style="font-size:13; ">
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
                <td height="30" align='right' style="font-weight:bold;">样品名称：</td>
                <td ><input type='text' id='sample_name' width='180px' value='<?php echo $sample_name; ?>'  ></td>
				<td  height="30" align='right'  style="font-weight:bold;" >型号规格：</td>
                <td  ><input type='text' id='speci' width='180px' value='<?php echo $speci; ?>' ></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td  height="30" align="right" style="font-weight:bold;">芯片型号：</td>
                <td   ><input type='text' id='chip_speci' width='180px'  value='<?php echo $chip_speci; ?>'  > </td>
				<td  height="30" align="right" style="font-weight:bold;">COS版本：</td>
                <td  ><input type='text' id='cos_v' width='180px'  value='<?php echo $cos_v; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td  height="30" align="right" style="font-weight:bold;">掩膜方式：</td>
                <td  ><input type='text' id='ym' width='180px' value='<?php echo $ym; ?>' > </td>
				<td  height="30" align="right" style="font-weight:bold;">商标：</td>
                <td   ><input type='text' id='tk' width='180px'value='<?php echo $tk; ?>'  ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">主机(台)：</td>
                <td   ><input type='text' id='host' width='180px' value='<?php echo $host; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">主机(备注)：</td>
                <td   ><input type='text' id='host_ps' width='180px' value='<?php echo $host_ps; ?>' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">IC卡(张)：</td>
                <td   ><input type='text' id='ic' width='180px' value='<?php echo $ic; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">IC卡(备注)：</td>
                <td   ><input type='text' id='ic_ps' width='180px' value='<?php echo $ic_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">显示器(台)：</td>
                <td  ><input type='text' id='screen' width='180px' value='<?php echo $screen; ?>'  ></td>
				<td height="30" align="right" style="font-weight:bold;">显示器(备注)：</td>
                <td  ><input type='text' id='screen_ps' width='180px'  value='<?php echo $screen_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">鼠  标(个)：</td>
                <td   ><input type='text' id='mouse' width='180px'  value='<?php echo $mouse; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">鼠标(备注)：</td>
                <td   ><input type='text' id='mouse_ps' width='180px'  value='<?php echo $mouse_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">键  盘(个)：</td>
                <td  ><input type='text' id='keyboard' width='180px'  value='<?php echo $keyboard; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">键盘(备注)：</td>
                <td   ><input type='text' id='keyboard_ps' width='180px'  value='<?php echo $keyboard_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td height="30" align="right" style="font-weight:bold;">电源线(根)：</td>
                <td   ><input type='text' id='power_wire' width='180px'  value='<?php echo $power_wire; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">电源线(备注)：</td>
                <td   ><input type='text' id='power_wire_ps' width='180px'  value='<?php echo $power_wire_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">电源适配器(个)：</td>
                <td   ><input type='text' id='power_adapt' width='180px' value='<?php echo $power_adapt; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">适配器(备注)：</td>
                <td  ><input type='text' id='power_adapt_ps' width='180px' value='<?php echo $power_adapt_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">数据线(根)：</td>
                <td   ><input type='text' id='data_wire' width='180px'  value='<?php echo $data_wire; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">数据线(备注)：</td>
                <td   ><input type='text' id='data_wire_ps' width='180px' value='<?php echo $data_wire_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">光  盘(张)：</td>
                <td   ><input type='text' id='cdrom' width='180px'  value='<?php echo $cdrom; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">光盘(备注)：</td>
                <td   ><input type='text' id='cdrom_ps' width='180px'  value='<?php echo $cdrom_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">说明书(本)：</td>
                <td  ><input type='text' id='workbook' width='180px' value='<?php echo $workbook; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">说明书(备注)：</td>
                <td   ><input type='text' id='workbook_ps' width='180px' value='<?php echo $workbook_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">包装箱(个)：</td>
                <td   ><input type='text' id='pack' width='180px' value='<?php echo $pack; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">包装箱(备注)：</td>
                <td   ><input type='text' id='pack_ps' width='180px' value='<?php echo $pack_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">其他附件：</td>
                <td   ><input type='text' id='another' width='180px' value='<?php echo $another; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">其他附件(备注)：</td>
                <td   ><input type='text' id='another_ps' width='180px' value='<?php echo $another_ps; ?>'   > </td>
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


<tr><!-- 主要内容3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8">&nbsp;</td>
            <td style='padding:20px 0px 10px 0px'>
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
                <input type=\"button\" class='edit_buttom' name=\"button\" id=\"button\"  onclick=\"mysubmit()\"value=\"确认修改\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" class='edit_buttom' id=\"btn_cancle\" onclick=cancle() value=\"返  回\">";
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

