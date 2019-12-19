
<?php

///////////////// CREATE DROPDOWN
///////////////// EDIT 1 b 1
///////

$cselisih=$this->kl_model->cekselisih()->result();
foreach($cselisih as $aax)
{$jselmin=$aax->jselmin;}

if($jselmin==0)
	{
	$selisih=0;
	$formselmin="".base_url()."index.php/kl/selisihi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$selisih=1;
	$formselmin="".base_url()."index.php/kl/selisihiup";
	$btnclass="primary";
	$btn="Simpan";
	$dselmin=$this->kl_model->dselisih()->result();
	//$no=1;
	foreach($dselmin as $dselmin_)
		{
		//echo"$dselmin_->ket_selisihdata - $dselmin_->selisiha )) ";
		$id_selisih=$dselmin_->id_selisih;
		$dtselisih=$dselmin_->selisih;
		
		$formselmin="".base_url()."index.php/kl/selisihiup";
		$btnclass="warning";
		$btn="Ganti";
		if($dselmin_->ket_selisihdata=='Indikasi Fraud')
			{
			$minaa=$dselmin_->selisiha;
			$minab=$dselmin_->selisihb;
			$minac=$dselmin_->selisihc;
			$optmina="checked='checked'";
			//echo" in fraud ";
			}
		elseif($dselmin_->ket_selisihdata=='Indikasi Vandal')
			{
			$minba=$dselmin_->selisiha;
			$minbb=$dselmin_->selisihb;
			$minbc=$dselmin_->selisihc;
			$optminb="checked='checked'";
			//echo" in vandal $minba";
			}
		elseif($dselmin_->ket_selisihdata=='Kerusakan Mesin')
			{
			$minca=$dselmin_->selisiha;
			$mincb=$dselmin_->selisihb;
			$mincc=$dselmin_->selisihc;
			$optminc="checked='checked'";
			//echo" rsk msin $minca";
			}
		elseif($dselmin_->ket_selisihdata=='Salah Denom')
			{
			$minda=$dselmin_->selisiha;
			$mindb=$dselmin_->selisihb;
			$mindc=$dselmin_->selisihc;
			$optmind="checked='checked'";
			//echo" saldom ";
			}
		elseif($dselmin_->ket_selisihdata=='Tidak Diketahui')
			{
			$minea=$dselmin_->selisiha;
			$mineb=$dselmin_->selisihb;
			$minec=$dselmin_->selisihc;
			$optmine="checked='checked'";
			//echo" unknown ";
			}
		else
			{
			//echo" - XXXX - $dselmin_->ket_selisihdata";
			}

		//echo"<br><br><br>$no. AAA a$minaa , b$minba , c$minca , d$minda , e$minea <br>";
		//$no++;	
		}
	
	}
	//echo"ii $jselmin<br>";
?>


<div class="tab-pane fade <?php echo"$fselmin"; ?>" id="pge" role="tabpanel" aria-labelledby="pge-tab">
<h3>Shortage</h3>
<p>Shortage H-1.</p>

<div class="card-body card-block">
<form action="<?php echo $formselmin; ?>" method="post" class="form-horizontal">

 
 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Shortage</label>
	</div>
	
	<div class="col col-md-9">
		<div class="form-check">
			<div class="radio">
			<label for="radio1" class="form-check-label ">
			<input type="radio" id="radio1" name="selisih" value="1" class="form-check-input"
			<?php
			if($selisih==1) {echo"checked='checked'";} else {}
			?>
			>Ada
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2" class="form-check-label ">
			<input type="radio" id="radio2" name="selisih" value="0" class="form-check-input" 
			<?php
			if($selisih==0) {echo"checked='checked'";} else {}
			?>
			>Tidak
			</label>
			</div>
		</div>
	</div>
</div>
	

<div class="row form-group">
	<div class="col col-md-3">
	
	</div>
	
	<div class="col col-md-3">
		<div class="alert alert-success" role="alert">
		Denom 20.000	
		</div>
	</div>

	<div class="col col-md-3">
		<div class="alert alert-primary" role="alert">
		Denom 50.000	
		</div>
	</div>
	
	<div class="col col-md-3">
		<div class="alert alert-danger" role="alert">
		Denom 100.000	
		</div>	
	</div>

</div>

<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="fraud">
		<input id="fraud" class="form-check-input" type="checkbox" name="indikasi[]" value="inmina" <?php echo $optmina; ?>>
		Indikasi Fraud
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minaa" placeholder="" class="form-control" <?php echo"value='$minaa'"; ?>>
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="minab" placeholder="" class="form-control" <?php echo"value='$minab'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minac" placeholder="" class="form-control" <?php echo"value='$minac'"; ?>>
	</div>

</div>


<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="vandal">
		<input id="vandal" class="form-check-input" type="checkbox" name="indikasi[]" value="inminb" <?php echo $optminb; ?>>
		Indikasi Vandal
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minba" placeholder="" class="form-control" <?php echo"value='$minba'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minbb" placeholder="" class="form-control" <?php echo"value='$minbb'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minbc" placeholder="" class="form-control" <?php echo"value='$minbc'"; ?>>
	</div>

</div>



<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="mesin">
		<input id="mesin" class="form-check-input" type="checkbox" name="indikasi[]" value="inminc" <?php echo $optminc; ?>>
		Kerusakan Mesin
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minca" placeholder="" class="form-control"  <?php echo"value='$minca'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="mincb" placeholder="" class="form-control" <?php echo"value='$mincb'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="mincc" placeholder="" class="form-control" <?php echo"value='$mincc'"; ?> >
	</div>

</div>

<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="sdenom">
		<input id="sdenom" class="form-check-input" type="checkbox" name="indikasi[]" value="inmind" <?php echo $optmind; ?>>
		Salah Denom
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minda" placeholder="" class="form-control" <?php echo"value='$minda'"; ?>>
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="mindb" placeholder="" class="form-control" <?php echo"value='$mindb'"; ?>>
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="mindc" placeholder="" class="form-control" <?php echo"value='$mindc'"; ?>>
	</div>

</div>


<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="tdkth">
		<input id="tdkth" class="form-check-input" type="checkbox" name="indikasi[]" value="inmine" <?php echo $optmine; ?>>
		Tidak Diketahui
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="minea" placeholder="" class="form-control" <?php echo"value='$minea'"; ?>>
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="mineb" placeholder="" class="form-control" <?php echo"value='$mineb'"; ?>>
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="minec" placeholder="" class="form-control" <?php echo"value='$minec'"; ?>>
	</div>

</div>


<div class="card-footer">
<?php

	foreach($iduser as $usera)
	{
	$myidkl=$usera->idkl;
	$mycodeuker=$usera->codeuker;
	$mynamakl=$usera->namakl;
	}
	echo"<input type='hidden' name='codeuker' value='$mycodeuker'> ";
	echo"<input type='hidden' name='id_selisih' value='$id_selisih'> ";
	?>
<input type="hidden" name="add" value="selmin">
<input type="hidden" name="jns_selisih" value="shortage">
<input type="hidden" name="klarifikasi" value="0">
<input type="hidden" name="leader" value="-">
<button type="submit" class="btn btn-<?php echo $btnclass; ?> btn-sm">
<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
</button>

<button type="reset" class="btn btn-danger btn-sm">
<i class="fa fa-ban"></i> Ulangi
</button>
</div>
</form>
</div>



</div>