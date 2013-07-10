<?php
  /*
  NSTC后台管理系统的逻辑文件，主要用于事务处理
  创建者：邱全伟
  创建日期：2010.7.27
  */
    session_start();
    header('Content-Type:text/html;charset=GB2312');
	include("../../../include/db_mysql.php");
	include_once("../../../include/global.php");
	
	function fnAddSlashes($data)
	{
    	if(!get_magic_quotes_gpc()) //只对POST/GET/cookie过来的数据增加转义
        return is_array($data)?array_map('addslashes',$data):addslashes($data);
   		else
        return $data;
	}
	
	function deal_special_char($str){
		//$str=htmlspecialchars($str);
		//$str=HTMLSpecialChars($str); //将特殊字元转成 HTML 格式。 php学习之家 
		//$str=nl2br($str); //将回车替换为<br> php学习之家 
		//str_replace("—","--",$str);
		$str=preg_replace("/—/","--",$str);
		return $str;
	}

    if ( isset( $_POST['action'] ) ) {
	   $action = $_POST['action'];
     } elseif ( isset( $_GET['action'] ) ) {
	   $action = $_GET['action'];
     }

    if ( isset( $action ) ) {
	switch ($action){
		case "dyinfo_add"://添加管理员
			$img_name=trim($_POST['fileName']);//2010.8.18焦点图名称
			$img_flag=trim($_POST['img_flag']);//2010.8.25 是否具有焦点图标志
	   		$type=trim($_POST['mytype']);
			//$start_date=trim($_POST['mydate']);
			$start_date=date("Y-m-d");
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$department=trim($_POST['mydepart']);
                        $abs=trim($_POST['abs']);//头条摘要
			$htmlData=trim($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);
			$time=date("H:i:s");
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$img_name = iconv( "UTF-8" , "GB2312" , $img_name );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			$department = iconv( "UTF-8" , "GB2312" , $department);
                         $abs = iconv( "UTF-8" , "GB2312" , $abs);

			//查找是否有重复项
         	$sql = "select * from nstc_dyinfo";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($title,$row['title'])==0){
				exit;
			
		   		}	
	     	}
			$sql = "insert into nstc_dyinfo(id,type,title,content,author,department,date,time,audit,img_name,img_flag,abs) 
			values('','$type','$title','$htmlData','$author','$department','$start_date','$time','0','$img_name','$img_flag','$abs')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case "dyinfo_init":
	 		//$sql = "select * from nstc_dyinfo order by type";
	 		//$sql = "select * from nstc_dyinfo where type='0' order by date desc";
                        $sql = "select * from nstc_dyinfo  order by type";

	 		get_dyinfo_admin($sql);
	 		break;
	 	case"showdyinfo_bytype":
	 		$type=trim($_POST['type']);
	 		if($type!=''){
	 			$sql = "select * from nstc_dyinfo where type='$type' order by date desc";
	 			get_dyinfo_admin($sql);
	 		}
	 	break;	 		
	 	case"dyinfo_del":
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		$sql="delete from nstc_dyinfo where id='$dyinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK"; 
	 	break;
	 	
	 	case"dyinfo_fresh":
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		$sql="update nstc_dyinfo set fresh='1' where id='$dyinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK"; 
	 	break;
	 	
	 	case"dyinfo_nofresh":
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		$sql="update nstc_dyinfo set fresh='0' where id='$dyinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK"; 
	 	break;
	 	
	 	case"dyinfo_modify":
	 		//$type=trim($_POST['mytype']);
			//$start_date=trim($_POST['mydate']);
			$img_name=trim($_POST['fileName']);
			$start_date=date("Y-m-d");
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			/*if (!empty($_POST['mycontent'])) {
				if (get_magic_quotes_gpc()) {
				$htmlData = stripslashes($_POST['mycontent']);
				$htmlData=mysql_escape_string($htmlData);
				} else {
				$htmlData = $_POST['mycontent'];
				$htmlData=addslashes($htmlData);
				}
			}*/
			$htmlData =deal_special_char($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			$department=trim($_POST['mydepart']);
                        $date=trim($_POST['date']);
                         $abs=trim($_POST['abs']);//头条摘要
			//$htmlData=trim($_POST['mycontent']);
			$time=date("H:i:s");
			$img_name = iconv( "UTF-8" , "GB2312" , $img_name );
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			$department = iconv( "UTF-8" , "GB2312" , $department);
                         $abs = iconv( "UTF-8" , "GB2312" , $abs);

			//查找是否有重复项
         	//$sql = "select * from nstc_dyinfo";
         	//$result = mysql_query($sql,$conn);
         	//while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 	//	if(strcasecmp($title,$row['title'])==0){
				//exit;
			
		   		//}	
	     	//}
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		//$sql = "update nstc_dyinfo set type='$type',title='$title',content='$htmlData',
	 		//author='$author',department='$department',date='$start_date',time='$time' where id='$dyinfo_id'";
	 		if($img_name==''){
	 			$sql = "update nstc_dyinfo set title='$title',content='$htmlData',
	 		author='$author',department='$department',date='$date',time='$time',abs='$abs' where id='$dyinfo_id'";
	    	//echo $sql;
	 		}else{
	 			$sql = "update nstc_dyinfo set title='$title',content='$htmlData',
	 		author='$author',department='$department',date='$date',time='$time',img_name='$img_name',img_flag='1',abs='$abs' where id='$dyinfo_id'";
	 		}
	    	$result = mysql_query($sql,$conn);
	    	
	    	mysql_close();
	    	//if($result){
	 		//echo "OK";
	    	//}else{
	    	echo $sql;
	    	//}
	 	break;
	 	
	 	case"dyinfo_audit":
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		$sql = "update nstc_dyinfo set audit='1' where id='$dyinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"headline":
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		$sql = "update nstc_dyinfo set headline='1' where id='$dyinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"unheadline":
	 		$dyinfo_id=trim($_POST['dyinfoId']);
	 		$sql = "update nstc_dyinfo set headline='0' where id='$dyinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"coreinfo_add":
	 		$img_name=trim($_POST['fileName']);//2010.8.18焦点图名称
	 		$type=trim($_POST['mytype']);
			$start_date=date("Y-m-d");
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$htmlData=trim($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			$time=date("H:i:s");
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$img_name = iconv( "UTF-8" , "GB2312" , $img_name );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			//查找是否有重复项
         	$sql = "select title from nstc_coreinfo ";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($title,$row[0])==0){
				exit;
			
		   		}	
	     	}
			$sql = "insert into nstc_coreinfo(id,type,title,content,author,date,time,audit,img_name) 
			values('','$type','$title','$htmlData','$author','$start_date','$time','0','$img_name')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case"coreinfo_init":
	 		//$sql = "select * from nstc_coreinfo order by type";
	 	       #$sql = "select * from nstc_coreinfo where type='0'";
                         $sql = "select * from nstc_coreinfo order by type";
	 		get_coreinfo_admin($sql);
	 	break;
	 	case"showcoreinfo_bytype":
	 		$type=trim($_POST['type']);
	 		if($type!=''){
	 			$sql = "select * from nstc_coreinfo where type='$type' order by date desc";
	 			get_coreinfo_admin($sql);
	 		}
	 	break;
	 	case"coreinfo_modify":
	 		$img_name=trim($_POST['fileName']);
	 		$date=date("Y-m-d");
	 		$time=date("H:i:s");
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$htmlData=trim($_POST['mycontent']);
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			$img_name = iconv( "UTF-8" , "GB2312" , $img_name );
			//查找是否有重复项
         	//$sql = "select title from nstc_coreinfo";
         	//$result = mysql_query($sql,$conn);
         	//while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 	//	if(strcasecmp($title,$row[0])==0){
			//	exit;
			
		   	//	}	
	     	//}
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		if($img_name==''){
	 		$sql = "update nstc_coreinfo set title='$title',content='$htmlData',
	 		author='$author', date='$date' ,time='$time' where id='$coreinfo_id'";
	 		}else{
	 		$sql = "update nstc_coreinfo set title='$title',content='$htmlData',
	 		author='$author', date='$date' ,time='$time', 
	 		img_name='$img_name' where id='$coreinfo_id'";
	 		}
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"coreinfo_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_coreinfo where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"coreinfo_audit":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_coreinfo set audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"service_add":
	 		$type=trim($_POST['mytype']);
	 		$title=trim($_POST['mytitle']);
			$start_date=date("Y-m-d");
			$author=trim($_POST['myauthor']);
			$htmlData=trim($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			$time=date("H:i:s");
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			
			$sql = "insert into nstc_test_service(id,type,title,content,author,date,time,audit) 
			values('','$type','$title','$htmlData','$author','$start_date','$time','0')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case"service_init":
	 		//$sql = "select * from nstc_test_service order by type";
	 		//$sql = "select * from nstc_test_service where type='0' order by date desc";
                          $sql = "select * from nstc_test_service order by type";

	 		get_service_admin($sql);
		break;
		case"showservice_bytype":
	 		$type=trim($_POST['type']);
	 		if($type!=''){
	 			$sql = "select * from nstc_test_service where type='$type' order by date desc";
	 			get_service_admin($sql);
	 		}
	 	break;
		case"service_modify":
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
                        $date=trim($_POST['date']);
			$htmlData=trim($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_test_service set title='$title',content='$htmlData',
	 		author='$author',date='$date' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"service_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_test_service where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"service_audit":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_test_service set audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"result_add":
	 		$type=trim($_POST['mytype']);
			$start_date=date("Y-m-d");
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$file_name=trim($_POST['fileName']);
			//$file_id=trim($_POST['fileId']);
			$firm=trim($_POST['myfirm']);
			$product=trim($_POST['myproduct']);
			$item=trim($_POST['myitem']);
			$time=date("H:i:s");
			
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$file_name = iconv( "UTF-8" , "GB2312" , $file_name );
			$firm = iconv( "UTF-8" , "GB2312" , $firm );
			$product = iconv( "UTF-8" , "GB2312" , $product );
			$item = iconv( "UTF-8" , "GB2312" , $item );
			//查找是否有重复项
         	$sql = "select title from nstc_test_result ";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($title,$row[0])==0){
				exit;
			
		   		}	
	     	}
			$sql = "insert into nstc_test_result(id,title,type,firm,test_product,test_item,
			test_date,test_result,author,date,time,audit) 
			values('','$title','$type','$firm','$product','$item','$start_date',
			'$file_name','$author','$start_date','$time','0')";
			//$sql = "insert into nstc_test_result(id,title,type,firm,test_product,test_item,
			//test_date,test_result,author,date,time,audit) 
			//values('','$title','$type','$firm','$product','$item','$start_date',
			//'$file_id','$author','$start_date','$time','0')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case"result_init":
	 		$sql = "select * from nstc_test_result order by type";
	 		//$sql = "select * from nstc_test_result where type='0' order by date desc";
	 		get_result_admin($sql);
		break;
		case"showresult_bytype":
	 		$type=trim($_POST['type']);
	 		if($type!=''){
	 			$sql = "select * from nstc_test_result where type='$type' order by date desc";
	 			get_result_admin($sql);
	 		}
	 	break;
		case"result_modify":
			$type=trim($_POST['mytype']);
			$date=trim($_POST['date']);//发布时间
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$file_name=trim($_POST['fileName']);
			$firm=trim($_POST['myfirm']);
			$product=trim($_POST['myproduct']);
			$item=trim($_POST['myitem']);
			$time=date("H:i:s");
			
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$file_name = iconv( "UTF-8" , "GB2312" , $file_name );
			$firm = iconv( "UTF-8" , "GB2312" , $firm );
			$product = iconv( "UTF-8" , "GB2312" , $product );
			$item = iconv( "UTF-8" , "GB2312" , $item );
			//查找是否有重复项
         	//$sql = "select title from nstc_test_result ";
         	//$result = mysql_query($sql,$conn);
         	//while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 	//	if(strcasecmp($title,$row[0])==0){
			//	exit;
			//
		   	//	}	
	     	//}
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		if($file_name==''){
	 		$sql = "update nstc_test_result set title='$title',type='$type',
	 		firm='$firm',test_product='$product',test_item='$item',
	 		author='$author',date='$date' where id='$coreinfo_id'";
	 		}else{
	 		$sql = "update nstc_test_result set title='$title',type='$type',
	 		firm='$firm',test_product='$product',test_item='$item',
	 		test_result='$file_name',author='$author',date='$date' where id='$coreinfo_id'";
	 		}
	 		
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"result_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_test_result where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"result_audit":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_test_result set audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"test_req_add":
	 		$type=trim($_POST['mytype']);
			$start_date=date("Y-m-d");
			$author=trim($_POST['myauthor']);
			$htmlData=trim($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			$time=date("H:i:s");
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
			$sql = "insert into nstc_test_req(id,type,content,author,date,time,audit) 
			values('','$type','$htmlData','$author','$start_date','$time','0')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case"test_req_init":
	 		$sql = "select * from nstc_test_req order by type";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">栏目</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建者</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];		
				$type=$row['type'];
				if($type=='0'){
					$type='现场委托';
				}else if($type=='1'){
					$type='寄送样品';
				}
				
				$author=$row['author'];
				$date=$row['date'];
				$audit=$row['audit'];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				//echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					<a href='javascript:;' onclick=modify_coreinfo('test_req_modify.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
		break;
		case"test_req_modify":
			//$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$htmlData=trim($_POST['mycontent']);
			$htmlData=stripslashes($htmlData);
			$htmlData=mysql_escape_string($htmlData);//转义非法的html字符
			//$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$htmlData = iconv( "UTF-8" , "GB2312" , $htmlData );
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_test_req set content='$htmlData',
	 		author='$author'where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"test_req_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_test_req where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	case"test_req_audit":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_test_req set audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"member_add":
	 		$img_name=trim($_POST['fileName']);//2010.8.18焦点图名称
			$type=trim($_POST['mytype']);
	 		$mem_name=trim($_POST['memName']);
	 		$mem_name = iconv( "UTF-8" , "GB2312" , $mem_name );
                        $mem_website=trim($_POST['mem_website']);
                         $mem_website=stripslashes($mem_website);
                        $mem_website=mysql_escape_string($mem_website);

	 		$mem_date=date("Y-m-d");
	 		$sql="insert into nstc_member(id,type,mem_name,mem_date,img_name,mem_website) values('','$type','$mem_name','$mem_date','$img_name','$mem_website')";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"frilink_add":
	 		$link_title=trim($_POST['link_title']);
	 		$link_addr=trim($_POST['link_addr']);
	 		$link_title = iconv( "UTF-8" , "GB2312" , $link_title );
	 		$link_addr = iconv( "UTF-8" , "GB2312" , $link_addr );
	 		//查找是否有重复项
         	$sql = "select title from nstc_friend_link ";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($link_title,$row[0])==0){
				exit;
			
		   		}	
	     	}
	 		$sql="insert into nstc_friend_link(id,title,addr) values('','$link_title','$link_addr')";
	 		$result = mysql_query($sql,$conn);
	 		if($result){
			echo "OK";
	 		}
	 	break;
	 	
	 	case"frilink_init":
	 		$sql = "select * from nstc_friend_link order by id";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">链接名称</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">链接地址</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];		
				$title=$row['title'];
				$addr=$row['addr'];
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$addr."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					<a href='javascript:;' onclick=modify_coreinfo('frilink_modify.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
		break;
		case"frilink_modify":
			$link_title=trim($_POST['link_title']);
	 		$link_addr=trim($_POST['link_addr']);
	 		$link_title = iconv( "UTF-8" , "GB2312" , $link_title );
	 		$link_addr = iconv( "UTF-8" , "GB2312" , $link_addr );
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		//查找是否有重复项
         	$sql = "select title from nstc_friend_link ";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($link_title,$row[0])==0){
				exit;
			
		   		}	
	     	}
	 		$sql="update  nstc_friend_link set title='$link_title',addr='$link_addr' where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		if($result){
			echo "OK";
	 		}
	 	break;
	 	
	 	case"frilink_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_friend_link where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		if($result){
			echo "OK";
	 		}
	 	break;
	 	
	 	case"member_init":
	 		$sql = "select * from nstc_member order by type";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">会员级别</span></div></td>
                      <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">会员名称</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">注册时间</span></div></td>
                   
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];		
				$type=$row['type'];
				if($type=='0'){
					$type='白金会员';
				}else if($type=='1'){
					$type='黄金会员';
				}
				$mem_name=$row['mem_name'];
				$date=$row['mem_date'];
				
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$mem_name."</td>";
				//echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
			
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
		break;
		case"member_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_member where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"download_add":
	 		$type=trim($_POST['mytype']);
			$start_date=date("Y-m-d");
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$file_name=trim($_POST['fileName']);
			
			$time=date("H:i:s");
			
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$file_name = iconv( "UTF-8" , "GB2312" , $file_name );
			
			//查找是否有重复项
         	$sql = "select title from nstc_download ";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($title,$row[0])==0){
				exit;
			
		   		}	
	     	}
			$sql = "insert into nstc_download(id,title,type,content,
			author,date,time,audit) 
			values('','$title','$type','$file_name',
			'$author','$start_date','$time','0')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case"download_init":
	 		$sql = "select * from nstc_download order by type";
	 		//$sql = "select * from nstc_download where type='0' order by date desc";
	 		get_download_admin($sql);
         	
		break;
		case"showdownload_bytype":
	 		$type=trim($_POST['type']);
	 		if($type!=''){
	 			$sql = "select * from nstc_download where type='$type' order by date desc";
	 			get_download_admin($sql);
	 		}
	 	break;
		case"download_modify":
			$type=trim($_POST['mytype']);
			$start_date=date("Y-m-d");//发布时间
			$title=trim($_POST['mytitle']);
			$author=trim($_POST['myauthor']);
			$file_name=trim($_POST['fileName']);
			
			$time=date("H:i:s");
			
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$author = iconv( "UTF-8" , "GB2312" , $author );
			$file_name = iconv( "UTF-8" , "GB2312" , $file_name );
			
			//查找是否有重复项
         	//$sql = "select title from nstc_download ";
         	//$result = mysql_query($sql,$conn);
         	//while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		//if(strcasecmp($title,$row[0])==0){
				//exit;
			
		   		//}	
	     	//}
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_download set title='$title',type='$type',
	 		content='$file_name',author='$author',date='$start_date',time='$time' where id='$coreinfo_id'";
	 		
	 		
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"download_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_download where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"download_audit":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_download set audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	
	 	case"quest_init":
	 		//$sql = "select nstc_question.id,ques_title,reg_name,reg_email,com_name,ques_date,nstc_question.audit
	 		// from nstc_question,nstc_reguser where nstc_question.user_id=nstc_reguser.id
	 		// order by nstc_question.audit ";
	 		$sql = "select nstc_question.id,ques_title,user_name,user_email,user_com,ques_date,nstc_question.audit
	 		 from nstc_question order by nstc_question.audit,ques_date desc ";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">提问者</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">email</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">公司名称</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">提问时间</span></div></td>
                     <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">回复状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row[0];
    			$ques_title=$row[1];
    			$reg_name=$row[2];
    			$reg_email=$row[3];
    			$com_name=$row[4];
    			$ques_date=$row[5];
    			$audit=$row[6];
    			if($audit=='0'){
    				$audit="未回复";
    			}else if($audit=='1'){
    				$audit="已回复";
    			}
    						   
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$ques_title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_email."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$com_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$ques_date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					
					<a href='javascript:;' onclick=modify_coreinfo('quest_answer.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />回 复</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
		break;
		case"quest_answer":
			$coreinfo_id=trim($_POST['coreinfoId']);
			$ques_content=trim($_POST['ques_content']);
			$title=trim($_POST['title']);
			$content=trim($_POST['mycontent']);
			$ques_content = iconv( "UTF-8" , "GB2312" , $ques_content );
			$title = iconv( "UTF-8" , "GB2312" , $title );
			$content = iconv( "UTF-8" , "GB2312" , $content );
			
	 		$sql = "update nstc_question set ques_title='$title',ques_content='$ques_content',ques_answer='$content',audit='1' 
	 		where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
		break;
		
		case"msg_init":
	 		$sql = "select *
	 		 from nstc_anony_msg 
	 		 order by audit ";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">提问者</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">email</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">公司名称</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">提问时间</span></div></td>
                     <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">回复状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];
    			$ques_title=$row['ques_title'];
    			$reg_name=$row['user_name'];
    			$reg_email=$row['user_email'];
    			$com_name=$row['user_com'];
    			$ques_date=$row['ques_date'];
    			$audit=$row['audit'];
    			if($audit=='0'){
    				$audit="未回复";
    			}else if($audit=='1'){
    				$audit="已回复";
    			}
    						   
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$ques_title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_email."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$com_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$ques_date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					
					<a href='javascript:;' onclick=modify_coreinfo('message_answer.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />回 复</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
		break;
		case"msg_answer":
			$coreinfo_id=trim($_POST['coreinfoId']);
			$content=trim($_POST['mycontent']);
			$content = iconv( "UTF-8" , "GB2312" , $content );
	 		$sql = "update nstc_anony_msg set ques_answer='$content',audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
		break;
		case"msg_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_anony_msg where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
		case"quest_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_question where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"connect_modify":
	 		//$coreinfo_id=trim($_POST['coreinfoId']);
	 		$person=trim($_POST['person']);
    		$tel=trim($_POST['tel']);
    		$fax=trim($_POST['fax']);
    		$email=trim($_POST['email']);
    		$addr=trim($_POST['addr']);
    		$zip=trim($_POST['zip']);
    		$person=iconv("UTF-8","GB2312",$person);
    		$addr=iconv("UTF-8","GB2312",$addr);
	 		$sql="update nstc_connect set connector='$person',tel='$tel',fax='$fax',
	 		email='$email',addr='$addr',zip='$zip'
	 		 where id='1'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	case"reguser_init":
	 		$sql = "select * from nstc_reguser order by reg_date desc";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">用户名</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">真实姓名</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">用户Email</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">所在公司</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">公司电话</span></div></td>
                     <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">注册时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];		
				$reg_name=$row['reg_name'];
				$reg_realname=$row['reg_realname'];
				$reg_email=$row['reg_email'];
				$com_name=$row['com_name'];
				$com_tel=$row['com_tel'];
				$reg_date=$row['reg_date'];
				$audit=$row['audit'];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_realname."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_email."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$com_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$com_tel."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_date."</td>";
				
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					<a href='javascript:;' onclick=modify_coreinfo('reguser_detail.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/view.png' width='12' height='12' />详 情</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除注册用户【".$reg_realname."】吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
		break;
	       	 case"userdown_init":
                        $sql = "select reg_realname,reg_tel,com_name,down_name,down_count,datetime,nstc_userdown.id from nstc_reguser,nstc_userdown where nstc_reguser.id=nstc_userdown.user_id order by nstc_userdown.user_id";
                $result = mysql_query($sql,$conn);
                        echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">真实姓名</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">所在公司</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">联系电话</span></div></td>
                     <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载内容</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载次数</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载时间</span></div></td>
  <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                
</tr>";

            $id=1;
                while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
                                $reg_realname=$row[0];
                                $reg_tel=$row[1];
                                $com_name=$row[2];
                                $down_name=$row[3];
                                $down_count=$row[4];
                                $datetime=$row[5];
                                $coreinfo_id=$row[6]; 

                                echo "<tr>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_realname."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$com_name."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$reg_tel."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$down_name."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$down_count."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$datetime."</td>";
  echo "<td height='20' bgcolor='#FFFFFF' align='center'><a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
                <img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";

                                echo "</tr>";
                                $id++;

                   }
                   echo "</table>";
                   mysql_close();
                  break;
                 case"userdown_del":                        
                        $coreinfo_id=trim($_POST['coreinfoId']);
                        $sql="delete from nstc_userdown where id='$coreinfo_id'";                             $result = mysql_query($sql,$conn);
                        echo "OK";
                break;

		case"reguser_del":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql="delete from nstc_reguser where id='$coreinfo_id'";
	 		$result = mysql_query($sql,$conn);
	 		
			echo "OK";
	 	break;
	 	
	 	case"reguser_audit":
	 		$coreinfo_id=trim($_POST['coreinfoId']);
	 		$sql = "update nstc_reguser set audit='1' where id='$coreinfo_id'";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	mysql_close();
	 		echo "OK";
	 	break;
	 	case "get_max_fileid":
	 		//获取下载文件的最大id号，为文件下载做准备
	 		 $fd = fopen('../save_test_result/max_file_id.txt',"r");
		if ( $fd )
		{
			while (!feof( $fd ))
			{
				$buffer = fgets($fd, 4096);
				$buffer=trim($buffer);
				echo $buffer;
			}
			fclose($fd);
		}
	 		//$fp=fopen("../save_test_result/max_file_id.txt","r");
 			//while(false==feof($fp)){
  			//echo fread($fp,1024);
 			//}
	 	break;
	 	
	 	
	 	//以下是日志管理，2010.10.16，邱全伟
	 	case "manage_add"://添加管理员
			$user_name=$_POST['userName'];//管理员名称
	    	$user_name = iconv( "UTF-8" , "GB2312" , $user_name );
	    	$user_pwd=md5($_POST['userPwd']);//管理员密码用md5加密
	    	$level=$_POST['level'];
	   		//查找测试集中是否有重复项
         	$sql = "select * from nstc_manage";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($user_name,$row['user_name'])==0){
		 		echo "repeat_manager";
				exit;
			
		   		}	
	     	}
	     	//用户名不能在用户表中出现
	     	$sql = "select reg_name from nstc_reguser";
         	$result = mysql_query($sql,$conn);
         	while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
		 		if(strcasecmp($user_name,$row[0])==0){
		 		echo "repeat_reguser";
				exit;
			
		   		}	
	     	}
	     
    		$sql = "insert into nstc_manage(id,user_name,pwd,level) values('','$user_name','$user_pwd','$level')";
	    	//echo $sql;
	    	$result = mysql_query($sql,$conn);
	    	//echo $result;
	    	mysql_close();
			echo "OK"; 
	 	break;
	 	
	 	case "manage_init":
	 		$sql = "select * from nstc_manage order by level";
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">管理员名称</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">备注</span></div></td>
                    <td  height=\"25\" background=\"../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {			
				$user_id=$row[0];
				$user_name=$row[1];
				$user_level=$row[3];
				if($user_level=='1'){
					$ps="<font color='red'>超级管理员</font>";
				}else if($user_level=='2'){
					$ps='普通管理员';
				}
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$row[1]."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$ps."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
				
             	
				
					<a href='javascript:;' onclick=modify_manage('manage_modify.php?userid=$user_id'); 
					><img src='../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除管理员【".$user_name."】吗？')){del_manage('".$user_id."');}\">
             	<img src='../images/del.gif' width='12' height='12' />删除</a>
             	"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
	 		break;
	 		
	 	case"manage_modify":
	 		$user_id=$_POST['userId'];//管理员名称
	    	$user_pwd=md5($_POST['userPwd']);//管理员密码用md5加密
	    	$level=$_POST['level'];
	   		//查找测试集中是否有重复项
         	$sql = "update nstc_manage set pwd='$user_pwd',level='$level' where id='$user_id'";
         	$result = mysql_query($sql,$conn);
         	echo "OK";
	 	break;
	 	
	 	case"manage_del":
	 		$user_id=$_POST['userId'];
	 		$sql = "delete from nstc_manage where id='$user_id'";
         	$result = mysql_query($sql,$conn);
         	//echo $user_id;
         	echo "OK";
	 	break;
		default:
			break;
	}
	
 }
 
 function get_dyinfo_admin($sql){
 			include("../../../include/db_mysql.php");
 			$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">类别</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建者</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">关注状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">是否头条</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$dyinfo_id=$row[0];		
				$type=$row[1];
				$tmp_type=$type;
				if($type=='0'){
					$type='行业动态';
				}else if($type=='1'){
					$type='项目合作';
				}else if($type=='2'){
					$type='测评研究';
				}else if($type=='4'){
					$type='中心公告';
				}else if($type=='3'){
                                        $type='人才招聘';
                                }
				$title=$row[2];
				$author=$row[4];
				$department=$row[5];
				$date=$row[6];
				$audit=$row[8];
				$fresh=$row['fresh'];
				$headline=$row['headline'];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
				if($fresh==0){
					$fresh='未关注';
				}else if($fresh==1){
					$fresh='已关注';
				}
				if($headline==0){
					$headline="否";
				}else{
					$headline="是";
				}
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' width='20%' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$fresh."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$headline."</td>";
				if($tmp_type==0){
				echo "<td height='20' bgcolor='#FFFFFF' align='center' width='30%'>
					<a href='javascript:;' onclick=modify_dyinfo('dyinfo_modify.php?dyinfoid=$dyinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除动态信息【".$title."】吗？')){del_dyinfo('".$dyinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>
             	&nbsp;
             		<a href='javascript:;' onclick=\"fresh_dyinfo('".$dyinfo_id."')\">
             	<img src='../../../images/up.png' width='12' height='12' />关注</a>
             	&nbsp;
             		<a href='javascript:;' onclick=\"nofresh_dyinfo('".$dyinfo_id."')\">
             	<img src='../../../images/down.png' width='12' height='12' />取消关注</a>"."</td>";
				}else{
					echo "<td height='20' bgcolor='#FFFFFF' style='padding-left:8px;'>
					<a href='javascript:;' onclick=modify_dyinfo('dyinfo_modify.php?dyinfoid=$dyinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除动态信息【".$title."】吗？')){del_dyinfo('".$dyinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				}
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
 
 }
 
 function get_coreinfo_admin($sql){
 			include("../../../include/db_mysql.php");
 			$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">栏目</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建者</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row[0];		
				$type=$row[1];
				if($type=='0'){
					$type='中心简介';
				}else if($type=='1'){
					$type='组织结构';
				}else if($type=='2'){
					$type='资质荣誉';
				}else if($type=='3'){
					$type='资源优势';
				}else if($type=='4'){
					$type='中心风采';
				}
				$title=$row[2];
				$author=$row[4];
				$date=$row[5];
				$audit=$row[7];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					<a href='javascript:;' onclick=modify_coreinfo('coreinfo_modify.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除中心概况【".$title."】吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
 }
 
 function get_service_admin($sql){
 			include("../../../include/db_mysql.php");
 			$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">栏目</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建者</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">创建时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>
                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row[0];		
				$type=$row[1];
				if($type=='0'){
					$type='测评规范';
				}else if($type=='1'){
					$type='认证培训';
				}/*else if($type=='2'){
					$type='测评对象';
				}*/else if($type=='3'){
					$type='测评项目';
				}else if($type=='4'){
					$type='测评流程';
				}else if($type=='5'){
					$type='测评对象';
				}
				$title=$row[2];
				$author=$row[4];
				$date=$row[5];
				$audit=$row[7];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
			   
				
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					<a href='javascript:;' onclick=modify_coreinfo('service_modify.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
 }
 
 function get_result_admin($sql){
 			include("../../../include/db_mysql.php");
 			$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">栏目</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">发布人员</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">发布时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载次数</span></div></td>
                <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>

                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];		
				$type=$row['type'];
				//$type=$row[2];
				if($type=='0'){
					$type='磁盘阵列';
				}else if($type=='1'){
					$type='存储系统';
				}else if($type=='2'){
                                        $type='文件系统';
                                }
                                else if($type=='3'){
                                        $type='数据库';
                                }
                                else if($type=='4'){
                                        $type='存储网络设备';
                                }
                                else if($type=='5'){
                                        $type='存储软件';
                                }
                                else if($type=='6'){
                                        $type='存储介质';
                                }

				$title=$row['title'];
				$author=$row['author'];
				$date=$row['date'];
				$audit=$row['audit'];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
			   
				$down_count=$row['down_count'];
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$down_count."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					<a href='javascript:;' onclick=modify_coreinfo('result_detail.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/view.png' width='12' height='12' />详 情</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href='javascript:;' onclick=modify_coreinfo('result_modify.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
 }
  
 
 function get_download_admin($sql){
 			include("../../../include/db_mysql.php");
         	$result = mysql_query($sql,$conn);
	 		echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"b5d6e6\" >
                <tr>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">序号</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">栏目</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">标题</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">文件名称</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">发布人员</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">发布时间</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">审核状态</span></div></td>
                    <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">下载次数</span></div></td>
                        <td  height=\"25\" background=\"../../../images/bg.gif\" bgcolor=\"#FFFFFF\" class=\"F12\"><div align=\"center\"><span class=\"F12\">操作</span></div></td>

                </tr>";
    	
            $id=1;
    		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {	
    			$coreinfo_id=$row['id'];		
				$type=$row['type'];
				
				if($type=='0'){
					$type='技术文档';
				}else if($type=='1'){
					$type='软件';
				}else if($type=='2'){
					$type='表格模板';
				}
				$title=$row['title'];
				$file_name=$row['content'];
				$author=$row['author'];
				$date=$row['date'];
				$audit=$row['audit'];
				if($audit=='0'){
					$audit='未通过';
				}else{
					$audit='通过';
				}
			   
				$down_count=$row['down_count'];
				echo "<tr>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$id."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$type."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$title."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$file_name."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$author."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$date."</td>";
				echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$audit."</td>";
                                echo "<td height='20' bgcolor='#FFFFFF' align='center'>".$down_count."</td>";

				echo "<td height='20' bgcolor='#FFFFFF' align='center'>
					
					<a href='javascript:;' onclick=modify_coreinfo('download_modify.php?coreinfoid=$coreinfo_id'); 
					><img src='../../../images/edt.gif' width='12' height='12' />修 改</a>
             			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             		<a href='javascript:;' onclick=\"javascript:if(confirm('确定要删除吗？')){del_coreinfo('".$coreinfo_id."');}\">
             	<img src='../../../images/del.gif' width='12' height='12' />删 除</a>"."</td>";
				echo "</tr>";
				$id++;
			}
				echo "</table>"; 
				mysql_close();
}
?>
