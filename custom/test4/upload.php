<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
	 $unique_id = uniqid("");
?>

<body>
<div class="juzhong">
  <?php
	iframe_top();//ҳ��ͷ��
	?>

  <div class="main_2">
	<?php
		iframe_left();//ҳ����ߣ��˵���
	?>
	
    <div class="right_2">
            <div align='left'>                                                                                                                                                                                        <ul class="bmsbreadcrumb">
                                      
                        <li><a href="index.php">��ҳ</a> <span class="divider">/</span></li>                                                                   
                        <li><a href="#">���ҵ������</a> <span class="divider">/</span></li>                                                                                                          
                        <li class="active">�ϴ�����</li>
		</ul>
            </div>
	<div class="anlie_basicinfo">
          <div class="anlie_nr">
           <form enctype="multipart/form-data" id="upload_form" action="?a=up" method="POST" target="_self">
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
                <td width="90%" align='left' class='alert'>������������ϴ��������ص����ϣ����Ʒ˵����ȣ���Ȼ�󵥻���һ�������û����������ϴ������ȡ����ť��<br>
                  ע�⡣��ϵͳֻ֧��doc��docx��xls��xlsx��ppt��pptx��pdf��jpg��png��jpeg��rar����ʽ�ϴ������ҵ����ļ�С��50MB������ж���ļ������ȴ�����ϴ���</td>
              </tr>
			  
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
          <tr>
            <td class='alert'><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
        <tr><td width="100%"  ><input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $unique_id;?>"/>
			&nbsp;&nbsp;��ѡ���ϴ��ļ�&nbsp;&nbsp;&nbsp;<input type="file" id="test_file" name="test_file" style="background:#eeeFFF"/>&nbsp;&nbsp;<input  type="submit"  class='edit_buttom' value="�ϴ�" onclick="startProgress('<?php echo $unique_id;?>');return true;"/>
		</td></tr>
		<tr><td width="100%"  ><div id="upstatus" style="width: 300px; height: 30px; border: 0px solid ##ffffde; color:#796140;"></div>
<div id="progressouter" style="width: 500px; height: 20px; border: 3px solid #de7e00; display:none;">
<div id="progressinner" style="position: relative; height: 20px; color:#796140; background-color: #f6d095; width: 0%; "></div>
</div>
<?php
	$uid=$_SESSION['cus_id'];
	$a=trim($_GET['a']);	
	if($a=='up' and isset($_POST)){
		//������ļ���չ��
		$allowed_types = array('doc','docx','xls','xlsx','ppt','pptx','pdf','jpeg','jpg', 'gif', 'png','rar');
		$filename = $_FILES['test_file']['name'];
		#������ʽƥ����ϴ��ļ�����չ��
		preg_match('|\.(\w+)$|', $filename, $ext);
		#print_r($ext);
		#ת����Сд
		$ext = strtolower($ext[1]);
		#�ж��Ƿ��ڱ��������չ����
		if(!in_array($ext, $allowed_types)){
			echo "<script language='javascript'> alert('�����ϴ�ʧ�ܣ���ȷ���ļ�����');</script>";
		}else{
		$filepath = "../store/";
		$myfilename="upload-".$_FILES['test_file']['name'];//�������Ϊ���ֵ��쳣
		$filepath = $filepath.basename($myfilename);
		$r=move_uploaded_file($_FILES['test_file']['tmp_name'], $filepath);
			if($r){
				$file_name="upload-".$_FILES['test_file']['name'];
				$file_size=$_FILES['test_file']['size'];
				$file_type=$_FILES['test_file']['type'];
				//��ȡί������id
				$max_req_id=$_SESSION['max_req_id'];
				$req_table=$_SESSION['req_table'];
				$date=date("Y-m-d");
	     		$time=date("H:i:s");
				$sql = "insert into bms_doc(id,uid,req_table,req_id,file_name,file_type,file_size,date,time)
					values('','$uid','$req_table','$max_req_id','$file_name','$file_type','$file_size','$date','$time')";
					$result = mysql_query($sql,$conn);
					if($result){
						echo "<script language='javascript'> alert('�����ϴ��ɹ�');</script>";
					}
					mysql_close();
			}else{
				echo "<script language='javascript'> alert('�����ϴ�ʧ�ܣ���ȷ���ļ���СС��50MB');</script>";
			}
		}

}
?>
            <tr>
              <td width="100%" height="30" align="center"><input type="button" class='edit_buttom' value="��һ��" name="B1" onclick="mysubmit()" />
             &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class='edit_buttom' value="ȡ��" name="B12" onclick="cancle()"/></td>
            </tr>

</td></tr>


			   </table></td>
			 
             
          </table></td>
          </tr>
	</td>
      </tr>
			  
			  </table>
			  
            <div class="clear"></div>
          </div>
          
         
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

<script>
	
	function mysubmit(){
		
		window.location.href="req_overview.php";
		
	}
	function cancle(){
		
		window.location.href="req_overview.php";
		
	}

</script>
