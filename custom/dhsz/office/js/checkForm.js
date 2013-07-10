var CheResult = true;
var xmlHttp;

function createXMLHttpRequest() {
if (window.ActiveXObject) {
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest) {
xmlHttp = new XMLHttpRequest();
}
}

/******************************分类******************************/

function categoryNameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入产品分类的名称!");
		return false;
	}else{
		var ids = id.split("_");
		var language_id = ids[1];
		if (GE("metaTitle_"+language_id).value.trim()==""){
			GE("metaTitle_"+language_id).value=GE(id).value;
		}
		if (GE("metaKeywords_"+language_id).value.trim()==""){
			GE("metaKeywords_"+language_id).value=GE(id).value;
		}
		SetMsg("success",id,"none","");
	}
}

function categoryNameCheck1(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入产品分类的名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function cateNameCheck(id){
	CtoH(id);
	var ids = id.split("_");
	var language_id = ids[1];
	if (GE("metaTitle_"+language_id).value.trim()==""){
		GE("metaTitle_"+language_id).value=GE(id).value;
	}
	if (GE("metaKeywords_"+language_id).value.trim()==""){
		GE("metaKeywords_"+language_id).value=GE(id).value;
	}
	SetMsg("success",id,"none","");
}

function abstractCategoryCheck(id){
	CtoH(id);
	var ids = id.split("_");
	var language_id = ids[1];
	if (GE("metaDescription_"+language_id).value.trim()==""){
		GE("metaDescription_"+language_id).value=GE(id).value;
	}
	SetMsg("success",id,"none","");
}

/******************************产品******************************/

function productNameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入产品名称!");
		return false;
	}else{
		var ids = id.split("_");
		var language_id = ids[1];
		if (GE("metaTitle_"+language_id).value.trim()==""){
			GE("metaTitle_"+language_id).value=GE(id).value;
		}
		if (GE("metaKeywords_"+language_id).value.trim()==""){
			GE("metaKeywords_"+language_id).value=GE(id).value;
		}
		SetMsg("success",id,"none","");
	}
}

function productNameCheck1(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入产品名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function proNameCheck(id){
	CtoH(id);
	var ids = id.split("_");
	var language_id = ids[1];
	if (GE("metaTitle_"+language_id).value.trim()==""){
		GE("metaTitle_"+language_id).value=GE(id).value;
	}
	if (GE("metaKeywords_"+language_id).value.trim()==""){
		GE("metaKeywords_"+language_id).value=GE(id).value;
	}
	SetMsg("success",id,"none","");
}

function abstractProductCheck(id){
	CtoH(id);
	var ids = id.split("_");
	var language_id = ids[1];
	if (GE("metaDescription_"+language_id).value.trim()==""){
		GE("metaDescription_"+language_id).value=GE(id).value;
	}
	SetMsg("success",id,"none","");
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




function pageNameCheck(id){
    
	CtoH(id);

	if(isEmpty(GE(id).value) != true && !GE(id).value.match(/^[0-9a-zA-Z_-]+$/)){
		SetMsg("error",id,"block","请输入有效的自定义文件名!");
		return false;
	}
	
	else {

		SetMsg("success",id,"none","");

	}
}



function brandNameCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入品牌名称!");
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

function zipCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入邮编!");
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

function websiteCheck(id){
	CtoH(id);
	if( isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入公司网址!");
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

function departmentCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入联系人所在的部门!");
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

function contactEmailCheckstr(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入联系人邮箱!");
		return false;
	}else{
		SetMsg("success",id,"none","");
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
		SetMsg("error",id,"block","请输入栏目名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function channelCategoryUrlCheck(id){
	CtoH(id);
	if(!isUrl(GE(id).value) == true ){
		SetMsg("error",id,"block","外链地址错误，如：http://地址!");
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
		var ids = id.split("_");
		var language_id = ids[1];
		if (GE("metaTitle_"+language_id).value.trim()==""){
			GE("metaTitle_"+language_id).value=GE(id).value;
		}
		SetMsg("success",id,"none","");
	}
}

function contentNameCheck1(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入标题!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function contNameCheck(id){
	CtoH(id);
	var ids = id.split("_");
	var language_id = ids[1];
	if (GE("metaTitle_"+language_id).value.trim()==""){
		GE("metaTitle_"+language_id).value=GE(id).value;
	}
	SetMsg("success",id,"none","");
}

function abstractContentCheck(id){
	CtoH(id);
	var ids = id.split("_");
	var language_id = ids[1];
	if (GE("metaDescription_"+language_id).value.trim()==""){
		GE("metaDescription_"+language_id).value=GE(id).value;
	}
	SetMsg("success",id,"none","");
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
			SetMsg("error",id,"block","链接URL格式错误，如：http://地址");
			return false;
		}else{
			SetMsg("success",id,"none","");
		}		
	}
}

function linkLogoUrlCheck(id){
	CtoH(id);
	if(isUrl(GE(id).value) == false ){
		SetMsg("error",id,"block","Logo地址错误，如：http://地址");
		return false;
	}else{
		SetMsg("success",id,"none","");
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
			SetMsg("error",id,"block","登陆名长度必须>=6位!");
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
			SetMsg("error",id,"block","密码长度必须>=6位!");
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

function userEmailCheck(id){
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

function countryCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入语言图片!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

/******************************广告选项******************************/

function adNameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入广告名称!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function adUrlCheck(id){
	CtoH(id);
	if(isUrl(GE(id).value) == false ){
		SetMsg("error",id,"block","链接地址错误，如：http://地址");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function positionCheck(id){
	selObj=GE(id);
	if(selObj.options[selObj.selectedIndex].value == 0 ){
		SetMsg("error",id,"block","请选择广告位置!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}


/******************************标签选项******************************/

function tagNameCheck(id){
	CtoH(id);
	if(isEmpty(GE(id).value) == true ){
		SetMsg("error",id,"block","请输入标签名!");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}

function tagUrlCheck(id){
	CtoH(id);
	if(isUrl(GE(id).value) == false ){
		SetMsg("error",id,"block","URL地址错误");
		return false;
	}else{
		SetMsg("success",id,"none","");
	}
}