
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>



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
				//$iduser=$this->session->userdata('iduser');
				//echo"$iduser"; 
				?>
				
				
				<div class="card">
					<div class="card-header">
					<strong>Pagi Hari</strong>
					</div>
					
					<div class="card-body">
					<?php

					echo"
					<table class='table table-bordered'>
					<thead>
					<tr>
					<th scope='col'>#</th>
					<th scope='col'>Tanggal</th>
					<th scope='col'>Kantor Layanan</th>
					<th scope='col'>Reliability</th>
					<th scope='col'>Saldo</th>
					<th scope='col'>Shortage</th>
					<th scope='col'>Surplus</th>
					<th scope='col'>Dok TK</th>
					<th scope='col' colspan='2'>Act</th>
					</tr>
					</thead>
					
					<tbody>
					
					
					";
					$no=1;
					foreach ($user as $usera)
						{
						echo"
						<tr>
						<td scope='row'><b>$no</b></td>
						<td>$usera->namauser</td>
						<td>$usera->jabatan</td>
						
						<td>";
						if($usera->ketuser=='0')
							{echo"Divisi";}
						elseif($usera->ketuser=='direksi')
							{echo"Direksi";}
						else
							{echo"$usera->codeuker - $usera->namakl";}
							
						echo"</td>
						
						<td>$usera->username</td>
						<td>******</td>
						<td>
						";
						?>
						<a href="#" data-toggle="modal" data-target="#edituserkl" data-id="<?php echo $usera->iduser; ?>"><i class="fa fa-edit"></i></td>
						<td>
						<a 
                        href="javascript:;"
						data-iduser="<?php echo $usera->iduser; ?>"
						data-namauser="<?php echo $usera->namauser; ?>"
						data-jabatan="<?php echo $usera->jabatan; ?>"
						data-toggle="modal" data-target="#hps_user">
						<i class='fa fa-trash-o'></i>
                        </a>
						</td>
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
			<form method='post' action='".base_url(). "index.php/mda/edituserkl'>
			"; ?>
			 <div class="modal fade" id="edituserkl" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit User  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                           <div id="fetched-data"></div>
						  
						
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
			<form  action='".base_url(). "index.php/mda/hpsuser' method='post' >
			"; ?>
			 <div class="modal fade" id="hps_user" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Hapus User?  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							ID:
							<input type="text" class="form-control" id="iduser_" name="iduser_" disabled>
							<input type="hidden" class="form-control" id="iduser" name="iduser" >
							Nama:
							<input type="text" class="form-control" id="namauser_" name="namauser_" disabled>
							<input type="hidden" class="form-control" id="namauser" name="namauser" >

							Jabatan:
							<input type="text" class="form-control" id="jabatan_" name="jabatan_" disabled>
							<input type="hidden" class="form-control" id="jabatan" name="jabatan" >

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


<script type="text/javascript">
    $(document).ready(function(){
        $('#edituserkl').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "post",
				url : '<?php echo base_url(); ?>index.php/mda/detailuserkl',
				data :  "rowid="+ rowid,
                success : function(data){
                $("#fetched-data").html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>


<script>
$(document).ready(function()
	{
	$('#edit-gol').on('show.bs.modal', function (event) 
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
	$('#hps_user').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#iduser').attr("value",div.data('iduser'));
		modal.find('#namauser').attr("value",div.data('namauser'));
		modal.find('#iduser_').attr("value",div.data('iduser'));
		modal.find('#namauser_').attr("value",div.data('namauser'));
		modal.find('#jabatan').attr("value",div.data('jabatan'));
		modal.find('#jabatan_').attr("value",div.data('jabatan'));
        }
		);
    }
	);
</script>