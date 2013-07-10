<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>李婉佳的文件上传进度条</title>
<link type="text/css" href="css/jquery.ui.all.css" rel="stylesheet" />
<link type="text/css" href="css/demos.css" rel="stylesheet" />
<script type="text/javascript" src="scripts/jquery-1.8.3.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.core.js"></script>
<script type="text/javascript" src="scripts/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.widget.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.draggable.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.position.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.resizable.js"></script>
<script type="text/javascript" src="scripts/jquery.ui.dialog.js"></script>
<script type="text/javascript" src="scripts/jquery.effects.js"></script>
<script type="text/javascript" src="scripts/jquery.effects.highlight.js"></script>
<script type="text/javascript" src="scripts/jquery.effects.scale.js"></script>
<script type="text/javascript" src="scripts/jquery.effects.blind.js"></script>
<script type="text/javascript" src="scripts/jquery.effects.explode.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<style type="text/css">
*
{
margin:0;
padding:0;
}
input,label
{
margin-top:10px;
}
#fileUpload
{
width:20em;
height:2em;
}
a.aButton
{
font-size:1.2em;
color:black;
}
a.aButton:hover
{
color:#0066CC;
text-decoration:none;
}
</style>
  
<script type="text/javascript">
//初始化对话框，让对话框隐藏，不自动弹出，并设置对话框关闭的速度（速率）
$.fx.speeds._default = 500; //对话框显示和隐藏的速度
$(function(){
 $("#dialog").dialog({ 
  autoOpen: false,
  show: 'scale',   //对话框显示的方式
  hide: 'explode'  //对话框隐藏的方式
 })
});
 
//弹出文件上传的对话框
var uid ;   //为隐藏表单APC_UPLOAD_PROGRESS定义value的变量
function dialogOpen()
{
 //document.getElementByIdx_x("fileUpload").value = "";//无法通过这个方式给file类型的input赋值，只读
 //每次打开“文件上传”对话框时，先清空对话框中上次显示的Ajax消息、上传进度百分数和进度条
 document.getElementById("output1").innerHTML="";
 document.getElementById("test1").innerHTML="";
 document.getElementById("progressouter").style.display="none";
 $("#dialog").dialog("open");
 return false;
}
//设置ajaxSubmit的参数
var options = {
 target:'#output1',
 beforeSubmit:showResponse
 //一定要设置为提交前(beforeSubmit)，不能是提交后（success）,否则无法获得文件上传的缓存
};
function showResponse(responseText,statusText){
 //alert('状态：' + statusText + '\n返回的内容是：\n' + responseText);
 var newId = document.getElementById("progress_key");
 //产生一个由时间戳和随机数组成的字符串，作为隐藏表单APC_UPLOAD_PROGRESS的value
 var temp1 = new Date().getTime().toString();
 var temp2 = Math.random().toString();
 uid = temp1 + temp2; 
 //uid必须在每次单击“文件上传”时生成一遍，保证每个上传的文件有不同的APC_UPLOAD_PROGRESSid
 //否则，传完一个文件后，再传第二个文件时，没有进度条的效果
 newId.value = uid;
 document.getElementById("progressouter").style.display="block";
 document.getElementById("progressinner").style.width = "0%";
 getProgress();
}
function getProgress()
{
 $.ajax({
  success:getStatus,
  url:'getProgress.php?progress_key=' + uid,
  type:'get',
  time:(new Date()).getTime(),
  dataType:'text',
  cache:false  //一定要加上这个条件，保证不缓存，否则，页面不会动态刷新，就没有进度条效果
 });
}
function getStatus(responseText,statusText)
{
 var t1 = document.getElementById("test1");
 t1.innerHTML = responseText.toString()+"%";
 if(responseText<100)
 {
  document.getElementById("progressinner").style.width = responseText+"%";
  setTimeout("getProgress()",10);
 }
 else if(responseText>=100)
 {
  document.getElementById("progressinner").style.width = "100%";
 }
}
function ajaSub()
{
 $('#myForm').ajaxSubmit(options);
 return false;
}
</script>
</head>
<body>
 <?php
//这一段用来检查apc是否可用
if (function_exists('apc_fetch')) {
echo 'it surpport apc model!';
} else {
    echo "it's not support apc model!";
}
?>
 <div id="dialog" title="李婉佳的文件上传">
  <form id="myForm" action="fileup.php" method="post" enctype="multipart/form-data"  onsubmit="return ajaSub();">
   <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" />
   <p><input type="file" id="fileUpload" name="myfile" /></p>   
   <p><input type="submit" value="文件上传" /></p>
   <p id="output1"></p>
   <div id="progressouter" style="width:75px; height:12px; border:1px solid gray; display:none;">
       <div id="progressinner" style="position:relative; height:12px; background-color:#6699ff; width:0%; ">
       </div>
   </div>
   <p id="test1"></p>
  </form>
 </div>
 <a class="aButton" href="#" onclick="dialogOpen();">李婉佳的文件上传</a>
</body>
</html>
