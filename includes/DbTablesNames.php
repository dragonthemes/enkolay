<?php
	#Table Prefix Details
    $CFG['table']['admin']            	= $CFG['db']['table_prefix']."admin";
    $CFG['table']['sitesetting']      	= $CFG['db']['table_prefix']."sitesetting";
    $CFG['table']['iconsetting']		= $CFG['db']['table_prefix']."iconsetting";
    
	#Language Changes
	
	$CFG['table']['language']  		 	= $CFG['db']['table_prefix']."language";
	$CFG['table']['domain_user']        = $CFG['db']['table_prefix']."domain_user";
	$CFG['table']['register']           = $CFG['db']['table_prefix']."register";
	//admin side
	$CFG['table']['pricemanage']        = $CFG['db']['table_prefix']."pricemanage";
	$CFG['table']['thememanage']        = $CFG['db']['table_prefix']."thememanage";
	$CFG['table']['new_domain']         = $CFG['db']['table_prefix']."newdomain";
	$CFG['table']['referrals']          = $CFG['db']['table_prefix']."referrals";
    
	$CFG['table']['themeselection']        = $CFG['db']['table_prefix']."themeselection";
    $CFG['table']['temp_themeselection']   = $CFG['db']['table_prefix']."temp_themeselection";
    
	$CFG['table']['suggesstion']        = $CFG['db']['table_prefix']."suggesstion";
	$CFG['table']['domaindetails']      = $CFG['db']['table_prefix']."domaindetails";
	$CFG['table']['pages']              = $CFG['db']['table_prefix']."pages";
	$CFG['table']['banner']			    = $CFG['db']['table_prefix']."banner";
	$CFG['table']['recentactivity']		= $CFG['db']['table_prefix']."recentactivity";
    
	$CFG['table']['blogmanage']		    = $CFG['db']['table_prefix']."blogmanage";
	$CFG['table']['blogselection']	    = $CFG['db']['table_prefix']."blogselection";
    $CFG['table']['temp_blogselection']	= $CFG['db']['table_prefix']."temp_blogselection";
    
	$CFG['table']['blogsettings']	    = $CFG['db']['table_prefix']."blogsettings";
	$CFG['table']['commentdetails']	    = $CFG['db']['table_prefix']."commentdetails";
	$CFG['table']['font']       	    = $CFG['db']['table_prefix']."font";
	$CFG['table']['social_plugins']     = $CFG['db']['table_prefix']."social_plugins";
	$CFG['table']['content']            = $CFG['db']['table_prefix']."content";
	$CFG['table']['contact_form']       = $CFG['db']['table_prefix']."contact_form";
    $CFG['table']['temp_contact_form_field'] = $CFG['db']['table_prefix']."temp_contactform_fields";
    $CFG['table']['temp_contact_form_field'] = $CFG['db']['table_prefix']."temp_contactform_fields";
    $CFG['table']['contact_form_field']      = $CFG['db']['table_prefix']."contactform_fields";
	$CFG['table']['posttitle']          = $CFG['db']['table_prefix']."posttitle";
	$CFG['table']['fans']               = $CFG['db']['table_prefix']."fans";
	$CFG['table']['blogmessageform']    = $CFG['db']['table_prefix']."blogmessageform";
	$CFG['table']['contact']            = $CFG['db']['table_prefix']."contactform";
    $CFG['table']['background']         = $CFG['db']['table_prefix']."background";
	$CFG['table']['domain_images']      = "domain_images";
	$CFG['table']['page_list']          = $CFG['db']['table_prefix']."pagelist";
	$CFG['table']['youtube_video']      = $CFG['db']['table_prefix']."youtube_video";
	$CFG['table']['category']           = $CFG['db']['table_prefix']."category";
	$CFG['table']['point']              = $CFG['db']['table_prefix']."point";
	$CFG['table']['currencymanage']     = $CFG['db']['table_prefix']."currencymanage";
	$CFG['table']['gallery_images']     = "gallery_images";
	$CFG['table']['slider_images']      = "slider_images";
	$CFG['table']['google_images']      = "google_images";
	$CFG['table']['paypal_transaction'] = "paypal_transaction";
	$CFG['table']['temp_files']         = $CFG['db']['table_prefix']."temp_files";
    $CFG['table']['files']              = $CFG['db']['table_prefix']."files";
    $CFG['table']['temp_docs']         = $CFG['db']['table_prefix']."temp_docs";
    $CFG['table']['docs']              = $CFG['db']['table_prefix']."docs";
	//for store
	$CFG['table']['storemanage']              = $CFG['db']['table_prefix']."storemanage";
	$CFG['table']['storeselection']           = $CFG['db']['table_prefix']."storeselection";
	$CFG['table']['store_product']            = $CFG['db']['table_prefix']."store_product";
	$CFG['table']['store_category']           = $CFG['db']['table_prefix']."store_category";
	$CFG['table']['store_cat_images']         = "store_cat_images";
	$CFG['table']['product_cat']              = $CFG['db']['table_prefix']."product_cat";
	$CFG['table']['product_images']           = "product_images";
	
	$CFG['table']['product_option']           = $CFG['db']['table_prefix']."prod_option";
	$CFG['table']['product_choice']           = $CFG['db']['table_prefix']."option_choice";
	$CFG['table']['store_details']            = $CFG['db']['table_prefix']."store_details";
	$CFG['table']['ship_store']               = $CFG['db']['table_prefix']."store_shipping";
	$CFG['table']['order_product']            = $CFG['db']['table_prefix']."product_order";
	$CFG['table']['cart']                     = $CFG['db']['table_prefix']."cart";
	$CFG['table']['order_details']            = $CFG['db']['table_prefix']."order_details";
	$CFG['table']['order']                    = $CFG['db']['table_prefix']."order";
     //for publish process
    $CFG['table']['temp_domaindetails']       = $CFG['db']['table_prefix']."temp_domaindetails";
    $CFG['table']['temp_pagelist']            = $CFG['db']['table_prefix']."temp_pagelist";
    $CFG['table']['temp_google_images']       = $CFG['db']['table_prefix']."temp_google_images";
    $CFG['table']['temp_gallery_images']      = $CFG['db']['table_prefix']."temp_gallery_images";
    $CFG['table']['temp_slider_images']       = $CFG['db']['table_prefix']."temp_slider_images";
    $CFG['table']['temp_contact_form']        = $CFG['db']['table_prefix']."temp_contact_form";
    $CFG['table']['banner_slider_images']     = "banner_slider_images";
    $CFG['table']['temp_banner_slider_images']= $CFG['db']['table_prefix']."temp_banner_slider_images";
    $CFG['table']['single_images']            = "single_images";
    $CFG['table']['temp_single_images']       = $CFG['db']['table_prefix']."temp_single_images";
    $CFG['table']['imagetxt_images']          = "imagetxt_images";
    $CFG['table']['temp_imagetxt_images']     = $CFG['db']['table_prefix']."temp_imagetxt_images";
    $CFG['table']['temp_posttitle']           = $CFG['db']['table_prefix']."temp_posttitle";
    $CFG['table']['temp_pages']               = $CFG['db']['table_prefix']."temp_pages";
    $CFG['table']['temp_youtube_video']       = $CFG['db']['table_prefix']."temp_youtube_video";
    $CFG['table']['temp_category']            = $CFG['db']['table_prefix']."temp_category";
    $CFG['table']['imagelibrary']            = $CFG['db']['table_prefix']."imagelibrary";
    $CFG['table']['buy_invoice']             = $CFG['db']['table_prefix']."buy_invoice";
    $CFG['table']['temp_column_text_images']  = $CFG['db']['table_prefix']."temp_column_text_images";
    $CFG['table']['column_text_images']       = $CFG['db']['table_prefix']."column_text_images";
 
?>