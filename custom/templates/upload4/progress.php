<?php
   $id = md5(uniqid(rand(), true));
?>
<html>
<head><title>Upload Example</title></head>
<body>

<script language="javascript">

var xmlHttp;
var proNum=0;
var loop=0;

var Try = {
  these: function() {
    var returnValue;
    for (var i = 0; i < arguments.length; i++) {
      var lambda = arguments[i];
      try {
        returnValue = lambda();
        break;
      } catch (e) {}
    }
    return returnValue;
  }
}

function createXHR(){
	return Try.these(
      function() {return new XMLHttpRequest()},
      function() {return new ActiveXObject('Msxml2.XMLHTTP')},
      function() {return new ActiveXObject('Microsoft.XMLHTTP')}
    ) || false;
}

var xmlHttp;

function sendURL() {
    xmlHttp=createXHR();
	var url="getprogress.php?progress_key=<?php echo $id;?>";
    xmlHttp.onreadystatechange = doHttpReadyStateChange;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);   
}

function doHttpReadyStateChange() {
   if (xmlHttp.readyState == 4){	
		proNum=parseInt(xmlHttp.responseText);
		document.getElementById("progressinner").style.width = proNum+"%";
		document.getElementById("showNum").innerHTML = proNum+"%";
		if ( proNum < 100){
			setTimeout("getProgress()", 100);
		}	
	}
}

function getProgress(){
	loop++;
	document.getElementById("showNum2").innerHTML = loop;
	sendURL();
}
var interval;
function startProgress(){
    document.getElementById("progressouter").style.display="block";
    setTimeout("getProgress()", 100);
}

</script>

<iframe id="theframe" name="theframe" 
        src="upload.php?id=<?php echo($id); ?>" 
        style="border: none; height: 100px; width: 400px;" > 
</iframe>
<br/><br/>

<div id="progressouter" style=
   "width: 500px; height: 20px; border: 6px solid red; display:none;">
   <div id="progressinner" style=
       "position: relative; height: 20px; background-color: purple; width: 0%; ">
   </div>
</div><div id='showNum'></div><br>
<div id='showNum2'></div>
</body>
</html>
