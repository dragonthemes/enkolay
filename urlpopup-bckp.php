<?php
include("includes/config.inc.php");

?>
<script src="<?php echo $CFG['site']['base_url']; ?>/js/jquery.js"></script>
<link href="<?php echo $CFG['site']['base_url']; ?>/theme/default/css/bootstrap.css" type="text/css" rel="stylesheet" />
<style type="text/css">
body{ background: #333; overflow: hidden;}
.urlpopup{ position:fixed; top:100px; left:50%; margin-left:-250px;width:500px;float:left;z-index:30000; background:#333; border-radius:7px; padding:15px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;
}
.urlpopupwrap label{color: #fff!important; font:bold 13px/30px "Helvetica Neue",Helvetica,Arial,sans-serif!important; padding: 4px 0!important;}
.urlcancel{ margin-left:15px;}
.radio{ padding: 7px 0 0; float: left; margin: 10px 0 0!important;}
.youtubepopclose{height:20px;width:20px;background:url(images/Close.png) no-repeat right top #fff;float: right;border-radius:10px; position:absolute; top:-8px; right:-8px; z-index:100; cursor:pointer;}
a{ font-size:13px;}
</style>
<div class="row-fluid">
    <div class="span1"><input type="radio" value="url" checked="checked" name="link" onclick="hideShow(this,'urllabel','emaillabel','url');" class="radio"></div>
    <div class="row-fluid urlpopupwrap span10">        
        <label id="urllabel" class="span5">Enter URL</label>
        <input class="url span5" id="url" type="text" value="" placeholder="url">
    </div>
    <div class="clearfix"></div> 
    <div class="span1 offset0">&nbsp;</div>
    <div class="row-fluid urlpopupwrap span10">
        <label class="span5">Select Target Type</label>
    	<select id="target" class="target span5">
    		<option value="">none</option>
            <option value="_blank">blank</option>
    		<option value="_parent">parent</option>
    		<option value="_self">self</option>
    		<option value="_top">top</option>
    	</select>
     </div>
 </div>
 <div class="row-fluid">
    <div class="span1"><input type="radio" name="link"  onclick="hideShow(this,'emaillabel','urllabel','mailtoid');" value="email" class="radio"></div>
    <div class="row-fluid urlpopupwrap span10">       
        <label id="emaillabel" class="span5">E-Mail ID</label>
        <input class="url span5" id="mailtoid" style="display: none;" type="text" value="" placeholder="url">
    </div>
</div> 
 <div class="row-fluid span10">
    <label class="span5">&nbsp;</label>
    <a class="urlselect btn btn-success pull-left" onclick="callCreateLink();">Submit</a>
    <a class="urlcancel btn btn-danger pull-left" onclick="self.parent.hideurlpopup();">Cancel</a>
 </div>
 <script>
 
 function callCreateLink()
 {
    
    var uri;
    var target;
    var type=$("[name=link]:checked").val();
    if(type=='url')
    {
        uri = document.getElementById('url').value;
        if(uri.match('http://')!='http://' && uri.match('https://')!='https://')
        {
            uri='http://'+uri;
        }
        
        target   = document.getElementById('target').value;
    }
    else
    {
        uri = 'mailto:'+document.getElementById('mailtoid').value;
        target   = "";
    }   
    self.parent.callLinkText(uri,target);
 }
 
 function hideShow(obj,label1,label2,txtbox)
 {
    $(".url").hide();
    if(obj.value=='email')
    {
        $("#"+label1).html("Enter E-Mail ID");
        $("#"+label2).html("Website URL");
        $("#"+txtbox).show();
        $("#"+txtbox).focus();
        $("#target").attr('disabled','disabled');
    }
    if(obj.value=="url")
    {
        $("#"+label1).html("Enter Website URL");
        $("#"+label2).html("E-Mail ID");
        $("#"+txtbox).show();
        $("#"+txtbox).focus();
        $("#target").removeAttr('disabled');
    }
 }
 </script>