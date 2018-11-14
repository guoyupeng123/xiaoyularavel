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

<div id="box">
    <?php foreach($sde as $val=>$key){?>
        <div class="se">{{$val}}</div>
        <div class="sw">{{$key}}</div>
    <?php }?>
</div>

<style>
    #box{
        width: 80%;
        height: 200px;
        background: darkgoldenrod;
        margin: 0 auto;
        margin-top: 100px;
    }
    .se{
        width: 20%;
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-size: 24px;
        color: #fff;
        background: seagreen;
        float: left;
    }
    .sw{
        width: 80%;
        background: #1d68a7;
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-size: 24px;
        color: #fff;
        float: left;
    }
</style>

</body>
</html>