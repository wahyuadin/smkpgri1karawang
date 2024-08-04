<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d465f4ccc94e69e71ea7112e0a9699c
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3d465f4ccc94e69e71ea7112e0a9699c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3d465f4ccc94e69e71ea7112e0a9699c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3d465f4ccc94e69e71ea7112e0a9699c::$classMap;

        }, null, ClassLoader::class);
    }
}