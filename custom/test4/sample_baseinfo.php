<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
	//echo '$_session='.$_SESSION['cus_id'];
	//Í¨¹ı²éÕÒÊı¾İ¿â£¬»ñÈ¡ÉêÇëĞÅÏ¢
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
	iframe_top();//Ò³ÃæÍ·²¿
	?>

  <div class="main_2">
	<?php
		iframe_left();//Ò³Ãæ×ó±ß£¬²Ëµ¥À¸
	?>
	
    <div class="right_2">
      <div class="right_nr">
            <div align='left'>                                                                                                                                                                                        <ul class="bmsbreadcrumb">
                                      
                        <li><a href="index.php">Ê×Ò³</a> <span class="divider">/</span></li>                                                                   
                        <li><a href="#">¼ì²âÒµÎñÉêÇë</a> <span class="divider">/</span></li>                                                                                                          
                        <li class="active">ÌîĞ´ÑùÆ·»ù±¾ĞÅÏ¢</li>                                                                                                                                                      </ul>
            </div>
	<div class="anlie_basicinfo">
          <div class="anlie_nr">
		<div>
          
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
			    <tr class='alert'>
           <td style='padding:10px 100px 10px 0px'><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÑùÆ·Ãû³Æ£º</td>
                <td width="25%" class="left_txt4" ><input type='text' placeholder='±ØÌîÏî' id='sample_name' width='80px' ></td>
		<td width="25%" height="30" align="right" class="left_txt4" style="font-weight:bold;" >ĞÍºÅ¹æ¸ñ£º</td>
                <td width="25%"  class="left_txt4"><input type='text' placeholder='±ØÌîÏî' id='speci' width='80px' ></td>
              </tr>
			 
			  <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			  <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">Ğ¾Æ¬ĞÍºÅ£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='chip_speci' width='180px' > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">COS°æ±¾£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='cos_v' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
			  
			   <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÑÚÄ¤·½Ê½£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='ym' width='180px' > </td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÉÌ±ê£º</td>
                <td width="25%"  class="left_txt4"><input type='text' placeholder='±ØÌîÏî' id='tk' width='180px' ></td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">Ö÷»ú(Ì¨)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='host' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">Ö÷»ú(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='host_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC¿¨(ÕÅ)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='ic' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">IC¿¨(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='ic_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÏÔÊ¾Æ÷(Ì¨)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='screen' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÏÔÊ¾Æ÷(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='screen_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				 <tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">Êó  ±ê(¸ö)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='mouse' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">Êó±ê(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='mouse_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">¼ü  ÅÌ(¸ö)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='keyboard' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">¼üÅÌ(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='keyboard_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">µçÔ´Ïß(¸ù)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_wire' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">µçÔ´Ïß(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_wire_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">µçÔ´ÊÊäÆ÷(¸ö)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_adapt' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÊÊÅäÆ÷(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='power_adapt_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4" style="font-weight:bold;"> Êı¾İÏß(¸ù)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='data_wire' width='180px' ></td>
		<td width="25%" height="30" align="right" class="left_txt4" style="font-weight:bold;"> Êı¾İÏß(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='data_wire_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">¹â  ÅÌ(ÕÅ)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='cdrom' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">¹âÅÌ(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='cdrom_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ËµÃ÷Êé(±¾)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='workbook' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ËµÃ÷Êé(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='workbook_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">°ü×°Ïä(¸ö)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='pack' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">°ü×°Ïä(±¸×¢)£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='pack_ps' width='180px' > </td>
              </tr>
			    <tr  ><td height="1"  ><table width="100%" height="1" border="0" cellpadding="0" cellspacing="0"></table></td></tr>
				
				<tr>
                <td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÆäËû¸½¼ş£º</td>
                <td width="25%"  class="left_txt4"><input type='text' id='another' width='180px' ></td>
				<td width="25%" height="30" align="right" class="left_txt4"style="font-weight:bold;">ÆäËû¸½¼ş(±¸×¢)£º</td>
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
                <td class="alert alert-error">&nbsp;&nbsp;&nbsp;&nbsp;×¢ÒâÊÂÏî</td>
              </tr>
            </table></td>
          </tr>
		   <tr>
            <td class='alert' style='margin-left:40px' align='left'><table width="100%" border="0" cellspacing="0" cellpadding="0" cols='2'>
        <tr><td width="100%"  class="left_txt4"  >&nbsp;&nbsp;&nbsp;1.ËÍ¼ìµÄ¼ìÑéÑùÆ·ÔÚ¼ìÑéÆÚ¼äÁô´æÎÒÖĞĞÄ¡£</td></tr>
		<tr><td width="100%"  class="left_txt4"  >&nbsp;&nbsp;&nbsp;2.¼ìÑéÏîÄ¿È«²¿Íê³Éºó£¬ÎÒµ¥Î»¸øÄúµ¥Î»·¢ÊÕ·ÑÍ¨Öªµ¥£¬Äúµ¥Î»×ÔÊÕµ½ÊÕ·ÑÍ¨Öªµ¥Ö®ÈÕÆğ3¸öÔÂÄÚ½»¼ì²â·Ñ£¬²¢Æ¾¡¶ÑùÆ·ĞÅÏ¢¼°½ÓÈ¡ÑùµÇ¼Çµ¥¡·
µ½ÎÒÖĞĞÄÁìÈ¡ÑùÆ·¡£Èô3¸öÔÂÄÚÃ»½»·Ñ£¬×ÔµÚ4¸öÔÂÆğÊÕÈ¡Áô´æÑùÆ·µÄ±£¹Ü·Ñ£¬Ã¿ÈÕ°´¼ìÑé·ÑµÄ20%ÊÕÈ¡£¬×ÔµÚ5¸öÔÂÆğÃ¿ÈÕ°´¼ìÑé·ÑµÄ40%ÊÕÈ¡±£¹Ü·Ñ£¬
³¬¹ı6¸öÔÂ²»½»·Ñ²»È¡ÑùÆ·°´ÎŞÈËÈÏÁì´¦Àí¡£</td></tr>
<tr><td width="100%"  class="left_txt4" >&nbsp;&nbsp;&nbsp;3.Æ¾´Ëµ¥ÌáÈ¡ÑùÆ·£¬ÇëÍ×ÉÆ±£´æ¡£ </td></tr>
<tr><td width="100%"  class="left_txt4" >&nbsp;&nbsp;&nbsp;4.ÑùÆ·Ïà¹Ø±¸×¢ĞÅÏ¢×î¶àÊäÈë50¸ö×Ö·û¡£ </td></tr>

			   </table></td>  
			</tr>
        </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          
            
            <tr>
              <td height="30" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="45%" height="30" align="right"><input type="button" class='edit_buttom' value="ÏÂÒ»²½" name="B1" onclick="mysubmit()" /></td>
              <td width="6%" height="30" align="right">&nbsp;</td>
              <td width="49%" height="30" align='left'><input type="button" class='edit_buttom' value="È¡Ïû" name="B12" /></td>
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
				
		if(sample_name=='' || sample_name=='±ØÌîÏî'){
			alert("ÇëÊäÈëÑùÆ·Ãû³Æ");
		}else if(speci=='' || speci=='±ØÌîÏî'){
			alert("ÇëÊäÈëĞÍºÅ¹æ¸ñ");
		}else if(tk=='' || tk=='±ØÌîÏî'){
			alert("ÇëÊäÈëÉÌ±ê");
		}else if(sample_name !='' && sample_name.length >50){
			alert('ÑùÆ·Ãû³Æ×î¶àÊäÈë50¸ö×Ö·û');
		}else if(speci!='' && speci.length >50){
			alert('ĞÍºÅ¹æ¸ñ×î¶àÊäÈë50¸ö×Ö·û');
		}else if(tk!='' && tk.length >50){
			alert('×¢²áÉÌ±ê×î¶àÊäÈë50¸ö×Ö·û');
		}else{
			
			$.post("task.php",{action:"sample_baseinfo",uid:uid,sample_name:sample_name,speci:speci,chip_speci:chip_speci,cos_v:cos_v,ym:ym,tk:tk,
			host:host,host_ps:host_ps,ic:ic,ic_ps:ic_ps,screen:screen,screen_ps:screen_ps,mouse:mouse,mouse_ps:mouse_ps,keyboard:keyboard,
			keyboard_ps:keyboard_ps,power_wire:power_wire,power_wire_ps:power_wire_ps,power_adapt:power_adapt,
			power_adapt_ps:power_adapt_ps,data_wire:data_wire,data_wire_ps:data_wire_ps,cdrom:cdrom,cdrom_ps:cdrom_ps,workbook:workbook,workbook_ps:workbook_ps,pack:pack,pack_ps:pack_ps,
			another:another,another_ps:another_ps,req_table:req_table},function(data){
							if(data=='OK'){
                    
							alert("ÑùÆ·ĞÅÏ¢Ìá½»³É¹¦");
							window.location.href="upload.php";
						}
						});
		}
		
	}

</script>
