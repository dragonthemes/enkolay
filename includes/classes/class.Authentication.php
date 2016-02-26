<?php


class Authentication extends Site{
	public function __construct(){

	}

	public function checkUserLoggedIn(){
		if(isset($_SESSION['user_id'])){
			return $_SESSION['user_id'];
		}
		return false;
	}

	public function checkPermision( $action = null){
		if( $this->checkUserLoggedIn() ){

			if( $this->checkOwnerDomain() ) {

				return $this->checkOwnerPage();
			}
		}

		return false;
	}


	public function checkOwnerDomain($domain_id = null){
		
		if($domain_id == null){
			$domain_id = $this->getDomainId();
		}

		if($domain_id == null){
			return true;
		} else {

			global $CFG;
			$sqlsel = "SELECT domain_id FROM ".$CFG['table']['domaindetails']. " WHERE user_id = '".$this->filterInput($_SESSION['user_id'])."' AND domain_id = '".$this->filterInput($domain_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');

			if(count($sqlres) > 0){
				return true;
			}
		}

		return false;

	}


	protected function getDomainId(){
			
		$domain_id = isset($_GET['domainid']) ? $_GET['domainid'] : null;

		if($domain_id == null ){
			$domain_id = isset($_SESSION['domain_id']) ? $_SESSION['domain_id'] : null; 
		}

		return $domain_id;
	}

	protected function getPageId(){
			
		$page_id = isset($_GET['pageid']) ? $_GET['pageid'] : null;

		if($page_id == null ){
			$page_id = isset($_SESSION['page_id']) ? $_SESSION['page_id'] : null; 
		}

		return $page_id;
	}

	public function checkOwnerPage($page_id = null, $domain_id = null){

		if($domain_id == null){
			$domain_id = $this->getDomainId();
		}

		if($page_id == null){
			$page_id = $this->getPageId();
		}

		if($domain_id == null || ($domain_id == null && $page_id == null) || ($this->checkOwnerDomain($domain_id) && $page_id == null) ){
			return true;
		}else{
			global $CFG;
			$sqlsel = "SELECT page_id FROM ".$CFG['table']['temp_pages']. " WHERE domain_id = '".$this->filterInput($domain_id)."' AND page_id = '".$this->filterInput($page_id)."'";
			$sqlres =  $this->ExecuteQuery($sqlsel,'select');
			
			if(count($sqlres) > 0){
				return true;
			}
		}

		return false;
	}
}