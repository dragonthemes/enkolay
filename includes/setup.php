<?php
/**
Author			Muthu
Start Date		17July2014
Note:			Dont Change this file for any reason, we keep some security key for safe our script.
*/
    ob_start();            //Turn on output buffering
    @session_start();       //Initialize session data
    //ob_implicit_flush(0);  //Turn implicit flush on/off
    ini_set('display_errors', 0);     //Sets the value of a configuration option
    error_reporting(E_ALL ^ E_NOTICE);
    //ini_set("default_charset","UTF-8");
    //setlocale(LC_ALL, "UTF-8");

//echo "<pre>"; print_r($_SERVER); echo "</pre>";exit;


    /*if($_SERVER['HTTP_HOST'] == '72.10.32.146' || $_SERVER['HTTP_HOST'] == 'http://enkolayweb.com' || $_SERVER['HTTP_HOST'] == 'http://www.enkolayweb.com' || $_SERVER['HTTP_HOST'] == 'enkolayweb.com' || $_SERVER['HTTP_HOST'] == 'www.enkolayweb.com'){ */
   
        if($_SERVER['SERVER_ADDR'] == '127.0.0.1'){   //72.10.32.146
    	
    	require_once('dbDetails.php');
    	
    /*	if(isset($_SERVER['HTTP_X_FORWARDED_HOST']) && !empty($_SERVER['HTTP_X_FORWARDED_HOST'])){
            $serverhost_url = $_SERVER['HTTP_X_FORWARDED_HOST'];
        }else{
            $serverhost_url = $_SERVER['HTTP_HOST'].SITE_FOLDER;
        }*/
    	
    	$serverhost_url = $_SERVER['HTTP_HOST'].SITE_FOLDER;
    	
		#BASE PATH & BASE URL
	    $CFG['site']['base_path']    = dirname(dirname(__FILE__));
	    $CFG['site']['base_url']     = "http://".$serverhost_url;
	    
	    if( isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on' ){//check whether https or http
			$CFG['site']['base_url_https']     = "https://".$serverhost_url;
		}else{
			$CFG['site']['base_url_https']     = $CFG['site']['base_url'];
		}


	    
	    $CFG['db']['db_host']        = DATABASE_HOST;
	    $CFG['db']['db_user']        = DATABASE_USER;
	    $CFG['db']['db_pwd']         = DATABASE_PWD;
	    $CFG['db']['db_name']        = DATABASE_NAME;
	    $CFG['db']['table_prefix']   = TBL_PREFIX;
	    
	}else{
		echo 'Invalid Domain';
		die();
	}
    
    if($_SERVER['SERVER_ADDR'] != '127.0.0.1')
    	{
            if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])) {
        	    $server_main_domain = str_replace("http://", "", $_SERVER['HTTP_HOST']);
                $server_main_domain = str_replace("https://", "", $server_main_domain);
                $server_main_domain = str_replace("www.", "", $server_main_domain);     
                $CFG['site']['site_main_domain'] = $server_main_domain;       
             }
         }
     else
         {
            $CFG['site']['site_main_domain'] = "enkolayweb.com";
        }  
     
    
/**********************************************************************************************************/
?>
