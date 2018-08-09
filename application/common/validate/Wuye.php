<?php
/**
 * Created by PhpStorm.
 * User: chenp
 * Date: 2018/8/9
 * Time: 16:12
 */

namespace app\common\validate;


use think\Validate;

class Wuye extends Validate
{
    protected $rule = [
        ['title', 'require', '报修标题不能为空'],
        ['name', 'require', '报修人名称不能为空'],
        ['tel', 'require', '报修人电话不能为空'],
        ['address', 'require', '地址不能为空'],
        ['content', 'require', '报修内容不能为空'],
    ];
}