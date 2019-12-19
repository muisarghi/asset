<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<?php

$mgci=$this->kl_model->cekcctv($periode_cctv)->result();
foreach($mgci as $mgcs){$jcctv=$mgcs->jcctv;}
if($jcctv==0)
	{
	$jml_cctv=0;
	$cctva=0;
	$cctvb=0;
	$dvra=0;
	$dvrb=0;
	$adaptora=0;
	$adaptorb=0;
	$formmgc="".base_url()."index.php/kl/mgci";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	
	$dtmgc=$this->kl_model->dcctv($periode_cctv)->result();
	foreach($dtmgc as $dcctv)
		{
		$id_cctv=$dcctv->id_cctv;
		$periode_cctv=$dcctv->periode_cctv;
		$jml_cctv=$dcctv->jml_cctv;
		$cctva=$dcctv->cctva;
		$cctvb=$dcctv->cctvb;
		$dvra=$dcctv->dvra;
		$dvrb=$dcctv->dvrb;
		$adaptora=$dcctv->adaptora;
		$adaptorb=$dcctv->adaptorb;
		
		$formmgc="".base_url()."index.php/kl/mgciup";
		$btnclass="warning";
		$btn="Ganti";
		
		}
	}

$perut=explode("-", $periode_cctv);
$per=$perut[0];
$perbl=$perut[1];
$perth=$perut[2];
?>

		<div class="breadcrumbs"> 
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>CCTV</h1>
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
					<p>Memeriksa Laporan Pengecekan CCTV yang Dibuat Leader</p>
					<!-- 
					
					-->
					</div>
					
					<div class="card-body card-block">
					<form action="<?php echo"$formmgc"; ?>" method="post" class="form-horizontal">
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
							Jumlah Kamera
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="jml_cctv" placeholder="" class="form-control" <?php echo"value='$jml_cctv'"; ?>>	
							</div>
						</div>
						
						<!--
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Kamera Berfungsi/ Baik
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="cctva" placeholder="" class="form-control" <?php echo"value='$cctva'"; ?>>	
							</div>
						</div>

						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Kamera Tidak Berfungsi/ Rusak
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="cctvb" placeholder="" class="form-control" <?php echo"value='$cctvb'"; ?>>	
							</div>

						</div>
						<!------->
						
						<div class="row form-group">
							<div class="col col-md-4">
							Jumlah DRV
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="dvra" placeholder="" class="form-control" <?php echo"value='$dvra'"; ?>>	
							</div>

						</div>
						<!------->

						<div class="row form-group">
							<div class="col col-md-4">
							DRV Rusak
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="dvrb" placeholder="" class="form-control" <?php echo"value='$dvrb'"; ?>>	
							</div>

						</div>
						<!------->
						
						<div class="row form-group">
							<div class="col col-md-4">
							Jumlah Adaptor
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="adaptora" placeholder="" class="form-control" <?php echo"value='$adaptora'"; ?>>	
							</div>

						</div>
						<!------->
						
						<div class="row form-group">
							<div class="col col-md-4">
							Adaptor Rusak
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="adaptorb" placeholder="" class="form-control" <?php echo"value='$adaptorb'"; ?>>	
							</div>

						</div>
						<!------->

									
								
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
					<input type='hidden' name='id_cctv' value='$id_cctv'>
					";
					//
					?>
					<input type="hidden" name="add" value="mgc">
					
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

