  <?php

$kuncix=$this->kl_model->cekkunci()->result();
foreach($kuncix as $kuncia){$jkunci=$kuncia->jkunci;}

if($jkunci==0)
	{
	$id_kunci=" ";
	$codeuker=" ";
	$leader_kunci=" ";
	$rpl_kunci=0;
	$flm_kunci=0;
	$cad_kunci=0;
	$formkunci="".base_url()."index.php/kl/kuncii";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dkunci=$this->kl_model->dkunci()->result();
	foreach($dkunci as $dkunci_)
		{
		$id_kunci=$dkunci_->id_kunci;
		$leader_kunci=$dkunci_->leader_kunci;
		$rpl_kunci=$dkunci_->rpl_kunci;
		$flm_kunci=$dkunci_->flm_kunci;
		$cad_kunci=$dkunci_->cad_kunci;
		}
	$formkunci="".base_url()."index.php/kl/kunciiup";
	$btnclass="warning";
	$btn="Ganti";
	}


?>
<div class="tab-pane fade <?php echo"$fkunci"; ?>" id="sgd" role="tabpanel" aria-labelledby="sgd-tab">
<h3>Kunci</h3>

<p>Pengecekan Laporan Opname Kunci dari Leader
<?php

?>
</p>

<div class="card-body card-block">
<form action="<?php echo"$formkunci"; ?>" method="post" class="form-horizontal">

 <div class="row form-group">
		<div class="col col-md-4"><label for="text-input" class=" form-control-label">Leader Penanggung Jawab</label>
		</div>
		<div class="col-12 col-md-8"><input type="text" name="leader_kunci"  placeholder="" class="form-control"
		<?php echo"value='$leader_kunci'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
	<!-- -->
		<div class="col col-md-4"><label for="text-input" class=" form-control-label">Jumlah Kunci RPL</label>
		</div>
		<div class="col-12 col-md-8"><input type="text"  name="rpl_kunci"  placeholder="" class="form-control"
		<?php echo"value='$rpl_kunci'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-4"><label for="text-input" class=" form-control-label">Jumlah Kunci FLM</label>
		</div>
		<div class="col-12 col-md-8"><input type="text" name="flm_kunci"  placeholder="" class="form-control"
		<?php echo"value='$flm_kunci'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-4"><label for="text-input" class=" form-control-label">Jumlah Kunci Cadangan</label>
		</div>
		<div class="col-12 col-md-8"><input type="text" name="cad_kunci"  placeholder="" class="form-control"
		<?php echo"value='$cad_kunci'";?>
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
	<input type='hidden' name='id_kunci' value='$id_kunci'>
	";
	?>
	<input type="hidden" name="add" value="kunci">

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