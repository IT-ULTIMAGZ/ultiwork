<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js/jquery.autocomplete.css' rel='stylesheet' />
    <script type="text/javascript">
        $(function () {
            $("#kategori").autocomplete({    //id kode sebagai key autocomplete yang akan dibawa ke source url
                serviceUrl:'<?php echo base_url() ?>penjualan/tampil_data_ish',   //nama source kita ambil langsung memangil fungsi get_allkota
                onSelect: function (suggestion) {
                    $('#sizes').val(''+suggestion.sizes);
                    $('#hargaperkg').val(''+suggestion.harga);
                    $('#items').val(''+suggestion.items);
                    $('#nilai').val(''+suggestion.nilai);
                    $('#pembelian').val(''+suggestion.pembelian);
                   /* document.getElementById("jumlah_penjualan").value = "";
                    document.getElementById("total_size").value = "";
                    document.getElementById("harga_beli").value = "";*/
                }
            });
        });
    </script>
</head>
<body>
<?php 
    $pertama = "0,1";
    $kedua = "1,3";
    $a = str_replace(",",".","$pertama");
    $b = str_replace(",",".","$kedua");

    echo $c = $a+$b;
 ?>
<form method="post">
<div class="form-group">
                                                    <label for="firstname" class="control-label col-lg-2">Item</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="kategori" name="akategori" type="text">
                                                        <input type="text" name="items" id="items" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label col-lg-2">Kode Barang</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="pembelian" name="pembelian" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname" class="control-label col-lg-2">Size (Kg)</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="sizes" name="sizes" type="text" readonly>
                                                    </div>
                                                    <div class="col-lg-1"><h4>Kg</h4></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Jumlah *</label>
                                                    <div class="col-lg-10">
                                                    <input type="text" name="nilai" id="nilai">
                                                        <input class="form-control" id="jumlah_penjualan" name="jumlah_penjualan" type="text" onchange="sumTotal()">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Total Size</label>
                                                    <div class="col-lg-2">
                                                        <input class="form-control" id="total_size" name="total_size" type="text" readonly>
                                                    </div>
                                                    <div class="col-lg-1"><h4>Kg</h4></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Harga Beli</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="hargaperkg" name="hargaperkg" type="text" readonly>
                                                        <input class="form-control" id="harga_beli" name="harga_beli" type="text" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="control-label col-lg-2">Harga Jual *</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="harga_jual" name="harga_jual" type="text" onchange="sumProfit()">
                                                    </div>
                                                </div>
</form>                                            
</body>
</html>