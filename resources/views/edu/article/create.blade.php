<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

你好我是create添加数据页面

<form action="{{route('edu.article.store')}}" method="post">
    @csrf
    哈哈: <input type="text" name="ads">
    <button>我爱你</button>
</form>

</body>
</html>