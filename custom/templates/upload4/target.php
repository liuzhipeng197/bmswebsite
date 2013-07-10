<?php  
set_time_limit(600);
if($_SERVER['REQUEST_METHOD']=='POST') {
  move_uploaded_file($_FILES["test_file"]["tmp_name"], 
  dirname($_SERVER['SCRIPT_FILENAME'])."/UploadTemp/" . $_FILES["test_file"]["name"]);
  echo "<p>File uploaded.  Thank you!</p>";
}

?>

