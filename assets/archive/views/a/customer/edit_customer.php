						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="customerForm" method="post" action="<?php echo base_url(); ?>customer/updatecustomer">
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama *</label>
                                                    <div class="col-lg-6">
                                                    	<input class="form-control" id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $nama; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pic" class="control-label col-lg-2">Pic. *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="pic" name="pic" type="text" value="<?php echo $pic; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="control-label col-lg-2">Alamat *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="alamat" name="alamat" type="text" value="<?php echo $alamat; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notelp" class="control-label col-lg-2">No Telp / HP *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="notelp" name="notelp" type="text" value="<?php echo $notelp; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>customer">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->