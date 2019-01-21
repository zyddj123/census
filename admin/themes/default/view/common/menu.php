<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li id="census/index">
                    <a href="<?php echo $this->config->app_url_root;?>/Visitor" class="waves-effect"><i class="md md-home"></i><span> 首页 </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-poll"></i><span> 访客分析 </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li id="visitor/overview"><a href="<?php echo $this->config->app_url_root.'/Visitor/overview'?>">概览</a></li>
                        <li id="visitor/log"><a href="<?php echo $this->config->app_url_root.'/Visitor/log'?>">日志</a></li>
                        <li id="visitor/device"><a href="<?php echo $this->config->app_url_root.'/Visitor/device'?>">设备</a></li>
                        <li id="visitor/time"><a href="<?php echo $this->config->app_url_root.'/Visitor/time'?>">时间</a></li>
                        <li id="visitor/page"><a href="<?php echo $this->config->app_url_root.'/Visitor/page'?>">页面</a></li>
                        <li id="visitor/page_title"><a href="<?php echo $this->config->app_url_root.'/Visitor/page_title'?>">页面标题</a></li>
                        <li id="visitor/site_search"><a href="<?php echo $this->config->app_url_root.'/Visitor/site_search'?>">站内搜索</a></li>
                        <li id="visitor/site_download"><a href="<?php echo $this->config->app_url_root.'/Visitor/site_download'?>">下载</a></li>
                        <li id="visitor/referrer"><a href="<?php echo $this->config->app_url_root.'/Visitor/referrer'?>">来源</a></li>
                        <li id="visitor/location"><a href="<?php echo $this->config->app_url_root.'/Visitor/location'?>">位置</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>