<?php 
	/*	Class Function for ADMIN MANAGEMENT	*/

class AdminManagement extends Site
{
	
	#-------------------------------------------------------------------------------------------------------
	#Icon Set Value: 
	function iconSize(){
		global $CFG,$objSmarty;
		
		$iconset	=  $this->getMultiValue("banner_thumb_width,banner_thumb_height",$CFG['table']['iconsetting'],"admin_id='".$this->filterInput($_SESSION['adminid'])."'");			
		return $iconset;		
	}	
	
	#----------------------------Language Changes Coded By Bala--------------
	#--------------------------------------------------------------------------------
											#Language Management
	#--------------------------------------------------------------------------------
	#Add new Language name
	function LanguageNameAdd(){
		global $CFG;
		
		$lang_name = $this->filterInput($_POST["languagename"]);
		$lang_code = $this->filterInput(strtoupper($_POST["languagecode"]));	
		//$seourl    = $this->seoUrl($_POST['languagename']);	
		
		$noofrows = $this->getNumvalues($CFG['table']['language'] ,"lang_name='".$this->filterInput($lang_name)."' AND lang_code='".$this->filterInput($lang_code)."' ");       
	    
		if($noofrows != 0){
			echo "exist";
			exit();		
		}else{
			#Copy Entire folder (general) to another
			$sourcedir = $CFG['site']['language_path'].'/general';
			$destinationdir = $CFG['site']['language_path'].'/'.$lang_code;
			$this->copy_directory($sourcedir, $destinationdir);	
								
			$query = "INSERT INTO ".$CFG['table']['language']." SET lang_name='".$this->filterInput($lang_name)."', lang_code='".$this->filterInput($lang_code)."', addeddate = NOW()";
			$res   = $this->ExecuteQuery($query, "insert");
			echo "insert";
			exit();			
		}
	}
	#---------------------------------------------------------------------------------------
	#Language List
	function languageNameList(){
		global $CFG,$objSmarty;
		
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lnasc'){
			$sort = " ORDER BY lang_name ASC";
			$fields .= "&sortby=".$_REQUEST['sortby'];
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lndesc'){
			$sort = " ORDER BY lang_name DESC";
			$fields .= "&sortby=".$_REQUEST['sortby'];
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lcasc'){
			$sort = " ORDER BY lang_code ASC";
			$fields .= "&sortby=".$_REQUEST['sortby'];
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lcdesc'){
			$sort = " ORDER BY lang_code DESC";
			$fields .= "&sortby=".$_REQUEST['sortby'];
		}else{
			$sort = " ORDER BY lang_name ASC";
		}
		#Status
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
			$condition .= " AND lang_status = '1' ";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND lang_status = '0' ";
		}
				
		if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
			$limit = $_REQUEST['limit'];
			$fields = "&limit=$_REQUEST[limit]";
		 }else{
			$limit = PAGELIMIT; 	
		 }
		 							
		$page = $_REQUEST['page'];
		if ($page == 0) $page = 1;
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;
			
		 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
		 {
		   $sql_lim = $_REQUEST['limit'];
		 }else{
			$sql_lim = "$start, $limit";
		 }
		 
		 #Keyword
		 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			$keyword = "&keyword='".$_REQUEST[keyword]."'";
			$condition.="AND ( lang_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' OR  lang_code LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ) ";
			$fields .= "&keyword=$_REQUEST[keyword]";
		 }
		 
		
		$sql_sel = "SELECT lang_id, lang_name, lang_code, lang_site, lang_status, addeddate FROM ".$CFG['table']['language']." WHERE lang_id IS NOT NULL";
		$sql_sel .= " $condition $sort";
		//echo $sql_qry = " SELECT lang_code,lang_name,lang_status,addeddate FROM ".$CFG['table']['language']." WHERE country_ids LIKE '%".$CFG['site']['country_id'].",%' ";die();
		$total_pages = $this->ExecuteQuery($sql_sel,'norows');
		if($CFG['site']['log_status'] != '3')
			$targetpage = "languageManage.php";
		else 
			$targetpage = "languageManageAdmin.php";
		$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
		$sql_limit = $sql_sel." LIMIT ".$sql_lim;
		$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
		$cnt = 1;
		while($row_seller = mysql_fetch_array($result)){
			$row_seller['sno'] = (($page-1)*$limit)+$cnt.".";
			$categoryList[] =$row_seller;
			$cnt++;
		}	
		
		#From & To Records
		if($page == 1){
			$fromRecords 	= 1;
			$toRecords		= $limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}else{
			$fromRecords 	= $start+1;
			$toRecords		= $start+$limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}
		
		
		$objSmarty->assign("tablename",$CFG['table']['language']);
		$objSmarty->assign("whereField",'lang_id');
		$objSmarty->assign("fieldname",'lang_site');
		$objSmarty->assign("word",'Language');
		$objSmarty->assign("filename",'languageManageAdmin.php');
		$objSmarty->assign("page",$page);
		
		$objSmarty->assign("totalRecords", $total_pages);
		$objSmarty->assign("fromRecords", $fromRecords);
		$objSmarty->assign("toRecords", $toRecords);
		$objSmarty->assign("limit", $limit);
		
		$objSmarty->assign("languageName_list", $categoryList);
		$objSmarty->assign("pagination", $next_page);
	}
	#----------------------------------------------------------------------------------------------------
	#Edit language	
	function languageNameEdit(){
		global $CFG;
		
		$lang_name = $this->filterInput($_POST["languagename"]);
		$lang_code = $this->filterInput(strtoupper($_POST["languagecode"]));			
		//$seourl    = $this->seoUrl($_POST['statename']);
		
		$noforows  = $this->getNumvalues($CFG['table']['language'],"lang_name = '".($lang_name)."' AND lang_code = '".($lang_code)."' AND  lang_id != '".$this->filterInput($_POST['lang_id'])."'");
		if($noforows != 0){
			echo "exist";
			exit();
		}
		else{
			#Remove folder
			$sellangcode  = $this->getValue('lang_code',$CFG['table']['language'],"lang_id = '".$this->filterInput($_POST['lang_id'])."'");
			
			if( isset($sellangcode) && !empty($sellangcode) ){
				//$this->remove_directory($CFG['site']['language_path'].'/'.$sellangcode);
				rename($CFG['site']['language_path'].'/'.$sellangcode, $CFG['site']['language_path'].'/'.$lang_code);
				
				#Copy Entire folder (general) to another
				/*$sourcedir = $CFG['site']['language_path'].'/general';
				$destinationdir = $CFG['site']['language_path'].'/'.$lang_code;
				$this->copy_directory($sourcedir, $destinationdir);	*/
					
				$query = "UPDATE ".$CFG['table']['language']." SET lang_name = '".$this->filterInput($lang_name)."',lang_code ='".$this->filterInput($lang_code)."' WHERE lang_id = '".$this->filterInput($_POST['lang_id'])."' ";
				$res   = $this->ExecuteQuery($query, "update");
				echo "update";
				exit();
			}
			
			
		}
	}
	#Copy Entire Directory
	function copy_directory( $source, $destination ) {
		if ( is_dir( $source ) ) {
			
			@mkdir( $destination , 0777);
			$directory = dir( $source );
			while ( FALSE !== ( $readdirectory = $directory->read() ) ) {
				if ( $readdirectory == '.' || $readdirectory == '..' ) {
					continue;
				}
				$PathDir = $source . '/' . $readdirectory;
				if ( is_dir( $PathDir ) ) {
					$this->copy_directory( $PathDir, $destination . '/' . $readdirectory );
					continue;
				}
				copy( $PathDir, $destination . '/' . $readdirectory );
				@chmod($destination . '/' . $readdirectory, 0777);
			}
 
			$directory->close();
		}
		else {
			copy( $source, $destination );
			@chmod($destination, 0777);
		}
	}
	function remove_directory($dir) {
	   if (is_dir($dir)) {
	     $objects = scandir($dir);
	     foreach ($objects as $object) {
	       if ($object != "." && $object != "..") {
	         if (filetype($dir."/".$object) == "dir") $this->remove_directory($dir."/".$object); else unlink($dir."/".$object);
	       }
	     }
	     reset($objects);
	     rmdir($dir);
	   }
	 }
	 function list_directory_files($dir){
	 	
		if ($handle = opendir($dir)) {
	
		    /* This is the correct way to loop over the directory. */ 
		    while (false !== ($file = readdir($handle))) {
		    	if ($file != "." && $file != ".." && $file != "lang.php" && $file != ".svn") { 
		        	#echo "$file\n";
		        	//$file['langfilename'] = $file;
					 $files_list[] = $file;
		        }
		    }
		    closedir($handle); 
		}
		#echo "<pre>";print_r($files_list);echo "</pre>";
		return $files_list;
	}
	function updateLanguageFiles(){
		global $CFG;
		
		$lang_code  	= $this->getValue('lang_code',$CFG['table']['language'],"lang_id = '".$this->filterInput($_POST['langid'])."' ");
		$dirname  		= $CFG['site']['language_path']."/".$lang_code;
		$filename 		= stripslashes($_POST['lfile']);
		$somecontent 	= stripslashes($_POST['langfilecontent']);
		
		//echo $somecontent;
		
			if(is_dir($dirname) && file_exists($dirname."/".$filename)){
				
				// Let's make sure the file exists and is writable first.
				if (is_writable($dirname."/".$filename)){
					
					// In our example we're opening $filename in write mode.
					if (!$handle = fopen($dirname."/".$filename, 'w')) {
				         echo "Cannot open file ($filename)";
				         exit;
				    }
				    // Write $somecontent to our opened file.
				    if (fwrite($handle, $somecontent) === FALSE) {
				        echo "Cannot write to file ($filename)";
				        exit;
				    }
				    #echo "Success, wrote ($somecontent) to file ($filename)";

					fclose($handle);
				}else{
					echo 'The file '.$filename.' is not writable';
				}
			}
			echo 'success';
	}
	
	function selectuserprofile(){
		global $CFG,$objSmarty;
			$selqry = "SELECT username,password FROM ".$CFG['table']['admin']." where admin_id ='".$this->filterInput($SESSION['admin_id'])."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			//print_r($resqry);die();
			$objSmarty->assign('userval',$resqry); 
	}
	
    //muthu (Imagelisting)
    /**
     * AdminManagement::Imagelist()
     * 
     * @return void
     */
    function Imagelist()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY image_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY image_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY image_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND status LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		     if( isset($_REQUEST['domain_id'])){
		     $domain_id = "&domain_id=$_REQUEST[domain_id]"; 
			 $fields .= "&domain_id=$_REQUEST[domain_id]$fields ";
		     }
			$sql_sel = "SELECT img_id,domain_id,page_id,image_name,status FROM ".$CFG['table']['domain_images']." WHERE img_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "domainImageManage.php"; 
           // $fields = "&domain_id  '".$_REQUEST['domain_id']."' ";
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['domain_images']);
			$objSmarty->assign("whereField",'img_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'theme');
			$objSmarty->assign("filename",'domainImageManage.php');
			$objSmarty->assign("page",$page);
			$objSmarty->assign("field",$domain_id);
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domain_image", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
      /**
       * AdminManagement::pageList()
       * 
       * @return void
       */
      function pageList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY pagename ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY pagename DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY pagename ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['domain_id'])){
				$condition .= " AND domain_id = '".$this->filterInput($_REQUEST['domain_id'])."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND pagename LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		     if( isset($_REQUEST['domain_id'])){
		     $domain_id = "&domain_id=$_REQUEST[domain_id]"; 
			 $fields = "&domain_id=$_REQUEST[domain_id]$fields ";
		     }
			$sql_sel = "SELECT page_id,domain_id,pagename,seo_title,meta_key,page_desc FROM ".$CFG['table']['pages']." WHERE page_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			//$fields = "&domain_id  ='".$_REQUEST['domain_id']."' "; 
			$targetpage = "domainPageListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['pages']);
			$objSmarty->assign("whereField",'page_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'pagename');
			$objSmarty->assign("filename",'domainPageListManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
            $objSmarty->assign("field",$domain_id);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		} 
        
        /**
         * AdminManagement::pageListManage()
         * 
         * @return void
         */
        function pageListManage()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY page_id ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY page_id DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY page_id ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['page_id'])){
				$condition .= " AND page_id = '".$this->filterInput($_REQUEST['page_id'])."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 						
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit ";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND page_id LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		     
		     if( isset($_REQUEST['page_id'])){
		     $page_id = "&page_id=$_REQUEST[page_id]"; 
			 $fields = "&page_id=$_REQUEST[page_id]$fields ";
			 }
             
			$sql_sel = "SELECT pagelist,page_id,domain_id,text_title,text_description,image_select,image_text FROM ".$CFG['table']['page_list']." WHERE pagelist IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			$fields = "&page_id  '".$_REQUEST['page_id']."' ";  
			$targetpage = "pageListManage.php"; 
                    
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['page_list']);
			$objSmarty->assign("whereField",'pagelist');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'pagename');
			$objSmarty->assign("filename",'pageListManage.php');
			$objSmarty->assign("page",$page);
			$objSmarty->assign("field",$page_id);
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		} 
        
         /**
          * AdminManagement::ListPage()
          * 
          * @return void
          */
         function ListPage()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY pagename ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY pagename DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY pagename ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['domain_id'])){
				$condition .= " AND domain_id = '".$this->filterInput($_REQUEST['domain_id'])."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND pagename LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		     if( isset($_REQUEST['domain_id'])){
		     $domain_id = "&domain_id=$_REQUEST[domain_id]"; 
			 $fields = "&domain_id=$_REQUEST[domain_id]$fields ";
		     }
			$sql_sel = "SELECT page_id,domain_id,pagename,seo_title,meta_key,page_desc FROM ".$CFG['table']['pages']." WHERE page_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			//$fields = "&domain_id  ='".$_REQUEST['domain_id']."' "; 
			$targetpage = "domainPageListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['pages']);
			$objSmarty->assign("whereField",'page_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'pagename');
			$objSmarty->assign("filename",'domainPageListManage.php');
			$objSmarty->assign("page",$page);
			$objSmarty->assign("field",$domain_id);
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
            $objSmarty->assign("field",$domain_id);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		} 
     /**
      * AdminManagement::postList()
      * 
      * @return void
      */
     function postList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY title ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY title DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY title ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['domain_id'])){
				$condition .= " AND domain_id = '".$_REQUEST['domain_id']."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND title LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		     if( isset($_REQUEST['post_id '])){
		     $post_id = "&post_id =$_REQUEST[post_id]"; 
			 $fields .= "&post_id=$_REQUEST[post_id]$fields ";
		     }
			$sql_sel = "SELECT comment_id,domain_id,title,title_id,blog_id,comments,status,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']." WHERE comment_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "postListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['posttitle']);
			$objSmarty->assign("whereField",'post_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'pagename');
			$objSmarty->assign("filename",'postListManage.php');
			$objSmarty->assign("page",$page);
			$objSmarty->assign("field",$post_id);
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
       /**
        * AdminManagement::blogSetiingList()
        * 
        * @return void
        */
       function blogSetiingList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY notifyme_email ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY notifyme_email DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY notifyme_email ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['user_id'])){
				$condition .= " AND user_id = '".$_REQUEST['user_id']."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND notifyme_email LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		     if( isset($_REQUEST['domain_id'])){
		     $post_id = "&domain_id=$_REQUEST[domain_id]"; 
			 $fields .= "&domain_id=$_REQUEST[domain_id]$fields ";
		     }
			$sql_sel = "SELECT domain_id,user_id,blog_id,comment_default,notifyme_email,automaticallyclose,addeddate FROM ".$CFG['table']['blogsettings']." WHERE blog_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "blogSetingListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['blogsettings']);
			$objSmarty->assign("whereField",'post_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'pagename');
			$objSmarty->assign("filename",'blogSettingListManage.php');
			$objSmarty->assign("page",$page);
			$objSmarty->assign("field",$post_id);
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}      
             
      /**
       * AdminManagement::commentList()
       * 
       * @return void
       */
      function commentList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY title ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY title DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY title ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['blog_id'])){
				$condition .= " AND blog_id = '".$this->filterInput($_REQUEST['blog_id'])."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND title LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		    if( isset($_REQUEST['blog_id'])){
		     $blog_id = "&blog_id=$_REQUEST[blog_id]"; 
			 $fields .= "&blog_id=$_REQUEST[blog_id]$fields ";
		     }
		
			$sql_sel = "SELECT comment_id,domain_id,title,blog_id,comments,status,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']." WHERE comment_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "commentListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['commentdetails']);
			$objSmarty->assign("whereField",'comment_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'title');
			$objSmarty->assign("filename",'commentListManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}   
         
          
     /**
      * AdminManagement::siteList()
      * 
      * @return void
      */
     function siteList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY site_title ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY site_title DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY site_title ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
            
            if(isset($_REQUEST['domain_id'])){
				$condition .= " AND domain_id = '".$this->filterInput($_REQUEST['domain_id'])."' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND site_title LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT domain_id,subdomainurl,site_title,site_description,metakeywords,header_code,footer_code,addeddate FROM ".$CFG['table']['domaindetails']." WHERE domain_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "siteListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['pages']);
			$objSmarty->assign("whereField",'domain_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'site_title');
			$objSmarty->assign("filename",'siteListManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domainpage", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}   
        
     /**
      * AdminManagement::ImageTextlist()
      * 
      * @return void
      */
     function ImageTextlist()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY status ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY status DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY status ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND status LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT img_id,domain_id,page_id,image_name,status FROM ".$CFG['table']['domain_images']." WHERE img_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "domainImageManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['domain_images']);
			$objSmarty->assign("whereField",'img_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'theme');
			$objSmarty->assign("filename",'domainImageManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("domain_image", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
    function contactListManage()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY firstname ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY firstname DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY id DESC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND firstname LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			  $sql_sel = "SELECT id,domain_id,firstname,lastname,email,comments,commentor_ip,addeddate FROM ".$CFG['table']['contact']." WHERE id IS NOT NULL $condition $sort"; 
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
           
			
			$targetpage = "contactListManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['domain_images']);
			$objSmarty->assign("whereField",'id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'contacts');
			$objSmarty->assign("filename",'contactListManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("contacts", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
		
		
  /**
   * AdminManagement::InsertCurrencyFunction()
   *
   * @return void
   */
  function InsertCurrencyFunction()
		{	
			global $CFG,$objSmarty;
			
			$curremcy_code 	= $this->filterInput($_POST["currency_code"]);
			$currency_name 	= $this->filterInput($_POST["currency_name"]);
			$curremcy_symbol 	= $this->filterInput($_POST["symbol"]);
			$contentnum = $this->getNumvalues($CFG['table']['currencymanage'],"currency_code = '".$curremcy_code."'");
			if(isset($_FILES['currency_image']['name']) && !empty($_FILES['currency_image']['name']) )
				{		
					$logoext   = $this->getFileExtension($_FILES['currency_image']['name']);
					$logoname  = $this->seoUrl($_POST["currency_image"]).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_currency_images_path'].'/'.$logoimage;
				    $uploadsuccess = move_uploaded_file($_FILES['currency_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = @getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
				if($contentnum == '0'){
				if($_POST['currency_status']== '1')
					$status = '1';
				else
			
					$status = '0';
			if($contentnum == '0')
				{
				$query          = "INSERT INTO ".$CFG['table']['currencymanage']." SET currency_name = '".$this->filterInput($_POST['currency_name'])."', currency_code = '".$this->filterInput($_POST['currency_code'])."',currency_type = '".$this->filterInput($_POST['currency_type'])."',currency_symbol = '".$this->filterInput($_POST['symbol'])."',currency_status = '".$this->filterInput($status)."', added_date = NOW()";
				$LastInsertedId = $this->ExecuteQuery($query, "insert");
					#Copy Entire folder (theme) to another
				if($uploadsuccess)
						{
							$photo = "photo_".$logoname;
							$query = "UPDATE ".$CFG['table']['currencymanage']." SET currency_image = '".$this->filterInput($photo)."' WHERE id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
				$this->redirectUrl("currencyManage.php");	
			}
			}
		else
			{
				$objSmarty->assign('ErrorMessage','currency  code Name Already Exists');
			}	
	}
	
	
	function UpdateCurrencyFunction()
		{
			if($_POST['currency_status']=='1')
				$status = '1';
			else
				$status = '0';	
			global $CFG,$objSmarty,$objThumb;
			#Check already exist Banner Name:			
			$contentnum = $this->getNumvalues($CFG['table']['currencymanage'],"currency_name = '".$this->filterInput($_POST['currency_name'])."' and id !='".$this->filterInput($_GET['id'])."'");			
			if($contentnum == '0')
				{		
					$UpQuery  = "UPDATE ".$CFG['table']['currencymanage']." SET currency_name = '".$this->filterInput($_POST['currency_name'])."', currency_code = '".$this->filterInput($_POST['currency_code'])."',currency_symbol = '".$this->filterInput($_POST['symbol'])."',currency_status = '".$this->filterInput($status)."'  WHERE id  = '".$this->filterInput($_GET['id'])."' ";
					$UpResult = $this->ExecuteQuery($UpQuery,'update');
					$this->redirectUrl("currencyManage.php");	
				}
		}
	function currencyListManage()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY currency_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY currency_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY currency_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND firstname LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT id,currency_name,currency_code,currency_type,currency_symbol,currency_image,currency_status,added_date FROM ".$CFG['table']['currencymanage']." WHERE id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
           
			
			$targetpage = "currencyManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['currencymanage']);
			$objSmarty->assign("whereField",'id');
			$objSmarty->assign("fieldname",'currency_status');
			$objSmarty->assign("word",'currency name');
			$objSmarty->assign("filename",'currencyManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("currency", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	
		
	//kathir funtion starts
  /**
   * AdminManagement::InsertPriceFunction()
   * This function is used to insert a price 
   * @return void
   */
	function InsertPriceFunction()
		{	
			global $CFG,$objSmarty;
		
			if($contentnum == '0'){
				if($_POST['status']== '1')
					$status = '1';
				else
					$status = '0';	
				
				$query          = "INSERT INTO ".$CFG['table']['pricemanage']." SET price_name = '".$this->filterInput($_POST['price_name'])."', price_description = '".$this->filterInput($_POST['price_description'])."', price = '".$this->filterInput($_POST['price'])."',status = '".$this->filterInput($status)."'";
				$LastInsertedId = $this->ExecuteQuery($query, "insert");	
				$this->redirectUrl("pricemanage.php");	
			}
		else
			{
				$objSmarty->assign('ErrorMessage','Price Name Already Exists');
			}
		}
	
	  /**
	   * AdminManagement::updatePriceFunction()
	   * This funtion is used to update the price funtion 
	   * @return void
	   */
	function updatePriceFunction()
		{
			/*if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';	*/
			global $CFG,$objSmarty,$objThumb;
			#Check already exist Banner Name:			
			$contentnum = $this->getNumvalues($CFG['table']['pricemanage'],"price_name = '".$this->filterInput($_POST['price_name'])."' and price_id !='".$this->filterInput($_GET['price_id'])."'");			
			if($contentnum == '0')
				{		
					$UpQuery  = "UPDATE ".$CFG['table']['pricemanage']." SET price_name = '".$this->filterInput($_POST['price_name'])."', price_description = '".$this->filterInput($_POST['price_description'])."',status = '1',price = '".$this->filterInput($_POST['price'])."' WHERE price_id  = '".$this->filterInput($_GET['price_id'])."' ";
					$UpResult = $this->ExecuteQuery($UpQuery,'update');
					$this->redirectUrl("pricemanage.php");	
				}
		}	
	
  /**
   * AdminManagement::PriceList()
   * This function is used to list the price details 
   * @return void
   */
	function PriceList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY price_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY price_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY price_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND price_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT price_id,price,price_name, price_description, status FROM ".$CFG['table']['pricemanage']." WHERE price_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "pricemanage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)* $limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['pricemanage']);
			$objSmarty->assign("whereField",'price_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'price');
			$objSmarty->assign("filename",'pricemanage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("followers_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	
	//kathir
	function ThemeList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY theme_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY theme_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY theme_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND theme_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT theme_id,theme_name, theme_description, status,develop,addeddate FROM ".$CFG['table']['thememanage']." WHERE theme_id IS NOT NULL  AND deleted= 'no' $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "thememanage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['thememanage']);
			$objSmarty->assign("whereField",'theme_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'theme');
			$objSmarty->assign("filename",'thememanage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("followers_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	
  /**
   * AdminManagement::InsertThemeFunction()
   * This funtion is used to update the theme funtion
   * @return void
   */
	function InsertThemeFunction()
		{
			global $CFG,$objSmarty,$objThumb;
			$theme_name 	= $this->My_addslashes($_POST["theme_name"]);
			#Check Already Exist Banner Name:
			$contentnum = $this->getNumvalues($CFG['table']['thememanage'],"theme_name = '".$this->filterInput($theme_name)."'AND status = '1'");
			if(isset($_FILES['theme_image']['name']) && !empty($_FILES['theme_image']['name']) )
				{				
					$logoext   = $this->getFileExtension($_FILES['theme_image']['name']);
					$logoname  = $this->seoUrl($_POST["theme_name"]).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$logoimage;
				    $uploadsuccess = move_uploaded_file($_FILES['theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = @getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
			if(isset($_FILES['red_theme_image']['name']) && !empty($_FILES['red_theme_image']['name']) )
				{				
					$redlogoext   = $this->getFileExtension($_FILES['red_theme_image']['name']);
					$redlogoname  = $this->seoUrl($_POST["theme_name"]).".".$redlogoext;
					$redlogoimage = "photo_red_".$redlogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$redlogoimage;
				    $uploadredsuccess = move_uploaded_file($_FILES['red_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['green_theme_image']['name']) && !empty($_FILES['green_theme_image']['name']) )
				{				
					$greenlogoext   = $this->getFileExtension($_FILES['green_theme_image']['name']);
					$greenlogoname  = $this->seoUrl($_POST["theme_name"]).".".$greenlogoext;
					$greenlogoimage = "photo_green_".$greenlogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$greenlogoimage;
				    $uploadgreensuccess = move_uploaded_file($_FILES['green_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['orange_theme_image']['name']) && !empty($_FILES['orange_theme_image']['name']) )
				{				
					$orangelogoext   = $this->getFileExtension($_FILES['orange_theme_image']['name']);
					$orangelogoname  = $this->seoUrl($_POST["theme_name"]).".".$orangelogoext;
					$orangelogoimage = "photo_orange_".$orangelogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$orangelogoimage;
				    $uploadorangesuccess = move_uploaded_file($_FILES['orange_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['violet_theme_image']['name']) && !empty($_FILES['violet_theme_image']['name']) )
				{				
					$violetlogoext   = $this->getFileExtension($_FILES['violet_theme_image']['name']);
					$violetlogoname  = $this->seoUrl($_POST["theme_name"]).".".$violetlogoext;
					$violetlogoimage = "photo_violet_".$violetlogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$violetlogoimage;
				    $uploadvioletsuccess = move_uploaded_file($_FILES['violet_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			
			
			if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';
			
			if($contentnum == '0' && !empty($theme_name) && !empty($width)&& !empty($height))
				{
					$query          = "INSERT INTO ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($_POST['theme_name'])."', theme_description = '".$this->filterInput($_POST['theme_description'])."',status = '".$this->filterInput($status)."',addeddate='".$this->filterInput(time())."', deleted = 'no',develop = '0'";
					$LastInsertedId = $this->ExecuteQuery($query, "insert");
					
					#Copy Entire folder (theme) to another
				    $sourcedir = $CFG['site']['base_path'].'/theme/theme1';
					$destinationdir = $CFG['site']['base_path'].'/theme/'.strtolower($_POST['theme_name']);
					$this->copy_directory($sourcedir, $destinationdir);	
					#Image Upload And Update			    
					if($uploadsuccess)
						{
							$photo = "photo_".$logoname;
							$query = "UPDATE ".$CFG['table']['thememanage']." SET theme_image = '".$this->filterInput($photo)."', width = '".$this->filterInput($width)."',height = '".$this->filterInput($height)."' WHERE theme_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadredsuccess)
						{
							$photo = "photo_red_".$redlogoname;
							$query = "UPDATE ".$CFG['table']['thememanage']." SET red_theme_image = '".$this->filterInput($photo)."' WHERE theme_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadgreensuccess)
						{
							$photo = "photo_green_".$greenlogoname;
							$query = "UPDATE ".$CFG['table']['thememanage']." SET green_theme_image = '".$this->filterInput($photo)."' WHERE theme_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadorangesuccess)
						{
							$photo = "photo_orange_".$orangelogoname;
							$query = "UPDATE ".$CFG['table']['thememanage']." SET orange_theme_image = '".$this->filterInput($photo)."' WHERE theme_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadvioletsuccess)
						{
							$photo = "photo_violet_".$violetlogoname;
							$query = "UPDATE ".$CFG['table']['thememanage']." SET violet_theme_image = '".$this->filterInput($photo)."' WHERE theme_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
                     $this->redirectUrl("thememanage.php");					
				}	
			else
				{
					$objSmarty->assign('Errormessage','Theme Name Already Exists try with another name');
                    //$this->redirectUrl("thememanageadd.php");
				}						
				
		}
	
	  /**
	   * AdminManagement::updateThemeFunction()
	   * This funtion is used to update the price funtion 
	   * @return void
	   */
	function updateThemeFunction()
		{
			global $CFG,$objSmarty,$objThumb;
			$theme_name 	= $this->My_addslashes($_POST["theme_name"]);
			if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';
			#Check already exist Banner Name:			
			$contentnum = $this->getNumvalues($CFG['table']['thememanage'],"theme_name = '".$this->filterInput($_POST['theme_name'])."' AND theme_id != '".$this->filterInput($_GET['theme_id'])."'");
			
			
			#Check With Banner Image size:
			if(isset($_FILES['theme_image']['name']) && !empty($_FILES['theme_image']['name']) )
			  {	
			  		$getphotoname = $this->getValue("theme_image",$CFG['table']['thememanage'],"theme_id = '".$this->filterInput($_GET['theme_id'])."' ");
					if(!empty($getphotoname)){
						@unlink($CFG['site']['photo_theme_path'].'/'.$getphotoname);
					}
					
					$logoext   = $this->getFileExtension($_FILES['theme_image']['name']);
					$logoname  = $this->seoUrl($_POST["theme_name"].$_GET['theme_id']).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$logoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
			if(isset($_FILES['red_theme_image']['name']) && !empty($_FILES['red_theme_image']['name']) )
			  {	
			  		$getredphotoname = $this->getValue("theme_image",$CFG['table']['thememanage'],"theme_id = '".$this->filterInput($_GET['theme_id'])."' ");
					if(!empty($getredphotoname)){
						@unlink($CFG['site']['photo_theme_path'].'/'.$getredphotoname);
					}
					
					$redlogoext   = $this->getFileExtension($_FILES['red_theme_image']['name']);
					$redlogoname  = $this->seoUrl($_POST["theme_name"].$_GET['theme_id']).".".$redlogoext;
					$redlogoimage = "photo_red_".$redlogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$redlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['red_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
				}
			if(isset($_FILES['green_theme_image']['name']) && !empty($_FILES['green_theme_image']['name']) )
			  {	
			  		$getgreenphotoname = $this->getValue("theme_image",$CFG['table']['thememanage'],"theme_id = '".$this->filterInput($_GET['theme_id'])."' ");
					if(!empty($getgreenphotoname)){
						@unlink($CFG['site']['photo_theme_path'].'/'.$getgreenphotoname);
					}
					
					$greenlogoext   = $this->getFileExtension($_FILES['green_theme_image']['name']);
					$greenlogoname  = $this->seoUrl($_POST["theme_name"].$_GET['theme_id']).".".$greenlogoext;
					$greenlogoimage = "photo_green_".$greenlogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$greenlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['green_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['orange_theme_image']['name']) && !empty($_FILES['orange_theme_image']['name']) )
			  {	
			  		$getorangephotoname = $this->getValue("theme_image",$CFG['table']['thememanage'],"theme_id = '".$this->filterInput($_GET['theme_id'])."' ");
					if(!empty($getorangephotoname)){
						@unlink($CFG['site']['photo_theme_path'].'/'.$getorangephotoname);
					}
					
					$orangelogoext   = $this->getFileExtension($_FILES['orange_theme_image']['name']);
					$orangelogoname  = $this->seoUrl($_POST["theme_name"].$_GET['theme_id']).".".$orangelogoext;
					$orangelogoimage = "photo_orange_".$orangelogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$orangelogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['orange_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
				}
			if(isset($_FILES['violet_theme_image']['name']) && !empty($_FILES['violet_theme_image']['name']) )
			  {	
			  		$getvioletphotoname = $this->getValue("theme_image",$CFG['table']['thememanage'],"theme_id = '".$this->filterInput($_GET['theme_id'])."' ");
					if(!empty($getvioletphotoname)){
						@unlink($CFG['site']['photo_theme_path'].'/'.$getvioletphotoname);
					}
					
					$violetlogoext   = $this->getFileExtension($_FILES['violet_theme_image']['name']);
					$violetlogoname  = $this->seoUrl($_POST["theme_name"].$_GET['theme_id']).".".$violetlogoext;
					$violetlogoimage = "photo_violet_".$violetlogoname;
					$dest_name = $CFG['site']['photo_theme_path'].'/'.$violetlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['violet_theme_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			  }
				
					
			if($contentnum == '0' && !empty($theme_name))
				{	
					if(isset($_FILES['theme_image']['name']) && !empty($_FILES['theme_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($theme_name)."', theme_description = '".$this->filterInput($_POST['theme_description'])."',theme_image = '".$this->filterInput($logoimage)."',width = '".$this->filterInput($width)."',height = '".$this->filterInput($height)."',status = '".$this->filterInput($status)."' WHERE theme_id  = '".$this->filterInput($_GET['theme_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['red_theme_image']['name']) && !empty($_FILES['red_theme_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($theme_name)."', theme_description = '".$this->filterInput($_POST['theme_description'])."',red_theme_image = '".$this->filterInput($redlogoimage)."',status = '".$this->filterInput($status)."' WHERE theme_id  = '".$this->filterInput($_GET['theme_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['green_theme_image']['name']) && !empty($_FILES['green_theme_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($theme_name)."', theme_description = '".$this->filterInput($_POST['theme_description'])."',green_theme_image = '".$this->filterInput($greenlogoimage)."',status = '".$this->filterInput($status)."' WHERE theme_id  = '".$this->filterInput($_GET['theme_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['orange_theme_image']['name']) && !empty($_FILES['orange_theme_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($theme_name)."', theme_description = '".$this->filterInput($_POST['theme_description'])."',orange_theme_image = '".$this->filterInput($orangelogoimage)."',status = '".$this->filterInput($status)."' WHERE theme_id  = '".$this->filterInput($_GET['theme_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					  }
					if(isset($_FILES['violet_theme_image']['name']) && !empty($_FILES['violet_theme_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($theme_name)."', theme_description = '".$this->filterInput($_POST['theme_description'])."',violet_theme_image = '".$this->filterInput($violetlogoimage)."',status = '".$this->filterInput($status)."' WHERE theme_id  = '".$this->filterInput($_GET['theme_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					$UpQuery  = "UPDATE ".$CFG['table']['thememanage']." SET theme_name = '".$this->filterInput($theme_name)."', theme_description = '".$this->filterInput($_POST['theme_description'])."',status = '".$this->filterInput($status)."' WHERE theme_id  = '".$this->filterInput($_GET['theme_id'])."' ";
					$UpResult = $this->ExecuteQuery($UpQuery,'update');
					
					$this->redirectUrl("thememanage.php");	
				}
			else
				{
					$objSmarty->assign('ErrorMessage','Theme Name Already Exists');
				}
		}			
		
	//ends	
	function domainWholeList()
		{
			global $CFG,$objSmarty;
			if(isset($_GET['sortby']) && $_GET['sortby'] == 'tasc'){
				$sort = " ORDER BY domain_name ASC";
				$fields .= "&sortby=tasc";
			}elseif(isset($_GET['sortby']) && $_GET['sortby'] == 'tdesc'){
				$sort = " ORDER BY domain_name DESC";
				$fields .= "&sortby=tdesc";
			}else{
				$sort .= " ORDER BY domain_name ASC";
			}
			
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'publish' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = 'unpublish' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			 }else{
				$limit = PAGELIMIT; 	
			 }
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			{
			   $sql_lim = $_REQUEST['limit'];
			}else{
				$sql_lim = "$start, $limit";
			}
			 
			#Keyword
			if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND domain_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]";
			}
			 
			$sql_sel = "SELECT newdomainid,domain_name,user_id,domain_id,status,addeddate FROM ".$CFG['table']['new_domain']." Where newdomainid IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "domainManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] 	= (($page-1)*$limit)+$cnt.".";
				$categoryList[] 	= $row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			$objSmarty->assign("tablename",$CFG['table']['new_domain']);
			$objSmarty->assign("whereField",'newdomainid');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'Domain');
			$objSmarty->assign("filename",'domainManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			
			$objSmarty->assign("domaindetails", $categoryList);
			$objSmarty->assign("pagination", $next_page);
		}
	function orderList()
		{
			global $CFG,$objSmarty;
			if(isset($_GET['sortby']) && $_GET['sortby'] == 'tasc'){
				$sort = " ORDER BY grand_total ASC";
				$fields .= "&sortby=tasc";
			}elseif(isset($_GET['sortby']) && $_GET['sortby'] == 'tdesc'){
				$sort = " ORDER BY grand_total DESC";
				$fields .= "&sortby=tdesc";
			}else{
				$sort .= " ORDER BY grand_total ASC";
			}
			
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'Ordered'){
				$condition .= " AND status = 'Ordered' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'Shipped'){
				$condition .= " AND status = 'Shipped' ";
			}
            elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'Refund'){
				$condition .= " AND status = 'Refund' ";
			}
            elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cancel'){
				$condition .= " AND status = 'cancel' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			 }else{
				$limit = PAGELIMIT; 	
			 }
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			{
			   $sql_lim = $_REQUEST['limit'];
			}else{
				$sql_lim = "$start, $limit";
			}
			 
			#Keyword
			if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND amount LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]";
			}
			 
			$sql_sel = "SELECT order_id,domain_id,order_no,sub_total,tax_val,ship_val,grand_total,payer_email,receiver_mail,order_status FROM ".$CFG['table']['order']." Where order_id IS NOT NULL $condition $sort";
			 $total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "orderManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] 	= (($page-1)*$limit)+$cnt.".";
				$categoryList[] 	= $row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			$objSmarty->assign("tablename",$CFG['table']['order_product']);
			$objSmarty->assign("whereField",'order_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'Domain');
			$objSmarty->assign("filename",'orderManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			
			$objSmarty->assign("orderlist", $categoryList);
			$objSmarty->assign("pagination", $next_page);
		}	
		function pointdomainWholeList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_GET['sortby']) && $_GET['sortby'] == 'tasc'){
				$sort = " ORDER BY point_domain ASC";
				$fields .= "&sortby=tasc";
			}elseif(isset($_GET['sortby']) && $_GET['sortby'] == 'tdesc'){
				$sort = " ORDER BY point_domain DESC";
				$fields .= "&sortby=tdesc";
			}else{
				$sort .= " ORDER BY point_domain ASC";
			}
			
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'pointed' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = 'unpointed' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			 }else{
				$limit = PAGELIMIT; 	
			 }
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			{
			   $sql_lim = $_REQUEST['limit'];
			}else{
				$sql_lim = "$start, $limit";
			}
			 
			#Keyword
			if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND point_domain LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]";
			}
			 
			    $sql_sel = "SELECT point_id,domain_id,point_domain,user_id,status,addeddate FROM ".$CFG['table']['point']." Where point_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "pointdomainManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] 	= (($page-1)*$limit)+$cnt.".";
				$categoryList[] 	= $row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			$objSmarty->assign("tablename",$CFG['table']['point']);
			$objSmarty->assign("whereField",'point_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'Domain');
			$objSmarty->assign("filename",'pointdomainManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			
			$objSmarty->assign("domaindetails", $categoryList);
			$objSmarty->assign("pagination", $next_page);
		}
	
  /**
   * AdminManagement::getManageUser()
   * This function is used to list the user and their details 
   * @return void
   */
	function getManageUser()
		{
			global $CFG,$objSmarty;
			
			/*$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			$objSmarty->assign("usermanage", $sqlres);
            global $CFG,$objSmarty;*/
		
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
			$sort = " ORDER BY username ASC";
			$fields .= "&sortby=casc";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
			$sort = " ORDER BY username DESC";
			$fields .= "&sortby=cdesc";
		}else{
			$sort .= " ORDER BY user_id DESC";
		}
		
		#Status
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
			$condition .= " AND log_status = '2' ";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND log_status = '0' ";
		}
        /*else isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND log_status = '0' ";
		}*/
				
		if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
			$limit = $_REQUEST['limit'];
			$fields = "&limit=$_REQUEST[limit]";
		}else{
			$limit = PAGELIMIT; 	
		}
		 							
		$page = $_REQUEST['page'];
		if ($page == 0) $page = 1;
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;
			
		 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
		 {
		   $sql_lim = $_REQUEST['limit'];
		 }else{
			$sql_lim = "$start, $limit";
		 }
		 
		 #Keyword
		 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			$keyword = "&keyword=$_REQUEST[keyword]";
			$condition.="AND username LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
			$fields .= "&keyword=$_REQUEST[keyword]$fields";
		 }
        $sqlsel = "SELECT user_id,username,email,password,theme,log_status,addeddate FROM ".$CFG['table']['register']." WHERE  user_id IS NOT NULL $condition $sort"; 
		$total_pages = $this->ExecuteQuery($sqlsel,'norows');
		
		$targetpage = "userManage.php"; 
		$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
		$sql_limit = $sqlsel." LIMIT ".$sql_lim;
		$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
		$cnt = 1;
		while($row_seller = mysql_fetch_array($result)){
			$row_seller['sno'] = (($page-1)*$limit)+$cnt;
			$categoryList[] =$row_seller;
			//
			$cnt++;
		}
		
		#From & To Records
		if($page == 1){
			$fromRecords 	= 1;
			$toRecords		= $limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}else{
			$fromRecords 	= $start+1;
			$toRecords		= $start+$limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}
		
		
		$objSmarty->assign("tablename",$CFG['table']['register']);
		$objSmarty->assign("whereField",'user_id');
		$objSmarty->assign("fieldname",'log_status');
		$objSmarty->assign("word",'username');
		$objSmarty->assign("filename",'userManage.php');
		$objSmarty->assign("page",$page);
		
		$objSmarty->assign("totalRecords", $total_pages);
		$objSmarty->assign("fromRecords", $fromRecords);
		$objSmarty->assign("toRecords", $toRecords);
		$objSmarty->assign("limit", $limit);
		
		$objSmarty->assign("usermanage", $categoryList); 
		$objSmarty->assign("pagination", $next_page);
		}
        
	/*PaypalTransactionList*/
    
    function getTransaction()
		{
			global $CFG,$objSmarty;
			
			/*$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			$objSmarty->assign("usermanage", $sqlres);
            global $CFG,$objSmarty;*/
		
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
			$sort = " ORDER BY user_id ASC";
			$fields .= "&sortby=casc";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
			$sort = " ORDER BY user_id DESC";
			$fields .= "&sortby=cdesc";
		}else{
			$sort .= " ORDER BY user_id DESC";
		}
		
		#Status
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'completed'){
			$condition .= " AND payment_status 	 = 'completed' ";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'uncompleted'){
			$condition .= " AND payment_status 	 = 'uncompleted' ";
		}
        /*else isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND log_status = '0' ";
		}*/
				
		if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
			$limit = $_REQUEST['limit'];
			$fields = "&limit=$_REQUEST[limit]";
		}else{
			$limit = PAGELIMIT; 	
		}
		 							
		$page = $_REQUEST['page'];
		if ($page == 0) $page = 1;
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;
			
		 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
		 {
		   $sql_lim = $_REQUEST['limit'];
		 }else{
			$sql_lim = "$start, $limit";
		 }
		 
		 #Keyword
		 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			$keyword = "&keyword=$_REQUEST[keyword]";
			$condition.="AND  rg.username LIKE '%".$this->filterInput($_REQUEST['keyword'])."%'";
			$fields .= "&keyword=$_REQUEST[keyword]$fields";
		 }
            $sqlsel = "SELECT pt.user_id,pt.payment_fee,pt.payment_gross,pt.txn_id,pt.payment_date,pt.payment_status,pt.payment_types FROM ".$CFG['table']['paypal_transaction']." AS pt LEFT JOIN ".$CFG['table']['register']." AS rg ON pt.user_id=rg.user_id WHERE  pt.user_id IS NOT NULL $condition $sort";
    		$total_pages = $this->ExecuteQuery($sqlsel,'norows');
		
		$targetpage = "transactions.php"; 
		$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
		$sql_limit = $sqlsel." LIMIT ".$sql_lim;
		$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
		$cnt = 1;
		while($row_seller = mysql_fetch_array($result)){
			$row_seller['sno'] = (($page-1)*$limit)+$cnt;
			$categoryList[] =$row_seller;
			//
			$cnt++;
		}
		
		#From & To Records
		if($page == 1){
			$fromRecords 	= 1;
			$toRecords		= $limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}else{
			$fromRecords 	= $start+1;
			$toRecords		= $start+$limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}
		
		
		$objSmarty->assign("tablename",$CFG['table']['paypal_transaction']);
		$objSmarty->assign("whereField",'user_id');
		$objSmarty->assign("fieldname",'payment_status');
		$objSmarty->assign("word",'payment_fee');
		$objSmarty->assign("filename",'transactions.php');
		$objSmarty->assign("page",$page);
		
		$objSmarty->assign("totalRecords", $total_pages);
		$objSmarty->assign("fromRecords", $fromRecords);
		$objSmarty->assign("toRecords", $toRecords);
		$objSmarty->assign("limit", $limit);
		
		$objSmarty->assign("transactions", $categoryList); 
		$objSmarty->assign("pagination", $next_page);
		}
    
  /**
   * AdminManagement::getDomainDetailsOfParticularUser()
   * This function is used to list the domain details of the patricular user based on the user id
   * @return void
   */
	function getDomainDetailsOfParticularUser()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT domain_id,blog_id,store_id,user_id,theme_id,subdomainurl,site_title,metakeywords,footer_code,header_code,addeddate FROM ".$CFG['table']['domaindetails']."  WHERE user_id ='".$_GET['user_id']."'";
            if($_GET['paging'] == 'theme')
               $sqlsel .= " AND theme_id != '0'";
            else if($_GET['paging'] == 'blog')
               $sqlsel .= " AND blog_id != '0'";
            else 
               $sqlsel .= " AND store_id != '0'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
		    $objSmarty->assign('domaindetails',$sqlres);
		}
	
  /**
   * AdminManagement::getCommonSingleSelection()
   * This function is used to update the common single selection of value
   * @param mixed $fieldname
   * @param mixed $tablename
   * @param mixed $condt
   * @param mixed $condvalue
   * @return void
   */
	function getCommonSingleSelection($fieldname,$tablename,$condt,$condvalue)
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT ".$fieldname." FROM ".$tablename." WHERE $condt =". $this->filterInput($condvalue);
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			return $sqlres[0][$fieldname];
		}
	
  /**
   * AdminManagement::newBannerAdd()
   * This function is used to add a new banner 
   * @return void
   */
	function newBannerAdd(){
		global $CFG,$objSmarty,$objThumb;
	
		$banner_name 	= $this->filterInput($_POST["banner_name"]);
		$banner_title 	= $this->filterInput($_POST["content"]);
		
		$banner_title_seourl  = $this->seoUrl($_POST["content"]);
		
		#Check Already Exist Banner Name:
		$contentnum = $this->getNumvalues($CFG['table']['banner'],"banner_name = '".($banner_name)."'");
		
		#Check With Banner Image size:
		if(isset($_FILES['banner_image']['name']) && !empty($_FILES['banner_image']['name']) )
		{				
				$logoext   = $this->getFileExtension($_FILES['banner_image']['name']);
				$logoname  = $this->seoUrl($_POST["banner_name"].$CFG['site']['domain_id']).".".$logoext;
				$logoimage = "photo_".$logoname;
				$dest_name = $CFG['site']['photo_banner_path'].'/'.$logoimage;
				
				$uploadsuccess = @move_uploaded_file($_FILES['banner_image']['tmp_name'], $dest_name);
				@chmod($dest_name,0777);
		
				$test = @getimagesize($dest_name);
				$width = $test[0];
				$height = $test[1];
				 
			
				$iconset = $this->iconSize(); 
				$banner_width	=	$iconset['0']['banner_thumb_width'];
				$banner_height	=	$iconset['0']['banner_thumb_height'];
				 
		}
			
		if($contentnum == '0')
		{
			 if($width >= $banner_width && $height >= $banner_height)
			 	{
					if(!empty($banner_title))
						{
							$query          = "INSERT INTO ".$CFG['table']['banner']." SET banner_name = '".$banner_name."', banner_title = '".$banner_title."', addeddate = NOW()";
							$LastInsertedId = $this->ExecuteQuery($query, "insert");		
							
							#Image Upload And Update			    
							if($uploadsuccess)
								{
								
								#Get Thumbnail width & height
									$userlogothumb = $this->iconSettingValues();
									
									#Create Thumbnail
									$sour_imagepath = $dest_name;
									$photo_thumb = "thumb_".$logoname;
									
									#echo "source_image: $sour_imagepath";
									#exit();
									
									$dest_imagepath = $CFG['site']['photo_banner_path'].'/'.$photo_thumb;
									$objThumb->createThumb($sour_imagepath,$dest_imagepath,$userlogothumb[0]['banner_thumbsmall_width'],$userlogothumb[0]['banner_thumbsmall_height'],'exact');	
									
									$photo = "photo_".$logoname;
									$query = "UPDATE ".$CFG['table']['banner']." SET banner_image = '".$this->filterInput($photo)."', banner_thumb = '".$this->filterInput($photo_thumb)."' WHERE banner_id = '".$this->filterInput($LastInsertedId)."' ";
									$res = $this->ExecuteQuery($query, "update");
									$this->redirectUrl("bannerManage.php");
								}
						}
					else
						{
							$objSmarty->assign("ErrorMessage", 'Banner Title should not be blank');
							@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);
						}
				}
			else
				{
					$objSmarty->assign("ErrorMessage", 'Banner Image should  be '. $banner_width.'*'.$banner_height);
					@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);				
				}
			}
			else{
			$objSmarty->assign("ErrorMessage", 'Content '.$banner_name.' already exists');
			@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);
		}
	}
	#--------------------------------------------------------------------------------
	#Edit Banner
  /**
   * AdminManagement::editBanner()
   * This function is used to edit the banner
   * @return void
   */
	function editBanner(){
		global $CFG,$objSmarty,$objThumb;
		
		$banner_name 	= $_POST["banner_name"];
		$banner_title 	= $_POST["content"];

		#Check already exist Banner Name:			
		$contentnum = $this->getNumvalues($CFG['table']['banner'],"banner_name = '".$this->filterInput($banner_name)."' AND banner_id != '".$this->filterInput($_GET['banner_id'])."'");
		
		#Check With Banner Image size:
		if(isset($_FILES['banner_image']['name']) && !empty($_FILES['banner_image']['name']) )
		{	
				$getphotoname = $this->getValue("banner_image",$CFG['table']['banner'],"banner_id = '".$this->filterInput($_GET['banner_id'])."' ");
				if(!empty($getphotoname)){
					@unlink($CFG['site']['photo_banner_path'].'/'.$getphotoname);
				}
				
				$logoext   = $this->getFileExtension($_FILES['banner_image']['name']);
				$logoname  = $this->seoUrl($_POST["banner_name"].$CFG['site']['domain_id']).".".$logoext;
				$logoimage = "photo_".$logoname;
				$dest_name = $CFG['site']['photo_banner_path'].'/'.$logoimage;
				
				$uploadsuccess = @move_uploaded_file($_FILES['banner_image']['tmp_name'], $dest_name);
				@chmod($dest_name,0777);
		
		$test = getimagesize($dest_name);
		$width = $test[0];
		$height = $test[1];
		
		$iconset = $this->iconSize(); 
		$banner_width	=	$iconset['0']['banner_thumb_width'];
		$banner_height	=	$iconset['0']['banner_thumb_height'];
		
		}
			
		if($contentnum == '0')
			{		
				if($width >= $banner_width && $height >= $banner_height)
					{
						if(!empty($banner_title))
							{
								$UpQuery  = "UPDATE ".$CFG['table']['banner']." SET banner_name = '".$this->filterInput($banner_name)."', banner_title = '".$this->filterInput($banner_title)."' WHERE banner_id  = '".$this->filterInput($_GET['banner_id'])."' ";
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
		
							#Image Upload And Update
							if($uploadsuccess)
								{
								
									#Get Thumbnail width & height
									$userlogothumb = $this->iconSettingValues();
									
									#Create Thumbnail
									$sour_imagepath = $dest_name;
									$photo_thumb = "thumb_".$logoname;
									
									#echo "source_image: $sour_imagepath";
									#exit();
									
									$dest_imagepath = $CFG['site']['photo_banner_path'].'/'.$photo_thumb;
									$objThumb->createThumb($sour_imagepath,$dest_imagepath,$userlogothumb[0]['banner_thumbsmall_width'],$userlogothumb[0]['banner_thumbsmall_height'],'exact');						
									
									$photo = "photo_".$logoname;				
									$query = "UPDATE ".$CFG['table']['banner']." SET banner_image = '".$this->filterInput($photo)."',banner_thumb = '".$this->filterInput($photo_thumb)."' WHERE banner_id = '".$this->filterInput($_GET['banner_id'])."' ";
									$res = $this->ExecuteQuery($query, "update");
									$this->redirectUrl("bannerManage.php");		
								}
							}
						else
							{
								$objSmarty->assign("ErrorMessage", 'Banner Title should not be blank');
								@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);
							}
					 }
					 else
					 	{
							$objSmarty->assign("ErrorMessage", 'Banner Image should  be '. $banner_width.'*'.$banner_height);
							@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);
						}			 												
			
			} 
		else
			{
				$objSmarty->assign("ErrorMessage", 'Content '.$banner_name.' already exists');
				@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);
			}	
			
	}
	#--------------------------------------------------------------------------------
	#Banners List manage
   /**
   * AdminManagement::bannerList()
   * This function is used to banner list 
   * @return void
   */
	function bannerList(){
		global $CFG,$objSmarty;
		
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
			$sort = " ORDER BY banner_name ASC";
			$fields .= "&sortby=casc";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
			$sort = " ORDER BY banner_name DESC";
			$fields .= "&sortby=cdesc";
		}else{
			$sort .= " ORDER BY banner_name ASC";
		}
		
		#Status
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
			$condition .= " AND status = '1' ";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND status = '0' ";
		}
				
		if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
			$limit = $_REQUEST['limit'];
			$fields = "&limit=$_REQUEST[limit]";
		}else{
			$limit = PAGELIMIT; 	
		}
		 							
		$page = $_REQUEST['page'];
		if ($page == 0) $page = 1;
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;
			
		 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
		 {
		   $sql_lim = $_REQUEST['limit'];
		 }else{
			$sql_lim = "$start, $limit";
		 }
		 
		 #Keyword
		 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			$keyword = "&keyword=$_REQUEST[keyword]";
			$condition.="AND banner_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
			$fields .= "&keyword=$_REQUEST[keyword]$fields";
		 }
		 
		
		$sql_sel = "SELECT banner_id, banner_name, banner_title, banner_image, banner_thumb, status, addeddate FROM ".$CFG['table']['banner']." WHERE  banner_id IS NOT NULL $condition $sort";
		$total_pages = $this->ExecuteQuery($sql_sel,'norows');
		
		$targetpage = "bannerManage.php"; 
		$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
		$sql_limit = $sql_sel." LIMIT ".$sql_lim;
		$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
		$cnt = 1;
		while($row_seller = mysql_fetch_array($result)){
			$row_seller['sno'] = (($page-1)*$limit)+$cnt;
			$categoryList[] =$row_seller;
			$cnt++;
		}
		
		#From & To Records
		if($page == 1){
			$fromRecords 	= 1;
			$toRecords		= $limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}else{
			$fromRecords 	= $start+1;
			$toRecords		= $start+$limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}
		
		
		$objSmarty->assign("tablename",$CFG['table']['banner']);
		$objSmarty->assign("whereField",'banner_id');
		$objSmarty->assign("fieldname",'status');
		$objSmarty->assign("word",'banner');
		$objSmarty->assign("filename",'bannerManage.php');
		$objSmarty->assign("page",$page);
		
		$objSmarty->assign("totalRecords", $total_pages);
		$objSmarty->assign("fromRecords", $fromRecords);
		$objSmarty->assign("toRecords", $toRecords);
		$objSmarty->assign("limit", $limit);
		
		$objSmarty->assign("followers_List", $categoryList); 
		$objSmarty->assign("pagination", $next_page);
	}
	
  /**
   * AdminManagement::getActivitiesList()
   * This function is used to list the recent activites 
   * @return void
   */
	function getActivitiesList()
		{
			global $CFG,$objSmarty;
			$sqlsel = "SELECT id,user_id,activity,addeddate FROM ".$CFG['table']['recentactivity']."";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');			
			$objSmarty->assign("activities", $sqlres);
		}
	
  /**
   * AdminManagement::InsertBlogFunction()
   * This function  is used to insert the blog management
   * @return void
   */
	function InsertBlogFunction()
		{
			global $CFG,$objSmarty,$objThumb;
			$blog_name 	= $this->filterInput($_POST["blog_name"]);
			$blog_description 	= $this->filterInput($_POST["blog_description"]);
			#Check Already Exist Banner Name:
			$contentnum = $this->getNumvalues($CFG['table']['blogmanage'],"blog_name = '".$this->filterInput($blog_name)."'AND status = '1'");
			if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name']) )
				{				
					$logoext   = $this->getFileExtension($_FILES['blog_image']['name']);
					$logoname  = $this->seoUrl($_POST["blog_name"]).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$logoimage;
				    $uploadsuccess = move_uploaded_file($_FILES['blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = @getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
			if(isset($_FILES['red_blog_image']['name']) && !empty($_FILES['red_blog_image']['name']) )
				{				
					$redlogoext   = $this->getFileExtension($_FILES['red_blog_image']['name']);
					$redlogoname  = $this->seoUrl($_POST["blog_name"]).".".$redlogoext;
					$redlogoimage = "photo_red_".$redlogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$redlogoimage;
				    $uploadredsuccess = move_uploaded_file($_FILES['red_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['green_blog_image']['name']) && !empty($_FILES['green_blog_image']['name']) )
				{				
					$greenlogoext   = $this->getFileExtension($_FILES['green_blog_image']['name']);
					$greenlogoname  = $this->seoUrl($_POST["theme_name"]).".".$greenlogoext;
					$greenlogoimage = "photo_green_".$greenlogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$greenlogoimage;
				    $uploadgreensuccess = move_uploaded_file($_FILES['green_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['orange_blog_image']['name']) && !empty($_FILES['orange_blog_image']['name']) )
				{				
					$orangelogoext   = $this->getFileExtension($_FILES['orange_blog_image']['name']);
					$orangelogoname  = $this->seoUrl($_POST["blog_name"]).".".$orangelogoext;
					$orangelogoimage = "photo_orange_".$orangelogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$orangelogoimage;
				    $uploadorangesuccess = move_uploaded_file($_FILES['orange_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['violet_blog_image']['name']) && !empty($_FILES['violet_blog_image']['name']) )
				{				
					$violetlogoext   = $this->getFileExtension($_FILES['violet_blog_image']['name']);
					$violetlogoname  = $this->seoUrl($_POST["blog_name"]).".".$violetlogoext;
					$violetlogoimage = "photo_violet_".$violetlogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$violetlogoimage;
				    $uploadvioletsuccess = move_uploaded_file($_FILES['violet_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			
			if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';
			
			if($contentnum == '0' && !empty($blog_name))
				{
					$query          = "INSERT INTO ".$CFG['table']['blogmanage']." SET blog_name = '".$blog_name."', blog_description = '".$blog_description."',status = '".$this->filterInput($status)."',addeddate = now(),deleted = 'no',develop = '0'";
					$LastInsertedId = $this->ExecuteQuery($query, "insert");
					#Image Upload And Update			    
					if($uploadsuccess)
						{
							$photo = "photo_".$logoname;
							$query = "UPDATE ".$CFG['table']['blogmanage']." SET blog_image = '".$this->filterInput($photo)."', width = '".$this->filterInput($width)."',height = '".$this->filterInput($height)."' WHERE blog_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}	
					if($uploadredsuccess)
						{
							$photo = "photo_red_".$redlogoname;
							$query = "UPDATE ".$CFG['table']['blogmanage']." SET red_blog_image = '".$this->filterInput($photo)."' WHERE blog_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadgreensuccess)
						{
							$photo = "photo_green_".$greenlogoname;
							$query = "UPDATE ".$CFG['table']['blogmanage']." SET green_blog_image = '".$this->filterInput($photo)."' WHERE blog_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadorangesuccess)
						{
							$photo = "photo_orange_".$orangelogoname;
							$query = "UPDATE ".$CFG['table']['blogmanage']." SET orange_blog_image = '".$this->filterInput($photo)."' WHERE blog_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadvioletsuccess)
						{
							$photo = "photo_violet_".$violetlogoname;
							$query = "UPDATE ".$CFG['table']['blogmanage']." SET violet_blog_image = '".$this->filterInput($photo)."' WHERE blog_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}	
                    $this->redirectUrl("blogManage.php");				
				}	
			else
				{
					$objSmarty->assign('ErrorMessage','Blog Name Already Exists');
				}						
			//$this->redirectUrl("blogManage.php");	
		}
	
  /**
   * AdminManagement::updateBlogFunction()
   * This function is used to update the blog functionalities management
   * @return void
   */
	function updateBlogFunction($blog_id)
		{
			global $CFG,$objSmarty,$objThumb;
			$blog_name 	= $_POST["blog_name"];
			$blog_description 	= $_POST["blog_description"];
			if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';
			#Check already exist Banner Name:			
			$contentnum = $this->getNumvalues($CFG['table']['blogmanage'],"blog_name = '".$this->filterInput($blog_name)."' AND blog_id != '".$this->filterInput($blog_id)."'");
			

			#Check With Banner Image size:
			if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name']) )
			  {	
			  		$getphotoname = $this->getValue("blog_image",$CFG['table']['blogmanage'],"blog_id = '".$this->filterInput($_GET['blog_id'])."' ");
					if(!empty($getphotoname)){
						@unlink($CFG['site']['photo_blog_path'].'/'.$getphotoname);
					}
					
					$logoext   = $this->getFileExtension($_FILES['blog_image']['name']);
					$logoname  = $this->seoUrl($_POST["blog_name"].$_GET['blog_id']).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$logoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
			
			if(isset($_FILES['red_blog_image']['name']) && !empty($_FILES['red_blog_image']['name']) )
			  {	
			  		$getredphotoname = $this->getValue("blog_image",$CFG['table']['blogmanage'],"blog_id = '".$this->filterInput($_GET['blog_id'])."' ");
					if(!empty($getredphotoname)){
						@unlink($CFG['site']['photo_blog_path'].'/'.$getredphotoname);
					}
					
					$redlogoext   = $this->getFileExtension($_FILES['red_blog_image']['name']);
					$redlogoname  = $this->seoUrl($_POST["blog_name"].$_GET['blog_id']).".".$redlogoext;
					$redlogoimage = "photo_red_".$redlogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$redlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['red_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
				}
			if(isset($_FILES['green_blog_image']['name']) && !empty($_FILES['green_blog_image']['name']) )
			  {	
			  		$getgreenphotoname = $this->getValue("blog_image",$CFG['table']['blogmanage'],"blog_id = '".$this->filterInput($_GET['blog_id'])."' ");
					if(!empty($getgreenphotoname)){
						@unlink($CFG['site']['photo_blog_path'].'/'.$getgreenphotoname);
					}
					
					$greenlogoext   = $this->getFileExtension($_FILES['green_blog_image']['name']);
					$greenlogoname  = $this->seoUrl($_POST["blog_name"].$_GET['blog_id']).".".$greenlogoext;
					$greenlogoimage = "photo_green_".$greenlogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$greenlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['green_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['orange_blog_image']['name']) && !empty($_FILES['orange_blog_image']['name']) )
			  {	
			  		$getorangephotoname = $this->getValue("blog_image",$CFG['table']['blogmanage'],"blog_id = '".$this->filterInput($_GET['blog_id'])."' ");
					if(!empty($getorangephotoname)){
						@unlink($CFG['site']['photo_blog_path'].'/'.$getorangephotoname);
					}
					
					$orangelogoext   = $this->getFileExtension($_FILES['orange_blog_image']['name']);
					$orangelogoname  = $this->seoUrl($_POST["blog_name"].$_GET['blog_id']).".".$orangelogoext;
					$orangelogoimage = "photo_orange_".$orangelogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$orangelogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['orange_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
				}
			if(isset($_FILES['violet_blog_image']['name']) && !empty($_FILES['violet_blog_image']['name']) )
			  {	
			  		$getvioletphotoname = $this->getValue("blog_image",$CFG['table']['blogmanage'],"blog_id = '".$this->filterInput($_GET['blog_id'])."' ");
					if(!empty($getvioletphotoname)){
						@unlink($CFG['site']['photo_blog_path'].'/'.$getvioletphotoname);
					}
					
					$violetlogoext   = $this->getFileExtension($_FILES['violet_blog_image']['name']);
					$violetlogoname  = $this->seoUrl($_POST["blog_name"].$_GET['blog_id']).".".$violetlogoext;
					$violetlogoimage = "photo_violet_".$violetlogoname;
					$dest_name = $CFG['site']['photo_blog_path'].'/'.$violetlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['violet_blog_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			  }
				
					
			if($contentnum == '0' && !empty($blog_name))
				{	
					if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name']) )
			          {	
							$UpQuery  = "UPDATE ".$CFG['table']['blogmanage']." SET blog_name = '".$this->filterInput($blog_name)."', blog_description = '".$this->filterInput($blog_description)."',blog_image = '".$this->filterInput($logoimage)."',width = '".$this->filterInput($width)."',height = '".$this->filterInput($height)."',status = '".$this->filterInput($status)."' WHERE blog_id  = '".$this->filterInput($_GET['blog_id'])."' ";
							$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['red_blog_image']['name']) && !empty($_FILES['red_blog_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['blogmanage']." SET blog_name = '".$this->filterInput($blog_name)."', blog_description = '".$this->filterInput($blog_description)."',red_blog_image = '".$this->filterInput($redlogoimage)."',status = '".$this->filterInput($status)."' WHERE blog_id  = '".$this->filterInput($_GET['blog_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['green_blog_image']['name']) && !empty($_FILES['green_blog_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['blogmanage']." SET blog_name = '".$this->filterInput($blog_name)."', blog_description = '".$this->filterInput($blog_description)."',green_blog_image = '".$this->filterInput($greenlogoimage)."',status = '".$this->filterInput($status)."' WHERE blog_id  = '".$this->filterInput($_GET['blog_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['orange_blog_image']['name']) && !empty($_FILES['orange_blog_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['blogmanage']." SET blog_name = '".$this->filterInput($blog_name)."', blog_description = '".$this->filterInput($blog_description)."',orange_blog_image = '".$this->filterInput($orangelogoimage)."',status = '".$this->filterInput($status)."' WHERE blog_id  = '".$this->filterInput($_GET['blog_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					  }
					if(isset($_FILES['violet_blog_image']['name']) && !empty($_FILES['violet_blog_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['blogmanage']." SET blog_name = '".$this->filterInput($blog_name)."', blog_description = '".$this->filterInput($blog_description)."',violet_blog_image = '".$this->filterInput($violetlogoimage)."',status = '".$this->filterInput($status)."' WHERE blog_id  = '".$this->filterInput($_GET['blog_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					
					$UpQuery  = "UPDATE ".$CFG['table']['blogmanage']." SET blog_name = '".$this->filterInput($blog_name)."', blog_description = '".$this->filterInput($blog_description)."',status = '".$this->filterInput($status)."' WHERE blog_id  = '".$this->filterInput($_GET['blog_id'])."' ";
					$UpResult = $this->ExecuteQuery($UpQuery,'update');
					
					$this->redirectUrl("blogManage.php");	
				}
			else
				{
					$objSmarty->assign('ErrorMessage','Blog Name Already Exists');
				}
		}
		
  /**
   * AdminManagement::BlogList()
   * This function is used to list the blog details 
   * @return void
   */
	function BlogList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY blog_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY blog_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY blog_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND blog_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT blog_id,blog_name, blog_description,addeddate, status,develop FROM ".$CFG['table']['blogmanage']." WHERE blog_id IS NOT NULL AND deleted= 'no' $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "blogManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['blogmanage']);
			$objSmarty->assign("whereField",'blog_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'blog');
			$objSmarty->assign("filename",'blogManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("followers_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	
  /**
   * AdminManagement::useDetailsEdit()
   *
   * @param mixed $user_id
   * @return void
   */
	function useDetailsEdit($user_id){
		global $CFG, $objSmarty;
		
		$username		=  $_POST['username'];
		$email		=  $_POST['email'];
		
		$countnum			= $this->getNumValues($CFG['table']['register'],"username = '".$this->filterInput($username)."' AND  user_id != '".$this->filterInput($user_id)."'");
        
		
		if($countnum == '0'){
			$sql_property		=	"UPDATE  ".$CFG['table']['register']." SET
									 username	=	'".$username."',
									 email	=	'".$email."'
									 WHERE user_id = '".$user_id."' ";
			$res_property		= 	$this->ExecuteQuery($sql_property,"update");
			$this->redirectURL('userManage.php');
		}else{
				$objSmarty->assign("ErrorMessage", 'User Name '.$username.' already exists');
		}
	}
	
   /**
   * AdminManagement::newFontAdd()
   *
   * @return void
   */
	function newFontAdd()
		{
			global $CFG,$objSmarty,$objThumb;
	
			$font_name 	= $_POST["font_name"];
			$status 	= $_POST["status"];
			//echo $status;die();
			  
			#Check Already Exist Banner Name:
			$contentnum = $this->getNumvalues($CFG['table']['font'],"font_name = '".$this->filterInput($font_name)."'");
		
	 	
		if($contentnum == '0')
			{
				
				$query          = "INSERT INTO ".$CFG['table']['font']." SET font_name = '".$this->filterInput($font_name)."', status = '".$this->filterInput($status)."', addeddate = NOW()";
				$LastInsertedId = $this->ExecuteQuery($query, "insert");		
						
			 
				$this->redirectUrl("fontManage.php?msg=add");	
					 		
			}  
		else	
			{
				$objSmarty->assign('ErrorMessage','Font name already exist');
			}
		
		
		}
   /**
   * AdminManagement::fontList()
   *
   * @return void
   */
	function fontList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY font_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY font_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY font_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND font_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT font_id, font_name, status, addeddate FROM ".$CFG['table']['font']." WHERE  font_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "fontManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['font']);
			$objSmarty->assign("whereField",'font_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'font');
			$objSmarty->assign("filename",'fontManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("font_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::editFont()
   *
   * @return void
   */
	function editFont()
		{
			//echo __LINE__;die();
			global $CFG,$objSmarty,$objThumb;
		 	$font_name 	= $this->My_addslashes($_POST["font_name"]);
			$status 	= $this->My_addslashes($_POST["status"]);

			#Check already exist Banner Name:			
			$contentnum = $this->getNumvalues($CFG['table']['font'],"font_name = '".$this->filterInput($font_name)."' AND font_id != '".$this->filterInput($_GET['font_id'])."' ");
			 		
			if($contentnum == '0' )
				{		
					$UpQuery  = "UPDATE ".$CFG['table']['font']." SET font_name = '".$this->filterInput($font_name)."', status = '".$this->filterInput($status)."' WHERE font_id  = '".$this->filterInput($_GET['font_id'])."' ";
					$UpResult = $this->ExecuteQuery($UpQuery,'update');
	 				 	 												
					$this->redirectUrl("fontManage.php?msg=update");	
				}
			else
				{
					$objSmarty->assign('ErrorMessage','Font name already exist');
				} 	
		}
		
   /**
   * AdminManagement::inviteList()
   *
   * @return void
   */
   
   function inviteList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY referemail ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY referemail DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY refer_id DESC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'active' ";
			} 
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]"; 
				$condition.="AND referemail LIKE '%".$this->filterInput($_REQUEST['keyword'])."%'";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT refer_id, user_id,domain_id, referemail, addeddate FROM ".$CFG['table']['referrals']." WHERE  refer_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "inviteManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['referrals']);
			$objSmarty->assign("whereField",'refer_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'refer');
			$objSmarty->assign("filename",'sinviteManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("invite_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::socialList()
   *
   * @return void
   */
	function socialList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY id ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY id DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY id ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'active' ";
			} 
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			 	$domain_id  = $this->getValue("domain_id",$CFG['table']['domaindetails'],"subdomainurl = '".$this->filterInput($_REQUEST['keyword'])."' ");
				$keyword = "&keyword=$_REQUEST[keyword]";
				if($domain_id == '')
				$domain_id='0';
				$condition.="AND domain_id =".$this->filterInput($domain_id)." ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
		    $sql_sel = "SELECT id, page_id,domain_id, fb,twitter,linkedin,mail, added_date FROM ".$CFG['table']['social_plugins']." WHERE  id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "socialManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['social_plugins']);
			$objSmarty->assign("whereField",'id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'social plugin');
			$objSmarty->assign("filename",'socialManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("social_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::getDomain()
   *
   * @param mixed $domain_id
   * @return void
   */
	function getDomain($domain_id)
		{
			global $CFG,$objSmarty;
		 	$selqry = "SELECT subdomainurl FROM ".$CFG['table']['domaindetails']." where domain_id ='".$this->filterInput($domain_id)."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			#print_r($resqry[0]['subdomainurl']);die();
			return $resqry[0]['subdomainurl'];
			//$objSmarty->assign('userval',$resqry); 
		}
  /**
   * AdminManagement::getCurrency()
   *
   * @param mixed $domain_id
   * @return
   */
   
   /**
   * AdminManagement::getUsername()
   *
   * @param mixed $user_id
   * @return void
   */
	function getUsername($user_id)
		{
			global $CFG,$objSmarty;
			$selqry = "SELECT username FROM ".$CFG['table']['register']." where user_id ='".$this->filterInput($user_id)."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			return $resqry[0]['username'];
		}
    function getProductname($product_id)
		{
			global $CFG,$objSmarty;
			$selqry = "SELECT product_name FROM ".$CFG['table']['store_product']." where product_id ='".$this->filterInput($product_id)."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			return $resqry[0]['product_name'];
		}    
  /**
   * AdminManagement::getPagename()
   *
   * @param mixed $user_id
   * @return
   */
	function getPagename($page_id)
		{
			global $CFG,$objSmarty;
			$selqry = "SELECT pagename FROM ".$CFG['table']['pages']." where page_id ='".$this->filterInput($page_id)."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			return $resqry[0]['pagename'];
		}
        
    function getImageText($page_id)
		{
			global $CFG,$objSmarty;
			$selqry = "SELECT image_text FROM ".$CFG['table']['pages']." where page_id ='".$this->filterInput($page_id)."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			return $resqry[0]['image_text'];
		} 
   function getImage($page_list_id)
		{
			global $CFG,$objSmarty;
			$selqry = "SELECT image_name FROM ".$CFG['table']['domain_images']." where page_list_id ='".$this->filterInput($page_list_id)."' ";
			$resqry = $this->ExecuteQuery($selqry, "select");
			return $resqry[0]['image_name'];
		}         
   /**
   * AdminManagement::newStaticAdd()
   *
   * @return void
   */
	function newStaticAdd()
		{
			global $CFG,$objSmarty;	
		 	$content_name       = $this->filterInput($_POST['content_name']);
			$content		 	= $this->filterInput($_POST['content']);
	  	    $contentnum = $this->getNumvalues($CFG['table']['content'],"content_name = '".$content_name."'");
	  	    $status='1';
	  	    $seo_content=$this->seoUrl($content_name);
			if($contentnum == '0' && !empty($content)){
					$inssql = "INSERT INTO 
									".$CFG['table']['content']." 
								SET 
									content_name        = '".$content_name."',
									content_seo         = '".$seo_content."',
								  	content 			= '".$content."',
								  	status              = '".$this->filterInput($status)."',
								 	addeddate 			= NOW()";
				
				    $ressql = $this->ExecuteQuery($inssql, "insert");
				    $this->redirectUrl("staticPageManage.php?msg=addstatic");
				 
			}elseif(empty($content)){
				$objSmarty->assign("ErrorMessage", 'Content should not be blank');
			}else{
				$objSmarty->assign("ErrorMessage", 'Content '.$content_title.' already exists');
			}	
		}
   /**
   * AdminManagement::editStatic()
   *
   * @return void
   */
	function editStatic($conid)
		{
			global $CFG,$objSmarty;
		
			$content_name       = $this->filterInput($_POST['content_name']);
			$content		 	= $this->filterInput($_POST['content']);
			$seo_content=$this->seoUrl($content_name);
			$contentnum = $this->getNumvalues($CFG['table']['content'],"content_name = '".$content_name."' AND content_id != '".$conid."' ");
			if($contentnum == '0' && !empty($content)){
			$inssql = "UPDATE  
									".$CFG['table']['content']." 
								SET 
									content_name        = '".$content_name."',
									content_seo         = '".$seo_content."',
								  	content 			= '".$content."'
							    WHERE 
								    content_id = '".$conid."' ";
				$ressql = $this->ExecuteQuery($inssql, "update");
				$this->redirectUrl("staticPageManage.php?updatestatic");
				  
			}elseif(empty($content)){
				$objSmarty->assign("ErrorMessage", 'Content should not be blank');
			}else{
				$objSmarty->assign("ErrorMessage", 'Content '.$content_title.' already exists');
			}
		}
   /**
   * AdminManagement::staticList()
   *
   * @return void
   */
	function staticList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_GET['sortby']) && $_GET['sortby'] == 'tasc'){
				$sort = " ORDER BY content_name ASC";
				$fields .= "&sortby=tasc";
			}elseif(isset($_GET['sortby']) && $_GET['sortby'] == 'tdesc'){
				$sort = " ORDER BY content_name DESC";
				$fields .= "&sortby=tdesc";
			}else{
				$sort .= " ORDER BY content_name ASC";
			}
			
			
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			 }else{
				$limit = PAGELIMIT; 	
			 }
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND content_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
			 
			$sql_sel = "SELECT content_id, content_name, addeddate, status FROM ".$CFG['table']['content']." WHERE  content_id IS NOT NULL  $condition $sort"; 
			#}
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "staticPageManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
		
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			$objSmarty->assign("tablename",$CFG['table']['content']);
			$objSmarty->assign("whereField",'content_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'Content');
			$objSmarty->assign("filename",'staticPageManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			//print_r($categoryList);die();
			
			$objSmarty->assign("static_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
	
   /**
   * AdminManagement::contactList()
   *
   * @return void
   */
	function contactList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY mail_to ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY mail_to DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY id DESC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			} 
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			 	$domain_id  = $this->getValue("domain_id",$CFG['table']['domaindetails'],"subdomainurl = '".$this->filterInput($_REQUEST['keyword'])."' ");
				$keyword = "&keyword=$_REQUEST[keyword]";
				if($domain_id == '')
				$domain_id='0';
				$condition.="AND domain_id =".$this->filterInput($domain_id)." ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
		    $sql_sel = "SELECT id, page_id,domain_id,mail_to,text1,text2,text3,text4,text5,text1_spacing,text1_required,added_date FROM ".$CFG['table']['contact_form']." WHERE  id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "contactManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['contact_form']);
			$objSmarty->assign("whereField",'id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'contact details');
			$objSmarty->assign("filename",'contactManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			//print_r($categoryList);die();
			$objSmarty->assign("contact_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::editContact()
   *
   * @param mixed $id
   * @param mixed $page_id
   * @return void
   */
	function editContact($id,$page_id,$domain_id)
		{
			global $CFG,$objSmarty;
		
			$mail_to       = $this->filterInput($_POST['mail_to']);
            $text1       = $this->filterInput($_POST['text1']);
            $text2       = $this->filterInput($_POST['text2']);
            $text3       = $this->filterInput($_POST['text3']);
            $text4       = $this->filterInput($_POST['text4']);
            $text5       = $this->filterInput($_POST['text5']);
			$inssql = "UPDATE  
									".$CFG['table']['contact_form']." 
								SET 
									mail_to             = '".$mail_to."',
									domain_id           = '".$domain_id."',
									page_id             = '".$page_id."',
                                    text1               = '".$text1."',
                                    text2               = '".$text2."',
                                    text3               = '".$text3."',
                                    text4               = '".$text4."',
                                    text5               = '".$text5."',
									added_date =NOW()
							    WHERE 
								    id = '".$id."' ";
				$ressql = $this->ExecuteQuery($inssql, "update");
				$this->redirectUrl("contactManage.php?msg=updatecontact");
			 
		}
   /**
   * AdminManagement::listBlogsDomain()
   *
   * @return void
   */
	function listBlogsDomain()
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY domain_id ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY domain_id DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY domain_id ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'active' ";
			} 
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			 	$domain_id  = $this->getValue("domain_id",$CFG['table']['domaindetails'],"subdomainurl = '".$this->filterInput($_REQUEST['keyword'])."' ");
				$keyword = "&keyword=$_REQUEST[keyword]";
				if($domain_id == '')
				$domain_id='0';
				$condition.="AND domain_id =".$this->filterInput($domain_id)." ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
		    $sql_sel = "SELECT user_id,domain_id,blog_id,subdomainurl,theme_id,author,archives,categories FROM ".$CFG['table']['domaindetails']." WHERE  blog_id IS NOT NULL AND theme_id='' $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "blogDomainManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['domaindetails']);
			$objSmarty->assign("whereField",'domain_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'domain details');
			$objSmarty->assign("filename",'blogDomainManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			//print_r($categoryList);die();
			$objSmarty->assign("blogdomain_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
    
  /**
   * AdminManagement::listPost()
   *
   * @return void
   */
	function listPost($domain_id)
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY title_id ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY title_id DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY title_id ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'active' ";
			} 
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			 	$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND title LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		    if( isset($_REQUEST['domain_id'])){
		     $domain_id = "&domain_id=$_REQUEST[domain_id]"; 
			 $fields = "&domain_id=$_REQUEST[domain_id]$fields ";
             }
		    if(isset($_REQUEST['domain_id'])){
				$condition .= " AND domain_id = '".$this->filterInput($_REQUEST['domain_id'])."' ";
			}
		    $sql_sel = "SELECT comment_id,domain_id,title,title_id,blog_id,comments,status,commentor_ip,addeddate FROM ".$CFG['table']['commentdetails']." WHERE comment_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "listPost.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			 
			$objSmarty->assign("tablename",$CFG['table']['posttitle']);
			$objSmarty->assign("whereField",'post_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'post details');
			$objSmarty->assign("filename",'listPost.php');
			$objSmarty->assign("page",$page);
			$objSmarty->assign("fileld",$domain_id);
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			//print_r($categoryList);die();
			$objSmarty->assign("post_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::listComments()
   *
   * @param mixed $title_id
   * @return void
   */
	function listComments($title_id)
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY comment_id ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY comment_id DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY comment_id ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'active' ";
			} 
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			 	$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND comments LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
		    $sql_sel = "SELECT comment_id,domain_id,user_id,blog_id,title_id,comments,commented_on,com.by,status,addeddate FROM ".$CFG['table']['commentdetails']. " as com  WHERE  title_id= '".$title_id."' $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "listPost.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			 
			$objSmarty->assign("tablename",$CFG['table']['commentdetails']);
			$objSmarty->assign("whereField",'comment_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'comment details');
			$objSmarty->assign("filename",'listComments.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			//print_r($categoryList);die();
			$objSmarty->assign("comment_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::addFansLink()
   *
   * @return void
   */
	function addFansLink()
		{
			global $CFG,$objSmarty;	
		 	$fans_name       = $this->filterInput($_POST['fans_name']);
		 	$fans_url       = $this->filterInput($_POST['fans_url']);
	  	    $contentnum = $this->getNumvalues($CFG['table']['fans'],"fans_name = '".$this->filterInput($fans_name)."'");
	  	    $status='1';
			if($contentnum == '0'){
					$inssql = "INSERT INTO 
									".$CFG['table']['fans']." 
								SET 
									fans_name           = '".$fans_name."',
								  	fans_url 			= '".$fans_url."',
								  	status              = '".$status."',
								 	added_date 			= NOW()";
				
				    $ressql = $this->ExecuteQuery($inssql, "insert");
				    $this->redirectUrl("fansManage.php?msg=addfans");
				 
			}else{
				$objSmarty->assign("ErrorMessage", 'fans '.$fans_name.' already exists');
			}
		}
   /**
   * AdminManagement::fansList()
   *
   * @return void
   */
	function fansList()
		{
			global $CFG,$objSmarty;
		
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY fans_id ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY fans_id DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY fans_id ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			} 
            if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			 	$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND fans_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
		    $sql_sel = "SELECT fans_id,fans_name,fans_url,status,added_date FROM ".$CFG['table']['fans']. " as com  WHERE  fans_id is NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "fansManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			 
			$objSmarty->assign("tablename",$CFG['table']['fans']);
			$objSmarty->assign("whereField",'fans_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'fans details');
			$objSmarty->assign("filename",'fansManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			//print_r($categoryList);die();
			$objSmarty->assign("fans_list", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
   /**
   * AdminManagement::editFansLink()
   *
   * @param mixed $fans_id
   * @return void
   */
	function editFansLink($fans_id)
		{
			global $CFG,$objSmarty;
		 	$fans_name       = $this->filterInput($_POST['fans_name']);
		 	$fans_url       = $this->filterInput($_POST['fans_url']);
			$status='1'; 
			$inssql = "UPDATE  
									".$CFG['table']['fans']." 
								SET 
									fans_name             = '".$fans_name."',
									fans_url           = '".$fans_url."',
									status             = '".$status."',
									added_date =NOW()
							    WHERE 
								    fans_id = '".$fans_id."' ";
				$ressql = $this->ExecuteQuery($inssql, "update");
				$this->redirectUrl("fansManage.php?msg=updatefans");
		}
		
	//this function used to list background images in admin side
	
   /**
   * AdminManagement::backgroundList()
   *
   * @return void
   */
	function backgroundList(){
		global $CFG,$objSmarty;
		
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
			$sort = " ORDER BY background_name ASC";
			$fields .= "&sortby=casc";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
			$sort = " ORDER BY background_name DESC";
			$fields .= "&sortby=cdesc";
		}else{
			$sort .= " ORDER BY background_name ASC";
		}
		
		#Status
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
			$condition .= " AND status = '1' ";
		}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
			$condition .= " AND status = '0' ";
		}
				
		if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
			$limit = $_REQUEST['limit'];
			$fields = "&limit=$_REQUEST[limit]";
		}else{
			$limit = PAGELIMIT; 	
		}
		 							
		$page = $_REQUEST['page'];
		if ($page == 0) $page = 1;
		if($page) 
			$start = ($page - 1) * $limit; 			
		else
			$start = 0;
			
		 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
		 {
		   $sql_lim = $_REQUEST['limit'];
		 }else{
			$sql_lim = "$start, $limit";
		 }
		 
		 #Keyword
		 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
			$keyword = "&keyword=$_REQUEST[keyword]";
			$condition.="AND background_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
			$fields .= "&keyword=$_REQUEST[keyword]$fields";
		 }
		 
		
		$sql_sel = "SELECT background_id, background_name, background_image, background_thumb, status, addeddate FROM ".$CFG['table']['background']." WHERE  background_id IS NOT NULL $condition $sort";
		$total_pages = $this->ExecuteQuery($sql_sel,'norows');
		
		$targetpage = "backgroundManage.php"; 
		$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
		$sql_limit = $sql_sel." LIMIT ".$sql_lim;
		$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
		$cnt = 1;
		while($row_seller = mysql_fetch_array($result)){
			$row_seller['sno'] = (($page-1)*$limit)+$cnt;
			$categoryList[] =$row_seller;
			$cnt++;
		}
		
		#From & To Records
		if($page == 1){
			$fromRecords 	= 1;
			$toRecords		= $limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}else{
			$fromRecords 	= $start+1;
			$toRecords		= $start+$limit;
			if($toRecords >= $total_pages) $toRecords	= $total_pages;
		}
		
		
		$objSmarty->assign("tablename",$CFG['table']['background']);
		$objSmarty->assign("whereField",'background_id');
		$objSmarty->assign("fieldname",'status');
		$objSmarty->assign("word",'background');
		$objSmarty->assign("filename",'backgroundManage.php');
		$objSmarty->assign("page",$page);
		
		$objSmarty->assign("totalRecords", $total_pages);
		$objSmarty->assign("fromRecords", $fromRecords);
		$objSmarty->assign("toRecords", $toRecords);
		$objSmarty->assign("limit", $limit);
		
		$objSmarty->assign("background_List", $categoryList); 
		$objSmarty->assign("pagination", $next_page);
	}
	
  //thid function used to add background images in admin side
  function newBackgroundAdd(){
		global $CFG,$objSmarty,$objThumb;
	
		$background_name 	= $this->filterInput($_POST["background_name"]);
		 
		
		#Check Already Exist Banner Name:
		$contentnum = $this->getNumvalues($CFG['table']['background'],"background_name = '".$background_name."'");
		
		#Check With Banner Image size:
		if(isset($_FILES['background_image']['name']) && !empty($_FILES['background_image']['name']) )
		{				
				$logoext   = $this->getFileExtension($_FILES['background_image']['name']);
				$logoname  = $this->seoUrl($_POST["background_name"].$CFG['site']['domain_id']).".".$logoext;
				$logoimage = "photo_".$logoname;
				$dest_name = $CFG['site']['photo_background_path'].'/'.$logoimage;
				
				$uploadsuccess = @move_uploaded_file($_FILES['background_image']['tmp_name'], $dest_name);
				@chmod($dest_name,0777);
		
				$test = @getimagesize($dest_name);
				$width = $test[0];
				$height = $test[1];
				
				#echo "Width: ".$width;
				#echo "Height: ".$height;
				#exit();
				
				$iconset = $this->iconSize(); 
				$banner_width	=	$iconset['0']['background_thumb_width'];
				$banner_height	=	$iconset['0']['background_thumb_height'];	
						
		}
			
		if($contentnum == '0'   && $width >= $background_width && $height >= $background_height)
		{
			
			$query          = "INSERT INTO ".$CFG['table']['background']." SET background_name = '".$background_name."', addeddate = NOW()";
			$LastInsertedId = $this->ExecuteQuery($query, "insert");		
					
			#Image Upload And Update			    
			if($uploadsuccess){
				
				#Get Thumbnail width & height
				$userlogothumb = $this->iconSettingValues();
				
				#Create Thumbnail
				$sour_imagepath = $dest_name;
				$photo_thumb = "thumb_".$logoname;
				
				#echo "source_image: $sour_imagepath";
				#exit();
				
				$dest_imagepath = $CFG['site']['photo_background_path'].'/'.$photo_thumb;
				$objThumb->createThumb($sour_imagepath,$dest_imagepath,$userlogothumb[0]['background_thumbsmall_width'],$userlogothumb[0]['background_thumbsmall_height'],'exact');	
				
				$photo = "photo_".$logoname;
				$query = "UPDATE ".$CFG['table']['background']." SET background_image = '".$this->filterInput($photo)."', background_thumb = '".$this->filterInput($photo_thumb)."' WHERE background_id = '".$this->filterInput($LastInsertedId)."' ";
				$res = $this->ExecuteQuery($query, "update");
			}		
			
			 $this->redirectUrl("backgroundManage.php?msg=addback");			 		
		}elseif($width != $banner_width || $height != $banner_height){
			$objSmarty->assign("ErrorMessage", 'Background Image should  be '. $background_width.'*'.$background_height);
			@unlink($CFG['site']['photo_banner_path'].'/'.$logoimage);				
		}else{
			$objSmarty->assign("ErrorMessage", 'Content '.$background_name.' already exists');
			@unlink($CFG['site']['photo_background_path'].'/'.$logoimage);
		}
		
	}
	
	//this function used for edit background
		function editBackground(){
		global $CFG,$objSmarty,$objThumb;
		
		$background_name 	= $this->filterInput($_POST["background_name"]);
		#Check already exist Banner Name:			
		$contentnum = $this->getNumvalues($CFG['table']['background'],"background_name = '".$background_name."' AND background_id != '".$this->filterInput($_GET['background_id'])."'");
		
		#Check With Banner Image size:
		if(isset($_FILES['background_image']['name']) && !empty($_FILES['background_image']['name']) )
		{	
				$getphotoname = $this->getValue("background_image",$CFG['table']['background'],"background_id = '".$this->filterInput($_GET['background_id'])."' ");
				if(!empty($getphotoname)){
					@unlink($CFG['site']['photo_background_path'].'/'.$getphotoname);
				}
				
				$logoext   = $this->getFileExtension($_FILES['background_image']['name']);
				$logoname  = $this->seoUrl($_POST["background_name"].$CFG['site']['domain_id']).".".$logoext;
				$logoimage = "photo_".$logoname;
				$dest_name = $CFG['site']['photo_background_path'].'/'.$logoimage;
				
				$uploadsuccess = @move_uploaded_file($_FILES['background_image']['tmp_name'], $dest_name);
				@chmod($dest_name,0777);
		
		$test = getimagesize($dest_name);
		$width = $test[0];
		$height = $test[1];
		
		$iconset = $this->iconSize(); 
		$banner_width	=	$iconset['0']['background_thumb_width'];
		$banner_height	=	$iconset['0']['background_thumb_height'];
		
		}
			
		if($contentnum == '0'  && $width >= $background_width && $height >= $background_height)
		{		
			$UpQuery  = "UPDATE ".$CFG['table']['background']." SET background_name = '".$background_name."' WHERE background_id  = '".$this->filterInput($_GET['background_id'])."' ";
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
		
			#Image Upload And Update
			if($uploadsuccess)
			{
			
				#Get Thumbnail width & height
				$userlogothumb = $this->iconSettingValues();
				
				#Create Thumbnail
				$sour_imagepath = $dest_name;
				$photo_thumb = "thumb_".$logoname;
				
				#echo "source_image: $sour_imagepath";
				#exit();
				
				$dest_imagepath = $CFG['site']['photo_background_path'].'/'.$photo_thumb;
				$objThumb->createThumb($sour_imagepath,$dest_imagepath,$userlogothumb[0]['background_thumbsmall_width'],$userlogothumb[0]['background_thumbsmall_height'],'exact');						
				
				$photo = "photo_".$logoname;				
				$query = "UPDATE ".$CFG['table']['background']." SET background_image = '".$this->filterInput($photo)."',background_thumb = '".$this->filterInput($photo_thumb)."' WHERE background_id ='".$this->filterInput($_GET['background_id'])."'";
				$res = $this->ExecuteQuery($query, "update");
		   	}			 												
			$this->redirectUrl("backgroundManage.php?msg=updateback");	
		}elseif($width != $banner_width || $height != $banner_height){
			$objSmarty->assign("ErrorMessage", 'Background Image should  be '. $background_width.'*'.$background_height);
			@unlink($CFG['site']['photo_background_path'].'/'.$logoimage);
		}else{
			$objSmarty->assign("ErrorMessage", 'Content '.$background_name.' already exists');
			@unlink($CFG['site']['photo_background_path'].'/'.$logoimage);
		}			
	}
function getPointDomainName($user_id)
	{
		global $CFG,$objSmarty;
		$selqry = "SELECT point_domain FROM ".$CFG['table']['point']." where user_id ='".$this->filterInput($user_id)."' ";
		$resqry = $this->ExecuteQuery($selqry, "select");
		return $resqry[0]['point_domain']; 
	}
function getNewDomainName($user_id)
	{
		global $CFG,$objSmarty;
		$selqry = "SELECT domain_name FROM ".$CFG['table']['new_domain']." where user_id ='".$this->filterInput($user_id)."' ";
		$resqry = $this->ExecuteQuery($selqry, "select");
		return $resqry[0]['domain_name']; 
	}
  /**
   * AdminManagement::listPointDomain()
   *
   * @param mixed $domain_id
   * @return void
   */
function listPointDomain($domain_id)
		{
			global $CFG,$objSmarty;
		
			if(isset($_GET['sortby']) && $_GET['sortby'] == 'tasc'){
				$sort = " ORDER BY point_domain ASC";
				$fields .= "&sortby=tasc";
			}elseif(isset($_GET['sortby']) && $_GET['sortby'] == 'tdesc'){
				$sort = " ORDER BY point_domain DESC";
				$fields .= "&sortby=tdesc";
			}else{
				$sort .= " ORDER BY point_domain ASC";
			}
			
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'pointed' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = 'unpointed' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			 }else{
				$limit = PAGELIMIT; 	
			 }
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			{
			   $sql_lim = $_REQUEST['limit'];
			}else{
				$sql_lim = "$start, $limit";
			}
			 
			#Keyword
			if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND domain_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]";
			}
			 
			    $sql_sel = "SELECT point_domain,point_id,user_id,domain_id,status,addeddate FROM ".$CFG['table']['point']." Where point_id IS NOT NULL AND domain_id = '".$this->filterInput($domain_id)."'  $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "listPointDomain.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] 	= (($page-1)*$limit)+$cnt.".";
				$categoryList[] 	= $row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			$objSmarty->assign("tablename",$CFG['table']['point']);
			$objSmarty->assign("whereField",'point_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'Point Domain');
			$objSmarty->assign("filename",'listPointDomain.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			
			$objSmarty->assign("pointdetails", $categoryList);
			$objSmarty->assign("pagination", $next_page);
		}
  /**
   * AdminManagement::listNewDomain()
   *
   * @param mixed $domain_id
   * @return void
   */
function listNewDomain($domain_id)
		{
			global $CFG,$objSmarty;
		
			if(isset($_GET['sortby']) && $_GET['sortby'] == 'tasc'){
				$sort = " ORDER BY domain_name ASC";
				$fields .= "&sortby=tasc";
			}elseif(isset($_GET['sortby']) && $_GET['sortby'] == 'tdesc'){
				$sort = " ORDER BY domain_name DESC";
				$fields .= "&sortby=tdesc";
			}else{
				$sort .= " ORDER BY domain_name ASC";
			}
			
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = 'publish' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = 'unpublish' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			 }else{
				$limit = PAGELIMIT; 	
			 }
			 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			{
			   $sql_lim = $_REQUEST['limit'];
			}else{
				$sql_lim = "$start, $limit";
			}
			 
			#Keyword
			if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND domain_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]";
			}
			 
			    $sql_sel = "SELECT domain_name,newdomainid,user_id,domain_id,status,addeddate FROM ".$CFG['table']['new_domain']." Where newdomainid IS NOT NULL AND domain_id = '".$domain_id."'  $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "listNewDomain.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] 	= (($page-1)*$limit)+$cnt.".";
				$categoryList[] 	= $row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			$objSmarty->assign("tablename",$CFG['table']['new_domain']);
			$objSmarty->assign("whereField",'newdomainid');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'New Domain');
			$objSmarty->assign("filename",'listNewDomain.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			
			$objSmarty->assign("newdetails", $categoryList);
			$objSmarty->assign("pagination", $next_page);
		}
	function updatePaypalInfo()
		{
			global $CFG,$objSmarty;
			$merchant=$_POST['pay_merchant_email'];
			//echo $merchant;die();
			$UpQuery  = "UPDATE ".$CFG['table']['sitesetting']." SET pay_test_mode = '".$this->filterInput($_POST['pay_test_mode'])."', pay_test_url = '".$this->filterInput($_POST['pay_test_url'])."',pay_url = '".$this->filterInput($_POST['pay_url'])."',pay_merchant_email  = '".$this->filterInput($merchant)."' WHERE id  = 1 ";
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
			$this->redirectUrl("paymentManage.php");
		}
    function updateAuthInfo()
		{
			global $CFG,$objSmarty;
			$UpQuery  = "UPDATE ".$CFG['table']['sitesetting']." SET auth_test_mode = '".$this->filterInput($_POST['auth_test_mode'])."', live_pay_app_id = '".$this->filterInput($_POST['live_pay_app_id'])."',live_pay_trans_key = '".$this->filterInput($_POST['live_pay_trans_key'])."',test_pay_app_id  = '".$this->filterInput($_POST['test_pay_app_id'])."',test_pay_trans_key  = '".$this->filterInput($_POST['test_pay_trans_key'])."'  ,auth_live_url = '".$this->filterInput($_POST['auth_live_url'])."',auth_pay_text_url  = '".$this->filterInput($_POST['auth_pay_text_url'])."'  WHERE id  = 1 ";
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
			$this->redirectUrl("paymentManage.php");
		}
    #Nest Payment Updation        
    function updateNestPaymentInfo()
		{
			global $CFG,$objSmarty;
			
			$UpQuery  = "UPDATE ".$CFG['table']['sitesetting']." SET nestPay_mode = '".$this->filterInput($_POST['nestPay_mode'])."', nestPay_test_clientId = '".$this->filterInput($_POST['nestPay_test_clientId'])."',nestPay_test_storeId = '".$this->filterInput($_POST['nestPay_test_storeId'])."',nestPay_test_userName = '".$this->filterInput($_POST['nestPay_test_userName'])."',nestPay_test_pwd = '".$this->filterInput($_POST['nestPay_test_pwd'])."',nestPay_live_clientId  = '".$this->filterInput($_POST['nestPay_live_clientId'])."',nestPay_live_storeId  = '".$this->filterInput($_POST['nestPay_live_storeId'])."',nestPay_live_userName  = '".$this->filterInput($_POST['nestPay_live_userName'])."',nestPay_live_pwd  = '".$this->filterInput($_POST['nestPay_live_pwd'])."' WHERE id  = 1 ";
			$UpResult = $this->ExecuteQuery($UpQuery,'update');
			$this->redirectUrl("paymentManage.php");
		}        
	  /**
	   * AdminManagement::InsertStoreFunction()
	   *
	   * @return void
	   */
	function InsertStoreFunction()
		{
			//print_r($_FILES);
			global $CFG,$objSmarty,$objThumb;
			$store_name 	= $_POST["store_name"];
			#Check Already Exist Store Name:
			$contentnum = $this->getNumvalues($CFG['table']['storemanage'],"store_name = '".$this->filterInput($store_name)."'AND status = '1'");
			if(isset($_FILES['store_image']['name']) && !empty($_FILES['store_image']['name']) )
				{				
					$logoext   = $this->getFileExtension($_FILES['store_image']['name']);
					$logoname  = $this->seoUrl($_POST["store_name"]).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$logoimage;
					//echo $dest_name;die();
				    $uploadsuccess = move_uploaded_file($_FILES['store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = @getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
			if(isset($_FILES['red_store_image']['name']) && !empty($_FILES['red_store_image']['name']) )
				{				
					$redlogoext   = $this->getFileExtension($_FILES['red_store_image']['name']);
					$redlogoname  = $this->seoUrl($_POST["store_name"]).".".$redlogoext;
					$redlogoimage = "photo_red_".$redlogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$redlogoimage;
				    $uploadredsuccess = move_uploaded_file($_FILES['red_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['green_store_image']['name']) && !empty($_FILES['green_store_image']['name']) )
				{				
					$greenlogoext   = $this->getFileExtension($_FILES['green_store_image']['name']);
					$greenlogoname  = $this->seoUrl($_POST["store_name"]).".".$greenlogoext;
					$greenlogoimage = "photo_green_".$greenlogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$greenlogoimage;
				    $uploadgreensuccess = move_uploaded_file($_FILES['green_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['orange_store_image']['name']) && !empty($_FILES['orange_store_image']['name']) )
				{				
					$orangelogoext   = $this->getFileExtension($_FILES['orange_store_image']['name']);
					$orangelogoname  = $this->seoUrl($_POST["store_name"]).".".$orangelogoext;
					$orangelogoimage = "photo_orange_".$orangelogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$orangelogoimage;
				    $uploadorangesuccess = move_uploaded_file($_FILES['orange_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['violet_store_image']['name']) && !empty($_FILES['violet_store_image']['name']) )
				{				
					$violetlogoext   = $this->getFileExtension($_FILES['violet_store_image']['name']);
					$violetlogoname  = $this->seoUrl($_POST["store_name"]).".".$violetlogoext;
					$violetlogoimage = "photo_violet_".$violetlogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$violetlogoimage;
				    $uploadvioletsuccess = move_uploaded_file($_FILES['violet_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			
			
			if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';
			
			if($contentnum == '0' && !empty($store_name) && !empty($width)&& !empty($height))
				{
					$query          = "INSERT INTO ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($_POST['store_name'])."', store_description = '".$this->filterInput($_POST['store_description'])."',status = '".$this->filterInput($status)."'";
					$LastInsertedId = $this->ExecuteQuery($query, "insert");
					
					#Copy Entire folder (theme) to another
					$sourcedir = $CFG['site']['base_path'].'/store/store1';
					$destinationdir = $CFG['site']['base_path'].'/store/'.strtolower($_POST['store_name']);
					$this->copy_directory($sourcedir, $destinationdir);	
					#Image Upload And Update			    
					if($uploadsuccess)
						{
							$photo = "photo_".$logoname;
							$query = "UPDATE ".$CFG['table']['storemanage']." SET store_image = '".$this->filterInput($photo)."', width = '".$this->filterInput($width)."',height = '".$this->filterInput($height)."' WHERE store_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadredsuccess)
						{
							$photo = "photo_red_".$redlogoname;
							$query = "UPDATE ".$CFG['table']['storemanage']." SET red_store_image = '".$this->filterInput($photo)."' WHERE store_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadgreensuccess)
						{
							$photo = "photo_green_".$greenlogoname;
							$query = "UPDATE ".$CFG['table']['storemanage']." SET green_store_image = '".$this->filterInput($photo)."' WHERE store_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadorangesuccess)
						{
							$photo = "photo_orange_".$orangelogoname;
							$query = "UPDATE ".$CFG['table']['storemanage']." SET orange_store_image = '".$this->filterInput($photo)."' WHERE store_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}
					if($uploadvioletsuccess)
						{
							$photo = "photo_violet_".$violetlogoname;
							$query = "UPDATE ".$CFG['table']['storemanage']." SET violet_store_image = '".$this->filterInput($photo)."' WHERE store_id = '".$this->filterInput($LastInsertedId)."' ";
							$res = $this->ExecuteQuery($query, "update");
						}					
				}	
			else
				{
					$objSmarty->assign('ErrorMessage','Store Name Already Exists');
				}						
			$this->redirectUrl("storeManage.php?action=addstore");	
		}
  /**
   * AdminManagement::storeList()
   *
   * @return void
   */
	function storeList()
		{
			global $CFG,$objSmarty;
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc'){
				$sort = " ORDER BY store_name ASC";
				$fields .= "&sortby=casc";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc'){
				$sort = " ORDER BY store_name DESC";
				$fields .= "&sortby=cdesc";
			}else{
				$sort .= " ORDER BY store_name ASC";
			}
		
			#Status
			if(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active'){
				$condition .= " AND status = '1' ";
			}elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive'){
				$condition .= " AND status = '0' ";
			}
					
			if( isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])  && ($_REQUEST['limit'] != "all")){
				$limit = $_REQUEST['limit'];
				$fields = "&limit=$_REQUEST[limit]";
			}else{
				$limit = PAGELIMIT; 	
			}
		 							
			$page = $_REQUEST['page'];
			if ($page == 0) $page = 1;
			if($page) 
				$start = ($page - 1) * $limit; 			
			else
				$start = 0;
				
			 if( !empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
			 {
			   $sql_lim = $_REQUEST['limit'];
			 }else{
				$sql_lim = "$start, $limit";
			 }
			 
			 #Keyword
			 if( isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ){
				$keyword = "&keyword=$_REQUEST[keyword]";
				$condition.="AND store_name LIKE '%".$this->filterInput($_REQUEST['keyword'])."%' ";
				$fields .= "&keyword=$_REQUEST[keyword]$fields";
			 }
		 
		
			$sql_sel = "SELECT store_id,store_name, store_description, status FROM ".$CFG['table']['storemanage']." WHERE store_id IS NOT NULL $condition $sort";
			$total_pages = $this->ExecuteQuery($sql_sel,'norows');
			
			$targetpage = "storeManage.php"; 
			$next_page = $this->make_page($targetpage,$total_pages,$limit,$page,$fields);		
			$sql_limit = $sql_sel." LIMIT ".$sql_lim;
			$result = mysql_query($sql_limit) or die($this->mysql_error($sql_limit));
			$cnt = 1;
			while($row_seller = mysql_fetch_array($result)){
				$row_seller['sno'] = (($page-1)*$limit)+$cnt;
				$categoryList[] =$row_seller;
				$cnt++;
			}
			
			#From & To Records
			if($page == 1){
				$fromRecords 	= 1;
				$toRecords		= $limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}else{
				$fromRecords 	= $start+1;
				$toRecords		= $start+$limit;
				if($toRecords >= $total_pages) $toRecords	= $total_pages;
			}
			
			
			$objSmarty->assign("tablename",$CFG['table']['storemanage']);
			$objSmarty->assign("whereField",'store_id');
			$objSmarty->assign("fieldname",'status');
			$objSmarty->assign("word",'store');
			$objSmarty->assign("filename",'storeManage.php');
			$objSmarty->assign("page",$page);
			
			$objSmarty->assign("totalRecords", $total_pages);
			$objSmarty->assign("fromRecords", $fromRecords);
			$objSmarty->assign("toRecords", $toRecords);
			$objSmarty->assign("limit", $limit);
			
			$objSmarty->assign("store_List", $categoryList); 
			$objSmarty->assign("pagination", $next_page);
		}
		
	function updateStoreFunction()
		{
			global $CFG,$objSmarty,$objThumb;
			$store_name 	= $_POST["store_name"];
			if($_POST['status']=='1')
				$status = '1';
			else
				$status = '0';
			#Check already exist Banner Name:			
			$contentnum = $this->getNumvalues($CFG['table']['storemanage'],"store_name = '".$this->filterInput($_POST['store_name'])."' AND store_id != '".$this->filterInput($_GET['store_id'])."'");
			
			
			#Check With Banner Image size:
			if(isset($_FILES['store_image']['name']) && !empty($_FILES['store_image']['name']) )
			  {	
			  		$getphotoname = $this->getValue("store_image",$CFG['table']['storemanage'],"store_id = '".$this->filterInput($_GET['store_id'])."' ");
					if(!empty($getphotoname)){
						@unlink($CFG['site']['photo_store_path'].'/'.$getphotoname);
					}
					
					$logoext   = $this->getFileExtension($_FILES['store_image']['name']);
					$logoname  = $this->seoUrl($_POST["store_name"].$_GET['store_id']).".".$logoext;
					$logoimage = "photo_".$logoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$logoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
					$test = getimagesize($dest_name);
					$width = $test[0];
					$height = $test[1];
				}
			if(isset($_FILES['red_store_image']['name']) && !empty($_FILES['red_store_image']['name']) )
			  {	
			  		$getredphotoname = $this->getValue("store_image",$CFG['table']['storemanage'],"store_id = '".$this->filterInput($_GET['store_id'])."' ");
					if(!empty($getredphotoname)){
						@unlink($CFG['site']['photo_store_path'].'/'.$getredphotoname);
					}
					
					$redlogoext   = $this->getFileExtension($_FILES['red_store_image']['name']);
					$redlogoname  = $this->seoUrl($_POST["store_name"].$_GET['store_id']).".".$redlogoext;
					$redlogoimage = "photo_red_".$redlogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$redlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['red_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
				}
			if(isset($_FILES['green_store_image']['name']) && !empty($_FILES['green_store_image']['name']) )
			  {	
			  		$getgreenphotoname = $this->getValue("store_image",$CFG['table']['storemanage'],"store_id = '".$this->filterInput($_GET['store_id'])."' ");
					if(!empty($getgreenphotoname)){
						@unlink($CFG['site']['photo_store_path'].'/'.$getgreenphotoname);
					}
					
					$greenlogoext   = $this->getFileExtension($_FILES['green_store_image']['name']);
					$greenlogoname  = $this->seoUrl($_POST["store_name"].$_GET['store_id']).".".$greenlogoext;
					$greenlogoimage = "photo_green_".$greenlogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$greenlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['green_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
				}
			if(isset($_FILES['orange_store_image']['name']) && !empty($_FILES['orange_store_image']['name']) )
			  {	
			  		$getorangephotoname = $this->getValue("store_image",$CFG['table']['storemanage'],"store_id = '".$this->filterInput($_GET['store_id'])."' ");
					if(!empty($getorangephotoname)){
						@unlink($CFG['site']['photo_store_path'].'/'.$getorangephotoname);
					}
					
					$orangelogoext   = $this->getFileExtension($_FILES['orange_store_image']['name']);
					$orangelogoname  = $this->seoUrl($_POST["store_name"].$_GET['store_id']).".".$orangelogoext;
					$orangelogoimage = "photo_orange_".$orangelogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$orangelogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['orange_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			
				}
			if(isset($_FILES['violet_store_image']['name']) && !empty($_FILES['violet_store_image']['name']) )
			  {	
			  		$getvioletphotoname = $this->getValue("store_image",$CFG['table']['storemanage'],"store_id = '".$this->filterInput($_GET['store_id'])."' ");
					if(!empty($getvioletphotoname)){
						@unlink($CFG['site']['photo_store_path'].'/'.$getvioletphotoname);
					}
					
					$violetlogoext   = $this->getFileExtension($_FILES['violet_store_image']['name']);
					$violetlogoname  = $this->seoUrl($_POST["store_name"].$_GET['store_id']).".".$violetlogoext;
					$violetlogoimage = "photo_violet_".$violetlogoname;
					$dest_name = $CFG['site']['photo_store_path'].'/'.$violetlogoimage;
					
					$uploadsuccess = @move_uploaded_file($_FILES['violet_store_image']['tmp_name'], $dest_name);
					@chmod($dest_name,0777);
			  }
				
					
			if($contentnum == '0' && !empty($store_name))
				{	
					if(isset($_FILES['store_image']['name']) && !empty($_FILES['store_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($store_name)."', store_description = '".$this->filterInput($_POST['store_description'])."',store_image = '".$this->filterInput($logoimage)."',width = '".$this->filterInput($width)."',height = '".$this->filterInput($height)."',status = '".$this->filterInput($status)."' WHERE store_id  = '".$this->filterInput($_GET['store_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['red_store_image']['name']) && !empty($_FILES['red_store_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($store_name)."', store_description = '".$this->filterInput($_POST['store_description'])."',red_store_image = '".$this->filterInput($redlogoimage)."',status = '".$this->filterInput($status)."' WHERE store_id  = '".$this->filterInput($_GET['store_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['green_store_image']['name']) && !empty($_FILES['green_store_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($store_name)."', store_description = '".$this->filterInput($_POST['store_description'])."',green_store_image = '".$this->filterInput($greenlogoimage)."',status = '".$this->filterInput($status)."' WHERE store_id  = '".$this->filterInput($_GET['store_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					if(isset($_FILES['orange_store_image']['name']) && !empty($_FILES['orange_store_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($store_name)."', store_description = '".$this->filterInput($_POST['store_description'])."',orange_store_image = '".$this->filterInput($orangelogoimage)."',status = '".$this->filterInput($status)."' WHERE store_id  = '".$this->filterInput($_GET['store_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					  }
					if(isset($_FILES['violet_store_image']['name']) && !empty($_FILES['violet_store_image']['name']) )
			          {	
			          		$UpQuery  = "UPDATE ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($store_name)."', store_description = '".$this->filterInput($_POST['store_description'])."',violet_store_image = '".$violetlogoimage."',status = '".$this->filterInput($status)."' WHERE store_id  = '".$this->filterInput($_GET['store_id'])."' ";
			          		$UpResult = $this->ExecuteQuery($UpQuery,'update');
					 }
					$UpQuery  = "UPDATE ".$CFG['table']['storemanage']." SET store_name = '".$this->filterInput($store_name)."', store_description = '".$this->filterInput($_POST['store_description'])."',status = '".$this->filterInput($status)."' WHERE store_id  = '".$this->filterInput($_GET['store_id'])."' ";
					$UpResult = $this->ExecuteQuery($UpQuery,'update');
					
					$this->redirectUrl("storeManage.php");	
				}
			else
				{
					$objSmarty->assign('ErrorMessage','Store Name Already Exists');
				}
		}

		function getInvoiceInfoAdmin()
	{
		global $CFG,$objSmarty;
		$userid = $_POST['user_id'];
		if(isset($userid) && !empty($userid))
		{
			
			$invoiceDet = $this->getMultiValue("user_id,fname ,surname ,invoice_for ,company_name ,tax_office ,tax_number ,id_number ,address ,	district ,city ,country",$CFG['table']['buy_invoice']," user_id = '".$userid."'");
			
		}
		 $objSmarty->assign('invoiceDet',$invoiceDet);

	}
	function buydomainInvoiceStoreDetails()
	{
		global $CFG,$objSmarty;

		$inv_fname      = $this->filterInput($_POST['inv_fname']);
		$inv_surname    = $this->filterInput($_POST['inv_surname']);
		$inv_for        = $this->filterInput($_POST['inv_for']);
		$inv_compname   = $this->filterInput($_POST['inv_compname']);
		$inv_taxoff     = $this->filterInput($_POST['inv_taxoff']);
		$inv_taxnum     = $this->filterInput($_POST['inv_taxnum']);
		$inv_idnumber   = $this->filterInput($_POST['inv_idnumber']);
		$inv_address    = $this->filterInput($_POST['inv_address']);
		$inv_district   = $this->filterInput($_POST['inv_district']);
		$inv_city       = $this->filterInput($_POST['inv_city']);
		$inv_country    = $this->filterInput($_POST['inv_country']);
		$user_id        = $this->filterInput($_POST['user_id']);

		if($inv_fname != '' && $inv_surname != ''  && $inv_for != '' && $inv_district != '')
		{
			$invoice = $this->getValue("id",$CFG['table']['buy_invoice']," user_id = '".$user_id."' ");
			
			if(isset($invoice) && !empty($invoice))
			{
				 $UpQuery  = "UPDATE  ".$CFG['table']['buy_invoice']." SET 
										fname           = '".$inv_fname."',
										surname         = '".$inv_surname."',
										invoice_for     = '".$inv_for."',
										company_name    = '".$inv_compname."',
										tax_office      = '".$inv_taxoff."',
										tax_number      = '".$inv_taxnum."',
										id_number       = '".$inv_idnumber."',
										address         = '".$inv_address."',
										district        = '".$inv_district."',
										city            = '".$inv_city."',
										country         = '".$inv_country."'
								WHERE id      = '".$invoice."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
				echo "success";exit;

			}else
			{
				 $UpQuery  = "INSERT INTO ".$CFG['table']['buy_invoice']." SET 
										user_id         = '".$user_id."' ,
										fname           = '".$inv_fname."',
										surname         = '".$inv_surname."',
										invoice_for     = '".$inv_for."',
										company_name    = '".$inv_compname."',
										tax_office      = '".$inv_taxoff."',
										tax_number      = '".$inv_taxnum."',
										id_number       = '".$inv_idnumber."',
										address         = '".$inv_address."',
										district        = '".$inv_district."',
										city            = '".$inv_city."',
										country         = '".$inv_country."',
										added_date      = '".time()."'";
				$UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
			}
			
			if($UpResult){
				echo "success";exit;
			}

		}

	}

	
 								
}




            
			
			
	


?>