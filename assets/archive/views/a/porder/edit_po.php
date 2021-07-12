						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                	<div class="panel-heading"><h3 class="panel-title text-white">Form Surat PO</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="inputpoForm" method="post" action="<?php echo base_url(); ?>po/updatepo">
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-3">No Faktur</label>
                                                    <div class="col-lg-3">
                                                        <input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='<?php echo $faktur ?>' />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggalorder" class="control-label col-lg-3">Tanggal Order *</label>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" id="tanggalorder" name="tanggalorder" type="text" readonly value="<?php echo $tanggalorder; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggalkirim" class="control-label col-lg-3">Tanggal Kirim *</label>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" id="tanggalkirim" name="tanggalkirim" type="text" readonly value="<?php echo $tanggalkirim; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jamsampai" class="control-label col-lg-3">Perkiraan Jam Sampai *</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="jamsampai" name="jamsampai" type="text" placeholder="Ex: 14.30" value="<?php echo $jamsampai; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>po">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->

                        </div> <!-- End row -->