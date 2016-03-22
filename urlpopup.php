<?php
include("includes/config.inc.php");

?>
<script src="<?php echo $CFG['site']['base_url']; ?>/js/jquery.js"></script>
<link href="<?php echo $CFG['site']['base_url']; ?>/theme/default/css/bootstrap.css" type="text/css" rel="stylesheet" />
<style type="text/css">
input{font:13px "Helvetica Neue",Helvetica,Arial,sans-serif!important; color:#333;}
.urlpopup{ position:fixed; top:100px; left:50%; margin-left:-250px;width:500px;float:left;z-index:30000; background:#fff; border-radius:7px; padding:0 15px 5px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border:2px solid #4BA4E8;}
.heading{ color:#4BA4E8; font-size:18px; text-align:center;}
label{color: #333!important; font:16px "Helvetica Neue",Helvetica,Arial,sans-serif!important; padding: 4px 0!important;}
.urlcancel{ margin-left:15px;}
.radio{ padding: 7px 0 0; float: left; margin: 10px 0 0!important;}
.youtubepopclose{height:20px;width:20px;background:url(images/Close.png) no-repeat right top #fff;float: right;border-radius:10px; position:absolute; top:-8px; right:-8px; z-index:100; cursor:pointer;}
a{ font-size:13px;}
.bold{ font-weight:bold!important;}
.center{ text-align:center!important;}
.small{ font-size:12px!important;line-height:24px!important;}
</style>
<div class="row-fluid">
	<h1>Link to :</h1>
	<table class="table table-bordered table-striped">
		<tr>
			<td><input type="radio" value="url" checked="checked" name="link" onclick="hideShow(this,'urllabel','emaillabel','url');" class="radio"></td>
			<td>
				<label  class="bold">Website URL <span class="pull-right"><label id="urllabel" class="checkbox inline small"><input type="checkbox" id="inlineCheckbox1" value="option1" /> Open link in a new window</label></span>
				</label><br />
				<input class="url span10" id="url" type="text" value="" placeholder="url">
				<!--<select id="target" class="target span5">
					<option value="">none</option>
					<option value="_blank">blank</option>
					<option value="_parent">parent</option>
					<option value="_self">self</option>
					<option value="_top">top</option>
				</select>-->
			</td>
		</tr>
		<tr>
			<td><input type="radio" name="link"  onclick="hideShow(this,'emaillabel','urllabel','mailtoid');" value="email" class="radio" /></td>
			<td>
				<label id="emaillabel" class="bold">E-Mail Address</label>
				<input class="url span10" id="mailtoid" style="display: none;" type="text" value="" placeholder="Email id" />
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="block center">
					<a class="urlselect btn btn-success btn-large" onclick="callCreateLink();">Submit</a>
					<a class="urlcancel btn btn-danger btn-large" onclick="self.parent.hideurlpopup();">Cancel</a>
				</div>
			</td>
		</tr>
	</table>
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
        
        target   = '_blank';
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
        $("#"+label1).show();
        $("#"+label2).hide();
        $("#"+txtbox).show();
        $("#"+txtbox).focus();
        $("#target").attr('disabled','disabled');
    }
    if(obj.value=="url")
    {
        $("#"+label1).hide();
        $("#"+label2).show();
        $("#"+txtbox).show();
        $("#urllabel").show();
        $("#"+txtbox).focus();
        $("#target").removeAttr('disabled');
    }
 }
 </script>