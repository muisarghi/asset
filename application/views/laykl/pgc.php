<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rupiah.js"></script>

<?php
$saldoapp=$this->kl_model->ceksaldoapp()->result();
foreach($saldoapp as $ba)
{$jsalapp=$ba->jsalapp;}

if($jsalapp==0)
	{
	$id_saldo=" ";
	$saldoappa=" ";
	$saldoappb=" ";
	$saldoappc=" ";
	$saldoapptot=" ";
	$formapp="".base_url()."index.php/kl/saldoi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dsalapp=$this->kl_model->dsalapp()->result();
	foreach($dsalapp as $dsalapp_)
		{
		$id_saldo=$dsalapp_->id_saldo;
		$saldoappa=$dsalapp_->saldoa;
		$saldoappb=$dsalapp_->saldob;
		$saldoappc=$dsalapp_->saldoc;
		//$saldotot=$saldoa+$saldob+$saldoc;
		$formapp="".base_url()."index.php/kl/saldoiup";
		$btnclass="warning";
		$btn="Ganti";
		}
	}
?>

<div class="tab-pane fade <?php echo"$fsalapp"; ?>" id="pgc" role="tabpanel" aria-labelledby="pgc-tab">
<h3>Saldo Aplikasi</h3>
<p>Pengecekan Saldo Aplikasi</p>

<div class="card-body card-block">
<form action="<?php echo $formapp ?>" method="post" class="form-horizontal">

	 <div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 20.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text"  onkeyup="formatAngka(this, '.')" name="saldoa"  placeholder=".000" class="form-control" 
		<?php
		echo"value='$saldoappa'";
		?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 50.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="saldob"  placeholder=".000" class="form-control"
		<?php
		echo"value='$saldoappb'";
		?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 100.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="denc" onkeyup="formatAngka(this, '.')" name="saldoc"  placeholder=".000" class="form-control"
		<?php
		echo"value='$saldoappc'";
		?>
		>
		</div>
	</div>
	
	
	<div class="card-footer">
	<input type="hidden" name="jns_saldo" value="app">
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
	<input type="hidden" name="add" value="salapp">
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