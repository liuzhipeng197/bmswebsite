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
		//createLoginMsg("�û������ڣ�", "loginerror");
		//return false;
		alert('�������û���');
	}
	else if(passwd==""||typeof(passwd)=="undefined")
	{
		//createLoginMsg("�������", "loginerror");
		//return false;
		alert('����������');
	}else if(vcode==''){
		alert('��������֤��');
	}
	else{
		//document.login_form.submit();
		$.post("../cus_login.php",{action:"cus_login",username:user,password:passwd,vercode:vcode},function(data){
			if(data=="vcode_error"){
				alert('��֤�������������������');
			}else if(data=="login_error"){
				alert("�û������������������");
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
		if(validate_required(username,"�û���Ϊ������")==false) {username.focus();return false;}
		if(validate_required(pwd_1,"����Ϊ������")==false) {pwd_1.focus();return false;}
		if(validate_required(username,"��ɫ<font color=\"Red\"> * </font>Ϊ������")==false) {username.focus();return false;}
		var pwd1,pwd2;
		with(pwd_1){pwd1=value;}
		with(pwd_2){pwd2=value;}
		if(pwd1!=pwd2){alert("������������벻ƥ��");pwd_1.focus();return false;}
		if(validate_email(useremail,"�����ʽ����ȷ")==false) {useremail.focus();return false;}
	}
	
}

/*---------------end-------------------------------*/

/*------------------register-----------------------*/
function register(){
	$("#login_body").css('display','none');
	$("#register_body").css('display','block');
}

/* ��֤��ˢ��*/
function chg_vcode(){
    document.getElementById('verificationImage').src="./include/verificationImage.php?timestamp='" + new Date().getTime() + "'";
}

/*��ȡ�û�����*/

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
