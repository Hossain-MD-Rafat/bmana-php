<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1612597845c20a79cb97caac68c140c
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1612597845c20a79cb97caac68c140c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1612597845c20a79cb97caac68c140c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd1612597845c20a79cb97caac68c140c::$classMap;

        }, null, ClassLoader::class);
    }
}
