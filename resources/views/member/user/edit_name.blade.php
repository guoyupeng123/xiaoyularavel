@extends('member.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">是否要重置您的昵称</h4>
                        <p class="card-description">
                            Modify the nickname
                        </p>
                        <form class="forms-sample" action="{{route('member.user.update',auth()->user())}}" method="post">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="{{auth()->user()->name}}">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
