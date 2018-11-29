@extends('member.layouts.master')

@section('content')
    <div class="content-wrapper">
        {{--评论通知$notifications--}}
        @foreach($notifications as $notify)
            <div class="row">
                {{--{{$notify}}--}}
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex mt-2 align-items-top">
                                <img src="{{$notify['data']['user_icon']}}" class="img-sm rounded-circle mr-3" alt="">
                                <div class="mb-0 flex-grow">
                                    <p class="mr-2 mb-2">
                                        <i class="mdi mdi-timer icon-sm mr-1 text-danger"></i>{{$notify->created_at->diffForHumans()}}
                                        <i class="mdi mdi-account icon-sm mr-1 text-danger" style="margin-left: 2%"></i>{{$notify['data']['user_name']}}  <span class="text-danger" style="margin-left: 1%">评论了</span>
                                        <i class="mdi mdi-forum icon-sm mr-1 text-danger" style="margin-left: 1%"></i> {{$notify['data']['article_title']}}
                                    </p>
                                    <p class="mb-0 font-weight-light mt-4">评论内容 : {{$notify['data']['user_content']}}</p>
                                </div>
                                <div class="ml-auto">
                                    @if($notify->read_at)
                                        <a href="{{route('member.notify.show',$notify)}}" class="text-danger text-sm-right text-muted" style="font-size: 0.8em">已读</a>
                                    @else
                                        <a href="{{route('member.notify.show',$notify)}}" class="text-info text-sm-right"><i class="mdi mdi-bell-ring text-success"></i></a>
                                    @endif


                                    <a href="{{$notify['data']['link']}}" class="text-danger text-sm-right ml-12" style="margin-left: 20px">查看</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{$notifications->links()}}


    </div>
    @endsection
