<?php
/**
 * Created by PhpStorm.
 * User: cycle_3
 * Email: 953006367@qq.com
 * Date: 2019/9/6
 * Time: 11:56
 */

namespace Banner\Model;

use Common\Model\RelationModel;

class CommonlyBannerModel extends RelationModel
{

    protected $tableName = 'commonly_banner';

    const DEFAULT_TYPE = 'default';  //默认分类


    /**
     * 校验
     * @param $data
     * @return array
     */
    static function CheckData($data){
        if(!$data['title']) return createReturn(false,null,'名称不能为空');
        if(!$data['type'])  return createReturn(false,null,'我们不建议类型为空');
        if(!$data['cover_url'])  return createReturn(false,null,'缩略图我们不建议为空');
        if(!$data['title']) return createReturn(false,null,'轮播图名称我们不建议为空');
        $condition['title'] = $data['title'];
        $condition['updatetime'] = time();
        $condition['type'] = $data['type'];
        $condition['is_display'] = $data['is_display'];
        if($data['listorder']) $condition['listorder'] = $data['listorder'];
        $condition['link'] = $data['link'];
        $condition['cover_url'] = $data['cover_url'];
        return createReturn(true,$condition,'校验成功');
    }

}