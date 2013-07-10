<?php
	 session_start();
     include_once("./include/function.php");
     //include("./include/db_mysql.php");
     iframe_head();
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

<script type="text/javascript">                                                                                                                                                                       
$.fn.extend({
    /**
     * 该方法为了解决不支持placeholder属性的浏览器下达到相似效果作用
     * @param _color 文本框输入字体颜色,默认黑色
     * @param _plaColor 文本框placeholder字体颜色，默认灰色#a3a3a3
     */
    inputTip:function(_color, _plaColor) {
        _color = _color || "#000000";
        _plaColor = _plaColor || "#a3a3a3";
        function supportsInputPlaceholder() { // 判断浏览器是否支持html5的placeholder属性
            var input = document.createElement('input');
            return "placeholder" in input;
        }
   
        function showPassword(_bool, _passEle, _textEle) { // 密码框和文本框的转换
            if (_bool) {
                _passEle.show();
                _textEle.hide();
            } else {
                _passEle.hide();
                _textEle.show();
            }
        }
   
        if (!supportsInputPlaceholder()) {
            this.each(function() {
                var thisEle = $(this);
                var inputType = thisEle.attr("type")
                var isPasswordInput = inputType == "password";
                var isInputBox = inputType == "password" || inputType == "text";
                if (isInputBox) { //如果是密码或文本输入框
                    var isUserEnter = false; // 是否为用户输入内容,允许用户的输入和默认内容一样
                    var placeholder = thisEle.attr("placeholder");
   
                    if (isPasswordInput) { // 如果是密码输入框
                        //原理：由于input标签的type属性不可以动态更改，所以要构造一个文本input替换整个密码input
                        var textStr = "<input type='text' class='" + thisEle.attr("class") + "' style='" + (thisEle.attr("style") || "") + "' />";
                        var textEle = $(textStr);
                        textEle.css("color", _plaColor).val(placeholder).focus(
                            function() {
                                thisEle.focus();
                            }).insertAfter(this);
                        thisEle.hide();
                    }
                    thisEle.css("color", _plaColor).val("");//解决ie下刷新无法清空已输入input数据问题
                    if (thisEle.val() == "") {
                        thisEle.val(placeholder);
                    }
                    thisEle.focus(function() {
                        if (thisEle.val() == placeholder && !isUserEnter) {
                            thisEle.css("color", _color).val("");
                            if (isPasswordInput) {
                                showPassword(true, thisEle, textEle);
                            }
                        }
                    });
                    thisEle.blur(function() {
                        if (thisEle.val() == "") {
                            thisEle.css("color", _plaColor).val(placeholder);
                            isUserEnter = false;
                            if (isPasswordInput) {
                                showPassword(false, thisEle, textEle);
                            }
                        }
                    });
                    thisEle.keyup(function() {
                        if (thisEle.val() != placeholder) {
                            isUserEnter = true;
                        }
                    });
                }
            });
        }
    }
});
</script>

<script type="text/javascript" src="js/login.js" ></script>                                                                                                                                           
<script type="text/javascript" src="js/core.js" ></script>                                                                                                                                            
<script type="text/javascript" src="js/time.js" ></script>                                                                                                                                            
<script type="text/javascript">                                                                                                                                                                       
        window.onload = tick;                                                                                                                                                                         
        function cancel(){                                                                                                                                                                            
                document.getElementById('username').value='';                                                                                                                                         
                document.getElementById('password').value='';                                                                                                                                         
                document.getElementById('vercode').value='';                                                                                                                                          
        }                                                                                                                                                                                             
</script>


<body>
<div class="juzhong">
  <?php
	iframe_top();//页面头部
  ?>

  <div class="main_2">
     <div class='row-fluid'>
	<div class='span6'>
		<div class='nctc_img' style='margin-top:70px'>
			<img src='../images/nctc_logo.png' class="img-polaroid">
		</div>	
	</div>
        <div class='span5 offset1'>	
          <div class="anlie_nr" style='margin-top:70px'>
             <form method='post' name='NETSJ_Login'>
		<!--td>
			<h2 class='home_title' style="text-align:left">欢迎登陆业务申请系统</h2>
		</td-->
		<div class='login_form'> 
		<td class="td_inner">
			<div class='controls' style="text-align:left">
			    <div class='row-fluid' align='left'>
				&nbsp;&nbsp;&nbsp;&nbsp;
                                登陆名：
                            </div>
				&nbsp;&nbsp;&nbsp;&nbsp;
			    <div class='input-prepend'>
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" placeholder="请输入用户名..." id="username" name="username" size="45" onKeyDown="if(event.keyCode==13){$('#Submit2').click();}">
			    </div>
			</div>
		</td>
		<td class="td_inner">
			<div class='controls' style="text-align:left">
			    <div class='row-fluid' align='left'>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                密码：
				<a class='forget_password' style='margin-left:120px;color:blue' href='forget_pwd.php' >忘记密码了</a>
                            </div>
			    &nbsp;&nbsp;&nbsp;&nbsp;	
			    <div class='input-prepend'>
				<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" placeholder="请输入密码..." id="password" name="password" size="45" onKeyDown="if(event.keyCode==13){$('#Submit2').click();}">
			    </div>
			</div>
		</td>
            	<td class='td_inner'>
			<div class='controls' style="text-align:left">
			    <div class='row-fluid' align='left'>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                验证码：
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;                                                                                                                                                      		          <div class='input-prepend' align="justify">
                                <span class="add-on"><i class="icon-picture"></i></span>
				<input name="vercode" placeholder='请输入验证码...' id="vercode" value="" onkeydown="if(event.keyCode==13){$('#Submit2').click();}" type="text" style=""> 		
				<img src="include/verificationImage.php" id="verificationImage"  title='看不清，换一张' onClick="chg_vcode();" width="100"  height="40" style='margin:10px 0px 0px 30px'>
			    </div>
			</div>
		</td>
		<td class='td_inner'>
			<span align='left'>
				<input type="button" class="edit_buttom"  style='padding:5px 100px 5px 100px' id="Submit2" name="submit2" onClick="login();"  value="登陆" />
          		</span>
		</td>
		</div>
	     </form>
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

