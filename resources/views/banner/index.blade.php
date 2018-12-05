@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">点击图片,更换banner</h4>
                    <div class="d-flex">
                        @auth()
                        <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                            <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                            <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{auth()->user()->name}}</font></font></span>
                        </div>
                            @endauth
                    </div>
                    <?php $a = 0;?>
                    <div class="row mt-3">
                        @foreach($banners as $banner)
                        <div class="col-4 pr-1" style="margin-bottom: 2%">
                            <img src="{{$banner['icon']}}" class="mb-2 mw-100 w-100 rounded" alt="{{$banner['title']}}"  onclick="upImagePc(this,{{$banner['id']}})">
                            <span>banner  <?php $a += 1;echo $a;?></span>
                            <a href="javascript:;" onclick="del(this,{{$banner['id']}})" class="float-right badge-danger text-white p-2 mb-6" style="border-radius: 8px">
                                <i class="mdi mdi-delete mr-6 text-white"></i>
                                删除
                            </a>
                            <form action="{{route('banner.banner.update',$banner)}}" method="post" class="col-sm-8 editIocn" id="form-icon{{$banner['id']}}">
                                @csrf @method('PUT')
                                <input type="hidden" name="icon" >
                                <input type="hidden" name="id" value="{{$banner['id']}}">
                            </form>
                            <form action="{{route('banner.banner.destroy',$banner)}}" method="post" class="delete{{$banner['id']}}">
                                @csrf @method('DELETE')
                            </form>

                        </div>
                        @endforeach
                    </div>

                    @push('js')
                        <script>
                            require(['hdjs']);
                            //上传图片
                            function upImagePc(a,b) {
                                // console.log(b)
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
                                        $('#form-icon'+b).submit();
                                        // $("[name='thumb']").val(images[0]);
                                        // $(".img-thumbnail").attr('src', images[0]);
                                    }, options)
                                });
                            }
                            function del(obj,id) {
                                require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                                    swal("确定删除?", {
                                        icon: 'warning',
                                        buttons: {
                                            cancel: "取消",
                                            defeat: '确定',
                                        },
                                    }).then((value) => {
                                        switch (value) {
                                            case "defeat":
                                                $('.delete'+id).submit();
                                                break;
                                            default:
                                        }
                                    });
                                })
                            }


                        </script>

                    @endpush


                </div>
            </div>
        </div>
    </div>

    @endsection