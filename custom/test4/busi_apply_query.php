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
				alert("�������ѯ����");
				return;
			}
		}else if(obj_type[1].checked){
			str_class=2;
			//alert(date_start+","+date_end);
			if(date_start==''){
				alert("����ѡ����ʼʱ��");
				return;
			}else if(date_end=='��ѡ��'){
				alert("����ѡ���ֹʱ��");
				return;
			}else if(date_end<date_start){//����ֹ�����Ƿ�С����ʼ����
				alert('��ѡ��Ľ�ֹ���ڴ��󣬽�ֹ���ڲ���С����ʼ����');
				document.getElementById('end_date').value='';
				return;	
			}
			str_condition=date_start+","+date_end;
		}else{
			alert("��ѡ���ѯ���");
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
				alert("δ�ҵ����������Ŀͻ�");
			}
		});*/
	}	

	function jump(url,str_deal,flag){
		if(str_deal=="����"&&flag==1){
			alert("�������޸��ѽ��ܵ�������Ϣ��");
			return;
		}
		window.location.href=url;
	}
	
	function del_info(str_id,str_samplename,str_deal){//����id����ɾ�����û�������Ϣ
		if(str_deal=="����"){
			alert("������ɾ���ѽ��ܵ�������Ϣ��");
			return;
		}
		var str_logname="<?php echo $_SESSION['cus_realname']?>";			//��ȡ��־���������id
		//alert(str_logname+str_id+str_samplename);
		$.post("./task.php",{action:"bus_del",str_logname:str_logname,str_id:str_id,str_samplename:str_samplename},function(data){
		  	if(data){
		  		alert('ɾ���ɹ�');
		  		window.location.href="./busi_apply_query.php";
		  	}
		});
	}
	
	
</script>
<body>
<div class="juzhong">
  <?php
	iframe_top();//ҳ��ͷ��
   ?>
      <div align='left'>                                                                                                                                                                          
                <ul class="bmsbreadcrumb">                                                                                                                                                            
                        <li><a href="index.php">��ҳ</a> <span class="divider">></span></li>                                                                                                          
                        <li><a href="#">���ҵ���ѯ</a> <span class="divider">></span></li>                                                                                                          
                        <li class="active">ҵ�������ѯ</li>                                                                                                                                          
                </ul>
      </div>  
      <div class='main_2'>
      <div class='row-fluid'>
   	<div class='span2'>
	    <div class='left-tag'>
		<ul class="bmsnav bmsnav-list">
  			<li class="bmsnav-header" align='left'><i class='icon-home'></i>����ҵ���ѯ</li>
  			<li class="active" align='left'><a href="#"><i class='icon-search'></i> &nbsp;&nbsp;ҵ�������ѯ</a></li>
			<li align='left'><a href="#"><i class='icon-tag'></i> &nbsp;&nbsp;����״̬��ѯ</a></li>
  			<li align='left'><a href="#"><i class='icon-book'></i> &nbsp;&nbsp;��ⱨ���ѯ</a></li>
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

