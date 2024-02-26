<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb505c0e06ab5e94cd752a4db9a3a37e2
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sentiment\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sentiment\\' => 
        array (
            0 => __DIR__ . '/..' . '/davmixcool/php-sentiment-analyzer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb505c0e06ab5e94cd752a4db9a3a37e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb505c0e06ab5e94cd752a4db9a3a37e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb505c0e06ab5e94cd752a4db9a3a37e2::$classMap;

        }, null, ClassLoader::class);
    }
}
