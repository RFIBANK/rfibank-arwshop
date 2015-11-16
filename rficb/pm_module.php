<?php
// Copyright (c) Romanof 

 // Если файл загружен не из движка - завершаем программу
 if(! defined('SYS_LOADER')){
 die();
 }


global $engineconf, $rficb, $pmmod_conf;
$engineconf = engine_conf();
 if(! file_exists(PM_MODULES_DIR."/rficb/pmmod_conf.php")){
 die('Платежный модуль не настроен. Описание настройки этого модуля в файле '.PM_MODULES_DIR."/rficb/README.TXT");
 }
require_once(PM_MODULES_DIR."/rficb/pmmod_conf.php");
require_once(PM_MODULES_DIR."/rficb/rficb.php");
$rficb=new rficb;
$rficb->loadlng();

 switch($_GET['act']){

 case 'result':
 echo $rficb->payment_result();
 break;

 case 'fail':
 echo $rficb->payment_fail();
 break;
 
 case 'success':
 echo $rficb->payment_success();
 break;

 default:
 $order_id = get_order_id();
  if($order_id){
  echo $rficb->payment_form($order_id);
  }
 }

?>
