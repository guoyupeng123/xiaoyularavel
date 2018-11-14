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
    <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

            <!-- Image -->
            <div class="text-center">
                <img src="{{asset('org/')}}/assets/img/illustrations/happiness.svg" alt="..." class="img-fluid">
            </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                注册页面
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                欢迎注册我们的产品
            </p>

            <!-- Form -->
            <form method="post" action={{route('register')}} >
                @csrf
                <div class="form-group">
                    <!-- Label -->
                    <label>用户名</label>
                    <!-- Input -->
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>

                <div class="form-group">
                    <!-- Label -->
                    <label>注册邮箱</label>
                    <!-- Input -->
                    <input type="email" name="email" class="form-control" placeholder="name@address.com" value="1933304128@qq.com">
                </div>

                <div class="form-group">
                    <!-- Label -->
                    <label>密码</label>
                    <!-- Input -->
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <!-- Label -->
                    <label>二次提交密码</label>
                    <!-- Input -->
                    <input type="password" name="password_confirmation" class="form-control">
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
                    注册
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        Already have an account? <a href="sign-in-illustration.html">Log in</a>.
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
{{--@if ($errors->any())--}}
    {{--<div class="alert alert-danger">--}}
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--@endif--}}
@include('layouts.message');
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('code.sent')}}',
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