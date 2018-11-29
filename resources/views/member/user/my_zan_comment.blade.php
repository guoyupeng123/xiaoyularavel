@extends('member.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            @auth()
                                <a href="{{route('member.my_zan',[$user,'type'=>'article'])}}" class="d-flex align-items-center mr-4 text-muted font-weight-light">
                                    <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                                    <span>已点赞文章</span>
                                </a>
                                <a href="{{route('member.my_zan',[$user,'type'=>'comment'])}}" class="d-flex align-items-center text-muted font-weight-light">
                                    <i class="mdi mdi-clock icon-sm mr-2 text-danger"></i>
                                    <span  class="text-danger font-weight-bold">点赞评论</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--点赞评论$zansData--}}
        @foreach($zansData as $zans)
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex mt-2 align-items-top">
                                <img src="{{$zans->belongsModel->article->user->icon}}" class="img-sm rounded-circle mr-3" alt="{{$zans->belongsModel->article->user->name}}">
                                <div class="mb-0 flex-grow">
                                    <h6 class="mr-2 mb-2"><i class="mdi mdi-forum icon-sm mr-1 text-danger"></i> {{$zans->belongsModel->article->title}} <i class="mdi mdi-account icon-sm mr-1 text-danger" style="margin-left: 10%"></i> {{$zans->belongsModel->article->user->name}}</h6>
                                    <p class="mb-0 font-weight-light mt-4">评论内容 : {{$zans->belongsModel->content}}</p>
                                </div>
                                <div class="ml-auto">
                                   <a href="{{route('home.article.show',$zans->belongsModel->article->id)}}" class="text-danger text-sm-right">查看</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{--{{$articles->links()}}--}}


    </div>
    @endsection
