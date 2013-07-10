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
        $str_address1=explode('市',$str_addr,2);
        if(strcmp($str_address1[0],'北京')==0||strcmp($str_address1[0],'上海')==0||strcmp($str_address1[0],'天津')==0||strcmp($str_address1[0],'重庆')==0){
        	$str_address2=explode('区',$str_address1[1],2);
			//print_r($str_address2);
        }
        else{
        	$str_address1=explode('省',$str_addr,2);
        	$str_address2=explode('市',$str_address1[1],2);
        }
	
?>

<script type="text/javascript" language="JavaScript"> 
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
					+"<option value='"+str_sel_prov[i]+"' "+(str_sel_prov[i]=='<?php echo $str_address1[0]?>'?"selected='selected'":"")+">"
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
			        +"<option value='"+str_SelData[i]+"' "+(str_SelData[i]=='<?php echo $str_address2[0]?>'?"selected='selected'":"")+">"
					+str_SelData[i]
					+"</option>";
		}
		str_inHtm="<select id='"+dom_sel_city.id+"'style='width: 83px;'>"+str_inHtm+"</select>";
		dom_sel_city.outerHTML=str_inHtm;
	}
	
function modify(){
			var str_logname="<?php echo $str_realname?>";			//获取日志管理操作人id
			
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
    		if(sel_prov== "北京"||sel_prov== "上海"||sel_prov== "天津"||sel_prov== "重庆"){
    			str_addr=sel_prov+"市"+sel_city+"区"+str_addr;
    		}
    		else{
    			str_addr=sel_prov+"省"+sel_city+"市"+str_addr;
    		}
		 if(str_realname==''){
                         alert('真实姓名不能为空，请输入');
                 }else if(str_email=='' || isEmail('email')==false){
    			alert('请输入正确的个人邮箱地址');
    			document.getElementById('email').value="";
    			document.getElementById('email').focus();
    		}else if(str_custel=='' || isMobile('custel')==false){
    			alert('请输入正确的手机号码');
    			document.getElementById('custel').value="";
    			document.getElementById('custel').focus();
    		}else if(str_comname==''){
			alert('公司名称不能为空，清输入');
		}else if(str_zip=='' || isZip('zip')==false){
    			alert('请输入正确的贵单位邮编');
    			document.getElementById('zip').value="";
    			document.getElementById('zip').focus();
    		}else if(str_comtel=='' || isTel('comtel')==false){
    			alert('请输入正确的贵单位电话号码:区号(2到3位)-电话号码(7到8位)-分机号(3位)"');
    			document.getElementById('comtel').value="";
    			document.getElementById('comtel').focus();
    		}else if(str_fax==''|| isTel('fax')==false){
    			alert('请输入正确的贵单位传真号码:区号(2到3位)-传真号码(7到8位)-分机号(3位)');
    			document.getElementById('fax').value="";
    			document.getElementById('fax').focus();
    		}else{
        		if(str_realname!=<?php echo "'".$str_realname."'"?>){
					str_message=str_message+"真实姓名由<?php echo "（".$str_realname."）"?>改为（"+str_realname+"）.";
				}
				if(str_custel!=<?php echo "'".$str_custel."'"?>){
					str_message=str_message+"电话由<?php echo "（".$str_custel."）"?>改为（"+str_custel+"）.";
				}
				if(str_email!=<?php echo "'".$str_email."'"?>){
					str_message=str_message+"邮箱由<?php echo "（".$str_email."）"?>改为（"+str_email+"）.";
				}
				if(str_comname!=<?php echo "'".$str_comname."'"?>){
					str_message=str_message+"单位名称由<?php echo "（".$str_comname."）"?>改为（"+str_comname+"）.";
				}
				if(str_website!=<?php echo "'".$str_website."'"?>){
					str_message=str_message+"单位网址由<?php echo "（".$str_website."）"?>改为（"+str_website+"）.";
				}
				if(str_addr!=<?php echo "'".$str_addr."'"?>){
					str_message=str_message+"单位地址由<?php echo "（".$str_addr."）"?>改为（"+str_addr+"）.";
				}
				if(str_zip!=<?php echo "'".$str_zip."'"?>){
					str_message=str_message+"单位邮编由<?php echo "（".$str_zip."）"?>改为（"+str_zip+"）.";
				}
				if(str_comtel!=<?php echo "'".$str_comtel."'"?>){
					str_message=str_message+"单位电话由<?php echo "（".$str_comtel."）"?>改为（"+str_comtel+"）.";
				}
				if(str_fax!=<?php echo "'".$str_fax."'"?>){
					str_message=str_message+"单位传真由<?php echo "（".$str_fax."）"?>改为（"+str_fax+"）.";
				}
				//alert(str_message);
				if(str_message){
					$.post("./task.php",{action:"modify_personal_info",str_message:str_message,str_logname:str_logname,str_id:str_id,str_realname:str_realname,str_email:str_email,str_custel:str_custel,str_comname:str_comname,str_zip:str_zip,str_addr:str_addr,str_website:str_website,str_comtel:str_comtel,str_fax:str_fax},function(data){
						if(data){
							//alert(data);
							alert("客户信息修改成功！");
							window.location.href="./modify_personal_info.php";
							//clear();
						}else{
							alert("客户信息修改失败！");
							
						}
					});
				}else{
					alert("您未对信息进行修改");
				}
    		}		
 }
 
 
</script>
<body onload="loadProv()">
<div class="juzhong">
  <?php
	iframe_top();//页面头部
	?>
	
  <div align='left'>                                                                                                                                                                          
                <ul class="bmsbreadcrumb">                                                                                                                                                            
                        <li><a href="index.php">首页</a> <span class="divider">/</span></li>                                                                                                          
                        <li><a href="#">个人信息管理</a> <span class="divider">/</span></li>                                                                                                          
                        <li class="active">修改个人信息</li>                                                                                                                                          
                </ul>                                                                                                                                                                                 
          
  </div>
  
  <div class="main_2">
    <div class='row-fluid'>
        <div class='span2'>
            <div class='left-tag'>
                <ul class="bmsnav bmsnav-list">
                        <li class="bmsnav-header" align='left'><i class='icon-home'></i>个人信息管理</li>
                        <li class="active" align='left'><a href="#"><i class='icon-search'></i> &nbsp;&nbsp;修改个人信息</a></li>
                        <li align='left'><a href="modify_login_password.php"><i class='icon-tag'></i> &nbsp;&nbsp;修改登录密码</a></li>
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
				<td width="100%" height="20" class="td_head">个人信息</td>
			</tr>
			<tr>
			<td>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left;margin-top:10px">&nbsp;&nbsp;&nbsp;&nbsp;姓&nbsp;&nbsp;&nbsp;&nbsp;名：<input type="text" id="realname" name="realname" size="45" value="<?php echo $str_realname?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;手&nbsp;&nbsp;&nbsp;&nbsp;机：<input type="text" id="custel" name="custel" size="45" value="<?php echo $str_custel?>"></div></td>
			</td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;邮&nbsp;&nbsp;&nbsp;&nbsp;箱：<input type="text" id="email" name="email" size="45"  value="<?php echo $str_email?>"></div></td>
			</tr>
			</tr>
			<tr height="30">
				<td class="td_head">单位信息</td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left;margin-top:10px">&nbsp;&nbsp;&nbsp;&nbsp;单位名称：<input type="text" id="comname" name="comname" size="45" value="<?php echo $str_comname?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;单位网址：<input type="text" id="website" name="website" size="45"  value="<?php echo $str_website?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;单位地址：<select id="sel_prov" name="sel_prov" onchange="loadCity()" style="width: 60px;"></select><select id="sel_city" name="sel_city"></select><input type="text" id="address" name="address" size="24" value="<?php echo $str_address2[1]?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;单位邮编：<input type="text" id="zip" name="zip" size="45"  value="<?php echo $str_zip?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;单位电话：<input type="text" id="comtel" name="comtel" size="45" value="<?php echo $str_comtel?>"></div></td>
			</tr>
			<tr height="30">
				<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;单位传真：<input type="text" id="fax" name="fax" size="45"  value="<?php echo $str_fax?>"></div></td>
			</tr>
		</td>
	</tr>
</table>
<tr> 
	<td height="40" valign="middle" align="left">
		
		<input type="button" class='edit_buttom' id="button"  onclick=modify() value="完成修改" />
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

