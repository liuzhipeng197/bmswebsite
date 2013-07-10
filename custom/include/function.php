<?php
	include_once("db_mysql.php");
	function iframe_head(){
		//print("
				echo "
				<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
				<html xmlns=\"http://www.w3.org/1999/xhtml\">
				<head>
				<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\" />
				<title>国家计算机质检中心</title>
				
				<link rel=\"stylesheet\" type=\"text/css\" media=\"screen, print\" href=\"../style/right.css\" />
				<link href=\"../style/skin.css\" rel=\"stylesheet\" type=\"text/css\" />
				<script type=\"text/javascript\" src=\"../js/jquery.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../js/core.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../js/function.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../js/time.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\">
					window.onload = tick;
				</script>
				";
				//);
	}
	
	function iframe_head2(){
		//print("
				echo "<html>
				<head>
				<title>NSTC后台管理系统</title>
				<script type=\"text/javascript\" src=\"../../../js/jquery.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../../../js/core.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../../../js/function.js\" language=\"JavaScript\"></script>
				
				<script type=\"text/javascript\" src=\"../../../js/ajaxfileupload.js\"></script>
				<link href=\"../../../style/base.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
				<link rel=\"stylesheet\" type=\"text/css\" media=\"screen, print\" href=\"../../../style/right.css\" />
				<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\" />
				<link rel=\"stylesheet\" href=\"../examples/index.css\" />
				<script charset=\"utf-8\" src=\"../kindeditor.js\"></script>
				";
				//);
	}
	
	function iframe_head3(){
		//print("
				echo "<html>
				<head>
				<title>NSTC后台管理系统</title>
				<script type=\"text/javascript\" src=\"../js/jquery.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../js/core.js\" language=\"JavaScript\"></script>
				<script type=\"text/javascript\" src=\"../js/function.js\" language=\"JavaScript\"></script>
				
				<script type=\"text/javascript\" src=\"../js/ajaxfileupload.js\"></script>
				<link href=\"../style/base.css\" rel=\"stylesheet\" type=\"text/css\" media=\"screen\" />
				<link rel=\"stylesheet\" type=\"text/css\" media=\"screen, print\" href=\"../style/right.css\" />
				<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\" />
				<link rel=\"stylesheet\" href=\"../examples/index.css\" />
				<script charset=\"utf-8\" src=\"../kindeditor.js\"></script>
				<link href=\"../style/subtable.css\" rel=\"stylesheet\" style type=\"text/css\"> 
				";
				//);
	}
	
	function head_logo(){
		echo"
		<div align=\"center\">
		<img src=\"../images/tp.gif\" width=\"960\" height=\"130\" /></div>
		<div align=\"left\">
		<table width=\"961\"> 
		<tr >
		<td background=\"../images/bart.gif\" wdith=\"480\"height=\"25\"><div style=\"border:solid 0px black;width:230px;float:left;\"><FONT style=\"FONT-SIZE: 12pt; FILTER: shadow(color=#af2dco); WIDTH: 100%; COLOR: #e4dc9b; LINE-HEIGHT: 100%; FONT-FAMILY: 华文行楷\" size=6> 欢迎您进入尊冠公司BMS系统
		</div>
		<div style=\"border:solid 0px black;width:330px;float:right;\"><span id=\"Clock\"></span>
		</div></td></tr>
				
		</table>
		";
	}
	
	/*function get_value_bysql($sql){//根据SQL语句来获取值
		include_once("db_mysql.php");
		$result = mysql_query($sql,$conn);
    	$row = @mysql_fetch_array($result, MYSQL_BOTH);
    	$value=$row[0];//根据指标ID获取指标名字
    	return $value;
	}
	function get_ary_bysql($sql){//根据SQL语句来获取数组
		include_once("db_mysql.php");
		$result = mysql_query($sql,$conn);
    	$row = @mysql_fetch_array($result, MYSQL_BOTH);
    	return $row;
	}*/
	function footer(){
		echo "
		<div class=\"footer\">
		<table width=\"961\"> 
		<tr> 
		<td background=\"../images/bart.gif\" width=\"480\" height=\"25\"><div align=\"right\">
		<div align=\"left\" style=\"width:px\"> 
		<div id=\"div-a\"><FONT style=\"FONT-SIZE: 12pt; FILTER: shadow(color=#af2dco); WIDTH: 100%; FONT-FAMILY: 宋体\">FQA|人才招聘|联系我们|网站地图|</div>
		</div></tr> 
		</table>
		<div id=\"div-a\"><FONT style=\"FONT-SIZE: 10pt; FILTER: shadow(color=#af2dco); WIDTH: 100%; FONT-FAMILY: 宋体\">Copyright&copy;国家电子计算机质量监督检验中心，国家电子标签产品质量监督检验中心，北京尊冠科技有限公司</div>
		<div id=\"div-a\"><FONT style=\"FONT-SIZE: 10pt; FILTER: shadow(color=#af2dco); WIDTH: 100%; FONT-FAMILY: 宋体\">备案序号:京ICP备06062869号
		</div>";
	}
?>
