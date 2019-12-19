



<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA KL</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Data Kantor Layanan</li>
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
					<th scope='col'>Keterangan</th>
					<th scope='col'>Codebranch</th>
					<th scope='col'>Codeuker</th>
					<th scope='col' colspan='2'>Act</th>
					</tr>
					
					<tr>
					<form method='post' action='".base_url()."index.php/mda/inputkl'>
					<th scope='col'></th>
					<th scope='col'>
					<input type='text' name='nmcabbg' class='form-control'>
					</th>
					<th scope='col'><input type='text' name='ketcabbg' class='form-control'></th>
					<th scope='col'><input type='text' name='cbcabbg' class='form-control'></th>
					<th scope='col'><input type='text' name='codeuker' class='form-control'></th>
					<th scope='col' colspan='2'><input type='submit' class='btn btn-primary' value='SIMPAN'></th>
					</form>
					</tr>


					</thead>
					
					<tbody>";
					$no=1;
					foreach ($kl as $item)
						{				
                        
						//<a  href='#editkl$item->idcabbg' data-toggle='modal' data-id='$item->idcabbg'><i class='fa fa-edit'></i></a>
						echo"
						<tr>
						<td scope='row'>$no</td>
						<td>$item->nmcabbg</td>
						<td>$item->ketcabbg</td>
						<td>$item->cbcabbg</td>
						<td>$item->codeuker</td>
						<td>
						<a href='#editkl' data-toggle='modal' data-target='editikl' data-idcabbg='234'><i class='fa fa-pencil'></i></a>
						";
						//<a href='' data-toggle='modal' data-target='#editkl".$item->idcabbg."'><i class='fa fa-pencil'></i></a>
						?>
						
						&nbsp;
						
						</td>
						
						<td><a href=''><i class='fa fa-eraser'></i></a></td>
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
                            
							<br>
							<input type="text" class="form-control" id="idcabbg" name="idcabbg" value="">
                            <br>
							<input type="text" class="form-control" id="nmcabbg" name="nmcabbg" value="">
                            <br>
							<input type="text" class="form-control" id="cbcabbg" name="cbcabbg" value="">
                            <br>
							<input type="text" class="form-control" id="codeuker" name="codeuker" value="">
                            <br>

							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
          



            
            



        </div> <!-- .content -->
    </div><!-- /#right-panel 
	-->




<script type="text/JavaScript">
    $(document).ready(function() {
        // Untuk sunting
        $('#editkl').on('show.bs.editikl', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#idcabbg').attr("value",div.data('idcabbg'));
            modal.find('#nmcabbg').attr("value",div.data('nmcabbg'));
            modal.find('#codeuker').html(div.data('codeuker'));
            modal.find('#cbcabbg').attr("value",div.data('cbcabbg'));
        });
    });
</script>

	