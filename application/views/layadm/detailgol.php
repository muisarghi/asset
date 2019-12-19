<?php
echo"
<form method='post' action='".base_url()."index.php/mda/editgol'>
<table class='table table-bordered'>
<tr>
<td width='20%'>Nama</td>
<td><input type='text' name='namagol' value='$namagol' class='form-control'></td>
</tr>


<tr>
<td>Kode</td>
<td><input type='text' name='kodegol' value='$kodegol' class='form-control'></td>
</tr>


<tr>
<td>Sub Golongan</td>
<td>
<select name='subgol' class='form-control'>
<option value='0'>[induk]</option>
";
$dtgol=$this->mda_model->golinduk()->result();
foreach($dtgol as $d)
	{
	echo"<option value='$d->idgol' ";
	if($subgol==$d->idgol){echo"selected";} else{echo"";}
	echo">$d->namagol</option>";
	}
echo"
</select>
</td>
</tr>

<tr>
<td>Keterangan</td>
<td><input type='text' name='ketgol' value='$ketgol' class='form-control'>
<input type='hidden' name='idgol' value='$idgol'>
</td>
</tr>

</table>
";


?>