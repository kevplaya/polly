<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 21.
 * Time: AM 10:20
 */
require_once $_SERVER['DOCUMENT_ROOT'].'lib/config.php';
class Polly
{
    protected $oPolly ;
    
    public function __construct($sRegion)
    {
        $oCredential = new \Aws\Credentials\Credentials(ACCESS_KEY_ID, SECRET_KEY);
        $aClientInfo = [
            'version' => '2018–04–21'
            , 'credentials' => $oCredential
            , 'region' => $sRegion ];
        $this->oPolly = new \Aws\Polly\PollyClient($aClientInfo);
    }

    public function setTextToPolly($sText){
        $aPollyinfo = [ 'OutputFormat' => 'mp3'
            , 'Text' => $sText
            , 'TextType' => 'text'
            , 'VoiceId' => 'Seoyeon' ];
        $streamPollydata = $this->oPolly->synthesizeSpeech($aPollyinfo);
        return $streamPollydata->get('AudioStream')->getContents();
    }

}