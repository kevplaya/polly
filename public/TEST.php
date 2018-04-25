<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 24.
 * Time: PM 7:06
 */
use BDTHelper;

$oPolly = new BDTHelper\AWS\Polly('ap-northeast-2');
$oS3 = new BDTHelper\AWS\S3('pollymp3-bdt','ap-northeast-2');
$oTwilio = new BDTHelper\Twilio();
$resultData =  $oPolly->setTextToPolly($argv[1]);

$sS3link = $oS3->putBucket(time().'-order_no.mp3',$resultData,'audio/mpeg');

$oTwilio->setCall('8201071186827',TWILIO_NUMBER,$sS3link['ObjectURL']);








