
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>

	
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Penyusutan</li>
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
<strong>Penyusutan</strong>
</div>
					
<div class="card-body">
<?php

echo"
<table class='table table-bordered'>
<thead>
<tr>
<th scope='col'>#</th>
<th scope='col'>Nama</th>
<th scope='col'>Golongan</th>
<th scope='col'>Tahun</th>
<th scope='col'>Persen</th>
<th scope='col' colspan='2'>Act</th>
</tr>

</thead>

<tbody>";
$no=1;
foreach ($jns as $b)
	{
	echo"
	<tr>
	<td scope='row'>$no</td>
	<td>$b->nmjenis</td>
	<td>$b->namagol</td>
	<td><input type='text' name='thn_$idjenis' value='$b->idjenis' class='form-control'></td>
	<td><input type='text' name='persen_$idjenis' value='$b->idjenis' class='form-control'></td>
	<td>";
	?>
	<a href='#myModal' data-toggle='modal' data-id="<?php echo $b->idjenis; ?>"><i class='fa fa-edit'></i></a>				
	</td>
	
	<td><a 
	href="javascript:;"
	data-idjenis="<?php echo $b->idjenis; ?>"
	data-nmjenis="<?php echo $b->nmjenis; ?>"
	data-toggle="modal" data-target="#hpsjns">
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
<form  action='".base_url(). "index.php/mda/editjns' method='post'>
"; ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="mediumModalLabel">Edit Jenis Barang</h5>
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
<form  action='".base_url(). "index.php/mda/hpsjns' method='post'>
"; ?>
<div class="modal fade" id="hpsjns" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="mediumModalLabel">Hapus Jenis Barang? </h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
ID:
<input type="text" class="form-control" id="idjenis_" name="idjenis_" disabled>
<input type="hidden" class="form-control" id="idjenis" name="idjenis" >
Jenis Barang:
<input type="text" class="form-control" id="nmjenis_" name="nmjenis_" disabled>
<input type="hidden" class="form-control" id="nmjenis" name="nmjenis" >

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
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "post",
				url : '<?php echo base_url(); ?>index.php/mda/detail',
				data :  "rowid="+ rowid,
                success : function(data){
                $("#fetched-data").html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>

<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<!--
<script>
$(document).ready(function()
	{
	$('#editjns').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#idjenis').attr("value",div.data('idjenis'));
		modal.find('#idjenis_').attr("value",div.data('idjenis'));
		modal.find('#nmjenis').attr("value",div.data('nmjenis'));
		modal.find('#idgol').attr("value",div.data('idgol'));
		modal.find('#namagol').attr("value",div.data('namagol'));
		modal.find('#ketjenis').attr("value",div.data('ketjenis'));
        modal.find('#kodejenis').attr("value",div.data('kodejenis'));
		//modal.find('#nmcabbg').html(div.data('nmcabbg'));
		//modal.find('#ketcabbg').html(div.data('ketcabbg'));
		//modal.find('#cbcabbg').html(div.data('cbcabbg'));
		//modal.find('#codeuker').html(div.data('codeuker'));
        }
		);
    }
	);
</script>
-->

<script>
$(document).ready(function()
	{
	$('#hpsjns').on('show.bs.modal', function (event) 
		{
		var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#idjenis').attr("value",div.data('idjenis'));
		modal.find('#idjenis_').attr("value",div.data('idjenis'));
		modal.find('#nmjenis').attr("value",div.data('nmjenis'));
		modal.find('#nmjenis_').attr("value",div.data('nmjenis'));
        }
		);
    }
	);
</script>


