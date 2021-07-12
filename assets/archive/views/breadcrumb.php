        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title"><?php echo $judul_halaman; ?></h4>
                <ol class="breadcrumb pull-right">
                    <li>
                            <a href="<?php if(!empty($link_judul)){echo base_url();echo $link_judul; }else{ echo "";} ?>">
                                <?php echo $judul; ?>
                            </a>
                        </li>
                    <?php if($sub_judul1){ ?>
                        <li class="active">
                            <a href="<?php if(!empty($link_sub_judul1)){echo base_url();echo $link_sub_judul1; }else{ echo "";} ?>">
                                <?php echo $sub_judul1; ?>
                            </a>
                        </li>
                    <?php }; ?>
                    <?php if($sub_judul2){ ?>
                        <li class="active">
                            <a href="<?php if(!empty($link_sub_judul2)){echo base_url();echo $link_sub_judul2; }else{ echo "";} ?>">
                                <?php echo $sub_judul2; ?>
                            </a>
                        </li>
                    <?php }; ?>
                    <?php if($sub_judul3){ ?>
                        <li class="active">
                            <a href="<?php if(!empty($link_sub_judul3)){echo base_url();echo $link_sub_judul3; }else{ echo "";} ?>">
                                <?php echo $sub_judul3; ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($sub_judul4){ ?>
                        <li class="active">
                            <a href="<?php if(!empty($link_sub_judul4)){echo base_url();echo $link_sub_judul4; }else{ echo "";} ?>">
                                <?php echo $sub_judul4; ?>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($sub_judul5){ ?>
                        <li class="active">
                            <a href="<?php if(!empty($link_sub_judul5)){echo base_url();echo $link_sub_judul5; }else{ echo "";} ?>">
                                <?php echo $sub_judul5; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ol>
            </div>
        </div>