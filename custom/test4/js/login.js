/*--------------------------login-------------------------------*/

function reLogin(msgs,funHandle){
	if(msgs!=""){
		if(typeof(funHandle)=="undefined")
		{
			createLoginMsg(msgs, "loginerror");
		}
		else
		{
			eval(funHandle);
		}
	}
	else{
		window.location.reload();
	}
}

function createLoginMsg(msg, className){
	$("#logininfo").html(msg);
	$("#logininfo").attr("class",className);
}

function login(){
	var user=$("#username").val();
	var passwd=$("#password").val();
	var vcode=$("#vercode").val();
	vcode=vcode.toUpperCase();
	//document.getElementById('h_username').value=user;
	//document.getElementById('h_pwd').value=passwd;
	/*var viewtype="";
	var radios=document.getElementsByName("r_usertype");
	for(var i=0;i<radios.length;i++)
	{
		if(radios[i].checked==true)
		{
			var type=radios[i].value;
			document.getElementById('usertype').value=type;
		}
	}*/
	
	if(user==""||typeof(user)=="undefined")
	{
		//createLoginMsg("用户不存在！", "loginerror");
		//return false;
		alert('请输入用户名');
	}
	else if(passwd==""||typeof(passwd)=="undefined")
	{
		//createLoginMsg("密码错误！", "loginerror");
		//return false;
		alert('请输入密码');
	}else if(vcode==''){
		alert('请输入验证码');
	}
	else{
		//document.login_form.submit();
		$.post("../cus_login.php",{action:"cus_login",username:user,password:passwd,vercode:vcode},function(data){
			if(data=="vcode_error"){
				alert('验证码输入错误，请重新输入');
			}else if(data=="login_error"){
				alert("用户名或者密码输入错误");
			}else if(data=="OK"){
				location.href='../index.php';
			}
		});
	}
//	$.post("login.php",{action:"login",username:user,password:passwd});	
}

function LoginOut()
{
	$.post("login.php",{action:"loginout"},function(msgs){
		reLogin(msgs,"createEmsg(msgs,'error')");
	});
}

function Checksess(){
	var type="checksess";
	$.post("login.php",{action:type},function(msgs){
		if(msgs!=""){
			$("#logininfo").html('<font color="red">'+xmlhttp.responseText+'</font>');
		}
		else{
			$('logininfo').html('');
		}	
	});
}
function validate_required(field,alerttext)
{
	with(field)
	{
		if(value==null||value=="") {alert(alerttext);return false;}
		else {return true;}
	}
}
function validate_email(field,alerttext)
{
	with(field)
	{
		apos=value.indexOf("@");
		if(apos<1) {alert(alerttext);return false;}
		else {return true;}
	}
}
function validate_form(thisform)
{
	with(thisform)
	{
		if(validate_required(username,"用户名为必填项")==false) {username.focus();return false;}
		if(validate_required(pwd_1,"密码为必填项")==false) {pwd_1.focus();return false;}
		if(validate_required(username,"红色<font color=\"Red\"> * </font>为必填项")==false) {username.focus();return false;}
		var pwd1,pwd2;
		with(pwd_1){pwd1=value;}
		with(pwd_2){pwd2=value;}
		if(pwd1!=pwd2){alert("两次输入的密码不匹配");pwd_1.focus();return false;}
		if(validate_email(useremail,"邮箱格式不正确")==false) {useremail.focus();return false;}
	}
	
}

/*---------------end-------------------------------*/

/*------------------register-----------------------*/
function register(){
	$("#login_body").css('display','none');
	$("#register_body").css('display','block');
}

/* 验证码刷新*/
function chg_vcode(){
    document.getElementById('verificationImage').src="./include/verificationImage.php?timestamp='" + new Date().getTime() + "'";
}

/*获取用户类型*/

/* var radios=document.getElementsByName("r_usertype");
        for(var i=0;i<radios.length;i++)
        {
            if(radios[i].checked==true)
            {
                document.getElementById('usertype').value=radios[i].value;
                alert(radio[i].value);
            }
        }

*/
