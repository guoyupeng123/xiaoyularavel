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
                                    <i class="mdi mdi-account-outline icon-sm mr-2 text-danger"></i>
                                    <span class="text-danger font-weight-bold">已点赞文章</span>
                                </a>
                                <a href="{{route('member.my_zan',[$user,'type'=>'comment'])}}" class="d-flex align-items-center text-muted font-weight-light">
                                    <i class="mdi mdi-clock icon-sm mr-2"></i>
                                    <span>点赞评论</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--循环文章数组$articles--}}
        @foreach($zansData as $zans)
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex mt-1 align-items-top">
                                <div class="mb-0 flex-grow">
                                    <div class="mr-auto">
                                        {{--文章标题--}}
                                        <h5 class="mr-2 mb-2 d-inline-block">{{$zans->belongsModel->title}}</h5>
                                        {{--查看文章详情--}}
                                        <a href="{{route('home.article.show',$zans->belongsModel)}}" class="float-right btn btn-xs btn-primary chankandd">查看文章</a>
                                        {{--查找收藏当前文章的数据里面有没有当前登录的用户，如果有则显示取消收藏，如果没有则显示收藏--}}
                                        @if($zans->belongsModel->collect->where('user_id',auth()->id())->first())
                                            <a href="{{route('home.collect.make',['type'=>'article','id'=>$zans->belongsModel->id])}}" class="float-right mr-2 btn btn-xs btn-danger chankandd">取消收藏</a>
                                        @else
                                            <a href="{{route('home.collect.make',['type'=>'article','id'=>$zans->belongsModel->id])}}" class="float-right mr-2 btn btn-xs btn-danger chankandd">收藏</a>
                                        @endif
                                    </div>
                                    <p class="mb-0 font-weight-light">{{ str_limit($zans->belongsModel->content, 200, '......') }}</p>
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
