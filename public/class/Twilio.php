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

    public function setMessage(){

        $this->oClient->messages->create(

            '+8201071186827',
            array(

                'from' => '+8201071186827',
                'body' => 'Test SMS!'
            )
        );
    }
}