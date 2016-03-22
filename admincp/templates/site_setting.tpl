<div class="Heading">{$LANG.admin_site_setting}</div>
<div class="ContBody clearfix">

	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_require_field}</span>
	</div>
									
									
	<div id="errormsg" {if $SuccessMessage neq ''}class="successmsg"{/if}>{if $SuccessMessage neq ''}{$SuccessMessage}{/if}</div>
	<!--<div class="notification">* - {$LANG.admin_require_field}</div>-->
	<form name="site_seeting" method="post" onsubmit="return siteSeetingValidation();" class="sky-form form-horizontal skyformbgNon" enctype="multipart/form-data" action="site_setting.php">
	<input type="hidden" name="action" value="updateSiteSetting" />
	
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_Admin_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="admin_name" id="admin_name" value="{$site_adimin_value.0.admin_name}"  />
				<script type="text/javascript">document.site_seeting.admin_name.focus();</script>
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_Admin_email} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="admin_email" id="admin_email" value="{$site_adimin_value.0.admin_email}"  />
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Email is used to send an email to user</span></div>
			</div>
		</div>
		
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_phone} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="admin_phone" id="admin_phone" value="{$site_adimin_value.0.admin_phone}"  />
			</div>
		</div>
			
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_site_name} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="sitename" id="sitename" value="{$site_adimin_value.0.sitename}"  />
				<div class="tooltip"><div class="HelpButton">?</div><span>Enter the Site Name</span></div>
			</div>
		</div> 
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_invites_url} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="invites_url" id="invites_url" value="{$site_adimin_value.0.invites_url}">
			</div>
		</div>
        <!----this for subscription count---->
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_subs_count} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="page_subs_count" id="page_subs_count" value="{$site_adimin_value.0.page_subs_count}">
			</div>
		</div>
		<!----subscription count enc-------->
        <!---facebook api id starts----->
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_facebook_api} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="facebook_api" id="facebook_api" value="{$site_adimin_value.0.facebook_api}"> 
			</div>
		</div>
        <!---facebook api id ends----->
		<!----this for subscription count---->
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_subs_count} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="page_subs_count" id="page_subs_count" value="{$site_adimin_value.0.page_subs_count}">	 
			</div>
		</div>
		<!----subscription count enc-------->
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_site_logo} <span class="color1">*</span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button">
						<input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="sitelogo" id="sitelogo">
						Browse
					</div>
					<input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				<div class="tooltip"><div class="HelpButton">?</div><span>{$LANG.admin_upload_site_logo}</span></div>
				<div class="photoContainer">
					<img src="{$SITE_IMAGE_URL}/{$site_adimin_value.0.sitelogo}" alt="image" width="200" height="50" />
				</div>
			</div>
		</div> 
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_site_fav} <span class="color1"></span></label>
			<div class="controls">
				<label for="file" class="input input-file widt300" name="uploadImagefile" id="uploadImagefile">
					<div class="button">
						<input type="file" tabindex="1030" value="" onchange="this.parentNode.nextSibling.value = this.value" name="sitefavicon" id="sitefavicon">
						Browse
					</div>
					<input type="text" readonly="" class="hei40">
					<p></p>
				</label>
				
				<div class="tooltip"><div class="HelpButton">?</div><span>{$LANG.admin_upload_site_fav}</span></div>
				<div class="photoContainer">
					<img src="{$SITE_IMAGE_URL}/{$site_adimin_value.0.site_fav_icon}" alt="image" width="200" height="50" />
				</div>
			</div>
		</div> 
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_rcrdper_user_page} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="user_page" id="user_page" value="{$site_adimin_value.0.user_page}"  />
			</div>
		</div> 
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_rcrdper_admin_page} <span class="color1">*</span></label>
			<div class="controls">
				<label class="select">
					<select class="selectbx" name="admin_page" id="admin_page" >
						<option value="5"{if $site_adimin_value.0.admin_page eq "5"} selected="selected"{/if}>5</option>
						<option value="10"{if $site_adimin_value.0.admin_page eq "10"} selected="selected"{/if}>10</option>
						<option value="15"{if $site_adimin_value.0.admin_page eq "15"} selected="selected"{/if}>15</option>
						<option value="20"{if $site_adimin_value.0.admin_page eq "20"} selected="selected"{/if}>20</option>
						<option value="25"{if $site_adimin_value.0.admin_page eq "25"} selected="selected"{/if}>25</option>
						<option value="30"{if $site_adimin_value.0.admin_page eq "30"} selected="selected"{/if}>30</option>
						<option value="50"{if $site_adimin_value.0.admin_page eq "50"} selected="selected"{/if}>50</option>
						<option value="100"{if $site_adimin_value.0.admin_page eq "100"} selected="selected"{/if}>100</option>  
					</select>
					<i></i>
				</label>
				<div class="tooltip"><div class="HelpButton">?</div><span>No. of records per page in User side</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_mail_options} <span class="color1">*</span></label>
		 	<div class="controls">
                <label class="radio state-error span1 offset0" for="mail_options1">
					<input class="radiobotton" type="radio" name="mail_options" id="mail_options1" value="SMTP"{if $site_adimin_value.0.mail_options eq "SMTP"}checked="checked"{/if} />
					<i></i>
					&nbsp;SMTP
				</label>
				<label class="radio state-error span1 offset0" for="mail_options2">
					<input class="radiobotton" type="radio" name="mail_options" id="mail_options2" value="Normal"{if $site_adimin_value.0.mail_options eq "Normal"}checked="checked"{/if} />
					<i></i>
					&nbsp;Normal
				</label>
            
			 
			</div>
       	</div> 
        <!---host name start----->
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_host_name_smtp} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="host_name" id="host_name" value="{$site_adimin_value.0.host_name}">
				<script type="text/javascript">document.site_seeting.host_name.focus();</script>
				 
			</div>
		</div>
        <!---host name end-----> 
        <!---port address  start----->
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_port_name_smtp} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="port_address" id="port_address" value="{$site_adimin_value.0.port_address}">
				<script type="text/javascript">document.site_seeting.port_address.focus();</script>
				 
			</div>
		</div>
        <!---port address end-----> 
        <!---smtp email address  start----->
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_email_smtp} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="smtp_email" id="smtp_email" value="{$site_adimin_value.0.smtp_email}">
				<script type="text/javascript">document.site_seeting.smtp_email.focus();</script>
				 
			</div>
		</div>
        <!---smtp email address end-----> 
        <!---smtp password address  start----->
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_pass_smtp} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="password" name="smtp_password" id="smtp_password" value="{$site_adimin_value.0.smtp_password}">
				<script type="text/javascript">document.site_seeting.smtp_password.focus();</script>
				 
			</div>
		</div>
        <!---smtp password address end-----> 
		
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_user_friendly} <span class="color1">*</span></label>
			
			<!--<div class="controls">
				<label class="radio state-error span3 offset0">
					<input type="radio" value="sale" id="property_for_sale" name="property_for">
					<i></i>
					Sale
				</label>
				<i></i>
				<label class="radio state-error span3 offset0">
					<input type="radio" value="rent" id="property_for_rent" name="property_for">
					<i></i>
					Rent
				</label>
				<i></i>
			</div>-->
				
			<div class="controls">
                <label class="radio state-error span1 offset0" for="userfriendly">
					<input class="radiobotton" type="radio" name="userfriendly" id="userfriendly" value="Y"{if $site_adimin_value.0.userfriendly eq "Y"}checked="checked"{/if} />
					<i></i>
					&nbsp;Yes
				</label>
				<label class="radio state-error span1 offset0" for="userfriendly1">
					<input class="radiobotton" type="radio" name="userfriendly" id="userfriendly1" value="N"{if $site_adimin_value.0.userfriendly eq "N"}checked="checked"{/if} />
					<i></i>
					&nbsp;No
				</label>
            
				{*<label class="radio state-error span1 offset0" for="yes">
					<input type="radio" name="userfriendly" id="userfriendly" value="Y"{if $site_adimin_value.0.userfriendly eq "Y"}checked="checked"{/if} />
					
					<i></i>
					&nbsp;Yes
				</label>
				<label class="radio state-error span1 offset0" for="no">
					<input class="radiobotton" type="radio" name="userfriendly" id="userfriendly1" value="N"{if $site_adimin_value.0.userfriendly eq "N"}checked="checked"{/if} />
					<i></i>
					&nbsp;No
				</label>*}
			</div>
            </div>
            
            <div class="control-group">	
			<label class="control-label label" for="">Domain Afflicate Mode <span class="color1">*</span></label>
            <div class="controls">
                <label class="radio state-error span1 offset0" for="reg_live">
					<input class="radiobotton" type="radio" name="domain_mode" id="reg_live" value="Live"{if $site_adimin_value.0.domain_apl_mode eq "Live"}checked="checked"{/if} onclick="showUrlField('live');" />
					<i></i>
					&nbsp;Live
				</label>
				<label class="radio state-error span1 offset0" for="reg_test">
					<input class="radiobotton" type="radio" name="domain_mode" id="reg_test" value="Test"{if $site_adimin_value.0.domain_apl_mode eq "Test"}checked="checked"{/if} onclick="showUrlField('test');"/>
					<i></i>
					&nbsp;Staging
				</label>
            </div>
            </div>
            
            <div id="domain_test" {if $site_adimin_value.0.domain_apl_mode eq 'Test'}style="display:block;"{else}style="display:none;"{/if}>
                <div class="control-group">	
        			<label class="control-label label" for="">Register URL <span class="color1">*</span></label>
        			<div class="controls">
        				<input class="textbox" type="text" name="reg_url_test" id="reg_url_test" value="{$site_adimin_value.0.domain_reg_url_test}">
        				 
        			</div>
    		    </div>
                <div class="control-group">	
        			<label class="control-label label" for="">Register GUI <span class="color1">*</span></label>
        			<div class="controls">
        				<input class="textbox" type="text" name="reg_gui_test" id="reg_gui_test" value="{$site_adimin_value.0.domain_reg_gui_test}">
        				 
        			</div>
    		    </div>
            </div>
            <div id="domain_live" {if $site_adimin_value.0.domain_apl_mode eq 'Live'}style="display:block;"{else}style="display:none;"{/if}>
                <div class="control-group">	
        			<label class="control-label label" for="">Register URL <span class="color1">*</span></label>
        			<div class="controls">
        				<input class="textbox" type="text" name="reg_url_live" id="reg_url_live" value="{$site_adimin_value.0.domain_reg_url_live}">
        				 
        			</div>
    		    </div>
                <div class="control-group">	
        			<label class="control-label label" for="">Register GUI <span class="color1">*</span></label>
        			<div class="controls">
        				<input class="textbox" type="text" name="reg_gui_live" id="reg_gui_live" value="{$site_adimin_value.0.domain_reg_gui_live}">
        				 
        			</div>
    		    </div>
            </div>
			<div class="tooltip"><div class="HelpButton">?</div><span>Yes - http://domain.com/register<br /> No - http://domain.com/register.php</span></div>
		</div> 
		<div class="span3 marLeftmin10"><input type="submit" class="btn btn-info pull-right" name="" value="Submit" /></div>
	</form>
</div>