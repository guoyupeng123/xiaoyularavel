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
                                        {{--<h4 class="card-title">基本表</h4>--}}
                                        <span class="float-right bg-dark text-white p-2" style="border-radius: 5px"><a class="text-white" href="{{route('role.role.create')}}">增加</a></span>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>角色中文名称</th>
                                                <th>角色英文表示</th>
                                                <th>守卫</th>
                                                <th>创建时间</th>
                                                <th>
                                                    <span class="text-danger p-3">设置</span>
                                                    <span class="text-muted">|</span>
                                                    <span class="text-info p-2">编辑</span>
                                                    <span class="text-muted">|</span>
                                                    <span class="text-primary p-2">删除</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($role as $value)
                                                <tr>
                                                    <td>{{$value['title']}}</td>
                                                    <td>{{$value['name']}}</td>
                                                    <td>{{$value['guard_name']}}</td>
                                                    <td class="text-danger">{{$value->created_at->diffForHumans()}}</td>
                                                    <td>
                                                        <a href="{{route('role.role.show',$value)}}" class="bg-danger p-2 text-white" style="border-radius: 4px">权限设置</a>
                                                        <a href="{{route('role.role.edit',$value)}}" class="bg-info p-2 text-white" style="border-radius: 4px">编辑</a>
                                                        <a href="javascript:;" onclick="del(this)" class="bg-primary p-2 text-white" style="border-radius: 4px">删除</a>
                                                        <form action="{{route('role.role.destroy',$value)}}" method="post">
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


