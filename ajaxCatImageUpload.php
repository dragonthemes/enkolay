 <?php
include("includes/config.inc.php");
$objSite->languageSession();

if(!Authentication::checkUserLoggedIn()){
	die('You do not have permision for this action!');
}

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
	
    $uploaddir =$CFG['site']['photo_cat_image_path']."/"; //a directory inside
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
		       if ($size < (MAX_SIZE*1024))
		       {
			   $image_name=time().$filename;
			   echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
			   $newname=$uploaddir.$image_name;
	           
	           
	           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
	           {
			       $time=time();
			       $store_cat_id = $_POST['store_cat_id'];
			       
				   $search= "SELECT store_cat_image from store_cat_images where store_cat_image = '$image_name' and store_cat_id = '$store_cat_id' and domain_id = '$domain_id'";
				   $result = mysql_query($search);
				   $row = mysql_fetch_row($result);
				   if($row)
					{
						return false;
					}
				   else
				   	{
				   		mysql_query("DELETE from store_cat_images WHERE store_cat_id = '$store_cat_id'");
						mysql_query("INSERT INTO store_cat_images(domain_id,store_cat_id,store_cat_image) VALUES('$domain_id','$store_cat_id','$image_name')");
						
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