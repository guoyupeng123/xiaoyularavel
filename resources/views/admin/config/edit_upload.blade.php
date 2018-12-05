{{--模板继承 -- 加载父级模板--}}
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <font style="vertical-align: inherit;">上传配置</font>
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.config.update',['name'=>$name])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">上传大小</font>
                                    </font>
                                </label>
                                <input type="text" name="size" value="{{hd_config('upload.size')}}" class="form-control" id="exampleInputName1" placeholder="size">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">上传类型</font>
                                    </font>
                                </label>
                                <input type="text" name="type" value="{{hd_config('upload.type')}}" class="form-control" id="exampleInputPassword4" placeholder="类型举例 以 | 隔开">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">提交</font></font>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection