<?php
	session_start();
	include("../include/function.php");
	include_once("../include/db_mysql.php");
	iframe_head();
?>

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
		str_inHtm="<select id='"+dom_sel_prov.id+"' onchange='loadCity()' style='width: 60px;'>"+str_inHtm+"</select>";
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
		if(cus_name==''){
			alert("���������ĵ�¼�û���");
		}else if(cus_pwd==''){
			alert("���������ĵ�¼����");
		}else if(cus_pwd2==''){
			alert("����������ȷ������");
		}else if(cus_email==''){
			alert("���������ĸ��˵�������");
		}else if(cus_realname==''){
			alert("������������ʵ����");
		}else if(cus_tel==''){
			alert("�����������ֻ�����");
		}else if(question==''){
			alert("��ѡ�����İ�ȫ����");
		}else if(answer==''){
			alert("���������İ�ȫ���ʵĴ�");
		}else if(com_name==''){
			alert("�������λ����");
		}else if(com_addr==''){
			alert("�������λ��ַ");
		}else if(com_zip==''){
			alert("�������λ�ʱ�");
		}/*else if(com_website==''){
			alert("�������λ��ַ");
		}*/else if(com_tel==''){
			alert("�������λ�绰");
		}else if(com_fax==''){
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
			alert('��������ȷ�Ĺ�λ�绰����:����(2��3λ)-�绰����(7��8λ)-�ֻ���(3λ)"');
			document.getElementById('com_tel').value="";
			document.getElementById('com_tel').focus();
		}else if(isTel('com_fax')==false){
			alert('��������ȷ�Ĺ�λ�������:����(2��3λ)-�������(7��8λ)-�ֻ���(3λ)');
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

<body onload="loadProv()" POSITION:absolute; top:0; left:0;>
<div  style="background:#c7e3f1; width:960px; margin: auto; margin-top: 0px;">
 <?php
	head_logo();
?>
<div class="right2">
	<div align="center">
		<table width="292" class="regtable">
			<tr height="20"></tr>
			<tr>
			<td colspan="3"><div align="left"><strong>- ������Ϣ</strong></div></td></tr>
			<tr><td width="26"></td><td width="62">��¼���ƣ�</td><td width="188"><input id="cus_name" name="reg_name" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>��¼���룺</td><td><input id="cus_pwd" name="cus_pwd" type="password" />&nbsp;* </td></tr>
			<tr><td></td><td>ȷ�����룺</td><td><input id="cus_pwd2" name="cus_pwd2" type="password"/>&nbsp;* </td></tr>
			<tr><td></td><td>�������䣺</td><td><input id="cus_email" name="cus_email" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>��ʵ������</td><td><input id="cus_realname" name="cus_realname" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>�ֻ����룺</td><td><input id="cus_tel" name="cus_tel" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>��ȫ���ʣ�</td><td><select id="question" name="news_type" style="width:150px;" >
																						<option value="0" selected="selected">���ļ�������</option>
																						<option value="1">�����Ͷ���Сѧ����</option>
																						<option value="2">�����Ͷ��ĳ�������</option>
																						<option value="3">�����Ͷ��ĸ�������</option>
																						<option value="4">�����Ͷ��Ĵ�ѧ����</option>
																						<option value="5">����ϲ������ɫ</option>
																						<option value="6">����ϲ��������</option>
																						<option value="7">����ϲ���ĳ���</option>
																						</select> &nbsp; </td></tr>
			<tr><td></td><td>��ȫ�ش�</td><td><input id="answer" name="answer" type="text"/>&nbsp;*</td></tr>
		<tr>
		<td colspan="3"><div align="left"><strong>- ��λ��Ϣ</strong></div></td></tr>
		<tr><td></td><td>��λ���ƣ�</td><td><input id="com_name" name="com_name" type="text"/>&nbsp;*</td></tr>
		<!-- <tr><td></td><td>��λ��ַ��</td><td><input id="com_addr" name="com_addr" type="text"/>&nbsp;*</td></tr>-->
		<tr><td></td><td style="vertical-align: top;">��λ��ַ��</td><td><select id="sel_prov" name="sel_prov" onchange="loadCity()" style="width: 60px;"></select><select id="sel_city" name="sel_city"></select>&nbsp;</td></tr>
		<tr><td></td><td></td><td><input id="com_addr" name="com_addr" type="text"/>&nbsp;*</td></tr>
		<tr><td></td><td>��λ�ʱࣺ</td><td><input id="com_zip" name="com_zip" type="text"/>&nbsp;*</td></tr>
		<tr><td></td><td>��λ��ַ��</td><td><input id="com_website" name="com_website" type="text"/>&nbsp;&nbsp;</td></tr>
		<tr><td></td><td>��λ�绰��</td><td><input id="com_tel" name="com_tel" type="text"/>&nbsp;*</td></tr>
		<tr><td></td><td>��λ���棺</td><td><input id="com_fax" name="com_fax" type="text"/>&nbsp;*</td></td></tr>
		<tr><td></td><td>ע�����</td><td><input type="checkbox" name="checkbox1" value="checkbox"> ������ϸ�Ķ�������</br><a href="reg_protocol.php" class="font_gray14" target="_blank">��ڹ�˾ҵ������Э��</a></td></tr>
		<tr height="10"></tr>
		<tr>
		<!--<tr><td colspan="3" style="text-align:center;"><div class="btn"><a href='javascript:;' onclick="javascript:register();">&nbsp;</a></div></td></tr></table>-->
		<tr><td colspan="3" style="text-align:center;"><input type="button" class="btn" value="ע  ��" onclick="register();"/>&nbsp;
		&nbsp;&nbsp;&nbsp;<input type="button" value="ȡ  ��" class="btn" onclick="cancel();"/></td></tr>
		<tr height="20"></tr>
		</table>

</div>
</div><!-- end main -->
<?php
	footer(); 
?>
</div>
</body>
</html>

