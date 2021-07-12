                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="itemForm" method="post" action="<?php echo base_url(); ?>item/updateitem">
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-2">Kode Barang</label>
                                                    <div class="col-lg-3">
                                                        <input class="form-control" id="id" name="id" value="<?php echo $id; ?>" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Item *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="namaitem" name="namaitem" type="text" value="<?php echo $namaitem; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ukuran" class="control-label col-lg-2">Ukuran *</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="ukuran" name="ukuran" type="text" value="<?php echo $ukuran; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="beli" class="control-label col-lg-2">Harga Beli *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="beli" name="beli" type="text" value="<?php echo $beli; ?>" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jual" class="control-label col-lg-2">Harga Jual *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="jual" name="jual" type="text" value="<?php echo $jual; ?>" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Total Item *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="total_item" name="total_item" type="text" value="<?php echo $total_item; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" id="update">Update</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>item">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

