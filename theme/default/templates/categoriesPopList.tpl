<form name="addOption" id="addOption">
<table>
<tr>
<td>Option Title</td><td>Option Choices</td><td>Input type</td>
</tr>
<tr id="removesubmain_0" class="optionlist">
<td><input type="text" name="option_title[0]" id="option_title_0" value="" placeholder="eg.color"></td>
<td><input type="text" name="option_choice[0]" id="option_choice_0" value="" placeholder="eg.black,white,"></td>
<td>
<select name="input_type[0]" id="input_type_0">
	<option value="1">Drop</option>
	<option value="2">Radio</option>
</select>
</td>
<td onclick="removeSubmain('0');">Remove</td>
</tr>
<div id="subaddonslist"></div>
</table>
<input type="button" name="add_option" value="Add Option" onclick="addListSubAddons1();">
<input type="button" name="save" value="save" onclick="saveOption();">
<input type="button" name="cancel" value="cancel" onclick="hideOption();">
</form>
{literal}
<script type="text/javascript">
var special_row2=1;
function addListSubAddons1(){
	$('#subaddonslist').append('<tr id="removesubmain_'+special_row2+'" class="optionlist">'+
			'<td><input type="text" name="option_title['+special_row2+']" id="option_title_'+special_row2+'" value="" placeholder="eg.color"/></td>'+
			'<td><input type="text" name="option_choice['+special_row2+']" id="option_choice_'+special_row2+'" value="" placeholder="eg.black,white,"/></td>'+
			'<td><select name="input_type['+special_row2+']" id="input_type_'+special_row2+'"><option value="1">Drop</option><option value="2">Radio</option></select></td>'+
			'<td><a onclick="removeSubmain('+special_row2+');">Remove</a></td>'
			);
	special_row2++;
}

function removeSubmain(said){
	$('#removesubmain_'+said).remove();
	$('#option_title_'+said).val('');
	$('#option_choice_'+said).val('');
	$('#input_type_'+said).val('');
}

</script>
{/literal}