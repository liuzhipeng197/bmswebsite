<?php
//�������������ݿ�������ļ��������޸ĺ�Ǩ��
$server = 'localhost'; //��������
$user = 'bmsadmin';  //�û���
$pwd = '1qaz2wsxxsw2zaq1bmsadmin;'; //����
$db = 'bmsdb'; //���ݿ�

$conn = mysql_connect($server, $user, $pwd) or die(mysql_error());
//
//mysql_query("SET CHARACTER SET gb2312",$conn);
//mysql_query($db,"SET CHARACTER SET ");
//mysql_query($db,"SET NAMES 'utf8'");
mysql_select_db($db,$conn) or die(mysql_error());
mysql_query("SET NAMES 'gb2312'",$conn);

?>
