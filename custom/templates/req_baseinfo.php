<?php
	//session_cache_limiter(��private, must-revalidate��);//ע��Ҫд��session_start����֮ǰ
	session_start();
	require("../../admin/include/db_mysql.php");
	if($_SESSION['cus_id']==''){
		 header("Location:../index.php");
                 exit();

	}
	$subject_id=$_POST['test_obj'];
	$_SESSION['subject_id']=$subject_id;
	//echo '$_session='.$_SESSION['cus_id'];
	//echo '$subject='.$subject_id;

?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #F8F9FA;
	/*overflow: scroll; */
	overflow-x:hidden;
}
-->
</style>
<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../style/datePicker.css" />
<script  charset="utf-8" src="../js/jquery-second.js" type="text/javascript"></script>
<script  charset="utf-8" src="../js/jquery.datePicker-min.js" type="text/javascript"></script>
<script language="javascript">
$(window).ready(function(){
	$('.date-pick').datePicker({clickInput:true,startDate:'0001-01-01'});
})

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
	//var arr_G = new Array();//���checkboxֵ
	var arr_G="";
	var all=getAllCheckBoxId();//��ȡcheckbox����
	//var arr_t=new Array();//���Textֵ
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
		arr_t += obj_t[i]+"|"+document.getElementById(obj_t[i]).value+",";
		
	}
	//alert(arr_G);
	//alert(arr_t);
	var subject_id="<?php echo $subject_id ?>";
	var uid="<?php echo $_SESSION['cus_id'];?>";
	$.post("task.php",{action:"save_req_baseinfo",subject_id:subject_id,req_text:arr_t,req_chk:arr_G,uid:uid},function(data){
	//$.post("task.php",{action:"save_req_baseinfo",req_text:arr_t,req_chk:arr_G},function(data){
		//if(data){
		if(data=="OK"){
		//alert(data);
		alert("���������ύ�ɹ�");
		window.location.href="sample_baseinfo.php";
		}
	});

 }

	

</script>
<script type="text/javascript">
function setHeight()
{
	window.parent.parent.document.getElementById("outframe").style.height=0+"px";
	h = Math.max(document.documentElement.offsetHeight,document.body.offsetHeight);
	//h=document.body.scrollHeight;
	window.parent.parent.document.getElementById("outframe").style.height = 100+h+100 + 50+"px"; //Ϊ�˱�֤Ч�������50
}
</script>
<style>
html,body{margin:0;padding:0}
</style>
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<body onload="setHeight()">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif"><img src="../images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="../images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31" ><div class="titlebt">��д������Ϣ</div></td>
      </tr>
    </table></td>
    <td width="16" valign="top" background="../images/mail_rightbg.gif"><img src="../images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td height="71" valign="middle" background="../images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="left_txt">��ǰλ�ã����ҵ�����롷�������̡���д������Ϣ</td>
          </tr>
          <tr>
            <td height="20"><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" height="55" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="10%" height="55" valign="middle"><img src="../images/title.gif" width="54" height="55"></td>
                <td width="90%" valign="top"><span class="left_txt2">���������Ҫί�м��Ļ�����Ϣ��Ȼ�󵥻���һ����</span><span class="left_txt3"></span><span class="left_txt2"></span><br>
                          <span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2"></span></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;������������Ϣ</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form_sel_obj" method="POST" action="req_baseinfo.php">
              <tr>
                <!--<td width="20%" height="30" align="right" class="left_txt4">�������б�</td>
                <td width="3%"  class="left_txt4">&nbsp;</td>
                <td width="32%" height="30"  class="left_txt4">-->
				
				<?php
					//ͨ���������ݿ⣬��ȡ����Ԫ����
					$ary_test_obj=array();
					$ary_meta=array();
					$sql="select subject_id,subject_name,subject_name2 from subject where parents='$subject_id' order by subject_id";
					$ary_test_obj=get_result_ary($sql);
					
					foreach($ary_test_obj as $key => $result){
					$subject_cid=$result['subject_id'];//Ԫ����ID
					$subject_name=$result['subject_name'];//Ԫ������������
					$subject_name2=$result['subject_name2'];//Ԫ����Ӣ������
					//echo $subject_cid."</br>";
					//echo $subject_name."</br>";
					//echo $subject_name2."</br>";
					
					//����Ԫ���ݱ�
					$sql2="select count(metadata_id) from metadata_subjects where subject_id='$subject_cid'";
					if(get_result_first($sql2)<1){
						//Ԫ����û�����ԣ������Ԫ�������ƺ��ı���
						if(strstr($subject_name,"����")){
							echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
							<td height=\"30\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" class=\"it date-pick\"/></td>					
							</tr>";
						}else{
							echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
							<td height=\"30\" class=\"left_txt4\" width=\"70%\"><input type=\"text\" id=\"$subject_name2\" size=\"30\" /></td>					
							</tr>";
						}
						echo"<tr  ><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";

					}else{
						//�������ݿ⣬��ȡԪ��������ֵ��������
						$sql3="select metadata_id,meta_name,meta_type from metadata_subjects where subject_id='$subject_cid'";
						$ary_meta=get_result_ary($sql3);
						$metaid="metaid_";
						foreach($ary_meta as $key => $result3){
						
						$metadata_id=$result3['metadata_id'];//����ID
						$meta_name=$result3['meta_name'];//������������
						$meta_type=$result3['meta_type'];//��������
						//echo $subject_cid."</br>";
						//echo $subject_name."</br>";
						//echo $subject_name2."</br>";
						
						if($meta_type==1){//һ������checkbox
							//$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							$attr_cont .="&nbsp;$meta_name<input onClick='check(this)' type='checkbox' value='$subject_name2|$meta_name' id='$metaid$metadata_id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						}else if($meta_type==2){//��������checkbox
							//��$meta_name���շֺŽ��зָ�
							$ary_name=array();
							$ary_name=explode(";",$meta_name);
							for($i=1;$i<count($ary_name);$i++){
								//$attr_cont2 .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input onClick='check(this)' type='checkbox' value='$metaid$metadata_id"."_"."$i|$ary_name[$i]' id='$metaid$metadata_id"."_".$i."'>$ary_name[$i]&nbsp;&nbsp;";
								$val=$ary_name[$i];
								$id=md5($val);
								//$attr_cont2 .="$val<input onClick='check(this)' type='checkbox' value='$val|$id' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								$attr_cont2 .="$val<input onClick='check(this)' type='checkbox' value='$subject_name2|$ary_name[0]:$val' id='$id'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							
							}
							$attr_cont .="</br>&nbsp;$ary_name[0]:&nbsp;(&nbsp;&nbsp;&nbsp;".$attr_cont2.")";
							$attr_cont2="";
						
						}else if($meta_type==0){//��ͨ˵�������֣�����Ҫ�û���д
							$attr_cont .="&nbsp;$meta_name</br>";
						
						}
					}
						echo "<tr><td height=\"30\" align=\"right\" class=\"left_txt4\" width=\"30%\" style=\"font-weight:bold;\">$subject_name"."��</td>
						<td height=\"30\" class=\"left_txt4\" width=\"70%\">".$attr_cont."</td></tr>";
						echo"<tr><td height=\"1\"  ><table width=\"100%\" height=\"1\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"></table></td></tr>";
					
					
					}
					
					$attr_cont="";
					
					}
					
					
					
					//echo 'meta_name='.$meta_name;
				
					
				
					
									
				?>
				
               			
             
             
          </table></td>
          </tr>

        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="right"><input type="button" value="��һ��" name="B1" onclick="mysubmit()" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="44%" height="30"><input type="button" value="ȡ��" name="B12" /></td>
            </tr>
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>

			
          </table></td>
      </tr>
    </table></td>
    <td background="../images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle" background="../images/mail_leftbg.gif"><img src="../images/buttom_left2.gif" width="17" height="17" /></td>
      <td height="17" valign="top" background="../images/buttom_bgs.gif"><img src="../images/buttom_bgs.gif" width="17" height="17" /></td>
    <td background="../images/mail_rightbg.gif"><img src="../images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>

</body>

