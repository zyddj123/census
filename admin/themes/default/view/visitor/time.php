<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>时间</title>
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
                                <h4 class="pull-left page-title">时间</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Census</a></li>
                                    <li class="active">时间</li>
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
                            <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">时访问量</h3> 
                                    </div> 
                                    <div class="panel-body row"> 
                                        <div class="col-lg-11" style="height:400px;" id="hour">

                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">周访问量</h3> 
                                    </div> 
                                    <div class="panel-body row"> 
                                        <div class="col-lg-11" style="height:400px;" id="week">

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
        
        <script>
            function get_data(t_start,t_end){
                $.post(_REQUEST_HOST+"/visitor/ajax_data",{'t_start':t_start,'t_end':t_end},function(e){
                    e = JSON.parse(e);

                    //时访问量
                    var hour_visits = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
                    var hour_arr = [];
                    for (var j = 0; j < 24; j++) {
                        hour_arr[j] = j;
                    }
                    var res = [];
                    var temp = {};
                    for(var i in e) {
                        var key= e[i].visit_time.slice(11,13);
                        if(temp[key]) {
                            temp[key].visit_time = temp[key].visit_time;
                            temp[key].nb_visits = parseInt(temp[key].nb_visits) + parseInt(e[i].nb_visits);
                        } else {
                            temp[key] = {};
                            temp[key].visit_time = e[i].visit_time.slice(11,13);
                            temp[key].nb_visits = parseInt(e[i].nb_visits);
                        }
                    }
                    for(var k in temp){
                        res.push(temp[k]);
                    }

                    if(res.length>0){
                        for (var x = 0; x < hour_arr.length; x++) {
                            for (var y = 0; y < res.length; y++) {
                                if(hour_arr[x]==parseInt(res[y].visit_time)){
                                    hour_visits[x] += parseInt(res[y].nb_visits);
                                }
                            }
                        }
                    }
                    
                    hour_visits.unshift('时访问量');
                    var week = c3.generate({
                        bindto: '#hour',
                        data: {
                            columns: [
                                hour_visits
                            ],
                            type:'bar',
                        },
                        axis: {
                            x: {
                                type: 'category',
                                categories: ['0时','1时','2时','3时','4时','5时','6时','7时','8时','9时','10时','11时','12时','13时','14时','15时','16时','17时','18时','19时','20时','21时','22时','23时']
                            },
                            y: {
                                label: {
                                    text: "访问量",
                                    position: 'inner-edge'
                                }
                            }		      
                        }
                    });

                    //周访问量
                    var week_visits = [0,0,0,0,0,0,0];
                    for(var x in e){
                        switch (e[x].week) {
                            case "1":
                                week_visits[0] += 1;
                                break;
                            case "2":
                                week_visits[1] += 1;
                                break;
                            case "3":
                                week_visits[2] += 1;
                                break;
                            case "4":
                                week_visits[3] += 1;
                                break;
                            case "5":
                                week_visits[4] += 1;
                                break;
                            case "6":
                                week_visits[5] += 1;
                                break;
                            case "0":
                                week_visits[6] += 1;
                                break;
                            default:
                                break;
                        }
                    }
                    week_visits.unshift('周访问量');
                    var week = c3.generate({
                        bindto: '#week',
                        data: {
                            columns: [
                                week_visits
                            ],
                            type:'bar',
                        },
                        axis: {
                            x: {
                                type: 'category',
                                categories: ['星期一','星期二','星期三','星期四','星期五','星期六','星期日']
                            },
                            y: {
                                label: {
                                    text: "访问量",
                                    position: 'inner-edge'
                                }
                            }		      
                        }
                    });
                });
            }
            //初始页面自运行
            get_data($('#t_start').val(),$('#t_end').val());

            //同一数组存在某一相同项，指定某项叠加(数字)
            function arr_add(arr,equal_key,ret_value){
                var nb_visit = [];
                var temp = {};
                for(var i in arr) {
                    var key= arr[i][equal_key];
                    if(temp[key]) {
                        temp[key][equal_key] = temp[key][equal_key] ;
                        temp[key][ret_value] = parseInt(temp[key][ret_value]) + parseInt(arr[i][ret_value]);
                    } else {
                        temp[key] = {};
                        temp[key][equal_key] = arr[i][equal_key];
                        temp[key][ret_value] = parseInt(arr[i][ret_value]);
                    }
                }
                for(var k in temp){
                    nb_visit.push(temp[k]);
                }
                return nb_visit;
            }
            
        </script>
	</body>
</html>