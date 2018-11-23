<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //处理上传
    public function uploader(Request $request){
//      dd(1111);//测试是否运行到这里的
        //$path = $request->file('avatar')->store('avatars');
        //$path = $request->file('上传表单name名')->store('上传文件存储目录','指定磁盘(对应config/filesystem.php中disk)');
        //dd($_FILES);//来打印上传表单的name名  这里是file
//        $path = $request->file('file')->store('attachment','attachment');
        $file = $request->file('file');
//        dd($file);

//        验证图片大小以及类型
        $this->checkSize($file);
        $this->checkType($file);

//        判断上传表单name值存不存在
        if($file){
            $path = $file->store('attachment','attachment');
//            dd($path);//路径
//          dd(url($path));//加上域名路径
            auth()->user()->attachment()->create([
                //$file->getClientOriginalName()获取客户端原始文件名
                'name'=>$file->getClientOriginalName(),
                'path'=>url($path)
            ]);
        }

        return ['file' =>url($path), 'code' => 0];

    }
//    验证图片大小
    public function checkSize($file){
//      $size->getSize()  获取当前传提交过来的图片的大小
        if ($file->getSize()>99999999){
            //return  ['message' =>'上传文件过大', 'code' => 403];
            //使用异常类处理上传异常
            //创建异常类:exception
            throw new UploadException('上传图片过大');
        }
    }
//  验证图片类型
    public function checkType($file){
//      $file->getClientOriginalExtension()  获取当前传提交过来的图片的类型
        if (!in_array(strtolower($file->getClientOriginalExtension()),['jpg','png','gif'])){
            throw new UploadException('上传图片类型不允许');
        }
    }

    //获取图片列表
    public function filesLists(){
//      获取当前的用户已经提交的数据
        $files = auth()->user()->attachment()->paginate(20);
//      这里是hdjs需要返回的数据
        $data = [];
        foreach($files as $file){
            $data[] = [
                'url'=>$file['path'],
                'path'=>$file['path']
            ];
        }
//        dd($data);
        return [
            'data'=>$data,
            'page'=>$files->links() . '',//这里一定要注意分页后面拼接一个空字符串
            'code'=> 0
        ];
    }
}
