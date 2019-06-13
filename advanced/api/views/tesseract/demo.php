<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/6/13
 * Time: 下午2:04
 */
$this->title = $msg;
?>
<div class="site-index">

    <div class="jumbotron">

        <form role="form" enctype="multipart/form-data" method="post"  action="">
            <div class="form-group">
                <label for="name">字体库</label>
                <input type="text" class="form-control" name="ztk" placeholder="字体库">
            </div>
            <div class="form-group">
                <label for="inputfile">文件输入</label>
                <input type="file" name="img">
                <p class="help-block">上传需要识别的图片</p>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>


    </div>

    <div class="body-content">

        <div class="row">
            <?php if(isset($re)){ ?>
            <div class="col-lg-6">
                <h2>返回识别的字体</h2>

                <p><?php echo $re; ?></p>

            </div>
            <?php } ?>

        </div>

    </div>
</div>