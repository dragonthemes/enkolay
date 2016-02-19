<?php /* Smarty version 2.6.3, created on 2015-12-15 13:43:53
         compiled from galleryPopupColumn.tpl */ ?>
<div class="youtubepopclose" onclick=" $('#galleryPoPColumn').hide();$('.loadmask').hide();"></div>
<div class="sliderPopupHead">
	RESİM GALERİSİ
</div>
<div class="row-fluid">
    <div class="span12 slidePopRhtScroll offset0">
		<div id="column_gallery_imageLibrary" class="clearfix library_content">
            <ul>
    				<li><a href="#my_computer">Bilgisayarım</a></li>
    				<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
    		</ul>
            <div id="my_computer">    
            	<form id="imageform_<?php echo $_REQUEST['page_list_id']; ?>
" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxColumnGalleryUpload.php'>
            		<label id='imageloadbutton_<?php echo $_REQUEST['page_list_id']; ?>
' class="input input-file" for="file">
            			<div class="button">
            				<input type='file' name="photos[]" id="sliimg_<?php echo $_REQUEST['page_list_id']; ?>
" class="inputfile" size="1" onchange="columnGalleryImageUpdatingProcess('<?php echo $_REQUEST['page_list_id']; ?>
');" multiple />
            				Yeni Resim Yükle
            			</div>
            			<input type='hidden' name="page_list_id" value="<?php echo $_REQUEST['page_list_id']; ?>
"/>
            		</label>
            	</form>	
			<a style="display:none" class="upload_btn_save" onclick="galleryreload();">Kaydet</a>	
            	<div style="display:none" class="progress">
                  <div class="bar"></div>
                  <div class="percent">0%</div>
                </div>
        		 <div class="library_content_scroll clearfix">
			 <?php if (! $this->_tpl_vars['gallery_images']): ?>
        			<div id="preview"></div>
        			<ul id="galcolumn_preview" class="SlideUploadImge">
        			</ul>
        		<?php endif; ?>
        		 <?php if ($this->_tpl_vars['gallery_images']): ?>
        			 <div id="preview"></div>
        			 <ul id="galcolumn_preview" class="SlideUploadImge">
        				<?php unset($this->_sections['galimg']);
$this->_sections['galimg']['name'] = 'galimg';
$this->_sections['galimg']['loop'] = is_array($_loop=($this->_tpl_vars['gallery_images'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        					<li class="SlideUplWidtPopup">
        						<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['gallery_images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
" />
        						<a class="galleryimage" onclick="deleteGalImgColumn('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','<?php echo $this->_tpl_vars['gallery_images'][$this->_sections['galimg']['index']]['gallery_id']; ?>
','<?php echo $this->_tpl_vars['gallery_images'][$this->_sections['galimg']['index']]['gallery_name']; ?>
');" class="galleryimage"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Close.png" alt="" title="" /></a>
        					</li>
        				<?php endfor; endif; ?>
        			</ul> 
        		 <?php endif; ?>
			 </div>
    	   </div>
            <div id="image_library_content" class="clearfix">
            <input type="button" class="upload_btn" value="Seç ve Ekle" onclick="uploadLibraryImages('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','gallery');" />
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