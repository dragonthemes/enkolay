
{if $columnpagefirstlist[colpagelist].contact_form eq '1'}
<form name="contactform" id="contactform{$columnpagefirstlist[colpagelist].pagelist}" action="{$SITE_SOURCE_BASEURL}" enctype="multipart/form-data" method="post" >

	<div id="success_contact"></div>
	<input type="hidden" name="action" id="action" value="commoncontact">
	<input type="hidden" name="mail_to" id="mail_to" value="{$contactlist.0.mail_to}">
		<div class="contactHead">{$contactlist.0.title_head}</div>
		
		<div class="row-fluid marTop10"> 	
			<div class="span12 relatePop">
				<div class="span12 contactLisNav">{$contactlist.0.text1}{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
				<input type="hidden" id="firstreq_{$columnpagefirstlist[colpagelist].pagelist}" value="{$contactlist.0.text1_required}">
				<div class="clearfix"></div>
				<input type="text"  class="contacttxtbx hei35" required name="firstname" id="firstname_{$columnpagefirstlist[colpagelist].pagelist}" value="" placeholder="{$LANG.common_first}" class="span12 offset0" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}">{if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if}
				<div id="error_msg1"></div>
			</div>
		</div>
		<div class="row-fluid marTop10">
			<div class="span12 relatePop">
				<div class="span12 contactLisNav">{$contactlist.0.text2} {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
				<input type="hidden" id="lastreq_{$columnpagefirstlist[colpagelist].pagelist}" value="{$contactlist.0.text2_required}">
				<div class="clearfix"></div>
				<input type="text" class="contacttxtbx hei35" required name="lastname" id="lastname_{$columnpagefirstlist[colpagelist].pagelist}" value="" placeholder="{$LANG.common_last}" class="span12 offset0" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}">{if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if}
                <div id="error_msg2"></div>
			</div>
		</div>
		<div class="row-fluid marTop10">
			<div class="span12 contactLisNav">{$contactlist.0.text3}{if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
			<input type="hidden" id="emailreq_{$columnpagefirstlist[colpagelist].pagelist}" value="{$contactlist.0.text3_required}">
			<div class="clearfix"></div>
			<input type="text" class="contacttxtbx hei35" required  name="email" id="email_{$columnpagefirstlist[colpagelist].pagelist}" value="" placeholder="{$LANG.common_email}" class="span12 offset0" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}">{if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if}
            <div id="error_msg3"></div>
    	</div>
		<div class="row-fluid marTop10">
			<div class="span12 contactLisNav">{$contactlist.0.text4} {if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
			<input type="hidden" id="commreq_{$columnpagefirstlist[colpagelist].pagelist}}" value="{$contactlist.0.text4_required}">
			<div class="clearfix"></div>
			<textarea class="contacttxtarea" required name="comment_contact" id="comment_contact_{$columnpagefirstlist[colpagelist].pagelist}}" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}"></textarea>{if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if}
            <div id="error_msg4"></div>
        </div>
        {section name='cntfld' loop=$contactfields}       
        <div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom">
			<div class="span12 contactLisNav">{$contactfields[cntfld].field_label_name}{if $contactfields[cntfld].required eq 'Y'}<span class="red">*</span>{/if}</div>
			<input type="hidden" id="commreq_{$columnpagefirstlist[colpagelist].pagelist}}" value="{$contactlist.0.text4_required}" />
			<div class="clearfix"></div>
			{if $contactfields[cntfld].field_type eq 'textarea'}
                 <textarea class="contacttxtarea" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
 name="{$contactfields[cntfld].field_post_name}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if}>{$contactfields[cntfld].value}</textarea>{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}
            {elseif $contactfields[cntfld].field_type eq 'select'}
                <select name="{$contactfields[cntfld].field_post_name}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if} class="contacttxtbx">
                {assign var='opt' value=","|explode:$contactfields[cntfld].value}
                {section name='selopt' loop=$opt}
                <option>{$opt[selopt]}</option>
                {/section}
                </select>{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}     
            {elseif $contactfields[cntfld].field_type eq 'radio'}               
                {assign var='opt' value=","|explode:$contactfields[cntfld].value}
                {section name='selopt' loop=$opt}                
                <label class="radio-inline" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}">
				<input class="flt" type="radio" name="{$contactfields[cntfld].field_post_name}" value="{$opt[selopt]}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if} />{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if} {$opt[selopt]}</label>
                {/section}
            {elseif $contactfields[cntfld].field_type eq 'checkbox'}                
                {assign var='opt' value=","|explode:$contactfields[cntfld].value}
                {section name='selopt' loop=$opt}                
                <label class="radio-inline" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
 style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}">
			 <input onclick="checkValidate('{$contactfields[cntfld].field_post_name}')" type="checkbox" name="{$contactfields[cntfld].field_post_name}[]" class="{$contactfields[cntfld].field_post_name} flt" value="{$opt[selopt]}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if} />{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if} {$opt[selopt]}</label>
                {/section}
            {elseif $contactfields[cntfld].field_type eq 'file' }
                <input class="contacttxtbx hei35" type="file" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
 {if $contactfields[cntfld].required eq 'Y'}required=""{/if} name="{$contactfields[cntfld].field_post_name}" value="{$contactfields[cntfld].value}" /> 
 {if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}       
            {else}
                <input class="contacttxtbx hei35" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
 name="{$contactfields[cntfld].field_post_name}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if} value="{$contactfields[cntfld].value}" />{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}     
            {/if}
            <div id="error_msg4"></div>
        </div>
         {/section}
        <div class="row-fluid marTop10" >
        	<div class="span12 contactLisNav">Captcha <span class="red">*</span></div>
        	{$objCommon->changeCaptchaCode()}
			<div class="clearfix"></div>
			<input type="text" required name="captcha" id="capt{$columnpagefirstlist[colpagelist].pagelist}}" value="" onclick="changecaptcha('{$columnpagefirstlist[colpagelist].pagelist}}');" class="contacttxtbx hei35" />
			<!-- <img  id="captcha{$columnpagefirstlist[colpagelist].pagelist}}" src="{$SITE_BASEURL}/captcha.php?formcode={$columnpagefirstlist[colpagelist].pagelist}}" class="pull-left" style="vertical-align:middle;" /> -->
			 <div class="clearfix"></div>
                <span class="refreshCode captchaCode btn pull-left">
	            	<span id="captchacode_{$columnpagefirstlist[colpagelist].pagelist}">{$rndnumber}</span>
	            </span>
	            <span class="refreshNew refreshCaptcha btn btn-primary pull-left offset1" title="Refresh Code" onclick="return refrashCaptchacode('{$columnpagefirstlist[colpagelist].pagelist}');">Change</span>	
			 <div id="capterror{$columnpagefirstlist[colpagelist].pagelist}}"></div>
        </div>
		<div class="row-fluid marTop10">
			<div class="buildPagePostButtonLeft"><input type="submit" value="Gönder" onclick="SubmitContact('{$columnpagefirstlist[colpagelist].pagelist}');" class="buildPagePostButton" /></div>
		</div>
	</form>
{/if}
{if $pagefirstlist[pagelist].contact_form eq '1'}
<form class="clearfix" name="contactform" id="contactform{$pagefirstlist[pagelist].pagelist}" action="{$SITE_SOURCE_BASEURL}" enctype="multipart/form-data" method="post" >
	<div id="success_contact"></div>
	<input type="hidden" name="action" id="action" value="commoncontact">
	<input type="hidden" name="mail_to" id="mail_to" value="{$contactlist.0.mail_to}">
		<div class="contactHead themeheadsec margin_top_10">{$contactlist.0.title_head}</div>
		
		<div class="row-fluid"> 	
			<div class="span4 relatePop">
				<div class="span12 contactLisNav">{$contactlist.0.text1}{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
				<input type="hidden" id="firstreq_{$pagefirstlist[pagelist].pagelist}" value="{$contactlist.0.text1_required}">
				<input type="text" required class="contacttxtbx hei35" name="firstname" id="firstname_{$pagefirstlist[pagelist].pagelist}" value="" placeholder="{$LANG.common_first}" class="span12 offset0" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}">{if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if}
				<div id="error_msg1"></div>
			</div>
			<div class="span4 relatePop">
				<div class="span12 contactLisNav">{$contactlist.0.text2} {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
				<input type="hidden" id="lastreq_{$pagefirstlist[pagelist].pagelist}" value="{$contactlist.0.text2_required}">
				<input type="text" required  class="contacttxtbx hei35" name="lastname" id="lastname_{$pagefirstlist[pagelist].pagelist}" value="" placeholder="{$LANG.common_last}" class="span12 offset0" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}">{if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if}
                <div id="error_msg2"></div>
			</div>
            
            <div class="span4 offset0 marTop10 relatepop clr">
			<div class="span12 contactLisNav">{$contactlist.0.text3}{if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
			<input type="hidden" id="emailreq_{$pagefirstlist[pagelist].pagelist}" value="{$contactlist.0.text3_required}">
			<input type="text" required class="contacttxtbx  hei35"  name="email" id="email_{$pagefirstlist[pagelist].pagelist}" value="" placeholder="{$LANG.common_email}" class="span12 offset0" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}">{if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if}
            <div id="error_msg3"></div>
    	</div>
            <div class="span4 offset0 marTop10 relatepop clr">
                <div class="span12 contactLisNav">{$contactlist.0.text4} {if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
                <input type="hidden" id="commreq_{$pagefirstlist[pagelist].pagelist}" value="{$contactlist.0.text4_required}">
                <textarea class="contacttxtarea" required name="comment_contact" id="comment_contact_{$pagefirstlist[pagelist].pagelist}" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}"></textarea>{if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if}
                <div id="error_msg4"></div>
            </div>
            
            {section name='cntfld' loop=$contactfields}       
            <div class="span4 offset0 marTop10 relatepop clr formcustombuild_new formcustom">
                <div class="span12 contactLisNav">{$contactfields[cntfld].field_label_name}{if $contactfields[cntfld].required eq 'Y'}<span class="red">*</span>{/if}</div>
                <input type="hidden" id="commreq_{$pagefirstlist[pagelist].pagelist}" value="{$contactlist.0.text4_required}" />
                {if $contactfields[cntfld].field_type eq 'textarea'}
                     <textarea class="contacttxtarea" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
     {if $contactfields[cntfld].required eq 'Y'}required=""{/if} name="{$contactfields[cntfld].field_post_name}">{$contactfields[cntfld].value}</textarea>{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}     
                {elseif $contactfields[cntfld].field_type eq 'select'}
                    <select class="contacttxtbx hei35" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
     name="{$contactfields[cntfld].field_post_name}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if}>
                    {assign var='opt' value=","|explode:$contactfields[cntfld].value}
                    {section name='selopt' loop=$opt}
                    <option>{$opt[selopt]}</option>
                    {/section}
                    </select>{if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}     
                {elseif $contactfields[cntfld].field_type eq 'radio'}               
                    {assign var='opt' value=","|explode:$contactfields[cntfld].value}
                    {section name='selopt' loop=$opt}                
                    <label class="radio-inline" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}">
                 <input class="flt" type="radio" name="{$contactfields[cntfld].field_post_name}" value="{$opt[selopt]}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if} /> {$opt[selopt]}
                    {if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if} 
                    </label> 
                    {/section}
                       
                {elseif $contactfields[cntfld].field_type eq 'checkbox'}                
                    {assign var='opt' value=","|explode:$contactfields[cntfld].value}
                    {section name='selopt' loop=$opt}                
                    <label class="radio-inline" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}">
                     <input onclick="checkValidate('{$contactfields[cntfld].field_post_name}')" type="checkbox" name="{$contactfields[cntfld].field_post_name}[]" class="{$contactfields[cntfld].field_post_name} flt" value="{$opt[selopt]}" {if $contactfields[cntfld].required eq 'Y'}required=""{/if} /> 
                     {$opt[selopt]}
                     {if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}
                     </label>
                    {/section}                       
                {elseif $contactfields[cntfld].field_type eq 'file' }
                    <input type="file" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
     {if $contactfields[cntfld].required eq 'Y'}required=""{/if} name="{$contactfields[cntfld].field_post_name}" value="{$contactfields[cntfld].value}" /> 
     {if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}   
                {else}
                    <input class="contacttxtbx hei35" type="text" style="{if $contactfields[cntfld].spacing eq 'None'}margin:0px;{elseif $contactfields[cntfld].spacing eq 'Small'}margin:5px 0px;{elseif $contactfields[cntfld].spacing eq 'Medium'}margin:10px 0px;{elseif $contactfields[cntfld].spacing eq 'Large'}margin:15px 0px;{/if}{if $contactfields[cntfld].size eq 'Small'}width:50%;{elseif $contactfields[cntfld].size eq 'Medium'}width:70%;{elseif $contactfields[cntfld].size eq 'Large'}width:100%;{/if}"
     {if $contactfields[cntfld].required eq 'Y'}required=""{/if} name="{$contactfields[cntfld].field_post_name}" value="{$contactfields[cntfld].value}" /> 
     {if $contactfields[cntfld].instruction}<span class="instruction-right left">{$contactfields[cntfld].instruction}</span>{/if}         
                {/if}
                <div id="error_msg4"></div>
            </div>
            {/section}
            <div class="span4 offset0 marTop10 relatepop clr" >
                <div class="span12 contactLisNav">Captcha <span class="red">*</span></div>
                {$objCommon->changeCaptchaCode()}
                <div class="clearfix"></div>
                <input type="text" required name="captcha" id="capt{$pagefirstlist[pagelist].pagelist}" value=""  class="contacttxtbx hei35">
                <!-- <img id="captcha{$pagefirstlist[pagelist].pagelist}" src="{$SITE_BASEURL}/captcha.php?formcode={$pagefirstlist[pagelist].pagelist}" onclick="changecaptcha('{$pagefirstlist[pagelist].pagelist}')"  class="pull-left" style="vertical-align:middle;" /> -->
                <div class="clearfix"></div>
                <span class="refreshCode captchaCode btn pull-left">
	            	<span id="captchacode_{$pagefirstlist[pagelist].pagelist}">{$rndnumber}</span>
	            </span>
	            <span class="refreshNew refreshCaptcha btn btn-primary pull-left offset1" title="Refresh Code" onclick="return refrashCaptchacode('{$pagefirstlist[pagelist].pagelist}');">Change</span>	
             <div id="capterror{$pagefirstlist[pagelist].pagelist}"></div>
            </div>
            <div class="span4 offset0 marTop10 relatepop clr">
                <div class="span12 contactLisNav"><input type="submit" value="Gönder" onclick="return SubmitContact('{$pagefirstlist[pagelist].pagelist}');" class="buildPagePostButton" /></div>
                
            </div>
		</div>
		
	</form>	
{/if}
{literal}
<script>
function checkValidate(id)
{    
   
    if($("."+id+":checked").length>0)
    {        
        $("."+id).removeAttr("required");
    }
    else
    {
        $("."+id).attr("required","required");
        
    }
}
</script>
{/literal}