<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 21.
 * Time: AM 10:36
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/lib/config.php';


class Twilio
{
    protected $oClient;
    public  function __construct()
    {
        $sSid = '';
        $sToken = '';
        $this->oClient = new Twilio\Rest\Client($sSid, $sToken);

    }

    public function setMessage($sReceiver,$sSender,$sText){

        $this->oClient->messages->create(

            $sReceiver,
            array(

                'from' => $sSender,
                'body' => $sText
            )
        );
    }

    public function setCall($sReceiver,$sSender,$sS3files){
        $call = $this->oClient->calls->create(
            $sReceiver,
            $sSender,
            array(
                'url' => $sS3files
            )
        );
    }
}