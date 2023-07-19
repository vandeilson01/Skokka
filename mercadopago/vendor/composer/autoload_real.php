<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite4781fc9f9366a3145770e5d6aed2cdc
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInite4781fc9f9366a3145770e5d6aed2cdc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite4781fc9f9366a3145770e5d6aed2cdc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite4781fc9f9366a3145770e5d6aed2cdc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
