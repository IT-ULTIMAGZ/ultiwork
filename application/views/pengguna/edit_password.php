
                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Form Edit Password Pengguna (<?php echo $nama; ?>)</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="penggunaEditPassword" method="post" action="<?php echo base_url(); ?>pengguna/updatePasswordpengguna">
                                            	<input class="form-control" id="id" name="id" type="hidden" value="<?php echo $id; ?>" required="required">
                                                <div class="form-group">
                                                    <label for="password" class="control-label col-lg-2">New Password *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="password" name="password" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>pengguna">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->