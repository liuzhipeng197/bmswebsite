<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
	iframe_head();
?>

<link href="bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />                                                                                                                          <link href="css/bms.css" rel='stylesheet' type='text/css' />                                                                                                                                  
<script src="bootstrap/js/jquery.js" type="text/javascript" ></script>                                                                                                                        
<script src="bootstrap/js/bootstrap.js" type="text/javascript" ></script> 

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
  			<li><a href="index.php">��ҳ</a> <span class="divider">>></span></li>
  			<li class="active">������������</li>
		</ul>
	  </div>
	  <div class='anlie_basicinfo'>	
		  <div class="accordion" id="accordion2">
			  <div class="accordion-group">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				ί�м������ύ�Ժ��Ƿ���Գ�����
			      </a>
			    </div>
			    <div id="collapseOne" class="accordion-body collapse">
			      <div class="accordion-inner">
				���Գ��������������֣���һ����ͨ����ϵͳ�������������볷������һ���Ǵ�绰��������ǰ̨����Ա������
			      </div>
			    </div>
			  </div>
			  <div class="accordion-group">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
				���淢���󣬱������Ϣ�Ƿ�����޸ģ�
			      </a>
			    </div>
			    <div id="collapseTwo" class="accordion-body collapse">
			      <div class="accordion-inner">
				���淢���󣬱������ݵ��޸�����ݾ��������������򵥵Ĵ�����޸Ŀ��ԣ���˾��Ϣ�޸�һ�㲻������������ѯ010-89055269��
			      </div>
			    </div>
			  </div>
		</div>
	</div>
  <div class="bottom">
   <?php
	iframe_bottom();
   ?>
  </div>

</div>
</body>
</html>

