<?
class DomainProcess extends Site {
    
    function add_zeros($number) {
    	if (!is_numeric($number)) {
    		return false;
    	} else {
    		$number = number_format($number, 2, '.', '');
    		return $number;
    	}
    }
    
    function utf8_substr($str, $from, $len) {
    	$tochki = (preg_match_all("/[[:print:]\pL]/u", $str, $pockets) <= $len) ? "" : "…";
    	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s', '$1', $str).$tochki;
    }
    
    function valid_email($email) {
    	$isValid = true;
    	$atIndex = strrpos($email, "@");
    	if (is_bool($atIndex) && !$atIndex) {
    		$isValid = false;
    	} else {
    		$domain = substr($email, $atIndex+1);
    		$local = substr($email, 0, $atIndex);
    		$localLen = strlen($local);
    		$domainLen = strlen($domain);
    		if ($localLen < 1 || $localLen > 64) {
    			$isValid = false;
    		} else if ($domainLen < 1 || $domainLen > 255) {
    			$isValid = false;
    		} else if ($local[0] == '.' || $local[$localLen-1] == '.') {
    			$isValid = false;
    		} else if (preg_match('/\\.\\./', $local)) {
    			$isValid = false;
    		} else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
    			$isValid = false;
    		} else if (preg_match('/\\.\\./', $domain)) {
    			$isValid = false;
    		} else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
    			if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
    				$isValid = false;
    			}
    		}
    		if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
    			$isValid = false;
    		}
    	}
    	return $isValid;
    }
    
    function valid_domain($domain) {
    	if (preg_match('/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,6}$/', $domain)) {
    		return true;
    	} else {
    		return false;
    	}
    }
    
    function randomstring($len) {
    	srand(date("s"));
    	$str = "";
    	$i = 0;
    	while($i < $len - 10) {
    		$str .= chr((rand()%26) + 97);
    		$i++;
    	}
    	$str = $str.substr(uniqid(""), 0, 10);
    	return $str;
    }
    
    function show_date($type, $date) {
    	if ($date == '0000-00-00 00:00:00') return 'N / A';
    	if ($type == 1) {
    		list($p1, $p2) = explode(' ', $date);
    		list($y, $m, $d) = explode('-', $p1);
    		$show_date = $d.'.'.$m.'.'.$y;
    	} else if ($type == 2) {
    		list($p1, $p2) = explode(' ', $date);
    		list($y, $m, $d) = explode('-', $p1);
    		list($h, $i, $s) = explode(':', $p2);
    		$show_date = $d.'.'.$m.'.'.$y.' '.$h.':'.$i;
    	} else {
    		$show_date = $date;
    	}
    	return $show_date;
    }
    
    function get_ip_address() {
    	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
    		if (array_key_exists($key, $_SERVER) === true) {
    			foreach (explode(',', $_SERVER[$key]) as $ip) {
    				if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
    					return $ip;
    				}
    			}
    		}
    	}
    }
    
    function fill_with_zeros($len, $str) {
    	while (strlen($str) < $len) {
    		$str = '0'.$str;
    	}
    	return $str;
    }
    
    function tr_transliterate($str) {
    	$match_array = array('ı', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ş', 'Ş', 'ö', 'Ö', 'ç', 'Ç', 'ê', 'Ê', 'û', 'Û', 'î', 'Î', 'ô', 'Ô', 'â', 'Â', 'é', '$', '€', 'æ', 'Æ', 'ß', '&', '<', '>', '!', '£', '^', '#', '+', '%', '½', '/', '=', '*', '?', '_', '¨', '~', '´', '`', ';', '|', ':');
    	$return_array = array('i', 'I', 'g', 'G', 'u', 'U', 's', 'S', 'o', 'O', 'c', 'C', 'e', 'E', 'u', 'U', 'i', 'I', 'o', 'O', 'a', 'A', 'e', 'S', 'E', 'a', 'A', 's', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-' );
    	$ret = str_replace($match_array, $return_array, $str);
    	return $ret;
    }
    
    function writeResponseToFile($res)
    {
    	$filename='/home/hizlisayfalar/domainlog/log_'.date('Y-m-d_H-i-s').'.txt';
    	file_put_contents($filename, $res);
    }
    
    function create_addon_domain($cpanel_host, $cpanel_username, $cpanel_password, $cpanel_skin, $addon_domain, $addon_user, $addon_pass, $addon_dir) {
    	$url = "https://$cpanel_username:$cpanel_password@$cpanel_host:2083/frontend/$cpanel_skin/addon/doadddomain.html?";
    	$url .= "domain=$addon_domain&user=$addon_user&dir=$addon_dir&pass=$addon_pass&pass2=$addon_pass";
    	$result = @file_get_contents($url);
    	writeResponseToFile($result);
    	if ($result === false) return false;
    	return $result;
    }
    
    function remove_ftp_account($cpanel_host, $cpanel_username, $cpanel_password, $cpanel_skin, $ftp_account) {
    	$url = "https://$cpanel_username:$cpanel_password@$cpanel_host:2083/frontend/$cpanel_skin/ftp/delftp.html?";
    	$url .= "user=$ftp_account&destroy=0";
    	$result = @file_get_contents($url);
    	writeResponseToFile($result);	
    	if ($result === false) return false;
    	return $result;
    }
    
    function create_email($cpanel_host, $cpanel_username, $cpanel_password, $cpanel_skin, $domain, $email_user, $email_pass, $quota) {
    	$url = "https://$cpanel_username:$cpanel_password@$cpanel_host:2083/frontend/$cpanel_skin/mail/doaddpop.html?";
    	$url .= "email=$email_user&domain=$domain&password=$email_pass&quota=$quota";
    	$result = @file_get_contents($url);
    	writeResponseToFile($result);	
    	if ($result === false) return false;
    	return $result;
    }
    
    function change_email_password($cpanel_host, $cpanel_username, $cpanel_password, $cpanel_skin, $domain, $email_user, $email_pass, $quota) {
    	$url = "https://$cpanel_username:$cpanel_password@$cpanel_host:2083/frontend/$cpanel_skin/mail/dopasswdpop.html?";
    	$url .= "email=$email_user&domain=$domain&password=$email_pass&quota=$quota";
    	$result = @file_get_contents($url);
    	writeResponseToFile($result);	
    	if ($result === false) return false;
    	return $result;
    }
    
    function delete_email($cpanel_host, $cpanel_username, $cpanel_password, $cpanel_skin, $domain, $email_user) {
    	$url = "https://$cpanel_username:$cpanel_password@$cpanel_host:2083/frontend/$cpanel_skin/mail/realdelpop.html?";
    	$url .= "domain=$domain&email=$email_user";
    	$result = @file_get_contents($url);
    	writeResponseToFile($result);	
    	if ($result === false) return false;
    	return $result;
    }
    
    function check_domain($domain, $domain_reg_url, $domain_reg_gui) {       
    	require dirname(dirname(dirname(__FILE__))).'/xml_transaction_hander_class.php';
    	list($domain_name, $domain_extension) = explode('.', $domain);
    	
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>domainCheck</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef> </clientRef>';
    	$post_data .= '</client>';
    	$post_data .= '<request>';
    	$post_data .= '<sld>'.$domain_name.'</sld>';
    	$post_data .= '<extensions>';
    	$post_data .= '<extension>'.$domain_extension.'</extension>';
    	$post_data .= '</extensions>';
    	$post_data .= '</request>';
    	$post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
        
        #echo "<pre>"; print_r($response); echo "</pre>";
    
    	return $response;
    }
    
    function buy_domain($domain, $domain_reg_url, $domain_reg_gui, $years, $ns_1, $ns_2, $email, $first_name, $last_name, $country, $city, $zip, $address) {
    	include(dirname(dirname(dirname(__FILE__))).'/xml_transaction_hander_class.php');
    
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>domainAdd</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef></clientRef>';
    	$post_data .= '</client>';
    	$post_data .= '<request>';
    	$post_data .= '<userId></userId>';
    	$post_data .= '<domainName>'.$domain.'</domainName>';
    	$post_data .= '<term>'.$years.'</term>';
    	$post_data .= '<contacts>';
    	$post_data .= '<contact>';
    	$post_data .= '<title></title>';
    	$post_data .= '<firstName>'.$this->tr_transliterate($first_name).'</firstName>';
    	$post_data .= '<lastName>'.$this->tr_transliterate($last_name).'</lastName>';
    	$post_data .= '<companyName></companyName>';
    	$post_data .= '<companyPositionHeld></companyPositionHeld>';
    	$post_data .= '<emailAddress>'.$email.'</emailAddress>';
    	$post_data .= '<telephoneNumber>+90.3124681671</telephoneNumber>';
    	$post_data .= '<faxNumber>+90.3124280908</faxNumber>';
    	$post_data .= '<addressLine1>'.$this->tr_transliterate($address).'</addressLine1>';
    	$post_data .= '<addressLine2> </addressLine2>';
    	$post_data .= '<city>'.$this->tr_transliterate($city).'</city>';
    	$post_data .= '<province></province>';
    	$post_data .= '<state></state>';
    	$post_data .= '<postalCode>'.$this->tr_transliterate($zip).'</postalCode>';
    	$post_data .= '<countryCode>TR</countryCode>';
    	$post_data .= '<contactType>Registration</contactType>';
    	$post_data .= '</contact>';
    	$post_data .= '<contact>';
    	$post_data .= '<title></title>';
    	$post_data .= '<firstName>'.$this->tr_transliterate($first_name).'</firstName>';
    	$post_data .= '<lastName>'.$this->tr_transliterate($last_name).'</lastName>';
    	$post_data .= '<companyName></companyName>';
    	$post_data .= '<companyPositionHeld></companyPositionHeld>';
    	$post_data .= '<emailAddress>'.$email.'</emailAddress>';
    	$post_data .= '<telephoneNumber>+90.3124681671</telephoneNumber>';
    	$post_data .= '<faxNumber>+90.3124280908</faxNumber>';
    	$post_data .= '<addressLine1>'.$this->tr_transliterate($address).'</addressLine1>';
    	$post_data .= '<addressLine2> </addressLine2>';
    	$post_data .= '<city>'.$this->tr_transliterate($city).'</city>';
    	$post_data .= '<province></province>';
    	$post_data .= '<state></state>';
    	$post_data .= '<postalCode>'.$this->tr_transliterate($zip).'</postalCode>';
    	$post_data .= '<countryCode>TR</countryCode>';
    	$post_data .= '<contactType>Administration</contactType>';
    	$post_data .= '</contact>';
    	$post_data .= '</contacts>';
    	$post_data .= '<nameservers>';
    	$post_data .= '<nameserver>';
    	$post_data .= '<nsType>Primary</nsType>';
    	$post_data .= '<nsName>'.$ns_1.'</nsName>';
    	$post_data .= '</nameserver>';
    	$post_data .= '<nameserver>';
    	$post_data .= '<nsType>Secondary</nsType>';
    	$post_data .= '<nsName>'.$ns_2.'</nsName>';
    	$post_data .= '</nameserver>';
    	$post_data .= '</nameservers>';
    	$post_data .= '</request>';
    	$post_data .= '</serviceRequest>';  
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
    
    	return $response;
    }
    
    function transfer_domain($domain, $auth_code, $domain_reg_url, $domain_reg_gui, $years, $ns_1, $ns_2, $email, $first_name, $last_name, $country, $city, $zip, $address) {
    	require '../plugins/xml_handler/xml_transaction_hander_class.php';
    
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>domainTransferIn</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef></clientRef>';
    	$post_data .= '</client>';
    	$post_data .= '<request>';
    	$post_data .= '<userId></userId>';
    	$post_data .= '<domainName>'.$domain.'</domainName>';
    	$post_data .= '<authCode>'.$auth_code.'</authCode>';
    //	$post_data .= '<term>'.$years.'</term>';
    	$post_data .= '<contacts>';
    	$post_data .= '<contact>';
    	$post_data .= '<title></title>';
    	$post_data .= '<firstName>'.tr_transliterate($first_name).'</firstName>';
    	$post_data .= '<lastName>'.tr_transliterate($last_name).'</lastName>';
    	$post_data .= '<companyName></companyName>';
    	$post_data .= '<companyPositionHeld></companyPositionHeld>';
    	$post_data .= '<emailAddress>'.$email.'</emailAddress>';
    	$post_data .= '<telephoneNumber>+1.123456789</telephoneNumber>';
    	$post_data .= '<faxNumber>+1.123456789</faxNumber>';
    	$post_data .= '<addressLine1>'.tr_transliterate($address).'</addressLine1>';
    	$post_data .= '<addressLine2> </addressLine2>';
    	$post_data .= '<city>'.tr_transliterate($city).'</city>';
    	$post_data .= '<province></province>';
    	$post_data .= '<state></state>';
    	$post_data .= '<postalCode>'.tr_transliterate($zip).'</postalCode>';
    	$post_data .= '<countryCode>TR</countryCode>';
    	$post_data .= '<contactType>Registration</contactType>';
    	$post_data .= '</contact>';
    	$post_data .= '<contact>';
    	$post_data .= '<title></title>';
    	$post_data .= '<firstName>'.tr_transliterate($first_name).'</firstName>';
    	$post_data .= '<lastName>'.tr_transliterate($last_name).'</lastName>';
    	$post_data .= '<companyName></companyName>';
    	$post_data .= '<companyPositionHeld></companyPositionHeld>';
    	$post_data .= '<emailAddress>'.$email.'</emailAddress>';
    	$post_data .= '<telephoneNumber>+1.123456789</telephoneNumber>';
    	$post_data .= '<faxNumber>+1.123456789</faxNumber>';
    	$post_data .= '<addressLine1>'.tr_transliterate($address).'</addressLine1>';
    	$post_data .= '<addressLine2> </addressLine2>';
    	$post_data .= '<city>'.tr_transliterate($city).'</city>';
    	$post_data .= '<province></province>';
    	$post_data .= '<state></state>';
    	$post_data .= '<postalCode>'.tr_transliterate($zip).'</postalCode>';
    	$post_data .= '<countryCode>TR</countryCode>';
    	$post_data .= '<contactType>Administration</contactType>';
    	$post_data .= '</contact>';
    	$post_data .= '</contacts>';
    	$post_data .= '</request>';
    	$post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
    
    	return $response;
    }
    
    function renew_domain($domain, $domain_reg_url, $domain_reg_gui, $years, $domain_order_id) {
    	require '../plugins/xml_handler/xml_transaction_hander_class.php';
    
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>domainRenew</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef></clientRef>';
    	$post_data .= '</client>';
    	$post_data .= '<request>';
    	$post_data .= '<productId>'.$domain_order_id.'</productId>';
    	$post_data .= '<term>'.$years.'</term>';
    	$post_data .= '</request>';
    	$post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
    
    	return $response;
    }
    
    // SANITIZATION
    function seems_utf8($str) {
    	$length = strlen($str);
    	for ($i=0; $i < $length; $i++) {
    		$c = ord($str[$i]);
    		if ($c < 0x80) $n = 0; # 0bbbbbbb
    		elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
    		elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
    		elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
    		elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
    		elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
    		else return false; # Does not match any model
    		for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
    			if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80)) return false;
    		}
    	}
    	return true;
    }
    
    function remove_accents($string) {
    	if (!preg_match('/[\x80-\xff]/', $string)) return $string;
    	if (seems_utf8($string)) {
    		$chars = array(
    			// Decompositions for Latin-1 Supplement
    			chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
    			chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
    			chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
    			chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
    			chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
    			chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
    			chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
    			chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
    			chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
    			chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
    			chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
    			chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
    			chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
    			chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
    			chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
    			chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
    			chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
    			chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
    			chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
    			chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
    			chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
    			chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
    			chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
    			chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
    			chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
    			chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
    			chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
    			chr(195).chr(191) => 'y',
    			// Decompositions for Latin Extended-A
    			chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
    			chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
    			chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
    			chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
    			chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
    			chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
    			chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
    			chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
    			chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
    			chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
    			chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
    			chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
    			chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
    			chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
    			chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
    			chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
    			chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
    			chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
    			chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
    			chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
    			chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
    			chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
    			chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
    			chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
    			chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
    			chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
    			chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
    			chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
    			chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
    			chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
    			chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
    			chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
    			chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
    			chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
    			chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
    			chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
    			chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
    			chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
    			chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
    			chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
    			chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
    			chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
    			chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
    			chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
    			chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
    			chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
    			chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
    			chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
    			chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
    			chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
    			chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
    			chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
    			chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
    			chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
    			chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
    			chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
    			chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
    			chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
    			chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
    			chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
    			chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
    			chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
    			chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
    			chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
    			// Euro Sign
    			chr(226).chr(130).chr(172) => 'E',
    			// GBP (Pound) Sign
    			chr(194).chr(163) => ''
    		);
    		$string = strtr($string, $chars);
    	} else {
    		// Assume ISO-8859-1 if not UTF-8
    		$chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
    			.chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
    			.chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
    			.chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
    			.chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
    			.chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
    			.chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
    			.chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
    			.chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
    			.chr(252).chr(253).chr(255);
    		$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";
    		$string = strtr($string, $chars['in'], $chars['out']);
    		$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
    		$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
    		$string = str_replace($double_chars['in'], $double_chars['out'], $string);
    	}
    	return $string;
    }
    
    function utf8_uri_encode( $utf8_string, $length = 0 ) {
    	$unicode = '';
    	$values = array();
    	$num_octets = 1;
    	$unicode_length = 0;
    	$string_length = strlen( $utf8_string );
    	for ($i = 0; $i < $string_length; $i++ ) {
    		$value = ord( $utf8_string[ $i ] );
    		if ($value < 128) {
    			if ($length && ($unicode_length >= $length)) break;
    			$unicode .= chr($value);
    			$unicode_length++;
    		} else {
    			if (count($values) == 0) $num_octets = ($value < 224) ? 2 : 3;
    			$values[] = $value;
    			if ($length && ($unicode_length + ($num_octets * 3)) > $length) break;
    			if (count( $values ) == $num_octets) {
    				if ($num_octets == 3) {
    					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
    					$unicode_length += 9;
    				} else {
    					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
    					$unicode_length += 6;
    				}
    				$values = array();
    				$num_octets = 1;
    			}
    		}
    	}
    	return $unicode;
    }
    
    function sanitize_title_with_dashes($title) {
    	$title = strip_tags($title);
    	// Preserve escaped octets.
    	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    	// Remove percent signs that are not part of an octet.
    	$title = str_replace('%', '', $title);
    	// Restore octets.
    	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    	$title = remove_accents($title);
    	if (seems_utf8($title)) {
    		if (function_exists('mb_strtolower')) {
    			$title = mb_strtolower($title, 'UTF-8');
    		}
    		$title = utf8_uri_encode($title, 200);
    	}
    	$title = strtolower($title);
    	$title = preg_replace('/&.+?;/', '', $title); // kill entities
    	$title = str_replace('.', '-', $title);
    	$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    	$title = preg_replace('/\s+/', '-', $title);
    	$title = preg_replace('|-+|', '-', $title);
    	$title = trim($title, '-');
    	return $title;
    }
    
      function productConfiGet($domain, $domain_reg_url, $domain_reg_gui) {       
    	require dirname(dirname(dirname(__FILE__))).'/xml_transaction_hander_class.php';
    	list($domain_name, $domain_extension) = explode('.', $domain);
    	
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>productConfigurationGet</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef> </clientRef>';
    	$post_data .= '</client>';    	
    	$post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
        
        #echo "<pre>"; print_r($response); echo "</pre>";
    
    	return $response;
    }
    
    function domain_get($domain, $domain_reg_url, $domain_reg_gui) {       
    	//include( dirname(dirname(dirname(__FILE__))).'/xml_transaction_hander_class.php');
    	//list($domain_name, $domain_extension) = explode('.', $domain);
    	
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>domainGet</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef> </clientRef>';
    	$post_data .= '</client>';           
        $post_data .= '<request>';
        $post_data .= '<page>1</page>';
        $post_data .= '<domains>';
        $post_data .= '<domainName>'.$domain.'</domainName>';
        $post_data .= '</domains>'; 	
    	$post_data .= '</request>';
        $post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
        
        #echo "<pre>"; print_r($response); echo "</pre>";
    
    	return $response;
    }
    
    
    #Add New Domain
   function addNewDomain($domain,$domain_id,$productId)
   		{
	   	   	global $CFG;         
		   	if(isset($domain_id) && !empty($domain_id) && isset($productId) && !empty($productId))
			  {	  		
			   	if ($this->valid_domain($domain) )
                    {    
                	    $response = $this->domain_get($domain, $CFG['site']['process_url'], $CFG['site']['process_gui']);
                        
                        if($domain == $response->response->domainGet->domain->domainInfo->domainName)
                            {   
                                $qty = 1;
                                $exp_date = strtotime('+'.$qty.' years');
                                $sql_ins	=	"INSERT INTO ".$CFG['table']['new_domain']." SET
    												 domain_name		=	'".$this->filterInput($domain)."',
    												 user_id			=	'".$this->filterInput($_SESSION['user_id'])."',
    												 domain_id          =   '".$this->filterInput($domain_id)."',
                                                     productid          =   '".$this->filterInput($productId)."',
                                                     domainStatus       =   '".$response->response->domainGet->domain->domainInfo->domainStatus."',
                                                     startDate          =   '".time()."',
                                                     expiryDate         =   '".$exp_date."',
                                                     autoRenew          =   '".$response->response->domainGet->domain->domainInfo->autoRenew."',
                                                     privacy            =   '".$response->response->domainGet->domain->domainInfo->privacy."', 
                                                     password           =   '".$response->response->domainGet->domain->domainInfo->password."', 
                                                     firstName          =   '".$response->response->domainGet->domain->contacts->contact->firstName."',
                                                     lastName           =   '".$response->response->domainGet->domain->contacts->contact->lastName."',
                                                     emailAddress       =   '".$response->response->domainGet->domain->contacts->contact->emailAddress."',
                                                     addressLine1 	    =   '".$response->response->domainGet->domain->contacts->contact->addressLine1."',
                                                     addressLine2       =   '".$response->response->domainGet->domain->contacts->contact->addressLine2."',
                                                     city               =   '".$response->response->domainGet->domain->contacts->contact->city."',
                                                     postalCode         =   '".$response->response->domainGet->domain->contacts->contact->postalCode."', 
                                                     status             =   'publish',
    												 addeddate		    =	 NOW()";
            					$res_ins	=	$this->ExecuteQuery($sql_ins,'insert');  
                                
            					if($res_ins)
            						{
            						    $domain_name = "http://".$this->filterInput($domain); 
        						    	$UpQuery  = "UPDATE ".$CFG['table']['temp_domaindetails']." SET newdomain_productid = '".$this->filterInput($productId)."', domain_type = 'PD', subdomainurl = '".$domain_name."' WHERE user_id= '".$this->filterInput($_SESSION['user_id'])."' AND domain_id ='".$this->filterInput($domain_id)."'";
   	                                    $UpResult = mysql_query($UpQuery) or die($this->mysql_error($UpQuery));
                                        
                                        $UpQuery1  = "UPDATE ".$CFG['table']['domaindetails']." SET newdomain_productid = '".$this->filterInput($productId)."', domain_type = 'PD', subdomainurl = '".$domain_name."' WHERE user_id= '".$this->filterInput($_SESSION['user_id'])."' AND domain_id ='".$this->filterInput($domain_id)."'";
   	                                    $UpResult1 = mysql_query($UpQuery1) or die($this->mysql_error($UpQuery1));
                                        
            							$to_email	  =	$this->getValue("admin_email",$CFG['table']['sitesetting'],"id='1'");  
                                        $from_email   = $response->response->domainGet->domain->contacts->contact->emailAddress; 
                                        $from_name    = $response->response->domainGet->domain->contacts->contact->firstName." ".$response->response->domainGet->domain->contacts->contact->lastName; 							
            							$mailsubject  = $CFG['site']['sitename']." New Domain Added";
            							$mail_content = $this->readfilecontent($CFG['site']['emailtpl_path']."/emailForAdminDomainAdded.tpl");
            					        $mail_content = str_replace('{STATUS}','Merhaba Yönetici,',$mail_content);
            					        $mail_content = str_replace('{SITE_TITLE}',$CFG['site']['site_main_domain'],$mail_content);
            					        $mail_content = str_replace('{SITE_LOGO}',$CFG['site']['logoname'],$mail_content);
            					        $mail_content = str_replace('{DOMAIN}',$domain,$mail_content);            							
            							$ok=$this->sendMail($from_name,$from_email,$to_email,$mailsubject,$mail_content);
                                        echo "suc";exit();
            			            }	
                            }
                   }    			
		      }
        }
        
        
      function domain_get_value($domain, $domain_reg_url, $domain_reg_gui) {       
    	include( dirname(dirname(dirname(__FILE__))).'/xml_transaction_hander_class.php');
    	//list($domain_name, $domain_extension) = explode('.', $domain);
    	
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>domainGet</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef> </clientRef>';
    	$post_data .= '</client>';           
        $post_data .= '<request>';
        $post_data .= '<page>1</page>';
        $post_data .= '<domains>';
        $post_data .= '<domainName>'.$domain.'</domainName>';
        $post_data .= '</domains>'; 	
    	$post_data .= '</request>';
        $post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
        
        #echo "<pre>"; print_r($response); echo "</pre>";
    
    	return $response;
    }
    
      
      function domainHostAdd($productid, $domain_reg_url, $domain_reg_gui) {       
    	include( dirname(dirname(dirname(__FILE__))).'/xml_transaction_hander_class.php');
    	//list($domain_name, $domain_extension) = explode('.', $domain);
    	
    	$post_data = '<serviceRequest>';
    	$post_data .= '<command>hostingAdd</command>';
    	$post_data .= '<client>';
    	$post_data .= '<applicationGuid>'.$domain_reg_gui.'</applicationGuid>';
    	$post_data .= '<clientRef> </clientRef>';
    	$post_data .= '</client>';           
        $post_data .= '<request>';
        $post_data .= '<userId></userId> ';        
        $post_data .= '<term>1</term>';
        $post_data .= ' <productType>LINUXHOSTING-ECONOMY</productType>'; 
        $post_data .= '<domainName>ekw.info</domainName>';
        $post_data .= '<updateDNS>False</updateDNS>';	
    	$post_data .= '</request>';
        $post_data .= '</serviceRequest>';
    
    	$xml_handler = new XMLTransactionHander;
    	$response = $xml_handler->executeRequest($domain_reg_url, $post_data);
        
        #echo "<pre>"; print_r($response); echo "</pre>";
    
    	return $response;
    }
}
?>