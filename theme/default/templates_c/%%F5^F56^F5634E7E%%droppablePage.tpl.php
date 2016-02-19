<?php /* Smarty version 2.6.3, created on 2015-12-23 12:46:02
         compiled from droppablePage.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'droppablePage.tpl', 98, false),array('modifier', 'date_format', 'droppablePage.tpl', 231, false),array('modifier', 'utf8_encode', 'droppablePage.tpl', 231, false),array('modifier', 'stripslashes', 'droppablePage.tpl', 984, false),)), $this); ?>
<?php if (! $this->_tpl_vars['objCommon']->getStoreComment($_SESSION['page_id'])):  echo '
<script>

$(document).ready(function(){
					
	var blockSort = true;
	$(".leftuldiv").sortable();
	$(".leftuldiv").bind(\'sortreceive\', function () {
		blockSort = false;
	}).bind(\'sortstop\', function (e) {
		if (blockSort) {
			e.preventDefault();
		}
		blockSort = true;
	});						
});

function fileUpload(id)
{
   
    $("#fileform"+id).ajaxForm({target: \'#preview\', 
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

$("#galimagephotogal"+id).ajaxForm({target: \'#preview\', 
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
$("#imageform_"+id).ajaxForm({target: \'#preview\', 
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
'; ?>

<div id="pagelist" class="blogPageBgInner themewrapper1 blogPageBgInnerMiddle blogPageBgInnerMiddleSec clearfix">
     <div class="themewrapper2BgAlign">
          <div id="rightColumn" class="clearfix">                <?php if ($_SESSION['page_id']): ?>
               <?php if ($this->_tpl_vars['objCommon']->getBlogComment($_SESSION['page_id'])): ?>
               <?php if ($_SESSION['blogonuse']): ?>
               <ul id="" class="nolist">
                    <li class="">
                         <div class="blogInner">
                              <div class="blogLeft">
                                   <div class="blogPageBgInnerTab blogPageBgInnerTab4"> <a class="active BlogNewPost" onclick="return AddTitlePopup('<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_blog_newpost']; ?>
</a>
                                   <?php echo $this->_tpl_vars['objCommon']->getDraftsDetails($_SESSION['domain_id']); ?>

                                        <?php if (! empty ( $this->_tpl_vars['drafts_list'] )): ?> <a class="BlogNewPost" onclick="commonForOption('<?php echo $_SESSION['domain_id']; ?>
','drafts_id')"><?php echo $this->_tpl_vars['LANG']['user_drafts']; ?>
(<?php echo count($this->_tpl_vars['drafts_list']); ?>
)</a> <?php endif; ?> <a data-toggle="modal" href="#myModalBlogComment" onclick="getAllTheComments('<?php echo $_SESSION['domain_id']; ?>
');"><?php echo $this->_tpl_vars['LANG']['main_blog_comments']; ?>
</a> <a data-toggle="modal" href="#myModalBlogSetting" onclick="ShowPassChangeColumn('settingblog','postblog','commentblogid');"><?php echo $this->_tpl_vars['LANG']['main_blog_setting']; ?>
</a> </div>
                                                                      <div class="BlogNewPostPopup">
                                        <div id='drafts_id'></div>
                                   </div>
                                                                      <div id="postblog" style="display:block">
                                        <div id="showPost"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "listPost.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
                                                                                <div class="BlogNewPostPopup">
                                             <div id="popaddtitle" style="display:none"> </div>
                                        </div>
                                        <div class="blogMask"></div>
                                                                                                                        
                                                                                <div id="myModalBlogEditPost" class="BlogNewPostPopup"> </div>
                                                                                 </div>
                                   <div id="showeditpost" style="display:none;"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "addtitle.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
                                   <div id="modals">
                                        <div id="myModalBlogComment" class="modal addCatPopWidt hide modelPopContLogin fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                             <div id="commentblogid" style="display:none"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "blockpopupcomment.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
                                        </div>
                                   </div>
                                   <div id="modals">
                                        <div id="myModalBlogSetting" class="modal hide addCatPopWidt fade loginPopMar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                             <div id="settingblog" style="display:none">
                                                  <div class="headBgTop"> <?php echo $this->_tpl_vars['LANG']['main_blog_setting']; ?>

                                                       <div class="pull-right curPoint" data-dismiss="modal" aria-hidden="true">X</div>
                                                  </div>
                                                  <div class="popaddTitle clearfix">
                                                       <form name="blogsettingform" class="form-horizontal no-mar sky-form" id="blogsettingform" method="post" action="">
                                                            <input type="hidden" name="domain_id" id="domain_id" value="<?php echo $_SESSION['domain_id']; ?>
">
                                                            <input type="hidden" name="action" id="action" value="updateBlogSetting">
                                                            <ul class="offset0">
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label><?php echo $this->_tpl_vars['LANG']['main_common_default']; ?>
</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="commentdefault">
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_close']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['comment_default'] == $this->_tpl_vars['LANG']['main_blog_close']): ?> selected="selected" <?php endif; ?> ><?php echo $this->_tpl_vars['LANG']['main_blog_close']; ?>
</option>
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_open']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['comment_default'] == $this->_tpl_vars['LANG']['main_blog_open']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_open']; ?>
</option>
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_require']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['comment_default'] == $this->_tpl_vars['LANG']['main_blog_require']): ?> selected="selected" <?php endif; ?> ><?php echo $this->_tpl_vars['LANG']['main_blog_require']; ?>
</option>
                                                                           </select>
                                                                           <i></i> </label>
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label><?php echo $this->_tpl_vars['LANG']['main_blog_post']; ?>
</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="postperpage">
                                                                                
<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=51) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>

                                                                                <option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['post_perpage'] == $this->_sections['foo']['index']): ?>selected="selected"<?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option>
                                                                                
<?php endfor; endif; ?>

                                                                           </select>
                                                                           <i></i> </label>
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label><?php echo $this->_tpl_vars['LANG']['main_blog_notify']; ?>
</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="notifyme">
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_yes']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['notifyme'] == $this->_tpl_vars['LANG']['main_blog_yes']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_yes']; ?>
</option>
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_no']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['notifyme'] == $this->_tpl_vars['LANG']['main_blog_no']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_no']; ?>
</option>
                                                                           </select>
                                                                           <i></i> </label>
                                                                           <div class="dc"><span class="txtBoxBlogPop_at">at</span></div>
                                                                           <input class="txtBoxBlogPopComment" type="text" name="notifyme_email" id="notifyme_email" value="<?php echo $this->_tpl_vars['blogsetting_list']['0']['notifyme_email']; ?>
" placeholder="<?php echo $this->_tpl_vars['LANG']['main_notiyemail']; ?>
">
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label><?php echo $this->_tpl_vars['LANG']['main_blog_autocomment']; ?>
</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <label class="select">
                                                                           <select name="automaticallyclose">
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_never']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_never']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_never']; ?>
</option>
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_afterthird']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_afterthird']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_afterthird']; ?>
</option>
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_aftersix']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_aftersix']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_aftersix']; ?>
</option>
                                                                                <option value="<?php echo $this->_tpl_vars['LANG']['main_blog_afternine']; ?>
" <?php if ($this->_tpl_vars['blogsetting_list']['0']['automaticallyclose'] == $this->_tpl_vars['LANG']['main_blog_afternine']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['LANG']['main_blog_afternine']; ?>
</option>
                                                                           </select>
                                                                           <i></i> </label>
                                                                      </div>
                                                                 </li>
                                                                 <li class="control-group">
                                                                      <div class="control-label">
                                                                           <label><?php echo $this->_tpl_vars['LANG']['main_blog_share_but']; ?>
</label>
                                                                      </div>
                                                                      <div class="controls">
                                                                           <input class="no-mar" type="checkbox" name="sharebutton" id="sharebutton" value="1" <?php if ($this->_tpl_vars['blogsetting_list']['0']['sharebutton'] == '1'): ?>checked<?php endif; ?>>
                                                                           <?php echo $this->_tpl_vars['LANG']['main_blog_share']; ?>
 </div>
                                                                 </li>
                                                            </ul>
                                                            <input type="button" name="updatesetting" class="btn btn-info pull-right" id="updatesetting" onclick="updateBlogSetting();" value="<?php echo $this->_tpl_vars['LANG']['main_save']; ?>
">
                                                       </form>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="blogRight">
                                   <div class="blogRhtInner">                                                                                 <div id="author_id" class="authorTxtBg"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "authorBlog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
                                                                                <div id="archives_id" class="achiverTxtBg clearfix"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "archivesBlog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
                                        <div class="authCont"><?php echo ((is_array($_tmp=((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%b %d, %Y') : smarty_modifier_date_format($_tmp, '%b %d, %Y')))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</div>
                                        <div id="cat_id" class="CatBg"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "categoriesBlog.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
                                        <div class="userList"> <?php echo $this->_tpl_vars['objCommon']->selectCat(); ?>
 <a onclick="return selectPostBasdCat('<?php echo $this->_tpl_vars['cate'][$this->_sections['category']['index']]['cat_id']; ?>
');">
                                             <div class="authCont"><?php echo $this->_tpl_vars['LANG']['all_categories']; ?>
</div>
                                             </a> <?php unset($this->_sections['category']);
$this->_sections['category']['name'] = 'category';
$this->_sections['category']['loop'] = is_array($_loop=($this->_tpl_vars['cate'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['category']['show'] = true;
$this->_sections['category']['max'] = $this->_sections['category']['loop'];
$this->_sections['category']['step'] = 1;
$this->_sections['category']['start'] = $this->_sections['category']['step'] > 0 ? 0 : $this->_sections['category']['loop']-1;
if ($this->_sections['category']['show']) {
    $this->_sections['category']['total'] = $this->_sections['category']['loop'];
    if ($this->_sections['category']['total'] == 0)
        $this->_sections['category']['show'] = false;
} else
    $this->_sections['category']['total'] = 0;
if ($this->_sections['category']['show']):

            for ($this->_sections['category']['index'] = $this->_sections['category']['start'], $this->_sections['category']['iteration'] = 1;
                 $this->_sections['category']['iteration'] <= $this->_sections['category']['total'];
                 $this->_sections['category']['index'] += $this->_sections['category']['step'], $this->_sections['category']['iteration']++):
$this->_sections['category']['rownum'] = $this->_sections['category']['iteration'];
$this->_sections['category']['index_prev'] = $this->_sections['category']['index'] - $this->_sections['category']['step'];
$this->_sections['category']['index_next'] = $this->_sections['category']['index'] + $this->_sections['category']['step'];
$this->_sections['category']['first']      = ($this->_sections['category']['iteration'] == 1);
$this->_sections['category']['last']       = ($this->_sections['category']['iteration'] == $this->_sections['category']['total']);
?> <a onclick="return selectPostBasdCat('<?php echo $this->_tpl_vars['cate'][$this->_sections['category']['index']]['cat_id']; ?>
');">
                                             <div class="authCont"><?php echo $this->_tpl_vars['cate'][$this->_sections['category']['index']]['cat_name']; ?>
</div>
                                             </a> <?php endfor; endif; ?> </div>
                                         </div>
                              </div>
                         </div>
                    </li>
               </ul>
               <?php endif; ?>
               <?php endif; ?>	
               <?php endif; ?>
                              <?php if ($_SESSION['domain_id']): ?>
               <?php if (! $this->_tpl_vars['objCommon']->getBlogComment($_SESSION['page_id'])): ?>
               <input type="hidden" class="dropvalue frt" value="" />
               <!--<div class="highlightLine" style="display:none;"></div>-->
               <div id="dropBox" class="dropBox clearfix">
                    <ul id="droppable_content" class="clearfix sortouterHeight">
                          
                         <?php unset($this->_sections['pagelist']);
$this->_sections['pagelist']['name'] = 'pagelist';
$this->_sections['pagelist']['loop'] = is_array($_loop=($this->_tpl_vars['pagefirstlist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pagelist']['show'] = true;
$this->_sections['pagelist']['max'] = $this->_sections['pagelist']['loop'];
$this->_sections['pagelist']['step'] = 1;
$this->_sections['pagelist']['start'] = $this->_sections['pagelist']['step'] > 0 ? 0 : $this->_sections['pagelist']['loop']-1;
if ($this->_sections['pagelist']['show']) {
    $this->_sections['pagelist']['total'] = $this->_sections['pagelist']['loop'];
    if ($this->_sections['pagelist']['total'] == 0)
        $this->_sections['pagelist']['show'] = false;
} else
    $this->_sections['pagelist']['total'] = 0;
if ($this->_sections['pagelist']['show']):

            for ($this->_sections['pagelist']['index'] = $this->_sections['pagelist']['start'], $this->_sections['pagelist']['iteration'] = 1;
                 $this->_sections['pagelist']['iteration'] <= $this->_sections['pagelist']['total'];
                 $this->_sections['pagelist']['index'] += $this->_sections['pagelist']['step'], $this->_sections['pagelist']['iteration']++):
$this->_sections['pagelist']['rownum'] = $this->_sections['pagelist']['iteration'];
$this->_sections['pagelist']['index_prev'] = $this->_sections['pagelist']['index'] - $this->_sections['pagelist']['step'];
$this->_sections['pagelist']['index_next'] = $this->_sections['pagelist']['index'] + $this->_sections['pagelist']['step'];
$this->_sections['pagelist']['first']      = ($this->_sections['pagelist']['iteration'] == 1);
$this->_sections['pagelist']['last']       = ($this->_sections['pagelist']['iteration'] == $this->_sections['pagelist']['total']);
?>
                         <!--<div id="dropBox2" class="dropBox2 clearfix" style="position:relative;">-->
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_show']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="columnlist">
                              <ul id="dropBox2" class="dropBox2 clearfix" style="position:relative;">
                                   <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn column">
                                        <div class="form_element_control">
                                             <div class="controlMidOuter">
                                                  <div class="controlMidBg"></div>
                                             </div>
                                             <div class="deleteOuter">
                                                  <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','column_show');"><i class="fa fa-trash-o"></i></div>
                                             </div>
                                        </div>
                                        <div class="columnPop">
                                             <div class="columnPopLeft"></div>
                                             <div class="columnPopContent">
                                                  <select class="columncount" onchange="selecttochange(this,'<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                                                       <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '3'): ?>selected="selected"<?php endif; ?>>2</option>
                                                       <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '4'): ?>selected="selected"<?php endif; ?>>3</option>
                                                       <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '5'): ?>selected="selected"<?php endif; ?>>4</option>
                                                       <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '6'): ?>selected="selected"<?php endif; ?>>5</option>
                                                  </select>
                                             </div>
                                             <div class="columnPopRight"></div>
                                        </div>
                                        <!--<table onmouseover="columnId(this);" onmouseleave="columnIdOut(this);" class="sample2 columsBor" width="100%" border="0" cellpadding="0" cellspacing="0">-->
                                        <div class="tablesampleouter">
                                             <div id="column<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="sample2  columsBor row-fluid no-space">
                                                  <?php unset($this->_sections['rowcount']);
$this->_sections['rowcount']['name'] = 'rowcount';
$this->_sections['rowcount']['start'] = (int)1;
$this->_sections['rowcount']['loop'] = is_array($_loop=$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rowcount']['show'] = true;
$this->_sections['rowcount']['max'] = $this->_sections['rowcount']['loop'];
$this->_sections['rowcount']['step'] = 1;
if ($this->_sections['rowcount']['start'] < 0)
    $this->_sections['rowcount']['start'] = max($this->_sections['rowcount']['step'] > 0 ? 0 : -1, $this->_sections['rowcount']['loop'] + $this->_sections['rowcount']['start']);
else
    $this->_sections['rowcount']['start'] = min($this->_sections['rowcount']['start'], $this->_sections['rowcount']['step'] > 0 ? $this->_sections['rowcount']['loop'] : $this->_sections['rowcount']['loop']-1);
if ($this->_sections['rowcount']['show']) {
    $this->_sections['rowcount']['total'] = min(ceil(($this->_sections['rowcount']['step'] > 0 ? $this->_sections['rowcount']['loop'] - $this->_sections['rowcount']['start'] : $this->_sections['rowcount']['start']+1)/abs($this->_sections['rowcount']['step'])), $this->_sections['rowcount']['max']);
    if ($this->_sections['rowcount']['total'] == 0)
        $this->_sections['rowcount']['show'] = false;
} else
    $this->_sections['rowcount']['total'] = 0;
if ($this->_sections['rowcount']['show']):

            for ($this->_sections['rowcount']['index'] = $this->_sections['rowcount']['start'], $this->_sections['rowcount']['iteration'] = 1;
                 $this->_sections['rowcount']['iteration'] <= $this->_sections['rowcount']['total'];
                 $this->_sections['rowcount']['index'] += $this->_sections['rowcount']['step'], $this->_sections['rowcount']['iteration']++):
$this->_sections['rowcount']['rownum'] = $this->_sections['rowcount']['iteration'];
$this->_sections['rowcount']['index_prev'] = $this->_sections['rowcount']['index'] - $this->_sections['rowcount']['step'];
$this->_sections['rowcount']['index_next'] = $this->_sections['rowcount']['index'] + $this->_sections['rowcount']['step'];
$this->_sections['rowcount']['first']      = ($this->_sections['rowcount']['iteration'] == 1);
$this->_sections['rowcount']['last']       = ($this->_sections['rowcount']['iteration'] == $this->_sections['rowcount']['total']);
?>
                                                       <div class="addwidth column_inner_div <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '3'): ?>span6<?php endif; ?> <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '4'): ?>span4<?php endif; ?> <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '5'): ?>span3<?php endif; ?> <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_count'] == '6'): ?>five_column<?php endif; ?>" id="col_<?php echo $this->_sections['rowcount']['index']; ?>
">
                                                       <input type="hidden" name="columnpagelistid" id="columnpagelistid" class="columnpagelistid" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                                       <!---COlumn Sortable---->
                                                       <ul id="sortable_<?php echo $this->_sections['rowcount']['index']; ?>
" class="clearfix no-mar sortcolumn">
                                                            <li class="highlightLineInner" style="display:none;"></li>
															<?php echo $this->_tpl_vars['objCommon']->getColumnPageList($this->_sections['rowcount']['index'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                                                            <?php if ($this->_tpl_vars['columnpagefirstlist']): ?>
                                                            <?php unset($this->_sections['colpagelist']);
$this->_sections['colpagelist']['name'] = 'colpagelist';
$this->_sections['colpagelist']['loop'] = is_array($_loop=($this->_tpl_vars['columnpagefirstlist'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['colpagelist']['show'] = true;
$this->_sections['colpagelist']['max'] = $this->_sections['colpagelist']['loop'];
$this->_sections['colpagelist']['step'] = 1;
$this->_sections['colpagelist']['start'] = $this->_sections['colpagelist']['step'] > 0 ? 0 : $this->_sections['colpagelist']['loop']-1;
if ($this->_sections['colpagelist']['show']) {
    $this->_sections['colpagelist']['total'] = $this->_sections['colpagelist']['loop'];
    if ($this->_sections['colpagelist']['total'] == 0)
        $this->_sections['colpagelist']['show'] = false;
} else
    $this->_sections['colpagelist']['total'] = 0;
if ($this->_sections['colpagelist']['show']):

            for ($this->_sections['colpagelist']['index'] = $this->_sections['colpagelist']['start'], $this->_sections['colpagelist']['iteration'] = 1;
                 $this->_sections['colpagelist']['iteration'] <= $this->_sections['colpagelist']['total'];
                 $this->_sections['colpagelist']['index'] += $this->_sections['colpagelist']['step'], $this->_sections['colpagelist']['iteration']++):
$this->_sections['colpagelist']['rownum'] = $this->_sections['colpagelist']['iteration'];
$this->_sections['colpagelist']['index_prev'] = $this->_sections['colpagelist']['index'] - $this->_sections['colpagelist']['step'];
$this->_sections['colpagelist']['index_next'] = $this->_sections['colpagelist']['index'] + $this->_sections['colpagelist']['step'];
$this->_sections['colpagelist']['first']      = ($this->_sections['colpagelist']['iteration'] == 1);
$this->_sections['colpagelist']['last']       = ($this->_sections['colpagelist']['iteration'] == $this->_sections['colpagelist']['total']);
?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['title_select']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','title_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onblur="updateTitle('buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" onkeydown="updateTitle('buildTitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="themehead <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_title" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Başlığı Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_title'];  endif; ?></div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['description_select']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div  class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','description_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_paragraph" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>" onblur="updateDesc('buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" onkeydown="updateDesc('buildPara_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" contenteditable="true"  data-ph="Paragrafı Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['text_description'];  endif; ?></div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['divider']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','divider');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildDivide" class="">
                                                                      <hr />
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_multiple_select']): ?>
                                                            <?php echo $this->_tpl_vars['objCommon']->getImageText($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist'],'singletext'); ?>

                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                       
                                                                      <div class="deleteOuter">                                                                           
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildImgTxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="buildImgTxtOuter">
                                                                      <div class="row-fluid">
                                                                           <div class="span12 buildImgTxt <?php if (! $this->_tpl_vars['images']): ?>minimagewidth<?php endif; ?>"> <?php if (! $this->_tpl_vars['images']): ?>	
                                                                                                                                                                <div  style='display:none'>
                                                                                     <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                                </div>
                                                                                <form  method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
                                                                                     <label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                                                                     <div class="button">
                                                                                          <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showImageTxtPopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
                                                                                     </div>
                                                                                     <input type='hidden' name="status" value="singletext"/>
                                                                                     <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                                     </label>
                                                                                </form>
                                                                                <?php else: ?>
                                                                                <div class="uploadImgBg"> <img class="imagechangeNew" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" onclick="showImageTxtPopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">                                                                                      <div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                                                                          <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                                     </div>
                                                                                     <form  method="post" class="form-horizontal sky-form uploadsecbg" style=" display:none;" enctype="multipart/form-data" action='ajaxImageUpload.php'>
                                                                                     <label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
                                                                                     <div class="button">
                                                                                          <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showImageTxtPopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
                                                                                     </div>
                                                                                     <input type='hidden' name="status" value="singletext"/>
                                                                                     <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                                     </label>
                                                                                     </form>
                                                                                </div>
                                                                                <?php endif; ?> </div>
                                                                           <div class="span12">
                                                                                <div id="imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onblur="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" onkeydown="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="themehead borNone <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_imagetitle" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['imgtitle_fontcolor'];  endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Resim Seç ve Metni Düzenle" ><?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_text'];  endif; ?></div>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['image_select']): ?>
                                                            <?php echo $this->_tpl_vars['objCommon']->getImage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                            
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['colpagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                         <div onclick="$('#imagealignPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').show();$('#loadmask').show();" class="settingControlBg"><img src="http://www.enkolayweb.com/images/setting.png" ></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','image_select');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="buildImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid"> <?php if (! $this->_tpl_vars['images']): ?>
                                                                                                                                            <div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                                                           <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                      </div>
                                                                      <form  class="form-horizontal sky-form" method="post" enctype="multipart/form-data" style="clear:both">
                                                                           <label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                                                           <div class="button">
                                                                                <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showSinglePopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
                                                                           </div>
                                                                           <input type='hidden' name="status" value="single"/>
                                                                           <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                           </label>
                                                                      </form>
                                                                      <?php else: ?>
                                                                        
                                                                      <div class="uploadImgBg<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="text-align:<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['single_img_alignment']; ?>
"> <a><img class="imagechange" width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" onclick="showSinglePopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></a>                                                                            <div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                                                                <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                           </div>
                                                                           <form  class="form-horizontal sky-form uploadsecbg" style="display:none;clear:both;" method="post" >
                                                                                <label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
                                                                                <div class="button">
                                                                                     <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showSinglePopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
                                                                                </div>
                                                                                <input type='hidden' name="status" value="single"/>
                                                                                <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                                </label>
                                                                           </form>
                                                                      </div>
                                                                      <?php endif; ?> 
                                                               </div>
                                                               <div class="imagealignPopup" id="imagealignPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;">
                                                                   <div class="youtubepopclose" onclick="$(this).parent().hide();" ></div>
                                                                   <div class="contactlabelsPopupRight">
                                                                        <div class="contactlabelsPopupRightInner">
                                                                             <label class="span5 right">Hizalama</label>
                                                                             <select id="imgalign<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="alignOption span6" onchange="alignmentImage('alignto<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
',this);">
                                                                                  <option <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['single_img_alignment'] == 'left'): ?>selected="selected"<?php endif; ?> value="left">sol</option>
                                                                                  <option <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['single_img_alignment'] == 'center'): ?>selected="selected"<?php endif; ?>value="center">merkez</option>
                                                                                  <option <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['single_img_alignment'] == 'right'): ?>selected="selected"<?php endif; ?>value="right">sağ</option>
                                                                             </select>
                                                                        </div>
                                                                        <div class="center">
                                                                             <input type="button" onclick="updatealign_image('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
')" value="Kaydet" class="videosubmit"/>
                                                                        </div>
                                                                   </div>
                                                              </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['contact_form']): ?>
                                                            <?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                            <?php echo $this->_tpl_vars['objCommon']->getContactFormFields($_SESSION['domain_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','contact_form');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="" class="contactform clearfix">
                                                                      
                                                                      <a data-toggle="modal" href="#ModalFormEntry_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="btn btn-warning pull-right">Form Girişleri</a> <a onclick="ShowContactForm_fieldspopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" class="btn btn-success">Yeni Alan Ekle</a>
                                                                      <div class="themeheadsec contentedit <?php if ($this->_tpl_vars['contactlist']['0']['title_head'] == ''): ?>clickheretext contenttext <?php endif; ?>contactTxt contactHead" style="<?php if ($this->_tpl_vars['contactlist']['0']['buildContact_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_fontcolor']): ?>color:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontcolor'];  endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_style']): ?>font-family:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_line_size']): ?>line-height:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_size']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_size']; ?>
px;<?php endif; ?>" id="buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
" onblur="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
'); 44444" onkeydown="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
');" data-ph="Başlığı Düzenle"><?php if ($this->_tpl_vars['contactlist']['0']['title_head']):  echo $this->_tpl_vars['contactlist']['0']['title_head'];  endif; ?></div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 relatepop">
                                                                                <div class="span12 contactLisNav"><span onclick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php echo $this->_tpl_vars['contactlist']['0']['text1']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
                                                                                <div class="clearfix"></div>
                                                                                <input type="text" value="" placeholder="Ad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');">
                                                                                <?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?> </div>
                                                                      </div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 relatepop">
                                                                                <div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
                                                                                <div class="clearfix"></div>
                                                                                <input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');">
                                                                                <?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?> </div>
                                                                      </div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php echo $this->_tpl_vars['contactlist']['0']['text3']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
                                                                           <div class="clearfix"></div>
                                                                           <input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');">
                                                                           <?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?> </div>
                                                                      <div class="row-fluid marTop10">
                                                                           <div class="span12 contactLisNav"><span onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
                                                                           <div class="clearfix"></div>
                                                                           <textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"></textarea>
                                                                           <?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?> </div>
                                                                      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "contactform_fields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                                                      <div class="span4 offset0 marTop10 relatepop clr">
                                                                           <div class="buildPagePostButtonLeft">
                                                                                <input type="submit" value="Gönder" class="buildPagePostButton">
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                                                                                  <div id="modals">
                                                                      <div id="ModalFormEntry_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="modal hide contact_form_show">
                                                                           <div class="formEntryPopForm clearfix">
                                                                                <div class="preview_image">Form Girişleri</div>
                                                                                <div id="errtext"></div>
                                                                                <?php echo $this->_tpl_vars['objCommon']->getEmai($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                                                <form class="clearfix" name="conatctmail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" class="no-mar">
                                                                                     <div id="errtext"></div>
                                                                                     <input type="text" name="contactmail" id="contactmail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['mailid']; ?>
" >
                                                                                     <button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
                                                                                     <input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                                </form>
                                                                                
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="contactForm"></div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['social_plugins']): ?>
                                                            <?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                         <div onclick="showSocialPopup(<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
);" class="settingControlBg"><img src="http://www.enkolayweb.com/images/setting.png"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="moveicon"></div>
                                                                 <div id="buildSocial_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="buildSocialIcon" >
                                                                      <input type="button" class="fbicon" value="" />
                                                                      <input type="button" class="twittericon" value="" />
                                                                      <input type="button" class="linkedicon" value="" />
                                                                      <input type="button" class="mailicon" value="" />
                                                                 </div>
                                                                 <div id="pluginShow_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="galleryimagepop socialPop" style="display:none;">
                                                                      <div class="leftside"> <i class="fa fa-users fontSize42"></i>
                                                                           <label><?php echo $this->_tpl_vars['LANG']['social_link_name']; ?>
</label>
                                                                      </div>
                                                                      <div class="rightside">
                                                                           <form class="no-mar" id="socialplugin_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" name="socialplugin" method="post">
                                                                                <input type="hidden" name="domain_id" id="domain_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['domain_id']; ?>
">
                                                                                <input type="hidden" name="page_id" id="page_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['page_id']; ?>
">
                                                                                <input type="hidden" name="page_list_id" id="page_list_id_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa-facebook"></i></span>
                                                                                     <input type="text" name="fb" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['fb']; ?>
" id="fb_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://facebook.com/ornek">
                                                                                </div>
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa fa-tumblr"></i></span>
                                                                                     <input type="text" name="tw" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['twitter']; ?>
" id="tw_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://twitter.com/ornek">
                                                                                </div>
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa-linkedin"></i></span>
                                                                                     <input type="text" name="ln" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['linkedin']; ?>
" id="ln_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="http://linkedin.com/in/ornek">
                                                                                </div>
                                                                                <div class="socialInn clearfix"> <span><i class="fa fa fa-envelope-o"></i></span>
                                                                                     <input type="text" name="mail" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['mail']; ?>
" id="mail_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" placeholder="ornek@ornek.com">
                                                                                </div>
                                                                                <div class="mapButton clearfix">
                                                                                     <input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                                     <input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();">
                                                                                </div>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['youtube_video']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                           <div class="settingControlBg"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/setting.png" alt="" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','youtube_video');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails_buildpage($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                                 <div class="youtubeDiv clearfix" id="youtubeDiv_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:block;<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
                                                                      <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_url'] != ''):  echo $this->_tpl_vars['youtubelist']['0']['youtube_url'];  else:  echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/youtubeLogo.png<?php endif; ?>" width="100%" height="200"></iframe>
                                                                 </div>
                                                                 <div class="youtubelabelsPopup" id="youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;">
                                                                      <div class="youtubepopclose" onclick="popcloseforutubeurl('youtubelabelsPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></div>
                                                                      <form name="youtubefrm_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post">
                                                                           <div id="error_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"></div>
                                                                           <div class="contactlabelsPopupLeft">
                                                                                <label>Youtube Video Adresi</label>
                                                                                <input type="text" class="videoUrl" name="videourl_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="videourl_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
"/>
                                                                           </div>
                                                                           <div class="contactlabelsPopupRight">
                                                                                <div class="contactlabelsPopupRightInner">
                                                                                     <label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
                                                                                     <select class="spacingOption" name="spacing" id="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
                                                                                          <option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
                                                                                          <option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
                                                                                          <option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
                                                                                          <option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
                                                                                     </select>
                                                                                     <label>Genişlik</label>
                                                                                     <select class="widthOption" name="width_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="width_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
                                                                                          <option value="Küçük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>selected="selected"<?php endif; ?>>Küçük</option>
                                                                                          <option value="Orta" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>selected="selected"<?php endif; ?>>Orta</option>
                                                                                          <option value="Büyük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>selected="selected"<?php endif; ?>>Büyük</option>
                                                                                     </select>
                                                                                </div>
                                                                                <div>
                                                                                     <input type="button" value="Kaydet" class="videosubmit"  onclick="addYoutubeUrl('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
                                                                                </div>
                                                                           </div>
                                                                      </form>
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <!--Gallery Process Start-->
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','gallery');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="galImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid center columngallery gallery_wrapper"> <?php echo $this->_tpl_vars['objCommon']->getGalleryImage($_SESSION['domain_id'],$_SESSION['page_id'],$this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                                      <?php if ($this->_tpl_vars['images']): ?>
                                                                      <?php unset($this->_sections['galimg']);
$this->_sections['galimg']['name'] = 'galimg';
$this->_sections['galimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['galimg']['show'] = true;
$this->_sections['galimg']['max'] = $this->_sections['galimg']['loop'];
$this->_sections['galimg']['step'] = 1;
$this->_sections['galimg']['start'] = $this->_sections['galimg']['step'] > 0 ? 0 : $this->_sections['galimg']['loop']-1;
if ($this->_sections['galimg']['show']) {
    $this->_sections['galimg']['total'] = $this->_sections['galimg']['loop'];
    if ($this->_sections['galimg']['total'] == 0)
        $this->_sections['galimg']['show'] = false;
} else
    $this->_sections['galimg']['total'] = 0;
if ($this->_sections['galimg']['show']):

            for ($this->_sections['galimg']['index'] = $this->_sections['galimg']['start'], $this->_sections['galimg']['iteration'] = 1;
                 $this->_sections['galimg']['iteration'] <= $this->_sections['galimg']['total'];
                 $this->_sections['galimg']['index'] += $this->_sections['galimg']['step'], $this->_sections['galimg']['iteration']++):
$this->_sections['galimg']['rownum'] = $this->_sections['galimg']['iteration'];
$this->_sections['galimg']['index_prev'] = $this->_sections['galimg']['index'] - $this->_sections['galimg']['step'];
$this->_sections['galimg']['index_next'] = $this->_sections['galimg']['index'] + $this->_sections['galimg']['step'];
$this->_sections['galimg']['first']      = ($this->_sections['galimg']['iteration'] == 1);
$this->_sections['galimg']['last']       = ($this->_sections['galimg']['iteration'] == $this->_sections['galimg']['total']);
?>
                                                                      <div class="imageGallery" id="imageGallery<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
" style="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>width: 49%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>width: 32%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>width: 24%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>width: 19%;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>width: 15.5%;<?php else: ?>width:49%;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif;  if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>">
                                                                           <div class="aspectratioline"></div>
                                                                           <div class="image_container"> <img width="100%" height="200" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
"> </div>
                                                                           <div class="galleryimageInn"> <a onclick="deleteGalImg('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
');" class="galleryimage"><i class="fa fa-trash-o"></i></a> <a class="galleryimage galleryimagecomm" id="galleryPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showGaleryPopup('galPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"><i class="fa fa-plus-square-o"></i></a> </div>
                                                                      </div>
                                                                      <?php endfor; endif; ?>
                                                                      
                                                                      <?php else: ?>
                                                                                                                                            <div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                                                           <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                      </div>
                                                                      <form  class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
                                                                           <label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                                                           <div class="button">
                                                                                <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showgalleryFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
                                                                           </div>
                                                                           <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                           </label>
                                                                      </form>
                                                                      <?php endif; ?> </div>
                                                                 <!--Gallery Image Popup-->
                                                                 <div id="galPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" style="display:none;" class="galleryimagepop">
                                                                      <form name="galleryPopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post">
                                                                           <div class="leftside"> <i class="fa fa-picture-o"></i>
                                                                                <div class="clr"></div>
                                                                                <a onclick="showgalleryFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" style="cursor:pointer;"><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</a> </div>
                                                                           <div class="rightside">
                                                                                <label><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</label>
                                                                                <select class="columnOption" name="column_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="column_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
                                                                                     <option value="2" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '2'): ?>selected<?php endif; ?>>2</option>
                                                                                     <option value="3" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '3'): ?>selected<?php endif; ?>>3</option>
                                                                                     <option value="4" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '4'): ?>selected<?php endif; ?>>4</option>
                                                                                     <option value="5" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '5'): ?>selected<?php endif; ?>>5</option>
                                                                                     <option value="6" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_column'] == '6'): ?>selected<?php endif; ?>>6</option>
                                                                                </select>
                                                                                <label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
                                                                                <select class="imagespacingOption" name="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="spacing_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Small'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_spacing'] == 'Large'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
                                                                                </select>
                                                                                <label><?php echo $this->_tpl_vars['LANG']['border_name']; ?>
</label>
                                                                                <select class="borderOption" name="border_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="border_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thin'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
</option>
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
                                                                                     <option value="<?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['gallery_border'] == 'Thick'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
</option>
                                                                                </select>
                                                                                <!--<label>Cropping</label>
							<select class="widthOption" name="croping_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="croping_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
">
								<option value="None">None</option>
								<option value="Square">Square</option>
								<option value="Rectangle">Rectangle</option>
							</select>-->
                                                                                <div class="clearfix">
                                                                                     <input type="button" class="btn btn-success pull-left" value="Kaydet" onclick="addgalleryProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
                                                                                     <input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
                                                                                </div>
                                                                           </div>
                                                                      </form>
                                                                 </div>
                                                                 <div id="galimgpopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="imagepopupdiv" style="display:none;">
                                                                      <div id="image-chooser-nav">
                                                                           <div id="image-chooser-nav-label">
                                                                                <div><?php echo $this->_tpl_vars['LANG']['select_image_from']; ?>
</div>
                                                                           </div>
                                                                           <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                                                                <div class="colWhite"> <span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>
 </div>
                                                                           </div>
                                                                           <div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();$('.loadmask').hide();">X</div>
                                                                      </div>
                                                                      <div id="browsebutton" class="popBrowseInner">                                                                            <div id='imageloadstatus' style="display:none;">
                                                                                <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                           </div>
                                                                           <form id="galimagephotogal<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both" >
                                                                                <div class="uploadTxtPop"><?php echo $this->_tpl_vars['LANG']['click_here_to_upload']; ?>
</div>
                                                                                <label for="file" class="input input-file no-mar" style="display:block"  name="imageloadbutton" id="imageloadbutton">
                                                                                <div class="button">
                                                                                     <input type="button" class="hei180" multiple value="" onclick="showgalleryFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" name="photos[]" id="galimgphoto" multiple="">
                                                                                </div>
                                                                                <input type='hidden' name="page_list_id"  value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                                </label>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                                 <div id="masktable" style="display:none;"></div>
                                                                 <!--Gallery Image Popup Ends-->
                                                            </li>
                                                            <?php endif; ?>
                                                            <!--Gallery Process End-->
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="settingControl">
                                                                           <div class="settingControlBg"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/setting.png" alt="" onclick="showMapPopUp('mapframe_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div class="moveicon"></div>
                                                                 <div class="map_resize">
                                                                      <iframe name="ifrm" id="ifrm<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
                                                                 </div>
                                                                 <div id="mapframe_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="mappop" style="display:none;">
                                                                      <div class="leftside"> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/map_marker.png" alt="map image"/>
                                                                           <label><?php echo $this->_tpl_vars['LANG']['map_name']; ?>
</label>
                                                                      </div>
                                                                      <div class="rightside">
                                                                           <form name="mapframepopup_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar" method="post">
                                                                                <label><?php echo $this->_tpl_vars['LANG']['address_name']; ?>
</label>
                                                                                <input class="mapinputTxt" type="text" name="addr_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="addr_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_addr']; ?>
">
                                                                                <label><?php echo $this->_tpl_vars['LANG']['zoom_name']; ?>
</label>
                                                                                                                                                                <input class="mapinputTxt" type="number" min="1" max="17" name="zoom_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="zoom_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_zoom']; ?>
" onkeypress="keypress();">
                                                                                <label>latitude</label>
                                                                                <input class="mapinputTxt" type="text" readonly name="lat_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="lat_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lat']; ?>
">
                                                                                <label>longtitude</label>
                                                                                <input class="mapinputTxt" type="text" readonly  name="lon_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="lon_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['map_lon']; ?>
">
                                                                                <div class="mapButton clearfix">
                                                                                     <input type="button" value="Kaydet" class="btn btn-success pull-left"  onclick="addMapProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" />
                                                                                     <input type="button" value="cancel" class="btn btn-danger pull-right mapcancel" />
                                                                                </div>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <!--slider process start-->
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['slider']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','slider');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <div id="sliImg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid hoverSlide"> <?php echo $this->_tpl_vars['objCommon']->getSliderImageNew($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                                      <div id="slider_images" class="buildColumnPageSlider" style="<?php if ($this->_tpl_vars['slider_images']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
                                                                           <ul class="responsive_slideshow columnslide">
                                                                                <?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['slider_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sliimg']['show'] = true;
$this->_sections['sliimg']['max'] = $this->_sections['sliimg']['loop'];
$this->_sections['sliimg']['step'] = 1;
$this->_sections['sliimg']['start'] = $this->_sections['sliimg']['step'] > 0 ? 0 : $this->_sections['sliimg']['loop']-1;
if ($this->_sections['sliimg']['show']) {
    $this->_sections['sliimg']['total'] = $this->_sections['sliimg']['loop'];
    if ($this->_sections['sliimg']['total'] == 0)
        $this->_sections['sliimg']['show'] = false;
} else
    $this->_sections['sliimg']['total'] = 0;
if ($this->_sections['sliimg']['show']):

            for ($this->_sections['sliimg']['index'] = $this->_sections['sliimg']['start'], $this->_sections['sliimg']['iteration'] = 1;
                 $this->_sections['sliimg']['iteration'] <= $this->_sections['sliimg']['total'];
                 $this->_sections['sliimg']['index'] += $this->_sections['sliimg']['step'], $this->_sections['sliimg']['iteration']++):
$this->_sections['sliimg']['rownum'] = $this->_sections['sliimg']['iteration'];
$this->_sections['sliimg']['index_prev'] = $this->_sections['sliimg']['index'] - $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['index_next'] = $this->_sections['sliimg']['index'] + $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['first']      = ($this->_sections['sliimg']['iteration'] == 1);
$this->_sections['sliimg']['last']       = ($this->_sections['sliimg']['iteration'] == $this->_sections['sliimg']['total']);
?>
                                                                                <li class="imageSlider"> <img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
"/> </li>
                                                                                <?php endfor; endif; ?>
                                                                           </ul>
                                                                           <div class="clr"></div>
                                                                      </div>
                                                                      <div id="sliderform"> <?php if ($this->_tpl_vars['slider_images']): ?> <a class="ColsliderNoImg2" onclick="return showsliderFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">Düzenle</a> <?php endif; ?>
                                                                           <?php if (! $this->_tpl_vars['slider_images']): ?> <a class="ColsliderNoImg1" onclick="return showsliderFuncForColumn('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"></a> <?php endif; ?> </div>
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <!--slider process end-->
                                                            <!--Google Adsense Start-->
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_adsense']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','google_adsense');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <input type='radio' name="google_ads" id="google_ads_script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="scriptImgInput" value="script" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                 <label class="scriptImg" for="google_ads_script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                 <div class="scriptInner">
                                                                      <div class="scriptImage"><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</div>
                                                                 </div>
                                                                 </label>
                                                                 <input type='radio' name="google_ads" id="google_ads_image_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="imgaeImgInput" value="image" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                 <label class="imgaeImg" for="google_ads_image_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                 <div class="imageInner">
                                                                      <div class="imageHead"><?php echo $this->_tpl_vars['LANG']['image_name']; ?>
</div>
                                                                      <div class="imageImage"></div>
                                                                 </div>
                                                                 </label>
                                                                 <div id="script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="addGoogPop">
                                                                      <div class="leftside"> <i class="fa fa-file-text-o fontSize42"></i>
                                                                           <label><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</label>
                                                                      </div>
                                                                      <div class="rightside">
                                                                           <form name="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
                                                                                <label><?php echo $this->_tpl_vars['LANG']['adress_name']; ?>
</label>
                                                                                <input type="hidden" name="script" id="script" value="script">
                                                                                <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"   placeholder="Enter your script" ><?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>
</textarea>
                                                                                <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                                <div class="mapButton clearfix">
                                                                                     <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
                                                                                     <input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#script_'+<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
).hide();"/>
                                                                                </div>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                                 <!--<div id="script_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'script'): ?>  style="display:block;"<?php else: ?>style="display:none;" <?php endif; ?>>
					<form name="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"  id="script_google_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
					<input type="hidden" name="script" id="script" value="script">
					 <textarea name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="google_ansen" placeholder="Enter your script" ><?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_script_text']; ?>
</textarea>
					 <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
					 <input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');">
					</form>  
				</div>-->
                                                                 <?php echo $this->_tpl_vars['objCommon']->getImageGoogle($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                                 <div id="images_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="row-fluid" <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['google_ads'] == 'image'): ?>  style="display:block;" <?php else: ?>style="display:none;" <?php endif; ?>> <?php if (! $this->_tpl_vars['images_google']): ?>
                                                                      
                                                                                                                                            <div id='imageloadstatus_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' style='display:none'> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>
                                                                      <form id="imageform_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
                                                                           <label id='imageloadbutton_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                                                           <div class="button">
                                                                                <input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"/>
                                                                           </div>
                                                                           <input type='hidden' name="image" id="image" value="image"/>
                                                                           <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                           </label>
                                                                      </form>
                                                                      <?php else: ?>
                                                                      <div class="googAddOption"> <img width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_height'];  else: ?>180<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
">
                                                                           <!--<img width="<?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width']):  echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"> -->
                                                                           <div class="googAddDelete"> <a class="galleryimage" onclick="deletegoogleImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
');"> <i class="fa fa-trash-o"></i> </a> </div>
                                                                           <a class="googAddUrl" onclick="showAddUrl('urladd_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');"> <?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</a> </div>
                                                                      <div id="urladd_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="addGoogPop" style="display:none;">
                                                                           <div class="leftside"> <i class="fa fa-external-link fontSize42"></i>
                                                                                <label><?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</label>
                                                                           </div>
                                                                           <div class="rightside">
                                                                                <form name="imagetxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="imagetxt_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" method="post" action="">
                                                                                     <label><?php echo $this->_tpl_vars['LANG']['url_name']; ?>
</label>
                                                                                     <input type="text" name="image_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" id="image_text_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="google_url_text" value="<?php echo $this->_tpl_vars['images_google']['0']['google_url']; ?>
">
                                                                                     <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
"/>
                                                                                     <input type='hidden' name="google_image_id" id="google_image_id" value="<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
"/>
                                                                                     <div class="mapButton clearfix">
                                                                                          <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
');">
                                                                                          <input type="button" value="Vazgeç" class="btn btn-danger pull-right addGoogCancel" onclick="$('#urladd_'+<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
).hide();" />
                                                                                     </div>
                                                                                </form>
                                                                           </div>
                                                                      </div>
                                                                      <?php endif; ?> </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <!--Google Adsense End-->
                                                            <?php if ($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['file']): ?>
                                                            <li id="page_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                                                                 <div class="form_element_control">
                                                                      <div class="controlMidOuter">
                                                                           <div class="controlMidBg"></div>
                                                                      </div>
                                                                      <div class="deleteOuter">
                                                                           <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','file');"><i class="fa fa-trash-o"></i></div>
                                                                      </div>
                                                                 </div>
                                                                 <?php echo $this->_tpl_vars['objCommon']->getFile_name_build($this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']); ?>

                                                                 <div class="columnbgmask"></div>
													<div id="fileTool" class="width100 block fileTool" style="background:url(<?php echo $this->_tpl_vars['extimg']; ?>
) no-repeat left top"  onclick="$('#uploadFilePopup<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').show();$('.columnbgmask').show();$('.bgmaskTop,.bgmaskTopLine').show();$('.arrow').addClass('arrowhide');">
                                                                      <div class="filename"><?php echo $this->_tpl_vars['files']['0']['original_name']; ?>
</div>                                                                      
                                                                      <a><?php if ($this->_tpl_vars['files']['0']['original_name'] == ''): ?>Dosya yüklemek için tıklayın<?php else: ?>Dosyayı İndir<?php endif; ?></a> </div>
                                                                 <div id="uploadFilePopup<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="all_popup" style="display:none;">
                                                                      <div id="image-chooser-nav">
                                                                           <div id="image-chooser-nav-label">
                                                                                <div><?php echo $this->_tpl_vars['LANG']['select_files_from']; ?>
</div>
                                                                           </div>
                                                                           <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                                                                <div class="colWhite"> <span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>
 </div>
                                                                           </div>
                                                                           <div class="close PopCloseButt btn btn-danger" onclick="$('#uploadFilePopup<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
').hide();$('.columnbgmask').hide();$('.bgmaskTop,.bgmaskTopLine').hide();$('.arrow').removeClass('arrowhide');">X</div>
                                                                      </div>
                                                                      <div id="browsebutton" class="popBrowseInner">
                                                                           <div id='preview'></div>
                                                                           <div id='imageloadstatuslogo' style="display:none;">
                                                                                <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                                           </div>
                                                                           <form id="fileform<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxFileUpload.php' style="clear:both">
                                                                                <input type="hidden" name="page_list_id" value="<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" />
                                                                                <div class="uploadTxtPop">Dosya yüklemek için tıklayın</div>
                                                                                <label for="file_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
                                                                                <div class="button">
                                                                                     <input type="file" id="file_<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
" onchange="fileUpload('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
');" name="files" />
                                                                                </div>
                                                                                <input type='hidden' name="status" value="domainlogo"/>
                                                                                </label>
                                                                           </form>
                                                                      </div>
                                                                 </div>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php endfor; endif; ?>
                                                            <?php else: ?>
                                                            <div class="columnDragTxt">MODÜLLERİ BURAYA SÜRÜKLEYİP BIRAKIN</div>
                                                            <?php endif; ?>
                                                       </ul>
                                                       <!---column sortable--->
                                                       </div>
                                                       <?php endfor; endif; ?>
													 </div>
                                        </div>
                                   </li>
                              </ul>
                         </li>
                         <?php endif; ?>
                         <!--</div>-->
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['title_select']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','title_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildTitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onblur="updateTitle('buildTitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" onkeydown="updateTitle('buildTitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="themehead <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_title" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildTitle_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_title_line_size']; ?>
px;<?php endif; ?>" contenteditable="true"  data-ph="Başlığı Düzenle" ><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_title'];  endif; ?></div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['description_select']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','description_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildPara_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_paragraph" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['buildPara_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_paragraph_line_size']; ?>
px;<?php endif; ?>" onblur="updateDesc('buildPara_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" onkeydown="updateDesc('buildPara_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" contenteditable="true"  data-ph="Paragrafı Düzenle" ><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description']):  echo ((is_array($_tmp=$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['text_description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['divider']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','divider');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildDivide" class="">
                                   <hr />
                              </div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_multiple_select']): ?>
                         <?php echo $this->_tpl_vars['objCommon']->getImageText($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist'],'singletext'); ?>

                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','image_multiple_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildImgTxt_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="buildImgTxtOuter">
                                   <div class="row-fluid ">
                                        <div class="pull-left marginRight15 buildImgTxt <?php if (! $this->_tpl_vars['images']): ?>minimagewidth<?php endif; ?>"> <?php if (! $this->_tpl_vars['images']): ?>	
                                                                                          <div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                                  <div class="laodImgChange"> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/> </div>
                                             </div>
                                             <form  method="post" class="form-horizontal sky-form" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
                                                  <label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                                  <div class="button">
                                                       <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showImageTxtPopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
                                                  </div>
                                                  <input type='hidden' name="status" value="singletext"/>
                                                  <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                                  </label>
                                             </form>
                                             <!--<div class="hideupload">
<div id="mulitplefileuploader_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">Upload</div>
<img width="93%" height="180" class="uploadedImg" id="image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" src="" />																			<div id="progressbar">0 %</div>
</div>-->
                                             <?php else: ?>
                                             <div class="uploadImgBg"> 
											 	<img class="imagechangeNew" width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  endif; ?>" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" onclick="showImageTxtPopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
												                                                   <div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                                       <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                                  </div>
                                                  <form  method="post" class="form-horizontal sky-form uploadsecbg" style="display:none;" enctype="multipart/form-data" action='ajaxImageUpload.php'>
                                                  <label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
                                                  <div class="button">
                                                       <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showImageTxtPopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
                                                  </div>
                                                  <input type='hidden' name="status" value="singletext"/>
                                                  <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                                  </label>
                                                  </form>
                                             </div>
                                             <?php endif; ?> </div>
                                        <div class="span9">
                                             <div id="imgtitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onblur="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" onkeydown="updateImgTitle('imgtitle_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="themehead borNone <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text'] == ''): ?>clickheretext contenttext <?php endif; ?>contentedit main_imagetitle" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontcolor']): ?>color:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['imgtitle_fontcolor'];  endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_style']): ?>font-family:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_line_size']): ?>line-height:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_size']): ?>font-size:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['main_imagetitle_font_size']; ?>
px;<?php endif; ?>" contenteditable="true" data-ph="Resim Seç ve Metni Düzenle" ><?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_text'];  endif; ?></div>
                                        </div>
                                   </div>
                              </div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['image_select']): ?>
                         <?php echo $this->_tpl_vars['objCommon']->getImage($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="settingControl">
                                     <div class="settingControlBg" onclick="$('#imagealignPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
').show();$('#loadmask').show();" ><img src="http://www.enkolayweb.com/images/setting.png" /></div>
                                  </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','image_select');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="buildImg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid buildimage" title="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="">
                              <?php if (! $this->_tpl_vars['images']): ?>
                              <div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                   <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                              </div>
                              <form  class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
                                   <label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                   <div class="button">
                                        <input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showSinglePopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
                                   </div>
                                   <input type='hidden' name="status" value="single"/>
                                   <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                   </label>
                              </form>
                              <input type="hidden" name="imagesuploadNumbers" id="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                              <!--<div class="hideupload">
<div id="mulitplefileuploader_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">Upload</div>
<img width="93%" height="180" class="uploadedImg" id="image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" src="" />
<div id="progressbar">0 %</div>

</div>-->
                              <?php else: ?>
                              <?php echo $this->_tpl_vars['objCommon']->getImageAlign($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                              <div class="uploadImgBg" id="alignto<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="text-align:<?php echo $this->_tpl_vars['alignment']; ?>
"> 
							<a><img class="imagechange"  src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  endif; ?>" onclick="showSinglePopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/></a> 
                                   <div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                        <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                   </div>
                                   <form class="clr form-horizontal sky-form uploadsecbg" style="display:none;" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php'>
								<label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block" for="file">
								<div class="button">
									<input type='button' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile"/>
								</div>
								<input type='hidden' name="status" value="single"/>
								<input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
								</label>
                                   </form>
                              </div>
						
                              <?php endif; ?>
						</div>
                              <div class="imagealignPopup" id="imagealignPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="display:none;">
                                   <div class="youtubepopclose" onclick="$(this).parent().hide();" ></div>
                                   <div class="contactlabelsPopupRight">
                                        <div class="contactlabelsPopupRightInner">
                                             <label class="span5 right">Hizalama</label>
                                             <select id="imgalign<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="alignOption span6" onchange="alignmentImage('alignto<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
',this);">
                                                  <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['single_img_alignment'] == 'left'): ?>selected="selected"<?php endif; ?> value="left">sol</option>
                                                  <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['single_img_alignment'] == 'center'): ?>selected="selected"<?php endif; ?>value="center">merkez</option>
                                                  <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['single_img_alignment'] == 'right'): ?>selected="selected"<?php endif; ?>value="right">sağ</option>
                                             </select>
                                        </div>
                                        <div class="center">
                                             <input type="button" onclick="updatealign_image('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
')" value="Kaydet" class="videosubmit"/>
                                        </div>
                                   </div>
                              </div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['contact_form']): ?>
                         <?php echo $this->_tpl_vars['objCommon']->getAllContactDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                         <?php echo $this->_tpl_vars['objCommon']->getContactFormFields($_SESSION['domain_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','contact_form');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="" class="contactform clearfix">
                                   <!--<div  onclick="showContactMail();">
Form Entries
</div>-->
                                   <a data-toggle="modal" href="#ModalFormEntry_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="btn btn-warning pull-right">Form Girişleri</a> <a onclick="ShowContactForm_fieldspopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" class="btn btn-success">Özel Alan Ekle</a>
                                   <div class="themeheadsec contentedit <?php if ($this->_tpl_vars['contactlist']['0']['title_head'] == ''): ?>clickheretext contenttext <?php endif; ?>contactTxt contactHead" style="<?php if ($this->_tpl_vars['contactlist']['0']['buildContact_fontsize']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontsize']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_fontcolor']): ?>color:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_fontcolor'];  endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_style']): ?>font-family:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_style']; ?>
;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_line_size']): ?>line-height:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_line_size']; ?>
px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['buildContact_font_size']): ?>font-size:<?php echo $this->_tpl_vars['contactlist']['0']['buildContact_font_size']; ?>
px;<?php endif; ?>" id="buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
" onblur="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
'); 55555" onkeydown="updateContactFormTitle('buildContact_<?php echo $this->_tpl_vars['contactlist']['0']['id']; ?>
');" data-ph="Başlığı Düzenle"><?php if ($this->_tpl_vars['contactlist']['0']['title_head']):  echo $this->_tpl_vars['contactlist']['0']['title_head'];  endif; ?></div>
                                   <div class="row-fluid">
                                        <div class="span4 relatepop">
                                             <div class="span12 contactLisNav"><span onclick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');"><?php echo $this->_tpl_vars['contactlist']['0']['text1']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text1_required']): ?><span class="red">*</span><?php endif; ?></div>
                                             <input type="text" value="" placeholder="Ad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text1_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','1');">
                                             <?php if ($this->_tpl_vars['contactlist']['0']['text1_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text1_instruction']; ?>
</span><?php endif; ?> </div>
                                        <div class="span4 relatepop">
                                             <div class="span12 contactLisNav"><span onclick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');"><?php echo $this->_tpl_vars['contactlist']['0']['text2']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text2_required']): ?><span class="red">*</span><?php endif; ?></div>
                                             <input type="text" value="" placeholder="Soyad" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text2_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','2');">
                                             <?php if ($this->_tpl_vars['contactlist']['0']['text2_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text2_instruction']; ?>
</span><?php endif; ?> </div>
                                   </div>
                                   <div class="span4 offset0 marTop10 relatepop clr">
                                        <div class="span12 contactLisNav"><span onclick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');"><?php echo $this->_tpl_vars['contactlist']['0']['text3']; ?>
</span> <?php if ($this->_tpl_vars['contactlist']['0']['text3_required']): ?><span class="red">*</span><?php endif; ?></div>
                                        <input type="text" value="" placeholder="E-posta" class="contacttxtbx" style="<?php if ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text3_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','3');">
                                        <?php if ($this->_tpl_vars['contactlist']['0']['text3_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text3_instruction']; ?>
</span><?php endif; ?> </div>
                                   <div class="span4 offset0 marTop10 relatepop clr">
                                        <div class="span12 contactLisNav"><span onclick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"><?php echo $this->_tpl_vars['contactlist']['0']['text4']; ?>
</span><?php if ($this->_tpl_vars['contactlist']['0']['text4_required']): ?><span class="red">*</span><?php endif; ?></div>
                                        <textarea class="contacttxtarea" style="<?php if ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Small'): ?>width:50%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['contactlist']['0']['text4_width'] == 'Large'): ?>width:100%;<?php endif; ?>" onClick="showPopup('<?php echo $this->_tpl_vars['contactlist']['0']['page_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['page_list_id']; ?>
','<?php echo $this->_tpl_vars['contactlist']['0']['domain_id']; ?>
','4');"></textarea>
                                        <?php if ($this->_tpl_vars['contactlist']['0']['text4_instruction']): ?><span class="instruction-right left"><?php echo $this->_tpl_vars['contactlist']['0']['text4_instruction']; ?>
</span><?php endif; ?> </div>
                                   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "contactform_fields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                   <div class="span4 offset0 marTop10 relatepop clr">
                                        <div class="buildPagePostButtonLeft">
                                             <input type="submit" value="Gönder" class="buildPagePostButton">
                                        </div>
                                   </div>
                              </div>
                                                            <div id="modals">
                                   <div id="ModalFormEntry_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="modal hide contact_form_show">
                                        <div class="formEntryPopForm clearfix">
                                             <div class="preview_image">Form Girişleri</div>
                                             <div id="errtext"></div>
                                             <?php echo $this->_tpl_vars['objCommon']->getEmai($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                                             <form class="clearfix" name="conatctmail_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" class="no-mar">
                                                  <div id="errtext"></div>
                                                  <input type="text" name="contactmail" id="contactmail_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['mailid']; ?>
" >
                                                  <button class="close formEntryPopFormClose btn marTop10" data-dismiss="modal" aria-hidden="true">close</button>
                                                  <input type="button" class="btn btn-info pull-right marTop10" name="submit" value="Gönder" onclick="changeMail('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                                             </form>
                                             
                                        </div>
                                   </div>
                              </div>
                              <div id="contactForm"></div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugins']): ?>
                         <?php echo $this->_tpl_vars['objCommon']->getSocialDetails($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="settingControl">
                                     <div onclick="showSocialPopup(<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
);" class="settingControlBg"><img src="http://www.enkolayweb.com/images/setting.png"></div>
                                  </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div class="moveicon"></div>
                              <div id="buildSocial_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="buildSocialIcon" style="text-align:<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugin_alignment']; ?>
" >
                                   <input type="button" class="fbicon" value="" />
                                   <input type="button" class="twittericon" value="" />
                                   <input type="button" class="linkedicon" value="" />
                                   <input type="button" class="mailicon" value="" />
                              </div>
                              <div id="pluginShow_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="galleryimagepop socialPop" style="display:none;">
                                   <div class="leftside"> <i class="fa fa-users fontSize42"></i>
                                        <label><?php echo $this->_tpl_vars['LANG']['social_link_name']; ?>
</label>
                                   </div>
                                   <div class="rightside">
                                        <form class="no-mar" id="socialplugin_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" name="socialplugin" method="post">
                                             <input type="hidden" name="domain_id" id="domain_id_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['domain_id']; ?>
">
                                             <input type="hidden" name="page_id" id="page_id_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['page_id']; ?>
">
                                             <input type="hidden" name="page_list_id" id="page_list_id_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                             <div class="socialInn clearfix"> <span><i class="fa fa-facebook"></i></span>
                                                  <input type="text" name="fb" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['fb']; ?>
" id="fb_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="http://facebook.com/ornek">
                                             </div>
                                             <div class="socialInn clearfix"> <span><i class="fa fa fa-tumblr"></i></span>
                                                  <input type="text" name="tw" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['twitter']; ?>
" id="tw_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="http://twitter.com/ornek">
                                             </div>
                                             <div class="socialInn clearfix"> <span><i class="fa fa-linkedin"></i></span>
                                                  <input type="text" name="ln" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['linkedin']; ?>
" id="ln_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="http://linkedin.com/in/ornek">
                                             </div>
                                             <div class="socialInn clearfix"> <span><i class="fa fa fa-envelope-o"></i></span>
                                                  <input type="text" name="mail" value="<?php echo $this->_tpl_vars['socialpagelist']['0']['mail']; ?>
" id="mail_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" placeholder="ornek@ornek.com">
                                             </div>
                                             <label>Hizalama</label>
                                             <select id="socialalign<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="socialignOption" onchange="socialaligns('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
')">
                                                  <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugin_alignment'] == 'left'): ?>selected="selected"<?php endif; ?> value="left">sol</option>
                                                  <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugin_alignment'] == 'center'): ?>selected="selected"<?php endif; ?>value="center">merkez</option>
                                                  <option <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['social_plugin_alignment'] == 'right'): ?>selected="selected"<?php endif; ?>value="right">sağ</option>
                                             </select>
                                             <div class="mapButton clearfix">
                                                  <input type="button" class="btn btn-success pull-left" name="submit" value="Kaydet" onclick="updateSocial('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                                                  <input type="button" class="btn btn-danger pull-right addGoogCancel" name="cancel" value="Vazgeç" onclick="$('#pluginShow_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
').hide();">
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['youtube_video']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"></div>
                                   </div>
                                   <div class="settingControl">
                                        <div class="settingControlBg"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/setting.png" alt=""  onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','youtube_video');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <?php echo $this->_tpl_vars['objCommon']->getYoutubeDetails_buildpage($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                              <div class="youtubeDiv clearfix" id="youtubeDiv_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showVideoPopup('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" style="display:block;<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>margin:0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>margin:5px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>margin:10px 0px;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>margin:15px 0px;<?php endif;  if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>width:50%; height:250px; margin-left:auto; margin-right:auto;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>width:70%;<?php elseif ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>width:100%;<?php endif; ?>">
                                   <iframe name="ifrm" id="ifrm" frameborder="0" allowfullscreen="" src="<?php if ($this->_tpl_vars['youtubelist']['0']['youtube_url'] != ''):  echo $this->_tpl_vars['youtubelist']['0']['youtube_url'];  else:  echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/youtubeLogo.png<?php endif; ?>" width="100%" height="200"></iframe>
                              </div>
                              <div class="galleryimagepop youtubelabelsPopup" id="youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="display:none;">
                                   <div class="youtubepopclose 7" onclick="popcloseforutubeurl('youtubelabelsPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"></div>
                                   <form name="youtubefrm_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post">
                                        <div id="error_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"></div>
                                        <div class="contactlabelsPopupLeft">
                                             <label>Youtube Video Adresi</label>
                                             <input type="text" class="videoUrl" name="videourl_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="videourl_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['youtubelist']['0']['youtube_url']; ?>
"/>
                                        </div>
                                        <div class="contactlabelsPopupRight">
                                             <div class="contactlabelsPopupRightInner">
                                                  <label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
                                                  <select class="spacingOption" name="spacing" id="spacing_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                                       <option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'None'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
                                                       <option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Small'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
                                                       <option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Medium'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
                                                       <option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_spacing'] == 'Large'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
                                                  </select>
                                                  <label>Genişlik</label>
                                                  <select class="widthOption" name="width_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="width_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                                       <option value="Küçük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Small'): ?>selected="selected"<?php endif; ?>>Küçük</option>
                                                       <option value="Orta" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Medium'): ?>selected="selected"<?php endif; ?>>Orta</option>
                                                       <option value="Büyük" <?php if ($this->_tpl_vars['youtubelist']['0']['youtube_width'] == 'Large'): ?>selected="selected"<?php endif; ?>>Büyük</option>
                                                  </select>
                                             </div>
                                             <div>
                                                  <input type="button" value="Kaydet" class="videosubmit"  onclick="addYoutubeUrl('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" />
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </li>
                         <?php endif; ?>
                         <!--Gallery Process Start-->
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','gallery');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="galImg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid center gallery_wrapper"> <?php echo $this->_tpl_vars['objCommon']->getGalleryImage($_SESSION['domain_id'],$_SESSION['page_id'],$this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                                   <?php if ($this->_tpl_vars['images']): ?>
                                   <?php unset($this->_sections['galimg']);
$this->_sections['galimg']['name'] = 'galimg';
$this->_sections['galimg']['loop'] = is_array($_loop=($this->_tpl_vars['images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['galimg']['show'] = true;
$this->_sections['galimg']['max'] = $this->_sections['galimg']['loop'];
$this->_sections['galimg']['step'] = 1;
$this->_sections['galimg']['start'] = $this->_sections['galimg']['step'] > 0 ? 0 : $this->_sections['galimg']['loop']-1;
if ($this->_sections['galimg']['show']) {
    $this->_sections['galimg']['total'] = $this->_sections['galimg']['loop'];
    if ($this->_sections['galimg']['total'] == 0)
        $this->_sections['galimg']['show'] = false;
} else
    $this->_sections['galimg']['total'] = 0;
if ($this->_sections['galimg']['show']):

            for ($this->_sections['galimg']['index'] = $this->_sections['galimg']['start'], $this->_sections['galimg']['iteration'] = 1;
                 $this->_sections['galimg']['iteration'] <= $this->_sections['galimg']['total'];
                 $this->_sections['galimg']['index'] += $this->_sections['galimg']['step'], $this->_sections['galimg']['iteration']++):
$this->_sections['galimg']['rownum'] = $this->_sections['galimg']['iteration'];
$this->_sections['galimg']['index_prev'] = $this->_sections['galimg']['index'] - $this->_sections['galimg']['step'];
$this->_sections['galimg']['index_next'] = $this->_sections['galimg']['index'] + $this->_sections['galimg']['step'];
$this->_sections['galimg']['first']      = ($this->_sections['galimg']['iteration'] == 1);
$this->_sections['galimg']['last']       = ($this->_sections['galimg']['iteration'] == $this->_sections['galimg']['total']);
?>
                                   <div class="imageGallery" id="imageGallery<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '2'): ?>width: 49.95%; min-height:299px;max-height:299px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '3'): ?>width: 33.28%;min-height:199px;max-height:199px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '4'): ?>width: 24.95%;min-height:150px;max-height:150px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '5'): ?>width: 19.95%;min-height:120px;max-height:120px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '6'): ?>width: 16.62%;min-height:100px;max-height:100px;<?php else: ?>width:49.95%;min-height:299px;max-height:299px;<?php endif;  if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'None'): ?>margin: 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Small'): ?>margin: 5px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Medium'): ?>margin: 10px 0px;<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Large'): ?>margin: 15px 0px;<?php else: ?>margin: 0px;<?php endif; ?>" onclick="showGaleryPopup('galPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                                        <div class="aspectratioline"></div>
                                        <div class="image_container"> <img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name_thumb']; ?>
" style="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'None'): ?>border: 0px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thin'): ?>border: 2px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Medium'): ?>border: 3px solid rgb(221, 221, 221);<?php elseif ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thick'): ?>border: 4px solid rgb(221, 221, 221);<?php else: ?>border: 0px solid rgb(221, 221, 221);<?php endif; ?>"> </div>
                                        <div class="galleryimageInn"> <a onclick="deleteGalImg('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
','<?php echo $this->_tpl_vars['images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
');" class="galleryimage"><i class="fa fa-trash-o"></i></a>
                                             <!--<a class="galleryimage galleryimagecomm" id="galleryPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showGaleryPopup('galPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"><i class="fa fa-plus-square-o"></i></a>-->
                                        </div>
                                   </div>
                                   <?php endfor; endif; ?>
                                   
                                   <?php else: ?>
                                                                      <div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'>
                                        <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                   </div>
                                   <form class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
                                        <label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                        <div class="button">
                                             <input type='button'  id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onclick="showgalleryFunc('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" multiple/>
                                        </div>
                                        <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                        </label>
                                   </form>
                                   <?php endif; ?> </div>
                              <!--Gallery Image Popup-->
                              <div id="galPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" style="display:none;" class="galleryimagepop">
                                   <form name="galleryPopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post">
                                        <div class="leftside"> <i class="fa fa-picture-o"></i>
                                             <div class="clr"></div>
                                             <!--<a onclick="$('#galimgpopup_'+<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
).show();$('.loadmask').show();"><?php echo $this->_tpl_vars['LANG']['image_add_change']; ?>
</a>-->
                                             <a onclick="showgalleryFunc('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
').show();$('.loadmask').show();">Add / Edit Images</a> </div>
                                        <div class="rightside">
                                             <label><?php echo $this->_tpl_vars['LANG']['add_image_name']; ?>
</label>
                                             <select class="columnOption" name="column_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="column_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                                  <option value="2" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '2'): ?>selected<?php endif; ?>>2</option>
                                                  <option value="3" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '3'): ?>selected<?php endif; ?>>3</option>
                                                  <option value="4" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '4'): ?>selected<?php endif; ?>>4</option>
                                                  <option value="5" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '5'): ?>selected<?php endif; ?>>5</option>
                                                  <option value="6" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_column'] == '6'): ?>selected<?php endif; ?>>6</option>
                                             </select>
                                             <label><?php echo $this->_tpl_vars['LANG']['spacing_name']; ?>
</label>
                                             <select class="imagespacingOption" name="spacing_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="spacing_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['small_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Small'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['small_name']; ?>
</option>
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['large_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_spacing'] == 'Large'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['large_name']; ?>
</option>
                                             </select>
                                             <label><?php echo $this->_tpl_vars['LANG']['border_name']; ?>
</label>
                                             <select class="borderOption" name="border_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="border_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'None'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['for_none_name']; ?>
</option>
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thin'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thin_name']; ?>
</option>
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Medium'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['medium_name']; ?>
</option>
                                                  <option value="<?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['gallery_border'] == 'Thick'): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['LANG']['thick_name']; ?>
</option>
                                             </select>
                                             <!--<label>Cropping</label>
<select class="widthOption" name="croping_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="croping_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
">
<option value="None">None</option>
<option value="Square">Square</option>
<option value="Rectangle">Rectangle</option>
</select>-->
                                             <div class="clearfix">
                                                  <input type="button" class="btn btn-success pull-left" value="Kaydet" onclick="addgalleryProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" />
                                                  <input type="button" class="btn btn-danger pull-right gallerycancel" value="cancel" />
                                             </div>
                                        </div>
                                   </form>
                              </div>
                              <div id="modals">
                                   <div id="galimgpopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="all_popup" style="display:none;">
                                        <div id="image-chooser-nav">
                                             <div id="image-chooser-nav-label">
                                                  <div><?php echo $this->_tpl_vars['LANG']['select_image_from']; ?>
</div>
                                             </div>
                                             <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                                  <div class="colWhite"> <span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>
 </div>
                                             </div>
                                             <div class="close PopCloseButt btn btn-danger" onclick="$('#galimgpopup_'+<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
).hide();$('.loadmask').hide();">X</div>
                                        </div>
                                        <div id="browsebutton" class="popBrowseInner">                                              <div id='imageloadstatus' style="display:none;">
                                                  <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                             </div>
                                             <form id="galimagephotogal<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxGalleryImageUpload.php' style="clear:both">
                                                  <div class="uploadTxtPop"><?php echo $this->_tpl_vars['LANG']['click_here_to_upload']; ?>
</div>
                                                  <label for="file" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
                                                  <div class="button">
                                                       <input type="file" class="hei180" value="" multiple onchange="galimagupdate('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
')" name="photos[]" id="galimgphoto">
                                                  </div>
                                                  <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                                  </label>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <!--Gallery Image Popup Ends-->
                         </li>
                         <?php endif; ?>
                         <!--Gallery Process End-->
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="settingControl">
                                        <div class="settingControlBg"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/setting.png" alt="" onclick="showMapPopUp('mapframe_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','social_plugins');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div class="moveicon"></div>
                              <div class="map_resize">
                                   <iframe  name="ifrm" id="ifrm<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" frameborder="0" allowfullscreen="" src="gmapPage.php?zoom=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_zoom']; ?>
&lat=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lat']; ?>
&lon=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lon']; ?>
&addr=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_addr']; ?>
&page_list_id=<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" width="100%" height="250"></iframe>
                              </div>
                              <div id="mapframe_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="mappop" style="display:none;">
                                   <div class="leftside"> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/map_marker.png" alt="map image"/>
                                        <label><?php echo $this->_tpl_vars['LANG']['map_name']; ?>
</label>
                                   </div>
                                   <div class="rightside">
                                        <form name="mapframepopup_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="no-mar" method="post">
                                             <label><?php echo $this->_tpl_vars['LANG']['address_name']; ?>
</label>
                                             <input class="mapinputTxt" type="text" name="addr_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="addr_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_addr']; ?>
">
                                             <label><?php echo $this->_tpl_vars['LANG']['zoom_name']; ?>
</label>
                                                                                          <input class="mapinputTxt" type="number" min="1" max="17" name="zoom_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="zoom_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"  value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_zoom']; ?>
" onKeyPress="keypress(event);">
                                             <label>Enlem</label>
                                             <input class="mapinputTxt" type="text" readonly  name="lat_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="lat_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lat']; ?>
">
                                             <label>Boylam</label>
                                             <input class="mapinputTxt" type="text" readonly  name="lon_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="lon_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['map_lon']; ?>
">
                                             <div class="mapButton clearfix">
                                                  <input type="button" value="Kaydet" class="btn btn-success pull-left"  onclick="addMapProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" />
                                                  <input type="button" value="Vazgeç" class="btn btn-danger pull-right mapcancel" />
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </li>
                         <?php endif; ?>
                         <!--slider process start-->
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['slider']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','slider');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <div id="sliImg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid hoverSlide"> <?php echo $this->_tpl_vars['objCommon']->getSliderImageNew($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                                   <div id="slider_images" class="buildPageSlider" style="<?php if ($this->_tpl_vars['slider_images']): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
                                        <ul class="responsive_slideshow nivoSliderImg">
                                             <?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['slider_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sliimg']['show'] = true;
$this->_sections['sliimg']['max'] = $this->_sections['sliimg']['loop'];
$this->_sections['sliimg']['step'] = 1;
$this->_sections['sliimg']['start'] = $this->_sections['sliimg']['step'] > 0 ? 0 : $this->_sections['sliimg']['loop']-1;
if ($this->_sections['sliimg']['show']) {
    $this->_sections['sliimg']['total'] = $this->_sections['sliimg']['loop'];
    if ($this->_sections['sliimg']['total'] == 0)
        $this->_sections['sliimg']['show'] = false;
} else
    $this->_sections['sliimg']['total'] = 0;
if ($this->_sections['sliimg']['show']):

            for ($this->_sections['sliimg']['index'] = $this->_sections['sliimg']['start'], $this->_sections['sliimg']['iteration'] = 1;
                 $this->_sections['sliimg']['iteration'] <= $this->_sections['sliimg']['total'];
                 $this->_sections['sliimg']['index'] += $this->_sections['sliimg']['step'], $this->_sections['sliimg']['iteration']++):
$this->_sections['sliimg']['rownum'] = $this->_sections['sliimg']['iteration'];
$this->_sections['sliimg']['index_prev'] = $this->_sections['sliimg']['index'] - $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['index_next'] = $this->_sections['sliimg']['index'] + $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['first']      = ($this->_sections['sliimg']['iteration'] == 1);
$this->_sections['sliimg']['last']       = ($this->_sections['sliimg']['iteration'] == $this->_sections['sliimg']['total']);
?>
                                             <li class="imageSlider"> <img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
"/> </li>
                                             <?php endfor; endif; ?>
                                        </ul>
                                        <div class="clr"></div>
                                   </div>
                                   <div id="sliderform"> <?php if ($this->_tpl_vars['slider_images']): ?> <a class="sliderNoImg2" onclick="return showsliderFunc('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">Düzenle</a> <?php endif; ?>
                                        <?php if (! $this->_tpl_vars['slider_images']): ?> <a class="sliderNoImg1" onclick="return showsliderFunc('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"></a> <?php endif; ?> </div>
                              </div>
                         </li>
                         <?php endif; ?>
                         <!--slider process end-->
                         <!--Google Adsense Start-->
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_adsense']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','google_adsense');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <input type='radio' name="google_ads" id="google_ads_script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="scriptImgInput" value="script" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'script'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                              <label class="scriptImg" for="google_ads_script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                              <div class="scriptInner">
                                   <div class="scriptImage"><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</div>
                              </div>
                              </label>
                              <input type='radio' name="google_ads" id="google_ads_image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="imgaeImgInput" value="image" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'image'): ?>checked="checked" <?php endif; ?> onclick="showDivForScript('images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                              <label class="imgaeImg" for="google_ads_image_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onclick="showDivForScript('images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                              <div class="imageInner">
                                   <div class="imageHead"><?php echo $this->_tpl_vars['LANG']['image_name']; ?>
</div>
                                   <div class="imageImage"></div>
                              </div>
                              </label>
                              <div id="script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="addGoogPop">
                                   <div class="leftside"> <i class="fa fa-file-text-o fontSize42"></i>
                                        <label><?php echo $this->_tpl_vars['LANG']['script_name']; ?>
</label>
                                   </div>
                                   <div class="rightside">
                                        <form name="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" action="">
                                             <label><?php echo $this->_tpl_vars['LANG']['adress_name']; ?>
</label>
                                             <input type="hidden" name="script" id="script" value="script">
                                             <textarea class="addGooginputTxt google_ansen" name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"   placeholder="Enter your script" ><?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_script_text']; ?>
</textarea>
                                             <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                             <div class="mapButton clearfix">
                                                  <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
                                                  <input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" />
                                             </div>
                                        </form>
                                   </div>
                              </div>
                              <!--<div id="script_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'script'): ?>  style="display:block;"<?php else: ?>style="display:none;" <?php endif; ?>>
<form name="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"  id="script_google_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" action="">
<input type="hidden" name="script" id="script" value="script">
<textarea name="google_script_text" id="google_script_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="google_ansen" placeholder="Enter your script" ><?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_script_text']; ?>
</textarea>
<input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
<input type="button" name="submit" value="Gönder" class="btn btn-success"  onclick="googleScriptSave('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');">
</form>  
</div>-->
                              <?php echo $this->_tpl_vars['objCommon']->getImageGoogle($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>

                              <div id="images_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="row-fluid" <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['google_ads'] == 'image'): ?>  style="display:block;" <?php else: ?>style="display:none;" <?php endif; ?>> <?php if (! $this->_tpl_vars['images_google']): ?>
                                                                      <div id='imageloadstatus_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' style='display:none'> <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/loadings.gif" alt="Uploading...."/></div>
                                   <form id="imageform_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form" method="post" enctype="multipart/form-data" action='ajaxGoogleImageUpload.php' style="clear:both">
                                        <label id='imageloadbutton_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
' class="input input-file" style="display:block; height:135px;" for="file">
                                        <div class="button">
                                             <input type='file' name="photos[]" id="photoimg_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="inputfile" onchange="imageUpdatingProcess('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"/>
                                        </div>
                                        <input type='hidden' name="image" id="image" value="image"/>
                                        <input type='hidden' name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                        </label>
                                   </form>
                                   <?php else: ?>
                                   <div class="googAddOption"> <img width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>" height="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_height'];  else: ?>180<?php endif; ?>" src="<?php echo $this->_tpl_vars['SITE_GOOGLE_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
"/> <img width="<?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width']):  echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['img_width'];  else: ?>100%<?php endif; ?>">
                                        <div class="googAddDelete"> <a class="galleryimage" onclick="deletegoogleImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_name']; ?>
');"> <i class="fa fa-trash-o"></i> </a> </div>
                                        <a class="googAddUrl" onclick="showAddUrl('urladd_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');"> <?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</a> </div>
                                   <div id="urladd_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="addGoogPop" style="display:none;">
                                        <div class="leftside"> <i class="fa fa-external-link fontSize42"></i>
                                             <label><?php echo $this->_tpl_vars['LANG']['add_url_name']; ?>
</label>
                                        </div>
                                        <div class="rightside">
                                             <form name="imagetxt_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="no-mar"  id="imagetxt_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" method="post" action="">
                                                  <label><?php echo $this->_tpl_vars['LANG']['url_name']; ?>
</label>
                                                  <input type="text" name="image_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" id="image_text_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="google_url_text" value="<?php echo $this->_tpl_vars['images_google']['0']['google_url']; ?>
">
                                                  <input type='hidden' name="page_list_id" id="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
"/>
                                                  <input type='hidden' name="google_image_id" id="google_image_id" value="<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
"/>
                                                  <div class="mapButton clearfix">
                                                       <input type="button" name="submit" value="Gönder" class="btn btn-success pull-left"  onclick="googleImageUrlSave('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_tpl_vars['images_google']['0']['google_image_id']; ?>
');">
                                                       <input type="button" value="cancel" class="btn btn-danger pull-right addGoogCancel" onclick="$('#urladd_'+<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
).hide();" />
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                                   <?php endif; ?> </div>
                         </li>
                         <?php endif; ?>
                         <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['file']): ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="activemove theme2bginn posRel">
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','file');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
                              <?php echo $this->_tpl_vars['objCommon']->getFile_name_build($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']); ?>
                           
                              <div class="bgmask"></div>                                        
                              <div id="fileTool" class="width100 block fileTool" style="background:url(<?php echo $this->_tpl_vars['extimg']; ?>
) no-repeat left top"  onclick="$('#uploadFilePopup<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
').show();$('.bgmask').show();$('.bgmaskTop,.bgmaskTopLine').show();$('.arrow').addClass('arrowhide');">
                                  <div class="filename"><?php echo $this->_tpl_vars['files']['0']['original_name']; ?>
</div>
                                   <a><?php if ($this->_tpl_vars['files']['0']['original_name'] == ''): ?>Dosya yüklemek için tıklayın<?php else: ?>Dosyayı İndir<?php endif; ?></a> </div>
                              <div id="uploadFilePopup<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="all_popup" style="display:none;">
                                   <div id="image-chooser-nav">
                                        <div id="image-chooser-nav-label">
                                             <div><?php echo $this->_tpl_vars['LANG']['select_files_from']; ?>
</div>
                                        </div>
                                        <div id="image-chooser-tab-computer" class="image-chooser-tab image-chooser-tab-selected">
                                             <div class="colWhite"> <span></span> <?php echo $this->_tpl_vars['LANG']['my_computer_name']; ?>
 </div>
                                        </div>
                                        <div class="close PopCloseButt btn btn-danger" onclick="$('#uploadFilePopup<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
').hide();$('.bgmask').hide();$('.bgmaskTop,.bgmaskTopLine').hide();$('.arrow').removeClass('arrowhide');">X</div>
                                   </div>
                                   <div id="browsebutton" class="popBrowseInner">
                                        <div id='preview'></div>
                                        <div id='imageloadstatuslogo' style="display:none;">
                                             <div class="laodImgChange"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/gifload.gif" alt="Uploading...."/></div>
                                        </div>
                                        <form id="fileform<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="form-horizontal sky-form no-mar" method="post" enctype="multipart/form-data" action='ajaxFileUpload.php' style="clear:both">
                                             <input type="hidden" name="page_list_id" value="<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" />
                                             <div class="uploadTxtPop">Dosya yüklemek için tıklayın</div>
                                             <label for="file_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="input input-file no-mar" style="display:block" name="imageloadbutton" id="imageloadbutton">
                                             <div class="button">
                                                  <input type="file" id="file_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" onchange="fileUpload('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
');" name="files" />
                                             </div>
                                             <input type='hidden' name="status" value="domainlogo"/>
                                             </label>
                                        </form>
                                   </div>
                              </div>
                         </li>
                         <?php endif; ?>
						 
					 <?php if ($this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['column_image_show']): ?>
                          <?php $this->assign('columnimages', $this->_tpl_vars['objCommon']->getColumnTextImages($_SESSION['page_id'])); ?>
                         <li id="page_<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
" class="columnlist">                                                                 
                              <div class="form_element_control">
                                   <div class="controlMidOuter">
                                        <div class="controlMidBg"></div>
                                   </div>
                                   <div class="deleteOuter">
                                        <div class="deleteBg" title="Delete" onclick="showDelPopup('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','column_image_show');"><i class="fa fa-trash-o"></i></div>
                                   </div>
                              </div>
						 <div class="tablesampleouter">
							 <div class="sample2  columsBor row-fluid no-space">
                                        <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)0;
$this->_sections['foo']['loop'] = is_array($_loop=3) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?> 
                                             <?php $this->assign('num', $this->_sections['foo']['rownum']); ?>

                                             <?php if (count($_from = (array)$this->_tpl_vars['columnimages'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['imge']):
?>

                                                  <?php if ($this->_tpl_vars['imge']['column_id'] == $this->_tpl_vars['num'] && $this->_tpl_vars['imge']['status'] == 'columnImageText'): ?>
                                                       <?php $this->assign('srcIndex', $this->_tpl_vars['k']); ?>
                                                       <?php $this->assign('images', 1); ?>
                                                  <?php endif; ?>

                                                  <?php if ($this->_tpl_vars['imge']['column_id'] == $this->_tpl_vars['num'] && $this->_tpl_vars['imge']['status'] == 'columnImageText_title'): ?>
                                                       <?php $this->assign('srcIndex_title', $this->_tpl_vars['k']); ?>
                                                       <?php $this->assign('images_title', 1); ?>
                                                  <?php endif; ?>

                                                   <?php if ($this->_tpl_vars['imge']['column_id'] == $this->_tpl_vars['num'] && $this->_tpl_vars['imge']['status'] == 'columnImageText_desc'): ?>
                                                       <?php $this->assign('srcIndex_desc', $this->_tpl_vars['k']); ?>
                                                       <?php $this->assign('images_desc', 1); ?>
                                                  <?php endif; ?>
                                             <?php endforeach; unset($_from); endif; ?>

                                             <div class="addwidth span4">     
     									<label class="coltext_image" for="coltext_image<?php echo $this->_sections['foo']['rownum']; ?>
">
     										<input type="button" class="hide" id="coltext_image<?php echo $this->_sections['foo']['rownum']; ?>
" onclick="showColumnImagePopup('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_sections['foo']['rownum']; ?>
');"/>

                                                        <?php if (isset ( $this->_tpl_vars['images'] ) && $this->_tpl_vars['images'] == 1): ?>
                                                            <img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['columnimages'][$this->_tpl_vars['srcIndex']]['image_name']; ?>
" alt="Column Text Image" />
                                                            <?php $this->assign('images', 0); ?>
                                                       <?php else: ?>
                                                            <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/sample1.jpg" alt="Column Text Image" />
                                                       <?php endif; ?>

     									</label>

     									<div class="coltext_title contentedit" id="coltext_title_<?php echo $this->_sections['foo']['rownum']; ?>
" onblur="updateTilte_columnImage('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_sections['foo']['rownum']; ?>
');">     
     										<?php if (isset ( $this->_tpl_vars['images_title'] ) && $this->_tpl_vars['images_title'] == 1): ?>
                                                            <?php echo $this->_tpl_vars['columnimages'][$this->_tpl_vars['srcIndex_title']]['column_text_title']; ?>

                                                            <?php $this->assign('images_title', 0); ?>
                                                       <?php else: ?>
                                                            Sample Title
                                                       <?php endif; ?>
     									</div>
     									<div class="coltext_desc contentedit" id="coltext_desc_<?php echo $this->_sections['foo']['rownum']; ?>
" onblur="updateDesc_columnImage('<?php echo $this->_tpl_vars['pagefirstlist'][$this->_sections['pagelist']['index']]['pagelist']; ?>
','<?php echo $this->_sections['foo']['rownum']; ?>
');">     
     										<?php if (isset ( $this->_tpl_vars['images_desc'] ) && $this->_tpl_vars['images_desc'] == 1): ?>
                                                            <?php echo $this->_tpl_vars['columnimages'][$this->_tpl_vars['srcIndex_desc']]['column_text_desc']; ?>

                                                            <?php $this->assign('images_desc', 0); ?>
                                                       <?php else: ?>
                                                            This is the test description
                                                       <?php endif; ?>
     									</div>
     								</div>
                                             
                                        <?php endfor; endif; ?> 

								<!-- <div class="addwidth span4">     
									<label class="coltext_image" for="coltext_image2">
										<input type="button" class="hide" id="coltext_image2" onclick="showColumnImagePopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','2');"/>
										<?php if (isset ( $this->_tpl_vars['columnimages']['0']['column_id'] ) && $this->_tpl_vars['columnimages']['0']['column_id'] != '' && $this->_tpl_vars['columnimages']['0']['column_id'] == '2'): ?>
                                                       <img src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" alt="Column Text Image" title="Column Text Image"/>
                                                  <?php else: ?>
                                                       <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/sample2.jpg" alt="Column Text Image" title="Column Text Image"/>
                                                  <?php endif; ?>
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
										<input type="button" class="hide" id="coltext_image3" onclick="showColumnImagePopup('<?php echo $this->_tpl_vars['columnpagefirstlist'][$this->_sections['colpagelist']['index']]['pagelist']; ?>
','3');"/>
                                                  <?php if (isset ( $this->_tpl_vars['columnimages']['0']['column_id'] ) && $this->_tpl_vars['columnimages']['0']['column_id'] != '' && $this->_tpl_vars['columnimages']['0']['column_id'] == '3'): ?>
										     <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/sample3.jpg" alt="Column Text Image" title="Column Text Image"/>
                                                  <?php else: ?>
                                                       <img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/sample3.jpg" alt="Column Text Image" title="Column Text Image"/>
                                                  <?php endif; ?>
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
                         <?php endif; ?>
                         <?php endfor; else: ?>
                         <div id="dropBox2" class="dropBox2 clearfix"></div>
                         <?php endif; ?>
                    </ul>
               </div>
               <?php endif; ?>											
               <?php endif; ?>
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
                          <form id="bannerimageform" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/ajaxImageUpload.php'>
                               <label for="file" class="input input-file" style="display:block;cursor:pointer" >
                                   <div  class="button">
                                        <input type="file" value="" name="photos[]" id="photobannerimg" accept=".jpg, .png, .gif, .bmp,.jpeg" />
                                        <?php echo $this->_tpl_vars['LANG']['browse_name']; ?>
 
                                   </div>
                               <input type='hidden' name="status" value="bannerimage"/>
                               </label>
                          </form>                          
                          <div style="display:none" class="progress">
                               <div class="bar"></div>
                               <div class="percent">0%</div>
                          </div>
                          <?php echo $this->_tpl_vars['objCommon']->getImageForShowTop($this->_tpl_vars['site_title']['0']['domain_id'],'bannerimage'); ?>

                          <div class="library_content_scroll clearfix"> 
                               
                               <div id="preview" class="previewimage">
                                 <?php if (! empty ( $this->_tpl_vars['logoimages'] )): ?>
                                 <img  src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['logoimages']; ?>
" /> <a class="galleryimage" ></a> 
                                 <?php endif; ?>
                               </div>
                               <ul id="sortableImg" class="SlideUploadImge">
                               
                               </ul>
                               
                               
                          </div>
                     </div>
                     <div id="bannerimage_library_content" class="clearfix bannerlib">
                          <input type="button" class="upload_btn" value="Add selected" onclick="uploadLibraryImages('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','bannerimage');" />
                          <div  class="library_content_scroll clearfix image_library"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'imageLibrary.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
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
                                   <?php echo $this->_tpl_vars['LANG']['browse_name']; ?>
 
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
                              <?php echo $this->_tpl_vars['objCommon']->getBannerSliderImage($_SESSION['domain_id'],'sliderimage'); ?>
                        
                              <div class="clearfix"></div>
                              <div id="preview"></div>
                              <ul id="slidesortableImg" class="SlideUploadImge">
                                   <div id="banner_preview"></div>
                                   <?php unset($this->_sections['sliimg']);
$this->_sections['sliimg']['name'] = 'sliimg';
$this->_sections['sliimg']['loop'] = is_array($_loop=($this->_tpl_vars['banner_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sliimg']['show'] = true;
$this->_sections['sliimg']['max'] = $this->_sections['sliimg']['loop'];
$this->_sections['sliimg']['step'] = 1;
$this->_sections['sliimg']['start'] = $this->_sections['sliimg']['step'] > 0 ? 0 : $this->_sections['sliimg']['loop']-1;
if ($this->_sections['sliimg']['show']) {
    $this->_sections['sliimg']['total'] = $this->_sections['sliimg']['loop'];
    if ($this->_sections['sliimg']['total'] == 0)
        $this->_sections['sliimg']['show'] = false;
} else
    $this->_sections['sliimg']['total'] = 0;
if ($this->_sections['sliimg']['show']):

            for ($this->_sections['sliimg']['index'] = $this->_sections['sliimg']['start'], $this->_sections['sliimg']['iteration'] = 1;
                 $this->_sections['sliimg']['iteration'] <= $this->_sections['sliimg']['total'];
                 $this->_sections['sliimg']['index'] += $this->_sections['sliimg']['step'], $this->_sections['sliimg']['iteration']++):
$this->_sections['sliimg']['rownum'] = $this->_sections['sliimg']['iteration'];
$this->_sections['sliimg']['index_prev'] = $this->_sections['sliimg']['index'] - $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['index_next'] = $this->_sections['sliimg']['index'] + $this->_sections['sliimg']['step'];
$this->_sections['sliimg']['first']      = ($this->_sections['sliimg']['iteration'] == 1);
$this->_sections['sliimg']['last']       = ($this->_sections['sliimg']['iteration'] == $this->_sections['sliimg']['total']);
?>
                                   <li class="SlideUplWidtPopup" id="sliderimg<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['banner_slider_id']; ?>
"> <img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['image_name']; ?>
"/> <a onclick="deleteSliderBannerImage('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $this->_tpl_vars['banner_images'][$this->_sections['sliimg']['index']]['banner_slider_id']; ?>
','sliderimage');" class="galleryimage"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Close.png" alt="" title="" /></a> </li>
                                   <?php endfor; endif; ?>
                              </ul>
                         </div>
                          <a style="display:" class="upload_btn_save" onclick="bannerImageUpdatingProcess()">Save</a> 
                    </div>
                    <div id="image_library_content" class="clearfix sliderlibrary">
                         <input type="button" class="upload_btn" value="Add Selected" onclick="addImagesinslide()" />
                         <label style="display:none;" id="bannerimageliblabel" onclick="uploadLibraryImages('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','bannerslider');"></label>
                         <div  class="library_content_scroll clearfix image_library image_library"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'imageLibrary.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
                    </div>                                       
               </div>               
          </div>
     </div>
	  <?php echo '
	 <script type="text/javascript">
		$(document).ready(function(){
		  //imagelibrarytabs();	
		});          
	 </script>	
	 '; ?>

</div>

<?php endif; ?>
 
 