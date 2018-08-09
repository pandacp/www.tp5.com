<?php
/**
 * Created by PhpStorm.
 * User: chenp
 * Date: 2018/8/9
 * Time: 15:33
 */

namespace app\home\controller;

use app\admin\model\Ticket;
use think\Controller;
use think\Db;
use think\Request;

class Wuye extends Controller
{
    //小区通知
    public function index($id)
    {
        $infos = Db::table('twothink_document')->where('category_id',$id)->where('create_time','<',time())->select();
//        var_dump($infos);
        $this->assign('infos',$infos);
        return $this->fetch('default/wuye/index');
    }
    //通知详情
    public function detail($id)
    {
        $detail = Db::table('twothink_document')->where('id',$id)->select();
        $view =0;
        foreach ($detail as $value){
            $view+=$value['view'];
        }
        Db::table('twothink_document')->where('id',$id)->setInc('view');//setInc()字段自增1
        $this->assign('detail',$detail);
        return $this->fetch('default/wuye/notice-detail');
    }

    //添加在线报修
    public function add()
    {
        //判断请求方式
        if(request()->isPost()){
            $wuye = model('Wuye');
            $post_data = Request::instance()->post();
            //自动验证
            $validate = validate('Wuye');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $ticket = new Ticket();
            $data = $ticket->create([
                'title'=>$post_data['title'],
                'name'=>$post_data['name'],
                'tel'=>$post_data['tel'],
                'address'=>$post_data['address'],
                'content'=>$post_data['content'],
            ]);
            if($data){
                $this->success('报修成功', url('http://www.tp5.com/home/index/index.html'));
                //记录行为
                action_log('update_channel', 'channel', $data->id, UID);
            } else {
                $this->error($wuye->getError());
            }
        }else{
            //加载视图
//            $this->assign('meta_title', '新增导航');
            return $this->fetch('default/wuye/edit');
        }

    }
}