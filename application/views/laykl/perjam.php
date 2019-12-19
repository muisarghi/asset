<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>


<!-- 

0		12
3		15
6		18
9		21

-->
<?php

$perjam=$this->kl_model->cekreliday()->result();
foreach($perjam as $perjams){$jreliday=$perjams->jreliday;}
if($jreliday==0)
	{
	$id_reliday=0;
	$capt0=0; $capt12=0;
	$capt3=0; $capt15=0;
	$capt6=0; $capt18=0;
	$capt9=0; $capt21=0;
	$ket0=" "; $ket12=" ";
	$ket3=" "; $ket15=" ";
	$ket6=" "; $ket18=" ";
	$ket9=" "; $ket21=" ";
	$formperjam="".base_url()."index.php/kl/perjami";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dtperjam=$this->kl_model->dreliday()->result();
	foreach($dtperjam as $dtperjams)
		{
		$id_reliday=$dtperjams->id_reliday;
		$capt0=$dtperjams->capt0; $capt12=$dtperjams->capt12;
		$capt3=$dtperjams->capt3; $capt15=$dtperjams->capt15;
		$capt6=$dtperjams->capt6; $capt18=$dtperjams->capt18;
		$capt9=$dtperjams->capt9; $capt21=$dtperjams->capt21;
		
		$ket0=$dtperjams->ket0;$ket12=$dtperjams->ket12;
		$ket3=$dtperjams->ket3;$ket15=$dtperjams->ket15;
		$ket6=$dtperjams->ket6;$ket18=$dtperjams->ket18;
		$ket9=$dtperjams->ket9;$ket21=$dtperjams->ket21;
		
		$formperjam="".base_url()."index.php/kl/perjamiup";
		$btnclass="warning";
		$btn="Ganti";
		}
	}

?>



<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA PER 3 JAM</h1>
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
					<p>Memeriksa Pencapaian Realibility Hari Berjalan</p>
					</div>
					
					<div class="card-body card-block">
					<form action="<?php echo"$formperjam"; ?>" method="post" class="form-horizontal">
					<!--- -->
					<div class="row form-group">
						<div class="col col-md-2">
						Capture 00.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt0" placeholder="" class="form-control" <?php echo"value='$capt0'"; ?>>	
						</div>

						<div class="col col-md-2">
						Capture 12.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt12" placeholder="" class="form-control" <?php echo"value='$capt12'"; ?>>	
						</div>
					
						
						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket0" placeholder="" class="form-control" <?php echo"value='$ket0'"; ?>>	
						</div>

						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket12" placeholder="" class="form-control" <?php echo"value='$ket12'"; ?>>	
						</div>
					
					</div>

					<!--- -->

					<!--- -->
					<div class="row form-group">
						<div class="col col-md-2">
						Capture 03.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt3" placeholder="" class="form-control" <?php echo"value='$capt3'"; ?>>	
						</div>

						<div class="col col-md-2">
						Capture 15.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt15" placeholder="" class="form-control" <?php echo"value='$capt15'"; ?>>	
						</div>
					
						
						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket3" placeholder="" class="form-control" <?php echo"value='$ket3'"; ?>>	
						</div>

						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket15" placeholder="" class="form-control" <?php echo"value='$ket15'"; ?>>	
						</div>
					
					</div>
					
					<!--- -->
					
					<!--- -->
					<div class="row form-group">
						<div class="col col-md-2">
						Capture 06.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt6" placeholder="" class="form-control" <?php echo"value='$capt6'"; ?>>	
						</div>

						<div class="col col-md-2">
						Capture 18.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt18" placeholder="" class="form-control" <?php echo"value='$capt18'"; ?>>	
						</div>
					
						
						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket6" placeholder="" class="form-control" <?php echo"value='$ket6'"; ?>>	
						</div>

						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket18" placeholder="" class="form-control" <?php echo"value='$ket18'"; ?>>	
						</div>
					
					</div>

					<!--- -->

					<!--- -->
					<div class="row form-group">
						<div class="col col-md-2">
						Capture 09.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt9" placeholder="" class="form-control" <?php echo"value='$capt9'"; ?>>	
						</div>

						<div class="col col-md-2">
						Capture 21.00
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="capt21" placeholder="" class="form-control" <?php echo"value='$capt21'"; ?>>	
						</div>
					
						
						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket9" placeholder="" class="form-control" <?php echo"value='$ket9'"; ?>>	
						</div>

						<div class="col col-md-2">
						Penyebab
						</div>
						
						<div class="col col-md-4">
						<input type="text" id="text-input" name="ket21" placeholder="" class="form-control" <?php echo"value='$ket21'"; ?>>	
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
					<input type='hidden' name='id_reliday' value='$id_reliday'>
					";
					?>
					<input type="hidden" name="add" value="perjam">

					<button type="submit" class="btn btn-<?php echo $btnclass;?> btn-sm">
					<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
					</button>
					
					<button type="reset" class="btn btn-danger btn-sm">
					<i class="fa fa-ban"></i> Ulangi
					</button>
					</form>
					</div>

					
					<!--- -->
					


					</div>

				</div>

            </div>

	 
            
          

        </div> <!-- .content -->
    </div><!-- /#right-panel 
	-->


