<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2019/4/29
 * Time: 下午7:13
 */

namespace api\web\Tools;
class Msg
{
    /**
     * 返回json信息
     * @param string $msg
     * @param string $status
     * @param array $data
     * @param string $type
     */
    public static  function message( $data=array(),$status='',$msg='',$type='die' )
    {
        $arr = array('msg'=>$msg,'status'=>$status,'data'=>$data);
        return json_encode($arr);
    }


    /**
     * 返回增删改等操作的结果
     * @param array $data
     * @param string $successMsg
     * @param string $errorMsg
     */
    public static function returnjson( $data=array(), $successMsg='操作成功', $errorMsg='操作失败' )
    {
        if( !empty($data) )
        {
            self::message($data,1,$successMsg);
        }else{
            self::message($data,0,$errorMsg);
        }
    }



    /**
     * 返回增删改等操作的结果
     * @param $result
     * @param string $operateType
     * @param string $subject_name
     */
    public static function returnResultJson( $result, $operateType='', $subject_name='' )
    {
        if( (int)$result>=1 )
        {
            $tmp_name = $subject_name;
            $subject_name = $subject_name!=='' ? "恭喜您，{$subject_name}" : "恭喜您，";
            if($operateType==='insert')
            {
                $successMsg = $subject_name . '添加成功!';
            }
            elseif($operateType==='update')
            {
                $successMsg = $subject_name . '修改成功!';
            }
            elseif($operateType==='delete')
            {
                $successMsg = $subject_name . '删除成功!';
            }
            elseif($operateType==='find')
            {
                $successMsg = $subject_name . '已为您找到符合条件的记录!';
            }
            elseif($operateType==='exists')
            {
                $result = 0;
                $successMsg = "很抱歉，" . $tmp_name . ' 字段已存在!';
            }
            else
            {
                $successMsg = '恭喜您，操作成功!';
            }
            self::message($result, (int)$result, $successMsg);
        }
        elseif((int)$result===0)
        {
            $subject_name = $subject_name!=='' ? "很抱歉，{$subject_name}" : "很抱歉，";
            if($operateType==='insert')
            {
                $errorMsg = $subject_name . '添加失败!';
            }
            elseif($operateType==='update')
            {
                $errorMsg = $subject_name . '修改失败!';
            }
            elseif($operateType==='delete')
            {
                $errorMsg = $subject_name . '删除失败!';
            }
            elseif($operateType==='find')
            {
                $errorMsg = $subject_name . '没有找到符合条件的记录!';
            }
            else
            {
                $errorMsg = '很抱歉，操作失败!';
            }
            self::message($result, 0, $errorMsg);
        }
        else
        {
            self::message($result, -1, '该记录不存在，无法执行操作!');
        }
    }


}