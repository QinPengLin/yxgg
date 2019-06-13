<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/6/13
 * Time: 下午4:38
 */
namespace api\web\Tools;
use Yii;
/**
 * post和get请求类
 */
class Request{
    /**
     * 统一接口请求
     * @param string $url 请求的链接
     * @param array $data POST的数据
     * @param int $timeoutMs 超时设置，单位：毫秒
     * @return string 接口返回的内容，超时返回false
     */
    public static function curlRequest($url, $data=array(),$header=array(), $timeoutMs = 3000) {
        //$data=json_encode($data);
        $header_default=array([
            'User-Agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240',
            'Accept'=>'text/html, application/xhtml+xml, image/jxr, */*',
            'Accept-Encoding'=>'*',
            'Accept-Language'=>'zh-CN'
        ]);//请求头的默认配置
        $header=array_merge($header_default[0],$header);
        $headers=array();
        foreach($header as $k=>$v){
            $headers[]=$k.':'.$v;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        // 请求头，可以传数组
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT_MS,$timeoutMs);
        if (!empty($data)) {
            // 设置请求方式为post
            curl_setopt($ch, CURLOPT_POST, true);
            // post的变量
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $curRetryTimes = 3;
        do {
            $rs = curl_exec($ch);
            $curRetryTimes--;
        } while($rs === FALSE && $curRetryTimes >= 0);
        $request_header = curl_getinfo( $ch, CURLINFO_HEADER_OUT);
        curl_close($ch);


        return $rs;
    }
}