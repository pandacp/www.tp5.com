<?php
/**
 * Created by PhpStorm.
 * User: chenp
 * Date: 2018/8/8
 * Time: 12:06
 */

namespace app\admin\controller;


use think\Db;
use think\Request;

class Ticket extends Admin
{
    public function index()
    {
        $pid = input('get.pid', 0);
        $ticket = Db::table('twothink_ticket')->paginate(2);
        $page = $ticket->render();
        $this->assign('ticket',$ticket);//
        $this->assign('page',$page);
        $this->assign('pid', $pid);
        $this->assign('meta_title' , '报修管理');
        return $this->fetch();
    }
    public function edit($id)
    {
        if(request()->isPost()){
            $post_data = Request::instance()->post();
            $Ticket = new \app\admin\model\Ticket();
            //自动验证
            $validate = validate('Ticket');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Ticket->save([
                'title'=>$post_data['title'],
                'name'=>$post_data['name'],
                'tel'=>$post_data['tel'],
                'address'=>$post_data['address'],
                'content'=>$post_data['content'],
//                'update_time'=>date('Y-m-d H:i:s',time()),
            ],['id'=>$post_data['id']]);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        $info = Db::name('ticket')->find($id);
        if($info===false){
            $this->error('获取配置信息错误');
        }
        $this->assign('info',$info);
        $this->meta_title = '编辑导航';
        return $this->fetch();

    }
    public function add()
    {
        //判断请求方式
        if(request()->isPost()){
            $Ticket = model('ticket');
            $post_data = Request::instance()->post();
            //自动验证
            $validate = validate('Ticket');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Ticket->create([
                'title'=>$post_data['title'],
                'name'=>$post_data['name'],
                'tel'=>$post_data['tel'],
                'address'=>$post_data['address'],
                'content'=>$post_data['content'],
            ]);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_channel', 'channel', $data->id, UID);
            } else {
                $this->error($Ticket->getError());
            }
        }else{

//            $this->assign('pid', $pid);
//            $this->assign('info',null);
            $this->assign('meta_title', '新增导航');
            return $this->fetch('edit');
        }
    }
    //删除
    public function del()
    {
        $id = array_unique((array)input('id/a',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        $Ticket = Db::name('ticket')->where($map)->delete();
        if($Ticket){
            //记录行为
            action_log('update_channel', 'channel', $id, UID);
            $this->success('删除成功');
        }else {
            $this->error('删除失败！');
        }

    }

}