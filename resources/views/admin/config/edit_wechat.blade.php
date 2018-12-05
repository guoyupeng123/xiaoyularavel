{{--模板继承 -- 加载父级模板--}}
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <font style="vertical-align: inherit;">微信配置</font>
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
                                        <font style="vertical-align: inherit;">wechat_token</font>
                                    </font>
                                </label>
                                <input type="text" name="WECHAT_TOKEN" value="{{$config['data']['WECHAT_TOKEN']}}" class="form-control" id="exampleInputName1" placeholder="token">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">wechat_appid</font>
                                    </font>
                                </label>
                                <input type="text" name="WECHAT_APPID" value="{{$config['data']['WECHAT_APPID']}}" class="form-control" id="exampleInputName1" placeholder="appid">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword4">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">wechat_appsecret</font>
                                    </font>
                                </label>
                                <input type="text" name="WECHAT_APPSECRET" value="{{$config['data']['WECHAT_APPSECRET']}}" class="form-control" id="exampleInputPassword4" placeholder="appsecret">
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