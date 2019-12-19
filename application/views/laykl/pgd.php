<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rupiah.js"></script>


<?php
$saldobb=$this->kl_model->ceksaldobb()->result();
foreach($saldobb as $ba_)
{$jsalbb=$ba_->jsalbb;}

if($jsalbb==0)
	{
	$id_saldo=" ";
	$saldobba=" ";
	$saldoabbb=" ";
	$saldoabbc=" ";
	$saldoabbtot=" ";
	$formbb="".base_url()."index.php/kl/saldoi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dsalbb=$this->kl_model->dsalbb()->result();
	foreach($dsalbb as $dsalbb_)
		{
		$id_saldo=$dsalbb_->id_saldo;
		$saldobba=$dsalbb_->saldoa;
		$saldobbb=$dsalbb_->saldob;
		$saldobbc=$dsalbb_->saldoc;
		//$saldotot=$saldoa+$saldob+$saldoc;
		$formbb="".base_url()."index.php/kl/saldoiup";
		$btnclass="warning";
		$btn="Ganti";
		}
	}
?>


<div class="tab-pane fade <?php echo"$fsalbb"; ?>" id="pgd" role="tabpanel" aria-labelledby="pgd-tab">
<h3>Saldo BB</h3>
<p>Pengecekan Saldo BB</p>

<div class="card-body card-block">
<form action="<?php echo $formbb; ?>" method="post" class="form-horizontal">

	 <div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 20.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text"  onkeyup="formatAngka(this, '.')" name="saldoa"  placeholder="" class="form-control"
		<?php echo"value='$saldobba'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
	<!-- -->
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 50.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="saldob"  placeholder="" class="form-control"
		<?php echo"value='$saldobbb'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 100.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="denc" onkeyup="formatAngka(this, '.')" name="saldoc"  placeholder="" class="form-control"
		<?php echo"value='$saldobbc'";?>
		>
		</div>
	</div>
	
	
	<div class="card-footer">
	<input type="hidden" name="jns_saldo" value="bb">
	<?php
	foreach($iduser as $usera)
	{
	$myidkl=$usera->idkl;
	$mycodeuker=$usera->codeuker;
	$mynamakl=$usera->namakl;
	}
	echo"<input type='hidden' name='codeuker' value='$mycodeuker'> ";
	echo"<input type='hidden' name='id_saldo' value='$id_saldo'> ";
	?>
	<input type="hidden" name="add" value="salbb">
	<button type="submit" class="btn btn-<?php echo $btnclass; ?> btn-sm">
	<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
	</button>
	
	<button type="reset" class="btn btn-danger btn-sm">
	<i class="fa fa-ban"></i> Ulangi
	</button>
	</div>
	</form>


<!--
<button type="submit" class="btn btn-warning btn-sm">
	<i class="fa fa-dot-circle-o"></i> Submit
	</button>
<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Total</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="jml" name="total" placeholder="" class="form-control" readonly>
		</div>
	</div>

<script>
function koma(num)
{
    return (num.replace(/./g,''));  
}

function hilang_spasi(string) 
	{
	return string.split('.').join('');
	}

function sum() {
      var ndenoma = document.getElementById('dena').value;
      var ndenomb = document.getElementById('denb').value;
	   var ndenomc = document.getElementById('denc').value;

	   
      var result = parseInt(ndenoma) + parseInt(ndenomb) + parseInt(ndenomc);
	 
     if (!isNaN(result)) {
         document.getElementById('jml').value = result;}
      
	
      
}
</script>

var denomax=hilang_spasi('ndenoma');
	   var denombx=hilang_spasi('ndenomb');
	   var denomcx=hilang_spasi('ndenomc');

id="text-input"
<input type='text' name='ret1' id='ret1'  onkeyup='sum()' class='input' value='0' $ketret1>
<input type='text' name='tot' id='tot' size='10' style='font-size:20pt;' readonly>
-->




</div>






</div>