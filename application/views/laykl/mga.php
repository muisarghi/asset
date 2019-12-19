<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>



<?php

$mgai=$this->kl_model->cekutle($periode_utle)->result();
foreach($mgai as $mgas){$jutle=$mgas->jutle;}
if($jutle==0)
	{
	$utlea=0;
	$utleb=0;
	$utlec=0;
	$utlekr=0;
	$utlekra=0;
	$utlekrb=0;
	$utlekrc=0;
	$utletr=0;
	$utletra=0;
	$utletrb=0;
	$utletrc=0;
	$formmga="".base_url()."index.php/kl/mgai";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	$dtmga=$this->kl_model->dutle($periode_utle)->result();
	foreach($dtmga as $dutle)
		{
		$id_utle=$dutle->id_utle;
		$periode_utle=$dutle->periode_utle;
		$utlea=$dutle->utlea;
		$utleb=$dutle->utleb;
		$utlec=$dutle->utlec;
		$utlekr=$dutle->utlekr;
		$utlekra=$dutle->utlekra;
		$utlekrb=$dutle->utlekrb;
		$utlekrc=$dutle->utlekrc;
		$utletr=$dutle->utletr;
		$utletra=$dutle->utletra;
		$utletrb=$dutle->utletrb;
		$utletrc=$dutle->utletrc;
		$formmga="".base_url()."index.php/kl/mgaiup";
		$btnclass="warning";
		$btn="Ganti";
		}
	}

$perut=explode("-", $periode_utle);
$per=$perut[0];
$perbl=$perut[1];
$perth=$perut[2];
?>



		<div class="breadcrumbs"> 
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>UTLE</h1>
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
					<p>Pengecekan UTLE dan Penukarannya</p>
					</div>
					
					<div class="card-body card-block">
					<form action="<?php echo"$formmga"; ?>" method="post" class="form-horizontal">
						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Periode 
							<!--<?php echo"$periode_utle -> $jutle"; ?> -->
							</div>
							
							<div class="col col-md-2">
							<select name="per" class="form-control">
							<option value="0">[ Minggu Ke- ]</option>
							<?php
							for($x=1;$x<5;$x++)
								{
								echo"<option value='$x'";
								if($x==$per)
									{echo" selected ";}
								else
									{echo" ";}
								echo">$x</option>";
								}
							?>
							</select>
							<small class="form-text text-muted">Minggu Ke-</small>
							</div>
							
							<!--
							--->
							<div class="col col-md-2">
							<select name="perbl" class="form-control">
							<option value="0">[ Bulan ]</option>
							<?php
							for($y=1;$y<13;$y++)
								{
								echo"<option value='$y' ";
								if($y==$perbl)
									{echo" selected ";}
								else
									{echo" ";}
								echo">$y</option>";
								}
								
							?>
							</select>
							<small class="form-text text-muted">Bulan</small>
							</div>
							
							<div class="col col-md-2">
							<input type="text" class="form-control" <?php echo"value='$perth'"; ?> name="perth">
							<small class="form-text text-muted">Tahun</small>
							</div>
							
							<div class="col col-md-2">
							
							</div>


						</div>

						<!----->
						<div class="row form-group">
							<div class="col col-md-4">
							Denom 20.000
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="utlea" placeholder="" class="form-control" <?php echo"value='$utlea'"; ?>>	
							</div>
						</div>
						
						<!--
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Denom 50.000
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="utleb" placeholder="" class="form-control" <?php echo"value='$utleb'"; ?>>	
							</div>
						</div>

						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Denom 100.000
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="utlec" placeholder="" class="form-control" <?php echo"value='$utlec'"; ?>>	
							</div>

						</div>
						
						<!----->
						<div class="row form-group">
							<div class="col col-md-1">
							
							</div>
							
							<div class="col col-md-11">
							<label class="form-check-label " for="utlekr">
							<input  class="form-check-input" type="checkbox" name="utlekr" id="utlekr" onclick="myFunction()" 
							<?php
							echo" ";
							if($utlekr==0)
								{echo" value='0' "; $display="display:none";}
							else
								{echo" value='$utlekr' checked='$checked'"; $display="display:block";}
							?>
							>
							Pengiriman Penukaran UTLE
							</label>
							
								<div id="text" style="<?php echo"$display"; ?>">
									<div class="row form-group">
										<div class="col col-md-4">
										Denom 20.000
										</div>
							
										<div class="col col-md-8">
										<input type="text" id="text-input" name="utlekra" placeholder="" class="form-control" <?php echo"value='$utlekra'"; ?>>	
										</div>

										<div class="col col-md-4">
										Denom 50.000
										</div>
							
										<div class="col col-md-8">
										<input type="text" id="text-input" name="utlekrb" placeholder="" class="form-control" <?php echo"value='$utlekrb'"; ?>>	
										</div>

										<div class="col col-md-4">
										Denom 100.000
										</div>
							
										<div class="col col-md-8">
										<input type="text" id="text-input" name="utlekrc" placeholder="" class="form-control" <?php echo"value='$utlekrc'"; ?>>	
										</div>
									</div>
								</div>
							</div>
						</div>

					<!---- 
					Pake if php, jika di cek tampil form denom, kalo ndak, pake js
					
					--->
						<div class="row form-group">
							<div class="col col-md-1">
							
							</div>
							
							<div class="col col-md-11">
							<label class="form-check-label " for="utletr">
							<input  class="form-check-input" type="checkbox" name="utletr" id="utletr" onclick="myFunctiontr()" 
							<?php
							echo" ";
							if($utletr==0)
								{echo"value='0' "; $display="display:none";}
							else
								{echo"checked='$checked' value='$utletr'"; $display="display:block";}
							?>
							>
							Penerimaan Penukaran UTLE
							</label>
							
								<div id="texttr" style="<?php echo"$display"; ?>">
									<div class="row form-group">
										<div class="col col-md-4">
										Denom 20.000
										</div>
										
										<div class="col col-md-8">
										<input type="text" id="text-input" name="utletra" placeholder="" class="form-control" <?php echo"value='$utletra'"; ?>>	
										</div>
										
										<div class="col col-md-4">
										Denom 50.000
										</div>
										
										<div class="col col-md-8">
										<input type="text" id="text-input" name="utletrb" placeholder="" class="form-control" <?php echo"value='$utletrb'"; ?>>	
										</div>
										
										<div class="col col-md-4">
										Denom 100.000
										</div>
										
										<div class="col col-md-8">
										<input type="text" id="text-input" name="utletrc" placeholder="" class="form-control" <?php echo"value='$utletrc'"; ?>>	
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					
					<div class="card-footer">

					<?php
					foreach($iduser as $usera)
						{
						//
						$myidkl=$usera->idkl;
						$mycodeuker=$usera->codeuker;
						$mynamakl=$usera->namakl;
						}
					echo"<input type='hidden' name='codeuker' value='$mycodeuker'>
					<input type='hidden' name='id_utle' value='$id_utle'>
					";
					//
					?>
					<input type="hidden" name="add" value="mga">
					
					<button type="submit" class="btn btn-<?php echo $btnclass;?> btn-sm">
					<i class="fa fa-dot-circle-o"></i> <?php echo $btn; ?>
					</button>
					
					<button type="reset" class="btn btn-danger btn-sm">
					<i class="fa fa-ban"></i> Ulangi
					</button>
					</form>
					</div>
					
					
					<!--- 
					gedung B
					<div class='form-check body-check body-analyst'>
						<div>
						</div>
					</div>
					-->
					
					
					
					</div>
				
				</div>
			
            </div>

	 
            
          

        </div> <!-- .content -->
    </div><!-- /#right-panel 
	-->

<script type="text/javascript">
	function myFunction() 
		{
			/*
			
			*/
		var checkBox = document.getElementById("utlekr");
		var text = document.getElementById("text");
		
		if (checkBox.checked == true)
			{
			text.style.display = "block";
			} 
		else 
			{
			text.style.display = "none";
			}
		}
	
	function myFunctiontr() 
		{
		var checkBox = document.getElementById("utletr");
		var text = document.getElementById("texttr");
		///////////
		if (checkBox.checked == true)
		//if(checkBox.checked)
			{
			text.style.display = "block";
			} 
		else 
			{
			text.style.display = "none";
			}
		}
</script>

<script type="text/javascript">
	
</script>

