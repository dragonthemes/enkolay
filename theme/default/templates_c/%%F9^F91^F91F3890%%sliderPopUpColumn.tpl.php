<?php /* Smarty version 2.6.3, created on 2015-12-15 13:43:53
         compiled from sliderPopUpColumn.tpl */ ?>
<div class="youtubepopclose" onclick=" $('#sliderPopColumn').hide();$('.loadmask').hide();"></div>
<div class="sliderPopupHead">
	SLAYT GÖSTERİSİ
</div>
<div class="row-fluid">
	<div class="span12 slidePopRhtScroll offset0">
    <div id="column_slide_imageLibrary" class="clearfix library_content">
    	<ul>
				<li><a href="#my_computer">Bilgisayarım</a></li>
				<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
		</ul>
        <div id="my_computer">
           <form id="imageform_<?php echo $_REQUEST['page_list_id']; ?>
" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxColumnSliderImageUpload.php'>
    		<label id='imageloadbutton_<?php echo $_REQUEST['page_list_id']; ?>
' class="input input-file" for="file">
    			<div class="button">
    				<input type='file' name="photos[]" id="sliimg_<?php echo $_REQUEST['page_list_id']; ?>
" class="inputfile" size="1" onchange="columnImageUpdatingProcess('<?php echo $_REQUEST['page_list_id']; ?>
');" multiple/>
    				Yeni Resim Yükle
    			</div>
    			<input type='hidden' name="page_list_id" value="<?php echo $_REQUEST['page_list_id']; ?>
"/>
    		</label>
    	   </form>
	   <a class="upload_btn_save"  style="display:none" onclick="galleryreload()">Kaydet</a>
        	<div style="display:none" class="progress">
              <div class="bar"></div>
              <div class="percent">0%</div>
            </div>
    		<div class="library_content_scroll clearfix">
		<?php if (! $this->_tpl_vars['slider_images']): ?>
    			<ul id="column_preview" class="SlideUploadImge"></ul>
    		<?php endif; ?>
    		 <?php if ($this->_tpl_vars['slider_images']): ?>
    			<div class="clearfix"></div>
			 <!--<ul id="column_preview"></ul>-->
    			 <ul id="column_preview" class="SlideUploadImge">
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
    					<li class="SlideUplWidtPopup">
    						<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
">
    						<a class="galleryimage" onclick="deleteSliImgColumn('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_id']; ?>
','<?php echo $this->_tpl_vars['slider_images'][$this->_sections['sliimg']['index']]['slider_images']; ?>
');"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Close.png" alt="" title="" /></a>
    					</li>
    				<?php endfor; endif; ?>
    			</ul> 
    		 <?php endif; ?>
		 </div>
    	</div>
        <div id="image_library_content" class="clearfix">
            <input type="button" class="upload_btn" value="Seçilenleri Ekle" onclick="uploadLibraryImages('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','slider');" />
		 <div class="library_content_scroll clearfix image_library"><?php $_smarty_tpl_vars = $this->_tpl_vars;
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
	   imagelibrarytabs();	
	});          
 </script>	
 '; ?>