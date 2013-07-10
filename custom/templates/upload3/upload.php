<script src="../../js/jquery1.4.js" type="text/javascript"></script>
<script src="../../js/upload.js" type="text/javascript"></script>
<?php
   $unique_id = uniqid("");
?>

<form enctype="multipart/form-data" id="upload_form" action="?a=up"
method="POST" target="_self">
<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key"
value="<?php echo $unique_id;?>"/>
<input type="file" id="test_file" name="test_file"/><br/>
<input  type="submit" value="Upload!" onclick="startProgress('<?php echo $unique_id;?>');return true;"/>
</form>

<div id="upstatus" style="width: 500px; height: 30px; border: 0px solid ##ffffde; color:#796140;"></div>
<div id="progressouter" style="width: 500px; height: 20px; border: 3px solid #de7e00; display:none;">
<div id="progressinner" style="position: relative; height: 20px; color:#796140; background-color: #f6d095; width: 0%; "></div>
</div>
<?php

$a=trim($_GET['a']);
if($a=='up' and isset($_POST)){
 $filepath = "./store/";
$filepath = $filepath.basename( $_FILES['test_file']['name']);
move_uploaded_file($_FILES['test_file']['tmp_name'], $filepath);
echo "<script language='javascript'> alert('upload finished');</script>";

}
?>
