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
  			<li class="active">������������</li>
		</ul>
	  </div>
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
