<?php
$doktka=$this->kl_model->cekdoktk()->result();
foreach($doktka as $doktkb)
{$jdoktk=$doktkb->jmldoktk;}

if($jdoktk==0)
	{
	$id_doktk=" ";
	$tka=" ";
	$tkb=" ";
	$tkc=" ";
	$totaltk=" ";
	$kettk=" ";
	$formdoktk="".base_url()."index.php/kl/pggi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$ddoktk=$this->kl_model->ddoktk()->result();
	foreach($ddoktk as $ddoktk_)
		{
		$id_doktk=$ddoktk_->id_doktk;
		$tka=$ddoktk_->tka;
		$tkb=$ddoktk_->tkb;
		$tkc=$ddoktk_->tkc;
		$totaltk=$tka+$tkb+$tkc;
		$kettk=$ddoktk_->kettk;
		$formdoktk="".base_url()."index.php/kl/pggiup";
		$btnclass="warning";
		$btn="Ganti";
		}
	}
?>



<div class="tab-pane fade <?php echo"$fdoktk"; ?>" id="pgg" role="tabpanel" aria-labelledby="pgg-tab">
<h3>Dokumen Tambahan Kas</h3>
<p>Kelengkapan Dokumen</p>



<form action="<?php echo $formdoktk; ?>" method="post" class="form-horizontal">

	 <div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 20.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="text-input" name="tka" placeholder="" class="form-control" <?php echo"value='$tka'"; ?>>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 50.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="text-input" name="tkb" placeholder="" class="form-control" <?php echo"value='$tkb'"; ?>>
		</div>
	</div>

	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 100.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="text-input" name="tkc" placeholder="" class="form-control" <?php echo"value='$tkc'"; ?>>
		</div>
	</div>

	

<div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Kelengkapan Dokumen</label>
	</div>
	
	<div class="col col-md-9">
		<div class="form-check">
			<div class="radio">
			<label for="radio1_" class="form-check-label ">
			<input type="radio" id="radio1_" name="kettk" value="Lengkap" class="form-check-input" 
			<?php
			if($kettk=='Lengkap') {echo"checked='checked'";} else {}
			?>
			>Lengkap
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2_" class="form-check-label ">
			<input type="radio" id="radio2_" name="kettk" value="Tidak Lengkap" class="form-check-input"
			<?php
			if($kettk=='Tidak Lengkap') {echo"checked='checked'";} else {}
			?>
			>Tidak Lengkap
			</label>
			</div>
		</div>
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
	echo"<input type='hidden' name='id_doktk' value='$id_doktk'> ";
	?>
	<input type="hidden" name="add" value="doktk">
	<button type="submit" class="btn btn-<?php echo $btnclass; ?> btn-sm">
	<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
	</button>

	<button type="reset" class="btn btn-danger btn-sm">
	<i class="fa fa-ban"></i> Ulangi
	</button>
	</div>

</div>























</div>



	</div>




					</div>

				</div>

            </div>


           

         
            

            
            

            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->