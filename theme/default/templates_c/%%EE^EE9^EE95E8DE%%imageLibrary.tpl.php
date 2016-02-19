<?php /* Smarty version 2.6.3, created on 2015-12-09 11:28:35
         compiled from imageLibrary.tpl */ ?>
<?php echo $this->_tpl_vars['objCommon']->ImageLibrary(); ?>

<ul class="SlideUploadImge clearfix imageLibraryUl">
	<?php unset($this->_sections['imgs']);
$this->_sections['imgs']['name'] = 'imgs';
$this->_sections['imgs']['loop'] = is_array($_loop=$this->_tpl_vars['imageslist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['imgs']['show'] = true;
$this->_sections['imgs']['max'] = $this->_sections['imgs']['loop'];
$this->_sections['imgs']['step'] = 1;
$this->_sections['imgs']['start'] = $this->_sections['imgs']['step'] > 0 ? 0 : $this->_sections['imgs']['loop']-1;
if ($this->_sections['imgs']['show']) {
    $this->_sections['imgs']['total'] = $this->_sections['imgs']['loop'];
    if ($this->_sections['imgs']['total'] == 0)
        $this->_sections['imgs']['show'] = false;
} else
    $this->_sections['imgs']['total'] = 0;
if ($this->_sections['imgs']['show']):

            for ($this->_sections['imgs']['index'] = $this->_sections['imgs']['start'], $this->_sections['imgs']['iteration'] = 1;
                 $this->_sections['imgs']['iteration'] <= $this->_sections['imgs']['total'];
                 $this->_sections['imgs']['index'] += $this->_sections['imgs']['step'], $this->_sections['imgs']['iteration']++):
$this->_sections['imgs']['rownum'] = $this->_sections['imgs']['iteration'];
$this->_sections['imgs']['index_prev'] = $this->_sections['imgs']['index'] - $this->_sections['imgs']['step'];
$this->_sections['imgs']['index_next'] = $this->_sections['imgs']['index'] + $this->_sections['imgs']['step'];
$this->_sections['imgs']['first']      = ($this->_sections['imgs']['iteration'] == 1);
$this->_sections['imgs']['last']       = ($this->_sections['imgs']['iteration'] == $this->_sections['imgs']['total']);
?>
	<?php if ($this->_tpl_vars['imageslist'][$this->_sections['imgs']['index']]['image_name'] != ''): ?>
    <li class="SlideUplWidtPopup" data-imgid="<?php echo $this->_tpl_vars['imageslist'][$this->_sections['imgs']['index']]['id']; ?>
" id="imgli<?php echo $this->_tpl_vars['imageslist'][$this->_sections['imgs']['index']]['type'];  echo $this->_tpl_vars['imageslist'][$this->_sections['imgs']['index']]['id']; ?>
">
		<img class="libimg"  width="100%" height="120" src="<?php echo $this->_tpl_vars['SITE_DOMAIN_IMAGES_URL']; ?>
/<?php echo $this->_tpl_vars['imageslist'][$this->_sections['imgs']['index']]['image_name']; ?>
"/>
	   <a class="galleryimage" onclick="deleteLibraryImage('<?php echo $this->_tpl_vars['imageslist'][$this->_sections['imgs']['index']]['id']; ?>
',this);"><img src="<?php echo $this->_tpl_vars['SITE_BASEURL']; ?>
/images/Close.png" /></a>
    </li>
    <?php endif; ?>
	<?php endfor; endif; ?>
</ul>
	