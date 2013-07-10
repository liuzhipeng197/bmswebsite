<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();

?>
<html>
	<link href="bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />                                                                                                                          <link href="css/bms.css" rel='stylesheet' type='text/css' />
	<script src="bootstrap/js/jquery.js" type="text/javascript" ></script>
	<script src="bootstrap/js/bootstrap.js" type="text/javascript" ></script>	

<body>

<div class="juzhong">
  <?php
	iframe_top();//页面头部
  ?>
<div class="home_nav">
	<div class='container'>
	     <div class='row-fluid'>
                <h2 class='fea' align='center'>实验室检验项目</h2>
                <div class="tabbable">
                        <ul class="bmsnav bmsnav-tabs" style='margin-left:10px'>
                                <li class='active'>
                                        <a href='#tab1' data-toggle="tab">
						<span class='icon_image'><img src='images/dianci_logo.png'></span>  
                                                <span class='fea' align='center'>电磁兼容</span>
                                        </a>
                                </li>

				<li>
                                        <a href='#tab2' data-toggle="tab">
						<span class='icon_image'><img src='images/dianqi_logo.png'></span>                                                                                                                  		     <span class='fea' align='center'>电气安全</span>                                                                                                         					    </a>
                                </li>

                                <li>
                                        <a href="#tab3" data-toggle="tab">
						<span class='icon_image'><img src='images/huanjing_logo.png'></span> 
                                                <span class='fea' align='center'>环境与可靠性</span>
                                        </a>
                                </li>

                                <li>
                                        <a href="#tab3" data-toggle="tab">
						<span class='icon_image'><img src='images/jifang_logo.png'></span> 
                                                <span class='fea' align='center'>机房</span>
                                        </a>
                                </li>

                                <li>
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image'><img src='images/ic_logo.png'></span>
                                                <span class='fea' align='center'>IC卡</span>
                                        </a>
                                </li>
				<li>                                                                                                                                                                  
                                        <a href='#tab5' data-toggle="tab">                       
						<span class='icon_image'><img src='images/RFID_logo.png'></i></span>
						<span class='fea' align='center'>RFID</span></a>
                                </li>
				<li>                                                                                                                                                                  
                                        <a href='#tab4' data-toggle="tab">
                                                <span class='icon_image'><img src='images/performance_logo.png'></span>                                                          
                                                <span class='fea' align='center'>性能</span>                                                                                                          
                                        </a>                                                                                                                                                          
                                </li> 
				<li>                                                                                                                                                                  
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image'><img src='images/software_logo.png'></span> 
                                                <span class='fea' align='center'>软件</span>                                                                                                          
                                        </a>                                                                                                                                                          
                                </li>
				<li>                                                                                                                                                                  
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image' align='center'><img src='images/jianli_logo.png'></span>
						<span class='fea' align='center'>系统监理</span>
					</a>  
                                </li> 
				<li>
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image'><img src='images/storage_logo.png'></span>
						<span class='fea' align='center'>存储产品</span>
					</a>
                                </li>
                        </ul><!--nav-->
                </div><!--tabbable-->
       	  </div>
	</div>
</div>
<div class="tab-content">
	<div class="tab-pane active" id="tab1">
		<div class='home_container'>
			<p class='home_title' align='left'>检测室简介</p>
			<p class='home_content' align='left'>
				NCTC电磁兼容检测室现有试验场地约300m2，拥有一个3m法半电波暗室、一个3m法开阔试验场和三个屏蔽室。从1999年开始，NCTC先后投资近千万元人民币，新建了3m法电波暗室,从德国R&S、瑞士SCHAFFNER、瑞士EM TEST、美国Agilent、日本Noiseken等公司采购了电磁兼容检测的先进仪器设备100多台套，试验条件达到国内先进水平。
			</p>
			<p class='home_content' align='left'>	
				NCTC电磁兼容检测室拥有一支训练有素、经验丰富的电磁兼容检测队伍，全部检测技术人员经过严格的技术培训与考核。	
			</p>
		</div>
		<div class='home_container'>
			<p class='home_title' align='left'>检测范围</p>
			<p class='home_content' align='left'>
				委托检验：产品质量（软件、硬件、系统）的摸底、定型、型式、招标验收等检验
			</p>
                        <p class='home_content' align='left'>
				产品质量国家监督抽查检验：信息技术设备（个人计算机、笔记本、服务器、显示器、计算机外部设备）、计算机网络设备、IC卡 读写机、电子标签读写机等、IC卡与终端
                        </p>
			<p class='home_content' align='left'>
				产品生产许可证检验：IC卡及IC卡读写机、税控收款机、金融税控收款机
                        </p>
			<p class='home_content' align='left'>
				产品质量认证检验：CCC认证、CE认证等。
                        </p>
			<p class='home_content' align='left'>

				信息技术设备、税控收款机、金融终端、IC卡读写机、电子标签读写机等整机产品电磁兼容检测不合格的技术诊断、技术改进建议、技术改进方案实施和技术改进效果验证。
			</p>
		</div>

		<div class='home_buttom_container'>
			<div class='span2' align='left' style='margin:10px 0px 0px 30px'>
				<i class='icon-headphones' style='font-size:15px;font-weight:100px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;89055271&nbsp;89055880</i>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="tab2">
		<div class='home_container'>
                        <p class='home_title' align='left'>检测能力</p>
                        <p class='home_content' align='left'>
                        	安全检测的产品主要包括：信息技术设备、音频与视频及类似电子设备、通信及电信设备、测量与控制和试验室用电气设备、家用和类似用途电器、家用和类似用镜缱远刂破鳌C卡读写机、电子标签读写机等。
			</p>
                        <p class='home_content' align='left'>
                        	 安全检测配置了近100台套检测仪器和检测设备，具备承担信息技术设备产品强制认证检测、CQC自愿认证检测、CE认证产品检测及相关产品的委托检测、摸底检测的能力。
			</p>
                </div>
                <div class='home_container'>
                        <p class='home_title' align='left'>实验室资质</p>
                        <p class='home_content' align='left'>
                        	中国国家认证认可监督管理委员会授权CCC认证检测试验室
			</p>
                        <p class='home_content' align='left'>
                        	中国质量认证中心授权CQC自愿认证试验室
			</p>
                        <p class='home_content' align='left'>
                        	CCQS签约CE认证检测试验室
			</p>
                </div>

                <div class='home_buttom_container'>
                        <div class='span2'>
                                <i class='icon-headphones'></i>
                                &nbsp;&nbsp;
                                89055271<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                89055880
                        </div>
                </div>	
	</div>
	<div class="tab-pane" id="tab3">
	    <div class='row-fluid'>
                <div class='span8'>
                     <div class='home_container'>
			<p class='home_title' align='left'>检测能力</p>
                        <p class='home_content' align='left'>
                        	 环境室现有人研究生1人。大专本科2名，占地300m2。
				 试验室每年承接试验项目500余次，发表文章论文十余篇。
				 试验室有20余年的环境机械试验经验，环境可靠性试验室的试验能力达到国内先进水平，服务的客户广泛分布在电子、通信、机械制造等领域，如：西门子、爱立信、核利时、清华同方、清华威视、联想集团、方正科技及军品验收等。为客户的生产定型、元器件筛选、中间检测、验收检测提供了试验数据和技术支持。试验室有中国实验室认可委员会认可（CNAS No.L）资质、每年参加国内外试验室比对试验以满足试验要求。
			</p>
                        <p class='home_content' align='left'>
                        	试验室每年都承接国家产品质量监督抽查任务并圆满完成任务。
                                环境可靠性试验室可进行高低温、快速温变、温度冲击、恒定（交变）湿热、盐雾、振动（正弦、随机）、冲击、碰撞、跌落、噪声等试验。
			</p>
		    </div>
		</div>
		<div class='span4'>
		   <div class='home_image'>
        		<img src="images/enviroment_01.gif" class="img-polaroid">            	
		   </div>
		</div>
	     </div>
	     <div class='row-fluid'>
		     <div class='home_container'> 
                        <p class='home_title' align='left'>实验室资质</p>
                        <p class='home_content' align='left'>
                                中国国家认证认可监督管理委员会授权CCC认证检测试验室
                        </p>
                        <p class='home_content' align='left'>
                                中国质量认证中心授权CQC自愿认证试验室
                        </p>
                        <p class='home_content' align='left'>
                                CCQS签约CE认证检测试验室
                        </p>
                    </div>
	    </div>
	    <div class='row-fluid'>
                <div class='home_buttom_container'>
                        <div class='span2'>
                                <i class='icon-headphones'></i>
                                &nbsp;&nbsp;
                                89055271<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                89055880
                        </div>
                </div>
	    </div>
	</div>
	<div class="tab-pane" id="tab4">
                <h3>存储测评实验室</h3>
        </div>
</div>
	<!--?php
		iframe_left();//页面左边，菜单栏
	?-->
	
    <!--div class="right_2">
      <div class="right_nr">
        <div class="right_title">  <span style="float:left;font-size:13px;">当前位置：首页 > 检测业务申请 > 申请流程 > <strong>接受协议</strong></span>
          <div class="clear"></div>
        </div>
        <div class="anlie">
          <div class="anlie_nr">
           
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
                <td width="90%" align='left'>在这里，您首先要阅读相关检测协议，然后单击下一步。<br>
                 </td>
              </tr>
			  
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form_sel_obj" method="POST" action="sel_sample_type.php">
              <tr>
                <td width="20%" height="30" align="center" class="left_txt4"><strong>协议内容：</strong></td>             
				
				
               
				<input type='hidden' id="h_test_obj" >
              </tr>
              <tr>
                <td>&nbsp;</td>
				</tr>
               <tr>
                <td>&nbsp;</td>
				</tr>
				 <tr>
                <td>&nbsp;</td>
				</tr>
			 
             
          </table></td>
          </tr>

       
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="50%" height="30" align="center"><input type="button" value="下一步" name="B1" onclick="mysubmit()" />
             &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="取消" name="B12" /></td>
            </tr>
           

			
          </table></td>
      </tr>
			  
			  </table>
			  
            <div class="clear"></div>
          </div>
          
         
        </div>
      </div>
    </div-->
  <div class="bottom">
   <?php
	iframe_bottom();
   ?>
  </div>

</body>
</html>

