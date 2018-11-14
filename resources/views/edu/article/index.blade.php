<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    这是首页哦，哈哈哈
    <form action="{{route('edu.article.create')}}" method="post">
        @csrf
        内容：<input type="text" name="text">
        <button>哈哈哈</button>
    </form>
</body>
</html>