<?php

//foreach($mycek as $iscek)
	//{
	//$cek_reli=$iscek->cek_reli;
	//$cek_saldo=$iscek->cek_saldo;
	//$jns_saldo=$iscek->jns_saldo;
	//$cek_selisih=$iscek->cek_selisih;
	//$jns_selisih=$iscek->jns_selisih;
	//$cek_doktk=$iscek->cek_doktk;
	/*
	if($cek_saldo==1 and $jns_saldo=='dsr')
		{	
		$fontsaldsr='000099';
		}
	else
		{
		$fontsaldsr='990000';
		}
	*/
	
	
	/*
	if($cek_saldo==1 and $jns_saldo=='app')
		{	
		$fontsalapp='000099';
		}
	else
		{
		$fontsalapp='990000';
		}
	
	if($cek_saldo==1 and $jns_saldo=='bb')
		{	
		$fontsalbb='000099';
		}
	else
		{
		$fontsalbb='990000';
		}

	if($cek_selisih==1 and $jns_selisih=='shortage')
		{	
		$fontmin='000099';
		}
	else
		{
		$fontmin='990000';
		}
	
	if($cek_selisih==1 and $jns_selisih=='surplus')
		{	
		$fontplus='000099';
		}
	else
		{
		$fontplus='990000';
		}
	
	echo"
	 $cek_saldo - $jns_saldo  -->$fontsaldsr, $fontsalapp, $fontsalbb, $fontplus, $fontmin
	<br>
	";
	*/

	//$jreli=$iscek->jreli;
	//}

//echo"<br>JML RELI: $jreli<br>";
/*

foreach($mycek as $iscekb)
	{
	$cek_reli=$iscekb->cek_reli;
	$cek_doktk=$iscekb->cek_doktk;
	}

if($cek_reli==1)
	{$fontreli="000099";}
else
	{$fontreli="990000";}

if($cek_doktk==1)
	{$fontdoktk="000099";}
else
	{$fontdoktk="990000";}
	$mydate=date('Y-m-d');

echo"AAA $mydate $cek_reli - $cek_doktk";	
*/

$reli=$this->kl_model->cekreli()->result();
foreach($reli as $a){$jmlreli=$a->jmlreli;}
if($jmlreli==1){$fontreli='000099';} else {$fontreli='990000';}
	
$doktk=$this->kl_model->cekdoktk()->result();
foreach($doktk as $b){$jmldoktk=$b->jmldoktk;}
if($jmldoktk==1){$fontdoktk='000099';} else {$fontdoktk='990000';}

$saldoa=$this->kl_model->ceksaldoapp()->result();
foreach($saldoa as $c){$jsalapp=$c->jsalapp;}
if($jsalapp==1){$fontsalapp='000099';} else {$fontsalapp='990000';}

$saldob=$this->kl_model->ceksaldodsr()->result();
foreach($saldob as $d){$jsaldsr=$d->jsaldsr;}
if($jsaldsr==1){$fontsaldsr='000099';} else {$fontsaldsr='990000';}

$saldoc=$this->kl_model->ceksaldobb()->result();
foreach($saldoc as $e){$jsalbb=$e->jsalbb;}
if($jsalbb==1){$fontsalbb='000099';} else {$fontsalbb='990000';}

$selisih=$this->kl_model->cekselisih()->result();
foreach($selisih as $f){$jselmin=$f->jselmin;}
if($jselmin==1){$fontmin='000099';} else {$fontmin='990000';}

$selisiha=$this->kl_model->cekselisiha()->result();
foreach($selisiha as $g){$jselplus=$g->jselplus;}
if($jselplus==1){$fontplus='000099';} else {$fontplus='990000';}

$myadd=$this->session->flashdata('add');

/*
echo"JML RELI: $jmlreli. JML DOKTK: $jmldoktk
<br>
Saldo app: $jsalapp, bb:$jsalbb, dsr:$jsaldsr
<br>
Shortage: $jselmin, Surplus: $jselplus
<br>MY $myadd
";
*/
?>


<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Monitoring Harian</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <?php
				echo $this->session->flashdata('msg');
				?>
				<!--
				<div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
				user.ketuser=kl.idkl
				 
				-->
				
				<div class="card">
					<div class="card-header">
					<strong>Pagi Hari</strong>
					</div>
					
					<div class="card-body">

<!---------------------
------------------------
--------------------
nav-link active
$pact

$font;
---------------------->
<?php


$act="nav-link active show";
$nact="nav-link";
$fade="show active";
$nfade="";
if($myadd=='reli')
	{
	$navreli=$act;
	$navsaldsr=$nact;$navsalapp=$nact;$navsalbb=$nact;
	$navselmin=$nact;$navselplus=$nact;$navdoktk=$nact;
	$freli=$fade;
	$fsaldsr=$nfade;$fsalapp=$nfade;$fsalbb=$nfade;
	$fselmin=$nfade;$fselplus=$nfade;$fdoktk=$nfade;
	}

elseif($myadd=='saldsr')
	{
	$navsaldsr=$act;
	$navreli=$nact;$navsalapp=$nact;$navsalbb=$nact;
	$navselmin=$nact;$navselplus=$nact;$navdoktk=$nact;
	$freli=$nfade;
	$fsaldsr=$fade;$fsalapp=$nfade;$fsalbb=$nfade;
	$fselmin=$nfade;$fselplus=$nfade;$fdoktk=$nfade;
	}
elseif($myadd=='salapp')
	{
	$navsalapp=$act;
	$navreli=$nact;$navsaldsr=$nact;$navsalbb=$nact;
	$navselmin=$nact;$navselplus=$nact;$navdoktk=$nact;
	$freli=$nfade;
	$fsaldsr=$nfade;$fsalapp=$fade;$fsalbb=$nfade;
	$fselmin=$nfade;$fselplus=$nfade;$fdoktk=$nfade;
	}
elseif($myadd=='salbb')
	{$navsalbb=$act;
	$navreli=$nact;$navsaldsr=$nact;$navsalapp=$nact;
	$navselmin=$nact;$navselplus=$nact;$navdoktk=$nact;
	$freli=$nfade;
	$fsaldsr=$nfade;$fsalapp=$nfade;$fsalbb=$fade;
	$fselmin=$nfade;$fselplus=$nfade;$fdoktk=$nfade;
	}

elseif($myadd=='selmin')
	{$navselmin=$act;
	$navreli=$nact;$navsaldsr=$nact;$navsalapp=$nact;
	$navsalbb=$nact;$navselplus=$nact;$navdoktk=$nact;
	$freli=$nfade;
	$fsaldsr=$nfade;$fsalapp=$nfade;$fsalbb=$nfade;
	$fselmin=$fade;$fselplus=$nfade;$fdoktk=$nfade;
	}

elseif($myadd=='selplus')
	{$navselplus=$act;
	$navreli=$nact;$navsaldsr=$nact;$navsalapp=$nact;
	$navsalbb=$nact;$navselmin=$nact;$navdoktk=$nact;
	$freli=$nfade;
	$fsaldsr=$nfade;$fsalapp=$nfade;$fsalbb=$nfade;
	$fselmin=$nfade;$fselplus=$fade;$fdoktk=$nfade;
	}

elseif($myadd=='doktk')
	{$navdoktk=$act;
	$navreli=$nact;$navsaldsr=$nact;$navsalapp=$nact;
	$navsalbb=$nact;$navselmin=$nact;$navselplus=$nact;
	$freli=$nfade;
	$fsaldsr=$nfade;$fsalapp=$nfade;$fsalbb=$nfade;
	$fselmin=$nfade;$fselplus=$nfade;$fdoktk=$fade;
	}
else
	{
	$navreli=$act;
	$navsaldsr=$nact;$navsalapp=$nact;$navsalbb=$nact;
	$navselmin=$nact;$navselplus=$nact;$navdoktk=$nact;
	$freli=$fade;
	$fsaldsr=$nfade;$fsalapp=$nfade;$fsalbb=$nfade;
	$fselmin=$nfade;$fselplus=$nfade;$fdoktk=$nfade;
	}
/*
if($myadd=='saldsr')
	{
	$navsaldsr=$act;
	}
elseif($myadd=='salapp')
	{
	$navsalapp=$act;
	}
elseif($myadd=='salbb')
	{
	$navsalbb=$act;
	}
elseif($myadd=='selmin')
	{
	$navselmin=$act;
	}
elseif($myadd=='selplus')
	{
	$navselplus=$act;
	}
elseif($myadd=='doktk')
	{
	$navdoktk=$act;
	}
else
{$navreli=$act;}
*/

//echo"<br><br> NAV reli $navreli, dsr $navsaldsr, app $navsalapp, bb $navsalbb, min $navselmin, plus $navselplus, doktk $navdoktk";
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
	<a class="<?php echo"$navreli";?>" id="pga-tab" data-toggle="tab" href="#pga" role="tab" aria-controls="pga" aria-selected="false"><font color="#<?php echo"$fontreli"; ?>">Reliability</font></a>
	</li>
	
	<li class="nav-item">
	<a class="<?php echo"$navsaldsr";?>" id="pgb-tab" data-toggle="tab" href="#pgb" role="tab" aria-controls="pgb" aria-selected="true">
	<font color="#<?php echo"$fontsaldsr"; ?>">Saldo DSR</font></a>
	</li>
	
	<li class="nav-item">
	<a class="<?php echo"$navsalapp";?>" id="pgc-tab" data-toggle="tab" href="#pgc" role="tab" aria-controls="pgc" aria-selected="false"><font color="#<?php echo"$fontsalapp"; ?>">Saldo Aplikasi</font></a>
	</li>

	<li class="nav-item">
	<a class="<?php echo"$navsalbb";?>" id="pgd-tab" data-toggle="tab" href="#pgd" role="tab" aria-controls="pgd" aria-selected="false"><font color="#<?php echo"$fontsalbb"; ?>">Saldo BB</font></a>
	</li>

	<li class="nav-item">
	<a class="<?php echo"$navselmin";?>" id="pge-tab" data-toggle="tab" href="#pge" role="tab" aria-controls="pge" aria-selected="false"><font color="#<?php echo"$fontmin"; ?>">Shortage</font></a>
	</li>

	<li class="nav-item">
	<a class="<?php echo"$navselplus";?>" id="pgf-tab" data-toggle="tab" href="#pgf" role="tab" aria-controls="pgf" aria-selected="false"><font color="#<?php echo"$fontplus"; ?>">Surplus</font></a>
	</li>
											
	<li class="nav-item">
	<a class="<?php echo"$navdoktk";?>" id="pgg-tab" data-toggle="tab" href="#pgg" role="tab" aria-controls="pgg" aria-selected="false"><font color="#<?php echo"$fontdoktk"; ?>">Dok TK</font></a>
	</li>

	</ul>
	
	<div class="tab-content pl-3 p-1" id="myTabContent">
	<?php
	$lulu['freli']=$freli;
	$lulu['fsaldsr']=$fsaldsr;
	$lulu['fsalapp']=$fsalapp;
	$lulu['fsalbb']=$fsalbb;
	$lulu['fselmin']=$fselmin;
	$lulu['fselplus']=$fselplus;
	$lulu['fdoktk']=$fdoktk;
	$this->load->view('laykl/pga',$lulu);
	$this->load->view('laykl/pgb',$lulu);
	$this->load->view('laykl/pgc',$lulu);
	$this->load->view('laykl/pgd',$lulu);
	$this->load->view('laykl/pge',$lulu);
	$this->load->view('laykl/pgf',$lulu);
	$this->load->view('laykl/pgg',$lulu);
	?>
	
	
	
	
	

	

	

	

	