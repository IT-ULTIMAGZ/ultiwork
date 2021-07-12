                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="pembelianForm" name="pembelianForm" method="post" action="<?php echo base_url(); ?>pembelian/getupdatepembayaran" enctype="multipart/form-data">
                                                <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="transaksiid" class="control-label col-lg-3">Faktur</label>
                                                    <div class="col-lg-4">
                                                        <input class='form-control' type='text' name='pembelian' id='pembelian' readonly='readonly' value='<?php echo $id; ?>' />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgldatang" class="control-label col-lg-3">Tgl Datang</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="tgldatang" name="tgldatang" type="text" readonly value="<?php echo $tgldatang; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jatuhtempo" class="control-label col-lg-3">Tgl Jatuh Tempo</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="jatuhtempo" name="jatuhtempo" type="text" readonly value="<?php echo $jatuhtempo; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="buktipembayaran" class="control-label col-lg-3">Bukti Transaksi *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="buktipembayaran" name="buktipembayaran" type="file" required="required">
                                                        <small><b>Penamaan file TANPA TANDA SPASI (format : .png .jpg .gif)</b></small>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light btn-sm" type="submit" name="update">Update</button>
                                                        <a class="btn btn-default waves-effect btn-sm" href="<?php echo base_url(); ?>pembelian">Cancel</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->