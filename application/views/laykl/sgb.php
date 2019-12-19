  <?php
/*
selisihreg:
id_selisihreg, tgl_selisihreg, codeuker, aatm, batm, catm, atk, btk, ctk, cek_selisihreg
*/
$part=$this->kl_model->cekpart()->result();
foreach($part as $parta){$jpart=$parta->jpart;}

if($jpart==0)
	{
	$id_part=" ";
	$codeuker=" ";
	$keluar_part="";
	$guna_part="";
	$jml_slm=0;
	$slm_parta=0;
	$slm_partb=0;
	$lap_teknisi="";
	$jml_lapteknisia=0;
	$jml_lapteknisib=0;
	$formpart="".base_url()."index.php/kl/parti";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dpart=$this->kl_model->dpart()->result();
	foreach($dpart as $dpart_)
		{
		$id_part=$dpart_->id_part;
		$keluar_part=$dpart_->keluar_part;
		$guna_part=$dpart_->guna_part;
		$jml_slm=$dpart_->jml_slm;
		$slm_parta=$dpart_->slm_parta;
		$slm_partb=$dpart_->slm_partb;
		$lap_teknisi=$dpart_->lap_teknisi;
		$jml_lapteknisia=$dpart_->jml_lapteknisia;
		$jml_lapteknisib=$dpart_->jml_lapteknisib;
		}
	$formpart="".base_url()."index.php/kl/partiup";
	$btnclass="warning";
	$btn="Ganti";
	}


?>
<div class="tab-pane fade <?php echo"$fpart"; ?>" id="sgb" role="tabpanel" aria-labelledby="sgb-tab">
<h3>Sparepart</h3>

<p>Memeriksa Penggunaan Laporan Sparepart & Teknisi
<?php
?>
</p>

<div class="card-body card-block">
<form action="<?php echo"$formpart"; ?>" method="post" class="form-horizontal">

<!-------------->
<div class="row form-group">
	<div class="col col-md-4">
	<label class=" form-control-label">Pengeluaran Sparepart H-1</label>
	</div>
	
	<div class="col col-md-8">
		<div class="form-check">
			<div class="radio">
			<label for="radio1prt" class="form-check-label ">
			<input type="radio" id="radio1prt" name="keluar_part" value="Ada" class="form-check-input" 
			<?php 
			if($keluar_part=='Ada'){echo"checked='checked'";} else {}
			?>>Ada
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2prt" class="form-check-label ">
			<input type="radio" id="radio2prt" name="keluar_part" value="Tidak" class="form-check-input"
			<?php 
			if($keluar_part=='Tidak'){echo"checked='checked'";} else {}
			?>
			>Tidak
			</label>
			</div>
		</div>
	</div>
</div>


<!-------------->
<div class="row form-group">
	<div class="col col-md-4">
	<label class=" form-control-label">Sesuai Penggunaan</label>
	</div>
	
	<div class="col col-md-8">
		<div class="form-check">
			<div class="radio">
			<label for="radio1prta" class="form-check-label ">
			<input type="radio" id="radio1prta" name="guna_part" value="Sesuai" class="form-check-input" 
			<?php 
			if($guna_part=='Sesuai'){echo"checked='checked'";} else {}
			?>>Sesuai
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2prtb" class="form-check-label ">
			<input type="radio" id="radio2prtb" name="guna_part" value="Tidak Sesuai" class="form-check-input"
			<?php 
			if($guna_part=='Tidak Sesuai'){echo"checked='checked'";} else {}
			?> 
			>Tidak Sesuai
			</label>
			</div>
		</div>
	</div>
</div>



<!-------------->


 <div class="row form-group">
		<div class="col col-md-4"><label for="text-input" class=" form-control-label">Jumlah SLM Oleh Teknisi</label>
		</div>
		<div class="col-12 col-md-8"><input type="text"  onkeyup="formatAngka(this, '.')" name="jml_slm"  placeholder="" class="form-control"
		<?php echo"value='$jml_slm'";?>
		>
		</div>
</div>

	

	<div class="row form-group">
		
		<div class="col col-md-1"><label for="text-input" class=" form-control-label"></label>
		</div>

		<div class="col col-md-5"><label for="text-input" class=" form-control-label">SLM yang Memerlukan Sparepart</label>
		</div>
		<div class="col-12 col-md-6"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="slm_parta"  placeholder="" class="form-control"
		<?php echo"value='$slm_parta'";?>
		>
		</div>
	</div>

<div class="row form-group">
		
		<div class="col col-md-1"><label for="text-input" class=" form-control-label"></label>
		</div>

		<div class="col col-md-5"><label for="text-input" class=" form-control-label">SLM tidak Memerlukan Sparepart</label>
		</div>
		<div class="col-12 col-md-6"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="slm_partb"  placeholder="" class="form-control"
		<?php echo"value='$slm_partb'";?>
		>
		</div>
	</div>

<!----->

<div class="row form-group">
	<div class="col col-md-4">
	<label class=" form-control-label">Laporan Teknisi</label>
	</div>
	
	<div class="col col-md-8">
		<div class="form-check">
			<div class="radio">
			<label for="radio1prta_" class="form-check-label ">
			<input type="radio" id="radio1prta_" name="lap_teknisi" value="Ada" class="form-check-input" 
			<?php 
			if($lap_teknisi=='Ada'){echo"checked='checked'";} else {}
			?>>Ada
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2prtb_" class="form-check-label ">
			<input type="radio" id="radio2prtb_" name="lap_teknisi" value="Tidak Ada" class="form-check-input"
			<?php 
			if($lap_teknisi=='Tidak Ada'){echo"checked='checked'";} else {}
			?> 
			>Tidak Ada
			</label>
			</div>
		</div>
	</div>
</div>


<!----------->

<div class="row form-group">
		
		<div class="col col-md-1"><label for="text-input" class=" form-control-label"></label>
		</div>

		<div class="col col-md-5"><label for="text-input" class=" form-control-label">Yang Dilaporkan</label>
		</div>
		<div class="col-12 col-md-6"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="jml_lapteknisia"  placeholder="" class="form-control"
		<?php echo"value='$jml_lapteknisia'";?>
		>
		</div>
	</div>

<div class="row form-group">
		
		<div class="col col-md-1"><label for="text-input" class=" form-control-label"></label>
		</div>

		<div class="col col-md-5"><label for="text-input" class=" form-control-label">Tidak Dilaporkan</label>
		</div>
		<div class="col-12 col-md-6"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="jml_lapteknisib"  placeholder="" class="form-control"
		<?php echo"value='$jml_lapteknisib'";?>
		>
		</div>
	</div>

<!----->


<div class="card-footer">

<?php
	foreach($iduser as $usera)
	{
	$myidkl=$usera->idkl;
	$mycodeuker=$usera->codeuker;
	$mynamakl=$usera->namakl;
	}
	echo"<input type='hidden' name='codeuker' value='$mycodeuker'>
	<input type='hidden' name='id_part' value='$id_part'>
	";
	?>
	<input type="hidden" name="add" value="part">

<button type="submit" class="btn btn-<?php echo $btnclass;?> btn-sm">
<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
</button>

<button type="reset" class="btn btn-danger btn-sm">
<i class="fa fa-ban"></i> Ulangi
</button>
</div>

</form>


</div>



</div>
<!--



-->