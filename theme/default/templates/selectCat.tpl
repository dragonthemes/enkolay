{$objCommon->selectCat()}
 {section name="category" loop="$cate"}
	 <div class="selectCat"> 
		<input type="checkbox" name="category[]" value="{$cate[category].cat_id}"  {$objCommon->getCheckedOption($cate[category].cat_id,$category_edit)}>{$cate[category].cat_name} 
	</div>
{/section}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
 