                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="itemForm" method="post" action="<?php echo base_url(); ?>main/updatefoto" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <input type="hidden" name="beffoto" value="<?php echo "./".$foto ?>">
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Foto Profil *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="foto" name="foto" type="file" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Update foto</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>main/profil">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->