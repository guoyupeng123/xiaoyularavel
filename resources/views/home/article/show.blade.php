@extends('home.layouts.master')

@section('homecentend')
    <div class="main-content">

        <div class="container">
            <div class="row edu-topic-show mt-3">
                <div class="col-12 col-xl-9">
                    <div class="card card-body p-5">
                        <div class="row">
                            <div class="col text-right">
                                <a href="#" class="btn btn-xs">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <h2 class="mb-4">
                                   {{$article->title}}
                                </h2>
                                <p class="text-muted mb-1 text-muted small">
                                    <a href="{{route('member.user.show',$article->user)}}" class="text-secondary">
                                       dd <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    </a><a href="" class="text-secondary"> {{$article->user->title}}</a>

                                    <i class="fa fa-clock-o ml-2" aria-hidden="true"></i>
                                    {{$article->created_at->diffForHumans()}}

                                    <a href="{{route('home.article.index',['category'=>$article->category_id])}}" class="text-secondary">
                                        <i class="fa fa-folder-o ml-2" aria-hidden="true"></i>
                                        {{$article->category->title}}
                                    </a>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="markdown editormd-html" id="content">
                                   <textarea name="content" id="" hidden >{{$article->content}}</textarea>
                                </div>
                            </div>
                        </div>

                        {{--引入评论模块--}}
                        @include('home.layouts.comment')


                    </div>
                </div>
                <div class="col-12 col-xl-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{route('member.user.show',$article->user)}}" class="text-secondary">
                                    {{$article->user->name}}
                                </a>
                            </div>
                        </div>
                        <div class="card-block text-center p-5">
                            <div class="avatar avatar-xl">
                                <a href="{{route('member.user.show',$article->user)}}">
                                    <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            @auth()
                                {{--如果是自己的文章不可以关注--}}
                                @can('isnotMine',$article->user)
                                    {{--获取的是当前登录的用户有没有在我的关注里表里面--}}
                                    @if($article->user->fans->contains(auth()->user()))
                                        <a class="btn btn-white btn-block btn-xs" href="{{route('member.attention',$article->user)}}">
                                            <i class="fa fa-plus" aria-hidden="true"></i> 取消关注
                                        </a>
                                    @else
                                        <a class="btn btn-white btn-block btn-xs bg-danger text-white" href="{{route('member.attention',$article->user)}}">
                                            <i class="fa fa-plus" aria-hidden="true"></i> 关注 TA
                                        </a>
                                    @endif

                                @endcan

                                @else
                                    <a class="btn btn-white btn-block btn-xs bg-danger text-white" href="{{route('login',['url'=>url()->full()])}}">
                                        <i class="fe fe-github mr-3" aria-hidden="true"></i>请登陆
                                    </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('js')
            <script>
                require(['hdjs','MarkdownIt','marked', 'highlight'], function (hdjs, MarkdownIt,marked) {
                    //将markdown转为html代码：http://hdjs.hdphp.com/771125
                    let md = new MarkdownIt();
                    let content = md.render($('textarea[name=content]').val());
                    $('#content').html(content);
                    //代码高亮
                    $(document).ready(function() {
                        $('pre code').each(function(i, block) {
                            hljs.highlightBlock(block);
                        });
                    });
                })
            </script>
            @endpush
    </div>
    @endsection