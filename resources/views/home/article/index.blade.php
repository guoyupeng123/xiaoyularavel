@extends('home.layouts.master')

@section('homecentend')
    <div class="main-content">
        <div class="container mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-9">

                        <!-- Files -->
                        <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h4 class="card-header-title" style="color: #8BA7E9;">
                                            文章列表
                                        </h4>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Dropdown -->
                                        <div class="dropdown">

                                            <!-- Toggle -->
                                            <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                                Sort order
                                            </a>

                                            <!-- Menu -->
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item sort" data-sort="name" href="#!">
                                                    Asc
                                                </a>
                                                <a class="dropdown-item sort" data-sort="name" href="#!">
                                                    Desc
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Button -->
                                        <a href="{{route('home.article.create')}}" class="btn btn-sm btn-primary">
                                            发表文章
                                        </a>

                                    </div>
                                </div> <!-- / .row -->
                            </div>

                            <div class="card-body">

                                <!-- List -->
                                <ul class="list-group list-group-lg list-group-flush list my--4">
                                    @foreach($article as $value)
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="{{route('member.user.show',$value)}}" class="avatar avatar-sm">
                                                    <img src="{{$value->user->icon}}" alt="..." class="avatar-img rounded">
                                                </a>
                                            </div>
                                            <div class="col ml--2">
                                                <!-- Title -->
                                                <h4 class="card-title mb-1 name">
                                                    <a href="#">{{$value->title}}</a>
                                                </h4>
                                                <p class="card-text small mb-1">
                                                    <a href="" class="text-secondary mr-2">
                                                        <i class="fa fa-user-circle" aria-hidden="true"></i>{{$value->user->name}}
                                                    </a>
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$value->created_at->diffForHumans()}}
                                                        <a href="#" class="text-secondary ml-2">
                                                    <i class="fa fa-folder-o" aria-hidden="true"></i> {{$value->category->title}}</a>
                                                </p>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Dropdown -->
                                                <div class="dropdown">
                                                    <a href="{{route('home.article.show',$value)}}" class="btn btn-sm btn-primary d-none d-md-inline-block">查看详情</a>
                                                    @can('update',$value)
                                                    <a href="{{route('home.article.edit',$value)}}" class="btn btn-sm btn-primary d-none d-md-inline-block">编辑</a>
                                                    @endcan
                                                    @can('delete',$value)
                                                    <div class="btn btn-sm btn-danger d-none d-md-inline-block"  onclick="del(this)">删除</div>
                                                    @endcan
                                                    <form action="{{route('home.article.destroy',$value)}}" method="post">
                                                        @csrf @method('DELETE')
                                                    </form>
                                                </div>

                                            </div>
                                        </div> <!-- / .row -->

                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                    </div>

                        <div style="display: inline-block;margin-left: 50%">
                            {{$article->appends(['category' => Request::query('category')])->links()}}
                        </div>
                        <style type="text/css">
                            .pagination{
                                margin-left: -50%;
                            }
                        </style>

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



                    <div class="col-3">

                        <!-- Files -->
                        <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <!-- Title -->
                                        <h4 class="card-header-title" style="color: #8BA7E9">
                                            文章栏目
                                        </h4>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="card-body">
                                <!-- List -->
                                <ul class="list-group list-group-lg list-group-flush list my--4">
                                        @foreach($categories as $category)
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col text-center">
                                                    <!-- Title -->
                                                    <h4 class="card-title mb-1 name">
                                                        <a href="{{route('home.article.index',['category'=>$category['id']])}}">{{$category->title}}</a>
                                                    </h4>
                                                </div>
                                            </div> <!-- / .row -->
                                        </li>
                                            @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>



                </div> <!-- / .row -->
            </div>
        </div>

    </div>
    @endsection