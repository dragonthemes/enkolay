
<?php

class Thumbnail{
	
	private $image_p;
			
				function createThumb($filename ,$savePath,$width,$height, $thumbtype)
				{
					
					list($width_orig,$height_orig,$tt_width,$tt_height) = $this->getSizeByWidthHeight($filename,$width,$height, $thumbtype);
					
					// Resample
					$this->image_p 	= imagecreatetruecolor($tt_width, $tt_height);
                    //Remove black background for png image
                    $bg = imagecolortransparent($this->image_p);
                    imagefill($this->image_p, 0, 0, $bg );
                    
					$image		= $this->openImage($filename);
					imagecopyresampled($this->image_p, $image, 0, 0, 0, 0, $tt_width, $tt_height, $width_orig, $height_orig);
					imagealphablending($this->image_p,true);
                    imagesavealpha($this->image_p,true);
					// Output
					$this->saveImage($savePath, 100);
					
				}
				private function openImage($file)
				{
					// *** Get extension
					$extension = strtolower(strrchr($file, '.'));
		          
					switch($extension)
					{
						case '.jpg':
						case '.jpeg':
							$img = @imagecreatefromjpeg($file);
							break;
						case '.gif':
							$img = @imagecreatefromgif($file);
							break;
						case '.png':
							$img = @imagecreatefrompng($file);
							break;
                                                    
						default:
							$img = false;
							break;
					}
					return $img;
				}
				private function saveImage($savePath, $imageQuality="100")
				{
					// *** Get extension
		        	$extension = strtolower(strrchr($savePath, '.'));
		
					switch($extension)
					{
						case '.jpg':
						case '.jpeg':
							if (imagetypes() & IMG_JPG) {
								imagejpeg($this->image_p, $savePath, $imageQuality);
							}
				            break;
		
						case '.gif':
							if (imagetypes() & IMG_GIF) {
								imagegif($this->image_p, $savePath);
							}
							break;
		
						case '.png':
							// *** Scale quality from 0-100 to 0-9
							$scaleQuality = round(($imageQuality/100) * 9);
		
							// *** Invert quality setting as 0 is best, not 9
							$invertScaleQuality = 9 - $scaleQuality;
		
							if (imagetypes() & IMG_PNG) {
								imagepng($this->image_p, $savePath, $invertScaleQuality);
							}
							break;
		               
						// ... etc
		                          
						default:
							// *** No extension - No save.
							break;
					}
		
					imagedestroy($this->image_p);
				}
				private function getSizeByWidthHeight($file,$t_width,$t_height,$thumbtype)
				{	
					// Get new dimensions - width & height
					list($width_o, $height_o) = getimagesize($file);
					
					if($thumbtype == 'crop'){
						
						if( ($width_o > $t_width) && ($height_o > $t_height) )
						{
							$ratio_o = $width_o/$height_o;
						
							if ($t_width/$t_height > $ratio_o) {
							   $t_width = $t_height*$ratio_o;
							} else {
							   $t_height = $t_width/$ratio_o;
							}
						}else if( ($width_o > $t_width) )
						{
							$ratio_o = $width_o/$height_o;
						
							if ($t_width/$t_height > $ratio_o) {
							   $t_width = $t_height*$ratio_o;
							} else {
							   $t_height = $t_width/$ratio_o;
							}
						}
						else if( ($height_o > $t_height) )
						{
							$ratio_o = $width_o/$height_o;
						
							if ($t_width/$t_height > $ratio_o) {
							   $t_width = $t_height*$ratio_o;
							} else {
							   $t_height = $t_width/$ratio_o;
							}
						}else{
							$t_width = $width_o;
							$t_height = $height_o;
						}
					}
					
					
					return array($width_o,$height_o,$t_width,$t_height);
				}
				
}
?>
