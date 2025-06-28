<?php

class Loader
{
    private static function loadClasses ( $className )
    {
        $classPath = str_replace( '\\', '/', $className ) . '.php';

        $classes = [ dirname( __FILE__ ) ];

        foreach ($classes as $class)
        {
            $filePath = $class . '/' . $classPath;

            if (is_file( $filePath ) === true)
            {
                require_once $filePath;
            }
        }
    }

    public static function register ()
    {
        spl_autoload_register( [ 'Loader', 'loadClasses' ] );
    }
}
