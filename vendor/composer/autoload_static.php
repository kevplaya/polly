<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b1386893c1ccdcf2e3f9b9ec2efd583
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Helper\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/service/Helper',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b1386893c1ccdcf2e3f9b9ec2efd583::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b1386893c1ccdcf2e3f9b9ec2efd583::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
