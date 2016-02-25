<?php
include("../includes/FCKeditor/fckeditor.php");
$sBasePath = "../includes/FCKeditor/";
		
       	$oFCKeditor 			= new FCKeditor('content') ;
		$oFCKeditor->BasePath	= $sBasePath ;
		$oFCKeditor->Width		= 600 ;
		$oFCKeditor->Height		= 450 ;
		$oFCKeditor->Value		= '';
		$Editor 				= $oFCKeditor->Create() ;
		$objSmarty->assign("Editor", "$Editor");
		
		#Editor2
		$oFCKeditor2 			= new FCKeditor('content2') ;
		$oFCKeditor2->BasePath	= $sBasePath ;
		$oFCKeditor2->Width		= 600 ;
		$oFCKeditor2->Height		= 450 ;
		$oFCKeditor2->Value		= '';
		$Editor 				= $oFCKeditor->Create() ;
		$objSmarty->assign("Editor", "$Editor");

?>