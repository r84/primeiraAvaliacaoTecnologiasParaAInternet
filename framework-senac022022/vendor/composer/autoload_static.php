<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5f3b26b368eef41b33be01f98d736f57
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bootstrap\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bootstrap\\' => 
        array (
            0 => __DIR__ . '/../..' . '/bootstrap',
        ),
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5f3b26b368eef41b33be01f98d736f57::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5f3b26b368eef41b33be01f98d736f57::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5f3b26b368eef41b33be01f98d736f57::$classMap;

        }, null, ClassLoader::class);
    }
}
