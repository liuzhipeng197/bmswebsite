var login = document.getElementById("login");
var yhzc = document.getElementById("yhzc");
var ul = login.getElementsByTagName("ul");
var lis = ul[0].getElementsByTagName("li");
var allspan = ul[0].getElementsByTagName("span");
var divs = login.getElementsByTagName("div");

for(var x = 1; x < 4; x++)
{show();}
function show()
{
var test = "btype" +x;
var btype = document.getElementById("btype" + x);
var as = btype.getElementsByTagName("a");
var bdivs = btype.getElementsByTagName("div");
var spans = btype.getElementsByTagName("span");
for(var i = 0; i < spans.length; i++)
{
spans[i].num = i;
spans[i].onmouseover = type;
}
function type()
{
for(var i = 0; i < lis.length; i++)
{lis[i].className = null;}
for(var i = 0; i < allspan.length; i++)
{allspan[i].id = null;}
for(var i = 0; i < divs.length; i++)
{divs[i].className = null;}

spans[this.num].id = spans[this.num].className;
bdivs[this.num].className = "block";
btype.className = "hoverli";
}
}