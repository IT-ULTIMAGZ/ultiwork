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


        <?php if(!empty($select23)){ ?>
            <script type="text/javascript">
                // kelas, thn ajaran, semester
                //kecamatan, kelurahan, tps

                $(document).ready(function(){
                    $('#kecamatan').change(function(){
                        // get province's value
                        var kecamatan_id = $('#kecamatan').val();
                        // request to server with ajax
                        $.get( 
                            '<?php echo site_url() ?>dpthp/tampil_kelurahan',
                            {kecamatan_id : kecamatan_id},
                            function(data){
                                console.log(data);
                                $('#kelurahan').html("<option value=''>Pilih Kelurahan</option>");
                                $.each(data,function(idx, val){
                                    var opt = "<option value='"+ val.kelurahan + "'>"+ val.kelurahan + "</option>";
                                    $('#kelurahan').append(opt);
                                });
                            },
                            'json'
                        );
                    });
                    
                    $('#kelurahan').change(function(){
                        // get province's value
                        var kelurahan_id = $('#kelurahan').val();
                        var kecamatan_id = $('#kecamatan').val();
                        // request to server with ajax
                        $.get(
                            '<?php echo site_url() ?>dpthp/tampil_tps',
                            {kelurahan_id : kelurahan_id,kecamatan_id : kecamatan_id},
                            function(data){
                                console.log(data);
                                $('#tps').html("<option value=''>Pilih TPS</option>");
                                $.each(data,function(idx, val){
                                    var opt = "<option value='"+ val.tps + "'>"+ val.tps + "</option>";
                                    $('#tps').append(opt);
                                });
                            },
                            'json'
                        );
                    });
                });


                $(document).ready(function(){

                        document.getElementById('kelurahan').readOnly = true;
                        document.getElementById('tps').readOnly = true;
                        $('#kecamatan').change(function(){
                                if($('#kecamatan').val() == "")
                                {
                                    document.getElementById('kelurahan').readOnly = true;
                                    document.getElementById('tps').readOnly = true;
                                }else{
                                    document.getElementById('kelurahan').readOnly = false;
                                    document.getElementById('tps').readOnly = true;
                                }
                        });
                        $('#kelurahan').change(function(){
                                if($('#kelurahan').val() == "")
                                {
                                    document.getElementById('tps').readOnly = true;
                                }else{
                                    document.getElementById('tps').readOnly = false;
                                }
                        });
                });

            </script>
        <?php } ?>

        <?php if(!empty($switchtoggle)){ ?>
        <script type="text/javascript">
                $('#visited').on('click', function(){
                    alert($(this).attr('value'));
                });
                $(document).ready(function(){
                    function aa(){
                    $('#visited').on('click', function() {
                        alert($(this).attr('value'))
                        var checkStatus = this.checked ? 'ON' : 'OFF';
                         alert(checkStatus);
                        $.post("<?php echo site_url() ?>dpthp/tampil_kelurahan", {"mode": checkStatus}, 
                        function(data) {
                            $('#heading').html(data);
                        });
                    });
                    }

                    /*$('#visited').change(function(){
                        alert('aaa');
                        // get province's value
                        var aa = document.getElementById('visited').value;
                        var visited_id = $('#visited').val();
                        // request to server with ajax
                        $.get( 
                            '<?php echo site_url() ?>dpthp/tampil_kelurahan',
                            {visited_id : visited_id},
                            function(data){
                                console.log(data);
                                $('#kelurahan').html("<option value=''>Pilih Kelurahan</option>");
                                $.each(data,function(idx, val){
                                    var opt = "<option value='"+ val.kelurahan + "'>"+ val.kelurahan + "</option>";
                                    $('#kelurahan').append(opt);
                                });
                            },
                            'json'
                        );
                    });

                    $('#milih').change(function(){
                        // get province's value
                        var milih_id = $('#milih').val();
                        // request to server with ajax
                        $.get( 
                            '<?php echo site_url() ?>dpthp/tampil_kelurahan',
                            {milih_id : milih_id},
                            function(data){
                                console.log(data);
                                $('#kelurahan').html("<option value=''>Pilih Kelurahan</option>");
                                $.each(data,function(idx, val){
                                    var opt = "<option value='"+ val.kelurahan + "'>"+ val.kelurahan + "</option>";
                                    $('#kelurahan').append(opt);
                                });
                            },
                            'json'
                        );
                    });*/

                });
            </script>
        <?php } ?>


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
            jQuery(document).ready(function() {
                jQuery(".select3").select2({
                    width: '100%'
                });
            });
            jQuery(document).ready(function() {
                jQuery(".select4").select2({
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

                jQuery('#tanggallahir').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#tanggaltagihan').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#tanggalbayar').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });

                jQuery('#sejak').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                    orientation: "top"
                });

                jQuery('#sampai').datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
                    orientation: "top"
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
                $('#datatable-responsive-2').DataTable({
                    responsive: true
                });
                $('#datatable-responsive-3').DataTable({
                    responsive: true
                });
                $('#datatable-responsive-4').DataTable({
                    responsive: true
                });
                $('#datatable-responsive-5').DataTable({
                    responsive: true
                });
                $('#datatable-responsive-6').DataTable({
                    responsive: true
                });
                $('#datatable-buttons-1').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'pageLength', 
        { extend:'csv',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_provinsi_yg_sudah_input-kode'}, 
        { extend:'excel',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_provinsi_yg_sudah_input-kode'}, 
        { extend:'print',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_provinsi_yg_sudah_input-kode'}
    ]
});
                $('#datatable-buttons-2').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'pageLength', 
        { extend:'csv',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_provinsi_yg_belum_input-kode'}, 
        { extend:'excel',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_provinsi_yg_belum_input-kode'}, 
        { extend:'print',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_provinsi_yg_belum_input-kode'}
    ]
});
                $('#datatable-buttons-3').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'pageLength', 
        { extend:'csv',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_kabkota_yg_sudah_input-kode'}, 
        { extend:'excel',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_kabkota_yg_sudah_input-kode'}, 
        { extend:'print',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_kabkota_yg_sudah_input-kode'}
    ]
});
                $('#datatable-buttons-4').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'pageLength', 
        { extend:'csv',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_kabkota_yg_belum_input-kode'}, 
        { extend:'excel',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_kabkota_yg_belum_input-kode'}, 
        { extend:'print',title:'<?php echo date('ymd-hi') ?>-bawaslu-daftar_pengawas_kabkota_yg_belum_input-kode'}
    ]
});
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

        <?php if(!empty($grafik)){ ?>
        <!-- Chart JS -->
        <!--<script src="<?php echo base_url(); ?>assets/assets/plugins/Chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/pages/chartjs.init.js"></script>-->

        <!--Morris Chart-->
        <script src="<?php echo base_url(); ?>assets/plugins/morris.js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael-min.js"></script>

        <?php if(!empty($grafiktim)){ ?>
        <script type="text/javascript">
            !function($) {
                "use strict";

                var MorrisCharts = function() {};

                //creates Bar chart
                MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
                    Morris.Bar({
                        element: element,
                        data: data,
                        xkey: xkey,
                        ykeys: ykeys,
                        labels: labels,
                        gridLineColor: '#eef0f2',
                        barColors: lineColors,
                        resize: true,
                        redraw: true
                    });
                },
                MorrisCharts.prototype.init = function() {

                    //creating bar chart
                    var $barData  = [
                        <?php 
                            $countno = 1;
                            foreach ($datadpthp->result() as $rowTPS){
                                $sDataTPS = $this->model_security->countTPS($rowTPS->tps);
                                if($countno < $count_tps){
                                    echo '{ y: "TPS '.$rowTPS->tps.'", a: '.$sDataTPS['tps3'].', b: '.$sDataTPS['tps2'].', c: '.$sDataTPS['tps1'].' },';
                                }else{
                                    echo '{ y: "TPS '.$rowTPS->tps.'", a: '.$sDataTPS['tps3'].', b: '.$sDataTPS['tps2'].', c: '.$sDataTPS['tps1'].' }';
                                }
                                $countno++;
                            }
                        ?>
                    ];
                    this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b','c'], ['DPT', 'Memilih','Telah Dikunjungi'], ['#317eeb', '#FF0000', '#00ff00']);
                },
                //init
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.MorrisCharts.init();
            }(window.jQuery);
        </script>
        <?php }else if(!empty($grafiktps)){ ?>
        <script type="text/javascript">
            !function($) {
                "use strict";

                var MorrisCharts = function() {};

                //creates Bar chart
                MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
                    Morris.Bar({
                        element: element,
                        data: data,
                        xkey: xkey,
                        ykeys: ykeys,
                        labels: labels,
                        gridLineColor: '#eef0f2',
                        barColors: lineColors,
                        resize: true,
                        redraw: true
                    });
                },
                MorrisCharts.prototype.init = function() {

                    //creating bar chart
                    var $barData  = [
                        <?php 
                            $countno = 1;
                            foreach ($data_tps->result() as $rowTPS){
                                $sDataTPS = $this->model_security->countTPS($rowTPS->tps);
                                if($countno < $count_tps){
                                    echo '{ y: "TPS '.$rowTPS->tps.'", a: '.$sDataTPS['tps3'].', b: '.$sDataTPS['tps2'].', c: '.$sDataTPS['tps1'].' },';
                                }else{
                                    echo '{ y: "TPS '.$rowTPS->tps.'", a: '.$sDataTPS['tps3'].', b: '.$sDataTPS['tps2'].', c: '.$sDataTPS['tps1'].' }';
                                }
                                $countno++;
                            }
                        ?>
                    ];
                    this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b','c'], ['DPT', 'Memilih','Telah Dikunjungi'], ['#317eeb', '#FF0000', '#00ff00']);
                },
                //init
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.MorrisCharts.init();
            }(window.jQuery);
        </script>
        <?php }else if($grafikkelurahan){ ?>
        <script type="text/javascript">
            !function($) {
                "use strict";

                var MorrisCharts = function() {};

                //creates Bar chart
                MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
                    Morris.Bar({
                        element: element,
                        data: data,
                        xkey: xkey,
                        ykeys: ykeys,
                        labels: labels,
                        gridLineColor: '#eef0f2',
                        barColors: lineColors,
                        resize: true,
                        redraw: true
                    });
                },
                MorrisCharts.prototype.init = function() {

                    //creating bar chart
                    var $barData  = [
                        <?php 
                            $countno = 1;
                            foreach ($data_kel->result() as $rowKEL){
                                $sDataKEL = $this->model_security->countKel($rowKEL->kel);
                                if($countno < $count_kel){
                                    echo '{ y: "'.$rowKEL->kel.'", a: '.$sDataKEL['kel3'].', b: '.$sDataKEL['kel2'].', c: '.$sDataKEL['kel1'].' },';
                                }else{
                                    echo '{ y: "'.$rowKEL->kel.'", a: '.$sDataKEL['kel3'].', b: '.$sDataKEL['kel2'].', c: '.$sDataKEL['kel1'].' }';
                                }
                                $countno++;
                            }
                        ?>
                    ];
                    this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b','c'], ['DPT', 'Memilih','Telah Dikunjungi'], ['#317eeb', '#FF0000', '#00ff00']);
                },
                //init
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.MorrisCharts.init();
            }(window.jQuery);
        </script>
        <?php }else if($grafikkecamatan){ ?>
        <script type="text/javascript">
            !function($) {
                "use strict";

                var MorrisCharts = function() {};

                //creates Bar chart
                MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
                    Morris.Bar({
                        element: element,
                        data: data,
                        xkey: xkey,
                        ykeys: ykeys,
                        labels: labels,
                        gridLineColor: '#eef0f2',
                        barColors: lineColors,
                        resize: true,
                        redraw: true
                    });
                },
                MorrisCharts.prototype.init = function() {

                    //creating bar chart
                    var $barData  = [
                        <?php 
                            $countno = 1;
                            foreach ($data_kec->result() as $rowKEC){
                                $sDataKEC = $this->model_security->countKec($rowKEC->kec);
                                if($countno < $count_kec){
                                    echo '{ y: "'.$rowKEC->kec.'", a: '.$sDataKEC['kec3'].', b: '.$sDataKEC['kec2'].', c: '.$sDataKEC['kec1'].' },';
                                }else{
                                    echo '{ y: "'.$rowKEC->kec.'", a: '.$sDataKEC['kec3'].', b: '.$sDataKEC['kec2'].', c: '.$sDataKEC['kec1'].' }';
                                }
                                $countno++;
                            }
                        ?>
                    ];
                    this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b','c'], ['DPT', 'Memilih','Telah Dikunjungi'], ['#317eeb', '#FF0000', '#00ff00']);
                },
                //init
                $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
            }(window.jQuery),

            //initializing 
            function($) {
                "use strict";
                $.MorrisCharts.init();
            }(window.jQuery);
        </script>
        <?php } ?>
        
        <?php } ?>
        
    </body>
</html>