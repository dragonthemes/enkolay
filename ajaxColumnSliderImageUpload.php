 <?php
include("includes/config.inc.php");
$objSite->languageSession();

if(!Authentication::checkUserLoggedIn()){
	die('You do not have permision for this action!');
}

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

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{
	
    $uploaddir = $CFG['site']['photo_domain_image_path']."/"; //a directory inside
    $showImageUrl = $CFG['site']['photo_domain_image_url']."/";
    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = str_replace(" ","",stripslashes($_FILES['photos']['name'][$name]));
        $filename = str_replace("(","",stripslashes($filename));
        $filename = str_replace(")","",stripslashes($filename));
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
	         {
		       if ($size < (MAX_SIZE*1024))
		       {
			   $image_name=time().$filename;
                 $newname=$uploaddir.$image_name;
	           
	           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
	           {
			       $time=time();
			       $page_list_id = $_POST['page_list_id'];
                   $column_id = $_POST['column_id'];
                   mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='slider',addeddate=now()");
                   $LastInsertedRow = mysql_insert_id();
    			   $result=mysql_query("INSERT INTO hi_temp_slider_images(page_id,domain_id,page_list_id,imagelib_id,slider_images,publish_status) VALUES('".$page_id."','".$domain_id."','".$page_list_id."','".$LastInsertedRow."','".$image_name."','U')");
                   $LastInsertedRow = mysql_insert_id();
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
             echo "<li class='SlideUplWidtPopup'><img src='".$showImageUrl.$image_name."' class='imgList' width='100%' height='120'><a class='galleryimage'  onclick=\"deleteSliImgColumn('".$domain_id."','".$page_id."','".$page_list_id."','".$LastInsertedRow."')\"><img src=\" ".$CFG['site']['base_url']."/images/Close.png\" /></a></li>";
           
     }
}

?>