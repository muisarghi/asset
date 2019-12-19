
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rupiah.js"></script>

<?php
$saldodsr=$this->kl_model->ceksaldodsr()->result();
foreach($saldodsr as $b)
{$jsaldsr=$b->jsaldsr;}

if($jsaldsr==0)
	{
	$id_saldo=" ";
	$saldoa=" ";
	$saldob=" ";
	$saldoc=" ";
	$saldotot=" ";
	$formdsr="".base_url()."index.php/kl/saldoi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dsaldsr=$this->kl_model->dsaldsr()->result();
	foreach($dsaldsr as $dsaldsr_)
		{
		$id_saldo=$dsaldsr_->id_saldo;
		$saldodsra=$dsaldsr_->saldoa;
		$saldodsrb=$dsaldsr_->saldob;
		$saldodsrc=$dsaldsr_->saldoc;
		//$saldotot=$saldoa+$saldob+$saldoc;
		$formdsr="".base_url()."index.php/kl/saldoiup";
		$btnclass="warning";
		$btn="Ganti";
		}
	}
?>


<div class="tab-pane fade <?php echo"$fsaldsr"; ?>" id="pgb" role="tabpanel" aria-labelledby="pgb-tab">
<h3>Saldo DSR</h3>

<p>Pengecekan Saldo DSR</p>
<div class="card-body card-block">
<form action="<?php echo"$formdsr"; ?>" method="post" class="form-horizontal">

	 <div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 20.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text"  onkeyup="formatAngka(this, '.')" name="saldoa"  placeholder="" class="form-control" 
		<?php echo"value='$saldodsra'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 50.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="denb" onkeyup="formatAngka(this, '.')"  name="saldob"  placeholder="" class="form-control"
		<?php echo"value='$saldodsrb'";?>
		>
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col col-md-3"><label for="text-input" class=" form-control-label">Denom 100.000</label>
		</div>
		<div class="col-12 col-md-9"><input type="text" id="denc" onkeyup="formatAngka(this, '.')" name="saldoc"  placeholder=".000" class="form-control"
		<?php echo"value='$saldodsrc'";?>
		>
		</div>
	</div>
	
	
	<div class="card-footer">
	<input type="hidden" name="jns_saldo" value="dsr">
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
	<input type="hidden" name="add" value="saldsr">
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