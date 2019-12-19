  <?php

$lemburx=$this->kl_model->ceklembur()->result();
foreach($lemburx as $lembura){$jlembur=$lembura->jlembur;}

if($jlembur==0)
	{
	$id_lembur=" ";
	$codeuker=" ";
	$lembura=0;
	$lemburb=0;
	$lemburc=0;
	$formlembur="".base_url()."index.php/kl/lemburi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dlembur=$this->kl_model->dlembur()->result();
	foreach($dlembur as $dlembur_)
		{
		$id_lembur=$dlembur_->id_lembur;
		$lembura=$dlembur_->lembura;
		$lemburb=$dlembur_->lemburb;
		$lemburc=$dlembur_->lemburc;
		}
	$formlembur="".base_url()."index.php/kl/lemburiup";
	$btnclass="warning";
	$btn="Ganti";
	}


?>
<div class="tab-pane fade <?php echo"$flembur"; ?>" id="sgc" role="tabpanel" aria-labelledby="sgc-tab">
<h3>Lembur</h3>

<p>Pengecekan Lembur Pekerja
<?php

?>
</p>

<div class="card-body card-block">
<form action="<?php echo"$formlembur"; ?>" method="post" class="form-horizontal">

<!-------------->
<div class="row form-group">
	<div class="col col-md-12">
	<label class=" form-control-label">Kelengkapan Dokumen Lembur</label>
	</div>
	
	
</div>


<!-------------->
<div class="row form-group">
	<div class="col col-md-12">
		<div class="checkbox">
		<label class="form-check-label " for="lembura">
		<input id="lembura" class="form-check-input" type="checkbox" name="lembura" value="1"
		<?php
		if($lembura==0){}
		else{echo"checked='checked'";}
		?>
		>
		Surat Perintah Lembur
		</label>
		</div>

	</div>
	
	
</div>

<!-------------->
<div class="row form-group">
	<div class="col col-md-12">
		<div class="checkbox">
		<label class="form-check-label " for="lemburb">
		<input id="lemburb" class="form-check-input" type="checkbox" name="lemburb" value="1"
		<?php
		if($lemburb==0){}
		else{echo"checked='checked'";}
		?>
		>
		Daftar Pelaksanaan Lembur
		</label>
		</div>

	</div>
	
	
</div>

<!-------------->
<div class="row form-group">
	<div class="col col-md-12">
		<div class="checkbox">
		<label class="form-check-label " for="lemburc">
		<input id="lemburc" class="form-check-input" type="checkbox" name="lemburc" value="1"
		<?php
		if($lemburc==0){}
		else{echo"checked='checked'";}
		?>
		>
		Memeriksa Jumlah Lembur Pekerja
		</label>
		</div>

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
	<input type='hidden' name='id_lembur' value='$id_lembur'>
	";
	?>
	<input type="hidden" name="add" value="lembur">

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