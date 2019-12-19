<?php
$id=$_GET['idcabbg'];
?>
 <div class="modal fade" id="#editkl" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Edit Kantor Layanan  <?php echo"$id";?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
							<br>
							<input type="text" class="form-control" id="#id" name="id" value="">
                            <br>
							<input type="text" class="form-control" id="#nmcabbg" name="nmcabbg" value="">
                            <br>
							<input type="text" class="form-control" id="#cbcabbg" name="cbcabbg" value="">
                            <br>
							<input type="text" class="form-control" id="#codeuker" name="codeuker" value="">
                            <br>

							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
          
<?php
?>