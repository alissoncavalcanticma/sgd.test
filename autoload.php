<?php
/*
spl_autoload_register(function($class){
	require 'model/'.$class.'.class.php';
});
*/

spl_autoload_register(function($className )
{
       $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ( $lastNsPos = strrpos( $className, '\\' ) ) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace( '\\', DIRECTORY_SEPARATOR, $namespace ) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace( '_', DIRECTORY_SEPARATOR, $className ) . '.class.php';


        $directories  = array( 'model', 'controller' );
        
        foreach ( $directories as $dir ) {
            if ( stream_resolve_include_path( "{$dir}/{$fileName}" ) ) {
                require_once "{$dir}/{$fileName}";
                break;
            }    
        }

});

//spl_autoload_register( 'autoloadMVC' );

?>