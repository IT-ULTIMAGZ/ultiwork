                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="penagihanForm" name="penagihanForm" method="post" action="<?php echo base_url(); ?>penagihan/updatetagihan" enctype="multipart/form-data">
                                                <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="transaksiid" class="control-label col-lg-3">ID Transaksi Penjualan</label>
                                                    <div class="col-lg-4">
                                                        <input class='form-control' type='text' name='penjualan' id='penjualan' readonly='readonly' value='<?php echo $id; ?>' />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgltransaksi" class="control-label col-lg-3">Tgl Transaksi</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="tgltransaksi" name="tgltransaksi" type="text" readonly value="<?php echo $tgltransaksi; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jatuhtempo" class="control-label col-lg-3">Tgl Jatuh Tempo</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="jatuhtempo" name="jatuhtempo" type="text" readonly value="<?php echo $jatuhtempo; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="customer" class="control-label col-lg-3">Customer</label>
                                                    <div class="col-lg-6">
                                                    	<input class="form-control" id="customer" name="customer" type="text" readonly value="<?php echo $namacustomer; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="buktitransaksi" class="control-label col-lg-3">Bukti Transaksi *</label>
                                                    <div class="col-lg-6">
                                                    	<input class="form-control" id="buktitransaksi" name="buktitransaksi" type="file" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light btn-sm" type="submit" name="update">Update</button>
                                                        <a class="btn btn-default waves-effect btn-sm" href="<?php echo base_url(); ?>penagihan">Cancel</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->