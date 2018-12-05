{{--模板继承 -- 加载父级模板--}}
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <font style="vertical-align: inherit;">邮件配置</font>
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
                                        <font style="vertical-align: inherit;">驱动</font>
                                    </font>
                                </label>

                                <input type="text" name="MAIL_DRIVER" value="{{$config['data']['MAIL_DRIVER']??'smtp'}}" class="form-control" id="exampleInputName1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">主机</font>
                                    </font>
                                </label>
                                <input type="text" name="MAIL_HOST" value="{{$config['data']['MAIL_HOST']??'smtp.qq.com'}}" class="form-control" id="exampleInputPassword4" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">端口</font>
                                    </font>
                                </label>
                                <input type="text" name="MAIL_PORT" value="{{$config['data']['MAIL_PORT']??'25'}}" class="form-control" id="exampleInputPassword4" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">账号</font>
                                    </font>
                                </label>
                                <input type="text" name="MAIL_USERNAME" value="{{$config['data']['MAIL_USERNAME']}}" class="form-control" id="exampleInputPassword4" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">密码</font>
                                    </font>
                                </label>
                                <input type="text" name="MAIL_PASSWORD" value="{{$config['data']['MAIL_PASSWORD']}}" class="form-control" id="exampleInputPassword4" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">发信邮箱</font>
                                    </font>
                                </label>
                                <input type="text" name="MAIL_FROM_ADDRESS" value="{{$config['data']['MAIL_FROM_ADDRESS']}}" class="form-control" id="exampleInputPassword4" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">发信人</font>
                                    </font>
                                </label>
                                <input type="text" name="MAIL_FROM_NAME" value="{{$config['data']['MAIL_FROM_NAME']}}" class="form-control" id="exampleInputPassword4" placeholder="">
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