<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb0293b35ae0af2d47b6cbbe4283e8cbe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb0293b35ae0af2d47b6cbbe4283e8cbe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb0293b35ae0af2d47b6cbbe4283e8cbe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb0293b35ae0af2d47b6cbbe4283e8cbe::$classMap;

        }, null, ClassLoader::class);
    }
}
