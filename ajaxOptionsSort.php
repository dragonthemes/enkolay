<?php

include("includes/config.inc.php");
$objSite->languageSession();

$auth = new Authentication();
if(!$auth->checkPermision()){
    die('You do not have permision for this action!');
}

#this function used for sorting options details
	if(isset($_POST['pages']) && !empty($_POST['pages'])){
			$objCommon = new Common;
			parse_str($_POST['pages'], $pageOrder);
			foreach($pageOrder['page'] as $key=>$val)
				{
					$objCommon->updateSortableForOptions($val,$key);
				}
		}

?>