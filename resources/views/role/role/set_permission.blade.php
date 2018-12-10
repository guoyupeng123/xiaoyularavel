@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header"></div>
        {{--给角色设置权限--}}
        <form action="{{route('role.role.set_role_permission',$role)}}" method="post">
            @csrf
            @foreach($modules as $module)
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">{{$module['title']}}</h4>
                                <div class="grid-margin">
                                    @foreach($module['permissions'] as $permission)
                                    <div class="form-check col-lg-2 float-left">
                                        <label class="form-check-label">
                                            <input type="checkbox"
                                                   {{--这里应该是数组--}}
                                                   name="permissions[]"
                                                   value="{{$module['name'] . '-' . $permission['name']}}"
                                                   class="form-check-input"
                                                   {{--$role->hasPermissionTo('edit_articles');检查权限 -> 检查角色是否拥有摸个权限--}}
                                                   @if($role->hasPermissionTo($module['name'].'-'.$permission['name'])) checked @endif
                                                    {{--此判断是所有角色都给一个登录权限--}}
                                                   @if('Admin-admin-index' == $module['name'].'-'.$permission['name']) checked  readonly="readonly"  @endif
                                            >
                                            {{$permission['title']}}
                                            <i class="input-helper"></i></label>
                                    </div>
                                    @endforeach
                                </div>

                        </div>
                    </div>
                </div>
            </div>
           @endforeach
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                   <button class="btn btn-primary m-auto">提交</button>
                </div>
            </div>
        </form>

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


