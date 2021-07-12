        <script>
            var resizefunc = [];
        </script>

        <?php if(!empty($tambahitem)){ ?>
        <script type="text/javascript">
            document.getElementById('total_kg').readOnly = true;
            document.getElementById('kode').readOnly = true;

            function mus(){
                var a = $('#opsikodeoto').val();
                if(a == "manual"){
                    document.getElementById("kode").value = "";
                    document.getElementById('kode').readOnly = false;
                    document.getElementById('kode').focus();
                }else if(a == "auto"){
                    <?php 
                        $query = $this->db->query("SELECT max(itemid) as kode from item WHERE itemid LIKE '%DFK.%'");
                        foreach ($query->result() as $row) {
                            $nf = substr($row->kode,4,7);
                            $plus = $nf+1; 
                            $thn = date('y');
                            $bln = date('m');
                            $tgl = date('d');

                            if ($plus<10) {
                                $nof = "DFK.00".$plus;
                    ?>
                    document.getElementById("kode").value = "<?php echo $nof; ?>";
                    <?php
                            }
                            elseif ($plus<=99) {
                                $nof = "DFK.0".$plus;
                    ?>
                    document.getElementById("kode").value = "<?php echo $nof; ?>";
                    <?php
                            }
                            elseif ($plus<=999) {
                                $nof = "DFK.".$plus;
                    ?>
                    document.getElementById("kode").value = "<?php echo $nof; ?>";
                    <?php
                            }
                        }
                    ?>
                    document.getElementById('kode').readOnly = true;
                    document.getElementById('kategori').focus();
                }
            }
        </script>
        <?php } ?>

        <?php if(!empty($opsimetode)){ ?>
        <script type="text/javascript">
            document.getElementById('jumlah_pembelian').readOnly = true;
            document.getElementById('total_size').readOnly = true;
            document.getElementById('harga_pembelian').readOnly = true;
            document.getElementById('total').readOnly = true;
            
            function metode(){
                var a = $('#opsimetode').val();
                if(a == "manual"){
                    document.getElementById('jumlah_pembelian').readOnly = false;
                    document.getElementById("jumlah_pembelian").value = "";
                    document.getElementById('harga_pembelian').readOnly = false;
                    document.getElementById("harga_pembelian").value = "";
                    document.getElementById('total').readOnly = true;
                    document.getElementById("total").value = "";
                    document.getElementById('total_size').readOnly = true;
                    document.getElementById("total_size").value = "";
                    document.getElementById('jumlah_pembelian').focus();
                }else if(a == "auto"){
                    document.getElementById('jumlah_pembelian').value = "";
                    document.getElementById('total_size').value = "";
                    document.getElementById('harga_pembelian').value = "";
                    document.getElementById('total').value = "";

                    document.getElementById('total').readOnly = false;
                    document.getElementById('jumlah_pembelian').readOnly = false;
                    document.getElementById('total_size').readOnly = false;
                    document.getElementById('harga_pembelian').readOnly = true;
                    document.getElementById('jumlah_pembelian').focus();
                }
            }
        </script>
        <?php } ?>

        <?php if(!empty($sumtotal)){ ?>
        <script type="text/javascript">
            <?php $no=1;$a=1;$b=1;$c=1;foreach ($dataterima->result() as $row) { //$a=1;$b=1;$c=1;$d=1;$e=1;$f=1; ?>
                function sumtotal<?php echo $no; ?>() {
                    var a = $('#jmlkirim<?php echo $a; ?>').val();
                    var b = $('#hargajual<?php echo $b; ?>').val();

                    var c = parseInt(a) * parseInt(b);

                    terimabarangForm.total<?php echo $c; ?>.value = c;
                }
            <?php $no++;$a++;$b++;$c++;} ?>
        </script>
        <?php } ?>

        <?php if(!empty($menghitungpenjualan)){ ?>
        <script type="text/javascript">
            function sumitem() {
                if($('#putih').val() != ""){var a = $('#putih').val();}else{var a = 0;}
                if($('#hitam').val() != ""){var b = $('#hitam').val();}else{var b = 0;}
                if($('#coklat').val() != ""){var c = $('#coklat').val();}else{var c = 0;}
                if($('#hijau').val() != ""){var d = $('#hijau').val();}else{var d = 0;}
                if($('#biru').val() != ""){var e = $('#biru').val();}else{var e = 0;}
                
                if($('#pink').val() != ""){var f = $('#pink').val();}else{var f = 0;}
                if($('#ungu').val() != ""){var g = $('#ungu').val();}else{var g = 0;}
                if($('#merah').val() != ""){var h = $('#merah').val();}else{var h = 0;}
                if($('#silver').val() != ""){var i = $('#silver').val();}else{var i = 0;}
                if($('#oak').val() != ""){var j = $('#oak').val();}else{var j = 0;}

                if($('#walnut').val() != ""){var k = $('#walnut').val();}else{var k = 0;}
                if($('#gold').val() != ""){var l = $('#gold').val();}else{var l = 0;}
                if($('#cfbeen').val() != ""){var m = $('#cfbeen').val();}else{var m = 0;}
                if($('#honay').val() != ""){var n = $('#honay').val();}else{var n = 0;}
                if($('#kuning').val() != ""){var o = $('#kuning').val();}else{var o = 0;}

                var tot = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j) + parseInt(k) + parseInt(l) + parseInt(m) + parseInt(n) + parseInt(o);
                detailpenjualanForm.totalitem.value = tot;

                var harga = $('#harga').val();

                var total = parseInt(harga) * parseInt(tot);
                detailpenjualanForm.totalharga.value = total;

                var nomdiskon = $('#diskon').val();

                var diskon = parseInt(total) * ( nomdiskon / 100 );
                var hargasetdiskon = parseInt(total) - parseInt(diskon);
                detailpenjualanForm.hargaakhir.value = hargasetdiskon;
            }
        </script>
        <?php } ?>
        
        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

        <?php if(!empty($autokomplit)){ ?>
        <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-1.8.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery.autocomplete.js'></script>

        <script type="text/javascript">
            $(function () {
                $("#kategori").autocomplete({    //id kode sebagai key autocomplete yang akan dibawa ke source url
                    serviceUrl:'<?php echo base_url() ?>penjualan/tampil_data_ish',   //nama source kita ambil langsung memangil fungsi get_allkota
                    onSelect: function (suggestion) {
                        $('#sizes').val(''+suggestion.sizes);
                        $('#hargaperkg').val(''+suggestion.harga);
                        $('#items').val(''+suggestion.itemsa);
                        $('#item').val(''+suggestion.itemsa);
                        $('#nilai').val(''+suggestion.nilai);
                        $('#pembelian').val(''+suggestion.pembelian);
                        /*document.getElementById("jumlah_penjualan").value = "";
                        document.getElementById("total_size").value = "";
                        document.getElementById("harga_beli").value = "";*/
                    }
                });

                $("#nopenjualan").autocomplete({    //id kode sebagai key autocomplete yang akan dibawa ke source url
                    serviceUrl:'<?php echo base_url() ?>penagihan/tampil_data_tagihan',   //nama source kita ambil langsung memangil fungsi get_allkota
                    onSelect: function (suggestion) {
                        $('#nama').val(''+suggestion.namacus);
                        $('#items').val(''+suggestion.items);
                        $('#hargabeli').val(''+suggestion.hargabeli);
                        $('#tampilsisa').val(''+suggestion.sisaygdibayar);

                        /*document.getElementById("jumlah_penjualan").value = "";
                        document.getElementById("total_size").value = "";
                        document.getElementById("harga_beli").value = "";*/
                    }
                });
            });
        </script>
        <?php } ?>

        <?php if(!empty($datatable)){ ?>
        <!-- Datatables-->
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url() ?>assets/pages/datatables.init.js"></script>

        
        <?php } ?>

        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <?php if(!empty($moris)){ ?>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.flot.init.js"></script>
        <?php } ?>

        <?php if(!empty($homey)){ ?>
        <script src="<?php echo base_url(); ?>assets/plugins/Chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/chartjs.init.js"></script>
        <?php } ?>

        <?php if(!empty($select2)){ ?>
        <script src="<?php echo base_url(); ?>assets/plugins/select2/dist/js/select2.min.js" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery(".select2").select2({
                    width: '100%'
                });
            });
        </script>
        <?php } ?>

        <?php if(!empty($sweetalert)){ ?>
        <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.sweet-alert.init.js"></script>
        <?php } ?>

        <?php if(!empty($datepicker)){ ?>
        <script>
            jQuery(document).ready(function() {
                jQuery('#date-range').datepicker({
                    orientation: 'auto right',
                    toggleActive: true,
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#date-range-2').datepicker({
                    orientation: 'auto right',
                    toggleActive: true,
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });
                
                jQuery('#tanggaldatang').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true
                });

                jQuery('#tanggalorder').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#tanggalkirim').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#tgltransaksi').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#jatuhtempo').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#tanggal2').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <?php } ?>

        <?php if(!empty($datatable)){ ?>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-responsive').DataTable();
                $('#datatable-responsive-2').DataTable();
                $('#datatable-responsive-3').DataTable();
                $('#datatable-responsive-4').DataTable();
            } );
            TableManageButtons.init();
        </script>
        
        <?php } ?>
        
        <?php if(!empty($validation)){ ?>

        <!--form validation-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

        <!--form validation init-->
        <script src="<?php echo base_url(); ?>assets/pages/form-validation-init.js"></script>
        <?php } ?>
        
    </body>
</html>