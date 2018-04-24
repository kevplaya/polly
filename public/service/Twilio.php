<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 21.
 * Time: AM 10:36
 */

require_once dirname(__FILE__,2).'/lib/config.php';
class Twilio
{
    protected $oClient;
    public  function __construct()
    {
        $this->oClient = new Twilio\Rest\Client(TWILIO_SID, TWILIO_TOKEN);
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

        $twimlet_url = "http://twimlets.com/message?Message%5B0%5D={$sS3files}";

        $call = $this->oClient->calls->create(
            $sReceiver,
            $sSender,
            array(
                'url' => $twimlet_url
            )
        );
    }
}