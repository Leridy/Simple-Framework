<?php
/**
 * MVC框架测试控制器.
 * User: wanghui
 * Date: 16/8/28
 * Time: 14:14
 */
namespace app\Home\Controller;
use app\Home\Model\TestModel;
use core\Lib\Controller;


class TestController extends Controller
{

    public function index()
    {
        $model = new TestModel();
        $list = $model->select('wn_user','*');
//        dump($list);
//        $this->with('ss',$list);
        $this->with('title', 'hello Rebel PHP!');
        $this->view('index');
    }


}