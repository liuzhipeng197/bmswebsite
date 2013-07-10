<?php
	include_once("include/function.php");
	//iframe_head();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>国家计算机质检中心</title>
<link rel="stylesheet" type="text/css" media="screen, print" href="../style/right.css" />
<script type="text/javascript" src="js/login.js" ></script>
<script type="text/javascript" src="js/core.js" ></script>
<script type="text/javascript" src="js/time.js" ></script>
<script type="text/javascript">
	window.onload = tick;
	function cancel(){
		document.getElementById('username').value='';
		document.getElementById('password').value='';
		document.getElementById('vercode').value='';
	}
</script>
</head>

<body>
<div  style="background:#c7e3f1; width:960px; margin: auto; margin-top: 0px;">
<?php 
	head_logo();
?>
</td> 
</tr> 
</table>
  </div>
  </td>
  <table width="680" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:60px">
    <tr>
      <td width="353" height="260" align="center" valign="bottom" background="images/login_7.gif">&nbsp;</td>
      <td width="195" background="images/login_2.gif"><table width="182" height="200" border="0" align="center" cellpadding="2" cellspacing="0">
        <form method="post"  name="NETSJ_Login">
          <tr>
            <td height="50" colspan="2" align="left">&nbsp;</td>
          </tr>
          <tr>
            <td width="74" height="28" align="left">用户名：</td>
            <td width="100"><input name="usermame" id="username"type="TEXT" style="background:url(images/login_6.gif) repeat-x; border:solid 1px #27B3FE; height:20px; background-color:#FFFFFF" size="14" onKeyDown="if(event.keyCode==13){$('#Submit2').click();}"/></td>
          </tr>
          <tr>
            <td height="28" align="left">密　 码：</td>
            <td><input name="password"  id="password" type="PASSWORD" style="background:url(images/login_6.gif) repeat-x; border:solid 1px #27B3FE; height:20px; background-color:#FFFFFF"size="14" onKeyDown="if(event.keyCode==13){$('#Submit2').click();}"/></td>
          </tr>
          <tr>
            <td height="30">验证码： </td>
            <td><div align="justify">
             <!-- <input name="vercode" type="text" id="vercode" size="14" style="background:url(images/login_6.gif) repeat-x; border:solid 1px #27B3FE; height:20px; background-color:#FFFFFF; position: absolute; width: 57px;" />
             <img src="include/verificationImage.php" id="verificationImage" style="cursor:pointer;position:absolute;+margin-top:1px;" onclick="chg_vcode();" title="看不清，换一张"  width="40"  height="20" align="right"/></div></td>-->
          <input name="vercode" id="vercode" value="" onkeydown="if(event.keyCode==13){$('#Submit2').click();}" type="text" style="height:20px; width:50px" style="background:url(images/login_6.gif) repeat-x; border:solid 1px #27B3FE; height:20px; background-color:#FFFFFF"/><img src="include/verificationImage.php" id="verificationImage" style="cursor:pointer;position:absolute;+margin-top:1px;" onClick="chg_vcode();" title="看不清，换一张"  width="60"  height="26"/> 
          </tr>
          <tr>
            <td height="40" colspan="2" align="center"><input type="button" id="Submit2" name="submit2" onClick="login();" no-repeat" value="登 录" />
              &nbsp;
              <input type="button" id="reset" name="reset" onClick="cancel()" no-repeat" value="重 置" /></td>
          </tr>
          <tr>
			<td colspan="2" align="center">&nbsp;&nbsp;<a href='templates/cumster_reg.php' >注 册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='templates/forget_pwd.php' >忘记密码?</a></td>
          </tr>
          <tr>
            <td height="5" colspan="2"></td>
          </tr>
        </form>
      </table></td>
      <td width="132" background="images/login_3.gif">&nbsp;</td>
    </tr>
    <tr>
      <td height="100" colspan="3" background="images/login_4.gif"></td>
    </tr>
  </table>
<?php
	footer(); 
?>
</div>
</body>
</html>
