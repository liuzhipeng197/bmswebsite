<?php
if(isset($_GET['progress_key'])) {
 $status = apc_fetch('upload_'.$_GET['progress_key']);
 if($status['total'] == 0)
 {
 $temp = 0;
 }
 else
 {
  $temp = $status['current']/$status['total']*100;
 }
 echo ceil($temp);
}
?>
