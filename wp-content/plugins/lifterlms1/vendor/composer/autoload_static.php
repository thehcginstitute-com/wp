<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite03d773fe05bcdfd5f84787c4a6ed140
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LLMS\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LLMS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite03d773fe05bcdfd5f84787c4a6ed140::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite03d773fe05bcdfd5f84787c4a6ed140::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite03d773fe05bcdfd5f84787c4a6ed140::$classMap;

        }, null, ClassLoader::class);
    }
}
