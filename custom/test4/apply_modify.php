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
	
	function getAllCheckBoxId(){
	var inputs = document.getElementsByTagName("input");//获取所有的input标签对象
	var checkboxNameArray = [];//初始化空数组，用来存放checkbox对象。
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
	var str_logname="<?php echo $_SESSION['cus_realname']?>";			//获取日志管理操作人id
	
	//var arr_G = new Array();//存放checkbox值
	var arr_G="";
	var all=getAllCheckBoxId();//获取checkbox对象
	var arr_t=new Array();//存放Text值
	var arr_t="";
	var obj_t=getAllTextId();//获取Text对象
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
			alert("您有未填项，请确认");
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
		alert("委托书信息修改成功");
		parent.main.location.reload();
		}else if(data=="error"){
		alert("该委托书号已经存在，请确认后再修改");
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

  <div class="main_2">
	<?php
		iframe_left();//页面左边，菜单栏
	?>
 	<div align='left'>                                                                                                                                                                            
                <ul class="bmsbreadcrumb">                                                                                                                                                            
                        <li><a href="index.php">首页</a> <span class="divider">></span></li>                                                                                                          
                        <li><a href="busi_apply_query.php">检验业务查询</a> <span class="divider">></span></li>                                                                                       
                        <li><a href="busi_apply_query.php">业务申请查询</a> <span class="divider">></span></li>                                                                                       
                        <li class="active">修改委托书信息</li>                                                                                                                                            
                </ul>                                                                                                                                                                                 
        </div>	
        <div class="anlie_2">
          <div class="anlie_nr">
        
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">


<tr class='alert'><!-- 主要内容1 -->
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
					$subject_cid=$result['subject_id'];//元数据ID
					$subject_name=$result['subject_name'];//元数据中文名称
					$subject_name2=$result['subject_name2'];//元数据英文名称
					$sql4="select $subject_name2 from $req_table  where id='$req_id'";
					//echo '$sql4='.$sql4;
					$sub_name2_val=get_result_first($sql4);
					$attr_cont="";
					if( $sub_name2_val=='' &&  $subject_name=='说明'){
						//$sub_name2_val="无";
						//则说明是一般性说明内容
						/*$sql3="select meta_name from metadata_subjects where subject_id='$subject_cid'";
						$result3=mysql_query($sql3,$conn);
						   while($row=@mysql_fetch_array($result3)) {
							$meta_name=$row['meta_name'];
							$attr_cont .="&nbsp;$meta_name</br>";
							}
							echo "<td height=\"40\" align=\"right\"  width=\"15%\" style=\"font-weight:bold;\">$subject_name"."：</td>
						<td height=\"40\"  align='left' width=\"35%\"><div style='border:solid 1px;'>$attr_cont</div></td>					
						";*/
						//echo"<td height=\"1\"   bgcolor=\"#a1a2a3\"><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					}else{
					
					
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
					//检验依据和检验项目特殊处理
					if(strstr($subject_name,"检验依据")||strstr($subject_name,"检验项目")||strstr($subject_name,"检验类别")||strstr($subject_name,"来样形式")||strstr($subject_name,"供电方式")||strstr($subject_name,"是否出报告")||strstr($subject_name,"同意分包")){
						//
						//查找数据库，获取元数据属性值及其类型
						$sql3="select metadata_id,meta_name,meta_type from metadata_subjects where subject_id='$subject_cid'";
						$ary_meta=get_result_ary($sql3);
						$metaid="metaid_";	
						//$attr_cont="";
						foreach($ary_meta as $key => $result3){
						
						$metadata_id=$result3['metadata_id'];//属性ID
						$meta_name=$result3['meta_name'];//属性中文名称
						$meta_type=$result3['meta_type'];//属性类型
						//echo $subject_cid."</br>";
						//echo $subject_name."</br>";
						//echo $subject_name2."</br>";
						
						if($meta_type==1){//一级级联checkbox
							//$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							if(strstr($sub_name2_val,$meta_name)){
							$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' style='margin-top:4px;'  type='checkbox' checked='checked' value='$subject_name2|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;";
							}else {
							$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' style='margin-top:4px;' type='checkbox'  value='$subject_name2|$meta_name' id='$metaid$metadata_id'></br>";
							}
						}else if($meta_type==2){//二级级联checkbox
							//将$meta_name按照分号进行分割
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
						
						}//else if($meta_type==0){//普通说明性文字，不需要用户填写
							//$attr_cont .="&nbsp;$meta_name</br>";
						
						//}
					}
					echo "<td height=\"40\" align=\"right\"  width=\"15%\" style=\"font-weight:bold;\">$subject_name"."：</td>
						<td height=\"40\" align='left' width=\"35%\"><div style='border:solid 1px;'>".$attr_cont."</div></td>";
					}else{
						if(strstr($subject_name,"日期")){
							echo "<td height=\"40\" align=\"right\"  width=\"14%\" style=\"font-weight:bold;\">$subject_name"."：</td>
							<td height=\"40\" align='left' width=\"36%\"><input type=\"text\" id=\"$subject_name2\"  value=\"$sub_name2_val\" class=\"it date-pick\" style='border:solid 1px;height:25px; width:100%'/></td>					
							";
						}else{
							echo "<td height=\"40\" align=\"right\"  width=\"15%\" style=\"font-weight:bold;\">$subject_name"."：</td>
							<td height=\"40\"  width=\"35%\" align='left'><input type=\"text\" id=\"$subject_name2\"  value=\"$sub_name2_val\" style='border:solid 1px;height:25px; width:100%'/></td>					
							";
						}
						//echo"<td height=\"1\"  bgcolor=\"#a1a2a3\" ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
						}
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
                <input type=\"button\" name=\"button\" id=\"button\"  class='edit_buttom' onclick=\"mysubmit()\"value=\"确认修改\" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"button\" id=\"btn_cancle\" class='edit_buttom' onclick=cancle() value=\"返  回\">";
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

