<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
	iframe_head();
?>

<body>
<div class="juzhong">
  <?php
	iframe_top();//ҳ��ͷ��
  ?>

  <div class="main_2">
	<?php
		iframe_left();//ҳ����ߣ��˵���
	?>
	
          <div align='left'>
		<ul class="bmsbreadcrumb">
  			<li><a href="index.php">��ҳ</a> <span class="divider">></span></li>
  			<li><a href="#">���ҵ������</a> <span class="divider">></span></li>
  			<li class="active">ѡ�������</li>
		</ul>
	  </div>
        <div class="anlie_basicinfo">
          <div class="anlie_nr">
                <div  class='alert' align='left'>�����������Ҫѡ����Ҫ���Ķ���Ȼ�󵥻���һ����<br>
                  Ŀǰ�ļ������������Ϣ���豸��IC�������ߡ�RFID��Ʒ�������ϵͳ����Ϣ�洢��Ʒ�����ܡ�AFC�豸�������豸����Ϣ���̼���ȡ�
              	</div>
		<div class='alert' align='center'>
			<div style='padding:20px 0px 0px 0px'>	  
			<form name="form_sel_obj" method="POST" action="req_baseinfo.php">
                		<strong>�������б�</strong>             
				<select id="test_obj" name="test_obj" width='180px'  multiple='multiple'>			
				<?php
					//ͨ���������ݿ⣬��ȡ������
					$ary_test_obj="";
					$sql="select subject_id,subject_name from subject where parents='subjects'";
					$ary_test_obj=get_result_ary($sql);
					//echo"<select id=\"test_obj\"  width='180px'>";				
					//echo"<option value=''>��ѡ�������</option>";
					
					foreach($ary_test_obj as $key => $result){
					$subject_id=$result['subject_id'];
					$subject_name=$result['subject_name'];
					//echo $result['subject_name']."\n";
					
					echo "<option value=\"$subject_id\">$subject_name</option>\n";
					}
					echo"</select>";
					//echo test_obj_list;
									
				?>
				<input type='hidden' id="h_test_obj" >
			</div>
       
              	<div align="center" style='margin:0px 0px 20px 0px'>
			<input type="button" class='edit_buttom' value="��һ��" name="B1" onclick="mysubmit()" />
             		&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class='edit_buttom' value="ȡ��" name="B12" /></td>
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
			alert("��ѡ�������");
		}else{
			//$('#h_test_obj').val()=obj_val;
			document.form_sel_obj.submit();
		}
		
	}

	

</script>
