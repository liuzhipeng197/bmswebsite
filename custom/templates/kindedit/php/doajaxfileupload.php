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
		$error = '��ѡ���ϴ��ļ�';
	}else 
	{ $save_path = '../save_test_result/';
	   $r=move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$save_path.$_FILES['fileToUpload']['name']);
			if($r){
				$file_name=$_FILES['fileToUpload']['name'];
				$file_size=$_FILES['fileToUpload']['size'];
				$file_type=$_FILES['fileToUpload']['type'];
				//�����Ƿ����ظ���
				$flag=0;//�ٶ�û��
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
					$msg .=$max_file_id."�ϴ��ɹ�";
	     		}else if($flag==1){
	     			$date=date("Y-m-d");
	     			$time=date("H:i:s");
					$sql="update nstc_downfile set file_type='$file_type',file_size='$file_size',
					date='$date',time='$time'
					where file_name='$file_name'";
					$result = mysql_query($sql,$conn);
					mysql_close();
					$msg .=$max_file_id."�ϴ��ɹ�";
	     		}
				//��ȡ�ղŲ����������¼��id
				//$sql="select max(id) from nstc_downfile";
				//$result = mysql_query($sql,$conn);
				//$row = @mysql_fetch_array($result, MYSQL_BOTH);
				//$max_file_id=$row[0];
				//$_SESSION['max_file_id']=$max_file_id;
				//�����ļ�����ʽ���������ֵ
				//@$fp=fopen("../save_test_result/max_file_id.txt","w");
        		//flock($fp,LOCK_EX);//����������
        		//if(!$fp){
        		//echo "can not create the file of max_file_id.txt";
        		//exit;
        		//}
        		//fwrite($fp,$max_file_id);
        		//flock($fp,LOCK_UN);//�ͷŻ�����
        		//fclose($fp);
				//echo "<script language='javascript'>";
				//echo "document.getElementById('hid_fileid').value=$max_file_id";
				//echo "</script>";
	    		//mysql_close();
				//$msg .= " �ļ�����: " . $_FILES['fileToUpload']['name'] . ", ";
				//$msg .="�ļ���С:".$file_size;
				//$msg .=$file_name.",".$mime_type.",".$file_size."�ϴ��ɹ�";
				//$msg .=$max_file_id."�ϴ��ɹ�";
				//$msg .="�ϴ��ɹ�";
			
			}
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";
?>