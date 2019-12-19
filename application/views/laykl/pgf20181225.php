<div class="tab-pane fade <?php echo"$fselplus"; ?>" id="pgf" role="tabpanel" aria-labelledby="pgf-tab">
<h3>Surplus</h3>
<p>Surplus H-1</p>

<div class="card-body card-block">
<form action="<?php echo base_url(); ?>index.php/kl/selisihi" method="post" class="form-horizontal">

 <!---
<div>
<label>
form action method post class form-horizontal
div class tab pane fade id pgf role tabpanel aria labelledby pgf tab
surplus h3
surplus h-1
</label>
</div>
 -->


 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Surplus</label>
	</div>
	
	<div class="col col-md-9">
		<div class="form-check">
			<div class="radio">
			<label for="radio1" class="form-check-label ">
			<input type="radio" id="radio1" name="selisih" value="1" class="form-check-input">Ada
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2" class="form-check-label ">
			<input type="radio" id="radio2" name="selisih" value="0" class="form-check-input">Tidak
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
		<input id="surka" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusa">
		Surplus Kaset
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusaa" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusab" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusac" placeholder="" class="form-control" value="0">
	</div>

</div>


<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="penas">
		<input id="penas" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusb">
		Surplus Pengembalian Nasabah
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusba" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusbb" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusbc" placeholder="" class="form-control" value="0">
	</div>

</div>



<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="retu">
		<input id="retu" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusc">
		Surplus Setoran Return
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusca" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="pluscb" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="pluscc" placeholder="" class="form-control" value="0">
	</div>

</div>

<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="sadenom">
		<input id="sadenom" class="form-check-input" type="checkbox" name="indikasi[]" value="inplusd">
		Surplus Salah Denom
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusda" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusdb" placeholder="" class="form-control" value="0">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusdc" placeholder="" class="form-control" value="0">
	</div>

</div>


<!----------------->

<div class="row form-group">
	<div class="col col-md-3">
		<div class="checkbox">
		<label class="form-check-label " for="tkth">
		<input id="tkth" class="form-check-input" type="checkbox" name="indikasi[]" value="inpluse">
		Tidak Diketahui
		</label>
		</div>
	</div>
	
	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusea" placeholder="" class="form-control">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="pluseb" placeholder="" class="form-control">
	</div>

	<div class="col col-md-3">
	<input type="text" id="text-input" name="plusec" placeholder="" class="form-control">
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
			<label for="radio1" class="form-check-label ">
			<input type="radio" id="radio1" name="klarifikasi" value="1" class="form-check-input">Sudah
			</label>
			</div>
			
			<div class="radio">
			<label for="radio2" class="form-check-label ">
			<input type="radio" id="radio2" name="klarifikasi" value="0" class="form-check-input">Belum
			</label>
			</div>
		</div>
	</div>
</div>

<!-------------
-------------->

 <div class="row form-group">
	<div class="col col-md-3">
	<label class=" form-control-label">Leader Penanggungjawab</label>
	</div>
	
	<div class="col col-md-9">
	<input type="text" id="text-input" name="leader" placeholder="" class="form-control">
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
	
	?>
<input type="hidden" name="add" value="selplus">
<input type="hidden" name="jns_selisih" value="surplus">
<button type="submit" class="btn btn-primary btn-sm">
<i class="fa fa-dot-circle-o"></i> Submit
</button>

<button type="reset" class="btn btn-danger btn-sm">
<i class="fa fa-ban"></i> Reset
</button>
</div>
</form>
</div>



</div>