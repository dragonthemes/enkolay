 <?php

include("includes/config.inc.php");
$objSite->languageSession();

if(!$_SESSION['user_id']){
  die('You do not have permision for this action!');
}

$page_id = $_SESSION['page_id'];
$domain_id = $_SESSION['domain_id'];

function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['domain_id']) && isset($_SESSION['page_id'])) 
{	
    $uploaddir = $CFG['site']['domain_file_path']."/"; //a directory inside
    $page_list_id = $_POST['page_list_id'];
    
	
        $filename = str_replace(" ","",stripslashes($_FILES['files']['name']));
        $size=filesize($_FILES['files']['tmp_name']);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	         
		      // if ($size < (MAX_SIZE*1024))
		       //{
			   $image_name=$filename;
			   echo "<img src='".$CFG['site']['photo_domain_image_url']."/".$image_name."' style='display:none' class='imgList'>";
			   //$newname=$uploaddir.$image_name;
	           
	           if (isset($_FILES['files']['name']) && !empty($_FILES['files']['name'])) 
	           {               
                     
                      $myres    = mysql_query("SELECT file_name from hi_temp_files WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND page_list_id='".$page_list_id."' AND publish_status='U'");                     
                      if(mysql_num_rows($myres))
                      {
                          $res  = mysql_fetch_assoc($myres);
                          $imagename_del   = $res['file_name'];                         
                          @unlink($CFG['site']['domain_file_path'].'/'.$imagename_del);
                      }
                       mysql_query("DELETE from hi_temp_files WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND page_list_id='".$page_list_id."'");
                       $res=mysql_query("INSERT INTO  hi_temp_files(page_id,domain_id,page_list_id,original_name,publish_status) VALUES('".$page_id."','".$domain_id."','".$page_list_id."','".$filename."','U')");
                       $LastInsertedRow = mysql_insert_id();
                       $tmp = explode(".",$filename);
                       $storefile    = $tmp[0].$LastInsertedRow.".".$tmp[1];
                       
                       mysql_query(" UPDATE hi_temp_files SET file_name='".$storefile."' WHERE file_id='".$LastInsertedRow."'");                       
                       move_uploaded_file($_FILES['files']['tmp_name'], $uploaddir.$storefile);                
			       				
						 
		       	}
		       else
		       {
		          echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
	           }    
	          
          
           
     
}

?>