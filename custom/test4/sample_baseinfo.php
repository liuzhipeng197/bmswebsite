<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
	//echo '$_session='.$_SESSION['cus_id'];
	//通过查找数据库，获取申请信息
	$subject_id=$_SESSION['subject_id'];
	$sql="select subject_name2 from subject where subject_id='$subject_id'";
	$req_table=get_result_first($sql);
	//echo "req_table=".$req_table;
?>

<script src="bootstrap/js/jquery.js" type="text/javascript" ></script>
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

<body>
<div class="juzhong">
  <?php
	iframe_top();//页面头部
	?>

  <div class="main_2">
	<?php
		iframe_left();//页面左边，菜单栏
	?>
	
    <div class="right_2">
      <div class="right_nr">
            <div align='left'>                                                                                                                                                                                        <ul class="bmsbreadcrumb">
                                      
                        <li><a href="index.php">首页</a> <span class="divider">/</span></li>                                                                   
                        <li><a href="#">检测业务申请</a> <span class="divider">/</span></li>                                                                                                          
                        <li class="active">填写样品基本信息</li>                                                                                                                                                      </ul>
            </div>
	<div class="anlie_basicinfo">
          <div class="anlie_nr">
		<div>
          
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
			    <tr class='alert'>
           <td style='padding:10px 100px 10px 0px'><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">样品名称：</td>
                <td width="25%" class="left_txt4" ><input type='text' placeholder='必填项' id='sample_name' width='80px' ></td>
		<td width="25%" height="30" align="right" class="left_txt4" style="font-weight:bold;" >型号规格：</td>
                <td width="25%"  class="left_txt4"><input type='text' placeholder='必填项' id='speci' width='80px' ></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">芯片型号：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='chip_speci' width='180px' > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">COS版本：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='cos_v' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">掩膜方式：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='ym' width='180px' > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">商标：</td>
                <td width="25%"  class="left_txt4"><input type='text' placeholder='必填项' id='tk' width='180px' ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">主机(台)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='host' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">主机(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='host_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC卡(张)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='ic' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC卡(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='ic_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">显示器(台)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='screen' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">显示器(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='screen_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">鼠  标(个)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='mouse' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">鼠标(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='mouse_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">键  盘(个)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='keyboard' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">键盘(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='keyboard_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">电源线(根)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_wire' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">电源线(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_wire_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">电源适配器(个)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_adapt' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">适配器(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_adapt_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4" style="font-weight:bold;"> 数据线(根)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='data_wire' width='180px' ></td>
		<td width="25%" height="30" align="right" class="left_txt4" style="font-weight:bold;"> 数据线(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='data_wire_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">光  盘(张)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='cdrom' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">光盘(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='cdrom_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">说明书(本)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='workbook' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">说明书(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='workbook_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">包装箱(个)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='pack' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">包装箱(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='pack_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">其他附件：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='another' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">其他附件(备注)：</td>
                <td width="25%"  class="left_txt4"><input type='text' id='another_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
                        
          </table></td>
          
		  
		  <tr>
		 <td>&nbsp;</td>
		 </tr>
          </tr>
		   <tr>
            <td><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="nowtable">
              <tr>
                <td class="alert alert-error">&nbsp;&nbsp;&nbsp;&nbsp;注意事项</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td class='alert' style='margin-left:40px' align='left'><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
        <tr><td width="100%"  class="left_txt4"  >&nbsp;&nbsp;&nbsp;1.送检的检验样品在检验期间留存我中心。</td></tr>
		<tr><td width="100%"  class="left_txt4"  >&nbsp;&nbsp;&nbsp;2.检验项目全部完成后，我单位给您单位发收费通知单，您单位自收到收费通知单之日起3个月内交检测费，并凭《样品信息及接取样登记单》
到我中心领取样品。若3个月内没交费，自第4个月起收取留存样品的保管费，每日按检验费的20%收取，自第5个月起每日按检验费的40%收取保管费，
超过6个月不交费不取样品按无人认领处理。</td></tr>
<tr><td width="100%"  class="left_txt4" >&nbsp;&nbsp;&nbsp;3.凭此单提取样品，请妥善保存。 </td></tr>
<tr><td width="100%"  class="left_txt4" >&nbsp;&nbsp;&nbsp;4.样品相关备注信息最多输入50个字符。 </td></tr>

			   </table></td>  
			</tr>
        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="45%" height="30" align="right"><input type="button" class='edit_buttom' value="下一步" name="B1" onclick="mysubmit()" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="49%" height="30" align='left'><input type="button" class='edit_buttom' value="取消" name="B12" /></td>
            </tr>
            

			
          </table>
		 
			  
          
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

<script>
	
	function mysubmit(){
		var uid="<?php echo $_SESSION['cus_id'];?>";
		var req_table="<?php echo $req_table; ?>";
		var sample_name= $('#sample_name').val();
		var speci= $('#speci').val();
		var chip_speci= $('#chip_speci').val();
		var cos_v= $('#cos_v').val();
		var ym= $('#ym').val();
		var tk= $('#tk').val();
		var host= $('#host').val();
		var host_ps= $('#host_ps').val();
		var ic= $('#ic').val();
		var ic_ps= $('#ic_ps').val();
		var screen= $('#screen').val();
		var screen_ps= $('#screen_ps').val();
		var mouse= $('#mouse').val();
		var mouse_ps= $('#mouse_ps').val();
		var keyboard= $('#keyboard').val();
		var keyboard_ps= $('#keyboard_ps').val();
		var data_wire= $('#data_wire').val();
		var data_wire_ps= $('#data_wire_ps').val();
		var power_wire= $('#power_wire').val();
		var power_wire_ps= $('#power_wire_ps').val();
		var power_adapt= $('#power_adapt').val();
		var power_adapt_ps= $('#power_adapt_ps').val();
		var cdrom= $('#cdrom').val();
		var cdrom_ps= $('#cdrom_ps').val();
		var workbook= $('#workbook').val();
		var workbook_ps= $('#workbook_ps').val();
		var pack= $('#pack').val();
		var pack_ps= $('#pack_ps').val();
		var another= $('#another').val();
		var another_ps= $('#another_ps').val();
				
		if(sample_name=='' || sample_name=='必填项'){
			alert("请输入样品名称");
		}else if(speci=='' || speci=='必填项'){
			alert("请输入型号规格");
		}else if(tk=='' || tk=='必填项'){
			alert("请输入商标");
		}else if(sample_name !='' && sample_name.length >50){
			alert('样品名称最多输入50个字符');
		}else if(speci!='' && speci.length >50){
			alert('型号规格最多输入50个字符');
		}else if(tk!='' && tk.length >50){
			alert('注册商标最多输入50个字符');
		}else{
			
			$.post("task.php",{action:"sample_baseinfo",uid:uid,sample_name:sample_name,speci:speci,chip_speci:chip_speci,cos_v:cos_v,ym:ym,tk:tk,
			host:host,host_ps:host_ps,ic:ic,ic_ps:ic_ps,screen:screen,screen_ps:screen_ps,mouse:mouse,mouse_ps:mouse_ps,keyboard:keyboard,
			keyboard_ps:keyboard_ps,power_wire:power_wire,power_wire_ps:power_wire_ps,power_adapt:power_adapt,
			power_adapt_ps:power_adapt_ps,data_wire:data_wire,data_wire_ps:data_wire_ps,cdrom:cdrom,cdrom_ps:cdrom_ps,workbook:workbook,workbook_ps:workbook_ps,pack:pack,pack_ps:pack_ps,
			another:another,another_ps:another_ps,req_table:req_table},function(data){
							if(data=='OK'){
                    
							alert("样品信息提交成功");
							window.location.href="upload.php";
						}
						});
		}
		
	}

</script>
