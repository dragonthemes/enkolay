 <?php
include("includes/config.inc.php");
$objSite->languageSession();
//echo __LINE__;die();
$ret = array();
$page_id = $_SESSION['page_id'];
$domain_id = $_SESSION['domain_id'];
define ("MAX_SIZE","9000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
//print_r($_FILES['photos']['name']);exit();
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['page_id']) && isset($_SESSION['domain_id']))    
{
	
    $uploaddir = $CFG['site']['photo_domain_image_path']."/"; //a directory inside
    $showImageUrl = $CFG['site']['photo_domain_image_url']."/";
   foreach ($_FILES['photos']['name'] as $name => $value)
   {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
	         {
		       if ($size < (MAX_SIZE*1024))
		       {
			   $image_name=time().$filename;
               echo "<img src='".$showImageUrl.$image_name."' class='imgList'>";
			   $newname=$uploaddir.$image_name;
	           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
	           {
	               $time=time();
			       $status = $_POST['status'];
			       $page_list_id = $_POST['page_list_id'];
			       if($status == 'domainlogo')
			       	{
			       	 	mysql_query("DELETE from domain_images WHERE domain_id = '".$domain_id."' AND status ='domainlogo'");
						mysql_query("INSERT INTO domain_images(domain_id,image_name,status) VALUES('".$domain_id."','".$image_name."','".$status."')");
						mysql_query("UPDATE hi_domaindetails SET header_logo_config = '2' WHERE domain_id='".$domain_id."'");
						
					}
			       else
			       		{
			       			if($status != 'sliderimage')
			       				mysql_query("DELETE from domain_images WHERE page_list_id = '".$page_list_id."'");
                                //echo ("INSERT INTO domain_images(domain_id,page_id,page_list_id,image_name,status) VALUES('$domain_id','$page_id','$page_list_id','$image_name','$status')");
			       			    echo mysql_query("INSERT INTO domain_images(domain_id,page_id,page_list_id,image_name,status) VALUES('".$domain_id."','".$page_id."','".$page_list_id."','".$image_name."','singleimage')");
			       			if($status == 'bannerimage')
			       				mysql_query("UPDATE hi_domaindetails SET header_banner = '1',header_slider = '0' WHERE domain_id='".$domain_id."'");
			       			if($status == 'sliderimage')
			       				mysql_query("UPDATE hi_domaindetails SET header_banner = '0',header_slider = '1' WHERE domain_id='".$domain_id."'");
						}
		       	}
		       else
		       {
		        echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
	            }
	
		       }
			   else
			   {
				echo '<span class="imgList">You have exceeded the size limit!</span>';
	          
		       }
	       
	          }
          else
	         { 
		     	echo '<span class="imgList">Unknown extension!</span>';
	           
		     }
           
     }
}

?>