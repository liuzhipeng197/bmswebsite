<?php
 $id = uniqid(rand(), true);
?>
<html>
<script type='text/javascript' src='../../js/jquery.js'></script>
<script type='text/javascript' src='../../js/ajaxupload.js'></script>
<script type='text/javascript' src='../../js/upload.js'></script>
<body style="text-align:center;">
<h1>ÉÏ´«²âÊÔ</h1><form enctype="multipart/form-data" id="upload" method="POST">
<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key"  value="<?=$id?>" />
<input type="file" id="file" name="file" value=""/><br/><input id="submit" type="submit" value="Upload!" />
</form>

<div id="progressouter" style="width: 500px; height: 20px; border: 1px solid black; display:none;">
 <div id="progressinner" style="position: relative; height: 20px; background-color: red; width: 0%; ">
 </div>
</div>
<br />
<div id='showNum'></div><br>
<div id='showInfo'></div><br>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
 form_submit();
});
</script>
