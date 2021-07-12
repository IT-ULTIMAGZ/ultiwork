                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="petugasForm" method="post" action="<?php echo base_url(); ?>petugas/getpetugas">
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Nama *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nama" name="nama" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jk" class="control-label col-lg-2">Jk *</label>
                                                    <div class="col-lg-2">
                                                    	<select id="jk" name="jk" class="form-control">
                                                    		<option value=""></option>
                                                    		<option value="L">Laki-laki</option>
                                                    		<option value="P">Perempuan</option>
                                                    	</select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="control-label col-lg-2">Alamat *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="alamat" name="alamat" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notelp" class="control-label col-lg-2">No Telp / HP *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="notelp" name="notelp" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Username *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="username" name="username" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="control-label col-lg-2">Password *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="password" name="password" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="level" class="control-label col-lg-2">Level *</label>
                                                    <div class="col-lg-2">
                                                    	<select id="level" name="level" class="form-control">
                                                    		<option value=""></option>
                                                    		<option value="1">Master Admin</option>
                                                    		<option value="2">Admin</option>
                                                            <option value="3">Guest</option>
                                                    	</select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>petugas">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->