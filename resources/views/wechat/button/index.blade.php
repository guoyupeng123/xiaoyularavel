@extends('admin.layouts.master')
@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-primary mb-6 d-inline-block">微信菜单</h4>
                        <a href="{{route('wechat.button.create')}}" class="ml-8 d-inline-block badge-danger p-2 float-right text-white" style="margin-left: 70%;font-size: 0.8em;">菜单增加</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><strong>编号</strong></th>
                                    <th><strong>菜单标题</strong></th>
                                    <th><strong>状态</strong></th>
                                    <th><strong>编辑删除</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($buttons['data'] as $button)
                            <tr>

                                <td>{{$button['id']}}</td>
                                <td>{{$button['title']}}</td>
                                <td>
                                    @if($button['status'] == 1)
                                        <a href="javascript:;" class="badge badge-info">已推送</a>
                                        @else
                                        <a href="{{route('wechat.button.push',$button)}}" class="badge badge-danger">推送</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('wechat.button.edit',$button)}}" class="badge badge-primary text-white">编辑</a>
                                    <a href="javascript:;" onclick="del(this)" class="badge badge-danger text-white">删除</a>
                                    <form action="{{route('wechat.button.destroy',$button)}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


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
