<?php
//
echo"
<form method='post' action='".base_url()."index.php/mda/edituserkl'>
<table class='table table-bordered'>
<tr>
<td width='20%'>Nama</td>
<td><input type='text' name='namauser' value='$namauser' class='form-control'></td>
</tr>

<tr>
<td>Jabatan</td>
<td>
<select name='jabatan' class='form-control'>
<option value=''>[ JABATAN ]</option>
<option value='DIREKSI' "; 
if($jabatan=='DIREKSI') {echo"selected";} else {}
echo">DIREKSI</option>
<option value='DIVISI' ";
if($jabatan=='DIVISI') {echo"selected";} else {}
echo">DIVISI CHM</option>
<option value='KKL' ";
if($jabatan=='KKL') {echo"selected";} else {}
echo">KKL</option>
<option value='Wa KKL' ";
if($jabatan=='Wa KKL') {echo"selected";} else {}
echo">Wa KL</option>
<option value='SUPERVISOR' ";
if($jabatan=='SUPERVISOR') {echo"selected";} else {}
echo">SUPERVISOR</option>
<option value='Ass. SUPERVISOR' ";
if($jabatan=='Ass. SUPERVISOR') {echo"selected";} else {}
echo">Ass. SUPERVISOR</option>
</select>
</td>
</tr>

<tr>
<td>Akses</td>
<td><select name='akses' class='form-control'>
<option value=''>[ AKSES ]</option>
<option value='Dir' ";
if($ketuser=='direksi') {echo"selected";} else {echo"";}
echo">Direksi</option>
<option value='Div' ";
if($ketuser=='administrator') {echo"selected";} else {echo"";}
echo">Divisi</option>
";
$data=$this->mda_model->masterkl()->result();
foreach($data as $a)
	{
	echo"<option value='$a->idkl' ";
	if($ketuser==$a->idkl) {echo"selected";} else{echo"";}
	echo">$a->codeuker - $a->namakl</option>";
	}
echo"
</select></td>
</tr>

<tr>
<td>Username</td>
<td><input type='text' name='username' value='$username' class='form-control'></td>
</tr>

<tr>
<td>Password</td>
<td><input type='password' name='password' class='form-control'>
<input type='hidden' name='iduser' value='$iduser'>
</td>
</tr>

</table>
";


?>
<!--
</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                                <input type="submit" class="btn btn-primary" value='SIMPAN'></button>
                            </div>
							-->