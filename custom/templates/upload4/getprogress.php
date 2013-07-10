<?php
session_start();
if(isset($_GET['progress_key'])) {

/*
    if(session_is_registered("num")){
		$_SESSION['num']++;
	}else{
		$num=0;
		session_register('num');
	}
	echo $_SESSION['num'];
*/
  $status = apc_fetch('upload_'.$_GET['progress_key']);
  echo ($status['current']/$status['total'])*100;
//  $i=0;
//  while ($i<10){
//      sleep(1);
//      $status = apc_fetch('upload_'.$_GET['progress_key']);
//      echo ($status['current']/$status['total'])*100;
//      $i++;
//  }

}
?>
