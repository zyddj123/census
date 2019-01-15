<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view<?php echo $res['id']?></title>
    <style>
        ul{
            padding-left:800px;
            margin-top:80px;
        }
        li{
            list-style-type:none;
            float:left;
            font-size:30px;
            margin-left:30px;
        }
    </style>
</head>
<body>
    <center><?php @include_once $this->getThemesPath().'/view/common/menu.php'; ?></center> <br><br><br>
    <center><h1><?php echo $res['name']?></h1></center>

    <script src="<?php echo $this->getThemesUrl();?>/js/jquery.js"></script>
    <script>
        var m_sid = "<?php echo $res['id']?>";
        function statisticsStay(){
            // console.log(localStorage.getItem('testSecond'));
            var second = 0;

            //开启定时器记录页面停留时间
            var timer = setInterval(function(){
                second++;
            },1000);
            //页面刷新、关闭时触发onbeforeunload事件把停留时间记录到localStorage
            window.onbeforeunload = function(){ 
                localStorage.setItem('testSecond',second);
                $.post("/Collect/insert_census",{"m_sid":m_sid,"page_time":localStorage.getItem('testSecond')},function(){});
            };
        }

        statisticsStay();
    </script>
</body>
</html>