@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('wechat.response_text.index')}}" class="card-title d-inline-block text-primary">回复列表</a>
                        <a href="{{route('wechat.response_text.create')}}" class="card-title d-inline-block text-muted" style="margin-left: 2%">添加回复</a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>规则名称</th>
                                <th>关键词</th>
                                <th>编辑 / 删除</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($flie as $value)
                            <tr>
                                <td class="py-1">{{$value['id']}}</td>
                                <td>{{$value->rule->name}}</td>
                                <td>{{implode(" | ",$value->rule->keyword->pluck('key')->toArray())}}</td>
                                <td>
                                    <a href="{{route('wechat.response_text.edit',$value)}}" class="bg-danger text-white p-2">编辑</a>
                                    <a href="javascript:;" onclick="del(this)" class="bg-dark text-white p-2 ml-3">删除</a>
                                    <form action="{{route('wechat.response_text.destroy',$value)}}" method="post">
                                            @csrf @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @push('js')
                            <script>
                                function del(obj) {
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
                                                    $(obj).next('form').submit();
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
    </div>
@endsection

