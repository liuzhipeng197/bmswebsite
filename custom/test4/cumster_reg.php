<?php
	include_once("./include/function.php");
	//include_once("../include/db_mysql.php");
	iframe_head();
	session_unset();
?>

<script src="bootstrap/js/jquery.js" type="text/javascript" ></script>
<script src="bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<script type="text/javascript">
$(document).ready(function(){
    var doc=document,inputs=doc.getElementsByTagName('input'),supportPlaceholder='placeholder'in doc.createElement('input'),placeholder=function(input){var text=input.getAttribute('placeholder'),defaultValue=input.defaultValue;
    if(defaultValue==''){
        input.value=text}
        input.onfocus=function(){
            if(input.value===text){this.value=''}};
            input.onblur=function(){if(input.value===''){this.value=text}}};
            if(!supportPlaceholder){
                for(var i=0,len=inputs.length;i<len;i++){var input=inputs[i],text=input.getAttribute('placeholder');
                if(input.type==='text'&&text){placeholder(input)}}}});
</script>



<script type="text/javascript">
var str_sel_prov = ["����","�Ϻ�","���","����","�ӱ�","ɽ��","���ɹ�","����","����",
					"������","����","�㽭","����","����","����","ɽ��","����","����","����",
					"�㶫","����","����","�Ĵ�","����","����","����","����","����",
					"����","�ຣ","�½�","���","����","̨��"];
var str_sel_city = [["����","����","����","����","����","��̨","ʯ��ɽ","����","��ͷ��",
					"��ɽ","ͨ��","˳��","��ƽ","����","ƽ��","����","����","����"],
					["����","¬��","���","����","����","����","բ��","���","����",
					"����","��ɽ","�ζ�","�ֶ�","��ɽ","�ɽ�","����","�ϻ�","����","����"],
					["��ƽ","����","�Ӷ�","����","����","����","�Ͽ�","����","�ӱ�",
					"����","����","����","����","���","����","����","����","����"],
					["����","����","����","��ɿ�","����","ɳƺ��","������","�ϰ�",
					"����","��ʢ","˫��","�山","����","ǭ��","����","�뽭","����",
					"ͭ��","����","�ٲ�","��ɽ","��ƽ","�ǿ�","�ᶼ","�潭","��¡",
					"����","����","����","���","��ɽ","��Ϫ","ʯ��","��ɽ","����",
					"��ˮ","����","�ϴ�","����","�ϴ�"],
					["ʯ��ׯ","����","��̨","����","�żҿ�","�е�","�ȷ�","��ɽ","�ػʵ�","����","��ˮ"],
					["̫ԭ","��ͬ","��Ȫ","����","����","˷��","����","����","����","�ٷ�","�˳�"],
					["���ͺ���","��ͷ","�ں�","���","���ױ�����","��������","����ľ��","�˰���","�����첼��","���ֹ�����","�����׶���","����"],
					["����","����","��ɽ","��˳","��Ϫ","����","����","Ӫ��","����","����","�̽�","����","����","��«��"],
					["����","����","��ƽ","��Դ","ͨ��","��ɽ","��ԭ","�׳�","�ӱ�"],
					["������","�������","ĵ����","��ľ˹","����","�绯","�׸�","����","�ں�","˫Ѽɽ","����","��̨��","���˰���"],
					["�Ͼ�","��","����","��ͨ","����","�γ�","����","���Ƹ�","����","����","��Ǩ","̩��","����"],
					["����","����","����","����","����","����","��","����","��ɽ","̨��","��ˮ"],
					["�Ϸ�","�ߺ�","����","��ɽ","����","ͭ��","����","��ɽ","����","����","����","����","����","����","����","����","����"],
					["����","����","����","����","Ȫ��","����","��ƽ","����","����"],
					["�ϲ���","������","�Ž�","ӥ̶","Ƽ��","����","����","����","�˴�","����","����"],
					["����","�ൺ","�Ͳ�","��ׯ","��Ӫ","��̨","Ϋ��","����","̩��","����","����","����","����","����","�ĳ�","����","����"],
					["֣��","����","����","ƽ��ɽ","����","�ױ�","����","����","���","���","���","����Ͽ","����","����","����","�ܿ�","פ���","��Դ"],
					["�人","����","�˲�","����","�差","��ʯ","����","�Ƹ�","ʮ��","��ʩ","Ǳ��","����","����","����","����","Т��"],
					["��ɳ","����","����","��̶","����","����","����","����","¦��","����","����","����","����","�żҽ�"],
					["����","����","�麣","��ͷ","��ݸ","��ɽ","��ɽ","�ع�","����","տ��","ï��","����","����","÷��","��β","��Դ","����","��Զ","����","����","�Ƹ�"],
					["����","����","����","����","����","���Ǹ�","����","���","����","��������","���ݵ���","����","��ɫ","�ӳ�"],
					["����","����"],
					["�ɶ�","����","����","�Թ�","��֦��","��Ԫ","�ڽ�","��ɽ","�ϳ�","�˱�","�㰲","�ﴨ","�Ű�","üɽ","����","��ɽ","����"],
					["����","����ˮ","����","��˳","ͭ��","ǭ����","�Ͻ�","ǭ����","ǭ��"],
					["����","����","����","��Ϫ","��ͨ","����","���","��ɽ","˼é","��˫����","��ɽ","�º�","����","ŭ��","����","�ٲ�"],
					["����","�տ���","ɽ��","��֥","����","����","����"],
					["����","����","����","ͭ��","μ��","�Ӱ�","����","����","����","����"],
					["����","������","���","����","��ˮ","��Ȫ","��Ҵ","����","����","¤��","ƽ��","����","����","����"],
					["����","ʯ��ɽ","����","��ԭ"],
					["����","����","����","����","����","����","����","����"],
					["��³ľ��","ʯ����","��������","����","��������","����","�������տ¶�����","��������","��³��","����","��ʲ","����","������"],
					["���"],["����"],
					["̨��","����","̨��","̨��","����","��Ͷ","����","����","�û�","����","����","����","��԰","����","��¡","̨��","����","����","���"],
					];

	function loadProv(){
	/**��str_sel_prov�����е�ÿ��Ԫ����Ϊ��һ����ַѡ����option��ֵ */
		var dom_sel_prov=document.getElementById("sel_prov");
		var str_inHtm="";
		for(var i = 0; i < str_sel_prov.length; i++){
			str_inHtm=str_inHtm
					+"<option value='"+str_sel_prov[i]+"' "+(i==0?"selected='selected'":"")+">"
					+str_sel_prov[i]
					+"</option>";
		}
		str_inHtm="<select id='"+dom_sel_prov.id+"' onchange='loadCity()' style='width: 80px;'>"+str_inHtm+"</select>";
		dom_sel_prov.outerHTML=str_inHtm;
		loadCity();
	}
					

	function loadCity(){
		/**��str_sel_city�����ж�Ӧ����ѡ��ĵ�һ����ַѡ����optionֵ��Ԫ����Ϊ�ڶ�����ַѡ����option��ֵ */
			var int_idx=0;
			var dom_sel_prov=document.getElementById("sel_prov");
			for(var i = 0; i < dom_sel_prov.childNodes.length; i++){
				if(dom_sel_prov.childNodes[i].selected){
					int_idx=i;
					break;
				}
			}
			var str_SelData=str_sel_city[int_idx];
			var dom_sel_city = document.getElementById("sel_city");
			var str_inHtm = "";
			for(var i = 0; i < str_SelData.length; i++){
				str_inHtm = str_inHtm
						+"<option value='"+str_SelData[i]+"'>"
						+str_SelData[i]
						+"</option>";
			}
			str_inHtm="<select id='"+dom_sel_city.id+"'style='width: 90px;'>"+str_inHtm+"</select>";
			dom_sel_city.outerHTML=str_inHtm;
		}

	function cancel(){
		window.location.href="../index.php";
	}
	
	function register(){
		var cus_name=$('#cus_name').val();
		var cus_pwd=$('#cus_pwd').val();
		var cus_pwd2=$('#cus_pwd2').val();
		var cus_email=$('#cus_email').val();
		var cus_realname=$('#cus_realname').val();
		var cus_tel=$('#cus_tel').val();
		var question=$('#question').val();
		var answer=$('#answer').val();
		var com_name=$('#com_name').val();
		var sel_prov=$('#sel_prov').val();
		var sel_city=$('#sel_city').val();
		var com_addr=$('#com_addr').val();
		var com_zip=$('#com_zip').val();
		var com_website=$('#com_website').val();
		var com_tel=$('#com_tel').val();
		var com_fax=$('#com_fax').val();
		var checkb=document.getElementsByName("checkbox1");
		
		if(sel_prov== "����"||sel_prov== "�Ϻ�"||sel_prov== "���"||sel_prov== "����"){
			com_addr=sel_prov+"��"+sel_city+"��"+com_addr;
		}
		else{
			com_addr=sel_prov+"ʡ"+sel_city+"��"+com_addr;
		}
		if(cus_name=='' || cus_name=='�������û���...'){
			alert("���������ĵ�¼�û���");
		}else if(cus_pwd==''){
			alert("���������ĵ�¼����");
		}else if(cus_pwd2==''){
			alert("����������ȷ������");
		}else if(cus_email=='' || cus_email =='�������������...'){
			alert("���������ĸ��˵�������");
		}else if(cus_realname=='' || cus_realname=='��������ʵ����...'){
			alert("������������ʵ����");
		}else if(cus_tel=='' || cus_tel=='������11λ�ֻ�����...'){
			alert("�����������ֻ�����");
		}else if(question==''){
			alert("��ѡ�����İ�ȫ����");
		}else if(answer=='' || answer=='�����밲ȫ���ʴ�...'){
			alert("���������İ�ȫ���ʵĴ�");
		}else if(com_name=='' || com_name=='�����뵥λ����...'){
			alert("�������λ����");
		}else if(com_addr=='' || com_addr=='���������ĵ�ַ...'){
			alert("�������λ��ַ");
		}else if(com_zip=='' || com_zip=='�����뵥λ�ʱ�...'){
			alert("�������λ�ʱ�");
		}else if(com_website=='' || com_website=='�����뵥λ��ַ...'){
			alert("�������λ��ַ");
		}else if(com_tel=='' || com_tel=='�����뵥λ�绰...'){
			alert("�������λ�绰");
		}else if(com_fax=='' || com_fax=='�����뵥λ����...'){
			alert("�������λ����");
		}else if(cus_pwd!=cus_pwd2){
			alert("��������������벻һ�£�����������");
			document.getElementById('cus_pwd').value='';
			document.getElementById('cus_pwd2').value='';
		}else if(isEmail('cus_email')==false){
			alert('��������ȷ�ĸ��������ַ');
			document.getElementById('cus_email').value="";
			document.getElementById('cus_email').focus();
		}else if(isMobile('cus_tel')==false){
			alert('��������ȷ���ֻ�����');
			document.getElementById('cus_tel').value="";
			document.getElementById('cus_tel').focus();
		}else if(isZip('com_zip')==false){
			alert('��������ȷ�Ĺ�λ�ʱ��ַ');
			document.getElementById('com_zip').value="";
			document.getElementById('com_zip').focus();
		}/*else if(isEmail('com_email')==false){
			alert('��������ȷ�Ĺ�λ���������ַ');
			document.getElementById('com_email').value="";
			document.getElementById('com_email').focus();
		}*/else if(isTel('com_tel')==false){
			alert('��������ȷ�Ĺ�λ�绰����:�绰�����ʽΪ���Ҵ���(2��3λ)-����(2��3λ)-�绰����(7��8λ)-�ֻ���(3λ)"');
			document.getElementById('com_tel').value="";
			document.getElementById('com_tel').focus();
		}else if(isTel('com_fax')==false){
			alert('��������ȷ�Ĺ�λ�������:��������ʽΪ���Ҵ���(2��3λ)-����(2��3λ)-�������(7��8λ)-�ֻ���(3λ)');
			document.getElementById('com_fax').value="";
			document.getElementById('com_fax').focus();
		}else if(!checkb[0].checked){
			alert("����δ�Ķ�����˾ҵ������Э��");
		}else{
			//alert("OK");
			/**var dom_sel_prov = document.getElementById("sel_prov");
			var dom_sel_city = document.getElementById("sel_city");
			var com_addr = document.getElementById("com_addr");
			for(var i = 0; i < 5; i++){
				if(dom_sel_prov.id== str_sel_prov[i]&&i < 4){
					com_addr.value=dom_sel_prov.id+"��"+dom_sel_city.id+"��"+com_addr;
					break;
				}
				else if(i == 4){
					com_addr.value=dom_sel_prov.id+"ʡ"+dom_sel_city.id+"��"+com_addr.value;
				}
			}
			alert("com_addr.value");*/
		$.post("./task.php",{action:"register",cus_name:cus_name,cus_pwd:cus_pwd,
		cus_email:cus_email,cus_realname:cus_realname,cus_tel:cus_tel,question:question,
		answer:answer,com_name:com_name,com_addr:com_addr,com_zip:com_zip,
		com_website:com_website,com_tel:com_tel,com_fax:com_fax},function(data){
				if(data){
					alert("��ϲ��ע��ɹ������ǽ������������ע����Ϣ");
					window.location.href="../index.php";
				}else{
					alert("�Բ��𣬸��û����Ѿ����ڣ����޸������û���֮��������");
					//window.location.href="../index.php";
				}
			});
		}
	}
</script>
</head>

<body onload="loadProv()">
<div  class='juzhong'>
 <?php
	iframe_top();
 ?>
<div class='container-fluid'>    
	<div class='row-fluid'>	
		<div class='span6'>
			<div class='td_head' style='text-align:center;margin-top:20px'>
				������Ϣ
			</div>
<div class='alert_reg' align='left' style='padding:10px 0px 0px 0px'>
  <form class="form-horizontal" text-align='left'>
    <fieldset>
    <div class="control-group">

          <!-- Search input-->
          <label class="control-label">�û���</label>
          <div class="controls">
            <input type="text" id='cus_name' name='reg_name' placeholder="�������û���..." class="input-normal">
            <p class="help-block"></p>
          </div>

    </div>

    <div class="control-group">

          <!-- Search input-->
          <label class="control-label">��½����</label>
          <div class="controls">
            <input type="password" id='cus_pwd' name='reg_pwd2' placeholder="����" class="input-normal">
            <p class="help-block"></p>
          </div>

    </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">ȷ������</label>
          <div class="controls">
            <input type="password" id='cus_pwd2' name='reg_pwd2' placeholder="����ȷ��" class="input-normal">
            <p class="help-block"></p>
          </div>
    </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��������</label>
          <div class="controls">
            <input type="text" id='cus_email' name='reg_email' placeholder="�������������..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��ʵ����</label>
          <div class="controls">
            <input type="text" id='cus_realname' name='reg_realname' placeholder="��������ʵ����..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">�ֻ�����</label>
          <div class="controls">
            <input type="text" id='cus_tel' name='reg_tel' placeholder="������11λ�ֻ�����..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Select Basic -->
          <label class="control-label">��ȫ����</label>
          <div class="controls">
            <select class="input-normal" id='question' name='news_type'>
      <option>���ļ�������</option>
      <option>�����Ͷ���Сѧ����</option>
      <option>�����Ͷ��ĳ�������</option>
      <option>�����Ͷ��ĸ�������</option>
      <option>�����Ͷ��Ĵ�ѧ����</option>
      <option>����ϲ������ɫ</option>
      <option>����ϲ��������</option>
      <option>����ϲ���ĳ���</option></select>
          </div>

        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��ȫ�ش�</label>
          <div class="controls">
            <input type="text" placeholder="�����밲ȫ���ʴ�..." id='answer' name='answer' class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    

    </fieldset>
  </form>

			</div>
		</div>
		<div class='span6'>
			<div class='td_head' style='text-align:center;margin-top:20px'>
                                ��ҵ��Ϣ
                        </div>                                                                                                                                                                        
                        <div class='alert_reg' align='left' style='padding:10px 0px 0px 0px'>
                       			
  <form class="form-horizontal">
    <fieldset>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��λ����</label>
          <div class="controls">
            <input type="text" id='com_name' name='com_name' placeholder="�����뵥λ����..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Select Basic -->
          <label class="control-label">��λ��ַ</label>
          <div class="controls">
            <select id="sel_prov" name="sel_prov" onchange="loadCity()"></select>
	    <select id="sel_city" name="sel_city" style='width:100px'></select>
          </div>    
    </div>
   
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" id='com_addr' name='com_addr' placeholder="���������ĵ�ַ..." class="input-normal">
            <p class="help-block"></p>
          </div>
     </div> 

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��λ�ʱ�</label>
          <div class="controls">
            <input type="text" id='com_zip' name='com_zip' placeholder="�����뵥λ�ʱ�..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��λ��ַ</label>
          <div class="controls">
            <input type="text" id='com_website' name='com_website' placeholder="�����뵥λ��ַ..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��λ�绰</label>
          <div class="controls">
            <input type="text" id='com_tel' name='com_tel' placeholder="�����뵥λ�绰..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">��λ����</label>
          <div class="controls">
            <input type="text" id='com_fax' name='com_fax' placeholder="�����뵥λ����..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

        </div>

    </fieldset>
  </form>
 
                                </div>  
                        </div> 
	   </div>
	<div class='row'>
	<div class="control-group">
          <div class="controls">
      <!-- Inline Checkboxes -->
      		<label class="checkbox inline">
        		<input type="checkbox" name='checkbox1' value="checkbox">
        		��ϸ�Ķ�������
      		</label>
      		</br>
      		<label>
        		<a href='#myModal' style='color:blue' data-toggle='modal' value="NCTCҵ������Э��">NCTCҵ������Э��</a>
      		</label>
  	</div>
       </div>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    			<h3 id="myModalLabel">NCTCҵ������Э��</h3>
  		</div>
  		<div class="modal-body">
    			<p style="text-align:left;FONT-SIZE: 10pt; WIDTH: 100%; FONT-FAMILY: ����">
		<strong>1. �ر���ʾ</strong><br>		
        	1.1<br>
                �������˻�����Ϣ�������޹�˾(Beijing SINA Internet Information Service Co. Ltd.)���������������й������޹�˾(Sina.com Technology (China) Co., Ltd.)����ع�����ҵ�����ºϳ�? ����? ��>
ͬ�ⰴ�ձ�Э��Ĺ涨���䲻ʱ�����Ĳ��������ṩ���ڻ������Լ��ƶ�������ط������³�? �������? ����Ϊ���������񣬷���ʹ���ˣ����³�? �û�? ��Ӧ��ͬ�ⱾЭ���ȫ���������ҳ���ϵ���ʾ���ȫ����ע
������û��ڽ���ע���������е��? ͬ��? ��ť����ʾ�û���ȫ���ܱ�Э�����µ�ȫ�����<br>
                1.2<br>
                �û�ע��ɹ������˽�����ÿ���û�һ���û��ʺż���Ӧ�����룬���û��ʺź��������û����𱣹ܣ��û�Ӧ���������û��ʺŽ��е����л���¼����������Ρ�<br>
        1.3<br>
        �û�ע��ɹ�����ʹ������/����΢������Ĺ����У����˹�˾��Ȩ�����û��Ĳ�����Ϊ���з���ҵ�Եĵ����о���
                <br><strong>2. ��������</strong><br>
                2.1<br>
                �����������ľ������������˸���ʵ������ṩ�����粩�͡����͡��������֡��������ֻ�ͼƬ�������ء����ѡ���̳(BBS)�������ҡ������ʼ��������������۵ȡ�<br>
                2.2<br>
                �����ṩ�Ĳ���������������ֻ�ͼƬ�������ء������ʼ��ȣ�Ϊ�շѵ���������û�ʹ���շ����������Ҫ������֧��һ���ķ��á������շѵ�����������˻����û�ʹ��֮ǰ�����û���ȷ����ʾ��
ֻ���û�������ʾȷ����Ը��֧����ط��ã��û�����ʹ�øõ��շ�����������û��ܾ�֧����ط��ã���������Ȩ�����û��ṩ�õ��շ��������<br>
                2.3<br>
                �û���⣬���˽��ṩ��ص�������񣬳���֮���������������йص��豸������˵��ԡ��ֻ�������������뻥�������ƶ����йص�װ�ã�������ķ��ã���Ϊ���뻥������֧���ĵ绰�Ѽ������ѡ�Ϊʹ
���ƶ�����֧�����ֻ��ѣ���Ӧ���û����и�����
                <br><strong>3. ���������жϻ���ֹ</strong><br>
                3.1<br>
                �����������������ԣ��û�ͬ��������Ȩ��ʱ������жϻ���ֹ���ֻ�ȫ����������񣨰����շ�����������������񣩡��������жϻ���ֹ�������������������������������֪ͨ�û���Ҳ��
����κ��û����κε������е��κ����Σ��������жϻ���ֹ��������������շ������������Ӧ���ڱ�����жϻ���ֹ֮ǰ����֪ͨ�û�����Ӧ����Ӱ����û��ṩ��ֵ������Ե��շ�����������û���Ը��������
�Ե��շ�������񣬾͸��û��Ѿ�������֧���ķ���ѣ�����Ӧ�����ո��û�ʵ��ʹ����Ӧ�շ�������������۳���Ӧ�����֮��ʣ��ķ�����˻������û���<br>
                3.2<br>
                �û���⣬������Ҫ���ڻ򲻶��ڵض��ṩ��������ƽ̨���绥������վ���ƶ�����ȣ�����ص��豸���м��޻���ά��������������������շ���������ں���ʱ���ڵ��жϣ���������Ϊ�˳е��κ���
�Σ�������Ӧ���������Ƚ���ͨ�档<br>
                3.3<br>
                �緢�������κ�һ�����Σ�������Ȩ��ʱ�жϻ���ֹ���û��ṩ��Э�����µ�������񡾸��������������������շѼ��������������а������ڹ��ģʽ�����������񣩡���������û����κε�����
�е��κ����Σ�  
                <br>
                3.3.1 �û��ṩ�ĸ������ϲ���ʵ��<br>
                <br>
                3.3.2 �û�Υ����Э���й涨��ʹ�ù���<br>
                <br>
                3.3.3 �û���ʹ���շ��������ʱδ���涨������֧����Ӧ�ķ���ѡ�<br>
                <br>
			</p>
  		</div>
  		<div class="modal-footer">
    			<button class="btn" data-dismiss="modal" aria-hidden="true">�Ķ����</button>
  		</div>
	</div>
	        <div class='row'>
        <div class="control-group">
          <label class="control-label"></label>
                
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success" style='margin:-10px 0px 40px 30px;padding:10px 200px 10px 200px' onclick='register();'>ע��</button>
          </div>
        </div>
        </div>
</div>
<?php
	iframe_bottom(); 
?>
</div>
</body>
</html>

