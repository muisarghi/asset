
<?php
echo"
<form method='post' action='".base_url()."index.php/mda/editbarang'>
<table class='table table-bordered'>
<tr>
<td width='20%'>Barang</td>
<td><input type='text' name='namabarang' value='$namabarang' class='form-control'></td>
</tr>

<tr>
<td>Jenis</td>
<td>
<input type='text' name='idjenis' value='$idjenis' class='form-control'>
</td>
</tr>

<tr>
<td>No Inventaris</td>
<td><input type='text' name='noinv' value='$noinv' class='form-control'></td>
</tr>

<tr>
<td>Pengguna</td>
<td><input type='text' name='pengguna' value='$pengguna' class='form-control'></td>
</tr>

<tr>
<td>Pembelian</td>
<td><input type='text' name='tglbeli' value='$tglbeli' class='form-control'></td>
</tr>

<tr>
<td>Harga RP</td>
<td><input type='text' name='hargabeli' value='$hargabeli' class='form-control'>
<input type='hidden' name='idbarang' value='$idbarang'>
</td>
</tr>

</table>
";


?>