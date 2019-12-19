<?php
echo"
<form method='post' action='".base_url()."index.php/mda/editjns'>
<table class='table table-bordered'>
<tr>
<td width='20%'>Nama</td>
<td><input type='text' name='nmjenis' value='$nmjenis' class='form-control'></td>
</tr>

<tr>
<td>Golongan</td>
<td>
<select name='idgol' class='form-control'>
<option value=''>[Golongan]</option>
";
$dtgol=$this->mda_model->viewgol()->result();
foreach($dtgol as $d)
	{
	echo"<option value='$d->idgol' ";
	if($idgol==$d->idgol){echo"selected";} else{echo"";}
	echo">$d->namagol</option>";
	}
echo"
</select>
</td>
</tr>

<tr>
<td>Kode</td>
<td><input type='text' name='kodejenis' value='$kodejenis' class='form-control'></td>
</tr>

<tr>
<td>Penyusutan Thn</td>
<td><input type='text' name='thnsusut' value='$thnsusut' class='form-control'></td>
</tr>

<tr>
<td>Penyusutan %</td>
<td><input type='text' name='persensusut' value='$persensusut' class='form-control'></td>
</tr>

<tr>
<td>Keterangan</td>
<td><input type='text' name='ketjenis' value='$ketjenis' class='form-control'>
<input type='hidden' name='idjenis' value='$idjenis'>
</td>
</tr>

</table>
";


?>