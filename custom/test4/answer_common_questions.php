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
	iframe_top();//页面头部
  ?>

  <div class="main_2">
	<?php
		iframe_left();//页面左边，菜单栏
	?>
	
          <div align='left'>
		<ul class="bmsbreadcrumb">
  			<li><a href="index.php">首页</a> <span class="divider">>></span></li>
  			<li class="active">常见问题与解答</li>
		</ul>
	  </div>
	  <div class='anlie_basicinfo'>	
		  <div class="accordion" id="accordion2">
			  <div class="accordion-group">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				委托检验书提交以后是否可以撤销？
			      </a>
			    </div>
			    <div id="collapseOne" class="accordion-body collapse">
			      <div class="accordion-inner">
				可以撤销，方法有两种：第一种是通过本系统在网上在线申请撤销；另一种是打电话给我中心前台服务员撤销。
			      </div>
			    </div>
			  </div>
			  <div class="accordion-group">
			    <div class="accordion-heading">
			      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
				报告发布后，报告的信息是否可以修改？
			      </a>
			    </div>
			    <div id="collapseTwo" class="accordion-body collapse">
			      <div class="accordion-inner">
				报告发布后，报告内容的修改需根据具体情况而定，如简单的错别字修改可以，公司信息修改一般不允许。详情请咨询010-89055269。
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

