<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
?>
<script type="text/javascript" language="JavaScript"> 
function modifypwd(){
		var str_logname="<?php echo $_SESSION['cus_realname']?>";			//��ȡ��־���������id
		var str_id=<?php echo $_SESSION['cus_id']?>;
		
		var old_pwd=$('#old_pwd').val();
		var new_pwd=$('#new_pwd').val();
		var new_pwd1=$('#new_pwd1').val();
		//alert(user_id);
		if(old_pwd==''){
			alert("����������ԭ��¼���룺");
		}else if(new_pwd==''){
			alert("�����������µ�¼���룺");
		}else if(new_pwd1==''){
			alert("����������ȷ��������");
		}else if(new_pwd==old_pwd){
			alert("�������ԭ��¼������µ�¼����һ��������������");
		}else if(new_pwd!=new_pwd1){
			alert("����������������벻һ�£�����������");
			document.getElementById('new_pwd').value='';
			document.getElementById('new_pwd1').value='';
		}else{
			//alert("OK");			
			$.post("./task.php",{action:"modify_pwd",str_id:str_id,new_pwd:new_pwd,old_pwd:old_pwd,str_logname:str_logname},function(data){
					if(data=="OK"){
						alert("�������óɹ��������������������µ�¼��");
						window.location.href="modify_login_password.php";
					}else if(data=="pwd error"){
						alert("�Բ���������ľɵ�¼��������������");
						document.getElementById('old_pwd').value='';
						document.getElementById('new_pwd').value='';
						document.getElementById('new_pwd1').value='';
						//window.location.href="../index.php";
					}
				});
		}
 }

</script>
<body>
<div class="juzhong">
  <?php
	iframe_top();//ҳ��ͷ��
	?>
  
  <div align='left'>
                <ul class="bmsbreadcrumb">
                        <li><a href="index.php">��ҳ</a> <span class="divider">>></span></li>
                        <li><a href="#">������Ϣ����</a> <span class="divider">>></span></li>
                        <li class="active">�޸ĵ�½����</li>
                </ul>
          
  </div>

  <div class="main_2">
     <div class='row-fluid'>
        <div class='span2'>
            <div class='left-tag'>
                <ul class="bmsnav bmsnav-list">
                	<li class="bmsnav-header" align='left'><i class='icon-home'></i>������Ϣ����</li>
                        <li align='left'><a href="modify_personal_info.php"><i class='icon-search'></i> &nbsp;&nbsp;�޸ĸ�����Ϣ</a></li>                                                                     
                        <li class='active' align='left'><a href="modify_login_password.php"><i class='icon-tag'></i> &nbsp;&nbsp;�޸ĵ�¼����</a></li> 
		</ul>
            </div>
        </div>
        <div class='span10'>
	 <div class='anlie_2'>	
          <div class="anlie_nr">
                <div class="td_head">�޸�����</div>                                                                                                            
		<div class='alert'>
		<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;ԭ��¼���룺<input type="password" id="old_pwd" name="old_pwd" size="45"></div></td>
		<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;�µ�¼���룺<input type="password" id="new_pwd" name="new_npwd" size="45"></div></td>
		<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;ȷ�������룺<input type="password" id="new_pwd1" name="new_pwd1" size="45"></div></td>
          </div>
                        <div style='margin-top:-30px' align='left'>
                                &nbsp;&nbsp;&nbsp;
                                <input type="button" class="edit_buttom"  name='button' id="button"  onclick=modifypwd() value="����޸�" />
                        </div>
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

