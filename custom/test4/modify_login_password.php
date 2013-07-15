<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
?>
<script type="text/javascript" language="JavaScript"> 
function modifypwd(){
		var str_logname="<?php echo $_SESSION['cus_realname']?>";			//获取日志管理操作人id
		var str_id=<?php echo $_SESSION['cus_id']?>;
		
		var old_pwd=$('#old_pwd').val();
		var new_pwd=$('#new_pwd').val();
		var new_pwd1=$('#new_pwd1').val();
		//alert(user_id);
		if(old_pwd==''){
			alert("请输入您的原登录密码：");
		}else if(new_pwd==''){
			alert("请输入您的新登录密码：");
		}else if(new_pwd1==''){
			alert("请输入您的确认新密码");
		}else if(new_pwd==old_pwd){
			alert("您输入的原登录密码和新登录密码一样，请重新输入");
		}else if(new_pwd!=new_pwd1){
			alert("您两次输入的新密码不一致，请重新输入");
			document.getElementById('new_pwd').value='';
			document.getElementById('new_pwd1').value='';
		}else{
			//alert("OK");			
			$.post("./task.php",{action:"modify_pwd",str_id:str_id,new_pwd:new_pwd,old_pwd:old_pwd,str_logname:str_logname},function(data){
					if(data=="OK"){
						alert("密码设置成功，请用您的新密码重新登录！");
						window.location.href="modify_login_password.php";
					}else if(data=="pwd error"){
						alert("对不起，您输入的旧登录密码有误，请重试");
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
	iframe_top();//页面头部
	?>
  
  <div align='left'>
                <ul class="bmsbreadcrumb">
                        <li><a href="index.php">首页</a> <span class="divider">>></span></li>
                        <li><a href="#">个人信息管理</a> <span class="divider">>></span></li>
                        <li class="active">修改登陆密码</li>
                </ul>
          
  </div>

  <div class="main_2">
     <div class='row-fluid'>
        <div class='span2'>
            <div class='left-tag'>
                <ul class="bmsnav bmsnav-list">
                	<li class="bmsnav-header" align='left'><i class='icon-home'></i>个人信息管理</li>
                        <li align='left'><a href="modify_personal_info.php"><i class='icon-search'></i> &nbsp;&nbsp;修改个人信息</a></li>                                                                     
                        <li class='active' align='left'><a href="modify_login_password.php"><i class='icon-tag'></i> &nbsp;&nbsp;修改登录密码</a></li> 
		</ul>
            </div>
        </div>
        <div class='span10'>
	 <div class='anlie_2'>	
          <div class="anlie_nr">
                <div class="td_head">修改密码</div>                                                                                                            
		<div class='alert'>
		<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;原登录密码：<input type="password" id="old_pwd" name="old_pwd" size="45"></div></td>
		<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;新登录密码：<input type="password" id="new_pwd" name="new_npwd" size="45"></div></td>
		<td class="td_inner"><div style="text-align:left">&nbsp;&nbsp;&nbsp;&nbsp;确认新密码：<input type="password" id="new_pwd1" name="new_pwd1" size="45"></div></td>
          </div>
                        <div style='margin-top:-30px' align='left'>
                                &nbsp;&nbsp;&nbsp;
                                <input type="button" class="edit_buttom"  name='button' id="button"  onclick=modifypwd() value="完成修改" />
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

