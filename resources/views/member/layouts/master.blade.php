
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('org/admin/vendors')}}/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('org/admin/vendors')}}/css/vendor.bundle.base.css">
    <!-- endinject -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- inject:css -->
    <link rel="stylesheet"href="{{asset('org/admin/css')}}/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('/')}}favicon.ico" />
    <style>
        .active{
            font-weight: 600 !important;
            color: #9a55ff !important;
        }
        .active i{
            color: #9a55ff !important;
        }
        a{
            text-decoration: none !important;
        }
        .chankandd{
            font-size: 14px !important;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href=""><img src="{{asset('org/admin/images')}}/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href=""><img src="{{asset('org/admin/images')}}/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block"></div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    @auth()
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="{{route('member.user.show',auth()->user())}}" data-toggle="dropdown" aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{auth()->user()->icon}}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{auth()->user()->name}}</p>
                        </div>
                    </a>

                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{route('member.notify',auth()->user())}}">
                            <i class="mdi mdi-cached mr-2 text-success"></i>
                            消息通知
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.index',auth()->user())}}">
                            <i class="mdi mdi-briefcase mr-2 text-success"></i>
                            后台管理
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="http://xiaoyularavel.com">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            返回首页
                        </a>
                    </div>
                    @endauth
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="{{$user->icon}}" alt="profile">
                            <span class="login-status online"></span> <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">{{$user->name}}</span>
                            <span class="text-secondary text-small">Project Manager</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{active_class(if_route(['member.user.show']), 'active', '')}}" href="{{route('member.user.show',$user)}}">
                        <span class="menu-title">文章</span>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    </a>
                </li>
                @can('isMine',$user)
                <li class="nav-item">
                    <a href="{{route('member.user.edit',[$user,'type'=>'icon'])}}"  class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'icon'), 'active', '')}}">
                        <span class="menu-title">修改头像</span>
                        <i class="mdi mdi-account-circle menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('member.user.edit',[$user,'type'=>'password'])}}"  class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'password'), 'active', '')}}">
                        <span class="menu-title">修改密码</span>
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('member.user.edit',[$user,'type'=>'name'])}}" class="nav-link {{active_class(if_route(['member.user.edit']) && if_query('type', 'name'), 'active', '')}}">
                        <span class="menu-title">修改昵称</span>
                        <i class="mdi mdi-contacts menu-icon"></i>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link {{active_class(if_route(['member.my_fans']), 'active', '')}}" href="{{route('member.my_fans',$user)}}">
                        @can('isMine',$user)
                            <span class="menu-title">我的粉丝</span>
                        @else
                            <span class="menu-title">他的粉丝</span>
                        @endcan
                        <i class="mdi mdi-chart-bar menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{active_class(if_route(['member.my_following']), 'active', '')}}" href="{{route('member.my_following',$user)}}">
                        @can('isMine',$user)
                            <span class="menu-title">我的关注</span>
                        @else
                            <span class="menu-title">他的关注</span>
                        @endcan
                        <i class="mdi mdi-table-large menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('member.collect',$user)}}" class="nav-link {{active_class(if_route(['member.collect']), 'active', '')}}">
                        @can('isMine',$user)
                            <span class="menu-title">我的收藏</span>
                            <i class="mdi mdi-book-multiple-variant menu-icon"></i>
                        @else
                            <span class="menu-title">他的收藏</span>
                            <i class="mdi mdi-book-multiple-variant menu-icon"></i>
                        @endcan

                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('member.my_zan',[$user,'type'=>'article'])}}" class="nav-link {{active_class(if_route(['member.my_zan']), 'active', '')}}">
                        @can('isMine',$user)
                            <span class="menu-title">我的点赞</span>
                            <i class="mdi mdi-barley menu-icon"></i>
                        @else
                            <span class="menu-title">他的点赞</span>
                            <i class="mdi mdi-barley menu-icon"></i>
                        @endcan

                    </a>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            @yield('content')
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('org/admin/vendors')}}/js/vendor.bundle.base.js"></script>
<script src="{{asset('org/admin/vendors')}}/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->


{{--将hdjs封装成模板引入页面--}}
@include('layouts.hdjs');
@include('layouts.message');


{{--stack在手册Blade模板--}}
@stack('js')



</body>

</html>
