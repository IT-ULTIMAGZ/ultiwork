	<body class="fixed-left">        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?php echo base_url() ?>v1/dashboard" class="logo"><i class="md md-filter-frames"></i> <span>D'Frame </span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url(); ?>assets/images/users/<?php 
                                        $idpetugas = $this->session->userdata('petugasid');
                                        $showimage = $this->db->query("select * from petugas where petugasid='$idpetugas'");
                                        foreach($showimage->result() as $row){
                                            if($row->image != ''){ echo $row->image; }else{ if($this->session->userdata('level') == 1){ echo "avatar-4.jpg"; }elseif($this->session->userdata('level') == 2){ echo "avatar-10.jpg"; }elseif($this->session->userdata('level') == 3){ echo "avatar-7.jpg";} }
                                        } ?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>v1/profil"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="<?php echo base_url(); ?>v1/logout"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo base_url(); ?>assets/images/users/<?php 
                                        $idpetugas = $this->session->userdata('petugasid');
                                        $showimage = $this->db->query("select * from petugas where petugasid='$idpetugas'");
                                        foreach($showimage->result() as $row){
                                            if($row->image != ''){ echo $row->image; }else{ if($this->session->userdata('level') == 1){ echo "avatar-4.jpg"; }elseif($this->session->userdata('level') == 2){ echo "avatar-10.jpg"; }elseif($this->session->userdata('level') == 3){ echo "avatar-7.jpg";} }
                                        } ?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $this->session->userdata('nama'); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>v1/profil"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="<?php echo base_url(); ?>v1/logout"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?php if($this->session->userdata('level') == 1){ echo "Master Administrator"; }elseif($this->session->userdata('level') == 2){ echo "Administrator"; }elseif($this->session->userdata('level') == 3){ echo "Guest"; } ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>v1/dashboard" class="waves-effect <?php if($active == "dashboard"){ echo "active"; } ?>"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>item" class="waves-effect <?php if($active == "item"){ echo "active"; } ?>"><i class="md md-redeem"></i><span> Item </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>po" class="waves-effect <?php if($active == "po"){ echo "active"; } ?>"><i class="md md-done-all"></i><span> PO </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "pembelian"){ echo "active"; } ?>"><i class="md md-now-widgets"></i><span> Pembelian </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>pembelian/cekpembelian">Cek Pembelian</a></li>
                                    <li><a href="<?php echo base_url() ?>pembelian">Data Pembelian</a></li>
                                    <li><a href="<?php echo base_url() ?>pembelian/rekap">Rekap Pembelian</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "penjualan"){ echo "active"; } ?>"><i class="md md-view-list"></i><span> Penjualan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>penjualan/tambah">Penjualan Baru</a></li>
                                    <li><a href="<?php echo base_url() ?>penjualan">Data Penjualan</a></li>
                                    <li><a href="<?php echo base_url() ?>penjualan/rekap">Rekap Penjualan</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "penagihan"){ echo "active"; } ?>"><i class="md md-extension"></i><span> Penagihan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>penagihan/cektagihan">Cek Penagihan</a></li>
                                    <li><a href="<?php echo base_url() ?>penagihan/rekap">Rekap Penagihan</a></li>
                                </ul>
                            </li>
                            <?php if ($this->session->userdata('level') == 1 && $this->session->userdata('petugasid') != 2) { ?>
                            <?php /*<li>
                                <a href="<?php echo base_url() ?>dashboard" class="waves-effect <?php if($active == "laporan"){ echo "active"; } ?>"><i class="md md-security"></i><span> Laporan Keuangan </span></a>
                            </li>*/ ?>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "petugas"){ echo "active"; } ?>"><i class="md md-account-child"></i><span> Petugas </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>petugas">Petugas</a></li>
                                    <li><a href="<?php echo base_url() ?>petugas/tambah">Tambah Petugas</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "customer"){ echo "active"; } ?>"><i class="md md-person-add"></i><span> Customer </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>customer">Customer</a></li>
                                    <li><a href="<?php echo base_url() ?>customer/tambah">Tambah Customer</a></li>
                                </ul>
                            </li>
                            <li>
                               <a href="<?php echo base_url() ?>v1/dashboard" class="disabled waves-effect <?php if($active == "petunjuk"){ echo "active"; } ?>"><i class="md md-assignment"></i><span> Petunjuk </span></a> 
                            </li>
                            <?php /*<!--
                            <li>
                                <a href="<?php echo base_url(); ?>supplier" class="waves-effect <?php if($active == "supplier"){ echo "active"; } ?>"><i class="md md-local-shipping"></i><span> Supplier </span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>v1/petunjuk" class="waves-effect <?php if($active == "petunjuk"){ echo "active"; } ?>"><i class="md md-assignment"></i><span> Petunjuk </span></a>
                            </li>-->
                            <li>
                                <a href="<?php echo base_url() ?>v1/visitors" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                            --> */ ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <?php $this->load->view('breadcrumb'); ?>
                        <?php $this->load->view($content); ?>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    <?php echo date('Y'); ?> © Dinanda Frame.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->