<?php

class b_autoloader {
    private static $types=['controllers','models','libs'];
    /**
     * Registers the autoloader.
     */
    public static function registerAutoloader() {
        spl_autoload_register('\b_autoloader::includeClass');
    }
    /**
     * 
     * @param type $classname
     * @return int
     * @throws Exception
     * Loads from common places.
     */
    public static function includeClass($classname){
        echo 'Including '.$classname;
        if(substr($classname,0,2)=='b_'){
            include SYSTEM_DIR.$classname.'.php';
            return 0;
        }
        else{
            foreach(self::$types as $type){
            $include=PROJECT_DIR.$type.'/'.$classname.'.php';
            if(file_exists($include)){
                include $include;
                return 0;
            }
            }
            throw new Exception("Invalid File for inclusion!");
            
        }
    }

}
