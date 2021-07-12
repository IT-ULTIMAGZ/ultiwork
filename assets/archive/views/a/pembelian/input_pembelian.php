						<script type="text/javascript">
		                    function getSize(){
		                        var size_id = pembelianForm.kategori.value;//eval(pembelianForm.kategori.value);
		                        // request to server with ajax
		                        //alert(size_id);
		                        $.get(
		                            '<?php echo base_url() ?>pembelian/tampil_data_size',
		                            {size_id : size_id},
		                            function(data){
		                                console.log(data);
		                                $.each(data,function(idx, val){ 
		                                	//alert(val.paket_jml);
		                                    var opt1 = val.sizes;
		                                    pembelianForm.sizes.value = opt1;

                                            pembelianForm.kode_barang.value = size_id;

		                                });
		                            },
		                            'json'
		                        );
		                    };

		                    function sumTotal(){
		                    	var a = $('#sizes').val();
		                    	var b = $('#jumlah_pembelian').val();
		                    	var c = a*b;

		                    	pembelianForm.total_size.value = c;
		                    }

                            function totalall(){
                                var d = $('#total_size').val();
                                var e = $('#harga_pembelian').val();
                                var f = d*e;

                                pembelianForm.total.value = f;
                            }

                            function hitungperkg(){
                                var a = $('#total').val();
                                var b = $('#total_size').val();
                                var c = a / b;

                                pembelianForm.harga_pembelian.value = c;
                            }
		                </script>

                        <div class="row">
                        
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="pembelianForm" name="pembelianForm" method="post" action="<?php echo base_url(); ?>pembelian/getpembelian">
                                            	<div class="form-group">
                                                    <label for="firstname" class="control-label col-lg-2">ID Transaksi</label>
                                                    <div class="col-lg-5">
                                                        <input class='form-control' type='text' name='kode' id='kode'/>
                                                        <?php 
		                                                	/*$query = $this->db->query("SELECT max(kodepembelian) as kode from pembelian");
		                                                	foreach ($query->result() as $row) {
		                                                		$nf = substr($row->kode,1,5);
		                                                		$plus = $nf+1;
                                                                $thn = date('Y');
                                                                $bln = date('m');

		                                                		if ($plus<10) {
		                                                			$nof = "S000".$plus."K".$bln."D".$thn;
		                                                			echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";
		                                                		}
		                                                		elseif ($plus<=99) {
		                                                			$nof = "S00".$plus."K".$bln."D".$thn;
		                                                			echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
		                                                		}
		                                                		elseif ($plus<=999) {
		                                                			$nof = "S0".$plus."K".$bln."D".$thn;
		                                                			echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
		                                                		}elseif ($plus<=9990) {
		                                                			$nof = "S".$plus."K".$bln."D".$thn;
		                                                			echo "<input class='form-control' type='text' name='kode' id='kode' readonly='readonly' value='$nof' />";    
		                                                		}
		                                                	}*/
		                                                ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="control-label col-lg-2">Item *</label>
                                                    <div class="col-lg-6">
                                                        <select class="select2 form-control" name="kategori" id="kategori" onchange="getSize()">
                                                            <option value=""></option>
                                                            <?php $qItem=$this->db->get('item');foreach ($qItem->result() as $row) { ?>
                                                            <option value="<?php echo $row->itemid ?>"><?php echo $row->category; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label col-lg-2">Kode Barang</label>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" id="kode_barang" name="kode_barang" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label col-lg-2">Size (Kg)*</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="sizes" name="sizes" type="text" readonly onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                    <div class="col-lg-1"><h4>Kg</h4></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode" class="control-label col-lg-2"><small>Pilih Metode Pembelian</small></label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control" name="opsimetode" id="opsimetode" onchange="metode()">
                                                            <option></option>
                                                            <option value="manual">Input Harga/Kg Manual</option>
                                                            <option value="auto">Input Harga/Kg Otomatis</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Jumlah *</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="jumlah_pembelian" name="jumlah_pembelian" type="text" onchange="sumTotal()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Total Size (Kg) *</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="total_size" name="total_size" type="text" readonly>
                                                    </div>
                                                    <div class="col-lg-1"><h4>Kg</h4></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Harga/Kg *</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="harga_pembelian" name="harga_pembelian" type="text" onchange="totalall()" onkeypress="var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode >= 48 && charCode <= 57)
                || charCode == 46)
                return true;
            return false;">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Total</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="total" name="total" type="text" readonly onchange="hitungperkg()">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Simpan</button>
                                                        <a class="btn btn-default waves-effect" href="<?php echo base_url(); ?>pembelian">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->

                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->