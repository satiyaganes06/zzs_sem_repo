<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81691384562117c0e97c418ce94b71ad
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit81691384562117c0e97c418ce94b71ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81691384562117c0e97c418ce94b71ad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81691384562117c0e97c418ce94b71ad::$classMap;

        }, null, ClassLoader::class);
    }
}
