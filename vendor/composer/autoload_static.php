<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit251f6303c0e9deca5b1a4cedd606a6be
{
    public static $files = array (
        'f2ef699f3d9fc8b8366b81a3f0996042' => __DIR__ . '/../..' . '/Management/Functions/Functions.php',
        'f8fcf598bcaee6bf99142a41a05db6eb' => __DIR__ . '/../..' . '/Management/Functions/Helpers.php',
        '109a1de71d1cc21f38377bb9fcd42338' => __DIR__ . '/../..' . '/Configuration/Constant.php',
        '060c63481f37617cf8274b1a7b0d1dd8' => __DIR__ . '/../..' . '/Routes/web.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Middlewares\\' => 12,
            'Management\\' => 11,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Middlewares\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Middlewares',
        ),
        'Management\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Management',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit251f6303c0e9deca5b1a4cedd606a6be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit251f6303c0e9deca5b1a4cedd606a6be::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit251f6303c0e9deca5b1a4cedd606a6be::$classMap;

        }, null, ClassLoader::class);
    }
}