<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/30
 * Time: 下午6:14
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = $column_name;
?>
<article>
    <!--lbox begin-->
    <div class="lbox">
        <div class="whitebg lanmu">
            <p><b>申明：</b>本站只是游戏公告的搬运工，不对公告做任何解释。</p>
        </div>
        <div class="whitebg bloglist">
            <h2 class="htitle">腾讯游戏</h2>
            <ul>


                <!--纯文字-->
                <?php foreach ($data as $v){ ?>
                <li>
                    <h3 class="blogtitle">
                        <a href="/index.php?r=notice%2Findex&id=<?php echo $v['id']; ?>" target="_blank"><?php echo $v['notice_title']; ?></a>
                    </h3>
                    <p class="bloginfo"><span><?php echo $column_name; ?></span><span><?php echo $v['notice_time']; ?></span><span>【<?php echo $v['game_name']; ?>】</span></p>
                    <a target="_blank" href="<?php echo $v['notice_url']; ?>"  class="viewmore">阅读原文</a> </li>
                <?php } ?>


            </ul>
        </div>

        <!--bloglist end-->
    </div>
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
                <a href="" target="_blank">个人博客模板</a>
                <a href="" target="_blank">css动画</a>
                <a href="" target="_blank">布局</a>
                <a href="" target="_blank">今夕何夕</a>
                <a href="" target="_blank">SEO</a>
                <a href="" target="_blank">女程序员</a>
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
