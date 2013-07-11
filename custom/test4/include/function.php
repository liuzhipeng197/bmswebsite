<?php
	session_start();
    include_once("./include/function.php");
    include("../../admin/include/db_mysql.php");
	
		
	if($_SESSION['cus_id']=='' && $_SERVER['PHP_SELF'] != '/index.php' && $_SERVER['PHP_SELF'] != '/login.php' && $_SERVER['PHP_SELF'] != '/cumster_reg.php' && $_SERVER['PHP_SELF'] != '/forget_pwd.php'){
		 header("Location: login.php");
                 exit();
	}
	

	function iframe_head(){//头文件引入
	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=GB2312\">
	<title>国家电子计算机质量监督检验中心 检测业务管理系统</title>
	<link href=\"css/inc.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"css/index.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"css/content.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"css/css.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"css/bms.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"bootstrap/css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"bootstrap/css/bootstrap-responsive.css\" rel=\"stylesheet\" type=\"text/css\">                                                                                                              
	<script>
	var jq = jQuery.noConflict();//解决jquery与其他js的冲突
	</script>
	
	<script type=\"text/javascript\" src=\"js/nav.js\"></script>
	<script src=\"js/function.js\" type=\"text/javascript\"></script>
	<script src=\"js/menu2.js\" type=\"text/javascript\"></script>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/datePicker.css\" />
	<script  charset=\"utf-8\" src=\"js/jquery-second.js\" type=\"text/javascript\"></script>
	<script  charset=\"utf-8\" src=\"js/jquery.datePicker-min.js\" type=\"text/javascript\"></script>
	<link href=\"css/skin.css\" rel=\"stylesheet\" type=\"text/css\" />
	<script src=\"js/upload.js\" type=\"text/javascript\"></script>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/subtable.css\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"css/menu2.css\" />
	<script src=\"js/prototype.lite.js\" type=\"text/javascript\"></script>
	<script src=\"js/moo.fx.js\" type=\"text/javascript\"></script>
	<script src=\"js/moo.fx.pack.js\" type=\"text/javascript\"></script>

	
	</head>";
	
	
	}
	
	function iframe_top(){//页面头部
		/*
		include("../../admin/include/db_mysql.php");
		$cus_id=$_SESSION['cus_id'];
		//echo'$cus_id='.$cus_id;
		$sql="select cus_name from bms_custom where cus_id='$cus_id'";
		$cus_name=get_result_first($sql);
		//echo '$cus_name='.$cus_name;
		$weekarray=array("日","一","二","三","四","五","六");
        $weekname="星期".$weekarray[date("w")];                
		$date=date("Y-m-d");
        //echo $date."   ".$weekname;
		*/
		echo"
    <div class=\"logo_bg\"><img src=\"images/logo.gif\" style=\"float:left; margin:0px 0px 0px 0px;\">
      <div class=\"clear\"></div>
    </div>
		
    <div class=\"bmsnavbar\">
      <div class=\"bmsnavbar-inner\">
        <div class=\"container\">
          <a class=\"brand\" href=\"#\">业务申请系统</a>
            <ul class=\"bmsnav\"> 
		<li><a href=\"index.php\">首页</a></li>
		<li><a href=\"sel_sample_type.php\">检验业务申请</a></li>
		<li><a href=\"busi_apply_query.php\">检验业务查询</a></li>
            	<!--li><a href=\"busi_apply_query.php\">检验业务变更</a></li-->
		<li><a href=\"modify_personal_info.php\">个人信息管理</a></li>
		<li><a href=\"answer_common_questions.php\">常见问题与解决</a></li>
	    </ul>
	    <ul class=\"bmsnav pull-right\">";
	    if($_SESSION['cus_id']=='')
	    {
	    	echo"<li><a href=\"login.php\">登录</a></li>
	    	<li><a href=\"cumster_reg.php\">注册</a></li>";
	    }
	    else if($_SERVER['PHP_SELF'] == '/login.php')
	    {
		echo"<li><a href=\"login.php\">登录</a></li>
                <li><a href=\"cumster_reg.php\">注册</a></li>";
	    }
	    else
	    {
	    	echo"<li><a href=\"#\">" . $_SESSION['cus_name'] . "</a></li>";
		echo"<li><a href=\"login.php\">退出</a></li>";
	    }
	    echo"</ul>
        </div>
      </div>
    </div>";
	}
	
	function iframe_left(){//页面左边，菜单栏
		/*echo"<div class=\"left_2\">
      <div class=\"x_l left\">
	  <div class=\"x_l_n\" style='margin-top:10px;'>
        	
        	<!--<div class=\"x_l_n_t f14\" ><span style='margin-bottom:4px;'>操作菜单</span></div>-->
        
            <div id=\"x_l_n_c1\">
           	  <div id=\"PARENT\"> 
				<ul id=\"nav\">
				  <li class=\"nav_a1\"><a href=\"#Menu=ChildMenu1\"  onclick=\"DoMenu('ChildMenu1')\" ><strong>检测业务申请</strong></a> 
							<ul id=\"ChildMenu1\" class=\"collapsed\"> 
					  			<li><a href=\"sel_sample_type.php\" >申请流程</a></li> 
								
							</ul> 
						</li> 
						<li class=\"nav_a1\"><a href=\"#Menu=ChildMenu2\" onclick=\"DoMenu('ChildMenu2')\"><strong>检测业务查询</strong></a> 
						  <ul id=\"ChildMenu2\" class=\"collapsed\"> 
							    <li id=\"ChildMenu2\"><a href=\"busi_apply_query.php\" >业务申请查询</a></li> 
								<li id=\"ChildMenu2\"><a href=\"busi_apply_query.php\" >任务状态查询</a></li> 
								<li id=\"ChildMenu2\"><a href=\"busi_apply_query.php\" >检测报告查询</a></li> 
							</ul> 
						</li> 
						<li class=\"nav_a1\"><a href=\"#Menu=ChildMenu3\" onclick=\"DoMenu('ChildMenu3')\"><strong>检测业务变更</strong></a> 
						  <ul id=\"ChildMenu3\" class=\"collapsed\"> 
							    <li><a href=\"busi_apply_query.php\">业务修改申请</a></li> 
								<li><a href=\"busi_apply_query.php\">任务取消申请</a></li> 
								<li><a href=\"busi_apply_query.php\" >报告修改申请</a></li> 
							</ul> 
                         </li>
                        <li class=\"nav_a1\"><a href=\"#Menu=ChildMenu4\" onclick=\"DoMenu('ChildMenu4')\"><strong>个人信息管理</strong></a> 
						  <ul id=\"ChildMenu4\" class=\"collapsed\"> 
								<li><a href=\"modify_personal_info.php\" >修改个人信息</a></li> 
								<li><a href=\"modify_login_password.php\" >修改登录密码</a></li> 
						  </ul> 
						</li> 
                        <li class=\"nav_a1\"><a href=\"#Menu=ChildMenu5\" onclick=\"DoMenu('ChildMenu5')\"><strong>问题与解决</strong></a> 
							<ul id=\"ChildMenu5\" class=\"collapsed\"> 
								<li><a href=\"#\" >常见问题解答</a></li> 
								<li><a href=\"#\" >客户提问</a></li> 
							</ul> 
						</li>
                       
				</ul> 
            	</div> 
            </div>
        </div>
    </div></div>";*/
	
	
	

	//第三种样式
	/*	
	echo "<div class=\"left_2\">
	<table style='margin-top:10px;' width=\"100%\" height=\"470\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#EEF2FB\">
  <tr>
    <td width=\"182\" valign=\"top\"><div id=\"container\">
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='ywsq'  >检测业务申请</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
          <li><a  href=\"sel_sample_type.php\" id='sqlc' onclick=\"getLink('sqlc')\" >申请流程</a></li>
        </ul>
      </div>
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='ywcx'>检测业务查询</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
          <li><a  href=\"busi_apply_query.php\"  id='sqcx' onclick=\"getLink('sqcx')\" >业务申请查询</a></li>
          <!--<li><a  href=\"busi_state_query.php\"  >任务状态查询</a></li>
		  <li><a  href=\"test_report_query.php\"  >检测报告查询</a></li>-->
		  <li><a  href=\"busi_apply_query.php\" id='ztcx' onclick=\"getLink('ztcx')\" >任务状态查询</a></li>
		  <li><a  href=\"busi_apply_query.php\" id='bgcx' onclick=\"getLink('bgcx')\" >检测报告查询</a></li>
        </ul>
      </div>
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='ywbg'>检测业务变更</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
		<!--<li><a id=\"modify_reginfo\" href=\"busi_modify_apply.php\"  >业务修改申请</a></li>
        <li><a  href=\"busi_remove_apply.php\" >业务取消申请</a></li>
		<li><a  href=\"report_modify_apply.php\"  >报告修改申请</a></li>-->
		
		<li><a  href=\"busi_apply_query.php\" id='sqxg' onclick=\"getLink('sqxg')\" >业务修改申请</a></li>
        <li><a href=\"busi_apply_query.php\"  id='ywxg' onclick=\"getLink('ywxg')\">业务取消申请</a></li>
		<li><a  href=\"busi_apply_query.php\" id='bgxg' onclick=\"getLink('bgxg')\" >报告修改申请</a></li>
          
        </ul>
      </div>
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='xxgl'>个人信息管理</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
          <li><a id=\"modify_req\" href=\"modify_personal_info.php\" id='info' onclick=\"getLink('info')\" >修改个人信息</a></li>
		  <li><a id=\"modify_report\" href=\"modify_login_password.php\" id='pwd' onclick=\"getLink('pwd')\" >修改登录密码</a></li>  
        </ul>
      </div>
    </div>
        <h1 class=\"type\"><a href=\"javascript:void(0)\" id='wtjj'>问题与解决</a></h1>
      <div class=\"content\">
          <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
            </tr>
          </table>
        <ul class=\"MM\">
            <li><a href=\"answer_common_questions.php\" id='ans' onclick=\"getLink('ans')\">常见问题解答</a></li>
          <li><a href=\"custom_ask_questions.php\" id='ques' onclick=\"getLink('ques')\">客户的提问</a></li>
		 
        </ul>
      </div>
       <script type=\"text/javascript\">
		var contents = document.getElementsByClassName('content');
		var toggles = document.getElementsByClassName('type');
	
		var myAccordion = new fx.Accordion(
			toggles, contents, {opacity: true, duration: 400}
		);
		//myAccordion.showThisHideOpen(contents[0]);
		var html=getCookie(\"link\");
		//alert(html);
		if(html=='sqlc'){
		myAccordion.showThisHideOpen(contents[0]);
		}else if(html=='sqcx' || html=='ztcx'|| html=='bgcx'){
		myAccordion.showThisHideOpen(contents[1]);
		}else if(html=='sqxg' || html=='bgxg'|| html=='ywxg'){
		myAccordion.showThisHideOpen(contents[2]);
		}else if(html=='info' || html=='pwd'){
		myAccordion.showThisHideOpen(contents[3]);
		}else if(html=='ans' || html=='ques'){
		myAccordion.showThisHideOpen(contents[4]);
		}else if(html==''){
		 myAccordion.showThisHideOpen(contents[0]);

		}
		
		function getLink(obj){
			
			//var html=document.getElementById(obj);
			setCookie(\"link\",obj);
			//alert(link);
		
		}

		
		
		
		
	</script>
       
        </td>
  </tr>
</table></div>";
	*/	
	
	}
	
	function iframe_bottom(){//页面底部
		echo" <div class=\"bottom_left\">
		      	<span>
				<a href=\"#\">联系我们</a> |  <a href=\"#\">网站地图</a> | <a href=\"http://www.nctc.org.cn\" target=\”_blank\">中心网址</a> | <a href=\"#\">隐私声明</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class=\"bottom_text\">
				地址：北京海淀区北四环中路211号    &nbsp;&nbsp;邮政编码：100083 　&nbsp;备案序号:京ICP备06062869号 　
			</span>
		     </div>
		     <div class='row'>
			&nbsp;
			<br>
			&nbsp;
		     </div>";
	}
	
function cut_title($title,$length)
{
//$length  ;我们允许字符串显示的最大长度
        if (strlen($title)>$length) {
                $temp = 0;
                for($i=0; $i<$length; $i++)
                        if (ord($title[$i]) > 128) $temp++;
                        if ($temp%2 == 0)
                        $title = substr($title,0,$length)."...";
                        else
                        $title = substr($title,0,$length+1)."...";
                }
                        return $title;
}


	

?>
