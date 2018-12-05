{{--模板继承 -- 加载父级模板--}}
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                文章管理
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">栏目管理</h4>
                        <p class="card-description">
                            Program <code>management</code>
                        </p>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>栏目标题</th>
                                <th>栏目图标</th>
                                <th style="font-size: 1.2em;color: purple;">#</th>
                                <th style="font-size: 1.6em;color: red;">×</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fenye as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->title}}</td>
                                    <td><span class="{{$value->icon}}"></span></td>
                                    <td><a href="{{route('admin.category.edit',$value)}}" class="badge badge-primary text-white">修改</a></td>
                                    <td>
                                        <button class="badge badge-danger text-white" onclick="formok(this)">删除</button>
                                        <form action="{{route('admin.category.destroy',$value)}}" method="post"> @method('DELETE') @csrf </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div id="fns" style="min-width: 50px;display: inline-block;margin-left: 50%;margin-top: 10%">{{$fenye->links()}}</div>
                        <style>
                            .pagination{
                                margin-left: -50% !important;
                            }
                        </style>


                        @push('js')
                        <script>
                            function formok(obj) {
                                require(['hdjs','bootstrap'], function (hdjs) {
                                    hdjs.confirm('确定删除吗?', function () {
                                        $(obj).next('form').submit();
                                    })
                                })
                            }
                        </script>
                            @endpush

                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">



                    <div class="card-body">
                        <h4 class="card-title">增加栏目</h4>
                        <p class="card-description">
                            Add columns
                        </p>
                        <form class="forms-sample" method="post" action="{{route('admin.category.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">栏目标题</label>
                                <input type="text"  name="title" class="form-control" id="exampleInputUsername1" placeholder="请填写栏目名称">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">栏目图标</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white address-book-o fa" id="imgico"></span>
                                    </div>
                                    <input type="text" name="icon" readonly="readonly" class="form-control" style="background: #fff" id="ico" placeholder="请选择图标" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="img()" style="cursor: pointer">选择图标</span>
                                    </div>
                                </div>
                            </div>

                            <center><button class="btn btn-light bg-gradient-primary text-white">增加栏目</button></center>


                        </form>
                </div>

                @push('js')
                    <script>
                        function img() {
                            require(['hdjs'], function (hdjs) {
                                hdjs.font(function(icon){
                                    $('#ico').val(icon);
                                    $('#imgico').addClass(icon);
                                })
                            })
                        }
                    </script>
                @endpush




                </div>
            </div>

        </div>
    </div>
@endsection