<?php
define('IN_LOCK', true);
@ini_set('display_errors',        0);
define('ROOT_PATH', str_replace('install/index.php', '', str_replace('\\', '/', __FILE__)));
define('HTTP_URL', 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['PHP_SELF'], 0, (strpos($_SERVER['PHP_SELF'], 'install/'))-1));
$version="V3.2正式版";
$install_lock_filename = "../includes/install.lock";
$allow_url = get_cfg_var("allow_url_fopen");
if (file_exists($install_lock_filename)) {
	die("<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />安全警告: install.lock 已存在, 即系统已安装, 若需要重新安装, 请先登陆FTP，进入includes目录里删除该文件!");
}
function addslashes_deep($value){
    if (empty($value)){
        return $value;
    }else{
        return is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
    }
}

function randStr($len) 
{ 
$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; // characters to build the password from 
$string=''; 
for(;$len>=1;$len--) 
{ 
$position=rand()%strlen($chars); 
$string.=substr($chars,$position,1); 
} 
return $string; 
} 

if (!get_magic_quotes_gpc()){
    if (!empty($_GET)){
        $_GET  = array_map('addslashes_deep', $_GET);
    }
    if (!empty($_POST)){
        $_POST = array_map('addslashes_deep', $_POST);
    }
    $_COOKIE = array_map('addslashes_deep', $_COOKIE);
    $_REQUEST = array_map('addslashes_deep', $_REQUEST);
}
function pa_exit($text = "") {
	global $step;
	?>
	<script language="javascript" type="text/javascript">
		document.getElementById("ptit").innerHTML = "安装出错";
	</script>
	<tr>
        <td height="30">&nbsp;</td>
        <td rowspan="2" align="center"><img src="images/ico2.png" alt="" /></td>
        <td height="30"><h4><?php echo $text;?></h4></td>
        <td height="30">&nbsp;</td>
   </tr>
   <tr>
	    <td height="30">&nbsp;</td>
	    <td height="30"><a href="index.php?step=<?php echo ($step-1);?>">返回上一步</a></td>
	    <td height="30">&nbsp;</td>
    </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
         </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
         </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"></td>
            <td height="30"></td>
            <td height="30"></td>
         </tr>
          <tr>
            <td height="15" colspan="4">&nbsp;</td>
         </tr>
	</table>
    <div class="get">
    <input type="button" class="back" onClick="javascript:window.location='index.php?step=<?=($step-1)?>';" onMouseOver="this.className='back1'" onMouseOut="this.className='back'" /></div>
	</div>
	<?php
	cpfooter();
	exit;
}

if (!function_exists('file_get_contents')){
    function file_get_contents($file){
        if (($fp = @fopen($file, 'rb')) === false){
            return false;
        }else{
            $fsize = @filesize($file);
            if ($fsize){
                $contents = fread($fp, $fsize);
            }else{
                $contents = '';
            }
            fclose($fp);
            return $contents;
        }
    }
}

if (!function_exists('file_put_contents')){
    function file_put_contents($file, $data){
        $contents = (is_array($data)) ? implode('', $data) : $data;
        if (($fp = @fopen($file, 'wb')) === false){
            return false;
        }else{
            $bytes = fwrite($fp, $contents);
            fclose($fp);
            return $bytes;
        }
    }
}

function check_ftp(){
	if($_SERVER['SERVER_PORT'] == 80){
		$Url = "http://".$_SERVER['SERVER_NAME'];
	}else{
		$Url = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'];
	}
	$Url = $Url.$_SERVER['PHP_SELF'];
	$Url = str_replace("index.php","check.php",$Url);
	$Url = str_replace("localhost","127.0.0.1",$Url);
	$ftp_str = "";
	
	if(!ini_get('allow_url_fopen')==1){
		return true;
	}else{
		$ftp_str = @file_get_contents($Url);
		if (trim($ftp_str)=="NITC"){
			return true;
		}else{
			return false;
		}		
	}
}
function cpheader($extraheader = "", $extraheader1 = "") {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NITC效益型网站系统V3.2正式版安装向导</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<SCRIPT LANGUAGE="JavaScript" src="../js/form.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" src="../js/checkForm.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" src="../js/quickView.js"></SCRIPT>
<!--[if lte IE 6]> 
<script src="js/DD_belatedPNG.js"></script>
<script>DD_belatedPNG.fix('.png');DD_belatedPNG.fix('img');
</script>
<![endif]-->
<?php
}

function cpfooter() {
?>
<div class="bottom png"></div>
    </div>
<div class="footer">
  <span></span>版权所有 &copy 2010-2015  NITC网络营销服务中心 All rights reserved.</div>
 </div>
</body>
</html>
<?php
}

function redirect($url) {
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=$url\">";
} 

cpheader();
if (intval(str_replace(".", "", phpversion())) < 410) {
	cpheader();
	pa_exit("PHP 的版本太低,本程序最低要求是 4.1.0 或以上的版本,当前服务器所安装的版本为 " . phpversion());
}
// step one
if (empty($_GET['step']) or $_GET['step'] == 1) {
	$step = 1;
	require (ROOT_PATH . 'config.php');
	$install_flag = true;
	
	/* 检查服务器操作系统 */
	$os = explode(" ", php_uname());
	$operate_system=$os[0];
	$operate_str='';
	if (strtoupper($operate_system)<>'LINUX'){
		$operate_str='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff0000">(最佳：Linux操作系统)</font>';
	}
	
	/* 检查PHP运行版本 */
	$php_version = intval(PHP_VERSION);
	$php_str = '';
	if ($php_version<5){
		$php_v = "<p class='error'>".PHP_VERSION."</p>";
		$php_str='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ff0000">(PHP版本必须5.0以上)</font>';
		$install_flag = false;
	}else{
		$php_v = "<p class='right'>".PHP_VERSION."</p>";
	}
	
	/* 检查MYSQL支持情况 */
	if (function_exists('mysql_connect')){
		$mysql_enabled = "<p class='right'>支持</p>";
	}else{
		$mysql_enabled = "<p class='error'>不支持&nbsp;&nbsp;（请与您的空间供应商协商解决）</p>";
		$install_flag = false;
	}
	
	/* 检查ZEND编译运行 */
	$checkZendOptimizer = 0;
	$checkZendOptimizer = (extension_loaded('Zend Optimizer') || (function_exists('zend_loader_enabled') && zend_loader_enabled())) ? 1 : $checkZendOptimizer;
	if ($checkZendOptimizer == 1){
		$zend_v = "<p class='right'>支持</p>";
		$zend_enabled = true;
		/* 检查是否采用二进制上传系统 */
		if ($allow_url == 1){
			if (check_ftp()){
				$ftp_enabled = "<p class='right'>是</p>";
			}else{
				$ftp_enabled = "<p class='error'>否<a href='ascii/' target='_blank' style='margin-left:15px;color:#FF0000;'>如何使用二进制方式上传？</a></p>";
				$install_flag = false;
			}
		}
	}else{
		$zend_v = "<p class='error'>不支持&nbsp;&nbsp;（请与您的空间供应商协商解决）</p>";
		$install_flag = false;
		$zend_enabled = false;
	}
	
	/* 服务器是否安全模式开启 */
	if (ini_get('safe_mode') == '1'){
		$safe_v = "开启&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#ff0000'>(建议关闭)</font>";
	}else{
		$safe_v = "关闭";
	}
?>
<script language="Javascript">
function CheckButton(){
	if(!document.stepform.chk.checked){
		window.alert('请先阅读并同意服务条款！');
		document.stepform.chk.focus();
		return false;
	}
}
</script>
<style>
.next{
	float:left;
}
</style>
</head>
<body>
 <div class="content png">
  <div class="header">
  <img src="images/logo.png" height="58" width="400" alt="" />
  </div>
   <div class="main">
	 <div class="step png"><b>开始安装</b><span>第1步 / 共3步</span></div>
     <div class="center png">
	   <table width="738" border="0" cellspacing="0" cellpadding="0">
          <tr class="col">
            <th width="135" height="42" align="left" scope="col">&nbsp;</th>
            <th width="357" height="42" align="left" scope="col">系统环境</th>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>服务器操作系统：</strong></td>
            <td width="456"><?php echo $operate_system.$operate_str;?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>PHP版本：</strong></td>
            <td height="30"><?php echo $php_v.$php_str ;?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>是否支持MySQL：</strong></td>
            <td height="30"><?php echo $mysql_enabled ;?></td>
          </tr>
		  <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>支持ZEND编译运行：</strong></td>
            <td height="30"><?php echo $zend_v ;?></td>
          </tr>
          <?php if ($zend_enabled && $allow_url == 1){ ?>
		  <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>是否采用二进制上传：</strong></td>
            <td height="30"><?php echo $ftp_enabled ;?></td>
          </tr><?php } ?>
		  <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>服务器是否开启安全模式：</strong></td>
            <td height="30"><?php echo $safe_v ;?></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><strong>服务器解译引擎：<strong></td>
            <td height="30"><?php echo $_SERVER["SERVER_SOFTWARE"];?></td>
          </tr>
          <tr>
            <td height="8" colspan="3"></td>
            </tr>
      </table>
	  <table width="738" border="0" cellspacing="0" cellpadding="0">
          <tr class="col">
            <th width="135" height="42" align="left" scope="col">&nbsp;</th>
            <th width="587" height="42" align="left" scope="col">相关文件&nbsp;(如以下显示为"只读"时，请登录FTP上修改权限改为777)</th>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.'config.php'; ?></td>
            <td width="226"><h4><?php echo is_writable(ROOT_PATH . 'config.php') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.'upload/'; ?></td>
            <td height="30"><h4><?php echo is_writable(ROOT_PATH . 'upload/') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.'themes_c/caches/'; ?></td>
            <td height="30"><h4><?php echo is_writable(ROOT_PATH . 'themes_c/caches/') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.'themes_c/compiled/'; ?></td>
            <td height="30"><h4><?php echo is_writable(ROOT_PATH . 'themes_c/compiled/') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.'themes_c/compiled/'.$admin_dir.'/'; ?></td>
            <td height="30"><h4><?php echo is_writable(ROOT_PATH . 'themes_c/compiled/'.$admin_dir.'/') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.'themes_c/'; ?></td>
            <td height="30"><h4><?php echo is_writable(ROOT_PATH . 'themes_c/') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
        </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><?php echo ROOT_PATH.$admin_dir.'/backdb/'; ?></td>
            <td height="30"><h4><?php echo is_writable(ROOT_PATH . $admin_dir.'/backdb/') ? '<p class="right">可写</p>' : '<p class="error">只读</p>';?></h4></td>
        </tr>
		<tr>
            <td height="10" colspan="3"></td>
            </tr>
      </table>
      <form action="index.php?step=2" method="post" name="stepform" onSubmit="return CheckButton()" class="first_form">
      	<div class="checkbox"><input class="check" type="checkbox" id="chk" name="chk" /><p>已阅读并同意<a href="http://www.nitc.cc/law.html" target="_blank">服务条款</a></p></div>
		<?php
		if (is_writable(ROOT_PATH . 'config.php') && is_writable(ROOT_PATH . 'upload/') && is_writable(ROOT_PATH . 'themes_c/caches/') && is_writable(ROOT_PATH . 'themes_c/compiled/') && is_writable(ROOT_PATH . 'themes_c/compiled/'.$admin_dir.'/') && is_writable(ROOT_PATH . 'themes_c/') && is_writable(ROOT_PATH . $admin_dir.'/backdb/') && $install_flag){ ?>
		<div class="button"><input type="submit" value="" class="next mrgin0" onMouseOver="this.className='next1 mrgin0'" onMouseOut="this.className='next mrgin0'" style="margin:0px;"/></div>
		<?php } else { ?>
		<div class="button"><input type="button" value="" class="next_no mrgin0" style="margin:0px;" title="为什么无法点击'下一步'呢？请检查上面的系统环境配置及相关文件信息." /></div>
		<?php } ?>
      </form>
     </div>
<?php
}

if (isset($_GET['step']) &&  $_GET['step'] == 2) {
	if (empty($_SERVER['HTTP_REFERER'])){
		echo "<script>window.location='index.php';</script>";
	}
	require ROOT_PATH."config.php";
?>
<script type="text/javascript" src="../js/quickView.js"></script>
</head>
<body>
 <div class="content png">
  <div class="header">
  <img src="images/logo.png" height="58" width="400" alt="" />
  </div>
   <div class="main">
	 <div class="step png"><b>配置系統</b><span>第2步 / 共3步</span></div>
	 <div class="center png">
	   <form action="index.php?step=<?php echo $_GET['step']+1;?>" method="post" name="theForm" onSubmit="return doSubmit()">		<table width="738" border="0" cellspacing="0" cellpadding="0">
          <tr class="col">
            <th width="137" height="42" align="left" scope="col">&nbsp;</th>
            <th height="42" colspan="3" align="left" scope="col">设置数据库</th>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td width="110" height="30">数据库主机：<a href="#" title='填写：空间商提供的数据库IP地址，后面的":3306"保留' style="margin-left:5px;" ><img src="images/help.gif" border="0" alt=""/></a></td>
            <td width="265" height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="<?php echo $db_host;?>"   name="servername"  onblur="servernameCheck('servername')" id="servername" />
				</div>
			</td>
            <td width="226" class="msg"><div class="" id="servernameMsg" style="display:none;"></div></td>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">数据库用户名：</td>
            <td height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="<?php echo $db_user;?>"   name="dbusername"  onblur="dbusernameCheck('dbusername')" id="dbusername" />
				</div>
			</td>
            <td height="30" class="msg"><div class="" id="dbusernameMsg" style="display:none;"></div></td>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">数据库用户密码：</td>
            <td height="30">
				<input class="blank" type="password" value="<?php echo $db_pass;?>"   name="dbpassword" id="dbpassword" />
			</td>
            <td height="30" class="msg"></td>
          </tr>
		  <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">数据库名：</td>
            <td height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="<?php echo $db_name;?>"   name="dbname"  onblur="dbnameCheck('dbname')" id="dbname" />
				</div>
			</td>
            <td height="30" class="msg"><div class="" id="dbnameMsg" style="display:none;"></div></td>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">表前缀：<a href="#" title='注意：默认为"nitc_"，如有需求更改的话，请更改"_"前面的内容' style="margin-left:5px;" ><img src="images/help.gif" border="0" alt=""/></a></td>
            <td height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="<?php echo $prefix;?>" name="dbprefix"  onblur="dbprefixCheck('dbprefix')" id="dbprefix" />
				</div>
			</td>
            <td height="30" class="msg"><div class="" id="dbprefixMsg" style="display:none;"></div></td>
          </tr>
          <tr>
            <td height="8" colspan="4"></td>
            </tr>
      </table>
	  <table width="738" border="0" cellspacing="0" cellpadding="0">
          <tr class="col">
            <th width="137" height="42" align="left" scope="col">&nbsp;</th>
            <th height="42" colspan="3" align="left" scope="col">设置网站后台管理员账号</th>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td width="110" height="30">管理员用户名：</td>
            <td width="265" height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="" name="username" id="username" onBlur="usernameCheck('username')" />
				</div>
			</td>
            <td height="30" class="msg"><div id="usernameMsg" class="infor" style="display:none;"></div></td>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">用户密码：</td>
            <td height="30">
				<div class="msgbase">
					<input class="blank" type="password" value="" name="password" id="password" onBlur="passwordInstallCheck('password')" />
				</div>
			</td>
            <td height="30" class="msg"><div id="passwordMsg" class="infor" style="display:none;"></div></td>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">确认用户密码：</td>
            <td height="30">
				<div class="msgbase">
					<input class="blank" type="password" value="" name="password2" id="password2" onBlur="confirmPasswordCheck('password2')" />
				</div>
			</td>
            <td height="30" class="msg"><div id="password2Msg" class="infor" style="display:none;"></div></td>
          </tr>
		  <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">邮箱：<a href="#" title='请认真填写，便于找回密码' style="margin-left:5px;" ><img src="images/help.gif" border="0" alt=""/></a></td>
            <td height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="" name="email" id="email" onBlur="emailInstallCheck('email')" />
				</div>
			</td>
            <td height="30" class="msg"><div id="emailMsg" class="infor" style="display:none;"></div></td>
          </tr>
          <tr>
            <td height="10" colspan="4"></td>
            </tr>
      </table>
	  <table width="738" border="0" cellspacing="0" cellpadding="0">
          <tr class="col">
            <th width="137" height="42" align="left" scope="col">&nbsp;</th>
            <th height="42" colspan="3" align="left" scope="col">杂项</th>
          </tr>
		  <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td width="110" height="30">语言选择设置：</td>
            <td width="265" height="30">
				<input type="checkbox" value="2" name="check_language[]" id="check_language[]" checked="checked" />简体中文
				<input type="checkbox" value="1" name="check_language[]" id="check_language[]" checked="checked" />English
			</td>
            <td height="30" class="msg"></td>
          </tr>
		  <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td width="110" height="30">后台目录：<a href="#" title='为了安全起见，可更改此网站后台管理目录' style="margin-left:5px;" ><img src="images/help.gif" border="0" alt=""/></a></td>
            <td width="265" height="30">
				<div class="msgbase">
					<input class="blank" type="text" value="<?php echo $admin_dir;?>"   name="admindir"  onblur="admindirCheck('admindir')" id="admindir" />
				</div>
			</td>
            <td height="30" class="msg"><div class="" id="admindirMsg" style="display:none;"></div></td>
          </tr>
          <tr id="msgbox">
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
            <td height="30"><input type="checkbox" value="1" name="check_ty" id="check_ty" checked="checked" />&nbsp;<strong>是否安装体验数据</strong></td>
            <td height="30" class="msg"></td>
          </tr>
          <tr>
            <td height="10" colspan="4"></td>
            </tr>
      </table>
	  <div class="get">
		<input type="submit" value="" class="next" onMouseOver="this.className='next1'" onMouseOut="this.className='next'"/>
      </div></form></div>
<script type="text/javascript">
<!--
function doSubmit(){
	CheResult = true;
	firstErrorControl = "";

	if(servernameCheck("servername") == false)
		CheResult = false;
	if(dbusernameCheck("dbusername") == false)
		CheResult = false;
	if(dbnameCheck("dbname") == false)
		CheResult = false;
	if(dbprefixCheck("dbprefix") == false)
		CheResult = false;
	if(admindirCheck("admindir") == false)
		CheResult = false;
		
	if(usernameCheck("username") == false)
		CheResult = false;
	if(passwordInstallCheck("password") == false)
		CheResult = false;
	if(confirmPasswordCheck("password2") == false)
		CheResult = false;
	if(emailInstallCheck("email") == false)
		CheResult = false;
		
	var cks = document.getElementsByName('check_language[]');
	var num = 0;
	for(var i = 0 ; i < cks.length ; i++){
		if(cks[i].checked){
			num = num + 1;
	   	}
	}
	if(num==0){
		alert("语言选择设置必须选择一个");
		CheResult = false;
	}
		
	SetMsgFocus();
	return CheResult;
}
//-->
</script>
<?php
}

if (isset($_GET['step']) &&  $_GET['step'] == 3) {
	if (empty($_SERVER['HTTP_REFERER'])){
		echo "<script>window.location='index.php';</script>";
	}
	$check_language_state = $_POST['check_language'];
	$step=$_GET['step'];
?>
<head>
<body>
 <div class="content png">
  <div class="header">
  <img src="images/logo.png" height="58" width="400" alt="" />
  </div>
   <div class="main">
	 <div class="step png"><b id="ptit">安装完成</b><span>第3步 / 共3步</span></div>
	 <div class="center png">
	   <table width="738" border="0" cellspacing="0" cellpadding="0">
          <tr class="col">
            <th width="137" height="42" align="left" scope="col">&nbsp;</th>
            <th height="42" colspan="3" align="left" scope="col"><br /></th>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td width="110" height="30">&nbsp;</td>
            <td width="310" height="30">&nbsp;</td>
            <td width="181">&nbsp;</td>
         </tr>
<?php
if (trim($_POST['servername']) == "" or trim($_POST['dbusername']) == "" or trim($_POST['dbname']) == "" or trim($_POST['dbprefix']) == "" or trim($_POST['username']) == "" or trim($_POST['password']) == "" or trim($_POST['password2']) == "" or trim($_POST['admindir']) == "" or trim($_POST['email']) == "") {
	pa_exit("请返回并确认所有选项均已正确填写");
}
if (trim($_POST['password']) != trim($_POST['password2'])) {
	pa_exit("两个输入的密码不相同,请返回重新输入");
}

$link = @mysql_connect(trim($_POST['servername']), trim($_POST['dbusername']), trim($_POST['dbpassword']));
	if ($link){
		if (@mysql_select_db(trim($_POST['dbname']))) {
			$file = "../config.php";
			if (file_exists($file)) {
				@chmod ($file, 0777);
			} 
			$fp = fopen($file, 'w');
		$text = "<?php
		\$db_host		= '".trim($_POST['servername'])."';
		\$db_user		= '".trim($_POST['dbusername'])."';
		\$db_pass		= '".trim($_POST['dbpassword'])."';
		\$db_name		= '".trim($_POST['dbname'])."';
		\$prefix		= '".trim($_POST['dbprefix'])."';
		\$timezone		= 'Asia/Shanghai';
		\$cookie_path   = '';
		\$cookie_domain = '';
		\$admin_dir		= '".trim($_POST['admindir'])."';
		\$url_separate	= '-';
		\$session		= '7200';
		\$demo_data_install		= '".trim($demo_data_install)."';
	?>";
			fwrite($fp, $text, strlen($text));
			fclose($fp);
		}else{
			if (@mysql_query("Create Database ".trim($_POST['dbname'])."",$link)) {
			}else{
				pa_exit("对不起，数据库创建失败！");
			}
		}
	}else{
		pa_exit("对不起，数据库服务器连接失败！");
	}
	
	require (ROOT_PATH . 'config.php');
	require(ROOT_PATH . 'includes/cls_site.php');
	$site = new Site($db_name, $prefix, $admin_dir);
	require(ROOT_PATH . 'includes/cls_mysql.php');
	$db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
	
	/* 检测数据库当前用户是否有操作权限 */
	/*$pos = strpos(strtolower($db_host),':');
	if ($pos){
		$temp_host = explode(":",$db_host);
		$result_host = $temp_host[0];
	}else{
		$result_host = $db_host;
	}
	$t_query = $db->getALl("show grants for '".$db_user."'@'".$result_host."';");
	foreach ($t_query as $key => $value){
		$all_rights[]=$value["Grants for ".$db_user."@".$result_host];
	}
	$pos1 = strpos(strtolower($all_rights[0]),'all privileges');
	if ($pos1){
	}else{
		$pos2 = strpos(strtolower($all_rights[1]),'all privileges');
		if ($pos2){
		}else{
			$pri_arr = array();
			$pri_arr = array("select","insert","update","delete","drop","alter","create");
			$p_ac = strtolower($all_rights[1]);
			$p_ac = str_replace("grant","",$p_ac);
			$on_pos = strpos($p_ac,'on');
			$p_ac = trim(substr($p_ac,0,$on_pos));
			$p_ac_arr = array();
			$p_ac_arr = explode(",",$p_ac);
			foreach ($p_ac_arr as $key => $value){
				$p_ac_arr[$key] = trim($value);
			}
			
			foreach ($pri_arr as $key => $value){
				if(!in_array(trim($value),$p_ac_arr)){
					pa_exit("对不起，您的数据库操作权限不足，请联系您的空间供应商！");
				}
			}
		}
	}*/
	
	function install_data($sql_files){
		include (ROOT_PATH . 'config.php');
		include_once(ROOT_PATH . 'install/includes/cls_sql_executor.php');
		
		$db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
		$mysql_charset_change = "";
		$mysql_version = intval($db -> version);
		if ($mysql_version>=5) {
			$mysql_charset_change = " DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
		}
		$se = new sql_executor($db, 'utf8', 'nitc_', $prefix, HTTP_URL, $mysql_charset_change);
		$result = $se->run_all($sql_files);
		if ($result === false){
			return false;
		}
		return true;
	}
?>
<?
	if ($link) {
		if (mysql_select_db(trim($_POST['dbname']))) {
			$sql_files = ROOT_PATH . 'install/data/structure.sql';
			$result = install_data($sql_files);
			if ($result === false){
				pa_exit("创建系统数据表出错！");
				return false;
			}
			
			$cur_year = date('Y');
			$result_year = $cur_year." - ".(intval($cur_year)+1);
			$db -> query("UPDATE ".$site->table('config')." SET copyright_year='".$result_year."' WHERE config_id=1");

$file = "../config.php";
if (file_exists($file)) {
	@chmod ($file, 0777);
} 
$fp = fopen($file, 'w');
$text = "<?php
\$db_host		= '".trim($db_host)."';
\$db_user		= '".trim($db_user)."';
\$db_pass		= '".trim($db_pass)."';
\$db_name		= '".trim($db_name)."';
\$prefix		= '".trim($prefix)."';
\$timezone		= '".trim($timezone)."';
\$cookie_path   = '".trim($cookie_path)."';
\$cookie_domain = '".trim($cookie_domain)."';
\$admin_dir		= '".trim($admin_dir)."';
\$session		= '".trim($session)."';
\$url_separate	= '-';
\$demo_data_install		= 0;
?>";
fwrite($fp, $text, strlen($text));
fclose($fp);

		} 
	
	if (count($check_language_state)<>2){
		foreach($check_language_state as $key => $value){
			if ($value==1){
				$db -> query("UPDATE ".$site->table('language')." SET state=0 WHERE language_id=2");
				$db -> query("UPDATE ".$site->table('language')." SET default_value=1 WHERE language_id=1");
				$db -> query("UPDATE ".$site->table('language')." SET default_value=0 WHERE language_id<>1");
			}else{
				$db -> query("UPDATE ".$site->table('language')." SET state=0 WHERE language_id=1");
				$db -> query("UPDATE ".$site->table('language')." SET default_value=1 WHERE language_id=2");
				$db -> query("UPDATE ".$site->table('language')." SET default_value=0 WHERE language_id<>2");
			}
		}
	}
	
	$temp_sql = "
UPDATE `".$prefix."category` SET html_flag=0;
UPDATE `".$prefix."product` SET html_flag=0;
UPDATE `".$prefix."channel_category` SET html_flag=0;
UPDATE `".$prefix."channel_content` SET html_flag=0;	
";
$temp_a_query = explode(";", $temp_sql);
while (list(, $query) = each($temp_a_query)) {
	$query = trim($query);
	if ($query) {
		$db -> query($query);
	}
}
		
	$username=trim($_POST['username']);
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$email=$_POST['email'];
	$check_ty=$_POST['check_ty'];
	$step=$_GET['step'];
	
	$db -> query("INSERT INTO ".$site->table('user')." (user_name,password,email,permission,date_added,date_modified)
                       VALUES ('".$username."','".$site->compile_password($password)."','".$email."','all','".date('Y-m-d H:i:s', time())."','".date('Y-m-d H:i:s', time())."')");
					   
	$db -> query("UPDATE ".$site->table('config')." SET
                       date_start='2010-01-01',date_end='2050-01-01'
                       WHERE config_id=1");
    
	$randKey = randStr(10);

	$db -> query("UPDATE ".$site->table('config')." SET
                       randKey='$randKey'
                       WHERE config_id=1");
					   
	if ($check_ty==1 && $demo_data_install==0){
		$sql_files = ROOT_PATH . 'install/data/initialization.sql';
		$result = install_data($sql_files);
		if ($result === false){
			pa_exit("安装系统演示数据出错！");
        	return false;
		}
		
		$file = "../config.php";
		if (file_exists($file)) {
			@chmod ($file, 0777);
		} 
		$fp = fopen($file, 'w');
		$text = "<?php
	\$db_host		= '".trim($db_host)."';
	\$db_user		= '".trim($db_user)."';
	\$db_pass		= '".trim($db_pass)."';
	\$db_name		= '".trim($db_name)."';
	\$prefix		= '".trim($prefix)."';
	\$timezone		= '".trim($timezone)."';
	\$cookie_path   = '".trim($cookie_path)."';
	\$cookie_domain = '".trim($cookie_domain)."';
	\$admin_dir		= '".trim($admin_dir)."';
	\$session		= '".trim($session)."';
	\$url_separate	= '-';
	\$demo_data_install		= 1;
?>";
		fwrite($fp, $text, strlen($text));
		fclose($fp);
	}

    $fp = @fopen(ROOT_PATH . 'includes/install.lock', 'wb+');
    if (!$fp){
        pa_exit("根目录下的includes写入权限不足,请更改.");
        return false;
    }
    if (!@fwrite($fp, "NITC.CC INSTALLED")){
        pa_exit("根目录下的includes写入权限不足,请更改.");
        return false;
    }
    @fclose($fp);
	
	if (trim($admin_dir)<>"office"){
		rename(ROOT_PATH.'office',ROOT_PATH.$admin_dir);
	}
	
	?>
	<iframe id="progressFrame" name="progressFrame" frameBorder="0" scrolling="no" width="100%" height="50" src="process.php?username=<?php echo $_POST['username'];?>&password=<?php echo $_POST['password'];?>" style="display:none;"></iframe>
		<tr>
            <td height="30">&nbsp;</td>
            <td rowspan="2" align="center"><img src="images/ico3.png" alt="" /></td>
      		<td height="30"><h4>:-) 恭喜您，已经安装完毕！</h4></td>
            <td height="30">&nbsp;</td>
         </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30"><a href="../index.html" target="_blank">浏览前台网页</a></td>
            <td height="30">&nbsp;</td>
         </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td height="30">&nbsp;</td>
            <td height="30"><a href="../<?php echo $admin_dir;?>/index.php" target="_blank">登陆网站后台管理内容</a></td>
            <td height="30">&nbsp;</td>
         </tr>
	<?
		$filename = '../js/statistics.js';
		if (@file_exists($filename)){
			$contents = '';
			@chmod($filename,0777);
			if (@is_writable($filename)) {
				//读
				if (!$handle = @fopen($filename,'r')) {
					 exit;
				}
				while (!feof($handle)) {
				  $contents .= @fread($handle, 8192);
				}
				$contents=@preg_replace("/@@@(.+)@@@/","@@@".HTTP_URL."@@@",$contents);
				@fclose($handle);
				//写
				if (!$handle = @fopen($filename,'w')) {
					 exit;
				}
				if (@fwrite($handle, $contents) === FALSE) {
					exit;
				}
				@fclose($handle);
			}
		}
	} else {
		?>
		<tr>
			<td height="30">&nbsp;</td>
			<td rowspan="2" align="center"><img src="images/ico2.png" alt="" /></td>
		  <td height="30"><h4>:-( 对不起，数据库服务器连接失败！</h4></td>
			<td height="30">&nbsp;</td>
		 </tr>
		<tr>
			<td height="30">&nbsp;</td>
			<td height="30">请返回上一步重新配置连接数据库！</a></td>
			<td height="30">&nbsp;</td>
	     </tr>
		  <tr>
			<td height="30">&nbsp;</td>
			<td height="30">&nbsp;</td>
			<td height="30">欢迎您拨打NITC全国服务热线：400-612-0574</a></td>
			<td height="30">&nbsp;</td>
	     </tr>
		<?
	}
	?>
	<tr>
        <td height="30" colspan="4"></td>
    </tr>
	<tr>
        <td height="15" colspan="4">&nbsp;</td>
     </tr>
	</table>
     </div>
    <?
	@mysql_close($link);
}

cpfooter();
?>