<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\www\tp5\public/../application/home\view\default\wuye\index.html";i:1533830658;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/static2/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static2/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="http://www.tp5.com/home/index/index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <?php if(is_array($infos) || $infos instanceof \think\Collection || $infos instanceof \think\Paginator): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$infos): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">
            <a href="<?php echo url('detail?id='.$infos['id']); ?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="/static2/image/1.png" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo $infos['title']; ?></p>
                    <p class="intro"><?php echo $infos['description']; ?></p>
                    <p class="info">浏览: <?php echo $infos['view']; ?> <span class="pull-right"><?php echo date('Y-m-d H:i:s',$infos['create_time']); ?></span> </p>
                </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <!--<div class="row noticeList">-->
            <!--<div class="col-xs-2">-->
                <!--<img class="noticeImg" src="../image/1.png" />-->
            <!--</div>-->
            <!--<div class="col-xs-10">-->
                <!--<p class="title"><a href="">关于XXX小区业主委员会选举的公告</a></p>-->
                <!--<p class="intro">经过几年的摸索,XXX小区的业主委会员已经</p>-->
                <!--<p class="info">浏览: 199 <span class="pull-right">2016-05-11</span> </p>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row noticeList">-->
            <!--<div class="col-xs-2">-->
                <!--<img class="noticeImg" src="../image/1.png" />-->
            <!--</div>-->
            <!--<div class="col-xs-10">-->
                <!--<p class="title"><a href="">关于XXX小区业主委员会选举的公告</a></p>-->
                <!--<p class="intro">经过几年的摸索,XXX小区的业主委会员已经</p>-->
                <!--<p class="info">浏览: 199 <span class="pull-right">2016-05-11</span> </p>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row noticeList">-->
            <!--<div class="col-xs-2">-->
                <!--<img class="noticeImg" src="../image/1.png" />-->
            <!--</div>-->
            <!--<div class="col-xs-10">-->
                <!--<p class="title"><a href="">关于XXX小区业主委员会选举的公告</a></p>-->
                <!--<p class="intro">经过几年的摸索,XXX小区的业主委会员已经</p>-->
                <!--<p class="info">浏览: 199 <span class="pull-right">2016-05-11</span> </p>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row noticeList">-->
            <!--<div class="col-xs-2">-->
                <!--<img class="noticeImg" src="../image/1.png" />-->
            <!--</div>-->
            <!--<div class="col-xs-10">-->
                <!--<p class="title"><a href="">关于XXX小区业主委员会选举的公告</a></p>-->
                <!--<p class="intro">经过几年的摸索,XXX小区的业主委会员已经</p>-->
                <!--<p class="info">浏览: 199 <span class="pull-right">2016-05-11</span> </p>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static2/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static2/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>