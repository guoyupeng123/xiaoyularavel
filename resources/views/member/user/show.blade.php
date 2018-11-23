@extends('member.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml--3 grid-margin stretch-card">
                <div class="card">

                    @foreach($article as $cont)
                    <div class="card-body">
                        <h4 class="card-title text-warning">{{$cont->title}}</h4>
                        <div class="card-description">
                            <a href="{{route('home.article.show',$cont)}}" class="btn btn-sm btn-primary d-none d-md-inline-block"  style="float: right" >查看详情</a>
                            作者 : {{$cont->user->name}} <code>(-_-)</code> {{$cont->created_at->diffForHumans()}}
                            @can('update',$cont)
                                <a href="{{route('home.article.edit',$cont)}}" class="btn btn-sm btn-primary d-none d-md-inline-block mr-2"  style="float: right;">编辑</a>
                            @endcan
                            @can('delete',$cont)
                                <div class="btn btn-sm btn-danger d-none d-md-inline-block mr-2" style="float: right"  onclick="del(this)">删除</div>
                            @endcan
                            <form action="{{route('home.article.destroy',$cont)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                        <p>
                            简介 : {{str_limit($cont->content, 120, '... ... ')}}
                        </p>
                    </div>
                    @endforeach

                        @push('js')
                            <script>
                                function del(obj) {
                                    require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                                        swal("确定删除?", {
                                            icon: 'warning',
                                            buttons: {
                                                cancel: "取消",
                                                defeat: '确定',
                                            },
                                        }).then((value) => {
                                            switch (value) {
                                                case "defeat":
                                                    $(obj).next('form').submit();
                                                    break;
                                                default:
                                            }
                                        });
                                    })
                                }
                            </script>
                        @endpush




                </div>
            </div>
        </div>
    </div>





    @endsection