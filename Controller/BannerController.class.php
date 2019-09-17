<?php
/**
 * Created by PhpStorm.
 * User: cycle_3
 * Email: 953006367@qq.com
 * Date: 2019/9/16
 * Time: 18:07
 */
namespace Banner\Controller;

use Common\Controller\AdminBase;
use Banner\Service\BannerService;

/**
 * 轮播图管理
 * Class BannerController
 * @package Group\Controller
 */
class BannerController extends AdminBase
{
    /**
     * 轮播图列表
     */
    public function bannerList(){
        if(IS_AJAX){
            $where = [];
            $page = I('page','1','trim');
            $limit = I('limit','20','trim');
            $where['is_delete'] = '0';
            $title = I('title','','trim');
            if($title) $where['title'] = ['like',['%'.$title.'%']];
            $type = I('type','','trim');
            if($type) $where['type'] = $type;
            $res = BannerService::getBannerList($where,'listorder desc,id desc',$page,$limit);
            $this->ajaxReturn($res);
        } else {
            $this->display();
        }
    }

    /**
     * 轮播图详情
     */
    public function bannerDetails(){
        if(IS_AJAX){
            $id = I('id','','trim');
            $res = BannerService::getBannerDetails($id);
            $this->ajaxReturn($res);
        } else {
            $this->display();
        }
    }

    /**
     * 添加或者编辑轮播图
     */
    public function addEditBanner(){
        $post = I('post.');
        $res = BannerService::addEditBanner($post);
        $this->ajaxReturn($res);
    }

    /**
     * 编辑分类资料
     */
    public function updatinBanner(){
        $id = I('id','','trim'); //id
        $field = I('field','','trim'); //字段
        $value = I('value','','trim'); //值
        $res = BannerService::updatinBanner($id,$field,$value);
        $this->ajaxReturn($res);
    }

}