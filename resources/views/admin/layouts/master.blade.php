
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
    <!-- inject:css -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('org/admin/css')}}/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('org/admin/images')}}/favicon.png" />
    <link rel="stylesheet" href="{{asset('org/css/wechat_button.css')}}" />
    <script src="{{asset('org/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <style>
        a{
            text-decoration: none !important;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('org/admin/images')}}/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('org/admin/images')}}/logo-mini.svg" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        @auth()
                        <div class="nav-profile-img">
                            <img src="{{auth()->user()->icon}}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{auth()->user()->name}}</p>
                        </div>
                            @endauth
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        @auth()
                        <a class="dropdown-item" href="{{route('member.user.show',auth()->user())}}">
                            <i class="mdi mdi-cached mr-2 text-success"></i>
                            个人中心
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('index')}}">
                        <a class="dropdown-item" href="{{route('index')}}">
                            <i class="mdi mdi-logout mr-2 text-primary"></i>
                            退出
                        </a>
                        @endauth
                    </div>

                </li>
                <li class="nav-item d-none d-lg-block full-screen-link">
                    <a class="nav-link">
                        <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-warning"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0">Messages</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('org/admin/images')}}/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                                <p class="text-gray mb-0">
                                    1 Minutes ago
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('org/admin/images')}}/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                                <p class="text-gray mb-0">
                                    15 Minutes ago
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="{{asset('org/admin/images')}}/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                                <p class="text-gray mb-0">
                                    18 Minutes ago
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                <p class="text-gray ellipsis mb-0">
                                    Just a reminder that you have an event today
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                <p class="text-gray ellipsis mb-0">
                                    Update dashboard
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-link-variant"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                <p class="text-gray ellipsis mb-0">
                                    New admin wow!
                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                    </div>
                </li>
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
                <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-format-line-spacing"></i>
                    </a>
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
                        @auth()
                        <div class="nav-profile-image">
                            <img src="{{auth()->user()->icon}}" alt="profile">
                            <span class="login-status online"></span> <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2">{{auth()->user()->name}}</span>
                            <span class="text-secondary text-small">Project Manager</span>
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                            @endauth
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}">
                        <span class="menu-title">后台首页</span>
                        <i class="mdi mdi-home menu-icon text-primary"></i>
                    </a>
                </li>
                @auth()
                    @if(auth()->user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-banner" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">网站轮播</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-table-large menu-icon text-primary"></i>
                        </a>
                        @can('Banner-banner')
                        <div class="collapse" id="ui-banner">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('banner.banner.index')}}">编辑-<span class="text-primary">-banner</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('banner.banner.create')}}">增加-<span class="text-primary">-banner</span></a>
                                </li>
                                {{--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>--}}
                            </ul>
                        </div>
                            @endcan
                    </li>
                    @endif
                @endauth

                @hasanyrole('article|superAdmin')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <span class="menu-title">文章管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-crosshairs-gps menu-icon text-primary"></i>
                    </a>
                    @can('Admin-category')
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.category.index')}}">栏目管理</a></li>
                            {{--<li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>--}}
                        </ul>
                    </div>
                        @endcan
                </li>
                @else @endhasanyrole


                @can('Admin-config')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">网站配置</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-format-list-bulleted menu-icon  text-primary"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.config.edit',['name'=>'base'])}}">基本配置</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'upload'])}}" class="nav-link">上传配置</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'mail'])}}" class="nav-link">邮件配置</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'code'])}}" class="nav-link">验证码配置</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'search'])}}" class="nav-link">搜索配置</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.config.edit',['name'=>'wechat'])}}" class="nav-link">微信配置</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endcan

                @hasanyrole('wx|superAdmin')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#wechat" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">微信管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-wechat menu-icon text-primary"></i>
                    </a>
                    <div class="collapse" id="wechat">
                        <ul class="nav flex-column sub-menu">
                            @can('Wechat-response-base')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('wechat.response_base.create')}}">基本回复</a>
                                </li>
                            @endcan

                            @can('Wechat-button')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('wechat.button.index')}}">查看菜单</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('wechat.button.create')}}">增加菜单</a>
                            </li>
                                @endcan
                            @can('Wechat-response-text')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('wechat.response_text.index')}}">文本回复</a>
                            </li>
                                @endcan
                            @can('Wechat-response-news')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('wechat.response_news.index')}}">图文回复</a>
                            </li>
                                @endcan
                        </ul>
                    </div>
                </li>
                @else @endhasanyrole

                @hasanyrole('role|superAdmin')
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#quanxian" aria-expanded="false" aria-controls="general-pages">
                        <span class="menu-title">权限管理</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-account menu-icon text-primary"></i>
                    </a>
                    <div class="collapse" id="quanxian">
                        <ul class="nav flex-column sub-menu">
                            @can('Role-user')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('role.user.index')}}">用户管理</a>
                            </li>
                            @endcan
                             @can('Role-role')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('role.role.index')}}">角色管理</a>
                            </li>
                            @endcan
                            @can('Role-permission')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('role.permission.index')}}">权限列表</a>
                            </li>
                             @endcan
                        </ul>
                    </div>
                </li>
                @else @endhasanyrole


                <div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
                <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
              <div class="mt-4">
                <div class="border-bottom">
                  <p class="text-secondary">Categories</p>
                </div>
                <ul class="gradient-bullet-list mt-4">
                  <li>Free</li>
                  <li>Pro</li>
                </ul>
              </div>
            </span>
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
{{--<script src="js/off-canvas.js"></script>--}}
{{--<script src="js/misc.js"></script>--}}





{{--将hdjs封装成模板引入页面--}}
@include('layouts.hdjs');
@include('layouts.message');



@stack('js')
<!-- endinject -->
<!-- Custom js for this page-->
{{--<script src="js/dashboard.js"></script>--}}
<!-- End custom js for this page-->
</body>

</html>
