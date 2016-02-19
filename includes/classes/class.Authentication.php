<?php

class Authentication {
	public function __construct(){

	}

	public static function checkUserLoggedIn(){
		if(isset($_SESSION['user_id'])){
			return $_SESSION['user_id'];
		}
		return false;
	}

	public static function checkPermision( $action = null){
		if( self::checkUserLoggedIn() ){
			if($action === null){
				return true;
			}else{
				//check permission of user with action
			}
		}

		return false;
	}

}