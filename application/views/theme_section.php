	<body class="fixed-left">        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?php echo base_url() ?>main/home" class="logo"><i class="md md-event" style="color:white"></i> <span>ULTIWORK</span></a>
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
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                        <img src="<?php echo base_url(); ?>assets/images/users/<?php 
                                        
                                             if($this->session->userdata('level') == 1){ echo "avatar-1.jpg"; }else if($this->session->userdata('level') == 2){ echo "avatar-2.jpg"; }else if($this->session->userdata('level') == 3){ echo "avatar-3.jpg";}else if($this->session->userdata('level') == 4){ echo "avatar-4.jpg";}else if($this->session->userdata('level') == 5){ echo "avatar-5.jpg";}else if($this->session->userdata('level') == 6){ echo "avatar-6.jpg";} else if($this->session->userdata('level') == 7){ echo "avatar-8.jpg";}
                                         ?>" alt="user-img" class="img-circle">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>main/profil"><i class="md md-face-unlock"></i> Profil</a></li>
                                        <li><a href="<?php echo base_url(); ?>main/logout"><i class="md md-settings-power"></i> Keluar</a></li>
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
                                        
                                             if($this->session->userdata('level') == 1){ echo "avatar-1.jpg"; }else if($this->session->userdata('level') == 2){ echo "avatar-2.jpg"; }else if($this->session->userdata('level') == 3){ echo "avatar-3.jpg";}else if($this->session->userdata('level') == 4){ echo "avatar-4.jpg";}else if($this->session->userdata('level') == 5){ echo "avatar-5.jpg";}else if($this->session->userdata('level') == 6){ echo "avatar-6.jpg";} else if($this->session->userdata('level') == 7){ echo "avatar-8.jpg";}
                                         ?>" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $this->session->userdata('nama'); ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url(); ?>main/profil"><i class="md md-face-unlock"></i> Profil<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="<?php echo base_url(); ?>main/logout"><i class="md md-settings-power"></i> Keluar</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?php if($this->session->userdata('level') == 7){echo"Administrator";}else if($this->session->userdata('level') == 6){ echo "BPH"; }else if($this->session->userdata('level') == 5){ echo "Perusahaan"; }else if($this->session->userdata('level') == 4){ echo "Web & IT"; }else if($this->session->userdata('level') == 3){ echo "Visual"; }else if($this->session->userdata('level') == 2){ echo "Fotografer"; }else if($this->session->userdata('level') == 1){ echo "Redaksi"; } echo " ";if($this->session->userdata('as')=='Kadiv'){echo"Pemimpin";}else{echo$this->session->userdata('as');} ?>
                            </p>
                        </div>
                    </div>
                    <!--- Divider -->

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url() ?>main/home" class="waves-effect <?php if($active == "home"){ echo "active"; } ?>"><i class="md md-home"></i><span> Beranda </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "pekerjaan"){ echo "active"; } ?>"><i class="md md md-view-list"></i><span> Pekerjaan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>pekerjaan/progress">Lihat Progress Pekerjaan</a></li>
                                    <li><a href="<?php echo base_url() ?>pekerjaan">Lihat Pekerjaan (pending)</a></li>
                                    <?php if ($this->session->userdata('level') > 4){ ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/lihat_pekerjaan_pr">Lihat Pekerjaan PR</a></li>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('as') != "Anggota") { ?>
                                    <?php if ($this->session->userdata('level') == 5 || $this->session->userdata('level') == 7){ ?>
                                    <?php if ($this->session->userdata('level') == 5){ ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan">Buat Pekerjaan RnB</a></li>
                                    <?php }else{ ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan">Buat Pekerjaan</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan/PR">Buat Pekerjaan PR</a></li>
                                    <?php }else if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 7){ ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan">Buat Pekerjaan</a></li>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan/REDPEL">Buat Pekerjaan REDPEL</a></li>
                                    <?php }else{ ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan">Buat Pekerjaan</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/tunjuk_anggota">Tunjuk Anggota</a></li>
                                    <?php } ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/histori_pekerjaan">Histori Pekerjaan</a></li>
                                    <?php if(($this->session->userdata('level') == 6 && ($this->session->userdata('as')=='Kadiv')||$this->session->userdata('as')=='Wakil') || $this->session->userdata('level') == 7){ ?>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/histori_pekerjaan_divisi">Histori Pekerjaan Divisi</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php if ($this->session->userdata('as') != "Anggota") { ?>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "ticket"){ echo "active"; } ?>"><i class="md md md-view-list"></i><span> Ticket Pekerjaan </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url() ?>pekerjaan/buat_pekerjaan/TICKET">Buat Ticket Baru</a></li>
                                    <li><a href="<?php echo base_url() ?>pekerjaan/lihat_ticket">Lihat Ticket</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if ($this->session->userdata('as') != "Anggota") { ?>
                            <li class="has_sub">
                                <a href="#" class="waves-effect <?php if($active == "pengguna" || $active == "level_pengguna"){ echo "active"; } ?>"><i class="md md-account-child"></i><span> Menu 
                                    <?php if($this->session->userdata('level') != 7){echo"Anggota";}else{echo"Pengguna";} ?>
                                 </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    
                                    <?php if($this->session->userdata('level') != 7){ ?>
                                    <li><a href="<?php echo base_url() ?>pengguna">Anggota</a></li>
                                    <li><a href="<?php echo base_url() ?>pengguna/tambah">Tambah Anggota Baru</a></li>
                                    <?php } ?>
                                    <?php if($this->session->userdata('level') == 7){ ?>
                                    <li><a href="<?php echo base_url() ?>pengguna">Pengguna</a></li>
                                    <li><a href="<?php echo base_url() ?>pengguna/tambah">Tambah Pengguna</a></li>
                                    <li><a href="<?php echo base_url() ?>pengguna/level">Pengguna Level</a></li>
                                    <li><a href="<?php echo base_url() ?>pengguna/history_ganti_password">Histori Ganti Password</a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
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
                    <div class="row">
                        <div class="col-md-9">
                            <?php echo date('Y'); ?> © ULTIWORK
                        </div>
                        <div class="col-md-3">
                            Developed by WEB&IT Ultimagz
                        </div>
                    </div>
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->