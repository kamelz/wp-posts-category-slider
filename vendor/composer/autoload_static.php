<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10262507307b1dcb282261a29c812785
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
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10262507307b1dcb282261a29c812785::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10262507307b1dcb282261a29c812785::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}