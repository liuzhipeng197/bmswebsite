<?php
if(isset($_GET['progress_key'])) {
  $status = apc_fetch('upload_'.$_GET['progress_key']);
             $json = array(
                     'per'=>$status['current']/$status['total']*100,
                     'total'=>round($status['total']/1024),
                     'current'=>round($status['current']/1024)
                      );
 $finalStatus= json_encode($json);
 echo $finalStatus;
}
else
{
echo "You are bad man!!!";
}
?>
