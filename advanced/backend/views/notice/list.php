<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/30
 * Time: 下午1:08
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = $game_name;
?>

<article>
    <!--lbox begin-->
    <div class="lbox">
        <div class="whitebg lanmu">
            <p><b>申明：</b>本站只是游戏公告的搬运工，不对公告做任何解释。</p>
        </div>
        <div class="whitebg bloglist">
            <h2 class="htitle">【<?php echo $game_name; ?>】公告列表</h2>
            <ul>
                <!--纯文字-->
                <?php foreach ($data as $v){ ?>
                <li>
                    <h3 class="blogtitle">
                        <a href="/index.php?r=notice%2Findex&id=<?php echo $v['id']; ?>" target="_blank"><?php echo $v['notice_title']; ?></a>
                    </h3>
                    <p class="blogtext"></p>
                    <p class="bloginfo">
                        <span><?php echo $v['game_name']; ?></span>
                        <span><?php echo $v['notice_time']; ?></span>
                        <span>【<a target="_blank" href="<?php echo $v['notice_url']; ?>">原创阅读</a>】</span>
                    </p>
                    <a href="/index.php?r=notice%2Findex&id=<?php echo $v['id']; ?>" class="viewmore">阅读</a>
                </li>
                <?php  }  ?>
            </ul>
            <!--pagelist-->
            <div class="pagelist">
            <?php
            echo LinkPager::widget([
                'pagination' => $pagebar,
                'pgek'=>'pagek',
                'pgel'=>'pagel',
            ]);
            ?>
        </div>
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
                <?php foreach (Yii::$app->view->params['laha'] as $v){ ?>
                    <a href="/index.php?r=notice%2Findex&id=<?php echo $v['id']; ?>" target="_blank"><?php echo $v['game_name']; ?></a>
                <?php } ?>
            </ul>
        </div>


        <div class="whitebg tongji">
            <h2 class="htitle">站点信息</h2>
            <ul>
                <li><b>建站时间</b>：2019-04-27</li>
                <li><b>网站框架</b>：Yii 2.0</li>
                <li><b>公告统计</b>：<?php echo Yii::$app->view->params['articleCounts']; ?>条</li>
                <li><b>站长QQ</b>：<?php echo Yii::$app->view->params['adminQq']; ?></li>
            </ul>
        </div>
    </div>
</article>
