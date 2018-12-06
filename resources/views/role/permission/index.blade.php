@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="row mb-4 mt-4">
            <div class="col-lg-1"></div>
            <h3 class="col-lg-9 page-title text-primary pl-4">权限列表</h3>
            <div class="col-lg-1"><a href="{{route('role.permission.forget_permission_cache')}}">清除缓存</a></div>
        </div>
        @foreach($modules as $module)
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 grid-margin stretch-card ml-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-muted">{{$module['title']}}</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    @foreach($module['permissions'] as $value)
                                    <td>{{$value['title']}} <pan class="text-primary">/ {{$module['name']}}-{{$value['name']}}</pan></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection