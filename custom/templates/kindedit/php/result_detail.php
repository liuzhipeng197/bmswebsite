<?php
	include_once("../../../include/function.php");
	iframe_head2();
?>
<?php
	include_once("../../../include/db_mysql.php");
	$coreinfo_id=trim($_GET['coreinfoid']);
	$sql = "select * from nstc_test_result where id='$coreinfo_id'";
    $result = mysql_query($sql,$conn);
    $row = @mysql_fetch_array($result, MYSQL_BOTH);
    $type=$row['type'];
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
	$firm=$row['firm'];
	$product=$row['test_product'];
	$item=$row['test_item'];
	$result=$row['test_result'];//文件id
	$author=$row['author'];
	$date=$row['date'];
	$audit=$row['audit'];
	if($audit=='0'){
		$audit='未通过';
	}else{
		$audit='通过';
	}
	//$mysql = "select file_name from nstc_downfile where id='$result'";
   // $myresult = mysql_query($mysql,$conn);
   // $myrow = @mysql_fetch_array($myresult, MYSQL_BOTH);
   // $result_file=$myrow[0];
    
    
?>
<script type="text/javascript" language="JavaScript"> 
 
 
 function coreinfo_cancle(){
 	//clear();
 	window.location.href="result_show.php";
 }
 
 function download(url){
 	window.location.href=url;
 }
 
 
</script>
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  		<tr>
  			<td width="39" height="30"><div id="right_topleft"></div></td>
  			<td width="100%" align="left" ><div id="right_topcenter">当前位置：测评结果 > 查看详情</div></td>
  			<td width="7"><div id="right_topright"></div></td>
  		</tr>
  		</table>
<div id="mainbody">
<!--<form  action="?a=up" id="dyinfo_form" name="dyinfo_form" method="POST"  target="_self">-->
<form  id="dyinfo_form" name="dyinfo_form" method="POST" >
<div id='ca_testend_right' style='CLEAR: both;  overflow-y:scroll;height:500px;padding:5px;'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><!-- 标题栏-1 -->
	<td height="30" background="../../../images/tab_05.gif">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="12" height="30"><img src="../../../images/tab_03.gif" width="12" height="30" /></td>
            <td><img src="../../../images/tb.gif" width="16" height="16" />&nbsp;&nbsp;<b>测试结果详情</b></td>
        	<td width="16"><img src="../../../images/tab_07.gif" width="16" height="30" /></td>
        </tr>
		</table>
	</td>
</tr>

<tr><!-- 主要内容1 -->
	<td>
		<table  width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<td width="8" background="../../../images/tab_12.gif">&nbsp;</td>
            <td>
            	<table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">      
                <tr>
                	 <!--<td  height="30" style="font-size:13; ">&nbsp;&nbsp;内容：<textarea  id="content" name="content" cols="50"  value="" style="overflow-y:auto;height:230px;"></textarea></td>-->
                	 <td height="30" style="font-size:13; ">
                	 <table  width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="FFFFFF">
                
            	 <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试栏目：<?php echo $type;?>
                	
                	 </td>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试厂商：<?php echo $firm?></td>
                	 <!--<td   height="30" style="font-size:13;">&nbsp;&nbsp;时间：<input type="text" id="start_date" name="start_date" value='请选择' size='45' onClick="fPopCalendar(start_date,start_date);return false;"  ></td>-->
                </tr>
                <tr>
                	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;测试产品：<?php echo $product;?></td>
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;测试项目：<?php echo $item;?></td>
                </tr>
            	<tr>
            	 <td  height="30" style="font-size:13;">&nbsp;&nbsp;结果标题：<?php echo $title;?></td>
            	  <td  height="30" style="font-size:13;">&nbsp;&nbsp;发布人员：<?php echo $author;?></td>
            	</tr>
                 <tr>
                	
                	<td   height="30" style="font-size:13;">&nbsp;&nbsp;测试结果：<?php echo "<a href='javascript:;' onclick=download('download.php?file_name=$result')>".$result."</a>";?>
                	</td>
                	 
                </tr>
                
              </table>
		
		
		
                	 </td>
                </tr>
                
               
            	
                
                
             
                
               
                   
               
                </table>   
			</td>
			<td width="8" background="../../../images/tab_15.gif">&nbsp;</td>
		</tr>
		
		</table>
	</td>
</tr>
<tr> 
    <td height="35" background="../../../images/tab_19.gif">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="12" height="35"><img src="../../../images/tab_18.gif" width="12" height="35" /></td>
              <td align="right">&nbsp;</td>
              <td width="16"><img src="../../../images/tab_20.gif" width="16" height="35" /></td>
            </tr>
        </table>
    </td>
</tr>

<tr> 
	<td height="40" valign="middle" align="center">
		
		<input type="button" id="btn_cancle" onclick=coreinfo_cancle() value="返  回">
	</td>
	
</tr>
</table>
</div>
</body>

</html>
