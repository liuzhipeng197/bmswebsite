function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
    else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
       }
        MM_reloadPage(true)
        var leftpx=document.body.offsetWidth-150;
  if (document.all)
{document.write('<span id="curscroll" style="position:absolute;width: ; height: 19px; z-index: 100; border: 1px solid #222D8C; background-color: #EFF3FE; font-size:12px;visibility:hidden"></span>');
// document.write('<span id="mainlayer" style="position:absolute;width:116px;height:15px;top:0;left:' + leftpx + ';border:0px solid black;font-size:12px;background-color:#ffffff;visibility:visible;cursor:hand" onclick="uplp()"></span>');
 //document.write('<span id="bilayer" style="position:absolute;width:116px;height:50px;top:0;left:' + leftpx + ';font-size:12px;visibility:visible"></span>');
  }
 // myload()
   function followcursor(message){
      var X,Y;
      //move cursor function for IE
          curscroll.style.left=event.clientX+document.body.scrollLeft+10
          curscroll.style.top=event.clientY+document.body.scrollTop+10
          curscroll.innerHTML=message;
          curscroll.style.visibility="visible"
      }

      function dismissmessage(){
        curscroll.style.visibility="hidden";
      }
