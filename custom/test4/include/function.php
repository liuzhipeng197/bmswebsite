<?php
	session_start();
    include_once("./include/function.php");
    include("../../admin/include/db_mysql.php");
	
		
	if($_SESSION['cus_id']=='' && $_SERVER['PHP_SELF'] != '/index.php' && $_SERVER['PHP_SELF'] != '/login.php' && $_SERVER['PHP_SELF'] != '/cumster_reg.php' && $_SERVER['PHP_SELF'] != '/forget_pwd.php'){
		 header("Location: login.php");
                 exit();
	}
	

	function iframe_head(){//ͷ�ļ�����
	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=GB2312\">
	<title>���ҵ��Ӽ���������ල�������� ���ҵ�����ϵͳ</title>
	<link href=\"css/inc.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"css/index.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"css/content.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"css/css.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"css/bms.css\" rel=\"stylesheet\" type=\"text/css\">
	<link href=\"bootstrap/css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\">
        <link href=\"bootstrap/css/bootstrap-responsive.css\" rel=\"stylesheet\" type=\"text/css\">                                                                                                              
	<script>
	var jq = jQuery.noConflict();//���jquery������js�ĳ�ͻ
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

	<script src=\"bootstrap/js/bootstrap.js\" type=\"text/javascript\" ></script>        
	
	</head>";
	
	
	}
	
	function iframe_top(){//ҳ��ͷ��
		/*
		include("../../admin/include/db_mysql.php");
		$cus_id=$_SESSION['cus_id'];
		//echo'$cus_id='.$cus_id;
		$sql="select cus_name from bms_custom where cus_id='$cus_id'";
		$cus_name=get_result_first($sql);
		//echo '$cus_name='.$cus_name;
		$weekarray=array("��","һ","��","��","��","��","��");
        $weekname="����".$weekarray[date("w")];                
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
          <a class=\"brand\" href=\"#\">ҵ������ϵͳ</a>
            <ul class=\"bmsnav\"> 
		<li><a href=\"index.php\">��ҳ</a></li>
		<li><a href=\"sel_sample_type.php\">����ҵ������</a></li>
		<li><a href=\"busi_apply_query.php\">����ҵ���ѯ</a></li>
            	<li><a href=\"busi_apply_query.php\">����ҵ����</a></li>
		<li><a href=\"modify_personal_info.php\">������Ϣ����</a></li>
		<li><a href=\"answer_common_questions.php\">��������</a></li>
	    </ul>
	    <ul class=\"bmsnav pull-right\">";
	    if($_SESSION['cus_id']=='')
	    {
	    	echo"<li><a href=\"login.php\">��¼</a></li>
	    	<li><a href=\"cumster_reg.php\">ע��</a></li>";
	    }
	    else if($_SERVER['PHP_SELF'] == '/login.php')
	    {
		echo"<li><a href=\"login.php\">��¼</a></li>
                <li><a href=\"cumster_reg.php\">ע��</a></li>";
	    }
	    else
	    {
	    	echo"<li><a href=\"#\">" . $_SESSION['cus_name'] . "</a></li>";
		echo"<li><a href=\"login.php\">�˳�</a></li>";
	    }
	    echo"</ul>
        </div>
      </div>
    </div>";
	}
	
	function iframe_left(){//ҳ����ߣ��˵���
		/*echo"<div class=\"left_2\">
      <div class=\"x_l left\">
	  <div class=\"x_l_n\" style='margin-top:10px;'>
        	
        	<!--<div class=\"x_l_n_t f14\" ><span style='margin-bottom:4px;'>�����˵�</span></div>-->
        
            <div id=\"x_l_n_c1\">
           	  <div id=\"PARENT\"> 
				<ul id=\"nav\">
				  <li class=\"nav_a1\"><a href=\"#Menu=ChildMenu1\"  onclick=\"DoMenu('ChildMenu1')\" ><strong>���ҵ������</strong></a> 
							<ul id=\"ChildMenu1\" class=\"collapsed\"> 
					  			<li><a href=\"sel_sample_type.php\" >��������</a></li> 
								
							</ul> 
						</li> 
						<li class=\"nav_a1\"><a href=\"#Menu=ChildMenu2\" onclick=\"DoMenu('ChildMenu2')\"><strong>���ҵ���ѯ</strong></a> 
						  <ul id=\"ChildMenu2\" class=\"collapsed\"> 
							    <li id=\"ChildMenu2\"><a href=\"busi_apply_query.php\" >ҵ�������ѯ</a></li> 
								<li id=\"ChildMenu2\"><a href=\"busi_apply_query.php\" >����״̬��ѯ</a></li> 
								<li id=\"ChildMenu2\"><a href=\"busi_apply_query.php\" >��ⱨ���ѯ</a></li> 
							</ul> 
						</li> 
						<li class=\"nav_a1\"><a href=\"#Menu=ChildMenu3\" onclick=\"DoMenu('ChildMenu3')\"><strong>���ҵ����</strong></a> 
						  <ul id=\"ChildMenu3\" class=\"collapsed\"> 
							    <li><a href=\"busi_apply_query.php\">ҵ���޸�����</a></li> 
								<li><a href=\"busi_apply_query.php\">����ȡ������</a></li> 
								<li><a href=\"busi_apply_query.php\" >�����޸�����</a></li> 
							</ul> 
                         </li>
                        <li class=\"nav_a1\"><a href=\"#Menu=ChildMenu4\" onclick=\"DoMenu('ChildMenu4')\"><strong>������Ϣ����</strong></a> 
						  <ul id=\"ChildMenu4\" class=\"collapsed\"> 
								<li><a href=\"modify_personal_info.php\" >�޸ĸ�����Ϣ</a></li> 
								<li><a href=\"modify_login_password.php\" >�޸ĵ�¼����</a></li> 
						  </ul> 
						</li> 
                        <li class=\"nav_a1\"><a href=\"#Menu=ChildMenu5\" onclick=\"DoMenu('ChildMenu5')\"><strong>��������</strong></a> 
							<ul id=\"ChildMenu5\" class=\"collapsed\"> 
								<li><a href=\"#\" >����������</a></li> 
								<li><a href=\"#\" >�ͻ�����</a></li> 
							</ul> 
						</li>
                       
				</ul> 
            	</div> 
            </div>
        </div>
    </div></div>";*/
	
	
	

	//��������ʽ
	/*	
	echo "<div class=\"left_2\">
	<table style='margin-top:10px;' width=\"100%\" height=\"470\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#EEF2FB\">
  <tr>
    <td width=\"182\" valign=\"top\"><div id=\"container\">
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='ywsq'  >���ҵ������</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
          <li><a  href=\"sel_sample_type.php\" id='sqlc' onclick=\"getLink('sqlc')\" >��������</a></li>
        </ul>
      </div>
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='ywcx'>���ҵ���ѯ</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
          <li><a  href=\"busi_apply_query.php\"  id='sqcx' onclick=\"getLink('sqcx')\" >ҵ�������ѯ</a></li>
          <!--<li><a  href=\"busi_state_query.php\"  >����״̬��ѯ</a></li>
		  <li><a  href=\"test_report_query.php\"  >��ⱨ���ѯ</a></li>-->
		  <li><a  href=\"busi_apply_query.php\" id='ztcx' onclick=\"getLink('ztcx')\" >���״̬��ѯ</a></li>
		  <li><a  href=\"busi_apply_query.php\" id='bgcx' onclick=\"getLink('bgcx')\" >��ⱨ���ѯ</a></li>
        </ul>
      </div>
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='ywbg'>���ҵ����</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
		<!--<li><a id=\"modify_reginfo\" href=\"busi_modify_apply.php\"  >ҵ���޸�����</a></li>
        <li><a  href=\"busi_remove_apply.php\" >ҵ��ȡ������</a></li>
		<li><a  href=\"report_modify_apply.php\"  >�����޸�����</a></li>-->
		
		<li><a  href=\"busi_apply_query.php\" id='sqxg' onclick=\"getLink('sqxg')\" >ҵ���޸�����</a></li>
        <li><a href=\"busi_apply_query.php\"  id='ywxg' onclick=\"getLink('ywxg')\">ҵ��ȡ������</a></li>
		<li><a  href=\"busi_apply_query.php\" id='bgxg' onclick=\"getLink('bgxg')\" >�����޸�����</a></li>
          
        </ul>
      </div>
      <h1 class=\"type\"><a href=\"javascript:void(0)\" id='xxgl'>������Ϣ����</a></h1>
      <div class=\"content\">
        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
          </tr>
        </table>
        <ul class=\"MM\">
          <li><a id=\"modify_req\" href=\"modify_personal_info.php\" id='info' onclick=\"getLink('info')\" >�޸ĸ�����Ϣ</a></li>
		  <li><a id=\"modify_report\" href=\"modify_login_password.php\" id='pwd' onclick=\"getLink('pwd')\" >�޸ĵ�¼����</a></li>  
        </ul>
      </div>
    </div>
        <h1 class=\"type\"><a href=\"javascript:void(0)\" id='wtjj'>��������</a></h1>
      <div class=\"content\">
          <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
            </tr>
          </table>
        <ul class=\"MM\">
            <li><a href=\"answer_common_questions.php\" id='ans' onclick=\"getLink('ans')\">����������</a></li>
          <li><a href=\"custom_ask_questions.php\" id='ques' onclick=\"getLink('ques')\">�ͻ�������</a></li>
		 
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
	
	function iframe_bottom(){//ҳ��ײ�
		echo" <div class=\"bottom_left\">
		      	<span>
				<a href=\"#\">��ϵ����</a> |  <a href=\"#\">��վ��ͼ</a> | <a href=\"http://www.nctc.org.cn\" target=\��_blank\">������ַ</a> | <a href=\"#\">��˽����</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</span>
			<span class=\"bottom_text\">
				��ַ���������������Ļ���·211��    &nbsp;&nbsp;�������룺100083 ��&nbsp;�������:��ICP��06062869�� ��
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
//$length  ;���������ַ�����ʾ����󳤶�
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
