<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb0293b35ae0af2d47b6cbbe4283e8cbe
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

        spl_autoload_register(array('ComposerAutoloaderInitb0293b35ae0af2d47b6cbbe4283e8cbe', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb0293b35ae0af2d47b6cbbe4283e8cbe', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb0293b35ae0af2d47b6cbbe4283e8cbe::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
