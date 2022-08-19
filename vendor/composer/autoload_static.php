<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit217e9999e3adb9c10a9ea749d9a33651
{
    public static $files = array (
        '49a1299791c25c6fd83542c6fedacddd' => __DIR__ . '/..' . '/yahnis-elsts/plugin-update-checker/load-v4p11.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit217e9999e3adb9c10a9ea749d9a33651::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit217e9999e3adb9c10a9ea749d9a33651::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit217e9999e3adb9c10a9ea749d9a33651::$classMap;

        }, null, ClassLoader::class);
    }
}
