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
            <button type="submit" class="btn btn-primary">提交</button>
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

            <div class="col-lg-6">
                <h2>接口文档</h2>




                <main  >
                    <div >
                        <h3>图片识别接口</h3> <!---->
                    </div>
                    <div>  <p><strong>简要描述：</strong> </p>
                        <ul>
                            <li>图片识别接口</li></ul>
                        <p><strong>请求URL：</strong> </p>
                        <ul>
                            <li><code style="color: rgb(221, 17, 68);">http://ggj.api.qinpl.cn/index.php?r=tesseract/identify</code></li></ul>
                        <p><strong>请求方式：</strong></p>
                        <ul>
                            <li>POST </li></ul>
                        <p><strong>参数：</strong> </p>
                        <div style="width: 100%;overflow-x: auto;">
                            <table class="table">
                                <thead >
                                <tr style="background-color: rgb(64, 158, 255); color: rgb(255, 255, 255);">
                                    <th style="text-align: left; width: 178px;">参数名</th>
                                    <th style="text-align: left; width: 178px;">必选</th>
                                    <th style="text-align: left; width: 178px;">类型</th>
                                    <th style="width: 178px;">说明</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: rgb(255, 255, 255);">
                                    <td style="text-align:left;">ztk</td>
                                    <td style="text-align:left;">否</td>
                                    <td style="text-align:left;">string</td>
                                    <td>字体库类型，目前有chi_sim和eng两种类型，chi_sim是中文，eng是英文，默认不填是eng</td>
                                </tr>
                                <tr style="background-color: rgb(255, 255, 255);">
                                    <td style="text-align:left;">img</td>
                                    <td style="text-align:left;">是</td>
                                    <td style="text-align:left;">file</td>
                                    <td>需要上传的图片，目前支持png、jpeg、jpg图片类型，目前没有做图片大小限制，但是上传过大或者文字多的图片接口会死掉</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p> <strong>识别图片示例</strong></p>
                        <img src="http://ggj.api.qinpl.cn/update/sample/sample.png">

                        <p> <strong>返回示例</strong></p>
                        <pre style="padding-left: 5px; background-color: rgb(252, 252, 252); border: 1px solid rgb(225, 225, 232);">
                                    <ol class="linenums" style="padding-left: 5px;">
                                        <li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">  </span><span class="pun">{</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    </span><span class="str">"msg"</span><span class="pun">:</span><span class="pln"> </span><span class="str">"成功!"</span><span class="pun">,</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    </span><span class="str">"status"</span><span class="pun">:</span><span class="pln"> </span><span class="str">"1"</span><span class="pun">,</span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    </span><span class="str">"data"</span><span class="pun">:</span><span class="pln"> </span><span class="str">"你这样夸狗四， 今晚城战他又要缺席了 "</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pun">}</span></code></li>
                                    </ol>
                                </pre>
                        <p> <strong>返回参数说明</strong> </p>
                        <div style="width: 100%;overflow-x: auto;">
                            <table class="table">
                                <thead>
                                <tr style="background-color: rgb(64, 158, 255); color: rgb(255, 255, 255);">
                                    <th style="text-align: left; width: 238px;">参数名</th>
                                    <th style="text-align: left; width: 238px;">类型</th>
                                    <th style="width: 238px;">说明</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: rgb(255, 255, 255);">
                                    <td style="text-align:left;">msg</td>
                                    <td style="text-align:left;">string</td>
                                    <td>返回说明</td>
                                </tr>
                                <tr style="background-color: rgb(255, 255, 255);">
                                    <td style="text-align:left;">status</td>
                                    <td style="text-align:left;">int</td>
                                    <td>-4失败，1成功</td>
                                </tr>
                                <tr style="background-color: rgb(255, 255, 255);">
                                    <td style="text-align:left;">data</td>
                                    <td style="text-align:left;">string || array</td>
                                    <td>返回识别的文字</td>
                                </tr>
                                </tbody>
                            </table></div>
                        <p> <strong>备注</strong> </p>
                        <p>接口返回信息都是返回的json字符串</p>
                    </div></main>




            </div>

        </div>

    </div>
</div>