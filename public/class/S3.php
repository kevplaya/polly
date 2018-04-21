<?php
/**
 * Created by PhpStorm.
 * User: a201610021
 * Date: 2018. 4. 21.
 * Time: AM 10:02
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/lib/config.php';
class S3
{
    protected $sBucket;
    protected $sRegion;
    protected $sS3client;

    //TODO:  multi region?
    protected $aRegionset = [

    ];

    public function  __construct($sBuckeName,$sRegion)
    {
        $this->sBucket = $sBuckeName;
        $this->sRegion = $sRegion;
        $oCredential = new \Aws\Credentials\Credentials(ACCESS_KEY_ID, SECRET_KEY);
        $aClientInfo = [
            'version' => 'latest',
            'credentials' => $oCredential,
            'region' => $sRegion ];

        $this->sS3client = new Aws\S3\S3Client($aClientInfo);
    }

    public function putBucket($sFileName,$sFile){

        $aFile =
            [
                'Key' => $sFileName
                , 'ACL' => 'public-read'
                , 'Body' => $sFile
                , 'Bucket' => $this->sBucket
                , 'ContentType' => mime_content_type($sFile)
            ];
        $sS3filelink = $this->sS3client->putObject($aFile);

        if(!empty($sS3filelink)){
            return $sS3filelink;
        }else{
            return -1;
        }

    }
}