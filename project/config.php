<?php

//Entire project's config options
$GLOBALS['config']['autoload_libraries'] = array('database', 'hash', 'redirection');
$GLOBALS['config']['autoload_controller'] = 'redirectionController';

$GLOBALS['config']['libraries']['database']['username'] = 'root';
$GLOBALS['config']['libraries']['database']['password'] = '';
$GLOBALS['config']['libraries']['database']['host'] = 'localhost';
$GLOBALS['config']['libraries']['database']['db'] = 'test';
$GLOBALS['config']['libraries']['database']['autoconnect'] = true;
$GLOBALS['config']['libraries']['hash']['salt'] = 'fgjdnfngre g]n-retg owrtgnbojdngbpd gtp] hd0inrdg bodtg';

$GLOBALS['config']['index']['start_session'] = true;
$GLOBALS['config']['index']['enviroment'] = 'development';

$GLOBALS['config']['system']['update'] = true;
$GLOBALS['config']['system']['redirect_logged'] = 'profile';
$GLOBALS['config']['system']['email'] = 'support@breader.me';

$GLOBALS['config']['extra']['github']['username'] = 'albertvision';
$GLOBALS['config']['extra']['github']['project'] = 'OpenSupport';
$GLOBALS['config']['extra']['lang'] = 'bg';
$GLOBALS['config']['extra']['routing']=function($route){
	if(preg_match("/method\/[0-9]+/",$route)){
	
	}
    switch($route){
        case 'alternate':
            include PROJECT_DIR.'controllers/testController.php';
            $instance=new testController();
            $instance->test();
            return true;
        break;
        default:
            return false;
        break;
    }
    return false;
};
define('SITE_PATH', 'http://os.localhost/');
//remember to edit the .js file at public (stories.js), also home.js includes some of it.