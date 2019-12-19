  <?php
/*
selisihreg:
id_selisihreg, tgl_selisihreg, codeuker, aatm, batm, catm, atk, btk, ctk, cek_selisihreg
*/
$selisihreg=$this->kl_model->cekselisihreg()->result();
foreach($selisihreg as $selreg){$jselreg=$selreg->jselreg;}

if($jselreg==0)
	{
	$id_selisihreg=" ";
	$codeuker=" ";
	$aatm=0;
	$batm=0;
	$catm=0;
	$atk=0;
	$btk=0;
	$ctk=0;
	$formselreg="".base_url()."index.php/kl/selregi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dtselreg=$this->kl_model->dselisihreg()->result();
	foreach($dtselreg as $dtselregi)
		{
		$id_selisihreg=$dtselregi->id_selisihreg;
		$codeuker=$dtselregi->codeuker;
		$aatm=$dtselregi->aatm;
		$batm=$dtselregi->batm;
		$catm=$dtselregi->catm;
		$atk=$dtselregi->atk;
		$btk=$dtselregi->btk;
		$ctk=$dtselregi->ctk;
		}
	$formselreg="".base_url()."index.php/kl/selregiup";
	$btnclass="warning";
	$btn="Ganti";
	}


?>
<div class="tab-pane fade <?php echo"$fselreg"; ?>" id="sga" role="tabpanel" aria-labelledby="sga-tab">
<h3>Register Surplus</h3>

<p>Pengecekan Buku Register Surplus-Shortage
<?php
?>
</p>

	<div class="card-body card-block">
	<form action="<?php echo"$formselreg"; ?>" method="post" class="form-horizontal">


		<div class="row form-group">
			<div class="col col-md-9"><label for="text-input" class=" form-control-label">Surplus - Shortage ATM</label>
			</div>
			
			<div class="col-12 col-md-3">
			</div>
		</div>

	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 20.000</label>
		</div>
		
		<div class="col-12 col-md-9"><input type="text"  onkeyup="formatAngka(this, '.')" name="aatm"  placeholder="" class="form-control"
		<?php echo"value='$aatm'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
	<!-- -->
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 50.000</label>
		</div>
		
		<div class="col-12 col-md-9"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="batm"  placeholder="" class="form-control"
		<?php echo"value='$batm'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 100.000</label>
		</div>
		
		<div class="col-12 col-md-9"><input type="text" id="denc" onkeyup="formatAngka(this, '.')" name="catm"  placeholder="" class="form-control"
		<?php echo"value='$catm'";?>
		>
		</div>
	</div>

<!----------------->

	<div class="row form-group">
		<div class="col col-md-9"><label for="text-input" class=" form-control-label">Surplus - Shortage TK</label>
		</div>
		
		<div class="col-12 col-md-3">
		</div>
	</div>

	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 20.000</label>
		</div>
		
		<div class="col-12 col-md-9"><input type="text"  onkeyup="formatAngka(this, '.')" name="atk"  placeholder="" class="form-control"
		<?php echo"value='$atk'";?>
		>
		</div>
	</div>

	<div class="row form-group">
	<!-- -->
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 50.000</label>
		</div>
		
		<div class="col-12 col-md-9"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="btk"  placeholder="" class="form-control"
		<?php echo"value='$btk'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 100.000</label>
		</div>
		
		<div class="col-12 col-md-9"><input type="text" id="denc" onkeyup="formatAngka(this, '.')" name="ctk"  placeholder="" class="form-control"
		<?php echo"value='$ctk'";?>
		>
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
	echo"<input type='hidden' name='codeuker' value='$mycodeuker'>
	<input type='hidden' name='id_selisihreg' value='$id_selisihreg'>
	";
	?>
	<input type="hidden" name="add" value="selisihreg">

	<button type="submit" class="btn btn-<?php echo $btnclass;?> btn-sm">
	<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
	</button>

	<button type="reset" class="btn btn-danger btn-sm">
	<i class="fa fa-ban"></i> Ulangi
	</button>
	</form>
	</div>

</div>


</div>

