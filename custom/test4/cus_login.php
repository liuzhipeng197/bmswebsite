<?php
  /*
  bms前台逻辑文件，主要用于事务处理
  创建者：邱全伟
  创建日期：2012.11.2
  */
    session_start();
    header('Content-Type:text/html;charset=GB2312');
	//include("../include/db_mysql.php");
	include("../../admin/include/db_mysql.php");
	global $table_name;//全局变量
    if ( isset( $_POST['action'] ) ) {
	   $action = $_POST['action'];
     } elseif ( isset( $_GET['action'] ) ) {
	   $action = $_GET['action'];
     }

    if ( isset( $action ) ) {
	switch ($action){
	case "cus_login"://客户登录
		$str_username = trim( $_POST['username'] );
		$str_passwd = md5(trim( $_POST['password'] ));
		$verificationCode = $_POST['vercode'];
		//$usertype=$_POST['usertype'];
		//echo 'userytpe='.$usertype;
		if(!(md5($verificationCode)==$_SESSION['vcode'])){
			echo "vcode_error";
		}
		else{
			$sql = "select * from bms_custom where cus_name='$str_username' and cus_pwd='$str_passwd'";
			//echo $sql;
			mysql_query("SET NAMES 'gb2312'");  
			$result=mysql_query($sql,$conn);
			//$nums = mysql_num_rows($result);
			$row = mysql_fetch_array($result);
			if ($row == null ){
				echo "login_error";
			}
			else{
				$_SESSION['cus_id']=$row['cus_id'];
				$_SESSION['cus_name']=$row['cus_name'];
				$_SESSION['cus_realname']=$row['cus_realname'];
				//$_SESSION['level']=$row['level'];
				$_SESSION['login']='yes';
				header("Content-type:text/html;charset=GB2312");
				echo "OK";
			}
		}
		break;
				
	case"register":				//注册用户信息
		$cus_name=trim($_POST['cus_name']);
		$cus_pwd=md5(trim($_POST['cus_pwd']));
		$cus_email=trim($_POST['cus_email']);
		$cus_realname=trim($_POST['cus_realname']);
		$question=trim($_POST['question']);
		$answer=trim($_POST['answer']);
		$cus_tel=trim($_POST['cus_tel']);
		$com_name=trim($_POST['com_name']);
		$com_addr=trim($_POST['com_addr']);
		$com_zip=trim($_POST['com_zip']);
		$com_website=trim($_POST['com_website']);
		$com_tel=trim($_POST['com_tel']);
		$com_fax=trim($_POST['com_fax']);

		$reg_date=date("Y-m-d");
		$reg_time=date("H:i:s");		
		//转换编码
		$cus_name = iconv( "UTF-8" , "GB2312" , $cus_name );
		$cus_realname = iconv( "UTF-8" , "GB2312" , $cus_realname );
		$answer = iconv( "UTF-8" , "GB2312" , $answer );
		$com_name = iconv( "UTF-8" , "GB2312" , $com_name );
		$com_addr = iconv( "UTF-8" , "GB2312" , $com_addr );
		//用户名不能在用户表和管理员列表中出现
		$sql = "select staff_name from bms_staff";
		$result = mysql_query($sql,$conn);
		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
			if(strcasecmp($cus_name,$row[0])==0){
/*				echo"
				<script language=\"javascript\">
				document.getElementById('cus_name').value=\"\";
				document.getElementById('cus_name').focus();
				</script>";*/
				exit;			
			}	
		}
		$sql = "select cus_name from bms_custom";
		$result = mysql_query($sql,$conn);
		while ($row = @mysql_fetch_array($result, MYSQL_BOTH)) {
			if(strcasecmp($cus_name,$row[0])==0){
				exit;
			}	
		}
		
		$sql="insert into bms_custom(cus_id ,cus_name ,cus_pwd ,cus_email ,cus_tel ,
		question ,answer ,reg_date ,reg_time ,cus_realname ,com_name ,
		com_addr ,com_zip ,com_website ,com_tel ,com_fax ,audit )
		values('','$cus_name','$cus_pwd','$cus_email','$cus_tel',
		'$question','$answer','$reg_date','$reg_time','$cus_realname',
		'$com_name','$com_addr','$com_zip','$com_website','$com_tel','$com_fax','0'
		)";
		$result = mysql_query($sql,$conn);
		if($result){
			echo "OK";
		}
		mysql_close();
		break;
		
	case"forget_pwd":
		//注册用户信息
		$cus_name=trim($_POST['cus_name']);
		$cus_realname=trim($_POST['cus_realname']);
		$question=trim($_POST['question']);
		$answer=trim($_POST['answer']);		
		//转换编码
		$cus_name = iconv( "UTF-8" , "GB2312" , $cus_name );
		$cus_realname = iconv( "UTF-8" , "GB2312" , $cus_realname );
		$answer = iconv( "UTF-8" , "GB2312" , $answer );

		$sql = "select cus_id from bms_custom where cus_name='$cus_name' 
		and cus_realname='$cus_realname' and question='$question' and answer='$answer'";
		$result = mysql_query($sql,$conn);
		$row = @mysql_fetch_array($result, MYSQL_BOTH);
		$set_pwd_id=$row[0];//如果id>0,这说明用户输入正确
		if($set_pwd_id>0){
			$_SESSION['ser_perpwd_id']=$set_pwd_id;
			echo "OK";
		}else{
			exit();
		}
		break;

	case"set_pwd":
		$cus_id=trim($_POST['cus_id']);
		$cus_pwd=md5(trim($_POST['cus_pwd']));
		$sql="update bms_custom set cus_pwd='$cus_pwd' where cus_id='$cus_id'";
		$result = mysql_query($sql,$conn);
		if($result){
			echo "OK";
		}
		break;
		
	case"modify_pwd":
		$str_logname=trim($_POST['str_logname']);
		$date_logdate=date("Y-m-d");
		$time_logtime=date("H:i:s");
		
		$str_logname = iconv( "UTF-8" , "GB2312" , $str_logname );
			
		$str_id=trim($_POST['str_id']);
		$old_pwd=md5(trim($_POST['old_pwd']));
		$new_pwd=md5(trim($_POST['new_pwd']));
		$sql="Select cus_pwd from bms_custom Where cus_id='$str_id'";
		$result=mysql_query($sql,$conn);
		$row = @mysql_fetch_array($result, MYSQL_BOTH);
		$pwd=$row[0];
		if($pwd!=$old_pwd){
			echo "pwd error";
			break;
		}
		
		$sql="update bms_custom set cus_pwd='$new_pwd' where cus_id='$str_id'";
		$result = mysql_query($sql,$conn);
		if($result){
			$str_content="【".$str_logname."】修改了自己的密码。";
			$sql = "insert into bms_cus_log values('','$date_logdate','$time_logtime','$str_logname','$str_content');";
			$result = mysql_query($sql,$conn);
			echo "OK";
		}
		break;

	case"modify_req":
		//修改客户委托书
			$str_logname=trim($_POST['str_logname']);
			$date_logdate=date("Y-m-d");
			$time_logtime=date("H:i:s");
			
			$str_logname = iconv( "UTF-8" , "GB2312" , $str_logname );
			
			$uid=trim($_POST['uid']);
			$req_id=trim($_POST['req_id']);
			$str_samplename=$_POST['sample_name'];
			$req_table=trim($_POST['req_table']);
	 		$req_text=$_POST['req_text'];
			$req_chk=$_POST['req_chk'];//checkbox内容
			//$req_chk=$_POST['req_chk'];
			$content=$req_text.$req_chk;
			$content = iconv( "UTF-8" , "GB2312" , $content );
			//echo $content;
			//echo $subject_id;
			//根据req_table来获取对应的subject_id
			$sql="select subject_id from subject where subject_name2='$req_table'";
			$subject_id=get_result_first($sql);
			$tmp=array();
			$temp=1;
			$ary_name=array();
            $ary_name2=array();
            $ary_field=array();
            $ary_val=array();
            $ary_name=explode(",",$content);//按逗号进行分割
            for($i=0;$i<count($ary_name);$i++){
                $ary_name2=explode("|",$ary_name[$i]);//按竖线进行分割
                array_push($ary_field,$ary_name2[0]);//存放数据库字段
                array_push($ary_val,$ary_name2[1]);//存放字段值
            }
			//array_pop($ary_field);//删除最后一个空值
			//array_pop($ary_val);//删除最后一个空值
			
			 //查找相同的元素，并删除
			array_pop($ary_field);//删除最后一个空值
			array_pop($ary_val);//删除最后一个空值
            $b=array_count_values($ary_field);
            $i=0;
            while($i<count($ary_field)){
				for($j=$i+1;$j<count($ary_field);$j++){
					if($ary_field[$i]==$ary_field[$j]) {
					$ary_val[$i]=$ary_val[$i].";".$ary_val[$j];//用分号拼接
					$temp=$j;
					//echo $temp;
					array_push($tmp,$temp);
					}
				}
                $i=$temp++; 
            }
			for($i=0;$i<count($tmp);$i++){
                unset( $ary_field[$tmp[$i]]);//删除重复元素
                unset ($ary_val[$tmp[$i]]);//删除重复元素
			}
			//更新数据库
			$myrow=array();
			$myrow=array_combine($ary_field,$ary_val);//合并键值
			//print_r($myrow);
			$update_sql="";
			$str_content="";
			foreach ( $myrow as $key => $value ) {
				//$sqlfield =$sqlfield.$key.",";
				//$sqlvalue =$sqlvalue."'".$value."',";
				$update_sql=$update_sql."$key='$value'".",";
				
				//取样品总数更新bms_task_reg
				$sql="Select s1.subject_name2 from subject as s1,subject as s2 Where s2.subject_name2='$req_table' and s1.parents=s2.subject_id and s1.subject_name ='样品总数量'";
				$result=mysql_query($sql,$conn);
				$row_sample = @mysql_fetch_array($result, MYSQL_BOTH);
				$str_samplename2=$row_sample[0];
				
				//取修改前的值
				$sql="Select $key from $req_table Where id='$req_id'";
				$result=mysql_query($sql,$conn);
				$row_old = @mysql_fetch_array($result, MYSQL_BOTH);
				$old=$row_old[0];
				//echo $old;
				//echo $row_old[0];
				//$old=get_result_first($sql);
				//echo $old;
				//if($value!=$row_old[0]){
				if($value!=$old){
					$sql="Select s1.subject_name from subject=s1,subject=s2 Where s1.subject_name2='$key' AND s2.subject_name2='$req_table' AND s1.parents=s2.subject_id";
					$result=mysql_query($sql,$conn);
					$row_modify =mysql_fetch_array($result, MYSQL_BOTH);
					//$subject_name=get_result_first($sql);
					$subject_name=$row_modify[0];
					$str_content=$str_content."$row_modify[0]由(".$row_old[0].")改为(".$value.");";
					//$str_content=$str_content."$subject_name由<".$old.">改为<".$value.">.";
					//$str_content=$str_content."'$subject_name'"."由"."'$old'"."改为'$value' ;";
				}
				if($key==$str_samplename2){//记录样品数量
					$int_samplenum=$value;
				}
			}
			
			$sql="update bms_task_reg set sample_total='$int_samplenum' where req_id='$req_id' and req_table='$req_table'";
			$result = mysql_query($sql,$conn);
			
			$sql="update $req_table "."set ".$update_sql;
			//去掉sql最后一个逗号
			$sql=substr($sql,0,strlen($sql)-1);
			$sql=$sql." "."where id='$req_id'";
			$result = mysql_query($sql,$conn);
			//echo $sql;
         	if($result){
			//echo $sql;
			//计算预计费用和检验周期
				//获取检验依据、检验项目、样品总数量对应的数据库字段
				$sql="select subject_name2 from subject where parents='$subject_id' and subject_name like '%检验依据%'"; 
				$test_accord=get_result_first($sql);
				$sql="select subject_name2 from subject where parents='$subject_id' and subject_name like '%检验项目%'"; 
				$test_item=get_result_first($sql);
				$sql="select subject_name2 from subject where parents='$subject_id' and subject_name like '%样品总数量%'"; 
				$sample_total=get_result_first($sql);
				
				//分别获取用户申请的检验依据，检验项目，样品总数量对应的内容				
				
				$sql="select $test_accord,$test_item,$sample_total from $req_table where id='$req_id'";
				//echo $sql;
				$result=mysql_query($sql,$conn);
				$row=mysql_fetch_array($result);
				$test_accord_val=$row[0];
				$test_item_val=$row[1];
				$sample_total_val=$row[2];//样品总量
				$test_fee=0;//检验费用初始化
				$test_cycle=0;//检验周期初始化
				//从subject2表中，根据检验依据来查找对应的项目、检验费用和检验周期
				$ary_test_accord=explode(";",$test_accord_val);//按分号分割检验依据
				
				//print_r($ary_test_accord);
				foreach($ary_test_accord as $res){
					//获取标准对应的id号
					$sql="select subject_id from subject2 where subject_name='$res'";
					$meta_id=get_result_first($sql);
					//根据id号获取检验项目和费用
					$sql="select meta_name,meta_type,cycle from metadata_subjects2 where subject_id='$meta_id' ";
					$result=mysql_query($sql,$conn);
					while($row=mysql_fetch_array($result)){
						$meta_name=$row['meta_name'];//检验项目
						$meta_type=$row['meta_type'];//检验费用，单价
						$cycle=$row['cycle'];//检验周期
						if(strstr($test_item_val,$meta_name)){
							//获取单价的数字,直接转换
							//preg_match('/\d+/', $meta_type, $match);
							$int_price=(int)$meta_type;
							$test_fee=$test_fee + $int_price*(int)$sample_total_val;
							if(strstr($cycle,"时")){
								$cycle=(float)$cycle;
							}else if(strstr($cycle,"天")||strstr($cycle,"日")){
								$cycle=(float)$cycle*8;
							}
							$test_cycle=$test_cycle + $cycle*(int)$sample_total_val;
						}
					}
					
				}
				$test_cycle=ceil($test_cycle/8); //将检验周期转成，以”天“为单位。
				
				//更新费用和时间和委托书号
				$sql = "update bms_task_reg set fee='$test_fee',cycle='$test_cycle' where uid='$uid' and req_id='$req_id' and req_table='$req_table' ";
         	$result = mysql_query($sql,$conn);
         	if($result){
				$str_content="【".$str_logname."】将样品名称为【".$str_samplename."】的业务申请的"."【".$str_content."】";
				$sql = "insert into bms_cus_log values('','$date_logdate','$time_logtime','$str_logname','$str_content');";
				$result = mysql_query($sql,$conn);
				echo "OK";
			}
				
         	
			}
		break;
	
	case"modify_sample_info":
		//修改客户样品信息
		$str_logname=trim($_POST['str_logname']);
		$date_logdate=date("Y-m-d");
		$time_logtime=date("H:i:s");
		
		$sample_id=trim($_POST['sample_id']);
		$req_text=$_POST['req_text'];
		//$req_chk=$_POST['req_chk'];
		$content=$req_text;
		$content = iconv( "UTF-8" , "GB2312" , $content );
		$str_logname = iconv( "UTF-8" , "GB2312" , $str_logname );
		//echo $content;
		//echo $subject_id;
		
		$tmp=array();
		$temp=1;
		$ary_name=array();
		$ary_name2=array();
		$ary_field=array();
		$ary_val=array();
		$ary_name=explode(",",$content);//按逗号进行分割
		for($i=0;$i<count($ary_name);$i++){
			$ary_name2=explode("|",$ary_name[$i]);//按竖线进行分割
			array_push($ary_field,$ary_name2[0]);//存放数据库字段
			array_push($ary_val,$ary_name2[1]);//存放字段值
		}
		array_pop($ary_field);//删除最后一个空值
		array_pop($ary_val);//删除最后一个空值
		//更新数据库
		$myrow=array();
		$myrow=array_combine($ary_field,$ary_val);//合并键值
		//print_r($myrow);
		$sql="select * from bms_sample where id='$sample_id'";
		$result=mysql_query($sql,$conn);
		$row = @mysql_fetch_array($result, MYSQL_BOTH);
		//echo $row[1];
		$i=1;
		$update_sql="";
		$str_content="";
		foreach ( $myrow as $key => $value ) {
			//$sqlfield =$sqlfield.$key.",";
			//$sqlvalue =$sqlvalue."'".$value."',";
			$update_sql=$update_sql."$key='$value'".",";
			if($value!=$row[$i]){
				$sql="Select COLUMN_COMMENT from INFORMATION_SCHEMA.COLUMNS Where table_name = 'bms_sample' AND table_schema = 'bmsdb' AND column_name = '$key'";
				$result=mysql_query($sql,$conn);
				$row_modify = @mysql_fetch_array($result, MYSQL_BOTH);
				//$subject_name=get_result_first($sql);
				$str_content=$str_content."$row_modify[0]由<$row[$i]>改为<$value>.";
			}
			$i++;
			//$dbdata=$dbdata."$value".",";
		}
		//echo $str_content;
/*		$dbdata=substr($dbdata,0,strlen($dbdata)-1);
		$sql="select * from bms_sample where id='$sample_id'";
		$result=mysql_query($sql,$conn);
		$row = @mysql_fetch_array($result, MYSQL_BOTH);
		$int_num=cout($row);
		for($i=1;$i<$int_num;$i++){
			$dbdata=$dbdata.row[$i].",";
		}*/
		
		$sql="update bms_sample "."set ".$update_sql;
		//去掉sql最后一个逗号
		$sql=substr($sql,0,strlen($sql)-1);
		$sql=$sql." "."where id='$sample_id'";
		$result = mysql_query($sql,$conn);
		//echo $sql;$str_sname
		if($result){
			//echo $sql;
			$sql="Select sample_name from bms_sample Where id = '$sample_id'";
			$result=mysql_query($sql,$conn);
			$row = @mysql_fetch_array($result, MYSQL_BOTH);
			$str_sname=$row[0];
			
			$str_content="【".$str_logname."】将样品名称为【".$str_sname."】的业务申请的"."【".$str_content."】";
			$sql = "insert into bms_cus_log values('','$date_logdate','$time_logtime','$str_logname','$str_content');";
			$result = mysql_query($sql,$conn);
			echo "OK";
		}
		break;
		
	case"bus_del":					//删除业务申请
		$str_logname=trim( $_POST['str_logname']);
		$date_logdate=date("Y-m-d");
		$time_logtime=date("H:i:s");
		
		$str_id=trim($_POST['str_id']);
		$str_samplename=trim($_POST['str_samplename']);
			
		$str_samplename = iconv( "UTF-8" , "GB2312" , $str_samplename );
		$str_logname = iconv( "UTF-8" , "GB2312" ,$str_logname );
		
		$sql="select req_id,sample_id,req_table from bms_task_reg where id='$str_id'";
		$result=mysql_query($sql,$conn);
		$row = @mysql_fetch_array($result, MYSQL_BOTH);
		$req_id=$row['req_id'];
		$sample_id=$row['sample_id'];
		$req_table=$row['req_table'];
		
		$sql="select file_name from bms_doc where req_id='$req_id' and req_table='$req_table'";
		$result=mysql_query($sql,$conn);
		$row = @mysql_fetch_array($result, MYSQL_BOTH);
		$file_name=$row['file_name'];
		$file_name="../store/".$file_name;
		
		$sql="delete from bms_sample where id='$sample_id'";
		$result = mysql_query($sql,$conn);
		
		$sql="delete from bms_doc where req_id='$req_id' and req_table='$req_table'";
		$result = mysql_query($sql,$conn);
		
		$sql="delete from bms_task_reg where id='$str_id'";
		$result = mysql_query($sql,$conn);
   
		unlink($file_name);
		//echo $file_name;
		if($result)
		{
			$str_content="【".$str_logname."】删除了样品名称为【".$str_samplename."】的检测申请";
			$sql = "insert into bms_cus_log values('','$date_logdate','$time_logtime','$str_logname','$str_content');";
			$result = mysql_query($sql,$conn);
			//echo $sql;
			echo "OK";
		}
		break;
	
		case "modify_personal_info":				//修改客户信息
			$str_logname=trim( $_POST['str_logname']);
			$str_message=trim( $_POST['str_message']);
			$date_logdate=date("Y-m-d");
			$time_logtime=date("H:i:s");
			
			$str_message = iconv( "UTF-8" , "GB2312" , $str_message );
			$str_logname = iconv( "UTF-8" , "GB2312" , $str_logname );
			
			$str_id=trim( $_POST['str_id']);
			$str_realname=trim( $_POST['str_realname']);
			$str_email=trim( $_POST['str_email']);
			$str_custel=trim( $_POST['str_custel']);
			$str_comname=trim( $_POST['str_comname']);
			$str_website=trim( $_POST['str_website']);
			$str_zip=trim( $_POST['str_zip']);
			$str_addr=trim( $_POST['str_addr']);
			$str_comtel=trim( $_POST['str_comtel']);
			$str_fax=trim( $_POST['str_fax']);
			//echo $str_id;
			$str_addr = iconv( "UTF-8" , "GB2312" , $str_addr );
			$str_comname = iconv( "UTF-8" , "GB2312" , $str_comname );
			$str_realname = iconv( "UTF-8" , "GB2312" , $str_realname );
			
			$sql = "update bms_custom set cus_email='$str_email',cus_tel='$str_custel',cus_realname='$str_realname',com_name='$str_comname',com_tel='$str_comtel',com_website='$str_website',com_addr='$str_addr',com_zip='$str_zip',com_fax='$str_fax' where cus_id='$str_id'";
			$result = mysql_query($sql,$conn);
			//echo $sql;
			if($result)
			{
				$str_content="【".$str_logname."】将【".$str_message."】";
				$sql = "insert into bms_cus_log values('','$date_logdate','$time_logtime','$str_logname','$str_content');";
				$result = mysql_query($sql,$conn);
				//echo $sql;
				echo "OK";
			}
			break;
		
		case"save_req_baseinfo":
	 		$subject_id=$_POST['subject_id'];
			$uid=$_POST['uid'];
			$_SESSION['subject_id']=$subject_id;
			$_SESSION['uid']=$uid;
			$req_text=$_POST['req_text'];
			$req_chk=$_POST['req_chk'];
			$content=$req_text.$req_chk;
			$content = iconv( "UTF-8" , "GB2312" , $content );
			//echo $content;
			//echo $subject_id;
			
			$tmp=array();
			$temp=1;
			$ary_name=array();
            $ary_name2=array();
            $ary_field=array();
            $ary_val=array();
            $ary_name=explode(",",$content);//按逗号进行分割
            for($i=0;$i<count($ary_name);$i++){
                $ary_name2=explode("|",$ary_name[$i]);//按竖线进行分割
                array_push($ary_field,$ary_name2[0]);//存放数据库字段
                array_push($ary_val,$ary_name2[1]);//存放字段值
            }
            //查找相同的元素，并删除
			array_pop($ary_field);//删除最后一个空值
			array_pop($ary_val);//删除最后一个空值
            $b=array_count_values($ary_field);
            $i=0;
            while($i<count($ary_field)){
				for($j=$i+1;$j<count($ary_field);$j++){
					if($ary_field[$i]==$ary_field[$j]) {
					$ary_val[$i]=$ary_val[$i].";".$ary_val[$j];//用分号拼接
					$temp=$j;
					//echo $temp;
					array_push($tmp,$temp);
					}
				}
                $i=$temp++; 
            }
			for($i=0;$i<count($tmp);$i++){
                unset( $ary_field[$tmp[$i]]);//删除重复元素
                unset ($ary_val[$tmp[$i]]);//删除重复元素
			}
			//sort($ary_field);
			//sort($ary_val);
			array_push($ary_field,"id");//增加id字段
            array_push($ary_val,"");//id字段默认为空

			//print_r($ary_field);
			//print_r($ary_val);
			
			//插入数据库
			$myrow=array();
			$myrow=array_combine($ary_field,$ary_val);//合并键值
			//print_r($myrow);
			foreach ( $myrow as $key => $value ) {
				$sqlfield =$sqlfield.$key.",";
				$sqlvalue =$sqlvalue."'".$value."',";
			
			}
			//echo $sqlfield;
			//echo $sqlvalue;
			$sql="select subject_name2 from subject where subject_id='$subject_id'";
			$table_name=get_result_first($sql);
			//echo '$table='.$table_name;
			$_SESSION['req_table']=$table_name;
			$sql="insert into $table_name"."(".substr($sqlfield,0,-1).") VALUES (".substr( $sqlvalue,0,-1).")";
			//echo '$sql='.$sql;
			$result = mysql_query($sql,$conn);
			/*if($result){
				//插入任务登记表中
				$ins_id=mysql_insert_id();
				//echo "$ins_id:$uid";
				$sql="select subject_name from subject where subject_id='$subject_id'";
				$sample_type=get_result_first($sql);
				$req_date=date("Y-m-d");
				$req_time=date("H:i:s");
				$sql="insert into bms_task_reg(id,uid,req_id,sample_type,req_date,req_time,deal,req_table) values('','$uid','$ins_id','$sample_type',
				'$req_date','$req_time','0','$table_name')";
				$result = mysql_query($sql,$conn);
				if($result){
					echo "OK";
				}
			}*/
			if($result){
				//计算预计费用和检验周期
				//获取检验依据、检验项目、样品总数量对应的数据库字段
				$sql="select subject_name2 from subject where parents='$subject_id' and subject_name like '%检验依据%'"; 
				$test_accord=get_result_first($sql);
				$sql="select subject_name2 from subject where parents='$subject_id' and subject_name like '%检验项目%'"; 
				$test_item=get_result_first($sql);
				$sql="select subject_name2 from subject where parents='$subject_id' and subject_name like '%样品总数量%'"; 
				$sample_total=get_result_first($sql);
				
				//分别获取用户申请的检验依据，检验项目，样品总数量对应的内容				
				$ins_id=mysql_insert_id();//获取刚才插入的id
				$sql="select $test_accord,$test_item,$sample_total from $table_name where id='$ins_id'";
				//echo $sql;
				$result=mysql_query($sql,$conn);
				$row=mysql_fetch_array($result);
				$test_accord_val=$row[0];
				$test_item_val=$row[1];
				$sample_total_val=$row[2];//样品总量
				$test_fee=0;//检验费用初始化
				$test_cycle=0;//检验周期初始化
				//从subject2表中，根据检验依据来查找对应的项目、检验费用和检验周期
				$ary_test_accord=explode(";",$test_accord_val);//按分号分割检验依据
				//print_r($ary_test_accord);
				foreach($ary_test_accord as $res){
					//获取标准对应的id号
					$sql="select subject_id from subject2 where subject_name='$res'";
					$meta_id=get_result_first($sql);
					//根据id号获取检验项目和费用
					$sql="select meta_name,meta_type,cycle from metadata_subjects2 where subject_id='$meta_id' ";
					$result=mysql_query($sql,$conn);
					while($row=mysql_fetch_array($result)){
						$meta_name=$row['meta_name'];//检验项目
						$meta_type=$row['meta_type'];//检验费用，单价
						$cycle=$row['cycle'];//检验周期
						if(strstr($test_item_val,$meta_name)){
							//获取单价的数字,直接转换
							//preg_match('/\d+/', $meta_type, $match);
							$int_price=(int)$meta_type;
							$test_fee=$test_fee + $int_price*(int)$sample_total_val;
							if(strstr($cycle,"时")){
								$cycle=(float)$cycle;
							}else if(strstr($cycle,"天")||strstr($cycle,"日")){
								$cycle=(float)$cycle*8;
							}
							$test_cycle=$test_cycle + $cycle*(int)$sample_total_val;
						}
					}
					
				}
				$test_cycle=ceil($test_cycle/8); //将检验周期转成，以”天“为单位。
				
				//echo "$ins_id:$uid";
				//插入任务登记表中
				$sql="select subject_name from subject where subject_id='$subject_id'";
				$sample_type=get_result_first($sql);
				$req_date=date("Y-m-d");
				$req_time=date("H:i:s");
				$sql="insert into bms_task_reg(id,uid,req_id,sample_type,req_date,req_time,deal,req_table,fee,cycle,sample_total) values('','$uid','$ins_id','$sample_type',
				'$req_date','$req_time','0','$table_name','$test_fee','$test_cycle','$sample_total_val')";
				$result = mysql_query($sql,$conn);
				if($result){
					echo "OK";
				}
			}
			mysql_close();
				 		
	 	break;
		
		/*case"upload":
			$filepath = "../store/";
			$fileid=$_POST['fileid'];
			$filepath = $filepath.basename( $_FILES[$fileid]['name']);
			move_uploaded_file($_FILES[$fileid]['tmp_name'], $filepath);
			echo "OK";
		break;*/
		case"sample_baseinfo":
			/*uid:uid,sample_name:sample_name,speci:speci,chip_speci:chip_speci,cos_v:cos_v,ym:ym,tk:tk,
			host:host,host_ps:host_ps,ic:ic,ic_ps:ic_ps,screen:screen,screen_ps:screen_ps,mouse:mouse,mouse_ps:mouse_ps,keyboard:keyboard,
			keyboard_ps:keyboard_ps,power_wire:power_wire,power_wire_ps:power_wire_ps,power_adapt:power_adapt,
			power_adapt_ps:power_adapt_ps,data_wire:data_wire,data_wire_ps:data_wire_ps,cdrom:cdrom,cdrom_ps:cdrom_ps,workbook:workbook,workbook_ps:workbook_ps,pack:pack,pack_ps:pack_ps,
			another:another,another_ps:another_ps*/
			//$uid=$_POST['uid'];
			$sample_name=$_POST['sample_name'];
			$sample_name = iconv( "UTF-8" , "GB2312" , $sample_name );
			$speci=$_POST['speci'];
			$speci = iconv( "UTF-8" , "GB2312" , $speci );
			$chip_speci=$_POST['chip_speci'];
			$chip_speci = iconv( "UTF-8" , "GB2312" , $chip_speci );
			$cos_v=$_POST['cos_v'];
			$cos_v = iconv( "UTF-8" , "GB2312" , $cos_v );
			$ym=$_POST['ym'];
			$ym = iconv( "UTF-8" , "GB2312" , $ym );
			$tk=$_POST['tk'];
			$tk = iconv( "UTF-8" , "GB2312" , $tk );
			$host=$_POST['host'];
			$host = iconv( "UTF-8" , "GB2312" , $host );
			$host_ps=$_POST['host_ps'];
			$host_ps = iconv( "UTF-8" , "GB2312" , $host_ps );
			$ic=$_POST['ic'];
			$ic = iconv( "UTF-8" , "GB2312" , $ic );
			$ic_ps=$_POST['ic_ps'];
			$ic_ps = iconv( "UTF-8" , "GB2312" , $ic_ps );
			$screen=$_POST['screen'];
			$screen = iconv( "UTF-8" , "GB2312" , $screen );
			$screen_ps=$_POST['screen_ps'];
			$screen_ps = iconv( "UTF-8" , "GB2312" , $screen_ps );
			$mouse=$_POST['mouse'];
			$mouse = iconv( "UTF-8" , "GB2312" , $mouse );
			$mouse_ps=$_POST['mouse_ps'];
			$mouse_ps = iconv( "UTF-8" , "GB2312" , $mouse_ps );
			$keyboard=$_POST['keyboard'];
			$keyboard = iconv( "UTF-8" , "GB2312" , $keyboard );
			$keyboard_ps=$_POST['keyboard_ps'];
			$keyboard_ps = iconv( "UTF-8" , "GB2312" , $keyboard_ps );
			$power_wire=$_POST['power_wire'];
			$power_wire = iconv( "UTF-8" , "GB2312" , $power_wire );
			$power_wire_ps=$_POST['power_wire_ps'];
			$power_wire_ps = iconv( "UTF-8" , "GB2312" , $power_wire_ps );
			$power_adapt=$_POST['power_adapt'];
			$power_adapt = iconv( "UTF-8" , "GB2312" , $power_adapt );
			$power_adapt_ps=$_POST['power_adapt_ps'];
			$power_adapt_ps = iconv( "UTF-8" , "GB2312" , $power_adapt_ps );
			$data_wire=$_POST['data_wire'];
			$data_wire = iconv( "UTF-8" , "GB2312" , $data_wire );
			$data_wire_ps=$_POST['data_wire_ps'];
			$data_wire_ps = iconv( "UTF-8" , "GB2312" , $data_wire_ps );
			$cdrom=$_POST['cdrom'];
			$cdrom = iconv( "UTF-8" , "GB2312" , $cdrom );
			$cdrom_ps=$_POST['cdrom_ps'];
			$cdrom_ps = iconv( "UTF-8" , "GB2312" , $cdrom_ps );
			$workbook=$_POST['workbook'];
			$workbook = iconv( "UTF-8" , "GB2312" , $workbook );
			$workbook_ps=$_POST['workbook_ps'];
			$workbook_ps = iconv( "UTF-8" , "GB2312" , $workbook_ps );
			$pack=$_POST['pack'];
			$pack = iconv( "UTF-8" , "GB2312" , $pack );
			$pack_ps=$_POST['pack_ps'];
			$pack_ps = iconv( "UTF-8" , "GB2312" , $pack_ps );
			$another=$_POST['another'];
			$another = iconv( "UTF-8" , "GB2312" , $another );
			$another_ps=$_POST['another_ps'];
			$another_ps = iconv( "UTF-8" , "GB2312" , $another_ps);
			$uid=$_SESSION['cus_id'];//SESSION传值
			$req_table=$_POST['req_table'];
			
			$sql="insert into bms_sample(id ,sample_name ,speci ,chip_speci ,cos_v ,ym ,tk ,host ,host_ps ,ic ,ic_ps ,
			screen ,screen_ps ,mouse ,mouse_ps ,keyboard ,keyboard_ps ,power_wire ,power_wire_ps ,power_adapt ,power_adapt_ps ,data_wire ,
			data_wire_ps ,cdrom ,cdrom_ps ,workbook ,workbook_ps ,pack ,pack_ps ,another ,another_ps) values('','$sample_name',
			'$speci','$chip_speci','$cos_v','$ym','$tk','$host','$host_ps','$ic','$ic_ps','$screen','$screen_ps','$mouse','$mouse_ps',
			'$keyboard','$keyboard_ps','$power_wire','$power_wire_ps','$power_adapt','$power_adapt_ps','$data_wire','$data_wire_ps',
			'$cdrom','$cdrom_ps','$workbook','$workbook_ps','$pack','$pack_ps','$another','$another_ps')";
			//echo '$sql='.$sql;
			$result = mysql_query($sql,$conn);
			if($result){
				//更新任务登记表
				$ins_id=mysql_insert_id();
				//echo "$ins_id:$uid";
				//$req_table=$_SESSION['req_table'];
				$sql="select max(req_id) from bms_task_reg where uid='$uid' and req_table='$req_table'";
				$req_id=get_result_first($sql);
				$_SESSION['max_req_id']=$req_id;
				//$req_date=date("Y-m-d");
				//$req_time=date("H:i:s");
				$sql="update bms_task_reg set sample_id='$ins_id' where uid='$uid' and req_id='$req_id' and req_table='$req_table'";
				$result = mysql_query($sql,$conn);
				if($result){
					echo "OK";
				}
			}
			mysql_close();
			
			
		break;
		default:
			break;
	}
	
 }
 
 //数组过滤空值
function myfunction($v)
	{
		if ($v==="")
        {
        return false;
        }
	return true;
	}
 

?>
