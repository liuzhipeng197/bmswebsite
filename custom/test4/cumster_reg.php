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
		str_inHtm="<select id='"+dom_sel_prov.id+"' onchange='loadCity()' style='width: 80px;'>"+str_inHtm+"</select>";
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
		if(cus_name=='' || cus_name=='请输入用户名...'){
			alert("请输入您的登录用户名");
		}else if(cus_pwd==''){
			alert("请输入您的登录密码");
		}else if(cus_pwd2==''){
			alert("请输入您的确认密码");
		}else if(cus_email=='' || cus_email =='请输入电子邮箱...'){
			alert("请输入您的个人电子邮箱");
		}else if(cus_realname=='' || cus_realname=='请输入真实姓名...'){
			alert("请输入您的真实姓名");
		}else if(cus_tel=='' || cus_tel=='请输入11位手机号码...'){
			alert("请输入您的手机号码");
		}else if(question==''){
			alert("请选择您的安全提问");
		}else if(answer=='' || answer=='请输入安全提问答案...'){
			alert("请输入您的安全提问的答案");
		}else if(com_name=='' || com_name=='请输入单位名称...'){
			alert("请输入贵单位名称");
		}else if(com_addr=='' || com_addr=='请输入具体的地址...'){
			alert("请输入贵单位地址");
		}else if(com_zip=='' || com_zip=='请输入单位邮编...'){
			alert("请输入贵单位邮编");
		}else if(com_website=='' || com_website=='请输入单位网址...'){
			alert("请输入贵单位网址");
		}else if(com_tel=='' || com_tel=='请输入单位电话...'){
			alert("请输入贵单位电话");
		}else if(com_fax=='' || com_fax=='请输入单位传真...'){
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
			alert('请输入正确的贵单位电话号码:电话号码格式为国家代码(2到3位)-区号(2到3位)-电话号码(7到8位)-分机号(3位)"');
			document.getElementById('com_tel').value="";
			document.getElementById('com_tel').focus();
		}else if(isTel('com_fax')==false){
			alert('请输入正确的贵单位传真号码:传真号码格式为国家代码(2到3位)-区号(2到3位)-传真号码(7到8位)-分机号(3位)');
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

<body onload="loadProv()">
<div  class='juzhong'>
 <?php
	iframe_top();
 ?>
<div class='container-fluid'>    
	<div class='row-fluid'>	
		<div class='span6'>
			<div class='td_head' style='text-align:center;margin-top:20px'>
				个人信息
			</div>
<div class='alert_reg' align='left' style='padding:10px 0px 0px 0px'>
  <form class="form-horizontal" text-align='left'>
    <fieldset>
    <div class="control-group">

          <!-- Search input-->
          <label class="control-label">用户名</label>
          <div class="controls">
            <input type="text" id='cus_name' name='reg_name' placeholder="请输入用户名..." class="input-normal">
            <p class="help-block"></p>
          </div>

    </div>

    <div class="control-group">

          <!-- Search input-->
          <label class="control-label">登陆密码</label>
          <div class="controls">
            <input type="password" id='cus_pwd' name='reg_pwd2' placeholder="密码" class="input-normal">
            <p class="help-block"></p>
          </div>

    </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">确认密码</label>
          <div class="controls">
            <input type="password" id='cus_pwd2' name='reg_pwd2' placeholder="密码确认" class="input-normal">
            <p class="help-block"></p>
          </div>
    </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">电子邮箱</label>
          <div class="controls">
            <input type="text" id='cus_email' name='reg_email' placeholder="请输入电子邮箱..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">真实姓名</label>
          <div class="controls">
            <input type="text" id='cus_realname' name='reg_realname' placeholder="请输入真实姓名..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">手机号码</label>
          <div class="controls">
            <input type="text" id='cus_tel' name='reg_tel' placeholder="请输入11位手机号码..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Select Basic -->
          <label class="control-label">安全提问</label>
          <div class="controls">
            <select class="input-normal" id='question' name='news_type'>
      <option>您的家乡名称</option>
      <option>您所就读的小学名称</option>
      <option>您所就读的初中名称</option>
      <option>您所就读的高中名称</option>
      <option>您所就读的大学名称</option>
      <option>您所喜欢的颜色</option>
      <option>您所喜欢的明星</option>
      <option>您所喜欢的宠物</option></select>
          </div>

        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">安全回答</label>
          <div class="controls">
            <input type="text" placeholder="请输入安全提问答案..." id='answer' name='answer' class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    

    </fieldset>
  </form>

			</div>
		</div>
		<div class='span6'>
			<div class='td_head' style='text-align:center;margin-top:20px'>
                                企业信息
                        </div>                                                                                                                                                                        
                        <div class='alert_reg' align='left' style='padding:10px 0px 0px 0px'>
                       			
  <form class="form-horizontal">
    <fieldset>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">单位名称</label>
          <div class="controls">
            <input type="text" id='com_name' name='com_name' placeholder="请输入单位名称..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Select Basic -->
          <label class="control-label">单位地址</label>
          <div class="controls">
            <select id="sel_prov" name="sel_prov" onchange="loadCity()"></select>
	    <select id="sel_city" name="sel_city" style='width:100px'></select>
          </div>    
    </div>
   
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"></label>
          <div class="controls">
            <input type="text" id='com_addr' name='com_addr' placeholder="请输入具体的地址..." class="input-normal">
            <p class="help-block"></p>
          </div>
     </div> 

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">单位邮编</label>
          <div class="controls">
            <input type="text" id='com_zip' name='com_zip' placeholder="请输入单位邮编..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">单位网址</label>
          <div class="controls">
            <input type="text" id='com_website' name='com_website' placeholder="请输入单位网址..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">单位电话</label>
          <div class="controls">
            <input type="text" id='com_tel' name='com_tel' placeholder="请输入单位电话..." class="input-normal">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">单位传真</label>
          <div class="controls">
            <input type="text" id='com_fax' name='com_fax' placeholder="请输入单位传真..." class="input-normal">
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
        		仔细阅读并接受
      		</label>
      		</br>
      		<label>
        		<a href='#myModal' style='color:blue' data-toggle='modal' value="NCTC业务申请协议">NCTC业务申请协议</a>
      		</label>
  	</div>
       </div>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    			<h3 id="myModalLabel">NCTC业务申请协议</h3>
  		</div>
  		<div class="modal-body">
    			<p style="text-align:left;FONT-SIZE: 10pt; WIDTH: 100%; FONT-FAMILY: 宋体">
		<strong>1. 特别提示</strong><br>		
        	1.1<br>
                北京新浪互联信息服务有限公司(Beijing SINA Internet Information Service Co. Ltd.)、新浪网技术（中国）有限公司(Sina.com Technology (China) Co., Ltd.)及相关关联企业（以下合称? 新浪? ）>
同意按照本协议的规定及其不时发布的操作规则提供基于互联网以及移动网的相关服务（以下称? 网络服务? ），为获得网络服务，服务使用人（以下称? 用户? ）应当同意本协议的全部条款并按照页面上的提示完成全部的注
册程序。用户在进行注册程序过程中点击? 同意? 按钮即表示用户完全接受本协议项下的全部条款。<br>
                1.2<br>
                用户注册成功后，新浪将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户负责保管；用户应当对以其用户帐号进行的所有活动和事件负法律责任。<br>
        1.3<br>
        用户注册成功后，在使用新浪/新浪微博服务的过程中，新浪公司有权基于用户的操作行为进行非商业性的调查研究。
                <br><strong>2. 服务内容</strong><br>
                2.1<br>
                新浪网络服务的具体内容由新浪根据实际情况提供，例如博客、播客、在线音乐、搜索、手机图片铃声下载、交友、论坛(BBS)、聊天室、电子邮件、发表新闻评论等。<br>
                2.2<br>
                新浪提供的部分网络服务（例如手机图片铃声下载、电子邮件等）为收费的网络服务，用户使用收费网络服务需要向新浪支付一定的费用。对于收费的网络服务，新浪会在用户使用之前给予用户明确的提示，
只有用户根据提示确认其愿意支付相关费用，用户才能使用该等收费网络服务。如用户拒绝支付相关费用，则新浪有权不向用户提供该等收费网络服务。<br>
                2.3<br>
                用户理解，新浪仅提供相关的网络服务，除此之外与相关网络服务有关的设备（如个人电脑、手机、及其他与接入互联网或移动网有关的装置）及所需的费用（如为接入互联网而支付的电话费及上网费、为使
用移动网而支付的手机费）均应由用户自行负担。
                <br><strong>3. 服务变更、中断或终止</strong><br>
                3.1<br>
                鉴于网络服务的特殊性，用户同意新浪有权随时变更、中断或终止部分或全部的网络服务（包括收费网络服务及免费网络服务）。如变更、中断或终止的网络服务属于免费网络服务，新浪无需通知用户，也无
需对任何用户或任何第三方承担任何责任；如变更、中断或终止的网络服务属于收费网络服务，新浪应当在变更、中断或终止之前事先通知用户，并应向受影响的用户提供等值的替代性的收费网络服务，如用户不愿意接受替代
性的收费网络服务，就该用户已经向新浪支付的服务费，新浪应当按照该用户实际使用相应收费网络服务的情况扣除相应服务费之后将剩余的服务费退还给该用户。<br>
                3.2<br>
                用户理解，新浪需要定期或不定期地对提供网络服务的平台（如互联网网站、移动网络等）或相关的设备进行检修或者维护，如因此类情况而造成收费网络服务在合理时间内的中断，新浪无需为此承担任何责
任，但新浪应尽可能事先进行通告。<br>
                3.3<br>
                如发生下列任何一种情形，新浪有权随时中断或终止向用户提供本协议项下的网络服务【该网络服务包括但不限于收费及免费网络服务（其中包括基于广告模式的免费网络服务）】而无需对用户或任何第三方
承担任何责任：  
                <br>
                3.3.1 用户提供的个人资料不真实；<br>
                <br>
                3.3.2 用户违反本协议中规定的使用规则；<br>
                <br>
                3.3.3 用户在使用收费网络服务时未按规定向新浪支付相应的服务费。<br>
                <br>
			</p>
  		</div>
  		<div class="modal-footer">
    			<button class="btn" data-dismiss="modal" aria-hidden="true">阅读完毕</button>
  		</div>
	</div>
	        <div class='row'>
        <div class="control-group">
          <label class="control-label"></label>
                
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success" style='margin:-10px 0px 40px 30px;padding:10px 200px 10px 200px' onclick='register();'>注册</button>
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

