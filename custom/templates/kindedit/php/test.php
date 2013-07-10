<?php
	include("../../../include/db_mysql.php");
	include_once("../../../include/global.php");
	$img_name=trim($_POST['hid_filename']);
		$dyinfo_id='19';	
		$start_date=date("Y-m-d");
			$title=trim($_POST['title']);
			$author=trim($_POST['author']);
			$department=trim($_POST['department']);
			//$htmlData=trim($_POST['content1']);
			$htmlData = '';
			if (!empty($_POST['content1'])) {
				if (get_magic_quotes_gpc()) {
				$htmlData = stripslashes($_POST['content1']);
				} else {
				$htmlData = $_POST['content1'];
				}
			}
			$time=date("H:i:s");
			/*$img_name = iconv( "UTF-8" , "GB2312" , $img_name );
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			$department = iconv( "UTF-8" , "GB2312" , $department);*/
			//查找是否有重复项
         	//$sql = "select * from nstc_dyinfo";
         	//$result = mysql_query($sql,$conn);
         	//while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 	//	if(strcasecmp($title,$row['title'])==0){
				//exit;
			
		   		//}	
	     	//}
	 		//$dyinfo_id=trim($_POST['dyinfoId']);
	 		//$sql = "update nstc_dyinfo set type='$type',title='$title',content='$htmlData',
	 		//author='$author',department='$department',date='$start_date',time='$time' where id='$dyinfo_id'";
	 		if($img_name==''){
	 			$sql = "update nstc_dyinfo set title='$title',content='$htmlData',
	 		author='$author',department='$department',date='$start_date',time='$time' where id='$dyinfo_id'";
	    	//echo $sql;
	 		}else{
	 			$sql = "update nstc_dyinfo set title='$title',content='$htmlData',
	 		author='$author',department='$department',date='$start_date',time='$time',img_name='$img_name' where id='$dyinfo_id'";
	 		}
	    	$result = mysql_query($sql,$conn);
	    	echo '$result='.$result."<br>";
	    	mysql_close();
	    	//if($result){
	 		//echo "OK";
	    	//}else{
	    	echo '$sql='.$sql;
	?>