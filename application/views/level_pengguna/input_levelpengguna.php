                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="itemForm" method="post" action="<?php echo base_url(); ?>levelpengguna/getlevelpengguna">
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Level Pengguna *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nama" name="nama" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Menu Akses *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="menu" name="menu" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>levelpengguna">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->