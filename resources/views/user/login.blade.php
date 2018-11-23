
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/')}}/assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/')}}/assets/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/')}}/assets/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/')}}/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/')}}/assets/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/')}}/assets/css/theme.min.css">

    <title>Dashkit</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                登录
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                欢迎您登陆小宇博客网站
            </p>

            <!-- Form -->
            <form method="post" action="{{route('login',['url'=>$url])}}">
                @csrf
                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        邮箱
                    </label>

                    <!-- Input -->
                    <input type="email" name="email" class="form-control" placeholder="请输入您的邮箱" value="{{old('email')}}">

                </div>

                <!-- Password -->
                <div class="form-group">
                    <!-- Label -->
                    <label>密码</label>
                    <!-- Input -->
                    <input type="password" name="password" class="form-control" placeholder="请输入您的密码">
                </div>

                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                        记住我
                        <i class="input-helper"></i>
                    </label>
                </div>
                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                    登录
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        还没账号 ? <a href="{{route('register')}}">去注册</a>.
                        <a href="{{route('password_reset')}}">重置密码</a>.
                        <a href="{{route('index')}}">返回首页</a>.
                    </small>
                </div>

            </form>

        </div>
    </div> <!-- / .row -->
</div> <!-- / .container -->

<!-- JAVASCRIPT
================================================== -->

{{--将hdjs封装成模板引入页面--}}
@include('layouts.hdjs');
@include('layouts.message');
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('util.code.sent')}}',
            //验证码等待发送时间
            timeout: 10,
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>


</body>
</html>