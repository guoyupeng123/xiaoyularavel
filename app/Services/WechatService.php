<?php

namespace App\Services;


use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;

class WechatService extends Controller {
    public function __construct(){
        //与微信通信绑定
        //读取 config/hd_config.php配置文件
        //config()读取框架配置项,框架配置项读取 env 对应数据,env 数据来源我们自己后台
        $config = config('hd_wechat');
        WeChat::config($config);
        WeChat::valid();
    }
//  返回数据
    public function ruleView($rule_id = 0){
//        根据规则id去规则表找数据
        $rule = Rule::find($rule_id);
        //下面这句话是获取 key 这一列数据
        //dd($rule->keyword()->select('key')->get()->toArray());
//        dd($rule->keyword->toArray());
        $ruleData = [
            'name'=>$rule?$rule['name']:'',//规则名称
            'keywords'=>$rule?$rule->keyword()->select('key')->get()->toArray():[],
        ];

//        dd($ruleData);
        return view('wechat.layouts.rule',compact('ruleData'));
    }
//    添加数据
    public function ruleStore($type){
        //dd(request()->all());//就他莫得这样写，操蛋
        $post = request()->all();
//      将json数据转转换成数组
        $rule = json_decode($post['rule'],true);
//      dd($rule);
        \Validator::make($rule,[
            'name'=>'required'
        ],[
            'name.required'=>'规则名称不能为空'
        ])->validate();
//      增加规则  存入数据库
        $ruleModel = Rule::create(['name'=>$rule['name'],'type'=>$type]);
//      循环向数据库增加关键词
        foreach ($rule['keywords'] as $value){
            Keyword::create([
                'rule_id'=>$ruleModel['id'],
                'key'=>$value['key']
            ]);
        }
//      返回当前对象
        return $ruleModel;
    }



    //编辑数据
    public function ruleUpdate($rule_id){
        //执行规则表的编辑
        //dd($rule_id);
        $rule = Rule::find($rule_id);
        $post = request()->all();
        $ruleData = json_decode($post['rule'],true);
        $rule->update(['name'=>$ruleData['name']]);
        //关键词表编辑
        //原来的关键词删除
        $rule->keyword()->delete();
        foreach ($ruleData['keywords'] as $value){
            Keyword::create([
                'rule_id'=>$rule_id,
                'key'=>$value['key']
            ]);
        }
    }


}
