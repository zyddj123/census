<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>设备</title>
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
                                <h4 class="pull-left page-title">设备</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Census</a></li>
                                    <li class="active">设备</li>
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
                                        <h3 class="panel-title">设备类型</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table id="device_type_table" class="table table-striped dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>设备类型</th>
                                                    <th>访问量</th>
                                                </tr>
                                            </thead>
                                            <tbody id="device_type">
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">画面分辨率</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table id="resolution_table" class="table table-striped dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>画面分辨率</th>
                                                    <th>访问量</th>
                                                </tr>
                                            </thead>
                                            <tbody id="resolution">
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">操作系统版本</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table id="nb_os_table" class="table table-striped dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>操作系统版本</th>
                                                    <th>访问量</th>
                                                </tr>
                                            </thead>
                                            <tbody id="nb_os">
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">浏览器</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table id="nb_brower_table" class="table table-striped dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>浏览器</th>
                                                    <th>访问量</th>
                                                </tr>
                                            </thead>
                                            <tbody id="nb_brower">
                                                
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">浏览器语言</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <table id="nb_lang_table" class="table table-striped dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th>浏览器语言</th>
                                                    <th>访问量</th>
                                                </tr>
                                            </thead>
                                            <tbody id="nb_lang">
                                                
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
        <!--bootstrap-->
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-datatables-editable/jquery.dataTables.js"></script>
        <script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-datatables-editable/dataTables.bootstrap.js"></script>
        
        <script>
            function get_data(t_start,t_end){
                $.post(_REQUEST_HOST+"/visitor/ajax_data",{'t_start':t_start,'t_end':t_end},function(e){
                    e = JSON.parse(e);

                    //设备类型
                    append_html(e,"device_type","nb_visits","device_type");
                    //设备类型
                    append_html(e,"resolution","nb_visits","resolution");
                    //设备类型
                    append_html(e,"nb_os","nb_visits","nb_os");
                    //设备类型
                    append_html(e,"nb_brower","nb_visits","nb_brower");
                    //设备类型
                    append_html(e,"nb_lang","nb_visits","nb_lang");
                });
            }
            //初始页面自运行
            get_data($('#t_start').val(),$('#t_end').val());

            function append_html(e,equal_key,ret_value,menu){
                var res = arr_add(e,equal_key,ret_value);
                var str = '';
                for(var x in res){
                    str += '<tr>';
                    str += '<td>'+res[x][menu]+'</td>';
                    str += '<td>'+res[x][ret_value]+'</td>';
                }
                if(str!=''){
                    $('#'+menu).empty().append(str);
                    $('#'+menu+'_table').dataTable({
                        searching:false,
                        lengthChange:false
                    });	
                }else{
                    $('#'+menu+'_table').dataTable().fnDestroy();
                    $('#'+menu).empty().append('<tr><td colspan="2"><center>暂无数据</center></td></tr>');
                }
            }

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