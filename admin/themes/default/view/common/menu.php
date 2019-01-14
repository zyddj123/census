<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php echo $this->getThemesUrl();?>/assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>
                
                <p class="text-muted m-0">管理员</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li id="census/index">
                    <a href="<?php echo $this->config->app_url_root;?>/Index" class="waves-effect"><i class="md md-home"></i><span> 首页 </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-poll"></i><span> 访客分析 </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li id="visitor/overview"><a href="<?php echo $this->config->app_url_root.'/Index/overview'?>">概览</a></li>
                        <li><a href="#">日志</a></li>
                        <li><a href="#">设备</a></li>
                        <li><a href="#">软件</a></li>
                        <li><a href="#">位置</a></li>
                        <li><a href="#">忠诚度</a></li>
                        <li><a href="#">时间</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-pageview"></i><span> 页面分析 </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="#">页面</a></li>
                        <li><a href="#">进入页面</a></li>
                        <li><a href="#">离开页面</a></li>
                        <li><a href="#">页面标题</a></li>
                        <li><a href="#">站内搜索</a></li>
                        <li><a href="#">下载</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>