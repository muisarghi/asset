<?php

$reli=$this->kl_model->cekreli()->result();
foreach($reli as $a){$jmlreli=$a->jmlreli;}

if($jmlreli==0)
	{
	$id_reli=" ";
	$codeuker=" ";
	$reli99=" ";
	$ket_reli=" ";
	$formreli="".base_url()."index.php/kl/pgai";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dtreli=$this->kl_model->dreli()->result();
	foreach($dtreli as $dtreli)
		{
		$id_reli=$dtreli->id_reli;
		$codeuker=$dtreli->codeuker;
		$reli99=$dtreli->reli99;
		$ket_reli=$dtreli->ket_reli;
		}
	$formreli="".base_url()."index.php/kl/pgaiup";
	$btnclass="warning";
	$btn="Ganti";
	}


?>
<div class="tab-pane fade <?php echo"$freli"; ?>" id="pga" role="tabpanel" aria-labelledby="pga-tab">
<h3>Reliability</h3>

<p>Memeriksa Pencapaian Realibility H-1
<?php //echo"--> $codeuker, $reli99, $ket_reli --$jmlreli";
?>
</p>

<div class="card-body card-block">
<form action="<?php echo"$formreli"; ?>" method="post" class="form-horizontal">

 
 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Reliability > 99%</label>
	</div>
	
	<div class="col col-md-9">
		<div class="form-check">
			<div class="radio">
			<label for="radio1" class="form-check-label ">
			<input type="radio" id="radio1" name="reli99" value="Ya" class="form-check-input" 
			<?php 
			if($reli99=='Ya'){echo"checked='checked'";} else {}
			?>>Ya
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2" class="form-check-label ">
			<input type="radio" id="radio2" name="reli99" value="Tidak" class="form-check-input"
			<?php 
			if($reli99=='Tidak'){echo"checked='checked'";} else {}
			?>
			>Tidak
			</label>
			</div>
		</div>
	</div>
</div>
	


<div class="row form-group">
	<div class="col col-md-3">
	<label for="textarea-input" class=" form-control-label">Penyebabnya</label>
	</div>
	
	<div class="col col-md-9">
	<textarea name="ketreli" id="textarea-input" rows="9" placeholder="Penyebabnya..." class="form-control"><?php echo"$ket_reli";?></textarea>
	<?php
	foreach($iduser as $usera)
	{
	$myidkl=$usera->idkl;
	$mycodeuker=$usera->codeuker;
	$mynamakl=$usera->namakl;
	}
	echo"<input type='hidden' name='codeuker' value='$mycodeuker'>
	<input type='hidden' name='id_reli' value='$id_reli'>
	";
	?>
	<input type="hidden" name="add" value="reli">
	</div>
</div>



<div class="card-footer">

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
