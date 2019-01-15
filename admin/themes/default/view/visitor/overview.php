<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>概览</title>
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
                                <h4 class="pull-left page-title">概览</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Census</a></li>
                                    <li class="active">概览</li>
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
                                        <h3 class="panel-title">访客趋势图</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div id="chart" style="width: 100%;height:300px; text-align: center; margin:0 auto;">
										</div>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">访客概览</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5">

                                                    </div>
                                                    <div class="col-lg-1">
                                                        1111
                                                    </div>
                                                    <div class="col-lg-6">
                                                        访问次数
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5">

                                                    </div>
                                                    <div class="col-lg-1">
                                                        1111
                                                    </div>
                                                    <div class="col-lg-6">
                                                        页面停留时间
                                                    </div>
                                                </div>
                                            </div>
										</div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5">

                                                    </div>
                                                    <div class="col-lg-1">
                                                        1111
                                                    </div>
                                                    <div class="col-lg-6">
                                                        跳出次数
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5">

                                                    </div>
                                                    <div class="col-lg-1">
                                                        1111
                                                    </div>
                                                    <div class="col-lg-6">
                                                        平均停留时间
                                                    </div>
                                                </div>
                                            </div>
										</div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5">

                                                    </div>
                                                    <div class="col-lg-1">
                                                        1111
                                                    </div>
                                                    <div class="col-lg-6">
                                                        下载数量
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5">

                                                    </div>
                                                    <div class="col-lg-1">
                                                        1111
                                                    </div>
                                                    <div class="col-lg-6">
                                                        站内搜索数量
                                                    </div>
                                                </div>
                                            </div>
										</div>
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
            // if(_LANG=="zh-cn"){
                    var visit_total = '访问人数';
                    var second = '秒';
                    var minute = '分';
                    var hour = '时';
                // }else if(_LANG=="en"){
                //     var visit_total = 'visit';
                //     var second = 's';
                //     var minute = 'm';
                //     var hour = 'h';
                // }
                function get_data(t_start,t_end){
                    $.post(_REQUEST_HOST+"/visitor/overview_ajax_data",{'t_start':t_start,'t_end':t_end},function(e){
                        e = JSON.parse(e);
                        var days = getAll(t_start,t_end);
                        var total_nb_visits = [];
                        for (var i = 0; i < days.length; i++) {
                            total_nb_visits[i] = 0;
                        }
                        days.unshift('x');
					    total_nb_visits.unshift(visit_total);

                        if(e){
                            $.each(e,function(i,d){
                                var m = $.inArray(d.visit_time,days);
                                if(m>-1){
                                    total_nb_visits[m] = d.nb_visits;
                                }
                            });
                        }

                        c3.generate({
                            bindto: '#chart',
                            data: {
                                x: 'x',
                                columns: [
                                days,
                                total_nb_visits
                                ],
                            },
                            axis: {
                                x: {
                                    type: 'timeseries',
                                    tick: {
                                        format: '%Y/%m/%d',
                                        culling: false 
                                    }
                                },
                                y: {
                                    label: {
                                        text: visit_total,
                                        position: 'inner-edge'
                                    }
                                }		      
                            }
                        });
                    });
                }
                //初始页面自运行
                get_data($('#t_start').val(),$('#t_end').val());

                Date.prototype.format = function() {  
                    var s = '';  
                    var mouth = (this.getMonth() + 1)>=10?(this.getMonth() + 1):('0'+(this.getMonth() + 1));  
                    var day = this.getDate()>=10?this.getDate():('0'+this.getDate());  
                    s += this.getFullYear() + '-';  
                    s += mouth + "-";  
                    s += day;  
                    return (s);  
                };
                //获取日期间所有天
                function getAll(begin, end) { 
                    var days =new Array(); 
                    var ab = begin.split("-");  
                    var ae = end.split("-");  
                    var db = new Date();  
                    db.setUTCFullYear(ab[0], ab[1] - 1, ab[2]);  
                    var de = new Date();  
                    de.setUTCFullYear(ae[0], ae[1] - 1, ae[2]);  
                    var unixDb = db.getTime();  
                    var unixDe = de.getTime();  
                    for (var k = unixDb; k <= unixDe;) {  
                        days.push((new Date(parseInt(k))).format());  
                        k = k + 24 * 60 * 60 * 1000;  
                    }
                    return days;
                }

                //获取两位小数点
                function get_two_float(num){
                    return Math.round(num*100)/100;
                }

                //秒数转化为时分秒
                function formatSeconds(value) {
                    var secondTime = parseInt(value);// 秒
                    var minuteTime = 0;// 分
                    var hourTime = 0;// 小时
                    if(secondTime > 60) {//如果秒数大于60，将秒数转换成整数
                        //获取分钟，除以60取整数，得到整数分钟
                        minuteTime = parseInt(secondTime / 60);
                        //获取秒数，秒数取佘，得到整数秒数
                        secondTime = parseInt(secondTime % 60);
                        //如果分钟大于60，将分钟转换成小时
                        if(minuteTime > 60) {
                            //获取小时，获取分钟除以60，得到整数小时
                            hourTime = parseInt(minuteTime / 60);
                            //获取小时后取佘的分，获取分钟除以60取佘的分
                            minuteTime = parseInt(minuteTime % 60);
                        }
                    }
                    var result = "" + parseInt(secondTime) + second;

                    if(minuteTime > 0) {
                        result = "" + parseInt(minuteTime) + minute + result;
                    }
                    if(hourTime > 0) {
                        result = "" + parseInt(hourTime) + hour + result;
                    }
                    return result;
                }
        </script>
	</body>
</html>