@extends('admin.layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0">

                                </div>
                            </div>
                        </div>
                        <img src="{{asset('org/images/banner.jpg')}}" id="imgicon" alt="点击上传图片" onclick="upImagePc(this)" style="height: 343px; display: block; width: 600px;border-radius: 15px;margin-left: 211px">
                        <h3 class="text-primary text-center" style="margin-top: 60px;">建议上传1920*1080的图片,这样更清晰哦!</h3>
                        <form action="{{route('banner.banner.store')}}" method="post" class="col-sm-8 editIocn" id="form-icon">
                            @csrf
                            <input type="hidden" name="icon" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            require(['hdjs']);
            //上传图片
            function upImagePc() {
                require(['hdjs'], function (hdjs) {
                    var options = {
                        multiple: false,//是否允许多图上传
                        //data是向后台服务器提交的POST数据
                        data: {name: '后盾人', year: 2099},
                    };
                    hdjs.image(function (images) {
                        //上传成功的图片，数组类型
                        // alert(images);
                        // 上传会把路径返回过来，图片替换，user表里面的icon替换

                        // 让表单里面的input的value替换
                        $("[name='icon']").val(images[0]);
                        // 更改图片的src属性
                        $("#imgicon").attr('src',images[0]);
                        // 触发表单提交
                        $('.editIocn').submit();
                        // $("[name='thumb']").val(images[0]);
                        // $(".img-thumbnail").attr('src', images[0]);
                    }, options)
                });
            }



        </script>

@endpush
    @endsection