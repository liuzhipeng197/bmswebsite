
var handlerBeforeresizeSearchBox = window.onload;
function resizeSearchBoxOnLoad()
{
	resizeSearchBox();

	if(handlerBeforeresizeSearchBox)
		handlerBeforeresizeSearchBox();
}

window.onload = resizeSearchBoxOnLoad;
var fIsRTL = false;
var fSearchOn = false;
var fSearchFocus = false;
var strNonSearchString = '关键字';
var fEnteredText = false;

function SelectAction(oSrchFrm, index)
{
	if ('undefined' == typeof(oSrchFrm) || null == oSrchFrm)
		return false;

	var tbQuery = document.getElementById('frmSearch_tbQueryStr');

	oSrchFrm.sc.value = index;
	oSrchFrm.qu.value = tbQuery.value;
	if (!FChkSrchTxt(tbQuery.value) || !fEnteredText)	{
		alert('请填写要搜索的信息关键字');
		return false;
	}

	switch (index)
	{
		case 0:
		{
			oSrchFrm.sc.value = '1';
			oSrchFrm.action='results.htm';
			DeleteChildElement('sc');
			oSrchFrm.av.value = 'ZPP120';
		}
		break;

		case 1:
		{
			oSrchFrm.sc.value = '1';
			oSrchFrm.action='results.htm';
			DeleteChildElement('sc');
			oSrchFrm.av.value = 'ZPP110';
		}
		break;

		case 2:
		{
			oSrchFrm.sc.value = '1';
			oSrchFrm.action='results.htm';
			DeleteChildElement('sc');
			oSrchFrm.av.value = 'O10100';
		}
		break;

		case 3:
		{
			oSrchFrm.sc.value = '1';
			oSrchFrm.action='results.htm';
			DeleteChildElement('sc');
			oSrchFrm.av.value = 'OF9090';
		}
		break;

		case 4:
		{
			oSrchFrm.sc.value = '1';
			oSrchFrm.action='results.htm';
			DeleteChildElement('sc');
			DeleteChildElement('av');
		}
		break;

		case 5:
		{
			oSrchFrm.sc.value = '20';
			oSrchFrm.action='results-1.htm';
			DeleteChildElement('av');
		}
		break;

		case 6:
		{
			oSrchFrm.sc.value = '0';
			DeleteChildElement('av');
			var strUrl = 'rlidMScomSearch?clid=1033&St=b&Qu=%7b0%7d&View=en-US&Na=88';
			var strQueryValue = '';

			if (typeof(StrEncodeUrlComponent) == 'undefined')
				strQueryValue = escape(oSrchFrm.qu.value);
			else
				strQueryValue = StrEncodeUrlComponent(oSrchFrm.qu.value);

			strUrl = strUrl.replace('{0}', strQueryValue);
			window.location.href = strUrl;
			return false;
		}
		break;

		case 7:
		{
			oSrchFrm.sc.value = '0';
			DeleteChildElement('av');
			var strUrl = 'rlidAWSMSNSearch?clid=en-US&q=%7b0%7d';
			var strQueryValue = '';

			if (typeof(StrEncodeUrlComponent) == 'undefined')
				strQueryValue = escape(oSrchFrm.qu.value);
			else
				strQueryValue = StrEncodeUrlComponent(oSrchFrm.qu.value);

			strUrl = strUrl.replace('{0}', strQueryValue);
			window.location.href = strUrl;
			return false;
		}
		break;

	}

	return true;
}




/* Version: 12.0.5519 */
/*
	Copyright (c) Microsoft Corporation.  All rights reserved.
*/

window.onerror = ReportScriptError;

function HideScriptError(msg, url, line)
{

	return true;

}

function ReportScriptError(msg, url, line)
{

	try
	{

		window.onerror = HideScriptError;

		var strErrorInfo = "Line:" + line + ", Error: " + msg;

		var strStackTrace = GetStackTrace(arguments.caller);

		var strBrowserInfo = navigator.userAgent;

		var strUrl = "/global/images/reportscripterror.aspx?Source=" + escape(window.location)
			+ "&Error=" + escape(strErrorInfo) 
			+ "&Trace=" + escape(strStackTrace) 
			+ "&Browser=" + escape(strBrowserInfo);

		var xmlHttp = GetXMLHttp();

		if (null != xmlHttp)
		{

			xmlHttp.open("GET", strUrl, true );
			xmlHttp.send(null);
		}

	}
	catch (e) { }

	return true;

}

function GetStackTrace(funcCaller)
{
	if (null == funcCaller)
		return "UnknownFunction";

	var strStackTrace = "";
	while(funcCaller != null && funcCaller.callee != null && funcCaller.caller != funcCaller)
	{

		var strFunctionHeader = funcCaller.callee.toString();
		strFunctionHeader = strFunctionHeader.substring(9, strFunctionHeader.indexOf(")")+1);
		strStackTrace += strFunctionHeader + "; ";

		funcCaller = funcCaller.caller;
	}

	return strStackTrace;
}

function GetXMLHttp()
{
	var xmlhttp = false;

	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	return xmlhttp;
}

function G(o)
{
	if(o&&typeof(o)=="string")o=document.getElementById?document.getElementById(o):null;
	return o&&typeof(o)=="object"?o:null;
}

function GS(o)
{
	o=G(o);
	return o?o.style:null;
}

function StrGetDisplay(o)
{
	o=GS(o);
	return o?o.display:"";
}

function SDsply(o,d)
{
	o=GS(o);
	if(o)o.display=d;
}

function SDsplyH(o)
{
	SDsply(o,"none");
}

function SDsplyS(o)
{
	SDsply(o,"");
}

function TDsply(o,d)
{
	SDsply(o,(StrGetDisplay(o)==d?"none":d));
}

function FVis(o)
{
	return StrGetDisplay(o)!="none";
}

function SWdth(o,d)
{
	o=GS(o);
	if(o)o.width=d;
}

function SWdthNF(o)
{
	SWdth(o,"100%");
}

function TDB(o)
{
	TDsply(o,"block");
	return false;
}

function FSClk(e)
{
	return e&&e.button<=1&&e.shiftKey;
}

function FSEnt(e)
{
	return e&&e.keyCode==13&&e.shiftKey;
}

function GHlp(u)
{
	var strScrollBars = (window.navigator.appName.toUpperCase().indexOf("NETSCAPE") >= 0) ? ",scrollbars=1" : "" ;
	window.open(u, '_hlp011', 'toolbar=0,status=0,menubar=0' + strScrollBars + ',resizable=1,width=260,height=' + Math.round(window.screen.availHeight*2/3));
	return false;
}

function FChkSrchTxt(wz)
{
	var ws=/^[\s]*$/;
	return wz&&!ws.test(wz);
}

function FocSrchTxt(o)
{
	if (o && o.value)
	{
		if (strNonSearchString != null && strNonSearchString != 'undefined' && o.value == strNonSearchString && !fEnteredText)
		{
			o.value = '';
		}
		else
		{
			o.select();
		}
		setSearchOnColor(o);
		fEnteredText=true;
	}
}

function FTrySearch(e, strFormName, index)
{
	fSearchFocus = false;
	searchclose();

	var oSrchFrm = document.getElementById(strFormName);

	if ('undefined' != typeof(oSrchFrm) && null != oSrchFrm && SelectAction(oSrchFrm, index))
		{

		try {external.AutoCompleteSaveForm(oSrchFrm);} catch (err) {}
		oSrchFrm.submit();
		}

	if (e && e.stopPropagation)
		e.stopPropagation(); 

	return false;
}

function FEntTextbox(e, strFormName, index)
{
	if (e && 13 == e.keyCode)
		return FTrySearch(e, strFormName, index);

	return true;
}

function FBSCTrySearch(strFrmName, strSrchErr, strResultsUrl, iScope)
{
	var oSrchFrm = G(strFrmName);

	if (!oSrchFrm)
		return false;

	if (!FChkSrchTxt(G('BSCQU').value))
	{
		alert(strSrchErr);
		return false;
	}

	if (!oSrchFrm.av)
	{
		var inputAV = document.createElement("input");
		inputAV.id = "av";
		inputAV.name = "av";
		inputAV.type = "hidden";		
		oSrchFrm.appendChild(inputAV);
	}

	oSrchFrm.qu.value = G('BSCQU').value;
	oSrchFrm.av.value = G('BSCAV').value;
	oSrchFrm.sc.value = iScope;
	oSrchFrm.action = strResultsUrl;
	oSrchFrm.submit();
	return false;
}

function FOnClipartSearchKey(e)
{
	if (e && 13 == e.keyCode)
		SearchClipartFromCM();

	return true;
}

function SearchClipartFromCM()
{
	var nScope = 20; 

	if (document.getElementById("inputClpSrchClipart").checked)
		nScope = 21; 

	if (document.getElementById("inputClpSrchPhotos").checked)
		nScope = 22; 

	if (document.getElementById("inputClpSrchAnimations").checked)
		nScope = 23; 

	if (document.getElementById("inputClpSrchSounds").checked)
		nScope = 24; 

	var strQuery = document.getElementById("inputClpSrchText").value;
	if (null == strQuery || 0 >= strQuery.length || !FChkSrchTxt(strQuery))
	{
		alert(strClpSrchEmptyQuery);
		return;
	}

	var frm = document.getElementById("frmClipartSearch");
	frm.qu.value = strQuery;
	frm.sc.value = nScope.toString();
	frm.submit();
}

function FBSCEndTextbox(e, strFrmName, strSrchErr, strResultsUrl, iScope)
{
	if (e&&e.keyCode == 13) return FBSCTrySearch(strFrmName, strSrchErr, strResultsUrl, iScope);
	return true;
}

function TbrGet(tb)
{
	tb=G(tb);
	if(tb&&tb.tagName=="TABLE")
		return tb.rows[0];
	return null;
}

function FCIIRange(tr,i)
{
	return tr&&tr.tagName=="TR"&&i!=null&&i>=0&&i<tr.cells.length;
}

function StrGTT(tbic)
{
	var wzType=null;

	tbic=G(tbic);
	if(tbic)
		{
		wzType=tbic.getAttribute("TBICTYPE");
		if(!wzType)wzType="i";
		}

	return wzType;
}

function FIGTbic(tbic)
{
	return FITbic(tbic)||FGTbic(tbic);
}

function FITbic(tbic)
{
	return StrGTT(tbic)=="i";
}

function FGTbic(tbic)
{
	return StrGTT(tbic)=="g";
}

function FSTbic(tbic)
{
	return StrGTT(tbic)=="s";
}

function FPTbic(tbic)
{
	return StrGTT(tbic)=="p";
}

function TbicGet(tb,i,fSkip,tbic)
{
	tbic=G(tbic);
	if(!tbic)
		{
		var tbrow=TbrGet(tb);
		if(!tbrow)return;

		if(i==null)i=0;
		if(fSkip==null)fSkip=true;

		if(FCIIRange(tbrow,i))
			{
			if(!fSkip)
				{
				tbic=tbrow.cells[i];
				}
			else
				{
				for(var iCell=0, cCells=tbrow.cells.length; iCell<cCells; iCell++)
					{
					tbic=tbrow.cells[iCell];

					if(FIGTbic(tbic))
						{
						if(i==0)break; 
						else i--;
						}

					tbic=null;
					if(i<0) break;
					}
				}
			}
		}

	return tbic;
}

function HideTbic(tb,i,tbic)
{
	tbic=TbicGet(tb,i,true,tbic);
	if(tbic)
		{

		SDsplyH(tbic);

		PTBSep(tb);
		}
}

function ShowTbic(tb,i,tbic)
{
	tbic=TbicGet(tb,i,true,tbic);
	if(tbic)
		{

		SDsplyS(tbic);

		PTBSep(tb);
		}
}

function PTBSep(tb)
{
	var tbrow=TbrGet(tb);
	if(!tbrow)return;

	var tbic;
	var iCell, cCells=tbrow.cells.length;

	for(iCell=0, tbic=tbrow.cells[iCell]; tbic&&iCell<cCells; iCell++, tbic=tbrow.cells[iCell])
		if(FSTbic(tbic))SDsplyH(tbic);

	var fVisibleFound=false;
	var tbicNext;
	for(iCell=0, tbic=tbrow.cells[iCell]; tbic&&iCell<cCells; iCell++, tbic=tbrow.cells[iCell])
		{
		if(FIGTbic(tbic)&&FVis(tbic))fVisibleFound=true;
		else if(FPTbic(tbic))fVisibleFound=false;

		tbicNext=tbrow.cells[iCell+1];
		if(fVisibleFound&&FSTbic(tbic)&&FIGTbic(tbicNext)&&FVis(tbicNext))SDsplyS(tbic);
		}
}

function SetTopNavSiteMapLinkBorder(strTdId, fIsHover)
{
	if (!document.getElementById ||
		'undefined' == typeof(document.getElementById))
		return;

	var tdCell = document.getElementById(strTdId);
	if ('undefined' == typeof(tdCell) ||
		null == tdCell ||
		'undefined' == typeof(tdCell.className))
		return;

	if (fIsHover)
		tdCell.className = 'TopNavCellLinkHover';
	else
		tdCell.className = 'TopNavCellLink';
}

function StrEncodeUrlComponent(strUrlComponent)
{
	if (typeof(strUrlComponent) == "undefined" ||
		null == strUrlComponent)
		return "";

	if (typeof(encodeURIComponent) != "undefined")
		return StrEncodeUrlComponent55(strUrlComponent);

	return StrEncodeUrlComponent50(strUrlComponent);
}

function StrEncodeUrlComponent55(strUrlComponent)
{
	return encodeURIComponent(strUrlComponent);
}

function StrEncodeUrlComponent50(strUrlComponent)
{
	var i=0;
	var strEncoded = "";
	for (i=0; i < strUrlComponent.length; i++)
		{
		var chr = strUrlComponent.charAt(i);
		var iChr = strUrlComponent.charCodeAt(i);

		if (iChr < 128)
			{
			if ('!' == chr || '\'' == chr || '(' == chr || 	')' == chr || '~' == chr)
				strEncoded += chr;
			else if (0 == iChr)
				strEncoded += "%00";
			else if (127 == iChr)
				strEncoded += "%7F";
			else if ('+' == chr)
				strEncoded += "%2B";
			else if ('/' == chr)
				strEncoded += "%2F";
			else if ('@' == chr)
				strEncoded += "%40";
			else
				strEncoded += escape(chr);
			}
		else if (iChr < 2048)
			{
			strEncoded += "%";
			strEncoded += ( (iChr >> 6) + 192).toString(16).toUpperCase();

			strEncoded += "%";
			strEncoded += ( (iChr & 63) + 128).toString(16).toUpperCase();
			}
		else 
			{
			strEncoded += "%";
			strEncoded += ( (iChr >> 12) + 224).toString(16).toUpperCase();

			strEncoded += "%";
			strEncoded += ( ((iChr >> 6) & 63) + 128).toString(16).toUpperCase();

			strEncoded += "%";
			strEncoded += ( (iChr & 63) + 128).toString(16).toUpperCase();
			}
		}

	return strEncoded;
}

function StrReplaceParam(strUrl, strParam, strNewValue)
{
	var strUpperUrl = strUrl.toUpperCase();
	var strUpperParam = strParam.toUpperCase();

	var iStart = strUpperUrl.indexOf('?' + strUpperParam);
	if (iStart < 0)
		iStart = strUpperUrl.indexOf('&' + strUpperParam);

	if (iStart < 0)
		return strUrl;

	var iEnd = strUpperUrl.indexOf('&', iStart+1);

	if (iEnd < 0)
		iStart--;

	var strRet = strUrl.substring(0, iStart+1);

	if (iEnd >= 0)
		strRet += strUrl.substring(iEnd+1, strUrl.length);

	if (typeof(strNewValue) != 'undefined' &&
		null != strNewValue && strNewValue.length > 0)
		{
		var strSeparator = strRet.indexOf('?') < 0 ? '?' : '&';
		if (strRet.charAt(strRet.length-1) == strSeparator)
			strSeparator=''; 
		strRet += strSeparator + strParam + '=' + strNewValue;
		}

	return strRet;
}

function FCheckElementID(strID)
{
	if ('undefined' == typeof(document.getElementById(strID)))
		return false;

	if (null == document.getElementById(strID))
		return false;

	return true;
}

function FFeedbackWizCheckIDs()
{
	if (FCheckElementID('divFeedbackPanel1') &&
		(FCheckElementID('divFeedbackPanel2') || fIsSimpleFeedbackWiz) &&
		(FCheckElementID('divFeedbackPanel3') || fIsSimpleFeedbackWiz) &&
		FCheckElementID('imgRatingStar1') &&
		FCheckElementID('imgRatingStar2') &&
		FCheckElementID('imgRatingStar3') &&
		FCheckElementID('imgRatingStar4') &&
		FCheckElementID('imgRatingStar5') &&
		(FCheckElementID('tbFeedbackText') || fIsSimpleFeedbackWiz))
		{
		return true;
		}

	return false;
}

function NavigateIFrameIE(strIFrameId, strLocation)
{
	var ifrmSubmitTarget = frames[strIFrameId];
	if (typeof(ifrmSubmitTarget) != 'undefined' && null != ifrmSubmitTarget)
		ifrmSubmitTarget.location.replace(strLocation);
}

function NavigateIFrameNetscape(strIFrameId, strLocation)
{
	var ifrmSubmitTarget = document.getElementById(strIFrameId);

	if (typeof(ifrmSubmitTarget) != 'undefined' && null != ifrmSubmitTarget)
		{
		if (typeof(ifrmSubmitTarget.contentWindow) != 'undefined')
			ifrmSubmitTarget.contentWindow.location.replace(strLocation); 
		else
			ifrmSubmitTarget.src = strLocation; 
		}
}

function NavigateIFrame(strIFrameId, strLocation)
{
	if (window.navigator.appName.toUpperCase().indexOf("NETSCAPE") >= 0)
		NavigateIFrameNetscape(strIFrameId, strLocation);
	else
		NavigateIFrameIE(strIFrameId, strLocation);
}

function FeedbackWizShowFirstPane()
{
	document.getElementById('divFeedbackPanel1').style.display = 'block';
	document.getElementById('divFeedbackPanel2').style.display = 'none';
	document.getElementById('divFeedbackPanel3').style.display = 'none';
	iFeedbackWizStarRated = 0;
	iRvasap = 0; 
	FeedbackWizMouseOutStar();

	FeedbackWizUpdateCounter();
}

function FeedbackWizShowThankYouPane()
{
	document.getElementById('divFeedbackPanel1').style.display = 'none';
	document.getElementById('divFeedbackPanel2').style.display = 'none';
	document.getElementById('divFeedbackPanel3').style.display = 'block';
}

function FeedbackWizShowPane(iPane, iSubPane)
{
	for (var i=1; i <= 4; i++)
	{
		var strPane = 'divFeedbackPanel' + i;

		if (!FCheckElementID(strPane))
			continue;

		if (i != iPane)
		{
			document.getElementById(strPane).style.display = 'none';
			continue;
		}

		document.getElementById(strPane).style.display = 'block';

		if (typeof(iSubPane) == 'undefined')
			continue;

		for (var j=1; j <= 3; j++)
		{
			var strSubPane = strPane + 'Sub' + j;
			if (!FCheckElementID(strSubPane))
				continue;

			if (j == iSubPane)
				document.getElementById(strSubPane).style.display = 'block';
			else
				document.getElementById(strSubPane).style.display = 'none';
		}
	}

	if (2 == iPane)
	{
		var tbFeedback = document.getElementById('tbFeedbackText');
		if (null != tbFeedback && typeof(tbFeedback) != 'undefined')
			tbFeedback.focus();
	}

	if (1 == iPane && iSubPane < 0)
		iRvasap = 0; 
}

function FeedbackWizDoSubmit(fChangePanel)
{
	if (typeof(window.navigator) != 'undefined' &&
		typeof(window.navigator.onLine) != 'undefined')
		{
		if (!window.navigator.onLine)
			{
			alert(strYouAreNotOnlineErrMsg);
			return;
			}
		}

	if (!FFeedbackWizCheckIDs())
		return;

	if ('undefined' == typeof(strPageAssetId) ||
		null == strPageAssetId ||
		0 >= strPageAssetId.length)
		{
		return;
		}

	if (fChangePanel)
		{
		document.getElementById('divFeedbackPanel1').style.display = 'none';
		document.getElementById('divFeedbackPanel2').style.display = 'block';
		document.getElementById('divFeedbackPanel3').style.display = 'none';
		}

	if (1 != iFeedbackWizStarRated && 2 != iFeedbackWizStarRated &&
		3 != iFeedbackWizStarRated && 4 != iFeedbackWizStarRated &&
		5 != iFeedbackWizStarRated)
		{
		iFeedbackWizStarRated = 0;
		iRvasap = 0; 
		}

	var strAPFeedbackId = "";
	if (1 == iRvasap)
	{
		strAPFeedbackId = GetCookie("apfbkid", ""); 
		if (null != strAPFeedbackId && 36 == strAPFeedbackId.length)
		{
			strAPFeedbackId = "&" + "apfbkid" + "=" + StrEncodeUrlComponent(strAPFeedbackId);
		}
		else
		{
			strAPFeedbackId = "";
		}

		mSetCookie("apfbkid", ""); 
		iRvasap = 0; 
	}
	else
	{
		iRvasap = 1; 
	}

	var strFeedbackUrl = strFeedbackPageUrl +
		"?rating=" + iFeedbackWizStarRated.toString() +
		strAPFeedbackId +
		'&AssetID=' + strPageAssetId +
		"&AssetVersion=" + strAssetVersion +
		"&" + strPageLoggingParams;

	var strComment = '';
	if (fChangePanel)
		strComment = document.getElementById('tbFeedbackText').value;

	if (typeof(strComment) == 'undefined')
		strComment = '';
	else if (null == strComment)
		strComment = '';

	var iMaxLength = 1024 * 4;

	if (typeof(document.cookie) != undefined && null != document.cookie)
		iMaxLength -= document.cookie.length;

	iMaxLength -= 23; 
	iMaxLength -= 64; 

	strComment = escape(strComment);
	if (iMaxLength <= 0)
		strComment = '';
	else if (strComment.length > iMaxLength)
		strComment = strComment.substring(0, iMaxLength);

	document.cookie = 'feedbackComment=' + strComment + ';path=/';

	var strDelayedCmd = 'FeedbackWizDelayedSubmit("' + strFeedbackUrl + '", ' + (fChangePanel ? 'true' : 'false') + ');';
	window.setTimeout(strDelayedCmd, 100);
}

function FeedbackWizDoSubmitAsst(iRating, fComment)
{
	if (typeof(window.navigator) != 'undefined' &&
		typeof(window.navigator.onLine) != 'undefined')
		{
		if (!window.navigator.onLine)
			{
			alert(strYouAreNotOnlineErrMsg);
			return;
			}
		}

	if ('undefined' == typeof(strPageAssetId) ||
		null == strPageAssetId ||
		0 >= strPageAssetId.length)
		{
		return;
		}

	if (!FCheckElementID('divFeedbackPanel1') ||
		!FCheckElementID('divFeedbackPanel2') ||
		!FCheckElementID('divFeedbackPanel3') ||
		!FCheckElementID('divFeedbackPanel4'))
	{
		return;
	}

	var fOnlyCommentNeeded = false;
	if (iRating < 0)
	{
		iRating = iFeedbackWizStarRated;
		fOnlyCommentNeeded = true;
	}
	else
	{
		iFeedbackWizStarRated = iRating;
		iRvasap = 0; 
	}

	var strAPFeedbackId = "";
	if (1 == iRvasap)
	{
		strAPFeedbackId = GetCookie("apfbkid", ""); 
		if (null != strAPFeedbackId && 36 == strAPFeedbackId.length)
		{
			strAPFeedbackId = "&" + "apfbkid" + "=" + StrEncodeUrlComponent(strAPFeedbackId);
		}
		else
		{
			strAPFeedbackId = "";
		}

		mSetCookie("apfbkid", ""); 
		iRvasap = 0; 
	}
	else
	{
		iRvasap = 1; 
	}

	var strFeedbackUrl = strFeedbackPageUrl +
		"?rating=" + iRating.toString() +
		strAPFeedbackId +
		'&AssetID=' + strPageAssetId +
		"&AssetVersion=" + strAssetVersion +
		"&" + strPageLoggingParams;

	var strComment = '';
	if (fComment)
	{
		strComment = document.getElementById('tbFeedbackText').value;

		if (typeof(strComment) == 'undefined')
			strComment = '';
		else if (null == strComment)
			strComment = '';

		strComment = escape(strComment);
		if (strComment.length > 1024 * 4)
			strComment = strComment.substring(0, 1024 * 4);

		if (fOnlyCommentNeeded && strComment.length <= 0)
		{
			FeedbackWizShowPane(4, -1);
			return;
		}
	}

	if (strComment.length > 0)
		document.cookie = 'feedbackComment=' + strComment + ';path=/';

	var iSubPanel = 3; 
	if (5 == iRating)
		iSubPanel = 1; 
	else if (1 == iRating)
		iSubPanel = 2; 

	var strDelayedCmd =
		'FeedbackWizDelayedSubmitAsst("' +
			strFeedbackUrl + '", ' +
			(fComment ? '4' : '2') + ', ' +
			iSubPanel + ');';

	window.setTimeout(strDelayedCmd, 100);

	if (fComment)
		FeedbackWizShowPane(3, -1);

	if (1 == iRating || 5 == iRating || 3 == iRating)
	{
		var taTextArea = document.getElementById("tbFeedbackText");
		if (typeof(taTextArea) == "undefined" ||
			null == taTextArea ||
			typeof(taTextArea.title) == "undefined")
		{
			return;
		}

		var strSpan = "";

		if (5 == iRating)
			strSpan = "divFeedbackPanel2Sub1";
		else if (1 == iRating)
			strSpan = "divFeedbackPanel2Sub2";
		else
			strSpan = "divFeedbackPanel2Sub3";

		var divLabel = document.getElementById(strSpan);
		if (typeof(divLabel) == "undefined" ||
			null == divLabel ||
			typeof(divLabel.innerHTML) == "undefined" ||
			null == divLabel.innerHTML)
		{
			return;
		}

		taTextArea.title = divLabel.innerHTML;
	}
}

function FeedbackWizDelayedSubmitAsst(strFeedbackUrl, iPanel, iSubPanel)
{
	var fWasOK = true;
	try
	{
		NavigateIFrame('submitTarget', strFeedbackUrl);
	}
	catch (e)
	{
		fWasOK = false;
		alert(strCannotSubmitFeedbackErrmsg);
		FeedbackWizShowPane(1, -1);
	}

	if (true == fWasOK)
	{
		if (0 != iPanel)
		{
			if (4 == iPanel)
				window.setTimeout('FeedbackWizShowPane(' + iPanel + ', ' + iSubPanel + ');', 1200);
			else
				FeedbackWizShowPane(iPanel, iSubPanel);
		}
	}
	else
	{
		FeedbackWizShowPane(1, -1);
	}
}

function FeedbackWizDelayedSubmit(strFeedbackUrl, fChangePanel)
{
	var fWasOK = true;
	try
		{
		NavigateIFrame('submitTarget', strFeedbackUrl);
		}
	catch (e)
		{
		fWasOK = false;
		alert(strCannotSubmitFeedbackErrmsg);
		FeedbackWizShowFirstPane();
		}

	if (true == fWasOK)
		{
		if (fChangePanel)
			window.setTimeout('FeedbackWizShowThankYouPane();', 1200);
		}
	else
		{
		FeedbackWizShowFirstPane();
		}
}

function FeedbackWizGenerateFXHeader()
{
	document.write('<DIV>&nbsp;</DIV>');
	document.write('<DIV CLASS="cdOLn">&nbsp;</DIV>\n');
}

function RgimgFeedbackWizGetImages()
{
	var imgs = new Array(5);
	imgs[0] = document.getElementById("imgRatingStar1");
	imgs[1] = document.getElementById("imgRatingStar2");
	imgs[2] = document.getElementById("imgRatingStar3");
	imgs[3] = document.getElementById("imgRatingStar4");
	imgs[4] = document.getElementById("imgRatingStar5");
	return imgs;
}

function FeedbackWizUpdateCounter()
{
	goDisplayCount(650, 'tbFeedbackText', 'spnFeedbackCounter',
		'btnFeedbackWizSubmit');
}

function FeedbackWizUpdateCounterDelay()
{
	if (typeof(window) != 'undefined' && null != window)
	{
		window.setTimeout("FeedbackWizUpdateCounter()", 25);
	}
}

function FeedbackWizMouseOverStar(iStar)
{
	if (!FFeedbackWizCheckIDs())
		return;

	var imgs = RgimgFeedbackWizGetImages();

	for (var i=0; i < imgs.length; i++)
		if (fFeedbackWizJustRated)
			{
			if (iStar > i)
				imgs[i].src = "/global/images/ratings/lg_output_full.gif";
			else
				imgs[i].src = "/global/images/ratings/lg_output_empty.gif";
			}
		else
			{
			if (iStar > i)
				imgs[i].src = "/global/images/ratings/lg_input_full.gif";
			else
				imgs[i].src = "/global/images/ratings/lg_output_empty.gif";
			}
}

function FeedbackWizMouseOutStar()
{
	if (!FFeedbackWizCheckIDs())
		return;

	fFeedbackWizJustRated = false;
	var imgs = RgimgFeedbackWizGetImages();

	for (var i=0; i < imgs.length; i++)
		{
		if (iFeedbackWizStarRated < 1 || iFeedbackWizStarRated > 5)
			{
			imgs[i].src = "/global/images/ratings/lg_output_empty.gif";
			}
		else
			{
			if (iFeedbackWizStarRated > i)
				imgs[i].src = "/global/images/ratings/lg_output_full.gif";
			else
				imgs[i].src = "/global/images/ratings/lg_output_empty.gif";
			}
		}
}

function CommentOnThisTemplate()
{
	var strAv = StrGetArgumentValue("av");
	var strCategoryId = StrGetArgumentValue("CategoryId");
	var strNewUrl = strCommentOnThisTemplateLnk;

	var strAPFeedbackId = GetCookie("apfbkid", ""); 
	if (null != strAPFeedbackId && 36 == strAPFeedbackId.length)
		strNewUrl += "&" + "apfbkid" + "=" + StrEncodeUrlComponent(strAPFeedbackId);

	if (null != strCategoryId && strCategoryId.length > 0)
		strNewUrl += "&CategoryId=" + strCategoryId;

	if (null != strAv && strAv.length > 0)
		strNewUrl += "&av=" + strAv;

	mSetCookie("apfbkid", ""); 

	location.href = strNewUrl;
}

function FeedbackWizStarClicked(iStar)
{
	if (!FFeedbackWizCheckIDs())
		return;

	if (iFeedbackWizStarRated == iStar)
		return;

	iFeedbackWizStarRated = iStar;
	fFeedbackWizJustRated = true;
	iRvasap = 0; 

	FeedbackWizUpdateCounter();

	var imgs = RgimgFeedbackWizGetImages();
	for (var i=0; i < imgs.length; i++)
		{
		if (i == iStar-1)
			{
			imgs[i].style.cursor = "default";
			imgs[i].alt = rgStrYouRated[i];
			}
		else
			{
			imgs[i].style.cursor = "hand";
			imgs[i].alt = rgStrClickToRate[i];
			}

		if (iStar > i)
			imgs[i].src = "/global/images/ratings/lg_output_full.gif";
		else
			imgs[i].src = "/global/images/ratings/lg_output_empty.gif";
		}

	FeedbackWizDoSubmit(false);

	if (fIsSimpleFeedbackWiz)
		strCommentOnThisTemplateLnk = StrReplaceParam(strCommentOnThisTemplateLnk, "Rating", iStar.toString());

	for (var i=1; i <= 3; i++)
		{
		var divSub = document.getElementById("divFeedbackPanel2Sub" + i.toString());
		if (typeof(divSub) != "undefined" && null != divSub)
			divSub.style.display = "block";
		}
}

function FeedbackWizGenerateControl(
	strLabel1a, strLabel1b, strLabel1c, 
	strLabel2, 
	strLabel3, strLabel3Text,
	strLnkContactUsLink, strContactUsText, strContactUsUrl,
	strSubmit,
	strChangeMyFeedback,
	strFeedbackWizWidth,
	fShow1a,
	fShow1b,
	fShow1c,
	fAsstParam, strNotHelpful, strVeryHelpful)
{
	mSetCookie("apfbkid", ""); 

	var fAsst = false;
	var iDivHeight = 151;
	if (typeof(fAsstParam) != 'undefined' && fAsstParam)
		{
		fAsst = true;
		iDivHeight = 166;
		}

	var strLnkContactUsCellText = strLnkContactUsLink.replace('{0}',
		'<A CLASS="OAnc" HREF="javascript:OpenInNewWindow(\'' + strContactUsUrl +
		'\')">' + strContactUsText + '</A>');

	strSubmit = strSubmit.replace("\'", "&apos;");
	strSubmit = strSubmit.replace('\"', '&quot;');

	var strSmallerWidth = strFeedbackWizWidth;

	if (fAsst && '100%' == strFeedbackWizWidth)
	{
		document.write('<BR>');
		strSmallerWidth = '97%';
	}
	else
	{
		strSmallerWidth = (parseInt(strFeedbackWizWidth) - 4) + 'px';
	}

	document.write('<TABLE CLASS="FeedbackControlMainTable OTbl" CELLPADDING="0" ' +
		'CELLSPACING="0" BORDER="0" WIDTH="' + strFeedbackWizWidth + '"><TR>' +
		'<TD CLASS="FeedbackControl" WIDTH="' + strFeedbackWizWidth + '" ' +
		'STYLE="border-bottom: 0px;">');

	if (fIsSimpleFeedbackWiz)
		{
		document.write('<DIV ID="divFeedbackPanel1" CLASS="FeedbackWizCell" STYLE="display: block;">');
		document.write('	<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%" CLASS="OTbl">');
		}
	else
		{
		document.write('<DIV ID="divFeedbackPanel1" CLASS="FeedbackWizCell" STYLE="display: block;">');
		document.write('	<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%" CLASS="OTbl" HEIGHT="' + iDivHeight + '">');

		if (fShow1a)
			{
			document.write('	<TR>');
			document.write('		<TD STYLE="font-weight: bold;">');
			document.write('			<SPAN CLASS="OLbl">' + strLabel1a + '</SPAN>');
			document.write('		</TD>');
			document.write('	</TR>');
			}
		}

	document.write('		<TR>');

	if (fIsOn2Lines)
		document.write('		<TD NOWRAP="true">');
	else if (fIsSimpleFeedbackWiz)
		document.write('		<TD>');
	else if (fAsst)
		document.write('		<TD STYLE="padding-top: 3px; padding-bottom: 5px;">');
	else
		document.write('		<TD STYLE="padding-top: 8px;">');

	if (fShow1b)
		document.write('				<SPAN CLASS="OLbl" NOWRAP="true">' + strLabel1b + '</SPAN>');

	if (!fIsOn2Lines)
		{
		document.write('			</TD>');
		document.write('		</TR>');
		document.write('		<TR>');
		document.write('			<TD STYLE="padding-top: 4px;" NOWRAP="true">');
		}
	else
		document.write(' ');

	if (fAsst)
		{
		document.write('<TABLE CLASS="OTbl" BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%"><TR>');
		document.write('<TD VALIGN="middle">' + strNotHelpful + '</TD>');
		document.write('<TD VALIGN="middle" STYLE="padding: 0.5em 12px 0.5em 12px;" NOWRAP="true">');
		}

	for (var i=1; i <= 5; i++)
		{
		document.write(				'<A BORDER="0" ID="lnkRatingStar' + i + '" ');
		document.write(					'HREF="javascript:FeedbackWizStarClicked(' + i + ')" ');
		document.write(					'ONMOUSEOVER="javascript:FeedbackWizMouseOverStar(' + i + ')" ');
		document.write(					'ONMOUSEOUT="javascript:FeedbackWizMouseOutStar()">');
		document.write(				'<IMG BORDER="0" ID="imgRatingStar' + i + '" NAME="imgRatingStar' + i + '" ');
		document.write(					'SRC="' + "/global/images/ratings/lg_output_empty.gif" + '" ');
		document.write(					'STYLE="cursor:hand;" ');
		document.write(					'ALT="' + rgStrClickToRate[i-1] + '">');
		document.write(				'</A>');
		}

	if (fAsst)
		{
		document.write('</TD>');
		document.write('<TD VALIGN="middle">' + strVeryHelpful + '</TD>');
		document.write('<TD WIDTH="100%">&nbsp;</TD>');
		document.write('</TR></TABLE>');
		}

	document.write('			</TD>');
	document.write('		</TR>');

	if (fIsSimpleFeedbackWiz)
		{
		if (fShow1c)
			{
			document.write('		<TR>');
			document.write('			<TD STYLE="padding-top: 4px;" NOWRAP="true">' + strLabel1c + '</TD>');
			document.write('		</TR>');
			}
		}
	else
		{
		if (fShow1c)
			{
			document.write('		<TR>');
			document.write('			<TD STYLE="padding-top: 8px;">');

			if (fAsst)
				document.write('<DIV ID="divFeedbackPanel2Sub1" STYLE="display: none;">');

			document.write('				<SPAN CLASS="OLbl">' + strLabel1c + '</SPAN>');

			if (fAsst)
				document.write('</DIV>');

			document.write('			</TD>');
			document.write('		</TR>');
			}
		document.write('		<TR>');
		document.write('			<TD>');

		if (fAsst)
			document.write('<DIV ID="divFeedbackPanel2Sub2" STYLE="display: none;">');

		document.write('				<TEXTAREA CLASS="cdOTBM" ROWS="3" COLS="36" ID="tbFeedbackText" STYLE="width:' + strSmallerWidth + '" ');
		document.write('					TITLE="' + strLabel1c.replace('\"', '&quot;') + '"');
		document.write('					ONFOCUS="FeedbackWizUpdateCounter();" ');
		document.write('					ONCHANGE="FeedbackWizUpdateCounter();" ');
		document.write('					ONPASTE="FeedbackWizUpdateCounterDelay();" ');
		document.write('					ONKEYUP="FeedbackWizUpdateCounter();">');
		document.write(					'</TEXTAREA>');

		if (fAsst)
			document.write('</DIV>');

		document.write('			</TD>');
		document.write('		</TR>');
		document.write('		<TR>');
		document.write('			<TD STYLE="padding-top: 2px;">');

		if (fAsst)
			document.write('<DIV ID="divFeedbackPanel2Sub3" STYLE="display: none;">');

		document.write('				<TABLE CLASS="OTbl" BORDER="0" CELLPADDING="0" CELLSPACING="0">');
		document.write('					<TR><TD WIDTH="100%"><SPAN ID="spnFeedbackCounter"></SPAN></TD>');
		document.write('					<TD CLASS="FeedbackWizButtonCell">');
		document.write('					<INPUT CLASS="cdOBtn FeedbackWizButton" TYPE="button" ID="btnFeedbackWizSubmit" ');
		document.write(							'VALUE="' + strSubmit + '" ONCLICK="FeedbackWizDoSubmit(true);"/>');
		document.write('					</TD></TR>');
		document.write('				</TABLE>');

		if (fAsst)
			document.write('</DIV>');

		document.write('			</TD>');
		document.write('		</TR>');
		}

	document.write('	</TABLE>');
	document.write('</DIV>');

	if (!fIsSimpleFeedbackWiz)
		{

		document.write('<DIV ID="divFeedbackPanel2" CLASS="FeedbackWizCell" STYLE="display:none;">');
		document.write('	<TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" CLASS="OTbl" HEIGHT="' + iDivHeight + '">');
		document.write('		<TR>');
		document.write('			<TD STYLE="font-weight: bold;">');
		document.write('				<SPAN CLASS="OLbl">' + strLabel2 + '</SPAN>');
		document.write('			</TD>');
		document.write('		</TR>');
		document.write('		<TR>');
		document.write('			<TD HEIGHT="100%"/>');
		document.write('		</TR>');
		document.write('	</TABLE>');
		document.write('</DIV>');

		document.write('<DIV ID="divFeedbackPanel3" CLASS="FeedbackWizCell" STYLE="display:none;">');
		document.write('	<TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" CLASS="OTbl" HEIGHT="' + iDivHeight + '">');
		document.write('		<TR>');
		document.write('			<TD STYLE="font-weight: bold;">');
		document.write('				<SPAN CLASS="OLbl">' + strLabel3 + '</SPAN>');
		document.write('			</TD>');
		document.write('		</TR>');
		document.write('		<TR>');
		document.write('			<TD>');
		document.write('				<SPAN><A HREF="javascript:FeedbackWizShowFirstPane()" CLASS="OAnc">' + strChangeMyFeedback + '</A></SPAN>');
		document.write('			</TD>');
		document.write('		</TR>');
		document.write('		<TR>');
		document.write('			<TD STYLE="padding-top: 8px;">');
		document.write('				<SPAN>' + strLabel3Text + '</SPAN>');
		document.write('			</TD>');
		document.write('		</TR>');

		document.write('		<TR><TD HEIGHT="6"><SPAN/></TD></TR>');

		document.write('		<TR>');
		document.write('			<TD WIDTH="100%">');
		document.write(					strLnkContactUsCellText);
		document.write('			</TD>');
		document.write('		</TR>');

		document.write('		<TR>');
		document.write('			<TD HEIGHT="100%"/>');
		document.write('		</TR>');
		document.write('	</TABLE>');
		document.write('</DIV>');
		}

	document.write('</TD></TR></TABLE>');

	var img0 = new Image();
	img0.src = "/global/images/ratings/lg_output_full.gif";

	var img1 = new Image();
	img1.src = "/global/images/ratings/lg_output_empty.gif";

	var img2 = new Image();
	img2.src = "/global/images/ratings/lg_input_full.gif";

	FeedbackWizUpdateCounter();
}

function FeedbackWizGenerateControl_Buttons(
	strP1Question, strP1Yes, strP1No, strP1DontKnow, 
	strP2QYes, strP2QNo, strP2QDontKnow, 
	strP2Back, strP2Submit, 
	strP3Label, 
	strP4Label,
	strP4ContactUsLine, strP4ContactUsText, strP4ContactUsUrl,
	strP4ChangeMyFeedback, strP4ThankYou,
	strFeedbackWizWidth)
{
	mSetCookie("apfbkid", ""); 

	var strP4ContactUsCellText = strP4ContactUsLine.replace('{0}',
		'<A CLASS="OAnc" HREF="javascript:OpenInNewWindow(\'' + strP4ContactUsUrl +
		'\')">' + strP4ContactUsText + '</A>');

	var strSmallerWidth = strFeedbackWizWidth;

	if ('100%' == strFeedbackWizWidth)
	{
		document.write('<BR>');
		strSmallerWidth = '97%';
	}
	else
	{		
		strSmallerWidth = (parseInt(strFeedbackWizWidth) - 4) + "px";
	}

	document.write('<TABLE CLASS="FeedbackControlMainTable OTbl" CELLPADDING="0" ' +
		'CELLSPACING="0" BORDER="0" WIDTH="' + strFeedbackWizWidth + '"><TR>' +
		'<TD CLASS="FeedbackControl" WIDTH="' + strFeedbackWizWidth + '" ' +
		'STYLE="border-bottom: 0px;">');

	document.write('<DIV ID="divFeedbackPanel1" CLASS="FeedbackWizCell" STYLE="display: block;">');
	document.write('<TABLE VALIGN="top" BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%" CLASS="OTbl" HEIGHT="' + 106 + '">');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" class="cdFeedbackWizQuestion">');
	document.write('			<SPAN CLASS="OLbl">' + strP1Question + '</SPAN>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" STYLE="padding-top: 4px;" NOWRAP="true">');
	document.write('			<INPUT TYPE="button" ID="btnFeedbackWizYes" CLASS="cdOBtn FeedbackWizButton" value="' + strP1Yes + '" ONCLICK="javascript:FeedbackWizDoSubmitAsst(5, false);"/>&nbsp;&nbsp;');
	document.write(				'<INPUT TYPE="button" ID="btnFeedbackWizNo" CLASS="cdOBtn FeedbackWizButton" value="' + strP1No + '" ONCLICK="javascript:FeedbackWizDoSubmitAsst(1, false);"/>');

	if (strP1DontKnow.length > 0)
		document.write('&nbsp;&nbsp;<INPUT TYPE="button" ID="btnFeedbackWizMaybe" CLASS="cdOBtn FeedbackWizButtonBig" value="' + strP1DontKnow + '" ONCLICK="javascript:FeedbackWizDoSubmitAsst(3, false);"/>');

	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR><TD>&nbsp;</TD></TR>');
	document.write('</TABLE>');
	document.write('</DIV>');

	document.write('<DIV ID="divFeedbackPanel2" CLASS="FeedbackWizCell" STYLE="display: none;">');
	document.write('<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%" CLASS="OTbl" HEIGHT="' + 106 + '">');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" class="cdFeedbackWizLabel">');
	document.write('			<SPAN CLASS="OLbl" STYLE="display: none;" ID="divFeedbackPanel2Sub1">' + strP2QYes + '</SPAN>');
	document.write('			<SPAN CLASS="OLbl" STYLE="display: none;" ID="divFeedbackPanel2Sub2">' + strP2QNo + '</SPAN>');
	document.write('			<SPAN CLASS="OLbl" STYLE="display: block;" ID="divFeedbackPanel2Sub3">' + strP2QDontKnow + '</SPAN>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" STYLE="height: 4em;">');
	document.write('			<TEXTAREA CLASS="cdOTBM" ROWS="3" COLS="36" ID="tbFeedbackText" style="width:' + strSmallerWidth + '" ');
	document.write('				TITLE="' + strP1Question.replace('\"', '&quot;') + '"');
	document.write('				ONFOCUS="FeedbackWizUpdateCounter();" ');
	document.write('				ONCHANGE="FeedbackWizUpdateCounter();" ');
	document.write('				ONPASTE="FeedbackWizUpdateCounterDelay();" ');
	document.write('				ONKEYUP="FeedbackWizUpdateCounter();">');
	document.write(				'</TEXTAREA>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" STYLE="padding: 2px 0px 4px 0px;">');
	document.write('			<TABLE VALIGN="top" CLASS="OTbl" BORDER="0" CELLPADDING="0" CELLSPACING="0">');
	document.write('				<TR>');
	document.write('					<TD VALIGN="top" WIDTH="100%"><SPAN ID="spnFeedbackCounter"></SPAN></TD>');
	document.write('					<TD VALIGN="top" NOWRAP="true">');
	document.write('						<INPUT CLASS="cdOBtn FeedbackWizButton" TYPE="button" ID="btnFeedbackWizBack" ');
	document.write(								'VALUE="' + strP2Back + '" ONCLICK="javascript:FeedbackWizShowPane(1, -1);"/>&nbsp;');
	document.write('						<INPUT CLASS="cdOBtn FeedbackWizButton" TYPE="button" ID="btnFeedbackWizSubmit" ');
	document.write(								'VALUE="' + strP2Submit + '" ONCLICK="FeedbackWizDoSubmitAsst(-1, true);"/>');
	document.write('					</TD>');
	document.write('				</TR>');
	document.write('			</TABLE>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('</TABLE>');
	document.write('</DIV>');

	document.write('<DIV ID="divFeedbackPanel3" CLASS="FeedbackWizCell" STYLE="display: none;">');
	document.write('<TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" CLASS="OTbl" HEIGHT="' + 106 + '">');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" class="cdFeedbackWizLabel">');
	document.write('			<SPAN CLASS="OLbl">' + strP3Label + '</SPAN>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('</TABLE>');
	document.write('</DIV>');

	document.write('<DIV ID="divFeedbackPanel4" CLASS="FeedbackWizCell" STYLE="display: none;">');
	document.write('<TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" CLASS="OTbl" HEIGHT="' + 106 + '">');
	document.write('	<TR>');
	document.write('		<TD VALIGN="top" class="cdFeedbackWizLabel">');
	document.write('			<SPAN CLASS="OLbl">' + strP4Label + '</SPAN>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR>');
	document.write('		<TD>');
	document.write('			<SPAN><A HREF="javascript:FeedbackWizShowPane(1, -1);" CLASS="OAnc">' + strP4ChangeMyFeedback + '</A></SPAN>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR>');
	document.write('		<TD STYLE="padding-top: 8px;">');
	document.write('			<SPAN>' + strP4ThankYou + '</SPAN>');
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR><TD HEIGHT="6"><SPAN/></TD></TR>');
	document.write('	<TR>');
	document.write('		<TD WIDTH="100%">');
	document.write(				strP4ContactUsCellText);
	document.write('		</TD>');
	document.write('	</TR>');
	document.write('	<TR>');
	document.write('		<TD HEIGHT="100%"/>');
	document.write('	</TR>');
	document.write('</TABLE>');
	document.write('</DIV>');

	document.write('</TD></TR></TABLE>');
}

function GetCookie(tName, DefaultReturn)
{
	if ("undefined" == typeof(DefaultReturn))
		DefaultReturn = "";

	var tArg = tName + "=";
	var nArgLen = tArg.length;
	var nCookieLen = document.cookie.length;
	var nStartPos = 0;

	while (nStartPos < nCookieLen)
		{
		var nEndPos = nStartPos + nArgLen;

		if (document.cookie.substring(nStartPos, nEndPos) == tArg)
			{
			var n2EndPos = document.cookie.indexOf(";", nEndPos);
			if (n2EndPos == -1)
				{
				n2EndPos = document.cookie.length;
				}
			return unescape(document.cookie.substring(nEndPos, n2EndPos));
			}

		nStartPos = document.cookie.indexOf(" ", nStartPos) + 1;
		if (nStartPos == 0)
			break;
		}

	return DefaultReturn;
}

function SetPersistentCookie(szName, szValue)
{
	var dateNow = new Date();
	var dateExpire = new Date();
	dateExpire.setTime(dateNow.getTime() + 1000 * 60 * 60 * 24 * 365);
	mSetCookie(szName, szValue, false, dateExpire);

	return;
}

function FIsVariableInCookie(szName, DefaultValue)
{
	if ("undefined" == typeof(DefaultValue))
		DefaultValue = "";

	return (DefaultValue != GetCookie(szName, DefaultValue));
}

function mSetCookie(tName, vValue)
{
	var aArgs = mSetCookie.arguments;
	var nArgs = mSetCookie.arguments.length;
	var bAppendToCurrentCookie = (nArgs > 2) ? aArgs[2] : false;
	var expires = (nArgs > 3) ? aArgs[3] : null;
	var path = (nArgs > 4) ? aArgs[4] : "/";
	var domain = (nArgs > 5) ? aArgs[5] : null;
	var secure = (nArgs > 6) ? aArgs[6] : false;

	if (bAppendToCurrentCookie && "" != GetCookie(tName))
		vValue = GetCookie(tName) + "," + vValue;

	document.cookie = tName + "=" + vValue +
		((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
		((path == null) ? "" : ("; path=" + path)) +
		((domain == null) ? "" : ("; domain=" + domain)) +
		((secure == true) ? "; secure" : "");

	return;
}

function StrGetCookie(tName)
{
	return GetCookie(tName, "na");
}

function mDeleteCookie(tName)
{
	var exp = new Date();
	exp.setDate (exp.getDate() -10);
	mSetCookie(tName, "", false, exp);
}

var gstrOneShotCookie;

function GetOneShotCookie()
{
	if ("undefined" == typeof(gstrOneShotCookie))
	{
		gstrOneShotCookie = GetCookie("awsval", "");
		mDeleteCookie("awsval");
	}

	if (typeof(gstrOneShotCookie) == "undefined" || null == gstrOneShotCookie)
		gstrOneShotCookie = "";

	return gstrOneShotCookie;
}

function StrGetArgumentValue(strQueryName)
{
	var reQuery = new RegExp("[\\?&]" + strQueryName + "=([^&]*)", "i");

	if (!reQuery.test(location))
		return null;

	return reQuery.exec(location)[0].substring(strQueryName.length + 2);
}

function Rollover(normal, high, ratedOn, ratedOff)
{
	this.normal = new Image();
	this.normal.src = normal;
	this.high = new Image();
	this.high.src = high;
	this.ratedOn = new Image();
	this.ratedOn.src = ratedOn;
	this.ratedOff = new Image();
	this.ratedOff.src = ratedOff;
}

var m_wndwProgress = null;
var m_Downloading = false;

function StrDisplayTitle()
{
	if ("undefined" == typeof(m_strDisplayTitle))
		return "?";

	return m_strDisplayTitle;
}

function StrDownloadDetails()
{
	if ("undefined" == typeof(m_strDownloadDetails))
		return "";

	return (null == m_strDownloadDetails ? "" : m_strDownloadDetails);
}

function FIsDownloading()
{
	if ("undefined" == typeof(m_Downloading))
		return false;

	return m_Downloading;
}

function OpenProgressWindow()
{
	m_Downloading = true;
	m_wndwProgress = window.open("/templates/progress.aspx", "idProgressWindow", "height=134,width=294");
	if (null != m_wndwProgress)
		m_wndwProgress.focus();

	return;
}

function CloseProgressWindow()
{
	m_Downloading = false;

	if (null != m_wndwProgress && !m_wndwProgress.closed && "undefined" != typeof(m_wndwProgress.Finish))
		m_wndwProgress.Finish();

	return;
}

function FOnProgress(iProgress, iGoal)
{
	if (null != m_wndwProgress && "undefined" != typeof(m_wndwProgress) && "undefined" != typeof(m_wndwProgress.DoProgress))
		return m_wndwProgress.DoProgress(iProgress, iGoal);

	return true;
}

function GotoDirectDownloadURLTemplates(iResult)
{
	var strLocation;

	strLocation  = "/templates/directdownload.aspx?AssetID=" + m_strAsset +
		"&Application=" + m_strApp +
		"&Result=" + iResult +
		"&Version=" + m_iVersion;

	var strAxVer = GetCookie(strAxPermCookie);
	if ("undefined" != strAxVer && null != strAxVer && strAxVer.length > 0)
	{
		strLocation += "&axver=";
		strLocation += StrEncodeUrlComponent(strAxVer);
	}

	if ("undefined" != typeof(m_strQuery) && 0 != m_strQuery.length)
		strLocation += "&QueryID=" + m_strQuery;

	window.location.href = strLocation;

    	return;
}

function OnComplete(iResult)
{

	CloseProgressWindow();

	if (fInstallingActiveX)
		return;

	if (1 == iResult && !fSupportsActiveX)
		iResult = 2;

	if (0 != iResult && 18 != iResult)
		GotoDirectDownloadURLTemplates(iResult);

	return;
}

function FCheckOfficeRestriction(iRes)
{

	UpdateOfficeRestrictionsCookie(false);

	if (typeof(iRes) == 'undefined' || !(iRes >= 0 && iRes <= 6))
		return false;

	var strRes = StrGetOfficeRestrictionsCookie();

	if (typeof(strRes) == 'undefined' || null == strRes || iRes >= strRes.length)
		return false;

	return '1' == strRes.charAt(iRes);
}

function FRedirectIfOfficeRestriction(iRes)
{
	if (!FCheckOfficeRestriction(iRes))
		return false;

	var strSite = "";
	var strResult = "";

	if (0 == iRes) 
		{
		strResult = "20"; 
		}
	else if (1 == iRes) 
		{
		strSite = "TC";
		strResult = "21"; 
		}
	else if (2 == iRes) 
		{
		strSite = "RC";
		strResult = "22"; 
		}
	else if (3 == iRes) 
		{
		strSite = "TC";
		strResult = "23"; 
		}
	else if (5 == iRes) 
		{
		strResult = "25"; 
		}
	else if (6 == iRes) 
		{
		strResult = "26"; 
		}
	else
		{
		return false;
		}

	var strNewHREF = "/templates/directdownload.aspx?result=" + strResult;
	if (null != strSite && strSite.length > 0)
	{
		strNewHREF += "&site=";
		strNewHREF += strSite;
	}

	window.location.href = strNewHREF;

	return true;
}

function StartEditTemplate()
{
	var fIsCSC = false;
	if (arguments.length > 0)
	{
		fIsCSC = arguments[0];
	}
	else if (typeof(g_fIsCSC) != "undefined")
	{
		fIsCSC = g_fIsCSC;
	}

	if (FRedirectIfOfficeRestriction(1))
		return;

	if (fIsCSC && FRedirectIfOfficeRestriction(3))
		return;

	var rgstrApp;

	if (null != m_strApp)
	{
		rgstrApp = m_strApp.split(",");
		for (var i=0; i < rgstrApp.length; i++)
		{
			m_strApp = StrTrim(rgstrApp[i]);
			if (null != m_strApp && m_strApp.length > 0)
				break;

			m_strApp = null;
		}
	}

	if (null == m_strApp)
	{
		OnComplete(5); 
		return;
	}

	if (m_strApp == "IP")
	{
		m_strApp = "XD";
	}

	if (typeof(m_fAcceptedTOU) == "undefined")
		m_fAcceptedTOU = false;

	if (typeof(m_fAcceptedCSTTOU) == "undefined")
		m_fAcceptedCSTTOU = false;

	if (((fIsCSC && !m_fAcceptedCSTTOU) || (!fIsCSC && !m_fAcceptedTOU)) && m_strTouUrl.length != 0)
	{

		mSetCookie("AWS_CheckingEULA_Sess", "1");
		window.location.href = m_strTouUrl;
		return;
	}

	if(!FInstallActiveX())
	{
		if (FIsSupportedWindows())
			OnComplete(1); 
		else
			OnComplete(14); 

		return;
	}

	if (fIsCSC && !FActiveXSupportsStartEditEx())
	{

		OnComplete(2); 
		return;
	}

	OpenProgressWindow();

	if (null == m_strAsset)
		m_strAsset = "";

	var iResult = FActiveXSupportsStartEditEx() ?
		DCTRL.StartEditEx(
			m_strDisplayTitle,
			m_strAsset.toUpperCase(),
			"",
			m_strApp,
			m_strMetric,
			m_iVersion,
			fIsCSC) :
		DCTRL.StartEdit(
			m_strDisplayTitle,
			m_strAsset.toUpperCase(),
			"",
			m_strApp,
			m_strMetric,
			m_iVersion);

	OnComplete(iResult);

	if (iResult == 0)
	{
		dcsOO("WT.ti",m_strDisplayTitle,"WT.si_p","t_dl","DCSext.oo_tcr",(fIsCSC)?"cst":"ms");
	}

	return;
}

function ResizeClientArea(iClientWidth, iClientHeight)
{
	if (null != iClientWidth && null != iClientHeight &&
		!isNaN(iClientWidth) && !isNaN(iClientHeight) && 
		iClientWidth > 0 && iClientHeight > 0)
		{
		var iResizeWidthBy = 0;
		var iResizeHeightBy = 0;

		for (var i=0; i < 3; i++)
			{
			iResizeWidthBy = iClientWidth - document.body.clientWidth;
			iResizeHeightBy = iClientHeight - document.body.clientHeight;
			window.resizeBy(iResizeWidthBy, iResizeHeightBy);
			}
		}
}

function InsertMediaPlayerForTheVideoPage()
{
	document.write(
		"<object " +
			"classid='clsid:6bf52a52-394a-11d3-b153-00c04f79faa6' " +
			"id='objMediaPlayer' " +
			"name='objMediaPlayer' " +
			"width='400' " +
			"height='308' " +
			"border='0' " +
			"type='application/x-oleobject'>" +
			"<param name='enablecontextmenu' value='false'/>" +
			"<param name='autostart' value='false'/>" +
			"<param name='stretchtofit' value='true'/>" +
		"</object>");
}

function ObjGetVersionDetector()
{
	var objVersionDetector = {
		fPlugInSupported: false,
		fIsIE5AndAbove: false,
		fIsFireFox1_5AndAbove: false
	};

	var strUserAgent = navigator.userAgent.toLowerCase();
	var strAppVersion = navigator.appVersion.toLowerCase();
	var nBrowserMajorVersion;
	var nBrowserMinorVersion;

	if ((strUserAgent.indexOf("win") != -1) && (strUserAgent.indexOf("mac") == -1))
	{
		var iIEPositionInAppVersion = strAppVersion.indexOf("msie");
		var iFirefoxPositionInUserAgent = strUserAgent.indexOf("firefox");

		if ((iIEPositionInAppVersion != -1) && (strUserAgent.indexOf("opera") == -1))
		{
			nBrowserMajorVersion = parseInt(strAppVersion.substring(iIEPositionInAppVersion + 5,
														strAppVersion.indexOf(';', iIEPositionInAppVersion)));

			if (!isNaN(nBrowserMajorVersion) && nBrowserMajorVersion >= 5)
			{
				objVersionDetector.fIsIE5AndAbove = true;

				for(var iPlugInVersion = 12; iPlugInVersion >= 7; iPlugInVersion--)
				{
					try
					{
						var flash = new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + iPlugInVersion);
						objVersionDetector.fPlugInSupported = true;
						break;
					}
					catch(e)
					{
					}
				}
			}
		}

		else if (iFirefoxPositionInUserAgent != 1)
		{
			nBrowserMajorVersion = parseInt(strUserAgent.substring(iFirefoxPositionInUserAgent + 8));
			nBrowserMinorVersion = parseInt(strUserAgent.substring(iFirefoxPositionInUserAgent + 10));

			if ((!isNaN(nBrowserMajorVersion)) && (nBrowserMajorVersion >= 2) ||
				((!isNaN(nBrowserMajorVersion)) && (nBrowserMajorVersion >= 1) &&
				 (!isNaN(nBrowserMinorVersion)) && (nBrowserMinorVersion >= 5)))
			{
				objVersionDetector.fIsFireFox1_5AndAbove = true;

				if (navigator.plugins &&
					((navigator.plugins["Shockwave Flash 2.0"] != null) ||
					 (navigator.plugins["Shockwave Flash"] != null)))
				{
					var strPlugInDescription;
					if (navigator.plugins["Shockwave Flash 2.0"] != null)
						strPlugInDescription = navigator.plugins["Shockwave Flash 2.0"].description;
					else
						strPlugInDescription = navigator.plugins["Shockwave Flash"].description;

					var arrPlugInDescription = strPlugInDescription.split(" ");
					var nPlugInMajorVersion = parseInt(arrPlugInDescription[2], 0);
					if ((!isNaN(nPlugInMajorVersion)) && (nPlugInMajorVersion >= 7))
						objVersionDetector.fPlugInSupported = true;
				}
			}
		}
	}

	return objVersionDetector;
}

function InsertFlash(nControlWidth, nControlHeight, strFlashAssetId, strStaticImageId,
	strSrcAssetId, strManifestAssetId, strAlt, strImageUrl, strDivId)
{
	var strFlashUrl = '/global/images/default.aspx?assetid=' + strFlashAssetId;
	var strArguments = 'strManifestAssetId=' + strManifestAssetId + '&strAssetId=' + strSrcAssetId;
	var objVersionDetector = ObjGetVersionDetector();

	if (!objVersionDetector.fPlugInSupported)
	{
		document.write('<a href="');
		document.write(strImageUrl);
		document.write('">');
		document.write('<img border="0" src="');
		document.write('/global/images/default.aspx?assetid=' + strStaticImageId);
		document.write('" alt="')
		document.write(StrXMLEncode(strAlt));
		document.write('" title="')
		document.write(StrXMLEncode(strAlt));
		document.write('"/>');
		document.write('</a>');

		var flashWindowOnload = window.onload;
		window.onload = function() {
			if (flashWindowOnload)
			{
				flashWindowOnload();
			}

			var divSplash = document.getElementById("cntFlashTitle");
			if (divSplash != null)
			{
				divSplash.style.display = "block";
			}
		}
		return;
	}

	document.write('<div id="');
	document.write(strDivId);
	document.write('">');

	if (objVersionDetector.fIsIE5AndAbove)
	{
		document.writeln('<OBJECT CLASSID="CLSID:D27CDB6E-AE6D-11CF-96B8-444553540000" ID="objFlashPlayer" ' +
			'WIDTH="' + nControlWidth + '" ' +
			'HEIGHT="' + nControlHeight + '" ' +
			'BORDER="0" ' +
			'CODEBASE="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0">');
		document.writeln('<PARAM NAME="movie" VALUE="' + strFlashUrl + '"/>');
		document.writeln('<PARAM NAME="menu" VALUE="true"/>');
		document.writeln('<PARAM NAME="quality" VALUE="high"/>');
		document.writeln('<PARAM NAME="FlashVars" VALUE="' + strArguments + '"/>');
		document.writeln('<PARAM NAME="wmode" VALUE="transparent"/>');
		document.writeln('</OBJECT>');
	}

	else
	{
		document.writeln('<EMBED ' +
			'ID="objFlashPlayer" ' +
			'SRC="' + strFlashUrl + '" ' +
			'MENU="true" ' +
			'QUALITY="high" ' +
			'WIDTH="' + nControlWidth + '" ' +
			'HEIGHT="' + nControlHeight + '" ' +
			'TYPE="application/x-shockwave-flash" ' +
			'FLASHVARS="' + strArguments + '" ' +
			'WMODE="transparent" ' +
			'PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">');
		document.writeln('</EMBED>');
	}

	document.write('</div>');
}

function CreateVideoPage(strLTRorRTL,
	iControlWidth, iControlHeight,
	strErrWMPNotInstalled, strErrFlashNotInstalled)
{
	var fIsNetscape = (-1 != window.navigator.appName.toUpperCase().indexOf("NETSCAPE"));
	var fIsOther = false; 
	var fIsMPlayer = false; 

	var strUrl = GetOneShotCookie(); 
	if (strUrl.length < 2)
		strUrl = "o:";

	var strType = strUrl.substring(0, 2);
	if (strType == "o:")
	{
		fIsOther = true;
		strUrl = "";
	}
	else
	{
		strUrl = decodeURI(strUrl.substring(2));
		if (strType == "m:")
			fIsMPlayer = true;
	}

	document.writeln('<BODY ' +
		'MARGINHEIGHT="0" ' +
		'MARGINWIDTH="0" ' +
		'LEFTMARGIN="0" ' +
		'RIGHTMARGIN="0" ' +
		'TOPMARGIN="0" ' +
		'BOTTOMMARGIN="0" ' +
		'CLASS="cdONBody" ' +
		(fIsNetscape ? '' : 'SCROLL="auto" ') +
		strLTRorRTL + '>');

	if (!fIsOther)
		{
		if (fIsMPlayer)
			{
			if (!fIsNetscape)
				{
				document.writeln('<OBJECT CLASSID="CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6" ID="objMediaPlayer" ' +
					'WIDTH="' + iControlWidth + '" ' +
					'HEIGHT="' + iControlHeight + '" ' +
					'BORDER="0">');

				document.writeln('<PARAM NAME="URL" VALUE="' + strUrl + '"/>');
				document.writeln('<PARAM NAME="ENABLECONTEXTMENU" VALUE="true"/>');
				document.writeln('<PARAM NAME="AUTOSTART" VALUE="true"/>');
				document.writeln('<PARAM NAME="STRETCHTOFIT" VALUE="true"/>');

				document.writeln('</OBJECT>');
				}
			else
				{
				document.writeln('<EMBED TYPE="application/x-mplayer2" ' +
					'PLUGINSPAGE = "http://www.microsoft.com/Windows/MediaPlayer/" ' +
					'SRC="' + strUrl + '" ' +
					'ID="objMediaPlayer" ' +
					'WIDTH="' + iControlWidth + '" ' +
					'HEIGHT="' + iControlHeight + '" ' +
					'AUTOSTART="true" ' +
					'UIMODE="mini" ' +
					'STRETCHTOFIT="true" ' +
					'SHOWAUDIOCONTROLS="true" ' +
					'SHOWPOSITIONCONTROLS="true">');
				document.write('</EMBED>');
				}
			}
		else
			{
			if (!fIsNetscape)
				{
				document.writeln('<OBJECT CLASSID="CLSID:D27CDB6E-AE6D-11CF-96B8-444553540000" ID="objFlashPlayer" ' +
					'WIDTH="' + iControlWidth + '" ' +
					'HEIGHT="' + iControlHeight + '" ' +
					'BORDER="0" ' +
					'CODEBASE="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0">');
				document.writeln('<PARAM NAME="movie" VALUE="' + strUrl + '"/>');
				document.writeln('<PARAM NAME="menu" VALUE="true"/>');
				document.writeln('<PARAM NAME="quality" VALUE="high"/>');
				document.writeln('</OBJECT>');
				}
			else
				{
				document.writeln('<EMBED ' +
					'ID="objFlashPlayer" ' +
					'SRC="' + strUrl + '" ' +
					'MENU="true" ' +
					'QUALITY="high" ' +
					'WIDTH="' + iControlWidth + '" ' +
					'HEIGHT="' + iControlHeight + '" ' +
					'TYPE="application/x-shockwave-flash" ' +
					'PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer">');
				document.writeln('</EMBED>');
				}
			}
		}

	if (!fIsOther)
		{
		if (fIsMPlayer)
			{
			var fIsInstalled = false;

			if (!fIsNetscape)
				{
				fIsInstalled = ((typeof(objMediaPlayer) != "undefined") &&
					(typeof(objMediaPlayer.url) != "undefined"));
				}
			else
				{
				fIsInstalled = ((null != document.body.getElementsByTagName("EMBED")["objMediaPlayer"]) &&
					(typeof(document.body.getElementsByTagName("EMBED")["objMediaPlayer"]) != "undefined") &&
					(typeof(document.body.getElementsByTagName("EMBED")["objMediaPlayer"].src) != "undefined"));
				}

			if (!fIsInstalled)
				{
				alert(strErrWMPNotInstalled);
				}
			}
		else
			{
			var fIsInstalled = false;

			if (!fIsNetscape)
				{
				fIsInstalled = ((typeof(objFlashPlayer) != "undefined") &&
					(typeof(objFlashPlayer.movie) != "undefined"));
				}
			else
				{
				fIsInstalled = ((null != document.body.getElementsByTagName("EMBED")["objFlashPlayer"]) &&
					(typeof(document.body.getElementsByTagName("EMBED")["objFlashPlayer"]) != "undefined") &&
					(typeof(document.body.getElementsByTagName("EMBED")["objFlashPlayer"].src) != "undefined"));
				}

			if (!fIsInstalled)
				{
				alert(strErrFlashNotInstalled);
				}
			}
		}

	ResizeClientArea(iControlWidth, iControlHeight);
}

function CloseVideoPageBody()
{
	document.writeln('</BODY>');
}

function StrGetParamFromUrl(strUrl, strParam)
{
	var iStart = strUrl.indexOf("?" + strParam + "=");
	if (iStart < 0)
		iStart = strUrl.indexOf("&" + strParam + "=");
	if (iStart < 0)
		return null;

	iStart += strParam.length + 2;
	var iEnd = strUrl.indexOf("&", iStart+1);
	if (iEnd <= iStart)
		iEnd = strUrl.length;

	return strUrl.substring(iStart, iEnd);
}

function OpenVideo(url, width, height)
{
	if (FIsMac())
		{
		if (url.indexOf('?') < 0)
			url += '?';
		else
			url += '&';

		url += 'IsMac=1';
		}

	var fNSorFF =
		window.navigator.appName.toUpperCase().indexOf("NETSCAPE") >= 0 ||
		window.navigator.appName.toUpperCase().indexOf("FIREFOX") >= 0;

	var strUrlUpper = url.toUpperCase();
	var strAssetId = StrGetParamFromUrl(strUrlUpper, "ASSETID");
	var fHX = (null != strAssetId && 0 == strAssetId.indexOf("HX"));

	if ((!fNSorFF || fHX) && StrGetParamFromUrl(strUrlUpper, "TYPE") == "MEDIAPLAYER") 
	{
		OpenVideoPage(
			strAssetId,
			parseInt(StrGetParamFromUrl(strUrlUpper, "STARTINDEX")),
			parseInt(StrGetParamFromUrl(strUrlUpper, "VWIDTH")),
			parseInt(StrGetParamFromUrl(strUrlUpper, "VHEIGHT")),
			StrGetParamFromUrl(strUrlUpper, "ORIGIN"));

		return;
	}

	if (-1 != window.navigator.appName.toUpperCase().indexOf("NETSCAPE"))
		{

		window.open(url, '_AsstVidWnd');
		}
	else
		{
		window.open(url, '_AsstVidWnd', 'toolbar=0,status=0,menubar=0,resizable=0,width=' + width + ',height=' + height);
		}
}

var strIsRtl = '';
var allDivsInPage = null;
var allImagesInPage = null;
var fExpandedAssistance = false;
var popupWin;

function openWindow(url, example)
{
	if (typeof(popupWin) != "object" || null == popupWin) 
		popupWin = window.open(url, example, "width=452,height=572,top=0,left=0,alwaysRaised=yes,toolbar=0,directories=0,menubar=0,status=1,resizable=yes,location=0,scrollbars=1,copyhistory=0");
	else
		{
		if (!popupWin.closed) 
			popupWin.location.href = url;
		else 
			popupWin = window.open(url, example, "width=452,height=572,top=0,left=0,alwaysRaised=yes,toolbar=0,directories=0,menubar=0,status=1,resizable=yes,location=0,scrollbars=1,copyhistory=0");
		}	  

	popupWin.focus();
}

function ExpandDiv(theDivName)
{
	InitializeGlobalData();

	if (null == theDivName || typeof(theDivName) == "undefined") return; var theDiv = allDivsInPage[theDivName]; if (null == theDiv || typeof(theDiv) == "undefined") return;
	theDiv.style.display = "block";

	var thePic = allImagesInPage[theDivName + "_img"];
	if (null != thePic && typeof(thePic) != "undefined")
		{
		thePic.src = "/global/images/default.aspx?AssetID=ZA790050011033";
		thePic.alt = strHide;
		}
}

function CollapseDiv(theDivName)
{
	InitializeGlobalData();

	if (null == theDivName || typeof(theDivName) == "undefined") return; var theDiv = allDivsInPage[theDivName]; if (null == theDiv || typeof(theDiv) == "undefined") return;
	theDiv.style.display = "none";

	var thePic = allImagesInPage[theDivName + "_img"];
	if (null != thePic && typeof(thePic) != "undefined")
		{
		thePic.src = "/global/images/default.aspx?AssetID=ZA790050001033";
		thePic.alt = strShow;
		}
}

function ToggleDiv(theDivName)
{
	InitializeGlobalData();

	if (null == theDivName || typeof(theDivName) == "undefined") return; var theDiv = allDivsInPage[theDivName]; if (null == theDiv || typeof(theDiv) == "undefined") return;

	if (theDiv.style.display.toUpperCase() != "BLOCK")
		ExpandDiv(theDivName);
	else
		CollapseDiv(theDivName);
}

function AlterAllDivs(displayStyle)
{
	InitializeGlobalData();

	if (null == allDivsInPage || typeof(allDivsInPage) == "undefined")
		return;

	if (typeof(allDivsInPage["divShowAll"]) != "undefined" &&
		typeof(allDivsInPage["divHideAll"]) != "undefined")
		{
		if (displayStyle == "block")
			{
			allDivsInPage["divShowAll"].style.display = "none";
			allDivsInPage["divHideAll"].style.display = "block";
			}
		else
			{
			allDivsInPage["divShowAll"].style.display = "block";
			allDivsInPage["divHideAll"].style.display = "none";
			}
		}

	AlterAllDivsSpans(document.body.getElementsByTagName("DIV"), displayStyle);
	AlterAllDivsSpans(document.body.getElementsByTagName("SPAN"), displayStyle);
}

function AlterAllDivsSpans(allDivsSpans, displayStyle)
{
	if (typeof(allDivsSpans) == "undefined" || null == allDivsSpans)
		return;

	for (i=0; i < allDivsSpans.length; i++)
	{
		if (typeof(allDivsSpans[i]) != "undefined" &&
			null != allDivsSpans[i] &&
			typeof(allDivsSpans[i].id) != "undefined" &&
			null != allDivsSpans[i].id &&
			allDivsSpans[i].id.length > 0)
		{
			if (0 == allDivsSpans[i].id.indexOf("divExpCollAsst_")) 
			{
				var thePic = allImagesInPage[allDivsSpans[i].id + "_img"];

				if (displayStyle == "block")
				{
					allDivsSpans[i].style.display = "block";

					if (typeof(thePic) != "undefined" && null != thePic)
					{
						thePic.src = "/global/images/default.aspx?AssetID=ZA790050011033";
						thePic.alt = strHide;
					}
				}
				else
				{
					allDivsSpans[i].style.display = "none";

					if (typeof(thePic) != "undefined" && null != thePic)
					{
						thePic.src = "/global/images/default.aspx?AssetID=ZA790050001033";
						thePic.alt = strShow;
					}
				}
			}

			if (0 == allDivsSpans[i].id.indexOf("divInlineDef_")) 
			{
				if (displayStyle == "block")
					allDivsSpans[i].style.display = "inline";
				else
					allDivsSpans[i].style.display = "none";
			}
		}
	}
}

function ToggleAllDivs()
{
	InitializeGlobalData();

	if (fExpandedAssistance)
		AlterAllDivs("none");
	else
		AlterAllDivs("block");

	fExpandedAssistance = !fExpandedAssistance;
}

function InitializeGlobalData()
{
	if ('undefined' != typeof(strRtl))
		strIsRtl = strRtl;

	var divs = document.body.getElementsByTagName("DIV");
	var spans = document.body.getElementsByTagName("SPAN");

	var countDiv = 0;
	var countSpan = 0;
	if (typeof(divs) != "undefined" && null != divs)
		countDiv = divs.length;

	if (typeof(spans) != "undefined" && null != spans)
		countSpan = spans.length;

	allDivsInPage = new Array();
	for (i=0; i < countDiv; i++)
		if (typeof(divs[i].id) != "undefined" &&
			null != divs[i].id &&
			divs[i].id.length > 0)
			allDivsInPage[divs[i].id] = divs[i];

	for (i=0; i < countSpan; i++)
		if (typeof(spans[i].id) != "undefined" &&
			null != spans[i].id &&
			spans[i].id.length > 0)
			allDivsInPage[spans[i].id] = spans[i];

	allImagesInPage = document.body.getElementsByTagName("IMG");
}

function OnSeeAlsoClicked()
{
	InitializeGlobalData();

	if (null == allDivsInPage || typeof(allDivsInPage) == "undefined")
		return;

	if (typeof(allDivsInPage["divSeeAlsoShowBullet"]) != "undefined" &&
		typeof(allDivsInPage["divSeeAlsoHideBullet"]) != "undefined")
		{
		if (allDivsInPage["divSeeAlsoShowBullet"].style.display.toUpperCase() == "INLINE")
			{
			allDivsInPage["divSeeAlso"].style.display = "block";
			allDivsInPage["divSeeAlsoShowBullet"].style.display = "none";
			allDivsInPage["divSeeAlsoHideBullet"].style.display = "inline";
			}
		else
			{
			allDivsInPage["divSeeAlso"].style.display = "none";
			allDivsInPage["divSeeAlsoShowBullet"].style.display = "inline";
			allDivsInPage["divSeeAlsoHideBullet"].style.display = "none";
			}
		}
}

var QUIZ_COOKIE_NAME = "QUIZ_DATA";

function SetQuizCookie(strName, strValue)
{
	var strQuizCookie = GetCookie(QUIZ_COOKIE_NAME);
	if (null != strQuizCookie && 0 != strQuizCookie.length)
	{
		var iStart = strQuizCookie.indexOf(strName);
		if (iStart >= 0)
		{
			var iEnd = strQuizCookie.indexOf(" ", iStart + 1);
			var strEnd = (iEnd > 0 ? strQuizCookie.substr(iEnd) : "");
			var strCookie = (strValue == null ? "" : strName + ":" + strValue);
			strQuizCookie = strQuizCookie.substr(0, iStart) + strCookie + strEnd;
		}
		else if (strValue != null)
		{
			strQuizCookie += " " + strName + ":" + strValue;
		}
	}
	else
	{
		strQuizCookie = strName + ":" + strValue;
	}
	mSetCookie(QUIZ_COOKIE_NAME, strQuizCookie);
}

function StrGetQuizCookie(strName)
{
	var strQuizCookie = GetCookie(QUIZ_COOKIE_NAME);
	if (null != strQuizCookie && 0 != strQuizCookie.length)
	{
		var iStart = strQuizCookie.indexOf(strName);
		if (iStart >= 0)
		{
			iStart = strQuizCookie.indexOf(":", iStart + 1);
			if (iStart > 0)
			{
				iStart++;
				var	iEnd = strQuizCookie.indexOf(" ", iStart + 1);
				if (iEnd == -1)
				{
					return strQuizCookie.substr(iStart);
				}
				else
				{
					return strQuizCookie.substring(iStart, iEnd);
				}
			}
		}
	}
	return "";
}

function ShowElement(name)
{
	var objElement = ElmGetPageElementQuiz(name);
	if (objElement != null)
		{
		objElement.style.display = 'inline';
		}
}

function ElmGetPageElementQuiz(strElementID)
{
	if (document.all)
		{
		return document.all[strElementID];
		}
	else if (document.getElementById)
		{
		return document.getElementById(strElementID);
		}
	else if (document.layers)
		{
		return document.MainForm.elements[strElementID];
		}
	return null;
}

function fnMail()
{
	var re;

	g_strMailToUrl = StrUpdateQuizTokens(g_strMailToUrl);

	var sUrl = location.href;
	var iEnd = sUrl.indexOf('?');
	if (iEnd > -1)
		{
		sUrl = sUrl.substr(0, iEnd);
		}

	re = /%Quiz_Url%%26/g;
	g_strMailToUrl = g_strMailToUrl.replace(re, sUrl + '?');

	location.href = StrXMLDecode(g_strMailToUrl);
}

function fnMaintainAnswer(opt)
{
	var strID = opt.id;
	var iPos = strID.indexOf('_', 0);
	var iQuestion = parseInt(strID.substring(1, iPos));
	var strAnswer = strID.substring(iPos + 1);

	g_strUserAnswers = '0' + 
		g_strUserAnswers.substring(1, iQuestion) + 
		strAnswer + 
		(iQuestion == g_iTotalQuestions ? '' : g_strUserAnswers.substring(iQuestion + 1));

	SetQuizCookie(g_strQuizID, g_strUserAnswers);
}

function SubmitAnswers()
{
	g_strUserAnswers = '1' +
		g_strUserAnswers.substring(1, g_strUserAnswers.length);
	SetQuizCookie(g_strQuizID, g_strUserAnswers);
	document.location.href = g_strQuizID + '.aspx?ctt=6&submit=1';
	return true;
}

function PreloadAnswers()
{
	var strUserAnswer = '';

	for (var i = 1; i <= g_iTotalQuestions; i++)
		{

		strUserAnswer = g_strUserAnswers.charAt(i);

		if (strUserAnswer == '0')
			{
			ShowElement('q' + i + '_Unanswered');
			}
		else
			{

			if (strUserAnswer == g_strCorrectAnswers.charAt(i))
				{
				ShowElement('q' + i + '_Correct');
				}

			else
				{
				ShowElement('q' + i + '_Incorrect');
				ShowElement('q' + i + '_' + strUserAnswer);
				}
			}
		}

	if ((g_sAvgScore != '0.0') && (g_sAvgScore != '0,0'))
		{
		ShowElement('quizMetrics');
		}
}

function PreloadQuestions()
{
	var strUserAnswer;
	var obj;

	g_strUserAnswers = StrGetQuizCookie(g_strQuizID);

	for (var i = 1; i <= g_iTotalQuestions; i++)
		{
		strUserAnswer = g_strUserAnswers.substring(i, i + 1);
		if (strUserAnswer != "0")
			{
			obj = ElmGetPageElementQuiz('q' + i + '_' + strUserAnswer);
			if (obj != null)
				{
				obj.checked = true;
				}
			}
		}
}

function StrUpdateQuizTokens(s)
{
	if (typeof(s) == 'undefined')
		return "";

	var re;

	re = /%Quiz_AvgScore%/g;
	s = s.replace(re, g_sAvgScore);

	re = /%Quiz_NumberOfScores%/g;
	s = s.replace(re, g_iTotalUsers);

	re = /%Quiz_Questions%/g;
	s = s.replace(re, g_iTotalQuestions);

	re = /%Quiz_Score%/g;
	s = s.replace(re, g_iScore);

	return s;	
}

function StrXMLEncode(s)
{
	if (typeof(s) == 'undefined')
		return "";

	s = s.replace(/&/g, "&amp;");
	s = s.replace(/>/g, "&gt;");
	s = s.replace(/</g, "&lt;");
	s = s.replace(/'/g, "&apos;");
	s = s.replace(/"/g, "&quot;");	
	return s;
}

function StrXMLDecode(s)
{
	if (typeof(s) == 'undefined')
		return "";

	var re;

	re = /&amp;/g;
	s = s.replace(re, "&");

	re = /&gt;/g;
	s = s.replace(re, ">");

	re = /&lt;/g;
	s = s.replace(re, "<");

	re = /&apos;/g;
	s = s.replace(re, "'");

	re = /&quot;/g;
	s = s.replace(re, "\"");

	return s;
}

function SetAWSPanels(strSetDivFeedbackDropDownWeb, strSetDivComment, strSetDivNewContent, strSetDivFeedbackAsset)
{
	{ allDivs["divFeedbackDropDownWeb"].style.display = strSetDivFeedbackDropDownWeb; }
	{ allDivs["divComment"].style.display = strSetDivComment; }
	{ allDivs["divNewContent"].style.display = strSetDivNewContent; }
	{ allDivs["divFeedbackAsset"].style.display = strSetDivFeedbackAsset; }
	{ allDivs["divThirdImage"].style.display = strSetDivFeedbackAsset; }
}

function SetExtraAWSPanels(strSetDivClipArtComplaint, strSetDivNewContentProduct) 
{
	{ allDivs["divClipArtComplaint"].style.display = strSetDivClipArtComplaint; }
	{ allDivs["divNewContentProductPanel"].style.display = strSetDivNewContentProduct; }
}

function SetBottomPanels(strSetDivDisclaimerPanel, strSetDivButtonPanel)
{
	{ allDivs["divDisclaimerPanel"].style.display = strSetDivDisclaimerPanel; }
	{ allDivs["divButtonPanel"].style.display = strSetDivButtonPanel; }
}

function SetPageMode(mode)
{
	{ allDivs["divDownloadsProblem"].style.display = "none"; };

	switch (mode)
		{
		case iAWSCompliment:
			SetAWSPanels("block", "block", "none", "none"); 
			SetExtraAWSPanels("none", "none");
			SetBottomPanels("block", "block"); 
		break;

		case iAWSComplaint:
			SetAWSPanels("block", "block", "none", "none"); 
			SetExtraAWSPanels("none", "none");
			SetBottomPanels("block", "block"); 
			if (iWebOfficeUpdate == allSelects["m_ddlFeedbackRegardingWeb"].selectedIndex)
				{
				{ allDivs["divDownloadsProblem"].style.display = "block"; };
				}
		break;

		case iAWSComplaint_Clipart:
			SetAWSPanels("block", "block", "none", "none"); 
			SetExtraAWSPanels("block", "none"); 
			SetBottomPanels("block", "block"); 
		break;

		case iAWSSuggestion:
			SetAWSPanels("block", "none", "block", "none"); 
			SetExtraAWSPanels("none", "none");
			SetBottomPanels("block", "block"); 
		break;

		case iAWSSuggestion_Cat:
			SetAWSPanels("block", "none", "block", "none"); 
			SetExtraAWSPanels("none", "none"); 
			SetBottomPanels("block", "block"); 
		break;

		case iAWSSuggestion_Prod:
			SetAWSPanels("block", "none", "block", "none"); 
			SetExtraAWSPanels("none", "block"); 
			SetBottomPanels("block", "block"); 
		break;

		case iAWSAsset:
			SetAWSPanels("block", "none", "none", "block"); 
			SetExtraAWSPanels("none", "none");
			SetBottomPanels("block", "block"); 
			SetStepGraphics(2);
			{ allDivs["divSecondImage"].style.display = "none"; }
			{ allDivs["divThirdImage"].style.display = "block"; }
		break;

		case iAWSNo_Bottom:
			SetAWSPanels("block", "none", "none", "none"); 
			SetExtraAWSPanels("none", "none");
			SetBottomPanels("none", "none");
		break;
		};
}

function SetStepGraphics(step)
{
	var active = "";
	var inactive = "";
	if (!fIsRTL) 
		{
		active = "/assistance/images/icon_right_arrow_active.gif";
		inactive = "/assistance/images/icon_right_arrow_inactive.gif";
		}
	else
		{
		active = "/assistance/images/icon_left_arrow_active.gif";
		inactive = "/assistance/images/icon_left_arrow_inactive.gif";
		}

	switch (step) 
		{
		case 1:
			allImages["imgFirstPanel"].src = active; allImages["imgFirstPanel"].alt = strAltTextCurrent;
			allImages["imgSecondPanel"].src = inactive; allImages["imgSecondPanel"].alt = strAltTextCompleted;
			allImages["imgThirdPanel"].src = inactive; allImages["imgThirdPanel"].alt = strAltTextCompleted;

			{ allDivs["divSecondImage"].style.display = "none"; }
			{ allDivs["divThirdImage"].style.display = "none"; }
		break;

		case 2:
			allImages["imgFirstPanel"].src = inactive; allImages["imgFirstPanel"].alt = strAltTextCompleted;
			allImages["imgSecondPanel"].src = active; allImages["imgSecondPanel"].alt = strAltTextCurrent;
			allImages["imgThirdPanel"].src = active; allImages["imgThirdPanel"].alt = strAltTextCurrent;

			{ allDivs["divSecondImage"].style.display = "block"; }
			{ allDivs["divThirdImage"].style.display = "none"; }
		break;

		case 3:
			allImages["imgFirstPanel"].src = inactive; allImages["imgFirstPanel"].alt = strAltTextCompleted;
			allImages["imgSecondPanel"].src = inactive; allImages["imgSecondPanel"].alt = strAltTextCompleted;
			allImages["imgThirdPanel"].src = active; allImages["imgThirdPanel"].alt = strAltTextCurrent;

			{ allDivs["divSecondImage"].style.display = "block"; }
			{ allDivs["divThirdImage"].style.display = "block"; }
		break;
		};
}

function Complete_Page()
{
	{ allDivs["divProvideComments_Compliment"].style.display = "none"; };
	{ allDivs["divProvideComments_Complaint"].style.display = "none"; };

	var fIsAsset = false;

	if (iWebAsset == allSelects["m_ddlFeedbackRegardingWeb"].selectedIndex)
		{
		fIsAsset = true;
		}

	if (0 == iFeedbackType)
		{

		SetPageMode(iAWSCompliment);
		SetStepGraphics(2);
		{ allDivs["divProvideComments_Compliment"].style.display = "block"; };
		}
	else if (1 == iFeedbackType)
		{

		if (allSelects["m_ddlFeedbackRegardingWeb"].selectedIndex == iWebClipart)
			SetPageMode(iAWSComplaint_Clipart);
		else
			SetPageMode(iAWSComplaint);

		SetStepGraphics(2);
		{ allDivs["divProvideComments_Complaint"].style.display = "block"; };
		}
	else if (2 == iFeedbackType)
		{
		if (!fIsAsset) 
			SetPageMode(iAWSSuggestion);
		else 
			SetPageMode(iAWSAsset);

		SetStepGraphics(2);
		if (fIsAsset)
			{
			{ allDivs["divSecondImage"].style.display = "none"; }
			{ allDivs["divThirdImage"].style.display = "block"; }
			}
		}
	else
		{

		SetPageMode(iAWSNo_Bottom);
		SetStepGraphics(2);
		}
}

function StrTrim(str)
{
	if (typeof(str) == "undefined" || null == str)
		return null;

	while (str.length > 0 && str.charCodeAt(0) <= 32)
		str = str.substring(1);

	while (str.length > 0 && str.charCodeAt(str.length-1) <= 32)
		str = str.substring(0, str.length-1);

	return str;
}

function FIsCommentValid(str, err, limit, auxError)
{
	if (typeof(str) == "undefined" || null == str)
		{
		alert(err);
		return false;
		}

	str = StrTrim(str);

	if (str.length <= 0)
		{
		alert(err);
		return false;
		}

	if (limit > 0 && str.length > limit)
		{
		if (auxError.length > 0)
			alert(auxError);

		return false;
		}

	return true;
}

function FIsEmailAddressValid(strEmail)
{
	if (typeof(strEmail) == "undefined")
		return true;

	if (null == strEmail)
		return true;

	if (0 == strEmail.length)
		return true;

	for (var i=0; i < strEmail.length; i++)
		{
		if (strEmail.charCodeAt(i) > 127 )
			return false;
		}

	return true;
}

function AttemptSubmit()
{
	if ((allDivs["divFeedbackAsset"].style.display == "block"))
		if (!FIsCommentValid(allTextAreas["m_txbAssetBox"].value, strErrorDescription, 650, ""))
			return;

	if ((allDivs["divComment"].style.display == "block"))
		if (!FIsCommentValid(allTextAreas["m_txbCommentBox"].value, strErrorDescription, 650, ""))
			return;

	if ((allDivs["divNewContent"].style.display == "block"))
		{
		if (!FIsCommentValid(allTextAreas["m_txbNewContentDescribe"].value, strErrorDescription, 650, ""))
			return;
		}

	document.forms["Form1"].submit();
}

function StrReplace(strSource, strWhat, strNew)
{
	if (typeof(strSource) == 'undefined' ||
		typeof(strWhat) == 'undefined' ||
		typeof(strNew) == 'undefined' ||
		null == strSource ||
		null == strSource ||
		null == strSource)
		{
		return strSource;
		}

	var iPos = strSource.indexOf(strWhat);
	if (iPos < 0)
		return strSource;

	return strSource.substring(0, iPos) + strNew + strSource.substring(iPos+strWhat.length);
}

function goDisplayCount(max_len, box, label, strSubmitButtonId)
{
	if ('undefined' == typeof(fDisableCounter) ||
		'undefined' == typeof(fDisableCounterFirst) ||
		'undefined' == typeof(fWasLastCountOver))
		{
		return;
		}

	var txbBox = document.getElementById(box);
	if ('undefined' == typeof(txbBox) || null == txbBox)
		return;

	var fDoCount = true;
	if (fDisableCounter)
		{
		if (fDisableCounterFirst)
			{
			document.getElementById(label).innerHTML =
				'<SPAN CLASS="FeedbackWizCounterText">' + strGoDisplayCountOK + '</SPAN>';

			fDisableCounterFirst = false;
			}

		fDoCount = false;
		}

	var strDescr = txbBox.value;
	var nLen = max_len - strDescr.length;

	var btnFeedback = null;
	var fFoundButton = false;
	if ('undefined' != typeof(strSubmitButtonId) && null != strSubmitButtonId)
		{
		btnFeedback = document.getElementById(strSubmitButtonId);
		if ('undefined' != typeof(btnFeedback) && null != btnFeedback)
			fFoundButton = true;
		}

	if (nLen >= 0) 
		{
		if (fDoCount)
			{
			document.getElementById(label).innerHTML = '<SPAN CLASS="FeedbackWizCounterText">' +
				StrReplace(strGoDisplayCountOK, '{0}', '' + nLen) + '</SPAN>';
			}
		else if (fWasLastCountOver)
			{
			document.getElementById(label).innerHTML =
				'<SPAN CLASS="FeedbackWizCounterText">' + strGoDisplayCountOK + '</SPAN>';
			}

		fWasLastCountOver = false;

		if (fFoundButton)
			{

			var fCanDisable = true;
			if ('undefined' != typeof(iFeedbackWizStarRated))
			{
				fCanDisable = (iFeedbackWizStarRated < 1 || iFeedbackWizStarRated > 5);
			}

			if (0 == strDescr.length && fCanDisable)
				btnFeedback.disabled = true;
			else
				btnFeedback.disabled = false;
			}
		}
	else
		{
		if (fDoCount)
			{
			var strError = strGoDisplayCountOver;
			strError = StrReplace(strError, '{0}',  '' + (max_len-nLen));
			strError = StrReplace(strError, '{1}',  '' + max_len);
			document.getElementById(label).innerHTML = '<SPAN CLASS="FeedbackWizCounterStar">' +
				strGoDisplayCountOverStar + '</SPAN><SPAN CLASS="FeedbackWizCounterOverText">' +
				strError + '</SPAN>';
			}
		else if (!fWasLastCountOver)
			{
			document.getElementById(label).innerHTML = '<SPAN CLASS="FeedbackWizCounterStar">' +
				strGoDisplayCountOverStar + '</SPAN><SPAN CLASS="FeedbackWizCounterOverText">' +
				strGoDisplayCountOK + '</SPAN>';
			}

		fWasLastCountOver = true;

		if (fFoundButton)
			btnFeedback.disabled = true;
		}
}

function modifyDisplayCount(nMaxLen, strTextBoxName, strSpanName)
{
	var txbBox = G(strTextBoxName);
	if (null == txbBox)
		return;

	var strDescr = txbBox.value;
	var nLen = nMaxLen - strDescr.length;
	var allSpans = document.body.getElementsByTagName("SPAN");	

	if (nLen >= 0) 
		{
		allSpans[strSpanName].className = 'OFLbl';
		allSpans[strSpanName].innerHTML = StrReplace(strGoDisplayCountOK, '{0}', '' + nLen)
		}
	else 
		{
		var strError = strGoDisplayCountOver;
		strError = StrReplace(strError, '{0}',  '' + (nMaxLen-nLen));
		strError = StrReplace(strError, '{1}',  '' + nMaxLen);
		allSpans[strSpanName].className = 'OILbl2';
		allSpans[strSpanName].innerHTML = strError;
		}	
}

function SetClipArtClientURLCookie()
{
	if (FIsMac() || null != StrGetArgumentValue("CAG"))
		mSetCookie("AWS_ClientURL_Sess", "CIL");

	return;
}

function ClipartPreviewCreateWMPControl()
{
	try
		{
		WMP7Obj = new ActiveXObject("WMPlayer.OCX.7");
		}
	catch(e)
		{

		}

	var sMediaURL = decodeURI(GetOneShotCookie());

	try
		{
		if (typeof(WMP7Obj) == "object") 
			{
			document.write('<OBJECT ID="MediaPlayer7" WIDTH="175" HEIGHT="175" CLASSID="CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6">');
			document.write('<PARAM name="url" VALUE="' + sMediaURL + '">');
			document.write('<PARAM NAME="enablecontextmenu" VALUE="false">');
			document.write('<PARAM NAME="uimode" VALUE="mini">');
			document.write('<PARAM NAME="autostart" VALUE="true">');
			document.write('</OBJECT>');
			}
		else  
			{
			document.write('<OBJECT ID="MediaPlayer6" WIDTH="200" HEIGHT="200" CLASSID="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95">');
			document.write('<PARAM name="filename" VALUE="' + sMediaURL + '">');
			document.write('<PARAM NAME="animationatstart" VALUE="true">');
			document.write('<PARAM NAME="autorewind" VALUE="true">');
			document.write('<PARAM NAME="autostart" VALUE="true">');
			document.write('<PARAM NAME="showaudiocontrols" VALUE="true">');
			document.write('<PARAM NAME="showpositioncontrols" VALUE="false">');
			document.write('<PARAM NAME="showstatusbar" VALUE="false">');
			document.write('<EMBED TYPE="application/x-mplayer2"');
			document.write('	PLUGINSPAGE = "http://www.microsoft.com/Windows/MediaPlayer/"');
			document.write('	SRC="' + sMediaURL + '"');
			document.write('	NAME="MediaPlayer1"');
			document.write('	WIDTH="200"');
			document.write('	HEIGHT="200"');
			document.write('	ANIMATIONATSTART="true"');
			document.write('	AUTOREWIND="true"');
			document.write('	AUTOSTART="true"');
			document.write('	SHOWAUDIOCONTROLS="true"');
			document.write('	SHOWPOSITIONCONTROLS="false"');
			document.write('	SHOWSTATUSBAR="true">');
			document.write('</EMBED>');
			document.write('</OBJECT>');
			}
		}
	catch(e)
		{

		}
}

function FIsMac()
{
	if (typeof(window.navigator.platform) != 'undefined')
		return (-1 != window.navigator.platform.toUpperCase().indexOf("MAC"));
	else
		return (-1 != navigator.userAgent.toUpperCase().indexOf("MAC"));
}

function SetReturnParameterValue(strReturn)
{
	strAxInstallReturnParameter = escape(strReturn);
}

function FIsSupportedWindows()
{
	return ("Win32" == navigator.platform &&
		-1 == navigator.userAgent.indexOf("Windows 95") &&
		-1 == navigator.userAgent.indexOf("Windows 98") &&
		-1 == navigator.userAgent.indexOf("Windows ME") &&
		-1 == navigator.userAgent.indexOf("Windows NT 4") &&
		-1 == navigator.userAgent.indexOf("Windows CE"));
}

function FIsCorrectVersion()
{
	var rgstrVersion;
	var rgstrReqVer;
	var iVerMajor;
	var iVerMinor;
	var iVerBuild;
	var iVerRev;

	strVersion = GetCookie(strAxPermCookie);

	if ("" == strVersion || "0" == strVersion)
		return false;

	rgstrVersion = strVersion.replace(/,/g, '.').split(".");

	iVerMajor = Number(rgstrVersion[0]);
	iVerMinor = Number(rgstrVersion[1]);
	iVerBuild = Number(rgstrVersion[2]);
	iVerRev = Number(rgstrVersion[3]);

	rgstrReqVer = strReqVersion.split(",");

	var iReqVerMajor = Number(rgstrReqVer[0]);
	var iReqVerMinor = Number(rgstrReqVer[1]);
	var iReqRevMajor = Number(rgstrReqVer[2]);
	var iReqRevMinor = Number(rgstrReqVer[3]);

	if (iVerMajor > iReqVerMajor)
		return true;

	if (iVerMajor < iReqVerMajor)
		return false;

	if (iVerMinor > iReqVerMinor)
		return true;

	if (iVerMinor < iReqVerMinor)
		return false;

	if (iVerBuild > iReqRevMajor)
		return true;

	if (iVerBuild < iReqRevMajor)
		return false;

	if (iVerRev < iReqRevMinor)
		return false;

	return true;
}

function SetActiveXInstallStatus()
{
	fIsActiveXInstalled = false;

	if (!fSupportsActiveX || fDisableActivex)
		return;

	var fIsCorrectVersion = FIsCorrectVersion();

	if (fIsCorrectVersion)
		{

		document.write('<SPAN style="display:none"><OBJECT CLASSID="clsid:' + strAxClsid + '" ID="DCTRL" WIDTH="0" HEIGHT="0"></OBJECT></SPAN>');
		fIsActiveXInstalled = FIsActiveXInstalled(strAxID);

		if (!fIsActiveXInstalled)
			SetPersistentCookie(strAxPermCookie, "0");
		}
}

function FShouldPromptForAx()
{
	return !(FIsVariableInCookie("AWS_DontPrompt_Sess") ||
		FIsVariableInCookie("AWS_DontPrompt_Perm") ||
		fDisableActivex);
}

function FIsDCTRLInstalled()
{
	return fIsActiveXInstalled;
}

function FInstallActiveX(fIgnoreCookie, wnd, fUseWndUrl)
{
	var strAxInstallStyle = "";
	if ("undefined" != typeof(strActiveXInstallStyle))
		strAxInstallStyle = strActiveXInstallStyle;

	if ("undefined" == typeof(fIgnoreCookie) || null == fIgnoreCookie)
		fIgnoreCookie = false;

	if ("undefined" == typeof(wnd) || null == wnd)
		wnd = window;

	if ("undefined" == typeof(fUseWndUrl) || null == fUseWndUrl)
		fUseWndUrl = false;

	if (!fIsActiveXInstalled &&
		!fInstallingActiveX &&
		fSupportsActiveX &&
		(fIgnoreCookie || FShouldPromptForAx()))
		{

		fInstallingActiveX = true;

		var strNewUrl = strAxInstall;
		strNewUrl = strNewUrl.replace("{0}", strAxInstallStyle);
		strNewUrl = strNewUrl.replace("{2}", strAxInstallReturnParameter);

		if (strNewUrl.indexOf('?') < 0)
			strNewUrl += '?';
		else
			strNewUrl += '&';

		strNewUrl += strAxIDName + '=' + strAxID;

		if (fUseWndUrl)
			strNewUrl = strNewUrl.replace("{1}", escape(wnd.location.pathname.slice(1) + wnd.location.search + wnd.location.hash));

		else
			strNewUrl = strNewUrl.replace("{1}", escape(document.location.pathname.slice(1) + document.location.search + wnd.location.hash));

		if (fAxVersionOverride)
		{
			if (strNewUrl.indexOf('?') < 0)
				strNewUrl += '?';
			else
				strNewUrl += '&';

			strNewUrl += "reqver=" + escape(strReqVersion);
		}

		wnd.location.href = strNewUrl;

		return false;
		}

	return fIsActiveXInstalled;
}

function StrRemoveParameterFromUrl(strUrl, strParam)
{
	var strUpperUrl = strUrl.toUpperCase();
	var strUpperParam = strParam.toUpperCase();

	var iStart = strUpperUrl.indexOf("?" + strUpperParam);
	if (iStart < 0)
		iStart = strUpperUrl.indexOf("&" + strUpperParam);

	if (iStart < 0)
		return strUrl;

	var iEnd = strUpperUrl.indexOf("&", iStart+1);

	if (iEnd < 0)
		iStart--;

	var strRet = strUrl.substring(0, iStart+1);

	if (iEnd >= 0)
		strRet += strUrl.substring(iEnd+1, strUrl.length);

	return strRet;
}

function SetDontPrompt()
{
	if (chkDontPrompt.checked)
		{
		SetPersistentCookie("AWS_DontPrompt_Perm", "1");
		}
	else
		{
		mDeleteCookie("AWS_DontPrompt_Perm");
		}
}

function FIsActiveXInstalled(strAxId)
{
	switch (strAxId)
		{
		case "1": 
			return (typeof(DCTRL) != "undefined" &&
				typeof(DCTRL.LegitCheck) != "undefined")
		default: 
			return (typeof(DCTRL) != "undefined" &&
				typeof(DCTRL.Version) != "undefined")
		}
}

function FActiveXSupportsStartEditEx()
{
	return (typeof(DCTRL) != 'undefined' && typeof(DCTRL.StartEditEx) != 'undefined');
}

function ReturnToCaller()
{
	var strReturn;
	strParameter = unescape(strQueryStringParameter);

	if (0 == strParameter.length)
		strParameter = "1";

	if (FIsActiveXInstalled(strAxID))
		mDeleteCookie("AWS_DontPrompt_Perm");
	else
		mSetCookie("AWS_DontPrompt_Sess", 1);

	strReturn = strQueryStringReturn;

	if (0 == strReturn.length)
		location.replace(".");
	else if ("{1}" == strReturn)
		history.back();
	else
		{
		var regExp = /&amp;/g;
		strReturn = strReturn.replace(regExp, "&");
		strReturn = StrRemoveParameterFromUrl(strReturn, "AxInstalled");
		strReturn += (-1 == strReturn.indexOf("?")) ? "?" : "&";
		strReturn += "AxInstalled=" + unescape(strParameter);
		strReturn = StrRemoveParameterFromUrl(strReturn, "c");
		strReturn += "&c=" + strAxID;
		location.replace("http://" + location.hostname + "/" + strReturn);
		}
}

function SetInstallStatus(strAxId)
{
	document.getElementById("divStatus").style.display = "none";
	if (FIsActiveXInstalled(strAxId))
		document.getElementById("divSuccess").style.display = "inline";
	else
		{
		document.getElementById("divFailure").style.display = "inline";
		document.getElementById("opnlRetry").style.visibility = "visible";
		document.getElementById("btnRetry").disabled = false;
		}
}

function SafePrintWindow()
{
	try
		{
		window.print();
		}
	catch(e)
		{

		}
}

function TryChapter(e)
{
	var oCNFrm = document.frmChapterNav;
	if (!oCNFrm) return false;

	var oChapter = oCNFrm.ChapterNav;
	if (!oChapter) return false;

	var nIndex = oChapter.selectedIndex;
	var strUrl = oChapter[nIndex].value;
	if (typeof(strUrl) != "undefined" &&
		null != strUrl && strUrl.length > 0)
	{
		window.location.href = strUrl;
	}
}

function SStyle(selector,style)
{
	if (window.navigator.appName.toUpperCase().indexOf("NETSCAPE") >= 0)
	{
		SStyleNetscape(selector,style);
	}
	else if (window.navigator.userAgent.toUpperCase().indexOf("OPERA") >= 0)
	{
		SStyleOpera(selector,style);
	}
	else
	{
		SStyleIE(selector,style);
	}
}

function SStyleNetscape(selector,style)
{
	var e=document.createElement('style');
	e.type='text/css';
	var h=document.getElementsByTagName('head')[0];
	h.appendChild(e);
	var s=e.sheet;
	s.insertRule(selector+' {'+style+'}',s.cssRules.length);
}

function SStyleOpera(selector,style)
{
	var e=document.createElement('style');
	e.type='text/css';
	var h=document.getElementsByTagName('head')[0];
	e.appendChild(document.createTextNode(selector+' {'+style+'}'));
	h.appendChild(e);
}

function SStyleIE(selector, style)
{
	var o=document.styleSheets[document.styleSheets.length - 1]
	o.addRule(selector,style);
}

function SStyleH(selector)
{
	SStyle(selector, 'display:none;');
}

function FixPageForPrinting()
{
	AlterAllDivs('block');
	SWdthNF('_TopHtmlTableCell');
	SWdthNF('_TopHtmlTableCellChild');
	SWdthNF('_TopTmpltHtmlTable');
	SDsplyH('_BottomHtmlRightSide');
	SDsplyH('_Ont_LeftNav_Cell');
	SDsplyH('OntTocCell');
	SDsplyH('tblRatings');
	SDsplyH('m_RightNav');
	SDsplyH('_Ont_BrowserNotice');
	SStyleH('.RightNavBackgroundNew');
	SStyleH('.BOSiblingNav');
}

function UpdateOfficeRestrictionsCookie(fCanRefresh)
{
	if (window.navigator.appName.toUpperCase().indexOf("NETSCAPE") >= 0 ||
		window.navigator.appName.toUpperCase().indexOf("FIREFOX") >= 0 ||
		window.navigator.appName.toUpperCase().indexOf("OPERA") >= 0)
		{
		return;
		}

	var strAlreadySet = "ofcresset=1"; 
	if (typeof(location) == 'undefined' || null == location ||
		typeof(location.href) == 'undefined' || null == location.href ||
		location.href.indexOf(strAlreadySet) >= 0)
		{
		return;
		}

	var strOldCookie = StrGetOfficeRestrictionsCookie();
	if (null != strOldCookie && strOldCookie.length >= 7 && '1' == StrGetCookie("_ofcresset"))
		{
		SetOfficeRestrictionsCookie(strOldCookie);
		return;
		}

	var dateNow = new Date();
	var dateExpire = new Date();
	dateExpire.setTime(dateNow.getTime() + 1000 * 60 * 60 * 24); 
	mSetCookie("_ofcresset", "1", false, dateExpire);
	if ('1' != StrGetCookie("_ofcresset"))
		{
		SetOfficeRestrictionsCookie("0000000");
		return; 
		}

	var axCtrl = null;
	var axCtrlToRemove = null;
	if (typeof(AuthzCtrl) == 'undefined' || typeof(AuthzCtrl.GetOfficeRestrictions) == 'undefined')
	{
		axCtrl = document.createElement("object");
		try
		{

			axCtrl.classid = "clsid:C9712B19-838B-45A5-ABF2-9A315DDDED50";		
		}
		catch (ex)
		{
			axCtrl = null;
		}

		if (null != axCtrl)
		{
			document.body.appendChild(axCtrl);
			axCtrlToRemove = axCtrl;
		}
	}
	else
	{
		axCtrl = AuthzCtrl;
	}

	var dwOffRes = 0;
	var fGotRes = false;
	if (typeof(axCtrl) != 'undefined' && null != axCtrl &&
		typeof(axCtrl.GetOfficeRestrictions) != 'undefined')
	{
		dwOffRes = axCtrl.GetOfficeRestrictions();
		fGotRes = true;
	}

	if (null != axCtrlToRemove &&
		(typeof(document.body.contains) == 'undefined' || document.body.contains(axCtrlToRemove)))
	{
		document.body.removeChild(axCtrlToRemove);
	}

	if (!fGotRes)
	{
		SetOfficeRestrictionsCookie("0000000");
		return;
	}

	var strCookie = "";
	for (var i=0; i < 7; i++)
		{
		if (0 != (dwOffRes & (1 << i)))
			strCookie += '1';
		else
			strCookie += '0';
		}

	SetOfficeRestrictionsCookie(strCookie);

	var strNewCookie = StrGetOfficeRestrictionsCookie();
	if (strCookie != strNewCookie)
		return; 

	if (strCookie == strOldCookie)
		return; 

	if (fCanRefresh)
	{
		var strNewLocation = location.href;

		if (strNewLocation.indexOf('?') < 0)
			strNewLocation += '?';
		else
			strNewLocation += '&';

		mSetCookie("log", "98");
		location.replace(strNewLocation + strAlreadySet);
	}
}

function SetOfficeRestrictionsCookie(strCookie)
{
	var strNewCookie = "";

	if (typeof(strCookie) != 'undefined' && null != strCookie)
		strNewCookie = strCookie;

	var dateNow = new Date();
	var dateExpire = new Date();
	dateExpire.setTime(dateNow.getTime() + 1000 * 60 * 60 * 24 * 365 * 2); 
	mSetCookie("_ofcres", strNewCookie, false, dateExpire);
}

function StrGetOfficeRestrictionsCookie()
{
	return GetCookie("_ofcres", "");
}

function OnFilterItemClick(strLevel)
{	
	SetPersistentCookie("AWS_TrustLevel", strLevel);

	strUrl = location.href;
	strUrl = StrRemoveParameterFromUrl(strUrl, 'stt');
	strUrl = StrRemoveParameterFromUrl(strUrl, 'trc');
	location.href = StrRemoveParameterFromUrl(strUrl, 'sf');
}

function OnSortItemClick(strsb)
{
	mSetCookie("AWS_SortBy", strsb);
	strUrl = location.href;
	location.href = StrRemoveParameterFromUrl(strUrl, 'stt');
}

function AppSetToggleDiv(version)
{
	var imgExp = document.getElementById("imgAppSetExp" + version.toString());
	var divExp = document.getElementById("divAppSetExp" + version.toString());

	if (typeof(imgExp) == "undefined" || null == imgExp ||
		typeof(divExp) == "undefined" || null == divExp)
	{
		return;
	}

	if (divExp.style.display != "block")
	{
		divExp.style.display = "block";
		imgExp.src = "/global/images/appset_expanded.gif";
	}
	else
	{
		divExp.style.display = "none";
		imgExp.src = "/global/images/appset_expandable" + (fIsRTL ? "_rtl" : "") + ".gif";
	}

	if (window.event != null)
			window.event.cancelBubble = true;
}

function AppSetCollapseAllDivs()
{
	for (var i=8; i <= 12; i++)
	{
		var imgExp = document.getElementById("imgAppSetExp" + i.toString());
		var divExp = document.getElementById("divAppSetExp" + i.toString());

		if (typeof(imgExp) == "undefined" || null == imgExp || 
			typeof(divExp) == "undefined" || null == divExp)
		{
			continue;
		}

		divExp.style.display = "none";
		imgExp.src = "/global/images/appset_expandable" + (fIsRTL ? "_rtl" : "") + ".gif";
	}
}

function AppSetExpandAllDivs()
{
	for (var i=8; i <= 12; i++)
	{
		var imgExp = document.getElementById("imgAppSetExp" + i.toString());
		var divExp = document.getElementById("divAppSetExp" + i.toString());

		if (typeof(imgExp) == "undefined" || null == imgExp || 
			typeof(divExp) == "undefined" || null == divExp)
		{
			continue;
		}

		divExp.style.display = "block";
		imgExp.src = "/global/images/appset_expanded.gif";
	}
}

function AppSetExpandDiv(strVersion)
{
	var imgExp = document.getElementById("imgAppSetExp" + strVersion);
	var divExp = document.getElementById("divAppSetExp" + strVersion);

	if (typeof(imgExp) != "undefined" && null != imgExp &&
		typeof(divExp) != "undefined" && null != divExp)
	{
		if (divExp.style.display != "block")
		{
			divExp.style.display = "block";
			imgExp.src = "/global/images/appset_expanded.gif";
		}
	}
}

function AppSetAutoDetect()
{
	strDetectedApps = "";

	if(!FInstallActiveX())
	{
		if (window.location.href.toLowerCase().indexOf("axinstalled=1") < 0)
		{
			mDeleteCookie("AWS_DontPrompt_Sess")
			mDeleteCookie("AWS_AXInstalled_Sess")
		}

		if(!FInstallActiveX())
			return;
	}

	if (typeof(DCTRL) == 'undefined' || typeof(DCTRL.GetInstalledVersion) == 'undefined')
		return;

	ClearDetectedAppCheckboxes();

	AppSetCollapseAllDivs();

	var strPrefix = "cbAppSet";
	var rgAppCodes = strAppCodesToDetect.split(",");
	var cFound = 0;
	for (var i=0; i < rgAppCodes.length; i++)
	{
		rgAppCodes[i] = StrTrim(rgAppCodes[i]);

		if (null == rgAppCodes[i] || 0 >= rgAppCodes[i].length)
			continue;

		var strAppCode = rgAppCodes[i];

		if (null != strAppCode && 3 == strAppCode.length && 'Z' == strAppCode.charAt(0))
			strAppCode = strAppCode.substring(1, 3);

		if ("IP" == strAppCode)
			strAppCode = "XD";

		else if ("SPD" == strAppCode)
			strAppCode = "SDR";

		var iVer = DCTRL.GetInstalledVersion(strAppCode);
		if (!(iVer >= 8 && iVer <= 12))
			continue;

		var strVer = "";
		if (iVer < 10)
			strVer += "0";
		strVer += iVer.toString();
		strVer += "0";

		var cb = document.getElementById(strPrefix + rgAppCodes[i] + strVer);
		if (typeof(cb) == 'undefined' || null == cb)
			continue;

		cb.checked = true;
		cFound++;

		strDetectedApps += rgAppCodes[i] + strVer + "-";

		AppSetExpandDiv(iVer.toString());
	}

	if (cFound <= 0)
		AppSetExpandAllDivs();

	if (strDetectedApps.length > 0 && '-' == strDetectedApps.charAt(strDetectedApps.length-1))
		strDetectedApps = strDetectedApps.substring(0, strDetectedApps.length-1);

	AppSetSetStatus(1); 
}

function ClearDetectedAppCheckboxes()
{
	var rgInputs = document.getElementsByTagName("input");
	if ("undefined" == typeof(rgInputs) || null == rgInputs || 0 >= rgInputs.length)
		return;

	var strPrefix = "cbAppSet";
	for (var i=0; i < rgInputs.length; i++)
	{
		if (null == rgInputs[i] || "undefined" == typeof(rgInputs[i].id))
			continue;

		if (0 != rgInputs[i].id.indexOf(strPrefix))
			continue;

		if (undefined == typeof(rgInputs[i].type) || null == rgInputs[i].type)
			continue;

		if ("checkbox" != rgInputs[i].type)
			continue;

		rgInputs[i].checked = false;
	}
}

function AppSetSubmitApps()
{
	var rgInputs = document.getElementsByTagName("input");
	if ("undefined" == typeof(rgInputs) || null == rgInputs || 0 >= rgInputs.length)
		return;

	var strPrefix = "cbAppSet";
	var strSelectedApps = "";

	for (var i=0; i < rgInputs.length; i++)
	{
		if (null == rgInputs[i] || "undefined" == typeof(rgInputs[i].id))
			continue;

		if (0 != rgInputs[i].id.indexOf(strPrefix))
			continue;

		if (undefined == typeof(rgInputs[i].type) || null == rgInputs[i].type)
			continue;

		if ("checkbox" != rgInputs[i].type)
			continue;

		if (!rgInputs[i].checked)
			continue;

		strSelectedApps += rgInputs[i].id.substring(strPrefix.length);
		strSelectedApps += "-";
	}

	if (strSelectedApps.length > 0 && '-' == strSelectedApps.charAt(strSelectedApps.length-1))
		strSelectedApps = strSelectedApps.substring(0, strSelectedApps.length-1);

	if (typeof(window) == 'undefined' ||
		typeof(window.location) == 'undefined' ||
		typeof(window.location.href) == 'undefined')
	{
		return;
	}

	var strNewUrl = window.location.href;
	if (strNewUrl.indexOf('?') < 0)
		strNewUrl += '?';
	else
		strNewUrl += '&';
	strNewUrl += "postback=1";

	if (strNewUrl.indexOf("prevurl=") < 0 && null != strAppSetPrevUrl)
	{
		strNewUrl += "&prevurl=";
		strNewUrl += StrEncodeUrlComponent(strAppSetPrevUrl);
	}

	if (null != strSelectedApps && strSelectedApps.length > 0)
	{
		strNewUrl += "&sapps=";
		strNewUrl += StrEncodeUrlComponent(strSelectedApps);
	}

	if (null != strDetectedApps && strDetectedApps.length > 0)
	{
		strNewUrl += "&dapps=";
		strNewUrl += StrEncodeUrlComponent(strDetectedApps);
	}

	strNewUrl += "&CTT=98"; 

	window.location.href = strNewUrl;
}

function AppSetParseCookieAndSetCheckboxes()
{
	var strApps = GetCookie("_ofcapp", "");
	if (typeof(strApps) == 'undefined' || null == strApps || strApps.length <= 0)
		return;

	AppSetCollapseAllDivs();

	var rgstrApps = strApps.toUpperCase().split('-');
	var cFound = 0;
	for (var i=0; i < rgstrApps.length; i++)
	{
		var cb = document.getElementById("cbAppSet" + rgstrApps[i]);
		if (typeof(cb) == 'undefined' || null == cb)
			continue;

		cb.checked = true;
		cFound++;

		var strVersion = rgstrApps[i];
		while (strVersion.length > 0 && ('0' > strVersion.charAt(0) || '9' < strVersion.charAt(0)))
			strVersion = strVersion.substring(1);

		if (strVersion.length >= 3)
			strVersion = strVersion.substring(0, 2);

		while (strVersion.length > 0 && '0' == strVersion.charAt(0))
			strVersion = strVersion.substring(1);

		AppSetExpandDiv(strVersion);
	}

	if (cFound <= 0)
		AppSetExpandAllDivs();
}

function AppSetSetStatus(iStatus)
{
	if (0 == iStatus) 
	{
		document.getElementById("tdStep2Label1").className = "cdAppSetStepDisabled";
		document.getElementById("tdStep2Label2").className = "cdAppSetStepDisabled";
		document.getElementById("tdStep2Story").className = "cdAppSetStepStoryDisabled";
		document.getElementById("tdStep3Label1_0").className = "cdAppSetStepDisabled";
		document.getElementById("tdStep3Label2_0").className = "cdAppSetStepDisabled";
		document.getElementById("spnStep3_1").style.display = "none";
		document.getElementById("btnAppSetSave_0").disabled = true;
		document.getElementById("spnAppList").style.display = "none";
	}
	else if (1 == iStatus) 
	{
		document.getElementById("tdStep2Label1").className = "cdAppSetStepEnabled";
		document.getElementById("tdStep2Label2").className = "cdAppSetStepEnabled";
		document.getElementById("tdStep2Story").className = "cdAppSetStepStoryEnabled";
		document.getElementById("tdStep3Label1_0").className = "cdAppSetStepEnabled";
		document.getElementById("tdStep3Label2_0").className = "cdAppSetStepEnabled";
		document.getElementById("spnStep3_1").style.display = "block";
		document.getElementById("btnAppSetSave_0").disabled = false;
		document.getElementById("spnAppList").style.display = "block";
		document.getElementById("spnLnkManual").style.visibility = "hidden";
	}
	else 
	{
		document.getElementById("tdStep2Label1").className = "cdAppSetStepEnabled";
		document.getElementById("tdStep2Label2").className = "cdAppSetStepEnabled";
		document.getElementById("tdStep2Story").className = "cdAppSetStepStoryEnabled";
		document.getElementById("tdStep3Label1_0").className = "cdAppSetStepEnabled";
		document.getElementById("tdStep3Label2_0").className = "cdAppSetStepEnabled";
		document.getElementById("spnStep3_1").style.display = "block";
		document.getElementById("btnAppSetSave_0").disabled = false;
		document.getElementById("spnAppList").style.display = "block";
	}
}

function ApplyAppScope(strAppScope)
{
	strUrl = location.href;

	strUrl = StrRemoveParameterFromUrl(strUrl, "stt");
	strUrl = StrRemoveParameterFromUrl(strUrl, "sb");
	strUrl = StrRemoveParameterFromUrl(strUrl, "av");

	if (strAppScope == null || strAppScope.length == 0)
		location.href = strUrl;
	else if (strUrl.indexOf('?') > 0)
		location.href = strUrl + "&av=" + strAppScope;
	else
		location.href = strUrl + "?av=" + strAppScope;
}

function ApplyScope(strScope)
{
	G('ddTypeFilter').disabled = true;
	strUrl = location.href;

	strUrl = StrRemoveParameterFromUrl(strUrl, "sc");
	strUrl = StrRemoveParameterFromUrl(strUrl, "CTT");
	strUrl = StrRemoveParameterFromUrl(strUrl, "Origin");
	strUrl = StrRemoveParameterFromUrl(strUrl, "PoleAssetID");
	strUrl = StrRemoveBookmarkFromUrl(strUrl);

	if (strScope == null || strScope.length == 0)
		location.href = strUrl;
	else if (strUrl.indexOf('?') > 0)
		location.href = strUrl + "&sc=" + strScope;
	else
		location.href = strUrl + "?sc=" + strScope;
}

function ApplyCategoryFilter(strCategoryID)
{
	if ("noop" == strCategoryID)
		return;

	G('ddCategoryFilter').disabled = true;

	strUrl = location.href;

	strUrl = StrRemoveParameterFromUrl(strUrl, "CategoryID");
	strUrl = StrRemoveParameterFromUrl(strUrl, "CTT");
	strUrl = StrRemoveParameterFromUrl(strUrl, "Origin");
	strUrl = StrRemoveParameterFromUrl(strUrl, "PoleAssetID");
	strUrl = StrRemoveBookmarkFromUrl(strUrl);

	if (strCategoryID == null || strCategoryID.length == 0)
		location.href = strUrl;
	else if (strUrl.indexOf('?') > 0)
		location.href = strUrl + "&CategoryID=" + strCategoryID;
	else
		location.href = strUrl + "?CategoryID=" + strCategoryID;
}

function StrRemoveBookmarkFromUrl(strUrl)
{
	var iStart = strUrl.indexOf("#");

	if (iStart < 0)
		return strUrl;

	return strUrl.substring(0, iStart);
}

function ElmGetSafeElement(strId)
{
	if (null == strId || 0 >= strId.length)
		return null;

	var element = document.getElementById(strId);
	if (typeof(element) == 'undefined')
		return null;

	return element;
}

function TabCtrlTabClick(strCtrlId, strTabId)
{
	var strLastCat = "";
	eval("strLastCat = strTabCtrlLastTopCat_" + strCtrlId + ";");

	var tdLast = ElmGetSafeElement("tdTabCtrl_" + strCtrlId + "_" + strLastCat);
	var tdLastLeft = ElmGetSafeElement("tdTabCtrlLeft_" + strCtrlId + "_" + strLastCat);
	var tdLastRight = ElmGetSafeElement("tdTabCtrlRight_" + strCtrlId + "_" + strLastCat);
	var divLast = ElmGetSafeElement("divTabCtrl_" + strCtrlId + "_" + strLastCat);
	var aLast = ElmGetSafeElement("aTabCtrl_" + strCtrlId + "_" + strLastCat);

	var tdNew = ElmGetSafeElement("tdTabCtrl_" + strCtrlId + "_" + strTabId);
	var tdNewLeft = ElmGetSafeElement("tdTabCtrlLeft_" + strCtrlId + "_" + strTabId);
	var tdNewRight = ElmGetSafeElement("tdTabCtrlRight_" + strCtrlId + "_" + strTabId);
	var divNew = ElmGetSafeElement("divTabCtrl_" + strCtrlId + "_" + strTabId);
	var aNew = ElmGetSafeElement("aTabCtrl_" + strCtrlId + "_" + strTabId);

	if (null != tdLast)
	{
		tdLast.className = "cdBCTCTabCell";
		tdLastLeft.className = "cdBCTCTabCellLeft";
		tdLastRight.className = "cdBCTCTabCellRight";
	}

	if (null != divLast)
		divLast.style.display = "none";

	if (null != aLast)
		aLast.style.cursor = "auto";

	if (null != tdNew)
	{
		tdNew.className = "cdBCTCTabCellSel";
		tdNewLeft.className = "cdBCTCTabCellSelLeft";
		tdNewRight.className = "cdBCTCTabCellSelRight";
	}

	if (null != divNew)
		divNew.style.display = "block";

	if (null != aNew)
		aNew.style.cursor = "default";

	eval("strTabCtrlLastTopCat_" + strCtrlId + " = strTabId;");
}

function LNProdSelected(strValue)
{
	if (null != strValue && strValue.length > 0)
	{
		if ('*' == strValue.charAt(0))
			window.open(strValue.substring(1, strValue.length), '_blank');
		else
			location.href = strValue;
	}
}

function DeleteChildElement(strChild)
{
	elmChild = document.getElementById(strChild);
	if ('undefined' == typeof(elmChild) || null == elmChild)
		return;

	var elmParent = elmChild.parentNode;
	if ('undefined' == typeof(elmParent) || null == elmParent)
		return;

	elmParent.removeChild(elmChild);
}

function offset(object, alignment) {
	var nOffset = 0;

	if (object == null)
		return nOffset;

	while (object.offsetParent) {
		nOffset += ((alignment == 'x') ? object.offsetLeft : object.offsetTop);
		object = object.offsetParent;
	}

	return nOffset;
}

function setNonSearchString(searchBox)
{
	if (searchBox != null && searchBox != 'undefined' && searchBox.value == '')
	{
		searchBox.value = strNonSearchString;
		setSearchOffColor(searchBox);
		fEnteredText = false;
	}
}

function setSearchOffColor(searchBox)
{
	searchBox.className = 'cdsearchbox cdSearchBoxOffColor';
}

function setSearchOnColor(searchBox)
{
	searchBox.className = 'cdsearchbox cdSearchBoxOnColor';
}

function delayedclose()
{
	fSearchFocus = false;
	window.setTimeout('searchclose()', 400);
}

function setSearchFocus()
{
	fSearchFocus = true;
}

function searchclose()
{
	var searchdrop = document.getElementById('cdsearchoutcdsdrop');
	if (searchdrop != null && searchdrop != 'undefined')
	{
		if (fSearchFocus == false)
		{
			searchdrop.style.display = 'none';
			fSearchOn = false;
		}
	}
}

function searchout()
{
	var searchdrop = document.getElementById('cdsearchoutcdsdrop');
	if (searchdrop != null && searchdrop != 'undefined' && fSearchOn == true)
	{
		searchdrop.style.display = 'none';
		fSearchOn = false;
	}
	else
	{
		var buttonleft = document.getElementById('cdsdropleft');
		var buttonmiddle = document.getElementById('cdsdrop');

		if (buttonleft != null && buttonleft != 'undefined' &&
			buttonmiddle != null && buttonmiddle != 'undefined' && 
			searchdrop != null && searchdrop != 'undefined')

		{
			var newleft = offset(buttonleft, 'x');
			var newtop = offset(buttonleft, 'y');

			searchdrop.style.display = 'none';
			searchdrop.style.position = 'absolute';

			if (fIsRTL)
			{				
				newleft = offset(buttonmiddle, 'x');
				searchdrop.style.left = newleft + 'px';
			}
			else
			{			
				searchdrop.style.left = newleft + 'px';
			}
			searchdrop.style.top = newtop + buttonmiddle.offsetHeight + 'px';

			searchdrop.style.display = 'block';

			fSearchOn = true;
		}
	}
}

function resizeSearchBox()
{
	var input = document.getElementById('frmSearch_tbQueryStr');
	var container = document.getElementById('tdSearchBox');
	if (input != null && input != 'undefined' && container != null && container != 'undefined')
	{
		var conwidth = container.offsetWidth;
		input.style.width = conwidth - 10 + 'px';

		if (input.value != strNonSearchString)
		{
			fEnteredText = true;
			setSearchOnColor(input);
		}
	}
}

function wmpCreate()
{
	try
	{
		wmp7Obj = new ActiveXObject("WMPlayer.OCX.7");
	}
	catch (e)
	{
	}

	var strAudioPath = decodeURI(GetOneShotCookie());

	if (typeof(wmp7Obj) == "object")
	{
		wmpCreateActiveX(strAudioPath);
		g_fWmp7 = true;
		wmp7 = 1;
	}
	else
	{
		wmpCreateDownLevel(strAudioPath);
		wmp6 = 1;
	}
}

function wmpCreateActiveX(strAudioPath)
{
	document.write('<object id="wmp" width="100%" classid="CLSID:6BF52A52-394A-11D3-B153-00C04F79FAA6">');
	document.write('<param name="url" value="' + strAudioPath + '">');
	document.write('<param name="uimode" value="mini">');
	document.write('<param name="enablecontextmenu" value="false">');
	document.write('<param name="autostart" value="false">');
	document.write('</object>');
}

function wmpCreateDownLevel(strAudioPath)
{
	document.write('<object id="wmpold" width="255" height="40" classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95">');
	document.write('<param name="filename" value="' + strAudioPath + '">');
	document.write('<param name="animationatstart" value="true">');
	document.write('<param name="autorewind" value="true">');
	document.write('<param name="autostart" value="false">');
	document.write('<param name="showaudiocontrols" value="true">');
	document.write('<param name="showpositioncontrols" value="false">');
	document.write('<param name="showstatusbar" value="false">')
	document.write('<embed type="application/x-mplayer2"');
	document.write('	pluginspage="http://www.microsoft.com/Windows/MediaPlayer/"');
	document.write('	src="' + strAudioPath + '"');
	document.write('	width="225"');
	document.write('	height="40"');
	document.write('	animationstart="true"');
	document.write('	autorewind="true"');
	document.write('	autostart="true"');
	document.write('	showaudiocontrols="true"');
	document.write('	showpositioncontrols="true"');
	document.write('	showstatusbar="true"');
	document.write(' />');
	document.write('</object>');
}

function wmpInitialize(rgImgCache)
{
	if (!g_fWmp7)
	{
		document.getElementById('cdWmpActiveX').style.display = "none";
		document.getElementById('cdWmpEmbedded').style.display = "block";
		return;
	}

	for (i = 0; i < rgHover.length; i++)
		cacheImage(rgImgCache, rgHover[i]);

	for (i = 0; i < rgDown.length; i++)
		cacheImage(rgImgCache, rgDown[i]);

	wmpVolumeRender();
}

function wmpPlay()
{
	document.getElementById('wmp').controls.play();
	document.getElementById('imgWmpPause').style.display = 'inline';
	document.getElementById('imgWmpPause').focus();
	document.getElementById('imgWmpPlay').style.display = 'none';
	wmpIconBtnUp('imgWmpStop', 2 );
}

function wmpPause()
{
	document.getElementById('wmp').controls.pause();
	document.getElementById('imgWmpPause').style.display = 'none';
	document.getElementById('imgWmpPlay').style.display = 'inline';
	document.getElementById('imgWmpPlay').focus();
}

function wmpStop()
{
	if (rgDownState[2 ])
		return;

	document.getElementById('wmp').controls.stop();
	wmpIconBtnDown('imgWmpStop', 2 );
	document.getElementById('imgWmpPause').style.display = 'none';
	document.getElementById('imgWmpPlay').style.display = 'inline';
}

function wmpMuteToggle()
{
	wmpMute(!rgDownState[3 ]);
}

function wmpMute(fMute)
{
	document.getElementById('wmp').settings.mute = fMute;

	if (fMute)
		wmpIconBtnDown('imgWmpMute', 3 );
	else
		wmpIconBtnUp('imgWmpMute', 3 );
}

function wmpVolumeRender()
{
	var wmp = document.getElementById('wmp');
	var volume = wmp.settings.volume / 20;
	var strImgBase = 'imgWmpVol';

	for (i = 1; i <= 5; i++)
	{
		var imgVolume = document.getElementById(strImgBase + i);

		if (i <= volume)
			imgVolume.src = "/_Services/Ont/images/wmp_vol_on.gif";
		else
			imgVolume.src = "/_Services/Ont/images/wmp_vol_off.gif";
	}
}

function wmpVolumeDown()
{
	var wmp = document.getElementById('wmp');

	volNew = wmp.settings.volume - 20;
	if (volNew < 0)
		volNew = 0;
	wmp.settings.volume = volNew;
	wmpVolumeRender();
	wmpMute(false);

	wmpIconBtnDown('imgWmpVolDown', 4 );
	setTimeout("wmpIconBtnUp('" + "imgWmpVolDown" + "'," + 4  + ");", 100);
}

function wmpVolumeUp()
{
	var wmp = document.getElementById('wmp');

	volNew = wmp.settings.volume + 20;
	if (volNew > 100)
		volNew = 100;
	wmp.settings.volume = volNew;
	wmpVolumeRender();
	wmpMute(false);

	wmpIconBtnDown('imgWmpVolUp', 5 );
	setTimeout("wmpIconBtnUp('" + "imgWmpVolUp" + "'," + 5  + ");", 100);
}

function wmpIconOver(strImg, i)
{
	if (rgDownState[i])
		return;

	ctrl = document.getElementById(strImg);
	ctrl.src = rgHover[i];
}

function wmpIconOut(strImg, i)
{
	if (rgDownState[i])
		return;

	ctrl = document.getElementById(strImg);
	ctrl.src = rgDefault[i];
}

function wmpIconBtnDown(strImg, i)
{
	if (rgDownState[i])
		return;

	ctrl = document.getElementById(strImg);
	ctrl.src = rgDown[i];
	rgDownState[i] = true;
}

function wmpIconBtnUp(strImg, i)
{
	ctrl = document.getElementById(strImg);
	ctrl.src = rgDefault[i];
	rgDownState[i] = false;
}

function cacheImage(rgImgCache, strSrc) {
	var img = new Image();
	img.src = strSrc;
	rgImgCache.push(img);
}

function tocToggle(strai, iLevel)
{
	var img = document.getElementById('img' + strai);
	var div = document.getElementById('div' + strai);
	var fVisible = div.style.display != "none";

	if (!fVisible && div.innerHTML == "")
	{

		strDiv = '<div style="';
		if (fIsRTL)
			strDiv += 'margin-right:';
		else
			strDiv += 'margin-left:';
		strDiv += '20px\">';
		strDiv += g_strUpdatingText;
		strDiv += '</div>';		
		div.innerHTML = strDiv;
		div.style.display = "block";

		xmlHttp = GetXMLHttp();
		xmlHttp.open("GET", "/search/catquery.aspx?CategoryId=" + strai, true);
		xmlHttp.onreadystatechange = function()
		{
			if (xmlHttp.readyState == 4)
				tocExpandAsync(xmlHttp.responseXML.documentElement, iLevel);
		}
		xmlHttp.send(null);
	}
	else
	{
		div.style.display = fVisible ? "none" : "block";
		img.src = fVisible ? "/global/images/plus.gif" : "/global/images/minus.gif";
	}
}

function tocExpandAsync(xd, iLevel)
{
	if (xd == null)
		return;

	rgCategories = xd.getElementsByTagName("category");

	if (rgCategories == null || rgCategories.length != 1)
		return;

	strCategory = rgCategories[0].firstChild.nodeValue;

	divCategory = document.getElementById("div" + strCategory);
	divCategory.innerHTML = tocRenderSubCategories(xd, iLevel);
	divCategory.innerHTML += tocRenderAssets(xd, iLevel);
	divCategory.style.display = "block";

	imgCategory = document.getElementById("img" + strCategory);
	imgCategory.src = "/global/images/minus.gif";
}

function tocRenderSubCategories(xd, iLevel)
{
	if (xd == null)
		return "";

	rgSubCategories = xd.getElementsByTagName("subcat");

	if (rgSubCategories.length == 0)
		return "";

	strRet = '<ul class="cdTOCCategory" style=\"';

	if (fIsRTL)
		strRet += 'margin-right:';
	else
		strRet += 'margin-left:';

	strRet += (iLevel * 15);
	strRet += 'px\">';

	for (i = 0; i < rgSubCategories.length; i++)
	{
		nnm = rgSubCategories[i].attributes;
		id = nnm.getNamedItem("id").value;
		strTitle = nnm.getNamedItem("name").value;

		strRet += '<li><nobr>';

		strRet += "<a href=\"javascript:tocToggle('";
		strRet += id;
		strRet += "',";
		strRet += (iLevel + 1);
		strRet += ");\">";

		strRet += '<img id="img';
		strRet += id;
		strRet += '" title="';
		strRet += g_strExpandoAltText;
		strRet += '" src="/global/images/plus.gif" />';
		strRet += "</a>";
		strRet += '&nbsp;&nbsp;';
		strRet += '<b><a href="';
		strRet += id;
		strRet += '.aspx" title="';
		strRet += strTitle;
		strRet += '">';
		strRet += strTitle;
		strRet += '</a></b>';
		strRet += '</nobr></li>';

		strRet += '<div id="div';
		strRet += id;
		strRet += '" style="display:none"></div>';
	}

	strRet += '</ul>';
	return strRet;
}

function tocRenderAssets(xd, iLevel)
{
	if (xd == null)
		return "";

	rgAssets = xd.getElementsByTagName("asset");
	if (rgAssets.length == 0)
		return "";

	strRet = '<ul class="cdTOCContent">';

	for (i = 0; i < rgAssets.length; i++)
	{
		nnm = rgAssets[i].attributes;
		strTitle = nnm.getNamedItem("name").value;

		strRet += '<li><nobr><a href="';
		strRet += nnm.getNamedItem("id").value;
		strRet += '.aspx" title="';
		strRet += strTitle;
		strRet += '">';
		strRet += strTitle;
		strRet += '</a></nobr></li>';
	}

	strRet += '</ul>';
	return strRet;
}

function ShowPracticeVerWarning(strOffice)
{
	var divVerWarning = document.getElementById('divVersionWarning');
	var spnVerText = document.getElementById('spnVersionText');

	if (divVerWarning == 'undefined' || spnVerText == 'undefined')
		return;

	divVerWarning.style.display = 'block';
	spnVerText.innerHTML = strOffice;
}

function ResetUser()
{
	var exp = new Date();
	exp.setDate (exp.getDate() -10);
	document.cookie = "dname=" +
		"; expires=" + exp +
		"; path=/" +
		"; domain=" + StrHostRoot();

	document.cookie = "_ofcapp=" +
		"; expires=" + exp +
		"; path=/" +
		"; domain=" + StrHostRoot();

	document.cookie = "_ofcappgrp=" +
		"; expires=" + exp +
		"; path=/" +
		"; domain=" + StrHostRoot();

	location.href = location.href;
}

function StrHostRoot()
{
	var dmn = document.location.hostname;
	var rgdmn = dmn.split(".");
	if (rgdmn.length > 3)
	{
		var i = rgdmn.length - 3;
		dmn = rgdmn[i] + "." + rgdmn[i + 1] + "." + rgdmn[i + 2];
	}
	return dmn;
}

function NSelBasketCalcSpeed()
{
	return 56;
}

function FIsMPFPrefered()
{
	return
		!("CIL" == GetCookie("AWS_DownloadMethod_Sess").toUpperCase() ||
		(0 == GetCookie("AWS_DownloadMethod_Sess").length &&
			"CIL" == GetCookie("AWS_ClientURL_Sess").toUpperCase()));
}

function OpenInNewWnd(strUrl, ctt)
{
	if (ctt >= 0)
	{
		if (strUrl.indexOf("?") < 0)
			strUrl += "?";
		else
			strUrl += "&";

		strUrl += strCurrentVideoLoggingInfo;
		strUrl += ctt.toString();
	}

	window.open(strUrl, '_blank');
}

function OpenVideoPage(strAssetID, iStartIndex, nWidth, nHeight, strOrigin)
{
	if (typeof(strAssetID) == 'undefined' || null == strAssetID ||
		typeof(iStartIndex) == 'undefined' ||
		typeof(nWidth) == 'undefined' || typeof(nHeight) == 'undefined')
	{
		return;
	}

	var fHX = (0 == strAssetID.toUpperCase().indexOf("HX"));

	if (fHX)
	{
		nWidth = 0;
		nHeight = 0;
	}

	if (isNaN(iStartIndex))
		iStartIndex = 0;

	if (isNaN(nWidth) || isNaN(nHeight))
		return;

	if (typeof(strOrigin) == 'undefined' || null == strOrigin)
		strOrigin = "";

	var fNSorFF =
		window.navigator.appName.toUpperCase().indexOf("NETSCAPE") >= 0 ||
		window.navigator.appName.toUpperCase().indexOf("FIREFOX") >= 0;

	if (fNSorFF && !fHX)
	{
		OpenVideo(
			"/assistance/asstvid.aspx" +
			"?assetid=" + strAssetID +
			"&vwidth=" + nWidth.toString() +
			"&vheight=" + nHeight.toString() +
			"&type=mediaplayer" +
			"&CTT=11" +
			"&Origin=" + strOrigin,
			nWidth, nHeight);

		return;
	}

	var strUrl = "/home/video.aspx" +
		"?assetid=" + StrEncodeUrlComponent(strAssetID) +
		"&width=" + StrEncodeUrlComponent(nWidth.toString()) +
		"&height=" + StrEncodeUrlComponent(nHeight.toString()) +
		"&startindex=" + StrEncodeUrlComponent(iStartIndex.toString()) +
		"&CTT=11" +
		"&Origin=" + StrEncodeUrlComponent(strOrigin);

	if (fNSorFF && fHX)
	{
		window.location.href = strUrl + "&asx=1";
		return;
	}

	window.open(strUrl, "_OfficeVideoWindow",
		"toolbar=0,status=0,menubar=0,resizable=1," +
		"width=756" + 
		",height=580").focus(); 
}

function RgiGetVideoControlSize(fBig, nWidth, nHeight)
{
	if (nWidth < nVideoControlBigWidthMin)
	{
		nHeight = (nHeight * nVideoControlBigWidthMin + nWidth/2) / nWidth;
		nWidth = nVideoControlBigWidthMin;
	}

	if (nHeight < nVideoControlBigHeightMin)
	{
		nWidth = (nWidth * nVideoControlBigHeightMin + nHeight/2) / nHeight;
		nHeight = nVideoControlBigHeightMin;
	}

	if (nWidth > nVideoControlBigWidthMax)
	{
		nHeight = (nHeight * nVideoControlBigWidthMax + nWidth/2) / nWidth;
		nWidth = nVideoControlBigWidthMax;
	}

	if (nHeight > nVideoControlBigHeightMax)
	{
		nWidth = (nWidth * nVideoControlBigHeightMax + nHeight/2) / nHeight;
		nHeight = nVideoControlBigHeightMax;
	}

	if (!fBig)
	{
		if (nWidth == nVideoControlBigWidth1 && nHeight == nVideoControlBigHeight1)
		{
			nWidth = nVideoControlWidth1;
			nHeight = nVideoControlHeight1;
		}
		else if (nWidth == nVideoControlBigWidth2 && nHeight == nVideoControlBigHeight2)
		{
			nWidth = nVideoControlWidth2;
			nHeight = nVideoControlHeight2;
		}
		else if (nWidth == nVideoControlBigWidth3 && nHeight == nVideoControlBigHeight3)
		{
			nWidth = nVideoControlWidth3;
			nHeight = nVideoControlHeight3;
		}
		else
		{
			nWidth = (nWidth * nVideoControlWidthMax + nVideoControlBigWidthMax/2) / nVideoControlBigWidthMax;
			nHeight = (nHeight * nVideoControlHeightMax + nVideoControlBigHeightMax/2) / nVideoControlBigHeightMax;
		}
	}

	var rgnSize = new Array(2);
	rgnSize[0] = nWidth;
	rgnSize[1] = nHeight;

	return rgnSize;
}

function ResizeVideoPage(fBig)
{
	G("trTopSmall").style.display = fBig ? "none" : "";
	G("trTopFull").style.display = fBig ? "" : "none";
	G("trLogo").style.display = fBig ? "none" : "";

	G("tdRightSide").style.display = fBig ? "none" : "";
	G("trHelpLinks").style.display = fBig ? "none" : "";
	G("trBottom").style.display = fBig ? "none" : "";
	G("tdMiddle").className = fBig ? "cdVideoPageMiddleFull" : "cdVideoPageMiddle";

	G("trButtonsSmall").style.display = fBig ? "none" : "";
	G("trButtonsFull").style.display = fBig ? "" : "none";

	G("tdVideoFrameMidRight").height = fBig ? 412 : 116;

	var trSeeAlsoHdr = G("trSeeAlsoHeader");
	if (typeof(trSeeAlsoHdr) != "undefined" && null != trSeeAlsoHdr)
	{
		trSeeAlsoHdr.style.display = fBig ? "none" : "";
		G("trSeeAlsoBody").style.display = fBig ? "none" : "";
	}

	ResizeClientArea(
		fBig ? nVideoPageBigWidth : nVideoPageSmallWidth,
		fBig ? nVideoPageBigHeight : nVideoPageSmallHeight);

	G("tdVideoControl").height =
		(fBig ? nVideoControlBigHeightMax : nVideoControlHeightMax) + 64 + 2;

	ShowOrHideReadMoreLink(fBig);
	ResizeVideoControl(fBig);
}

function ResizeVideoControl(fBig)
{
	if (iCurrentVideo >= 0)
	{
		var rgnSize = RgiGetVideoControlSize(fBig, rgnVideoWidths[iCurrentVideo], rgnVideoHeights[iCurrentVideo]);
		G("objMediaPlayer").width = rgnSize[0];
		G("objMediaPlayer").height = rgnSize[1] + 64; 
	}
	else
	{
		G("objMediaPlayer").width = nVideoControlWidthMax;
		G("objMediaPlayer").height = nVideoControlHeightMax + 64; 
	}
}

function PlayNextVideoAsset()
{
	if (iCurrentVideo+1 < cFirstSectionSize)
		PlayVideoAsset(iCurrentVideo+1);
}

function OnReadMoreAboutThisClip()
{
	OpenInNewWnd(rgstrArticleUrls[iCurrentVideo], 6);
}

function StrGetVideoAssetUrl(index)
{
	var strCookie = GetOneShotCookie();
	if (0 == strCookie.length)
		return "";
	var rgstrUrl = strCookie.split("|");
	if (rgstrUrl.length != cPlaylistSize)
		return "";
	return decodeURI(rgstrUrl[index]);
}

function PlayVideoAsset(index)
{
	if (index < 0 || index >= cPlaylistSize)
		index = 0;

	for (var i=0; i < cPlaylistSize; i++)
	{
		G("trVideoPlaylist" + i.toString()).className =
			(i == index ? "cdVideoPlaylistRowActive" : "");

		G("tdVideoPlaylist" + i.toString()).className =
			(i == index ? "cdVideoPlaylistCellActive" : "cdVideoPlaylistCell");
	}

	G("objMediaPlayer").controls.stop();
	G("objMediaPlayer").url = StrGetVideoAssetUrl(index);

	window.setTimeout("G(\"objMediaPlayer\").controls.play();", 200);

	var fBig = (G("tdRightSide").style.display == "none");
	iCurrentVideo = index;
	strCurrentVideoLoggingInfo = "Origin=" + rgstrVideoAssetIDs[iCurrentVideo] + "&CTT=";
	ShowOrHideReadMoreLink(fBig);
	ResizeVideoControl(fBig);
}

function ShowOrHideReadMoreLink(fBig)
{
	var fHasArticle = (iCurrentVideo >= 0 && rgstrArticleUrls[iCurrentVideo].length > 0);

	G("trReadMore").style.display = ((fBig || fHasArticle) ? "" : "none");
	G("tdVideoProblems").style.paddingTop = (fHasArticle ? "4px" : "0px");
}

function FOgaInstall()
{
	if (!FIsCorrectVersion() || !FIsActiveXInstalled("1"))
	{
		if (!FInstallActiveX())
		{
			if (!fInstallingActiveX)
			{

				GotoDirectDownloadURLTemplates(19)
			}
			return false;
		}

	}
	return true;
}

function SetOgaStatus(strHash)
{
	var strLegit = "99";
	try
	{
		DCTRL.HashCode = strHash;
		strLegit = DCTRL.LegitCheck();
	}
	catch(e)
	{
		;
	}

	mSetCookie("oga_status", strLegit);
}

