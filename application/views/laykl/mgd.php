<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<?php
$perut=explode("-", $periode_dana);
$per=$perut[0];
$perbl=$perut[1];
$perth=$perut[2];
?>


<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DANA OPERASIONAL</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Pengecekan Dropping Dana Operasional</li>
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
					<strong>Dana Operasional</strong>
					</div>
					
					<div class="card-body card-block">
					<form action="<?php echo"".base_url()."index.php/kl/mgdi"; ?>" method="post" class="form-horizontal">
						<!--
						
						--->
						<div class="row form-group">
							<div class="col col-md-2">
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

						
						</div>
						
						<!----------------------------------------->

					<div class="card-body">
					<?php
					
					foreach($iduser as $usera)
						{
						//
						$myidkl=$usera->idkl;
						$mycodeuker=$usera->codeuker;
						$mynamakl=$usera->namakl;
						}
						//colspan='2'
					echo"
					<table class='table table-bordered'>
					<thead>
					<tr>
					<th scope='col'>#</th>
					<th scope='col'>Tanggal</th>
					<th scope='col'>Jumlah</th>
					<th scope='col' >Act</th>
					</tr>
					</thead>
					
					<tbody>
					<tr>
					<form method='post' action='".base_url()."index.php/mda/inputkl'>
					<th scope='col'></th>
					<th scope='col'>
					<input type='text' name='tgl_drop' class='form-control'>
					<small class='form-text text-muted'>yyyy-mm-dd</small>
					</th>
					
					<th scope='col'><input type='text' name='jml_dana' class='form-control'>
					<small class='form-text text-muted'>Rp.</small>
					</th>
					
					<th scope='col' >
					<input type='hidden' name='add' value='mgd'>
					<input type='hidden' name='codeuker' value='$mycodeuker'>
					<input type='submit' class='btn btn-primary' value='SIMPAN'></th>
					</form>
					</tr>
					";//colspan='2'
					$dtdana=$this->kl_model->ddana($periode_dana)->result();
					$no=1;
					foreach ($dtdana as $ddana)
						{
						echo"
						<tr>
						<td scope='row'>$no</td>
						<td>$ddana->tgl_drop</td>
						<td>".number_format($ddana->jml_dana,0,',',',')."</td>
						
						
						";
						?>
						<!-- <td><a 
                        href="javascript:;"
						data-idgol="<?php echo"$gols->idgol"; ?>"
						data-namagol="<?php echo"$gols->namagol"; ?>"
						data-kodegol="<?php echo"$gols->kodegol"; ?>"
						data-subgol="<?php echo"$gols->subgol"; ?>"
						data-ketgol="<?php echo"$gols->ketgol"; ?>"
						data-toggle="modal" data-target="#editgol">
						<i class='fa fa-edit'></i>
                        </a> 
						
						
						
						<a href='#editmgd' data-toggle='modal' data-id="<?php echo $ddana->id_dana; ?>"><i class='fa fa-edit'></i></a>	
						
						</td>
						-->
						<td><a 
                        href="javascript:;"
						data-id_dana="<?php echo $ddana->id_dana; ?>"
						data-tgl_dana="<?php echo $ddana->tgl_drop; ?>"
						data-jml_dana="<?php echo $ddana->jml_dana; ?>"
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
			<form  action='".base_url(). "index.php/kl/hpsdana' method='post' >
			"; ?>
			 <div class="modal fade" id="hpskl_" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Hapus Data Dana Operasional? <p class="idgol"></p> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
							Tanggal Drop:
							<input type="text" class="form-control" id="tgl_dana" name="tgl_dana" disabled>
							<input type="hidden" class="form-control" id="id_dana" name="id_dana" >
							Jumlah Dana:
							<input type="text" class="form-control" id="jml_dana_" name="jml_dana_" disabled>
							<input type="hidden" class="form-control" id="jml_dana" name="jml_dana" >
							
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
        modal.find('#id_dana').attr("value",div.data('id_dana'));
		modal.find('#jml_dana').attr("value",div.data('jml_dana'));
		modal.find('#tgl_dana').attr("value",div.data('tgl_dana'));
		modal.find('#id_dana_').attr("value",div.data('id_dana'));
		modal.find('#jml_dana_').attr("value",div.data('jml_dana'));
		modal.find('#tgl_dana_').attr("value",div.data('tgl_dana'));
        }
		);
    }
	);
</script>