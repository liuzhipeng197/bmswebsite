<?php
	 session_start();
     include_once("./include/function.php");
     iframe_head();
	$req_id=trim($_GET['req_id']);
	//$sample_id=trim($_GET['sample_id']);
	$req_table=trim($_GET['req_table']);
	$uid=trim($_GET['uid']);	
	$sample_name=trim($_GET['sample_name']);
	$sql="select distinct subject_id from subject where subject_name2='$req_table'";
	$subject_id=get_result_first($sql);
	
?>

<script type="text/javascript" language="JavaScript">

$(window).ready(function(){
		$('.date-pick').datePicker({clickInput:true,startDate:'0001-01-01'});
	})
	
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
	
	function getAllCheckBoxId(){
	var inputs = document.getElementsByTagName("input");//��ȡ���е�input��ǩ����
	var checkboxNameArray = [];//��ʼ�������飬�������checkbox����
	for(var i=0;i<inputs.length;i++){
		var obj = inputs[i];
		if(obj.type=='checkbox'){
		checkboxNameArray.push(obj.id);
		}
	}
	return checkboxNameArray;
}

function check(obj){
	var checkedId = obj.id;
	var checkedArray = new Array();
	var all=getAllCheckBoxId();
	for(var i=0;i<all.length;i++){
		var singlecheck = all[i];
		if(singlecheck.length>checkedId.length&&singlecheck.substring(0,checkedId.length)==checkedId){
			var t = document.getElementById(checkedId);
			if(t.checked == true){
				document.getElementById(singlecheck).checked = true;
			}else{
				document.getElementById(singlecheck).checked = false;
			}
		}
	}
}
	function mysubmit(){
	var str_logname="<?php echo $_SESSION['cus_realname']?>";			//��ȡ��־���������id
	
	//var arr_G = new Array();//���checkboxֵ
	var arr_G="";
	var all=getAllCheckBoxId();//��ȡcheckbox����
	var arr_t=new Array();//���Textֵ
	var arr_t="";
	var obj_t=getAllTextId();//��ȡText����
	var j=0;
	var k=0;
	for(var i=0;i<all.length;i++){
		if(document.getElementById(all[i]).checked == true){
		//arr_G[j] = document.getElementById(all[i]).value;
		//j++;
		 arr_G += document.getElementById(all[i]).value + ",";
		}
	}
	for(var i=0;i< obj_t.length;i++){
		var text_val=document.getElementById(obj_t[i]).value;
		/*if(text_val==''){
			alert("����δ�����ȷ��");
		}else{
			//arr_t[k] = obj_t[i]+"|"+document.getElementById(obj_t[i]).value;
			//k++;
			arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";
		}*/
		if(obj_t[i]!='req_code'){
		arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";
		}
		
	}
	//alert(arr_G);
	//alert(arr_t);
	//var subject_id="<?php echo $subject_id ?>";
	var uid="<?php echo $uid;?>";
	var req_id="<?php echo $req_id ?>";
	var req_table="<?php echo $req_table;?>";
	var sample_name="<?php echo $sample_name;?>";
	//var req_code_old="<?php echo $req_code;?>";
	//var sample_id="<?php echo $sample_id;?>";
	//var req_code=$('#req_code').val();
	//alert(req_code);
	$.post("task.php",{action:"modify_req",str_logname:str_logname,uid:uid,req_id:req_id,req_table:req_table,req_text:arr_t,req_chk:arr_G,sample_name:sample_name},function(data){
	//$.post("task.php",{action:"save_req_baseinfo",req_text:arr_t,req_chk:arr_G},function(data){
		//if(data){
		if(data=="OK"){
		//alert(data);
		alert("ί������Ϣ�޸ĳɹ�");
		parent.main.location.reload();
		}else if(data=="error"){
		alert("��ί������Ѿ����ڣ���ȷ�Ϻ����޸�");
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

  <div class="main_2">
	<?php
		iframe_left();//ҳ����ߣ��˵���
	?>
 	<div align='left'>                                                                                                                                                                            
                <ul class="bmsbreadcrumb">                                                                                                                                                            
                        <li><a href="index.php">��ҳ</a> <span class="divider">></span></li>                                                                                                          
                        <li><a href="busi_apply_query.php">����ҵ���ѯ</a> <span class="divider">></span></li>                                                                                       
                        <li><a href="busi_apply_query.php">ҵ�������ѯ</a> <span class="divider">></span></li>                                                                                       
                        <li class="active">�޸�ί������Ϣ</li>                                                                                                                                            
                </ul>                                                                                                                                                                                 
        </div>	
        <div class="anlie_2">
          <div class="anlie_nr">
        
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">


<tr class='alert'><!-- ��Ҫ����1 -->
	<td style='padding:20px 20px 0px 0px'>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="8" background="../images/tab_12.gif">&nbsp;</td>
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
					$attr_cont="";
					if( $sub_name2_val=='' &&  $subject_name=='˵��'){
						//$sub_name2_val="��";
						//��˵����һ����˵������
						/*$sql3="select meta_name from metadata_subjects where subject_id='$subject_cid'";
						$result3=mysql_query($sql3,$conn);
						   while($row=@mysql_fetch_array($result3)) {
							$meta_name=$row['meta_name'];
							$attr_cont .="&nbsp;$meta_name</br>";
							}
							echo "<td height=\"40\" align=\"right\"  width=\"15%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"40\"  align='left' width=\"35%\"><div style='border:solid 1px;'>$attr_cont</div></td>					
						";*/
						//echo"<td height=\"1\"   bgcolor=\"#a1a2a3\"><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					}else{
					
					
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
					//�������ݺͼ�����Ŀ���⴦��
					if(strstr($subject_name,"��������")||strstr($subject_name,"������Ŀ")||strstr($subject_name,"�������")||strstr($subject_name,"������ʽ")||strstr($subject_name,"���緽ʽ")||strstr($subject_name,"�Ƿ������")||strstr($subject_name,"ͬ��ְ�")){
						//
						//�������ݿ⣬��ȡԪ��������ֵ��������
						$sql3="select metadata_id,meta_name,meta_type from metadata_subjects where subject_id='$subject_cid'";
						$ary_meta=get_result_ary($sql3);
						$metaid="metaid_";	
						//$attr_cont="";
						foreach($ary_meta as $key => $result3){
						
						$metadata_id=$result3['metadata_id'];//����ID
						$meta_name=$result3['meta_name'];//������������
						$meta_type=$result3['meta_type'];//��������
						//echo $subject_cid."</br>";
						//echo $subject_name."</br>";
						//echo $subject_name2."</br>";
						
						if($meta_type==1){//һ������checkbox
							//$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							if(strstr($sub_name2_val,$meta_name)){
							$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' style='margin-top:4px;'  type='checkbox' checked='checked' value='$subject_name2|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;";
							}else {
							$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' style='margin-top:4px;' type='checkbox'  value='$subject_name2|$meta_name' id='$metaid$metadata_id'></br>";
							}
						}else if($meta_type==2){//��������checkbox
							//��$meta_name���շֺŽ��зָ�
							$ary_name=array();
							$ary_name=explode(";",$meta_name);
							$attr_cont2="";
							for($i=1;$i<count($ary_name);$i++){
								//$attr_cont2 .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id"."_"."$i|$ary_name[$i]' id='$metaid$metadata_id"."_".$i."'>$ary_name[$i]&nbsp;&nbsp;";
								$val=$ary_name[$i];
								$id=md5($val);
								//$patt="$ary_name[0]".":".$val;
								//$attr_cont2 .="$val<input onClick='check(this)' type='checkbox' value='$val|$id' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								if(strstr($sub_name2_val,$val)){
								$attr_cont2 .="$val<input onClick='check(this)' style='margin-top:4px;' type='checkbox' checked='checked' value='$subject_name2|$ary_name[0]:$val' id='$id'>&nbsp;&nbsp;";
								}else{
								$attr_cont2 .="$val<input onClick='check(this)' style='margin-top:4px;' type='checkbox' value='$subject_name2|$ary_name[0]:$val' id='$id'>&nbsp;&nbsp;";
								}
							
							}
							$attr_cont .="&nbsp;$ary_name[0]:&nbsp;(&nbsp;".$attr_cont2.")</br>";
							//$attr_cont="";
						
						}//else if($meta_type==0){//��ͨ˵�������֣�����Ҫ�û���д
							//$attr_cont .="&nbsp;$meta_name</br>";
						
						//}
					}
					echo "<td height=\"40\" align=\"right\"  width=\"15%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"40\" align='left' width=\"35%\"><div style='border:solid 1px;'>".$attr_cont."</div></td>";
					}else{
						if(strstr($subject_name,"����")){
							echo "<td height=\"40\" align=\"right\"  width=\"14%\" style=\"font-weight:bold;\">$subject_name"."��</td>
							<td height=\"40\" align='left' width=\"36%\"><input type=\"text\" id=\"$subject_name2\"  value=\"$sub_name2_val\" class=\"it date-pick\" style='border:solid 1px;height:25px; width:100%'/></td>					
							";
						}else{
							echo "<td height=\"40\" align=\"right\"  width=\"15%\" style=\"font-weight:bold;\">$subject_name"."��</td>
							<td height=\"40\"  width=\"35%\" align='left'><input type=\"text\" id=\"$subject_name2\"  value=\"$sub_name2_val\" style='border:solid 1px;height:25px; width:100%'/></td>					
							";
						}
						//echo"<td height=\"1\"  bgcolor=\"#a1a2a3\" ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
						}
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
            <td>
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
                <input type=\"button\" name=\"button\" id=\"button\"  class='edit_buttom' onclick=\"mysubmit()\"value=\"ȷ���޸�\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" id=\"btn_cancle\" class='edit_buttom' onclick=cancle() value=\"��  ��\">";
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

