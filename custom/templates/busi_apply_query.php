<?php
	session_start();
	require("../../admin/include/db_mysql.php");
	if($_SESSION['cus_id']==''){
		 header("Location:../index.php");
                 exit();

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html" /> 
<link href="../style/skin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../style/datePicker.css" />
<link rel="stylesheet" type="text/css" href="../style/subtable.css" />
<script  charset="utf-8" src="../js/jquery-second.js" type="text/javascript"></script>
<script  charset="utf-8" src="../js/jquery.datePicker-min.js" type="text/javascript"></script>
<script type="text/javascript">
$(window).ready(function(){

//$('.date-pick').datePicker({clickInput:true,startDate:'0001-01-01'});

});
</script>
<script language="javascript">
	//window.onload=init;
	function init(){
		var formData="1"+","+"0"+","+"";
		viewpage(formData);
	}
	
	function viewpage(formData){ 
		if(window.XMLHttpRequest){ 
		var xmlReq = new XMLHttpRequest(); 
		} else if(window.ActiveXObject) { 
		var xmlReq = new ActiveXObject('Microsoft.XMLHTTP'); 
		} 
		formData = "fdata="+formData;
		xmlReq.onreadystatechange = function(){ 
			if(xmlReq.readyState == 4){ 
				document.getElementById('display_busi').innerHTML = xmlReq.responseText; 
				$('.date-pick').datePicker({clickInput:true,startDate:'0001-01-01'});
			} 
		} 
		xmlReq.open("post", "apply_query_list.php", true); 
		xmlReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
		xmlReq.send(formData); 
		return false; 
	} 
	
/*	function changequery(){
		var val;
		var ele_id_select=document.getElementById("query1");
		var ele_condition=document.getElementById("condition1");
		var ele_testobj=document.getElementById("test_obj");
		for(var i=0;i<ele_id_select.childNodes.length;i++){
			if(ele_id_select.childNodes[i].selected){
				val=ele_id_select.childNodes[i].value;
				break;
			}
		}
		if(val&&val=="0"){
			ele_condition.style.display="inline";
			ele_testobj.style.display="none";
		}else if(val&&val=="1"){
			ele_condition.style.display="inline";
			ele_testobj.style.display="none";
		}else if(val&&val=="2"){
			ele_condition.style.display="none";
			ele_testobj.style.display="inline";
			changetestobj();
		}
	}*/
	
/*	function changetestobj(){
		var obj_query=document.getElementById('query1');
        var str_class=obj_query.selectedIndex+1;
		var obj_lab=document.getElementById('test_obj');
		var	str_condition=obj_lab.value;
		var str_formdata="1"+","+str_class+","+str_condition;
		viewpage(str_formdata);
	}*/

	function condition_query(){
		var str_inHtm = "";
		var dom_div_display = document.getElementById("display");
		var str_condition;
		var obj_type=document.getElementsByName('search_type');
		var date_start=document.getElementById('start_date').value;
		var date_end=document.getElementById('end_date').value;
		var str_class;
		if(obj_type[0].checked){
			str_condition=$('#condition1').val();
			var obj=document.getElementById('query1');
			str_class=1;
			if(str_condition==''&&str_class==1){
				alert("请输入查询条件");
				return;
			}
		}else if(obj_type[1].checked){
			str_class=2;
			//alert(date_start+","+date_end);
			if(date_start==''){
				alert("请您选择起始时间");
				return;
			}else if(date_end=='请选择'){
				alert("请您选择截止时间");
				return;
			}else if(date_end<date_start){//检测截止日期是否小于起始日期
				alert('您选择的截止日期错误，截止日期不能小于起始日期');
				document.getElementById('end_date').value='';
				return;	
			}
			str_condition=date_start+","+date_end;
		}else{
			alert("请选择查询类别");
			return;
		}
		str_formdata="1"+","+str_class+","+str_condition;
		viewpage(str_formdata);
		//alert(str_condition);
		/*$.post("./task.php",{action:"stafflog_conquery",str_condition:str_condition,str_class:str_class,date_start:date_start,date_end:date_end},function(data){
			if(data){
				//alert(data);
				//str_inHtm="<div id='display_cus'>"+data+"</div>";
				//alert(str_inHtm);
				$('#display').empty();
				$('#display').html(data);
			}
			else{
				alert("未找到符合条件的客户");
			}
		});*/
	}	

	function jump(url,str_deal,flag){
		if(str_deal=="接受"&&flag==1){
			alert("不允许修改已接受的任务信息！");
			return;
		}
		window.location.href=url;
	}
	
	function del_info(str_id,str_samplename,str_deal){//根据id号来删除配置环境的信息
		if(str_deal=="接受"){
			alert("不允许删除已接受的任务信息！");
			return;
		}
		var str_logname="<?php echo $_SESSION['cus_realname']?>";			//获取日志管理操作人id
		//alert(str_logname+str_id+str_samplename);
		$.post("./task.php",{action:"bus_del",str_logname:str_logname,str_id:str_id,str_samplename:str_samplename},function(data){
		  	if(data){
		  		alert('删除成功');
		  		window.location.href="./busi_apply_query.php";
		  	}
		});
	}
</script>
<script>
function setHeight()
{
	//h = Math.max(document.documentElement.offsetHeight,document.body.offsetHeight);
	//var h=document.body.scrollHeight;
	window.parent.parent.document.getElementById("outframe").style.height = 800+"px";
}
</script>
<style>
html,body{margin:0;padding:0}
</style>
</head> 
 
<body onload="setHeight();init();"> 
<form id="aquery_form" name="aquery_form"  method="post">

  	<div id="display_busi" >
  	
  	</div>

</form>
</body> 
</html> 