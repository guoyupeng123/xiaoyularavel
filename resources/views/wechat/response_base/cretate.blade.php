@extends('admin.layouts.master')
@section('content')

        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-6" style="margin-bottom: 3%">基本回复</h4>

                            <form class="forms-sample" method="post" action="{{route('wechat.response_base.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">关注回复</label>
                                    <input type="text" name="subscribe" @if($data) value="{{$data['subscribe']}}"  @endif class="form-control" id="exampleInputName1" placeholder="关注回复">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">默认回复</label>
                                    <input type="text" name="default" @if($data) value="{{$data['default']}}" @endif class="form-control" id="exampleInputName1" placeholder="默认回复">
                                </div>
                                <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
