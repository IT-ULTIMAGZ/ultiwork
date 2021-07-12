                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="petugasEditForm" method="post" action="<?php echo base_url(); ?>v1/updateprofil">
                                            	<input class="form-control" id="id" name="id" type="hidden" value="<?php echo $id; ?>" required="required">
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $nama; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jk" class="control-label col-lg-2">Jk *</label>
                                                    <div class="col-lg-10">
                                                    	<select id="jk" name="jk" class="form-control">
                                                    		<?php if($jk =='L'){ ?>
                                                    		<option value="L" selected>Laki-laki</option>
                                                    		<option value="P">Perempuan</option>
                                                    		<?php }else{  ?>
                                                    		<option value="L">Laki-laki</option>
                                                    		<option value="P" selected>Perempuan</option>
                                                    		<?php } ?>
                                                    	</select>
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
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="notelp" name="notelp" type="text" value="<?php echo $notelp; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Username *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="username" name="username" type="text" value="<?php echo $username; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>v1/profil">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->