                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="itemForm" method="post" action="<?php echo base_url(); ?>nasabah/getnasabah">
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Nama *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="nama" name="nama" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jual" class="control-label col-lg-2">No. KTP *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="ktp" name="ktp" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46 || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Jenis Kelamin *</label>
                                                    <div class="col-lg-3">
                                                        <select class="form-control" name="jk">
                                                            <option value="L">Laki-laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Tanggal Lahir *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="tanggallahir" name="tanggallahir" type="text" readonly required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Warga Negara *</label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control" name="warganegara">
                                                            <option value="I">Indonesia</option>
                                                            <option value="A">Asing</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="jual" class="control-label col-lg-2">Telepon *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="telepon" name="telepon" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46 || charCode == 8 || charCode == 9 || charCode == 37 || charCode == 39)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_item" class="control-label col-lg-2">Email *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="email" name="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>nasabah">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->