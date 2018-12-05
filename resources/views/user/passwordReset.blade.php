<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    {{--秘钥--}}
    <meta name="csrf-token" content="{{csrf_token()}}">
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
                请重置您的密码
            </h1>


            <!-- Form -->
            <form method="post" action="{{route('password_reset')}}">
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
                    <label>新密码</label>
                    <!-- Input -->
                    <input type="password" name="password" class="form-control" placeholder="请输入您的密码">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <!-- Label -->
                    <label>二次密码</label>
                    <!-- Input -->
                    <input type="password" name="password_confirmation" class="form-control" placeholder="请重新输入您的密码">
                </div>

                <div class="input-group mb-3">
                    <label>请填写验证码</label>
                    <input type="text" class="form-control" placeholder="请输入验证码" name="code" value="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                    </div>
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
            timeout: "{{hd_config('code.code_expires')}}",
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>


</body>
</html>