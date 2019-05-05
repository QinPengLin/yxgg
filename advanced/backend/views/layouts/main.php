<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use Yii;

AppAsset::register($this);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="blog" />
    <meta name="description" content="blog" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/yxgg/css/base.css" rel="stylesheet">
    <link href="/yxgg/css/m.css" rel="stylesheet">
    <script src="/yxgg/js/jquery-1.8.3.min.js" ></script>
    <script src="/yxgg/js/comm.js"></script>
    <!--[if lt IE 9]>
    <script src="js/modernizr.js"></script>
    <![endif]-->
    <style>
        .active a{color: #ffffff;background: #666;}
    </style>
</head>
<body>
<!--top begin-->
<header id="header">
    <div class="navbox">
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <div class="logo"><a href="#"></a><?= Html::encode(Yii::$app->view->params['siteName']) ?></div>
        <nav>
            <ul id="starlist">
                <?php foreach (Yii::$app->view->params['column'] as $k=>$v){ ?>
                <?php if(!empty($v['child'])){ ?>
                        <li class="menu"><a href="/index.php?r=notice%2Flistcolumn&lumn_type=<?php echo $v['mark']; ?>"><?php echo $k; ?></a>
                            <ul class="sub">
                                <?php foreach ($v['child'] as $ck=>$cv){ ?>
                                <li><a href="/index.php?r=notice%2Flist&game_name_type=<?php echo $cv['mark']; ?>"><?php echo $cv['name']; ?></a></li>
                                <?php } ?>
                            </ul>
                            <span></span></li>

                <?php } ?>
                <?php if(empty($v['child'])){ ?>
                        <?php if ($v['mark']=='home'){//首页 ?>
                        <li><a href="/index.php?r=notice%2F<?php echo $v['mark']; ?>"><?php echo $k; ?></a></li>
                        <?php } ?>
                        <?php if ($v['mark']!='home'){//不是首页 ?>
                            <li><a href="<?php echo $v['mark']; ?>"><?php echo $k; ?></a></li>
                        <?php } ?>
                <?php } ?>
                <?php } ?>
            </ul>
        </nav>
        <div class="searchico"></div>
    </div>
</header>
<div class="searchbox">
    <div class="search">
        <form action="#" method="post" name="searchform" id="searchform">
            <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onFocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onBlur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
            <input name="show" value="title" type="hidden">
            <input name="tempid" value="1" type="hidden">
            <input name="tbname" value="news" type="hidden">
            <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
    </div>
    <div class="searchclose"></div>
</div>
<!--top end-->

<?= $content ?>

<footer>
    <div class="box">
        <div class="wxbox">
            <ul>
                <li><img src="/yxgg/images/wx.jpg"><span>我的微信</span></li>
            </ul>
        </div>
        <div class="endnav">
            <p><b>站点声明：</b></p>
            <p>本站只是游戏公告的搬运工，不对公告做任何解释。</p>
            <p>Copyright © <a href="http://ggj.qinpl.cn" target="_blank">ggj.qinpl.cn</a> All Rights Reserved. 备案号：<a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备17013559号-1</a></p>
        </div>
    </div>
    <a href="#">
        <div class="top"></div>
    </a> </footer>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?a121a80d02070c80005e5c18ca607f2c";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>

