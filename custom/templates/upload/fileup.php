<?php
 
 header("Content-Type:text/html; charset=utf-8");
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
  $dirName = './storfile/';  //����ϴ��ļ��ķ��������ļ���·��
  $dirName = iconv("utf-8","gb2312//IGNORE",$dirName);  //ת���ַ����룬��������·�������
  $temp = $_FILES['myfile']['name'];
  $temp = iconv("utf-8","gb2312//IGNORE",$temp);
  $upfile = $dirName.time().$temp;
  //$upfile = $dirName.time().$_FILES['myfile']['name'];
  if(!move_uploaded_file($_FILES["myfile"]["tmp_name"], $upfile))
  {
   echo 'can not upload the files';
   exit;
  }
  $upfile = iconv("gb2312","utf-8//IGNORE",$upfile);
  echo "<p>$upfile.upload done, Thank you!</p>";
 }
?>
