<?php
	session_start();
	if($_SESSION['cus_id']==''){
		 header("Location:./index.php");
                 exit();
	}

?>

<!--<html>
<!--以下是全屏显示框架>
<head>
<title>管理中心</title>
<meta http-equiv=Content-Type content=text/html;charset=gb2312>
</head>
<frameset rows="128,*" cols=",960,*"  frameborder="NO" border="0" framespacing="0">
	<frame src="admin_top.html" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />

  <frameset cols="200,*"  rows="760,*" id="frame">
	<frame src="left.html" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
	<frame src="right.html" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
  </frameset>
<noframes>
  <body></body>
    </noframes>
</html>-->


<!--以下是固定跨度显示框架，即1024*768-->
<html>
<head>
    <title>无标题页</title>
	
</head>
<frameset cols="*,960,*" frameborder="no" border="0" framespacing="0">
<frame src="about:blank"></frame>
<frameset rows="160,*,60" border="0">
<frame src="admin_top.html"  scrolling="no">
<frameset cols="200,*" id="frame">
  <frame name="leftFrame" src="left.html" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" / ></frame>
  <frame name="main" src="right.html" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" /></frame>
</frameset>
<frame src="bottom.html"  scrolling=no>
</frameset>
<frame src="about:blank"></frame> 
</frameset><noframes></noframes>
</html>
