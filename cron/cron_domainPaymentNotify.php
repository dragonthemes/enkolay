<?php


class Cron{
    var $DBCONN;
    
    function __construct()
        { 
               //LIVE
            $db_host = 'localhost';
            $db_user = 'enkolayw_admin';
            $db_pwd  = '^M~SIS^55Ig_';
            $db_name = 'enkolayw_hizli';
            
            /*$db_host = 'localhost';
            $db_user = 'root';
            $db_pwd  = '';
            $db_name = 'enkolayweb';  */
    
            $this->db_connection($db_host,$db_name,$db_user,$db_pwd);
            date_default_timezone_set("Turkey");
         }   
         
     function db_connection($db_host,$db_name,$db_user,$db_pwd)
        {	
            global $CFG;
    		$con = mysql_connect($db_host,$db_user,$db_pwd,$db_name);
            mysql_select_db($db_name, $con);
            
            $SelQuery  = "SELECT  admin_name, admin_email, sitename,sitelogo  FROM hi_sitesetting WHERE id  = '1'";
		    $sitesetting = $this->ExecuteQuery($SelQuery,'select');  
            
            $CFG['site']['admin_email']       = $sitesetting[0]['admin_email'];
            $CFG['site']['site_log']          = "http://enkolayweb.com/images/".$sitesetting[0]['sitelogo'];
            $CFG['site']['sitename']          = $sitesetting[0]['sitename'];
    	}        
    #...................................................................................................    
    function ExecuteQuery($Query, $Qrytype){
    		
    		if(!empty($Query) && !empty($Qrytype)){
    			switch(strtolower($Qrytype))
    			{
                    case "execute":
    					$Result = mysql_query($Query) or die(mysql_error());
    					return $Result;
    					break;
    				case "select":                   
    					$Result = mysql_query($Query) or die(mysql_error());
    					if($Result){	
    						$ResultSet = array();
    						while($ResultSet1 = mysql_fetch_assoc($Result))
    							$ResultSet[] = $ResultSet1;
    						return $ResultSet;
    					}
    					else return false;
    					break;
    				case "update":
    					$Result = mysql_query($Query) or die(mysql_error());
    					if($Result){
    						$AffectedNums = mysql_affected_rows();
    						return $AffectedNums;
    					}
    					else return false;
    					break;
    					case "norows":
    					$Result = mysql_query($Query) or die(mysql_error());
    					if($Result){
    						$Totalrows = mysql_num_rows($Result);
    						return $Totalrows;
    					}
    					else return false;
    					break;
    				case "insert":
    					$Result = mysql_query($Query) or die(mysql_error());
    					if($Result){
    						$LastInsertedRow = mysql_insert_id();
    						return $LastInsertedRow;
    					}
    					else return false;
    					break;
    				case "delete":
    					$Result = mysql_query($Query) or die(mysql_error());
    					if($Result)
    						return true;
    					else
    						return false;
                   case "count":
    					$Result = mysql_query($Query) or die(mysql_error());
    												   
    					if($Result){
    						$total_count = mysql_fetch_row($Result);
    						return $total_count[0];
    					}	
    					else
    						return false;        
    			}
    		}
    	}    
    #.....................................................................
    function getMultiValue($select,$table_name,$condition){
    	$sql = "SELECT ".$select." FROM ".$table_name." WHERE ".$condition." ";
    	#echo $sql."<br>";
        $row_list = array();
    	$res = mysql_query($sql)or die("error");
    	while($row = mysql_fetch_assoc($res)){
    		$row_list[] = $row;
    	}
    	
    	return $row_list;
    }   
    #........................................................................................
    #Sendmail
	function sendMail($fromname,$fromemail,$to_email,$mail_subject,$mail_content)
        {	
            
    		if($_SERVER['SERVER_ADDR'] != '127.0.0.1')
        		{
        			$mailHeader  = "From:".$fromname." <".$fromemail."> \n" ;
        		    $mailHeader .= "X-Sender:". $fromemail." \n";
        		    $mailHeader .= "Reply-To: ".$fromname." <".$fromemail."> \n";
        		    $mailHeader .= "Content-Type: text/html; charset=iso-8859-1 \n";
        		    $mailHeader .= "Return-Path:".$fromemail." \n";
        		    $mailHeader .= "Error-To: ".$fromemail." \n";
        		    $mailHeader .= "X-Mailer: ".$_SERVER['SERVER_NAME']." \n";
        		    $mailHeader .= "MIME-Version: 1.0 \n";
        		    
        		    $mailresult  = mail($to_email,$mail_subject,$mail_content,$mailHeader);                    
        		    return $mailresult;	
        		}
    		else
        		{
        			return TRUE;
        		}    	
        } 
    #.....................................................................................................................
    #delete subdomain
	function DeleteSubDomain($domain_id)
		{			
            $UpQuery  = "DELETE  FROM hi_domaindetails WHERE domain_id ='".$domain_id."'";
			$UpResult = $this->ExecuteQuery($UpQuery,'delete');
            $UpQuery  = "DELETE  FROM hi_temp_domaindetails WHERE domain_id ='".$domain_id."'";
        	$UpResult = $this->ExecuteQuery($UpQuery,'delete');
			return true;                		
		}            
    function DeleteSubDomainSelection($domain_id,$table)
		{			
            $UpQuery  = "DELETE  FROM ".$table." WHERE domain_id ='".$domain_id."'";
    		$UpResult = $this->ExecuteQuery($UpQuery,'delete');
    		return true;                			
		}   
    
    function CommonDeleteFunction($table,$domain_id)
		{			
            $UpQuery  = "DELETE  FROM ".$table." WHERE domain_id ='".$domain_id."'";
		    $UpResult = $this->ExecuteQuery($UpQuery,'delete');
		    return true;                			
		}      
    #Delete domain images
    function DeleteDomainImages($table,$field,$domain_id,$isgoogle=false)
        {
            if($domain_id != '')
                {
                    $selimages  = "SELECT ".$field." FROM ".$table." WHERE domain_id='".$domain_id."'";
                    $images     = $this->ExecuteQuery($selimages,'select');
                    if($isgoogle)
                    {
                        $path   = "https://enkolayweb.com/uploads/uploads/photo_google_image";
                    }
                    else
                    {
                        $path   = "https://enkolayweb.com/uploads/uploads/photo_domain_image_path";
                    }
                    foreach($images as $key=>$value)
                    {
                        if(count(explode(',',$field))==2)
                        {
                            $fldary = explode(',',$field);
                            $file   = $path.'/'.$value[$fldary[0]];
                            $file1   = $path.'/'.$value[$fldary[1]];
                            if(file_exists($file))
                            {
                                @unlink($file);
                            }
                            if(file_exists($file1))
                            {
                                @unlink($file1);
                            }
                        }
                        else
                        {
                            $file   = "https://enkolayweb.com/uploads/uploads/photo_domain_image_path/".$value[$field];
                            if(file_exists($file))
                            {
                                @unlink($file);
                            }
                        }
                        
                    }
                    $UpQuery  = "DELETE  FROM ".$table." WHERE domain_id ='".$domain_id."'";
        		    $UpResult = $this->ExecuteQuery($UpQuery,'delete');
        		    return true;
                }
        }    
    #Delete domain images
    function DeleteDomainFiles($table,$field,$domain_id,$isdoc=false)
        { 
            if($domain_id != '')
                {
                    $selimages  = "SELECT ".$field." FROM ".$table." WHERE domain_id='".$domain_id."'";
                    $files      = $this->ExecuteQuery($selimages,'select');
                    if($isdoc)
                    {
                         $path   = "https://enkolayweb.com/uploads/domain_docs";
                    }
                    else
                    {               
                        $path   = "https://enkolayweb.com/uploads/domain_files";
                    }
                   
                    foreach($files as $key=>$value)
                    {
                        
                        $file   = $path.'/'.$value[$field];
                        if(file_exists($file))
                        {
                            @unlink($file);
                        }
                    }    
                }
                $UpQuery  = "DELETE  FROM ".$table." WHERE domain_id ='".$domain_id."'";
        	    $UpResult = $this->ExecuteQuery($UpQuery,'delete');
        }     
}
#.............................................................................................

    $cron = new Cron();
	#Package Expire Date
	$today = date('Y-m-d');
    
    #echo $today."<br>";
    
    $currentyear_startdate = strtotime(date("Y-m-d",strtotime("6 days")));
	$currentyear_enddate   = strtotime(date("Y-m-d"));	
	
	$condition .= " AND  o.added_date BETWEEN '".$currentyear_startdate."' AND  '".$currentyear_enddate."' ";
	
	$sel_qury = " SELECT dom.domain_id, dom.subdomainurl, dom.theme_id,	dom.blog_id, dom.store_id, dom.payment_status, ".
                " dom.validtodate, dom.expire_grace_period, reg.email, reg.username ".
                " FROM hi_domaindetails as dom  ".
                " LEFT JOIN hi_register as reg ON dom.user_id = reg.user_id ".
				" WHERE dom.validtodate BETWEEN '".$currentyear_enddate."' AND  '".$currentyear_startdate."'";
                #" WHERE dom.domain_id ='48'";
                            								
    #$res = $cron->ExecuteQuery($sel_qury,'select'); 
    #echo "<pre>"; print_r($res);echo "</pre>";exit;
       
    $Result = $cron->ExecuteQuery($sel_qury,'execute');
    
	if($Result)
        {   		            
    		while($res_date = mysql_fetch_assoc($Result))
                {	
                    $days                         = '5 days';        					
                    $packageexp                   = date('Y-m-d', strtotime('-5 day',($res_date['validtodate']+60)));   
                    $grace_period_remainder       = date('Y-m-d', strtotime('-5 day',($res_date['expire_grace_period']+60)));  
                    
                    if( ( date('Y-m-d',($res_date['expire_grace_period']+60)) == $today && $res_date['payment_status'] == 'Yes' ) || (date('Y-m-d',($res_date['validtodate']+60)) == $today && $res_date['payment_status'] == 'No' ) )    //to delete paid after grace period or to delete valid to date payment staus no
                        {                                 
                            $cron->DeleteSubDomain($res_date['domain_id']);                           
                            
                            if($res_date['blog_id'] == '0' && $res_date['store_id'] == '0')
                                {
                                    $cron->DeleteSubDomainSelection($res_date['domain_id'],"hi_themeselection");
                                }
                            else if($res_date['theme_id'] == '0' && $res_date['store_id'] == '0')
                                {
                                    $cron->DeleteSubDomainSelection($res_date['domain_id'],"hi_blogselection");
                                    $cron->CommonDeleteFunction($table="hi_blogmessageform",$res_date['domain_id']);
                                    $cron->CommonDeleteFunction($table="hi_category",$res_date['domain_id']);
                                    $cron->CommonDeleteFunction($table="hi_temp_category",$res_date['domain_id']);
                                    $cron->CommonDeleteFunction($table="hi_blogsettings",$res_date['domain_id']);
                                    $cron->CommonDeleteFunction($table="hi_commentdetails",$res_date['domain_id']);
                                    $cron->CommonDeleteFunction($table="hi_posttitle",$res_date['domain_id']);
                                }    
                            else    
                                {
                                    $cron->DeleteSubDomainSelection($res_date['domain_id'],"hi_blogselection");
                                }                               		
                    		$cron->CommonDeleteFunction($table="hi_pages",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_pagelist",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_contact_form",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_contactform",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_social_plugins",$res_date['domain_id']);
                    		//$cron->CommonDeleteFunction($table=$CFG['table']['domain_images']);
                            $cron->CommonDeleteFunction($table="hi_temp_pages",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_temp_pagelist",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_temp_contact_form",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_temp_youtube_video",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_youtube_video",$res_date['domain_id']);
                    		$cron->CommonDeleteFunction($table="hi_temp_blogselection",$res_date['domain_id']);
                            $cron->CommonDeleteFunction($table="hi_referrals",$res_date['domain_id']);
                            
                            
                            #image delete tables
                            $cron->DeleteDomainImages("banner_slider_images","image_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("domain_images","temp_image_name,image_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("gallery_images","gallery_name,gallery_name_thumb",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("google_images",'google_image_name,google_name_thumb',$res_date['domain_id'],true);
                            $cron->DeleteDomainImages("hi_temp_google_images","google_image_name,google_name_thumb",$res_date['domain_id'],true);
                            $cron->DeleteDomainImages("hi_temp_gallery_images","gallery_name,gallery_name_thumb",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("hi_temp_slider_images","slider_images",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("slider_images","slider_images",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("imagetxt_images",'image_name',$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("hi_temp_imagetxt_images","image_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("single_images","image_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("hi_temp_single_images","image_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainImages("hi_temp_banner_slider_images","image_name",$res_date['domain_id'],false);
                            
                            #files delete tables
                            $cron->DeleteDomainFiles("hi_temp_files","file_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainFiles("hi_files","file_name",$res_date['domain_id'],false);
                            $cron->DeleteDomainFiles("hi_temp_docs","doc_name",$res_date['domain_id'],true);
                            $cron->DeleteDomainFiles("hi_docs","doc_name",$res_date['domain_id'],true);     
                            $mail_content = '';
                            $mail_content = '<html>
                                            	<head>
                                            		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            	</head>
                                            	<body style="background-color:#ededed;  padding:25px 0;">
                                            		<table width="760" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #CCCCCC; background:#ffffff; box-shadow:0 0 5px #B9B9B9;">
                                            			<tr>
                                            				<td align="center" colspan="3" style="background: #87CEEB; display: block; text-align: center;">
                                            					<img width="200" height="90" src='.$CFG['site']['site_log'].' alt='.$CFG['site']['sitename'].'/>
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #C00; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0; text-align: center;">
                                            					<span style="display: block; margin: 0px 10px; padding: 10px 0px;">
                                            						Domain Deleted Details.
                                            					</span>
                                            				</td>				
                                            			</tr>
                                            			<tr>
                                            			 	<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0 10px; text-align: left;">Hi '.$res_date['username'].'</td>
                                            			</tr>
                                            			<tr>
                                            			 	<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;">We are sorry to informed you due to non payment of '.$res_date['subdomainurl'].' was Permantly Delete From enkolayweb.com</td>
                                            			</tr>
                                                        
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 30px 0 0 10px;" align="left" valign="top" colspan="3">Sincerely,</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #393860; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0px 20px 10px;" align="left" valign="top" colspan="3">The enkolayweb.com Team</td>
                                            			</tr>
                                            		</table>
                                            	</body>
                                            </html> ';  
                                            
                            $tomailid     = $res_date['email'];                                    
                		    $mailsubject  = "Enkolyaweb: Your Domain Deleted Info";                          	
                			$ok           = $cron->sendMail('Admin',$CFG['site']['admin_email'],$tomailid,$mailsubject,$mail_content); 
                        }    
                    else if( date('Y-m-d',($res_date['validtodate']+60)) == $today && $res_date['payment_status'] == 'Yes' )  //grace period exten notification
                        {                                          
    						$payment_date = date('m/d/Y',($res_date['expire_grace_period']));
                            $mail_content = '';
                            $mail_content = '<html>
                                            	<head>
                                            		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            	</head>
                                            	<body style="background-color:#ededed;  padding:25px 0;">
                                            		<table width="760" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #CCCCCC; background:#ffffff; box-shadow:0 0 5px #B9B9B9;">
                                            			<tr>
                                            				<td align="center" colspan="3" style="background: #87CEEB; display: block; text-align: center;">
                                            					<img width="200" height="90" src='.$CFG['site']['site_log'].' alt='.$CFG['site']['sitename'].'/>
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #0F0; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0; text-align: center;">
                                            					<span style="display: block; margin: 0px 10px; padding: 10px 0px;">
                                            						Your domain 30 days grace period added. Please Make Payment Before '.$payment_date.' to save Your Domain. 
                                            					</span>
                                            				</td>				
                                            			</tr>
                                                        
                                            			<tr>
                                            			 	<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0 10px; text-align: left;">Hi '.$res_date['username'].'</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Domain Name</b> : '.$res_date['subdomainurl'].'</td>
                                            			</tr>
                                                        <tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Last Date</b> : '.$payment_date.'</td>
                                            			</tr>
                                                        
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 30px 0 0 10px;" align="left" valign="top" colspan="3">Sincerely,</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #393860; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0px 20px 10px;" align="left" valign="top" colspan="3">The enkolayweb.com Team</td>
                                            			</tr>
                                            		</table>
                                            	</body>
                                            </html> ';  
                                            
                            $tomailid     = $res_date['email'];                                    
                		    $mailsubject  = "Enkolyaweb: Your Domain Payment Alert";                          	
                			$ok           = $cron->sendMail('Admin',$CFG['site']['admin_email'],$tomailid,$mailsubject,$mail_content); 
    					}                  
                    else if($packageexp == $today)
                        {                                
                              
    						$payment_date = date('m/d/Y',($res_date['validtodate']));
                            $mail_content = '';
                            $mail_content = '<html>
                                            	<head>
                                            		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            	</head>
                                            	<body style="background-color:#ededed;  padding:25px 0;">
                                            		<table width="760" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #CCCCCC; background:#ffffff; box-shadow:0 0 5px #B9B9B9;">
                                            			<tr>
                                            				<td align="center" colspan="3" style="background: #87CEEB; display: block; text-align: center;">
                                            					<img width="200" height="90" src='.$CFG['site']['site_log'].' alt='.$CFG['site']['sitename'].'/>
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #0F0; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0; text-align: center;">
                                            					<span style="display: block; margin: 0px 10px; padding: 10px 0px;">
                                            						Your domain Payment Alert Notification. Please Make Payment Before Expire Date to save Your Domain.
                                            					</span>
                                            				</td>				
                                            			</tr>
                                                        
                                            			<tr>
                                            			 	<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0 10px; text-align: left;">Hi '.$res_date['username'].'</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Domain Name</b> : '.$res_date['subdomainurl'].'</td>
                                            			</tr>
                                                        <tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Expired Date</b> : '.$payment_date.'</td>
                                            			</tr>
                                                        
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 30px 0 0 10px;" align="left" valign="top" colspan="3">Sincerely,</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #393860; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0px 20px 10px;" align="left" valign="top" colspan="3">The enkolayweb.com Team</td>
                                            			</tr>
                                            		</table>
                                            	</body>
                                            </html> ';  
                                            
                            $tomailid     = $res_date['email'];                                    
                		    $mailsubject  = "Enkolyaweb: Your Domain Payment Alert";                          	
                			$ok           = $cron->sendMail('Admin',$CFG['site']['admin_email'],$tomailid,$mailsubject,$mail_content); 
                            
    					} 
                     else if($grace_period_remainder == $today)
                        {
                            $payment_date = date('m/d/Y',($res_date['expire_grace_period']));
                            $mail_content = '';
                            $mail_content = '<html>
                                            	<head>
                                            		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            	</head>
                                            	<body style="background-color:#ededed;  padding:25px 0;">
                                            		<table width="760" border="0" align="center" cellpadding="5" cellspacing="0" style="border:1px solid #CCCCCC; background:#ffffff; box-shadow:0 0 5px #B9B9B9;">
                                            			<tr>
                                            				<td align="center" colspan="3" style="background: #87CEEB; display: block; text-align: center;">
                                            					<img width="200" height="90" src='.$CFG['site']['site_log'].' alt='.$CFG['site']['sitename'].'/>
                                            				</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #0F0; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0; text-align: center;">
                                            					<span style="display: block; margin: 0px 10px; padding: 10px 0px;">
                                            							Your domain Payment Alert Notification. Please Make Payment Before Grace Period Expire Date to save Your Domain. 
                                            					</span>
                                            				</td>				
                                            			</tr>
                                                        
                                            			<tr>
                                            			 	<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0 0 10px; text-align: left;">Hi '.$res_date['username'].'</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Domain Name</b> : '.$res_date['subdomainurl'].'</td>
                                            			</tr>
                                                        <tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; padding: 10px 0 0 40px; text-align: left;"><b style="width:100px;display: inline-block;">Expired Date</b> : '.$payment_date.'</td>
                                            			</tr>
                                                        
                                            			<tr>
                                            				<td style="color: #333333; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 30px 0 0 10px;" align="left" valign="top" colspan="3">Sincerely,</td>
                                            			</tr>
                                            			<tr>
                                            				<td style="color: #393860; font-family: Trebuchet MS; font-size: 14px; font-weight: bold; padding: 10px 0px 20px 10px;" align="left" valign="top" colspan="3">The enkolayweb.com Team</td>
                                            			</tr>
                                            		</table>
                                            	</body>
                                            </html> ';  
                                            
                            $tomailid     = $res_date['email'];                                    
                		    $mailsubject  = "Enkolyaweb: Your Domain Payment Alert";                          	
                			$ok           = $cron->sendMail('Admin',$CFG['site']['admin_email'],$tomailid,$mailsubject,$mail_content); 
                        }  
               }		
    	}        
#............................................................................................................................. 
      	        
?>

