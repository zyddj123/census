<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>站内下载</title>
        <!-- header -->
	    <?php @include_once $this->getThemesPath().'/view/common/header.php'; ?> 
        <link  type="text/css" href="<?php echo $this->getThemesUrl();?>/assets/js/c3-chart/c3.css" rel="stylesheet" ></link>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php @include_once $this->getThemesPath().'/view/common/top.php'; ?> 
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->
            <?php @include_once $this->getThemesPath().'/view/common/menu.php'; ?> 
            <!-- Left Sidebar End --> 
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <!-- Start container -->
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">站内下载</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Census</a></li>
                                    <li class="active">站内下载</li>
                                </ol>
                            </div>
                        </div>
                        <!-- /Page-Title -->

                        <!-- datepicker -->
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <?php @include_once $this->getThemesPath().'/view/common/visitor_common.php';?>
                            </div>
                        </div>
                        <!-- /datepicker -->

                        <!--main-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">站内下载</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <!--/main-->
                    </div> 
                    <!-- /container -->           
                </div> 
                <!-- /content -->
                <!-- footer -->
                <?php @include_once $this->getThemesPath().'/view/common/footer.php'; ?>
                <!-- /footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <?php @include_once $this->getThemesPath().'/view/common/commonjs.php'; ?>
        <!--c3-charts-->
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/c3-chart/d3.v3.min.js"></script>
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/c3-chart/c3.js"></script>
        <!--sparkline-->
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-sparkline/jquery.sparkline.min.js"></script>
        
        <script>
            function get_data(t_start,t_end){
                $.post(_REQUEST_HOST+"/visitor/ajax_data",{'t_start':t_start,'t_end':t_end},function(e){
                    e = JSON.parse(e);
                });
            }
            //初始页面自运行
            get_data($('#t_start').val(),$('#t_end').val());

            
        </script>
	</body>
</html>