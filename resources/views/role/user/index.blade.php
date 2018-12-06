@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">角色管理</h4>
                        <p class="card-description">management <code>.table</code></p>
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th style="font-size: 1.4em">编号</th>
                                                    <th style="font-size: 1.4em">姓名</th>
                                                    <th style="font-size: 1.4em">email 邮箱</th>
                                                    <th style="font-size: 1.4em">创建时间</th>
                                                    <th ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user as $us)
                                            <tr>
                                                <td>{{$us['id']}}</td>
                                                <td>{{$us['name']}}</td>
                                                <td>{{$us['email']}}</td>
                                                <td>{{$us['created_at']}}</td>
                                                <td>
                                                    <a href="{{route('role.user.user_set_role_create',$us)}}" class="bg-danger text-white p-2">角色设置</a>
                                                    <a href="javascript:;" onclick="del(this)" class="bg-dark text-white p-2">删除</a>
                                                    <form action="{{route('role.user.user_set_role_delete',$us)}}" method="post">
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div  class="m-auto">{{$user->links()}}</div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        function del(obj) {
            require(['hdjs','bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(obj).next('form').submit();
                })
            })
        }
    </script>
    @endpush


