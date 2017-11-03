<?php 
$debugAllowed = array(
    '127.0.0.1',
    '::1',
);

# DEBUG configuration
if(isset($_SERVER['REMOTE_ADDR']) AND in_array($_SERVER['REMOTE_ADDR'], $debugAllowed)) {
    ini_set("display_errors", "on");  # Debug setings
    error_reporting(E_ALL);           # Debug setings
    define('MOD_REWRITE', false);     # Mod rewrite (ex. task=page&action=login -> page/login )
    define('setErrorLog', true);      # DB show error

} else {
    ini_set("display_errors", "off"); # Debug setings
    error_reporting(E_ALL);           # Debug setings
    define('MOD_REWRITE', false);     # Mod rewrite (ex. task=page&action=login -> page/login )
    define('setErrorLog', false);     # DB show error

}

# Application configuration
define('APP_DIR', dirname(__FILE__).'/../app/');

# Website configuration
define('VERSION', "Dframe"); # Version aplication
define('SALT', "YOURSALT123"); # SALT

if(isset($_SERVER['REMOTE_ADDR']) AND ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' OR $_SERVER['REMOTE_ADDR'] == '::1')){
	define('HTTP_HOST', $_SERVER['HTTP_HOST'].'/projektszkola');
    define('site_url', 'http://'.$_SERVER['HTTP_HOST'].'/projektszkola'); # Url address

}else{
	define('HTTP_HOST', 'website.url');
    define('site_url', 'http://website.url'); # Url address
}


# Database configuration
define('DB_HOST', "bbb"); # Database Host (localhost)
define('DB_USER', "bddbb"); # Database Username
define('DB_PASS', "bbdb"); # Database Password
define('DB_DATABASE', "bbb"); # Databese Name
