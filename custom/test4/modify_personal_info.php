<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
	 $str_id=$_SESSION['cus_id'];
	$sql = "select * from bms_custom where cus_id='$str_id'";
	$result = mysql_query($sql,$conn);
	$row = @mysql_fetch_array($result, MYSQL_BOTH);

		$str_cusname=$row['cus_name'];
        $str_realname=$row['cus_realname'];
        $str_email=$row['cus_email'];
        $str_custel=$row['cus_tel'];
        $str_addr=$row['com_addr'];
        $str_comname=$row['com_name'];
        $str_zip=$row['com_zip'];
        $str_website=$row['com_website'];
        $str_comtel=$row['com_tel'];
        $str_fax=$row['com_fax'];
        $str_address1=explode('��',$str_addr,2);
        if(strcmp($str_address1[0],'����')==0||strcmp($str_address1[0],'�Ϻ�')==0||strcmp($str_address1[0],'���')==0||strcmp($str_address1[0],'����')==0){
        	$str_address2=explode('��',$str_address1[1],2);
			//print_r($str_address2);
        }
        else{
        	$str_address1=explode('ʡ',$str_addr,2);
        	$str_address2=explode('��',$str_address1[1],2);
        }
	
?>

<script type="text/javascript" language="JavaScript"> 
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
					+"<option value='"+str_sel_prov[i]+"' "+(str_sel_prov[i]=='<?php echo $str_address1[0]?>'?"selected='selected'":"")+">"
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
			        +"<option value='"+str_SelData[i]+"' "+(str_SelData[i]=='<?php echo $str_address2[0]?>'?"selected='selected'":"")+">"
					+str_SelData[i]
					+"</option>";
		}
		str_inHtm="<select id='"+dom_sel_city.id+"'style='width: 83px;'>"+str_inHtm+"</select>";
		dom_sel_city.outerHTML=str_inHtm;
	}
	
function modify(){
			var str_logname="<?php echo $str_realname?>";			//��ȡ��־���������id
			
			var str_id=<?php echo $str_id?>;
			var str_realname=$('#realname').val();
			var str_email=$('#email').val();
			var str_custel=$('#custel').val(); 
			var str_comname=$('#comname').val();
			var str_zip=$('#zip').val(); 
			var str_addr=$('#address').val();
			var str_website=$('#website').val();
            		var str_comtel=$('#comtel').val();
            		var str_fax=$('#fax').val(); 
           		var sel_prov=$('#sel_prov').val();
    			var sel_city=$('#sel_city').val();
			var str_message="";
    		if(sel_prov== "����"||sel_prov== "�Ϻ�"||sel_prov== "���"||sel_prov== "����"){
    			str_addr=sel_prov+"��"+sel_city+"��"+str_addr;
    		}
    		else{
    			str_addr=sel_prov+"ʡ"+sel_city+"��"+str_addr;
    		}
		 if(str_realname==''){
                         alert('��ʵ��������Ϊ�գ�������');
                 }else if(str_email=='' || isEmail('email')==false){
    			alert('��������ȷ�ĸ��������ַ');
    			document.getElementById('email').value="";
    			document.getElementById('email').focus();
    		}else if(str_custel=='' || isMobile('custel')==false){
    			alert('��������ȷ���ֻ�����');
    			document.getElementById('custel').value="";
    			document.getElementById('custel').focus();
    		}else if(str_comname==''){
			alert('��˾���Ʋ���Ϊ�գ�������');
		}else if(str_zip=='' || isZip('zip')==false){
    			alert('��������ȷ�Ĺ�λ�ʱ�');
    			document.getElementById('zip').value="";
    			document.getElementById('zip').focus();
    		}else if(str_comtel=='' || isTel('comtel')==false){
    			alert('��������ȷ�Ĺ�λ�绰����:����(2��3λ)-�绰����(7��8λ)-�ֻ���(3λ)"');
    			document.getElementById('comtel').value="";
    			document.getElementById('comtel').focus();
    		}else if(str_fax==''|| isTel('fax')==false){
    			alert('��������ȷ�Ĺ�λ�������:����(2��3λ)-�������(7��8λ)-�ֻ���(3λ)');
    			document.getElementById('fax').value="";
    			document.getElementById('fax').focus();
    		}else{
        		if(str_realname!=<?php echo "'".$str_realname."'"?>){
					str_message=str_message+"��ʵ������<?php echo "��".$str_realname."��"?>��Ϊ��"+str_realname+"��.";
				}
				if(str_custel!=<?php echo "'".$str_custel."'"?>){
					str_message=str_message+"�绰��<?php echo "��".$str_custel."��"?>��Ϊ��"+str_custel+"��.";
				}
				if(str_email!=<?php echo "'".$str_email."'"?>){
					str_message=str_message+"������<?php echo "��".$str_email."��"?>��Ϊ��"+str_email+"��.";
				}
				if(str_comname!=<?php echo "'".$str_comname."'"?>){
					str_message=str_message+"��λ������<?php echo "��".$str_comname."��"?>��Ϊ��"+str_comname+"��.";
				}
				if(str_website!=<?php echo "'".$str_website."'"?>){
					str_message=str_message+"��λ��ַ��<?php echo "��".$str_website."��"?>��Ϊ��"+str_website+"��.";
				}
				if(str_addr!=<?php echo "'".$str_addr."'"?>){
					str_message=str_message+"��λ��ַ��<?php echo "��".$str_addr."��"?>��Ϊ��"+str_addr+"��.";
				}
				if(str_zip!=<?php echo "'".$str_zip."'"?>){
					str_message=str_message+"��λ�ʱ���<?php echo "��".$str_zip."��"?>��Ϊ��"+str_zip+"��.";
				}
				if(str_comtel!=<?php echo "'".$str_comtel."'"?>){
					str_message=str_message+"��λ�绰��<?php echo "��".$str_comtel."��"?>��Ϊ��"+str_comtel+"��.";
				}
				if(str_fax!=<?php echo "'".$str_fax."'"?>){
					str_message=str_message+"��λ������<?php echo "��".$str_fax."��"?>��Ϊ��"+str_fax+"��.";
				}
				//alert(str_message);
				if(str_message){
					$.post("./task.php",{action:"modify_personal_info",str_message:str_message,str_logname:str_logname,str_id:str_id,str_realname:str_realname,str_email:str_email,str_custel:str_custel,str_comname:str_comname,str_zip:str_zip,str_addr:str_addr,str_website:str_website,str_comtel:str_comtel,str_fax:str_fax},function(data){
						if(data){
							//alert(data);
							alert("�ͻ���Ϣ�޸ĳɹ���");
							window.location.href="./modify_personal_info.php";
							//clear();
						}else{
							alert("�ͻ���Ϣ�޸�ʧ�ܣ�");
							
						}
					});
				}else{
					alert("��δ����Ϣ�����޸�");
				}
    		}		
 }
 
 
</script>
<body onload="loadProv()">
<div class="juzhong">
  <?php
	iframe_top();//ҳ��ͷ��
	?>
	
  <div align='left'>                                                                                                                                                                          
                <ul class="bmsbreadcrumb">                                                                                                                                                            
                        <li><a href="index.php">��ҳ</a> <span class="divider">/</span></li>                                                                                                          
                        <li><a href="#">������Ϣ����</a> <span class="divider">/</span></li>                                                                                                          
                        <li class="active">�޸ĸ�����Ϣ</li>                                                                                                                                          
                </ul>                                                                                                                                                                                 
          
  </div>
  
  <div class="main_2">
    <div class='row-fluid'>
        <div class='span2'>
            <div class='left-tag'>
                <ul class="bmsnav bmsnav-list">
                        <li class="bmsnav-header" align='left'><i class='icon-home'></i>������Ϣ����</li>
                        <li class="active" align='left'><a href="#"><i class='icon-search'></i> &nbsp;&nbsp;�޸ĸ�����Ϣ</a></li>
                        <li align='left'><a href="modify_login_password.php"><i class='icon-tag'></i> &nbsp;&nbsp;�޸ĵ�¼����</a></li>
                </ul>
            </div>
        </div>
        <div class='span10'>
        <div class="anlie_2">
          <div class="anlie_nr">
          
			 <table width="100%" border="0" cellpadding="0" cellspacing="3">
	<tr>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgColor="#a8c7ce" style="border:solid 1px #a8c7ce" > 
			<tr height="30">
				<td width="100%" height="20" class="td_head">������Ϣ</td>
			</tr>
			<tr>
			<td>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left;margin-top:10px">&nbsp;&nbsp;&nbsp;&nbsp;��&nbsp;&nbsp;&nbsp;&nbsp;����<input type="text" id="realname" name="realname" size="45" value="<?php echo $str_realname?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��&nbsp;&nbsp;&nbsp;&nbsp;����<input type="text" id="custel" name="custel" size="45" value="<?php echo $str_custel?>"></div></td>
			</td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��&nbsp;&nbsp;&nbsp;&nbsp;�䣺<input type="text" id="email" name="email" size="45"  value="<?php echo $str_email?>"></div></td>
			</tr>
			</tr>
			<tr height="30">
				<td class="td_head">��λ��Ϣ</td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left;margin-top:10px">&nbsp;&nbsp;&nbsp;&nbsp;��λ���ƣ�<input type="text" id="comname" name="comname" size="45" value="<?php echo $str_comname?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��λ��ַ��<input type="text" id="website" name="website" size="45"  value="<?php echo $str_website?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��λ��ַ��<select id="sel_prov" name="sel_prov" onchange="loadCity()" style="width: 60px;"></select><select id="sel_city" name="sel_city"></select><input type="text" id="address" name="address" size="24" value="<?php echo $str_address2[1]?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��λ�ʱࣺ<input type="text" id="zip" name="zip" size="45"  value="<?php echo $str_zip?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��λ�绰��<input type="text" id="comtel" name="comtel" size="45" value="<?php echo $str_comtel?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;��λ���棺<input type="text" id="fax" name="fax" size="45"  value="<?php echo $str_fax?>"></div></td>
			</tr>
		</td>
	</tr>
</table>
<tr> 
	<td height="40" valign="middle" align="left">
		
		<input type="button" class='edit_buttom' id="button"  onclick=modify() value="����޸�" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
	</td>
	
</tr>
</table>
		 
			  
          </div>
          
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="bottom">
   <?php
	iframe_bottom();
   ?>
  </div>

</div>
</body>
</html>

