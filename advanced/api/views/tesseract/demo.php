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
            <div class="col-lg-4">
                <h2>返回识别的字体</h2>

                <p><?php echo $re; ?></p>

            </div>
            <?php } ?>

            <div class="col-lg-4">
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
                        <img class="img-responsive" src="http://ggj.api.qinpl.cn/update/sample/sample.png">

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



            <div class="col-lg-4">
                <h2>接口调用示例代码</h2>

                <p> <strong>PHP</strong></p>
                <pre class="prettyprint linenums prettyprinted" style="padding-left: 5px; background-color: rgb(252, 252, 252); border: 1px solid rgb(225, 225, 232);"><ol class="linenums" style="padding-left: 5px;"><li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pun">&lt;?</span><span class="pln">php</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    </span><span class="com">/**</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="com">     * </span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="com">     * @param string $url 请求的链接</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="com">     * @param array $data POST的数据</span></code></li><li class="L5" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="com">     * @param int $timeoutMs 超时设置，单位：毫秒</span></code></li><li class="L6" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="com">     * @return string 接口返回的内容，超时返回false</span></code></li><li class="L7" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="com">     */</span></code></li><li class="L8" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    </span><span class="kwd">function</span><span class="pln"> curlRequest</span><span class="pun">(</span><span class="pln">$url</span><span class="pun">,</span><span class="pln"> $data</span><span class="pun">=</span><span class="pln">array</span><span class="pun">(),</span><span class="pln">$header</span><span class="pun">=</span><span class="pln">array</span><span class="pun">(),</span><span class="pln"> $timeoutMs </span><span class="pun">=</span><span class="pln"> </span><span class="lit">3000</span><span class="pun">)</span><span class="pln"> </span><span class="pun">{</span></code></li><li class="L9" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        $header_default</span><span class="pun">=</span><span class="pln">array</span><span class="pun">([</span></code></li><li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            </span><span class="str">'User-Agent'</span><span class="pun">=&gt;</span><span class="str">'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240'</span><span class="pun">,</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            </span><span class="str">'Accept'</span><span class="pun">=&gt;</span><span class="str">'text/html, application/xhtml+xml, image/jxr, */*'</span><span class="pun">,</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            </span><span class="str">'Accept-Encoding'</span><span class="pun">=&gt;</span><span class="str">'*'</span><span class="pun">,</span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            </span><span class="str">'Accept-Language'</span><span class="pun">=&gt;</span><span class="str">'zh-CN'</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="pun">]);</span><span class="com">//请求头的默认配置</span></code></li><li class="L5" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        $header</span><span class="pun">=</span><span class="pln">array_merge</span><span class="pun">(</span><span class="pln">$header_default</span><span class="pun">[</span><span class="lit">0</span><span class="pun">],</span><span class="pln">$header</span><span class="pun">);</span></code></li><li class="L6" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        $headers</span><span class="pun">=</span><span class="pln">array</span><span class="pun">();</span></code></li><li class="L7" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="kwd">foreach</span><span class="pun">(</span><span class="pln">$header </span><span class="kwd">as</span><span class="pln"> $k</span><span class="pun">=&gt;</span><span class="pln">$v</span><span class="pun">){</span></code></li><li class="L8" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            $headers</span><span class="pun">[]=</span><span class="pln">$k</span><span class="pun">.</span><span class="str">':'</span><span class="pun">.</span><span class="pln">$v</span><span class="pun">;</span></code></li><li class="L9" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="pun">}</span></code></li><li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        $ch </span><span class="pun">=</span><span class="pln"> curl_init</span><span class="pun">();</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_URL</span><span class="pun">,</span><span class="pln"> $url</span><span class="pun">);</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="com">// 执行后不直接打印出来</span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_RETURNTRANSFER</span><span class="pun">,</span><span class="pln"> </span><span class="kwd">true</span><span class="pun">);</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln">CURLOPT_HEADER</span><span class="pun">,</span><span class="kwd">false</span><span class="pun">);</span></code></li><li class="L5" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLINFO_HEADER_OUT</span><span class="pun">,</span><span class="pln"> </span><span class="kwd">true</span><span class="pun">);</span></code></li><li class="L6" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="com">// 请求头，可以传数组</span></code></li><li class="L7" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_HTTPHEADER</span><span class="pun">,</span><span class="pln"> $headers</span><span class="pun">);</span></code></li><li class="L8" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln">CURLOPT_CONNECTTIMEOUT_MS</span><span class="pun">,</span><span class="pln">$timeoutMs</span><span class="pun">);</span></code></li><li class="L9" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="kwd">if</span><span class="pln"> </span><span class="pun">(!</span><span class="pln">empty</span><span class="pun">(</span><span class="pln">$data</span><span class="pun">))</span><span class="pln"> </span><span class="pun">{</span></code></li><li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            </span><span class="com">// 设置请求方式为post</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_POST</span><span class="pun">,</span><span class="pln"> </span><span class="kwd">true</span><span class="pun">);</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            </span><span class="com">// post的变量</span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_POSTFIELDS</span><span class="pun">,</span><span class="pln"> $data</span><span class="pun">);</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="pun">}</span></code></li><li class="L5" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="com">// 跳过证书检查</span></code></li><li class="L6" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_SSL_VERIFYPEER</span><span class="pun">,</span><span class="pln"> </span><span class="kwd">false</span><span class="pun">);</span></code></li><li class="L7" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="com">// 不从证书中检查SSL加密算法是否存在</span></code></li><li class="L8" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_setopt</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">,</span><span class="pln"> CURLOPT_SSL_VERIFYHOST</span><span class="pun">,</span><span class="pln"> </span><span class="kwd">false</span><span class="pun">);</span></code></li><li class="L9" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        $curRetryTimes </span><span class="pun">=</span><span class="pln"> </span><span class="lit">3</span><span class="pun">;</span></code></li><li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="kwd">do</span><span class="pln"> </span><span class="pun">{</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            $rs </span><span class="pun">=</span><span class="pln"> curl_exec</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">);</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">            $curRetryTimes</span><span class="pun">--;</span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="pun">}</span><span class="pln"> </span><span class="kwd">while</span><span class="pun">(</span><span class="pln">$rs </span><span class="pun">===</span><span class="pln"> FALSE </span><span class="pun">&amp;&amp;</span><span class="pln"> $curRetryTimes </span><span class="pun">&gt;=</span><span class="pln"> </span><span class="lit">0</span><span class="pun">);</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        $request_header </span><span class="pun">=</span><span class="pln"> curl_getinfo</span><span class="pun">(</span><span class="pln"> $ch</span><span class="pun">,</span><span class="pln"> CURLINFO_HEADER_OUT</span><span class="pun">);</span></code></li><li class="L5" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        curl_close</span><span class="pun">(</span><span class="pln">$ch</span><span class="pun">);</span></code></li><li class="L6" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">        </span><span class="kwd">return</span><span class="pln"> $rs</span><span class="pun">;</span></code></li><li class="L7" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    </span><span class="pun">}</span></code></li><li class="L8" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"></code></li><li class="L9" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    $path</span><span class="pun">=</span><span class="str">'C:/tmp/img/sample.png'</span><span class="pun">;</span><span class="com">//本地图片的绝对路径</span></code></li><li class="L0" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    $data</span><span class="pun">[</span><span class="str">'ztk'</span><span class="pun">]=</span><span class="str">'chi_sim'</span><span class="pun">;</span><span class="com">//字体库参数</span></code></li><li class="L1" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    $file </span><span class="pun">=</span><span class="pln"> array</span><span class="pun">(</span></code></li><li class="L2" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">                    </span><span class="str">'img'</span><span class="pln"> </span><span class="pun">=&gt;</span><span class="pln"> </span><span class="kwd">new</span><span class="pln"> \C</span><span class="typ">URLFile</span><span class="pun">(</span><span class="pln">realpath</span><span class="pun">(</span><span class="pln">$path</span><span class="pun">))</span></code></li><li class="L3" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">                </span><span class="pun">);</span><span class="com">//php7以上使用这种方式</span></code></li><li class="L4" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    $datas</span><span class="pun">=</span><span class="pln">array_merge</span><span class="pun">(</span><span class="pln">$file</span><span class="pun">,</span><span class="pln"> $data</span><span class="pun">);</span></code></li><li class="L5" style="background-color: rgb(252, 252, 252);"><code style="color: rgb(221, 17, 68);"><span class="pln">    $re</span><span class="pun">=</span><span class="pln"> curlRequest</span><span class="pun">(</span><span class="str">'http://ggj.api.qinpl.cn/index.php?r=tesseract/identify'</span><span class="pun">,</span><span class="pln"> $datas</span><span class="pun">);</span><span class="com">//$re为接口返回json字符串</span></code></li></ol></pre>
            </div>


        </div>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">访问人数<?php print_r($ip); ?></p>
    </div>
</footer>