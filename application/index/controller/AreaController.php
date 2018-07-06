<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6
 * Time: 10:24
 */

namespace app\index\controller;


use think\Controller;

class AreaController extends Controller
{
    //三级联动
    public function area()
    {
        if(request()->isAjax()) {
            $code = input('post.code');
            $lists = db('area')->where('pid', $code)->select();
            return json(['code'=> 1, 'data' => $lists, 'msg' => 'ok']);
        }
        $province = db('area')->where('pid', 0)->select();

        $this->assign([
            'province' => $province
        ]);
        return $this->fetch();
    }
}