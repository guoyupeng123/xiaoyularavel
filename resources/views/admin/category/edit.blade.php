{{--模板继承 -- 加载父级模板--}}
@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                后台管理
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">修改栏目</h4>
                        <p class="card-description">
                            Modify the program
                        </p>
                        <form class="forms-sample" method="post" action="{{route('admin.category.update',$category)}}">
                            {{--伪造表单--}}
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">栏目标题</label>
                                <input type="text" name="title" class="form-control" id="exampleInputUsername1" value="{{$category->title}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputUsername1">栏目图标</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white address-book-o fa {{$category->icon}}" id="imgico"></span>
                                    </div>
                                    <input type="text" name="icon" unselectable="on" class="form-control" style="background: #fff" id="ico" aria-label="Amount (to the nearest dollar)" value="{{$category->icon}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="img()" style="cursor: pointer">选择图标</span>
                                    </div>
                                </div>
                            </div>

                            <center><button class="btn btn-light bg-gradient-primary text-white">确认修改</button></center>


                        </form>
                    </div>


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





                </div>
            </div>
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
                                <th style="font-size: 1.6em;color: red;">×</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fenye as $value)
                                <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td><span class="{{$value->icon}}"></span></td>
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
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <p class="card-description">
                            Add class <code>.table-striped</code>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    User
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-1.png" alt="image">
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-2.png" alt="image">
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-3.png" alt="image">
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-4.png" alt="image">
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-1.png" alt="image">
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-2.png" alt="image">
                                </td>
                                <td>
                                    John Doe
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 123.21
                                </td>
                                <td>
                                    April 05, 2015
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-3.png" alt="image">
                                </td>
                                <td>
                                    Henry Tom
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 150.00
                                </td>
                                <td>
                                    June 16, 2015
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bordered table</h4>
                        <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6
                                </td>
                                <td>
                                    John Doe
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 123.21
                                </td>
                                <td>
                                    April 05, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    7
                                </td>
                                <td>
                                    Henry Tom
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td>
                                    $ 150.00
                                </td>
                                <td>
                                    June 16, 2015
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Inverse table</h4>
                        <p class="card-description">
                            Add class <code>.table-dark</code>
                        </p>
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    6
                                </td>
                                <td>
                                    John Doe
                                </td>
                                <td>
                                    $ 123.21
                                </td>
                                <td>
                                    April 05, 2015
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    7
                                </td>
                                <td>
                                    Henry Tom
                                </td>
                                <td>
                                    $ 150.00
                                </td>
                                <td>
                                    June 16, 2015
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Table with contextual classes</h4>
                        <p class="card-description">
                            Add class <code>.table-{color}</code>
                        </p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="table-info">
                                <td>
                                    1
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    Photoshop
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr class="table-warning">
                                <td>
                                    2
                                </td>
                                <td>
                                    Messsy Adam
                                </td>
                                <td>
                                    Flash
                                </td>
                                <td>
                                    $245.30
                                </td>
                                <td>
                                    July 1, 2015
                                </td>
                            </tr>
                            <tr class="table-danger">
                                <td>
                                    3
                                </td>
                                <td>
                                    John Richards
                                </td>
                                <td>
                                    Premeire
                                </td>
                                <td>
                                    $138.00
                                </td>
                                <td>
                                    Apr 12, 2015
                                </td>
                            </tr>
                            <tr class="table-success">
                                <td>
                                    4
                                </td>
                                <td>
                                    Peter Meggik
                                </td>
                                <td>
                                    After effects
                                </td>
                                <td>
                                    $ 77.99
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            <tr class="table-primary">
                                <td>
                                    5
                                </td>
                                <td>
                                    Edward
                                </td>
                                <td>
                                    Illustrator
                                </td>
                                <td>
                                    $ 160.25
                                </td>
                                <td>
                                    May 03, 2015
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection