<?php
	$file_name=trim($_GET['filename']);
	$file_type=trim($_GET['filetype']);
	$file_size=trim($_GET['filesize']);
	$tmp_file_name=$file_name;//�����ļ���
	$file_name="../store/".$file_name;//����·��
	if(file_exists($file_name)){
		//$file_name=trim($_GET['filename']);
		//$tmp_file_name=$file_name;//�����ļ���
		//$file_name="../admin/templates/kindedit/save_test_result/".$file_name;//����·��
               
 		header("Content-type: ".$file_type);
 		header("Content-Disposition:attachment;filename=".$tmp_file_name);
 		header("Content-Length:".$file_size);
 		header( 'Content-Transfer-Encoding: binary' ); 
 		$fp=fopen($file_name,"r");
 		while(false==feof($fp)){
  			echo fread($fp,50000);
  			//echo fread($fp,$file_size);
 		}
	}else{
		echo"<script language='javascript'>";
		echo "alert('�Բ������������ص��ļ��Ѿ��������ˣ�');";
		//echo "window.location.href='../index.php';";
		//echo "window.location.href='$back_url';";
		echo "history.go(-1);";
		echo "</script>";
		//$_SESSION['down_flag']='faild';
		
	}
	?>
