<?php
	 session_start();
     include_once("./include/function.php");
     iframe_head();
	$sample_id=trim($_GET['sample_id']);
	
?>

<script type="text/javascript" language="JavaScript">
	
	function getAllTextId(){
	var inputs = document.getElementsByTagName("input");//��ȡ���е�input��ǩ����
	var textNameArray= [];//��ʼ�������飬�������text����
	for(var i=0;i<inputs.length;i++){
		var obj = inputs[i];
		if(obj.type=='text'){
		textNameArray.push(obj.id);
		}
	}
	return textNameArray;
	}
	
	function mysubmit(){
	var str_logname="<?php echo $_SESSION['cus_realname']?>";			//��ȡ��־���������id
	
	//var arr_G = new Array();//���checkboxֵ
	var arr_G="";
	//var all=getAllCheckBoxId();//��ȡcheckbox����
	//var arr_t=new Array();//���Textֵ
	var arr_t="";
	var obj_t=getAllTextId();//��ȡText����
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
			alert("����δ�����ȷ��");
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
		alert("��Ʒ��Ϣ�޸ĳɹ�");
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
	iframe_top();//ҳ��ͷ��
  ?>

  <div align='left'>
                <ul class="bmsbreadcrumb">
                        <li><a href="index.php">��ҳ</a> <span class="divider">></span></li>
                        <li><a href="busi_apply_query.php">����ҵ���ѯ</a> <span class="divider">></span></li>
                        <li><a href="busi_apply_query.php">ҵ�������ѯ</a> <span class="divider">></span></li>
                        <li class="active">�޸���Ʒ��Ϣ</li>
                </ul>

  </div>

  <div class="main_2">
	<?php
		iframe_left();//ҳ����ߣ��˵���
	?>
	
        
        <div class="anlie_2">
          <div class="anlie_nr">
        
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

<tr class='alert'><!-- ��Ҫ����1 -->
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
                <td ><input type='text' id='sample_name' width='180px' value='<?php echo $sample_name; ?>'  ></td>
				<td  height="30" align='right'  style="font-weight:bold;" >�ͺŹ��</td>
                <td  ><input type='text' id='speci' width='180px' value='<?php echo $speci; ?>' ></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td  height="30" align="right" style="font-weight:bold;">оƬ�ͺţ�</td>
                <td   ><input type='text' id='chip_speci' width='180px'  value='<?php echo $chip_speci; ?>'  > </td>
				<td  height="30" align="right" style="font-weight:bold;">COS�汾��</td>
                <td  ><input type='text' id='cos_v' width='180px'  value='<?php echo $cos_v; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td  height="30" align="right" style="font-weight:bold;">��Ĥ��ʽ��</td>
                <td  ><input type='text' id='ym' width='180px' value='<?php echo $ym; ?>' > </td>
				<td  height="30" align="right" style="font-weight:bold;">�̱꣺</td>
                <td   ><input type='text' id='tk' width='180px'value='<?php echo $tk; ?>'  ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">����(̨)��</td>
                <td   ><input type='text' id='host' width='180px' value='<?php echo $host; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">����(��ע)��</td>
                <td   ><input type='text' id='host_ps' width='180px' value='<?php echo $host_ps; ?>' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">IC��(��)��</td>
                <td   ><input type='text' id='ic' width='180px' value='<?php echo $ic; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">IC��(��ע)��</td>
                <td   ><input type='text' id='ic_ps' width='180px' value='<?php echo $ic_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">��ʾ��(̨)��</td>
                <td  ><input type='text' id='screen' width='180px' value='<?php echo $screen; ?>'  ></td>
				<td height="30" align="right" style="font-weight:bold;">��ʾ��(��ע)��</td>
                <td  ><input type='text' id='screen_ps' width='180px'  value='<?php echo $screen_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td  height="30" align="right" style="font-weight:bold;">��  ��(��)��</td>
                <td   ><input type='text' id='mouse' width='180px'  value='<?php echo $mouse; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">���(��ע)��</td>
                <td   ><input type='text' id='mouse_ps' width='180px'  value='<?php echo $mouse_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��  ��(��)��</td>
                <td  ><input type='text' id='keyboard' width='180px'  value='<?php echo $keyboard; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">����(��ע)��</td>
                <td   ><input type='text' id='keyboard_ps' width='180px'  value='<?php echo $keyboard_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td height="30" align="right" style="font-weight:bold;">��Դ��(��)��</td>
                <td   ><input type='text' id='power_wire' width='180px'  value='<?php echo $power_wire; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">��Դ��(��ע)��</td>
                <td   ><input type='text' id='power_wire_ps' width='180px'  value='<?php echo $power_wire_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��Դ������(��)��</td>
                <td   ><input type='text' id='power_adapt' width='180px' value='<?php echo $power_adapt; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">������(��ע)��</td>
                <td  ><input type='text' id='power_adapt_ps' width='180px' value='<?php echo $power_adapt_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">������(��)��</td>
                <td   ><input type='text' id='data_wire' width='180px'  value='<?php echo $data_wire; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">������(��ע)��</td>
                <td   ><input type='text' id='data_wire_ps' width='180px' value='<?php echo $data_wire_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��  ��(��)��</td>
                <td   ><input type='text' id='cdrom' width='180px'  value='<?php echo $cdrom; ?>'  ></td>
				<td  height="30" align="right" style="font-weight:bold;">����(��ע)��</td>
                <td   ><input type='text' id='cdrom_ps' width='180px'  value='<?php echo $cdrom_ps; ?>'  > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">˵����(��)��</td>
                <td  ><input type='text' id='workbook' width='180px' value='<?php echo $workbook; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">˵����(��ע)��</td>
                <td   ><input type='text' id='workbook_ps' width='180px' value='<?php echo $workbook_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">��װ��(��)��</td>
                <td   ><input type='text' id='pack' width='180px' value='<?php echo $pack; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">��װ��(��ע)��</td>
                <td   ><input type='text' id='pack_ps' width='180px' value='<?php echo $pack_ps; ?>'   > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td  height="30" align="right" style="font-weight:bold;">����������</td>
                <td   ><input type='text' id='another' width='180px' value='<?php echo $another; ?>'   ></td>
				<td  height="30" align="right" style="font-weight:bold;">��������(��ע)��</td>
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


<tr><!-- ��Ҫ����3 -->
        <td>
                <table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
                <td width="8">&nbsp;</td>
            <td style='padding:20px 0px 10px 0px'>
                <table  width="100%" border="0" cellpadding="0" cellspacing="0" >      
                <tr>
                         <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;���ݣ�<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                         <td height="30" style="font-size:13; ">
                         <table  width="100%" border="0" cellpadding="0" cellspacing="0" >
               <tr>
				<td height="40" valign="middle" align="center">
				 <?php
				 echo"";
				 echo "
                <input type=\"button\" class='edit_buttom' name=\"button\" id=\"button\"  onclick=\"mysubmit()\"value=\"ȷ���޸�\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" class='edit_buttom' id=\"btn_cancle\" onclick=cancle() value=\"��  ��\">";
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

