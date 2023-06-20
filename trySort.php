<form name="George">
<p><select name="example" size="1" onChange="go()">
<option value="http://www.cnet.com">Cnet</option>
<option value="http://www.cnn.com">CNN</option>
<option value="http://www.geocities.com">Geocities</option>
</select></p>
 
<script type="text/javascript">
<!--
function go(){
location=
document.George.example.
options[document.George.example.selectedIndex].value
}
//-->
</script>
 
<input type="button" name="test" value="Go!" onClick="go()">
</form>