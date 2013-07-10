<?php
session_start();
if(isset($_GET['progress_key'])) {
 $status = apc_fetch('upload_'.$_GET['progress_key']); 
 if($status['total']!=0 && !empty($status['total'])) {
  echo json_encode($status);
 }
 else {
  echo (0);
 }
}
?> 