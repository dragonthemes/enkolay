{if !$objCommon->getStoreComment($smarty.session.page_id)}
{literal}
<script>

$(document).ready(function(){
					
	var blockSort = true;
	$(".leftuldiv").sortable();
	$(".leftuldiv").bind('sortreceive', function () {
		blockSort = false;
	}).bind('sortstop', function (e) {
		if (blockSort) {
			e.preventDefault();
		}
		blockSort = true;
	});						
});

function fileUpload(id)
{
   
    $("#fileform"+id).ajaxForm({target: '#preview', 
    beforeSubmit:function(){ 
    $("#imageloadstatus_"+id).show();
    $("#imageloadbutton").hide();
    }, 
    success:function(){ 
    $("#imageloadstatus_"+id).hide();
    $("#imageloadbutton").hide();
    $("#maska").hide();                                      
    imageReloadPagelist();
    
    }, 
    error:function(){ 
    $("#imageloadstatus_"+id).hide();
    $("#imageloadbutton").show();
    } }).submit();   
}

function galimagupdate(id)
{

$("#galimagephotogal"+id).ajaxForm({target: '#preview', 
beforeSubmit:function(){ 
$("#imageloadstatus").show();
$("#imageloadbutton").hide();
}, 
success:function(){ 
$("#imageloadstatus").hide();
$("#imageloadbutton").hide();
$("#maska").hide();                     
imageReloadPagelist();

}, 
error:function(){ 
$("#imageloadstatus").hide();
$("#imageloadbutton").show();
} }).submit();
}
function imageUpdatingProcess(id){


$(".imagepopupdiv").hide();
$("#imageform_"+id).ajaxForm({target: '#preview', 
beforeSubmit:function(){ 
$("#imageloadstatus_"+id).show();
//$("#imageloadbutton_"+id).hide();
}, 
success:function(){ 
$("#imageloadstatus_"+id).hide();
$("#imageloadbutton_"+id).hide();

imageReloadPagelist();      

}, 

error:function(){ 
$("#imageloadstatus_"+id).hide();
$("#imageloadbutton_"+id).show();
} }).submit();

}  
      
</script>
{/literal}
<div id="pagelist" class="blogPageBgInner themewrapper1 blogPageBgInnerMiddle blogPageBgInnerMiddleSec clearfix">
     <div class="themewrapper2BgAlign">
          <div id="rightColumn" class="clearfix"> {*=====Blog and their function ======*}
               {if $smarty.session.page_id}
               {if $objCommon->getBlogComment($smarty.session.page_id)}
               {if $smarty.session.blogonuse }
               <ul id="" class="nolist">
                    <li class="">
                         <div class="blogInner">
                              <div class="blogLeft">
                                   <div class="blogPageBgInnerTab blogPageBgInnerTab4"> <a class="active BlogNewPost" onclick="return AddTitlePopup('{$smarty.session.domain_id}');">{$LANG.main_blog_newpost}</a>
                                   {$objCommon->getDraftsDetails($smarty.session.domain_id)}
                                        {if !empty($drafts_list)} <a class="BlogNewPost" onclick="commonForOption('{$smarty.session.domain_id}','drafts_id')">{$LANG.user_drafts}({$drafts_list|@count})</a> {/if} <a data-toggle="modal" href="#myModalBlogComment" onclick="getAllTheComments('{$smarty.session.domain_id}');">{$LANG.main_blog_comments}</a> <a data-toggle="modal" href="#myModalBlogSetting" onclick="ShowPassChangeColumn('settingblog','postblog','commentblogid');">{$LANG.main_blog_setting}</a> </div>
                                   {*==drafts list small popup==*}
                                   <div class="BlogNewPostPopup">
                                        <div id='drafts_id'></div>
                                   </div>
                                   {*==drafts list small popup==*}
                                   <div id="postblog" style="display:block">
                                        <div id="showPost"> {include file="listPost.tpl"} </div>
                                        {*---popup for  add title--*}
                                        <div class="BlogNewPostPopup">
                                             <div id="popaddtitle" style="display:none"> </div>
                                        </div>
                                        <div class="blogMask"></div>
                                        {*---popup for  add title--*}
                                        {*----newtitle ends---*}
                                        
                                        {*---popup for edit   title--*}
                                        <div id="myModalBlogEditPost" class="BlogNewPostPopup"> </div>
                                        {*---popup for edit   title--*}
                                        {*----newtitle ends---*} </div>
                                   <div id="showeditpost" style="display:none;"> {include file="addtitle.tpl"} </div>
                                   <div id="modals">
                                        <div id="myModalBlogComment" class="modal addCatPopWidt hide modelPopContLogin fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                             <div id="commentblogid" style="display:none"> {include file="blockpopupcomment.tpl"} </div>
                                        </div>
                                   </div>
                                   <div id="modals">
                                        <div id="myModalBlogSetting" class="modal hide addCatPopWidt fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                             <div id="settingblog" style="display:none">
                                                  <div class="headBgTop"> {$LANG.main_blog_setting}
                                                       <div class="pull-right curPoint" data-dismiss="modal" aria-hidden="true">X</div>
                                                  </div>
                                                  <div class="popaddTitle clearfix">
                                                       <form name="blogsettingform" class="form-horizontal no-mar sky-form" id="blogsettingform" method="post" action="">
                                                            <input type="hidden" name="domain_id" id="domain_id" value="{$smarty.session.domain_id}">
                                                            <input type="hidden" name="action" id="action" value="updateBlogSetting">
                                                            <ul class="offset0">
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label>{$LANG.main_common_default}</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="commentdefault">
                                                                                <option value="{$LANG.main_blog_close}" {if $blogsetting_list.0.comment_default eq $LANG.main_blog_close} selected="selected" {/if} >{$LANG.main_blog_close}</option>
                                                                                <option value="{$LANG.main_blog_open}" {if $blogsetting_list.0.comment_default eq $LANG.main_blog_open} selected="selected" {/if}>{$LANG.main_blog_open}</option>
                                                                                <option value="{$LANG.main_blog_require}" {if $blogsetting_list.0.comment_default eq $LANG.main_blog_require} selected="selected" {/if} >{$LANG.main_blog_require}</option>
                                                                           </select>
                                                                           <i></i> </label>
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label>{$LANG.main_blog_post}</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="postperpage">
                                                                                
{section name=foo start=1 loop=51}

                                                                                <option value="{$smarty.section.foo.index}" {if $blogsetting_list.0.post_perpage eq  $smarty.section.foo.index }selected="selected"{/if}>{$smarty.section.foo.index}</option>
                                                                                
{/section}

                                                                           </select>
                                                                           <i></i> </label>
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label>{$LANG.main_blog_notify}</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="notifyme">
                                                                                <option value="{$LANG.main_blog_yes}" {if $blogsetting_list.0.notifyme eq $LANG.main_blog_yes} selected="selected" {/if}>{$LANG.main_blog_yes}</option>
                                                                                <option value="{$LANG.main_blog_no}" {if $blogsetting_list.0.notifyme eq $LANG.main_blog_no} selected="selected" {/if}>{$LANG.main_blog_no}</option>
                                                                           </select>
                                                                           <i></i> </label>
                                                                           <div class="dc"><span class="txtBoxBlogPop_at">at</span></div>
                                                                           <input class="txtBoxBlogPopComment" type="text" name="notifyme_email" id="notifyme_email" value="{$blogsetting_list.0.notifyme_email}" placeholder="{$LANG.main_notiyemail}">
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label>{$LANG.main_blog_autocomment}</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="automaticallyclose">
                                                                                <option value="{$LANG.main_blog_never}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_never} selected="selected" {/if}>{$LANG.main_blog_never}</option>
                                                                                <option value="{$LANG.main_blog_afterthird}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_afterthird} selected="selected" {/if}>{$LANG.main_blog_afterthird}</option>
                                                                                <option value="{$LANG.main_blog_aftersix}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_aftersix} selected="selected" {/if}>{$LANG.main_blog_aftersix}</option>
                                                                                <option value="{$LANG.main_blog_afternine}" {if $blogsetting_list.0.automaticallyclose  eq $LANG.main_blog_afternine} selected="selected" {/if}>{$LANG.main_blog_afternine}</option>
                                                                           </select>
                                                                           <i></i> </label>
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label>{$LANG.main_blog_share_but}</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <input class="no-mar" type="checkbox" name="sharebutton" id="sharebutton" value="1" {if $blogsetting_list.0.sharebutton eq '1'}checked{/if}>
                                                                           {$LANG.main_blog_share} </div>
                                                                 </li>
                                                            </ul>
                                                            <input type="button" name="updatesetting" class="btn btn-info pull-right" id="updatesetting" onclick="updateBlogSetting();" value="{$LANG.main_save}">
                                                       </form>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="blogRight">
                                   <div class="blogRhtInner"> {*==author and archives column starts==*}
                                        {*
                                        <div class="popaddTitleHead">
                                             <div class="popaddTitleHeadBg">
                                                  <div class="popaddTitleHeadBgCol">{$LANG.user_blog_author}</div>
                                             </div>
                                        </div>
                                        *}
                                        <div id="author_id" class="authorTxtBg"> {include file="authorBlog.tpl"} </div>
                                        {*
                                        <div class="popaddTitleHead marTop10">
                                             <div class="popaddTitleHeadBg">
                                                  <div class="popaddTitleHeadBgCol">{$LANG.user_blog_archives}</div>
                                             </div>
                                        </div>
                                        *}
                                        <div id="archives_id" class="achiverTxtBg clearfix"> {include file="archivesBlog.tpl"} </div>
                                        <div class="authCont">{$smarty.now|date_format:'%b %d, %Y'|utf8_encode}</div>
                                        <div id="cat_id" class="CatBg"> {include file="categoriesBlog.tpl"} </div>
                                        <div class="userList"> {$objCommon->selectCat()} <a onclick="return selectPostBasdCat('{$cate[category].cat_id}');">
                                             <div class="authCont">{$LANG.all_categories}</div>
                                             </a> {section name="category" loop="$cate"} <a onclick="return selectPostBasdCat('{$cate[category].cat_id}');">
                                             <div class="authCont">{$cate[category].cat_name}</div>
                                             </a> {/section} </div>
                                        {*==author and archives column starts==*} </div>
                              </div>
                         </div>
                    </li>
               </ul>
               {/if}
               {/if}	
               {/if}
               {*====Blog and their Function are ends===*}
               {if $smarty.session.domain_id}
               {if !$objCommon->getBlogComment($smarty.session.page_id)}
               <input type="hidden" class="dropvalue frt" value="" />
               <!--<div class="highlightLine" style="display:none;"></div>-->
               <div id="dropBox" class="dropBox clearfix">
                    <ul id="droppable_content" class="clearfix sortouterHeight">
                         {*$pagefirstlist|print_r*} 
                         {section name="pagelist" loop="$pagefirstlist"}
                         <!--<div id="dropBox2" class="dropBox2 clearfix" style="position:relative;">-->
                         {if $pagefirstlist[pagelist].column_show}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="columnlist">
                              <ul id="dropBox2" class="dropBox2 clearfix" style="position:relative;">
                                   <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn column">
                                        <div class="form_element_control">
                                             <div class="controlMidOuter">
                                                  <div class="controlMidBg"></div>
                                             </div>
                                             <div class="deleteOuter">
                                                  <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','column_show');"><i class="fa fa-trash-o"></i></div>
                                             </div>
                                        </div>
                                        <div class="columnPop">
                                             <div class="columnPopLeft"></div>
                                             <div class="columnPopContent">
                                                  <select class="columncount" onchange="selecttochange(this,'{$pagefirstlist[pagelist].pagelist}');">
                                                       <option {if $pagefirstlist[pagelist].column_count eq '3'}selected="selected"{/if}>2</option>
                                                       <option {if $pagefirstlist[pagelist].column_count eq '4'}selected="selected"{/if}>3</option>
                                                       <option {if $pagefirstlist[pagelist].column_count eq '5'}selected="selected"{/if}>4</option>
                                                       <option {if $pagefirstlist[pagelist].column_count eq '6'}selected="selected"{/if}>5</option>
                                                  </select>
                                             </div>
                                             <div class="columnPopRight"></div>
                                        </div>
                                        <!--<table onmouseover="columnId(this);" onmouseleave="columnIdOut(this);" class="sample2 columsBor" width="100%" border="0" cellpadding="0" cellspacing="0">-->
                                        <div class="tablesampleouter">
                                             <div id="column{$pagefirstlist[pagelist].pagelist}" class="sample2  columsBor row-fluid no-space">
                                                  {section name="rowcount" start=1 loop=$pagefirstlist[pagelist].column_count}
                                                       <div class="addwidth column_inner_div {if $pagefirstlist[pagelist].column_count eq '3'}span6{/if} {if $pagefirstlist[pagelist].column_count eq '4'}span4{/if} {if $pagefirstlist[pagelist].column_count eq '5'}span3{/if} {if $pagefirstlist[pagelist].column_count eq '6'}five_column{/if}" id="col_{$smarty.section.rowcount.index}">
                                                       <input type="hidden" name="columnpagelistid" id="columnpagelistid" class="columnpagelistid" value="{$pagefirstlist[pagelist].pagelist}">
                                                       <!---COlumn Sortable---->
                                                       <ul id="sortable_{$smarty.section.rowcount.index}" class="clearfix no-mar sortcolumn">
                                                            <li class="highlightLineInner" style="display:none;"></li>
															{$objCommon->getColumnPageList($smarty.section.rowcount.index,$pagefirstlist[pagelist].pagelist)}
                                                            {if $columnpagefirstlist}
                                                            {section name="colpagelist" loop="$columnpagefirstlist"}
                                                            {if $columnpagefirstlist[colpagelist].title_select}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','title_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildTitle_{$columnpagefirstlist[colpagelist].pagelist}" onblur="updateTitle('buildTitle_{$columnpagefirstlist[colpagelist].pagelist}');" onkeydown="updateTitle('buildTitle_{$columnpagefirstlist[colpagelist].pagelist}');" class="themehead {if $columnpagefirstlist[colpagelist].text_title eq ''}clickheretext contenttext {/if}contentedit main_title" style="{if $columnpagefirstlist[colpagelist].buildTitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildTitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildTitle_fontcolor}color:{$columnpagefirstlist[colpagelist].buildTitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_title_font_style}font-family:{$columnpagefirstlist[colpagelist].main_title_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_title_line_size}line-height:{$columnpagefirstlist[colpagelist].main_title_line_size}px;{/if}" contenteditable="true"  data-ph="Başlığı Düzenle" >{if $columnpagefirstlist[colpagelist].text_title}{$columnpagefirstlist[colpagelist].text_title}{/if}</div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].description_select}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div  class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','description_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildPara_{$columnpagefirstlist[colpagelist].pagelist}" class="{if $columnpagefirstlist[colpagelist].text_description eq ''}clickheretext contenttext {/if}contentedit main_paragraph" style="{if $columnpagefirstlist[colpagelist].buildPara_fontsize}font-size:{$columnpagefirstlist[colpagelist].buildPara_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].buildPara_fontcolor}color:{$columnpagefirstlist[colpagelist].buildPara_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_font_style}font-family:{$columnpagefirstlist[colpagelist].main_paragraph_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_paragraph_line_size}line-height:{$columnpagefirstlist[colpagelist].main_paragraph_line_size}px;{/if}" onblur="updateDesc('buildPara_{$columnpagefirstlist[colpagelist].pagelist}');" onkeydown="updateDesc('buildPara_{$columnpagefirstlist[colpagelist].pagelist}');" contenteditable="true"  data-ph="Paragrafı Düzenle" >{if $columnpagefirstlist[colpagelist].text_description}{$columnpagefirstlist[colpagelist].text_description}{/if}</div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].divider}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','divider');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildDivide" class="">
                                                                      <hr />
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].image_multiple_select}
                                                            {$objCommon->getImageText($columnpagefirstlist[colpagelist].pagelist,'singletext')}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                       
                                                                      <div class="deleteOuter">                                                                           
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildImgTxt_{$columnpagefirstlist[colpagelist].pagelist}" class="buildImgTxtOuter">
                                                                      <div class="row-fluid">
                                                                           <div class="span12 buildImgTxt {if !$images}minimagewidth{/if}"> {if !$images}	
                                                                                {*
                                                                                <div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'> </div>
                                                                                *}
                                                                                <div  style='display:none'>
                                                                                     <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                                </div>
                                                                                <form  method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
                                                                                     <label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                                                                     <div class="button">
                                                                                          <input type='button' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onclick="showImageTxtPopup('{$columnpagefirstlist[colpagelist].pagelist}');"/>
                                                                                     </div>
                                                                                     <input type='hidden' name="status" value="singletext"/>
                                                                                     <input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                                     </label>
                                                                                </form>
                                                                                {else}
                                                                                <div class="uploadImgBg"> <img class="imagechangeNew" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" onclick="showImageTxtPopup('{$columnpagefirstlist[colpagelist].pagelist}');"> {*
                                                                                     <div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'> </div>
                                                                                     *}
                                                                                     <div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
                                                                                          <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                                     </div>
                                                                                     <form  method="post" class="form-horizontal sky-form uploadsecbg" style=" display:none;" enctype="multipart/form-data" action='ajaxImageUpload.php'>
                                                                                     <label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block" for="file">
                                                                                     <div class="button">
                                                                                          <input type='button' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onclick="showImageTxtPopup('{$columnpagefirstlist[colpagelist].pagelist}');"/>
                                                                                     </div>
                                                                                     <input type='hidden' name="status" value="singletext"/>
                                                                                     <input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                                     </label>
                                                                                     </form>
                                                                                </div>
                                                                                {/if} </div>
                                                                           <div class="span12">
                                                                                <div id="imgtitle_{$columnpagefirstlist[colpagelist].pagelist}" onblur="updateImgTitle('imgtitle_{$columnpagefirstlist[colpagelist].pagelist}');" onkeydown="updateImgTitle('imgtitle_{$columnpagefirstlist[colpagelist].pagelist}');" class="themehead borNone {if $columnpagefirstlist[colpagelist].image_text eq ''}clickheretext contenttext {/if}contentedit main_imagetitle" style="{if $columnpagefirstlist[colpagelist].imgtitle_fontsize}font-size:{$columnpagefirstlist[colpagelist].imgtitle_fontsize}px;{/if}{if $columnpagefirstlist[colpagelist].imgtitle_fontcolor}color:{$columnpagefirstlist[colpagelist].imgtitle_fontcolor}{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_style}font-family:{$columnpagefirstlist[colpagelist].main_imagetitle_font_style};{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_line_size}line-height:{$columnpagefirstlist[colpagelist].main_imagetitle_line_size}px;{/if}{if $columnpagefirstlist[colpagelist].main_imagetitle_font_size}font-size:{$columnpagefirstlist[colpagelist].main_imagetitle_font_size}px;{/if}" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" >{if $columnpagefirstlist[colpagelist].image_text}{$columnpagefirstlist[colpagelist].image_text}{/if}</div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].image_select}
                                                            {$objCommon->getImage($columnpagefirstlist[colpagelist].pagelist)}
                                                            
                                                            <li id="page_{$columnpagefirstlist[colpagelist].colpagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                         <div onclick="$('#imagealignPopup_{$columnpagefirstlist[colpagelist].pagelist}').show();$('#loadmask').show();" class="settingControlBg"><img src="http://www.enkolayweb.com/images/setting.png" ></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','image_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid"> {if !$images}
                                                                      {*
                                                                      <div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'> </div>
                                                                      *}
                                                                      <div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
                                                                           <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                      </div>
                                                                      <form  class="form-horizontal sky-form" method="post" enctype="multipart/form-data" style="clear:both">
                                                                           <label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                                                           <div class="button">
                                                                                <input type='button' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onclick="showSinglePopup('{$columnpagefirstlist[colpagelist].pagelist}');"/>
                                                                           </div>
                                                                           <input type='hidden' name="status" value="single"/>
                                                                           <input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                           </label>
                                                                      </form>
                                                                      {else}
                                                                        
                                                                      <div class="uploadImgBg{$columnpagefirstlist[colpagelist].pagelist}" style="text-align:{$columnpagefirstlist[colpagelist].single_img_alignment}"> <a><img class="imagechange" width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" onclick="showSinglePopup('{$columnpagefirstlist[colpagelist].pagelist}');"></a> {*
                                                                           <div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'> </div>
                                                                           *}
                                                                           <div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
                                                                                <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                           </div>
                                                                           <form  class="form-horizontal sky-form uploadsecbg" style="display:none;clear:both;" method="post" >
                                                                                <label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block" for="file">
                                                                                <div class="button">
                                                                                     <input type='button' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onclick="showSinglePopup('{$columnpagefirstlist[colpagelist].pagelist}');"/>
                                                                                </div>
                                                                                <input type='hidden' name="status" value="single"/>
                                                                                <input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                                </label>
                                                                           </form>
                                                                      </div>
                                                                      {/if} 
                                                               </div>
                                                               <div class="imagealignPopup" id="imagealignPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;">
                                                                   <div class="youtubepopclose" onclick="$(this).parent().hide();" ></div>
                                                                   <div class="contactlabelsPopupRight">
                                                                        <div class="contactlabelsPopupRightInner">
                                                                             <label class="span5 right">Hizalama</label>
                                                                             <select id="imgalign{$columnpagefirstlist[colpagelist].pagelist}" class="alignOption span6" onchange="alignmentImage('alignto{$columnpagefirstlist[colpagelist].pagelist}',this);">
                                                                                  <option {if $columnpagefirstlist[colpagelist].single_img_alignment	eq 'left'}selected="selected"{/if} value="left">sol</option>
                                                                                  <option {if $columnpagefirstlist[colpagelist].single_img_alignment	eq 'center'}selected="selected"{/if}value="center">merkez</option>
                                                                                  <option {if $columnpagefirstlist[colpagelist].single_img_alignment	eq 'right'}selected="selected"{/if}value="right">sağ</option>
                                                                             </select>
                                                                        </div>
                                                                        <div class="center">
                                                                             <input type="button" onclick="updatealign_image('{$columnpagefirstlist[colpagelist].pagelist}')" value="Kaydet" class="videosubmit"/>
                                                                        </div>
                                                                   </div>
                                                              </div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].contact_form}
                                                            {$objCommon->getAllContactDetails($columnpagefirstlist[colpagelist].pagelist)}
                                                            {$objCommon->getContactFormFields($smarty.session.domain_id,$columnpagefirstlist[colpagelist].pagelist)}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','contact_form');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="" class="contactform clearfix">
                                                                      
                                                                      <a data-toggle="modal" href="#ModalFormEntry_{$columnpagefirstlist[colpagelist].pagelist}" class="btn btn-warning pull-right">Form Girişleri</a> <a onclick="ShowContactForm_fieldspopup('{$columnpagefirstlist[colpagelist].pagelist}');" class="btn btn-success">Yeni Alan Ekle</a>
                                                                      <div class="themeheadsec contentedit {if $contactlist.0.title_head eq ''}clickheretext contenttext {/if}contactTxt contactHead" style="{if $contactlist.0.buildContact_fontsize}font-size:{$contactlist.0.buildContact_fontsize}px;{/if}{if $contactlist.0.buildContact_fontcolor}color:{$contactlist.0.buildContact_fontcolor}{/if}{if $contactlist.0.buildContact_font_style}font-family:{$contactlist.0.buildContact_font_style};{/if}{if $contactlist.0.buildContact_line_size}line-height:{$contactlist.0.buildContact_line_size}px;{/if}{if $contactlist.0.buildContact_font_size}font-size:{$contactlist.0.buildContact_font_size}px;{/if}" id="buildContact_{$contactlist.0.id}" onblur="updateContactFormTitle('buildContact_{$contactlist.0.id}'); 44444" onkeydown="updateContactFormTitle('buildContact_{$contactlist.0.id}');" data-ph="Başlığı Düzenle">{if $contactlist.0.title_head}{$contactlist.0.title_head}{/if}</div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 relatepop">
                                                                                <div class="span12 contactLisNav"><span onclick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{$contactlist.0.text1}</span>{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
                                                                                <div class="clearfix"></div>
                                                                                <input type="text" value="" placeholder="Ad" class="contacttxtbx" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">
                                                                                {if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if} </div>
                                                                      </div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 relatepop">
                                                                                <div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{$contactlist.0.text2}</span> {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
                                                                                <div class="clearfix"></div>
                                                                                <input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">
                                                                                {if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if} </div>
                                                                      </div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{$contactlist.0.text3}</span> {if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
                                                                           <div class="clearfix"></div>
                                                                           <input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">
                                                                           {if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if} </div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 contactLisNav"><span onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');">{$contactlist.0.text4}</span>{if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
                                                                           <div class="clearfix"></div>
                                                                           <textarea class="contacttxtarea" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');"></textarea>
                                                                           {if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if} </div>
                                                                      {include file="contactform_fields.tpl"}
                                                                      <div class="span4 offset0 marTop10 relatepop clr">
                                                                           <div class="buildPagePostButtonLeft">
                                                                                <input type="submit" value="Gönder" class="buildPagePostButton">
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 {*
                                                                 <div id="showMailContact" style="display:none;"> {$objCommon->getEmai($columnpagefirstlist.0.domain_id,$columnpagefirstlist.0.page_id)}
                                                                      <form name="conatctmail" method="post">
                                                                           <input type="text" name="contactmail" id="contactmail" value="{$mailid}" >
                                                                           <input type="button" name="submit" value="Gönder" onclick="changeMail();">
                                                                      </form>
                                                                 </div>
                                                                 *}
                                                                 <div id="modals">
                                                                      <div id="ModalFormEntry_{$columnpagefirstlist[colpagelist].pagelist}" class="modal hide contact_form_show">
                                                                           <div class="formEntryPopForm clearfix">
                                                                                <div class="preview_image">Form Girişleri</div>
                                                                                <div id="errtext"></div>
                                                                                {$objCommon->getEmai($columnpagefirstlist[colpagelist].pagelist)}
                                                                                <form class="clearfix" name="conatctmail_{$columnpagefirstlist[colpagelist].pagelist}" method="post" class="no-mar">
                                                                                     <div id="errtext"></div>
                                                                                     <input type="text" name="contactmail" id="contactmail_{$columnpagefirstlist[colpagelist].pagelist}" value="{$mailid}" >
                                                                                     <button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
                                                                                     <input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                                </form>
                                                                                
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="contactForm"></div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].social_plugins}
                                                            {$objCommon->getSocialDetails($columnpagefirstlist[colpagelist].pagelist)}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                         <div onclick="showSocialPopup({$columnpagefirstlist[colpagelist].pagelist});" class="settingControlBg"><img src="http://www.enkolayweb.com/images/setting.png"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="moveicon"></div>
                                                                 <div id="buildSocial_{$columnpagefirstlist[colpagelist].pagelist}" class="buildSocialIcon" >
                                                                      <input type="button" class="fbicon" value="" />
                                                                      <input type="button" class="twittericon" value="" />
                                                                      <input type="button" class="linkedicon" value="" />
                                                                      <input type="button" class="mailicon" value="" />
                                                                 </div>
                                                                 <div id="pluginShow_{$columnpagefirstlist[colpagelist].pagelist}" class="galleryimagepop socialPop" style="display:none;">
                                                                      <div class="leftside"> <i class="fa fa-users fontSize42"></i>
                                                                           <label>{$LANG.social_link_name}</label>
                                                                      </div>
                                                                      <div class="rightside">
                                                                           <form class="no-mar" id="socialplugin_{$columnpagefirstlist[colpagelist].pagelist}" name="socialplugin" method="post">
                                                                                <input type="hidden" name="domain_id" id="domain_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].domain_id}">
                                                                                <input type="hidden" name="page_id" id="page_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].page_id}">
                                                                                <input type="hidden" name="page_list_id" id="page_list_id_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].pagelist}">
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa-facebook"></i></span>
                                                                                     <input type="text" name="fb" value="{$socialpagelist.0.fb}" id="fb_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://facebook.com/ornek">
                                                                                </div>
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa fa-tumblr"></i></span>
                                                                                     <input type="text" name="tw" value="{$socialpagelist.0.twitter}" id="tw_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://twitter.com/ornek">
                                                                                </div>
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa-linkedin"></i></span>
                                                                                     <input type="text" name="ln" value="{$socialpagelist.0.linkedin}" id="ln_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="http://linkedin.com/in/ornek">
                                                                                </div>
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa fa-envelope-o"></i></span>
                                                                                     <input type="text" name="mail" value="{$socialpagelist.0.mail}" id="mail_{$columnpagefirstlist[colpagelist].pagelist}" placeholder="ornek@ornek.com">
                                                                                </div>
                                                                                <div class="mapButton clearfix">
                                                                                     <input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                                     <input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_{$columnpagefirstlist[colpagelist].pagelist}').hide();">
                                                                                </div>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            {if $columnpagefirstlist[colpagelist].youtube_video}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                           <div class="settingControlBg"><img src="{$SITE_BASEURL}/images/setting.png" alt="" onclick="showVideoPopup('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"/></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','youtube_video');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 {$objCommon->getYoutubeDetails_buildpage($columnpagefirstlist[colpagelist].pagelist)}
                                                                 <div class="youtubeDiv clearfix" id="youtubeDiv_{$columnpagefirstlist[colpagelist].pagelist}" style="display:block;{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
                                                                      <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{if $youtubelist.0.youtube_url neq ''}{$youtubelist.0.youtube_url}{else}{$SITE_BASEURL}/images/youtubeLogo.png{/if}" width="100%" height="200"></iframe>
                                                                 </div>
                                                                 <div class="youtubelabelsPopup" id="youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;">
                                                                      <div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_{$columnpagefirstlist[colpagelist].pagelist}');"></div>
                                                                      <form name="youtubefrm_{$columnpagefirstlist[colpagelist].pagelist}" method="post">
                                                                           <div id="error_{$columnpagefirstlist[colpagelist].pagelist}"></div>
                                                                           <div class="contactlabelsPopupLeft">
                                                                                <label>Youtube Video Adresi</label>
                                                                                <input type="text" class="videoUrl" name="videourl_{$columnpagefirstlist[colpagelist].pagelist}" id="videourl_{$columnpagefirstlist[colpagelist].pagelist}" value="{$youtubelist.0.youtube_url}"/>
                                                                           </div>
                                                                           <div class="contactlabelsPopupRight">
                                                                                <div class="contactlabelsPopupRightInner">
                                                                                     <label>{$LANG.spacing_name}</label>
                                                                                     <select class="spacingOption" name="spacing" id="spacing_{$columnpagefirstlist[colpagelist].pagelist}">
                                                                                          <option value="{$LANG.for_none_name}" {if $youtubelist.0.youtube_spacing eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
                                                                                          <option value="{$LANG.small_name}" {if $youtubelist.0.youtube_spacing eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
                                                                                          <option value="{$LANG.medium_name}" {if $youtubelist.0.youtube_spacing eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
                                                                                          <option value="{$LANG.large_name}" {if $youtubelist.0.youtube_spacing eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
                                                                                     </select>
                                                                                     <label>Genişlik</label>
                                                                                     <select class="widthOption" name="width_{$columnpagefirstlist[colpagelist].pagelist}" id="width_{$columnpagefirstlist[colpagelist].pagelist}">
                                                                                          <option value="Küçük" {if $youtubelist.0.youtube_width eq 'Small'}selected="selected"{/if}>Küçük</option>
                                                                                          <option value="Orta" {if $youtubelist.0.youtube_width eq 'Medium'}selected="selected"{/if}>Orta</option>
                                                                                          <option value="Büyük" {if $youtubelist.0.youtube_width eq 'Large'}selected="selected"{/if}>Büyük</option>
                                                                                     </select>
                                                                                </div>
                                                                                <div>
                                                                                     <input type="button" value="Kaydet" class="videosubmit"  onclick="addYoutubeUrl('{$columnpagefirstlist[colpagelist].pagelist}');" />
                                                                                </div>
                                                                           </div>
                                                                      </form>
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            <!--Gallery Process Start-->
                                                            {if $columnpagefirstlist[colpagelist].gallery}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','gallery');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="galImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid center columngallery gallery_wrapper"> {$objCommon->getGalleryImage($smarty.session.domain_id,$smarty.session.page_id,$columnpagefirstlist[colpagelist].pagelist)}
                                                                      {if $images}
                                                                      {section name="galimg" loop="$images"}
                                                                      <div class="imageGallery" id="imageGallery{$images[galimg].gallery_id}" style="{if $columnpagefirstlist[colpagelist].gallery_column eq '2'}width: 49%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '3'}width: 32%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '4'}width: 24%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '5'}width: 19%;{elseif $columnpagefirstlist[colpagelist].gallery_column eq '6'}width: 15.5%;{else}width:49%;{/if}{if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}{if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}">
                                                                           <div class="aspectratioline"></div>
                                                                           <div class="image_container"> <img width="100%" height="200" src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}"> </div>
                                                                           <div class="galleryimageInn"> <a onclick="deleteGalImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images[galimg].gallery_id}','{$images[galimg].gallery_name}');" class="galleryimage"><i class="fa fa-trash-o"></i></a> <a class="galleryimage galleryimagecomm" id="galleryPopup_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showGaleryPopup('galPopup_{$columnpagefirstlist[colpagelist].pagelist}');"><i class="fa fa-plus-square-o"></i></a> </div>
                                                                      </div>
                                                                      {/section}
                                                                      
                                                                      {else}
                                                                      {*
                                                                      <div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'> </div>
                                                                      *}
                                                                      <div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'>
                                                                           <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                      </div>
                                                                      <form  class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
                                                                           <label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                                                           <div class="button">
                                                                                <input type='button' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onclick="showgalleryFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');" />
                                                                           </div>
                                                                           <input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                           </label>
                                                                      </form>
                                                                      {/if} </div>
                                                                 <!--Gallery Image Popup-->
                                                                 <div id="galPopup_{$columnpagefirstlist[colpagelist].pagelist}" style="display:none;" class="galleryimagepop">
                                                                      <form name="galleryPopup_{$columnpagefirstlist[colpagelist].pagelist}" method="post">
                                                                           <div class="leftside"> <i class="fa fa-picture-o"></i>
                                                                                <div class="clr"></div>
                                                                                <a onclick="showgalleryFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');" style="cursor:pointer;">{$LANG.add_image_name}</a> </div>
                                                                           <div class="rightside">
                                                                                <label>{$LANG.add_image_name}</label>
                                                                                <select class="columnOption" name="column_{$columnpagefirstlist[colpagelist].pagelist}" id="column_{$columnpagefirstlist[colpagelist].pagelist}">
                                                                                     <option value="2" {if $columnpagefirstlist[colpagelist].gallery_column eq '2'}selected{/if}>2</option>
                                                                                     <option value="3" {if $columnpagefirstlist[colpagelist].gallery_column eq '3'}selected{/if}>3</option>
                                                                                     <option value="4" {if $columnpagefirstlist[colpagelist].gallery_column eq '4'}selected{/if}>4</option>
                                                                                     <option value="5" {if $columnpagefirstlist[colpagelist].gallery_column eq '5'}selected{/if}>5</option>
                                                                                     <option value="6" {if $columnpagefirstlist[colpagelist].gallery_column eq '6'}selected{/if}>6</option>
                                                                                </select>
                                                                                <label>{$LANG.spacing_name}</label>
                                                                                <select class="imagespacingOption" name="spacing_{$columnpagefirstlist[colpagelist].pagelist}" id="spacing_{$columnpagefirstlist[colpagelist].pagelist}">
                                                                                     <option value="{$LANG.for_none_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
                                                                                     <option value="{$LANG.small_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Small'}selected{/if}>{$LANG.small_name}</option>
                                                                                     <option value="{$LANG.medium_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
                                                                                     <option value="{$LANG.large_name}" {if $columnpagefirstlist[colpagelist].gallery_spacing eq 'Large'}selected{/if}>{$LANG.large_name}</option>
                                                                                </select>
                                                                                <label>{$LANG.border_name}</label>
                                                                                <select class="borderOption" name="border_{$columnpagefirstlist[colpagelist].pagelist}" id="border_{$columnpagefirstlist[colpagelist].pagelist}">
                                                                                     <option value="{$LANG.for_none_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
                                                                                     <option value="{$LANG.thin_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Thin'}selected{/if}>{$LANG.thin_name}</option>
                                                                                     <option value="{$LANG.medium_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
                                                                                     <option value="{$LANG.thick_name}" {if $columnpagefirstlist[colpagelist].gallery_border eq 'Thick'}selected{/if}>{$LANG.thick_name}</option>
                                                                                </select>
                                                                                <!--<label>Cropping</label>
							<select class="widthOption" name="croping_{$columnpagefirstlist[colpagelist].pagelist}" id="croping_{$columnpagefirstlist[colpagelist].pagelist}">
								<option value="None">None</option>
								<option value="Square">Square</option>
								<option value="Rectangle">Rectangle</option>
							</select>-->
                                                                                <div class="clearfix">
                                                                                     <input type="button" class="btn btn-success pull-left" value="Kaydet" onclick="addgalleryProcess('{$columnpagefirstlist[colpagelist].pagelist}');" />
                                                                                     <input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
                                                                                </div>
                                                                           </div>
                                                                      </form>
                                                                 </div>
                                                                 <div id="galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}" class="imagepopupdiv" style="display:none;">
                                                                      <div id="image-chooser-nav">
                                                                           <div id="image-chooser-nav-label">
                                                                                <div>{$LANG.select_image_from}</div>
                                                                           </div>
                                                                           <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                                                                <div class="colWhite"> <span></span> {$LANG.my_computer_name} </div>
                                                                           </div>
                                                                           <div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_{$columnpagefirstlist[colpagelist].pagelist}').hide();$('.loadmask').hide();">X</div>
                                                                      </div>
                                                                      <div id="browsebutton" class="popBrowseInner"> {*
                                                                           <div id='preview'></div>
                                                                           *}
                                                                           <div id='imageloadstatus' style="display:none;">
                                                                                <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                           </div>
                                                                           <form id="galimagephotogal{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both" >
                                                                                <div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
                                                                                <label for="file" class="input input-file no-mar" style="display:block"  name="imageloadbutton" id="imageloadbutton">
                                                                                <div class="button">
                                                                                     <input type="button" class="hei180" multiple value="" onclick="showgalleryFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');" name="photos[]" id="galimgphoto" multiple="">
                                                                                </div>
                                                                                <input type='hidden' name="page_list_id"  value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                                </label>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                                 <div id="masktable" style="display:none;"></div>
                                                                 <!--Gallery Image Popup Ends-->
                                                            </li>
                                                            {/if}
                                                            <!--Gallery Process End-->
                                                            {if $columnpagefirstlist[colpagelist].map}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                           <div class="settingControlBg"><img src="{$SITE_BASEURL}/images/setting.png" alt="" onclick="showMapPopUp('mapframe_{$columnpagefirstlist[colpagelist].pagelist}');"/></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="moveicon"></div>
                                                                 <div class="map_resize">
                                                                      <iframe name="ifrm" id="ifrm{$columnpagefirstlist[colpagelist].pagelist}" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$columnpagefirstlist[colpagelist].map_zoom}&lat={$columnpagefirstlist[colpagelist].map_lat}&lon={$columnpagefirstlist[colpagelist].map_lon}&addr={$columnpagefirstlist[colpagelist].map_addr}&page_list_id={$columnpagefirstlist[colpagelist].pagelist}" width="100%" height="250"></iframe>
                                                                 </div>
                                                                 <div id="mapframe_{$columnpagefirstlist[colpagelist].pagelist}" class="mappop" style="display:none;">
                                                                      <div class="leftside"> <img src="{$SITE_BASEURL}/images/map_marker.png" alt="map image"/>
                                                                           <label>{$LANG.map_name}</label>
                                                                      </div>
                                                                      <div class="rightside">
                                                                           <form name="mapframepopup_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar" method="post">
                                                                                <label>{$LANG.address_name}</label>
                                                                                <input class="mapinputTxt" type="text" name="addr_{$columnpagefirstlist[colpagelist].pagelist}" id="addr_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_addr}">
                                                                                <label>{$LANG.zoom_name}</label>
                                                                                {*
                                                                                <input class="mapinputTxt" type="text" name="zoom_{$columnpagefirstlist[colpagelist].pagelist}" id="zoom_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_zoom}">
                                                                                *}
                                                                                <input class="mapinputTxt" type="number" min="1" max="17" name="zoom_{$columnpagefirstlist[colpagelist].pagelist}" id="zoom_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_zoom}" onkeypress="keypress();">
                                                                                <label>latitude</label>
                                                                                <input class="mapinputTxt" type="text" readonly name="lat_{$columnpagefirstlist[colpagelist].pagelist}" id="lat_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_lat}">
                                                                                <label>longtitude</label>
                                                                                <input class="mapinputTxt" type="text" readonly  name="lon_{$columnpagefirstlist[colpagelist].pagelist}" id="lon_{$columnpagefirstlist[colpagelist].pagelist}" value="{$columnpagefirstlist[colpagelist].map_lon}">
                                                                                <div class="mapButton clearfix">
                                                                                     <input type="button" value="Kaydet" class="btn btn-success pull-left"  onclick="addMapProcess('{$columnpagefirstlist[colpagelist].pagelist}');" />
                                                                                     <input type="button" value="cancel" class="btn btn-danger pull-right mapcancel" />
                                                                                </div>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            <!--slider process start-->
                                                            {if $columnpagefirstlist[colpagelist].slider}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','slider');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="sliImg_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid hoverSlide"> {$objCommon->getSliderImageNew($columnpagefirstlist[colpagelist].pagelist)}
                                                                      <div id="slider_images" class="buildColumnPageSlider" style="{if $slider_images}display:block;{else}display:none;{/if}">
                                                                           <ul class="responsive_slideshow columnslide">
                                                                                {section name="sliimg" loop="$slider_images"}
                                                                                <li class="imageSlider"> <img src="{$SITE_DOMAIN_IMAGES_URL}/{$slider_images[sliimg].slider_images}"/> </li>
                                                                                {/section}
                                                                           </ul>
                                                                           <div class="clr"></div>
                                                                      </div>
                                                                      <div id="sliderform"> {if $slider_images} <a class="ColsliderNoImg2" onclick="return showsliderFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');">Düzenle</a> {/if}
                                                                           {if !$slider_images} <a class="ColsliderNoImg1" onclick="return showsliderFuncForColumn('{$columnpagefirstlist[colpagelist].pagelist}');"></a> {/if} </div>
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            <!--slider process end-->
                                                            <!--Google Adsense Start-->
                                                            {if $columnpagefirstlist[colpagelist].google_adsense}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','google_adsense');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <input type='radio' name="google_ads" id="google_ads_script_{$columnpagefirstlist[colpagelist].pagelist}" class="scriptImgInput" value="script" {if $columnpagefirstlist[colpagelist].google_ads eq 'script'}checked="checked" {/if} onclick="showDivForScript('script_{$columnpagefirstlist[colpagelist].pagelist}','images_{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                 <label class="scriptImg" for="google_ads_script_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showDivForScript('script_{$columnpagefirstlist[colpagelist].pagelist}','images_{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                 <div class="scriptInner">
                                                                      <div class="scriptImage">{$LANG.script_name}</div>
                                                                 </div>
                                                                 </label>
                                                                 <input type='radio' name="google_ads" id="google_ads_image_{$columnpagefirstlist[colpagelist].pagelist}" class="imgaeImgInput" value="image" {if $columnpagefirstlist[colpagelist].google_ads eq 'image'}checked="checked" {/if} onclick="showDivForScript('images_{$columnpagefirstlist[colpagelist].pagelist}','script_{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                 <label class="imgaeImg" for="google_ads_image_{$columnpagefirstlist[colpagelist].pagelist}" onclick="showDivForScript('images_{$columnpagefirstlist[colpagelist].pagelist}','script_{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                 <div class="imageInner">
                                                                      <div class="imageHead">{$LANG.image_name}</div>
                                                                      <div class="imageImage"></div>
                                                                 </div>
                                                                 </label>
                                                                 <div id="script_{$columnpagefirstlist[colpagelist].pagelist}" class="addGoogPop">
                                                                      <div class="leftside"> <i class="fa fa-file-text-o fontSize42"></i>
                                                                           <label>{$LANG.script_name}</label>
                                                                      </div>
                                                                      <div class="rightside">
                                                                           <form name="script_google_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar"  id="script_google_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
                                                                                <label>{$LANG.adress_name}</label>
                                                                                <input type="hidden" name="script" id="script" value="script">
                                                                                <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_{$columnpagefirstlist[colpagelist].pagelist}"   placeholder="Enter your script" >{$columnpagefirstlist[colpagelist].google_script_text}</textarea>
                                                                                <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                                <div class="mapButton clearfix">
                                                                                     <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('{$columnpagefirstlist[colpagelist].pagelist}');">
                                                                                     <input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#script_'+{$columnpagefirstlist[colpagelist].pagelist}).hide();"/>
                                                                                </div>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                                 <!--<div id="script_{$columnpagefirstlist[colpagelist].pagelist}" {if $columnpagefirstlist[colpagelist].google_ads eq 'script'}  style="display:block;"{else}style="display:none;" {/if}>
					<form name="script_google_{$columnpagefirstlist[colpagelist].pagelist}"  id="script_google_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
					<input type="hidden" name="script" id="script" value="script">
					 <textarea name="google_script_text" id="google_script_text_{$columnpagefirstlist[colpagelist].pagelist}" class="google_ansen" placeholder="Enter your script" >{$columnpagefirstlist[colpagelist].google_script_text}</textarea>
					 <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
					 <input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('{$columnpagefirstlist[colpagelist].pagelist}');">
					</form>  
				</div>-->
                                                                 {$objCommon->getImageGoogle($columnpagefirstlist[colpagelist].pagelist)}
                                                                 <div id="images_{$columnpagefirstlist[colpagelist].pagelist}" class="row-fluid" {if $columnpagefirstlist[colpagelist].google_ads eq 'image'}  style="display:block;" {else}style="display:none;" {/if}> {if !$images_google}
                                                                      
                                                                      {*
                                                                      <div id='preview_{$columnpagefirstlist[colpagelist].pagelist}'> </div>
                                                                      *}
                                                                      <div id='imageloadstatus_{$columnpagefirstlist[colpagelist].pagelist}' style='display:none'> <img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>
                                                                      <form id="imageform_{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
                                                                           <label id='imageloadbutton_{$columnpagefirstlist[colpagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                                                           <div class="button">
                                                                                <input type='file' name="photos[]" id="photoimg_{$columnpagefirstlist[colpagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$columnpagefirstlist[colpagelist].pagelist}');"/>
                                                                           </div>
                                                                           <input type='hidden' name="image" id="image" value="image"/>
                                                                           <input type='hidden' name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                           </label>
                                                                      </form>
                                                                      {else}
                                                                      <div class="googAddOption"> <img width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" height="{if $columnpagefirstlist[colpagelist].img_height}{$columnpagefirstlist[colpagelist].img_height}{else}180{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}">
                                                                           <!--<img width="{if $columnpagefirstlist[colpagelist].img_width}{$columnpagefirstlist[colpagelist].img_width}{else}100%{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"> -->
                                                                           <div class="googAddDelete"> <a class="galleryimage" onclick="deletegoogleImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','{$images_google.0.google_image_id }','{$images_google.0.google_image_name}');"> <i class="fa fa-trash-o"></i> </a> </div>
                                                                           <a class="googAddUrl" onclick="showAddUrl('urladd_{$columnpagefirstlist[colpagelist].pagelist}');"> {$LANG.add_url_name}</a> </div>
                                                                      <div id="urladd_{$columnpagefirstlist[colpagelist].pagelist}" class="addGoogPop" style="display:none;">
                                                                           <div class="leftside"> <i class="fa fa-external-link fontSize42"></i>
                                                                                <label>{$LANG.add_url_name}</label>
                                                                           </div>
                                                                           <div class="rightside">
                                                                                <form name="imagetxt_{$columnpagefirstlist[colpagelist].pagelist}" class="no-mar"  id="imagetxt_{$columnpagefirstlist[colpagelist].pagelist}" method="post" action="">
                                                                                     <label>{$LANG.url_name}</label>
                                                                                     <input type="text" name="image_text_{$columnpagefirstlist[colpagelist].pagelist}" id="image_text_{$columnpagefirstlist[colpagelist].pagelist}" class="google_url_text" value="{$images_google.0.google_url}">
                                                                                     <input type='hidden' name="page_list_id" id="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}"/>
                                                                                     <input type='hidden' name="google_image_id" id="google_image_id" value="{$images_google.0.google_image_id}"/>
                                                                                     <div class="mapButton clearfix">
                                                                                          <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('{$columnpagefirstlist[colpagelist].pagelist}','{$images_google.0.google_image_id}');">
                                                                                          <input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#urladd_'+{$columnpagefirstlist[colpagelist].pagelist}).hide();" />
                                                                                     </div>
                                                                                </form>
                                                                           </div>
                                                                      </div>
                                                                      {/if} </div>
                                                            </li>
                                                            {/if}
                                                            <!--Google Adsense End-->
                                                            {if $columnpagefirstlist[colpagelist].file}
                                                            <li id="page_{$columnpagefirstlist[colpagelist].pagelist}" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$columnpagefirstlist[colpagelist].pagelist}','file');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 {$objCommon->getFile_name_build($columnpagefirstlist[colpagelist].pagelist)}
                                                                 <div class="columnbgmask"></div>
													<div id="fileTool" class="width100 block fileTool" style="background:url({$extimg}) no-repeat left top"  onclick="$('#uploadFilePopup{$columnpagefirstlist[colpagelist].pagelist}').show();$('.columnbgmask').show();$('.bgmaskTop,.bgmaskTopLine').show();$('.arrow').addClass('arrowhide');">
                                                                      <div class="filename">{$files.0.original_name}</div>                                                                      
                                                                      <a>{if $files.0.original_name eq ''}Dosya yüklemek için tıklayın{else}Dosyayı İndir{/if}</a> </div>
                                                                 <div id="uploadFilePopup{$columnpagefirstlist[colpagelist].pagelist}" class="all_popup" style="display:none;">
                                                                      <div id="image-chooser-nav">
                                                                           <div id="image-chooser-nav-label">
                                                                                <div>{$LANG.select_files_from}</div>
                                                                           </div>
                                                                           <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                                                                <div class="colWhite"> <span></span> {$LANG.my_computer_name} </div>
                                                                           </div>
                                                                           <div class="close PopCloseButt btn btn-danger" onclick="$('#uploadFilePopup{$columnpagefirstlist[colpagelist].pagelist}').hide();$('.columnbgmask').hide();$('.bgmaskTop,.bgmaskTopLine').hide();$('.arrow').removeClass('arrowhide');">X</div>
                                                                      </div>
                                                                      <div id="browsebutton" class="popBrowseInner">
                                                                           <div id='preview'></div>
                                                                           <div id='imageloadstatuslogo' style="display:none;">
                                                                                <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                                           </div>
                                                                           <form id="fileform{$columnpagefirstlist[colpagelist].pagelist}" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxFileUpload.php' style="clear:both">
                                                                                <input type="hidden" name="page_list_id" value="{$columnpagefirstlist[colpagelist].pagelist}" />
                                                                                <div class="uploadTxtPop">Dosya yüklemek için tıklayın</div>
                                                                                <label for="file_{$columnpagefirstlist[colpagelist].pagelist}" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
                                                                                <div class="button">
                                                                                     <input type="file" id="file_{$columnpagefirstlist[colpagelist].pagelist}" onchange="fileUpload('{$columnpagefirstlist[colpagelist].pagelist}');" name="files" />
                                                                                </div>
                                                                                <input type='hidden' name="status" value="domainlogo"/>
                                                                                </label>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            {/if}
                                                            {/section}
                                                            {else}
                                                            <div class="columnDragTxt">MODÜLLERİ BURAYA SÜRÜKLEYİP BIRAKIN</div>
                                                            {/if}
                                                       </ul>
                                                       <!---column sortable--->
                                                       </div>
                                                       {/section}
													 </div>
                                        </div>
                                   </li>
                              </ul>
                         </li>
                         {/if}
                         <!--</div>-->
                         {if $pagefirstlist[pagelist].title_select}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','title_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildTitle_{$pagefirstlist[pagelist].pagelist}" onblur="updateTitle('buildTitle_{$pagefirstlist[pagelist].pagelist}');" onkeydown="updateTitle('buildTitle_{$pagefirstlist[pagelist].pagelist}');" class="themehead {if $pagefirstlist[pagelist].text_title eq ''}clickheretext contenttext {/if}contentedit main_title" style="{if $pagefirstlist[pagelist].buildTitle_fontsize}font-size:{$pagefirstlist[pagelist].buildTitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildTitle_fontcolor}color:{$pagefirstlist[pagelist].buildTitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_title_font_style}font-family:{$pagefirstlist[pagelist].main_title_font_style};{/if}{if $pagefirstlist[pagelist].main_title_line_size}line-height:{$pagefirstlist[pagelist].main_title_line_size}px;{/if}" contenteditable="true"  data-ph="Başlığı Düzenle" >{if $pagefirstlist[pagelist].text_title}{$pagefirstlist[pagelist].text_title}{/if}</div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].description_select}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','description_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildPara_{$pagefirstlist[pagelist].pagelist}" class="{if $pagefirstlist[pagelist].text_description eq ''}clickheretext contenttext {/if}contentedit main_paragraph" style="{if $pagefirstlist[pagelist].buildPara_fontsize}font-size:{$pagefirstlist[pagelist].buildPara_fontsize}px;{/if}{if $pagefirstlist[pagelist].buildPara_fontcolor}color:{$pagefirstlist[pagelist].buildPara_fontcolor}{/if}{if $pagefirstlist[pagelist].main_paragraph_font_style}font-family:{$pagefirstlist[pagelist].main_paragraph_font_style};{/if}{if $pagefirstlist[pagelist].main_paragraph_line_size}line-height:{$pagefirstlist[pagelist].main_paragraph_line_size}px;{/if}" onblur="updateDesc('buildPara_{$pagefirstlist[pagelist].pagelist}');" onkeydown="updateDesc('buildPara_{$pagefirstlist[pagelist].pagelist}');" contenteditable="true"  data-ph="Paragrafı Düzenle" >{if $pagefirstlist[pagelist].text_description}{$pagefirstlist[pagelist].text_description|stripslashes}{/if}</div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].divider}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','divider');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildDivide" class="">
                                   <hr />
                              </div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].image_multiple_select}
                         {$objCommon->getImageText($pagefirstlist[pagelist].pagelist,'singletext')}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildImgTxt_{$pagefirstlist[pagelist].pagelist}" class="buildImgTxtOuter">
                                   <div class="row-fluid ">
                                        <div class="pull-left marginRight15 buildImgTxt {if !$images}minimagewidth{/if}"> {if !$images}	
                                             {*
                                             <div id='preview_{$pagefirstlist[pagelist].pagelist}'> </div>
                                             *}
                                             <div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
                                                  <div class="laodImgChange"> <img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/> </div>
                                             </div>
                                             <form  method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
                                                  <label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                                  <div class="button">
                                                       <input type='button' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onclick="showImageTxtPopup('{$pagefirstlist[pagelist].pagelist}');"/>
                                                  </div>
                                                  <input type='hidden' name="status" value="singletext"/>
                                                  <input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                                  </label>
                                             </form>
                                             <!--<div class="hideupload">
<div id="mulitplefileuploader_{$pagefirstlist[pagelist].pagelist}">Upload</div>
<img width="93%" height="180" class="uploadedImg" id="image_{$pagefirstlist[pagelist].pagelist}" src="" />																			<div id="progressbar">0 %</div>
</div>-->
                                             {else}
                                             <div class="uploadImgBg"> 
											 	<img class="imagechangeNew" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{/if}" src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" onclick="showImageTxtPopup('{$pagefirstlist[pagelist].pagelist}');">
												 {*
                                                  <div id='preview_{$pagefirstlist[pagelist].pagelist}'> </div>
                                                  *}
                                                  <div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
                                                       <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                                  </div>
                                                  <form  method="post" class="form-horizontal sky-form uploadsecbg" style="display:none;" enctype="multipart/form-data" action='ajaxImageUpload.php'>
                                                  <label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block" for="file">
                                                  <div class="button">
                                                       <input type='button' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onclick="showImageTxtPopup('{$pagefirstlist[pagelist].pagelist}');"/>
                                                  </div>
                                                  <input type='hidden' name="status" value="singletext"/>
                                                  <input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                                  </label>
                                                  </form>
                                             </div>
                                             {/if} </div>
                                        <div class="span9">
                                             <div id="imgtitle_{$pagefirstlist[pagelist].pagelist}" onblur="updateImgTitle('imgtitle_{$pagefirstlist[pagelist].pagelist}');" onkeydown="updateImgTitle('imgtitle_{$pagefirstlist[pagelist].pagelist}');" class="themehead borNone {if $pagefirstlist[pagelist].image_text eq ''}clickheretext contenttext {/if}contentedit main_imagetitle" style="{if $pagefirstlist[pagelist].imgtitle_fontsize}font-size:{$pagefirstlist[pagelist].imgtitle_fontsize}px;{/if}{if $pagefirstlist[pagelist].imgtitle_fontcolor}color:{$pagefirstlist[pagelist].imgtitle_fontcolor}{/if}{if $pagefirstlist[pagelist].main_imagetitle_font_style}font-family:{$pagefirstlist[pagelist].main_imagetitle_font_style};{/if}{if $pagefirstlist[pagelist].main_imagetitle_line_size}line-height:{$pagefirstlist[pagelist].main_imagetitle_line_size}px;{/if}{if $pagefirstlist[pagelist].main_imagetitle_font_size}font-size:{$pagefirstlist[pagelist].main_imagetitle_font_size}px;{/if}" contenteditable="true" data-ph="Resim Seç ve Metni Düzenle" >{if $pagefirstlist[pagelist].image_text}{$pagefirstlist[pagelist].image_text}{/if}</div>
                                        </div>
                                   </div>
                              </div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].image_select}
                         {$objCommon->getImage($pagefirstlist[pagelist].pagelist)}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="settingControl">
                                     <div class="settingControlBg" onclick="$('#imagealignPopup_{$pagefirstlist[pagelist].pagelist}').show();$('#loadmask').show();" ><img src="http://www.enkolayweb.com/images/setting.png" /></div>
                                  </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','image_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildImg_{$pagefirstlist[pagelist].pagelist}" class="row-fluid buildimage" title="{$pagefirstlist[pagelist].pagelist}" style="">
                              {if !$images}
                              <div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
                                   <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                              </div>
                              <form {*id="imageform_{$pagefirstlist[pagelist].pagelist}"*} class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
                                   <label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                   <div class="button">
                                        <input type='button' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onclick="showSinglePopup('{$pagefirstlist[pagelist].pagelist}');"/>
                                   </div>
                                   <input type='hidden' name="status" value="single"/>
                                   <input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                   </label>
                              </form>
                              <input type="hidden" name="imagesuploadNumbers" id="{$pagefirstlist[pagelist].pagelist}"/>
                              <!--<div class="hideupload">
<div id="mulitplefileuploader_{$pagefirstlist[pagelist].pagelist}">Upload</div>
<img width="93%" height="180" class="uploadedImg" id="image_{$pagefirstlist[pagelist].pagelist}" src="" />
<div id="progressbar">0 %</div>

</div>-->
                              {else}
                              {$objCommon->getImageAlign($pagefirstlist[pagelist].pagelist)}
                              <div class="uploadImgBg" id="alignto{$pagefirstlist[pagelist].pagelist}" style="text-align:{$alignment}"> 
							<a><img class="imagechange"  src="{$SITE_DOMAIN_IMAGES_URL}/{$images}" width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{/if}" onclick="showSinglePopup('{$pagefirstlist[pagelist].pagelist}');"/></a> 
                                   <div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
                                        <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                   </div>
                                   <form class="clr form-horizontal sky-form uploadsecbg" style="display:none;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
								<label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block" for="file">
								<div class="button">
									<input type='button' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile"/>
								</div>
								<input type='hidden' name="status" value="single"/>
								<input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
								</label>
                                   </form>
                              </div>
						
                              {/if}
						</div>
                              <div class="imagealignPopup" id="imagealignPopup_{$pagefirstlist[pagelist].pagelist}" style="display:none;">
                                   <div class="youtubepopclose" onclick="$(this).parent().hide();" ></div>
                                   <div class="contactlabelsPopupRight">
                                        <div class="contactlabelsPopupRightInner">
                                             <label class="span5 right">Hizalama</label>
                                             <select id="imgalign{$pagefirstlist[pagelist].pagelist}" class="alignOption span6" onchange="alignmentImage('alignto{$pagefirstlist[pagelist].pagelist}',this);">
                                                  <option {if $pagefirstlist[pagelist].single_img_alignment	eq 'left'}selected="selected"{/if} value="left">sol</option>
                                                  <option {if $pagefirstlist[pagelist].single_img_alignment	eq 'center'}selected="selected"{/if}value="center">merkez</option>
                                                  <option {if $pagefirstlist[pagelist].single_img_alignment	eq 'right'}selected="selected"{/if}value="right">sağ</option>
                                             </select>
                                        </div>
                                        <div class="center">
                                             <input type="button" onclick="updatealign_image('{$pagefirstlist[pagelist].pagelist}')" value="Kaydet" class="videosubmit"/>
                                        </div>
                                   </div>
                              </div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].contact_form}
                         {$objCommon->getAllContactDetails($pagefirstlist[pagelist].pagelist)}
                         {$objCommon->getContactFormFields($smarty.session.domain_id,$pagefirstlist[pagelist].pagelist)}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','contact_form');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="" class="contactform clearfix">
                                   <!--<div  onclick="showContactMail();">
Form Entries
</div>-->
                                   <a data-toggle="modal" href="#ModalFormEntry_{$pagefirstlist[pagelist].pagelist}" class="btn btn-warning pull-right">Form Girişleri</a> <a onclick="ShowContactForm_fieldspopup('{$pagefirstlist[pagelist].pagelist}');" class="btn btn-success">Özel Alan Ekle</a>
                                   <div class="themeheadsec contentedit {if $contactlist.0.title_head eq ''}clickheretext contenttext {/if}contactTxt contactHead" style="{if $contactlist.0.buildContact_fontsize}font-size:{$contactlist.0.buildContact_fontsize}px;{/if}{if $contactlist.0.buildContact_fontcolor}color:{$contactlist.0.buildContact_fontcolor}{/if}{if $contactlist.0.buildContact_font_style}font-family:{$contactlist.0.buildContact_font_style};{/if}{if $contactlist.0.buildContact_line_size}line-height:{$contactlist.0.buildContact_line_size}px;{/if}{if $contactlist.0.buildContact_font_size}font-size:{$contactlist.0.buildContact_font_size}px;{/if}" id="buildContact_{$contactlist.0.id}" onblur="updateContactFormTitle('buildContact_{$contactlist.0.id}'); 55555" onkeydown="updateContactFormTitle('buildContact_{$contactlist.0.id}');" data-ph="Başlığı Düzenle">{if $contactlist.0.title_head}{$contactlist.0.title_head}{/if}</div>
                                   <div class="row-fluid">
                                        <div class="span4 relatepop">
                                             <div class="span12 contactLisNav"><span onclick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">{$contactlist.0.text1}</span>{if $contactlist.0.text1_required}<span class="red">*</span>{/if}</div>
                                             <input type="text" value="" placeholder="Ad" class="contacttxtbx" style="{if $contactlist.0.text1_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text1_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text1_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text1_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text1_width eq 'Small'}width:50%;{elseif $contactlist.0.text1_width eq 'Medium'}width:70%;{elseif $contactlist.0.text1_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','1');">
                                             {if $contactlist.0.text1_instruction}<span class="instruction-right left">{$contactlist.0.text1_instruction}</span>{/if} </div>
                                        <div class="span4 relatepop">
                                             <div class="span12 contactLisNav"><span onclick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">{$contactlist.0.text2}</span> {if $contactlist.0.text2_required}<span class="red">*</span>{/if}</div>
                                             <input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="{if $contactlist.0.text2_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text2_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text2_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text2_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text2_width eq 'Small'}width:50%;{elseif $contactlist.0.text2_width eq 'Medium'}width:70%;{elseif $contactlist.0.text2_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','2');">
                                             {if $contactlist.0.text2_instruction}<span class="instruction-right left">{$contactlist.0.text2_instruction}</span>{/if} </div>
                                   </div>
                                   <div class="span4 offset0 marTop10 relatepop clr">
                                        <div class="span12 contactLisNav"><span onclick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">{$contactlist.0.text3}</span> {if $contactlist.0.text3_required}<span class="red">*</span>{/if}</div>
                                        <input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="{if $contactlist.0.text3_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text3_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text3_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text3_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text3_width eq 'Small'}width:50%;{elseif $contactlist.0.text3_width eq 'Medium'}width:70%;{elseif $contactlist.0.text3_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','3');">
                                        {if $contactlist.0.text3_instruction}<span class="instruction-right left">{$contactlist.0.text3_instruction}</span>{/if} </div>
                                   <div class="span4 offset0 marTop10 relatepop clr">
                                        <div class="span12 contactLisNav"><span onclick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');">{$contactlist.0.text4}</span>{if $contactlist.0.text4_required}<span class="red">*</span>{/if}</div>
                                        <textarea class="contacttxtarea" style="{if $contactlist.0.text4_spacing eq 'None'}margin:0px;{elseif $contactlist.0.text4_spacing eq 'Small'}margin:5px 0px;{elseif $contactlist.0.text4_spacing eq 'Medium'}margin:10px 0px;{elseif $contactlist.0.text4_spacing eq 'Large'}margin:15px 0px;{/if}{if $contactlist.0.text4_width eq 'Small'}width:50%;{elseif $contactlist.0.text4_width eq 'Medium'}width:70%;{elseif $contactlist.0.text4_width eq 'Large'}width:100%;{/if}" onClick="showPopup('{$contactlist.0.page_id}','{$contactlist.0.page_list_id}','{$contactlist.0.domain_id}','4');"></textarea>
                                        {if $contactlist.0.text4_instruction}<span class="instruction-right left">{$contactlist.0.text4_instruction}</span>{/if} </div>
                                   {include file="contactform_fields.tpl"}
                                   <div class="span4 offset0 marTop10 relatepop clr">
                                        <div class="buildPagePostButtonLeft">
                                             <input type="submit" value="Gönder" class="buildPagePostButton">
                                        </div>
                                   </div>
                              </div>
                              {*
                              <div id="showMailContact" style="display:none;"> {$objCommon->getEmai($pagefirstlist.0.domain_id,$pagefirstlist.0.page_id)}
                                   <form name="conatctmail" method="post">
                                        <input type="text" name="contactmail" id="contactmail" value="{$mailid}" >
                                        <input type="button" name="submit" value="Gönder" onclick="changeMail();">
                                   </form>
                              </div>
                              *}
                              <div id="modals">
                                   <div id="ModalFormEntry_{$pagefirstlist[pagelist].pagelist}" class="modal hide contact_form_show">
                                        <div class="formEntryPopForm clearfix">
                                             <div class="preview_image">Form Girişleri</div>
                                             <div id="errtext"></div>
                                             {$objCommon->getEmai($pagefirstlist[pagelist].pagelist)}
                                             <form class="clearfix" name="conatctmail_{$pagefirstlist[pagelist].pagelist}" method="post" class="no-mar">
                                                  <div id="errtext"></div>
                                                  <input type="text" name="contactmail" id="contactmail_{$pagefirstlist[pagelist].pagelist}" value="{$mailid}" >
                                                  <button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
                                                  <input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('{$pagefirstlist[pagelist].pagelist}');">
                                             </form>
                                             
                                        </div>
                                   </div>
                              </div>
                              <div id="contactForm"></div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].social_plugins}
                         {$objCommon->getSocialDetails($pagefirstlist[pagelist].pagelist)}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="settingControl">
                                     <div onclick="showSocialPopup({$pagefirstlist[pagelist].pagelist});" class="settingControlBg"><img src="http://www.enkolayweb.com/images/setting.png"></div>
                                  </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div class="moveicon"></div>
                              <div id="buildSocial_{$pagefirstlist[pagelist].pagelist}" class="buildSocialIcon" style="text-align:{$pagefirstlist[pagelist].social_plugin_alignment}" >
                                   <input type="button" class="fbicon" value="" />
                                   <input type="button" class="twittericon" value="" />
                                   <input type="button" class="linkedicon" value="" />
                                   <input type="button" class="mailicon" value="" />
                              </div>
                              <div id="pluginShow_{$pagefirstlist[pagelist].pagelist}" class="galleryimagepop socialPop" style="display:none;">
                                   <div class="leftside"> <i class="fa fa-users fontSize42"></i>
                                        <label>{$LANG.social_link_name}</label>
                                   </div>
                                   <div class="rightside">
                                        <form class="no-mar" id="socialplugin_{$pagefirstlist[pagelist].pagelist}" name="socialplugin" method="post">
                                             <input type="hidden" name="domain_id" id="domain_id_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].domain_id}">
                                             <input type="hidden" name="page_id" id="page_id_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].page_id}">
                                             <input type="hidden" name="page_list_id" id="page_list_id_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].pagelist}">
                                             <div class="socialInn clearfix"> <span><i class="fa fa-facebook"></i></span>
                                                  <input type="text" name="fb" value="{$socialpagelist.0.fb}" id="fb_{$pagefirstlist[pagelist].pagelist}" placeholder="http://facebook.com/ornek">
                                             </div>
                                             <div class="socialInn clearfix"> <span><i class="fa fa fa-tumblr"></i></span>
                                                  <input type="text" name="tw" value="{$socialpagelist.0.twitter}" id="tw_{$pagefirstlist[pagelist].pagelist}" placeholder="http://twitter.com/ornek">
                                             </div>
                                             <div class="socialInn clearfix"> <span><i class="fa fa-linkedin"></i></span>
                                                  <input type="text" name="ln" value="{$socialpagelist.0.linkedin}" id="ln_{$pagefirstlist[pagelist].pagelist}" placeholder="http://linkedin.com/in/ornek">
                                             </div>
                                             <div class="socialInn clearfix"> <span><i class="fa fa fa-envelope-o"></i></span>
                                                  <input type="text" name="mail" value="{$socialpagelist.0.mail}" id="mail_{$pagefirstlist[pagelist].pagelist}" placeholder="ornek@ornek.com">
                                             </div>
                                             <label>Hizalama</label>
                                             <select id="socialalign{$pagefirstlist[pagelist].pagelist}" class="socialignOption" onchange="socialaligns('{$pagefirstlist[pagelist].pagelist}')">
                                                  <option {if $pagefirstlist[pagelist].social_plugin_alignment eq 'left'}selected="selected"{/if} value="left">sol</option>
                                                  <option {if $pagefirstlist[pagelist].social_plugin_alignment eq 'center'}selected="selected"{/if}value="center">merkez</option>
                                                  <option {if $pagefirstlist[pagelist].social_plugin_alignment eq 'right'}selected="selected"{/if}value="right">sağ</option>
                                             </select>
                                             <div class="mapButton clearfix">
                                                  <input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('{$pagefirstlist[pagelist].pagelist}');">
                                                  <input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_{$pagefirstlist[pagelist].pagelist}').hide();">
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].youtube_video}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');"></div>
                                   </div>
                                   <div class="settingControl">
                                        <div class="settingControlBg"><img src="{$SITE_BASEURL}/images/setting.png" alt=""  onclick="showVideoPopup('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');"/></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','youtube_video');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              {$objCommon->getYoutubeDetails_buildpage($pagefirstlist[pagelist].pagelist)}
                              <div class="youtubeDiv clearfix" id="youtubeDiv_{$pagefirstlist[pagelist].pagelist}" onclick="showVideoPopup('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');" style="display:block;{if $youtubelist.0.youtube_spacing eq 'None'}margin:0px;{elseif $youtubelist.0.youtube_spacing eq 'Small'}margin:5px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Medium'}margin:10px 0px;{elseif $youtubelist.0.youtube_spacing eq 'Large'}margin:15px 0px;{/if}{if $youtubelist.0.youtube_width eq 'Small'}width:50%; height:250px; margin-left:auto; margin-right:auto;{elseif $youtubelist.0.youtube_width eq 'Medium'}width:70%;{elseif $youtubelist.0.youtube_width eq 'Large'}width:100%;{/if}">
                                   <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="{if $youtubelist.0.youtube_url neq ''}{$youtubelist.0.youtube_url}{else}{$SITE_BASEURL}/images/youtubeLogo.png{/if}" width="100%" height="200"></iframe>
                              </div>
                              <div class="galleryimagepop youtubelabelsPopup" id="youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}" style="display:none;">
                                   <div class="youtubepopclose 7" onclick="popcloseforutubeurl('youtubelabelsPopup_{$pagefirstlist[pagelist].pagelist}');"></div>
                                   <form name="youtubefrm_{$pagefirstlist[pagelist].pagelist}" method="post">
                                        <div id="error_{$pagefirstlist[pagelist].pagelist}"></div>
                                        <div class="contactlabelsPopupLeft">
                                             <label>Youtube Video Adresi</label>
                                             <input type="text" class="videoUrl" name="videourl_{$pagefirstlist[pagelist].pagelist}" id="videourl_{$pagefirstlist[pagelist].pagelist}" value="{$youtubelist.0.youtube_url}"/>
                                        </div>
                                        <div class="contactlabelsPopupRight">
                                             <div class="contactlabelsPopupRightInner">
                                                  <label>{$LANG.spacing_name}</label>
                                                  <select class="spacingOption" name="spacing" id="spacing_{$pagefirstlist[pagelist].pagelist}">
                                                       <option value="{$LANG.for_none_name}" {if $youtubelist.0.youtube_spacing eq 'None'}selected="selected"{/if}>{$LANG.for_none_name}</option>
                                                       <option value="{$LANG.small_name}" {if $youtubelist.0.youtube_spacing eq 'Small'}selected="selected"{/if}>{$LANG.small_name}</option>
                                                       <option value="{$LANG.medium_name}" {if $youtubelist.0.youtube_spacing eq 'Medium'}selected="selected"{/if}>{$LANG.medium_name}</option>
                                                       <option value="{$LANG.large_name}" {if $youtubelist.0.youtube_spacing eq 'Large'}selected="selected"{/if}>{$LANG.large_name}</option>
                                                  </select>
                                                  <label>Genişlik</label>
                                                  <select class="widthOption" name="width_{$pagefirstlist[pagelist].pagelist}" id="width_{$pagefirstlist[pagelist].pagelist}">
                                                       <option value="Küçük" {if $youtubelist.0.youtube_width eq 'Small'}selected="selected"{/if}>Küçük</option>
                                                       <option value="Orta" {if $youtubelist.0.youtube_width eq 'Medium'}selected="selected"{/if}>Orta</option>
                                                       <option value="Büyük" {if $youtubelist.0.youtube_width eq 'Large'}selected="selected"{/if}>Büyük</option>
                                                  </select>
                                             </div>
                                             <div>
                                                  <input type="button" value="Kaydet" class="videosubmit"  onclick="addYoutubeUrl('{$pagefirstlist[pagelist].pagelist}');" />
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </li>
                         {/if}
                         <!--Gallery Process Start-->
                         {if $pagefirstlist[pagelist].gallery}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','gallery');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="galImg_{$pagefirstlist[pagelist].pagelist}" class="row-fluid center gallery_wrapper"> {$objCommon->getGalleryImage($smarty.session.domain_id,$smarty.session.page_id,$pagefirstlist[pagelist].pagelist)}
                                   {if $images}
                                   {section name="galimg" loop="$images"}
                                   <div class="imageGallery" id="imageGallery{$images[galimg].gallery_id}" style="{if $pagefirstlist[pagelist].gallery_column eq '2'}width: 49.95%; min-height:299px;max-height:299px;{elseif $pagefirstlist[pagelist].gallery_column eq '3'}width: 33.28%;min-height:199px;max-height:199px;{elseif $pagefirstlist[pagelist].gallery_column eq '4'}width: 24.95%;min-height:150px;max-height:150px;{elseif $pagefirstlist[pagelist].gallery_column eq '5'}width: 19.95%;min-height:120px;max-height:120px;{elseif $pagefirstlist[pagelist].gallery_column eq '6'}width: 16.62%;min-height:100px;max-height:100px;{else}width:49.95%;min-height:299px;max-height:299px;{/if}{if $pagefirstlist[pagelist].gallery_spacing eq 'None'}margin: 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Small'}margin: 5px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}margin: 10px 0px;{elseif $pagefirstlist[pagelist].gallery_spacing eq 'Large'}margin: 15px 0px;{else}margin: 0px;{/if}" onclick="showGaleryPopup('galPopup_{$pagefirstlist[pagelist].pagelist}');">
                                        <div class="aspectratioline"></div>
                                        <div class="image_container"> <img src="{$SITE_DOMAIN_IMAGES_URL}/{$images[galimg].gallery_name_thumb}" style="{if $pagefirstlist[pagelist].gallery_border eq 'None'}border: 0px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thin'}border: 2px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Medium'}border: 3px solid rgb(221, 221, 221);{elseif $pagefirstlist[pagelist].gallery_border eq 'Thick'}border: 4px solid rgb(221, 221, 221);{else}border: 0px solid rgb(221, 221, 221);{/if}"> </div>
                                        <div class="galleryimageInn"> <a onclick="deleteGalImg('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','{$images[galimg].gallery_id}','{$images[galimg].gallery_name}');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                             <!--<a class="galleryimage galleryimagecomm" id="galleryPopup_{$pagefirstlist[pagelist].pagelist}" onclick="showGaleryPopup('galPopup_{$pagefirstlist[pagelist].pagelist}');"><i class="fa fa-plus-square-o"></i></a>-->
                                        </div>
                                   </div>
                                   {/section}
                                   
                                   {else}
                                   {*
                                   <div id='preview_{$pagefirstlist[pagelist].pagelist}'> </div>
                                   *}
                                   <div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'>
                                        <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                   </div>
                                   <form class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
                                        <label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                        <div class="button">
                                             <input type='button'  id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onclick="showgalleryFunc('{$pagefirstlist[pagelist].pagelist}');" multiple/>
                                        </div>
                                        <input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                        </label>
                                   </form>
                                   {/if} </div>
                              <!--Gallery Image Popup-->
                              <div id="galPopup_{$pagefirstlist[pagelist].pagelist}" style="display:none;" class="galleryimagepop">
                                   <form name="galleryPopup_{$pagefirstlist[pagelist].pagelist}" method="post">
                                        <div class="leftside"> <i class="fa fa-picture-o"></i>
                                             <div class="clr"></div>
                                             <!--<a onclick="$('#galimgpopup_'+{$pagefirstlist[pagelist].pagelist}).show();$('.loadmask').show();">{$LANG.image_add_change}</a>-->
                                             <a onclick="showgalleryFunc('{$pagefirstlist[pagelist].pagelist}').show();$('.loadmask').show();">Add / Edit Images</a> </div>
                                        <div class="rightside">
                                             <label>{$LANG.add_image_name}</label>
                                             <select class="columnOption" name="column_{$pagefirstlist[pagelist].pagelist}" id="column_{$pagefirstlist[pagelist].pagelist}">
                                                  <option value="2" {if $pagefirstlist[pagelist].gallery_column eq '2'}selected{/if}>2</option>
                                                  <option value="3" {if $pagefirstlist[pagelist].gallery_column eq '3'}selected{/if}>3</option>
                                                  <option value="4" {if $pagefirstlist[pagelist].gallery_column eq '4'}selected{/if}>4</option>
                                                  <option value="5" {if $pagefirstlist[pagelist].gallery_column eq '5'}selected{/if}>5</option>
                                                  <option value="6" {if $pagefirstlist[pagelist].gallery_column eq '6'}selected{/if}>6</option>
                                             </select>
                                             <label>{$LANG.spacing_name}</label>
                                             <select class="imagespacingOption" name="spacing_{$pagefirstlist[pagelist].pagelist}" id="spacing_{$pagefirstlist[pagelist].pagelist}">
                                                  <option value="{$LANG.for_none_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
                                                  <option value="{$LANG.small_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'Small'}selected{/if}>{$LANG.small_name}</option>
                                                  <option value="{$LANG.medium_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
                                                  <option value="{$LANG.large_name}" {if $pagefirstlist[pagelist].gallery_spacing eq 'Large'}selected{/if}>{$LANG.large_name}</option>
                                             </select>
                                             <label>{$LANG.border_name}</label>
                                             <select class="borderOption" name="border_{$pagefirstlist[pagelist].pagelist}" id="border_{$pagefirstlist[pagelist].pagelist}">
                                                  <option value="{$LANG.for_none_name}" {if $pagefirstlist[pagelist].gallery_border eq 'None'}selected{/if}>{$LANG.for_none_name}</option>
                                                  <option value="{$LANG.thin_name}" {if $pagefirstlist[pagelist].gallery_border eq 'Thin'}selected{/if}>{$LANG.thin_name}</option>
                                                  <option value="{$LANG.medium_name}" {if $pagefirstlist[pagelist].gallery_border eq 'Medium'}selected{/if}>{$LANG.medium_name}</option>
                                                  <option value="{$LANG.thick_name}" {if $pagefirstlist[pagelist].gallery_border eq 'Thick'}selected{/if}>{$LANG.thick_name}</option>
                                             </select>
                                             <!--<label>Cropping</label>
<select class="widthOption" name="croping_{$pagefirstlist[pagelist].pagelist}" id="croping_{$pagefirstlist[pagelist].pagelist}">
<option value="None">None</option>
<option value="Square">Square</option>
<option value="Rectangle">Rectangle</option>
</select>-->
                                             <div class="clearfix">
                                                  <input type="button" class="btn btn-success pull-left" value="Kaydet" onclick="addgalleryProcess('{$pagefirstlist[pagelist].pagelist}');" />
                                                  <input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div id="modals">
                                   <div id="galimgpopup_{$pagefirstlist[pagelist].pagelist}" class="all_popup" style="display:none;">
                                        <div id="image-chooser-nav">
                                             <div id="image-chooser-nav-label">
                                                  <div>{$LANG.select_image_from}</div>
                                             </div>
                                             <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                                  <div class="colWhite"> <span></span> {$LANG.my_computer_name} </div>
                                             </div>
                                             <div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_'+{$pagefirstlist[pagelist].pagelist}).hide();$('.loadmask').hide();">X</div>
                                        </div>
                                        <div id="browsebutton" class="popBrowseInner"> {*
                                             <div id='preview'></div>
                                             *}
                                             <div id='imageloadstatus' style="display:none;">
                                                  <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                             </div>
                                             <form id="galimagephotogal{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
                                                  <div class="uploadTxtPop">{$LANG.click_here_to_upload}</div>
                                                  <label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
                                                  <div class="button">
                                                       <input type="file" class="hei180" value="" multiple onchange="galimagupdate('{$pagefirstlist[pagelist].pagelist}')" name="photos[]" id="galimgphoto">
                                                  </div>
                                                  <input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                                  </label>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <!--Gallery Image Popup Ends-->
                         </li>
                         {/if}
                         <!--Gallery Process End-->
                         {if $pagefirstlist[pagelist].map}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="settingControl">
                                        <div class="settingControlBg"><img src="{$SITE_BASEURL}/images/setting.png" alt="" onclick="showMapPopUp('mapframe_{$pagefirstlist[pagelist].pagelist}');"/></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div class="moveicon"></div>
                              <div class="map_resize">
                                   <iframe  name="ifrm" id="ifrm{$pagefirstlist[pagelist].pagelist}" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom={$pagefirstlist[pagelist].map_zoom}&lat={$pagefirstlist[pagelist].map_lat}&lon={$pagefirstlist[pagelist].map_lon}&addr={$pagefirstlist[pagelist].map_addr}&page_list_id={$pagefirstlist[pagelist].pagelist}" width="100%" height="250"></iframe>
                              </div>
                              <div id="mapframe_{$pagefirstlist[pagelist].pagelist}" class="mappop" style="display:none;">
                                   <div class="leftside"> <img src="{$SITE_BASEURL}/images/map_marker.png" alt="map image"/>
                                        <label>{$LANG.map_name}</label>
                                   </div>
                                   <div class="rightside">
                                        <form name="mapframepopup_{$pagefirstlist[pagelist].pagelist}" class="no-mar" method="post">
                                             <label>{$LANG.address_name}</label>
                                             <input class="mapinputTxt" type="text" name="addr_{$pagefirstlist[pagelist].pagelist}" id="addr_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_addr}">
                                             <label>{$LANG.zoom_name}</label>
                                             {*
                                             <input class="mapinputTxt" type="text" name="zoom_{$pagefirstlist[pagelist].pagelist}" id="zoom_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_zoom}">
                                             *}
                                             <input class="mapinputTxt" type="number" min="1" max="17" name="zoom_{$pagefirstlist[pagelist].pagelist}" id="zoom_{$pagefirstlist[pagelist].pagelist}"  value="{$pagefirstlist[pagelist].map_zoom}" onKeyPress="keypress(event);">
                                             <label>Enlem</label>
                                             <input class="mapinputTxt" type="text" readonly  name="lat_{$pagefirstlist[pagelist].pagelist}" id="lat_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_lat}">
                                             <label>Boylam</label>
                                             <input class="mapinputTxt" type="text" readonly  name="lon_{$pagefirstlist[pagelist].pagelist}" id="lon_{$pagefirstlist[pagelist].pagelist}" value="{$pagefirstlist[pagelist].map_lon}">
                                             <div class="mapButton clearfix">
                                                  <input type="button" value="Kaydet" class="btn btn-success pull-left"  onclick="addMapProcess('{$pagefirstlist[pagelist].pagelist}');" />
                                                  <input type="button" value="Vazgeç" class="btn btn-danger pull-right mapcancel" />
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </li>
                         {/if}
                         <!--slider process start-->
                         {if $pagefirstlist[pagelist].slider}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','slider');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="sliImg_{$pagefirstlist[pagelist].pagelist}" class="row-fluid hoverSlide"> {$objCommon->getSliderImageNew($pagefirstlist[pagelist].pagelist)}
                                   <div id="slider_images" class="buildPageSlider" style="{if $slider_images}display:block;{else}display:none;{/if}">
                                        <ul class="responsive_slideshow nivoSliderImg">
                                             {section name="sliimg" loop="$slider_images"}
                                             <li class="imageSlider"> <img src="{$SITE_DOMAIN_IMAGES_URL}/{$slider_images[sliimg].slider_images}"/> </li>
                                             {/section}
                                        </ul>
                                        <div class="clr"></div>
                                   </div>
                                   <div id="sliderform"> {if $slider_images} <a class="sliderNoImg2" onclick="return showsliderFunc('{$pagefirstlist[pagelist].pagelist}');">Düzenle</a> {/if}
                                        {if !$slider_images} <a class="sliderNoImg1" onclick="return showsliderFunc('{$pagefirstlist[pagelist].pagelist}');"></a> {/if} </div>
                              </div>
                         </li>
                         {/if}
                         <!--slider process end-->
                         <!--Google Adsense Start-->
                         {if $pagefirstlist[pagelist].google_adsense}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','google_adsense');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <input type='radio' name="google_ads" id="google_ads_script_{$pagefirstlist[pagelist].pagelist}" class="scriptImgInput" value="script" {if $pagefirstlist[pagelist].google_ads eq 'script'}checked="checked" {/if} onclick="showDivForScript('script_{$pagefirstlist[pagelist].pagelist}','images_{$pagefirstlist[pagelist].pagelist}');">
                              <label class="scriptImg" for="google_ads_script_{$pagefirstlist[pagelist].pagelist}" onclick="showDivForScript('script_{$pagefirstlist[pagelist].pagelist}','images_{$pagefirstlist[pagelist].pagelist}');">
                              <div class="scriptInner">
                                   <div class="scriptImage">{$LANG.script_name}</div>
                              </div>
                              </label>
                              <input type='radio' name="google_ads" id="google_ads_image_{$pagefirstlist[pagelist].pagelist}" class="imgaeImgInput" value="image" {if $pagefirstlist[pagelist].google_ads eq 'image'}checked="checked" {/if} onclick="showDivForScript('images_{$pagefirstlist[pagelist].pagelist}','script_{$pagefirstlist[pagelist].pagelist}');">
                              <label class="imgaeImg" for="google_ads_image_{$pagefirstlist[pagelist].pagelist}" onclick="showDivForScript('images_{$pagefirstlist[pagelist].pagelist}','script_{$pagefirstlist[pagelist].pagelist}');">
                              <div class="imageInner">
                                   <div class="imageHead">{$LANG.image_name}</div>
                                   <div class="imageImage"></div>
                              </div>
                              </label>
                              <div id="script_{$pagefirstlist[pagelist].pagelist}" class="addGoogPop">
                                   <div class="leftside"> <i class="fa fa-file-text-o fontSize42"></i>
                                        <label>{$LANG.script_name}</label>
                                   </div>
                                   <div class="rightside">
                                        <form name="script_google_{$pagefirstlist[pagelist].pagelist}" class="no-mar"  id="script_google_{$pagefirstlist[pagelist].pagelist}" method="post" action="">
                                             <label>{$LANG.adress_name}</label>
                                             <input type="hidden" name="script" id="script" value="script">
                                             <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_{$pagefirstlist[pagelist].pagelist}"   placeholder="Enter your script" >{$pagefirstlist[pagelist].google_script_text}</textarea>
                                             <input type='hidden' name="page_list_id" id="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                             <div class="mapButton clearfix">
                                                  <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('{$pagefirstlist[pagelist].pagelist}');">
                                                  <input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" />
                                             </div>
                                        </form>
                                   </div>
                              </div>
                              <!--<div id="script_{$pagefirstlist[pagelist].pagelist}" {if $pagefirstlist[pagelist].google_ads eq 'script'}  style="display:block;"{else}style="display:none;" {/if}>
<form name="script_google_{$pagefirstlist[pagelist].pagelist}"  id="script_google_{$pagefirstlist[pagelist].pagelist}" method="post" action="">
<input type="hidden" name="script" id="script" value="script">
<textarea name="google_script_text" id="google_script_text_{$pagefirstlist[pagelist].pagelist}" class="google_ansen" placeholder="Enter your script" >{$pagefirstlist[pagelist].google_script_text}</textarea>
<input type='hidden' name="page_list_id" id="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
<input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('{$pagefirstlist[pagelist].pagelist}');">
</form>  
</div>-->
                              {$objCommon->getImageGoogle($pagefirstlist[pagelist].pagelist)}
                              <div id="images_{$pagefirstlist[pagelist].pagelist}" class="row-fluid" {if $pagefirstlist[pagelist].google_ads eq 'image'}  style="display:block;" {else}style="display:none;" {/if}> {if !$images_google}
                                   {*
                                   <div id='preview_{$pagefirstlist[pagelist].pagelist}'> </div>
                                   *}
                                   <div id='imageloadstatus_{$pagefirstlist[pagelist].pagelist}' style='display:none'> <img src="{$SITE_BASEURL}/images/loadings.gif" alt="Uploading...."/></div>
                                   <form id="imageform_{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
                                        <label id='imageloadbutton_{$pagefirstlist[pagelist].pagelist}' class="input input-file" style="display:block; height:135px;" for="file">
                                        <div class="button">
                                             <input type='file' name="photos[]" id="photoimg_{$pagefirstlist[pagelist].pagelist}" class="inputfile" onchange="imageUpdatingProcess('{$pagefirstlist[pagelist].pagelist}');"/>
                                        </div>
                                        <input type='hidden' name="image" id="image" value="image"/>
                                        <input type='hidden' name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                        </label>
                                   </form>
                                   {else}
                                   <div class="googAddOption"> <img width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{else}100%{/if}" height="{if $pagefirstlist[pagelist].img_height}{$pagefirstlist[pagelist].img_height}{else}180{/if}" src="{$SITE_GOOGLE_IMAGES_URL}/{$images_google.0.google_image_name}"/> <img width="{if $pagefirstlist[pagelist].img_width}{$pagefirstlist[pagelist].img_width}{else}100%{/if}">
                                        <div class="googAddDelete"> <a class="galleryimage" onclick="deletegoogleImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','{$images_google.0.google_image_id }','{$images_google.0.google_image_name}');"> <i class="fa fa-trash-o"></i> </a> </div>
                                        <a class="googAddUrl" onclick="showAddUrl('urladd_{$pagefirstlist[pagelist].pagelist}');"> {$LANG.add_url_name}</a> </div>
                                   <div id="urladd_{$pagefirstlist[pagelist].pagelist}" class="addGoogPop" style="display:none;">
                                        <div class="leftside"> <i class="fa fa-external-link fontSize42"></i>
                                             <label>{$LANG.add_url_name}</label>
                                        </div>
                                        <div class="rightside">
                                             <form name="imagetxt_{$pagefirstlist[pagelist].pagelist}" class="no-mar"  id="imagetxt_{$pagefirstlist[pagelist].pagelist}" method="post" action="">
                                                  <label>{$LANG.url_name}</label>
                                                  <input type="text" name="image_text_{$pagefirstlist[pagelist].pagelist}" id="image_text_{$pagefirstlist[pagelist].pagelist}" class="google_url_text" value="{$images_google.0.google_url}">
                                                  <input type='hidden' name="page_list_id" id="page_list_id" value="{$pagefirstlist[pagelist].pagelist}"/>
                                                  <input type='hidden' name="google_image_id" id="google_image_id" value="{$images_google.0.google_image_id}"/>
                                                  <div class="mapButton clearfix">
                                                       <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('{$pagefirstlist[pagelist].pagelist}','{$images_google.0.google_image_id}');">
                                                       <input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" onclick="$('#urladd_'+{$columnpagefirstlist[colpagelist].pagelist}).hide();" />
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   {/if} </div>
                         </li>
                         {/if}
                         {if $pagefirstlist[pagelist].file}
                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="activemove theme2bginn posRel">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','file');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              {$objCommon->getFile_name_build($pagefirstlist[pagelist].pagelist)}                           
                              <div class="bgmask"></div>                                        
                              <div id="fileTool" class="width100 block fileTool" style="background:url({$extimg}) no-repeat left top"  onclick="$('#uploadFilePopup{$pagefirstlist[pagelist].pagelist}').show();$('.bgmask').show();$('.bgmaskTop,.bgmaskTopLine').show();$('.arrow').addClass('arrowhide');">
                                  <div class="filename">{$files.0.original_name}</div>
                                   <a>{if $files.0.original_name eq ''}Dosya yüklemek için tıklayın{else}Dosyayı İndir{/if}</a> </div>
                              <div id="uploadFilePopup{$pagefirstlist[pagelist].pagelist}" class="all_popup" style="display:none;">
                                   <div id="image-chooser-nav">
                                        <div id="image-chooser-nav-label">
                                             <div>{$LANG.select_files_from}</div>
                                        </div>
                                        <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                             <div class="colWhite"> <span></span> {$LANG.my_computer_name} </div>
                                        </div>
                                        <div class="close PopCloseButt btn btn-danger" onclick="$('#uploadFilePopup{$pagefirstlist[pagelist].pagelist}').hide();$('.bgmask').hide();$('.bgmaskTop,.bgmaskTopLine').hide();$('.arrow').removeClass('arrowhide');">X</div>
                                   </div>
                                   <div id="browsebutton" class="popBrowseInner">
                                        <div id='preview'></div>
                                        <div id='imageloadstatuslogo' style="display:none;">
                                             <div class="laodImgChange"><img src="{$SITE_BASEURL}/images/gifload.gif" alt="Uploading...."/></div>
                                        </div>
                                        <form id="fileform{$pagefirstlist[pagelist].pagelist}" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxFileUpload.php' style="clear:both">
                                             <input type="hidden" name="page_list_id" value="{$pagefirstlist[pagelist].pagelist}" />
                                             <div class="uploadTxtPop">Dosya yüklemek için tıklayın</div>
                                             <label for="file_{$pagefirstlist[pagelist].pagelist}" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
                                             <div class="button">
                                                  <input type="file" id="file_{$pagefirstlist[pagelist].pagelist}" onchange="fileUpload('{$pagefirstlist[pagelist].pagelist}');" name="files" />
                                             </div>
                                             <input type='hidden' name="status" value="domainlogo"/>
                                             </label>
                                        </form>
                                   </div>
                              </div>
                         </li>
                         {/if}
						
					 {if $pagefirstlist[pagelist].column_image_show}
                          {assign var="columnimages" value=$objCommon->getColumnTextImages($pagefirstlist[pagelist].pagelist)}

                         <li id="page_{$pagefirstlist[pagelist].pagelist}" class="columnlist">                                                                 
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$pagefirstlist[pagelist].pagelist}','column_image_show');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
						 <div class="tablesampleouter">
							 <div class="sample2  columsBor row-fluid no-space">
                                        {section name=foo start=0 loop=3 step=1} 
                                             {assign var="num" value=$smarty.section.foo.rownum}

                                             {foreach from=$columnimages key=k item=imge}

                                                  {if $imge.column_id eq $num and $imge.status eq 'columnImageText'}
                                                       {assign var="srcIndex" value=$k}
                                                       {assign var="images" value=1}
                                                  {/if}

                                                  {if $imge.column_id eq $num and $imge.status eq 'columnImageText_title'}
                                                       {assign var="srcIndex_title" value=$k}
                                                       {assign var="images_title" value=1}
                                                  {/if}

                                                   {if $imge.column_id eq $num and $imge.status eq 'columnImageText_desc'}
                                                       {assign var="srcIndex_desc" value=$k}
                                                       {assign var="images_desc" value=1}
                                                  {/if}
                                             {/foreach}

                                             <div class="addwidth span4">     
     									<label class="coltext_image" for="coltext_image{$smarty.section.foo.rownum}">
     										<input type="button" class="hide" id="coltext_image{$smarty.section.foo.rownum}" onclick="showColumnImagePopup('{$pagefirstlist[pagelist].pagelist}','{$smarty.section.foo.rownum}');"/>

                                                        {if isset($images) and $images eq 1}
                                                            <img src="{$SITE_DOMAIN_IMAGES_URL}/{$columnimages.$srcIndex.image_name}" alt="Column Text Image" />
                                                            {assign var="images" value=0}
                                                       {else}
                                                            <img src="{$SITE_BASEURL}/images/sample1.jpg" alt="Column Text Image" />
                                                       {/if}

     									</label>

     									<div class="coltext_title contentedit" id="coltext_title_{$smarty.section.foo.rownum}" onblur="updateTilte_columnImage('{$pagefirstlist[pagelist].pagelist}','{$smarty.section.foo.rownum}');">     
     										{if isset($images_title) and $images_title eq 1}
                                                            {$columnimages.$srcIndex_title.column_text_title}
                                                            {assign var="images_title" value=0}
                                                       {else}
                                                            Sample Title
                                                       {/if}
     									</div>
     									<div class="coltext_desc contentedit" id="coltext_desc_{$smarty.section.foo.rownum}" onblur="updateDesc_columnImage('{$pagefirstlist[pagelist].pagelist}','{$smarty.section.foo.rownum}');">     
     										{if isset($images_desc) and $images_desc eq 1}
                                                            {$columnimages.$srcIndex_desc.column_text_desc}
                                                            {assign var="images_desc" value=0}
                                                       {else}
                                                            This is the test description
                                                       {/if}
     									</div>
     								</div>
                                             
                                        {/section} 

								<!-- <div class="addwidth span4">     
									<label class="coltext_image" for="coltext_image2">
										<input type="button" class="hide" id="coltext_image2" onclick="showColumnImagePopup('{$columnpagefirstlist[colpagelist].pagelist}','2');"/>
										{if isset($columnimages.0.column_id) and $columnimages.0.column_id neq '' and $columnimages.0.column_id eq '2'}
                                                       <img src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" alt="Column Text Image" title="Column Text Image"/>
                                                  {else}
                                                       <img src="{$SITE_BASEURL}/images/sample2.jpg" alt="Column Text Image" title="Column Text Image"/>
                                                  {/if}
									</label>
									<div class="coltext_title contentedit">     
										Sample Title
									</div>
									<div class="coltext_desc contentedit">     
										This is the test description
									</div>
								</div>
								<div class="addwidth span4">     
									<label class="coltext_image" for="coltext_image3">
										<input type="button" class="hide" id="coltext_image3" onclick="showColumnImagePopup('{$columnpagefirstlist[colpagelist].pagelist}','3');"/>
                                                  {if isset($columnimages.0.column_id) and $columnimages.0.column_id neq '' and $columnimages.0.column_id eq '3'}
										     <img src="{$SITE_BASEURL}/images/sample3.jpg" alt="Column Text Image" title="Column Text Image"/>
                                                  {else}
                                                       <img src="{$SITE_BASEURL}/images/sample3.jpg" alt="Column Text Image" title="Column Text Image"/>
                                                  {/if}
									</label>
									<div class="coltext_title contentedit">     
										Sample Title
									</div>
									<div class="coltext_desc contentedit">     
										This is the test description
									</div>
								</div> -->
							</div>
						</div> 
                         </li>
                         {/if}
                         {sectionelse}
                         <div id="dropBox2" class="dropBox2 clearfix"></div>
                         {/section}
                    </ul>
               </div>
               {/if}											
               {/if}
		</div>
     </div>
</div>
<div class="contact_custom_field" id="add_new_custom_field" style="display:none;"></div>
<!--new banner slider process start-->
<div id="editBannerImg" style="display:none;" class="sliderPopCont modal">
     <div class="youtubepopclose" onclick=" $('#editBannerImg').hide();$('.loadmask').hide();"></div>
     <div class="sliderPopupHead"> Banner Image</div>
      <div class="row-fluid">
           <div class="span12 slidePopRhtScroll offset0">
                <div id="banner_imageLibrary" class="clearfix library_contentBanner">
                     <ul>
                          <li><a href="#my_computer">My Computer</a></li>
                          <li><a href="#bannerimage_library_content">Image Library</a></li>
                     </ul>
                     <div id="my_computer">
                          <form id="bannerimageform" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='{$SITE_BASEURL}/ajaxImageUpload.php'>
                               <label for="file" class="input input-file" style="display:block;cursor:pointer" >
                                   <div  class="button">
                                        <input type="file" value="" name="photos[]" id="photobannerimg" accept=".jpg, .png, .gif, .bmp,.jpeg" />
                                        {$LANG.browse_name} 
                                   </div>
                               <input type='hidden' name="status" value="bannerimage"/>
                               </label>
                          </form>                          
                          <div style="display:none" class="progress">
                               <div class="bar"></div>
                               <div class="percent">0%</div>
                          </div>
                          {$objCommon->getImageForShowTop($site_title.0.domain_id,'bannerimage')}
                          <div class="library_content_scroll clearfix"> 
                               
                               <div id="preview" class="previewimage">
                                 {if !empty($logoimages)}
                                 <img  src="{$SITE_DOMAIN_IMAGES_URL}/{$logoimages}" /> <a class="galleryimage" ></a> 
                                 {/if}
                               </div>
                               <ul id="sortableImg" class="SlideUploadImge">
                               
                               </ul>
                               
                               
                          </div>
                     </div>
                     <div id="bannerimage_library_content" class="clearfix bannerlib">
                          <input type="button" class="upload_btn" value="Add selected" onclick="uploadLibraryImages('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','bannerimage');" />
                          <div  class="library_content_scroll clearfix image_library">{include file ='imageLibrary.tpl'}</div>
                     </div>
                </div>
           </div>
      </div>
</div>

<div id="sliderBannerImg" style="display:none;" class="sliderPopCont modal">
     <div class="youtubepopclose" onclick=" $('#sliderBannerImg').hide();$('.loadmask').hide();"></div>
     <div class="sliderPopupHead"> Banner Slider Image </div>
     <div class="row-fluid">
          <div class="span12 slidePopRhtScroll offset0">
               <div id="banner_slider_imageLibrary" class="clearfix library_contentBanner">
                    <ul>
                         <li><a id="bannercurslid" href="#my_computer">Current Slides</a></li>
                         <li><a href="#image_library_content">Image Library</a></li>
                    </ul>
                    
                    <div id="my_computer">
                         <form id="sliderimageform" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxBannerSliderImageUpload.php' style="clear:both">
                              <label for="photosliderimg" class="input input-file no-mar" style="display:block" >
                              <div class="button">
                                   <input type="file" value="" name="photos[]" id="photosliderimg" class="hide" accept=".jpg, .png, .gif, .bmp,.jpeg" />
                                   {$LANG.browse_name} 
                              </div>
                                   <input type='hidden' name="status" value="sliderimage"/>
                                   <input type='hidden' id="uploadtype" value=""/>
                              </label>
                         </form>
                         
                         <div style="display:none" class="progress">
                              <div class="bar"></div>
                              <div class="percent">0%</div>
                         </div>
                         <div class="library_content_scroll clearfix">                               
                              {$objCommon->getBannerSliderImage($smarty.session.domain_id,'sliderimage')}                        
                              <div class="clearfix"></div>
                              <div id="preview"></div>
                              <ul id="slidesortableImg" class="SlideUploadImge">
                                   <div id="banner_preview"></div>
                                   {section name="sliimg" loop="$banner_images"}
                                   <li class="SlideUplWidtPopup" id="sliderimg{$banner_images[sliimg].banner_slider_id}"> <img width="100%" height="150" src="{$SITE_DOMAIN_IMAGES_URL}/{$banner_images[sliimg].image_name}"/> <a onclick="deleteSliderBannerImage('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$banner_images[sliimg].banner_slider_id}','sliderimage');" class="galleryimage"><img src="{$SITE_BASEURL}/images/Close.png" alt="" title="" /></a> </li>
                                   {/section}
                              </ul>
                         </div>
                          <a style="display:" class="upload_btn_save" onclick="bannerImageUpdatingProcess()">Save</a> 
                    </div>
                    <div id="image_library_content" class="clearfix sliderlibrary">
                         <input type="button" class="upload_btn" value="Add Selected" onclick="addImagesinslide()" />
                         <label style="display:none;" id="bannerimageliblabel" onclick="uploadLibraryImages('{$smarty.session.domain_id}','{$smarty.session.page_id}','{$smarty.request.page_list_id}','bannerslider');"></label>
                         <div  class="library_content_scroll clearfix image_library image_library">{include file ='imageLibrary.tpl'}</div>
                    </div>                                       
               </div>               
          </div>
     </div>
	  {literal}
	 <script type="text/javascript">
		$(document).ready(function(){
		  //imagelibrarytabs();	
		});          
	 </script>	
	 {/literal}
</div>

{/if}
 
 
