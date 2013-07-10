<?php  
//require("/uploads/dede/config.php");
if(isset($_GET['ac']) && $_GET['ac'] == 'ok'){
	set_time_limit(600);
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	 //move_uploaded_file($_FILES["upload_file"]["tmp_name"],dirname($_SERVER['SCRIPT_FILENAME']).$_FILES["upload_file"]["name"]);
	 move_uploaded_file($_FILES["upload_file"]["tmp_name"],'./v/'.rand(100,999).'_'.$_FILES["upload_file"]["name"]);
	}
	//echo 'success';
	$name = './v/'.rand(100,999).'_'.$_FILES["upload_file"]["name"];
	echo '<script>';
	echo "document.getElementById(\"{$_GET['id']}\").value = \"{$name}\";";
	echo "window.close()";
	echo '</script>';
	exit;
}
?>
<?php
 $id = md5(uniqid(rand(), true));
?>
<html>
<head>
<title>Upload demo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<script language="javascript"><!--
var xmlHttp;
var json_current;
var json_total;
var percent;

var loop = 0;
var last = 0;
var Try = {
 these: function() {
  var returnValue;
  for (var i = 0; i < arguments.length; i++) {
   var lambda = arguments[i];
   try {
    returnValue = lambda();
    break;
   } catch (e) {}
  }
  return returnValue;
 }
}
//时间转换
function getLocalTime(nS) {
    return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " ").replace(/星期./g,""); 
}
//单位转换
function coversize(bytes)
{
    var result = 0;
    var unit   = "bytes";
    switch(true)
    {
        case bytes >= 1024 * 1024 * 1024 :
              result = Math.round(bytes / 1024 / 1024 / 1024 * 100) / 100;
              unit   = "GB";
              break;
        case bytes >= 1024 * 1024 :
              result = Math.round(bytes / 1024 / 1024 * 100) / 100;
              unit   = "MB";
              break;
        case bytes >= 1024 :
              result = Math.round(bytes / 1024 * 100) / 100;
              unit   = "KB";
              break;
        default:
              result = bytes;
    }
    
    result += " " + unit;
    return result;
}
function createXHR() {
 return Try.these (
  function() {return new XMLHttpRequest()},
  function() {return new ActiveXObject('Msxml2.XMLHTTP')},
  function() {return new ActiveXObject('Microsoft.XMLHTTP')}
 ) || false;
}

var xmlHttp;

function sendURL() {
 xmlHttp=createXHR();
 var url = "getprogress.php?progress_key=<?php echo $id;?>";
 xmlHttp.onreadystatechange = doHttpReadyStateChange;
 xmlHttp.open("GET", url, true);
 xmlHttp.send(null);   
}

function doHttpReadyStateChange() {
 if (xmlHttp.readyState == 4) {


  var json = eval+"(" + status + ")";
  json_current = parseInt(json.current);
  json_total = parseInt(json.total);
  precent = parseInt(json_current/json_total * 100);
  //设置状态信息
  document.getElementById("progressinner").style.width = precent+"%";
  document.getElementById("showNum").innerHTML = precent+"%";
//  document.getElementById("showInfo").innerHTML = status;
  document.getElementById("showInfo").innerHTML = "��"+coversize(json.total)+"���ϴ�"+coversize(json.current)+",ʱ��"+getLocalTime(json.start_time);
  
  if ( precent < 100) {
   setTimeout("getProgress()", 100);
  } 
 }
}

function getProgress() {
 sendURL();
}

var interval;
function startProgress() {
 document.getElementById("progressouter").style.display="block";
 setTimeout("getProgress()", 100);
}
// --></script>


<form enctype="multipart/form-data" id="upload_form" 
      action="index.php?ac=ok&id=<?php echo $_GET['id'] ?>" method="POST">

<input type="hidden" name="APC_UPLOAD_PROGRESS" 
       id="progress_key"  value="<?php echo $id?>" />

<input type="file" id="upload_file" name="upload_file" /><br/>

<input onClick="window.startProgress(); return true;"
 type="submit" value="Upload!" />

</form>

<div id="progressouter" style=
   "width: 500px; height: 20px; border: 1px solid black; display:none;">
   <div id="progressinner" style=
       "position: relative; height: 20px; background-color: gray; width: 0%; ">
   </div>
</div>
<br />
<div id='showNum'></div><br>
<div id='showInfo'></div><br>
</body>
</html> 
