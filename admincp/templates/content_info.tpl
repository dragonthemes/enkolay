<div class="restInnerTab">
	<div class="alert alert-dismissable alert-info fade in">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>
		<span class="title"><i class="fa fa-info-circle"></i> <span class="red">*</span> - {$LANG.admin_required_field}</span>
	</div>
	<div id="errormsg"><span style="color:red;margin-left:230px;">{$ErrorMessage}</span></div>
	
	<div class="control-group">	
		<label class="control-label label" for="">{$LANG.admin_contentname} <span class="color1">*</span></label>
		<div class="controls">
			<input class="textbox" type="text" name="content_name" id="content_name" value="{if $smarty.get.conid neq ''}{$contentValue.0.content_name}{else}{$smarty.request.content_name}{/if}" />
			<script type="text/javascript">document.contentMgmt.content_name.focus();</script>
		</div>
	</div>
	<div class="control-group">	
		<label class="control-label label" for="">Content Description <span class="color1">*</span></label>
		<div class="controls">
			{$Editor}
		</div>
	</div>
</div>	