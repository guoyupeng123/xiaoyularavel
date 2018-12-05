{{--模板继承 -- 加载父级模板--}}
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <font style="vertical-align: inherit;">网站基本配置</font>
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
                                        <font style="vertical-align: inherit;">网站标题</font>
                                    </font>
                                </label>
                                <input type="text" name="title" value="{{hd_config('base.title')}}" class="form-control" id="exampleInputName1" placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">网站关键词</font>
                                    </font>
                                </label>
                                <input type="text" name="keyword" value="{{hd_config('base.keyword')}}" class="form-control" id="exampleInputEmail3" placeholder="antistop">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">网站描述</font>
                                    </font>
                                </label>
                                <input type="text" name="description" value="{{hd_config('base.description')}}" class="form-control" id="exampleInputPassword4" placeholder="description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">ICP备案</font>
                                    </font>
                                </label>
                                <input type="text" name="icp" value="{{hd_config('base.icp')}}" class="form-control" id="exampleInputPassword4" placeholder="description tag">
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