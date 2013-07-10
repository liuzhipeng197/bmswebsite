/**分页列表*/
/**参数：总页数,当前页号,链接参数*/
function PageListBar(pageCount,Page,parameter)
{
	var PageListBarId=0
    for(var i=0;i<=100;i++)
	{		
		if(eval("window.PageListBar"+i))
		{
			PageListBarId=i
			break
		}
	}
	if(pageCount<1){
		pageCount=1
	}
    if(parameter!="")
    {
        parameter="&"+parameter
    }

    var strHtml = "";

    var ini_PageList_Step = 5;
    var ini_PageList_Start = Page - ini_PageList_Step -1;
    var ini_PageList_End = Page + ini_PageList_Step + 1;
    
    if((Page - ini_PageList_Step)<=0){
        ini_PageList_End = ini_PageList_End -  (Page - ini_PageList_Step) + 1;
    }
    if((pageCount - Page) <= ini_PageList_Step){
        ini_PageList_Start = ini_PageList_Start - (ini_PageList_Step - (pageCount - Page)) - 1;
    }

    ini_PageList_Start = ini_PageList_Start <= 0?1:ini_PageList_Start;
    ini_PageList_End = ini_PageList_End < pageCount?ini_PageList_End:pageCount;

    if(pageCount <= 1){
        strHtml = "1";
    }else{
        for(i=ini_PageList_Start+1; i<ini_PageList_End; i++){
            if(Page == i){
                strHtml += "<strong>" + i + "</strong>";
                if(i != (ini_PageList_End-1)){
                    strHtml += "&nbsp&nbsp;";
                }
            }else{
                strHtml += "<a href=\"?Page=" + i + parameter + "\">" + i + "</a>";
                if(i != (ini_PageList_End-1)){
                    strHtml += "&nbsp&nbsp;";
                }
            }
        }
        if(Page == 1){
            strHtml = "<strong>1</strong>" + (pageCount == 2?"":"...") + strHtml;
        }else{
            strHtml = "<a href=\"?Page=1" + parameter + "\">1</a>" + (pageCount == 2?"":"...") + strHtml;
        }

        if(Page == pageCount){
            strHtml = strHtml + (pageCount == 2?"&nbsp;&nbsp;":"...") + "<strong>" + pageCount + "</strong>";
        }else{
            strHtml = strHtml + (pageCount == 2?"&nbsp;&nbsp;":"...") + "<a href=\"?Page=" + pageCount + parameter + "\">" + pageCount + "</a>";
        }
    }

    strHtml += "&nbsp&nbsp;&nbsp&nbsp;<input type=\"text\" size=\"2\" id=\"xPage"+PageListBarId+"\" name=\"PGNumber"+PageListBarId+"\" value=\""+Page+"\" />页<input type=\"button\" value=\"跳转\" onclick=\"if(1<=xPage"+PageListBarId+".value && xPage"+PageListBarId+".value<="+pageCount+"){window.location='?Page='+xPage"+PageListBarId+".value+'"+parameter+"'}\" />";
    document.write(strHtml);
}