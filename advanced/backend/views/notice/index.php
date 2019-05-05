<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/30
 * Time: 上午9:59
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = $data['notice_title'];
?>
<article>
    <!--lbox begin-->
    <div class="lbox">
        <div class="content_box whitebg">
            <h2 class="htitle"><span class="con_nav"><a href="/">首页</a>><a href="#"><?php echo $data['game_company']; ?></a>><a href="#"><?php echo $data['game_name']; ?></a></span><?php echo $data['game_name']; ?></h2>
            <h1 class="con_tilte"><?php echo $data['notice_title']; ?></h1>
            <p class="bloginfo"><span><?php echo $data['game_name']; ?></span><span><?php echo $data['notice_time']; ?></span></p>
            <p class="con_info"><b>申明：</b>本站只是游戏公告的搬运工，不对公告做任何解释。</p>
            <div class="con_text">

                <?php echo $data['notice_content']; ?>

                <p><span class="diggit">已有(<?php echo $data['watch_number']; ?>)观看</span></p>
                <p><a style="text-decoration: none;" target="_blank" href="<?php echo $data['notice_url']; ?>"><span class="diggit">阅读原文</span></a></p>
                <div class="nextinfo">
                    <?php if(!empty($next)){ ?>
                    <p>下一篇：<a href="/index.php?r=notice%2Findex&id=<?php echo $next['id']; ?>"><?php echo $next['notice_title']; ?></a></p>
                    <?php } ?>
                    <?php if(!empty($up)){ ?>
                    <p>上一篇：<a href="/index.php?r=notice%2Findex&id=<?php echo $up['id']; ?>"><?php echo $up['notice_title']; ?></a></p>
                    <?php } ?>
                </div>
            </div>
        </div>
<!--        <div class="whitebg gbook">-->
<!--            <h2 class="htitle">文章评论</h2>-->
<!--            <ul>-->
<!--            </ul>-->
<!--        </div>-->
    </div>
    <!--lbox end-->
    <div class="rbox">
        <div class="whitebg paihang">
            <h2 class="htitle">点击排行</h2>
            <section class="topnews imgscale">
                <a href="#"><img src="/yxgg/images/h1.jpg"><span>热点关注</span></a>
            </section>
            <ul>
                <?php foreach ($ranking as $v){ ?>
                <li><i></i><a href="/index.php?r=notice%2Findex&id=<?php echo $v['id']; ?>"><?php echo $v['notice_title']; ?></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="whitebg cloud">
            <h2 class="htitle">标签云</h2>
            <ul>
                <a href="" target="_blank">个人博客</a>
                <a href="" target="_blank">css动画</a>
                <a href="" target="_blank">布局</a>
                <a href="" target="_blank">今夕何夕</a>
                <a href="" target="_blank">SEO</a>
                <a href="" target="_blank">程序员</a>
                <a href="" target="_blank">小世界</a>
                <a href="" target="_blank">个人博客</a>
                <a href="" target="_blank">网页设计</a>
            </ul>
        </div>


        <div class="whitebg tongji">
            <h2 class="htitle">站点信息</h2>
            <ul>
                <li><b>建站时间</b>：2019-04-27</li>
                <li><b>网站框架</b>：Yii 2.0</li>
                <li><b>公告统计</b>：<?php echo Yii::$app->view->params['articleCounts']; ?>条</li>
                <li><b>站长QQ</b>：1017962047</li>
            </ul>
        </div>

    </div>
</article>
