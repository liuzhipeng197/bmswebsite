<?php
//这里是连接数据库的配置文件，方便修改和迁移
$server = 'localhost'; //服务器名
$user = 'bmsadmin';  //用户名
$pwd = '1qaz2wsxxsw2zaq1bmsadmin;'; //密码
$db = 'bmsdb'; //数据库

$conn = mysql_connect($server, $user, $pwd) or die(mysql_error());
//
//mysql_query("SET CHARACTER SET gb2312",$conn);
//mysql_query($db,"SET CHARACTER SET ");
//mysql_query($db,"SET NAMES 'utf8'");
mysql_select_db($db,$conn) or die(mysql_error());
mysql_query("SET NAMES 'gb2312'",$conn);

?>
