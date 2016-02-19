<?php 
	/*	Class Function for Setting	*/
	
class Setting extends Site
{
	var $admin_name;
	var $admin_email;
	var $admin_phone;
	var $user_friendly;
	var $site_name;
	var $page_user_side;
	var $page_admin_side;
	var $invites_url;
    var $facebook_api;
    
	var $domain_mode;
    var $reg_url_test;
    var $reg_url_live;
    var $reg_gui_test;
    var $reg_gui_live;
    
	var $followers_thumb_width;
	var $followers_thumb_height;
	var $banner_thumb_width;
	var $banner_thumb_height;
	var $banner_thumbsmall_width;
	var $banner_thumbsmall_height;
	var $listing_thumb_width;
	var $listing_thumb_height;
    var $gallery_thumb_size;
    var $slider_thumb_size;
	var $page_subs_count;
    var $mail_options;
    var $host_name;
    var $port_address;
    var $smtp_email;
    var $smtp_password;
    var $new_domain_price;
	var $single_image_thumb_size;
    var $img_txt_thumb_size;
	function Setting(){
		
		#Site Settings
		if (array_key_exists("admin_name", $_POST)) {
 			$this->admin_name = $this->My_addslashes($_POST['admin_name']);
		}
		if (array_key_exists("admin_email", $_POST)) {
 			$this->admin_email = $this->My_addslashes($_POST['admin_email']);
		}
		if (array_key_exists("admin_phone", $_POST)) {
 			$this->admin_phone = $this->My_addslashes($_POST['admin_phone']);
		}
		if (array_key_exists("userfriendly", $_POST)) {
 			$this->userfriendly = $this->My_addslashes($_POST['userfriendly']);
		}
        if (array_key_exists("sitename", $_POST)) {
 			$this->sitename = $this->My_addslashes($_POST['sitename']);
		}
		if (array_key_exists("invites_url", $_POST)) {
 			$this->invites_url = $this->My_addslashes($_POST['invites_url']);
		}
        if (array_key_exists("facebook_api", $_POST)) {
 			$this->facebook_api = $this->My_addslashes($_POST['facebook_api']);
		}
		if (array_key_exists("page_subs_count", $_POST)) {
 			$this->page_subs_count = $this->My_addslashes($_POST['page_subs_count']);
		}
		if (array_key_exists("user_page", $_POST)) {
 			$this->user_page = $this->My_addslashes($_POST['user_page']);
		}
		if (array_key_exists("admin_page", $_POST)) {
 			$this->admin_page = $this->My_addslashes($_POST['admin_page']);
		}
        if (array_key_exists("mail_options", $_POST)) {
 			$this->mail_options = $this->My_addslashes($_POST['mail_options']);
		}
        if (array_key_exists("host_name", $_POST)) {
 			$this->host_name = $this->My_addslashes($_POST['host_name']);
		}
        if (array_key_exists("port_address", $_POST)) {
 			$this->port_address = $this->My_addslashes($_POST['port_address']);
		}
        if (array_key_exists("smtp_email", $_POST)) {
 			$this->smtp_email = $this->My_addslashes($_POST['smtp_email']);
		}
        if (array_key_exists("smtp_password", $_POST)) {
 			$this->smtp_password = $this->My_addslashes($_POST['smtp_password']);
		}
        if (array_key_exists("new_domain_price", $_POST)) {
 			$this->new_domain_price = $this->My_addslashes($_POST['new_domain_price']);
		}
        if (array_key_exists("domain_mode", $_POST)) {
 			$this->domain_mode = $this->My_addslashes($_POST['domain_mode']);
		}
        if (array_key_exists("reg_url_live", $_POST)) {
 			$this->reg_url_live = $this->My_addslashes($_POST['reg_url_live']);
		}
        if (array_key_exists("reg_gui_test", $_POST)) {
 			$this->reg_gui_test = $this->My_addslashes($_POST['reg_gui_test']);
		}
        if (array_key_exists("reg_url_test", $_POST)) {
 			$this->reg_url_test = $this->My_addslashes($_POST['reg_url_test']);
		}
        if (array_key_exists("reg_gui_live", $_POST)) {
 			$this->reg_gui_live = $this->My_addslashes($_POST['reg_gui_live']);
		}
        
        #Icon setting
        
        if (array_key_exists("follower_logo_width", $_POST)) {
 			$this->followers_thumb_width = $this->My_addslashes($_POST['follower_logo_width']);
		}
        if (array_key_exists("follower_logo_height", $_POST)) {
 			$this->followers_thumb_height = $this->My_addslashes($_POST['follower_logo_height']);
		}
        if (array_key_exists("banner_img_width", $_POST)) {
 			$this->banner_thumb_width = $this->My_addslashes($_POST['banner_img_width']);
		}
        if (array_key_exists("banner_img_height", $_POST)) {
 			$this->banner_thumb_height = $this->My_addslashes($_POST['banner_img_height']);
		}
        if (array_key_exists("ban_thumb_width", $_POST)) {
 			$this->banner_thumbsmall_width = $this->My_addslashes($_POST['ban_thumb_width']);
		}
        if (array_key_exists("ban_thumb_height", $_POST)) {
 			$this->banner_thumbsmall_height = $this->My_addslashes($_POST['ban_thumb_height']);
		}
        if (array_key_exists("list_thumb_width", $_POST)) {
 			$this->listing_thumb_width = $this->My_addslashes($_POST['list_thumb_width']);
		}
        if (array_key_exists("list_thumb_height", $_POST)) {
 			$this->listing_thumb_height = $this->My_addslashes($_POST['list_thumb_height']);
		}
        if (array_key_exists("gallery_size", $_POST)) {
 			$this->gallery_thumb_size = $this->My_addslashes($_POST['gallery_size']);
		}
        if (array_key_exists("slider_size", $_POST)) {
 			$this->slider_thumb_size = $this->My_addslashes($_POST['slider_size']);
		}
        if (array_key_exists('single_image_thumb_size',$_POST))
        {
            $this->single_image_thumb_size = $this->My_addslashes($_POST['single_image_thumb_size']);
        }
        if (array_key_exists('img_txt_thumb_size',$_POST))
        {
              $this->img_txt_thumb_size = $this->My_addslashes($_POST['img_txt_thumb_size']);
        }
		
	}
    #Update Site Settings
	function updateSiteSetting(){
		global $CFG,$objSmarty;
		$contentnum = $this->getNumvalues($CFG['table']['sitesetting'],"id = '".$this->filterInput($_SESSION['adminid'])."' ");
		//echo $contentnum;die();
		if($contentnum)
			{
			   $UpQuery  = "UPDATE ".$CFG['table']['sitesetting']." SET 
							admin_name 			= '".$this->filterInput($this->admin_name)."',
							admin_email 		= '".$this->filterInput($this->admin_email)."', 
							admin_phone 		= '".$this->filterInput($this->admin_phone)."', 
							userfriendly 		= '".$this->filterInput($this->userfriendly)."',
							sitename 			= '".$this->filterInput($this->sitename)."',
							invites_url 		= '".$this->filterInput($this->invites_url)."',
                            facebook_api 		= '".$this->filterInput($this->facebook_api)."',
							page_subs_count     = '".$this->filterInput($this->page_subs_count)."',
							admin_page 			= '".$this->filterInput($this->admin_page)."',
							user_page 			= '".$this->filterInput($this->user_page)."',
                            mail_options 	    = '".$this->filterInput($this->mail_options)."',
                            host_name 			= '".$this->filterInput($this->host_name)."',
                            port_address 	    = '".$this->filterInput($this->port_address)."',
                            smtp_email 			= '".$this->filterInput($this->smtp_email)."',
                            smtp_password 		= '".$this->filterInput($this->smtp_password)."',
                            new_domain_price 	= '".$this->filterInput($this->new_domain_price)."',
                            domain_apl_mode  	= '".$this->filterInput($this->domain_mode)."',
                            domain_reg_url_test = '".$this->filterInput($this->reg_url_test)."',
                            domain_reg_url_live = '".$this->filterInput($this->reg_url_live)."',
                            domain_reg_gui_live = '".$this->filterInput($this->reg_gui_live)."', 
                            domain_reg_gui_test = '".$this->filterInput($this->reg_gui_test)."' 
						WHERE id  = '".$_SESSION['adminid']."'";
			
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
			}
			
			if(isset($_FILES['sitelogo']['name']) && !empty($_FILES['sitelogo']['name']) ){
				
				$getphotoname = $this->getValue("sitelogo",$CFG['table']['sitesetting'],"id ='".$this->filterInput($_SESSION['adminid'])."' ");
				if(!empty($getphotoname)){
					@unlink($CFG['site']['image_path'].'/'.$getphotoname);
				}
				
				$logoext = $this->getFileExtension($_FILES['sitelogo']['name']);
				$logoimage = "logo_".time().$this->seoUrl($_POST["sitename"]).".".$logoext;
				$dest_name = $CFG['site']['image_path'].'/'.$logoimage;
				
				@move_uploaded_file($_FILES['sitelogo']['tmp_name'], $dest_name);
				@chmod($dest_name,0777);
				
				$query = "UPDATE ".$CFG['table']['sitesetting']." SET sitelogo = '".$this->filterInput($logoimage)."' WHERE id ='".$this->filterInput($_SESSION['adminid'])."' ";
				$res = $this->ExecuteQuery($query, "update");
			}
            if(isset($_FILES['sitefavicon']['name']) && !empty($_FILES['sitefavicon']['name']) ){
				
				$getphotoname_fav = $this->getValue("site_fav_icon",$CFG['table']['sitesetting'],"id ='".$this->filterInput($_SESSION['adminid'])."' ");
				if(!empty($getphotoname_fav)){
					@unlink($CFG['site']['image_path'].'/'.$getphotoname_fav);
				}
				
				$logoext = $this->getFileExtension($_FILES['sitefavicon']['name']);
				$logoimage = "fav_".time().$this->seoUrl($_POST["sitename"]).".".$logoext;
				$dest_name = $CFG['site']['image_path'].'/'.$logoimage;
				
				@move_uploaded_file($_FILES['sitefavicon']['tmp_name'], $dest_name);
				@chmod($dest_name,0777);
				
				$query = "UPDATE ".$CFG['table']['sitesetting']." SET site_fav_icon = '".$this->filterInput($logoimage)."' WHERE id ='".$this->filterInput($_SESSION['adminid'])."' ";
				$res = $this->ExecuteQuery($query, "update");
			}
			$objSmarty->assign("SuccessMessage", "Site setting has been updated successfully");
			
	}
	#Update Site Settings
	function selectSiteSetting(){
		global $CFG,$objSmarty;
			
			$selqry = "SELECT admin_name,admin_phone, admin_email,invites_url,facebook_api, userfriendly,page_subs_count, sitename, sitelogo, site_fav_icon, user_page,domain_apl_mode,domain_reg_url_test ,domain_reg_url_live ,domain_reg_gui_live ,domain_reg_gui_test, admin_page,mail_options,host_name,port_address,smtp_email,smtp_password,new_domain_price FROM ".$CFG['table']['sitesetting']." where id ='".$this->filterInput($_SESSION['adminid'])."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			//echo "<pre>";print_r($resqry);echo "</pre>";exit;
            $objSmarty->assign('site_adimin_value',$resqry); 
	}
    
    #Update icon Settings
	function updateIconSetting(){
		global $CFG,$objSmarty;
		$contentnum = $this->getNumvalues($CFG['table']['iconsetting'],"id = '".$this->filterInput($_SESSION['adminid'])."' ");
		//echo $contentnum;die();
		if($contentnum)
			{
			   $UpQuery  = "UPDATE ".$CFG['table']['iconsetting']." SET 
							followers_thumb_width 		= '".$this->filterInput($this->followers_thumb_width)."',
							followers_thumb_height 		= '".$this->filterInput($this->followers_thumb_height)."', 
							banner_thumb_width 		    = '".$this->filterInput($this->banner_thumb_width)."', 
							banner_thumb_height 		= '".$this->filterInput($this->banner_thumb_height)."',
							banner_thumbsmall_width 	= '".$this->filterInput($this->banner_thumbsmall_width)."',
							banner_thumbsmall_height 	= '".$this->filterInput($this->banner_thumbsmall_height)."',
                            listing_thumb_width 		= '".$this->filterInput($this->listing_thumb_width)."',
							listing_thumb_height        = '".$this->filterInput($this->listing_thumb_height)."',
							gallery_thumb_size 			= '".$this->filterInput($this->gallery_thumb_size)."',
							slider_thumb_size 			= '".$this->filterInput($this->slider_thumb_size)."',                           
							single_image_thumb_size	    = '".$this->filterInput($this->single_image_thumb_size)."',
                            img_txt_thumb_size          = '".$this->filterInput($this->img_txt_thumb_size)."' 
                            
						WHERE id  = '".$_SESSION['adminid']."'";
			
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
            $objSmarty->assign("SuccessMessage", "Icone setting has been updated successfully");
			}
    
    }
    #get icone Settings
	function selectIconSetting(){
		global $CFG,$objSmarty;
			
			$selqry = "SELECT id, admin_id, followers_thumb_width, followers_thumb_height, banner_thumb_width, banner_thumb_height, banner_thumbsmall_width, banner_thumbsmall_height, listing_thumb_width, listing_thumb_height, gallery_thumb_size, slider_thumb_size, single_image_thumb_size,img_txt_thumb_size FROM ".$CFG['table']['iconsetting']." Limit 1";
			$resqry = $this->ExecuteQuery($selqry, "select");
			$objSmarty->assign('icon_adimin_value',$resqry); 
            
	}
	
		
}
?>