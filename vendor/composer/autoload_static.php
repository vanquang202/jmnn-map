<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc2213bab8c4dd3644dbc719eabf9df6
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jmnn\\Map\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jmnn\\Map\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc2213bab8c4dd3644dbc719eabf9df6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc2213bab8c4dd3644dbc719eabf9df6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbc2213bab8c4dd3644dbc719eabf9df6::$classMap;

        }, null, ClassLoader::class);
    }
}
