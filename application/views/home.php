                        <div class="row">
                        <div class="col-lg-12"> 
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Halo <?php echo $this->session->userdata('nama').", "; 

                                if(date('H:i') > "00:00" && date('H:i') < "10:00"){
                                    echo "Selamat Pagi";
                                }else if(date('H:i') > "10:01" && date('H:i') < "15:00"){
                                    echo "Selamat Siang";
                                }else if(date('H:i') > "15:01" && date('H:i') < "19:00"){
                                    echo "Selamat Sore";
                                }else if(date('H:i') > "19:01" && date('H:i') < "23:59"){
                                    echo "Selamat Malam";
                                }
                                echo ". Semangat mengerjakan pekerjaan nya ya!!! :)";
                            ?>
                        </div>
                        <?php if($pending!=0 && $ongoing!=0){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->userdata('nama').", Kamu memiliki pekerjaan baru ";
                            echo "(".$pending.") dan pekerjaan yang belum selesai (".$ongoing."). yuk di selesaikan, semangat!!";
                            ?>
                        </div>
                        <?php }else if($pending==0 && $ongoing!=0){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->userdata('nama').", Kamu memiliki pekerjaan yang belum selesai (".$ongoing."). yuk di selesaikan, semangat!!";
                            ?>
                        </div>
                        <?php }else if($pending!=0 && $ongoing==0){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->userdata('nama').", Kamu memiliki pekerjaan baru ";
                            echo "(".$pending."). yuk di kerjakan, semangat!!";
                            ?>
                        </div>
                        <?php } ?>

                        <?php if($ticketpending!=0 && $ticketongoing!=0){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->userdata('nama').", Kamu memiliki ticket baru ";
                            echo "(".$ticketpending.") dan ticket yang belum selesai (".$ticketongoing."). yuk di selesaikan, semangat!!";
                            ?>
                        </div>
                        <?php }else if($ticketpending==0 && $ticketongoing!=0){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->userdata('nama').", Kamu memiliki ticket yang belum selesai (".$ticketongoing."). yuk di selesaikan, semangat!!";
                            ?>
                        </div>
                        <?php }else if($ticketpending!=0 && $ticketongoing==0){ ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->userdata('nama').", Kamu memiliki ticket baru ";
                            echo "(".$ticketpending."). yuk di kerjakan, semangat!!";
                            ?>
                        </div>
                        <?php } ?>

                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Data Statistik</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->
                                    </div>


                                    <div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Job</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p col-md-6">
                                                    <strong>Perusahaan</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $dataPerusahaan; ?></p>
                                                </div>
                                                <div class="about-info-p col-md-6">
                                                    <strong>Redaksi</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $dataRedaksi ?></p>
                                                </div>
                                                <div class="about-info-p col-md-6">
                                                    <strong>Fotografi</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $dataFotografer ?></p>
                                                </div>
                                                <div class="about-info-p col-md-6">
                                                    <strong>Visual</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $dataVisual ?></p>
                                                </div>
                                                <div class="about-info-p col-md-6">
                                                    <strong>IT</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $dataIT ?></p>
                                                </div>
                                                <div class="about-info-p col-md-6">
                                                    <strong>BPH</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $dataBPH ?></p>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->
                                    </div>
                                </div>
                            </div> 

                        