<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>



<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA MASTER</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Kantor Layanan</li>
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
					<strong>Kantor Layanan</strong>
					</div>
					
					<div class="card-body">
					<?php

					echo"
					<table class='table table-bordered'>
					<thead>
					<tr>
					<th scope='col'>#</th>
					<th scope='col'>Nama</th>
					<th scope='col'>Codebranch</th>
					<th scope='col'>Codeuker</th>
					<th scope='col' colspan='2'>Act</th>
					</tr>
					</thead>

					<tbody>
					<tr>
					<form method='post' action='".base_url()."index.php/mda/inputkl'>
					<th scope='col'></th>
					<th scope='col'>
					<input type='text' name='namakl' class='form-control'>
					</th>
					
					<th scope='col'><input type='text' name='codebranch' class='form-control'></th>
					<th scope='col'><input type='text' name='codeuker' class='form-control'></th>
					<th scope='col' colspan='2'><input type='submit' class='btn btn-primary' value='SIMPAN'></th>
					</form>
					</tr>


					";
					$no=1;
					foreach ($kl as $kls)
						{
						echo"
						<tr>
						<td scope='row'>$no</td>
						<td>$kls->namakl</td>
						<td>$kls->codebranch</td>
						<td>$kls->codeuker</td>
						<td>
						
						";
						?>
						<!-- <a 
                        href="javascript:;"
						data-idgol="<?php echo"$gols->idgol"; ?>"
						data-namagol="<?php echo"$gols->namagol"; ?>"
						data-kodegol="<?php echo"$gols->kodegol"; ?>"
						data-subgol="<?php echo"$gols->subgol"; ?>"
						data-ketgol="<?php echo"$gols->ketgol"; ?>"
						data-toggle="modal" data-target="#editgol">
						<i class='fa fa-edit'></i>
                        </a> 
						
						-->
						
						<a href='#editkl' data-toggle='modal' data-id="<?php echo $kls->idkl; ?>"><i class='fa fa-edit'></i></a>	
						
						</td>
						
						<td><a 
                        href="javascript:;"
						data-idkl="<?php echo $kls->idkl; ?>"
						data-namakl="<?php echo $kls->namakl; ?>"
						data-toggle="modal" data-target="#hpskl_">
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
			<form method='post' action='".base_url(). "index.php/mda/editkl'>
			"; ?>
			 <div class="modal fade" id="editkl" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit Kantor Layanan  </h5>
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
			<form  action='".base_url(). "index.php/mda/hpskl' method='post' >
			"; ?>
			 <div class="modal fade" id="hpskl_" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Hapus Data KL? <p class="idgol"></p> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							ID:
							<input type="text" class="form-control" id="idkl_" name="idkl_" disabled>
							<input type="hidden" class="form-control" id="idkl" name="idkl" >
							Nama:
							<input type="text" class="form-control" id="namakl_" name="namakl_" disabled>
							<input type="hidden" class="form-control" id="namakl" name="namakl" >

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
        $('#editkl').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "post",
				url : '<?php echo base_url(); ?>index.php/mda/detailkl',
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
	$('#edit--kl').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#idkl').attr("value",div.data('idkl'));
		modal.find('#namakl').attr("value",div.data('namakl'));
		modal.find('#codebranch').attr("value",div.data('codebranch'));
        modal.find('#codeuker').attr("value",div.data('codeuker'));
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
	$('#hpskl_').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#idkl').attr("value",div.data('idkl'));
		modal.find('#namakl').attr("value",div.data('namakl'));
		modal.find('#idkl_').attr("value",div.data('idkl'));
		modal.find('#namakl_').attr("value",div.data('namakl'));
        }
		);
    }
	);
</script>