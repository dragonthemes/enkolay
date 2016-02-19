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
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
    $uploaddir = $CFG['site']['photo_domain_image_path']."/"; //a directory inside
    if(!empty($_FILES['photos']['name']))
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
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
		       //{
			   $image_name=time().$filename;
			   //echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
			   $newname=$uploaddir.$image_name;
	            $showImageUrl = $CFG['site']['photo_domain_image_url']."/";
	           
	           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
	           {
	                echo "<li class='SlideUplWidtPopup'>
            <img src='".$showImageUrl.$image_name."' class='galleryimage imgList' width='100%' height='150'><a class='galleryimage'  onclick=\"deleteGalImg('".$domain_id."','".$page_id."','".$page_list_id."','".$LastInsertedRow."')\"><img src=\" ".$CFG['site']['base_url']."/images/Close.png\" /></a></div></li>";
            
			        $time=time();
			        $page_list_id = $_POST['page_list_id'];
			       
			        $objThumb = new Thumbnail;
					$thumb_img = explode('.',$image_name);
					$imagWH=getimagesize($newname);                            
                    $newwidth   = round(($imagWH[0]/$imagWH[1])*100);
                    $newheight  = ceil(($imagWH[1]/$imagWH[0])*$newwidth);
					$img_thumb = $thumb_img[0].'T.'.$thumb_img[1];
		    		$temp_file = $uploaddir.$img_thumb;
                    $thumbsize = $objCommon->GetValue("gallery_thumb_size",$CFG['table']['iconsetting'],"gallery_thumb_size!=''");
				    $imagWH    = $objCommon->getThumbnailWidthHeight($newname,$thumbsize);
				    $objThumb->createThumb($newname,$temp_file,$newwidth,$newheight,'auto'); 
       			   
                    mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='gallery',addeddate=now()");
                    $LastInsertedRow = mysql_insert_id();
                    $gallery_first=mysql_query("INSERT INTO hi_temp_gallery_images(page_id,domain_id,page_list_id,imagelib_id,gallery_name,gallery_name_thumb,publish_status) VALUES('$page_id','$domain_id','$page_list_id',$LastInsertedRow,'$image_name','$img_thumb','U')");
                    $LastInsertedRow = mysql_insert_id();		
			   	}
		       else
		       {
		          #echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful!</span>';
                  echo 'You have exceeded the size limit! so moving unsuccessful!';
	           }
	
	          }
          else
	         { 
		     	echo 'Unknown extension!';	           
		     }
     }
}

?>