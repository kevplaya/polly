<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 21.
 * Time: AM 9:51
 */


define('ROOT_DIR', dirname(__FILE__));

/* default include_path */
ini_set('include_path', ROOT_DIR);

//at php 7
require_once dirname(ROOT_DIR,2).'/app/bootstrap.php';
//at php 4 or higher
//require_once dirname(dirnamt(ROOT_DIR)).'app/bootstrap';

define('ACCESS_KEY_ID','AKIAJAHHMAZVN3YBCXWA');
define('SECRET_KEY','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');

define('TWILIO_SID','ACefe0d3ec151f3e4272dad200ce21cbbc');
define('TWILIO_TOKEN','afbebd93450f50bc0a3e7465b1bf61cc');

define('TWILIO_NUMBER','827045156528');


