                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="itemForm" method="post" action="<?php echo base_url(); ?>dpthp/updatedpthp">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Telah Dikunjungi *</label>
                                                    <div class="col-lg-7">
                                                        <?php if($visited == "0"){ ?>
                                                        <label class="radio-inline"><input type="radio" name="visited" value="0" checked>Sudah</label><label class="radio-inline"><input type="radio" name="visited" value="1">Belum</label>
                                                        <?php }else{ ?>
                                                        <label class="radio-inline"><input type="radio" name="visited" value="0">Sudah</label><label class="radio-inline"><input type="radio" name="visited" value="1" checked>Belum</label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Memilih *</label>
                                                    <div class="col-lg-3">
                                                        <?php if($milih == "2"){ ?>
                                                        <label class="radio-inline"><input type="radio" name="milih" value="2" checked>Iya</label><label class="radio-inline"><input type="radio" name="milih" value="3">Tidak</label>
                                                        <?php }else if($milih == "3"){ ?>
                                                        <label class="radio-inline"><input type="radio" name="milih" value="2">Iya</label><label class="radio-inline"><input type="radio" name="milih" value="3" checked>Tidak</label>
                                                        <?php }else{ ?>
                                                        <label class="radio-inline"><input type="radio" name="milih" value="2">Iya</label><label class="radio-inline"><input type="radio" name="milih" value="3">Tidak</label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">No Telp Pemilih *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="notelp" name="notelp" type="text" value="<?php echo $notelp ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Alamat Pemilih *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="alamat" name="alamat" type="text" value="<?php echo $alamat ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Keterangan *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="ket" name="ket" type="text" value="<?php echo $ket ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>dpthp?nama=&kecamatan=<?php echo $dtkecamatan ?>&kelurahan=<?php echo $dtkelurahan ?>&tps=<?php echo $dttps ?>&submit=Submit">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->