<?php

include("includes/config.inc.php");
$objSite->languageSession();

#this function used for sorting process details
	if(isset($_POST['pages']) && !empty($_POST['pages'])){
			$objCommon = new Common;
			parse_str($_POST['pages'], $pageOrder);
			foreach($pageOrder['page'] as $key=>$val)
				{
					$objCommon->updateSortableForPage($val,$key);
				}
		}

?>