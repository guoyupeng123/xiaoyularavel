@extends('member.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            @auth()
                                <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                                    <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                                    <span>{{$user->name}}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted font-weight-light">
                                    <i class="mdi mdi-clock icon-sm mr-2"></i>
                                    <span>{{$user->created_at}}</span>
                                </div>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--循环文章数组$articles--}}
        @foreach($articles as $article)
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mt-1 align-items-top">
                            <div class="mb-0 flex-grow">
                                <div class="mr-auto">
                                    {{--文章标题--}}
                                    <h5 class="mr-2 mb-2 d-inline-block">{{$article->title}}</h5>
                                    {{--查看文章详情--}}
                                    <a href="{{route('home.article.show',$article)}}" class="float-right btn btn-xs btn-primary chankandd">查看文章</a>
                                    {{--查找收藏当前文章的数据里面有没有当前登录的用户，如果有则显示取消收藏，如果没有则显示收藏--}}
                                    @if($article->collect->where('user_id',auth()->id())->first())
                                    <a href="{{route('home.collect.make',['type'=>'article','id'=>$article['id']])}}" class="float-right mr-2 btn btn-xs btn-danger chankandd">取消收藏</a>
                                         @else
                                    <a href="{{route('home.collect.make',['type'=>'article','id'=>$article['id']])}}" class="float-right mr-2 btn btn-xs btn-danger chankandd">收藏</a>
                                        @endif
                                </div>
                                <p class="mb-0 font-weight-light">{{ str_limit($article->content, 200, '......') }}</p>
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
