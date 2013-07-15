<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
	iframe_head();
?>

<body>
<div class="juzhong">
  <?php
	iframe_top();//页面头部
  ?>

  <div class="main_2">
	<?php
		iframe_left();//页面左边，菜单栏
	?>
	
          <div align='left'>
		<ul class="bmsbreadcrumb">
  			<li><a href="index.php">首页</a> <span class="divider">></span></li>
  			<li><a href="#">检测业务申请</a> <span class="divider">></span></li>
  			<li class="active">选择检测对象</li>
		</ul>
	  </div>
        <div class="anlie_basicinfo">
          <div class="anlie_nr">
		<div class='row'>
			<img style='margin:-20px 0px 20px 20px' src='../images/first.png' />
		</div>
                <div  class='alert' align='left'>请根据您要送检的产品在下面检测对象中选择检测对象，然后进行下一步操作。<br>
                  有不明确的请从"常见问题与解答"中了解，或致电010-89055269。
              	</div>
		<div class='alert'>
			<div style='padding:20px 0px 0px 0px'>	  
			<form name="form_sel_obj" method="POST" action="req_baseinfo.php">
                		<strong>检测对象列表：</strong>             
				<?php
					//通过查找数据库，获取检测对象
					$ary_test_obj="";
					$sql="select subject_id,subject_name from subject where parents='subjects'";
					$ary_test_obj=get_result_ary($sql);
					//echo"<select id=\"test_obj\"  width='180px'>";				
					//echo"<option value=''>请选择检测对象</option>";
					
					foreach($ary_test_obj as $key => $result){
					$subject_id=$result['subject_id'];
					$subject_name=$result['subject_name'];
					//echo $result['subject_name']."\n";
					
					$radio_text = "<label class='radio' style='align:center;margin:0px 0px 0px 200px'><input type='radio' name='optionsRadios' style='align:middle' value=\"$subject_id\">" . trim($subject_name) . "</label>";
					echo $radio_text;
					}
					//echo test_obj_list;
									
				?>
				<input type='hidden' id="h_test_obj" >
			</div>
       
              	<div align="center" style='margin:0px 0px 20px 0px'>
			<input type="button" class='edit_buttom' value="下一步" name="B1" onclick="mysubmit()" />
             		&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class='edit_buttom' value="取消" name="B12" /></td>
		</div>
	    </div>	  
            <div class="clear"></div>
          </div>
    </div>
    <div class="clear"></div>
  <div class="bottom">
   <?php
	iframe_bottom();
   ?>
  </div>

</div>
</body>
</html>

<script language="javascript">


function mysubmit(){
		
		//var obj_val= $('#test_obj').val();
		var obj_val=document.getElementById('test_obj').value;
		//alert(obj_val);
		if(obj_val==''){
			alert("请选择检测对象");
		}else{
			//$('#h_test_obj').val()=obj_val;
			document.form_sel_obj.submit();
		}
		
	}

	

</script>
