
<?php echo link_tag('assets/css/datepicker.css'); ?>

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
				
				<?php
				foreach($gol as $a)
					{
					$idgol=$a->idgol;	
					$namagol=$a->namagol;	
					$kodegol=$a->kodegol;	
					}
				?>
				<div class="card">
					<div class="card-header">
						
					<strong>Data Barang <i><b><?php echo"$namagol"; ?></b></i></strong>
						
					</div>
					
					<div class="card-body">
						<div class="row form-group">
							<div class="col col-sm3">
							<a href='#tmbbrg' data-toggle='modal'><i class='fa ti-write'></i></a>
							</div>

							<form method="get" action="<?php echo base_url(); ?>index.php/kl/baranga">
							<div class="col col-sm9">
								<div class="input-group">
								<select name="idgol" class=" input-sm form-control-sm form-control">
								<option value="-">[ Golongan ]</option>
								<?php
								foreach($golb as $b)
									{
									echo"<option value='$b->idgol' ";
									if($idgol==$b->idgol)
										{echo"selected";}
									else
										{echo"";}
									echo">$b->namagol</option>";
									}
								
								?>
								</select>
								
									<div class="input-group-btn">
									<button type="submit" class="btn btn-primary btn-sm">
									<i class="fa fa-search"></i>
									</button>
									</div>
								</div>
							</div>
							</form>
						</div>
						
					<table class='table table-bordered'>
					<thead>
					<tr>
					<th scope='col'>#</th>
					<th scope='col'>Barang</th>
					<th scope='col'>No Inv</th>
					<th scope='col'>Jenis</th>
					<th scope='col'>Pengguna</th>
					<th scope='col'>Tgl Beli</th>
					<th scope='col'>Harga Beli</th>
					<th scope='col' colspan='2'>Act</th>
					</tr>
					</thead>

					<tbody>
					<?php
					$no=1;
					foreach($brg as $c)
						{
						echo"
						<tr>
						<td>$no</td>
						<td>$c->namabarang</td>
						<td>$c->noinv</td>
						<td>$c->nmjenis</td>
						<td>$c->pengguna</td>
						<td>$c->tglbeli</td>
						<td>$c->hargabeli</td>";?>
						<td><a href='#editgol' data-toggle='modal' data-id=""><i class='fa fa-edit'></i></a>	</td>
						<td><a 
                        href="javascript:;"
						data-idgol=""
						data-namagol=""
						data-toggle="modal" data-target="#hpsgol">
						<i class='fa fa-trash-o'></i>
                        </a></td>
						</tr>

						<?php
						
						$no++;
						}
					?>
					</tbody>
					</table>
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
                                <h5 class="modal-title" id="mediumModalLabel">Tambah Barang  
								<?php echo"$namagol"; ?>
								</h5>
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
							<option value=''>[ jenis barang ]</option>
							";
							
							$id=$idgol;
							$dtjnsx=$this->kl_model->jns($idgol);
							foreach($dtjnsx->result() as $e)
								{
								echo"<option value='$e->idjenis'>$e->nmjenis</option>";
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
							<td>
							<div class="input-group date" data-provide="datepicker">
							<input type="text" name="tglbeli" class="form-control">
								<div class="input-group-addon">
								<span class="fa fa-calendar"></span>
								</div>
							</div>
							
							<input type='hidden' name='idcabbg'>
							</td>
							</tr>
							
							<tr>
							<td>Harga RP</td>
							<td><input type='text' name='hargabeli' class='form-control' onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
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




<script src="<?php echo base_url();?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/myrp.js"></script>