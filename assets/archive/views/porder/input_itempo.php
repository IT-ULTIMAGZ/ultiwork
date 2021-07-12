						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="itempoForm" method="post" action="<?php echo base_url(); ?>po/getitempo">
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-2">Untuk No Faktur</label>
                                                    <div class="col-lg-3">
                                                        <input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='<?php echo $faktur; ?>' />
                                                    </div>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Item *</label>
                                                    <div class="col-lg-4">
                                                        <select class="select2 form-control" name="item" id="item" required="required">
                                                            <option value=""></option>
                                                            <?php $query=$this->db->get('item');foreach ($query->result() as $row) { ?>
                                                            <option value="<?php echo $row->itemid ?>"><?php echo $row->namaitem; echo " ".$row->ukuran; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan" class="control-label col-lg-10"><small>Mohon inputkan jumlah item yang ingin di pesan berdasarkan warnanya, jika tidak ingin pesan untuk warna tertentu, misal : "putih" isikan angka 0</small></label>
                                                    <div>&nbsp;</div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="putih" class="control-label col-lg-4">Putih *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="putih" name="putih" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hitam" class="control-label col-lg-4">Hitam *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="hitam" name="hitam" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="coklat" class="control-label col-lg-4">Coklat *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="coklat" name="coklat" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hijau" class="control-label col-lg-4">Hijau *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="hijau" name="hijau" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="biru" class="control-label col-lg-4">Biru *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="biru" name="biru" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="pink" class="control-label col-lg-4">Pink *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="pink" name="pink" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ungu" class="control-label col-lg-4">Ungu *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="ungu" name="ungu" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="merah" class="control-label col-lg-4">Merah *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="merah" name="merah" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="silver" class="control-label col-lg-4">Silver *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="silver" name="silver" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="oak" class="control-label col-lg-4">Oak *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="oak" name="oak" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="walnut" class="control-label col-lg-4">Walnut *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="walnut" name="walnut" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gold" class="control-label col-lg-4">Gold *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="gold" name="gold" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cfbeen" class="control-label col-lg-4">CF Been *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="cfbeen" name="cfbeen" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="honay" class="control-label col-lg-4">Honay *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="honay" name="honay" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kuning" class="control-label col-lg-4">Kuning *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="kuning" name="kuning" type="text" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>po/tambah">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->

						<div class="row">
                            <div class="col-sm-12">
                            	<div>
                        			<?php $sukses=$this->session->flashdata('sukses');if(!empty($sukses)){ ?>
                        			<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    	<?php echo $sukses; ?>
                                    </div>
                        			<?php } ?>

                        			<?php $gagal=$this->session->flashdata('gagal');if(!empty($gagal)){ ?>
                        			<div class="alert alert-danger alert-dismissable">
                                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $gagal; ?>
                                    </div>
                                    <?php } ?>
                        		</div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    	<b>
                                    	<div class="pull-left">
                                    		Faktur : <?php echo $faktur; ?>
                                    	</div>
                                    	<div class="pull-right">
                                    		<a href="<?php echo base_url() ?>po/selesaiitempo/<?php echo $this->encryption->encode($faktur); ?>" class="btn btn-sm btn-success">Selesai <i class="fa fa-check"></i></a>
                                    	</div>
                                    	</b>
                                    	<div>&nbsp;</div>
                                    	<div>&nbsp;</div>
                                        <table id="datatable-responsive" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item</th>
                                                    <th>Putih</th>
                                                    <th>Hitam</th>
                                                    <th>Coklat</th>
                                                    <th>Hijau</th>
                                                    <th>Biru</th>
                                                    <th>Pink</th>
                                                    <th>Ungu</th>
                                                    <th>Merah</th>
                                                    <th>Silver</th>
                                                    <th>Oak</th>
                                                    <th>Walnut</th>
                                                    <th>Gold</th>
                                                    <th>CF Been</th>
                                                    <th>Honay</th>
                                                    <th>Kuning</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>


                                            <tbody style="font-size:11px;">
                                            	<?php $no=1;foreach ($dataitempo->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->namaitem; ?> / <?php echo $row->ukuran; ?></td>
                                                    <td><?php echo $row->putih; ?></td>
                                                    <td><?php echo $row->hitam; ?></td>
                                                    <td><?php echo $row->coklat; ?></td>
                                                    <td><?php echo $row->hijau; ?></td>
                                                    <td><?php echo $row->biru; ?></td>
                                                    <td><?php echo $row->pink; ?></td>
                                                    <td><?php echo $row->ungu; ?></td>
                                                    <td><?php echo $row->merah; ?></td>
                                                    <td><?php echo $row->silver; ?></td>
                                                    <td><?php echo $row->oak; ?></td>
                                                    <td><?php echo $row->walnut; ?></td>
                                                    <td><?php echo $row->gold; ?></td>
                                                    <td><?php echo $row->cfbeen; ?></td>
                                                    <td><?php echo $row->honay; ?></td>
                                                    <td><?php echo $row->kuning; ?></td>
                                                    <td>
                                                    	<a href="<?php echo base_url() ?>po/editpo/<?php $id=$row->detailpoid; echo $this->encryption->encode($id); ?>" class="label label-warning">Edit</a>
                                                    	<a href="<?php echo base_url() ?>po/deletepo/<?php $di=$row->detailpoid;echo $this->encryption->encode($di); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus item ini');">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->