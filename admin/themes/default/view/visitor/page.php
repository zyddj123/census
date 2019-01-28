<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>页面</title>
        <!-- header -->
	    <?php @include_once $this->getThemesPath().'/view/common/header.php'; ?> 
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
                                <h4 class="pull-left page-title">页面</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Census</a></li>
                                    <li class="active">页面</li>
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
                                        <h3 class="panel-title">页面</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table class="table" id="page_table">
                                            <thead>
                                                <tr>
                                                    <th width="60%">页面地址</th>
                                                    <th>访问量</th>
                                                    <th>页面停留时间</th>
                                                </tr>
                                            </thead>
                                            <tbody id="page">
                                                
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
                        var key= e[i].request_url;
                        // console.log(key);
                        if(temp[key]) {
                            temp[key].request_url = temp[key].request_url;
                            temp[key].nb_visits = parseInt(temp[key].nb_visits) + parseInt(e[i].nb_visits);
                            temp[key].page_time = parseInt(temp[key].page_time) + parseInt(e[i].page_time);

                        } else {
                            temp[key] = {};
                            temp[key].request_url = e[i].request_url;
                            temp[key].nb_visits = parseInt(e[i].nb_visits);
                            temp[key].page_time = parseInt(e[i].page_time);
                        }
                    }
                    for(var k in temp){
                        res.push(temp[k]);
                    }

                    var result = [];
                    for(var x in res){
                        var m = -1;
                        for(var y in result){
                            if(result[y].key==res[x].request_url.split('/')[1]){
                                m = y;
                            }
                        }
                        var bb = {};
                            bb.request_url = res[x].request_url;
                            bb.url = res[x].request_url.split('/')[2];
                            bb.nb_visits = res[x].nb_visits;
                            bb.page_time = res[x].page_time;

                        if(m>-1){
                            result[m].nb_visits += parseInt(res[x].nb_visits);
                            result[m].page_time += parseInt(res[x].page_time);
                            result[m].value.push(bb);
                        }else{
                            var aa = {};
                            aa.key = res[x].request_url.split('/')[1];
                            aa.nb_visits = res[x].nb_visits;
                            aa.page_time = res[x].page_time;
                            aa.value = [];
                            aa.value.push(bb);
                            result.push(aa);
                        }
                    }

                    // console.log(result);

                    var str = '';
                    for (var x in result) {
                        str += '<tr class="fdom opened" data-id="'+x+'" style="background-color:#f8f3f3">';
                        str += '<th><i class="md-remove-circle-outline"></i>&nbsp;&nbsp;'+result[x].key+'</th>';
                        str += '<th>'+result[x].nb_visits+'</th>';
                        str += '<th>'+formatSeconds(result[x].page_time)+'</th>';
                        str += '</tr>';
                        // console.log(result[x].value);
                        for(var y in result[x].value){
                            str += '<tr class="zdom'+x+'">';
                            str += '<td style="padding-left:50px;"><a href="'+_FRONT_REQUEST_HOST+result[x].value[y].request_url+'" target="_blank">/'+result[x].value[y].url+'&nbsp;&nbsp;<i class="ion-share"></i></a></td>';
                            str += '<td>'+result[x].value[y].nb_visits+'</td>';
                            str += '<td>'+formatSeconds(result[x].value[y].page_time)+'</td>';
                            str += '</tr>';
                        }
                    }
                    if(str!=''){
                        $('#page').empty().append(str);
                    }else{
                        $('#page').empty().append('<tr><td colspan="3"><center>暂无数据</center></td></tr>');
                    }
                });
            }
            //初始页面自运行
            get_data($('#t_start').val(),$('#t_end').val());

            //展开
            $('body').on('click','tr.unopened',function(){
                $(this).removeClass('unopened').addClass('opened');
                $(this).find("i").removeClass('md-add-circle-outline').addClass('md-remove-circle-outline');
                var x = $(this).data('id');
                $('table').find("tr.zdom"+x).show();
            });

            //折叠
            $('body').on('click','tr.opened',function(){
                $(this).removeClass('opened').addClass('unopened');
                $(this).find("i").removeClass('md-remove-circle-outline').addClass('md-add-circle-outline');
                var x = $(this).data('id');
                $('table').find("tr.zdom"+x).hide();
            });

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