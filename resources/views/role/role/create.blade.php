@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <div class="col-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form class="forms-sample" method="post" action="{{route('role.role.store')}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">中文名称</label>
                                                                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Chinese name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputName1">英文名称</label>
                                                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="English name">
                                                            </div>
                                                            <button type="submit" class="btn btn-gradient-primary mr-2">添加角色</button>
                                                            <a href="javascript:history.back(-1)" class="btn btn-gradient-danger text-white" style="font-family: 楷体;font-size: 1em">取消</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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