<?php
     session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
	
?>

<style>
#op a:link { 
color:blue;
text-decoration:underline; 
} 
#op a:visited { 
color:blue;
text-decoration:underline; 
} 
#op a:hover { 
color:red; 
text-decoration:none;  
} 


</style>


<script language="javascript">
	window.onload=init;
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
<body>
<div class="juzhong">
  <?php
	iframe_top();//页面头部
   ?>
      <div align='left'>                                                                                                                                                                          
                <ul class="bmsbreadcrumb">                                                                                                                                                            
                        <li><a href="index.php">首页</a> <span class="divider">></span></li>                                                                                                          
                        <li><a href="#">检测业务查询</a> <span class="divider">></span></li>                                                                                                          
                        <li class="active">业务申请查询</li>                                                                                                                                          
                </ul>
      </div>  
      <div class='main_2'>
      <div class='row-fluid'>
   	<div class='span2'>
	    <div class='left-tag'>
		<ul class="bmsnav bmsnav-list">
  			<li class="bmsnav-header" align='left'><i class='icon-home'></i>检验业务查询</li>
  			<li class="active" align='left'><a href="#"><i class='icon-search'></i> &nbsp;&nbsp;业务申请查询</a></li>
			<li align='left'><a href="#"><i class='icon-tag'></i> &nbsp;&nbsp;任务状态查询</a></li>
  			<li align='left'><a href="#"><i class='icon-book'></i> &nbsp;&nbsp;检测报告查询</a></li>
		</ul>
	    </div>
	</div>
	<div class='span10'>
		<div class='alert_query'>
        		<form id="aquery_form" name="aquery_form"  method="post">
			<div id="display_busi" ></div>
      		</div>
        
     	</div>
	</div>
	<div class="clear"></div> 
	</div>
  	<div class="bottom">
   		<?php
		iframe_bottom();
   		?>
        </div>
</div>
</body>
</html>

