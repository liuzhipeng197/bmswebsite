<?php
	$file_name=trim($_GET['filename']);
	$file_type=trim($_GET['filetype']);
	$file_size=trim($_GET['filesize']);
	$tmp_file_name=$file_name;//保存文件名
	$file_name="../store/".$file_name;//生成路径
	if(file_exists($file_name)){
		//$file_name=trim($_GET['filename']);
		//$tmp_file_name=$file_name;//保存文件名
		//$file_name="../admin/templates/kindedit/save_test_result/".$file_name;//生成路径
               
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
		echo "alert('对不起，您请求下载的文件已经不存在了！');";
		//echo "window.location.href='../index.php';";
		//echo "window.location.href='$back_url';";
		echo "history.go(-1);";
		echo "</script>";
		//$_SESSION['down_flag']='faild';
		
	}
	?>
