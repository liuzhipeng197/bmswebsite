<?php
	//���ļ��������Ǵ������ķ���ϴ���ͼƬ
	session_start();
	include_once("../../../include/db_mysql.php");
	include_once("../../../include/deal_img.php");//ͼƬ����������Ҫ��gd��
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	//���������ϴ����ļ���չ��
	$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
	$file_name=$_FILES['fileToUpload']['name'];
	//����ļ���չ��
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = '�ϴ��ļ������������ϴ�';
				break;
			case '2':
				$error = '�ϴ��ļ������������ϴ�';
				break;
			case '3':
				$error = '�ļ������ϴ����������ϴ�';
				break;
			case '4':
				$error = '��ѡ���ϴ��ļ�';
				break;

			case '6':
				$error = '�ļ��ϴ�����';
				break;
			case '7':
				$error = '�ļ��޷�д��';
				break;
			case '8':
				$error = '�ļ��ϴ�����';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = '��ѡ���ϴ��ļ�,���ҹ�ѡ�ı��򣬷����ϴ���Ч';
	}
	else if(in_array($file_ext, $ext_arr) === false) 
		
	{
		$error = "�ϴ��ļ���չ���ǲ��������չ����";
	}
	else
	{
		$save_path = '../../../../upload/';
		//���ļ���
		$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
		//�ƶ��ļ�
		$file_path = $save_path . $new_file_name;
		
	  // $r=move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$save_path.$_FILES['fileToUpload']['name']);
	    $r=move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path);
			if($r){
				//��ʼ���ϴ���ͼƬ���вü��������120*90
				resize($file_path,120,90);
				$file_name=$_FILES['fileToUpload']['name'];
				//$file_size=$_FILES['fileToUpload']['size'];
				//$file_type=$_FILES['fileToUpload']['type'];
				//�����Ƿ����ظ���
				$flag=0;//�ٶ�û��
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
					//$msg .=$max_file_id."�ϴ��ɹ�";
	     		}/*else if($flag==1){
	     			$date=date("Y-m-d");
	     			$time=date("H:i:s");
					$sql="update nstc_news_img set tmp_img_name='$new_file_name',
					date='$date',time='$time'
					where file_name='$file_name'";
					$result = mysql_query($sql,$conn);
					mysql_close();
					$msg .=$max_file_id."�ϴ��ɹ�";
	     		}*/
				
			
			}
	//}
	}
		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>