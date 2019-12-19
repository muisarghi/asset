
<?php

///////////////// CREATE DROPDOWN
///////////////// EDIT 1 b 1
///////

$cselisiha=$this->kl_model->cekselisiha()->result();
foreach($cselisiha as $aaxa)
{$jselplus=$aaxa->jselplus;}

if($jselplus==0)
	{
	$selisihplus=0;
	$formselplus="".base_url()."index.php/kl/selisihi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$selisihplus=1;
	$formselplus="".base_url()."index.php/kl/selisihiup";
	$btnclass="primary";
	$btn="Simpan";
	$dselplus=$this->kl_model->dselisiha()->result();
	//$no=1; 138
	foreach($dselplus as $dselplus_)
		{
		//echo"$dselmin_->ket_selisihdata - $dselmin_->selisiha )) ";
		$id_selisih=$dselplus_->id_selisih;
		//$selisih=$dselplus_->selisih;
		$klarifikasi=$dselplus_->klarifikasi;
		$leader=$dselplus_->leader;
		
		$formselplus="".base_url()."index.php/kl/selisihiup";
		$btnclass="warning";
		$btn="Ganti";
		if($dselplus_->ket_selisihdata=='Surplus Kaset')
			{
			$plusaa=$dselplus_->selisiha;
			$plusab=$dselplus_->selisihb;
			$plusac=$dselplus_->selisihc;
			$optplusa="checked='checked'";
			//echo" in fraud ";
			}
		elseif($dselplus_->ket_selisihdata=='Surplus Pengembalian Nasabah')
			{
			$plusba=$dselplus_->selisiha;
			$plusbb=$dselplus_->selisihb;
			$plusbc=$dselplus_->selisihc;
			$optplusb="checked='checked'";
			//echo" in vandal $minba";
			}
		elseif($dselplus_->ket_selisihdata=='Surplus Setoran Return')
			{
			$plusca=$dselplus_->selisiha;
			$pluscb=$dselplus_->selisihb;
			$pluscc=$dselplus_->selisihc;
			$optplusc="checked='checked'";
			//echo" rsk msin $minca";
			}
		elseif($dselplus_->ket_selisihdata=='Surplus Salah Denom')
			{
			$plusda=$dselplus_->selisiha;
			$plusdb=$dselplus_->selisihb;
			$plusdc=$dselplus_->selisihc;
			$optplusd="checked='checked'";
			//echo" saldom ";
			}
		elseif($dselplus_->ket_selisihdata=='Tidak Diketahui')
			{
			$plusea=$dselplus_->selisiha;
			$pluseb=$dselplus_->selisihb;
			$plusec=$dselplus_->selisihc;
			$optpluse="checked='checked'";
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


<div class="tab-pane fade <?php echo"$fselplus"; ?>" id="pgf" role="tabpanel" aria-labelledby="pgf-tab">
<h3>Surplus</h3>
<p>Surplus H-1.</p>

<div class="card-body card-block">
<form action="<?php echo $formselplus; ?>" method="post" class="form-horizontal">

 
 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Surplus</label>
	</div>
	
	<div class="col col-md-9">
		<div class="form-check">
			<div class="radio">
			<label for="radio1a" class="form-check-label ">
			<input type="radio" id="radio1a" name="selisih" value="1" class="form-check-input" 
			<?php
			if($selisihplus==1) {echo"checked='checked'";} else {}
			?>
			>Ada
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2a" class="form-check-label ">
			<input type="radio" id="radio2a" name="selisih" value="0" class="form-check-input" 
			<?php
			if($selisihplus==0) {echo"checked='checked'";} else {}
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
		<label class="form-check-label " for="surka">
		<input id="surka" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusa" <?php echo $optplusa; ?>>
		Surplus Kaset
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusaa" placeholder="" class="form-control" <?php echo"value='$plusaa'"; ?>>
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusab" placeholder="" class="form-control" <?php echo"value='$plusab'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusac" placeholder="" class="form-control" <?php echo"value='$plusac'"; ?>>
	</div>

</div>


<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="penas">
		<input id="penas" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusb" <?php echo $optplusb; ?>>
		Surplus Pengembalian Nasabah
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusba" placeholder="" class="form-control" <?php echo"value='$plusba'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusbb" placeholder="" class="form-control" <?php echo"value='$plusbb'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusbc" placeholder="" class="form-control" <?php echo"value='$plusbc'"; ?>>
	</div>

</div>



<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="retu">
		<input id="retu" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusc" <?php echo $optplusc; ?>>
		Surplus Setoran Return
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusca" placeholder="" class="form-control"  <?php echo"value='$plusca'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="pluscb" placeholder="" class="form-control" <?php echo"value='$pluscb'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="pluscc" placeholder="" class="form-control" <?php echo"value='$pluscc'"; ?> >
	</div>

</div>

<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="sadenom">
		<input id="sadenom" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusd" <?php echo $optplusd; ?>>
		Surplus Salah Denom
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusda" placeholder="" class="form-control" <?php echo"value='$plusda'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusdb" placeholder="" class="form-control" <?php echo"value='$plusdb'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusdc" placeholder="" class="form-control" <?php echo"value='$plusdc'"; ?>>
	</div>

</div>


<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="tkth">
		<input id="tkth" class="form-check-input" type="checkbox" name="indikasi[]" value="inpluse" <?php echo $optpluse; ?>>
		Tidak Diketahui
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusea" placeholder="" class="form-control" <?php echo"value='$plusea'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="pluseb" placeholder="" class="form-control" <?php echo"value='$pluseb'"; ?>>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusec" placeholder="" class="form-control" <?php echo"value='$plusec'"; ?>>
	</div>

</div>


<!-------------------------->

 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Klarifikasi Ke Leader</label>
	</div>
	
	<div class="col col-md-9">
		<div class="form-check">
			<div class="radio">
			<label for="klari" class="form-check-label ">
			<input type="radio" id="klari" name="klarifikasi" value="1" class="form-check-input"
			<?php
			if($klarifikasi==1){echo"checked='checked'";} else {}
			?>
			>Sudah
			</label>
			</div>
			
			<div class="radio">
			<label for="klari2" class="form-check-label ">
			<input type="radio" id="klari2" name="klarifikasi" value="0" class="form-check-input" 
			<?php
			if($klarifikasi==0){echo"checked='checked'";} else {}
			?>
			>Belum
			</label>
			</div>
		</div>
	</div>
</div>

<!--------------------------->

 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Leader Penanggungjawab</label>
	</div>
	
	<div class="col col-md-9">
	<input type="text" id="text-input" name="leader" placeholder="" class="form-control" <?php echo"value='$leader'"; ?>>
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
<input type="hidden" name="add" value="selplus">
<input type="hidden" name="jns_selisih" value="surplus">

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