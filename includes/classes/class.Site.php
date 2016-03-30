<?php 
/**
	**Class Function for Site
*/

class Site{	
   
    var $tagsArray;            // default = empty array
    var $attrArray;            // default = empty array

    var $tagsMethod;        // default = 0
    var $attrMethod;        // default = 0

    var $xssAuto;           // default = 1
    var $tagBlacklist = array('applet',  'body',  'bgsound',  'base',  'basefont',  'embed',  'frame',  'frameset',  'head',  'html',  'id',  'iframe',  'ilayer',  'layer',  'link',  'meta',  'name',  'object',  'script',  'style',  'title',  'xml');
    var $attrBlacklist = array('action',  'background',  'codebase',  'dynsrc',  'lowsrc');  // also will strip ALL event handlers
    var $DBCONN;
    
	function __construct($db_host="",$db_name="",$db_user="",$db_pwd="") {
         global $CFG;        
         $db_host = $CFG['db']['db_host'];
         $db_name = $CFG['db']['db_name'];
         $db_user = $CFG['db']['db_user'];
         $db_pwd  = $CFG['db']['db_pwd'];

        $this->db_connection($db_host,$db_name,$db_user,$db_pwd);
        $this->inputFilter($tagsArray = array(),  $attrArray = array(),  $tagsMethod = 0,  $attrMethod = 0,  $xssAuto = 1);
     }
	#........................................................................................
	#DB CONNECTION
	function db_connection($db_host,$db_name,$db_user,$db_pwd){

		$con = mysql_connect($db_host,$db_user,$db_pwd) or die("Could not connect: ".$db_host." :: ".$db_name." :: ".$db_user." :: ".$db_pwd. $this->mysql_error());
		mysql_select_db($db_name,$con) or die ('Can\'t use  : '.$db_name . $this->mysql_error($con));
        $this->DBCONN = $con;
        
	}
    
    /** 
      * Constructor for inputFilter class. Only first parameter is required.
      * @access constructor
      * @param Array $tagsArray - list of user-defined tags
      * @param Array $attrArray - list of user-defined attributes
      * @param int $tagsMethod - 0= allow just user-defined,  1= allow all but user-defined
      * @param int $attrMethod - 0= allow just user-defined,  1= allow all but user-defined
      * @param int $xssAuto - 0= only auto clean essentials,  1= allow clean blacklisted tags/attr
      */
      
    function inputFilter($tagsArray = array(),  $attrArray = array(),  $tagsMethod = 0,  $attrMethod = 0,  $xssAuto = 1) {        
        // make sure user defined arrays are in lowercase
        for ($i = 0; $i < count($tagsArray); $i++) $tagsArray[$i] = strtolower($tagsArray[$i]);
        for ($i = 0; $i < count($attrArray); $i++) $attrArray[$i] = strtolower($attrArray[$i]);
        // assign to member vars
        $this->tagsArray = (array) $tagsArray;
        $this->attrArray = (array) $attrArray;
        $this->tagsMethod = $tagsMethod;
        $this->attrMethod = $attrMethod;
        $this->xssAuto = $xssAuto;
    }
    
    /** 
      * Method to be called by another php script. Processes for XSS and specified bad code.
      * @access public
      * @param Mixed $source - input string/array-of-string to be 'cleaned'
      * @return String $source - 'cleaned' version of input parameter
      */
    function process($source) {
        // clean all elements in this array
        if (is_array($source)) {
            foreach($source as $key => $value)
                // filter element for XSS and other 'bad' code etc.
                if (is_string($value)) $source[$key] = $this->remove($this->decode($value));
            return $source;
        // clean this string
        } else if (is_string($source)) {
            // filter source for XSS and other 'bad' code etc.
            return $this->remove($this->decode($source));
        // return parameter as given
        } else return $source;    
    }

    /** 
      * Internal method to iteratively remove all unwanted tags and attributes
      * @access protected
      * @param String $source - input string to be 'cleaned'
      * @return String $source - 'cleaned' version of input parameter
      */
    function remove($source) {
        $loopCounter=0;
        // provides nested-tag protection
        while($source != $this->filterTags($source)) {
            $source = $this->filterTags($source);
            $loopCounter++;
        }
        return $source;
    }    
    
    /** 
      * Internal method to strip a string of certain tags
      * @access protected
      * @param String $source - input string to be 'cleaned'
      * @return String $source - 'cleaned' version of input parameter
      */
    function filterTags($source) {
        // filter pass setup
        $preTag = NULL;
        $postTag = $source;
        // find initial tag's position
        $tagOpen_start = strpos($source,  '<');
        // interate through string until no tags left
        while($tagOpen_start !== FALSE) {
            // process tag interatively
            $preTag .= substr($postTag,  0,  $tagOpen_start);
            $postTag = substr($postTag,  $tagOpen_start);
            $fromTagOpen = substr($postTag,  1);
            // end of tag
            $tagOpen_end = strpos($fromTagOpen,  '>');
            if ($tagOpen_end === false) break;
            // next start of tag (for nested tag assessment)
            $tagOpen_nested = strpos($fromTagOpen,  '<');
            if (($tagOpen_nested !== false) && ($tagOpen_nested < $tagOpen_end)) {
                $preTag .= substr($postTag,  0,  ($tagOpen_nested+1));
                $postTag = substr($postTag,  ($tagOpen_nested+1));
                $tagOpen_start = strpos($postTag,  '<');
                continue;
            } 
            $tagOpen_nested = (strpos($fromTagOpen,  '<') + $tagOpen_start + 1);
            $currentTag = substr($fromTagOpen,  0,  $tagOpen_end);
            $tagLength = strlen($currentTag);
            if (!$tagOpen_end) {
                $preTag .= $postTag;
                $tagOpen_start = strpos($postTag,  '<');            
            }
            // iterate through tag finding attribute pairs - setup
            $tagLeft = $currentTag;
            $attrSet = array();
            $currentSpace = strpos($tagLeft,  ' ');
            // is end tag
            if (substr($currentTag,  0,  1) == "/") {
                $isCloseTag = TRUE;
                list($tagName) = explode(' ',  $currentTag);
                $tagName = substr($tagName,  1);
            // is start tag
            } else {
                $isCloseTag = FALSE;
                list($tagName) = explode(' ',  $currentTag);
            }        
            // excludes all "non-regular" tagnames OR no tagname OR remove if xssauto is on and tag is blacklisted
            if ((!preg_match("/^[a-z][a-z0-9]*$/i", $tagName)) || (!$tagName) || ((in_array(strtolower($tagName),  $this->tagBlacklist)) && ($this->xssAuto))) {                 
                $postTag = substr($postTag,  ($tagLength + 2));
                $tagOpen_start = strpos($postTag,  '<');
                // don't append this tag
                continue;
            }
            // this while is needed to support attribute values with spaces in!
            while ($currentSpace !== FALSE) {
                $fromSpace = substr($tagLeft,  ($currentSpace+1));
                $nextSpace = strpos($fromSpace,  ' ');
                $openQuotes = strpos($fromSpace,  '"');
                $closeQuotes = strpos(substr($fromSpace,  ($openQuotes+1)),  '"') + $openQuotes + 1;
                // another equals exists
                if (strpos($fromSpace,  '=') !== FALSE) {
                    // opening and closing quotes exists
                    if (($openQuotes !== FALSE) && (strpos(substr($fromSpace,  ($openQuotes+1)),  '"') !== FALSE))
                        $attr = substr($fromSpace,  0,  ($closeQuotes+1));
                    // one or neither exist
                    else $attr = substr($fromSpace,  0,  $nextSpace);
                // no more equals exist
                } else $attr = substr($fromSpace,  0,  $nextSpace);
                // last attr pair
                if (!$attr) $attr = $fromSpace;
                // add to attribute pairs array
                $attrSet[] = $attr;
                // next inc
                $tagLeft = substr($fromSpace,  strlen($attr));
                $currentSpace = strpos($tagLeft,  ' ');
            }
            // appears in array specified by user
            $tagFound = in_array(strtolower($tagName),  $this->tagsArray);            
            // remove this tag on condition
            if ((!$tagFound && $this->tagsMethod) || ($tagFound && !$this->tagsMethod)) {
                // reconstruct tag with allowed attributes
                if (!$isCloseTag) {
                    $attrSet = $this->filterAttr($attrSet);
                    $preTag .= '<' . $tagName;
                    for ($i = 0; $i < count($attrSet); $i++)
                        $preTag .= ' ' . $attrSet[$i];
                    // reformat single tags to XHTML
                    if (strpos($fromTagOpen,  "</" . $tagName)) $preTag .= '>';
                    else $preTag .= ' />';
                // just the tagname
                } else $preTag .= '</' . $tagName . '>';
            }
            // find next tag's start
            $postTag = substr($postTag,  ($tagLength + 2));
            $tagOpen_start = strpos($postTag,  '<');            
        }
        // append any code after end of tags
        $preTag .= $postTag;
        return $preTag;
    }

    /** 
      * Internal method to strip a tag of certain attributes
      * @access protected
      * @param Array $attrSet
      * @return Array $newSet
      */
    function filterAttr($attrSet) {    
        $newSet = array();
        // process attributes
        for ($i = 0; $i <count($attrSet); $i++) {
            // skip blank spaces in tag
            if (!$attrSet[$i]) continue;
            // split into attr name and value
            $attrSubSet = explode('=',  trim($attrSet[$i]));
            list($attrSubSet[0]) = explode(' ',  $attrSubSet[0]);
            // removes all "non-regular" attr names AND also attr blacklisted
            if ((!eregi("^[a-z]*$", $attrSubSet[0])) || (($this->xssAuto) && ((in_array(strtolower($attrSubSet[0]),  $this->attrBlacklist)) || (substr($attrSubSet[0],  0,  2) == 'on')))) 
                continue;
            // xss attr value filtering
            if ($attrSubSet[1]) {
                // strips unicode,  hex,  etc
                $attrSubSet[1] = str_replace('&#',  '',  $attrSubSet[1]);
                // strip normal newline within attr value
                $attrSubSet[1] = preg_replace('/\s+/',  '',  $attrSubSet[1]);
                // strip double quotes
                $attrSubSet[1] = str_replace('"',  '',  $attrSubSet[1]);
                // [requested feature] convert single quotes from either side to doubles (Single quotes shouldn't be used to pad attr value)
                if ((substr($attrSubSet[1],  0,  1) == "'") && (substr($attrSubSet[1],  (strlen($attrSubSet[1]) - 1),  1) == "'"))
                    $attrSubSet[1] = substr($attrSubSet[1],  1,  (strlen($attrSubSet[1]) - 2));
                // strip slashes
                $attrSubSet[1] = stripslashes($attrSubSet[1]);
            }
            // auto strip attr's with "javascript:
            if (    ((strpos(strtolower($attrSubSet[1]),  'expression') !== false) &&    (strtolower($attrSubSet[0]) == 'style')) ||
                    (strpos(strtolower($attrSubSet[1]),  'javascript:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'behaviour:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'vbscript:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'mocha:') !== false) ||
                    (strpos(strtolower($attrSubSet[1]),  'livescript:') !== false) 
            ) continue;

            // if matches user defined array
            $attrFound = in_array(strtolower($attrSubSet[0]),  $this->attrArray);
            // keep this attr on condition
            if ((!$attrFound && $this->attrMethod) || ($attrFound && !$this->attrMethod)) {
                // attr has value
                if ($attrSubSet[1]) $newSet[] = $attrSubSet[0] . '="' . $attrSubSet[1] . '"';
                // attr has decimal zero as value
                else if ($attrSubSet[1] == "0") $newSet[] = $attrSubSet[0] . '="0"';
                // reformat single attributes to XHTML
                else $newSet[] = $attrSubSet[0] . '="' . $attrSubSet[0] . '"';
            }    
        }
        return $newSet;
    }
    
    /** 
      * Try to convert to plaintext
      * @access protected
      * @param String $source
      * @return String $source
      */
    function decode($source) {
        // url decode
        $source = html_entity_decode($source,  ENT_QUOTES,  "ISO-8859-1");
        // convert decimal
        //$source = preg_replace('/&#(\d+);/me', "chr(\\1)",  $source);                // decimal notation
        $source = preg_replace_callback('/&#(\d+);/m', function($source){
           return utf8_encode(chr($source[1]));
        }, $source);
        // convert hex
        //$source = preg_replace('/&#x([a-f0-9]+);/mei', "chr(0x\\1)",  $source);    // hex notation
        $source = preg_replace_callback('/&#x([a-f0-9]+);/m', function($source){
           return utf8_encode(chr($source[1]));
        }, $source);
        return $source;
    }

    /** 
      * Method to be called by another php script. Processes for SQL injection
      * @access public
      * @param Mixed $source - input string/array-of-string to be 'cleaned'
      * @param Buffer $connection - An open MySQL connection
      * @return String $source - 'cleaned' version of input parameter
      */
    function safeSQL($source,  &$connection) {
        // clean all elements in this array
        if (is_array($source)) {
            foreach($source as $key => $value)
                // filter element for SQL injection
                if (is_string($value)) $source[$key] = $this->quoteSmart($this->decode($value),  $connection);
            return $source;
        // clean this string
        } else if (is_string($source)) {
            // filter source for SQL injection
            if (is_string($source)) return $this->quoteSmart($this->decode($source),  $connection);
        // return parameter as given
        } else return $source;    
    }

    /** 
      * @author Chris Tobin
      * @author Daniel Morris
      * @access protected
      * @param String $source
      * @param Resource $connection - An open MySQL connection
      * @return String $source
      */
    function quoteSmart($source,  &$connection) {
        // strip slashes
        if (get_magic_quotes_gpc()) $source = stripslashes($source);
        // quote both numeric and text
        $source = $this->escapeString($source,  $connection);
        return $source;
    }
    
    /** 
      * @author Chris Tobin
      * @author Daniel Morris
      * @access protected
      * @param String $source
      * @param Resource $connection - An open MySQL connection
      * @return String $source
      */    
    function escapeString($string,  &$connection) {
        // depreciated function
        if (version_compare(phpversion(), "4.3.0",  "<")) mysql_escape_string($string);
        // current function
        else mysql_real_escape_string($string);
        return $string;
    } 
    
    function filterInput($input = "") {
        $safeInput = $this->process($input);
        $safeInput = $this->safeSQL($safeInput, $this->DBCONN);
        if(!is_array($safeInput))
            $safeInput = addslashes($safeInput);
            
        return $safeInput;
    } 
	#........................................................................................
	#GET Single Value
	function getValue($select,$table_name,$condition){
		$sql = "SELECT ".$select." FROM ".$table_name." WHERE ". $condition." ";
		#echo $sql."<br>";
		$res = mysql_query($sql)or die($this->mysql_error($sql));
		$row = mysql_fetch_assoc($res);		
		return stripslashes($row[$select]);
	}
	#........................................................................................
	#GET Single Value
	function getMultiValue($select,$table_name,$condition){
		$sql = "SELECT ".$select." FROM ".$table_name." WHERE ".$condition." ";
		#echo $sql."<br>";
		$res = mysql_query($sql)or die($this->mysql_error($sql));
		while($row = mysql_fetch_assoc($res)){
			$row_list[] = $row;
		}		
		return $row_list;
	}
	#........................................................................................	
	#GET NUM VALUES
	function getNumvalues($table_name,$condition){
		//$sql = "SELECT ".$select." FROM ".$table_name." WHERE ".$condition." ";
		$sql = "SELECT * FROM ".$table_name." WHERE ".$condition." ";
		#echo $sql;
		$res = mysql_query($sql)or die($this->mysql_error($sql));
		$num = mysql_num_rows($res);
		//echo $num;
		return $num;		
	}
    #get count value
	function getCountValue($table_name,$condition){
	   
		$sql = " SELECT COUNT(*) FROM ".$table_name." WHERE ".$condition." ";
        #echo $sql."<br />";
        $res = mysql_query($sql)or die($this->mysql_error($sql));
		$num = mysql_fetch_row($res);
        return $num[0];		
	}
	#........................................................................................
	#GET UPDATE
	function getUpdate($table_name,$upvalues,$condition){
		$sql = "UPDATE ".$table_name." SET ".$upvalues." WHERE ".$condition." ";
		//echo $sql."<br>";
		$res = mysql_query($sql)or die($this->mysql_error($sql));
		//$row = mysql_fetch_assoc($res);
		
		//return $res;
		return ($row[$select]);
	}
	#........................................................................................
	#GET Addslashes
	function My_addslashes($string){
		
	    $string = htmlspecialchars(addslashes(trim($string)));
	    return $string;
    }
    #........................................................................................
	#GET Addslashes
	function My_addslashes_content($string){
		
	    $string = addslashes(trim($string));
	    return $string;
    }
    #........................................................................................
	#GET Addslashes
	function My_stripslashes($string){
		
	    $string = stripslashes($string);
	    return $string;
    }
    #........................................................................................
    /** 
	  * Return URL-Friendly string slug
	  * @param string $string 
	  * @return string 
	  */
    function seoUrl($string) {
	    //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
	    $string = strtolower(trim($string));
	    //Strip any unwanted characters
	    $string = str_replace('/','-',$string);
	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    //Clean multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
  	} 
    #....................................................................................
	#READ FILE CONTENT
	function readfilecontent($file){

       $fp		 	= fopen("$file","r") or die("Could not open the file $file");
       $filesize 	= filesize($file);
       $filecontent	= fread($fp,$filesize);
       fclose($fp);
       return $filecontent;
    }
    #....................................................................................
	#Sendmail
 	function sendMail($fromname,$fromemail,$to_email,$mail_subject,$mail_content){
        if($_SERVER['HTTP_HOST'] != 'localhost')
    		{
            	/*$mailHeader  = "From:".$fromname." <".$fromemail."> \n" ;
        	    $mailHeader .= "X-Sender:". $fromemail." \n";
        	    $mailHeader .= "Reply-To: ".$fromname." <".$fromemail."> \n";
        	    $mailHeader .= "Content-Type: text/html; charset=utf-8 \n";
        	    $mailHeader .= "Return-Path:".$fromemail." \n";
        	    $mailHeader .= "Error-To: ".$fromemail." \n";
        	    $mailHeader .= "X-Mailer: ".$_SERVER['SERVER_NAME']." \n";
        	    $mailHeader .= "MIME-Version: 1.0 \n";
        	    
        	    $mailresult  = mail($to_email,$mail_subject,$mail_content,$mailHeader);
            	return $mailresult;*/
                $email = $to_email;
                $mail  = new PHPMailer; // call the class 
                $mail->IsSMTP(); 
                $mail->CharSet = 'UTF-8';
                $mail->Host = "smtp.yandex.com.tr"; //Hostname of the mail server
                $mail->Port = 465; //Port of the SMTP like to be 25, 80, 465 or 587
                //$mail->SMTPDebug = 2;
                $mail->SMTPAuth = true; //Whether to use SMTP authentication
                $mail->SMTPSecure = "ssl";  
                $mail->Username = "postaci@enkolayweb.com"; //Username for SMTP authentication any valid email created in your domain
                $mail->Password = "ZJkFPqUy9aitPzS"; //Password for SMTP authentication
                //$mail->AddReplyTo("easyfood@easyfood.ec", "Easy Food"); //reply-to address
                
                $mail->SetFrom("postaci@enkolayweb.com", "postaci@enkolayweb.com"); //From address of the mail  
                
                $mail->Subject = $mail_subject; //Subject od your mail
                $mail->AddAddress($email, $fromname); //To address who will receive this email
                $mail->MsgHTML($mail_content); //Put your body of the message you can place html code here
                $send = $mail->Send(); //Send the mails
                
                if($send){
                    return TRUE;
                }           
            }  
        else
            {
                return TRUE;
            }      
    }  
   /* function sendMail($fromname,$fromemail,$to_email,$mail_subject,$mail_content, $mail_attachment_name='', $mail_attachment_content='')
        {
           global $CFG;
         
          //if(($_SERVER['HTTP_HOST'] != 'localhost') && ($CFG['site']['mail_options'] == 'SMTP')){
            if(($CFG['site']['mail_options'] == 'SMTP')){
               $mail = new PHPMailer();
        
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host          = $CFG['site']['host_name']; // sets the SMTP server
            $mail->Port          = $CFG['site']['port_address'];                    // set the SMTP port for the GMAIL server
            $mail->Username      = $CFG['site']['smtp_email']; // SMTP account username
            $mail->Password      = $CFG['site']['smtp_password'];        // SMTP account password
            
            //$mail->SMTPDebug = 1;
            
            //$mail->From     = "hello@one-delivery.co.uk";
            $mail->From     = $fromemail;
            $mail->FromName = $fromname;
            $mail->AddReplyTo($fromemail,$fromname);
            
            $mail->AddAddress($to_email); // Add a recipient // Name is optional
            
            $mail->Subject  = $mail_subject;
            $mail->IsHTML(true); 
            $mail->Body     = $mail_content;
            
            if( isset($mail_attachment_content) && !empty($mail_attachment_content) && isset($mail_attachment_name) && !empty($mail_attachment_name) ){
                $mail->AddAttachment($mail_attachment_content,$mail_attachment_name);
            }
            elseif( isset($mail_attachment_content) && !empty($mail_attachment_content) ){
                $mail->AddAttachment($mail_attachment_content);
            }
            
            $mailresult  = $mail->Send();
            /*if(!$mailresult) {
                //$mailresult  = $mail->Send();
                $mailresult= $mail->ErrorInfo;
            } */
    	    
      /*  }else{
            $mailHeader  = "From:".$fromname." <".$fromemail."> \n" ;
    	    $mailHeader .= "X-Sender:". $fromemail." \n";
    	    $mailHeader .= "Reply-To: ".$fromname." <".$fromemail."> \n";
    	    $mailHeader .= "Content-Type: text/html; charset=iso-8859-1 \n";
    	    #$mailHeader .= "Content-Type: text/html; charset=utf-8 \n";
    	    $mailHeader .= "Return-Path:".$fromemail." \n";
    	    $mailHeader .= "Error-To: ".$fromemail." \n";
    	    $mailHeader .= "X-Mailer: ".$_SERVER['SERVER_NAME']." \n";
    	    $mailHeader .= "MIME-Version: 1.0 \n";
    
    	    $mailresult  = @mail($to_email,$mail_subject,$mail_content,$mailHeader);
        }
    }  */
	#........................................................................................
    #GET FILE NAME
	function get_file_name(){
		global $objSmarty;
		
		$php_self_arr1 		= explode("/",$_SERVER['PHP_SELF']);		
		$cnt_php_self_arr1	= count($php_self_arr1);
		$req_file_name		= $php_self_arr1[$cnt_php_self_arr1-1];
		//echo "<br>".$req_file_name;
		$objSmarty->assign('req_file_name',$req_file_name);
		
		return $req_file_name;
	}
	#........................................................................................
	#Redirect Url
	function redirectUrl($filename){
		global $CFG;
	    header("Location:$filename");
		exit();
    }
	#....................................................................................
	#EXECUTE QUERY
	function ExecuteQuery($Query, $Qrytype){
		
		if(!empty($Query) && !empty($Qrytype)){
			switch(strtolower($Qrytype))
			{
				case "select":
					$Result = mysql_query($Query) or die("Error in Selection Query <br> ".$Query."<br>". ($this->mysql_error($Query)));
					if($Result){	
						$ResultSet = array();
						while($ResultSet1 = mysql_fetch_assoc($Result))
							$ResultSet[] = $ResultSet1;
						return $ResultSet;
					}
					else return false;
					break;
				case "update":
					$Result = mysql_query($Query) or die("Error in Updation Query <br> ".$Query."<br>". ($this->mysql_error($Query)));
					if($Result){
						$AffectedNums = mysql_affected_rows();
						return $AffectedNums;
					}
					else return false;
					break;
					case "norows":
					$Result = mysql_query($Query) or die("Error in No of Rows Query <br> ".$Query."<br>". ($this->mysql_error($Query)));
					if($Result){
						$Totalrows = mysql_num_rows($Result);
						return $Totalrows;
					}
					else return false;
					break;
				case "insert":
					$Result = mysql_query($Query) or die("Error in Insertion Query <br> ".$Query."<br>".($this->mysql_error($Query)));
					if($Result){
						$LastInsertedRow = mysql_insert_id();
						return $LastInsertedRow;
					}
					else return false;
					break;
				case "delete":
					$Result = mysql_query($Query) or die("Error in Deletion Query <br> ".$Query."<br>". ($this->mysql_error($Query)));
					if($Result)
						return true;
					else
						return false;
			}
		}
	}
    #..........................................................................
    function mysql_error($sql)
    {         
       /* if($_SERVER['SERVER_ADDR'] != '127.0.0.1')
    		{
    		  die("Query Error");
    		}
        else
            {
                $res    = mysql_error().$sql;
                return $res;
            }    */
         $res    = mysql_error().$sql;
         return $res;
    }
	#....................................................................................
	#PAGINATION ADMIN
	function make_page($targetpage,$total_pages,$limit,$page,$fields){
		$adjacents = 1;
		/* Setup page vars for display. */					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		if($total_pages >0)						//next page is page + 1
		  $lastpage = ceil($total_pages/$limit);
                else    
                  $lastpage = 1;	
                                 	//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/
		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			//First
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=1$fields\"=>&lt;&lt; First</a>";
			else
				$pagination.= "<span class=\"disabled\"> First</span>";
			
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage?page=$prev$fields\"=>&lt; Previous</a>";
			else
				$pagination.= "<span class=\"disabled\">&lt; Previous</span>";
			
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1$fields\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage$fields\">$lastpage</a>";
							
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage?page=1$fields\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2$fields\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";	
											
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage?page=$lpm1$fields\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage?page=$lastpage$fields\">$lastpage</a>";
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage?page=1$fields\">1</a>";
					$pagination.= "<a href=\"$targetpage?page=2$fields\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?page=$counter$fields\">$counter</a>";
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$next$fields\">Next &gt;</a>";
			else
				$pagination.= "<span class=\"disabled\">Next &gt;</span>";
				
			//Last button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage?page=$lastpage$fields\">Last &gt;&gt;</a>";
			else
				$pagination.= "<span class=\"disabled\">Last &gt;&gt;</span>";
				
			$pagination.= "</div>\n";		
		}
		return $pagination;
	}
	#....................................................................................
	#PAGINATION USER SIDE
	function make_page_usersideAjax($targetpage,$total_pages,$limit,$page,$fields){
		//echo $fields;
		//echo $total_pages;
		//echo $page;
		$adjacents = 1;
		/* Setup page vars for display. */					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/
		
		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			#$pagination .= "<div class=\"contRitePagenation\">";
			$pagination .= "<ul class=\"pagenation\">";
			//previous button
			if ($page > 1){
				$pagination.= "<li><a onclick=\"ajaxPagination('1'".$fields.$targetpage.")\" href=\"javascript:void(0);\"=>&laquo;</a></li>";
				$pagination.= "<li><a onclick=\"ajaxPagination('$prev'".$fields.$targetpage.")\" href=\"javascript:void(0);\"=>&lt;</a></li>";
			}
				
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
					else
						$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.")\" href=\"javascript:void(0);\">$counter</a></li>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
						else
							$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.")\" href=\"javascript:void(0);\">$counter</a></li>";					
					}
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
					$pagination.= "<li><a onclick=\"ajaxPagination('$lastpage'".$fields.$targetpage.")\" href=\"javascript:void(0);\">$lastpage</a></li>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<li><a onclick=\"ajaxPagination('1'".$fields.$targetpage.")\" href=\"javascript:void(0);\">1</a></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
						else{
							//if($counter != 2)
								$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.")\" href=\"javascript:void(0);\">$counter</a></li>";		
						}
										
					}
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
					$pagination.= "<li><a onclick=\"ajaxPagination('$lastpage'".$fields.$targetpage.")\" href=\"javascript:void(0);\">$lastpage</a></li>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<li><a onclick=\"ajaxPagination('1'".$fields.$targetpage.")\" href=\"javascript:void(0);\">1</a></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
						else
							$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.")\" href=\"javascript:void(0);\">$counter</a></li>";	
					}
				}
			}
			
			//next button
			if ($page < $counter - 1){
				$pagination.= "<li><a onclick=\"ajaxPagination('$next'".$fields.$targetpage.")\" href=\"javascript:void(0);\">&gt;</a></li>";
				$pagination.= "<li><a onclick=\"ajaxPagination('$lastpage'".$fields.$targetpage.")\" href=\"javascript:void(0);\">&raquo;</a></li>";
			}else{
				#$pagination.= "<span class=\"disabled\" title=\"Next\">&gt;</span>";
				#$pagination.= "<span class=\"disabled\" title=\"Last\">&raquo;</span>";
			}
			$pagination.= "</ul>\n";
			#$pagination.= "</div>\n";
			$pagination.= "</div>\n";
					
		}
		return $pagination;
	}
	#....................................................................................
	#PAGINATION USER SIDE In Search Result
	function make_page_usersideAjaxSearch($targetpage,$total_pages,$limit,$page,$fields,$houses,$rentfor,$rooms,$rentrate,$strt,$area){
		//echo $fields;
		//echo $total_pages;
		//echo $page;
		$adjacents = 1;
		/* Setup page vars for display. */					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/
		
		$pagination = "";
		if($lastpage > 1)
		{	
			$pagination .= "<div class=\"pagination\">";
			#$pagination .= "<div class=\"contRitePagenation\">";
			$pagination .= "<ul class=\"pagenation\">";
			//previous button
			if ($page > 1){
				$pagination.= "<li><a onclick=\"ajaxPagination('1'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\"=>&laquo;</a></li>";
				$pagination.= "<li><a onclick=\"ajaxPagination('$prev'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\"=>&lt;</a></li>";
			}
			else{
				#$pagination.= "<span class=\"disabled\" title=\"First\">&laquo;</span>";
				#$pagination.= "<span class=\"disabled\" title=\"Previous\">&lt;</span>";
			}
					
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
					else
						$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">$counter</a></li>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
						else
							$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">$counter</a></li>";					
					}
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
					$pagination.= "<li><a onclick=\"ajaxPagination('$lastpage'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">$lastpage</a></li>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<li><a onclick=\"ajaxPagination('1'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">1</a></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
						else{
							//if($counter != 2)
								$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">$counter</a></li>";		
						}
										
					}
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('$lpm1$fields')\" href=\"#!/pagevar=$lpm1"."$targetpage\">$lpm1</a>";
					$pagination.= "<li><a onclick=\"ajaxPagination('$lastpage'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">$lastpage</a></li>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<li><a onclick=\"ajaxPagination('1'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">1</a></li>";
					//$pagination.= "<a onclick=\"ajaxPagination('2$fields')\" href=\"#!/pagevar=2"."$targetpage\">2</a>";
					$pagination.= "<li><span class=\"dotted\">...</span></li>";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li><a href=\"javascript:void(0);\"><span class=\"current\">$counter</span></a></li>";
						else
							$pagination.= "<li><a onclick=\"ajaxPagination('$counter'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">$counter</a></li>";	
					}
				}
			}
			
			//next button
			if ($page < $counter - 1){
				$pagination.= "<li><a onclick=\"ajaxPagination('$next'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">&gt;</a></li>";
				$pagination.= "<li><a onclick=\"ajaxPagination('$lastpage'".$fields.$targetpage.$houses.$rentfor.$rooms.$rentrate.$strt.$area.")\" href=\"javascript:void(0);\">&raquo;</a></li>";
			}else{
				#$pagination.= "<span class=\"disabled\" title=\"Next\">&gt;</span>";
				#$pagination.= "<span class=\"disabled\" title=\"Last\">&raquo;</span>";
			}
			$pagination.= "</ul>\n";
			#$pagination.= "</div>\n";
			$pagination.= "</div>\n";
					
		}
		return $pagination;
	}
	#........................................................................................
	#Javascript Global Variable
	function setglobalvarjavascript(){
		global $CFG,$objSmarty;
	 	if(isset($_SERVER['HTTP_X_FORWARDED_HOST']) && !empty($_SERVER['HTTP_X_FORWARDED_HOST'])){
			 
    		$url = explode(',',$_SERVER['HTTP_X_FORWARDED_HOST']);
    		if($url[1])
             $serverhost_url = trim($url[1]);
            else
             $serverhost_url = trim($url[0]);
            $CFG['site']['base_path1']    = dirname(dirname(__FILE__));
	    	$CFG['site']['base_url1']     = "http://".$serverhost_url;
	    	$CFG['site']['base_url'] = $CFG['site']['base_url1'];
	    	 
    	}
		$sitejsbaseurl = '<script type="text/javascript">'."\n".'var jssitebaseUrl = "'.$CFG['site']['base_url'].'";'."\n".'var jssiteuserfriendly = "'.$CFG['site']['userfriendly'].'";'."\n".'var site_main_domain = "'.$CFG['site']['site_main_domain'].'";'."\n".'</script>';
		$objSmarty->assign('getglobalvarjavascript',$sitejsbaseurl);
		
	}
	#........................................................................................
    #GET UPLOADED EXTENSION
	function getFileExtension($filename){
		global $objSmarty;
		
		$vid_ext_arr 	= explode(".",$filename);
		$vid_ext_arr_cnt= count($vid_ext_arr);
		$vid_ext 		= strtolower($vid_ext_arr[$vid_ext_arr_cnt-1]);
		
		return $vid_ext;
	}
	#........................................................................................
	#ADMIN Site Setting
	function getsite_setting(){
		global $CFG,$objSmarty;
		
	    $UpQuery  = "SELECT  admin_name, admin_email, userfriendly, sitename, sitelogo, site_fav_icon,facebook_api, admin_page,page_subs_count, user_page,pay_test_mode,pay_test_url,pay_url, pay_merchant_email, nestPay_mode, nestPay_test_clientId, nestPay_test_storeId, nestPay_live_clientId, nestPay_live_storeId, nestPay_test_userName, nestPay_test_pwd, nestPay_live_userName, nestPay_live_pwd, domain_apl_mode, domain_reg_url_test, domain_reg_url_live, domain_reg_gui_live , domain_reg_gui_test, mail_options,host_name,port_address,smtp_email,smtp_password FROM ".$CFG['table']['sitesetting']." WHERE id  = 1";
		$sitesetting = $this->ExecuteQuery($UpQuery,'select');
	 	$CFG['site']['sitedomain'] 		= '';
		$CFG['site']['adminname'] 		= $this->My_Stripslashes($sitesetting['0']['admin_name']);
		$CFG['site']['adminemail'] 		= $this->My_Stripslashes($sitesetting['0']['admin_email']);
		$CFG['site']['sitename'] 		= $this->My_Stripslashes($sitesetting['0']['sitename']);
		$CFG['site']['page_subs_count'] = $this->My_Stripslashes($sitesetting['0']['page_subs_count']);
        $CFG['site']['facebook_api']    = $this->My_Stripslashes($sitesetting['0']['facebook_api']);
		$CFG['site']['adminperpage']	= $sitesetting['0']['admin_page'];
		$CFG['site']['userperpage']		= $sitesetting['0']['user_page'];
		$CFG['site']['logoname']		= $CFG['site']['image_url'].'/'.$sitesetting['0']['sitelogo'];
		$CFG['site']['userfriendly']	= $sitesetting['0']['userfriendly'];
        #this is for facebook api
        $objSmarty->assign("FACEBOOK_API",$CFG['site']['facebook_api'] );
		
		#this is for paypal
		$CFG['payment']['paypal']['test_mode'] 		= $this->My_Stripslashes($sitesetting['0']['pay_test_mode']);
		$CFG['payment']['paypal']['url'] 		    = $this->My_Stripslashes($sitesetting['0']['pay_url']);
		$CFG['payment']['paypal']['test_url'] 		= $this->My_Stripslashes($sitesetting['0']['pay_test_url']);
		$CFG['payment']['paypal']['merchant_email'] = $this->My_Stripslashes($sitesetting['0']['pay_merchant_email']);
		$objSmarty->assign("PAYPAL_MERCHANT_EMAIL",$CFG['payment']['paypal']['merchant_email']);
        
        #nest payment setting
        $CFG['payment']['nestpay']['Pay_mode'] 		= $this->My_Stripslashes($sitesetting['0']['nestPay_mode']);
		$CFG['payment']['nestpay']['test_clientId'] = $this->My_Stripslashes($sitesetting['0']['nestPay_test_clientId']);
		$CFG['payment']['nestpay']['test_storeId'] 	= $this->My_Stripslashes($sitesetting['0']['nestPay_test_storeId']);
        $CFG['payment']['nestpay']['test_username'] = $this->My_Stripslashes($sitesetting['0']['nestPay_test_userName']);
        $CFG['payment']['nestpay']['test_password'] = $this->My_Stripslashes($sitesetting['0']['nestPay_test_pwd']);
		$CFG['payment']['nestpay']['live_clientId'] = $this->My_Stripslashes($sitesetting['0']['nestPay_live_clientId']);
        $CFG['payment']['nestpay']['live_storeId']  = $this->My_Stripslashes($sitesetting['0']['nestPay_live_storeId']);
        $CFG['payment']['nestpay']['live_username'] = $this->My_Stripslashes($sitesetting['0']['nestPay_live_userName']);
        $CFG['payment']['nestpay']['live_password'] = $this->My_Stripslashes($sitesetting['0']['nestPay_live_pwd']);
		
		#this is for auhorize
	/*	$CFG['payment']['authorize']['test_mode'] 		            = $this->My_Stripslashes($sitesetting['0']['auth_test_mode']);
		$CFG['payment']['authorize']['paymentlogin_live'] 		    = $this->My_Stripslashes($sitesetting['0']['live_pay_app_id']);
		$CFG['payment']['authorize']['paymentlogin_test'] 		    = $this->My_Stripslashes($sitesetting['0']['test_pay_app_id']);
		$CFG['payment']['authorize']['paymenttransaction_live']     = $this->My_Stripslashes($sitesetting['0']['live_pay_trans_key']);
		$CFG['payment']['authorize']['paymenttransaction_test']     = $this->My_Stripslashes($sitesetting['0']['test_pay_trans_key']);
		$CFG['payment']['authorize']['authorize_url_live']          = $this->My_Stripslashes($sitesetting['0']['auth_live_url']);
		$CFG['payment']['authorize']['authorize_url_test']          = $this->My_Stripslashes($sitesetting['0']['auth_pay_text_url']);  */
		#echo $CFG['site']['userfriendly'];
        #for smtp mail functions
        $CFG['site']['mail_options']          = $sitesetting['0']['mail_options'];
        $CFG['site']['host_name']             = $this->My_Stripslashes($sitesetting['0']['host_name']);
		$CFG['site']['port_address']          = $this->My_Stripslashes($sitesetting['0']['port_address']);
		$CFG['site']['smtp_email']            = $this->My_Stripslashes($sitesetting['0']['smtp_email']);
		$CFG['site']['smtp_password']         = $this->My_Stripslashes($sitesetting['0']['smtp_password']);
        
        #domain affiliate    
         if($sitesetting['0']['domain_apl_mode'] == 'Test')
            {
                $CFG['site']['process_gui']  = $this->My_Stripslashes($sitesetting['0']['domain_reg_gui_test']);
                $CFG['site']['process_url']  = $this->My_Stripslashes($sitesetting['0']['domain_reg_url_test']);              
            }
         else         
            {
                $CFG['site']['process_gui']  = $this->My_Stripslashes($sitesetting['0']['domain_reg_gui_live']);
                $CFG['site']['process_url']  = $this->My_Stripslashes($sitesetting['0']['domain_reg_url_live']);
            }   
        
		#Smarty Assigning
        $objSmarty->assign("SUPPORT_EMAIL",$CFG['site']['adminemail']);
		$objSmarty->assign("SITE_DOMAIN",$CFG['site']['sitedomain']);
		$objSmarty->assign("SITE_NAME",$CFG['site']['sitename']);
		$objSmarty->assign("SITE_LOGO",$CFG['site']['logoname']);
        $objSmarty->assign("SITE_FAVICON",$CFG['site']['image_url'].'/'.$sitesetting['0']['site_fav_icon']);
		$objSmarty->assign("limit",$CFG['site']['adminperpage']);
		$objSmarty->assign("userlimit",$CFG['site']['userperpage']);
		$objSmarty->assign("USERFRIENDLY",$CFG['site']['userfriendly']);
			
		define("PAGELIMIT",$CFG['site']['adminperpage']);
		//define("PAGELIMIT",10);
		define("USERPAGELIMIT",$CFG['site']['userperpage']);
		
		return true;
	}
	#........................................................................................
	#Icon Setting
	function iconSettingValues(){
		global $CFG;
				
		$sel_cont = "SELECT followers_thumb_width, followers_thumb_height, listing_thumb_width, listing_thumb_height, banner_thumb_width, banner_thumb_height, banner_thumbsmall_width, banner_thumbsmall_height FROM ".$CFG['table']['iconsetting']." LIMIT 1";
		$res_cont = $this->ExecuteQuery($sel_cont,'select');
		//echo "<pre>";print_r();echo "</pre>";
		return $res_cont;
	} 
	#........................................................................................
									#Restaurant
	#........................................................................................
	#HOURS LIST
	function hourslist($ref_id){
		$content = '';
		for($i=1;$i<=12;$i++){
			if($i==$ref_id){$sel='selected="selected"';}else{$sel='';}
			if($i<10)$i = '0'.$i;
			
			$content .="<option value=".$i." ".$sel.">".$i."</option>\n";
		}
		return $content;
	}
	#HOURS LIST CLOSE
	function hourslistclose($ref_id){
		$content = '';
		for($i=1;$i<=12;$i++){
			if($i==$ref_id){$sel='selected="selected"';}else{$sel='';}
			if($i<10)$i = '0'.$i;
			
			$content .="<option value=".$i." ".$sel.">".$i."</option>\n";
		}
		return $content;
	}
	#........................................................................................
	#HOURS LIST
	function minuteslist($ref_id){
		
		$content = '';
		for($i=1;$i<=59;$i++){
			if($i==$ref_id){$sel='selected="selected"';}else{$sel='';}
			if($i<10)$i = '0'.$i;
			
			$content .="<option value=".$i." ".$sel.">".$i."</option>\n";
		}
		return $content;
	}
	#----------------------------------------------------------------------------------	
	#Monday Open Time
	function deliveryTimeHrMinSes($opentime){
		
		$monopentimesplit = explode(":",$opentime);
		$monopentimehr    = $monopentimesplit[0];
		$monopentimemin   = $monopentimesplit[1];
		$monopensecsplit  = explode(" ",$monopentimemin);
		$monopentimesec   = $monopensecsplit[1];
		
		return array($monopentimehr,$monopentimemin,$monopentimesec);
	}
	#----------------------------------------------------------------------------------	
	#Insert Time option in database
	function insertTimeOption($rest_del_mon_openhr,$rest_del_mon_openmin,$rest_del_mon_openses,$rest_del_mon_closehr,$rest_del_mon_closemin,$rest_del_mon_closeses){
		
		$res_opening_time 	= $rest_del_mon_openhr.':'.$rest_del_mon_openmin.' '.$rest_del_mon_openses;
		$res_closeing_time 	= $rest_del_mon_closehr.':'.$rest_del_mon_closemin.' '.$rest_del_mon_closeses;
		
		return array($res_opening_time,$res_closeing_time);
		
	}
	#--------------------------------------------------------------------------------
							#EXPORT & IMPORT PROCESS START
	#--------------------------------------------------------------------------------
	#Generate CSV file for Category List
	function exportProcessCSVXLS($file_name,$table_arr,$export_val_arr,$csv_heading_arr,$xls_heading_arr){
		global $CFG,$objSmarty;		
		
		$exportfile = strtolower($_POST['exportfile']);
		
		list($selectfld,$tablename,$tblcondition) = $table_arr;
		$selsql = "SELECT ".$selectfld." FROM ".$tablename." WHERE ".$tblcondition." ";
		$result = mysql_query($selsql);
		$cnt = 1;
		//Generate CSV
		if($exportfile == "csv"){
				$categorylist[] = $csv_heading_arr;
		}
		//Generate Excel File
		if($exportfile == "excel"){
				$header = '';
				$tab = "\t";
				$header = $xls_heading_arr;
		}
		
		while($row_list = mysql_fetch_assoc($result)){
			#CSV
			if($exportfile == "csv"){
				
				for($ii=0;$ii<count($export_val_arr);$ii++){
			    	$filedvall = $export_val_arr[$ii];
			    	$row[$filedvall]			= $this->My_stripslashes($row_list[$filedvall]);
			    }
				$categorylist[] =$row;
			}
			#Excel
			if($exportfile == "excel"){
				$glu = '';
			    
				for($ii=0;$ii<count($export_val_arr);$ii++){
			    	$filedvall = $export_val_arr[$ii];
			    	$glu .= $this->My_stripslashes($row_list[$filedvall]).$tab;
			    }    
			    #$glu .= $this->My_stripslashes($row_list['maincateid']).$tab;
			    #$glu .= $this->My_stripslashes($row_list['maincatename']).$tab;
			    
				$data .= trim($glu)."\n";
			}//if
			$cnt++;
		}//while
		
		#CSV
		if($exportfile == "csv"){
			$filename = $file_name.".csv";
			$this->saveExportCSV($filename,$categorylist);
		}
		#Excel File
		if($exportfile == "excel"){
			$filename = $file_name.".xls";
			$this->saveExportXLS($filename,$header,$data);
		}
	}
	
	#Import for category
	function importProcessCSV($tablename,$dbfields,$filename){
		global $CFG,$objSmarty;
		
		#File Upload
		$file_name  = $_FILES['importfile']['name'];
		
		$dest_folder = 'importfiles/'.$file_name;
		$sour_folder = $_FILES['importfile']['tmp_name'];
			
		move_uploaded_file($sour_folder,$dest_folder);
		
		$handle = @fopen($dest_folder, "r"); // Open file form read.
		$row=0;
		$j=0;
		if ($handle) 
		{
			while (!feof($handle)) // Loop til end of file.
			{
				$buffer = fgets($handle, 4096); // Read a line.
				if($row>0 && !empty($buffer))
				{
					$line[$j]=$buffer;
					$j++;
				}
				$row++;
			}
			fclose($handle); // Close the file.
		}
		$this->CreateImportProcess($line,$tablename,$dbfields,$filename);
		@unlink('importfiles/'.$file_name);
	}
	#--------------------------------------------------------------------------------
	#Create category
	function CreateImportProcess($line,$tablename,$dbfields){
		global $CFG,$objSmarty;
		
		if(isset($_POST['rd_import']) && !empty($_POST['rd_import']) && $_POST['rd_import'] == 'emptab' ){
			if(!empty($tablename))	{
				$TruncateTable = "TRUNCATE TABLE ".$tablename." ";			
				mysql_query($TruncateTable) or die($this->mysql_error($TruncateTable));
			}
		}
		
		for($k=0;$k<count($line);$k++)
		{
			$allfields	   =  $line[$k];
			$fields		   =  explode(",",$allfields);
			$categorydata  =  "";
			foreach($fields as $key=>$value){ 
			
				if($fields[$key]!=""){
					if($dbfields[$key] != 'area' && $dbfields[$key] != 'zipcode' ){
						$categorydata.=$dbfields[$key]."='".$this->My_addslashes($fields[$key])."',";
					}
					else if($dbfields[$key] == 'area'){
						$fields[$key]= $this->getValue('area_id',$CFG['table']['area'],'areaname = "'.$this->filterInput($fields[$key]).'" ');
						$categorydata.=$dbfields[$key]."='".$this->My_addslashes($fields[$key])."',";
					}
					else if($dbfields[$key] == 'zipcode'){
						
						if(strlen($fields['zipcode'][$value]) < 5){
							$fields[$key]	=	str_pad($fields[$key],5,"0",STR_PAD_LEFT);
						}
						$categorydata.=$dbfields[$key]."='".$this->My_addslashes($fields[$key])."',";
					}
				}
			}						
			if(!empty($tablename))	{
				$ins_cat = "INSERT INTO ".$tablename." SET ".$categorydata."addeddate = now() ";
				$res_cat = $this->ExecuteQuery($ins_cat,'insert');
			}
			$categorydata = "";
		}
		$this->redirectUrl($filename);
	}
	#----------------------------------------------------------------------------------	
    #EXPORT TO CSV
    function saveExportCSV($filename,$recordlist)
    {
    	$fp = fopen($filename, 'w+');
		foreach ($recordlist as $fields) {
		    fputcsv($fp, $fields);
		}
		fclose($fp);

		// required for IE, otherwise Content-disposition is ignored
		if(ini_get('zlib.output_compression'))
		  ini_set('zlib.output_compression', 'Off');
		
		// addition by Jorg Weske
		$file_extension = strtolower(substr(strrchr($filename,"."),1));
		
		if( $filename == "" ) 
		{
		  echo "<html><title>eLouai's Download Script</title><body>ERROR: download file NOT SPECIFIED. USE force-download.php?file=filepath</body></html>";
		  exit;
		} elseif ( ! file_exists( $filename ) ) 
		{
		  echo "<html><title>eLouai's Download Script</title><body>ERROR: File not found. USE force-download.php?file=filepath</body></html>";
		  exit;
		};
		switch( $file_extension )
		{
		  case "pdf": $ctype="application/pdf"; break;
		  case "exe": $ctype="application/octet-stream"; break;
		  case "zip": $ctype="application/zip"; break;
		  case "doc": $ctype="application/msword"; break;
		  case "txt": $ctype="application/txt"; break;
		  case "xls": $ctype="application/vnd.ms-excel"; break;
		  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		  case "gif": $ctype="image/gif"; break;
		  case "png": $ctype="image/png"; break;
		  case "jpeg":
		  case "jpg": $ctype="image/jpg"; break;
		  default: $ctype="application/force-download";
		}
		header("Pragma: public"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); // required for certain browsers 
		header("Content-Type: $ctype");
		// change, added quotes to allow spaces in filenames, by Rajkumar Singh
		header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($filename));
		readfile("$filename");
		
		unlink($filename);
		exit();
	}
	#........................................................................................................
    #EXPORT TO CSV
    function saveExportXLS($filename,$header,$data)
    {
    	# this line is needed because returns embedded in the data have "\r"
		# and this looks like a "box character" in Excel
		$data = str_replace("\r", "", $data);
		
		# Nice to let someone know that the search came up empty.
		# Otherwise only the column name headers will be output to Excel.
		if($data == "") {
		       $data = "\nNo matching records found\n";
		}
    	
		// create table header showing to download a xls (excel) file
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$filename");
		header("Cache-Control: public");
		header("Content-length: ".strlen($data)); // tells file size
		header("Pragma: no-cache");
		header("Expires: 0");
		
		// output data
		echo $header."\n".$data;
		exit;
	}
	#--------------------------------------------------------------------------------
							#EXPORT & IMPORT PROCESS END
	#--------------------------------------------------------------------------------
	#--------------------------------------------------------------------------------
							#State & City & Zipcode PROCESS END
	#--------------------------------------------------------------------------------
	#---------------------------------------------------------------
	#Show State List
	function showAreaList(){
		global $CFG,$objSmarty;
		
		$sel = "SELECT id,  city_name FROM ".$CFG['table']['city']." WHERE status = '1' ORDER BY city_name ASC ";
		$res = $this->ExecuteQuery($sel,'select');
		$objSmarty->assign("selectArealist",$res);
	}
	#Get city List
	function showcityList($statecode){
		global $CFG,$objSmarty;
		
		if( !empty($statecode) ) $selcond = " AND statecode = '".$statecode."' ";
		
		$sel = "SELECT city_id,statecode,cityname FROM ".$CFG['table']['city']." WHERE city_status = '1' ".$selcond."  ORDER BY cityname ASC";
		$res = $this->ExecuteQuery($sel,'select');
		$objSmarty->assign("selectCityList",$res);
	}
	#Show Zipcode List
	function showzipList($cityid){
		global $CFG,$objSmarty;
		
		if( !empty($cityid) ) $selcond = " AND cityid = '".$cityid."' ";
		
		$sel = "SELECT id, zipcode, city,state FROM ".$CFG['table']['zip']." WHERE  status = '1' ".$selcond." ORDER BY zipcode ASC ";
		$res = $this->ExecuteQuery($sel,'select');
		$objSmarty->assign("showZiplist",$res);
		$objSmarty->assign("showZipcodelistCount",count($res));
	}
	#Show Zipcode List
	function showAllzipList(){
		global $CFG,$objSmarty;
		
		$sel = "SELECT id, zipcode, city,state FROM ".$CFG['table']['zip']." WHERE  status = '1' ORDER BY zipcode ASC ";
		$res = $this->ExecuteQuery($sel,'select');		
		$objSmarty->assign("showZiplist",$res);
	}
	
	#---------------------------Google Map Homes Inspirations -----------------------------------------------------------
	function restDetailGoogleMap(){
		global $CFG;
		
		if( isset($_GET['list_id']) && !empty($_GET['list_id']) ){
			$resid = $_GET['list_id'];
		}elseif( isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){
			$resid = $_SESSION['user_id'];
		}
		
		$homedetail = $this->getMultivalue("listing_title, address, zipcode, city, state",$CFG['table']['listing'],"listing_id = '".$this->filterInput($resid)."' ");
		
		$home_address 		= $this->My_stripslashes($homedetail[0]['address']);
		$home_zipcode 		= $homedetail[0]['zipcode'];
		$home_city 			= $this->getValue("city_name", $CFG['table']['city'], " id='".$this->filterInput($homedetail[0]['city'])."' ");
		$home_state 		= $homedetail[0]['state'];
		$home_name 			= $homedetail[0]['listing_title'];
				
		return array($home_name,$home_address,$home_zipcode,$home_city,$home_state);
	}
	
	#google Map
	function generateGoogleMap(){
		global $CFG,$objSmarty;
		
		list($home_name, $home_address, $home_zipcode, $home_city, $home_state) = $this->restDetailGoogleMap();
		$home_country		= 'US';
		
		$rest_fullAddress = $this->findFullAddress($home_address, $home_zipcode, $home_city, $home_state, $home_country);
		list($res_lat, $res_long) = $this->findLatLongFromAddress($home_address, $home_zipcode, $home_city, $home_state, $home_country);
		
		header("Content-type: text/xml");
		echo '<markers>';
			echo '<marker ';
		  	echo 'listing_name="' . htmlspecialchars($home_name, ENT_QUOTES) . '" ';
		  	echo 'address="' . htmlspecialchars($home_address, ENT_QUOTES) . '" ';
		  	echo 'city="' . htmlspecialchars($home_city, ENT_QUOTES) . '" ';
		  	echo 'state="' . htmlspecialchars($home_state, ENT_QUOTES) . '" ';
		  	echo 'country="' . htmlspecialchars($home_country, ENT_QUOTES) . '" ';
		  	echo 'lat="' . $res_lat . '" ';
			echo 'lng="' . $res_long . '" ';
		  	echo '/>';
		echo '</markers>';
	}
	#........................................................................................
	#Find full Address
	function findFullAddress($address='',$area='',$city='',$state='',$country=''){
		
		if( !empty($address) ){
			$outputStr = $address;
			
			if( !empty($area) || !empty($city) || !empty($state) || !empty($country) )$outputStr .= ",";
		}
		if( !empty($area) ){
			$outputStr .= " ".$area;
			
			if(!empty($city) || !empty($state) || !empty($country) )$outputStr .= ",";
		}
		if( !empty($city) ){
			$outputStr .= " ".$city;
			
			if(!empty($state) || !empty($country) )$outputStr .= ",";
		}
		if( !empty($state) ){
			$outputStr .= " ".$state;
			
			if( !empty($country) )$outputStr .= ",";
		}
		if( !empty($country) ){
			$outputStr .= " ".$country;
		}
		
		return $outputStr;
	}
	#........................................................................................
	#find Lattitude & Longtitude from address
	function findLatLongFromAddress($address='',$area='',$city='',$state='',$country=''){
		
		if( !empty($address) ){
			$outputStr = $address;
		}
		if( !empty($area) ){
			$outputStr .= " ".$area;
		}
		if( !empty($city) ){
			$outputStr .= " ".$city;
		}
		if( !empty($state) ){
			$outputStr .= " ".$state;
		}
		if( !empty($country) ){
			$outputStr .= " ".$country;
		}
		$outputaddr =  str_replace(' ','+',$outputStr);
		
		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$outputaddr.'&sensor=false');
		
		$output= json_decode($geocode);
		
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
		
		return array($lat, $long);
	}
	
	#-------------------------------------------------------------------------------------------------------------	
	function contactDetailGoogleMap(){
		global $CFG;
		$addressdetail 	 	= $this->getValue("content",$CFG['table']['content'],"display_map = 'Yes' AND header_menu = 'Yes' ");
				
		$contact_address 	= $this->My_stripslashes($addressdetail);
		return $contact_address;
	}
	
	#Contact Us Google Map:
	function generateContactGoogleMap(){
		global $CFG,$objSmarty;
		
		$contact_address = $this->contactDetailGoogleMap();
		$home_country		= 'US';
		$home_state			= 'NY';
		
		$rest_fullAddress = $this->findFullAddress($contact_address, $home_state, $home_country);
		list($res_lat, $res_long) = $this->findLatLongFromAddress($contact_address, $home_state, $home_country);
		
		header("Content-type: text/xml");
		echo '<markers>';
			echo '<marker ';
		  	
		  	echo 'address="' . htmlspecialchars($contact_address, ENT_QUOTES) . '" ';
		  	echo 'state="' . htmlspecialchars($home_state, ENT_QUOTES) . '" ';
		  	echo 'country="' . htmlspecialchars($home_country, ENT_QUOTES) . '" ';
		  	echo 'lat="' . $res_lat . '" ';
			echo 'lng="' . $res_long . '" ';
		  	echo '/>';
		echo '</markers>';
	}
	
	#........................................................................................
    #SESSION OF LANGUSGE
    function languageSession(){
    	global $CFG,$objSmarty,$_lang;
    	
    /*	if($CFG['site']['userfriendly'] == 'Y'){
	    	$page_src  = explode("?",$_SERVER['REQUEST_URI']);    	
	    	#echo "<pre>";print_r($page_src);echo "</pre>";    	
	    	$sla_val	=	explode("=",$page_src[1]);
	    	#echo "<pre>";print_r($sla_val);echo "</pre>";
		}
    	
    	
    	
		if(isset($_GET['lan']) && !empty($_GET['lan']) ){
			#echo "get";
			
			$reqlanname = strtoupper($_GET['lan']);
			$_SESSION['lan'] = $reqlanname;
			#echo "session lang=>".$_SESSION['lan'];
			
			header("Location: ".$_SERVER['HTTP_REFERER']);
			exit;
		}elseif(isset($sla_val) && !empty($sla_val) && $sla_val[0] == 'lan'){
			$reqlanname = strtoupper($sla_val[1]);
			$_SESSION['lan'] = $reqlanname;
						
			header("Location: ".$_SERVER['HTTP_REFERER']);
			exit;
		}elseif( isset($_SESSION['lan']) && !empty($_SESSION['lan']) ){
			#echo $_SESSION['lan'];die();
			$reqlanname = strtoupper($_SESSION['lan']);
		}else{
			#echo "else";die();
			$reqlanname = $this->chklanguageNameSelect();
			$_SESSION['lan'] = $reqlanname;
		}*/
        $sesslan = $this->getValue("lang_code",$CFG['table']['language']," lang_site ='Yes' ");
		if(isset($_GET['la']) && !empty($_GET['la']) ){
			
			$reqlanname = strtoupper($_GET['la']);
			$_SESSION['lan'] = $reqlanname;
			
			header("Location: ".$_SERVER[HTTP_REFERER]);
			exit;
		}elseif( isset($_SESSION['lan']) && !empty($_SESSION['lan']) && ($_SESSION['lan'] == $sesslan) ){
			
			$reqlanname = strtoupper($_SESSION['lan']);
		}else{
			$_SESSION['lan'] = $sesslan;
			$reqlanname = strtoupper($_SESSION['lan']);
		}
		
        
		
		$this->addLangFiles($reqlanname);
		#echo "<pre>";print_r($_lang);echo "</pre>";
		
	/*	if( $_SESSION['lan'] == 'CS' || $_SESSION['lan'] == 'SK' || $_SESSION['lan'] == 'SL' || $_SESSION['lan'] == 'AR' || $_SESSION['lan'] == 'SV' || $_SESSION['lan'] == 'LT'){
			$objSmarty->assign('LANG',$_lang);
		}else{
			$objSmarty->assign('LANG',$this->utf8_array_decode($_lang));
		}*/
		$objSmarty->assign('LANG',$_lang);
		/*if(isset($_GET['la']) && !empty($_GET['la']) ){
			
			//header("Location: ".$_SERVER[HTTP_REFERER]);
			//exit;
		}*/
	}
	#get Language Status
	function chklanguageNameSelect()
		{
			global $CFG,$objSmarty;
			$sql_qry = " SELECT lang_code FROM ".$CFG['table']['language']." WHERE lang_site = 'Yes' ";		 
		  	$res_qry = $this->ExecuteQuery($sql_qry,'select');
            echo $res_qry."-->lang";exit;
		  	if($res_qry[0]['lang_code'])
		  		return $res_qry[0]['lang_code'];
		  	else
		  	    return 'EN';
		}
	function addLangFiles($reqlanname){
		global $CFG,$objSmarty,$_lang;
		
		$req_file_name = $this->get_file_name();
		
		include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'header.php';
		if($req_file_name == 'index.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'commonsource.php';
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'index.php';			
		}
		elseif($req_file_name == 'userHome.php' || $req_file_name == 'userHome.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'userHome.php';
		}
		elseif($req_file_name == 'MyHome.php' || $req_file_name == 'MyHome.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'myhome.php';
		}
		elseif($req_file_name == 'MyInvites.php' || $req_file_name == 'MyInvites.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'myinvites.php';
		}
		elseif($req_file_name == 'Myaccount.php' || $req_file_name == 'Myaccount.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'myAccount.php';
		}
        elseif($req_file_name == 'Mytransaction.php' || $req_file_name == 'Mytransaction.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'mytransaction.php';
		}
		elseif($req_file_name == 'Support.php' || $req_file_name == 'Support.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'support.php';
		}
		elseif($req_file_name == 'main.php' || $req_file_name == 'main.php' || $req_file_name == 'onboarding.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'mainpage.php';
		}	
		elseif($req_file_name == 'sourceNew.php' || $req_file_name == 'sourceNew.php' || $req_file_name == 'postComment.php' || $req_file_name == 'facebookShare.php' || $req_file_name == 'subscription.php' || $req_file_name == 'showShippingAddr.php'  || $req_file_name == 'productView.php' || $req_file_name == 'checkoutPage.php' ){
		 	include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'commonsource.php';
		}	
		elseif($req_file_name == 'ajaxFile.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'mainpage.php';
            include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'commonsource.php';
		}
        elseif($req_file_name == 'ajaxAction.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'mainpage.php';
		}
		elseif($req_file_name == 'thanks.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'thanks.php';
		}		
		elseif($req_file_name == 'aboutUs.php' || $req_file_name == 'contactUs.php' || $req_file_name == 'privacy.php' || $req_file_name == 'terms.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'index.php';			
		}
		elseif($req_file_name == 'buildEdit.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'buildEdit.php';			
		}
		elseif($req_file_name == 'mobOptions.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'mobOptions.php';			
		}
		elseif($req_file_name == 'themes_support.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'themes_support.php';			
		}
		elseif($req_file_name == 'host.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'host.php';			
		}
		elseif($req_file_name == 'blogging.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'blogging.php';			
		}
		elseif($req_file_name == 'photos.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'photos.php';			
		}
		elseif($req_file_name == 'forms.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'forms.php';			
		}
		elseif($req_file_name == 'resetNewConfirm.php' || $req_file_name == 'resetPass.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'resetNewConfirm.php';			
		}
		elseif($req_file_name == 'domains.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'domains.php';			
		}
		elseif($req_file_name == 'pointDomain.php' || $req_file_name == 'pointDomain.php'){
			include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'pointDomain.php';
		}
		include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'commonadmin.php';
		include_once $CFG['site']['language_path'].'/'.$reqlanname.'/'.'footer.php';
	}
	function utf8_array_decode($input)
	{
	    $return = array();
	
	    foreach ($input as $key => $val)
	    {
	        if( is_array($val) )
	        {
	            $return[$key] = $this->utf8_array_decode($val);
	        }
	        else
	        {
	            $return[$key] = utf8_decode($val);
	        }
	    }
	    return $return;          
	}
   /**
   * Site::getPageCount()
   * this function for get post per page for pagination to show comments in source file
   * @return void
   */
	function getPageCount($domain_id)
		{
			global $CFG,$objSmarty,$_lang;
			$UpQuery  = "SELECT  post_perpage FROM ".$CFG['table']['blogsettings']." WHERE domain_id  = '".$this->filterInput($domain_id)."'";
			$blogsettings = $this->ExecuteQuery($UpQuery,'select');
			return $blogsettings['0']['post_perpage'];
			 
		}
	#Redirect Url
	function redirect($filename, $seourl){
		global $CFG;
		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
		$redirect_url = $CFG['site']['base_url']."/".$redirect_url;
	    header("Location:$redirect_url");
		exit(0);
    }
    #Redirect Url for ajax file
	function redirectInAjax($filename, $seourl){
		global $CFG;
		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
		//$redirect_url = $CFG['site']['base_url']."/".$redirect_url;
	    return $redirect_url;
    }
    #Redirect Url
	function redirectToSubdomain($filename, $seourl){
		global $CFG;
		$redirect_url = ($CFG['site']['userfriendly']=='Y') ? $seourl : $filename;
		$redirect_url = $CFG['site']['subdomain_url']."/".$redirect_url;
	    header("Location:$redirect_url");
		exit(0);
    }
	#....................................................................................	
}
?>