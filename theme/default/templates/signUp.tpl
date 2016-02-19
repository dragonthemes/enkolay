<div class="container">
	<div class="detailsBgGrey clearfix">
		<div class="registerHead">{$LANG.singup_new_listing_request}</div>
		<div class="wrapperContent row-fluid">
				<div class="span7 borRightGrey">
					<div id="errormsg"><span style="color:red;"></span></div>
					<form name="signupform" class="sky-form form-horizontal skyformbgNon" id="signupform" method="post" action="" >
						<div class="row-fluid">
							<fieldset>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.account_page_name} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="text" name="username" id="username" value="{$smarty.post.username}" />
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.register_email} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="text" name="email" id="email" value="{$smarty.post.email}" />
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.singup_phone_no} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="input span11 offset0">
												<input type="text" name="phoneno" id="phoneno" value="{$smarty.post.phoneno}"/>
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.search_detail_address} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="textarea span11 offset0">
												<textarea name="address" id="address">{$smarty.post.address}</textarea>
											</label>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.search_detail_property_for}</label>
										<div class="controls">
											<label class="radio state-error span3 offset0">
												<input type="radio" name="property_for" id="property_for_sale" value="sale" {if $smarty.post.property_for eq 'sale'} checked="checked" {/if}/>
												<i></i>
												{$LANG.index_sale}
											</label>
											<i></i>
											<label class="radio state-error span3 offset0">
												<input type="radio" name="property_for" id="property_for_rent" value="rent" {if $smarty.post.property_for eq 'rent'} checked="checked" {/if}/>
												<i></i>
												{$LANG.index_rent}
											</label>
											<i></i>
										</div>
									</div>
								</section>
								<section>
									<div class="control-group">	
										<label for="" class="control-label label">{$LANG.search_detail_property_type} <span class="redStar">{$LANG.register_star}</span></label>
										<div class="controls">
											<label class="select span11 offset0">
												<select name="property_type" id="property_type">
													<option value="0">{$LANG.lang_for_all}</option>
													{section name=property loop=$propertyval}
													<option value="{$propertyval[property].property_name}">{$propertyval[property].property_name}</option>
													{/section}
												</select>
												<i></i>
											</label>
										</div>
									</div>
								</section>
								<div class="row-fluid">
									<span class="span9 offset0">
										<input type="submit" name="signup" id="signup" class="button pull-right no-mar" value="Gönder" />		
									</span>
								</div>
							</fieldset>
						</div>						
					</form>
				</div>
				<!--Login Panel Starts-->
				{include file='loginPanel.tpl}
				<!--Login Panel Ends-->
			</div>
	</div>
</div>