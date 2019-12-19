<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<?php

$mgei=$this->kl_model->ceksanggah($periode_sanggah)->result();
foreach($mgei as $mges){$jsanggah=$mges->jsanggah;}
if($jsanggah==0)
	{
	$periodea='';
	$periodeb='';
	$status_sanggah='';
	$approve='';
	$formmge="".base_url()."index.php/kl/mgei";
	$btnclass="primary";
	$btn="Simpan";
	}
else
	{
	
	$dtmge=$this->kl_model->dsanggah($periode_sanggah)->result();
	foreach($dtmge as $dsanggah)
		{
		$id_sanggah=$dsanggah->id_sanggah;
		$periode_sanggah=$dsanggah->periode_sanggah;
		$periodea=$dsanggah->periodea;
		$periodeb=$dsanggah->periodeb;
		$status_sanggah=$dsanggah->status_sanggah;
		$approve=$dsanggah->approve;
		$formmge="".base_url()."index.php/kl/mgeiup";
		$btnclass="warning";
		$btn="Ganti";
		
		}
	}

$perut=explode("-", $periode_sanggah);
$per=$perut[0];
$perbl=$perut[1];
$perth=$perut[2];
?>

		<div class="breadcrumbs"> 
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Sanggahan</h1>
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
					<p>Sanggahan Perfomance</p>
					<!-- 
					
					-->
					</div>
					
					<div class="card-body card-block">
					<form action="<?php echo"$formmge"; ?>" method="post" class="form-horizontal">
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
							Periode Sanggahan
							</div>
							
							<div class="col col-md-3">
							<input type="text" id="text-input" name="periodea" placeholder="" class="form-control" <?php echo"value='$periodea'"; ?>>
							<small class='form-text text-muted'>yyyy-mm-dd</small>
							</div>
							
							<div class="col col-md-1">
							<center>s/d
							
							</center>	
							</div>

							<div class="col col-md-3">
							<input type="text" id="text-input" name="periodeb" placeholder="" class="form-control" <?php echo"value='$periodeb'"; ?>>	
							<small class='form-text text-muted'>yyyy-mm-dd</small>
							</div>

							<div class="col col-md-1">
							
							</div>

						</div>
						
						<!--
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Status Sanggahan
							</div>
							
							<div class="col col-md-8">
								<div class="form-check">
									<div class="radio">
									<label for="statussanggah1" class="form-check-label ">
									<input type="radio" id="statussanggah1" name="status_sanggah" value="Lengkap" class="form-check-input" 
									<?php 
									if($status_sanggah=='Lengkap'){echo"checked='checked'";} else {}
									?>>Lengkap
									</label>
									</div>
								
									<div class="radio">
									<label for="statussanggah2" class="form-check-label ">
									<input type="radio" id="statussanggah2" name="status_sanggah" value="Tidak" class="form-check-input"
									<?php 
									if($status_sanggah=='Tidak'){echo"checked='checked'";} else {}
									?>
									>Tidak
									</label>
									</div>
								</div>
							</div>
						</div>

						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-4">
							Penanggung Jawab Sanggahan
							</div>
							
							<div class="col col-md-8">
							<input type="text" id="text-input" name="approve" placeholder="" class="form-control" <?php echo"value='$approve'"; ?>>	
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
					<input type='hidden' name='id_sanggah' value='$id_sanggah'>
					";
					//
					?>
					<input type="hidden" name="add" value="mge">
					
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

