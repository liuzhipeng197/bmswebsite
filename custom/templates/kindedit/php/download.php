<?php
	include_once("../../../include/db_mysql.php");
	$file_name=trim($_GET['file_name']);
	$tmp_file_name=$file_name;//�����ļ���
	$file_name="../save_test_result/".$file_name;//����·��
	if(file_exists($file_name)){
		$sql="select *from nstc_downfile where file_name='$tmp_file_name'";
		$result=mysql_query($sql,$conn);
		$row=mysql_fetch_array($result,MYSQL_BOTH);
		//$file_name="../test/preview.html";
		$file_type=$row['file_type'];
		//echo $file_type;
		$file_size=$row['file_size'];
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
		echo "window.location.href='result_show.php';";
		echo "</script>";
		
	}
	
?>