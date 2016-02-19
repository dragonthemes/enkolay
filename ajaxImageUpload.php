<?php

include("includes/config.inc.php");
$objSite->languageSession();

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
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['domain_id']) && isset($_SESSION['page_id'])) 
{   
    
    $uploaddir = $CFG['site']['photo_domain_image_path']."/"; //a directory inside
    
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
		      // if ($size < (MAX_SIZE*1024))
		       //{
			   $image_name=time().$filename;
			   #echo "<img src='".$CFG['site']['photo_domain_image_url']."/".$image_name."' class='imgList'>";
			   $newname=$uploaddir.$image_name;
	           
	           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
	           {
	               
			       $time=time();
			       $status = $_POST['status'];
			       $page_list_id = $_POST['page_list_id'];
                   
                   
			       if($status == 'domainlogo')
    			       	{
    			       	    $objThumb   = new Thumbnail;  
                            $thumbsize  = $objCommon->GetValue("single_image_thumb_size",$CFG['table']['iconsetting'],"single_image_thumb_size!=''");
                            
                            $imagWH=getimagesize($newname);                            
                            $newwidth   = round(($imagWH[0]/$imagWH[1])*100);
                            $newheight  = ceil(($imagWH[1]/$imagWH[0])*$newwidth);
                            
                            $objThumb->createThumb($newname,$newname,$newwidth,$newheight,'auto');
                              
		       	            $sel_query=mysql_query("SELECT image_name FROM domain_images WHERE domain_id='".$domain_id."' AND page_id='".$page_id."' AND status='domainlogo'"); 
                             if(mysql_num_rows($sel_query) > 0) {
                               $result = mysql_result($sel_query,0,"image_name");
                             }
                            //$sel=mysql_query("SELECT temp_image_name FROM domain_images WHERE domain_id='".$domain_id."' AND page_id='".$page_id."' AND status='domainlogo'");
                            //if(mysql_num_rows($sel) > 0) 
                            //{
                            //   $temp_already = mysql_result($sel,0,"temp_image_name");
                           // }
                            mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='domainlogo',addeddate=now()");
                            $LastInsertedRow = mysql_insert_id();
                            mysql_query("DELETE from domain_images WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND status='".$status."' ");
                            mysql_query("INSERT INTO domain_images(domain_id,page_id,imagelib_id,temp_image_name,image_name,status) VALUES('".$domain_id."','".$page_id."','".$LastInsertedRow."','".$image_name."','".$result."','".$status."')");
                            
                            //if($temp_already!=$result)
                             //       @unlink($CFG['site']['photo_domain_image_path'].'/'.$temp_already);
    			     
    						mysql_query("UPDATE hi_temp_domaindetails SET header_logo_config = '2',publish_status='U' WHERE domain_id='".$domain_id."'");
    						
    					}
			       	if($status == 'bannerimage')
                        {                           
                               $sel_query="SELECT image_name FROM domain_images WHERE domain_id='".$domain_id."' AND page_id='".$page_id."' AND status='bannerimage'";
                               
                               $res_sel=mysql_query($sel_query);
                               $code = mysql_result($res_sel,0); 
                               //$sel_query1="SELECT temp_image_name FROM domain_images WHERE domain_id='".$domain_id."' AND page_id='".$page_id."' AND status='bannerimage'";
                              // $res_sel1=mysql_query($sel_query1);
                               //$temp_already = mysql_result($res_sel1,0); 
                              
                               mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='bannerimage',addeddate=now()");
                               $LastInsertedRow = mysql_insert_id();
                               mysql_query("DELETE from domain_images WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND status='".$status."' ");
                               mysql_query("INSERT INTO domain_images(domain_id,page_id,page_list_id,imagelib_id,temp_image_name,image_name,status) VALUES('".$domain_id."','".$page_id."','".$page_list_id."','".$LastInsertedRow."','".$image_name."','".$code."','".$status."')");
                               
                               //if($temp_already!=$code)
                                 //   @unlink($CFG['site']['photo_domain_image_path'].'/'.$temp_already);
                      
		       				   mysql_query("UPDATE hi_temp_domaindetails SET header_banner = '1',header_slider = '0',publish_status='U' WHERE domain_id='".$domain_id."'");
                               mysql_query("DELETE from hi_temp_banner_slider_images WHERE domain_id = '".$domain_id."'");
		                }
                    if($status=='single')
                        {
                    
                          $objThumb  = new Thumbnail;  
                          $thumbsize = $objCommon->GetValue("single_image_thumb_size",$CFG['table']['iconsetting'],"single_image_thumb_size!=''");
	                      $imagWH    = $objCommon->getThumbnailWidthHeight($newname,$thumbsize);
			              
                          $objThumb->createThumb($newname,$newname,$imagWH['width'],$imagWH['height'],'crop');  
                          
                          mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='single',addeddate=now()"); 
                          $LastInsertedRow = mysql_insert_id();
                          mysql_query("DELETE from hi_temp_single_images WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND page_list_id='".$page_list_id."'");
                          mysql_query("INSERT INTO hi_temp_single_images(page_id,domain_id,page_list_id,imagelib_id,image_name,status,publish_status) VALUES('".$page_id."','".$domain_id."','".$page_list_id."','".$LastInsertedRow."','".$image_name."','".$status."','U')");
                           
                           
                           
                        }
                    if($status=='singletext')
                        {
                          $objThumb  = new Thumbnail;  
                          $thumbsize = $objCommon->GetValue("img_txt_thumb_size",$CFG['table']['iconsetting'],"img_txt_thumb_size!=''");
	                      //$imagWH    = $objCommon->getThumbnailWidthHeight($newname,$thumbsize);
			             	$imagWH=getimagesize($newname);
							//$imagWH    = $objCommon->getThumbnailWidthHeight($newname,$thumbsize);  
                            $newheightsmall  = round($imagWH[1]);
							$newwidthsmall   = round($imagWH[0]);
							$newheight  = round(($imagWH[1]/$imagWH[0])*270);
							$newwidth   = round(($imagWH[0]/$imagWH[1])*$newheight);
							#echo $newheightsmall."hs".$newwidthsmall."ws".$newheight."h".$newwidth."w";
							if($newwidth > 269){
								$objThumb->createThumb($newname,$newname,$newwidth,$newheight,'auto');
							}
							else{
								$objThumb->createThumb($newname,$newname,$newwidthsmall,$newheightsmall,'auto');
							}
                         // $objThumb->createThumb($newname,$newname,$imagWH['width'],$imagWH['height'],'crop');  
                          //$myres    = mysql_query("SELECT image_name from hi_temp_imagetxt_images WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND page_list_id='".$page_list_id."' AND publish_status='U'");
                           
                          //if(mysql_num_rows($myres)){
                             // $res  = mysql_fetch_assoc($myres);
                             // $imagename_del   = $res['image_name'];
                             // @unlink($CFG['site']['photo_domain_image_path'].'/'.$imagename_del);
                          //} 
                           mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='singletext',addeddate=now()");                          
                           $LastInsertedRow = mysql_insert_id();
                           mysql_query("DELETE from hi_temp_imagetxt_images WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND page_list_id='".$page_list_id."'");
                           $result=  mysql_query("INSERT INTO hi_temp_imagetxt_images(domain_id,page_id,page_list_id,imagelib_id,image_name,status,publish_status) VALUES('".$domain_id."','".$page_id."','".$page_list_id."','".$LastInsertedRow."','".$image_name."','".$status."','U')"); 
                          
                        }
                    if($status=='backgroundimage')
                        {
                            $sel_query="SELECT image_name FROM domain_images WHERE domain_id='".$domain_id."' AND page_id='".$page_id."' AND status='backgroundimage'";
                               
                           $res_sel=mysql_query($sel_query);
                           $code = mysql_result($res_sel,0); 
                            mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='backgroundimage',addeddate=now()");
                            $LastInsertedRow = mysql_insert_id();
                            mysql_query("DELETE from domain_images WHERE domain_id = '".$domain_id."' AND page_id = '".$page_id."' AND status ='backgroundimage'");
                						mysql_query("INSERT INTO domain_images(domain_id,page_id,imagelib_id,temp_image_name,image_name,status) VALUES('".$domain_id."','".$page_id."','".$LastInsertedRow."','".$image_name."','".$code."','".$status."')");
                						mysql_query("UPDATE hi_temp_domaindetails SET background_enable = 'ON' WHERE domain_id='".$domain_id."'");
                        }
                        if($status=='columnImageText')
                        {

                          $objThumb  = new Thumbnail;  
                          $thumbsize = $objCommon->GetValue("single_image_thumb_size",$CFG['table']['iconsetting'],"single_image_thumb_size!=''");
                          $imagWH    = $objCommon->getThumbnailWidthHeight($newname,$thumbsize);
                    
                          $objThumb->createThumb($newname,$newname,$imagWH['width'],$imagWH['height'],'crop');  
                          
                          mysql_query("INSERT INTO ".$CFG['table']['imagelibrary']." SET user_id='".$_SESSION['user_id']."',image_name='".$image_name."',image_type='columnImage',addeddate=now()"); 
                          $LastInsertedRow = mysql_insert_id();
                          mysql_query("DELETE from hi_temp_column_text_images WHERE page_id = '".$page_id."' AND domain_id ='".$domain_id."' AND page_list_id='".$page_list_id."' AND column_id = '".$_POST['column_id']."' AND status = 'columnImageText' ");
                          mysql_query("INSERT INTO hi_temp_column_text_images(page_id,domain_id,page_list_id,imagelib_id,image_name,column_id,status,publish_status) VALUES('".$page_id."','".$domain_id."','".$page_list_id."','".$LastInsertedRow."','".$image_name."','".$_POST['column_id']."','".$status."','U')");

                        }
			       				 
						 
		       	}
		       else
		       {		          
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