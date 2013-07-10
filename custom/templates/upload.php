<?php
	session_start();
	require("../../admin/include/db_mysql.php");
	if($_SESSION['cus_id']==''){
		 header("Location:../index.php");
                 exit();

	}
	//echo '$_session='.$_SESSION['cus_id'];
	
   $unique_id = uniqid("");

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
<!--<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script>-->
<script src="../js/jquery1.4.js" type="text/javascript"></script>
<script src="../js/upload.js" type="text/javascript"></script>

<script>
	
	function mysubmit(){
		
		window.location.href="req_overview.php";
		
	}
	function cancle(){
		
		window.location.href="req_overview.php";
		
	}

</script>
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<body>
<!--<form name="form_sample method="POST" >-->
<form enctype="multipart/form-data" id="upload_form" action="?a=up" method="POST" target="_self">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" height="29" valign="top" background="../images/mail_leftbg.gif"><img src="../images/left-top-right.gif" width="17" height="29" /></td>
    <td width="935" height="29" valign="top" background="../images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
      <tr>
        <td height="31" ><div class="titlebt">上传资料</div></td>
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
            <td class="left_txt">当前位置：检测业务申请》申请流程》上传资料</td>
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
                <td width="90%" valign="top"><span class="left_txt2">在这里，您可以上传与测试相关的资料（如产品说明书等），然后单击下一步。如果没有相关资料上传，则点取消按钮。</span><span class="left_txt3"></span><span class="left_txt2"></span><br>
                          <span class="left_txt2"></span><span class="left_txt3"></span><span class="left_txt2">注意。本系统只支持doc、docx、xls、xlsx、ppt、pptx、pdf、jpg、png、jpeg、rar、格式上传，并且单个文件小于50MB，如果有多个文件，请先打包再上传。</span><span class="left_txt3"></span><span class="left_txt2"></span></td>
              </tr>
            </table></td>
          </tr>
         
         
		 <tr>
		 <td>&nbsp;</td>
		 </tr>
          </tr>
		   <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;上传相关资料</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
        <tr><td width="100%"  class="left_txt4"><input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $unique_id;?>"/>
			&nbsp;&nbsp;<input type="file" id="test_file" name="test_file" style="background:#FFFFFF"/>&nbsp;&nbsp;<input  type="submit" value="上传" onclick="startProgress('<?php echo $unique_id;?>');return true;"/>
		</td></tr>
		<tr><td width="100%"  class="left_txt4"><div id="upstatus" style="width: 300px; height: 30px; border: 0px solid ##ffffde; color:#796140;"></div>
<div id="progressouter" style="width: 500px; height: 20px; border: 3px solid #de7e00; display:none;">
<div id="progressinner" style="position: relative; height: 20px; color:#796140; background-color: #f6d095; width: 0%; "></div>
</div>
<?php
	$uid=$_SESSION['cus_id'];
	$a=trim($_GET['a']);	
	if($a=='up' and isset($_POST)){
		//允许的文件扩展名
		$allowed_types = array('doc','docx','xls','xlsx','ppt','pptx','pdf','jpeg','jpg', 'gif', 'png','rar');
		$filename = $_FILES['test_file']['name'];
		#正则表达式匹配出上传文件的扩展名
		preg_match('|\.(\w+)$|', $filename, $ext);
		#print_r($ext);
		#转化成小写
		$ext = strtolower($ext[1]);
		#判断是否在被允许的扩展名里
		if(!in_array($ext, $allowed_types)){
			echo "<script language='javascript'> alert('资料上传失败，请确认文件类型');</script>";
		}else{
		$filepath = "../store/";
		$filepath = $filepath.basename( $_FILES['test_file']['name']);
		$r=move_uploaded_file($_FILES['test_file']['tmp_name'], $filepath);
			if($r){
				$file_name=$_FILES['test_file']['name'];
				$file_size=$_FILES['test_file']['size'];
				$file_type=$_FILES['test_file']['type'];
				//获取委托申请id
				$max_req_id=$_SESSION['max_req_id'];
				$req_table=$_SESSION['req_table'];
				$date=date("Y-m-d");
	     		$time=date("H:i:s");
				$sql = "insert into bms_doc(id,uid,req_table,req_id,file_name,file_type,file_size,date,time)
					values('','$uid','$req_table','$max_req_id','$file_name','$file_type','$file_size','$date','$time')";
					$result = mysql_query($sql,$conn);
					if($result){
						echo "<script language='javascript'> alert('资料上传成功');</script>";
					}
					mysql_close();
			}else{
				echo "<script language='javascript'> alert('资料上传失败，请确认文件大小小于50MB');</script>";
			}
		}

}
?>
</td></tr>


			   </table></td>
			   
			  
			  <!--<tr>
		 <td>&nbsp;</td>
		 </tr>
          </tr>
		   <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;上传资料列表</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td bgcolor="#a1a2a3"><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>-->
			

			<?php
			/*if($a=='up' and isset($_POST)){
				$ary_upload_file=array();
				$uid=$_SESSION['cus_id'];
				$req_id=$_SESSION['max_req_id'];
				$sql="select file_name from bms_doc where uid='$uid' and req_id='$req_id' ";
				$ary_upload_file=get_result_ary($sql);
				//print_r($ary_upload_file);
				foreach($ary_upload_file as $key => $result){
					$file_name=$result['file_name'];//上传文件名
					echo "<tr><td width=\"100%\"  class=\"left_txt4\">&nbsp;&nbsp;&nbsp;$file_name</td></tr>";
					}
					}*/
				
			?>
      
			  <!-- </table></td>  -->
			   
        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="right"><input type="button" value="下一步" name="B1" onclick="mysubmit()" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="44%" height="30"><input type="button" value="取消" name="B12" onclick="cancle()" /></td>
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
</form>
</body>

