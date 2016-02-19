<div id="listcat">
	<div class="storeDahboradHead clearfix">
		{$LANG.store_categories} <a onclick="showAddCategories('{$smarty.session.domain_id}');">{$LANG.add_categories}</a>
	</div> 
	 <input type="text" class="searchProduct" name="search_category" id="search_category" value="" onkeyup="searchCategory();">
</div>
<div id="repSearch">
	<div class="tableOuterBor marTop20">
		<table class="table marBotttNone"  cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="dashBrdHead">{$LANG.category_title}</th>
					<th class="dashBrdHead">{$LANG.products}</th>
					<th class="dashBrdHead">{$LANG.action}</th>
				</tr>
			</thead>
			<tbody>
				{$objCommon->getCategoryListBasedonDomain()}
				{section name="cat" loop=$catlist}
					<tr>
						<td onclick="editCategory('{$catlist[cat].store_cat_id}');">{$catlist[cat].cat_name}</td>
						<td onclick="editCategory('{$catlist[cat].store_cat_id}');">{$objCommon->getProductsCount($catlist[cat].domain_id,$catlist[cat].store_cat_id)}</td>
						<td class=""><a onclick="deleteCategory('{$catlist[cat].store_cat_id}');"><img class="curPoint" src="{$SITE_BASEURL}/images/storeClose.png" alt="" title="" /></a></td>
					</tr>
				{sectionelse}
					<tr><td colspan="3" class="RecNone">You Currently Dont Have Any Categories</td></tr>
				{/section}
			</tbody>
		</table>
	</div>
</div>
<div id="addcat" style="display:none;"></div>
<div id="addProduct" style="display:none;"></div>