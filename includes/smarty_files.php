<?php
	#$CFG['site']['themename'] = 'hungryfood';
   
    if($CFG['site']['themename'] == 'theme1'){
		$CFG['site']['tpl_path']				= $CFG['site']['base_path']."/theme/theme1/templates";
		$CFG['site']['comp_path']				= $CFG['site']['base_path']."/theme/theme1/templates_c";
	}else{
		$CFG['site']['tpl_path']				= $CFG['site']['base_path']."/theme/default/templates";
		$CFG['site']['comp_path']				= $CFG['site']['base_path']."/theme/default/templates_c";
	}
	
	#Style
	if($CFG['site']['themename'] == 'theme1'){
		$CFG['site']['css_url']					= $CFG['site']['base_url_https']."/theme/theme1/css";
	}else{
		$CFG['site']['css_url']					= $CFG['site']['base_url_https']."/theme/default/css";
	}
	#------------------------------------------------------------------------------------
    #Inc Smarty files
    require_once $CFG['site']['include_path'].'/smarty/Smarty.class.php';
    
    #echo "<pre>";print_r($CFG);echo "</pre>";
    if (preg_match("/admincp/", $_SERVER['PHP_SELF']))
    	{
			$objSmarty = new Smarty;
		}
	else
		{
			#User Side
		    $objSmarty = new Smarty;
		    $objSmarty->compile_check  = true;
		    $objSmarty->debugging      = false;
			$objSmarty->template_dir  = $CFG['site']['tpl_path'];
		    $objSmarty->compile_dir   = $CFG['site']['comp_path'];
		}
        
     $objSmarty->assign('SITE_MAIN_DOMAIN', $CFG['site']['site_main_domain']);
    
    
?>