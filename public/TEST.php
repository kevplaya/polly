<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 24.
 * Time: PM 7:06
 */

require 'service/Polly.php';
require 'service/S3.php';

$oPolly = new Polly('ap-northeast-2');
$oS3 = new S3('pollymp3-bdt','ap-northeast-2');

$resultData =  $oPolly->setTextToPolly($argv[1]);

$oS3->putBucket(time().'-order_no.mp3',$resultData,'audio/mpeg');




