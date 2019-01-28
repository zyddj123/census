<!DOCTYPE html>
<html>
    <head>
        <!-- meta -->
	    <?php @include_once $this->getThemesPath().'/view/common/meta.php'; ?>
        <title>登录</title>
        <!-- header -->
	    <?php @include_once $this->getThemesPath().'/view/common/header.php'; ?>
    </head>
    <body>

        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> 登录 <strong>Census</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" action="<?php echo $this->config->app_url_root;?>/Login/login" method="post">
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg " type="text" required="" name="uname" placeholder="用户名">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="" name="upwd" placeholder="密码">
                        </div>
                    </div>

                    <?php 
                        if($cfg_login_auth_code!="0"){
                            echo '<div class="form-group">';
                            echo '<div class="col-xs-6">';
                            echo '<input type="text" class="form-control input-lg" placeholder="验证码" name="auth_code">';
                            echo '</div>';
                            echo '<div class="col-xs-6">';
                            echo '<a href="javascript:void(0);" id="auth_code_img">';
                            echo '<img src="'.$this->config->app_url_root.'/Login/auth_code" title="更换验证码" align="absmiddle" id="auth_img">';
                            echo '</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    记住我
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">登录</button>
                        </div>
                    </div>

                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> 忘记密码?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="register.html">注册账户</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>
    	<?php @include_once $this->getThemesPath().'/view/common/commonjs.php'; ?>
        <script>
            function randomNum(minNum,maxNum){ 
                switch(arguments.length){ 
                    case 1: 
                        return parseInt(Math.random()*minNum+1,10); 
                    break; 
                    case 2: 
                        return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10); 
                    break; 
                        default: 
                            return 0; 
                        break; 
                } 
            } 
            $("#auth_img").click(function(){
                $(this).attr("src",'<?php echo $this->config->app_url_root;?>/Login/auth_code/&r=' + randomNum(10000,99999));
            });
        </script>
	
	</body>
</html>