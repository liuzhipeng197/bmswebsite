<?php
if(isset($_GET['progress_key'])) {
  $status = apc_fetch('upload_'.$_GET['progress_key']);
             $json = array(
                     'per'=>$status['current']/$status['total']*100,
                     'total'=>round($status['total']/1024),
                     'current'=>round($status['current']/1024)
                      );
 $finalStatus= json_encode($json);
	if($json['per']>100){
	$filepath = "../store/";
	$filepath = $filepath.basename( $_FILES['test_file']['name']);
	move_uploaded_file($_FILES['test_file']['tmp_name'], $filepath);

}
 echo $finalStatus;
}
else
{
echo "You are bad man!!!";
}
?>
