<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70f7b0286aac477b7b379b28ea6c6ac6
{
    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'RestService' => 
            array (
                0 => __DIR__ . '/..' . '/marcj/php-rest-service',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit70f7b0286aac477b7b379b28ea6c6ac6::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}