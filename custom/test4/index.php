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
	iframe_top();//ҳ��ͷ��
  ?>
<div class="home_nav">
	<div class='container'>
	     <div class='row-fluid'>
                <h2 class='fea' align='center'>ʵ���Ҽ�����Ŀ</h2>
                <div class="tabbable">
                        <ul class="bmsnav bmsnav-tabs" style='margin-left:10px'>
                                <li class='active'>
                                        <a href='#tab1' data-toggle="tab">
						<span class='icon_image'><img src='images/dianci_logo.png'></span>  
                                                <span class='fea' align='center'>��ż���</span>
                                        </a>
                                </li>

				<li>
                                        <a href='#tab2' data-toggle="tab">
						<span class='icon_image'><img src='images/dianqi_logo.png'></span>                                                                                                                  		     <span class='fea' align='center'>������ȫ</span>                                                                                                         					    </a>
                                </li>

                                <li>
                                        <a href="#tab3" data-toggle="tab">
						<span class='icon_image'><img src='images/huanjing_logo.png'></span> 
                                                <span class='fea' align='center'>������ɿ���</span>
                                        </a>
                                </li>

                                <li>
                                        <a href="#tab3" data-toggle="tab">
						<span class='icon_image'><img src='images/jifang_logo.png'></span> 
                                                <span class='fea' align='center'>����</span>
                                        </a>
                                </li>

                                <li>
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image'><img src='images/ic_logo.png'></span>
                                                <span class='fea' align='center'>IC��</span>
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
                                                <span class='fea' align='center'>����</span>                                                                                                          
                                        </a>                                                                                                                                                          
                                </li> 
				<li>                                                                                                                                                                  
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image'><img src='images/software_logo.png'></span> 
                                                <span class='fea' align='center'>���</span>                                                                                                          
                                        </a>                                                                                                                                                          
                                </li>
				<li>                                                                                                                                                                  
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image' align='center'><img src='images/jianli_logo.png'></span>
						<span class='fea' align='center'>ϵͳ����</span>
					</a>  
                                </li> 
				<li>
                                        <a href='#tab4' data-toggle="tab">
						<span class='icon_image'><img src='images/storage_logo.png'></span>
						<span class='fea' align='center'>�洢��Ʒ</span>
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
			<p class='home_title' align='left'>����Ҽ��</p>
			<p class='home_content' align='left'>
				NCTC��ż��ݼ�����������鳡��Լ300m2��ӵ��һ��3m����粨���ҡ�һ��3m���������鳡�����������ҡ���1999�꿪ʼ��NCTC�Ⱥ�Ͷ�ʽ�ǧ��Ԫ����ң��½���3m���粨����,�ӵ¹�R&S����ʿSCHAFFNER����ʿEM TEST������Agilent���ձ�Noiseken�ȹ�˾�ɹ��˵�ż��ݼ����Ƚ������豸100��̨�ף����������ﵽ�����Ƚ�ˮƽ��
			</p>
			<p class='home_content' align='left'>	
				NCTC��ż��ݼ����ӵ��һ֧ѵ�����ء�����ḻ�ĵ�ż��ݼ����飬ȫ����⼼����Ա�����ϸ�ļ�����ѵ�뿼�ˡ�	
			</p>
		</div>
		<div class='home_container'>
			<p class='home_title' align='left'>��ⷶΧ</p>
			<p class='home_content' align='left'>
				ί�м��飺��Ʒ�����������Ӳ����ϵͳ�������ס����͡���ʽ���б����յȼ���
			</p>
                        <p class='home_content' align='left'>
				��Ʒ�������Ҽල�����飺��Ϣ�����豸�����˼�������ʼǱ�������������ʾ����������ⲿ�豸��������������豸��IC�� ��д�������ӱ�ǩ��д���ȡ�IC�����ն�
                        </p>
			<p class='home_content' align='left'>
				��Ʒ�������֤���飺IC����IC����д����˰���տ��������˰���տ��
                        </p>
			<p class='home_content' align='left'>
				��Ʒ������֤���飺CCC��֤��CE��֤�ȡ�
                        </p>
			<p class='home_content' align='left'>

				��Ϣ�����豸��˰���տ���������նˡ�IC����д�������ӱ�ǩ��д����������Ʒ��ż��ݼ�ⲻ�ϸ�ļ�����ϡ������Ľ����顢�����Ľ�����ʵʩ�ͼ����Ľ�Ч����֤��
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
                        <p class='home_title' align='left'>�������</p>
                        <p class='home_content' align='left'>
                        	��ȫ���Ĳ�Ʒ��Ҫ��������Ϣ�����豸����Ƶ����Ƶ�����Ƶ����豸��ͨ�ż������豸����������ƺ��������õ����豸�����ú�������;���������ú������þ���Զ���������IC����д�������ӱ�ǩ��д���ȡ�
			</p>
                        <p class='home_content' align='left'>
                        	 ��ȫ��������˽�100̨�׼�������ͼ���豸���߱��е���Ϣ�����豸��Ʒǿ����֤��⡢CQC��Ը��֤��⡢CE��֤��Ʒ��⼰��ز�Ʒ��ί�м�⡢���׼���������
			</p>
                </div>
                <div class='home_container'>
                        <p class='home_title' align='left'>ʵ��������</p>
                        <p class='home_content' align='left'>
                        	�й�������֤�Ͽɼල����ίԱ����ȨCCC��֤���������
			</p>
                        <p class='home_content' align='left'>
                        	�й�������֤������ȨCQC��Ը��֤������
			</p>
                        <p class='home_content' align='left'>
                        	CCQSǩԼCE��֤���������
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
			<p class='home_title' align='left'>�������</p>
                        <p class='home_content' align='left'>
                        	 �������������о���1�ˡ���ר����2����ռ��300m2��
				 ������ÿ��н�������Ŀ500��Σ�������������ʮ��ƪ��
				 ��������20����Ļ�����е���龭�飬�����ɿ��������ҵ����������ﵽ�����Ƚ�ˮƽ������Ŀͻ��㷺�ֲ��ڵ��ӡ�ͨ�š���е����������磺�����ӡ������š�����ʱ���廪ͬ�����廪���ӡ����뼯�š������Ƽ�����Ʒ���յȡ�Ϊ�ͻ����������͡�Ԫ����ɸѡ���м��⡢���ռ���ṩ���������ݺͼ���֧�֡����������й�ʵ�����Ͽ�ίԱ���Ͽɣ�CNAS No.L�����ʡ�ÿ��μӹ����������ұȶ���������������Ҫ��
			</p>
                        <p class='home_content' align='left'>
                        	������ÿ�궼�нӹ��Ҳ�Ʒ�����ල�������Բ���������
                                �����ɿ��������ҿɽ��иߵ��¡������±䡢�¶ȳ�����㶨�����䣩ʪ�ȡ������񶯣����ҡ���������������ײ�����䡢���������顣
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
                        <p class='home_title' align='left'>ʵ��������</p>
                        <p class='home_content' align='left'>
                                �й�������֤�Ͽɼල����ίԱ����ȨCCC��֤���������
                        </p>
                        <p class='home_content' align='left'>
                                �й�������֤������ȨCQC��Ը��֤������
                        </p>
                        <p class='home_content' align='left'>
                                CCQSǩԼCE��֤���������
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
                <h3>�洢����ʵ����</h3>
        </div>
</div>
	<!--?php
		iframe_left();//ҳ����ߣ��˵���
	?-->
	
    <!--div class="right_2">
      <div class="right_nr">
        <div class="right_title">  <span style="float:left;font-size:13px;">��ǰλ�ã���ҳ > ���ҵ������ > �������� > <strong>����Э��</strong></span>
          <div class="clear"></div>
        </div>
        <div class="anlie">
          <div class="anlie_nr">
           
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
                <td width="90%" align='left'>�����������Ҫ�Ķ���ؼ��Э�飬Ȼ�󵥻���һ����<br>
                 </td>
              </tr>
			  
			  <tr><td>&nbsp;</td></tr>
			  <tr><td>&nbsp;</td></tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<form name="form_sel_obj" method="POST" action="sel_sample_type.php">
              <tr>
                <td width="20%" height="30" align="center" class="left_txt4"><strong>Э�����ݣ�</strong></td>             
				
				
               
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
              <td width="50%" height="30" align="center"><input type="button" value="��һ��" name="B1" onclick="mysubmit()" />
             &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="ȡ��" name="B12" /></td>
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

