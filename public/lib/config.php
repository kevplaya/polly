<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 21.
 * Time: AM 9:51
 */

require_once realpath($_SERVER['DOCUMENT_ROOT'].'/..').'/app/bootstrap.php';

$sAccessKeyId = 'AKIAJAHHMAZVN3YBCXWA';
$sSecretKey = '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';
$credentials = new \Aws\Credentials\Credentials($sAccessKeyId, $sSecretKey);
