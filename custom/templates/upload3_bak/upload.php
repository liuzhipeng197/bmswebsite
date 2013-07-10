<script src="jquery.js" type="text/javascript"></script>
<script src="upload.js" type="text/javascript"></script>
<?php
   $unique_id = uniqid("");
?>

<form enctype="multipart/form-data" id="upload_form" action="target.php"
method="POST">
<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key"
value="<?php echo $unique_id;?>"/>
<input type="file" id="test_file" name="test_file"/><br/>
<input  type="submit" value="Upload!" onclick="startProgress('<?php echo $unique_id;?>');return true;"/>
</form>

<div id="upstatus" style="width: 500px; height: 30px; border: 0px solid ##ffffde; color:#796140;"></div>
<div id="progressouter" style="width: 500px; height: 20px; border: 3px solid #de7e00; display:none;">
<div id="progressinner" style="position: relative; height: 20px; color:#796140; background-color: #f6d095; width: 0%; "></div>
</div>
