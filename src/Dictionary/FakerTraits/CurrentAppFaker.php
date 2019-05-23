<?php
namespace HuoUtils\Dictionary\FakerTraits;

use HuoUtils\CommonBase\FileUtil;
use App\Model\SysArea;

/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/4/11
 * Time: 10:49
 */
trait CurrentAppFaker{


    public function areaName()
    {
        return SysArea::where('id', '<', '300')->inRandomOrder()->value('name');
    }

    public function agnecyNameSuffix()
    {
        $arr = ["会计所"];
        return array_random($arr);
    }

    public function unitNameSuffix()
    {
        $units = [
            '财务部主管财政厅',
            '教育部主管办公厅'
        ];
        return  array_random($units);
    }

    public function docNameSuffix()
    {
        $arr= [
            '关于深化"互联网+政务服务" 的一网,一门,一次改革方案',
            '2019年信息化和网络安全工作要点的通知',
            '成立会计学专业认证工作委员会的通知',
            "实践基地建设管理暂行办法的要点报告"
        ];
        return array_random($arr);

    }


    public function projectName()
    {
        $arr = [
            '内控建设',
            '财政局',
            '政府',
            '工信委',
            '交通局'
        ];
        return $this->areaName().array_random($arr)."项目";

    }


    public function projectCardName()
    {
        $arr = [
            '参考',
            '现状',
            "过程"
        ];
        return $this->areaName() . array_random($arr) . '库';

    }


    public function additionFilUrl()
    {
        $user_id = 2;
        $base_dir = storage_path('admin/docs/'.$user_id.'/');
        $arr = collect(FileUtil::allFile($base_dir))->reject((function ($value,$key){

                    return ends_with($value,'.pdf');
        }))->toArray();
        $base64_path = base64_encode($base_dir.array_random($arr));
        return url('visitdoc/index/' . $user_id . '/' . $base64_path);

        
    }


    public function libName()
    {
        return $this->areaName() . "标准库";

    }

}
