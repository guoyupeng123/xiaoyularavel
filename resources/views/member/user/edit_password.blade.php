@extends('member.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">是否要重置您的密码</h4>
                        <p class="card-description">
                            Reset Password
                        </p>
                        <form class="forms-sample" action="{{route('member.user.update',auth()->user())}}" method="post">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="请输入密码">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail3" placeholder="请再次输入密码">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
