						<?php if($sudahselesai == 0){ ?>
						<script type="text/javascript">
						function getPrice(){
		                        var price_id = detailpenjualanForm.item.value;//eval(pembelianForm.kategori.value);
		                        // request to server with ajax
		                        //alert(size_id);
		                        $.get(
		                            '<?php echo base_url() ?>penjualan/tampil_dataitem',
		                            {price_id : price_id},
		                            function(data){
		                                console.log(data);
		                                $.each(data,function(idx, val){ 

		                                    var opt1 = val.harga;
		                                    detailpenjualanForm.harga.value = opt1;

                                            var opt2 = val.stok;
                                            detailpenjualanForm.stok.value = opt2;

		                                });
		                            },
		                            'json'
		                        );
		                    };
						</script>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="detailpenjualanForm" method="post" action="<?php echo base_url(); ?>penjualan/getitempenjualan">
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-2">ID Transaksi</label>
                                                    <div class="col-lg-3">
                                                        <input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='<?php echo $penjualanid; ?>' />
                                                    </div>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div class="form-group">
                                                    <label for="item" class="control-label col-lg-2">Item *</label>
                                                    <div class="col-lg-4">
                                                        <select class="select2 form-control" name="item" id="item" required="required" onchange="getPrice()">
                                                            <option value=""></option>
                                                            <?php $query=$this->db->get('item');foreach ($query->result() as $row) { ?>
                                                            <option value="<?php echo $row->itemid ?>"><?php echo $row->namaitem; echo " ".$row->ukuran; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga" class="control-label col-lg-2">Harga Item *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="harga" name="harga" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stok" class="control-label col-lg-2">Stok Item *</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="stok" name="stok" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="text-center"><b><small>inputkan jumlah item yang di beli pelanggan berdasarkan warna, jika tidak ingin pesan untuk warna tertentu, misal : "putih" isikan angka 0 . dimohon menginputkan data secara berurutan</small></b></div>
                                                    <div>&nbsp;</div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="putih" class="control-label col-lg-4">Putih *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="putih" name="putih" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hitam" class="control-label col-lg-4">Hitam *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="hitam" name="hitam" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="coklat" class="control-label col-lg-4">Coklat *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="coklat" name="coklat" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="hijau" class="control-label col-lg-4">Hijau *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="hijau" name="hijau" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="biru" class="control-label col-lg-4">Biru *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="biru" name="biru" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
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
                                                        <input class="form-control" id="pink" name="pink" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ungu" class="control-label col-lg-4">Ungu *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="ungu" name="ungu" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="merah" class="control-label col-lg-4">Merah *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="merah" name="merah" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="silver" class="control-label col-lg-4">Silver *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="silver" name="silver" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="oak" class="control-label col-lg-4">Oak *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="oak" name="oak" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
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
                                                        <input class="form-control" id="walnut" name="walnut" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gold" class="control-label col-lg-4">Gold *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="gold" name="gold" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cfbeen" class="control-label col-lg-4">CF Been *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="cfbeen" name="cfbeen" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="honay" class="control-label col-lg-4">Honay *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="honay" name="honay" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kuning" class="control-label col-lg-4">Kuning *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="kuning" name="kuning" type="text" onchange="sumitem()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                	<div class="form-group">
	                                                    <label for="totalitem" class="control-label col-lg-4">Total Item *</label>
	                                                    <div class="col-lg-8">
	                                                        <input class="form-control" id="totalitem" name="totalitem" type="text" readonly>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group">
	                                                    <label for="totalharga" class="control-label col-lg-4">Total Harga *</label>
	                                                    <div class="col-lg-8">
	                                                        <input class="form-control" id="totalharga" name="totalharga" type="text" readonly>
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                	<div class="form-group">
	                                                    <label for="totalitem" class="control-label col-lg-4">Diskon (%)</label>
	                                                    <div class="col-lg-2">
	                                                        <input class='form-control' type='text' name='diskon' id='diskon' readonly='readonly' value='<?php echo $diskon; ?>' />
	                                                    </div>
	                                                </div>
	                                                <div class="form-group">
	                                                    <label for="hargaakhir" class="control-label col-lg-4">Harga Akhir</label>
	                                                    <div class="col-lg-7">
	                                                        <input class="form-control" id="hargaakhir" name="hargaakhir" type="text" readonly>
	                                                    </div>
	                                                </div>
                                                </div>
                                                <div>&nbsp;</div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>penjualan">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->
                        <?php } ?>

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
                                    		ID Transaksi : <?php echo $penjualanid; ?>
                                    	</div>
                                    	<div class="pull-right">
                                    		<?php if($sudahselesai == 0){ ?>
                                    		<a href="<?php echo base_url() ?>penjualan/selesaiplus/<?php echo $this->encryption->encode($penjualanid); ?>" class="btn btn-sm btn-success">Selesai <i class="fa fa-check"></i></a>
                                    		<?php }else{ ?>
                                    		<a href="<?php echo base_url() ?>penjualan/urungkanplus/<?php echo $this->encryption->encode($penjualanid); ?>" class="btn btn-sm btn-pink">Urungkan <i class="fa fa-close"></i></a>
                                    		<a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>penjualan">Kembali</a>
                                    		<?php } ?>
                                    	</div>
                                    	</b>
                                    	<div>&nbsp;</div>
                                    	<div>&nbsp;</div>
                                        <table id="" class="table table-striped table-bordered"><!--datatable-responsive-->
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


                                            <tbody>
                                            	<?php $no=1;foreach ($datapenjualan->result() as $row) { ?>
                                            	<?php if($datapenjualan->num_rows() > 0){ ?>
                                                <tr>
                                                    <td align="center"><?php echo $no++; ?></td>
                                                    <td><?php echo $row->namaitem;echo " ".$row->ukuran; ?></td>
                                                    <td align="right"><?php echo $row->putih; ?></td>
                                                    <td align="right"><?php echo $row->hitam; ?></td>
                                                    <td align="right"><?php echo $row->coklat; ?></td>
                                                    <td align="right"><?php echo $row->hijau; ?></td>
                                                    <td align="right"><?php echo $row->biru; ?></td>
                                                    <td align="right"><?php echo $row->pink; ?></td>
                                                    <td align="right"><?php echo $row->ungu; ?></td>
                                                    <td align="right"><?php echo $row->merah; ?></td>
                                                    <td align="right"><?php echo $row->silver; ?></td>
                                                    <td align="right"><?php echo $row->oak; ?></td>
                                                    <td align="right"><?php echo $row->walnut; ?></td>
                                                    <td align="right"><?php echo $row->gold; ?></td>
                                                    <td align="right"><?php echo $row->cfbeen; ?></td>
                                                    <td align="right"><?php echo $row->honay; ?></td>
                                                    <td align="right"><?php echo $row->kuning; ?></td>
                                                    <td align="center">
                                                    	<a href="<?php echo base_url() ?>penjualan/deleteitempen/<?php $di=$row->detailpenjualanid;echo $this->encryption->encode($di); ?>/<?php echo $this->encryption->encode($penjualanid); ?>" class="label label-danger" onclick="return confirm('yakin ingin menghapus item ini');"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php }else{ echo "<tr><td colspan='18' align='center'><b>DATA TIDAK TERSEDIA</b></td></tr>";} ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->