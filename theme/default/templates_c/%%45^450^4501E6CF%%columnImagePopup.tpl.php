<?php /* Smarty version 2.6.3, created on 2015-12-09 11:33:55
         compiled from columnImagePopup.tpl */ ?>
<div class="youtubepopclose" onclick=" $('#columnImagePoP').hide();$('.loadmask').hide();"></div>
<div class="sliderPopupHead">
	RESİM 
</div>

<div class="row-fluid">    
    <div class="span12 slidePopRhtScroll offset0">
		<div id="single_imageLibrary" class="clearfix library_contentBanner">        
        <ul>
				<li><a href="#my_computer">Bilgisayarım</a></li>
				<li><a href="#image_library_content">Resim Kütüphanesi</a></li>
		</ul>
        <div id="my_computer">
        	<form id="imageform_<?php echo $_REQUEST['page_list_id']; ?>
" class="addeditTop addeditbuttonForm form-horizontal SlideUploadForm" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' >
        		<label id='imageloadbutton_<?php echo $_REQUEST['page_list_id']; ?>
' class="input input-file" for="file">
        			<div class="button">
        				<input type='file' name="photos[]" id="photoimg_<?php echo $_REQUEST['page_list_id']; ?>
" class="inputfile" size="1" <?php if ($this->_tpl_vars['isBlog'] == 'Y'): ?>onchange="blogImageUpdatingProcess('<?php echo $_REQUEST['page_list_id']; ?>
');"<?php else: ?>onchange="singleImageUpdatingProcess('<?php echo $_REQUEST['page_list_id']; ?>
');"<?php endif; ?>  />
        				Yeni Resim Yükle
        			</div>
                    <input type='hidden' name="status" value="columnImageText"/>
        			<input type='hidden' name="page_list_id" value="<?php echo $_REQUEST['page_list_id']; ?>
"/>
                    <input type='hidden' name="column_id" value="<?php echo $_REQUEST['column_id']; ?>
"/>
        		</label>
        	</form>	

        	<div style="display:none;" class="progress">
              <div class="bar"></div>
              <div class="percent">0%</div>
            </div>
          <div class="library_content_scroll clearfix">  
    		 <?php if (empty ( $this->_tpl_vars['images'] )): ?>
    			<div id="singlepreview"></div>
    			<ul id="sortableGalImg" class="SlideUploadImge">
    			</ul>
    		<?php endif; ?>
    		 <?php if (! empty ( $this->_tpl_vars['images'] )): ?>
		 	<div class="clearfix"></div>
    			 <div id="preview"></div>
    			 <ul id="sortableGalImg" class="SlideUploadImge">    				
    					<li class="SlideUplWidtPopup">
    						<img width="100%" height="150" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['images']; ?>
" />    						
    					</li>    				
    			</ul> 
    		 <?php endif; ?>
		 </div>
         </div>
         <div id="image_library_content" class="clearfix">
            <input type="button" class="upload_btn" value="Seç ve Ekle" onclick="uploadLibraryImages('<?php echo $_SESSION['domain_id']; ?>
','<?php echo $_SESSION['page_id']; ?>
','<?php echo $_REQUEST['page_list_id']; ?>
','columnImageText');" />
            <input type='hidden' id="column_id"  name="column_id" value="<?php echo $_REQUEST['column_id']; ?>
"/>
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