<?php

$selreg=$this->kl_model->cekselisihreg()->result();
foreach($selreg as $ax){$jmlselreg=$ax->jselreg;}
if($jmlselreg==1){$fontselreg='000099';} else {$fontselreg='990000';}
	
$part=$this->kl_model->cekpart()->result();
foreach($part as $bx){$jpart=$bx->jpart;}
if($jpart==1){$fontpart='000099';} else {$fontpart='990000';}

$lembur=$this->kl_model->ceklembur()->result();
foreach($lembur as $cx){$jlembur=$cx->jlembur;}
if($jlembur==1){$fontlembur='000099';} else {$fontlembur='990000';}

$kunci=$this->kl_model->cekkunci()->result();
foreach($kunci as $dx){$jkunci=$dx->jkunci;}
if($jkunci==1){$fontkunci='000099';} else {$fontkunci='990000';}

$saldokeg=$this->kl_model->ceksaldokeg()->result();
foreach($saldokeg as $cx){$jsalkeg=$cx->jsaldokeg;}
if($jsalkeg==1){$fontsaldokeg='000099';} else {$fontsaldokeg='990000';}



$myadd=$this->session->flashdata('add');


?>


<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Monitoring Siang</h1>
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
				
				
				<div class="card">
					<div class="card-header">
					<strong>Siang Hari</strong>
					</div>
					
					<div class="card-body">

<?php


$act="nav-link active show";
$nact="nav-link";
$fade="show active";
$nfade="";
if($myadd=='selisihreg')
	{
	$navselreg=$act;
	$navsaldsr=$nact;$navlembur=$nact;$navkunci=$nact;
	$navsaldokeg=$nact;
	$fselreg=$fade;
	$fsaldsr=$nfade;$flembur=$nfade;$fkunci=$nfade;
	$fsaldokeg=$nfade;
	}

elseif($myadd=='part')
	{
	$navpart=$act;
	$navselreg=$nact;$navlembur=$nact;$navkunci=$nact;
	$navsaldokeg=$nact;
	$fselreg=$nfade;
	$fpart=$fade;$flembur=$nfade;$fkunci=$nfade;
	$fsaldokeg=$nfade;
	}
elseif($myadd=='lembur')
	{
	$navlembur=$act;
	$navselreg=$nact;$navpart=$nact;$navkunci=$nact;
	$navsaldokeg=$nact;
	$fselreg=$nfade;
	$fpart=$nfade;$flembur=$fade;$fkunci=$nfade;
	$fsaldokeg=$nfade;
	}
elseif($myadd=='kunci')
	{$navkunci=$act;
	$navselreg=$nact;$navpart=$nact;$navlembur=$nact;
	$navsaldokeg=$nact;
	$fselreg=$nfade;
	$fpart=$nfade;$flembur=$nfade;$fkunci=$fade;
	$fsaldokeg=$nfade;
	}

elseif($myadd=='saldokeg')
	{$navsaldokeg=$act;
	$navselreg=$nact;$navpart=$nact;$navlembur=$nact;
	$navkunci=$nact;
	$fselreg=$nfade;
	$fpart=$nfade;$flembur=$nfade;$fkunci=$nfade;
	$fsaldokeg=$fade;
	}
else
	{
	$navselreg=$act;
	$navpart=$nact;$navlembur=$nact;$navkunci=$nact;
	$navsaldokeg=$nact;
	$fselreg=$fade;
	$fpart=$nfade;$flembur=$nfade;$fkunci=$nfade;
	$fsaldokeg=$nfade;
	}
/////\\\\
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
	<a class="<?php echo"$navselreg";?>" id="pga-tab" data-toggle="tab" href="#sga" role="tab" aria-controls="sga" aria-selected="false"><font color="#<?php echo"$fontselreg"; ?>">Register Surplus</font></a>
	</li>
	
	<li class="nav-item">
	<a class="<?php echo"$navpart";?>" id="sgb-tab" data-toggle="tab" href="#sgb" role="tab" aria-controls="sgb" aria-selected="true">
	<font color="#<?php echo"$fontpart"; ?>">Sparepart</font></a>
	</li>
	
	<li class="nav-item">
	<a class="<?php echo"$navlembur";?>" id="sgc-tab" data-toggle="tab" href="#sgc" role="tab" aria-controls="sgc" aria-selected="false"><font color="#<?php echo"$fontlembur"; ?>">Lembur</font></a>
	</li>
	
	<li class="nav-item">
	<a class="<?php echo"$navkunci";?>" id="sgd-tab" data-toggle="tab" href="#sgd" role="tab" aria-controls="sgd" aria-selected="false"><font color="#<?php echo"$fontkunci"; ?>">Kunci</font></a>
	</li>
	
	<li class="nav-item">
	<a class="<?php echo"$navsaldokeg";?>" id="sge-tab" data-toggle="tab" href="#sge" role="tab" aria-controls="sge" aria-selected="false"><font color="#<?php echo"$fontsaldokeg"; ?>">Saldo Kas</font></a>
	</li>
	
	<!--
	
	<li class="nav-item">
	<a class="<?php echo"$navselplus";?>" id="pgf-tab" data-toggle="tab" href="#pgf" role="tab" aria-controls="pgf" aria-selected="false"><font color="#<?php echo"$fontplus"; ?>">Surplus</font></a>
	</li>
											
	<li class="nav-item">
	<a class="<?php echo"$navdoktk";?>" id="pgg-tab" data-toggle="tab" href="#pgg" role="tab" aria-controls="pgg" aria-selected="false"><font color="#<?php echo"$fontdoktk"; ?>">Dok TK</font></a>
	</li>
	-->
	</ul>
	
	<div class="tab-content pl-3 p-1" id="myTabContent">
	<?php
	$lulu['fselreg']=$fselreg;
	$lulu['fpart']=$fpart;
	$lulu['flembur']=$flembur;
	$lulu['fkunci']=$fkunci;
	$lulu['fsaldokeg']=$fsaldokeg;
	$this->load->view('laykl/sga',$lulu);
	$this->load->view('laykl/sgb',$lulu);
	$this->load->view('laykl/sgc',$lulu);
	$this->load->view('laykl/sgd',$lulu);
	$this->load->view('laykl/sge',$lulu);
	?>
	
	
	
	
	

	

	

	

	