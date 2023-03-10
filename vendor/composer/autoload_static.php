<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd56d9ead5da7f806ed9a43fc783333b6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd56d9ead5da7f806ed9a43fc783333b6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd56d9ead5da7f806ed9a43fc783333b6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd56d9ead5da7f806ed9a43fc783333b6::$classMap;

        }, null, ClassLoader::class);
    }
}
