<?php
	//本文件的作用是处理中心风采上传的图片
	session_start();
	include_once("../../../include/db_mysql.php");
	include_once("../../../include/deal_img.php");//图片处理函数，需要安gd库
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	//定义允许上传的文件扩展名
	$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
	$file_name=$_FILES['fileToUpload']['name'];
	//获得文件扩展名
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
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
		$error = '请选择上传文件,并且勾选文本框，否则上传无效';
	}
	else if(in_array($file_ext, $ext_arr) === false) 
		
	{
		$error = "上传文件扩展名是不允许的扩展名。";
	}
	else
	{
		$save_path = '../../../../upload/';
		//新文件名
		$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
		//移动文件
		$file_path = $save_path . $new_file_name;
		
	  // $r=move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$save_path.$_FILES['fileToUpload']['name']);
	    $r=move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path);
			if($r){
				//开始对上传的图片进行裁剪，规格是120*90
				resize($file_path,120,90);
				$file_name=$_FILES['fileToUpload']['name'];
				//$file_size=$_FILES['fileToUpload']['size'];
				//$file_type=$_FILES['fileToUpload']['type'];
				//查找是否有重复项
				$flag=0;//假定没有
         		/*$sql = "select img_name from nstc_news_img ";
         		$result = mysql_query($sql,$conn);
         		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if($file_name==$row[0]){
		 			$flag=1;
		 			break;
					//exit;
		   			}	
	     		}*/
	     		if($flag==0){
	     			$date=date("Y-m-d");
	     			$time=date("H:i:s");
					$sql="insert into nstc_news_img(id,img_name,tmp_img_name,date,time)
					values('','$file_name','$new_file_name','$date','$time')";
					$result = mysql_query($sql,$conn);
					if($result){
						$msg=$new_file_name;
					}
					mysql_close();
					//$msg .=$max_file_id."上传成功";
	     		}/*else if($flag==1){
	     			$date=date("Y-m-d");
	     			$time=date("H:i:s");
					$sql="update nstc_news_img set tmp_img_name='$new_file_name',
					date='$date',time='$time'
					where file_name='$file_name'";
					$result = mysql_query($sql,$conn);
					mysql_close();
					$msg .=$max_file_id."上传成功";
	     		}*/
				
			
			}
	//}
	}
		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>