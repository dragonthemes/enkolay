<div class="Heading">{$LANG.admin_site_setting}</div>
<div class="ContBody clearfix">

	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_require_field}</span>
	</div>
									
									
	<div id="errormsg" {if $SuccessMessage neq ''}class="successmsg"{/if}>{if $SuccessMessage neq ''}{$SuccessMessage}{/if}</div>
	
	<form name="site_seeting" method="post"  class="sky-form form-horizontal skyformbgNon" onsubmit="return iconSettingValidation();" enctype="multipart/form-data" action="icon_setting.php">
	<input type="hidden" name="action" value="updateIconSetting" />
	
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_flw_thumb_width} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_flw_thumb_width}" name="follower_logo_width" id="follower_logo_width" value="{$icon_adimin_value.0.followers_thumb_width}"  />
				<script type="text/javascript">document.site_seeting.follower_logo_width.focus();</script>
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_flw_thumb_height} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_flw_thumb_height}" name="follower_logo_height" id="follower_logo_height" value="{$icon_adimin_value.0.followers_thumb_height}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_banner_img_width} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_banner_img_width}" name="banner_img_width" id="banner_img_width" value="{$icon_adimin_value.0.banner_thumb_width}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_banner_img_height} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_banner_img_height} " name="banner_img_height" id="banner_img_height" value="{$icon_adimin_value.0.banner_thumb_height}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_ban_thumb_width} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_ban_thumb_width}" name="ban_thumb_width" id="ban_thumb_width" value="{$icon_adimin_value.0.banner_thumbsmall_width}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_ban_thumb_height} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_ban_thumb_height}" name="ban_thumb_height" id="ban_thumb_height" value="{$icon_adimin_value.0.banner_thumbsmall_height}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_list_thumb_width} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_list_thumb_width}" name="list_thumb_width" id="list_thumb_width" value="{$icon_adimin_value.0.listing_thumb_width}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_list_thumb_height} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_list_thumb_height}" name="list_thumb_height" id="list_thumb_height" value="{$icon_adimin_value.0.listing_thumb_height}"  />
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_gallery_size} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_gallery_size}" name="gallery_size" id="gallery_size" value="{$icon_adimin_value.0.gallery_thumb_size}"  /> %
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_slider_size} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_slider_size}" name="slider_size" id="slider_size" value="{$icon_adimin_value.0.slider_thumb_size}"  /> %
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_singleimage_size} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_singleimage_size}" name="single_image_thumb_size" id="single_image_thumb_size" value="{$icon_adimin_value.0.single_image_thumb_size}"  /> %
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
        <div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_imagetxt_size} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" placeholder="{$LANG.admin_imagetxt_size}" name="img_txt_thumb_size" id="img_txt_thumb_size" value="{$icon_adimin_value.0.img_txt_thumb_size}"  /> %
				
				<div class="tooltip"><div class="HelpButton">?</div><span>Admin Name is used to sender name of an Admin email to user</span></div>
			</div>
		</div>
		<div class="span3 marLeftmin10"><input type="submit" class="btn btn-info pull-right" name="" value="Submit" /></div>
	</form>
</div>