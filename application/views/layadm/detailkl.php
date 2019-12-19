<?php
echo"
<form method='post' action='".base_url()."index.php/mda/editkl'>
<table class='table table-bordered'>
<tr>
<td width='20%'>Nama</td>
<td><input type='text' name='namakl' value='$namakl' class='form-control'></td>
</tr>

<tr>
<td>Codebranch</td>
<td><input type='text' name='codebranch' value='$codebranch' class='form-control'>

</td>
</tr>

<tr>
<td>Codeuker</td>
<td><input type='text' name='codeuker' value='$codeuker' class='form-control'>
<input type='hidden' name='idkl' value='$idkl'>
</td>
</tr>

</table>
";


?>