<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>����ѵ��ļ��ϴ�������</title>
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
//��ʼ���Ի����öԻ������أ����Զ������������öԻ���رյ��ٶȣ����ʣ�
$.fx.speeds._default = 500; //�Ի�����ʾ�����ص��ٶ�
$(function(){
 $("#dialog").dialog({ 
  autoOpen: false,
  show: 'scale',   //�Ի�����ʾ�ķ�ʽ
  hide: 'explode'  //�Ի������صķ�ʽ
 })
});
 
//�����ļ��ϴ��ĶԻ���
var uid ;   //Ϊ���ر�APC_UPLOAD_PROGRESS����value�ı���
function dialogOpen()
{
 //document.getElementByIdx_x("fileUpload").value = "";//�޷�ͨ�������ʽ��file���͵�input��ֵ��ֻ��
 //ÿ�δ򿪡��ļ��ϴ����Ի���ʱ������նԻ������ϴ���ʾ��Ajax��Ϣ���ϴ����Ȱٷ����ͽ�����
 document.getElementById("output1").innerHTML="";
 document.getElementById("test1").innerHTML="";
 document.getElementById("progressouter").style.display="none";
 $("#dialog").dialog("open");
 return false;
}
//����ajaxSubmit�Ĳ���
var options = {
 target:'#output1',
 beforeSubmit:showResponse
 //һ��Ҫ����Ϊ�ύǰ(beforeSubmit)���������ύ��success��,�����޷�����ļ��ϴ��Ļ���
};
function showResponse(responseText,statusText){
 //alert('״̬��' + statusText + '\n���ص������ǣ�\n' + responseText);
 var newId = document.getElementById("progress_key");
 //����һ����ʱ������������ɵ��ַ�������Ϊ���ر�APC_UPLOAD_PROGRESS��value
 var temp1 = new Date().getTime().toString();
 var temp2 = Math.random().toString();
 uid = temp1 + temp2; 
 //uid������ÿ�ε������ļ��ϴ���ʱ����һ�飬��֤ÿ���ϴ����ļ��в�ͬ��APC_UPLOAD_PROGRESSid
 //���򣬴���һ���ļ����ٴ��ڶ����ļ�ʱ��û�н�������Ч��
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
  cache:false  //һ��Ҫ���������������֤�����棬����ҳ�治�ᶯ̬ˢ�£���û�н�����Ч��
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
//��һ���������apc�Ƿ����
if (function_exists('apc_fetch')) {
echo 'it surpport apc model!';
} else {
    echo "it's not support apc model!";
}
?>
 <div id="dialog" title="����ѵ��ļ��ϴ�">
  <form id="myForm" action="fileup.php" method="post" enctype="multipart/form-data"  onsubmit="return ajaSub();">
   <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" />
   <p><input type="file" id="fileUpload" name="myfile" /></p>   
   <p><input type="submit" value="�ļ��ϴ�" /></p>
   <p id="output1"></p>
   <div id="progressouter" style="width:75px; height:12px; border:1px solid gray; display:none;">
       <div id="progressinner" style="position:relative; height:12px; background-color:#6699ff; width:0%; ">
       </div>
   </div>
   <p id="test1"></p>
  </form>
 </div>
 <a class="aButton" href="#" onclick="dialogOpen();">����ѵ��ļ��ϴ�</a>
</body>
</html>
