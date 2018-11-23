@extends('member.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($fans as $fan)
                <div class="col-12 col-md-6 col-xl-4 mt-3">
                    <!-- Card -->
                    <div class="card" style="background: #F0F0F0">
                        <div class="card-body text-center">
                            <a href="{{route('member.user.show',$fan)}}" class="avatar avatar-x1 card-avatar">
                                <img src="{{$fan->icon}}" class="avatar-img rounded-circle border border-white" width="40%" height="40%" alt="...">
                            </a>
                            <h2 class="card-title mt-3">
                                <a href="{{route('member.user.show',$fan)}}">{{$fan->name}}</a>
                            </h2>
                            <p class="card-text mt-3">
                                <span class="badge badge-soft-secondary">粉丝:{{$fan->fans->count()}}</span>
                                <span class="badge badge-soft-secondary">关注:{{$fan->following->count()}}</span>
                            </p>
                            @auth()
                            <hr class="mt-5">
                            <div class="col-auto">
                                    @if($fan->fans->contains(auth()->user()))
                                    <a href="{{route('member.attention',$fan)}}" class="btn btn-block btn-sm btn-primary pt--6 pb--6">
                                        取消关注
                                    </a>
                                    @else
                                    <a href="{{route('member.attention',$fan)}}" class="btn btn-block btn-sm btn-danger">
                                    <i class="mdi mdi-duck"></i> 关注
                                    </a>
                                        @endif

                            </div>
                            <hr>
                                @endauth
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
    @endsection
