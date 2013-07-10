<?php
	session_start();
	include_once("../../../include/db_mysql.php");
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	//echo "<input type='hidden' id='hid_fileid' name='hid_fileid' valude=''>";
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = '上传文件过大，请重新上传';
				break;
			case '2':
				$error = '上传文件过大，请重新上传';
				break;
			case '3':
				$error = '文件部分上传，请重新上传';
				break;
			case '4':
				$error = '请选择上传文件';
				break;

			case '6':
				$error = '文件上传出错';
				break;
			case '7':
				$error = '文件无法写入';
				break;
			case '8':
				$error = '文件上传出错';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = '请选择上传文件';
	}else 
	{ $save_path = '../save_test_result/';
	   $r=move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$save_path.$_FILES['fileToUpload']['name']);
			if($r){
				$file_name=$_FILES['fileToUpload']['name'];
				$file_size=$_FILES['fileToUpload']['size'];
				$file_type=$_FILES['fileToUpload']['type'];
				//查找是否有重复项
				$flag=0;//假定没有
         		$sql = "select file_name from nstc_downfile ";
         		$result = mysql_query($sql,$conn);
         		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if($file_name==$row[0]){
		 			$flag=1;
		 			break;
					//exit;
		   			}	
	     		}
	     		if($flag==0){
	     			$date=date("Y-m-d");
	     			$time=date("H:i:s");
					$sql="insert into nstc_downfile(id,file_name,file_type,file_size,date,time)
					values('','$file_name','$file_type','$file_size','$date','$time')";
					$result = mysql_query($sql,$conn);
					mysql_close();
					$msg .=$max_file_id."上传成功";
	     		}else if($flag==1){
	     			$date=date("Y-m-d");
	     			$time=date("H:i:s");
					$sql="update nstc_downfile set file_type='$file_type',file_size='$file_size',
					date='$date',time='$time'
					where file_name='$file_name'";
					$result = mysql_query($sql,$conn);
					mysql_close();
					$msg .=$max_file_id."上传成功";
	     		}
				//获取刚才插入的那条记录的id
				//$sql="select max(id) from nstc_downfile";
				//$result = mysql_query($sql,$conn);
				//$row = @mysql_fetch_array($result, MYSQL_BOTH);
				//$max_file_id=$row[0];
				//$_SESSION['max_file_id']=$max_file_id;
				//采用文件的形式来保存最大值
				//@$fp=fopen("../save_test_result/max_file_id.txt","w");
        		//flock($fp,LOCK_EX);//建立互斥锁
        		//if(!$fp){
        		//echo "can not create the file of max_file_id.txt";
        		//exit;
        		//}
        		//fwrite($fp,$max_file_id);
        		//flock($fp,LOCK_UN);//释放互斥锁
        		//fclose($fp);
				//echo "<script language='javascript'>";
				//echo "document.getElementById('hid_fileid').value=$max_file_id";
				//echo "</script>";
	    		//mysql_close();
				//$msg .= " 文件名称: " . $_FILES['fileToUpload']['name'] . ", ";
				//$msg .="文件大小:".$file_size;
				//$msg .=$file_name.",".$mime_type.",".$file_size."上传成功";
				//$msg .=$max_file_id."上传成功";
				//$msg .="上传成功";
			
			}
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>