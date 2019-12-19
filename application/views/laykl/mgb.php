<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<?php

$mgbi=$this->kl_model->cekgps($periode_gps)->result();
foreach($mgbi as $mgbs){$jgps=$mgbs->jgps;}
if($jgps==0)
	{
	$kendaraan=0;
	$gps=0;
	$nogps=0;
	$gps_rsk=0;
	$app_aktif=0;
	$user_blokir=0;
	$blok_kkl=0;
	$blok_wakl=0;
	$blok_spv=0;
	$formmgb="".base_url()."index.php/kl/mgbi";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	
	$dtmgb=$this->kl_model->dgps($periode_gps)->result();
	foreach($dtmgb as $dgps)
		{
		$id_gps=$dgps->id_gps;
		$periode_gps=$dgps->periode_gps;
		$kendaraan=$dgps->kendaraan;
		$gps=$dgps->gps;
		$nogps=$dgps->nogps;
		$gps_rsk=$dgps->gps_rsk;
		$app_aktif=$dgps->app_aktif;
		$user_blokir=$dgps->user_blokir;
		$blok_kkl=$dgps->blok_kkl;
		$blok_wakl=$dgps->blok_wakl;
		$blok_spv=$dgps->blok_spv;
		
		$formmgb="".base_url()."index.php/kl/mgbiup";
		$btnclass="warning";
		$btn="Ganti";
		
		}
	}

$perut=explode("-", $periode_gps);
$per=$perut[0];
$perbl=$perut[1];
$perth=$perut[2];
?>

		<div class="breadcrumbs"> 
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>GPS</h1>
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
					<p>Memeriksa Laporan Pengecekan GPS yang Dibuat Leader</p>
					<!-- 
					
					-->
					</div>
					
					<div class="card-body card-block">
					<form action="<?php echo"$formmgb"; ?>" method="post" class="form-horizontal">
						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Periode 
							<!--<?php echo"$periode_utle -> $jutle"; ?>
							-->
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

						<!--
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Jumlah Kendaraan
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="kendaraan" placeholder="" class="form-control" <?php echo"value='$kendaraan'"; ?>>	
							</div>
						</div>
						
						<!--
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Terpasang GPS
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="gps" placeholder="" class="form-control" <?php echo"value='$gps'"; ?>>	
							</div>
						</div>

						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Tidak Terpasang GPS
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="nogps" placeholder="" class="form-control" <?php echo"value='$nogps'"; ?>>	
							</div>

						</div>
						<!------->


						<!----
						
						--->
						<div class="row form-group">
							<div class="col col-md-1">
							
							</div>
							
							<div class="col col-md-11">
							<label class="form-check-label " for="gps_rsk">
							<input  class="form-check-input" type="checkbox" name="gps_rsk" id="gps_rsk" 
							<?php
							echo" ";
							if($gps_rsk==0)
								{echo" value='0' "; }
							else
								{echo" value='$gps_rsk' checked='$checked' "; }
							?>
							>
							GPS Rusak
							</label>

							</div>

						</div>
						<!------->
						
						<!----
						
						--->
						<div class="row form-group">
							<div class="col col-md-1">
							
							</div>
							
							<div class="col col-md-11">
							<label class="form-check-label " for="app_aktif">
							<input  class="form-check-input" type="checkbox" name="app_aktif" id="app_aktif" 
							<?php
							echo" ";
							if($app_aktif==0)
								{echo" value='0' "; }
							else
								{echo" value='$app_aktif' checked='$checked' "; }
							?>
							>
							Aplikasi Berfungsi
							</label>

							</div>

						</div>
						<!------->



						<!----->
						<div class="row form-group">
							<div class="col col-md-1">
							
							</div>
							
							<div class="col col-md-11">
							<label class="form-check-label " for="user_blokir">
							<input  class="form-check-input" type="checkbox" name="user_blokir" id="user_blokir" onclick="myFunction()" 
							<?php
							echo" ";
							if($user_blokir==0)
								{echo" value='0' "; $display="display:none";}
							else
								{echo" value='$user_blokir' checked='$checked'"; $display="display:block";}
							?>
							>
							User Terblokir
							</label>
							
								<div id="text" style="<?php echo"$display"; ?>">
									<div class="row form-group">
										<div class="col col-md-1">
										
										</div>

										<div class="col col-md-11">
										<label class="form-check-label " for="blok_kkl">
										<input  class="form-check-input" type="checkbox" name="blok_kkl" id="blok_kkl" 
										<?php
										echo" ";
										if($blok_kkl==0)
											{echo" value='0' "; }
										else
											{echo" value='1' checked='$checked' "; }
										?>
										>
										KKL
										</label>
										</div>
									</div>
									
									<div class="row form-group">
										<div class="col col-md-1">
										
										</div>

										<div class="col col-md-11">
										<label class="form-check-label " for="blok_wakl">
										<input  class="form-check-input" type="checkbox" name="blok_wakl" id="blok_wakl" 
										<?php
										echo" ";
										if($blok_wakl==0)
											{echo" value='0' "; }
										else
											{echo" value='1' checked='$checked' "; }
										?>
										>
										Wakil KKL
										</label>
										</div>
									</div>	
									
									<div class="row form-group">
										<div class="col col-md-1">
										
										</div>

										<div class="col col-md-11">
										<label class="form-check-label " for="blok_spv">
										<input  class="form-check-input" type="checkbox" name="blok_spv" id="blok_spv" 
										<?php
										echo" ";
										if($blok_spv==0)
											{echo" value='0' "; }
										else
											{echo" value='1' checked='$checked' "; }
										?>
										>
										Supervisor/ Ass.Supervisor
										</label>
										</div>
									</div>	
									
								</div>
							</div>
						</div>
					
					<!---- 
					
					Pake if php, jika di cek tampil form denom, kalo ndak, pake js
					
					--->
						

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
					<input type='hidden' name='id_gps' value='$id_gps'>
					";
					//
					?>
					<input type="hidden" name="add" value="mgb">
					
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
		var checkBox = document.getElementById("user_blokir");
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

