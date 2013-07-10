var CheResult = true;

function subjectCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入产品名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function categorySelectCheck(id){
	selObj=GE(id);
	if(selObj.options[selObj.selectedIndex].value == 0 ){
		SetMsg("error",id,"block","请选择产品分类!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

/******************************公司******************************/

function companyNameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入公司名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function businessTypeCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入公司商业类型!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function productServiceCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入公司主要产品!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function companyAddressCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入公司地址!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}


/******************************联系人******************************/

function contactPersonCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入联系人姓名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function contactEmailCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入联系人邮箱!");
		return false;
	}else{
		if(!isEmail(GE(id).value) == true ){
			SetMsg("error",id,"block","邮箱格式错误!");
			return false;
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function contactTelCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入联系人电话!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}


/******************************栏目分类******************************/

function channelCategoryNameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入栏目分类名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}


/******************************栏目内容******************************/

function contentNameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入标题!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function contentCategoryCheck(id){
	selObj=GE(id);
	if(selObj.options[selObj.selectedIndex].value == 0 ){
		SetMsg("error",id,"block","请选择栏目分类!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

/******************************友链链接******************************/

function linkNameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入链接名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function linkUrlCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入链接URL!");
		return false;
	}else{
		if(!isUrl(GE(id).value) == true ){
			SetMsg("error",id,"block","链接URL格式错误!");
			return false;
		}else{
			SetMsg("success",id,"none","");
		}		
	}
}

/******************************管理员管理******************************/

function userNameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入登陆名!");
		return false;
	}else{
		if(GE(id).value.length<6){
			SetMsg("error",id,"block","登陆名长度必须>6位!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function nameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入真实姓名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function passwordCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入密码!");
		return false;
	}else{
		if(GE(id).value.length<6){
			SetMsg("error",id,"block","密码长度必须>6位!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function confirmPasswordCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入确认密码!");
		return false;
	}else{
		if(GE(id).value!=GE("password").value){
			SetMsg("error",id,"block","两次密码输入不一至,请重新输入!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}


/******************************修改密码******************************/

function oldPasswordCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入旧密码!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}


function newPasswordCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入新密码!");
		return false;
	}else{
		if(GE(id).value.length<6){
			SetMsg("error",id,"block","密码长度必须>6位!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function newPassword1Check(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入确认密码!");
		return false;
	}else{
		if(GE(id).value!=GE("newpassword").value){
			SetMsg("error",id,"block","两次密码输入不一至,请重新输入!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}


/******************************语言选项******************************/

function languageNameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入语言名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}


function languageDirectoryCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入语言所在目录!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

/***********************************************/
function servernameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入数据库主机!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function dbnameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入数据库名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function dbusernameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入数据库用户名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function dbprefixCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入表前缀!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function admindirCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入后台目录!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function usernameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入用户名!");
		return false;
	}else{
		if(GE(id).value.length<6){
			SetMsg("error",id,"block","用户名长度必须>=6位!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function passwordInstallCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入密码!");
		return false;
	}else{
		if(GE(id).value.length<6){
			SetMsg("error",id,"block","密码长度必须>=6位!");
			return false;				
		}else{
			SetMsg("success",id,"none","");
		}
	}
}

function emailInstallCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入邮箱!");
		return false;
	}else{
		if(!isEmail(GE(id).value) == true ){
			SetMsg("error",id,"block","邮箱格式错误!");
			return false;
		}else{
			SetMsg("success",id,"none","");
		}
	}
}