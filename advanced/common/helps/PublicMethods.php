<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/5/5
 * Time: 下午5:37
 */
namespace common\helps;



class PublicMethods{

    public static function isParameter($data,$key){//必要参数验证
        foreach ($key as $v){
            if (!isset($data[$v])){
                return false;
            }
        }
        return true;
    }
    public static function decryption($data){//解密对应encryption函数
        $config_arr=array(
            1=>['f'=>0,'G'=>1,'u'=>2,'d'=>3,'2'=>4,'i'=>5,'R'=>6,'L'=>7,'8'=>8,'a'=>9],
            2=>['E'=>0,'G'=>1,'K'=>2,'3'=>3,'P'=>4,'1'=>5,'i'=>6,'s'=>7,'z'=>8,'T'=>9],
            3=>['V'=>0,'w'=>1,'H'=>2,'9'=>3,'J'=>4,'0'=>5,'X'=>6,'y'=>7,'o'=>8,'Q'=>9],
            4=>['I'=>0,'V'=>1,'6'=>2,'L'=>3,'7'=>4,'W'=>5,'9'=>6,'f'=>7,'3'=>8,'N'=>9]
        );
        $config_arr_c=array(
            'L'=>1,
            '9'=>2,
            'p'=>3,
            'a'=>4
        );
        $config_arr_k=array(
            1=>['f','G','u','d','2','i','R','L','8','a'],
            2=>['E','G','K','3','P','1','i','s','z','T'],
            3=>['V','w','H','9','J','0','X','y','o','Q'],
            4=>['I','V','6','L','7','W','9','f','3','N']
        );
        $config_arr_c_k=array(
            'L',
            '9',
            'p',
            'a'
        );
        $y_data = explode("5", $data);
        if(isset($y_data[0]) && !empty($y_data[0]) && in_array($y_data[0],$config_arr_c_k)) {
            $sw = $y_data[0];
        }else{
            return false;
        }
        $xz = $config_arr_c[$sw];
        if(isset($y_data[2]) && !empty($y_data[2])) {
            $re_data = self::caif($y_data[2]);
        }else{
            return false;
        }
        $reff_data = array();
        foreach ($re_data as $v) {
            if(in_array($v,$config_arr_k[$xz])) {
                $reff_data[] = $config_arr[$xz][$v];
            }else{
                return false;
            }
        }
        $ret_datas = implode("", $reff_data);

        return $ret_datas;
    }
    public static function encryption($data){//只加密数字
        $config_arr=array(
            1=>['f','G','u','d','2','i','R','L','8','a'],
            2=>['E','G','K','3','P','1','i','s','z','T'],
            3=>['V','w','H','9','J','0','X','y','o','Q'],
            4=>['I','V','6','L','7','W','9','f','3','N']
        );
        $config_arr_c=array(
            1=>'L',
            2=>'9',
            3=>'p',
            4=>'a'
        );
        if(is_numeric($data)){//5作为分界符
            $xz=mt_rand(1,4);
            $sw=$config_arr_c[$xz];
            $t=time();
            $w_s=11-strlen($data);
            $i_t=substr($t,-$w_s);
            $re_data=self::caif($data);
            $re_t=self::caif($i_t);
            $rre_data=array();
            $rre_t=array();
            foreach ($re_data as $v){
                $rre_data[]=$config_arr[$xz][$v];
            }
            foreach ($re_t as $v){
                $rre_t[]=$config_arr[$xz][$v];
            }
            $rre_data_str=implode("", $rre_data);
            $rre_t_str=implode("", $rre_t);
            $re_str=$sw.'5'.$rre_t_str.'5'.$rre_data_str;
            return $re_str;
        }
    }

    public static function caif($data){
        $data=(string)$data;
        $l=strlen($data);
        $arra=[];
        for ($x=0; $x<$l; $x++){
            $arra[]=$data[$x];
        }
        return $arra;
    }


}