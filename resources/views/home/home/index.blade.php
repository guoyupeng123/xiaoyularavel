@extends('home.layouts.master')


@section('homecentend')
    <div class="main-content">

        <!-- HEADER -->
        <div class="header bg-dark pb-5">
            <div class="container">

                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle text-secondary">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title text-white">
                                Performance
                            </h1>

                        </div>
                        <div class="col-auto">

                            <!-- Nav -->
                            <ul class="nav nav-tabs header-tabs">
                                <li class="nav-item" data-toggle="chart" data-target="#headerChart"
                                    data-update='{"data":{"datasets":[{"data":[0,10,5,15,10,20,15,25,20,30,25,40]}]}}'
                                    data-prefix="$" data-suffix="k">
                                    <a href="#" class="nav-link text-center active" data-toggle="tab">
                                        <h6 class="header-pretitle text-secondary">
                                            Earnings
                                        </h6>
                                        <h3 class="text-white mb-0">
                                            $19.2k
                                        </h3>
                                    </a>
                                </li>
                                <li class="nav-item" data-toggle="chart" data-target="#headerChart"
                                    data-update='{"data":{"datasets":[{"data":[50,75, 35,25,55,87,67,53,25,80,87,45]}]}}'
                                    data-prefix="" data-suffix="k">
                                    <a href="#" class="nav-link text-center" data-toggle="tab">
                                        <h6 class="header-pretitle text-secondary">
                                            Sessions
                                        </h6>
                                        <h3 class="text-white mb-0">
                                            92.1k
                                        </h3>
                                    </a>
                                </li>
                                <li class="nav-item" data-toggle="chart" data-target="#headerChart"
                                    data-update='{"data":{"datasets":[{"data":[40,57,25,50,57,32,46,28,59,34,52,48]}]}}'
                                    data-prefix="" data-suffix="%">
                                    <a href="#" class="nav-link text-center" data-toggle="tab">
                                        <h6 class="header-pretitle text-secondary">
                                            Bounce
                                        </h6>
                                        <h3 class="text-white mb-0">
                                            50.2%
                                        </h3>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

                <!-- Footer -->
                <div class="header-footer">

                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="headerChart" class="chart-canvas"></canvas>
                    </div>

                </div>

            </div> <!-- / .container -->
        </div> <!-- / .header -->

        <!-- CARDS -->
        <div class="container mt-6">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <!-- Projects -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        最新评论
                                    </h4>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div class="card-body">

                            @foreach($pingluns as $pinglun)
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <!-- Avatar -->
                                    <a href="{{route('home.article.show',$pinglun->causer)}}" class="avatar avatar-4by3">
                                        <img src="{{$pinglun->causer->icon}}" alt="{{$pinglun->causer->name}}"
                                             class="avatar-img rounded">
                                    </a>
                                </div>
                                <div class="col ml--2">
                                    <!-- Title -->
                                    <h4 class="card-title mb-1">
                                        <a href="{{route('home.article.show',$pinglun->causer)}}">{{$pinglun->causer->name}}</a> <p style="font-size: 10px;display: inline-block" class="text-muted ml-2">评论了</p>
                                    </h4>
                                    <!-- Time -->
                                    <p class="card-text small text-muted">
                                        <a href="{{route('home.article.show',$pinglun->subject->article) . '#comment' . $pinglun->subject->id}}">
                                          {{$pinglun['properties']['attributes']['content']}}
                                        </a>
                                    </p>
                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                        <a href="{{route('home.article.show',$pinglun->subject->article) . '#comment' . $pinglun->subject->id}}" class="dropdown-ellipses dropdown-toggle" >
                                            <i class="fe fe-eye mr-4" id="iswe"></i>
                                            <style>#iswe:hover{color: hotpink}</style>
                                        </a>
                                    </div>

                                </div>
                            </div><hr>
                                @endforeach


                        </div> <!-- / .card-body -->
                    </div> <!-- / .card -->

                </div>
                <div class="col-12 col-xl-8">

                    <!-- Goals -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        动态
                                    </h4>

                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div class="table-responsive mb-0" data-toggle="lists"
                             data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                            <table class="table table-sm table-nowrap card-table">
                                <tbody class="list">

                                @foreach($artives as $artive)
                                    <tr>
                                        <td class="goal-project">
                                            <a href="{{route('member.user.show',$artive->causer)}}" class="avatar avatar-xs" data-toggle="tooltip" title="" data-original-title="Dianna Smiley">
                                                <img src="{{$artive->causer->icon}}" class="avatar-img rounded-circle border border-white" alt="{{$artive->causer->name}}">
                                            </a>
                                        </td>
                                        <td class="goal-status">
                                            <a href="{{route('member.user.show',$artive->causer)}}" class="text-black">
                                                <i class="fe fe-user mr-2 text-danger float-left"></i>
                                                <p class="text-dark float-left">{{$artive->causer->name}}</p>
                                            </a>
                                        </td>
                                        @if($artive['description'] == 'created')
                                            <td class="goal-progress text-muted">
                                                发布了
                                            </td>
                                        @elseif($artive['description'] == 'updated')
                                            <td class="goal-progress text-muted">
                                                更新了
                                            </td>
                                        @endif
                                        <td class="goal-date">
                                            <a href="{{route('home.article.show',$artive['properties']['attributes']['id'])}}" class="text-black">
                                                <i class="fe fe-book-open mr-1 text-primary float-left"></i>
                                                <p class="text-dark float-left">{{$artive['properties']['attributes']['title']}}</p>
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <p>{{$artive->created_at->diffForHumans()}}</p>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <div class="text-black" style="margin-left: 60% !important;">
                                {{$artives->links()}}
                            </div>
                        </div>
                    </div>



                </div>
            </div> <!-- / .row -->
            <div class="row">
                <div class="col-12 col-xl-8">

                    <!-- Orders -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        Orders
                                    </h4>

                                </div>
                                <div class="col-auto mr--3">

                                    <!-- Caption -->
                                    <span class="text-muted">
                      Show affiliate:
                    </span>

                                </div>
                                <div class="col-auto">

                                    <!-- Toggle -->
                                    <div class="custom-control custom-checkbox-toggle">
                                        <input type="checkbox" class="custom-control-input" id="cardToggle"
                                               data-toggle="chart" data-target="#ordersChart"
                                               data-add='{"data":{"datasets":[{"data":[15,10,20,12,7,0,8,16,18,16,10,22],"backgroundColor":"#d2ddec","label":"Affiliate"}]}}'>
                                        <label class="custom-control-label" for="cardToggle"></label>
                                    </div>

                                </div>
                            </div> <!-- / .row -->

                        </div>
                        <div class="card-body">

                            <!-- Chart -->
                            <div class="chart">
                                <canvas id="ordersChart" class="chart-canvas"></canvas>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-xl-4">

                    <!-- Devices -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h4 class="card-header-title">
                                        Devices
                                    </h4>

                                </div>
                                <div class="col-auto">

                                    <!-- Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                                        <li class="nav-item" data-toggle="chart" data-target="#devicesChart"
                                            data-update='{"data":{"datasets":[{"data":[60,25,15]}]}}'>
                                            <a href="#" class="nav-link active" data-toggle="tab">
                                                All
                                            </a>
                                        </li>
                                        <li class="nav-item" data-toggle="chart" data-target="#devicesChart"
                                            data-update='{"data":{"datasets":[{"data":[15,45,20]}]}}'>
                                            <a href="#" class="nav-link" data-toggle="tab">
                                                Direct
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div> <!-- / .row -->

                        </div>
                        <div class="card-body">

                            <!-- Chart -->
                            <div class="chart chart-appended">
                                <canvas id="devicesChart" class="chart-canvas" data-target="#devicesChartLegend"></canvas>
                            </div>

                            <!-- Legend -->
                            <div id="devicesChartLegend" class="chart-legend"></div>

                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->
            <div class="row">
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Budget
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                      $24,500
                    </span>

                                    <!-- Badge -->
                                    <span class="badge badge-soft-success mt--1">
                      +3.5%
                    </span>

                                </div>
                                <div class="col-auto">

                                    <!-- Icon -->
                                    <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>

                                </div>
                            </div> <!-- / .row -->

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Total Hours
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                      763.5
                    </span>

                                </div>
                                <div class="col-auto">

                                    <!-- Icon -->
                                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>

                                </div>
                            </div> <!-- / .row -->

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Progress
                                    </h6>

                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">

                                            <!-- Heading -->
                                            <span class="h2 mr-2 mb-0">
                          84.5%
                        </span>

                                        </div>
                                        <div class="col">

                                            <!-- Progress -->
                                            <div class="progress progress-sm">
                                                <div class="progress-bar" role="progressbar" style="width: 85%"
                                                     aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                        </div>
                                    </div> <!-- / .row -->

                                </div>
                                <div class="col-auto">

                                    <!-- Icon -->
                                    <span class="h2 fe fe-clipboard text-muted mb-0"></span>

                                </div>
                            </div> <!-- / .row -->

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6 col-xl">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2">
                                        Effective Hourly
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0">
                      $85.50
                    </span>

                                </div>
                                <div class="col-auto">

                                    <!-- Icon -->
                                    <span class="h2 fe fe-clock text-muted mb-0"></span>

                                </div>
                            </div> <!-- / .row -->

                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->

    </div>
@endsection