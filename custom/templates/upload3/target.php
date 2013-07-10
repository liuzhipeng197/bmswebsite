<?php
$filepath = "./store/";
$filepath = $filepath.basename( $_FILES['test_file']['name']);
move_uploaded_file($_FILES['test_file']['tmp_name'], $filepath);
echo "upload finish,please check your images directory!!!!";
?>
