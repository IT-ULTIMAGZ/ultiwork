<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="ultiwork.ultimagz.com">
        <meta name="author" content="ultiwork.ultimagz.com">

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favico.jpg">

        <title>Masuk Aplikasi ULTIWORK</title>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65046120-1', 'auto');
  ga('send', 'pageview');

</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>
    <body>


        <div class="wrapper-page" style="margin-top:0;">
            <center style="padding:20px;"><img src="<?php echo base_url() ?>assets/images/logoultimagz.png" width="200"></center>
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class=""></div>
                    <h3 class="text-center m-t-10 text-white"> Masuk <strong><br>Aplikasi ULTIWORK</strong> </h3>
                </div> 
                
                <div class="panel-body">
                <?php $info = $this->session->flashdata('info');if(!empty($info)){ ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $info; ?>
                </div>
                <?php } ?>
                <form class="form-horizontal m-t-20" action="<?php echo base_url() ?>main/getLogin" method="post" id="loginForm">
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" required="" placeholder="Username" name="username" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="" placeholder="Password" name="password">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
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

        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

        <!--form validation-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

        <!--form validation init-->
        <script src="<?php echo base_url(); ?>assets/pages/form-validation-init.js"></script>
	
	</body>
</html>