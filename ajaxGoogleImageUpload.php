 <?php
include("includes/config.inc.php");
$objSite->languageSession();

if(!$_SESSION['user_id']){
	die('You do not have permision for this action!');
}

$page_id = $_SESSION['page_id'];
$domain_id = $_SESSION['domain_id'];
//define ("MAX_SIZE","9000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['page_id']) && isset($_SESSION['domain_id']))   
{
	
    $uploaddir = $CFG['site']['photo_google_image_path']."/"; //a directory inside
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = str_replace(" ","",stripslashes($_FILES['photos']['name'][$name]));
        $filename = str_replace(" ","",stripslashes($filename));
        $filename = str_replace("(","",stripslashes($filename));
        $filename = str_replace(")","",stripslashes($filename));
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
          
          
         if(in_array($ext,$valid_formats))
	         {
		       //if ($size < (MAX_SIZE*1024))
		      // {
			   $image_name=time().$filename;
			   echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
			   $newname=$uploaddir.$image_name;
	           
	           
	           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
	           {
			       $time=time();
			       $page_list_id = $_POST['page_list_id'];
			       $image_status = $_POST['image'];
			        
		           $objThumb = new Thumbnail;
					
	               $thumb_img = explode('.',$image_name);
					
				   $img_thumb = $thumb_img[0].'T.'.$thumb_img[1];
		    	   $temp_file = $uploaddir.$img_thumb;
				   $objThumb->createThumb($newname,$temp_file,400,200,'crop'); 
       		      $google_first= mysql_query("INSERT INTO hi_temp_google_images(page_id,domain_id,page_list_id,google_image_name,google_name_thumb,publish_status) VALUES('".$page_id."','".$domain_id."','".$page_list_id."','".$image_name."','".$img_thumb."','U')");
                  $LastInsertedRow = mysql_insert_id();	
			      mysql_query("UPDATE hi_temp_pagelist SET google_ads = '".$image_status."',publish_status='U' WHERE pagelist = '".$page_list_id."'");
			   	}
		       else
		       {
		        echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
	            }
	
		      // }
			   /*else
			   {
				echo '<span class="imgList">You have exceeded the size limit!</span>';
	          
		       }*/
	       
	          }
          else
	         { 
		     	echo '<span class="imgList">Unknown extension!</span>';
	           
		     }
           
     }
}

?>