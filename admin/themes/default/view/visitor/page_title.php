<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>页面标题</title>
        <!-- header -->
	    <?php @include_once $this->getThemesPath().'/view/common/header.php'; ?> 
        <link  type="text/css" href="<?php echo $this->getThemesUrl();?>/assets/js/jquery-datatables-editable/datatables.css" rel="stylesheet" ></link>
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
                                <h4 class="pull-left page-title">页面标题</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Census</a></li>
                                    <li class="active">页面标题</li>
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
                                        <h3 class="panel-title">页面标题</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table class="table  table-hover general-table" id="page_title_table">
                                            <thead>
                                                <tr>
                                                    <th width="60%">页面标题</th>
                                                    <th>访问量</th>
                                                    <th>页面停留时间</th>
                                                </tr>
                                            </thead>
                                            <tbody id="page_title">
                                                
                                            </tbody>
                                        </table>
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
        <!--dataTables-->
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-datatables-editable/jquery.dataTables.js"></script>
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-datatables-editable/dataTables.bootstrap.js"></script>

        <script>

            var second = '秒';
            var minute = '分';
            var hour = '时';

            function get_data(t_start,t_end){
                $.post(_REQUEST_HOST+"/visitor/ajax_data",{'t_start':t_start,'t_end':t_end},function(e){
                    e = JSON.parse(e);

                    var res = [];
                    var temp = {};
                    for(var i in e) {
                        var key= e[i].page_title;
                        if(temp[key]) {
                            temp[key].page_title = temp[key].page_title;
                            temp[key].nb_visits = parseInt(temp[key].nb_visits) + parseInt(e[i].nb_visits);
                            temp[key].page_time = parseInt(temp[key].page_time) + parseInt(e[i].page_time);
                            temp[key].request_url = e[i].request_url;

                        } else {
                            temp[key] = {};
                            temp[key].page_title = e[i].page_title;
                            temp[key].nb_visits = parseInt(e[i].nb_visits);
                            temp[key].page_time = parseInt(e[i].page_time);
                            temp[key].request_url = e[i].request_url;
                        }
                    }
                    for(var k in temp){
                        res.push(temp[k]);
                    }

                    var str = '';
                    for (var x in res) {
                        str += '<tr>';
                        str += '<td><a href="'+_FRONT_REQUEST_HOST+res[x].request_url+'" target="_blank">'+res[x].page_title+'&nbsp;&nbsp;<i class="ion-share"></i></a></td>';
                        str += '<td>'+res[x].nb_visits+'</td>';
                        str += '<td>'+formatSeconds(res[x].page_time)+'</td>';
                        str += '</tr>';
                        }
                    if(str!=''){
                        $('#page_title').empty().append(str);
                        $('#page_title_table').dataTable({
                            bRetrieve: true,
                            bDestroy: true,
                        });	
                    }else{
                        $('#page_title_table').dataTable().fnDestroy();
                        $('#page_title').empty().append('<tr><td colspan="3"><center>暂无数据</center></td></tr>');
                    }
                });
            }
            //初始页面自运行
            get_data($('#t_start').val(),$('#t_end').val());

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