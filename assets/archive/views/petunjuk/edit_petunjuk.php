                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="petunjukForm" method="post" action="<?php echo base_url(); ?>petunjuk/updatepetunjuk">
                                                </div>
                                                <div class="form-group">
                                                    <label for="judul" class="control-label col-lg-2">Judul Petunjuk *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                                                        <input class="form-control" id="judul" name="judul" type="text" value="<?php echo $judul; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="control-label col-lg-2">Deskripsi Petunjuk *</label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control" id="nama" name="nama" rows="5">value="<?php echo $nama; ?>"</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>petunjuk">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->