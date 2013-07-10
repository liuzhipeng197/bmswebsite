<?php
	session_start();
	include("../include/function.php");
	include_once("../include/db_mysql.php");
	iframe_head();
?>

<script type="text/javascript">
var str_sel_prov = ["北京","上海","天津","重庆","河北","山西","内蒙古","辽宁","吉林",
					"黑龙江","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南",
					"广东","广西","海南","四川","贵州","云南","西藏","陕西","甘肃",
					"宁夏","青海","新疆","香港","澳门","台湾"];
var str_sel_city = [["东城","西城","崇文","宣武","朝阳","丰台","石景山","海淀","门头沟",
					"房山","通州","顺义","昌平","大兴","平谷","怀柔","密云","延庆"],
					["黄浦","卢湾","徐汇","长宁","静安","普陀","闸北","虹口","杨浦",
					"闵行","宝山","嘉定","浦东","金山","松江","青浦","南汇","奉贤","崇明"],
					["和平","东丽","河东","西青","河西","津南","南开","北辰","河北",
					"武清","红挢","塘沽","汉沽","大港","宁河","静海","宝坻","蓟县"],
					["万州","涪陵","渝中","大渡口","江北","沙坪坝","九龙坡","南岸",
					"北碚","万盛","双挢","渝北","巴南","黔江","长寿","綦江","潼南",
					"铜梁","大足","荣昌","壁山","梁平","城口","丰都","垫江","武隆",
					"忠县","开县","云阳","奉节","巫山","巫溪","石柱","秀山","酉阳",
					"彭水","江津","合川","永川","南川"],
					["石家庄","邯郸","邢台","保定","张家口","承德","廊坊","唐山","秦皇岛","沧州","衡水"],
					["太原","大同","阳泉","长治","晋城","朔州","吕梁","忻州","晋中","临汾","运城"],
					["呼和浩特","包头","乌海","赤峰","呼伦贝尔盟","阿拉善盟","哲里木盟","兴安盟","乌兰察布盟","锡林郭勒盟","巴彦淖尔盟","鄂市"],
					["沈阳","大连","鞍山","抚顺","本溪","丹东","锦州","营口","阜新","辽阳","盘锦","铁岭","朝阳","葫芦岛"],
					["长春","吉林","四平","辽源","通化","白山","松原","白城","延边"],
					["哈尔滨","齐齐哈尔","牡丹江","佳木斯","大庆","绥化","鹤岗","鸡西","黑河","双鸭山","伊春","七台河","大兴安岭"],
					["南京","镇江","苏州","南通","扬州","盐城","徐州","连云港","常州","无锡","宿迁","泰州","淮安"],
					["杭州","宁波","温州","嘉兴","湖州","绍兴","金华","衢州","舟山","台州","丽水"],
					["合肥","芜湖","蚌埠","马鞍山","淮北","铜陵","安庆","黄山","滁州","宿州","池州","淮南","巢湖","阜阳","六安","宣城","亳州"],
					["福州","厦门","莆田","三明","泉州","漳州","南平","龙岩","宁德"],
					["南昌市","景德镇","九江","鹰潭","萍乡","新馀","赣州","吉安","宜春","抚州","上饶"],
					["济南","青岛","淄博","枣庄","东营","烟台","潍坊","济宁","泰安","威海","日照","莱芜","临沂","德州","聊城","滨州","菏泽"],
					["郑州","开封","洛阳","平顶山","安阳","鹤壁","新乡","焦作","濮阳","许昌","漯河","三门峡","南阳","商丘","信阳","周口","驻马店","济源"],
					["武汉","鄂州","宜昌","荆州","襄樊","黄石","荆门","黄冈","十堰","恩施","潜江","天门","仙桃","随州","咸宁","孝感"],
					["长沙","常德","株洲","湘潭","衡阳","岳阳","邵阳","益阳","娄底","怀化","郴州","永州","湘西","张家界"],
					["广州","深圳","珠海","汕头","东莞","中山","佛山","韶关","江门","湛江","茂名","肇庆","惠州","梅州","汕尾","河源","阳江","清远","潮州","揭阳","云浮"],
					["南宁","柳州","桂林","梧州","北海","防城港","钦州","贵港","玉林","南宁地区","柳州地区","贺州","百色","河池"],
					["海口","三亚"],
					["成都","绵阳","德阳","自贡","攀枝花","广元","内江","乐山","南充","宜宾","广安","达川","雅安","眉山","甘孜","凉山","泸州"],
					["贵阳","六盘水","遵义","安顺","铜仁","黔西南","毕节","黔东南","黔南"],
					["昆明","大理","曲靖","玉溪","昭通","楚雄","红河","文山","思茅","西双版纳","保山","德宏","丽江","怒江","迪庆","临沧"],
					["拉萨","日喀则","山南","林芝","昌都","阿里","那曲"],
					["西安","宝鸡","咸阳","铜川","渭南","延安","榆林","汉中","安康","商洛"],
					["兰州","嘉峪关","金昌","白银","天水","酒泉","张掖","武威","定西","陇南","平凉","庆阳","临夏","甘南"],
					["银川","石嘴山","吴忠","固原"],
					["西宁","海东","海南","海北","黄南","玉树","果洛","海西"],
					["乌鲁木齐","石河子","克拉玛依","伊犁","巴音郭勒","昌吉","克孜勒苏柯尔克孜","博尔塔拉","吐鲁番","哈密","喀什","和田","阿克苏"],
					["香港"],["澳门"],
					["台北","高雄","台中","台南","屏东","南投","云林","新竹","彰化","苗栗","嘉义","花莲","桃园","宜兰","基隆","台东","金门","马祖","澎湖"],
					];

	function loadProv(){
	/**将str_sel_prov数组中的每个元素作为第一个地址选择框各option的值 */
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
		/**将str_sel_city数组中对应于已选择的第一个地址选择框的option值的元素作为第二个地址选择框各option的值 */
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
		
		if(sel_prov== "北京"||sel_prov== "上海"||sel_prov== "天津"||sel_prov== "重庆"){
			com_addr=sel_prov+"市"+sel_city+"区"+com_addr;
		}
		else{
			com_addr=sel_prov+"省"+sel_city+"市"+com_addr;
		}
		if(cus_name==''){
			alert("请输入您的登录用户名");
		}else if(cus_pwd==''){
			alert("请输入您的登录密码");
		}else if(cus_pwd2==''){
			alert("请输入您的确认密码");
		}else if(cus_email==''){
			alert("请输入您的个人电子邮箱");
		}else if(cus_realname==''){
			alert("请输入您的真实姓名");
		}else if(cus_tel==''){
			alert("请输入您的手机号码");
		}else if(question==''){
			alert("请选择您的安全提问");
		}else if(answer==''){
			alert("请输入您的安全提问的答案");
		}else if(com_name==''){
			alert("请输入贵单位名称");
		}else if(com_addr==''){
			alert("请输入贵单位地址");
		}else if(com_zip==''){
			alert("请输入贵单位邮编");
		}/*else if(com_website==''){
			alert("请输入贵单位网址");
		}*/else if(com_tel==''){
			alert("请输入贵单位电话");
		}else if(com_fax==''){
			alert("请输入贵单位传真");
		}else if(cus_pwd!=cus_pwd2){
			alert("您两次输入的密码不一致，请重新输入");
			document.getElementById('cus_pwd').value='';
			document.getElementById('cus_pwd2').value='';
		}else if(isEmail('cus_email')==false){
			alert('请输入正确的个人邮箱地址');
			document.getElementById('cus_email').value="";
			document.getElementById('cus_email').focus();
		}else if(isMobile('cus_tel')==false){
			alert('请输入正确的手机号码');
			document.getElementById('cus_tel').value="";
			document.getElementById('cus_tel').focus();
		}else if(isZip('com_zip')==false){
			alert('请输入正确的贵单位邮编地址');
			document.getElementById('com_zip').value="";
			document.getElementById('com_zip').focus();
		}/*else if(isEmail('com_email')==false){
			alert('请输入正确的贵单位电子邮箱地址');
			document.getElementById('com_email').value="";
			document.getElementById('com_email').focus();
		}*/else if(isTel('com_tel')==false){
			alert('请输入正确的贵单位电话号码:区号(2到3位)-电话号码(7到8位)-分机号(3位)"');
			document.getElementById('com_tel').value="";
			document.getElementById('com_tel').focus();
		}else if(isTel('com_fax')==false){
			alert('请输入正确的贵单位传真号码:区号(2到3位)-传真号码(7到8位)-分机号(3位)');
			document.getElementById('com_fax').value="";
			document.getElementById('com_fax').focus();
		}else if(!checkb[0].checked){
			alert("您尚未阅读本公司业务申请协议");
		}else{
			//alert("OK");
			/**var dom_sel_prov = document.getElementById("sel_prov");
			var dom_sel_city = document.getElementById("sel_city");
			var com_addr = document.getElementById("com_addr");
			for(var i = 0; i < 5; i++){
				if(dom_sel_prov.id== str_sel_prov[i]&&i < 4){
					com_addr.value=dom_sel_prov.id+"市"+dom_sel_city.id+"区"+com_addr;
					break;
				}
				else if(i == 4){
					com_addr.value=dom_sel_prov.id+"省"+dom_sel_city.id+"市"+com_addr.value;
				}
			}
			alert("com_addr.value");*/
		$.post("./task.php",{action:"register",cus_name:cus_name,cus_pwd:cus_pwd,
		cus_email:cus_email,cus_realname:cus_realname,cus_tel:cus_tel,question:question,
		answer:answer,com_name:com_name,com_addr:com_addr,com_zip:com_zip,
		com_website:com_website,com_tel:com_tel,com_fax:com_fax},function(data){
				if(data){
					alert("恭喜您注册成功，我们将尽快审核您的注册信息");
					window.location.href="../index.php";
				}else{
					alert("对不起，该用户名已经存在，请修改您的用户名之后再重试");
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
			<td colspan="3"><div align="left"><strong>- 个人信息</strong></div></td></tr>
			<tr><td width="26"></td><td width="62">登录名称：</td><td width="188"><input id="cus_name" name="reg_name" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>登录密码：</td><td><input id="cus_pwd" name="cus_pwd" type="password" />&nbsp;* </td></tr>
			<tr><td></td><td>确认密码：</td><td><input id="cus_pwd2" name="cus_pwd2" type="password"/>&nbsp;* </td></tr>
			<tr><td></td><td>电子邮箱：</td><td><input id="cus_email" name="cus_email" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>真实姓名：</td><td><input id="cus_realname" name="cus_realname" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>手机号码：</td><td><input id="cus_tel" name="cus_tel" type="text"/>&nbsp;* </td></tr>
			<tr><td></td><td>安全提问：</td><td><select id="question" name="news_type" style="width:150px;" >
																						<option value="0" selected="selected">您的家乡名称</option>
																						<option value="1">您所就读的小学名称</option>
																						<option value="2">您所就读的初中名称</option>
																						<option value="3">您所就读的高中名称</option>
																						<option value="4">您所就读的大学名称</option>
																						<option value="5">您所喜欢的颜色</option>
																						<option value="6">您所喜欢的明星</option>
																						<option value="7">您所喜欢的宠物</option>
																						</select> &nbsp; </td></tr>
			<tr><td></td><td>安全回答：</td><td><input id="answer" name="answer" type="text"/>&nbsp;*</td></tr>
		<tr>
		<td colspan="3"><div align="left"><strong>- 单位信息</strong></div></td></tr>
		<tr><td></td><td>单位名称：</td><td><input id="com_name" name="com_name" type="text"/>&nbsp;*</td></tr>
		<!-- <tr><td></td><td>单位地址：</td><td><input id="com_addr" name="com_addr" type="text"/>&nbsp;*</td></tr>-->
		<tr><td></td><td style="vertical-align: top;">单位地址：</td><td><select id="sel_prov" name="sel_prov" onchange="loadCity()" style="width: 60px;"></select><select id="sel_city" name="sel_city"></select>&nbsp;</td></tr>
		<tr><td></td><td></td><td><input id="com_addr" name="com_addr" type="text"/>&nbsp;*</td></tr>
		<tr><td></td><td>单位邮编：</td><td><input id="com_zip" name="com_zip" type="text"/>&nbsp;*</td></tr>
		<tr><td></td><td>单位网址：</td><td><input id="com_website" name="com_website" type="text"/>&nbsp;&nbsp;</td></tr>
		<tr><td></td><td>单位电话：</td><td><input id="com_tel" name="com_tel" type="text"/>&nbsp;*</td></tr>
		<tr><td></td><td>单位传真：</td><td><input id="com_fax" name="com_fax" type="text"/>&nbsp;*</td></td></tr>
		<tr><td></td><td>注册条款：</td><td><input type="checkbox" name="checkbox1" value="checkbox"> 我已仔细阅读并接受</br><a href="reg_protocol.php" class="font_gray14" target="_blank">尊冠公司业务申请协议</a></td></tr>
		<tr height="10"></tr>
		<tr>
		<!--<tr><td colspan="3" style="text-align:center;"><div class="btn"><a href='javascript:;' onclick="javascript:register();">&nbsp;</a></div></td></tr></table>-->
		<tr><td colspan="3" style="text-align:center;"><input type="button" class="btn" value="注  册" onclick="register();"/>&nbsp;
		&nbsp;&nbsp;&nbsp;<input type="button" value="取  消" class="btn" onclick="cancel();"/></td></tr>
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

