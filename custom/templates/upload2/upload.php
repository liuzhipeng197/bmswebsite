<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
 if(empty($_FILES["file"]["tmp_name"])){
 echo "no file";
 die;
}
 $tmp_name = $_FILES["file"]["tmp_name"];
 $name = dirname($_SERVER['SCRIPT_FILENAME'])."/upload/".$_FILES["file"]["name"];
 move_uploaded_file($tmp_name, $name);
 echo "<p>File uploaded.</p>";
}
?>
