
<?php echo link_tag('assets/css/datepicker.css'); ?>

<script>
$(function() {
		$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});
</script>

<script src="<?php echo base_url('assets/js/jquery.ui.datepicker.js');?>"></script>


<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Barang</h1>
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
						<div class="row form-group">
							<div class="col col-sm3">
							<strong>Data Barang </strong>
							</div>
							
							<form method="get" action="<?php echo base_url(); ?>index.php/kl/baranga">
							<div class="col col-sm9">
								<div class="input-group">
								<select name="idgol" class=" form-control">
								<option value="-">[ Golongan ]</option>
								<?php
								foreach($gol as $b)
									{
									echo"<option value='$b->idgol'>$b->namagol</option>";
									}
								?>
								</select>
									<div class="input-group-btn">
									<button type="submit" class="btn btn-primary">
									<i class="fa fa-search"></i>
									</button>
									</div>
								</div>

							</div>
							</form>
						</div>
					</div>
					
					<div class="card-body">
					<a href='#tmbbrg' data-toggle='modal'><i class='fa ti-write'></i></a>	
					</div>



				</div>

            </div>
			
			
			<?php echo"
			<form method='post' action='".base_url(). "index.php/kl/tmbbrg'>
			"; ?>
			 <div class="modal fade" id="tmbbrg" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Tambah Barang  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							<table class='table table-bordered'>
							<tr>
							<td width='20%'>Barang</td>
							<td><input type='text' name='namabarang' class='input-sm form-control-sm form-control'></td>
							</tr>
							
							
							<tr>
							<td>Jenis</td>
							<td><?php
							echo"
							<select name='idjenis' class='form-control'>
							<option value=''>[ jenis barang]</option>
							";
							foreach($gol as $a)
								{
								echo"<option value='' disabled><b>- $a->namagol -</b></option>";
								$id=$a->idgol;
								$dtjns=$this->kl_model->jns($id);
								foreach($dtjns->result() as $b)
									{
									echo"<option value='$b->idjenis'>$b->nmjenis</option>";
									}
								}
							echo"
							</select>
							";
							?>
							</td>
							</tr>

							<tr>
							<td>No Inventaris</td>
							<td><input type='text' name='noinv' class='form-control'>

							</td>
							</tr>

							<tr>
							<td>Pengguna</td>
							<td><input type='text' name='pengguna' class='form-control'>
							<input type='hidden' name='idcabbg'>
							</td>
							</tr>
							
							<tr>
							<td>Pembelian</td>
							<td><input type='text' name='tglbeli' class='datepicker'>
							<input type='hidden' name='idcabbg'>
							</td>
							</tr>
							
							<tr>
							<td>Harga RP</td>
							<td><input type='text' name='hargabeli' class='form-control'>
							<?php
							$idcabbg=$this->session->userdata('ses_ketuser');
							echo"<input type='hidden' name='idcabbg' value='$idcabbg'>";
							?>
							</td>
							</tr>

							</table>
							
						   
							
							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                                <input type="submit" class="btn btn-primary" value='SIMPAN'></button>
                            </div>
                        </div>
                    </div>
                </div>
				</form>

         
            

            
            

            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->




