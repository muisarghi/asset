 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rupiah.js"></script>

 <?php

$saldokegx=$this->kl_model->ceksaldokeg()->result();
foreach($saldokegx as $saldokega){$jsaldokeg=$saldokega->jsaldokeg;}

if($jsaldokeg==0)
	{
	$id_saldokeg=" ";
	$codeuker=" ";
	$tgl_saldokeg=" ";
	$kas_keg=0;
	$kas_erp=0;
	$giro_rek=0;
	$giro_erp=0;
	$persekot=0;
	$formsaldokeg="".base_url()."index.php/kl/saldokegi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dsaldokeg_=$this->kl_model->dsaldokeg()->result();
	foreach($dsaldokeg_ as $dsaldokeg)
		{
		$id_saldokeg=$dsaldokeg->id_saldokeg;
		$kas_keg=$dsaldokeg->kas_keg;
		$kas_erp=$dsaldokeg->kas_erp;
		$giro_rek=$dsaldokeg->giro_rek;
		$giro_erp=$dsaldokeg->giro_erp;
		$persekot=$dsaldokeg->persekot;
		}
	$formsaldokeg="".base_url()."index.php/kl/saldokegiup";
	$btnclass="warning";
	$btn="Ganti";
	}


?>
<div class="tab-pane fade <?php echo"$fsaldokeg"; ?>" id="sge" role="tabpanel" aria-labelledby="sge-tab">
<h3>Saldo Kas</h3>

<p>Pengecekan Saldo Kas Operasional
<?php

?>
</p>

	<div class="card-body card-block">
	<form action="<?php echo"$formsaldokeg"; ?>" method="post" class="form-horizontal">

		<div class="row form-group">
			<div class="col col-md-4"><label for="text-input" class=" form-control-label">Kas Fisik</label>
			</div>
			
			<div class="col-12 col-md-8"><input type="text" onkeyup="formatAngka(this, '.')" name="kas_keg"  placeholder="" class="form-control"
			<?php echo"value='$kas_keg'";?>
			>
			</div>
		</div>
	
		<div class="row form-group">
		<!-- -->
			<div class="col col-md-4"><label for="text-input" class=" form-control-label">Saldo Aplikasi ERP</label>
			</div>
			
			<div class="col-12 col-md-8"><input type="text"  onkeyup="formatAngka(this, '.')" name="kas_erp"  placeholder="" class="form-control"
			<?php echo"value='$kas_erp'";?>
			>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col col-md-4"><label for="text-input" class=" form-control-label">Saldo Giro Rekening </label>
			</div>
			
			<div class="col-12 col-md-8"><input type="text" onkeyup="formatAngka(this, '.')" name="giro_rek"  placeholder="" class="form-control"
			<?php echo"value='$giro_rek'";?>
			>
			</div>
		</div>
		
		<div class="row form-group">
			<div class="col col-md-4"><label for="text-input" class=" form-control-label">Saldo Giro ERP</label>
			</div>
			
			<div class="col-12 col-md-8"><input type="text" onkeyup="formatAngka(this, '.')" name="giro_erp"  placeholder="" class="form-control"
			<?php echo"value='$giro_erp'";?>
			>
			</div>
		</div>

		<div class="row form-group">
			<div class="col col-md-4"><label for="text-input" class=" form-control-label">Biaya Persekot >1 hari</label>
			</div>
			
			<div class="col-12 col-md-8"><input type="text" onkeyup="formatAngka(this, '.')" name="persekot"  placeholder="" class="form-control"
			<?php echo"value='$persekot'";?>
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
	<input type='hidden' name='id_saldokeg' value='$id_saldokeg'>
	";
	?>
	<input type="hidden" name="add" value="saldokeg">
	
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