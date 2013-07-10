<?php
define('IN_LOCK', true);
@ini_set('display_errors',        1);
define('ROOT_PATH', str_replace('install/process.php', '', str_replace('\\', '/', __FILE__)));
require (ROOT_PATH . 'config.php');
require(ROOT_PATH . 'includes/cls_site.php');
$site = new Site($db_name, $prefix, $admin_dir);
require(ROOT_PATH . 'includes/cls_mysql.php');
$db = new cls_mysql($db_host, $db_user, $db_pass, $db_name);
require(ROOT_PATH . 'includes/cls_session.php');
$sess = new cls_session($db, $site->table('sessions'), 'HD_ID');

function real_ip(){
    static $realip = NULL;
    if ($realip !== NULL){
        return $realip;
    }
    if (isset($_SERVER)){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($arr AS $ip){
                $ip = trim($ip);
                if ($ip != 'unknown'){
                    $realip = $ip;
                    break;
                }
            }
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])){
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }else{
            if (isset($_SERVER['REMOTE_ADDR'])){
                $realip = $_SERVER['REMOTE_ADDR'];
            }else
            {
                $realip = '0.0.0.0';
            }
        }
    }else{
        if (getenv('HTTP_X_FORWARDED_FOR')){
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        }elseif (getenv('HTTP_CLIENT_IP')){
            $realip = getenv('HTTP_CLIENT_IP');
        }else{
            $realip = getenv('REMOTE_ADDR');
        }
    }
    preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
    $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';
    return $realip;
}

$sql="select user_id, user_name,name,password,last_time,permission from " . $site->table('user') .
		" where user_name = '" . $_GET['username']. "' and password = '" . $site->compile_password($_GET['password'])."'";
$row = $db->getRow($sql);
if ($row){
	$_SESSION['user_id']     = $row['user_id'];
    $_SESSION['user_name']   = $row['user_name'];
	$_SESSION['permission']  = $row['permission'];
	$_SESSION['name']		 = $row['name'];
	$_SESSION['last_time']   = $row['last_time'];
   
	$db->query("UPDATE " .$site->table('user').
				" SET last_time='" . date('Y-m-d H:i:s', time()) . "', last_ip='" . real_ip() . "'".
				" WHERE user_id='$_SESSION[user_id]'");
	header("Location: ../".$admin_dir."/make_html.php?operate=all&inst=1\n");
	exit;
}
?>