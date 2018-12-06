@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header"></div>
        {{--给角色设置权限--}}
        <form action="{{route('role.user.user_set_role_store',$user)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">角色设置</h4>
                                <div class="grid-margin">
                                @foreach($role as $value)
                                    <div class="form-check col-lg-2 float-left">
                                        <label class="form-check-label">
                                            <input type="checkbox"
                                                   {{--这里应该是数组--}}
                                                   name="permissions[]"
                                                   value="{{$value['name']}}"
                                                   class="form-check-input"
                                                   {{--检查用户是否有这个角色  手册，检查用户角色--}}
                                                   @if($user->hasRole($value['name'])) checked @endif
                                            >
                                            {{$value['title']}}
                                            <i class="input-helper"></i></label>
                                    </div>
                                    @endforeach
                                </div>

                        </div>
                    </div>
                </div>
            </div>

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


