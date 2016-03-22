<div class="rightContHeading Heading">{if $smarty.get.contact_id neq ''}{$LANG.admin_edit_contact}{/if} <a class="backButt pull-right" href="contactManage.php"><i class="fa fa-backward"></i> {$LANG.admin_back}</a></div>
<div class="ContBody clearfix">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span class="color1">{$ErrorMessage}</span></div>
	<!--onsubmit="return validateBanner({$banner_width},{$banner_height});"-->
	<form name="editContact" method="post" enctype="multipart/form-data" onsubmit="return validateContact();" class="sky-form form-horizontal skyformbgNon">	
	<input type="hidden" name="action" value="contactAddEdit">
	<input type="hidden" name="contact_id" id="contact_id" value="{$smarty.get.contact_id}">	
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_contact_mail} <span class="color1">*</span></label>
			<div class="controls">
				<input class="textbox" type="text" name="mail_to" id="mail_to" value="{if $smarty.get.contact_id neq ''}{$selectFollowersValue.0.mail_to|stripslashes}{/if} {$smarty.post.mail_to}" />
      	  		<script type="text/javascript">document.editContact.mail_to.focus();</script>
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_label1} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="text1" id="text1" value="{if $smarty.get.contact_id neq ''}{$selectFollowersValue.0.text1|stripslashes}{/if} {$smarty.post.text1}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_label2} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="text2" id="text2" value="{if $smarty.get.contact_id neq ''}{$selectFollowersValue.0.text2|stripslashes}{/if} {$smarty.post.text2}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_label3} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="text3" id="text3" value="{if $smarty.get.contact_id neq ''}{$selectFollowersValue.0.text3|stripslashes}{/if} {$smarty.post.text3}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_label4} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="text4" id="text4" value="{if $smarty.get.contact_id neq ''}{$selectFollowersValue.0.text4|stripslashes}{/if} {$smarty.post.text4}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">{$LANG.admin_label5} <span class="color1">*</span></label>
			<div class="controls">
				 <input class="textbox" type="text" name="text5" id="text5" value="{if $smarty.get.contact_id neq ''}{$selectFollowersValue.0.text5|stripslashes}{/if} {$smarty.post.text5}" />
			</div>
		</div>
		<div class="control-group">	
			<label class="control-label label" for="">&nbsp;</label>
			<div class="controls">
				<input type="submit" class="btn btn-success" name="contact_edit" value="{if $smarty.get.contact_id neq ''}{$LANG.admin_edit} {/if}">
            	<a class="btn btn-danger" href="contactManage.php">Cancel</a>
			</div>
		</div>
	</form>
</div>