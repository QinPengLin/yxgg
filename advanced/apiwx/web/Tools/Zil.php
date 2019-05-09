<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午8:24
 */
namespace apiwx\web\Tools;
class Zil
{
public static function zilStr($data){
    /**
     * 将公告压缩成一行字符
     */
    if (extension_loaded('zlib')){
        ob_end_clean();
        ob_start('ob_gzhandler');
    }else{
        ob_end_clean();
        ob_start();
    }
    foreach ($data as $k=>$v){
        $data[$k]=ltrim(rtrim(preg_replace(array("/> *([^ ]*) *</","//","'/\*[^*]*\*/'","/\r\n/","/\n/","/\t/",'/>[ ]+</'),array(">\\1<",'','','','','','><'),$v)));
    }
   ob_end_clean();
    return $data;
}
}