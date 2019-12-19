<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>



<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>GOLONGAN</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Data Master Golongan</li>
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
					<strong>Golongan</strong>
					</div>
					
					<div class="card-body">
					<?php

					echo"
					<table class='table table-bordered'>
					<thead>
					<tr>
					<th scope='col'>#</th>
					<th scope='col'>Nama</th>
					<th scope='col'>Kode</th>
					<th scope='col'>Sub</th>
					<th scope='col'>Keterangan</th>
					<th scope='col' colspan='2'>Act</th>
					</tr>
					</thead>

					<tbody>
					<tr>
					<form method='post' action='".base_url()."index.php/mda/inputgol'>
					<th scope='col'></th>
					<th scope='col'>
					<input type='text' name='namagol' class='form-control'>
					</th>
					<th scope='col'><input type='text' name='kodegol' class='form-control'></th>
					<th scope='col'>
					
					<select name='subgol' class='form-control'>
					<option value='0'>[ induk ]</option>";
					foreach($golsub as $gols)
						{
						echo"<option value='$gols->idgol'>$gols->namagol</option>";
						}
					echo"
					</select>
					</th>
					<th scope='col'><input type='text' name='ketgol' class='form-control'></th>
					<th scope='col' colspan='2'><input type='submit' class='btn btn-primary' value='SIMPAN'></th>
					</form>
					</tr>


					";
					$no=1;
					foreach ($gol as $gols)
						{
						//<a  href='#editkl$item->idcabbg' data-toggle='modal' data-id='$item->idcabbg'><i class='fa fa-edit'></i></a>
						echo"
						<tr>
						<td scope='row'>$no</td>
						<td>$gols->namagol</td>
						<td>$gols->kodegol</td>
						<td>";
						$idnya=$gols->subgol;
						if($idnya==0)
							{echo"Induk";}
						else
							{
							//$a1=$this->db->query("select * from golongan where idgol='$idnya'");
							$aa=$this->mda_model->viewgolinduk($idnya);
							foreach($aa->result() as $subs)
								{echo"$subs->namagol";}
							}
						echo"</td>
						<td>$gols->ketgol</td>
						<td>
						
						";
						//<a href='#editkl' data-toggle='modal' data-target='editikl' data-idcabbg='234'></a>
						//<a href='' data-toggle='modal' data-target='#editkl".$item->idcabbg."'><i class='fa fa-pencil'></i></a>
						//<button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
						?>
						<a 
                        href="javascript:;"
						data-idgol="<?php echo"$gols->idgol"; ?>"
						data-namagol="<?php echo"$gols->namagol"; ?>"
						data-kodegol="<?php echo"$gols->kodegol"; ?>"
						data-subgol="<?php echo"$gols->subgol"; ?>"
						data-ketgol="<?php echo"$gols->ketgol"; ?>"
						data-toggle="modal" data-target="#editgol">
						<i class='fa fa-edit'></i>
                        </a>
						
						
						
						&nbsp;
						
						</td>
						
						<td><a 
                        href="javascript:;"
						data-idgol="<?php echo $item->idgol; ?>"
						data-namagol="<?php echo $item->namagol; ?>"
						data-toggle="modal" data-target="#hpsgol">
						<i class='fa fa-trash-o'></i>
                        </a></td>
						</tr>
						
						<?php
						$no++;
						}
					echo"
					</tbody>
					</table>
					";
					?>
					</div>

				</div>

            </div>

	 
			<?php echo"
			<form  action='".base_url(). "index.php/mda/editgol_' method='post'>
			"; ?>
			 <div class="modal fade" id="editgol" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit Golongan  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
							<br>ID: 
							<input type="text" class="form-control" id="idgol" name="idgol" disabled>
							<input type="hidden" class="form-control" id="idgola" name="idgol">
                            <br>Nama:
							<input type="text" class="form-control" id="namagol" name="namagol" >
                            <br>Kode:
							<input type="text" class="form-control" id="kodegol" name="kodegol" >
                            <br>Sub Golongan:
							<select class="form-control" id="subgol" name="subgol" >
							<?php
							echo"
							<option value='0'>[ induk ]</option>";
							foreach($golsub as $gols)
								{
								echo"<option value='$gols->idgol'>$gols->namagol</option>";
								}
							
							?>
							</select>
                            <br>Keterangan:
							<input type="text" class="form-control" id="ketgol" name="ketgol" >
                            <br>

							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                                <input type="submit" class="btn btn-primary" value='SIMPAN'></button>
                            </div>
                        </div>
                    </div>
                </div>
				</form>
          

			
			<?php echo"
			<form  action='".base_url(). "index.php/mda/hpsgol_' method='post' >
			"; ?>
			 <div class="modal fade" id="hpsgol" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Hapus Kantor Golongan? <p class="idgol"></p> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							<input type="hidden" class="form-control" id="idgol" name="idgol" >
							<input type="hidden" class="form-control" id="namagol" name="namagol" >

							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                                <input type="submit" class="btn btn-danger" value='HAPUS'></button>
                            </div>
                        </div>
                    </div>
                </div>
				</form>


            
            



        </div> <!-- .content -->
    </div><!-- /#right-panel 
	-->




<script>
$(document).ready(function()
	{
	$('#editgol').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#idgol').attr("value",div.data('idgol'));
		modal.find('#idgola').attr("value",div.data('idgol'));
		modal.find('#namagol').attr("value",div.data('namagol'));
		modal.find('#kodegol').attr("value",div.data('kodegol'));
		modal.find('#subgol').attr("value",div.data('subgol'));
        modal.find('#ketgol').attr("value",div.data('ketgol'));
		//modal.find('#nmcabbg').html(div.data('nmcabbg'));
		//modal.find('#ketcabbg').html(div.data('ketcabbg'));
		//modal.find('#cbcabbg').html(div.data('cbcabbg'));
		//modal.find('#codeuker').html(div.data('codeuker'));
        }
		);
    }
	);
</script>

<script>
$(document).ready(function()
	{
	$('#hpsgol').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#idgol').attr("value",div.data('idgol'));
		modal.find('#namagol').attr("value",div.data('namagol'));
        }
		);
    }
	);
</script>