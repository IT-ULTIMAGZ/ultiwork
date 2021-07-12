                        
                        <!-- Start Widget -->

                        <!--Widget-4 -->
                        <?php /*<div class="row">

                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="<?php echo base_url() ?>penjualan">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php foreach ($getpenjualan->result() as $row) { echo $row->penjualan; } ?></span>
                                        Penjualan
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">&nbsp;</h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="<?php echo base_url() ?>pembelian">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php foreach ($getpembelian->result() as $row) { echo $row->pembelian; } ?></span>
                                        Pembelian
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">&nbsp;</h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="<?php echo base_url() ?>petugas">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php foreach ($getuser->result() as $row) { echo $row->users; } ?></span>
                                        Users
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">&nbsp;</h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-3">
                                <a href="<?php echo base_url() ?>item">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-eye"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php foreach ($getitem->result() as $row) { echo $row->items; } ?></span>
                                        Items
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">&nbsp;</h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div> <!-- End row--> */ ?>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-body hidden-xs">
                                        <div class="row">
                                            <dl class="row-fluid">
                                                <div class="col-md-3">
                                                    <p><h3>Laporan Harian</h3></p>
                                                </div>      
                                            </dl>
                                            <dd class="row">&nbsp;</dd>
                                            <dd class="row">
                                                <p>
                                                <h4>
                                                    <span class="col-md-3">Jumlah Barang Masuk</span>
                                                    <span class="col-md-1"> : </span>
                                                    <span class="col-md-3"><?php foreach ($sumdaymasuk->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($sumdaymasuk->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'pembelian/rekapday"';echo 'target="_BLANK"'; } } ?>>+ Cetak</a></span>
                                                </h4>
                                                </p>
                                            </dd>
                                            <dd class="row">
                                                <p>
                                                <h4>
                                                    <span class="col-md-3">Total Penjualan</span>
                                                    <span class="col-md-1"> : </span>
                                                    <span class="col-md-3"><?php foreach ($sumdaykeluar->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($sumdaykeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapday"';echo 'target="_BLANK"'; } } ?>>+ Cetak</a></span>
                                                </h4>
                                                </p>
                                            </dd>
                                            <dd class="row">
                                                <p>
                                                <h4>
                                                    <span class="col-md-3">Profit</span>
                                                    <span class="col-md-1"> : </span>
                                                    <span class="col-md-3"><b><?php foreach ($sumprofit->result() as $row) { echo "Rp. ".number_format($row->hitung,0,'.',','); } ?></b></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($sumdaykeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapday"';echo 'target="_BLANK"'; } } ?>>+ Cetak</a></span>
                                                </h4>
                                                </p>
                                            </dd>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row">
                                            <dl class="row-fluid">
                                                <div class="col-md-3">
                                                    <p><h3>Laporan Bulanan</h3></p>
                                                </div>
                                                <form method="get" action="<?php echo base_url() ?>v1/getrekapmonth" target="_BLANK">
                                                <div class="input-daterange input-group col-sm-6" id="date-range">
                                                    <span class="input-group-addon bg-primary b-0 text-white">Tanggal</span>
                                                    <input type="text" class="form-control" name="start" value="<?php echo date('Y-m-d'); ?>" />
                                                    <span class="input-group-addon bg-primary b-0 text-white">S/D</span>
                                                    <input type="text" class="form-control" name="end" value="<?php echo date('Y-m-d'); ?>" />
                                                    <span class="input-group-addon"></span>
                                                    <button type="submit" class="form-control btn btn-success btn-small col-sm-1">Go</button>
                                                </div>
                                                </form>
                                            </dl>
                                            <dd class="row">&nbsp;</dd>
                                            <dd class="row">
                                                <p>
                                                <h4>
                                                    <span class="col-md-3">Jumlah Barang Masuk</span>
                                                    <span class="col-md-1"> : </span>
                                                    <span class="col-md-3"><?php foreach ($summonthmasuk->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($summonthmasuk->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'pembelian/rekapmonth"';echo 'target="_BLANK"'; } } ?>>+ Cetak</a></span>
                                                </h4>
                                                </p>
                                            </dd>
                                            <dd class="row">
                                                <p>
                                                <h4>
                                                    <span class="col-md-3">Total Penjualan</span>
                                                    <span class="col-md-1"> : </span>
                                                    <span class="col-md-3"><?php foreach ($summonthkeluar->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($summonthkeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapmonth"';echo 'target="_BLANK"'; } } ?>>+ Cetak</a></span>
                                                </h4>
                                                </p>
                                            </dd>
                                            <dd class="row">
                                                <p>
                                                <h4>
                                                    <span class="col-md-3">Profit</span>
                                                    <span class="col-md-1"> : </span>
                                                    <span class="col-md-3"><b><?php foreach ($sumprofitmonth->result() as $row) { echo "Rp. ".number_format($row->hitung,0,'.',','); } ?></b></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($summonthkeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapmonth"';echo 'target="_BLANK"'; } } ?>>+ Cetak</a></span>
                                                </h4>
                                                </p>
                                            </dd>
                                        </div>
                                    </div>

                                    <div class="panel-body hidden-sm hidden-md hidden-lg">
                                        <div class="row-fluid">
                                            <div class="container">
                                                <dl><h3>Laporan Harian</h3></dl>

                                                <dd class="row">
                                                    <p><h4><b>Jumlah Barang Masuk</b></h4></p>
                                                    <span class="col-md-3"><?php foreach ($sumdaymasuk->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($sumdaymasuk->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'pembelian/rekapday"';echo 'target="_BLANK"'; } } ?> class="btn btn-inverse btn-sm">+ Cetak</a></span>
                                                </dd>
                                                <dd class="row">
                                                    <p><h4><b>Total Penjualan</b></h4></p>
                                                    <span class="col-md-3"><?php foreach ($sumdaykeluar->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($sumdaykeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapday"';echo 'target="_BLANK"'; } } ?> class="btn btn-inverse btn-sm">+ Cetak</a></span>
                                                </dd>
                                                <dd class="row">
                                                    <p><h4><b>Profit</b></h4></p>
                                                    <span class="col-md-3"><b><?php foreach ($sumprofit->result() as $row) { echo "Rp. ".number_format($row->hitung,0,'.',','); } ?></b></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($sumdaykeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapday"';echo 'target="_BLANK"'; } } ?> class="btn btn-inverse btn-sm">+ Cetak</a></span>
                                                </dd>
                                            </div>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                        <div class="row-fluid">
                                            <div class="container">
                                                <center>
                                                <form method="get" action="<?php echo base_url() ?>v1/getrekapmonth" target="_BLANK">
                                                <dd class="row col-md-12">
                                                    <p><h3><b>Laporan Bulanan</b></h3></p>
                                                    <div class="input-daterange input-group" id="date-range-2">
                                                    <p><input type="text" class="form-control" name="start" value="<?php echo date('Y-m-d'); ?>" /></p>
                                                    <p>Sampai</p>
                                                    <p><input type="text" class="form-control" name="end" value="<?php echo date('Y-m-d'); ?>" /></p>
                                                    <p><button type="submit" class="form-control btn btn-primary btn-sm">Go</button></p>
                                                    </div>
                                                </dd>
                                                </form>
                                                </center>
                                                <dd class="row">&nbsp;</dd>
                                                <dd class="row">
                                                    <p><h4><b>Jumlah Barang Masuk</b></h4></p>
                                                    <span class="col-md-3"><?php foreach ($summonthmasuk->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($summonthmasuk->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'pembelian/rekapmonth"';echo 'target="_BLANK"'; } } ?> class="btn btn-inverse btn-sm">+ Cetak</a></span>
                                                </dd>
                                                <dd class="row">
                                                    <p><h4><b>Total Penjualan</b></h4></p>
                                                    <span class="col-md-3"><?php foreach ($summonthkeluar->result() as $row) { echo $row->hitung; } ?></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($summonthkeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapmonth"';echo 'target="_BLANK"'; } } ?> class="btn btn-inverse btn-sm">+ Cetak</a></span>
                                                </dd>
                                                <dd class="row">
                                                    <p><h4><b>Profit</b></h4></p>
                                                    <span class="col-md-3"><b><?php foreach ($sumprofit->result() as $row) { echo "Rp. ".number_format($row->hitung,0,'.',','); } ?></b></span>
                                                    <span class="col-md-2"><a href=<?php foreach ($summonthkeluar->result() as $row) { if($row->hitung == 0){ echo ""; }else{ echo '"'; echo base_url().'penjualan/rekapmonth"';echo 'target="_BLANK"'; } } ?> class="btn btn-inverse btn-sm">+ Cetak</a></span>
                                                </dd>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
                                        <?php 
                                        //Array Bulan
                                        //$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
                                        //$bulan = $array_bulan[date("n")];
                                        ?>
                                        <h3 class="panel-title">Chart Penjualan Dan Pembelian Bulan <?php //echo $bulan; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <a href="#" id="sa-option" class="col-md-12">
                                        <canvas id="lineChart" data-type="Line" width="520" height="300"></canvas>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>-->