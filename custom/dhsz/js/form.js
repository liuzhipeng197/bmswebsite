function GE(id){
	return document.getElementById(id);
}

function CtoH(id){
	var str= GE(id).value;
	var result = "";
	for (var i = 0; i < str.length; i++) {
		if (str.charCodeAt(i) == 8220 || str.charCodeAt(i) == 8221) {
			result += String.fromCharCode(34);
		} else if (str.charCodeAt(i) == 8216 || str.charCodeAt(i) == 8217) {
			result += String.fromCharCode(39);
		} else if (str.charCodeAt(i) == 12290) {
			result += String.fromCharCode(46);
		} else if (str.charCodeAt(i) == 12289) {
			result += String.fromCharCode(44);
		} else if (str.charCodeAt(i) == 12288) {
			result += String.fromCharCode(32);
		} else if (str.charCodeAt(i) > 65280 && str.charCodeAt(i) < 65375) {
			result += String.fromCharCode(str.charCodeAt(i) - 65248);
		} else {
			result += String.fromCharCode(str.charCodeAt(i));
		}
	}
	GE(id).value = result.trim();
}

function StringCtoH( p_source) 
{
	var str = p_source;
	var result = "";
	for (var i = 0; i < str.length; i++) {
		if (str.charCodeAt(i) == 8220 || str.charCodeAt(i) == 8221) {
			result += String.fromCharCode(34);
		} else if (str.charCodeAt(i) == 8216 || str.charCodeAt(i) == 8217) {
			result += String.fromCharCode(39);
		} else if (str.charCodeAt(i) == 12290) {
			result += String.fromCharCode(46);
		} else if (str.charCodeAt(i) == 12289) {
			result += String.fromCharCode(44);
		} else if (str.charCodeAt(i) == 12288) {
			result += String.fromCharCode(32);
		} else if (str.charCodeAt(i) > 65280 && str.charCodeAt(i) < 65375) {
			result += String.fromCharCode(str.charCodeAt(i) - 65248);
		} else {
			result += String.fromCharCode(str.charCodeAt(i));
		}
	}
	
	return result;
}

var firstErrorControl = "";

function SetMsg(type,id,state,text){
	if(type=='error'){
		if( text.trim().length > 0){
			GE( id + "Msg" ).innerHTML = text;
			GE( id + "Msg" ).className = "error";
		}
	}
	if(type=='success'){
		GE( id + "Msg" ).innerHTML = text;
		GE( id + "Msg" ).className = "success";
	}
	if(type=='alert'){
		if( text.trim().length > 0){
			GE( id + "Msg" ).innerHTML = text;
			GE( id + "Msg" ).className = "alert";
		}			
	}	
	if(firstErrorControl != null && firstErrorControl == ""){
		firstErrorControl = id;
	}	
	GE( id + "Msg" ).style.display = state;
}

function SetMsgFocus(){
	if( firstErrorControl != null && firstErrorControl != ""){
 		try{
			if( GE(firstErrorControl ).type != "hidden"){
				if( GE(firstErrorControl ) != null)
					GE(firstErrorControl ).focus();
					//GE('contentName_1').focus();
				else
					GE(firstErrorControl + "Msg" ).focus();
			}else{
				GE(firstErrorControl + "Msg" ).focus();
			}
		}catch(e){
			GE(firstErrorControl + "Msg" ).focus();
		}
	}
}

function SetMsgControlFocus(){
	if( firstErrorControl != null && firstErrorControl != ""){
 		try{
			if( GE(firstErrorControl ).type != "hidden"){
				if( GE(firstErrorControl ) != null)
					GE(firstErrorControl ).focus();
				else
					GE(firstErrorControl + "Msg" ).focus();
			}else{
				GE(firstErrorControl + "Msg" ).focus();
			}
		}catch(e){
			if(GE(firstErrorControl + "Msg" ) != null){
				GE(firstErrorControl + "Msg" ).style.display = "block";
			}
		}
	}
}

///////////////////////////////////////////////////////////////////////////////////////////

function isEmpty(str)
{
	return (str.trim()=="");
}

function isInteger(str)
{
    if (isEmpty(str)) return true;
    
    var reg = /^((\+|-)\d)?\d*$/;
    return reg.test(str);
}

function isDouble(str)
{
    if (isEmpty(str)) return true; 
    
	var reg = /^(?:\+|-)?\d+(?:\.\d+)?$/;
	return reg.test(str);	        
}

function isDate(str)
{
    if (isEmpty(str)) return true;
     
   var reg = /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/; 

	var r = str.match(reg); 
	if(r==null)return false; 
	var d= new Date(r[1], r[3]-1,r[4]); 
	var newStr=d.getFullYear()+r[2]+(d.getMonth()+1)+r[2]+d.getDate();
	return newStr==str;
}


function isEmail(str)
{
    if (isEmpty(str)) return true; 
     
   var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/i;
   return reg.test(str);
}

function isEmailA(str)
{
   var reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/i;
   return reg.test(str);
}

function isBetween (val, lo, hi) {
    if ((val < lo) || (val > hi)) { return(false); }
    else { return(true); }
}


function isDateTime(str)

{
   if (str=="") return true;
   
   var strDate = str;
   if (strDate.length == 0) return false;

   var reg = /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})/;
   var r = strDate.match(reg);

   if (r != null)   //??strDate
      strDate = strDate + " 00:00:00";
 
    reg = /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2}) (\d{1,2}):(\d{1,2}):(\d{1,2})/;
    r = strDate.match(reg);
    if (r == null)
    {
       return false;
    }

    var d = new Date(r[1], r[3]-1,r[4],r[5],r[6],r[7]);
    if (d.getFullYear()==r[1]&&(d.getMonth()+1)==r[3]&&d.getDate()==r[4]&&d.getHours()==r[5]&&d.getMinutes()==r[6]&&d.getSeconds()== r[7])
    {
       return d;
    }
    else
    {
       return false;
    }
}

function isChineseChar(str)
{
   if (isEmpty(str)) return true; 
  
   var reg=/^([\u4E00-\u9FA5]|[\uFE30-\uFFA0])*$/gi;
   return reg.test(str);  
}

function includeChineseChar(str)
{
   if (isEmpty(str)) return true;
  
   var reg=/^[\x00-\x7F]*$/;
   return reg.test(str);  
}

function isEngCharAll(str)
{ 
   if (isEmpty(str)) return true;	
   var reg=/^[a-zA-Z]{1,20}$/;
   return reg.test(str);
}
function isCountryCode(str)
{ 
   if (isEmpty(str)) return true;	
   var reg=/^([0-9\+]){1,10}$/;
   return reg.test(str);
}
function isDigitOrEngChar(str)
{ 
   if (isEmpty(str)) return true;	
   var reg=/^([a-zA-Z0-9]){1,100}$/;
   return reg.test(str);
}
function isEngCharUpper(str)
{ 
   if (isEmpty(str)) return true;
   var reg=/^[A-Z]{1,20}$/;
   return reg.test(str);
  
}
function isEngCharLower(str)
{ 
   if (isEmpty(str)) return true;
   var reg=/^[a-z]{1,20}$/;
   return reg.test(str);
}
function isPostCode(str)
{
   if (isEmpty(str)) return true;
   var reg=/^[A-Za-z0-9]{1,12}$/;
   return reg.test(str);
  
}
function isYear(str)
{
   if (isEmpty(str)) return true;
   var reg=/^[0-9]{4}$/;
   return reg.test(str);
  
}
function isUrl(str)
{
   if (isEmpty(str) || str.toLowerCase() == "http://" ) return true;
   var reg=/^http:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$/;
   return reg.test(str);
}
function isDigit(str)
{
    if (isEmpty(str)) return true;
    var reg=/^[0-9]{1,20}$/;
    return reg.test(str);  
}
function isDigitDot(str)
{
    if (isEmpty(str)) return true;
    var reg=/^[0-9.]{1,20}$/;
    return reg.test(str);
}
function isRegisterUserName(str)
{
    if (isEmpty(str)) return true;
    var reg=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){2,19}$/;
    return reg.test(str);
    
}
function isTrueName(str)
{
    if (isEmpty(str)) return true;
    var reg=/^[a-zA-Z]{1,30}$/;
    return reg.test(str);
    
}
function isEngDigitEmpty(str)
{
    if (isEmpty(str)) return true;
    var reg=/^([a-zA-Z0-9]|[ ]){1,100}$/;
    return reg.test(str);
    
}
function isEngEmpty(str)
{
    if (isEmpty(str)) return true;
    var reg=/^([a-zA-Z]|[ ]){1,100}$/;
    return reg.test(str);
    
}
function isPasswd(str)
{
    if (isEmpty(str)) return true;
    var reg=/^(\w){6,20}$/;
    return reg.test(str);
    
}
function isTel(str)
{
    if (isEmpty(str)) return true;
    var reg=/^[+]{0,1}(\d){1,3}[ ]?([-]?((\d)|[ ]){1,12})+$/;
    return reg.test(str);
    
}
function isMobil(str)
{
    if (isEmpty(str)) return true;
	var reg=/^[0-9]{1,16}$/;
	return reg.test(str);
}

function isIP(str)  
{
   if (isEmpty(str)) return true; 
   var reg = /^((1??\d{1,2}|2[0-4]\d|25[0-5])\.){3}(1??\d{1,2}|2[0-4]\d|25[0-5])$/;
   return reg.test(str);
}

///////////////////////////////////////////////////////////////////////////////////////////

function isReal (theStr, decLen) {
    var dot1st = theStr.indexOf('.');
    var dot2nd = theStr.lastIndexOf('.');
    var OK = true;
    
    if (isEmpty(theStr)) return false;

    if (dot1st == -1) {
        if (!isInt(theStr)) return(false);
        else return(true);
    }
    
    else if (dot1st != dot2nd) return (false);
    else if (dot1st==0) return (false);
    else {
        var intPart = theStr.substring(0, dot1st);
        var decPart = theStr.substring(dot2nd+1);


        if (decPart.length > decLen) return(false);
        else if (!isInt(intPart) || !isInt(decPart)) return (false);
        else if (isEmpty(decPart)) return (false);
        else return(true);
    }
}
function isComdateMsg (lessDate1 ,startstr, moreDate1,endstr){
	var re =/\./g;
	var lessDate = lessDate1.replace(re,"-");
	var moreDate = moreDate1.replace(re,"-");
	var re1 =/\\/g;
	var lessDate = lessDate.replace(re1,"-");
	var moreDate = moreDate.replace(re1,"-");
	if(!isComdate(lessDate,moreDate)){
		var err = endstr + "";
		err = err + startstr;
		alert(err);
	}
	return isComdate(lessDate,moreDate);
}

function need_input(sForm)
{ 
    for(i=0;i<sForm.length;i++)
    {  
		if(sForm[i].tagName.toUpperCase()=="TEXTAREA")
		{
			if(sForm[i].value.realLength()>sForm[i].title)
			{
				sWarn= sForm[i].title + "'";
				alert(sWarn);
				sForm[i].focus();
				return false;				
			}
		}
		if(sForm[i].tagName.toUpperCase()=="INPUT" &&sForm[i].type.toUpperCase()=="TEXT")
		{  
			sForm[i].value = sForm[i].value.trim();
			if(sForm[i].value.indexOf('\'')>=0)
			{
				sWarn= "!";
				alert(sWarn);
				sForm[i].focus();
				return false;				
			}
			if(sForm[i].value.realLength()>sForm[i].maxLength)
			{
				sWarn= sForm[i].maxLength + "'";
				alert(sWarn);
				sForm[i].focus();
				return false;				
			}
		} 
		if(sForm[i].tagName.toUpperCase()=="INPUT" &&sForm[i].type.toUpperCase()=="TEXT" && (sForm[i].title!=""))
			if(sForm[i].value=="")
			{
				sWarn=sForm[i].title+"";
				alert(sWarn);
				sForm[i].focus();
				return false;
			}
		}
	return true;
} 
function UrlEncode(p_source)
{
	
	return ( ( p_source.split("&").join("ll_ll") ).split(",").join("dd_dd") ).split(" ").join("_");
}
function UrlDEcode(p_source)
{
	return( ( temp.split("ll_ll").join("&") ).split("dd_dd").join(",") ).split("_").join(" ");
}
function ClearUrlString(p_source)
{
	return p_source.replace(/[^0-9A-Za-z_]/ig,"")
}
String.prototype.trim = function()
{
    return this.replace(/(^[\s]*)|([\s]*$)/g, "");
}
String.prototype.lTrim = function()
{
    return this.replace(/(^[\s]*)/g, "");
}
String.prototype.rTrim = function()
{
    return this.replace(/([\s]*$)/g, "");
}
String.prototype.realLength = function()
{
  return this.replace(/[^\x00-\xff]/g,"**").length;
}
function addToFavorite(title){
  window.external.AddFavorite(document.location,title)
}